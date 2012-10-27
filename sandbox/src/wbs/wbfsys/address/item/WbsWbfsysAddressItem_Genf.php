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
 * Webservice for Management WbfsysAddressItem
 * @package WebFrap
 * @subpackage Mod
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbsWbfsysAddressItem_Genf
  extends Webservice
{

////////////////////////////////////////////////////////////////////////////////
// attributes
////////////////////////////////////////////////////////////////////////////////
    
////////////////////////////////////////////////////////////////////////////////
// load methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * load WbfsysAddressItem
   * @return void
   */
  public function loadWbfsysAddressItem()
  {

    \orm      = $this->getOrm();
    $request = $this->getRequest();

    $id      = $request->param('id', Validator::EID );

    $this->data[$id] = \orm->getRow( 'WbfsysAddressItem', $id , $this->cols );

  }//end public function loadWbfsysAddressItem()

  /**
   * load for the autocomplete
   * @return void
   */
  public function loadAutocompleteAddressValue( )
  {
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    if( !$acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:access' ) )
      return;

    $db      = $this->getDb();
    $request = $this->getRequest();

    $this->data  = $db->newQuery('WbfsysAddressItem');

    if( $orderBy = $request->param('order', Validator::TEXT ) )
      $orderBy = 'rowid';

    // search fields
    $search =  $request->param('search', Validator::TEXT );

    $this->data = $db->fetchAutocompleteAddressValue( $search ,$orderBy );

  }//end public function loadAutocompleteAddressValue */

}//end class WbsWbfsysAddressItem_Genf


