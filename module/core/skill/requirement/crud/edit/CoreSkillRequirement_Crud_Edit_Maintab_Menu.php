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
class CoreSkillRequirement_Crud_Edit_Maintab_Menu
  extends WgtDropmenu
{

////////////////////////////////////////////////////////////////////////////////
// menu: edit
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * add a drop menu to the create window
   *
   * @param TFlag $params the named parameter object that was created in
   *   the controller
   * {
   *   string formId: the id of the form;
   * }
   */
  public function buildMenu( $objid, $params )
  {
  
    // benötigte resourcen laden
    $acl     = $this->getAcl();
    $view    = $this->getView();
    $user    = $this->getUser();
    $access   = $params->access;
  
    $iconEdit        = $view->icon( 'control/save.png', 'Save' );
    $iconSaveUCl     = $view->icon( 'control/save_u_close.png', 'Save and Close' );
    $iconRights      = $view->icon( 'control/rights.png', 'Rights' );
    $iconBookmark    = $view->icon( 'control/bookmark.png', 'Bookmark' );
    $iconClose       = $view->icon( 'control/close_tab.png', 'Close' );
    $iconBack        = $view->icon( 'arrows/arrow_up.png', 'Back to List' );
    
    $iconMgmt      = $view->icon( 'relation/management.png', 'Management' );
    $iconEntity    = $view->icon( 'relation/entity.png', 'Entity' );


    $entries = new TArray();
    if( $params->access->maintenance )
    {
      $entries->masks  = $this->switchMask( $objid, $params );
    }
    $entries->support  = $this->entriesSupport( $objid, $params );
    $entries->exports  = $this->entriesExport( $objid, $params );

    // prüfen ob die person zugriff auf die wartungsmenüs hat
    if( $params->access->maintenance )
    {
      $entries->maintenance  = $this->entriesMaintenance( $objid, $params );
    }

    // prüfen ob der aktuelle benutzer überhaupt den Eintrag speichern darf
    if( $params->access->update )
    {

      $entries->buttonUpdate = <<<BUTTON
      
    <div 
      id="{$this->id}-cruddrop"  
      class="wcm wcm_control_split_button inline" style="margin-left:3px;" >
      <button 
        class="wcm wcm_ui_tip-top wgt-button wgtac_edit splitted"  >{$iconEdit} {$view->i18n->l('Save','wbf.label')}</button><button 
        id="{$this->id}-cruddrop-split" 
        class="wgt-button append"
        style="margin-left:-4px;"
        wgt_drop_box="{$this->id}-cruddropbox" ><span class="ui-icon ui-icon-triangle-1-s" style="height:10px;" >&nbsp;</span></button>
      <var id="{$this->id}-cruddrop-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
    </div>
    
    <div class="wgt-dropdownbox" id="{$this->id}-cruddropbox" >
      <ul id="{$this->id}-cruddrop-menu"  >
        <li><a
          class="wcm wcm_ui_tip-top wgtac_save_a_close"
          title="Save the Skill Requirement and close the Tab after saving" >{$iconSaveUCl} {$view->i18n->l('Save &amp; Close','wbf.label')}</a></li>
      </ul>
      
    </div>

BUTTON;

    }
      

    if( $params->access->admin )
    {

      $entries->entryAcls = <<<HTML
      


HTML;

    }


    $customButtons = '';


    $this->content = <<<HTML
    
<div class="inline" >
  <button 
    class="wcm wcm_control_dropmenu wgt-button"
    id="{$this->id}-control" 
    wgt_drop_box="{$this->id}"  ><div class="left" >{$this->view->i18n->l('Menu','wbf.label')}</div><div class="right" ><span class="ui-icon ui-icon-triangle-1-s right"  > </span></div></button>
</div>
    
<div class="wgt-dropdownbox" id="{$this->id}" >
    
  <ul>
    <li>
      <a class="wgtac_bookmark" >{$iconBookmark} {$view->i18n->l('Bookmark', 'wbf.label')}</a>
    </li>
  </ul>

  <ul>
{$entries->customStart}
{$entries->masks}
{$entries->profiles}
{$entries->exports}
{$entries->compare}
{$entries->report}
{$entries->maintenance}
{$entries->entryAcls}
{$entries->customEnd}
{$entries->support}
  </ul>
  
  <ul>
    <li>
      <a class="wgtac_close" >{$iconClose} {$view->i18n->l('Close', 'wbf.label')}</a>
    </li>
  </ul>
  
</div>

{$entries->buttonUpdate}

{$customButtons}

HTML;


    if( $params->aclLevel && $params->aclLevel > 1  && $params->aclRootId && $params->maskRoot )
    {

    	$this->content .= <<<HTML

  <div class="wgt-panel-control" >
    <button
      class="wcm wcm_ui_button wgtac_back_to_list wcm_ui_tip-top"
      title="Go back to the main form" >{$iconBack} {$view->i18n->l('Back to top','wbf.label')}</button>
  </div>

HTML;

    }
    else
    {

    	$this->content .= <<<HTML

  <div class="wgt-panel-control" >
    <button
      class="wcm wcm_ui_button wgtac_back_to_list wcm_ui_tip-top"
      title="Go back to the Skill Requirements list" >{$iconBack} {$view->i18n->l('Back to the list','wbf.label')}</button>
  </div>

HTML;

    }
    

  }//end public function buildMenu */

  /**
   * build the window menu
   * @param int $objid
   * @param TArray $params
   */
  protected function entriesSupport( $objid, $params )
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
            href="modal.php?c=Webfrap.Docu.open&amp;key=core_skill_requirement-edit" >{$iconHelp} {$this->view->i18n->l('Help','wbf.label')}</a></li>

          
          <!--
          <li><a 
            class="wcm wcm_req_ajax" 
            href="modal.php?c=Wbfsys.Issue.create&amp;context=edit" >{$iconBug} {$this->view->i18n->l('Bug','wbf.label')}</a></li>
          -->
          

          
          
        </ul>
        </span>
      </li>

HTML;

    return $html;
  }//end public function entriesSupport */

  /**
   * build the window menu
   * @param TArray $params
   */
  protected function switchMask( $objid, $params )
  {

    $acl  = $this->getAcl();
    $user = $this->getUser();

    return null;


  }//end public function switchMask */

  /**
   * build the window menu
   * @param TArray $params
   */
  protected function entriesMaintenance( $objid, $params )
  {

    $iconMaintenance         = $this->view->icon('control/maintenance.png'      ,'Maintenance');
    $iconStats         = $this->view->icon('control/stats.png'      ,'Stats');
    $iconProtocol         = $this->view->icon('control/protocol.png'      ,'Protocol');
    $iconMetaData         = $this->view->icon('control/meta.png'      ,'Meta');



    $html = <<<HTML

      <li>
        <a class="deeplink" >{$iconMaintenance} {$this->view->i18n->l( 'Maintenance', 'wbf.label' )}</a>
        <span>
        <ul>


          <li>
            <a class="wcm wcm_req_ajax" href="modal.php?c=Maintenance.Entity.protocolDataset&dkey=core_skill_requirement&amp;objid={$objid}" >{$iconProtocol} {$this->view->i18n->l( 'Protocol', 'wbf.label' )}</a>
          </li>


          <li>
            <a class="wcm wcm_req_ajax" href="modal.php?c=Maintenance.Entity.statsDataset&dkey=core_skill_requirement&amp;objid={$objid}" >{$iconStats} {$this->view->i18n->l( 'Stats', 'wbf.label' )}</a>
          </li>


          <li>
            <a class="wcm wcm_req_ajax" href="modal.php?c=Maintenance.Entity.showMeta&dkey=core_skill_requirement&amp;objid={$objid}" >{$iconMetaData} {$this->view->i18n->l( 'Meta Data', 'wbf.label' )}</a>
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
  protected function entriesExport( $objid, $params )
  {
    // keine exports vorhanden
    return '';
  }//end public function entriesExport */

}//end class CoreSkillRequirement_Crud_Edit_Maintab_Menu

