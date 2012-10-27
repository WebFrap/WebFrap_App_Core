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
 * @subpackage ModProfile
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysProfile_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Profiles';

  /**
   * @var string
   */
  public $pLabel = 'Profiles';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysProfile';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_profile';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/profile';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.Profile';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.profile.';
  
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
  public $domainKey = 'WbfsysProfile';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_profile';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/profile'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.Profile'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_profile'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_profile'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_profile';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_profile';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.Profile_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysProfile_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_profile')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.profile.";

} // end class WbfsysProfile_Domain */

