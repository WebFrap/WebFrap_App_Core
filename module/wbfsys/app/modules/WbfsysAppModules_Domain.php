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
 * @subpackage ModAppModules
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysAppModules_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'App Modules';

  /**
   * @var string
   */
  public $pLabel = 'App Modules';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysAppModules';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_app_modules';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/app_modules';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.AppModules';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.app_modules.';
  
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
  public $domainKey = 'WbfsysAppModules';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_app_modules';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/app_modules'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.AppModules'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_app_modules'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_app_modules'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_app_modules'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_app_modules';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_app_modules';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysAppModules_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_app_modules')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.app_modules.";

} // end class WbfsysAppModules_Domain */

