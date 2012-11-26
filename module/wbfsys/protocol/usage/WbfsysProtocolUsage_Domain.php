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
 * @subpackage ModProtocolUsage
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysProtocolUsage_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Protocol Usage';

  /**
   * @var string
   */
  public $pLabel = 'Protocol Usages';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysProtocolUsage';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_protocol_usage';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/protocol_usage';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.ProtocolUsage';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.protocol_usage.';
  
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
  public $domainKey = 'WbfsysProtocolUsage';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_protocol_usage';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/protocol_usage'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.ProtocolUsage'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mod-wbfsys-cat-core_data'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'bfsys-cat-core_data'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mod-wbfsys-cat-core_data'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_protocol_usage';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mod-wbfsys-cat-core_data';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
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
  public $domainI18n = "wbfsys.protocol_usage.";

} // end class WbfsysProtocolUsage_Domain */

