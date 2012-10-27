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
 * @subpackage ModProtocolMessage
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysProtocolMessage_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Protocol Message';

  /**
   * @var string
   */
  public $pLabel = 'Protocol Messages';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysProtocolMessage';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_protocol_message';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/protocol_message';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.ProtocolMessage';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.protocol_message.';
  
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
  public $domainKey = 'WbfsysProtocolMessage';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_protocol_message';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/protocol_message'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.ProtocolMessage'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_protocol_message';
   
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
  public $domainI18n = "wbfsys.protocol_message.";

} // end class WbfsysProtocolMessage_Domain */
