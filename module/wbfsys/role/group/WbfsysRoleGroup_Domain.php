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
 * @subpackage ModRoleGroup
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysRoleGroup_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'User Roles';

  /**
   * @var string
   */
  public $pLabel = 'User Roles';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysRoleGroup';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_role_group';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/role_group';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.RoleGroup';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.role_group.';
  
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
  public $domainKey = 'WbfsysRoleGroup';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_role_group';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/role_group'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.RoleGroup'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_role_group'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_role_group'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_role_group';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_role_group';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.RoleGroup_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysRoleGroup_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_role_group')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.role_group.";

} // end class WbfsysRoleGroup_Domain */

