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
 * @subpackage ModOrganisation
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreOrganisation_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Organisation';

  /**
   * @var string
   */
  public $pLabel = 'Organisations';

  /**
   * @var string
   */
  public $srcKey = 'CoreOrganisation';
  
  /**
   * @var string
   */
  public $srcName = 'core_organisation';
  
  /**
   * @var string
   */
  public $srcPath = 'core/organisation';
  
  /**
   * @var string
   */
  public $srcUrl = 'Core.Organisation';
  
  /**
   * @var string
   */
  public $srcI18n = 'core.organisation.';
  
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
  public $domainKey = 'CoreOrganisation';

  /**
   * @var string
   */
  public $domainName = 'core_organisation';
  
  /**
   * @var string
   */
  public $domainPath = 'core/organisation'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Core.Organisation'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-core_organisation'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-core_organisation'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-core_organisation';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-core>mgmt-core_organisation';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Core.Organisation_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'CoreOrganisation_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-core'), UPPER('mgmt-core_organisation')";
   
  /**
   * @var string
   */
  public $domainI18n = "core.organisation.";

} // end class CoreOrganisation_Domain */

