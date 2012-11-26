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
class WbfsysAnnouncement_Ref_Status_Table_Query_Postgresql
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
      $this->ids[] = $row['wbfsys_user_announcement_rowid'];
    }

    return $this->ids;
  
  }//end public function getIds */
    
////////////////////////////////////////////////////////////////////////////////
// query elements table
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
      $this->calcQuery = $criteria->count( 'count(DISTINCT wbfsys_user_announcement.'.Db::PK.' ) as '.Db::Q_SIZE );

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
      " wbfsys_user_announcement.rowid  IN( ". implode( ', ', array_keys($inKeys) ) ." )"
    );

    // Run Query und save the result
    $result    = $db->orm->select( $criteria );
    
    $this->data = array();
    
    foreach( $result as $row )
    {
      $row['acl-level'] = $inKeys[$row['wbfsys_user_announcement_rowid']];
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
      $acl->injectListingAcls( $criteria, 'mod-wbfsys>mgmt-wbfsys_user_announcement' );
    }
    else
    {
      $acl->injectListingAcls( $criteria, 'mod-wbfsys>mgmt-wbfsys_user_announcement', true, $params->access->level  );
    }

    // Run Query und save the result
    $this->result    = $db->orm->select( $criteria );

    if($params->loadFullSize)
    {
      $this->calcQuery = $criteria->count( 'count(DISTINCT wbfsys_user_announcement.'.Db::PK.') as '.Db::Q_SIZE );
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
      'DISTINCT wbfsys_user_announcement.rowid as "wbfsys_user_announcement_rowid"', // variant:  
      'wbfsys_user_announcement_status.name as "wbfsys_user_announcement_status_name"', // variant:   used source field wbfsys_user_announcement_status
      'wbfsys_user_announcement.id_status as "wbfsys_user_announcement_id_status"', // ref wbfsys_user_announcement  
      'wbfsys_role_user.name as "wbfsys_role_user_name"', // variant:  
      'wbfsys_role_user.email as "wbfsys_role_user_email"', // variant:  
      'wbfsys_role_mandant.name as "wbfsys_role_mandant_name"', // variant:   used source field wbfsys_role_mandant
      'wbfsys_role_user.id_mandant as "wbfsys_role_user_id_mandant"', // ref wbfsys_role_user  
      'wbfsys_role_user.inactive as "wbfsys_role_user_inactive"', // variant:  
      'wbfsys_role_user.non_cert_login as "wbfsys_role_user_non_cert_login"', // variant:  
      'wbfsys_profile.name as "wbfsys_profile_name"', // variant:   used source field wbfsys_profile
      'wbfsys_role_user.profile as "wbfsys_role_user_profile"', // ref wbfsys_role_user  
      'wbfsys_role_user.last_login as "wbfsys_role_user_last_login"', // variant:  
      'wbfsys_role_user.rowid as "wbfsys_role_user_rowid"', // variant:  
      'core_person.firstname as "core_person_firstname"', // variant:  
      'core_person.lastname as "core_person_lastname"', // variant:  
      'core_person.rowid as "core_person_rowid"', // variant:  
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

    $criteria->from( 'wbfsys_user_announcement' );

    $criteria->joinOn
    (
      'wbfsys_user_announcement',
      'id_user',
      'wbfsys_role_user',
      'rowid',
      null,
      null
    );

    $criteria->leftJoinOn
    (
      'wbfsys_user_announcement',
      'id_status',
      'wbfsys_user_announcement_status',
      'rowid',
      null,
      'wbfsys_user_announcement_status'
    );// wbfsys_user_announcement_status  by alias wbfsys_user_announcement_status

    $criteria->leftJoinOn
    (
      'wbfsys_role_user',
      'id_mandant',
      'wbfsys_role_mandant',
      'rowid',
      null,
      'wbfsys_role_mandant'
    );// wbfsys_role_mandant  by alias wbfsys_role_mandant

    $criteria->leftJoinOn
    (
      'wbfsys_role_user',
      'profile',
      'wbfsys_profile',
      'access_key',
      null,
      'wbfsys_profile'
    );// wbfsys_profile  by alias wbfsys_profile

    $criteria->leftJoinOn
    (
      'wbfsys_role_user',
      'id_person',
      'core_person',
      'rowid',
      null,
      null
    );//  by key core_person



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
      $this->calcQuery = $criteria->count( 'count(DISTINCT wbfsys_user_announcement.'.Db::PK.') as '.Db::Q_SIZE );

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
          $criteria->where( 'wbfsys_user_announcement.id_announcement = '.$this->condition );
        }
        else
        {
          $criteria->where( $this->condition );
        }
      }

    }

    if( $condition )
    {

      if( is_string( $condition ) )
      {

        if( ctype_digit( $condition ) )
        {
          $criteria->where( 'wbfsys_user_announcement.id_announcement = '.$condition );
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
          'wbfsys_user_announcement.rowid = IN( '. implode( ', ', $condition['ids'] ) .' ) ';
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
 wbfsys_user_announcement.rowid = \''.$part.'\'  or 
                wbfsys_role_user.name = \''.$part.'\'  or 
                wbfsys_role_user.email = \''.$part.'\'  or 
                core_person.firstname = \''.$part.'\'  or 
                core_person.lastname = \''.$part.'\' 
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

                UPPER(wbfsys_role_user.name) like UPPER(\'%'.$part.'%\') or 
                UPPER(wbfsys_role_user.email) like UPPER(\'%'.$part.'%\') or 
                UPPER(core_person.firstname) like UPPER(\'%'.$part.'%\') or 
                UPPER(core_person.lastname) like UPPER(\'%'.$part.'%\')
              )');

           }

         }
         else
         {
           $part = $condition['free'];

           $criteria->where
           ('(

                UPPER(wbfsys_role_user.name) like UPPER(\'%'.$part.'%\') or 
                UPPER(wbfsys_role_user.email) like UPPER(\'%'.$part.'%\') or 
                UPPER(core_person.firstname) like UPPER(\'%'.$part.'%\') or 
                UPPER(core_person.lastname) like UPPER(\'%'.$part.'%\')
           )');

         }

      }

      }//end if

      // search conditions for  wbfsys_user_announcement
      if( isset( $condition['wbfsys_user_announcement'] ) )
      {
        $whereCond = $condition['wbfsys_user_announcement'];

        if( isset($whereCond['id_status']) && count( $whereCond['id_status'] ) )
          $criteria->where( " wbfsys_user_announcement.id_status IN( '".implode("','",$whereCond['id_status'])."' ) " );

        // append meta information
        if( isset($whereCond['m_role_create']) && trim($whereCond['m_role_create']) != ''  )
          $criteria->where( ' wbfsys_user_announcement.m_role_create = '.$whereCond['m_role_create'].' ');

        if( isset($whereCond['m_role_change']) && trim($whereCond['m_role_change']) != ''  )
          $criteria->where( ' wbfsys_user_announcement.m_role_change = '.$whereCond['m_role_change'].' ');

        if( isset($whereCond['m_time_created_before']) && trim($whereCond['m_time_created_before']) != ''  )
          $criteria->where( ' wbfsys_user_announcement.m_time_created <= \''.$whereCond['m_time_created_before'].'\' ');

        if( isset($whereCond['m_time_created_after']) && trim($whereCond['m_time_created_after']) != ''  )
          $criteria->where( ' wbfsys_user_announcement.m_time_created >= \''.$whereCond['m_time_created_after'].'\' ');

        if( isset($whereCond['m_time_changed_before']) && trim($whereCond['m_time_changed_before']) != ''  )
          $criteria->where( ' wbfsys_user_announcement.m_time_changed <= \''.$whereCond['m_time_changed_before'].'\' ');

        if( isset($whereCond['m_time_changed_after']) && trim($whereCond['m_time_changed_after']) != ''  )
          $criteria->where( ' wbfsys_user_announcement.m_time_changed >= \''.$whereCond['m_time_changed_after'].'\' ');

        if( isset($whereCond['m_rowid']) && trim($whereCond['m_rowid']) != ''  )
          $criteria->where( ' wbfsys_user_announcement.rowid >= \''.$whereCond['m_rowid'].'\' ');

        if( isset($whereCond['m_uuid']) && trim($whereCond['m_uuid']) != ''  )
          $criteria->where( ' wbfsys_user_announcement.m_uuid >= \''.$whereCond['m_uuid'].'\' ');

      }//end if( isset ($condition['wbfsys_user_announcement']) )

      // search conditions for  wbfsys_role_user
      if( isset( $condition['wbfsys_role_user'] ) )
      {
        $whereCond = $condition['wbfsys_role_user'];

        if( !$criteria->isJoined( 'wbfsys_role_user' ) )
        {

    $criteria->leftJoinOn
    (
      'core_person',
      'm_role_change',
      'wbfsys_role_user',
      'rowid',
      null,
      'wbfsys_role_user'
    );// wbfsys_role_user 

        }

        if( isset( $whereCond['name'] ) && trim( $whereCond['name'] ) != ''  )
          $criteria->where( ' UPPER(wbfsys_role_user.name) like UPPER(\'%'.$whereCond['name'].'%\') ');

        if( isset( $whereCond['email']) && trim( $whereCond['email'] ) != ''  )
          $criteria->where( ' wbfsys_role_user.email = \''.$whereCond['email'].'\' ');

        if( isset( $whereCond['profile']) && trim( $whereCond['profile'] ) != ''  )
          $criteria->where( ' wbfsys_role_user.profile = \''.$whereCond['profile'].'\' ');

        // append meta information
        if( isset($whereCond['m_role_create']) && trim($whereCond['m_role_create']) != ''  )
          $criteria->where( ' wbfsys_role_user.m_role_create = '.$whereCond['m_role_create'].' ');

        if( isset($whereCond['m_role_change']) && trim($whereCond['m_role_change']) != ''  )
          $criteria->where( ' wbfsys_role_user.m_role_change = '.$whereCond['m_role_change'].' ');

        if( isset($whereCond['m_time_created_before']) && trim($whereCond['m_time_created_before']) != ''  )
          $criteria->where( ' wbfsys_role_user.m_time_created <= \''.$whereCond['m_time_created_before'].'\' ');

        if( isset($whereCond['m_time_created_after']) && trim($whereCond['m_time_created_after']) != ''  )
          $criteria->where( ' wbfsys_role_user.m_time_created >= \''.$whereCond['m_time_created_after'].'\' ');

        if( isset($whereCond['m_time_changed_before']) && trim($whereCond['m_time_changed_before']) != ''  )
          $criteria->where( ' wbfsys_role_user.m_time_changed <= \''.$whereCond['m_time_changed_before'].'\' ');

        if( isset($whereCond['m_time_changed_after']) && trim($whereCond['m_time_changed_after']) != ''  )
          $criteria->where( ' wbfsys_role_user.m_time_changed >= \''.$whereCond['m_time_changed_after'].'\' ');

        if( isset($whereCond['m_rowid']) && trim($whereCond['m_rowid']) != ''  )
          $criteria->where( ' wbfsys_role_user.rowid >= \''.$whereCond['m_rowid'].'\' ');

        if( isset($whereCond['m_uuid']) && trim($whereCond['m_uuid']) != ''  )
          $criteria->where( ' wbfsys_role_user.m_uuid >= \''.$whereCond['m_uuid'].'\' ');

      }//end if( isset ($condition['wbfsys_role_user']) )

      // search conditions for  core_person
      if( isset( $condition['core_person'] ) )
      {
        $whereCond = $condition['core_person'];

        if( !$criteria->isJoined( 'core_person' ) )
        {

    $criteria->leftJoinOn
    (
      'core_person',
      'is_alias_for',
      'core_person',
      'rowid',
      null,
      'core_person'
    );// core_person 

        }

        if( isset( $whereCond['firstname'] ) && trim( $whereCond['firstname'] ) != ''  )
          $criteria->where( ' UPPER(core_person.firstname) like UPPER(\'%'.$whereCond['firstname'].'%\') ');

        if( isset( $whereCond['lastname'] ) && trim( $whereCond['lastname'] ) != ''  )
          $criteria->where( ' UPPER(core_person.lastname) like UPPER(\'%'.$whereCond['lastname'].'%\') ');

        // append meta information
        if( isset($whereCond['m_role_create']) && trim($whereCond['m_role_create']) != ''  )
          $criteria->where( ' core_person.m_role_create = '.$whereCond['m_role_create'].' ');

        if( isset($whereCond['m_role_change']) && trim($whereCond['m_role_change']) != ''  )
          $criteria->where( ' core_person.m_role_change = '.$whereCond['m_role_change'].' ');

        if( isset($whereCond['m_time_created_before']) && trim($whereCond['m_time_created_before']) != ''  )
          $criteria->where( ' core_person.m_time_created <= \''.$whereCond['m_time_created_before'].'\' ');

        if( isset($whereCond['m_time_created_after']) && trim($whereCond['m_time_created_after']) != ''  )
          $criteria->where( ' core_person.m_time_created >= \''.$whereCond['m_time_created_after'].'\' ');

        if( isset($whereCond['m_time_changed_before']) && trim($whereCond['m_time_changed_before']) != ''  )
          $criteria->where( ' core_person.m_time_changed <= \''.$whereCond['m_time_changed_before'].'\' ');

        if( isset($whereCond['m_time_changed_after']) && trim($whereCond['m_time_changed_after']) != ''  )
          $criteria->where( ' core_person.m_time_changed >= \''.$whereCond['m_time_changed_after'].'\' ');

        if( isset($whereCond['m_rowid']) && trim($whereCond['m_rowid']) != ''  )
          $criteria->where( ' core_person.rowid >= \''.$whereCond['m_rowid'].'\' ');

        if( isset($whereCond['m_uuid']) && trim($whereCond['m_uuid']) != ''  )
          $criteria->where( ' core_person.m_uuid >= \''.$whereCond['m_uuid'].'\' ');

      }//end if( isset ($condition['core_person']) )


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
          $criteria->where( "wbfsys_user_announcement.id_announcement ~* '^[^a-zA-Z]'" );
        }
        else
        {
          $criteria->where( "upper(substr(wbfsys_user_announcement.id_announcement,1,1)) = '".strtoupper($params->begin)."'" );
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

      $criteria->orderBy( 'wbfsys_user_announcement.rowid' );
      $criteria->selectAlso( 'wbfsys_user_announcement.rowid as "wbfsys_user_announcement-rowid-order"' );





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

      $criteria->orderBy( 'wbfsys_user_announcement.rowid' );
      $criteria->selectAlso( 'wbfsys_user_announcement.rowid as "wbfsys_user_announcement-rowid-order"' );





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

      $criteria->orderBy( 'wbfsys_user_announcement.rowid' );
      $criteria->selectAlso( 'wbfsys_user_announcement.rowid as "wbfsys_user_announcement-rowid-order"' );
      
      $envelop->groupBy( 'inner_acl."wbfsys_user_announcement-rowid-order"' );
      $envelop->selectAlso( 'inner_acl."wbfsys_user_announcement-rowid-order"' );
      $envelop->orderBy( 'inner_acl."wbfsys_user_announcement-rowid-order"' );





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

}//end class WbfsysAnnouncement_Ref_Status_Table_Query_Postgresql

