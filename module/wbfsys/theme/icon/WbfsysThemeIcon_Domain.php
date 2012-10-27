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
 * @subpackage ModThemeIcon
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysThemeIcon_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Icon Themes';

  /**
   * @var string
   */
  public $pLabel = 'Icon Themes';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysThemeIcon';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_theme_icon';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/theme_icon';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.ThemeIcon';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.theme_icon.';
  
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
  public $domainKey = 'WbfsysThemeIcon';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_theme_icon';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/theme_icon'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.ThemeIcon'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_theme_icon';
   
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
  public $domainI18n = "wbfsys.theme_icon.";

} // end class WbfsysThemeIcon_Domain */

