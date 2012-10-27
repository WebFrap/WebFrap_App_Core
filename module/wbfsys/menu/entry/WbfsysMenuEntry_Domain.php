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
 * @subpackage ModMenuEntry
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMenuEntry_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Menu Entry';

  /**
   * @var string
   */
  public $pLabel = 'Menu Entrys';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysMenuEntry';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_menu_entry';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/menu_entry';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.MenuEntry';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.menu_entry.';
  
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
  public $domainKey = 'WbfsysMenuEntry';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_menu_entry';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/menu_entry'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.MenuEntry'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_menu_entry'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_menu_entry'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_menu_entry';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_menu_entry';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.MenuEntry_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysMenuEntry_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_menu_entry')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.menu_entry.";

} // end class WbfsysMenuEntry_Domain */

