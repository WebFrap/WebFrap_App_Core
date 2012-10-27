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
 * @subpackage ModEntityComment_Simple
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysEntityComment_Simple_Domain
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
  public $srcKey = 'WbfsysEntityComment';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_entity_comment';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/entity_comment';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.EntityComment';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.entity_comment.';
  
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
  public $domainKey = 'WbfsysEntityComment_Simple';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_entity_comment-simple';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/entity_comment-simple'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.EntityComment_Simple'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_entity_comment-simple';
   
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
  public $domainI18n = "wbfsys.entity_comment_simple.";

} // end class WbfsysEntityComment_Simple_Domain */

