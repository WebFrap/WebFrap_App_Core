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
 * @subpackage ModIpaddress
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysIpaddress_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Ipaddress';

  /**
   * @var string
   */
  public $pLabel = 'Ipaddress';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysIpaddress';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_ipaddress';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/ipaddress';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.Ipaddress';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.ipaddress.';
  
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
  public $domainKey = 'WbfsysIpaddress';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_ipaddress';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/ipaddress'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.Ipaddress'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_ipaddress';
   
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
  public $domainI18n = "wbfsys.ipaddress.";

} // end class WbfsysIpaddress_Domain */

