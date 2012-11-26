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
 * @subpackage ModMessageRepository
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMessageRepository_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Message Repository';

  /**
   * @var string
   */
  public $pLabel = 'Message Repositorys';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysMessageRepository';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_message_repository';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/message_repository';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.MessageRepository';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.message_repository.';
  
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
  public $domainKey = 'WbfsysMessageRepository';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_message_repository';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/message_repository'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.MessageRepository'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_message_repository'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_message_repository'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_message_repository'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_message_repository';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_message_repository';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysMessageRepository_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_message_repository')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.message_repository.";

} // end class WbfsysMessageRepository_Domain */

