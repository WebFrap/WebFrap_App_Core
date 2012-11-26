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
 * @subpackage ModSkillRequirement
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreSkillRequirement_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Skill Requirement';

  /**
   * @var string
   */
  public $pLabel = 'Skill Requirements';

  /**
   * @var string
   */
  public $srcKey = 'CoreSkillRequirement';
  
  /**
   * @var string
   */
  public $srcName = 'core_skill_requirement';
  
  /**
   * @var string
   */
  public $srcPath = 'core/skill_requirement';
  
  /**
   * @var string
   */
  public $srcUrl = 'Core.SkillRequirement';
  
  /**
   * @var string
   */
  public $srcI18n = 'core.skill_requirement.';
  
  /**
   * @var string
   */
  public $modName = 'Core';

  /**
   * @var string
   */
  public $modAclKey = 'mod-core';

  /**
   * @var string
   */
  public $domainKey = 'CoreSkillRequirement';

  /**
   * @var string
   */
  public $domainName = 'core_skill_requirement';
  
  /**
   * @var string
   */
  public $domainPath = 'core/skill_requirement'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Core.SkillRequirement'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mod-core-cat-core_data'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'ore-cat-core_data'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mod-core-cat-core_data'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-core_skill_requirement';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-core>mod-core-cat-core_data';
   
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
  public $domainAclQuery = "UPPER('mod-core'), UPPER('mod-core-cat-core_data')";
   
  /**
   * @var string
   */
  public $domainI18n = "core.skill_requirement.";

} // end class CoreSkillRequirement_Domain */

