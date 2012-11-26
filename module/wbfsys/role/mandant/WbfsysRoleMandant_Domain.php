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
 * @subpackage ModRoleMandant
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysRoleMandant_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Mandant';

  /**
   * @var string
   */
  public $pLabel = 'Mandants';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysRoleMandant';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_role_mandant';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/role_mandant';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.RoleMandant';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.role_mandant.';
  
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
  public $domainKey = 'WbfsysRoleMandant';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_role_mandant';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/role_mandant'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.RoleMandant'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_role_mandant';
   
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
  public $domainI18n = "wbfsys.role_mandant.";

} // end class WbfsysRoleMandant_Domain */

