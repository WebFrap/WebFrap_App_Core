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
 * @subpackage ModVideo
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysVideo_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Video';

  /**
   * @var string
   */
  public $pLabel = 'Videos';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysVideo';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_video';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/video';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.Video';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.video.';
  
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
  public $domainKey = 'WbfsysVideo';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_video';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/video'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.Video'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_video'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_video'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_video'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_video';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_video';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysVideo_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_video')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.video.";

} // end class WbfsysVideo_Domain */

