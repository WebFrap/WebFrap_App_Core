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
 * @subpackage ModCustomComment
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysCustomComment_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Custom Comment';

  /**
   * @var string
   */
  public $pLabel = 'Custom Comments';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysCustomComment';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_custom_comment';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/custom_comment';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.CustomComment';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.custom_comment.';
  
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
  public $domainKey = 'WbfsysCustomComment';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_custom_comment';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/custom_comment'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.CustomComment'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_custom_comment';
   
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
  public $domainI18n = "wbfsys.custom_comment.";

} // end class WbfsysCustomComment_Domain */

