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
class WbfsysRoleUser_Tab_Groups_Modal_View
  extends WgtModal
{
/*//////////////////////////////////////////////////////////////////////////////
// Attributes
//////////////////////////////////////////////////////////////////////////////*/

 /**
	* @var int Width of the modal element in px
	*/
  public $width = 900;
  
 /**
	* @var int Height of the modal element in px
	*/
  public $height = 650;

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

    // set the window status
    $this->setLabel( 'Groups' );

    // set the window title
    $this->setTitle( 'Groups' );
  
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    // set the tab template
    $this->setTemplate( 'wbfsys/role_user/tabs/groups' );

    $this->addVar( 'objid', $objid );

    $params->saveFormId = 'wgt-form-wbfsys_role_user-edit-'.$objid;

//##############################################################################
// code block reference user_roles
//##############################################################################
    
    // reference user_roles
    $paramsUserRoles = $params->paramsUserRoles;


    $params->refIdUserRoles = $objid;
    $paramsUserRoles->refId = $objid;
    $paramsUserRoles->refIdUserRoles = $objid;


    // create the form action
    $paramsUserRoles->searchFormAction = 'ajax.php?c=Wbfsys.RoleUser_Ref_UserRoles.search&amp;objid='.$objid;

    // add the id to the form
    $paramsUserRoles->searchFormId = 'wgt-form-table-wbfsys_role_user-ref-user_roles-search-'.$objid;

    // if a table id is given use it for the table
    $paramsUserRoles->targetId = 'wgt_table-wbfsys_role_user-ref-user_roles-'.$objid;

    // fill the relevant data for the search form
    $this->setSearchFormData( $paramsUserRoles, 'UserRoles' );

    $model = $this->getModel( 'WbfsysRoleUser_Ref_UserRoles_Table' );

    $ui = $this->loadUi( 'WbfsysRoleUser_Ref_UserRoles_Table' );
    $ui->setModel( $model );

    $data = $model->search
    ( 
      $objid, 
      $paramsUserRoles->access, 
      $paramsUserRoles 
    );

    // inject the table item in the template system
    $ui->createListItem
    (
      $objid,
      $data,
      $paramsUserRoles->access,
      $paramsUserRoles
    );

    // inject the search fields for the table context to the template system
    $ui->searchForm
    (
      $objid,
      $model,
      $paramsUserRoles
    );



    // ok gab scheins kein fehler
    return null;

  }//end public function displayTab */

}//end class WbfsysRoleUser_Tab_Groups_Modal_View

