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
class WbfsysProtocolUsage_Table_Model
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
  * @return WbfsysProtocolUsage_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysProtocolUsage( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysProtocolUsage_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysProtocolUsage( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysProtocolUsage_Entity
  */
  public function getEntityWbfsysProtocolUsage( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysProtocolUsage = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysProtocolUsage = $this->getRegisterd( 'entityWbfsysProtocolUsage' );

    //entity wbfsys_protocol_usage
    if( !$entityWbfsysProtocolUsage )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysProtocolUsage = $orm->get( 'WbfsysProtocolUsage', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysprotocolusage with this id '.$objid,
              'wbfsys.protocol_usage.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysProtocolUsage', $entityWbfsysProtocolUsage );
        $this->register( 'main_entity', $entityWbfsysProtocolUsage);

      }
      else
      {
        $entityWbfsysProtocolUsage   = new WbfsysProtocolUsage_Entity() ;
        $this->register( 'entityWbfsysProtocolUsage', $entityWbfsysProtocolUsage );
        $this->register( 'main_entity', $entityWbfsysProtocolUsage);
      }

    }
    elseif( $objid && $objid != $entityWbfsysProtocolUsage->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysProtocolUsage = $orm->get( 'WbfsysProtocolUsage', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysprotocolusage with this id '.$objid,
            'wbfsys.protocol_usage.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysProtocolUsage', $entityWbfsysProtocolUsage);
      $this->register( 'main_entity', $entityWbfsysProtocolUsage);
    }

    return $entityWbfsysProtocolUsage;

  }//end public function getEntityWbfsysProtocolUsage */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysProtocolUsage_Entity $entity
  */
  public function setEntityWbfsysProtocolUsage( $entity )
  {

    $this->register( 'entityWbfsysProtocolUsage', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysProtocolUsage */

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

    $data['wbfsys_protocol_usage']  = $this->getEntityWbfsysProtocolUsage();


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
    if( $data['wbfsys_protocol_usage']->m_role_create )
    {
      $valWbfsysRoleUser = $orm->getField
      (
        'WbfsysRoleUser',
        'rowid = '.$data['wbfsys_protocol_usage']->m_role_create,
        'name'
      );
      $tabData['wbfsys_role_user_name'] = $valWbfsysRoleUser;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_role_user_name'] = '';
    }

    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_protocol_usage']->id_browser )
    {
      $valWbfsysBrowser = $orm->getField
      (
        'WbfsysBrowser',
        'rowid = '.$data['wbfsys_protocol_usage']->id_browser,
        'name'
      );
      $tabData['wbfsys_browser_name'] = $valWbfsysBrowser;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_browser_name'] = '';
    }

    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_protocol_usage']->id_os )
    {
      $valWbfsysOs = $orm->getField
      (
        'WbfsysOs',
        'rowid = '.$data['wbfsys_protocol_usage']->id_os,
        'name'
      );
      $tabData['wbfsys_os_name'] = $valWbfsysOs;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_os_name'] = '';
    }

    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_protocol_usage']->id_main_language )
    {
      $valWbfsysLanguage = $orm->getField
      (
        'WbfsysLanguage',
        'rowid = '.$data['wbfsys_protocol_usage']->id_main_language,
        'name'
      );
      $tabData['wbfsys_language_name'] = $valWbfsysLanguage;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_language_name'] = '';
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




      if( !$fieldsWbfsysProtocolUsage = $this->getRegisterd( 'search_fields_wbfsys_protocol_usage' ) )
      {
         $fieldsWbfsysProtocolUsage   = $orm->getSearchCols( 'WbfsysProtocolUsage' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_protocol_usage' ) )
      {
        $fieldsWbfsysProtocolUsage = array_unique( array_merge
        (
          $fieldsWbfsysProtocolUsage,
          $refs
        ));
      }

      $filterWbfsysProtocolUsage     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysProtocolUsage', $fieldsWbfsysProtocolUsage ),
        $orm->getErrorMessages( 'WbfsysProtocolUsage'  ),
        'search_wbfsys_protocol_usage'
      );
      $condition['wbfsys_protocol_usage'] = $filterWbfsysProtocolUsage->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_protocol_usage', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_protocol_usage']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_protocol_usage', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_protocol_usage']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_protocol_usage', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_protocol_usage']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_protocol_usage', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_protocol_usage']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_protocol_usage', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_protocol_usage']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_protocol_usage}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_protocol_usage']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_protocol_usage', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_protocol_usage']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_protocol_usage', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_protocol_usage']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysProtocolUsage_Table' );
    $query->extendedConditions = $extendedConditions;


    if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysProtocolUsage_Table_'.SParserString::subToCamelCase( $dynFilter )
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

      $excludeCond = ' wbfsys_protocol_usage.rowid NOT IN '
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


    //entity wbfsys_protocol_usage
    if( !$entityWbfsysProtocolUsage = $this->getRegisterd( 'entityWbfsysProtocolUsage' ) )
    {
      $entityWbfsysProtocolUsage   = new WbfsysProtocolUsage_Entity() ;
    }

    $formWbfsysProtocolUsage    = $view->newForm( 'WbfsysProtocolUsage' );
    $formWbfsysProtocolUsage->setNamespace( 'WbfsysProtocolUsage' );
    $formWbfsysProtocolUsage->setPrefix( 'WbfsysProtocolUsage' );
    $formWbfsysProtocolUsage->createSearchForm
    (
      $entityWbfsysProtocolUsage,
      ( isset($searchFields['wbfsys_protocol_usage'])?$searchFields['wbfsys_protocol_usage']:array() )
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

    );

  }//end public function getSearchFields */

////////////////////////////////////////////////////////////////////////////////
// data provides
////////////////////////////////////////////////////////////////////////////////
    
}//end class WbfsysProtocolUsage_Table_Model

