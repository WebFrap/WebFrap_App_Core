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
 * @subpackage ModCore
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CorePerson_Query_Postgresql
  extends LibSqlQuery
{
////////////////////////////////////////////////////////////////////////////////
// attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * a simple method to empty the complete table, and remove all entries
   * @return void
   * @throws LibDb_Exception
   */
  public function cleanResource()
  {
    $db = $this->getDb();

    $sql = array();

    $sql[] = <<<SQL
  delete from core_person where rowid > 0;
SQL;

    foreach( $sql as $delQuery )
    {
      $db->delete($delQuery);
    }

  }//end public function cleanResource */

  /**
   * load for the autocomplete
   * @param string $where
   * @param string $order
   * @param int $limit
   * @return void
   */
  public function fetchAutocompleteBirthCity( $where , $order = null , $limit = 7 )
  {

    $db        = $this->getDb();
    $criteria  = $db->orm->newCriteria();

    $criteria->select(array( 'rowid' , 'birth_city'))->table( 'core_person' );

    if( $order )
    {
      $criteria->order( $order );
    }
    else
    {
      $criteria->order( 'rowid' );
    }

    $criteria->where( ' upper(birth_city) like upper(\''.trim($where).'%\') ');

    // Limit und Startposition
    $criteria->limit( $limit );

    $this->data = $db->orm->select( $criteria );

  }//end public function fetchAutocompleteBirthCity */

}//end class CorePerson_Query_Postgresql

