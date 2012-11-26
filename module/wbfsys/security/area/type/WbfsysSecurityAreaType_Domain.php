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
 * @subpackage ModSecurityAreaType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysSecurityAreaType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'security area Type';

  /**
   * @var string
   */
  public $pLabel = 'security area Types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysSecurityAreaType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_security_area_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/security_area_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.SecurityAreaType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.security_area_type.';
  
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
  public $domainKey = 'WbfsysSecurityAreaType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_security_area_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/security_area_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.SecurityAreaType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_security_area_type'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_security_area_type'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_security_area_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_security_area_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_security_area_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysSecurityAreaType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_security_area_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.security_area_type.";

} // end class WbfsysSecurityAreaType_Domain */

