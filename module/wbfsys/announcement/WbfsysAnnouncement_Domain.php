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
 * @subpackage ModAnnouncement
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysAnnouncement_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Announcement';

  /**
   * @var string
   */
  public $pLabel = 'Announcements';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysAnnouncement';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_announcement';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/announcement';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.Announcement';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.announcement.';
  
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
  public $domainKey = 'WbfsysAnnouncement';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_announcement';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/announcement'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.Announcement'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_announcement'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_announcement'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_announcement'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_announcement';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_announcement';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysAnnouncement_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_announcement')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.announcement.";

} // end class WbfsysAnnouncement_Domain */

