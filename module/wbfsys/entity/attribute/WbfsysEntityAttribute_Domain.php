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
 * @subpackage ModEntityAttribute
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysEntityAttribute_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Entity Attribute';

  /**
   * @var string
   */
  public $pLabel = 'Entity Attributes';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysEntityAttribute';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_entity_attribute';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/entity_attribute';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.EntityAttribute';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.entity_attribute.';
  
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
  public $domainKey = 'WbfsysEntityAttribute';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_entity_attribute';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/entity_attribute'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.EntityAttribute'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_entity_attribute';
   
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
  public $domainI18n = "wbfsys.entity_attribute.";

} // end class WbfsysEntityAttribute_Domain */

