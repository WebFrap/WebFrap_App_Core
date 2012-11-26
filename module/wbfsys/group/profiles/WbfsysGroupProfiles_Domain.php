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
 * @subpackage ModGroupProfiles
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysGroupProfiles_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Group Profiles';

  /**
   * @var string
   */
  public $pLabel = 'Group Profiles';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysGroupProfiles';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_group_profiles';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/group_profiles';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.GroupProfiles';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.group_profiles.';
  
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
  public $domainKey = 'WbfsysGroupProfiles';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_group_profiles';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/group_profiles'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.GroupProfiles'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_group_profiles'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_group_profiles'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_group_profiles'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_group_profiles';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_group_profiles';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysGroupProfiles_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_group_profiles')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.group_profiles.";

} // end class WbfsysGroupProfiles_Domain */

