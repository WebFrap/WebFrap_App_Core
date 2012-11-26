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
 * @subpackage ModAclAction
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysAclAction_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Acl Action';

  /**
   * @var string
   */
  public $pLabel = 'Acl Actions';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysAclAction';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_acl_action';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/acl_action';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.AclAction';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.acl_action.';
  
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
  public $domainKey = 'WbfsysAclAction';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_acl_action';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/acl_action'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.AclAction'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_acl_action'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_acl_action'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_acl_action'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_acl_action';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_acl_action';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysAclAction_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_acl_action')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.acl_action.";

} // end class WbfsysAclAction_Domain */

