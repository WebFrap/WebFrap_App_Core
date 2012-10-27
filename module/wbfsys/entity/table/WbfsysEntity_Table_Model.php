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
class WbfsysEntity_Table_Model
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
  * @return WbfsysEntity_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntity( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysEntity_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntity( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntity_Entity
  */
  public function getEntityWbfsysEntity( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysEntity = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntity = $this->getRegisterd( 'entityWbfsysEntity' );

    //entity wbfsys_entity
    if( !$entityWbfsysEntity )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntity = $orm->get( 'WbfsysEntity', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentity with this id '.$objid,
              'wbfsys.entity.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntity', $entityWbfsysEntity );
        $this->register( 'main_entity', $entityWbfsysEntity);

      }
      else
      {
        $entityWbfsysEntity   = new WbfsysEntity_Entity() ;
        $this->register( 'entityWbfsysEntity', $entityWbfsysEntity );
        $this->register( 'main_entity', $entityWbfsysEntity);
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntity->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntity = $orm->get( 'WbfsysEntity', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentity with this id '.$objid,
            'wbfsys.entity.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntity', $entityWbfsysEntity);
      $this->register( 'main_entity', $entityWbfsysEntity);
    }

    return $entityWbfsysEntity;

  }//end public function getEntityWbfsysEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntity_Entity $entity
  */
  public function setEntityWbfsysEntity( $entity )
  {

    $this->register( 'entityWbfsysEntity', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntity */

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

    $data['wbfsys_entity']  = $this->getEntityWbfsysEntity();


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
    if( $data['wbfsys_entity']->id_module )
    {
      $valWbfsysModule = $orm->getField
      (
        'WbfsysModule',
        'rowid = '.$data['wbfsys_entity']->id_module,
        'name'
      );
      $tabData['wbfsys_module_name'] = $valWbfsysModule;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_module_name'] = '';
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




      if( !$fieldsWbfsysEntity = $this->getRegisterd( 'search_fields_wbfsys_entity' ) )
      {
         $fieldsWbfsysEntity   = $orm->getSearchCols( 'WbfsysEntity' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_entity' ) )
      {
        $fieldsWbfsysEntity = array_unique( array_merge
        (
          $fieldsWbfsysEntity,
          $refs
        ));
      }

      $filterWbfsysEntity     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysEntity', $fieldsWbfsysEntity ),
        $orm->getErrorMessages( 'WbfsysEntity'  ),
        'search_wbfsys_entity'
      );
      $condition['wbfsys_entity'] = $filterWbfsysEntity->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_entity', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_entity']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_entity', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_entity']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_entity', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_entity']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_entity', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_entity']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_entity', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_entity']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_entity}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_entity']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_entity', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_entity']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_entity', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_entity']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysEntity_Table' );
    $query->extendedConditions = $extendedConditions;


    if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysEntity_Table_'.SParserString::subToCamelCase( $dynFilter )
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

      $excludeCond = ' wbfsys_entity.rowid NOT IN '
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


    //entity wbfsys_entity
    if( !$entityWbfsysEntity = $this->getRegisterd( 'entityWbfsysEntity' ) )
    {
      $entityWbfsysEntity   = new WbfsysEntity_Entity() ;
    }

    $formWbfsysEntity    = $view->newForm( 'WbfsysEntity' );
    $formWbfsysEntity->setNamespace( 'WbfsysEntity' );
    $formWbfsysEntity->setPrefix( 'WbfsysEntity' );
    $formWbfsysEntity->createSearchForm
    (
      $entityWbfsysEntity,
      ( isset($searchFields['wbfsys_entity'])?$searchFields['wbfsys_entity']:array() )
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
      'wbfsys_entity' => array
      (
        'name',
        'access_key',
      ),

    );

  }//end public function getSearchFields */

////////////////////////////////////////////////////////////////////////////////
// data provides
////////////////////////////////////////////////////////////////////////////////
    
}//end class WbfsysEntity_Table_Model

