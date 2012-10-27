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
 * @subpackage ModPackageModules
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysPackageModules_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Package Modules';

  /**
   * @var string
   */
  public $pLabel = 'Package Modules';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysPackageModules';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_package_modules';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/package_modules';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.PackageModules';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.package_modules.';
  
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
  public $domainKey = 'WbfsysPackageModules';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_package_modules';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/package_modules'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.PackageModules'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_package_modules'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_package_modules'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_package_modules';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_package_modules';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.PackageModules_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysPackageModules_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_package_modules')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.package_modules.";

} // end class WbfsysPackageModules_Domain */

