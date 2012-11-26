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
 * @subpackage ModProfileQuicklink
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysProfileQuicklink_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Profile Quicklink';

  /**
   * @var string
   */
  public $pLabel = 'Profile Quicklinks';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysProfileQuicklink';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_profile_quicklink';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/profile_quicklink';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.ProfileQuicklink';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.profile_quicklink.';
  
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
  public $domainKey = 'WbfsysProfileQuicklink';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_profile_quicklink';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/profile_quicklink'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.ProfileQuicklink'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_profile_quicklink';
   
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
  public $domainI18n = "wbfsys.profile_quicklink.";

} // end class WbfsysProfileQuicklink_Domain */

