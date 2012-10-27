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
class WbfsysRoleUser_Crud_Selection_Element
  extends WgtTable
{
////////////////////////////////////////////////////////////////////////////////
// attributes
////////////////////////////////////////////////////////////////////////////////

  /**
   * the html id of the table tag, this id can be used to replace the table
   * or table contents via ajax interface.
   *
   * @var string $id
   */
  public $id   = 'wgt_selection-wbfsys_role_user';

  /**
   * the most likley class of a given query object
   *
   * @var WbfsysRoleUser_Crud_Selection_Query
   */
  public $data = null;

  /**
   * list with all actions for the listed datarows
   * this list is easy extendable via addUrl.
   * This array only contains possible actions, but you have to set it
   * manually wich actions are used with: Wgt::addActions
   * @var array
   */
  public $url  = array
  (
    'edit'    => array
    (
      Wgt::ACTION_BUTTON_GET,
      'Edit',
      'maintab.php?c=Wbfsys.RoleUser.edit&amp;target_mask=WbfsysRoleUser&amp;ltype=selection&amp;objid=',
      'control/edit.png',
      'wcm wcm_ui_tip',
      'wbfsys.role_user.label',
      Acl::UPDATE
    ),
    'show'    => array
    (
      Wgt::ACTION_BUTTON_GET,
      'Show',
      'maintab.php?c=Wbfsys.RoleUser.show&amp;target_mask=WbfsysRoleUser&amp;ltype=selection&amp;objid=',
      'control/show.png',
      'wcm wcm_ui_tip',
      'wbfsys.role_user.label',
      Acl::ACCESS,
      Acl::UPDATE
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

////////////////////////////////////////////////////////////////////////////////
// context: table
////////////////////////////////////////////////////////////////////////////////

  /**
   * parse the table
   *
   * @return string
   */
  public function buildHtml( )
  {
    // if we have html we can assume that the table was allready parsed
    // so we return just the html and stop here
    // this behaviour enables you to call a specific parser method from outside
    // of the view, but then get the html of the called parse method
    if( $this->html )
      return $this->html;

    $this->html .= '<div id="'.$this->id.'" class="wgt-grid" >'.NL;
    $this->html .= '<table id="'.$this->id.'-table" class="wgt-grid wcm wcm_widget_grid hide-head" >'.NL;
    $this->html .= $this->buildThead();
    $this->html .= $this->buildTbody();

    $this->html .= '</table>';
    $this->html .= $this->buildTableFooter();
    $this->html .= '</div>'.NL;
    

      $this->html .= '<script type="text/javascript" >'.NL;
      $this->html .= $this->buildJavascript();
      $this->html .= '</script>'.NL;

  
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
    $html .= '<th style="width:270px" >Name</th>'.NL;
    $html .= '<th style="width:100px" >Profile</th>'.NL;
    $html .= '<th style="width:70px" >Since</th>'.NL;
    $html .= '<th style="width:50px" >Inactiv</th>'.NL;

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
    


    // create the table body
    $body = '<tbody>'.NL;

    // simple switch method to create collored rows
    $pos = 1;
    $num = 1;
    foreach( $this->data as $key => $row   )
    {

      $objid       = $row['wbfsys_role_user_rowid'];
      $rowid       = $this->id.'_row_'.$objid;
      



      $body .= '<tr class="wcm wcm_ui_highlight '.' row'.$num.' node-'.$objid.'" '

        .' wgt_eid="'.$objid.'" ' 
        .' id="'.$rowid.'" >'.NL;
      $body .= '<td  valign="top" class="pos" name="slct['.$objid.']" style="text-align:right;" >'.$pos.'</td>'.NL;

      $body .= '<td valign="top" >'.Validator::sanitizeHtml($row['wbfsys_role_user_name']).'<br />'.Validator::sanitizeHtml($row['embed_person_lastname']).'<span>, </span>'.Validator::sanitizeHtml($row['embed_person_firstname']).'</td>'.NL;
      $body .= '<td valign="top" >'.Validator::sanitizeHtml($row['wbfsys_profile_name']).'</td>'.NL;
      $body .= '<td valign="top" >'.('' != trim($row['wbfsys_role_user_m_time_created'])?$this->view->i18n->date($row['wbfsys_role_user_m_time_created']):' ').'</td>'.NL;
      $body .= '<td valign="top" >'.WgtRndForm::checkbox( 'wbfsys_role_user[inactive]', $row['wbfsys_role_user_inactive'] , array() , true ).'</td>'.NL;
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
   * Der Footer der Tabelle
   * @return string
   */
  public function buildTableFooter()
  {

    $html = '<div class="wgt-panel wgt-border-top" >'.NL;
    $html .= ' <div class="right menu"  >';
    $html .=     $this->menuTableSize();
    $html .= ' </div>';
    $html .= $this->metaInformations();
    $html .= '</div>'.NL;
    return $html;

  }//end public function buildTableFooter */

}//end class WbfsysRoleUser_Crud_Selection_Element

