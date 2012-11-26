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
 * @subpackage ModAnnouncementChannel
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysAnnouncementChannel_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Announcement Channel';

  /**
   * @var string
   */
  public $pLabel = 'Announcement Channels';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysAnnouncementChannel';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_announcement_channel';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/announcement_channel';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.AnnouncementChannel';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.announcement_channel.';
  
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
  public $domainKey = 'WbfsysAnnouncementChannel';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_announcement_channel';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/announcement_channel'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.AnnouncementChannel'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_announcement_channel';
   
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
  public $domainI18n = "wbfsys.announcement_channel.";

} // end class WbfsysAnnouncementChannel_Domain */

