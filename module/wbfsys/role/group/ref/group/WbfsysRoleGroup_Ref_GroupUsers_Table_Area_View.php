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
class WbfsysRoleGroup_Ref_GroupUsers_Table_Area_View
  extends LibTemplateAreaView
{
////////////////////////////////////////////////////////////////////////////////
// listing methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * add the table item
  * add the search field elements
  *
  * @param int $objid the id of the reference dataset
  * @param TFlag $params
  * @return boolean
  */
  public function displayTab( $objid, $params )
  {
  
    $access = $params->accessGroupUsers;

    // create the form action
    if( !$params->searchFormAction )
      $params->searchFormAction = 'ajax.php?c=Wbfsys.RoleGroup_Ref_GroupUsers.search&amp;objid='.$objid;

    // add the id to the form
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_role_group-ref-group_users-search-'.$objid;

    // fill the relevant data for the search form
    $this->setSearchFormData( $params, 'GroupUsers' );

    // set the default table template
    $this->setTemplate( 'wbfsys/role_group/ref_group_users/tab_table' );

    $ui = $this->loadUi( 'WbfsysRoleGroup_Ref_GroupUsers_Table' );
    $ui->setModel( $this->model );

    // inject the table item in the template system
    $ui->createListItem
    (
      $objid,
      $this->model->search( $objid, $access, $params ),
      $access,
      $params
    );

    // inject the search fields for the table context to the template system
    $ui->searchForm
    (
      $objid,
      $this->model,
      $params
    );


    // alles ok, also geben wir keinen fehler zurück
    return null;

  }//end public function displayTab */

}//end class WbfsysRoleGroup_Ref_GroupUsers_Table_Area_View

