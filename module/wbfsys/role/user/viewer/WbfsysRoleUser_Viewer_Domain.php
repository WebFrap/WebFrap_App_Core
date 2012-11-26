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
 *
 * @package WebFrap
 * @subpackage ModRoleUser_Viewer
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysRoleUser_Viewer_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Employee';

  /**
   * @var string
   */
  public $pLabel = 'Employees';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysRoleUser';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_role_user';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/role_user';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.RoleUser';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.role_user.';
  
  /**
   * @var string
   */
  public $modName = 'Wbfsys';

  /**
   * @var string
   */
  public $modAclKey = 'mod-wbfsys';

  /**
   * @var string
   */
  public $domainKey = 'WbfsysRoleUser_Viewer';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_role_user-viewer';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/role_user-viewer'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.RoleUser_Viewer'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mod-wbfsys-cat-core_data'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'bfsys-cat-core_data'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mod-wbfsys-cat-core_data'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_role_user-viewer';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mod-wbfsys-cat-core_data';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WebfrapCoredata_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mod-wbfsys-cat-core_data')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.role_user_viewer.";

} // end class WbfsysRoleUser_Viewer_Domain */

