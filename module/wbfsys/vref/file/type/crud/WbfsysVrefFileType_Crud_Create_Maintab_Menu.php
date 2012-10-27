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
class WbfsysVrefFileType_Crud_Create_Maintab_Menu
  extends WgtDropmenu
{
////////////////////////////////////////////////////////////////////////////////
// menu: create
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
  public function buildMenu( $params )
  {
  
    // benötigte resourcen laden
    $acl     = $this->getAcl();
    $view     = $this->getView();
    $user    = $this->getUser();
    $access   = $params->access;

    $iconCreate    = $view->icon('control/create.png', 'Create');
    $iconCreateCl  = $view->icon('control/create_close.png', 'Create and close');
    $iconBookmark  = $view->icon('control/bookmark.png', 'Bookmark');
    $iconClose     = $view->icon('control/close.png', 'Close');

    $entries = new TArray();
    $entries->support  = $this->entriesSupport( $params );

    // prüfen ob der aktuelle benutzer überhaupt neue einträge anlegen darf
    if( $params->access->insert )
    {

      $entries->buttonInsert = <<<BUTTON

    <div 
      id="{$this->id}-cruddrop" 
      class="wcm wcm_control_split_button inline" style="margin-left:3px;"  >
    
      <button 
        class="wcm wcm_ui_tip-top wgt-button wgtac_create  splitted"  >{$iconCreate} {$view->i18n->l('Create','wbf.label')}</button><button 
        id="{$this->id}-cruddrop-split" 
        class="wgt-button append" 
        style="margin-left:-4px;"
        wgt_drop_box="{$this->id}-cruddropbox" ><span class="ui-icon ui-icon-triangle-1-s" style="height:10px;" >&nbsp;</span></button>
      
    </div>
    
    <div class="wgt-dropdownbox" id="{$this->id}-cruddropbox" >
    
      <ul>
        <li><a
          class="wcm wgtac_create_a_close wcm_ui_tip-top"
          title="Create the new Vref File Type and close the Tab after saving" >{$iconCreateCl} {$view->i18n->l('Create & Close','wbf.label')}</a></li>
        <li><a
          class="wcm wgtac_create_a_next wcm_ui_tip-top"
          title="Create the new Vref File Type and open a new create mask" >{$iconCreateCl} {$view->i18n->l('Create & Next','wbf.label')}</a></li>
      </ul>
      
      <var id="{$this->id}-cruddrop-cfg"  >{"triggerEvent":"click","align":"right"}</var>
    </div>

BUTTON;

    }
      


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
{$entries->custom}
{$entries->support}
  </ul>
  
  <ul>
    <li>
      <a class="wgtac_close" >{$iconClose} {$view->i18n->l('Close','wbf.label')}</a>
    </li>
  </ul>
  
</div>

{$entries->buttonInsert}
{$entries->customButton}

HTML;

  }//end public function buildMenu */

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
            href="modal.php?c=Webfrap.Docu.open&amp;key=wbfsys_vref_file_type-create" >{$iconHelp} {$this->view->i18n->l('Help','wbf.label')}</a></li>


          <li><a 
            class="wcm wcm_req_ajax" 
            href="modal.php?c=Wbfsys.Issue.create&amp;context=create" >{$iconBug} {$this->view->i18n->l('Bug','wbf.label')}</a></li>



          </ul>
        </span>
      </li>

HTML;

    return $html;
  }//end public function entriesSupport */

}//end class WbfsysVrefFileType_Crud_Create_Maintab_Menu

