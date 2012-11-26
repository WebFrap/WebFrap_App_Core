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
 * @subpackage ModDashboardWidget
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysDashboardWidget_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Dashboard Widget';

  /**
   * @var string
   */
  public $pLabel = 'Dashboard Widgets';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysDashboardWidget';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_dashboard_widget';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/dashboard_widget';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.DashboardWidget';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.dashboard_widget.';
  
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
  public $domainKey = 'WbfsysDashboardWidget';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_dashboard_widget';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/dashboard_widget'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.DashboardWidget'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_dashboard_widget';
   
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
  public $domainI18n = "wbfsys.dashboard_widget.";

} // end class WbfsysDashboardWidget_Domain */

