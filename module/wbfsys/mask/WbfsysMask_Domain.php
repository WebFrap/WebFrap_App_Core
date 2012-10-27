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
 * @subpackage ModMask
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMask_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Mask';

  /**
   * @var string
   */
  public $pLabel = 'Masks';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysMask';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_mask';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/mask';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.Mask';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.mask.';
  
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
  public $domainKey = 'WbfsysMask';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_mask';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/mask'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.Mask'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_mask'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_mask'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_mask';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_mask';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.Mask_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysMask_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_mask')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.mask.";

} // end class WbfsysMask_Domain */

