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
 * @subpackage ModWbfsysTask
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class MyWbfsysTask_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'My Tasks';

  /**
   * @var string
   */
  public $pLabel = 'My Tasks';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysTask';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_task';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/task';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.Task';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.task.';
  
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
  public $domainKey = 'MyWbfsysTask';

  /**
   * @var string
   */
  public $domainName = 'my_wbfsys_task';
  
  /**
   * @var string
   */
  public $domainPath = 'my/wbfsys_task'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'My.WbfsysTask'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-my_wbfsys_task'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_task'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-my_wbfsys_task';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys/mgmt-wbfsys_task>mgmt-my_wbfsys_task';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'My.WbfsysTask_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'MyWbfsysTask_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_task'), UPPER('mgmt-my_wbfsys_task')";
   
  /**
   * @var string
   */
  public $domainI18n = "my.wbfsys_task.";

} // end class MyWbfsysTask_Domain */

