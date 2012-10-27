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
 * @subpackage ModPackageStatus
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysPackageStatus_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'package Status';

  /**
   * @var string
   */
  public $pLabel = 'package Status';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysPackageStatus';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_package_status';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/package_status';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.PackageStatus';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.package_status.';
  
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
  public $domainKey = 'WbfsysPackageStatus';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_package_status';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/package_status'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.PackageStatus'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mod-wbfsys-cat-core_data'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mod-wbfsys-cat-core_data'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_package_status';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mod-wbfsys-cat-core_data';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Webfrap.Coredata_Acl';
   
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
  public $domainI18n = "wbfsys.package_status.";

} // end class WbfsysPackageStatus_Domain */

