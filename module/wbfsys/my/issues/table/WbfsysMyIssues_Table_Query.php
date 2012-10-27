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
class WbfsysMyIssues_Table_Query
  extends LibSqlQuery
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * Alle Ids der gefundenen Datensätze auslesen
  * @return array<int>
  */
  public function getIds()
  {

    if( !is_null( $this->ids ) )
      return $this->ids;
  
    $this->ids = array();

    if( is_null( $this->data ) )
      $this->load();
    
    foreach( $this->data as $row )
    {
      $this->ids[] = $row['wbfsys_my_issues_rowid'];
    }

    return $this->ids;
  
  }//end public function getIds */
    
////////////////////////////////////////////////////////////////////////////////
// Query Elements Table
////////////////////////////////////////////////////////////////////////////////
    
 /**
   * Vollständige Datenbankabfrage mit allen Filtern und Formatierungsanweisungen
   * ACLs werden nicht beachtet
   *
   * @param string/array $condition conditions for the query
   * @param TFlag $params
   *
   * @return void wird im bei Fehlern exceptions, ansonsten war alles ok
   *
   * @throws LibDb_Exception bei technischen Problemen wie zB. keine Verbindung
   *   zum Datenbank server, aber auch fehlerhafte sql queries
   */
  public function fetch( $condition = null, $params = null )
  {

    if( !$params )
      $params = new TFlag();

    $this->sourceSize  = null;
    $db                = $this->getDb();

    if( !$this->criteria )
    {
      $criteria = $db->orm->newCriteria();
    }
    else
    {
      $criteria = $this->criteria;
    }

    if( !$criteria->cols )
    {
      $this->setCols( $criteria );
    }
    
    if( $this->extendedConditions )
    {
      $this->renderExtendedConditions( $criteria, $this->extendedConditions );
    }

    $this->setTables( $criteria );
    $this->appendConditions( $criteria, $condition, $params  );
    $this->checkLimitAndOrder( $criteria, $params );
    $this->appendFilter( $criteria, $condition, $params );

    // Run Query und save the result
    $this->result    = $db->orm->select( $criteria );

    if( $params->loadFullSize )
      $this->calcQuery = $criteria->count( 'count(DISTINCT wbfsys_issue.'.Db::PK.' ) as '.Db::Q_SIZE );

  }//end public function fetch */

 /**
   * Nur die Datensätz laden die im Key übergeben werden
   * 
   * Es werden keine Filter oder Acls, limits, offset oder sortierung beachtet!
   *
   *
   * @param array<int rowid:int access level> $inKeys
   * @param int   $sourceSize setzen der Source Size, muss hier von ausen übergeben werden
   * @param TFlag $params benamte parameter
   *
   * @return void keine Rückgabe, im Fehlerfall wird eine Exception geworfen
   *
   * @throws LibDb_Exception
   *  wenn bei der Abfragen technische Problemen auftreten, zb server nicht
   *  ereichbar, invalides sql... etc.
   */
  public function fetchInAcls( array $inKeys, $params = null )
  {

    if( !$params )
      $params = new TFlag();

    $db                = $this->getDb();
    
    // wenn keine keys vorhanden sind wird ein leeres result objekt gesetzt
    if( !$inKeys )
    {
      $this->result = $db->getEmptyResult();
      return;
    }
    
    $criteria          = $db->orm->newCriteria();

    $this->setCols( $criteria );
    $this->setTables( $criteria );
    $this->injectOrder( $criteria, $params );

    $criteria->where
    (
      " wbfsys_issue.rowid  IN( ". implode( ', ', array_keys($inKeys) ) ." )"
    );

    // Run Query und save the result
    $result    = $db->orm->select( $criteria );
    
    $this->data = array();
    
    foreach( $result as $row )
    {
      $row['acl-level'] = $inKeys[$row['wbfsys_my_issues_rowid']];
      $this->data[]     = $row;
    }

  }//end public function fetchInAcls */

 /**
   * Vollständige Datenbankabfrage mit allen Filtern und Formatierungsanweisungen
   * ACLs werden beachtet
   *
   * @param string/array $condition conditions for the query
   * @param TFlag $params
   *
   * @return void wird im bei Fehlern exceptions, ansonsten war alles ok
   *
   * @throws LibDb_Exception bei technischen Problemen wie zB. keine Verbindung
   *   zum Datenbank server, aber auch fehlerhafte sql queries
   */
  public function fetchWithAcls( $condition = null, $params = null )
  {

    if(!$params)
      $params = new TFlag();

    $db  = $this->getDb();
    $acl = $this->getAcl();

    $this->sourceSize  = null;

    if( !$this->criteria )
    {
      $criteria = $db->orm->newCriteria();
    }
    else
    {
      $criteria = $this->criteria;
    }

    if( !$criteria->cols )
    {
      $this->setCols( $criteria );
    }
     
    if( $this->extendedConditions )
    {
      $this->renderExtendedConditions( $criteria, $this->extendedConditions );
    }   

    $this->setTables( $criteria );
    $this->appendConditions( $criteria, $condition, $params  );
    $this->checkLimitAndOrder( $criteria, $params );
    $this->appendFilter( $criteria, $condition, $params );

    if( !$params->access->defLevel && $params->access->isPartAssign )
    {
      $acl->injectListingAcls( $criteria, 'mod-wbfsys/mgmt-wbfsys_issue>mgmt-wbfsys_my_issues' );
    }
    else
    {
      $acl->injectListingAcls( $criteria, 'mod-wbfsys/mgmt-wbfsys_issue>mgmt-wbfsys_my_issues', true, $params->access->level  );
    }

    // Run Query und save the result
    $this->result    = $db->orm->select( $criteria );

    if($params->loadFullSize)
    {
      $this->calcQuery = $criteria->count( 'count(DISTINCT wbfsys_issue.'.Db::PK.') as '.Db::Q_SIZE );
    }

  }//end public function fetchWithAcls */

 /**
   * Injecten der zu ladenden Columns in die SQL Query
   * Wenn bereits Colums vorhanden waren werden diese komplett 
   * überschrieben 
   * Wenn Columns ergänzt werden sollen, dann können diese mit
   * $criteria->selectAlso( 'additional.column' );
   * übergeben werden
   *
   * @param LibSqlCriteria $criteria
   *
   * @return void
   */
  public function setCols( $criteria )
  {

    $cols = array
    (
      'DISTINCT wbfsys_issue.rowid as "wbfsys_my_issues_rowid"', // variant: def-rowid 
      'wbfsys_issue.title as "wbfsys_my_issues_title"', // variant: def-by-context 
      'wbfsys_issue_type.name as "wbfsys_issue_type_name"', // variant: def-by-context  used source field wbfsys_issue_type
      'wbfsys_issue.id_type as "wbfsys_my_issues_id_type"', // ref wbfsys_my_issues def-by-context 
      'wbfsys_category.name as "wbfsys_category_name"', // variant: def-by-context  used source field wbfsys_category
      'wbfsys_issue.id_category as "wbfsys_my_issues_id_category"', // ref wbfsys_my_issues def-by-context 
      'wbfsys_process_node.label as "wbfsys_process_node_label"', // variant: def-by-context  used source field wbfsys_process_node
      'wbfsys_issue.id_status as "wbfsys_my_issues_id_status"', // ref wbfsys_my_issues def-by-context 
      'wbfsys_process_node.icon as "wbfsys_process_node_icon"', // process node icon hinzugefügt
      'wbfsys_process_node.label as "wbfsys_process_node_label"', // process node label hinzugefügt
      'wbfsys_issue_severity.name as "wbfsys_issue_severity_name"', // variant: def-by-context  used source field wbfsys_issue_severity
      'wbfsys_issue.id_severity as "wbfsys_my_issues_id_severity"', // ref wbfsys_my_issues def-by-context 
      'wbfsys_os.name as "wbfsys_os_name"', // variant: def-by-context  used source field wbfsys_os
      'wbfsys_issue.id_os as "wbfsys_my_issues_id_os"', // ref wbfsys_my_issues def-by-context 
      'wbfsys_priority.name as "wbfsys_priority_name"', // variant: def-by-context  used source field wbfsys_priority
      'wbfsys_issue.id_priority as "wbfsys_my_issues_id_priority"', // ref wbfsys_my_issues def-by-context 
      'wbfsys_browser.name as "wbfsys_browser_name"', // variant: def-by-context  used source field wbfsys_browser
      'wbfsys_issue.id_browser as "wbfsys_my_issues_id_browser"', // ref wbfsys_my_issues def-by-context 
      'wbfsys_issue.progress as "wbfsys_my_issues_progress"', // variant: def-by-context 
    );

    $criteria->select( $cols );

  }//end public function setCols */

  /**
   * Injecten der Zieltabelle, sowie 
   * aller nötigen Joins zum laden der Daten
   *
   * Es werden jedoch nicht sofort alle möglichen Joins injiziert
   * Die Filter Methode hängt selbständig optionale Joins an, wenn
   * diese nicht schon geladen wurden jedoch zum filtern der Daten
   * benötigt werden
   *
   * @param LibSqlCriteria $criteria
   *
   * @return void
   */
  public function setTables( $criteria   )
  {

    $criteria->from( 'wbfsys_issue' );

    $criteria->leftJoinOn
    (
      'wbfsys_issue',
      'id_type',
      'wbfsys_issue_type',
      'rowid',
      null,
      'wbfsys_issue_type'
    );// wbfsys_issue_type  by alias wbfsys_issue_type

    $criteria->leftJoinOn
    (
      'wbfsys_issue',
      'id_category',
      'wbfsys_category',
      'rowid',
      null,
      'wbfsys_category'
    );// wbfsys_category  by alias wbfsys_category

    $criteria->leftJoinOn
    (
      'wbfsys_issue',
      'id_status',
      'wbfsys_process_node',
      'rowid',
      null,
      'wbfsys_process_node'
    );// wbfsys_process_node  by alias wbfsys_process_node

    $criteria->leftJoinOn
    (
      'wbfsys_issue',
      'id_severity',
      'wbfsys_issue_severity',
      'rowid',
      null,
      'wbfsys_issue_severity'
    );// wbfsys_issue_severity  by alias wbfsys_issue_severity

    $criteria->leftJoinOn
    (
      'wbfsys_issue',
      'id_os',
      'wbfsys_os',
      'rowid',
      null,
      'wbfsys_os'
    );// wbfsys_os  by alias wbfsys_os

    $criteria->leftJoinOn
    (
      'wbfsys_issue',
      'id_priority',
      'wbfsys_priority',
      'rowid',
      null,
      'wbfsys_priority'
    );// wbfsys_priority  by alias wbfsys_priority

    $criteria->leftJoinOn
    (
      'wbfsys_issue',
      'id_browser',
      'wbfsys_browser',
      'rowid',
      null,
      'wbfsys_browser'
    );// wbfsys_browser  by alias wbfsys_browser



  }//end public function setTables */

 /**
   * Leider gibt num_cols nur die Anzahl der tatsächlich gefundenen 
   * Datensätze zurück. Wenn Limit in der Query verwendet 
   * bringt diese Zahl dann nichtsmehr, wenn man eigentlich wissen 
   * möchte wieviele denn ohne limit gefunden worden wären.
   * 
   * Setzen der query mit der die anzahl der gefundenen datensätze ohne
   * limit ermittelt wird
   *
   * @param LibSqlCriteria $criteria
   * @param TFlag $params
   * @return void
   */
  public function setCalcQuery( $criteria, $params )
  {

    if( $params->loadFullSize )
      $this->calcQuery = $criteria->count( 'count(DISTINCT wbfsys_issue.'.Db::PK.') as '.Db::Q_SIZE );

  }//end public function setCalcQuery */

  /**
   * Loading the tabledata from the database
   *
   * @param LibSqlCriteria $criteria
   * @param array $condition the conditions
   * @param TFlag $params
   * @return void
   */
  public function appendConditions( $criteria, $condition, $params )
  {


    // append codition if the query has a default filter
    if( $this->condition )
    {

      if( is_string( $this->condition ) )
      {

        if( ctype_digit( $this->condition ) )
        {
          $criteria->where( 'wbfsys_issue.rowid = '.$this->condition );
        }
        else
        {
          $criteria->where( $this->condition );
        }

      }
      else if( is_array( $this->condition ) )
      {
        $this->checkConditions( $criteria, $this->condition  );
      }
      
    }

    if( $condition )
    {

      if( is_string( $condition) )
      {
        if( ctype_digit( $condition ) )
        {
          $criteria->where( 'wbfsys_issue.rowid = '.$condition );
        }
        else
        {
          $criteria->where( $condition );
        }
      }
      else if( is_array( $condition ) )
      {
        $this->checkConditions( $criteria, $condition  );
      }
    }



    if( $params->begin )
    {
      $this->checkCharBegin( $criteria, $params );
    }

  }//end public function appendConditions */

 /**
   * Loading the tabledata from the database
   * @param LibSqlCriteria $criteria
   * @param array $condition the conditions
   *
   * @return void
   */
  public function checkConditions( $criteria, array $condition )
  {


      if( isset($condition['free']) && trim( $condition['free'] ) != ''  )
      {

         // muss ein int sein, und darf nicht größer 
         // als 9223372036854775807 sein
         if
         ( 
            ctype_digit( $condition['free'] ) 
              && strlen( $condition['free'] ) <= 20 
         )
         {

            $part = $condition['free'];

            $criteria->where
            (
              '(
 wbfsys_issue.rowid = \''.$part.'\'  or 
                wbfsys_issue.title = \''.$part.'\' 
              )'
            );
         }
        else
        {

          // prüfen ob mehrere suchbegriffe kommagetrennt übergeben wurden
          if( strpos( $condition['free'], ',' ) )
          {

            $parts = explode( ',', $condition['free'] );

            foreach( $parts as $part )
            {

              $part = trim( $part );

              // prüfen, dass der string nicht leer ist
              if( '' == trim( $part ) )
                continue;

              $criteria->where
              ('(

                UPPER(wbfsys_issue.title) like UPPER(\'%'.$part.'%\')
              )');

           }

         }
         else
         {
           $part = $condition['free'];

           $criteria->where
           ('(

                UPPER(wbfsys_issue.title) like UPPER(\'%'.$part.'%\')
           )');

         }

      }

      }//end if

      // search conditions for  wbfsys_my_issues
      if( isset( $condition['wbfsys_my_issues'] ) )
      {
        $whereCond = $condition['wbfsys_my_issues'];

        if( isset( $whereCond['title']) && trim( $whereCond['title'] ) != ''  )
          $criteria->where( ' wbfsys_issue.title = \''.$whereCond['title'].'\' ');

        if( isset($whereCond['id_type']) && count( $whereCond['id_type'] ) )
          $criteria->where( " wbfsys_issue.id_type IN( '".implode("','",$whereCond['id_type'])."' ) " );

        if( isset($whereCond['id_category']) && count( $whereCond['id_category'] ) )
          $criteria->where( " wbfsys_issue.id_category IN( '".implode("','",$whereCond['id_category'])."' ) " );

        if( isset($whereCond['id_severity']) && count( $whereCond['id_severity'] ) )
          $criteria->where( " wbfsys_issue.id_severity IN( '".implode("','",$whereCond['id_severity'])."' ) " );

        if( isset($whereCond['id_os']) && count( $whereCond['id_os'] ) )
          $criteria->where( " wbfsys_issue.id_os IN( '".implode("','",$whereCond['id_os'])."' ) " );

        if( isset($whereCond['id_priority']) && count( $whereCond['id_priority'] ) )
          $criteria->where( " wbfsys_issue.id_priority IN( '".implode("','",$whereCond['id_priority'])."' ) " );

        if( isset($whereCond['id_browser']) && count( $whereCond['id_browser'] ) )
          $criteria->where( " wbfsys_issue.id_browser IN( '".implode("','",$whereCond['id_browser'])."' ) " );

        // append meta information
        if( isset($whereCond['m_role_create']) && trim($whereCond['m_role_create']) != ''  )
          $criteria->where( ' wbfsys_issue.m_role_create = '.$whereCond['m_role_create'].' ');

        if( isset($whereCond['m_role_change']) && trim($whereCond['m_role_change']) != ''  )
          $criteria->where( ' wbfsys_issue.m_role_change = '.$whereCond['m_role_change'].' ');

        if( isset($whereCond['m_time_created_before']) && trim($whereCond['m_time_created_before']) != ''  )
          $criteria->where( ' wbfsys_issue.m_time_created <= \''.$whereCond['m_time_created_before'].'\' ');

        if( isset($whereCond['m_time_created_after']) && trim($whereCond['m_time_created_after']) != ''  )
          $criteria->where( ' wbfsys_issue.m_time_created >= \''.$whereCond['m_time_created_after'].'\' ');

        if( isset($whereCond['m_time_changed_before']) && trim($whereCond['m_time_changed_before']) != ''  )
          $criteria->where( ' wbfsys_issue.m_time_changed <= \''.$whereCond['m_time_changed_before'].'\' ');

        if( isset($whereCond['m_time_changed_after']) && trim($whereCond['m_time_changed_after']) != ''  )
          $criteria->where( ' wbfsys_issue.m_time_changed >= \''.$whereCond['m_time_changed_after'].'\' ');

        if( isset($whereCond['m_rowid']) && trim($whereCond['m_rowid']) != ''  )
          $criteria->where( ' wbfsys_issue.rowid >= \''.$whereCond['m_rowid'].'\' ');

        if( isset($whereCond['m_uuid']) && trim($whereCond['m_uuid']) != ''  )
          $criteria->where( ' wbfsys_issue.m_uuid >= \''.$whereCond['m_uuid'].'\' ');

      }//end if( isset ($condition['wbfsys_my_issues']) )


  }//end public function checkConditions */

  /**
   * Loading the tabledata from the database
   *
   * @param LibSqlCriteria $criteria
   * @param TFlag $params
   *
   * @return void
   */
  public function checkCharBegin( $criteria, $params )
  {

      // filter for a beginning char
      if( $params->begin )
      {

        if( '?' == $params->begin  )
        {
          $criteria->where( "wbfsys_issue.title ~* '^[^a-zA-Z]'" );
        }
        else
        {
          $criteria->where( "upper(substr(wbfsys_issue.title,1,1)) = '".strtoupper($params->begin)."'" );
        }

      }


  }//end public function checkCharBegin */

  /**
   * Limit, Offset und Order By daten in die Query injizieren
   *
   * @param LibSqlCriteria $criteria
   * @param TFlag $params
   *
   * @return void
   */
  public function checkLimitAndOrder( $criteria, $params  )
  {


    // check if there is a given order
    if( $params->order )
    {
      $criteria->orderBy( $params->order );

    }
    else // if not use the default
    {
      $criteria->orderBy( 'wbfsys_issue.rowid' );

    }

    // Check the offset
    if( $params->start )
    {
      if( $params->start < 0 )
        $params->start = 0;
    }
    else
    {
      $params->start = null;
    }
    $criteria->offset( $params->start );

    // Check the limit
    if( -1 == $params->qsize )
    {
      // no limit if -1
      $params->qsize = null;
    }
    else if( $params->qsize )
    {
      // limit must not be bigger than max, for no limit use -1
      if( $params->qsize > Wgt::$maxListSize )
        $params->qsize = Wgt::$maxListSize;
    }
    else
    {
      // if limit 0 or null use the default limit
      $params->qsize = Wgt::$defListSize;
    }

    $criteria->limit( $params->qsize );


  }//end public function checkLimitAndOrder */

  /**
   * Nur die sortierung in die Query injizieren
   *
   * @param LibSqlCriteria $criteria
   * @param $params
   *
   * @return void
   */
  public function injectOrder( $criteria, $params  )
  {


    // check if there is a given order
    if( $params->order )
    {
      $criteria->orderBy( $params->order );
    }
    else // if not use the default
    {


      $criteria->orderBy( 'wbfsys_issue.title' );
      $criteria->selectAlso( 'wbfsys_issue.title as "wbfsys_issue-title-order"' );




    }


  }//end public function injectOrder */

  /**
   * Nur die sortierung in die Query injizieren
   *
   * @param LibSqlCriteria $criteria
   * @param LibSqlCriteria $envelop
   * @param $params
   *
   * @return void
   */
  public function injectAclOrder( $criteria, $envelop, $params  )
  {


    // check if there is a given order
    if( $params->order )
    {
      $criteria->orderBy( $params->order );



    }
    else // if not use the default
    {


      $criteria->orderBy( 'wbfsys_issue.title' );
      $criteria->selectAlso( 'wbfsys_issue.title as "wbfsys_issue-title-order"' );
      
      $envelop->groupBy( 'inner_acl."wbfsys_issue-title-order"' );
      $envelop->selectAlso( 'inner_acl."wbfsys_issue-title-order"' );
      $envelop->orderBy( 'inner_acl."wbfsys_issue-title-order"' );




    }


  }//end public function injectAclOrder */

  /**
   * Limit, Offset und Order By daten in die Query injizieren
   *
   * @param LibSqlCriteria $criteria
   * @param TFlag $params
   *
   * @return void
   */
  public function injectLimit( $criteria, $params  )
  {

    // Check the offset
    if( $params->start )
    {
      if( $params->start < 0 )
        $params->start = 0;
    }
    else
    {
      $params->start = null;
    }
    $criteria->offset( $params->start );

    // Check the limit
    if( -1 == $params->qsize )
    {
      // no limit if -1
      $params->qsize = null;
    }
    else if( $params->qsize )
    {
      // limit must not be bigger than max, for no limit use -1
      if( $params->qsize > Wgt::$maxListSize )
        $params->qsize = Wgt::$maxListSize;
    }
    else
    {
      // if limit 0 or null use the default limit
      $params->qsize = Wgt::$defListSize;
    }

    $criteria->limit( $params->qsize );

  }//end public function injectLimit */

  /**
   * Mit dieser Methode werden alle Filter, zB. aus einem Suchformular
   * bearbeitet und in die Query eingebaut
   *
   * Es werden nur Parameter verwendet die in der Logik definiert wurden
   * Weitere Parameter werden einfach ignoriert, so dass der Anwender
   * nicht einfach neue Filter hinzufügen kann
   *
   * @param LibSqlCriteria $criteria
   * @param $params
   *
   * @return void
   */
  public function appendFilter( $criteria, $condition, $params  )
  {
    
    // laden der potentiell nötigen resource objekte
    $db    = $this->getDb();
    $user  = $this->getUser();
    $acl   = $this->getAcl();






  }//end public function appendFilter */

}//end class WbfsysMyIssues_Table_Query

