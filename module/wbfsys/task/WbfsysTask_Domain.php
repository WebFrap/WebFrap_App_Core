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
 * @subpackage ModTask
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysTask_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Task';

  /**
   * @var string
   */
  public $pLabel = 'Tasks';

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
  public $domainKey = 'WbfsysTask';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_task';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/task'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.Task'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_task'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_task'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_task'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_task';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_task';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysTask_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_task')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.task.";

} // end class WbfsysTask_Domain */

