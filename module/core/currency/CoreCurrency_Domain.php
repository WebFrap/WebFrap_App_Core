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
 * @subpackage ModCurrency
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreCurrency_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Currency';

  /**
   * @var string
   */
  public $pLabel = 'Currencys';

  /**
   * @var string
   */
  public $srcKey = 'CoreCurrency';
  
  /**
   * @var string
   */
  public $srcName = 'core_currency';
  
  /**
   * @var string
   */
  public $srcPath = 'core/currency';
  
  /**
   * @var string
   */
  public $srcUrl = 'Core.Currency';
  
  /**
   * @var string
   */
  public $srcI18n = 'core.currency.';
  
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
  public $domainKey = 'CoreCurrency';

  /**
   * @var string
   */
  public $domainName = 'core_currency';
  
  /**
   * @var string
   */
  public $domainPath = 'core/currency'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Core.Currency'; 
   
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
  public $aclMaskKey = 'mgmt-core_currency';
   
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
  public $domainI18n = "core.currency.";

} // end class CoreCurrency_Domain */

