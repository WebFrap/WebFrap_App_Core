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
 * @subpackage employee
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WgtDesktopEmployee
  extends WgtDesktop
{  /**
   * @param LibTemplate
   */
  public function display( $view )
  {

    $user     = $this->getUser();
    $profile  = $user->getProfile();

    // set template
    $view->setTemplate('profile/employee/default');
    $view->setIndex('profile/employee/default');

    // panel
    $view->addVar('desktopPanel',     $profile->getPanel() );

    // panel
    $view->addVar('desktopNavigation',     $profile->getNavigation() );

        // Area navigation


  }//end public function display */

}// end class WgtDesktopEmployee

