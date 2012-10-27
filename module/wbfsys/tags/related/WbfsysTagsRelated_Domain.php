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
 * @subpackage ModTagsRelated
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysTagsRelated_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Tags Related';

  /**
   * @var string
   */
  public $pLabel = 'Tags Relateds';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysTagsRelated';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_tags_related';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/tags_related';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.TagsRelated';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.tags_related.';
  
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
  public $domainKey = 'WbfsysTagsRelated';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_tags_related';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/tags_related'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.TagsRelated'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_tags_related';
   
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
  public $domainI18n = "wbfsys.tags_related.";

} // end class WbfsysTagsRelated_Domain */

