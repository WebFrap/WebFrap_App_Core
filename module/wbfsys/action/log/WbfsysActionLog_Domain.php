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
 * @subpackage ModActionLog
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysActionLog_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Action Log';

  /**
   * @var string
   */
  public $pLabel = 'Action Logs';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysActionLog';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_action_log';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/action_log';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.ActionLog';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.action_log.';
  
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
  public $domainKey = 'WbfsysActionLog';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_action_log';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/action_log'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.ActionLog'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_action_log';
   
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
  public $domainI18n = "wbfsys.action_log.";

} // end class WbfsysActionLog_Domain */

