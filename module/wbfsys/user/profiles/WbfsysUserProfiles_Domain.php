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
 * @subpackage ModUserProfiles
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysUserProfiles_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'User Profiles';

  /**
   * @var string
   */
  public $pLabel = 'User Profiles';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysUserProfiles';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_user_profiles';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/user_profiles';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.UserProfiles';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.user_profiles.';
  
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
  public $domainKey = 'WbfsysUserProfiles';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_user_profiles';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/user_profiles'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.UserProfiles'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_user_profiles'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_user_profiles'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_user_profiles';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_user_profiles';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.UserProfiles_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysUserProfiles_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_user_profiles')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.user_profiles.";

} // end class WbfsysUserProfiles_Domain */

