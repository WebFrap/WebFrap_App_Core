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
 * @subpackage ModAnnouncementChannelSubscription
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysAnnouncementChannelSubscription_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Announcement Subscription';

  /**
   * @var string
   */
  public $pLabel = 'Announcement Subscriptions';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysAnnouncementChannelSubscription';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_announcement_channel_subscription';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/announcement_channel_subscription';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.AnnouncementChannelSubscription';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.announcement_channel_subscription.';
  
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
  public $domainKey = 'WbfsysAnnouncementChannelSubscription';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_announcement_channel_subscription';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/announcement_channel_subscription'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.AnnouncementChannelSubscription'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_announcement_channel_subscription';
   
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
  public $domainI18n = "wbfsys.announcement_channel_subscription.";

} // end class WbfsysAnnouncementChannelSubscription_Domain */

