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
 * @subpackage ModImage
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysImage_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Image';

  /**
   * @var string
   */
  public $pLabel = 'Images';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysImage';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_image';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/image';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.Image';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.image.';
  
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
  public $domainKey = 'WbfsysImage';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_image';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/image'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.Image'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_image'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_image'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_image'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_image';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_image';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysImage_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_image')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.image.";

} // end class WbfsysImage_Domain */

