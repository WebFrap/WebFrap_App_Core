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
class WbfsysDesktop_Ref_MainMenu_Treetable_Query
  extends LibSqlQuery
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
////////////////////////////////////////////////////////////////////////////////
// Query Elements TreeTable
////////////////////////////////////////////////////////////////////////////////
    
 /**
   * Loading the tabledata from the database
   * @param string/array $condition conditions for the query
   * @param TFlag $params
   * @return void
   *
   * @throws LibDb_Exception
   */
  public function fetch( $condition = null, $params = null )
  {

    if(!$params)
      $params = new TFlag();

    $this->sourceSize  = null;
    $db                = $this->getDb();
    
    // prüfen ob schon eine Criteria gesetzt wurde, wenn nicht wird eine 
    // neue erstellt
    if( !$this->criteria )
    {
      $criteria = $db->orm->newCriteria();
    }
    else
    {
      $criteria = $this->criteria;
    }
    
    // prüfen ob schon cols gesetzte wurden, kann passieren wenn eine Criteria
    // vor dem aufruf von fetch gesetzt wurde, in dem fall werden die "alten"
    // cols verwendet
    if( !$criteria->cols )
    {
      $this->setCols( $criteria );
    }

    // Tabellen + Joins setzen
    $this->setTables( $criteria );
    
    // suchparameter auswerten und an passender stelle in die query bauen
    $this->appendConditions( $criteria, $condition, $params  );
    
    // filter hinzufügen soweit vorhanden
    $this->appendFilter( $criteria, $condition, $params  );
    
    $this->checkLimitAndOrder( $criteria, $params );
    

    // Query ausführen und das result speichern
    // beim iterieren wird entweder das Result verwendet, oder der Data Array
    // data array hat höhere prio
    $this->result    = $db->orm->select( $criteria );

    if($params->loadFullSize)
      $this->calcQuery = $criteria->count( 'count(wbfsys_menu_entry.'.Db::PK.') as '.Db::Q_SIZE );

    $ids = array();
  
    // wir machen uns die hohe prio des data arrays zunutze und speichern die
    // rootnodes zwiscschen
    foreach( $this->result as $row )
    {
      $this->data[] = $row;
      $ids[] = $row['wbfsys_menu_entry_rowid'];
    }
    
    $this->ids = $ids;
    
    // die Kind Knoten werden in einem Index mit dem key des parents abgelegt
    // rekursive abfrage, ist so gewünscht, wird für jede ebene einmal getriggert
    // bis alle kinder keine kinder mehr haben
    // anzahl queries = anzahl ebenen ist in diesem fall vertretbar
    // sind meist so oder so nur 2 bis 3
    while( $children = $this->loadChildren( $ids, true ) )
    {

      $ids = array();

      foreach( $children as $child )
      {
        $this->childs[$child['wbfsys_menu_entry_m_parent']][] = $child;
        $ids[] = $child['wbfsys_menu_entry_rowid'];
      }

    }

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
  public function fetchInAcls( array $inKeys, $access, $condition, $params = null )
  {

    if( !$params )
      $params = new TFlag();

    $db   = $this->getDb();
    $user = $this->getUser();
    
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
      " wbfsys_menu_entry.rowid  IN( ". implode( ', ', array_keys($inKeys) ) ." )"
    );

    // Query ausführen und das result speichern
    // beim iterieren wird entweder das Result verwendet, oder der Data Array
    // data array hat höhere prio
    $result    = $db->orm->select( $criteria );
    
    //if( $params->loadFullSize )
      //$this->calcQuery = $criteria->count( 'count(wbfsys_menu_entry.'.Db::PK.') as '.Db::Q_SIZE );

    $ids = array();
    
    $this->data = array();
    
    foreach( $result as $row )
    {
      $row['acl-level'] = $inKeys[$row['wbfsys_menu_entry_rowid']];
      $this->data[]     = $row;
      $ids[] = $row['wbfsys_menu_entry_rowid'];
    }

    $this->ids = $ids;
    
    // die Kind Knoten werden in einem Index mit dem key des parents abgelegt
    // rekursive abfrage, ist so gewünscht, wird für jede ebene einmal getriggert
    // bis alle kinder keine kinder mehr haben
    // anzahl queries = anzahl ebenen ist in diesem fall vertretbar
    // sind meist so oder so nur 2 bis 3
    $pName = $user->getProfileName();
    
    while( $childIds = $access->fetchChildrenIds( $pName, 'treetable', $this, $ids, $condition, $params ) )
    {

      $children = $this->loadChildren( array_keys( $childIds ) );

      $ids = array();

      foreach( $children as $child )
      {
        $child['acl-level'] = $childIds[$child['wbfsys_menu_entry_rowid']];
        
        $this->childs[$child['wbfsys_menu_entry_m_parent']][] = $child;

        $ids[] = $child['wbfsys_menu_entry_rowid'];
      }

    }


  }//end public function fetchInAcls */

 /**
   * Loading the tabledata from the database
   * @param string/array $condition conditions for the query
   * @param TFlag $params
   * @return void
   *
   * @throws LibDb_Exception
   */
  public function loadChildren( $ids, $loadChildren = false )
  {

    // if ids is empty just return an empty string
    if(!$ids)
      return array();

    $params         = new TFlag();
    $params->qsize  = '-1';

    $db             = $this->getDb();

    $criteria       = $db->orm->newCriteria();

    if( !$criteria->cols )
    {
      $this->setCols( $criteria );
    }

    $this->setTables( $criteria );
    //$this->appendConditions( $criteria, $condition, $params  );
    $this->checkLimitAndOrder( $criteria, $params );

    if( $loadChildren )
      $criteria->where('wbfsys_menu_entry.m_parent in('.implode(',',$ids).')');
    else
      $criteria->where('wbfsys_menu_entry.rowid in('.implode(',',$ids).')');

    return $db->orm->select( $criteria )->getAll();

  }//end public function loadChildren */

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
      'DISTINCT wbfsys_menu_entry.rowid as "wbfsys_menu_entry_rowid"', // variant:  
      'wbfsys_menu_entry.m_parent as "wbfsys_menu_entry_m_parent"', // variant:  
      'wbfsys_menu_entry.label as "wbfsys_menu_entry_label"', // variant:  
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

    $criteria->from( 'wbfsys_menu_entry' );



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
      $this->calcQuery = $criteria->count( 'count(DISTINCT wbfsys_menu_entry.'.Db::PK.') as '.Db::Q_SIZE );

  }//end public function setCalcQuery */

  /**
   * Verarbeiten der Suchparameter sowie anhängen der Standard Filter
   * 
   * In Treetable werden auf rootebene nur Rootknoten mit leeren  m_parent
   * ausgelesen
   *
   * @param LibSqlCriteria $criteria
   * @param array $condition the conditions
   * @param TFlag $params
   * @return void
   */
  public function appendConditions( $criteria, $condition, $params )
  {
  
    $criteria->where( ' wbfsys_menu_entry.m_parent is null ' );

    // append codition if the query has a default filter
    if( $this->condition )
    {

      if( is_string($this->condition) )
      {

        if( ctype_digit($this->condition) )
        {
          $criteria->where( 'wbfsys_menu_entry.rowid = '.$this->condition );
        }
        else
        {
          $criteria->where( $this->condition );
        }

      }
      else if( is_array($this->condition) )
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
          $criteria->where( 'wbfsys_menu_entry.rowid = '.$condition );
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
   * @return void
   */
  public function checkConditions( $criteria, array $condition )
  {
  
    	
    	// in query wenn ids vorhanden sind
    	if( isset($condition['ids']) && !empty( $condition['ids'] ) )
    	{
				$criteria->where
        (
          'wbfsys_menu_entry.rowid = IN( '. implode( ', ', $condition['ids'] ) .' ) ';
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
 wbfsys_menu_entry.rowid = \''.$part.'\' 
              )'
            );
         }

      }//end if

      // search conditions for  wbfsys_menu_entry
      if( isset( $condition['wbfsys_menu_entry'] ) )
      {
        $whereCond = $condition['wbfsys_menu_entry'];

        if( isset( $whereCond['label'] ) && trim( $whereCond['label'] ) != ''  )
          $criteria->where( ' UPPER(wbfsys_menu_entry.label) like UPPER(\'%'.$whereCond['label'].'%\') ');

        // append meta information
        if( isset($whereCond['m_role_create']) && trim($whereCond['m_role_create']) != ''  )
          $criteria->where( ' wbfsys_menu_entry.m_role_create = '.$whereCond['m_role_create'].' ');

        if( isset($whereCond['m_role_change']) && trim($whereCond['m_role_change']) != ''  )
          $criteria->where( ' wbfsys_menu_entry.m_role_change = '.$whereCond['m_role_change'].' ');

        if( isset($whereCond['m_time_created_before']) && trim($whereCond['m_time_created_before']) != ''  )
          $criteria->where( ' wbfsys_menu_entry.m_time_created <= \''.$whereCond['m_time_created_before'].'\' ');

        if( isset($whereCond['m_time_created_after']) && trim($whereCond['m_time_created_after']) != ''  )
          $criteria->where( ' wbfsys_menu_entry.m_time_created >= \''.$whereCond['m_time_created_after'].'\' ');

        if( isset($whereCond['m_time_changed_before']) && trim($whereCond['m_time_changed_before']) != ''  )
          $criteria->where( ' wbfsys_menu_entry.m_time_changed <= \''.$whereCond['m_time_changed_before'].'\' ');

        if( isset($whereCond['m_time_changed_after']) && trim($whereCond['m_time_changed_after']) != ''  )
          $criteria->where( ' wbfsys_menu_entry.m_time_changed >= \''.$whereCond['m_time_changed_after'].'\' ');

        if( isset($whereCond['m_rowid']) && trim($whereCond['m_rowid']) != ''  )
          $criteria->where( ' wbfsys_menu_entry.rowid >= \''.$whereCond['m_rowid'].'\' ');

        if( isset($whereCond['m_uuid']) && trim($whereCond['m_uuid']) != ''  )
          $criteria->where( ' wbfsys_menu_entry.m_uuid >= \''.$whereCond['m_uuid'].'\' ');

      }//end if( isset ($condition['wbfsys_menu_entry']) )


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
          $criteria->where( "wbfsys_menu_entry.m_parent ~* '^[^a-zA-Z]'" );
        }
        else
        {
          $criteria->where( "upper(substr(wbfsys_menu_entry.m_parent,1,1)) = '".strtoupper($params->begin)."'" );
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

      $criteria->orderBy( 'wbfsys_menu_entry.rowid' );
      $criteria->selectAlso( 'wbfsys_menu_entry.rowid as "wbfsys_menu_entry-rowid-order"' );





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

      $criteria->orderBy( 'wbfsys_menu_entry.rowid' );
      $criteria->selectAlso( 'wbfsys_menu_entry.rowid as "wbfsys_menu_entry-rowid-order"' );





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

      $criteria->orderBy( 'wbfsys_menu_entry.rowid' );
      $criteria->selectAlso( 'wbfsys_menu_entry.rowid as "wbfsys_menu_entry-rowid-order"' );
      
      $envelop->groupBy( 'inner_acl."wbfsys_menu_entry-rowid-order"' );
      $envelop->selectAlso( 'inner_acl."wbfsys_menu_entry-rowid-order"' );
      $envelop->orderBy( 'inner_acl."wbfsys_menu_entry-rowid-order"' );





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

}//end class WbfsysDesktop_Ref_MainMenu_Treetable_Query

