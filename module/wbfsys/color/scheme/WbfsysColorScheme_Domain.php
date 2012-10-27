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
 * @subpackage ModColorScheme
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysColorScheme_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Color Scheme';

  /**
   * @var string
   */
  public $pLabel = 'Color Schemes';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysColorScheme';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_color_scheme';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/color_scheme';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.ColorScheme';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.color_scheme.';
  
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
  public $domainKey = 'WbfsysColorScheme';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_color_scheme';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/color_scheme'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.ColorScheme'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_color_scheme';
   
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
  public $domainI18n = "wbfsys.color_scheme.";

} // end class WbfsysColorScheme_Domain */

