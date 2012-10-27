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
 * Read before change:
 * It's not recommended to change this file inside a Mod or App Project.
 * If you want to change it copy it to a custom project.

 *
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysPackageStatusAccessKey_Selectbox_Query
  extends LibSqlQuery
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
////////////////////////////////////////////////////////////////////////////////
// Query Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * Fetch method for the WbfsysPackageStatusAccessKey Selectbox
   * @return void
   */
  public function fetchSelectbox( )
  {

    $db = $this->getDb();

    if( !$this->criteria )
      $criteria = $db->orm->newCriteria();
    else
      $criteria = $this->criteria;

    $criteria->select( array
    (
      'DISTINCT wbfsys_package_status.access_key as id',
      'wbfsys_package_status.name as value'
     ));
      $criteria->selectAlso( 'wbfsys_package_status.m_order as "wbfsys_package_status-m_order-order"' );

    $criteria->from( 'wbfsys_package_status' );



      $criteria->orderBy( 'wbfsys_package_status.m_order ' );


    $this->result = $db->orm->select( $criteria );

  }//end public function fetchSelectbox */
  
  /**
   * Laden einer einzelnen Zeile,
   * Wird benötigt wenn der aktive Wert durch die Filter gerutscht ist.
   * Kann in archive Szenarien passieren.
   * In diesem Fall soll der Eintrag trotzdem noch angezeigt werden, daher
   * wird er explizit geladen
   *
   * @param int $entryId
   * @return void
   */
  public function fetchSelectboxEntry( $entryId )
  {
  
    // wenn keine korrekte id > 0 übergeben wurde müssen wir gar nicht erst
    // nach einträgen suchen
    if( !$entryId )
      return array();
  
    $db = $this->getDb();

    $criteria = $db->orm->newCriteria();

    $criteria->select( array
    (
      'DISTINCT wbfsys_package_status.access_key as id',
      'wbfsys_package_status.name as value'
     ));
    $criteria->from( 'wbfsys_package_status' );



    $criteria->where( "wbfsys_package_status.access_key = '{$entryId}'"  );

    return $db->orm->select( $criteria )->get();

  }//end public function fetchSelectboxEntry */

  /**
   * Laden einer definierten Liste von Werten
   * Wird benötigt wenn die Selectbox mit der option multi
   * verwendet wird und einige der aktiven Werte durch die Filter gerutscht sind.
   * siehe auch self::fetchSelectboxEntry
   *
   * @param int $entryId
   * @return void
   */
  public function fetchSelectboxEntries( $entryIds )
  {
    
    // wenn der array leer ist müssen wir nicht weiter prüfen
    if( !$entryIds )
      return array();
  
    $db = $this->getDb();

    $criteria = $db->orm->newCriteria();

    $criteria->select( array
    (
      'DISTINCT wbfsys_package_status.access_key as id',
      'wbfsys_package_status.name as value'
     ));
    $criteria->from( 'wbfsys_package_status' );



    $criteria->where( "wbfsys_package_status.access_key IN ( '".implode("', '", $entryIds )."' )"  );

    return $db->orm->select( $criteria )->getAll();

  }//end public function fetchSelectboxEntries */
  
}//end class WbfsysPackageStatusAccessKey_Selectbox_Query

