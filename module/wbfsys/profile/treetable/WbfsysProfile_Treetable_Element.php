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
class WbfsysProfile_Treetable_Element
  extends WgtTreetable
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
  public $id       = 'wgt-treetable-wbfsys_profile';



  /**
   * @var string
   */
  public $bodyHeight   = 'xxlarge';

  /**
   * the most likley class of a given query object
   *
   * @var WbfsysProfile_Treetable_Query
   */
  public $data       = null;
  
  /**
   * Namespace informationen für das Listenelement
   * @var string
   */
  public $namespace = 'WbfsysProfile';

 /**
  * Laden der Urls für die Actions
  * @return void
  */
  public function loadUrl()
  {
  
    $this->url  = array
    (
      'add'     => array(),
      'show'    => array
      (
        Wgt::ACTION_BUTTON_GET,
        'Show',
        'maintab.php?c=Wbfsys.Profile.show&amp;ltype=treetable&amp;objid=',
        'control/show.png',
        '',
        'wbfsys.profile.label',
        Acl::ACCESS,
        Acl::UPDATE
      ),

      'edit'    => array
      (
        Wgt::ACTION_BUTTON_GET,
        'Edit',
        'maintab.php?c=Wbfsys.Profile.edit&amp;ltype=treetable&amp;objid=',
        'control/edit.png',
        '',
        'wbfsys.profile.label',
        Acl::UPDATE
      ),

      'ref'  => array
      (
        Wgt::ACTION_JUST_LABEL,
        'Related Data',
        null,
        'control/references.png',
        '',
        'wbfsys.profile.label',
        Acl::ACCESS,
				Wgt::BUTTON_SUB => array
        (
                    array
          (
            Wgt::ACTION_BUTTON_GET,
            'Quicklinks',
            'modal.php?c=Wbfsys.Profile_Ref_Quicklinks.modal&amp;objid=',
            'control/table.png',
            '',
            'wbfsys.profile.label',
          ),

        )
      ),

      'delete'  => array
      (
        Wgt::ACTION_DELETE,
        'Delete',
        'index.php?c=Wbfsys.Profile.delete&amp;ltype=treetable&amp;objid=',
        'control/delete.png',
        '',
        'wbfsys.profile.label',
        Acl::DELETE
      ),

      'rights'  => array
      (
        Wgt::ACTION_BUTTON_GET,
        'Rights',
        'maintab.php?c=Acl.Mgmt_Dset.listing&amp;dkey=wbfsys_profile&amp;objid=',
        'control/rights.png',
        '',
        'wbfsys.profile.label',
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
// context: treetable
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * parse the table
   *
   * @return string
   */
  public function buildHtml( )
  {

    $this->url['add'] = array
    (
      Wgt::ACTION_JS,
      'Add',
      '$S(\'#'.$this->id.'\').data(\'func_add\')( {$id} )',
      'control/add.png',
      '',
      'wbfsys.profile.label',
      Acl::INSERT
    );
    
    $conf = $this->getConf();

    // if we have html we can assume that the table was allready parsed
    // so we return just the html and stop here
    // this behaviour enables you to call a specific parser method from outside
    // of the view, but then get the html of the called parse method
    if( $this->html )
      return $this->html;

    // check for replace is used to check if this table should be pushed via ajax
    // to the client, or if the table is placed direct into a template
    if( $this->insertMode )
    {
      $this->html .= '<div id="'.$this->id.'" class="wgt-grid" >'.NL;
      $this->html .= '<var id="'.$this->id.'-table-cfg-grid" >{
        "height":"'.$this->bodyHeight.'",
        "search_form":"'.$this->searchForm.'",
        "select_able":"true"
      }</var>';
      $this->html .= $this->buildPanel();
      $this->html .= '<table id="'.$this->id
        .'-table" class="wgt-grid tree wcm wcm_ui_treetable wcm_widget_grid hide-head" >'.NL;

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
      
      // rendern des context menüs
      if( $conf->getStatus( 'grid.context_menu.enabled' ) )
      {
        $this->html .= $this->buildContextMenu();
      }
      


      $this->html .= '<script type="application/javascript" >'.NL;
      $this->html .= $this->buildJavascript();
      $this->html .= '</script>'.NL;

    }

    return $this->html;

  }//end public function buildHtml */

  /**
   * create the head for the table
   * @return string
   */
  public function buildThead( )
  {

    $this->numCols = 4;

    if($this->enableNav)
      ++ $this->numCols;

    // Creating the Head
    $html = '<thead>'.NL;
    $html .= '<tr>'.NL;

    $html .= '<th style="width:30px;" class="pos" >'.$this->view->i18n->l( 'Pos.', 'wbf.label'  ).'</th>'.NL;
    
    $html .= '<th style="width:200px" >'.$this->view->i18n->l('Name','wbfsys.profile.label').'</th>'.NL;
    $html .= '<th style="width:200px" >'.$this->view->i18n->l('Access Key','wbfsys.profile.label').'</th>'.NL;
    $html .= '<th style="width:200px" >'.$this->view->i18n->l('Description','wbfsys.profile.label').'</th>'.NL;


    // the default navigation col
    if( $this->enableNav )
    {
      $navWidth = count($this->actions)*30+5;
      $html .= '<th style="width:'.$navWidth.'px;">'.$this->view->i18n->l( 'Menu', 'wbf.label'  ).'</th>'.NL;
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
    
    $classContext = '';
    if( $conf->getStatus( 'grid.context_menu.enabled' ) )
    {
      $classContext = ' wcm_control_context_menu';
    }
    
    // create the table body
    $body = '<tbody>'.NL;

    // simple switch method to create collored rows
    $pos = 1;
    $this->num = 1;
    foreach( $this->data as $key => $row   )
    {
      $objid       = $row['wbfsys_profile_rowid'];
      $rowid       = $this->id.'_row_'.$objid;
      
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



      $body .= '<tr class="wcm wcm_ui_highlight '.$rowWcm.$classContext.' row'.$this->num.' node-'.$objid.'" '
        .' wgt_context_menu="'.$this->id.'-cmenu" '
        .' wgt_eid="'.$objid.'" '
        .$rowParams
        .$menuActions
        .' id="'.$rowid.'" >'.NL;
        
      $body .= '<td valign="top" class="pos" name="slct['.$objid.']" style="text-align:right;" >'.$pos.'</td>'.NL;
        

      $body .= '<td valign="top" ><a class="wcm wcm_req_mtab" title="Click to open" href="maintab.php?c=Wbfsys.Profile.'.$accessActionKey.'&amp;objid='.$objid.'&amp;target_id='.$this->id.'" >'.nl2br(Validator::sanitizeHtml($row['wbfsys_profile_name'])).'</a></td>'.NL;

      $body .= '<td valign="top" >'.nl2br(Validator::sanitizeHtml($row['wbfsys_profile_access_key'])).'</td>'.NL;

      $body .= '<td valign="top" >'.Validator::sanitizeHtml($row['wbfsys_profile_description']).'</td>'.NL;


      if( $this->enableNav )
      {
        $navigation  = $this->rowMenu
          (
            $objid,
            $row
          );
        $body .= '<td valign="top"  class="nav"  >'.$navigation.'</td>'.NL;
      }

      $body .= '</tr>'.NL;
      
      $pos ++;
      $this->num ++;
      if ( $this->num > $this->numOfColors )
        $this->num = 1;

      $body .= $this->buildChildNode( $objid, $pos );

    }//end foreach


    if( $this->dataSize > ($this->start + $this->stepSize) )
    {
      $body .= '<tr class="wgt-block-appear" ><td class="pos" ></td><td colspan="'.$this->numCols.'" class="wcm wcm_action_appear '
        .$this->searchForm.' '.$this->id.'"  ><var>'.($this->start + $this->stepSize).'</var>'
        .$this->image('wgt/bar-loader.gif','loader').' Loading the next '.$this->stepSize.' entries.</td></tr>';
    }

    $body .= '</tbody>'.NL;
    //\ Create the table body

    return $body;

  }//end public function buildTbody */

  /**
   * @param int $parentId
   * @param string $parentPos
   */
  public function buildChildNode( $parentId, $parentPos )
  {

    if( !isset( $this->data->childs[$parentId]) )
      return '';
      
    $conf = $this->getConf();
    
    $classContext = '';
    if( $conf->getStatus( 'grid.context_menu.enabled' ) )
    {
      $classContext = ' wcm_control_context_menu';
    }

    $childs = $this->data->childs[$parentId];
    $body   = '';
    $pos    = 1;
    
    foreach( $childs as $row )
    {

      $objid   = $row['wbfsys_profile_rowid'];
      $rowid   = $this->id.'_row_'.$objid;
      $pRowid   = 'child-of-'.$this->id.'_row_'.$parentId;
      
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


      $body .= '<tr class="wcm wcm_ui_highlight '.$rowWcm.$classContext.' row'.$this->num.' '.$pRowid.'" '
        .' wgt_eid="'.$objid.'" '
        .' wgt_context_menu="'.$this->id.'-cmenu" '
        .$rowParams
        .$menuActions
        .' id="'.$rowid.'" >'.NL;
        
      $body .= '<td valign="top" class="pos" name="slct['.$objid.']" style="text-align:right;" >'.$parentPos.'.'.$pos.'</td>'.NL;
        

      $body .= '<td valign="top" ><a class="wcm wcm_req_mtab" title="Click to open" href="maintab.php?c=Wbfsys.Profile.'.$accessActionKey.'&amp;objid='.$objid.'&amp;target_id='.$this->id.'" >'.nl2br(Validator::sanitizeHtml($row['wbfsys_profile_name'])).'</a></td>'.NL;

      $body .= '<td valign="top" >'.nl2br(Validator::sanitizeHtml($row['wbfsys_profile_access_key'])).'</td>'.NL;

      $body .= '<td valign="top" >'.Validator::sanitizeHtml($row['wbfsys_profile_description']).'</td>'.NL;

      
      $pos ++;
      $this->num ++;
      if ( $this->num > $this->numOfColors )
        $this->num = 1;

      if( $this->enableNav )
      {
        $navigation  = $this->rowMenu
          (
            $objid,
            $row
          );
        $body .= '<td valign="top"  class="nav"  >'.$navigation.'</td>'.NL;
      }

      $body .= '</tr>'.NL;

      $this->num ++;
      if ( $this->num > $this->numOfColors )
        $this->num = 1;

      $body .= $this->buildChildNode( $objid, $parentPos.'.'.$pos );

    }//end foreach

    return $body;

  }//end public function buildChildNode */

  /**
   * parse the table
   *
   * @return string
   */
  public function buildAjax( )
  {

    $this->url['add'] = array
    (
      Wgt::ACTION_JS,
      'Add',
      '$S(\'#'.$this->id.'\').data(\'func_add\')( {$id} )',
      'control/add.png',
      '',
      'Add Child',
      Acl::INSERT
    );

    // if we have html we can assume that the table was allready parsed
    // so we return just the html and stop here
    // this behaviour enables you to call a specific parser method from outside
    // of the view, but then get the html of the called parse method
    if( $this->xml )
      return $this->xml;



    $body = '';

    if( $this->appendMode )
    {
      $body = '<htmlArea selector="table#'.$this->id.'-table>tbody" action="append" ><![CDATA['.NL;
    }

    foreach( $this->data as $key => $row   )
    {

      $body .= $this->buildAjaxTbody( $row );

    }//end foreach

    if( $this->appendMode )
    {
      $numCols = 4;

      if( $this->enableNav )
        ++ $numCols;

      if( $this->dataSize > ($this->start + $this->stepSize) )
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
  
    $conf = $this->getConf();
    
    $classContext = '';
    if( $conf->getStatus( 'grid.context_menu.enabled' ) )
    {
      $classContext = ' wcm_control_context_menu';
    }

    $objid = $row['wbfsys_profile_rowid'];
    $rowid = $this->id.'_row_'.$objid;

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

      if( $row['wbfsys_profile_m_parent'] )
      {
        $pClass = 'child-of-'.$this->id.'_row_'.$row['wbfsys_profile_m_parent'];
        $body = '<htmlArea selector="tr#'.$this->id.'_row_'
          .$row['wbfsys_profile_m_parent'].'" action="after" >'
          .'<![CDATA[<tr id="'.$rowid.'" '
          .' wgt_context_menu="'.$this->id.'-cmenu" '
          .' wgt_eid="'.$objid.'" ' 
          .$rowParams
          .$menuActions
          .' class="'.$pClass.' wcm wcm_ui_highlight '.$rowWcm.$classContext.'" >'.NL;
          
        
      }
      else
      {
        $body = '<htmlArea selector="table#'.$this->id.'-table>tbody" action="prepend" >'
          .'<![CDATA[<tr '
          .' wgt_context_menu="'.$this->id.'-cmenu" '
          .' wgt_eid="'.$objid.'" ' 
          .$rowParams
          .$menuActions
          .' class="wcm wcm_ui_highlight '.$rowWcm.$classContext.'" '
          .' id="'.$rowid.'" >'.NL;
        
      }

    }
    else if( $this->appendMode )
    {
      $body = '<tr id="'.$rowid.'" '
      .' wgt_context_menu="'.$this->id.'-cmenu" '
      .' wgt_eid="'.$objid.'" ' 
      .$rowParams
      .$menuActions 
      .' class="wcm wcm_ui_highlight '.$rowWcm.$classContext.'" >'.NL;
    }
    else
    {
      $body = '<htmlArea selector="tr#'.$rowid.'" action="html" ><![CDATA[';
    }
    
    if( $row['wbfsys_profile_m_parent'] )
    {
      $prePos = $row['wbfsys_profile_m_parent'].'.';
    }
    else
    {
      $prePos = '';
    }

    $body .= '<td valign="top" class="pos" name="slct['.$objid.']" style="text-align:right;" >'.$prePos.'1</td>'.NL;
        

      $body .= '<td valign="top" ><a class="wcm wcm_req_mtab" title="Click to open" href="maintab.php?c=Wbfsys.Profile.'.$accessActionKey.'&amp;objid='.$objid.'&amp;target_id='.$this->id.'" >'.nl2br(Validator::sanitizeHtml($row['wbfsys_profile_name'])).'</a></td>'.NL;

      $body .= '<td valign="top" >'.nl2br(Validator::sanitizeHtml($row['wbfsys_profile_access_key'])).'</td>'.NL;

      $body .= '<td valign="top" >'.Validator::sanitizeHtml($row['wbfsys_profile_description']).'</td>'.NL;


    if( $this->enableNav )
    {
      $navigation  = $this->rowMenu
      (
        $objid,
        $row
      );
      $body .= '<td valign="top"  class="nav"  >'.$navigation.'</td>'.NL;
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

    if( !$this->appendMode && $row['wbfsys_profile_m_parent'] )
    {
      $parentId = $this->id.'_row_'.$row['wbfsys_profile_m_parent'];

      $body .= <<<HTML
    <htmlArea action="eval" ><![CDATA[
    \$S('#{$rowid}').appendSubTree(\$S('#{$parentId}'));
]]></htmlArea>
HTML;

    }

    return $body;

  }//end public function buildAjaxTbody */

  /**
   *
   * @return string
   */
  protected function buildJavascript()
  {
    return <<<HTML

    \$S('#{$this->id}').data('func_add',function( objid ){
      \$R.post('maintab.php?c=Wbfsys.Profile.create&amp;ltype=treetable',{"wbfsys_profile[m_parent]":objid});
    });

HTML;

  }//end protected function buildJavascript */

}//end class WbfsysProfile_Treetable_Element

