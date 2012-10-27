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
class WbfsysIssue_Table_Element
  extends WgtTable
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * the html id of the table tag, this id can be used to replace the table
   * or table contents via ajax interface.
   *
   * @var string $id
   */
  public $id   = 'wgt_table-wbfsys_issue';
  
  /**
   * the most likley class of a given query object
   *
   * @var WbfsysIssue_Table_Query
   */
  public $data = null;

  /**
   * Namespace information für die Tabelle
   *
   * @var string $namespace
   */
  public $namespace   = 'WbfsysIssue';
 

  /**
   * @var string
   */
  public $bodyHeight   = 'xxlarge';

 /**
  * Laden der Urls für die Actions
  */
  public function loadUrl()
  {
  
    $this->url  = array
    (
      

      'show'    => array
      (
        Wgt::ACTION_BUTTON_GET,
        'Show',
        'maintab.php?c=Wbfsys.Issue.show&amp;target_mask=WbfsysIssue&amp;ltype=table&amp;objid=',
        'control/show.png',
        '',
        'wbfsys.issue.label',
        Acl::ACCESS,
        Acl::UPDATE
      ),

      'edit'    => array
      (
        Wgt::ACTION_BUTTON_GET,
        'Edit',
        'maintab.php?c=Wbfsys.Issue.edit&amp;target_mask=WbfsysIssue&amp;ltype=table&amp;objid=',
        'control/edit.png',
        '',
        'wbfsys.issue.label',
        Acl::UPDATE
      ),

      'ref'  => array
      (
        Wgt::ACTION_JUST_LABEL,
        'Related Data',
        null,
        'control/references.png',
        '',
        'wbfsys.issue.label',
        Acl::ACCESS,
				Wgt::BUTTON_SUB => array
        (
                    array
          (
            Wgt::ACTION_BUTTON_GET,
            'Comments',
            'modal.php?c=Wbfsys.Issue_Ref_Comments.modal&amp;objid=',
            'control/table.png',
            '',
            'wbfsys.issue.label',
          ),
          array
          (
            Wgt::ACTION_BUTTON_GET,
            'Tags',
            'modal.php?c=Wbfsys.Issue_Ref_Tags.modal&amp;objid=',
            'control/table.png',
            '',
            'wbfsys.issue.label',
          ),

        )
      ),

      'delete'  => array
      (
        Wgt::ACTION_DELETE,
        'Delete',
        'index.php?c=Wbfsys.Issue.delete&amp;target_mask=WbfsysIssue&amp;ltype=table&amp;objid=',
        'control/delete.png',
        '',
        'wbfsys.issue.label',
        Acl::DELETE
      ),

      'rights'  => array
      (
        Wgt::ACTION_BUTTON_GET,
        'Rights',
        'maintab.php?c=Wbfsys.Issue_Acl_Dset.listing&amp;objid=',
        'control/rights.png',
        '',
        'wbfsys.issue.label',
        Acl::ADMIN
      ),

      'sep'  => array
      (
        Wgt::ACTION_SEP
      ),
      'checkbox'  => array
      (
        Wgt::ACTION_CHECKBOX,
        'select',
        null,
        null,
        null,
        'wbf.label.select',
        Acl::ACCESS
      ),
  
    );

  }//end public function loadUrl */
    
