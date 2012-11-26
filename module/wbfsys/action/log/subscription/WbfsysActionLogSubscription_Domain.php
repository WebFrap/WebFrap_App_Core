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
 * @subpackage ModActionLogSubscription
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysActionLogSubscription_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Action Log Subscription';

  /**
   * @var string
   */
  public $pLabel = 'Action Log Subscriptions';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysActionLogSubscription';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_action_log_subscription';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/action_log_subscription';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.ActionLogSubscription';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.action_log_subscription.';
  
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
  public $domainKey = 'WbfsysActionLogSubscription';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_action_log_subscription';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/action_log_subscription'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.ActionLogSubscription'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_action_log_subscription';
   
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
  public $domainI18n = "wbfsys.action_log_subscription.";

} // end class WbfsysActionLogSubscription_Domain */

