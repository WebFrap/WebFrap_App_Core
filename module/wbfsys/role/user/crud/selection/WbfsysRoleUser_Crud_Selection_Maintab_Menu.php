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
class WbfsysRoleUser_Crud_Selection_Maintab_Menu
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
    $user    = $this->getUser();
    $access   = $params->access;

    $iconClose         = $this->view->icon('control/close_tab.png'      ,'Close');


    $entries = new TArray();
    $entries->support  = $this->entriesSupport( $params );


    $this->content = <<<HTML
  <div class="inline" >
    <button 
      class="wcm wcm_ui_button"
      wgt_drop_box="{$this->id}"
      id="{$this->id}-control" ><div class="left" >{$this->view->i18n->l('Menu','wbf.label')}</div><div class="right" ><span class="ui-icon ui-icon-triangle-1-s right"  > </span></div></button>
  </div>
  
  <div class="wgt-dropdownbox" id="{$this->id}" >
    <ul>
{$entries->support}
    </ul>
    <ul>
      <li>
        <a class="wgtac_close" >{$iconClose} {$this->view->i18n->l('Close','wbf.label')}</a>
      </li>
    </ul>
  </div>

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
            href="modal.php?c=Webfrap.Docu.open&amp;key=wbfsys_role_user-table" >{$iconHelp} {$this->view->i18n->l('Help','wbf.label')}</a></li>


					<!--
          <li><a 
            class="wcm wcm_req_ajax" 
            href="modal.php?c=Wbfsys.Issue.create&amp;context=table" >{$iconBug} {$this->view->i18n->l('Bug','wbf.label')}</a></li>
					-->



          </ul>
        </span>
      </li>

HTML;

    return $html;
  }//end public function entriesSupport */

}//end class WbfsysRoleUser_Crud_Selection_Maintab_Menu

