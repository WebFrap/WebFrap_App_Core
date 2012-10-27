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
class WbfsysRoleUser_Crud_Selection_Query_Postgresql
  extends LibSqlQuery
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
////////////////////////////////////////////////////////////////////////////////
// Query elements Selection
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
  public function fetch( $condition, $params = null )
  {

    if( !$params )
      $params = new TFlag();

    $this->sourceSize  = null;
    $db                = $this->getDb();

    $criteria = $db->orm->newCriteria();
    $this->setCols( $criteria );
    $this->setTables( $criteria );

    $criteria->where( $condition );
    $this->checkLimitAndOrder( $criteria, $params );

    // Run Query und save the result
    $this->result    = $db->orm->select( $criteria );

    $this->size = $this->result->count();
    $this->sourceSize = $this->size;

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
      " wbfsys_role_user.rowid  IN( ". implode( ', ', array_keys($inKeys) ) ." )"
    );

    // Run Query und save the result
    $result    = $db->orm->select( $criteria );
    
    $this->data = array();
    
    foreach( $result as $row )
    {
      $row['acl-level'] = $inKeys[$row['wbfsys_role_user_rowid']];
      $this->data[]     = $row;
    }

  }//end public function fetchInAcls */

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
      'DISTINCT wbfsys_role_user.rowid as "wbfsys_role_user_rowid"', // variant: def-rowid 
      'wbfsys_role_user.name as "wbfsys_role_user_name"', // variant: field_mgmt-attr 
      'core_person.lastname as "core_person_lastname"', // variant: def-by-context  used source field core_person
      'wbfsys_role_user.id_person as "wbfsys_role_user_id_person"', // ref wbfsys_role_user def-by-context 
      'wbfsys_role_mandant.name as "wbfsys_role_mandant_name"', // variant: def-by-context  used source field wbfsys_role_mandant
      'wbfsys_role_user.id_mandant as "wbfsys_role_user_id_mandant"', // ref wbfsys_role_user def-by-context 
      'core_person.lastname as "embed_person_lastname"', // variant: field_ref-ref-mgmt  used refname embed_person
      'core_person.firstname as "embed_person_firstname"', // variant: field_ref-ref-mgmt  used refname embed_person
      'wbfsys_profile.name as "wbfsys_profile_name"', // variant: field_mgmt-attr  used source field wbfsys_profile
      'wbfsys_role_user.profile as "wbfsys_role_user_profile"', // ref wbfsys_role_user field_mgmt-attr 
      'wbfsys_role_user.m_time_created as "wbfsys_role_user_m_time_created"', // variant: field_mgmt-attr 
      'wbfsys_role_user.inactive as "wbfsys_role_user_inactive"', // variant: field_mgmt-attr 
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

    $criteria->from( 'wbfsys_role_user' );

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
      $this->calcQuery = $criteria->count( 'count(DISTINCT wbfsys_role_user.'.Db::PK.') as '.Db::Q_SIZE );

  }//end public function setCalcQuery */

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
      $criteria->orderBy( 'wbfsys_role_user.rowid' );

    }


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


      $criteria->orderBy( 'wbfsys_role_user.name' );
      $criteria->selectAlso( 'wbfsys_role_user.name as "wbfsys_role_user-name-order"' );




    }


  }//end public function injectOrder */

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

}//end class WbfsysRoleUser_Crud_Selection_Query_Postgresql

