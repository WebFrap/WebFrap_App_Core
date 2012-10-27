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
 * @subpackage ModMessage
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMessage_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Message';

  /**
   * @var string
   */
  public $pLabel = 'Messages';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysMessage';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_message';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/message';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.Message';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.message.';
  
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
  public $domainKey = 'WbfsysMessage';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_message';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/message'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.Message'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_message'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_message'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_message';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_message';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.Message_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysMessage_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_message')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.message.";

} // end class WbfsysMessage_Domain */

