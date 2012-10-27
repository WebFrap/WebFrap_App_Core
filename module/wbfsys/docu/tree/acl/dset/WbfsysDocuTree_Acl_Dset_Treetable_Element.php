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
class WbfsysDocuTree_Acl_Dset_Treetable_Element
  extends WgtTreetable
{////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////

  /**
   * the html id of the table tag, this id can be used to replace the table
   * or table contents via ajax interface.
   *
   * @var string $id
   */
  public $id       = 'wgt-treetable-wbfsys_docu_tree-acl-dset';

  /**
   * the html id of the table tag, this id can be used to replace the table
   * or table contents via ajax interface.
   *
   * @var string $id
   */
  public $areaId   = null;

  /**
   * the most likley class of a given query object
   *
   * @var WbfsysDocuTree_Acl_Dset_Treetable_Query
   */
  public $data        = null;

  /**
   * the most likley class of a given query object
   *
   * @var array
   */
  public $dataUser    = array();
  
  /**
   * list with all actions for the listed datarows
   * this list is easy extendable via addUrl.
   * This array only contains possible actions, but you have to set it
   * manually wich actions are used with: Wgt::addActions
   * @var array
   */
  public $userButtons    = array();
  
  /**
   * @var array
   */
  public $userActions  = array();

 /**
  * Laden der Urls für die Actions
  */
  public function loadUrl()
  {
  
    $this->url      = array
    (
      'inheritance'  => array
      (
        Wgt::ACTION_BUTTON_GET,
        'Inherit Rights',
        'maintab.php?c=Wbfsys.DocuTree_Acl_Path.showGraph&amp;objid=',
        'control/acl_inheritance.png',
        '',
        'wbf.label',
        Acl::ADMIN
      ),
      'delete'  => array
      (
        Wgt::ACTION_DELETE,
        'Delete',
        'index.php?c=Wbfsys.DocuTree_Acl_Dset.cleanGroup&amp;objid=',
        'control/clean.png',
        '',
        'wbf.label',
        Acl::ADMIN
      ),
      'sep'  => array
      (
        Wgt::ACTION_SEP
      ),
  
    );

    $this->userButtons  = array
    (
      'delete'  => array
      (
        Wgt::ACTION_DELETE,
        'Delete',
        'index.php?c=Wbfsys.DocuTree_Acl_Dset.deleteUser&amp;objid=',
        'control/delete.png',
        '',
        'wbf.label',
        Acl::ADMIN
      ),
    );


  }//end public function loadUrl */

////////////////////////////////////////////////////////////////////////////////
// Methodes
////////////////////////////////////////////////////////////////////////////////

  /**
   * @param array $actions
   */
  public function addUserActions( $actions )
  {
  
    if( is_array( $actions ) )
    {
      $this->userActions = array_merge( $this->userActions, $actions );
    }
    else
    {
      $this->userActions[] = $actions;
    }

  }//end public function addUserActions */


  /**
   * set the table data
   * @param array $data
   * @param $value
   * @return void
   */
  public function setData( $data , $value = null )
  {

    if( !$data )
      return;

    if( is_object( $data ) )
    {
      $this->data       = $data;
      $this->dataSize   = $data->getSourceSize();
      $this->dataUser   = $data->users;
    }
    else
    {
      $this->data = $data;
    }

  }//end public function setData */

////////////////////////////////////////////////////////////////////////////////
// Plain Html Methodes
////////////////////////////////////////////////////////////////////////////////

  /**
   * parse the table
   *
   * @return string
   */
  public function buildHtml( )
  {
  
    // if we have html we can assume that the table was allready assembled
    // so we return just the html and stop here
    // this behaviour enables you to call a specific builder method from outside
    // of the view, but then get the html of the called parse method
    if( $this->html )
      return $this->html;

    // check for replace is used to check if this table should be pushed via ajax
    // to the client, or if the table is placed direct into a template
    if( $this->insertMode )
    {
      $this->html .= '<div id="'.$this->id.'" class="wgt-grid" >'.NL;
      $this->html .= $this->buildPanel();
      //wcm_ui_treetable
      $this->html .= '<table id="'.$this->id
        .'-table" class="wgt-grid wcm wcm_widget_grid wcm_ui_treetable hide-head" >'.NL;

      $this->html .= $this->buildThead();
    }

    $this->html .= $this->buildTbody();

    //$this->html .= $this->buildTableFooter();

    // check for replace is used to check if this table should be pushed via ajax
    // to the client, or if the table is placed direct into a template
    if( $this->insertMode )
    {

      $this->html .= '</table>';
      $this->html .= '<var class="wgt-settings" >{
        "height":"large",
        "search_form":"'.$this->searchForm.'",
        "expandable":false
      }</var>';

      $this->html .= $this->buildElementFooter();

      $this->html .= '</div>'.NL;

      $this->html .= '<script type="text/javascript" >'.NL;
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

    $this->numCols = 3;

    if($this->enableNav)
      ++ $this->numCols;

    // Creating the Head
    $html = '<thead>'.NL;
    $html .= '<tr>'.NL;

    // check for multi selection
    $html .= '<th style="width:30px;" class="pos" >Pos:</th>'.NL;

    $html .= '<th style="width:270px" >
      '.$this->view->i18n->l( 'Group / User', 'wbf.label' ).'
    </th>'.NL;

    $html .= '<th style="width:125px" >
      '.$this->view->i18n->l( 'Access Level', 'wbf.label' ).'
    </th>'.NL;

    $html .= '<th style="width:125px" >
      '.$this->view->i18n->l( 'Start', 'wbf.label' ).'
    </th>'.NL;

    $html .= '<th style="width:125px" >
      '.$this->view->i18n->l( 'End', 'wbf.label' ).'
    </th>'.NL;

    // the default navigation col
    if( $this->enableNav )
      $html .= '<th style="width:75px;">'.$this->view->i18n->l( 'Menu', 'wbf.label'  ).'</th>'.NL;

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

    // create the table body
    $body = '<tbody>'.NL;

    // simple switch method to create collored rows
    $num = 1;
    $pos = 1;
    foreach( $this->data as $row   )
    {

      $groupId     = $row['wbfsys_role_group_rowid'];
      $objid       = $groupId;
      $rowid       = $this->id.'_row_'.$groupId;

      $body .= '<tr class="row'.$num.'" id="'.$rowid.'" >'.NL;
      
      $body .= '<td valign="top" class="pos" name="slct['.$objid.']" style="text-align:right;" >'.$pos.'</td>'.NL;
      $body .= '<td valign="top" >'.$this->icon('control/group.png','Group').' '.$row['wbfsys_role_group_name'].'</td>'.NL;
      $body .= '<td valign="top" style="text-align:right;" >'.$this->selectRights( $row['wbfsys_security_access_access_level'], "ar[wbfsys_security_access][{$objid}][access_level]"  ).'</td>'.NL;

      $body .= '<td valign="top" >'
        .'<input
          type="text"
          class="'.$this->editForm.' wcm wcm_ui_date show small"
          id="wgt-input-acl-wbfsys_docu_tree-dset-'.$objid.'-date_start"
          name="dset_group[wbfsys_group_users]['.$objid.'][date_start]"
          value="'.
          (
            (
              '' != trim( $row['wbfsys_security_access_date_start'] )
            )
              ? $this->view->i18n->date($row['wbfsys_security_access_date_start'])
              : ''
          ).'" /></td>'.NL;

      $body .= '<td valign="top" >'
        .'<input
          type="text"
          class="'.$this->editForm.' wcm wcm_ui_date show small"
          id="wgt-input-acl-wbfsys_docu_tree-dset-'.$objid.'-date_end"
          name="dset_group[wbfsys_security_access]['.$objid.'][date_end]"
          value="'.
          (
            (
              '' != trim( $row['wbfsys_security_access_date_end'] ) 
            )
              ? $this->view->i18n->date( $row['wbfsys_security_access_date_end'] )
              : ''
          ).'" /></td>'.NL;

      $this->num ++;
      if ( $this->num > $this->numOfColors )
        $this->num = 1;

      if( $this->enableNav )
      {
        $navigation  = $this->rowMenu
        (
          $objid.'&amp;group_id='.$groupId,
          $row
        );
        $body .= '<td valign="top"  class="nav_split"  >'.$navigation.'</td>'.NL;
      }

      $body .= '</tr>'.NL;

      $this->num ++;
      if ( $this->num > $this->numOfColors )
        $this->num = 1;

      $body .= $this->buildUserNode( $groupId, $pos );

      ++$pos;

    } //end foreach

    /*
    if( $this->dataSize > ($this->start + $this->stepSize) )
    {
      $body .= '<tr><td class="pos" ></td>'
        . '<td colspan="'.$this->numCols.'" class="wcm wcm_action_appear '
        . $this->searchForm.' '.$this->id.'"  ><var>'.($this->start + $this->stepSize)
        . '</var>Paging to the next '.$this->stepSize.' entries.</td></tr>';
    }
    */

    $body .= '</tbody>'.NL;
    //\ Create the table body

    return $body;

  }//end public function buildTbody */

  /**
   * @param int $groupId
   * @param int $parentPos
   * @return string
   */
  public function buildUserNode( $groupId, $parentPos )
  {

    if( !isset( $this->dataUser[$groupId] ) )
      return '';

    $childs = $this->dataUser[$groupId];

    $body = '';
    $pos  = 1;

    foreach( $childs as $userId => $row )
    {

      $objid    = $row['wbfsys_group_users_rowid'];
      $rowid   = $this->id.'_row_'.$groupId.'_'.$userId;
      $pRowid   = 'child-of-'.$this->id.'_row_'.$groupId.' group-'.$groupId;


      $body .= '<tr class="row'.$this->num.' '.$pRowid.' wgt-border-top" id="'.$rowid.'"  >'.NL;
        
      $body .= '<td valign="top" class="pos" name="slct_user['.$objid.']" style="text-align:right;" >'.$parentPos.'.'.$pos.'</td>'.NL;
      $body .= '<td valign="top" class="ind1" >'
      	.'<a href="modal.php?c=Webfrap.ContactForm.formUser&amp;user_id='.$userId.'" class="wcm wcm_req_ajax" >'.$this->icon('control/user.png','User').' '.$row['user'].'</a>'
      	.'</td>'.NL;
      $body .= '<td valign="top" >';

      if( !is_null( $row['wbfsys_group_users_vid'] ) )
      {
        $body .= '<em>'.$this->icon('relation/dataset.png','Dataset').' Dataset</em>';
      }
      else if( isset( $row['wbfsys_group_users_id_area'] ) && !is_null( $row['wbfsys_group_users_id_area'] ) )
      {
        $body .= '<em>'.$this->icon('relation/management.png','Management').' All Projects</em>';
      }
      else
      {
        $body .= '<em>'.$this->icon('relation/global.png','Global').' Global</em>';
      }

      $body .= '</td>'.NL;

      $body .= '<td valign="top" >'
        .'<input
          type="text"
          class="'.$this->editForm.' wcm wcm_ui_date show small"
          id="wgt-input-acl-wbfsys_docu_tree-dset-'.$objid.'-date_start"
          name="dset[wbfsys_group_users]['.$objid.'][date_start]"
          value="'.
          (
            (
              '' != trim( $row['wbfsys_group_users_date_start'] )
            )
              ? $this->view->i18n->date( $row['wbfsys_group_users_date_start'] )
              : ''
          ).'" /></td>'.NL;

      $body .= '<td valign="top" >'
        .'<input
          type="text"
          class="'.$this->editForm.' wcm wcm_ui_date show small"
          id="wgt-input-acl-wbfsys_docu_tree-dset-'.$objid.'-date_end"
          name="dset[wbfsys_group_users]['.$objid.'][date_end]"
          value="'.
          (
            ( 
              '' != trim( $row['wbfsys_group_users_date_end'] )
            )
              ?$this->view->i18n->date( $row['wbfsys_group_users_date_end'] )
              :''
          ).'" /></td>'.NL;


      if( $this->enableNav )
      {
        $navigation  = $this->buildCustomButtons
        ( 
          $this->userButtons, 
          array( 'clean', 'delete' ), 
          $row['wbfsys_group_users_rowid'].'&amp;group_id='.$groupId.'&amp;user_id='.$userId
        );
        $body .= '<td valign="top"  class="nav_split"  >'.$navigation.'</td>'.NL;
      }

      $body .= '</tr>'.NL;

      $this->num ++;
      if ( $this->num > $this->numOfColors )
        $this->num = 1;
        
      ++$pos;

    }

    return $body;

  }//end public function buildUserNode */


////////////////////////////////////////////////////////////////////////////////
// Ajax Methodes
////////////////////////////////////////////////////////////////////////////////

  /**
   * build the table
   *
   * @return string
   */
  public function buildAjax( )
  {

    // if we have html we can assume that the table was allready assembled
    // so we return just the html and stop here
    // this behaviour enables you to call a specific builder method from outside
    // of the view, but then get the html of the called parse method
    if( $this->xml )
      return $this->xml;

    if( $this->appendMode )
    {
      $body = '<htmlArea selector="table#'.$this->id.'-table>tbody" action="prepend" ><![CDATA['.NL;
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
      $numCols = 2;

      if($this->enableNav)
        ++ $numCols;


      if( $this->dataSize > ($this->start + $this->stepSize) )
      {
        $body .= '<tr><td class="pos" ></td><td colspan="'.$numCols.'" class="wcm wcm_action_appear '
          .$this->searchForm.' '.$this->id.'"  ><var>'
          .($this->start + $this->stepSize).'</var>Paging to the next '
          .$this->stepSize.' entries.</td></tr>';
      }

      $body .= ']]></htmlArea>';
    }

    $this->xml = $body;

    return $this->xml;

  }//end public function buildAjax */

  /**
   * parse the table
   *
   * @return string
   */
  public function buildAjaxEntry( )
  {

    // if we have html we can assume that the table was allready assembled
    // so we return just the html and stop here
    // this behaviour enables you to call a specific builder method from outside
    // of the view, but then get the html of the called parse method
    if( $this->xml )
      return $this->xml;

    // erst mal kein append mode, gehen wir mal davon aus
    // dass alles angezeigt werden kann

    $body = '';

    foreach( $this->data as $key => $row   )
    {

      $userId     = $row['wbfsys_group_users_id_user'];
      $groupId    = $row['wbfsys_group_users_id_group'];
      $objid      = $row['wbfsys_group_users_rowid'];

      $rowid      = $this->id.'_row_'.$groupId.'_'.$userId;
      $pRowid     = 'child-of-'.$this->id.'_row_'.$groupId.' group-'.$groupId;

      $body .= '<htmlArea selector="tr#'.$this->id.'_row_'.$groupId.'" action="after"  ><![CDATA['.NL;
      $body .= '<tr class="'.$pRowid.'" id="'.$rowid.'"  >'.NL;

      $body .= '<td valign="top" class="pos" name="slct_user['.$objid.']" style="text-align:right;" ></td>'.NL;
      $body .= '<td valign="top" class="ind1" >'
      	.'<a ref="modal.php?c=Webfrap.ContactForm.formUser&amp;user_id='.$userId.'" class="wcm wcm_req_ajax" >'
      	.$this->icon('control/user.png','User').' '.$row['user'].'</a></td>'.NL;
      $body .= '<td valign="top" >';
      

      if( !is_null( $row['wbfsys_group_users_vid'] ) )
      {
        $body .= '<em>'.$this->icon('relation/dataset.png','Dataset').' Dataset</em>';
      }
      else if( isset($row['wbfsys_group_users_id_area']) && !is_null( $row['wbfsys_group_users_id_area'] ) )
      {
        $body .= '<em>'.$this->icon('relation/management.png','Management').' Table</em>';
      }
      else
      {
        $body .= '<em>'.$this->icon('relation/global.png','Global').' Global</em>';
      }

      $body .= '</td>'.NL;

      $body .= '<td valign="top" >'
        .'<input
          type="text"
          class="'.$this->editForm.' wcm wcm_ui_date show small"
          id="wgt-input-acl-wbfsys_docu_tree-dset-'.$objid.'-date_start"
          name="dset[wbfsys_group_users]['.$objid.'][date_start]"
          value="'.
          (
            (
              '' != trim( $row['wbfsys_group_users_date_start'] )
            )
              ? $this->view->i18n->date($row['wbfsys_group_users_date_start'])
              : ''
          ).'" /></td>'.NL;

      $body .= '<td valign="top" >'
        .'<input
          type="text"
          class="'.$this->editForm.' wcm wcm_ui_date show small"
          id="wgt-input-acl-wbfsys_docu_tree-dset-'.$objid.'-date_end"
          name="dset[wbfsys_group_users]['.$objid.'][date_end]"
          value="'.
          (
            (
              '' != trim( $row['wbfsys_group_users_date_end'] )
            )
              ?$this->view->i18n->date($row['wbfsys_group_users_date_end'])
              :''
          ).'" /></td>'.NL;


      if( $this->enableNav )
      {
        $navigation  = $this->buildCustomButtons
        ( 
          $this->userButtons, 
          array('clean','delete'), 
          $row['wbfsys_group_users_rowid'].'&amp;group_id='.$groupId.'&amp;user_id='.$userId.'&amp;area_id='.$this->areaId 
        );
        
        $body .= '<td valign="top"  class="nav_split"  >'.$navigation.'</td>'.NL;
      }

      $body .= '</tr>]]></htmlArea>'.NL;

    }//end foreach


    $this->xml = $body;

    return $this->xml;

  }//end public function buildAjaxEntry */

////////////////////////////////////////////////////////////////////////////////
// Helper Methodes
////////////////////////////////////////////////////////////////////////////////

  /**
   * create a selectbox with the rights
   * @param string $active
   * @param int $name
   */
  protected function selectRights( $active, $name )
  {

    $html = '<select name="'.$name
    	.'" class="wcm wcm_ui_color_code prop_key_access full '.$this->editForm.'" >'.NL;

    foreach( Acl::$accessLevels as $label => $value   )
    {
      $checked = ($value==$active)?'selected="selected"':'';
      $html .= '<option '.$checked.' value="'.$value.'" >'.$label.'</option>'.NL;
    }

    $html .= '</select>';

    return $html;

  }//end protected function selectRights */

  /**
   * build the table footer
   * @return string
   */
  public function buildTableFooter()
  {

    $html = '<div class="wgt-panel" >'.NL;
    $html .= '  <div class="right menu"  >';
    $html .=  $this->menuTableSize();
    $html .= '  </div>';
    $html .= $this->metaInformations();
    $html .= '</div>'.NL;

    return $html;

  }//end public function buildTableFooter */

  /**
   * build the table footer
   * @return string
   */
  public function buildElementFooter()
  {

    $html = <<<HTML
  <div class="wgt-panel" >
  </div>
HTML;

    return $html;

  }//end public function buildElementFooter */

} // end class WbfsysDocuTree_Acl_Dset_Treetable_Element */

