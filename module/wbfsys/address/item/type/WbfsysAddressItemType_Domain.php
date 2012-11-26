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
 * @subpackage ModAddressItemType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysAddressItemType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'address item Type';

  /**
   * @var string
   */
  public $pLabel = 'address item Types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysAddressItemType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_address_item_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/address_item_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.AddressItemType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.address_item_type.';
  
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
  public $domainKey = 'WbfsysAddressItemType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_address_item_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/address_item_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.AddressItemType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_address_item_type'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_address_item_type'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_address_item_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_address_item_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_address_item_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysAddressItemType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_address_item_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.address_item_type.";

} // end class WbfsysAddressItemType_Domain */

