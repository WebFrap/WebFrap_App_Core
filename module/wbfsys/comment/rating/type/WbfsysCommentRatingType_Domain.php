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
 * @subpackage ModCommentRatingType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysCommentRatingType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'comment rating Type';

  /**
   * @var string
   */
  public $pLabel = 'comment rating Types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysCommentRatingType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_comment_rating_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/comment_rating_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.CommentRatingType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.comment_rating_type.';
  
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
  public $domainKey = 'WbfsysCommentRatingType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_comment_rating_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/comment_rating_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.CommentRatingType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_comment_rating_type'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_comment_rating_type'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_comment_rating_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_comment_rating_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_comment_rating_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysCommentRatingType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_comment_rating_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.comment_rating_type.";

} // end class WbfsysCommentRatingType_Domain */

