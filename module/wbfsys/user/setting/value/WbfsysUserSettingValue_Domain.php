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
 * @subpackage ModUserSettingValue
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysUserSettingValue_Domain
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
  public $srcKey = 'WbfsysUserSettingValue';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_user_setting_value';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/user_setting_value';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.UserSettingValue';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.user_setting_value.';
  
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
  public $domainKey = 'WbfsysUserSettingValue';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_user_setting_value';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/user_setting_value'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.UserSettingValue'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_user_setting_value'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_user_setting_value'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_user_setting_value'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_user_setting_value';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_user_setting_value';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysUserSettingValue_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_user_setting_value')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.user_setting_value.";

} // end class WbfsysUserSettingValue_Domain */

