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
 * @subpackage ModCore
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreCurrency_Table_Query
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
      $this->ids[] = $row['core_currency_rowid'];
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
      $this->calcQuery = $criteria->count( 'count(DISTINCT core_currency.'.Db::PK.' ) as '.Db::Q_SIZE );

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
      " core_currency.rowid  IN( ". implode( ', ', array_keys($inKeys) ) ." )"
    );

    // Run Query und save the result
    $result    = $db->orm->select( $criteria );
    
    $this->data = array();
    
    foreach( $result as $row )
    {
      $row['acl-level'] = $inKeys[$row['core_currency_rowid']];
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
      $acl->injectListingAcls( $criteria, 'mod-core>mod-core-cat-core_data' );
    }
    else
    {
      $acl->injectListingAcls( $criteria, 'mod-core>mod-core-cat-core_data', true, $params->access->level  );
    }

    // Run Query und save the result
    $this->result    = $db->orm->select( $criteria );

    if($params->loadFullSize)
    {
      $this->calcQuery = $criteria->count( 'count(DISTINCT core_currency.'.Db::PK.') as '.Db::Q_SIZE );
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
      'DISTINCT core_currency.rowid as "core_currency_rowid"', // variant: def-rowid 
      'core_currency.name as "core_currency_name"', // variant: def-by-context 
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

    $criteria->from( 'core_currency' );



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
      $this->calcQuery = $criteria->count( 'count(DISTINCT core_currency.'.Db::PK.') as '.Db::Q_SIZE );

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
          $criteria->where( 'core_currency.rowid = '.$this->condition );
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
          $criteria->where( 'core_currency.rowid = '.$condition );
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
          'core_currency.rowid = IN( '. implode( ', ', $condition['ids'] ) .' ) ';
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
 core_currency.rowid = \''.$part.'\'  or 
                core_currency.name = \''.$part.'\' 
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

                UPPER(core_currency.name) like UPPER(\'%'.$part.'%\')
              )');

           }

         }
         else
         {
           $part = $condition['free'];

           $criteria->where
           ('(

                UPPER(core_currency.name) like UPPER(\'%'.$part.'%\')
           )');

         }

      }

      }//end if

      // search conditions for  core_currency
      if( isset( $condition['core_currency'] ) )
      {
        $whereCond = $condition['core_currency'];

        if( isset( $whereCond['name'] ) && trim( $whereCond['name'] ) != ''  )
          $criteria->where( ' UPPER(core_currency.name) like UPPER(\'%'.$whereCond['name'].'%\') ');

        // append meta information
        if( isset($whereCond['m_role_create']) && trim($whereCond['m_role_create']) != ''  )
          $criteria->where( ' core_currency.m_role_create = '.$whereCond['m_role_create'].' ');

        if( isset($whereCond['m_role_change']) && trim($whereCond['m_role_change']) != ''  )
          $criteria->where( ' core_currency.m_role_change = '.$whereCond['m_role_change'].' ');

        if( isset($whereCond['m_time_created_before']) && trim($whereCond['m_time_created_before']) != ''  )
          $criteria->where( ' core_currency.m_time_created <= \''.$whereCond['m_time_created_before'].'\' ');

        if( isset($whereCond['m_time_created_after']) && trim($whereCond['m_time_created_after']) != ''  )
          $criteria->where( ' core_currency.m_time_created >= \''.$whereCond['m_time_created_after'].'\' ');

        if( isset($whereCond['m_time_changed_before']) && trim($whereCond['m_time_changed_before']) != ''  )
          $criteria->where( ' core_currency.m_time_changed <= \''.$whereCond['m_time_changed_before'].'\' ');

        if( isset($whereCond['m_time_changed_after']) && trim($whereCond['m_time_changed_after']) != ''  )
          $criteria->where( ' core_currency.m_time_changed >= \''.$whereCond['m_time_changed_after'].'\' ');

        if( isset($whereCond['m_rowid']) && trim($whereCond['m_rowid']) != ''  )
          $criteria->where( ' core_currency.rowid >= \''.$whereCond['m_rowid'].'\' ');

        if( isset($whereCond['m_uuid']) && trim($whereCond['m_uuid']) != ''  )
          $criteria->where( ' core_currency.m_uuid >= \''.$whereCond['m_uuid'].'\' ');

      }//end if( isset ($condition['core_currency']) )


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
          $criteria->where( "core_currency.name ~* '^[^a-zA-Z]'" );
        }
        else
        {
          $criteria->where( "upper(substr(core_currency.name,1,1)) = '".strtoupper($params->begin)."'" );
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

      $criteria->orderBy( 'core_currency.name' );
      $criteria->selectAlso( 'core_currency.name as "core_currency-name-order"' );





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

      $criteria->orderBy( 'core_currency.name' );
      $criteria->selectAlso( 'core_currency.name as "core_currency-name-order"' );





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

      $criteria->orderBy( 'core_currency.name' );
      $criteria->selectAlso( 'core_currency.name as "core_currency-name-order"' );
      
      $envelop->groupBy( 'inner_acl."core_currency-name-order"' );
      $envelop->selectAlso( 'inner_acl."core_currency-name-order"' );
      $envelop->orderBy( 'inner_acl."core_currency-name-order"' );





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

}//end class CoreCurrency_Table_Query

