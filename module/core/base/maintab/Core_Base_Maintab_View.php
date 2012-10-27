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
 * @subpackage ModCore
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class Core_Base_Maintab_View
  extends WgtMaintab
{
////////////////////////////////////////////////////////////////////////////////
// Methoden
////////////////////////////////////////////////////////////////////////////////

  /**
   * @param string $menuName
   * @param TArray $params
   * @return void
   */
  public function display( $menuName, $params )
  {

    $this->setLabel('Menu');
    $this->setTitle('Core-Data Menu');

    $this->setTemplate( 'webfrap/menu/modmenu' );

    $modMenu = $this->newItem( 'modMenu', 'MenuFolder' );
    $modMenu->setData
    (
      DaoFoldermenu::get( 'core/'.$menuName, true ),
      'maintab.php'
    );

    $params = new TArray();
    $this->addMenu( $modMenu, $params );

  }//end public function display */

  /**
   * add a drop menu to the create window
   * @param WgtFolderMenu $modMenu
   * @param TFlag $params the named parameter object that was created in
   *   the controller
   * {
   *   string formId: the id of the form;
   * }
   */
  public function addMenu( $modMenu, $params )
  {

    $menu     = $this->newMenu
    (
      $this->id.'_dropmenu',
      'Core_Base'
    );
    $menu->id = $this->id.'_dropmenu';

    $menu->crumbs .= $modMenu->buildCrumbs();
    $menu->buildMenu( $params );

  }//end public function addMenu */

}//end class Core_Base_Maintab_View

