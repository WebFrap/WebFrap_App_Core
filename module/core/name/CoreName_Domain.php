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
 * @subpackage ModName
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreName_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Name';

  /**
   * @var string
   */
  public $pLabel = 'Names';

  /**
   * @var string
   */
  public $srcKey = 'CoreName';
  
  /**
   * @var string
   */
  public $srcName = 'core_name';
  
  /**
   * @var string
   */
  public $srcPath = 'core/name';
  
  /**
   * @var string
   */
  public $srcUrl = 'Core.Name';
  
  /**
   * @var string
   */
  public $srcI18n = 'core.name.';
  
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
  public $domainKey = 'CoreName';

  /**
   * @var string
   */
  public $domainName = 'core_name';
  
  /**
   * @var string
   */
  public $domainPath = 'core/name'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Core.Name'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mod-core-cat-core_data'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'ore-cat-core_data'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mod-core-cat-core_data'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-core_name';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-core>mod-core-cat-core_data';
   
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
  public $domainAclQuery = "UPPER('mod-core'), UPPER('mod-core-cat-core_data')";
   
  /**
   * @var string
   */
  public $domainI18n = "core.name.";

} // end class CoreName_Domain */

