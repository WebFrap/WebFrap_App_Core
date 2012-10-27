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
 * @subpackage ModAudioVariant
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysAudioVariant_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Audio Variant';

  /**
   * @var string
   */
  public $pLabel = 'Audio Variants';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysAudioVariant';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_audio_variant';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/audio_variant';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.AudioVariant';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.audio_variant.';
  
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
  public $domainKey = 'WbfsysAudioVariant';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_audio_variant';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/audio_variant'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.AudioVariant'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_audio_variant';
   
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
  public $domainI18n = "wbfsys.audio_variant.";

} // end class WbfsysAudioVariant_Domain */

