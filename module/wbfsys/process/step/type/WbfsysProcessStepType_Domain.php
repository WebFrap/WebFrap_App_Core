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
 * @subpackage ModProcessStepType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysProcessStepType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'process step Type';

  /**
   * @var string
   */
  public $pLabel = 'process step Types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysProcessStepType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_process_step_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/process_step_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.ProcessStepType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.process_step_type.';
  
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
  public $domainKey = 'WbfsysProcessStepType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_process_step_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/process_step_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.ProcessStepType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_process_step_type'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_process_step_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_process_step_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_process_step_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.ProcessStepType_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysProcessStepType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_process_step_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.process_step_type.";

} // end class WbfsysProcessStepType_Domain */

