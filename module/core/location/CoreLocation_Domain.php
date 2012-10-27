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
 * @subpackage ModLocation
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreLocation_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'location';

  /**
   * @var string
   */
  public $pLabel = 'locations';

  /**
   * @var string
   */
  public $srcKey = 'CoreLocation';
  
  /**
   * @var string
   */
  public $srcName = 'core_location';
  
  /**
   * @var string
   */
  public $srcPath = 'core/location';
  
  /**
   * @var string
   */
  public $srcUrl = 'Core.Location';
  
  /**
   * @var string
   */
  public $srcI18n = 'core.location.';
  
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
  public $domainKey = 'CoreLocation';

  /**
   * @var string
   */
  public $domainName = 'core_location';
  
  /**
   * @var string
   */
  public $domainPath = 'core/location'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Core.Location'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mod-core-cat-core_data'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mod-core-cat-core_data'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-core_location';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-core>mod-core-cat-core_data';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Webfrap.Coredata_Acl';
   
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
  public $domainI18n = "core.location.";

} // end class CoreLocation_Domain */

