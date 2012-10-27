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
 * @subpackage ModCity
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreCity_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'City';

  /**
   * @var string
   */
  public $pLabel = 'Citys';

  /**
   * @var string
   */
  public $srcKey = 'CoreCity';
  
  /**
   * @var string
   */
  public $srcName = 'core_city';
  
  /**
   * @var string
   */
  public $srcPath = 'core/city';
  
  /**
   * @var string
   */
  public $srcUrl = 'Core.City';
  
  /**
   * @var string
   */
  public $srcI18n = 'core.city.';
  
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
  public $domainKey = 'CoreCity';

  /**
   * @var string
   */
  public $domainName = 'core_city';
  
  /**
   * @var string
   */
  public $domainPath = 'core/city'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Core.City'; 
   
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
  public $aclMaskKey = 'mgmt-core_city';
   
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
  public $domainI18n = "core.city.";

} // end class CoreCity_Domain */

