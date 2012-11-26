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
class WbfsysMyIssues_Table_Model
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
  * @return WbfsysIssue_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysMyIssues( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysIssue_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysMyIssues( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysIssue_Entity
  */
  public function getEntityWbfsysMyIssues( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysMyIssues = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysMyIssues = $this->getRegisterd( 'entityWbfsysMyIssues' );

    //entity wbfsys_issue
    if( !$entityWbfsysMyIssues )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysMyIssues = $orm->get( 'WbfsysIssue', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysissue with this id '.$objid,
              'wbfsys.my_issues.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysMyIssues', $entityWbfsysMyIssues );
        $this->register( 'main_entity', $entityWbfsysMyIssues);

      }
      else
      {
        $entityWbfsysMyIssues   = new WbfsysIssue_Entity() ;
        $this->register( 'entityWbfsysMyIssues', $entityWbfsysMyIssues );
        $this->register( 'main_entity', $entityWbfsysMyIssues);
      }

    }
    elseif( $objid && $objid != $entityWbfsysMyIssues->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysMyIssues = $orm->get( 'WbfsysIssue', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysissue with this id '.$objid,
            'wbfsys.my_issues.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysMyIssues', $entityWbfsysMyIssues);
      $this->register( 'main_entity', $entityWbfsysMyIssues);
    }

    return $entityWbfsysMyIssues;

  }//end public function getEntityWbfsysMyIssues */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysIssue_Entity $entity
  */
  public function setEntityWbfsysMyIssues( $entity )
  {

    $this->register( 'entityWbfsysMyIssues', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysMyIssues */

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

    $data['wbfsys_my_issues']  = $this->getEntityWbfsysMyIssues();


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
    if( $data['wbfsys_my_issues']->id_type )
    {
      $valWbfsysIssueType = $orm->getField
      (
        'WbfsysIssueType',
        'rowid = '.$data['wbfsys_my_issues']->id_type,
        'name'
      );
      $tabData['wbfsys_issue_type_name'] = $valWbfsysIssueType;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_issue_type_name'] = '';
    }

    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_my_issues']->id_category )
    {
      $valWbfsysCategory = $orm->getField
      (
        'WbfsysCategory',
        'rowid = '.$data['wbfsys_my_issues']->id_category,
        'name'
      );
      $tabData['wbfsys_category_name'] = $valWbfsysCategory;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_category_name'] = '';
    }

    // if we have a value, try to load the display field (codeTableRefFields 3)
    if( $data['wbfsys_my_issues']->id_status )
    {
      $entityWbfsysProcessNode = $orm->get( 'WbfsysProcessNode', 'rowid = '.$data['wbfsys_my_issues']->id_status );
      $tabData['wbfsys_process_node_label'] = $entityWbfsysProcessNode->label;
      $tabData['wbfsys_process_node_icon']           = $entityWbfsysProcessNode->icon;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_process_node_label'] = '';
      $tabData['wbfsys_process_node_icon']           = '';
    }

    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_my_issues']->id_severity )
    {
      $valWbfsysIssueSeverity = $orm->getField
      (
        'WbfsysIssueSeverity',
        'rowid = '.$data['wbfsys_my_issues']->id_severity,
        'name'
      );
      $tabData['wbfsys_issue_severity_name'] = $valWbfsysIssueSeverity;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_issue_severity_name'] = '';
    }

    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_my_issues']->id_os )
    {
      $valWbfsysOs = $orm->getField
      (
        'WbfsysOs',
        'rowid = '.$data['wbfsys_my_issues']->id_os,
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
    if( $data['wbfsys_my_issues']->id_priority )
    {
      $valWbfsysPriority = $orm->getField
      (
        'WbfsysPriority',
        'rowid = '.$data['wbfsys_my_issues']->id_priority,
        'name'
      );
      $tabData['wbfsys_priority_name'] = $valWbfsysPriority;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_priority_name'] = '';
    }

    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_my_issues']->id_browser )
    {
      $valWbfsysBrowser = $orm->getField
      (
        'WbfsysBrowser',
        'rowid = '.$data['wbfsys_my_issues']->id_browser,
        'name'
      );
      $tabData['wbfsys_browser_name'] = $valWbfsysBrowser;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_browser_name'] = '';
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




      if( !$fieldsWbfsysMyIssues = $this->getRegisterd( 'search_fields_wbfsys_my_issues' ) )
      {
         $fieldsWbfsysMyIssues   = $orm->getSearchCols( 'WbfsysIssue' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_my_issues' ) )
      {
        $fieldsWbfsysMyIssues = array_unique( array_merge
        (
          $fieldsWbfsysMyIssues,
          $refs
        ));
      }

      $filterWbfsysMyIssues     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysIssue', $fieldsWbfsysMyIssues ),
        $orm->getErrorMessages( 'WbfsysIssue'  ),
        'search_wbfsys_my_issues'
      );
      $condition['wbfsys_my_issues'] = $filterWbfsysMyIssues->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_my_issues', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_my_issues']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_my_issues', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_my_issues']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_my_issues', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_my_issues']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_my_issues', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_my_issues']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_my_issues', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_my_issues']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_my_issues}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_my_issues']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_my_issues', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_my_issues']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_my_issues', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_my_issues']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysMyIssues_Table' );
    $query->extendedConditions = $extendedConditions;



		if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysMyIssues_Table_'.SParserString::subToCamelCase( $dynFilter )
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

      $excludeCond = ' wbfsys_issue.rowid NOT IN '
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


    //entity wbfsys_issue
    if( !$entityWbfsysMyIssues = $this->getRegisterd( 'entityWbfsysMyIssues' ) )
    {
      $entityWbfsysMyIssues   = new WbfsysIssue_Entity() ;
    }

    $formWbfsysMyIssues    = $view->newForm( 'WbfsysIssue' );
    $formWbfsysMyIssues->setNamespace( 'WbfsysMyIssues' );
    $formWbfsysMyIssues->setPrefix( 'WbfsysMyIssues' );
    $formWbfsysMyIssues->createSearchForm
    (
      $entityWbfsysMyIssues,
      ( isset($searchFields['wbfsys_my_issues'])?$searchFields['wbfsys_my_issues']:array() )
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
      'wbfsys_my_issues' => array
      (
        'title',
        'id_type',
        'id_category',
        'id_severity',
        'id_os',
        'id_priority',
        'id_browser',
      ),

    );

  }//end public function getSearchFields */

}//end class WbfsysMyIssues_Table_Model

