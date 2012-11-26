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
 * @subpackage ModPerson
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CorePerson_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Person';

  /**
   * @var string
   */
  public $pLabel = 'Persons';

  /**
   * @var string
   */
  public $srcKey = 'CorePerson';
  
  /**
   * @var string
   */
  public $srcName = 'core_person';
  
  /**
   * @var string
   */
  public $srcPath = 'core/person';
  
  /**
   * @var string
   */
  public $srcUrl = 'Core.Person';
  
  /**
   * @var string
   */
  public $srcI18n = 'core.person.';
  
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
  public $domainKey = 'CorePerson';

  /**
   * @var string
   */
  public $domainName = 'core_person';
  
  /**
   * @var string
   */
  public $domainPath = 'core/person'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Core.Person'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-core_person'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'core_person'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-core_person'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-core_person';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-core>mgmt-core_person';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'CorePerson_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-core'), UPPER('mgmt-core_person')";
   
  /**
   * @var string
   */
  public $domainI18n = "core.person.";

} // end class CorePerson_Domain */

