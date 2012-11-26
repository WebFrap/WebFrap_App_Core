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
 * @subpackage ModPackageType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysPackageType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'package Type';

  /**
   * @var string
   */
  public $pLabel = 'package Types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysPackageType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_package_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/package_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.PackageType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.package_type.';
  
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
  public $domainKey = 'WbfsysPackageType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_package_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/package_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.PackageType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_package_type'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_package_type'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_package_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_package_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_package_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysPackageType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_package_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.package_type.";

} // end class WbfsysPackageType_Domain */

