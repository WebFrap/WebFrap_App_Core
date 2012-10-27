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
 * @subpackage ModEntityRoleActions
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysEntityRoleActions_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Entity Role Actions';

  /**
   * @var string
   */
  public $pLabel = 'Entity Role Actions';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysEntityRoleActions';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_entity_role_actions';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/entity_role_actions';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.EntityRoleActions';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.entity_role_actions.';
  
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
  public $domainKey = 'WbfsysEntityRoleActions';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_entity_role_actions';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/entity_role_actions'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.EntityRoleActions'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_entity_role_actions'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_entity_role_actions'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_entity_role_actions';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_entity_role_actions';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.EntityRoleActions_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysEntityRoleActions_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_entity_role_actions')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.entity_role_actions.";

} // end class WbfsysEntityRoleActions_Domain */

