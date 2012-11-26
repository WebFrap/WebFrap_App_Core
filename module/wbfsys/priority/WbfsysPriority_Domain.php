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
 * @subpackage ModPriority
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysPriority_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'issue priority';

  /**
   * @var string
   */
  public $pLabel = 'issue prioritys';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysPriority';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_priority';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/priority';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.Priority';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.priority.';
  
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
  public $domainKey = 'WbfsysPriority';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_priority';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/priority'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.Priority'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_priority'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_priority'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_priority'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_priority';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_priority';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysPriority_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_priority')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.priority.";

} // end class WbfsysPriority_Domain */

