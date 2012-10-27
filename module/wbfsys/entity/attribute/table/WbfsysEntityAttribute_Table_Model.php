<?php 
/*******************************************************************************
*
* @author      : Dominik Bonsch <dominik.bonsch@webfrap.net>
* @date        :
* @copyright   : Webfrap Developer Network <contact@webfrap.net>
* @project     : Webfrap Web Frame Application
* @projectUrl  : http://webfrap.net
*
* @licence     : BSD License see: LICENCE/BSD Licence.txt
* 
* @version: @package_version@  Revision: @package_revision@
*
* Changes:
*
*******************************************************************************/

/**
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysEntityAttribute_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    

  /**
  * Erfragen der Haupt Entity unabhängig vom Maskenname
  * @param int $objid
  * @return WbfsysEntityAttribute_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityAttribute( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysEntityAttribute_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityAttribute( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityAttribute_Entity
  */
  public function getEntityWbfsysEntityAttribute( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysEntityAttribute = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntityAttribute = $this->getRegisterd( 'entityWbfsysEntityAttribute' );

    //entity wbfsys_entity_attribute
    if( !$entityWbfsysEntityAttribute )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntityAttribute = $orm->get( 'WbfsysEntityAttribute', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentityattribute with this id '.$objid,
              'wbfsys.entity_attribute.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntityAttribute', $entityWbfsysEntityAttribute );
        $this->register( 'main_entity', $entityWbfsysEntityAttribute);

      }
      else
      {
        $entityWbfsysEntityAttribute   = new WbfsysEntityAttribute_Entity() ;
        $this->register( 'entityWbfsysEntityAttribute', $entityWbfsysEntityAttribute );
        $this->register( 'main_entity', $entityWbfsysEntityAttribute);
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntityAttribute->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntityAttribute = $orm->get( 'WbfsysEntityAttribute', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentityattribute with this id '.$objid,
            'wbfsys.entity_attribute.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntityAttribute', $entityWbfsysEntityAttribute);
      $this->register( 'main_entity', $entityWbfsysEntityAttribute);
    }

    return $entityWbfsysEntityAttribute;

  }//end public function getEntityWbfsysEntityAttribute */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityAttribute_Entity $entity
  */
  public function setEntityWbfsysEntityAttribute( $entity )
  {

    $this->register( 'entityWbfsysEntityAttribute', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntityAttribute */

  /**
   * just fetch the post data without any required validation
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function getEntryData( $params )
  {

    $orm   = $this->getOrm();
    $data  = array();

    $data['wbfsys_entity_attribute']  = $this->getEntityWbfsysEntityAttribute();


    $tabData = array();

    foreach( $data as $tabName => $ent )
    {
      // prüfen ob etwas gefunden wurde
      if( !$ent )
      {
        Debug::console( "Missing Entity for Reference: ".$tabName );
        continue;
      }

      $tabData = array_merge( $tabData , $ent->getAllData( $tabName ) );

    }


    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_entity_attribute']->id_type )
    {
      $valWbfsysEntityAttributeType = $orm->getField
      (
        'WbfsysEntityAttributeType',
        'rowid = '.$data['wbfsys_entity_attribute']->id_type,
        'name'
      );
      $tabData['wbfsys_entity_attribute_type_name'] = $valWbfsysEntityAttributeType;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_entity_attribute_type_name'] = '';
    }


    return $tabData;

  }// end public function getEntryData */

////////////////////////////////////////////////////////////////////////////////
// context: table
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * Suchfunktion für das Listen Element
   *
   * Wenn Suchparameter übergeben werden, werden diese automatisch in die
   * Query eingebaut, ansonsten wird eine plain query ausgeführt
   *
   * Berechtigungen werden bei Bedarf berücksichtigt
   *
   * Am Ende wird ein geladenes Query Objekt zurückgegeben, über welches
   * ( wie über einen Array ) itteriert werden kann
   *
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   * @param array $condition Übergabe möglicher such Parameter
   *
   * @return LibSqlQuery
   *
   * @throws LibDb_Exception
   *    wenn die Query fehlschlägt
   *    Datenbank Verbindungsfehler... etc ( siehe meldung )
   */
  public function search( $access, $params, $condition = array() )
  {

    // laden der benötigten resourcen
    $view         = $this->getView();
    $httpRequest = $this->getRequest();
    $response    = $this->getResponse();

    $db          = $this->getDb();
    $orm         = $db->getOrm();
    $user        = $this->getUser();
    
    $extendedConditions = array();
    


    // freitext suche
    if( $free = $httpRequest->param( 'free_search' , Validator::TEXT ) )
      $condition['free'] = $db->addSlashes( trim( $free ) );




      if( !$fieldsWbfsysEntityAttribute = $this->getRegisterd( 'search_fields_wbfsys_entity_attribute' ) )
      {
         $fieldsWbfsysEntityAttribute   = $orm->getSearchCols( 'WbfsysEntityAttribute' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_entity_attribute' ) )
      {
        $fieldsWbfsysEntityAttribute = array_unique( array_merge
        (
          $fieldsWbfsysEntityAttribute,
          $refs
        ));
      }

      $filterWbfsysEntityAttribute     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysEntityAttribute', $fieldsWbfsysEntityAttribute ),
        $orm->getErrorMessages( 'WbfsysEntityAttribute'  ),
        'search_wbfsys_entity_attribute'
      );
      $condition['wbfsys_entity_attribute'] = $filterWbfsysEntityAttribute->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_entity_attribute', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_entity_attribute']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_entity_attribute', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_entity_attribute']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_entity_attribute', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_entity_attribute']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_entity_attribute', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_entity_attribute']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_entity_attribute', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_entity_attribute']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_entity_attribute}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_entity_attribute']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_entity_attribute', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_entity_attribute']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_entity_attribute', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_entity_attribute']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysEntityAttribute_Table' );
    $query->extendedConditions = $extendedConditions;


    if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysEntityAttribute_Table_'.SParserString::subToCamelCase( $dynFilter )
          );

          if( $filter )
            $query->inject( $filter, $params );
        }
        catch( LibDb_Exception $e )
        {
          $response->addError( "Requested nonexisting filter ".$dynFilter );
        }

      }
    }

    // per exclude können regeln übergeben werden um bestimmte datensätze
    // auszublenden
    // wird häufig verwendet um bereits zugewiesenen datensätze aus zu blenden
    if( $params->exclude )
    {

      $tmp = explode( '-', $params->exclude );

      $conName   = $tmp[0];
      $srcId     = $tmp[1];
      $targetId  = $tmp[2];

      $excludeCond = ' wbfsys_entity_attribute.rowid NOT IN '
      .'( select '.$targetId .' from '.$conName.' where '.$srcId.' = '.$params->objid.' and not '.$srcId.' is null ) ';

      $query->setCondition( $excludeCond );

    }

    // wenn der user nur teilberechtigungen hat, müssen die ACLs direkt beim
    // lesen der Daten berücksichtigt werden
    if
    (
      $access->isPartAssign || $access->hasPartAssign
    )
    {

      $validKeys  = $access->fetchListIds
      (
        $user->getProfileName(),
        $query,
        'table',
        $condition,
        $params
      );
            $query->fetchInAcls
      (
        $validKeys,
        $params
      );
      
    }
    else
    {

      // da die rechte scheins auf die komplette datenquelle vergeben wurden
      // kann hier auch einfach mit der ganzen quelle geladen werden
      // es wird davon ausgegangen, dass ein standard level definiert wurde
      // wenn kein standard level definiert wurde, werden die daten nur
      // aufgelistet ohne weitere interaktions möglichkeit
      $query->fetch
      (
        $condition,
        $params
      );

    }





    return $query;

  }//end public function search */

  /**
   * fill the elements in a search form
   *
   * @param LibTemplateWindow $view
   * @return boolean
   */
  public function searchForm( $view )
  {

    $searchFields = $this->getSearchFields();


    //entity wbfsys_entity_attribute
    if( !$entityWbfsysEntityAttribute = $this->getRegisterd( 'entityWbfsysEntityAttribute' ) )
    {
      $entityWbfsysEntityAttribute   = new WbfsysEntityAttribute_Entity() ;
    }

    $formWbfsysEntityAttribute    = $view->newForm( 'WbfsysEntityAttribute' );
    $formWbfsysEntityAttribute->setNamespace( 'WbfsysEntityAttribute' );
    $formWbfsysEntityAttribute->setPrefix( 'WbfsysEntityAttribute' );
    $formWbfsysEntityAttribute->createSearchForm
    (
      $entityWbfsysEntityAttribute,
      ( isset($searchFields['wbfsys_entity_attribute'])?$searchFields['wbfsys_entity_attribute']:array() )
    );


  }//end public function searchForm */

  /**
   * request all fields that have to be fetched from the request
   * @return array
   */
  public function getSearchFields()
  {

    return array
    (
      'wbfsys_entity_attribute' => array
      (
        'name',
        'access_key',
        'id_type',
      ),

    );

  }//end public function getSearchFields */

////////////////////////////////////////////////////////////////////////////////
// data provides
////////////////////////////////////////////////////////////////////////////////
    
}//end class WbfsysEntityAttribute_Table_Model

