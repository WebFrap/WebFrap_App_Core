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
class WbfsysMenuEntry_Treetable_Maintab_Menu
  extends WgtDropmenu
{
  /**
   * build the window menu
   * @param TArray $params
   */
  public function buildMenu( $params )
  {
  
    // benötigte resourcen laden
    $acl     = $this->getAcl();
    $view    = $this->getView();
    $access  = $params->access;

    $iconMisc         = $this->view->icon('control/misc.png'      ,'Misc');
    $iconClose         = $this->view->icon('control/close_tab.png'      ,'Close');
    $iconEntity         = $this->view->icon('control/entity.png'      ,'Entity');
    $iconBookmark         = $this->view->icon('control/bookmark.png'      ,'Bookmark');
    $iconDesktop         = $this->view->icon('arrows/arrow_up.png'      ,'Desktop');
    $iconAdd         = $this->view->icon('control/new.png'      ,'Create');


    $entries = new TArray();
    $entries->listing  = $this->switchListingType( $params );
    $entries->masks    = $this->switchMask( $params );
    $entries->exports  = $this->entriesExport( $params );
    $entries->maintenance  = $this->entriesMaintenance( $params );
    $entries->support  = $this->entriesSupport( $params );


{$entries->buttonInsert}

    $customButtons = '';


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
      <li>
        <a class="wgtac_bookmark" >{$iconBookmark} {$view->i18n->l('Bookmark','wbf.label')}</a>
      </li>
    </ul>
    <ul>
{$entries->print}
{$entries->masks}
{$entries->exports}
{$entries->compare}
{$entries->report}
{$entries->maintenance}
{$entries->support}
    </ul>
    <ul>
      <li>
        <a class="wgtac_close" >{$iconClose} {$view->i18n->l('Close','wbf.label')}</a>
      </li>
    </ul>
  </div>

{$entries->listing}
{$entries->buttonInsert}


{$customButtons}

  <div class="wgt-panel-control" >
    <button 
      class="wcm wcm_ui_tip wgt-button wgtac_back_to_desktop"
      title="Go back to the Desktop"  >{$iconDesktop} {$this->view->i18n->l('Back to Desktop','wbf.label')}</button>
  </div>
  
  <div class="wgt-panel-control" >
    <button
        class="wcm wcm_ui_dropform wcm_ui_tip-top wgt-button ui-state-default" 
        id="wgt-help-wbfsys_menu_entry-treetable-help"
        tooltip="Click to open the help text."
      ><div class="left ui-icon ui-icon-info"> </div></button>
      
    <div class="wgt-help-wbfsys_menu_entry-treetable-help hidden" >
    	      
<p>This is the Menu Entry treetable.</p>



    </div>
    
  </div>

HTML;

  }//end public function buildMenu */

  /**
   * build the window menu
   * @param TArray $params
   */
  protected function switchListingType( $params )
  {
    $iconListType         = $this->view->icon('control/listings.png'      ,'List Type');
    $iconMaTab         = $this->view->icon('control/mask_table.png'      ,'Table');
    $iconMaTreTa         = $this->view->icon('control/mask_treetable.png'      ,'Treetable');


    $html = <<<HTML
  <div class="wgt-panel-control" >
    <div id="wgt-mentry-swlt-wbfsys_menu_entry" >
      <button 
        id="wgt-mentry-swlt-wbfsys_menu_entry-table" 
        class="wcm wcm_ui_tip wgtac_view_table wgt-button"
        tooltip="Switch to the table view."  >
        {$iconMaTab}
      </button>
      <button 
        id="wgt-mentry-swlt-wbfsys_menu_entry-treetable" 
        class="wcm wcm_ui_tip wgtac_view_treetable wgt-button wgt-active" 
        tooltip="Switch to the treeable view."
        style="margin-left:-6px;" >
        {$iconMaTreTa}
      </button>

    </div>
  </div>
HTML;

    return $html;
  }//end public function switchListingType */

  /**
   * build the window menu
   * @param TArray $params
   */
  protected function switchMask( $params )
  {

    $acl = $this->getAcl();
    $user = $this->getUser();

    return null;


  }//end public function switchMask */

  /**
   * build the window menu
   * @param TArray $params
   */
  protected function entriesExport( $params )
  {
    // keine exports vorhanden
    return '';
  }//end public function entriesExport */

  /**
   * build the window menu
   * @param TArray $params
   */
  protected function entriesMaintenance( $params )
  {

    $iconMaintenance         = $this->view->icon('control/maintenance.png'      ,'Maintenance');
    $iconStats         = $this->view->icon('control/stats.png'      ,'Stats');
    $iconProtocol         = $this->view->icon('control/protocol.png'      ,'Protocol');



    $html = <<<HTML

  <li>
    <a class="deeplink" >{$iconMaintenance} {$this->view->i18n->l( 'Maintenance', 'wbf.label' )}</a>
    <span>
    <ul>


      <li>
        <a class="wcm wcm_req_ajax" href="modal.php?c=Maintenance.Entity.protocolEntity&dkey=wbfsys_menu_entry" >{$iconProtocol} {$this->view->i18n->l( 'Protocol', 'wbf.label' )}</a>
      </li>


      <li>
        <a class="wcm wcm_req_ajax" href="modal.php?c=Maintenance.Entity.statsEntity&dkey=wbfsys_menu_entry" >{$iconStats} {$this->view->i18n->l( 'Stats', 'wbf.label' )}</a>
      </li>



    </ul>
    </span>
  </li>

HTML;

    return $html;
  }//end public function entriesMaintenance */

  /**
   * build the window menu
   * @param TArray $params
   */
  protected function entriesSupport( $params )
  {

    $iconSupport         = $this->view->icon('control/support.png'      ,'Support');
    $iconBug         = $this->view->icon('control/bug.png'      ,'Bug');
    $iconFaq         = $this->view->icon('control/faq.png'      ,'Faq');
    $iconHelp         = $this->view->icon('control/help.png'      ,'Help');




    $html = <<<HTML

      <li>
        <a class="deeplink" >{$iconSupport} {$this->view->i18n->l('Support','wbf.label')}</a>
        <span>
          <ul>


          <li><a 
            class="wcm wcm_req_ajax" 
            href="modal.php?c=Webfrap.Docu.open&amp;key=wbfsys_menu_entry-treetable" >{$iconHelp} {$this->view->i18n->l('Help','wbf.label')}</a></li>


					<!--
          <li><a 
            class="wcm wcm_req_ajax" 
            href="modal.php?c=Wbfsys.Issue.create&amp;context=treetable" >{$iconBug} {$this->view->i18n->l('Bug','wbf.label')}</a></li>
					-->



          </ul>
        </span>
      </li>

HTML;

    return $html;
  }//end public function entriesSupport */

}//end class WbfsysMenuEntry_Treetable_Maintab_Menu

