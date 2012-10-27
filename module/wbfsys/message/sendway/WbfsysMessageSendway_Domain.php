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
 * @subpackage ModMessageSendway
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMessageSendway_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Message Sendway';

  /**
   * @var string
   */
  public $pLabel = 'Message Sendways';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysMessageSendway';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_message_sendway';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/message_sendway';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.MessageSendway';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.message_sendway.';
  
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
  public $domainKey = 'WbfsysMessageSendway';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_message_sendway';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/message_sendway'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.MessageSendway'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_message_sendway'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_message_sendway'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_message_sendway';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_message_sendway';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.MessageSendway_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysMessageSendway_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_message_sendway')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.message_sendway.";

} // end class WbfsysMessageSendway_Domain */

