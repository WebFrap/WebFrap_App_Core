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
 * @subpackage ModProcessPhase
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysProcessPhase_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Process Phase';

  /**
   * @var string
   */
  public $pLabel = 'Process Phases';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysProcessPhase';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_process_phase';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/process_phase';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.ProcessPhase';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.process_phase.';
  
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
  public $domainKey = 'WbfsysProcessPhase';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_process_phase';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/process_phase'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.ProcessPhase'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_process_phase';
   
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
  public $domainI18n = "wbfsys.process_phase.";

} // end class WbfsysProcessPhase_Domain */

