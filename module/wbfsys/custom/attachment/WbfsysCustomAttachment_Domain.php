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
 * @subpackage ModCustomAttachment
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysCustomAttachment_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Custom Attachment';

  /**
   * @var string
   */
  public $pLabel = 'Custom Attachments';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysCustomAttachment';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_custom_attachment';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/custom_attachment';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.CustomAttachment';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.custom_attachment.';
  
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
  public $domainKey = 'WbfsysCustomAttachment';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_custom_attachment';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/custom_attachment'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.CustomAttachment'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_custom_attachment';
   
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
  public $domainI18n = "wbfsys.custom_attachment.";

} // end class WbfsysCustomAttachment_Domain */

