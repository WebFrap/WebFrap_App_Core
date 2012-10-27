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
 * @subpackage ModAnnouncementType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysAnnouncementType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'announcement Type';

  /**
   * @var string
   */
  public $pLabel = 'announcement Types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysAnnouncementType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_announcement_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/announcement_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.AnnouncementType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.announcement_type.';
  
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
  public $domainKey = 'WbfsysAnnouncementType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_announcement_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/announcement_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.AnnouncementType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_announcement_type'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_announcement_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_announcement_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_announcement_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.AnnouncementType_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysAnnouncementType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_announcement_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.announcement_type.";

} // end class WbfsysAnnouncementType_Domain */

