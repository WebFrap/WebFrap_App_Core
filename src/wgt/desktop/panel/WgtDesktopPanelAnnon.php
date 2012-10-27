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
 * @subpackage annon
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WgtDesktopPanelAnnon
  extends WgtDesktopPanel
{
////////////////////////////////////////////////////////////////////////////////
// attributes
////////////////////////////////////////////////////////////////////////////////


  /**
  * @return string
  */
  public function build()
  {

    $user     = $this->getUser();
    //$mainmenu = $user->getProfile()->getMainMenu();

    $menuSeparator   = $this->image('wgt/menu.separator.png',array('alt'=>'sep'),true);
    $quickSeparator  = $this->image('wgt/quick.separator.png',array('alt'=>'sep'),true);

    $html = <<<HTML
<div id="wbf-ui-panel" class="ui-widget-header" >
  <div class="wgt-menu" >

    <!-- margin 120px needed to keep the space for the mainmenu -->
    <div class="wgt-piece left" style="width:600px;overflow:hidden;" >
    <div class="inline" >
      <a href="./" style="border:0px;" >
      {$this->image('wgt/header.png',array('alt'=>'header'),true)}
      </a>
    </div>
    <div class="inline" >{$menuSeparator}</div>
    <div class="inline" >{$menuSeparator}</div>
    <div class="inline" style="padding-top:3px;padding-left:5px;padding-right:5px;"  >
    {$this->getProfileSelectbox()}
    </div>

      <div class="right" >
        {$this->image('wgt/bg_panel_changeover.png',array('alt'=>'header'),true)}
      </div>

    </div>

    <div id="wbf_maintab_bar" class="bar" >
      <div id="wgt-maintab-head" ></div>
    </div>

  </div>
</div>
HTML;

    return $html;

  }//end public function build */


}//end class WgtDesktopPanelAnnon

