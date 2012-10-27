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
 * @subpackage ModComment
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysComment_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Comment';

  /**
   * @var string
   */
  public $pLabel = 'Comments';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysComment';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_comment';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/comment';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.Comment';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.comment.';
  
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
  public $domainKey = 'WbfsysComment';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_comment';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/comment'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.Comment'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_comment'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_comment'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_comment';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_comment';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.Comment_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysComment_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_comment')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.comment.";

} // end class WbfsysComment_Domain */

