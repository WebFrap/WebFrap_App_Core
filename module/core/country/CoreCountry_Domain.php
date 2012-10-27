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
 * @subpackage ModCountry
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreCountry_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Country';

  /**
   * @var string
   */
  public $pLabel = 'Countrys';

  /**
   * @var string
   */
  public $srcKey = 'CoreCountry';
  
  /**
   * @var string
   */
  public $srcName = 'core_country';
  
  /**
   * @var string
   */
  public $srcPath = 'core/country';
  
  /**
   * @var string
   */
  public $srcUrl = 'Core.Country';
  
  /**
   * @var string
   */
  public $srcI18n = 'core.country.';
  
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
  public $domainKey = 'CoreCountry';

  /**
   * @var string
   */
  public $domainName = 'core_country';
  
  /**
   * @var string
   */
  public $domainPath = 'core/country'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Core.Country'; 
   
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
  public $aclMaskKey = 'mgmt-core_country';
   
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
  public $domainI18n = "core.country.";

} // end class CoreCountry_Domain */

