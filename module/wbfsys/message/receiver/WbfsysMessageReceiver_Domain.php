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
 * @subpackage ModMessageReceiver
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMessageReceiver_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Empfänger';

  /**
   * @var string
   */
  public $pLabel = 'Empfängers';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysMessageReceiver';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_message_receiver';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/message_receiver';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.MessageReceiver';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.message_receiver.';
  
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
  public $domainKey = 'WbfsysMessageReceiver';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_message_receiver';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/message_receiver'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.MessageReceiver'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_message_receiver';
   
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
  public $domainI18n = "wbfsys.message_receiver.";

} // end class WbfsysMessageReceiver_Domain */
