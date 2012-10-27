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
class WbfsysRoleUser_Viewer_Tab_Default_Modal_View
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
    $this->setLabel( 'Defaults' );

    // set the window title
    $this->setTitle( 'Defaults' );
  
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    // set the tab template
    $this->setTemplate( 'wbfsys/role_user-viewer/tabs/default' );

    $this->addVar( 'objid', $objid );

    $params->saveFormId = 'wgt-form-wbfsys_role_user-viewer-edit-'.$objid;

    // ok gab scheins kein fehler
    return null;

  }//end public function displayTab */

}//end class WbfsysRoleUser_Viewer_Tab_Default_Modal_View

