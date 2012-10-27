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
 * @subpackage ModMaskAttribute
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMaskAttribute_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Mask Attribute';

  /**
   * @var string
   */
  public $pLabel = 'Mask Attributes';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysMaskAttribute';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_mask_attribute';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/mask_attribute';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.MaskAttribute';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.mask_attribute.';
  
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
  public $domainKey = 'WbfsysMaskAttribute';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_mask_attribute';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/mask_attribute'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.MaskAttribute'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_mask_attribute';
   
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
  public $domainI18n = "wbfsys.mask_attribute.";

} // end class WbfsysMaskAttribute_Domain */

