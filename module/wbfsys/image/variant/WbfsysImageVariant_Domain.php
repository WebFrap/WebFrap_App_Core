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
 * @subpackage ModImageVariant
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysImageVariant_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Image Variant';

  /**
   * @var string
   */
  public $pLabel = 'Image Variants';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysImageVariant';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_image_variant';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/image_variant';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.ImageVariant';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.image_variant.';
  
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
  public $domainKey = 'WbfsysImageVariant';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_image_variant';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/image_variant'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.ImageVariant'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_image_variant';
   
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
  public $domainI18n = "wbfsys.image_variant.";

} // end class WbfsysImageVariant_Domain */

