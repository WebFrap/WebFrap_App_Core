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
 * @subpackage ModAudioCodec
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysAudioCodec_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'audio codec';

  /**
   * @var string
   */
  public $pLabel = 'audio codecs';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysAudioCodec';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_audio_codec';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/audio_codec';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.AudioCodec';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.audio_codec.';
  
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
  public $domainKey = 'WbfsysAudioCodec';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_audio_codec';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/audio_codec'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.AudioCodec'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_audio_codec'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_audio_codec'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_audio_codec'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_audio_codec';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_audio_codec';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysAudioCodec_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_audio_codec')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.audio_codec.";

} // end class WbfsysAudioCodec_Domain */

