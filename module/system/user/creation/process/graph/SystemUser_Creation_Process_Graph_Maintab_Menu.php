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
class SystemUser_Creation_Process_Graph_Maintab_Menu
  extends WgtDropmenu
{
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
    $acl   = $this->getAcl();
    $view  = $this->getView();

    $iconHistory   = $view->icon(  'process/history.png',   'History'  );
    $iconClose     = $view->icon(  'control/close_tab.png',   'Close'    );

    $entries = new TArray();
    $entries->support  = $this->entriesSupport( $params );


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
        <a class="wgtac_close" >{$iconClose} {$view->i18n->l('Close','wbf.label')}</a>
      </li>
    </ul>
  </div>
  
  <div class="wgt-panel-control" >
    <button 
    	class="wcm wcm_ui_button wgtac_process_history" >{$iconHistory} {$view->i18n->l('History','wbf.label')}</button>
  </div>
  
  <div class="wgt-panel-control" >
    <button
        class="wcm wcm_ui_dropform wcm_ui_tip-top wgt-button ui-state-default" 
        id="wgt-help-system_user-creation-pgraph"
        tooltip="Click to open the help text."
      ><div class="left ui-icon ui-icon-info"> </div></button>
      
    <div class="wgt-help-system_user-creation-pgraph hidden" >
    	<ul>
    		<li>
    			<div class="node start" >Start Node</div>
    			Startpoint for the process.
    	  </li>
    		<li>
    			<div class="node default" >Process Node</div>
    			Default Process Node.
    	  </li>
    		<li>
    			<div class="node default active" >Active Node</div>
    			Shows the actual position of the process.
    	  </li>
    	</li>
    </div>
    
  </div>

HTML;

  }//end public function buildMenu */

  /**
   * build the window menu
   * @param TArray $params
   */
  protected function entriesSupport( $params )
  {

    $iconSupport  = $this->view->icon( 'control/support.png'  ,'Support');
    $iconBug      = $this->view->icon( 'control/bug.png'      ,'Bug');
    $iconFaq      = $this->view->icon( 'control/faq.png'      ,'Faq');
    $iconHelp     = $this->view->icon( 'control/help.png'     ,'Help');


    $html = <<<HTML

      <li>
        <a>{$iconSupport} {$this->view->i18n->l('Support','wbf.label')}</a>
        <span>
          <ul>
            
            <li><a 
              class="wcm wcm_req_ajax" 
              href="modal.php?c=Webfrap.Help.display&amp;key=process-{$params->process->getProcessId()}" 
              >{$iconHelp} {$this->view->i18n->l('Help','wbf.label')}</a>
             </li>
            <!--
            <li><a 
              class="wcm wcm_req_ajax" 
              href="modal.php?c=Wbfsys.Issue.create&amp;context=create" 
              >{$iconBug} {$this->view->i18n->l('Bug','wbf.label')}</a>
             </li>
             -->
            <li><a 
              class="wcm wcm_req_ajax" 
              href="modal.php?c=Webfrap.Faq.display&amp;key=process-{$params->process->getProcessId()}" 
              >{$iconFaq} {$this->view->i18n->l('FAQ','wbf.label')}</a>
            </li>
            
          </ul>
        </span>
      </li>

HTML;

    return $html;
    
  }//end public function entriesSupport */

}//end class SystemUser_Creation_Process_Graph_Maintab_Menu

