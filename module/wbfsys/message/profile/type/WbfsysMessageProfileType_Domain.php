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
 * @subpackage ModMessageProfileType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMessageProfileType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'message profile Type';

  /**
   * @var string
   */
  public $pLabel = 'message profile Types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysMessageProfileType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_message_profile_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/message_profile_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.MessageProfileType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.message_profile_type.';
  
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
  public $domainKey = 'WbfsysMessageProfileType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_message_profile_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/message_profile_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.MessageProfileType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_message_profile_type'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_message_profile_type'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_message_profile_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_message_profile_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_message_profile_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysMessageProfileType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_message_profile_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.message_profile_type.";

} // end class WbfsysMessageProfileType_Domain */

