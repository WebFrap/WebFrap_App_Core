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
class WbfsysMessageProfileType_Table_Model
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
  * @return WbfsysMessageProfileType_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysMessageProfileType( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysMessageProfileType_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysMessageProfileType( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMessageProfileType_Entity
  */
  public function getEntityWbfsysMessageProfileType( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysMessageProfileType = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysMessageProfileType = $this->getRegisterd( 'entityWbfsysMessageProfileType' );

    //entity wbfsys_message_profile_type
    if( !$entityWbfsysMessageProfileType )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysMessageProfileType = $orm->get( 'WbfsysMessageProfileType', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmessageprofiletype with this id '.$objid,
              'wbfsys.message_profile_type.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysMessageProfileType', $entityWbfsysMessageProfileType );
        $this->register( 'main_entity', $entityWbfsysMessageProfileType);

      }
      else
      {
        $entityWbfsysMessageProfileType   = new WbfsysMessageProfileType_Entity() ;
        $this->register( 'entityWbfsysMessageProfileType', $entityWbfsysMessageProfileType );
        $this->register( 'main_entity', $entityWbfsysMessageProfileType);
      }

    }
    elseif( $objid && $objid != $entityWbfsysMessageProfileType->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysMessageProfileType = $orm->get( 'WbfsysMessageProfileType', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmessageprofiletype with this id '.$objid,
            'wbfsys.message_profile_type.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysMessageProfileType', $entityWbfsysMessageProfileType);
      $this->register( 'main_entity', $entityWbfsysMessageProfileType);
    }

    return $entityWbfsysMessageProfileType;

  }//end public function getEntityWbfsysMessageProfileType */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMessageProfileType_Entity $entity
  */
  public function setEntityWbfsysMessageProfileType( $entity )
  {

    $this->register( 'entityWbfsysMessageProfileType', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysMessageProfileType */

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

    $data['wbfsys_message_profile_type']  = $this->getEntityWbfsysMessageProfileType();


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




      if( !$fieldsWbfsysMessageProfileType = $this->getRegisterd( 'search_fields_wbfsys_message_profile_type' ) )
      {
         $fieldsWbfsysMessageProfileType   = $orm->getSearchCols( 'WbfsysMessageProfileType' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_message_profile_type' ) )
      {
        $fieldsWbfsysMessageProfileType = array_unique( array_merge
        (
          $fieldsWbfsysMessageProfileType,
          $refs
        ));
      }

      $filterWbfsysMessageProfileType     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysMessageProfileType', $fieldsWbfsysMessageProfileType ),
        $orm->getErrorMessages( 'WbfsysMessageProfileType'  ),
        'search_wbfsys_message_profile_type'
      );
      $condition['wbfsys_message_profile_type'] = $filterWbfsysMessageProfileType->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_message_profile_type', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_message_profile_type']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_message_profile_type', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_message_profile_type']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_message_profile_type', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_message_profile_type']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_message_profile_type', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_message_profile_type']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_message_profile_type', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_message_profile_type']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_message_profile_type}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_message_profile_type']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_message_profile_type', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_message_profile_type']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_message_profile_type', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_message_profile_type']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysMessageProfileType_Table' );
    $query->extendedConditions = $extendedConditions;


    if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysMessageProfileType_Table_'.SParserString::subToCamelCase( $dynFilter )
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

      $excludeCond = ' wbfsys_message_profile_type.rowid NOT IN '
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


    //entity wbfsys_message_profile_type
    if( !$entityWbfsysMessageProfileType = $this->getRegisterd( 'entityWbfsysMessageProfileType' ) )
    {
      $entityWbfsysMessageProfileType   = new WbfsysMessageProfileType_Entity() ;
    }

    $formWbfsysMessageProfileType    = $view->newForm( 'WbfsysMessageProfileType' );
    $formWbfsysMessageProfileType->setNamespace( 'WbfsysMessageProfileType' );
    $formWbfsysMessageProfileType->setPrefix( 'WbfsysMessageProfileType' );
    $formWbfsysMessageProfileType->createSearchForm
    (
      $entityWbfsysMessageProfileType,
      ( isset($searchFields['wbfsys_message_profile_type'])?$searchFields['wbfsys_message_profile_type']:array() )
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
      'wbfsys_message_profile_type' => array
      (
        'name',
        'description',
      ),

    );

  }//end public function getSearchFields */

////////////////////////////////////////////////////////////////////////////////
// data provides
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @param array $orders
   * @return boolean
   */
  public function changeOrder( $orders )
  {

    $orm = $this->getOrm();

    try
    {
      foreach( $orders as $order => $id )
      {
        $orm->update( "WbfsysMessageProfileType", $id, array( 'm_order' =>  $order ) );
      }
    }
    catch( LibDb_Exception $e )
    {
      return $e;
    }

    // still running? fine :-)
    return null;

  }//end public function changeOrder */

}//end class WbfsysMessageProfileType_Table_Model

