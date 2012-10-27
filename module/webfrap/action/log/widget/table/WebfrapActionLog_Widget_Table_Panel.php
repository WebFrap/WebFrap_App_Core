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
 *
 * @package WebFrap
 * @subpackage Modprofiles
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WebfrapActionLog_Widget_Table_Panel
  extends WgtPanelTable
{
////////////////////////////////////////////////////////////////////////////////
// set up method
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * set up the panel data
   *
   * @return string
   */
  public function setUp( )
  {
    
    $user   = $this->getUser();
    $acl    = $this->getAcl();
    $i18n   = $this->getI18n();
    
    $this->title = $i18n->l( 'Webfrap Action Log', 'webfrap.action_log.label' );
    $this->searchKey = 'webfrap_action_log';


    
  }//end public function setUp */
    
}// end class WebfrapActionLog_Widget_Table_Panel

