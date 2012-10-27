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
 * @subpackage ModMessageReferences
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMessageReferences_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Nachrichten Quelle';

  /**
   * @var string
   */
  public $pLabel = 'Nachrichten Quelles';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysMessageReferences';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_message_references';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/message_references';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.MessageReferences';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.message_references.';
  
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
  public $domainKey = 'WbfsysMessageReferences';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_message_references';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/message_references'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.MessageReferences'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_message_references';
   
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
  public $domainI18n = "wbfsys.message_references.";

} // end class WbfsysMessageReferences_Domain */

