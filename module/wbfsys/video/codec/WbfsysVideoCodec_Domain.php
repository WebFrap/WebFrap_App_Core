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
 * @subpackage ModVideoCodec
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysVideoCodec_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'video video codec';

  /**
   * @var string
   */
  public $pLabel = 'video video codecs';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysVideoCodec';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_video_codec';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/video_codec';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.VideoCodec';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.video_codec.';
  
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
  public $domainKey = 'WbfsysVideoCodec';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_video_codec';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/video_codec'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.VideoCodec'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_video_codec'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_video_codec'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_video_codec'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_video_codec';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_video_codec';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysVideoCodec_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_video_codec')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.video_codec.";

} // end class WbfsysVideoCodec_Domain */

