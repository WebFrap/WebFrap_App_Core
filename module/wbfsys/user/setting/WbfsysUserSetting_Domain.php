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
 * @subpackage ModUserSetting
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysUserSetting_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'User Setting';

  /**
   * @var string
   */
  public $pLabel = 'User Settings';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysUserSetting';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_user_setting';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/user_setting';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.UserSetting';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.user_setting.';
  
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
  public $domainKey = 'WbfsysUserSetting';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_user_setting';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/user_setting'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.UserSetting'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_user_setting'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_user_setting'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_user_setting'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_user_setting';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_user_setting';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysUserSetting_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_user_setting')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.user_setting.";

} // end class WbfsysUserSetting_Domain */

