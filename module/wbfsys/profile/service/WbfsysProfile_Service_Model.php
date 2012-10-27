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
class WbfsysProfile_Service_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// Load Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * de:
   * datenquelle für einen autocomplete request
   * @param string $key
   * @param TArray $params
   */
  public function getAutolistByKey( $key, $params )
  {

    $db       = $this->getDb();
    $request  = $this->getRequest();
    
    $query  = $db->newQuery( 'WbfsysProfile_Service' );
    /* @var $query WbfsysProfile_Service_Query  */

    $query->fetchAutocomplete
    (
      $key,
      $params
    );

    return $query->getAll();

  }//end public function getAutolistByKey */

}//end class WbfsysProfile_Service_Model

