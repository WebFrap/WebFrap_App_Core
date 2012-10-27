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
class ProfileEmployee
  extends ProfileDefault
{
////////////////////////////////////////////////////////////////////////////////
// attributes
////////////////////////////////////////////////////////////////////////////////

  /**
   * @param string
   */
  public $key          = 'employee';
  
  /**
   * The Label that will be displayed in the application
   * @param string
   */
  public $label        = 'Employee';

  /**
   * @param WgtMainmenuDefault
   */
  public $mainMenu      = null;

  /**
   * @param string
   */
  public $mainMenuName  = 'Default';

  /**
   * @param WgtDesktopEmployee
   */
  public $desktop       = null;

  /**
   * @param string
   */
  public $desktopName   = 'Employee';

  /**
   * @param WgtNavigationEmployee
   */
  public $navigation      =  null;

  /**
   * @param string
   */
  public $navigationName  =  'Employee';

  /**
   * @param WgtPanelDefault
   */
  public $panel      =  null;

  /**
   * @param string
   */
  public $panelName  =  'Default';





} // end class ProfileEmployee

