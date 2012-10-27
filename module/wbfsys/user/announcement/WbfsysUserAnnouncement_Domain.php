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
 * @subpackage ModUserAnnouncement
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysUserAnnouncement_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'User Announcement Status';

  /**
   * @var string
   */
  public $pLabel = 'User Announcement Status';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysUserAnnouncement';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_user_announcement';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/user_announcement';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.UserAnnouncement';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.user_announcement.';
  
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
  public $domainKey = 'WbfsysUserAnnouncement';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_user_announcement';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/user_announcement'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.UserAnnouncement'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_user_announcement'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_user_announcement'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_user_announcement';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_user_announcement';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.UserAnnouncement_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysUserAnnouncement_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_user_announcement')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.user_announcement.";

} // end class WbfsysUserAnnouncement_Domain */

