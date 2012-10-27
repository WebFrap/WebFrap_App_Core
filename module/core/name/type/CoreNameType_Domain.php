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
 * @subpackage ModNameType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreNameType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'name Type';

  /**
   * @var string
   */
  public $pLabel = 'name Types';

  /**
   * @var string
   */
  public $srcKey = 'CoreNameType';
  
  /**
   * @var string
   */
  public $srcName = 'core_name_type';
  
  /**
   * @var string
   */
  public $srcPath = 'core/name_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Core.NameType';
  
  /**
   * @var string
   */
  public $srcI18n = 'core.name_type.';
  
  /**
   * @var string
   */
  public $modName = 'Core';

  /**
   * @var string
   */
  public $modAclKey = 'mod-core';

  /**
   * @var string
   */
  public $domainKey = 'CoreNameType';

  /**
   * @var string
   */
  public $domainName = 'core_name_type';
  
  /**
   * @var string
   */
  public $domainPath = 'core/name_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Core.NameType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-core_name_type'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-core_name_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-core_name_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-core>mgmt-core_name_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Core.NameType_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'CoreNameType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-core'), UPPER('mgmt-core_name_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "core.name_type.";

} // end class CoreNameType_Domain */

