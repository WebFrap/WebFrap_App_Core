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
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysUserSettingValue_Acl_Maintab_Menu
  extends WgtDropmenu
{

	/**
	* @var DomainNode
	*/
	public $domainNode = null;

////////////////////////////////////////////////////////////////////////////////
// Menu Logic
////////////////////////////////////////////////////////////////////////////////

  /**
   * build the dropmenu for the maintab
   *
   * @param int $areaId
   * @param TFlag $params the named parameter object that was created in
   *   the controller
   * {
   *   string formId: the id of the form;
   * }
   */
  public function buildMenu( $areaId, $params )
  {
  
    $access           = $params->access;
    $user            = $this->getUser();

    // first create icons
    $iconEdit        = $this->view->icon('control/save.png'      , 'Save' );
    $iconBookmark    = $this->view->icon('control/bookmark.png'  , 'Bookmark' );
    $iconClose       = $this->view->icon('control/close.png'     , 'Close' );
    $iconMasks       = $this->view->icon('control/masks.png'     , 'Masks' );
    $iconMask        = $this->view->icon('control/mask.png'      , 'Mask' );
    
    $iconUser        = $this->view->icon( 'control/user.png'      , 'User' );
    $iconGroup       = $this->view->icon( 'control/group.png'     , 'Group' );
    $iconDset        = $this->view->icon( 'control/dset.png'      , 'Dset' );
    

    
    // load entries
    $entries = new TArray();
    $entries->support  = $this->entriesSupport( $areaId, $params );
    $entries->masks    = $this->switchMask( $params );

    // assemble all parts to the menu markup
    $this->content = <<<HTML
    
  <div class="inline" >
    <button 
      class="wcm wcm_control_dropmenu wgt-button"
      wgt_drop_box="{$this->id}"
      id="{$this->id}-control" ><div class="left" >{$this->view->i18n->l('Menu','wbf.label')}</div><div class="right" ><span class="ui-icon ui-icon-triangle-1-s right"  > </span></div></button>
    <var id="{$this->id}-control-cfg-dropmenu"  >{"triggerEvent":"click"}</var>
  </div>
  
  <div class="wgt-dropdownbox" id="{$this->id}" >
    
    <ul>
      <li>
        <a class="wgtac_bookmark" >{$iconBookmark} {$this->view->i18n->l( 'Bookmark', 'wbf.label' )}</a>
      </li>
    </ul>
    <ul>
{$entries->masks}

{$entries->support}
    </ul>
    <ul>
      <li>
        <a class="wgtac_close" >{$iconClose} {$this->view->i18n->l( 'Close', 'wbf.label' )}</a>
      </li>
    </ul>

  </div>

  


  <div class="wgt-panel-control"  >
    <button 
      class="wcm wgt-button wgtac_edit wcm_ui_tip"
      title="Save Changes" >{$iconEdit} {$this->view->i18n->l('Save','wbf.label')}</button>
  </div>
  
  <div 
  	class="wgt-panel-control {$this->view->id}-wbfsys_user_setting_value-acl box-qfd_users"
  	style="display:none;"
  	 >
    <div 
    	class="wcm wcm_control_buttonset wcm_ui_radio_tab wgt-button-set" 
    	wgt_body="tab-box-{$this->domainNode->domainName}-acl-content"
    	id="{$this->id}-boxtype" >
      <input 
      	type="radio" 
      	class="{$this->id}-boxtype" 
      	id="{$this->id}-boxtype-group"
      	value="groups"
      	name="grouping" 
      	checked="checked" /><label 
      		for="{$this->id}-boxtype-group" 
      		class="wcm wcm_ui_tip-top"  
      		tooltip="Group by group"  >{$iconGroup}</label>
      <input 
      	type="radio" 
      	class="{$this->id}-boxtype" 
      	id="{$this->id}-boxtype-user" 
      	wgt_src="ajax.php?c=Acl.Mgmt_Qfdu.listByUsers&dkey={$this->domainNode->domainName}"
      	value="users"
      	name="grouping"  /><label 
      		for="{$this->id}-boxtype-user" 
      		class="wcm wcm_ui_tip-top" 
      		tooltip="Group by user" >{$iconUser}</label>
      <input 
      	type="radio"
      	class="{$this->id}-boxtype" 
      	id="{$this->id}-boxtype-dset" 
      	wgt_src="ajax.php?c=Acl.Mgmt_Qfdu.listByDsets&dkey={$this->domainNode->domainName}"
      	value="dsets"
      	name="grouping" /><label 
      		for="{$this->id}-boxtype-dset" 
      		class="wcm wcm_ui_tip-top" 
      		tooltip="Group by {$this->domainNode->label}" >{$iconDset}</label>
    </div>
  </div>

HTML;

  }//end public function buildMenu */

  /**
   * build the support submenu part
   *
   * @param TArray $params named parameter / control flags
   */
  protected function entriesSupport( $areaId, $params )
  {

    // first create icons
    $iconSupport  = $this->view->icon(  'control/support.png'  ,'Support');
    $iconBug      = $this->view->icon(  'control/bug.png'      ,'Bug'  );
    $iconFaq      = $this->view->icon(  'control/faq.png'      ,'Faq'  );
    $iconHelp     = $this->view->icon(  'control/help.png'     ,'Help' );

    // assemble al parts to the html submenu
    $html = <<<HTML

  <li>
    <a class="deeplink" >{$iconSupport} {$this->view->i18n->l('Support','wbf.label')}</a>
    <span>
      <ul>
        <li><a 
          class="wcm wcm_req_ajax" 
            href="modal.php?c=Webfrap.Docu.show&amp;key=wbfsys_user_setting_value-acl" >{$iconHelp} {$this->view->i18n->l('Help','wbf.label')}</a>
        </li>
        <!--
        <li><a 
          class="wcm wcm_req_ajax" 
          href="modal.php?c=Wbfsys.Issue.create&amp;refer=wbfsys_user_setting_value-acl" >{$iconBug} {$this->view->i18n->l('Bug','wbf.label')}</a>
        </li>
        -->
        <li><a 
          class="wcm wcm_req_ajax" 
          href="modal.php?c=Wbfsys.Faq.create&amp;refer=wbfsys_user_setting_value-acl" >{$iconFaq} {$this->view->i18n->l('Faq','wbf.label')}</a>
        </li>
      </ul>
    </span>
  </li>

HTML;

    return $html;

  }//end public function entriesSupport */

  /**
   * inject the menu logic in the maintab object.
   * the javascript will be executed after the creation of the tab in the browser
   *
   * @param WbfsysUserSettingValue_Acl_Maintab $view
   * @param int $areaId
   * @param TArray $params
   */
  public function injectMenuLogic( $view, $areaId, $params  )
  {

    // add the button actions for new and search in the window
    // the code will be binded direct on a window object and is removed
    // on window Close
    // all buttons with the class save will call that action
    $code = <<<BUTTONJS

    self.getObject().find(".wgtac_edit").click(function(){
      \$R.form('{$params->formId}');
      \$S('#{$this->id}-control').dropdown('close');
    });
    
    self.getObject().find(".wgtac_mask_entity_rights").click(function(){
      \$S('#{$this->id}-control').dropdown('remove');
      self.close( );
      \$R.get( 'maintab.php?c=Mgmt.Acl.listing&dkey=wbfsys_user_setting_value' );
    });
    
    self.getObject().find(".wgtac_masks_overview").click(function(){
      \$R.get( 'modal.php?c=Mgmt.Acl.listAllMasks&dkey=wbfsys_user_setting_value' );
      \$S('#{$this->id}-control').dropdown('close');
    });
    

    self.getObject().find('#wgt-button-wbfsys_user_setting_value-acl-form-append').click(function(){
    
      if(\$S('#wgt-input-wbfsys_user_setting_value-acl-id_group').val()==''){
        \$D.errorWindow('Error','Please select a group first');
        return false;
      }

      \$R.form('wgt-form-wbfsys_user_setting_value-acl-append');
      \$S('#wgt-form-wbfsys_user_setting_value-acl-append').get(0).reset();
      return false;

    });



    self.getObject().find(".wgtac_close").click(function(){
      \$S('#{$this->id}-control').dropdown('remove');
      self.close( );
    });

BUTTONJS;

    $view->addJsCode($code);

  }//end public function injectMenuLogic */

  /**
   * build the window menu
   * @param TArray $params
   */
  protected function switchMask( $params )
  {

    $acl   = $this->getAcl();
    $user  = $this->getUser();

    return null;


  }//end public function switchMask */

} // end class WbfsysUserSettingValue_Acl_Maintab_Menu */

