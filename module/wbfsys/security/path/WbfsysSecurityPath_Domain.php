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
 * @subpackage ModSecurityPath
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysSecurityPath_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Security Path';

  /**
   * @var string
   */
  public $pLabel = 'Security Paths';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysSecurityPath';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_security_path';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/security_path';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.SecurityPath';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.security_path.';
  
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
  public $domainKey = 'WbfsysSecurityPath';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_security_path';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/security_path'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.SecurityPath'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_security_path';
   
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
  public $domainI18n = "wbfsys.security_path.";

} // end class WbfsysSecurityPath_Domain */

