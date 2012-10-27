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
 * @subpackage ModCustomTag
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysCustomTag_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Custom Tag';

  /**
   * @var string
   */
  public $pLabel = 'Custom Tags';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysCustomTag';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_custom_tag';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/custom_tag';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.CustomTag';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.custom_tag.';
  
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
  public $domainKey = 'WbfsysCustomTag';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_custom_tag';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/custom_tag'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.CustomTag'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mod-wbfsys-cat-core_data'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mod-wbfsys-cat-core_data'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_custom_tag';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mod-wbfsys-cat-core_data';
   
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
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mod-wbfsys-cat-core_data')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.custom_tag.";

} // end class WbfsysCustomTag_Domain */

