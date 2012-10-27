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
class CoreBase_Controller
  extends Controller
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////

  /**
   * list with all callable methodes in this subcontroller
   *
   * @var array
   */
  protected $callAble = array
  (
    'menu'
  );

  /**
   * Name of the default action
   *
   * @var string
   */
  protected $defaultAction = 'menu';

////////////////////////////////////////////////////////////////////////////////
// Methoden
////////////////////////////////////////////////////////////////////////////////

  /**
   * @return void
   */
  public function menu( )
  {

    switch( $this->tplEngine->type )
    {
      case View::SUBWINDOW:
      {
        // use window view
        $view   = $this->tplEngine->newWindow
        (
          'WebfrapMainMenu',
          'Core_Base'
        );
        break;
      }
      case View::MAINTAB:
      {
        // use maintab view
        $view   = $this->tplEngine->newMaintab
        (
          'WebfrapMainMenu',
          'Core_Base'
        );
        break;
      }
      case View::MAINWINDOW:
      {
        // use maintab view
        $view   = $this->tplEngine->newMainwindow
        (
          'WebfrapMainMenu',
          'Core_Base'
        );
        break;
      }
      default:
      {
        $view = $this->view;
      }
    }

    $menuName = $this->request->param('menu',Validator::CNAME);

    if( !$menuName )
      $menuName = 'default';

    $view->display( $menuName, null );

  }//end public function menu */


}//end class CoreBase_Controller

