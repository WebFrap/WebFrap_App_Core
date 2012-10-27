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
 * @subpackage ModNetProtocol
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysNetProtocol_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Network Protocol';

  /**
   * @var string
   */
  public $pLabel = 'Network Protocols';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysNetProtocol';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_net_protocol';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/net_protocol';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.NetProtocol';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.net_protocol.';
  
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
  public $domainKey = 'WbfsysNetProtocol';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_net_protocol';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/net_protocol'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.NetProtocol'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_net_protocol';
   
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
  public $domainI18n = "wbfsys.net_protocol.";

} // end class WbfsysNetProtocol_Domain */

