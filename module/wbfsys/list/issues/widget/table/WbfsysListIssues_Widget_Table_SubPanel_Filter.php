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
 * @subpackage ModListIssues
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysListIssues_Widget_Table_SubPanel_Filter
  extends WgtSubPanel
{    
  /**
   * @return string
   */
  public function render()
  {
  
    $i18n     = $this->getI18n();
    $acl       = $this->getAcl();
    $user    = $this->getUser();
    $access  = $this->access;
  
    $controls         = '';
    $hiddenControls  = '';

    $checkednewIssues = $this->filterStatus->new_issues
      ? 'checked="checked"'
      : '';
    
    $controls .= <<<HTML
        <li>
          <a 
            id="wgt-button-table-{$this->searchKey}-control-filter-new_issues"
            class="wcm wcm_control_check_button wcm_ui_docu_tip"
            wgt_doc_src="wgt-search-table-{$this->searchKey}-control-filter-new_issues-docu"
            wgt_doc_cnt="wgt-search-table-{$this->searchKey}-control-docu_cont"
            >
            <input 
              type="checkbox"  
              id="wgt-filter-wbfsys_list_issues-new_issues"
              name="filter[new_issues]"{$checkednewIssues}
              value="1"
              class="wcm wcm_req_search wgt-no-save fparam-{$this->formId}" />
              
             {$i18n->l( 'New Issues', 'wbfsys.issue.label' )}
          </a> 
        </li>
        <var id="wgt-search-table-{$this->searchKey}-control-filter-new_issues-docu" ></var>
HTML;

    $checkedclosedIssues = $this->filterStatus->closed_issues
      ? 'checked="checked"'
      : '';
    
    $controls .= <<<HTML
        <li>
          <a 
            id="wgt-button-table-{$this->searchKey}-control-filter-closed_issues"
            class="wcm wcm_control_check_button wcm_ui_docu_tip"
            wgt_doc_src="wgt-search-table-{$this->searchKey}-control-filter-closed_issues-docu"
            wgt_doc_cnt="wgt-search-table-{$this->searchKey}-control-docu_cont"
            >
            <input 
              type="checkbox"  
              id="wgt-filter-wbfsys_list_issues-closed_issues"
              name="filter[closed_issues]"{$checkedclosedIssues}
              value="1"
              class="wcm wcm_req_search wgt-no-save fparam-{$this->formId}" />
              
             {$i18n->l( 'Hide Closed', 'wbfsys.issue.label' )}
          </a> 
        </li>
        <var id="wgt-search-table-{$this->searchKey}-control-filter-closed_issues-docu" ></var>
HTML;

    $checkedmyAssignedIssued = $this->filterStatus->my_assigned_issued
      ? 'checked="checked"'
      : '';
    
    $controls .= <<<HTML
        <li>
          <a 
            id="wgt-button-table-{$this->searchKey}-control-filter-my_assigned_issued"
            class="wcm wcm_control_check_button wcm_ui_docu_tip"
            wgt_doc_src="wgt-search-table-{$this->searchKey}-control-filter-my_assigned_issued-docu"
            wgt_doc_cnt="wgt-search-table-{$this->searchKey}-control-docu_cont"
            >
            <input 
              type="checkbox"  
              id="wgt-filter-wbfsys_list_issues-my_assigned_issued"
              name="filter[my_assigned_issued]"{$checkedmyAssignedIssued}
              value="1"
              class="wcm wcm_req_search wgt-no-save fparam-{$this->formId}" />
              
             {$i18n->l( 'My Assigned Issues', 'wbfsys.issue.label' )}
          </a> 
        </li>
        <var id="wgt-search-table-{$this->searchKey}-control-filter-my_assigned_issued-docu" ></var>
HTML;

    $checkedmyCreatedIssued = $this->filterStatus->my_created_issued
      ? 'checked="checked"'
      : '';
    
    $controls .= <<<HTML
        <li>
          <a 
            id="wgt-button-table-{$this->searchKey}-control-filter-my_created_issued"
            class="wcm wcm_control_check_button wcm_ui_docu_tip"
            wgt_doc_src="wgt-search-table-{$this->searchKey}-control-filter-my_created_issued-docu"
            wgt_doc_cnt="wgt-search-table-{$this->searchKey}-control-docu_cont"
            >
            <input 
              type="checkbox"  
              id="wgt-filter-wbfsys_list_issues-my_created_issued"
              name="filter[my_created_issued]"{$checkedmyCreatedIssued}
              value="1"
              class="wcm wcm_req_search wgt-no-save fparam-{$this->formId}" />
              
             {$i18n->l( 'My Created Issues', 'wbfsys.issue.label' )}
          </a> 
        </li>
        <var id="wgt-search-table-{$this->searchKey}-control-filter-my_created_issued-docu" ></var>
HTML;

    
    $html = '';
    if( '' != $controls )
    {
  
    $html = <<<CODE
      <div class="right" >
      
{$controls}
        
      </div>
CODE;

    }
    
    $html .= $hiddenControls;

    return $html;

  }//end public function render */
  
} // end class WbfsysListIssues_Widget_Table_SubPanel_Filter */
