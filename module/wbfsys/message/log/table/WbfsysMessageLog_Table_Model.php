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
class WbfsysMessageLog_Table_Model
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
  * @return WbfsysMessageLog_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysMessageLog( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysMessageLog_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysMessageLog( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMessageLog_Entity
  */
  public function getEntityWbfsysMessageLog( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysMessageLog = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysMessageLog = $this->getRegisterd( 'entityWbfsysMessageLog' );

    //entity wbfsys_message_log
    if( !$entityWbfsysMessageLog )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysMessageLog = $orm->get( 'WbfsysMessageLog', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmessagelog with this id '.$objid,
              'wbfsys.message_log.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysMessageLog', $entityWbfsysMessageLog );
        $this->register( 'main_entity', $entityWbfsysMessageLog);

      }
      else
      {
        $entityWbfsysMessageLog   = new WbfsysMessageLog_Entity() ;
        $this->register( 'entityWbfsysMessageLog', $entityWbfsysMessageLog );
        $this->register( 'main_entity', $entityWbfsysMessageLog);
      }

    }
    elseif( $objid && $objid != $entityWbfsysMessageLog->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysMessageLog = $orm->get( 'WbfsysMessageLog', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmessagelog with this id '.$objid,
            'wbfsys.message_log.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysMessageLog', $entityWbfsysMessageLog);
      $this->register( 'main_entity', $entityWbfsysMessageLog);
    }

    return $entityWbfsysMessageLog;

  }//end public function getEntityWbfsysMessageLog */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMessageLog_Entity $entity
  */
  public function setEntityWbfsysMessageLog( $entity )
  {

    $this->register( 'entityWbfsysMessageLog', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysMessageLog */

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

    $data['wbfsys_message_log']  = $this->getEntityWbfsysMessageLog();


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
    if( $data['wbfsys_message_log']->m_role_create )
    {
      $valWbfsysRoleUser = $orm->getField
      (
        'WbfsysRoleUser',
        'rowid = '.$data['wbfsys_message_log']->m_role_create,
        'name'
      );
      $tabData['wbfsys_role_user_name'] = $valWbfsysRoleUser;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_role_user_name'] = '';
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




      if( !$fieldsWbfsysMessageLog = $this->getRegisterd( 'search_fields_wbfsys_message_log' ) )
      {
         $fieldsWbfsysMessageLog   = $orm->getSearchCols( 'WbfsysMessageLog' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_message_log' ) )
      {
        $fieldsWbfsysMessageLog = array_unique( array_merge
        (
          $fieldsWbfsysMessageLog,
          $refs
        ));
      }

      $filterWbfsysMessageLog     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysMessageLog', $fieldsWbfsysMessageLog ),
        $orm->getErrorMessages( 'WbfsysMessageLog'  ),
        'search_wbfsys_message_log'
      );
      $condition['wbfsys_message_log'] = $filterWbfsysMessageLog->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_message_log', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_message_log']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_message_log', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_message_log']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_message_log', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_message_log']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_message_log', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_message_log']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_message_log', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_message_log']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_message_log}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_message_log']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_message_log', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_message_log']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_message_log', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_message_log']['m_uuid'] = $mUuid;


      $adjustment = $httpRequest->param( 'order-wbfsys_message_log', Validator::CNAME, 'm_time_created' );
      if( $adjustment )
        $params->order['wbfsys_message_log-m_time_created'] = ('asc' == $adjustment?'asc':'desc');

      else
        $params->order['wbfsys_message_log-m_time_created'] = 'desc';





    $query = $db->newQuery( 'WbfsysMessageLog_Table' );
    $query->extendedConditions = $extendedConditions;



		if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysMessageLog_Table_'.SParserString::subToCamelCase( $dynFilter )
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

      $excludeCond = ' wbfsys_message_log.rowid NOT IN '
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


    //entity wbfsys_message_log
    if( !$entityWbfsysMessageLog = $this->getRegisterd( 'entityWbfsysMessageLog' ) )
    {
      $entityWbfsysMessageLog   = new WbfsysMessageLog_Entity() ;
    }

    $formWbfsysMessageLog    = $view->newForm( 'WbfsysMessageLog' );
    $formWbfsysMessageLog->setNamespace( 'WbfsysMessageLog' );
    $formWbfsysMessageLog->setPrefix( 'WbfsysMessageLog' );
    $formWbfsysMessageLog->createSearchForm
    (
      $entityWbfsysMessageLog,
      ( isset($searchFields['wbfsys_message_log'])?$searchFields['wbfsys_message_log']:array() )
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
      'wbfsys_message_log' => array
      (
        'title',
      ),

    );

  }//end public function getSearchFields */

////////////////////////////////////////////////////////////////////////////////
// data provides
////////////////////////////////////////////////////////////////////////////////
    
}//end class WbfsysMessageLog_Table_Model

