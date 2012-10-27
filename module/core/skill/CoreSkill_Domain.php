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
 * @subpackage ModSkill
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreSkill_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Skill';

  /**
   * @var string
   */
  public $pLabel = 'Skills';

  /**
   * @var string
   */
  public $srcKey = 'CoreSkill';
  
  /**
   * @var string
   */
  public $srcName = 'core_skill';
  
  /**
   * @var string
   */
  public $srcPath = 'core/skill';
  
  /**
   * @var string
   */
  public $srcUrl = 'Core.Skill';
  
  /**
   * @var string
   */
  public $srcI18n = 'core.skill.';
  
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
  public $domainKey = 'CoreSkill';

  /**
   * @var string
   */
  public $domainName = 'core_skill';
  
  /**
   * @var string
   */
  public $domainPath = 'core/skill'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Core.Skill'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mod-core-cat-core_data'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mod-core-cat-core_data'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-core_skill';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-core>mod-core-cat-core_data';
   
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
  public $domainAclQuery = "UPPER('mod-core'), UPPER('mod-core-cat-core_data')";
   
  /**
   * @var string
   */
  public $domainI18n = "core.skill.";

} // end class CoreSkill_Domain */

