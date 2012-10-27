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
class Wbfsys_Base_Maintab_Menu
  extends WgtDropmenu
{

  /**
  * the crub menu string
  * @var string
  */
  public $crumbs = null;

  /**
   * build the window menu
   * @param TArray $params
   */
  public function buildMenu( $params )
  {
  
    // benötigte resourcen laden
    $acl     = $this->getAcl();
    $view     = $this->getView();
    $user    = $this->getUser();
    $access   = $params->access;

    $iconMisc         = $this->view->icon('control/misc.png'      ,'Misc');
    $iconClose         = $this->view->icon('control/close.png'      ,'Close');
    $iconEntity         = $this->view->icon('control/entity.png'      ,'Entity');
    $iconSearch         = $this->view->icon('control/search.png'      ,'Search');


    $entries = new TArray();


    $this->content = <<<HTML
    
  <div class="inline" >
    <button 
      class="wcm wcm_control_dropmenu wgt-button"
      id="{$this->id}-control" 
      wgt_drop_box="{$this->id}"  ><div class="left" >{$this->view->i18n->l('Menu','wbf.label')}</div><div class="right" ><span class="ui-icon ui-icon-triangle-1-s right"  > </span></div></button>
      <var id="{$this->id}-control-cfg-dropmenu"  >{"triggerEvent":"click"}</var>
  </div>
    
  <div class="wgt-dropdownbox" id="{$this->id}" >


    <ul>
{$entries->support}
    </ul>
    <ul>
      <li>
        <a class="wgtac_close" >{$iconClose} {$this->view->i18n->l( 'Close', 'wbf.label' )}</a>
      </li>
    </ul>


</div>
HTML;

    $this->content .= $this->crumbs;

    $this->content .= <<<HTML
<div class="right" >
  <input
    type="text"
    id="wgt-input-webfrap_navigation_search-tostring"
    name="key"
    class="large wcm wcm_ui_autocomplete wgt-ignore"  />
  <var class="wgt-settings" >{
      "url"  : "ajax.php?c=Webfrap.Navigation.search&amp;key=",
      "type" : "ajax"
    }</var>
  <button
    id="wgt-button-webfrap_navigation_search"
    class="wgt-button append" >
    {$iconSearch}
  </button>
  
</div>
HTML;
    
  }//end public function buildMenu */

}//end class Wbfsys_Base_Maintab_Menu

