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
 * @subpackage ModDomainAlias
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysDomainAlias_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Domain Alias';

  /**
   * @var string
   */
  public $pLabel = 'Domain Alias';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysDomainAlias';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_domain_alias';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/domain_alias';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.DomainAlias';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.domain_alias.';
  
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
  public $domainKey = 'WbfsysDomainAlias';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_domain_alias';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/domain_alias'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.DomainAlias'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_domain_alias';
   
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
  public $domainI18n = "wbfsys.domain_alias.";

} // end class WbfsysDomainAlias_Domain */

