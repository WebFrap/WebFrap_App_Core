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
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class ProfileAdmin
  extends ProfileDefault
{
////////////////////////////////////////////////////////////////////////////////
// attributes
////////////////////////////////////////////////////////////////////////////////

  /**
   * @param string
   */
  public $key          = 'admin';
  
  /**
   * The Label that will be displayed in the application
   * @param string
   */
  public $label        = 'admin';

  /**
   * @param WgtMainmenuAdmin
   */
  public $mainMenu      = null;

  /**
   * @param string
   */
  public $mainMenuName  = 'Admin';

  /**
   * @param WgtDesktopAdmin
   */
  public $desktop       = null;

  /**
   * @param string
   */
  public $desktopName   = 'Admin';

  /**
   * @param WgtNavigationAdmin
   */
  public $navigation      =  null;

  /**
   * @param string
   */
  public $navigationName  =  'Admin';

  /**
   * @param WgtPanelAdmin
   */
  public $panel      =  null;

  /**
   * @param string
   */
  public $panelName  =  'Admin';





} // end class ProfileAdmin

