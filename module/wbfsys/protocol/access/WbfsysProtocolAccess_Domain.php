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
 * @subpackage ModProtocolAccess
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysProtocolAccess_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Protocol Access';

  /**
   * @var string
   */
  public $pLabel = 'Protocol Access';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysProtocolAccess';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_protocol_access';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/protocol_access';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.ProtocolAccess';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.protocol_access.';
  
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
  public $domainKey = 'WbfsysProtocolAccess';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_protocol_access';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/protocol_access'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.ProtocolAccess'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_protocol_access';
   
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
  public $domainI18n = "wbfsys.protocol_access.";

} // end class WbfsysProtocolAccess_Domain */

