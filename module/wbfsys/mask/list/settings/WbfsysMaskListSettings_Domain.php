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
 * @subpackage ModMaskListSettings
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMaskListSettings_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Mask List Settings';

  /**
   * @var string
   */
  public $pLabel = 'Mask List Settings';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysMaskListSettings';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_mask_list_settings';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/mask_list_settings';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.MaskListSettings';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.mask_list_settings.';
  
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
  public $domainKey = 'WbfsysMaskListSettings';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_mask_list_settings';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/mask_list_settings'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.MaskListSettings'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_mask_list_settings';
   
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
  public $domainI18n = "wbfsys.mask_list_settings.";

} // end class WbfsysMaskListSettings_Domain */

