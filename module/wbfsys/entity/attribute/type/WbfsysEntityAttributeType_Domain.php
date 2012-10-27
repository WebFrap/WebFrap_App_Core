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
 * @subpackage ModEntityAttributeType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysEntityAttributeType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'entity attribute Type';

  /**
   * @var string
   */
  public $pLabel = 'entity attribute Types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysEntityAttributeType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_entity_attribute_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/entity_attribute_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.EntityAttributeType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.entity_attribute_type.';
  
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
  public $domainKey = 'WbfsysEntityAttributeType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_entity_attribute_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/entity_attribute_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.EntityAttributeType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_entity_attribute_type'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_entity_attribute_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_entity_attribute_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_entity_attribute_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.EntityAttributeType_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysEntityAttributeType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_entity_attribute_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.entity_attribute_type.";

} // end class WbfsysEntityAttributeType_Domain */

