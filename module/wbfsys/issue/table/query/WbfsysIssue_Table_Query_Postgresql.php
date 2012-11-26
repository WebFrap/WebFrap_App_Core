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
class WbfsysIssue_Table_Query_Postgresql
  extends LibSqlQuery
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
    /**
    * storage variable for the reference  responsible
    * @var array
    */
    protected $rolesResponsible = array();

  /**
  * get the data for a reference node
  * @param int $id
  */
  public function getEmbededRolesResponsible( $id )
  {

    return isset( $this->rolesResponsible[$id] )
      ?$this->rolesResponsible[$id]
      :array();

  }//end public function getEmbededRolesResponsible */

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
      $this->ids[] = $row['wbfsys_issue_rowid'];
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
      $row['acl-level'] = $inKeys[$row['wbfsys_issue_rowid']];
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
      $acl->injectListingAcls( $criteria, 'mod-wbfsys>mgmt-wbfsys_issue' );
    }
    else
    {
      $acl->injectListingAcls( $criteria, 'mod-wbfsys>mgmt-wbfsys_issue', true, $params->access->level  );
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
      'DISTINCT wbfsys_issue.rowid as "wbfsys_issue_rowid"', // variant: def-rowid 
      'wbfsys_issue.title as "wbfsys_issue_title"', // variant: field_mgmt-attr 
      'wbfsys_process_node.bg_color as "wbfsys_process_node_bg_color"', // variant: additional 
      'wbfsys_process_node.text_color as "wbfsys_process_node_text_color"', // variant: additional 
      'wbfsys_process_node.label as "wbfsys_process_node_label"', // variant: field_mgmt-attr  used source field wbfsys_process_node
      'wbfsys_issue.id_status as "wbfsys_issue_id_status"', // ref wbfsys_issue field_mgmt-attr 
      'wbfsys_process_node.icon as "wbfsys_process_node_icon"', // process node icon hinzugefügt
      'wbfsys_process_node.label as "wbfsys_process_node_label"', // process node label hinzugefügt
      'wbfsys_issue_severity.name as "wbfsys_issue_severity_name"', // variant: field_mgmt-attr  used source field wbfsys_issue_severity
      'wbfsys_issue.id_severity as "wbfsys_issue_id_severity"', // ref wbfsys_issue field_mgmt-attr 
      'wbfsys_priority.name as "wbfsys_priority_name"', // variant: field_mgmt-attr  used source field wbfsys_priority
      'wbfsys_issue.id_priority as "wbfsys_issue_id_priority"', // ref wbfsys_issue field_mgmt-attr 
      'wbfsys_issue_type.name as "wbfsys_issue_type_name"', // variant: field_mgmt-attr  used source field wbfsys_issue_type
      'wbfsys_issue.id_type as "wbfsys_issue_id_type"', // ref wbfsys_issue field_mgmt-attr 
      'wbfsys_category.name as "wbfsys_category_name"', // variant: field_mgmt-attr  used source field wbfsys_category
      'wbfsys_issue.id_category as "wbfsys_issue_id_category"', // ref wbfsys_issue field_mgmt-attr 
      'wbfsys_os.name as "wbfsys_os_name"', // variant: field_mgmt-attr  used source field wbfsys_os
      'wbfsys_issue.id_os as "wbfsys_issue_id_os"', // ref wbfsys_issue field_mgmt-attr 
      'wbfsys_browser.name as "wbfsys_browser_name"', // variant: field_mgmt-attr  used source field wbfsys_browser
      'wbfsys_issue.id_browser as "wbfsys_issue_id_browser"', // ref wbfsys_issue field_mgmt-attr 
      'wbfsys_issue.progress as "wbfsys_issue_progress"', // variant: field_mgmt-attr 
      'wbfsys_issue.m_time_created as "wbfsys_issue_m_time_created"', // variant: field_mgmt-attr 
      'wbfsys_issue.finish_till as "wbfsys_issue_finish_till"', // variant: field_mgmt-attr 
      'wbfsys_issue.description as "wbfsys_issue_description"', // variant: field_mgmt-attr 
      'wbfsys_issue.error_message as "wbfsys_issue_error_message"', // variant: field_mgmt-attr 
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

    	
    	// in query wenn ids vorhanden sind
    	if( isset($condition['ids']) && !empty( $condition['ids'] ) )
    	{
				$criteria->where
        (
          'wbfsys_issue.rowid = IN( '. implode( ', ', $condition['ids'] ) .' ) ';
        );
    	}

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
                wbfsys_issue.title = \''.$part.'\'  or 
                wbfsys_issue.id_type = \''.$part.'\'  or 
                wbfsys_issue.id_status = \''.$part.'\'  or 
                wbfsys_issue.id_severity = \''.$part.'\'  or 
                wbfsys_issue.id_category = \''.$part.'\'  or 
                wbfsys_issue.id_priority = \''.$part.'\' 
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

      // search conditions for  wbfsys_issue
      if( isset( $condition['wbfsys_issue'] ) )
      {
        $whereCond = $condition['wbfsys_issue'];

        if( isset( $whereCond['title']) && trim( $whereCond['title'] ) != ''  )
          $criteria->where( ' wbfsys_issue.title = \''.$whereCond['title'].'\' ');

        if( isset($whereCond['id_type']) && count( $whereCond['id_type'] ) )
          $criteria->where( " wbfsys_issue.id_type IN( '".implode("','",$whereCond['id_type'])."' ) " );

        if( isset( $whereCond['id_status'] ) && trim( $whereCond['id_status'] ) != '' )
          $criteria->where( " wbfsys_issue.id_status = '{$whereCond['id_status']}' " );

        if( isset($whereCond['id_severity']) && count( $whereCond['id_severity'] ) )
          $criteria->where( " wbfsys_issue.id_severity IN( '".implode("','",$whereCond['id_severity'])."' ) " );

        if( isset($whereCond['id_category']) && count( $whereCond['id_category'] ) )
          $criteria->where( " wbfsys_issue.id_category IN( '".implode("','",$whereCond['id_category'])."' ) " );

        if( isset($whereCond['id_priority']) && count( $whereCond['id_priority'] ) )
          $criteria->where( " wbfsys_issue.id_priority IN( '".implode("','",$whereCond['id_priority'])."' ) " );

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

      }//end if( isset ($condition['wbfsys_issue']) )


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



     // inject the default order
      $criteria->orderBy( 'wbfsys_issue.id_severity ' );
      $criteria->orderBy( 'wbfsys_issue.id_status ' );


			
      $criteria->selectAlso( 'wbfsys_issue.id_severity as "wbfsys_issue-id_severity-order"' );
			
      $criteria->selectAlso( 'wbfsys_issue.id_status as "wbfsys_issue-id_status-order"' );



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


     // inject the default order
      $criteria->orderBy( 'wbfsys_issue.id_severity ' );
      $criteria->orderBy( 'wbfsys_issue.id_status ' );


			
      $criteria->selectAlso( 'wbfsys_issue.id_severity as "wbfsys_issue-id_severity-order"' );
			
      $criteria->selectAlso( 'wbfsys_issue.id_status as "wbfsys_issue-id_status-order"' );



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


     // inject the default order
      $criteria->orderBy( 'wbfsys_issue.id_severity ' );
      $criteria->orderBy( 'wbfsys_issue.id_status ' );


			
      $criteria->selectAlso( 'wbfsys_issue.id_severity as "wbfsys_issue-id_severity-order"' );
      $envelop->selectAlso( 'inner_acl."wbfsys_issue-id_severity-order"' );
      $envelop->groupBy( 'inner_acl."wbfsys_issue-id_severity-order"' );
      $envelop->orderBy( 'inner_acl."wbfsys_issue-id_severity-order" ' );
			
      $criteria->selectAlso( 'wbfsys_issue.id_status as "wbfsys_issue-id_status-order"' );
      $envelop->selectAlso( 'inner_acl."wbfsys_issue-id_status-order"' );
      $envelop->groupBy( 'inner_acl."wbfsys_issue-id_status-order"' );
      $envelop->orderBy( 'inner_acl."wbfsys_issue-id_status-order" ' );



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


    if( isset( $condition['filters']['new_issues'] ) )
    {
      $filterNewIssues = $db->newFilter
      ( 
        'WbfsysIssue_Table_NewIssues' 
      );
      $filterNewIssues->inject( $criteria, $params );
    }

    if( isset( $condition['filters']['closed_issues'] ) )
    {
      $filterClosedIssues = $db->newFilter
      ( 
        'WbfsysIssue_Table_ClosedIssues' 
      );
      $filterClosedIssues->inject( $criteria, $params );
    }

    if( isset( $condition['filters']['my_assigned_issued'] ) )
    {
      $filterMyAssignedIssued = $db->newFilter
      ( 
        'WbfsysIssue_Table_MyAssignedIssued' 
      );
      $filterMyAssignedIssued->inject( $criteria, $params );
    }

    if( isset( $condition['filters']['my_created_issued'] ) )
    {
      $filterMyCreatedIssued = $db->newFilter
      ( 
        'WbfsysIssue_Table_MyCreatedIssued' 
      );
      $filterMyCreatedIssued->inject( $criteria, $params );
    }





  }//end public function appendFilter */

  /**
   * @param array $ids
   */
  public function fetchEmbededRolesResponsible( $ids = null )
  {
    
    if( is_null( $ids ) )
    {
      if( $this->ids )
      {
        $ids = $this->ids;
      }
      else 
      {
        // expect to fetch the id's from a existing query, when no id's are given
        if( is_null( $ids ) )
        {
          if( !is_array( $this->data ) )
            $this->load();
    
          $ids = array();
          foreach( $this->data as $row )
          {
            if( '' != trim( $row['wbfsys_issue_rowid'] ) )
              $ids[] = $row['wbfsys_issue_rowid'];
          }
          
          $this->ids = $ids;
        }
      }
    }

    if( !is_array($ids) || empty($ids) )
    {
      // no query necessary if an empty array was given
      return array();
    }
      
    $acl = $this->getAcl();
    
    $areaIds = implode( ", ", $acl->getAreaIds( 'mod-wbfsys>mgmt-wbfsys_issue' ) ) ;
    $rowIds  = implode( ", ", $ids );
    
    $db                = $this->getDb();

    $sql = <<<SQL
  SELECT
    wbfsys_role_user.rowid as id,
    wbfsys_role_user.name as user_name,
    COALESCE( wbfsys_role_user.name, '' ) || COALESCE  ( ' &lt;' || core_person.lastname || ', ' || core_person.firstname || '&gt;', ' &lt;' || core_person.lastname || '&gt;',  ' &lt;' || core_person.firstname || '&gt;', '' ) as value,
    wbfsys_group_users.vid as vid,
    wbfsys_role_user.email,
    wbfsys_role_group.name as group_name,
    wbfsys_role_group.access_key as group_key
    
  FROM
    wbfsys_role_user
    
  JOIN
    core_person
    ON
      core_person.rowid = wbfsys_role_user.id_person
      
  JOIN
    wbfsys_group_users
      on wbfsys_role_user.rowid = wbfsys_group_users.id_user
      
  JOIN
    wbfsys_role_group
    ON
      wbfsys_role_group.rowid = wbfsys_group_users.id_group
      
  WHERE
    wbfsys_group_users.id_area IN ( {$areaIds} )
      AND wbfsys_group_users.vid IN( {$rowIds} )
AND UPPER(wbfsys_role_group.access_key) IN( UPPER('developer'), UPPER('owner') )
      AND
        ( 
          wbfsys_group_users.partial = 0 
            OR wbfsys_group_users.partial IS null 
        )
  ORDER BY
    wbfsys_role_group.name,
    wbfsys_role_user.name,
    core_person.lastname
    
SQL;

    $res = $db->select( $sql );
    
    foreach ($res as $row )
    {
      $this->rolesResponsible[$row['vid']][] = $row;
    }

  }//end public function fetchEmbededRolesResponsible */

}//end class WbfsysIssue_Table_Query_Postgresql

