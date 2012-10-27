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
class WbfsysMask_Query_Postgresql
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
  delete from wbfsys_mask where rowid > 0;
SQL;

    foreach( $sql as $delQuery )
    {
      $db->delete($delQuery);
    }

  }//end public function cleanResource */

  /**
   * Loading the tabledata from the database
   * @param string $key
   * @return void
   *
   * @throws LibDb_Exception
   */
  public function fetchAutocomplete( $key )
  {

    $this->sourceSize  = null;
    $db                = $this->getDb();

    $sql = <<<SQL
  SELECT
    wbfsys_mask.rowid as id,
    wbfsys_mask.name as value

  FROM
    wbfsys_mask

  WHERE
    upper(wbfsys_mask.name) like upper('{$db->addSlashes( $key )}%')
  LIMIT 10

SQL;

    $this->result = $db->select( $sql );

  }//end public function fetchAutocomplete */

}//end class WbfsysMask_Query_Postgresql

