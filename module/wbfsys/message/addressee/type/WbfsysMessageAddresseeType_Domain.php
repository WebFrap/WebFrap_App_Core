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
 * @subpackage ModMessageAddresseeType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMessageAddresseeType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'message addressee Type';

  /**
   * @var string
   */
  public $pLabel = 'message addressee Types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysMessageAddresseeType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_message_addressee_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/message_addressee_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.MessageAddresseeType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.message_addressee_type.';
  
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
  public $domainKey = 'WbfsysMessageAddresseeType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_message_addressee_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/message_addressee_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.MessageAddresseeType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_message_addressee_type'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_message_addressee_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_message_addressee_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_message_addressee_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.MessageAddresseeType_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysMessageAddresseeType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_message_addressee_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.message_addressee_type.";

} // end class WbfsysMessageAddresseeType_Domain */

