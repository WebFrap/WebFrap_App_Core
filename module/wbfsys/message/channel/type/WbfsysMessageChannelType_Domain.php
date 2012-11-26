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
 * @subpackage ModMessageChannelType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMessageChannelType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'message channel Type';

  /**
   * @var string
   */
  public $pLabel = 'message channel Types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysMessageChannelType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_message_channel_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/message_channel_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.MessageChannelType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.message_channel_type.';
  
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
  public $domainKey = 'WbfsysMessageChannelType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_message_channel_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/message_channel_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.MessageChannelType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_message_channel_type'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_message_channel_type'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_message_channel_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_message_channel_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_message_channel_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysMessageChannelType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_message_channel_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.message_channel_type.";

} // end class WbfsysMessageChannelType_Domain */

