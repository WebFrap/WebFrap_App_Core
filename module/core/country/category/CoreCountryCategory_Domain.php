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
 * @subpackage ModCountryCategory
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreCountryCategory_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'country Category';

  /**
   * @var string
   */
  public $pLabel = 'country Categorys';

  /**
   * @var string
   */
  public $srcKey = 'CoreCountryCategory';
  
  /**
   * @var string
   */
  public $srcName = 'core_country_category';
  
  /**
   * @var string
   */
  public $srcPath = 'core/country_category';
  
  /**
   * @var string
   */
  public $srcUrl = 'Core.CountryCategory';
  
  /**
   * @var string
   */
  public $srcI18n = 'core.country_category.';
  
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
  public $domainKey = 'CoreCountryCategory';

  /**
   * @var string
   */
  public $domainName = 'core_country_category';
  
  /**
   * @var string
   */
  public $domainPath = 'core/country_category'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Core.CountryCategory'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-core_country_category'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-core_country_category'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-core_country_category';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-core>mgmt-core_country_category';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Core.CountryCategory_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'CoreCountryCategory_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-core'), UPPER('mgmt-core_country_category')";
   
  /**
   * @var string
   */
  public $domainI18n = "core.country_category.";

} // end class CoreCountryCategory_Domain */

