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
 * @subpackage ModCategory
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysCategory_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'issue category';

  /**
   * @var string
   */
  public $pLabel = 'issue categorys';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysCategory';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_category';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/category';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.Category';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.category.';
  
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
  public $domainKey = 'WbfsysCategory';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_category';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/category'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.Category'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_category'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_category'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_category';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_category';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.Category_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysCategory_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_category')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.category.";

} // end class WbfsysCategory_Domain */

