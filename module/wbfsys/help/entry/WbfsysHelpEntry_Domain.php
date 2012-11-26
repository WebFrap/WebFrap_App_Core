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
 * @subpackage ModHelpEntry
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysHelpEntry_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Help Entry';

  /**
   * @var string
   */
  public $pLabel = 'Help Entrys';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysHelpEntry';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_help_entry';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/help_entry';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.HelpEntry';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.help_entry.';
  
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
  public $domainKey = 'WbfsysHelpEntry';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_help_entry';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/help_entry'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.HelpEntry'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mod-wbfsys-cat-core_data'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'bfsys-cat-core_data'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mod-wbfsys-cat-core_data'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_help_entry';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mod-wbfsys-cat-core_data';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
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
  public $domainI18n = "wbfsys.help_entry.";

} // end class WbfsysHelpEntry_Domain */

