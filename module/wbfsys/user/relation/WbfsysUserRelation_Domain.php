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
 * @subpackage ModUserRelation
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysUserRelation_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'User Relation';

  /**
   * @var string
   */
  public $pLabel = 'User Relations';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysUserRelation';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_user_relation';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/user_relation';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.UserRelation';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.user_relation.';
  
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
  public $domainKey = 'WbfsysUserRelation';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_user_relation';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/user_relation'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.UserRelation'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_user_relation';
   
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
  public $domainI18n = "wbfsys.user_relation.";

} // end class WbfsysUserRelation_Domain */

