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
 * @subpackage ModUserSettingType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysUserSettingType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'user setting value type';

  /**
   * @var string
   */
  public $pLabel = 'user setting value types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysUserSettingType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_user_setting_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/user_setting_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.UserSettingType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.user_setting_type.';
  
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
  public $domainKey = 'WbfsysUserSettingType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_user_setting_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/user_setting_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.UserSettingType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_user_setting_type'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_user_setting_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_user_setting_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_user_setting_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.UserSettingType_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysUserSettingType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_user_setting_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.user_setting_type.";

} // end class WbfsysUserSettingType_Domain */

