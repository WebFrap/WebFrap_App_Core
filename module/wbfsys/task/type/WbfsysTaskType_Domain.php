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
 * @subpackage ModTaskType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysTaskType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'task Type';

  /**
   * @var string
   */
  public $pLabel = 'task Types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysTaskType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_task_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/task_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.TaskType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.task_type.';
  
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
  public $domainKey = 'WbfsysTaskType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_task_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/task_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.TaskType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_task_type'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_task_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_task_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_task_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.TaskType_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysTaskType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_task_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.task_type.";

} // end class WbfsysTaskType_Domain */

