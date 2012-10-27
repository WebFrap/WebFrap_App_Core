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
class WbfsysColorNode_Table_Maintab_Menu
  extends WgtDropmenu
{
  /**
   * de:
   * zusammenbaue des dropmenüs für die maintab view
   *
   * @param TArray $params benamte parameter
   * {
   *   @param LibAclContainer access: der container mit den zugriffsrechten für
   *    die aktuelle maske
   * }
   */
  public function buildMenu( $params )
  {
  
    // benötigte resourcen laden
    $acl     = $this->getAcl();
    $view     = $this->getView();
    $user     = $this->getUser();
    $access   = $params->access;

    $iconMisc         = $this->view->icon('control/misc.png'      ,'Misc');
    $iconClose         = $this->view->icon('control/close.png'      ,'Close');
    $iconEntity         = $this->view->icon('control/entity.png'      ,'Entity');
    $iconBookmark         = $this->view->icon('control/bookmark.png'      ,'Bookmark');


    $entries = new TArray();
    $entries->listing  = $this->switchListingType( $params );

    // prüfen ob die person zugriff auf die wartungsmenüs hat
    if( $params->access->maintenance )
    {
      $entries->masks  = $entries->masks    = $this->switchMask( $params );
    }
    $entries->exports  = $this->entriesExport( $params );

    // prüfen ob die person zugriff auf die wartungsmenüs hat
    if( $params->access->maintenance )
    {
      $entries->maintenance  = $this->entriesMaintenance( $params );
    }

    // um rechte vergeben zu können werde selbst administrative rechte benötigt
    if( $params->access->admin )
    {
      $entries->acl  = $this->entriesAcl( $params );
    }
    $entries->support  = $this->entriesSupport( $params );



    // prüfen ob der aktuelle benutzer überhaupt neue einträge anlegen darf
    if( $params->access->insert )
    {
    
      $entries->buttonInsert = <<<BUTTON
  <div class="wgt-panel-control" >
    <button 
      class="wcm wcm_ui_tip wgt-button wgtac_new"
      title="Create a new Color Node"  ><div class="left ui-icon ui-icon-circle-plus"> </div> <div class="inline" > {$this->view->i18n->l('New','wbf.label')}</div></button>
  </div>

BUTTON;

    }


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
        <a class="wgtac_bookmark" >{$iconBookmark} {$this->view->i18n->l('Bookmark','wbf.label')}</a>
      </li>
    </ul>
    <ul>
{$entries->print}
{$entries->masks}
{$entries->exports}

{$entries->compare}
{$entries->report}
{$entries->maintenance}
{$entries->acl}

{$entries->support}
    </ul>
    <ul>
      <li>
        <a class="wgtac_close" >{$iconClose} {$this->view->i18n->l('Close','wbf.label')}</a>
      </li>
    </ul>
  </div>
  
{$entries->listing}
{$entries->buttonInsert}


{$customButtons}

  <div class="wgt-panel-control" >
    <button 
      class="wcm wcm_ui_tip wgt-button wgtac_back_to_desktop"
      tooltip="Go back to the Desktop"  ><div class="left ui-icon ui-icon-arrowthick-1-n"> </div><div class="inline" > {$this->view->i18n->l('Back to Desktop','wbf.label')}</div></button>
  </div>
  
  <div class="wgt-panel-control" >
    <button
        class="wcm wcm_ui_dropform wcm_ui_tip-top wgt-button ui-state-default" 
        id="wgt-help-wbfsys_color_node-table-help"
        tooltip="Click to open the help text."
      ><div class="left ui-icon ui-icon-info"> </div></button>
      
    <div class="wgt-help-wbfsys_color_node-table-help hidden" >
    	      
<p>This is the Color Node table.</p>

<label class="hint" >Hint</label>
<p class="hint" >
	You can perform more complexe searches with the "extended search".
	Klick in the down arrow of the search button and select "extended search".
<p>



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
    return null;

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
        <a class="wcm wcm_req_ajax" href="modal.php?c=Maintenance.Entity.protocolEntity&dkey=wbfsys_color_node" >{$iconProtocol} {$this->view->i18n->l( 'Protocol', 'wbf.label' )}</a>
      </li>


      <li>
        <a class="wcm wcm_req_ajax" href="modal.php?c=Maintenance.Entity.statsEntity&dkey=wbfsys_color_node" >{$iconStats} {$this->view->i18n->l( 'Stats', 'wbf.label' )}</a>
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
            href="modal.php?c=Webfrap.Docu.open&amp;key=wbfsys_color_node-table" >{$iconHelp} {$this->view->i18n->l('Help','wbf.label')}</a></li>


          <li><a 
            class="wcm wcm_req_ajax" 
            href="modal.php?c=Wbfsys.Issue.create&amp;context=table" >{$iconBug} {$this->view->i18n->l('Bug','wbf.label')}</a></li>



          </ul>
        </span>
      </li>

HTML;

    return $html;
  }//end public function entriesSupport */

  /**
   * build the acl submenu tree
   * @param int $objid
   * @param TArray $params
   */
  protected function entriesAcl( $params )
  {

    $iconAcl         = $this->view->icon('control/rights.png'      ,'Rights');
    $iconMgmt         = $this->view->icon('relation/management.png'      ,'Management');
    $iconEntity         = $this->view->icon('relation/entity.png'      ,'Entity');


    $html = <<<HTML

    <li>
      <a class="deeplink" >{$iconAcl} {$this->view->i18n->l( 'ACLs', 'wbf.label' )}</a>
      <span>
      <ul>
                  <li><a class="wcm wcm_req_ajax" href="maintab.php?c=Wbfsys.ColorNode_Acl.listing" >{$iconMgmt} {$this->view->i18n->l( 'ACLs Entity', 'wbf.label' )}</a></li>
      </ul>
      </span>
    </li>

HTML;

    return $html;

  }//end public function entriesAcl */

}//end class WbfsysColorNode_Table_Maintab_Menu