////////////////////////////////////////////////////////////////////////////////
// Context: Table
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * parse the table
   *
   * @return string
   */
  public function buildHtml( )
  {    
    $conf = $this->getConf();

    // if we have html we can assume that the table was allready parsed
    // so we return just the html and stop here
    // this behaviour enables you to call a specific parser method from outside
    // of the view, but then get the html of the called parse method
    if( $this->html )
      return $this->html;
      
    if( DEBUG )
      $renderStart = Webfrap::startMeasure();

    // check for replace is used to check if this table should be pushed via ajax
    // to the client, or if the table is placed direct into a template
    if( $this->insertMode )
    {
      $this->html .= '<div id="'.$this->id.'" class="wgt-grid" >'.NL;
      $this->html .= '<var id="'.$this->id.'-table-cfg-grid" >{
        "height":"'.$this->bodyHeight.'",
        "search_form":"'.$this->searchForm.'"
      }</var>';
      $this->html .= $this->buildPanel();

      $this->html .= '<table id="'.$this->id
        .'-table" class="wgt-grid wcm wcm_widget_grid hide-head" >'.NL;
        
      $this->html .= $this->buildThead();
    }

    $this->html .= $this->buildTbody();

    // check for replace is used to check if this table should be pushed via ajax
    // to the client, or if the table is placed direct into a template
    if( $this->insertMode )
    {
      $this->html .= '</table>';

      $this->html .= $this->buildTableFooter();
      $this->html .= '</div>'.NL;
      
      if( $conf->getStatus( 'grid.context_menu.enabled' ) )
      {
        $this->html .= $this->buildContextMenu();
      }



      $this->html .= '<script type="text/javascript" >'.NL;
      $this->html .= $this->buildJavascript();
      $this->html .= '</script>'.NL;

    }
    
    if( DEBUG )
      Debug::console( "table ".__METHOD__." {$this->id} rendertime: ".Webfrap::getDuration($renderStart) );

    return $this->html;

  }//end public function buildHtml */

  /**
   * create the head for the table
   * @return string
   */
  public function buildThead( )
  {
    $this->numCols = 8;
    if($this->enableNav)
      ++ $this->numCols;

    // Creating the Head
    $html = '<thead>'.NL;
    $html .= '<tr>'.NL;
    $html .= '<th style="width:30px;" class="pos" >'.$this->view->i18n->l( 'Pos.', 'wbf.label'  ).'</th>'.NL;
    $html .= '<th style="width:200px" >Title</th>'.NL;
    $html .= '<th style="width:100px" >Status</th>'.NL;
    $html .= '<th style="width:120px" >Data</th>'.NL;
    $html .= '<th style="width:120px" >Plattform</th>'.NL;
    $html .= '<th style="width:150px" >Responsible</th>'.NL;
    $html .= '<th style="width:50px" >Progress</th>'.NL;
    $html .= '<th style="width:150px" >Schedule</th>'.NL;
    $html .= '<th style="width:250px" >Text</th>'.NL;

    // the default navigation col
    if( $this->enableNav )
    {
      $html .= '<th style="width:75px;">'.$this->view->i18n->l( 'Menu', 'wbf.label'  ).'</th>'.NL;
    }

    $html .= '</tr>'.NL;
    $html .= '</thead>'.NL;
    //\ Creating the Head

    return $html;

  }//end public function buildThead */

  /**
   * create the body for the table
   * @return string
   */
  public function buildTbody( )
  {    
    $conf = $this->getConf();
    

    // prüfen ob das contextmenü in der Conf aktiviert ist
    $classContext = '';
    if( $conf->getStatus( 'grid.context_menu.enabled' ) )
    {
      $classContext = ' wcm_control_context_menu';
    }



    // create the table body
    $body = '<tbody>'.NL;

    // simple switch method to create collored rows
    $pos = 1;
    $num = 1;
    foreach( $this->data as $key => $row   )
    {

      $objid       = $row['wbfsys_issue_rowid'];
      $rowid       = $this->id.'_row_'.$objid;
      

      // context menü
      $rowActions  = $this->getRowActions
      (
        $objid,
        $row
      );
      $accessActionKey = $this->hasEditRights( $row )?'edit':'show';
      
      $menuActions = '';
      if( $rowActions )
      {
        $menuActions = ' wgt_actions="'.implode( ',', $rowActions ).'" ' ;
      }
      
      // doubcle click open
      $rowWcm       = '';
      $rowParams   = '';
      $dsUrl        = null;
      // check if the row has 
      if( $dsUrl = $this->getActionUrl( $objid, $row ) )
      {
        $rowWcm     .= ' wcm_control_access_dataset';
        $rowParams .= ' wgt_url="'.$dsUrl.'" ';
      }


      
      $style = '';
            
      if( '' != trim( $row['wbfsys_process_node_bg_color'] )  )
      {
        $style .= "background-color:".trim( $row['wbfsys_process_node_bg_color'] ).';';
      }
            
      if( '' != trim( $row['wbfsys_process_node_text_color'] )  )
      {
        $style .= "color:".trim( $row['wbfsys_process_node_text_color'] ).';';
      }
      
      $body .= '<tr class="wcm wcm_ui_highlight '.$rowWcm.$classContext.' row'.$num.' node-'.$objid.'" '

        .' wgt_context_menu="'.$this->id.'-cmenu" ' 
        .$menuActions
        .$rowParams 

        .' wgt_eid="'.$objid.'" ' 
        .' id="'.$rowid.'" style="'.$style.'" >'.NL;
      $body .= '<td  valign="top" class="pos" name="slct['.$objid.']" style="text-align:right;" >'.$pos.'</td>'.NL;

      $body .= '<td valign="top" >'.Validator::sanitizeHtml($row['wbfsys_issue_title']).'</td>'.NL;
      $body .= '<td valign="top" >      <button 
        id="wgt-button-list-table-wbfsys_issue-'.$row['wbfsys_issue_rowid'].'" 
        class="wgt-button wcm wcm_ui_dropform" >
        <div class="left" >'.$this->icon( $row['wbfsys_process_node_icon'], $row['wbfsys_process_node_label'] ).'
        '.(!is_null($row['wbfsys_process_node_label'])?$row['wbfsys_process_node_label']:'No activ Process').'</div><div class="inline ui-icon ui-icon-triangle-1-s" > </div>
        <var>{"url":"ajax.php?c=Issue.Handling_Process.dropForm&amp;objid='.$row['wbfsys_issue_rowid'].'&amp;mask='.$this->namespace.'&amp;element='.$this->id.'&amp;mask_type=listing&amp;ltype=table'.$this->accessPath.'"}</var>
       </button>
</td>'.NL;
      $body .= '<td valign="top" ><em>Severity: </em><a class="wcm wcm_req_ajax" href="maintab.php?c=Wbfsys.IssueSeverity.listing" >'.Validator::sanitizeHtml($row['wbfsys_issue_severity_name']).'</a><br /><em>Priority: </em><a class="wcm wcm_req_ajax" href="maintab.php?c=Wbfsys.Priority.listing" >'.Validator::sanitizeHtml($row['wbfsys_priority_name']).'</a><br /><em>Type: </em><a class="wcm wcm_req_ajax" href="maintab.php?c=Wbfsys.IssueType.listing" >'.Validator::sanitizeHtml($row['wbfsys_issue_type_name']).'</a><br /><em>Category: </em><a class="wcm wcm_req_ajax" href="maintab.php?c=Wbfsys.Category.listing" >'.Validator::sanitizeHtml($row['wbfsys_category_name']).'</a></td>'.NL;
      $body .= '<td valign="top" ><em>OS: </em><a class="wcm wcm_req_ajax" href="maintab.php?c=Wbfsys.Os.listing" >'.Validator::sanitizeHtml($row['wbfsys_os_name']).'</a><br /><em>Browser: </em><a class="wcm wcm_req_ajax" href="maintab.php?c=Wbfsys.Browser.listing" >'.Validator::sanitizeHtml($row['wbfsys_browser_name']).'</a></td>'.NL;
      $body .= '<td valign="top" >'.NL;

      $refData = $this->refData->getEmbededRolesResponsible( $row['wbfsys_issue_rowid'] );
      
      $roleData     = array();
      $roleLabels  = array();
      
      foreach ( $refData as $refRow )
      {
        $roleData[$refRow['group_key']][$refRow['user_name']] = $refRow;
        $roleLabels[$refRow['group_key']] = $refRow['group_name'];
      }

      $body .= '<ul>'.NL;
      foreach ( $roleData as $roleKey => $roles )
      {
        $body .= '<li><strong>'.$roleLabels[$roleKey].'</strong>
          <ul>'.NL;
          
        foreach( $roles as $roleNode )
        {
          $body .= '<li>
            <a 
              class="wcm wcm_req_ajax" 
              href="modal.php?c=Webfrap.ContactForm.formUser&amp;user_id='.$roleNode['id'].'&amp;d_src=wbfsys_issue&amp;ref_id='.$row['wbfsys_issue_rowid'].'" >'
              .$roleNode['value'].'</a></li>'.NL;
        }
        
        $body .= '</ul>
          </li>'.NL;
      }
      $body .= '</ul>'.NL;
      
      $body .= '</td>'.NL;
      $body .= '<td valign="top" >      <div class="wcm wcm_ui_progress wgt_progress" >'.(!is_null($row['wbfsys_issue_progress'])?$row['wbfsys_issue_progress']:0).'</div>
</td>'.NL;
      $body .= '<td valign="top" ><em>Created: </em>'.('' != trim($row['wbfsys_issue_m_time_created'])?$this->view->i18n->date($row['wbfsys_issue_m_time_created']):' ').'<br /><em>Finish: </em>'.('' != trim($row['wbfsys_issue_finish_till'])?$this->view->i18n->date($row['wbfsys_issue_finish_till']):' ').'</td>'.NL;
      $body .= '<td valign="top" ><em>Desc: </em>'.Validator::sanitizeHtml($row['wbfsys_issue_description']).'<br /><em>Error: </em>'.Validator::sanitizeHtml($row['wbfsys_issue_error_message']).'</td>'.NL;
      if( $this->enableNav )
      {
        $navigation  = $this->rowMenu
        (
          $objid,
          $row
        );
        $body .= '<td 
          valign="top" 
           class="nav_split"  >'.$navigation.'</td>'.NL;
      }

      $body .= '</tr>'.NL;

      
      $pos ++;
      $num ++;
      if ( $num > $this->numOfColors )
        $num = 1;

    } //end foreach

    if( $this->dataSize > ($this->start + $this->stepSize) )
    {
      $body .= '<tr class="wgt-block-appear" ><td class="col" ></td><td colspan="'.$this->numCols.'" class="wcm wcm_action_appear '
        . $this->searchForm.' '.$this->id.'"  ><var>'
        . ($this->start + $this->stepSize).'</var>'
        . $this->image('wgt/bar-loader.gif','loader')
        . ' Loading the next '.$this->stepSize.' entries.</td></tr>';
    }

    $body .= '</tbody>'.NL;
    //\ Create the table body

    return $body;

  }//end public function buildTbody */

  /**
   * parse the table
   *
   * @return string
   */
  public function buildAjax( )
  {
    // if we have html we can assume that the table was allready parsed
    // so we return just the html and stop here
    // this behaviour enables you to call a specific parser method from outside
    // of the view, but then get the html of the called parse method
    if( $this->xml )
      return $this->xml;
    // if we got no requery we fallback to the default query
    // and load the data we need on demand
    // if you don't want that behaviour inject a prefilled refdata object
    if( !$this->refData )
    {
      $this->refData = new WbfsysIssue_Table_Query();

      $refIds = array();

      $tmpData = $this->data;
      foreach( $tmpData as $tmpRow )
      {
        $refIds[] = $tmpRow['wbfsys_issue_rowid'];
      }

      // only execute query when there are rows
      if( $refIds )
      {        $this->refData->fetchEmbededRolesResponsible( $refIds );
      }
    }


    $this->numCols = 17;

    if( $this->enableNav )
      ++ $this->numCols;


    if( $this->appendMode )
    {
      $body = '<htmlArea selector="table#'.$this->id.'-table>tbody" action="append" ><![CDATA['.NL;
    }
    else
    {
      $body = '';
    }

    foreach( $this->data as $key => $row   )
    {
      $body .= $this->buildAjaxTbody( $row );
    }//end foreach

    if( $this->appendMode )
    {
      $numCols = 17;

      if( $this->enableNav )
        ++ $numCols;

      if( $this->dataSize > ( $this->start + $this->stepSize ) )
      {
        $body .= '<tr class="wgt-block-appear" ><td class="pos" ></td><td colspan="'.$numCols.'" class="wcm wcm_action_appear '.$this->searchForm.' '.$this->id.'"  ><var>'.($this->start + $this->stepSize).'</var>'.$this->image('wgt/bar-loader.gif','loader').' Loading the next '.$this->stepSize.' entries.</td></tr>';
      }

      $body .= ']]></htmlArea>';
    }

    $this->xml = $body;

    return $this->xml;

  }//end public function buildAjax */

  /**
   * create the body for the table
   * @param array $row
   * @return string
   */
  public function buildAjaxTbody( $row  )
  {

    $objid = $row['wbfsys_issue_rowid'];
    $rowid = $this->id.'_row_'.$objid;
      
      $style = '';
            
      if( '' != trim( $row['wbfsys_process_node_bg_color'] )  )
      {
        $style .= "background-color:".trim( $row['wbfsys_process_node_bg_color'] ).';';
      }
            
      if( '' != trim( $row['wbfsys_process_node_text_color'] )  )
      {
        $style .= "color:".trim( $row['wbfsys_process_node_text_color'] ).';';
      }
      

    $conf = $this->getConf();
    
    $classContext = '';
    if( $conf->getStatus( 'grid.context_menu.enabled' ) )
    {
      $classContext = ' wcm_control_context_menu';
    }


    $body = '';
      
    $rowActions  = $this->getRowActions
    (
      $objid,
      $row
    );
    $accessActionKey = $this->hasEditRights( $row )?'edit':'show';
    
    $dsUrl        = null;
    $rowWcm       = '';
    $rowParams   = '';
    $menuActions = '';
    
    if( $rowActions )
    {
      $menuActions = ' wgt_actions="'.implode( ',', $rowActions ).'" ' ;
    }
    
    
    // check if the row has 
    if( $dsUrl = $this->getActionUrl( $objid, $row ) )
    {
      $rowWcm     .= ' wcm_control_access_dataset';
      $rowParams .= ' wgt_url="'.$dsUrl.'" ';
    }
              
    // is this an insert or an update area
    if( $this->insertMode )
    {
      $body .= '<htmlArea selector="table#'.$this->id.'-table>tbody" '
        .' action="prepend" ><![CDATA[<tr '
        .' wgt_context_menu="'.$this->id.'-cmenu" '
        .' wgt_eid="'.$objid.'" ' 
        .$menuActions
        .$rowParams 
        .' class="wcm wcm_ui_highlight '.$rowWcm.$classContext.' node-'.$objid.'" '
        .' id="'.$rowid.'" style="'.$style.'" >'.NL;
    }
    else if( $this->appendMode )
    {
      $body .= '<tr id="'.$rowid.'" '
        .' wgt_context_menu="'.$this->id.'-cmenu" '
        .' wgt_eid="'.$objid.'" '  
        .$menuActions
        .$rowParams 
        .' class="wcm wcm_ui_highlight '.$rowWcm.$classContext.' node-'.$objid.'" style="'.$style.'" >'.NL;
    }
    else
    {
      $body .= '<htmlArea selector="tr#'.$rowid.'" action="html" ><![CDATA[';
    }
      $body .= '<td  valign="top" class="pos" name="slct['.$objid.']" style="text-align:right;" >1</td>'.NL;
      $body .= '<td valign="top" >'.Validator::sanitizeHtml($row['wbfsys_issue_title']).'</td>'.NL;
      $body .= '<td valign="top" >      <button 
        id="wgt-button-list-table-wbfsys_issue-'.$row['wbfsys_issue_rowid'].'" 
        class="wgt-button wcm wcm_ui_dropform" >
        <div class="left" >'.$this->icon( $row['wbfsys_process_node_icon'], $row['wbfsys_process_node_label'] ).'
        '.(!is_null($row['wbfsys_process_node_label'])?$row['wbfsys_process_node_label']:'No activ Process').'</div><div class="inline ui-icon ui-icon-triangle-1-s" > </div>
        <var>{"url":"ajax.php?c=Issue.Handling_Process.dropForm&amp;objid='.$row['wbfsys_issue_rowid'].'&amp;mask='.$this->namespace.'&amp;element='.$this->id.'&amp;mask_type=listing&amp;ltype=table'.$this->accessPath.'"}</var>
       </button>
</td>'.NL;
      $body .= '<td valign="top" ><em>Severity: </em><a class="wcm wcm_req_ajax" href="maintab.php?c=Wbfsys.IssueSeverity.listing" >'.Validator::sanitizeHtml($row['wbfsys_issue_severity_name']).'</a><br /><em>Priority: </em><a class="wcm wcm_req_ajax" href="maintab.php?c=Wbfsys.Priority.listing" >'.Validator::sanitizeHtml($row['wbfsys_priority_name']).'</a><br /><em>Type: </em><a class="wcm wcm_req_ajax" href="maintab.php?c=Wbfsys.IssueType.listing" >'.Validator::sanitizeHtml($row['wbfsys_issue_type_name']).'</a><br /><em>Category: </em><a class="wcm wcm_req_ajax" href="maintab.php?c=Wbfsys.Category.listing" >'.Validator::sanitizeHtml($row['wbfsys_category_name']).'</a></td>'.NL;
      $body .= '<td valign="top" ><em>OS: </em><a class="wcm wcm_req_ajax" href="maintab.php?c=Wbfsys.Os.listing" >'.Validator::sanitizeHtml($row['wbfsys_os_name']).'</a><br /><em>Browser: </em><a class="wcm wcm_req_ajax" href="maintab.php?c=Wbfsys.Browser.listing" >'.Validator::sanitizeHtml($row['wbfsys_browser_name']).'</a></td>'.NL;
      $body .= '<td valign="top" >'.NL;

      $refData = $this->refData->getEmbededRolesResponsible( $row['wbfsys_issue_rowid'] );
      
      $roleData     = array();
      $roleLabels  = array();
      
      foreach ( $refData as $refRow )
      {
        $roleData[$refRow['group_key']][$refRow['user_name']] = $refRow;
        $roleLabels[$refRow['group_key']] = $refRow['group_name'];
      }

      $body .= '<ul>'.NL;
      foreach ( $roleData as $roleKey => $roles )
      {
        $body .= '<li><strong>'.$roleLabels[$roleKey].'</strong>
          <ul>'.NL;
          
        foreach( $roles as $roleNode )
        {
          $body .= '<li>
            <a 
              class="wcm wcm_req_ajax" 
              href="modal.php?c=Webfrap.ContactForm.formUser&amp;user_id='.$roleNode['id'].'&amp;d_src=wbfsys_issue&amp;ref_id='.$row['wbfsys_issue_rowid'].'" >'
              .$roleNode['value'].'</a></li>'.NL;
        }
        
        $body .= '</ul>
          </li>'.NL;
      }
      $body .= '</ul>'.NL;
      
      $body .= '</td>'.NL;
      $body .= '<td valign="top" >      <div class="wcm wcm_ui_progress wgt_progress" >'.(!is_null($row['wbfsys_issue_progress'])?$row['wbfsys_issue_progress']:0).'</div>
</td>'.NL;
      $body .= '<td valign="top" ><em>Created: </em>'.('' != trim($row['wbfsys_issue_m_time_created'])?$this->view->i18n->date($row['wbfsys_issue_m_time_created']):' ').'<br /><em>Finish: </em>'.('' != trim($row['wbfsys_issue_finish_till'])?$this->view->i18n->date($row['wbfsys_issue_finish_till']):' ').'</td>'.NL;
      $body .= '<td valign="top" ><em>Desc: </em>'.Validator::sanitizeHtml($row['wbfsys_issue_description']).'<br /><em>Error: </em>'.Validator::sanitizeHtml($row['wbfsys_issue_error_message']).'</td>'.NL;
      if( $this->enableNav )
      {
        $navigation  = $this->rowMenu
        (
          $objid,
          $row
        );
        $body .= '<td 
          valign="top" 
           class="nav_split"  >'.$navigation.'</td>'.NL;
      }

    // is this an insert or an update area
    if( $this->insertMode )
    {
      $body .= '</tr>]]></htmlArea>'.NL;
    }
    else if( $this->appendMode )
    {
      $body .= '</tr>'.NL;
    }
    else
    {
      $body .= ']]></htmlArea>'.NL;
    }

    return $body;

  }//end public function buildAjaxTbody */

  /**
   * Der Footer der Tabelle
   * @return string
   */
  public function buildTableFooter()
  {
  
  	$iconListMenu = $this->icon( 'control/menu2.png', 'List Menu' );
  	$iconClean = $this->icon( 'control/clean.png', 'Clean' );
  	$iconDelete = $this->icon( 'control/delete.png', 'Delete Selection' );
  	$iconExport = $this->icon( 'control/export.png', 'Export' );

    $html = '<div class="wgt-panel wgt-border-top" >'.NL;
    $html .= ' <div class="right menu"  >';
    $html .=     $this->menuTableSize();
    $html .= ' </div>';
    $html .= ' <div class="menu" style="float:left;" style="width:150px;" >';
    
    if( WBF_SHOW_MOCKUP )
    {
    
    $html .=   <<<HTML
    
 <div id="{$this->id}-list-action" >
	<button 
		class="wcm wcm_control_dropmenu wgt-button" id="{$this->id}-list-action-cntrl" 
		wgt_drop_box="{$this->id}-list-action-menu" >{$iconListMenu} List Menu</button>
  </div>
  <div class="wgt-dropdownbox" id="{$this->id}-list-action-menu" >
    <ul>
      <li><a>{$iconDelete} Delete Selection</a></li>
      <li><a>{$iconClean} Clear Data</a></li>
      <li><a class="deeplink" >{$iconExport} Export</a>
      	<span>
      		<ul>
      			<li><a>Export 1</a></li>
      			<li><a>Export 2</a></li>
      		</ul>
      	</span>
      </li>
  	</ul>
 	</div>
  <var id="{$this->id}-list-action-cntrl-cfg-dropmenu"  >{"align":"left","valign":"top"}</var>

HTML;

	}

    $html .= ' </div>';
    $html .= ' <div class="menu"  style="text-align:center;margin:0px auto;" >';

    $html .= ' </div>';
    $html .= $this->metaInformations();
    $html .= '</div>'.NL;

    return $html;

  }//end public function buildTableFooter */

}//end class WbfsysIssue_Table_Element

