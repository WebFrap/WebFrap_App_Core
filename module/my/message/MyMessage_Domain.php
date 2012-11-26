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
class MyMessage_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'My Messages';

  /**
   * @var string
   */
  public $pLabel = 'My Messages';

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
  public $domainKey = 'MyMessage';

  /**
   * @var string
   */
  public $domainName = 'my_message';
  
  /**
   * @var string
   */
  public $domainPath = 'my/message'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'My.Message'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-my_message'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'my_message'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_message'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-my_message';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys/mgmt-wbfsys_message>mgmt-my_message';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'MyMessage_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_message'), UPPER('mgmt-my_message')";
   
  /**
   * @var string
   */
  public $domainI18n = "my.message.";

} // end class MyMessage_Domain */

