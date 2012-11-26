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
 * @subpackage ModAddress
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreAddress_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Address';

  /**
   * @var string
   */
  public $pLabel = 'Address';

  /**
   * @var string
   */
  public $srcKey = 'CoreAddress';
  
  /**
   * @var string
   */
  public $srcName = 'core_address';
  
  /**
   * @var string
   */
  public $srcPath = 'core/address';
  
  /**
   * @var string
   */
  public $srcUrl = 'Core.Address';
  
  /**
   * @var string
   */
  public $srcI18n = 'core.address.';
  
  /**
   * @var string
   */
  public $modName = 'Core';

  /**
   * @var string
   */
  public $modAclKey = 'mod-core';

  /**
   * @var string
   */
  public $domainKey = 'CoreAddress';

  /**
   * @var string
   */
  public $domainName = 'core_address';
  
  /**
   * @var string
   */
  public $domainPath = 'core/address'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Core.Address'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mod-core-cat-core_data'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'ore-cat-core_data'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mod-core-cat-core_data'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-core_address';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-core>mod-core-cat-core_data';
   
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
  public $domainAclQuery = "UPPER('mod-core'), UPPER('mod-core-cat-core_data')";
   
  /**
   * @var string
   */
  public $domainI18n = "core.address.";

} // end class CoreAddress_Domain */

