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
 * @subpackage ModImageFormat
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysImageFormat_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'image format';

  /**
   * @var string
   */
  public $pLabel = 'image formats';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysImageFormat';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_image_format';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/image_format';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.ImageFormat';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.image_format.';
  
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
  public $domainKey = 'WbfsysImageFormat';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_image_format';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/image_format'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.ImageFormat'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_image_format'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_image_format'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_image_format'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_image_format';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_image_format';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysImageFormat_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_image_format')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.image_format.";

} // end class WbfsysImageFormat_Domain */

