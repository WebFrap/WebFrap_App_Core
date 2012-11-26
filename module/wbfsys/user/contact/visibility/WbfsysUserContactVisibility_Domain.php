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
 * @subpackage ModUserContactVisibility
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysUserContactVisibility_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'message profile visibility';

  /**
   * @var string
   */
  public $pLabel = 'message profile visibilitys';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysUserContactVisibility';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_user_contact_visibility';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/user_contact_visibility';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.UserContactVisibility';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.user_contact_visibility.';
  
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
  public $domainKey = 'WbfsysUserContactVisibility';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_user_contact_visibility';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/user_contact_visibility'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.UserContactVisibility'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_user_contact_visibility';
   
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
  public $domainI18n = "wbfsys.user_contact_visibility.";

} // end class WbfsysUserContactVisibility_Domain */

