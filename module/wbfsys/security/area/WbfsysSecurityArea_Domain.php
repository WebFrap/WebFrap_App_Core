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
 * @subpackage ModSecurityArea
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysSecurityArea_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Security Area';

  /**
   * @var string
   */
  public $pLabel = 'Security Areas';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysSecurityArea';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_security_area';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/security_area';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.SecurityArea';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.security_area.';
  
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
  public $domainKey = 'WbfsysSecurityArea';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_security_area';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/security_area'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.SecurityArea'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_security_area'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_security_area'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_security_area';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_security_area';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.SecurityArea_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysSecurityArea_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_security_area')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.security_area.";

} // end class WbfsysSecurityArea_Domain */

