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
 * @subpackage ModAudio
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysAudio_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Audio';

  /**
   * @var string
   */
  public $pLabel = 'Audios';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysAudio';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_audio';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/audio';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.Audio';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.audio.';
  
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
  public $domainKey = 'WbfsysAudio';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_audio';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/audio'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.Audio'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_audio'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_audio'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_audio';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_audio';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.Audio_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysAudio_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_audio')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.audio.";

} // end class WbfsysAudio_Domain */

