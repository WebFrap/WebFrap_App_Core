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
 * @subpackage ModRoleGroupType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysRoleGroupType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'role group Type';

  /**
   * @var string
   */
  public $pLabel = 'role group Types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysRoleGroupType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_role_group_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/role_group_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.RoleGroupType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.role_group_type.';
  
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
  public $domainKey = 'WbfsysRoleGroupType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_role_group_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/role_group_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.RoleGroupType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_role_group_type'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_role_group_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_role_group_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_role_group_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.RoleGroupType_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysRoleGroupType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_role_group_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.role_group_type.";

} // end class WbfsysRoleGroupType_Domain */

