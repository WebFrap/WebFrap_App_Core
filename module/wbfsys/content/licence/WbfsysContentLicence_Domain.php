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
 * @subpackage ModContentLicence
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysContentLicence_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Content Licence';

  /**
   * @var string
   */
  public $pLabel = 'Content Licences';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysContentLicence';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_content_licence';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/content_licence';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.ContentLicence';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.content_licence.';
  
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
  public $domainKey = 'WbfsysContentLicence';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_content_licence';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/content_licence'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.ContentLicence'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_content_licence';
   
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
  public $domainI18n = "wbfsys.content_licence.";

} // end class WbfsysContentLicence_Domain */

