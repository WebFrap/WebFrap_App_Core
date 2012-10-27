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
 * @subpackage ModDocuTree
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysDocuTree_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Docu Tree';

  /**
   * @var string
   */
  public $pLabel = 'Docu Trees';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysDocuTree';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_docu_tree';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/docu_tree';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.DocuTree';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.docu_tree.';
  
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
  public $domainKey = 'WbfsysDocuTree';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_docu_tree';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/docu_tree'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.DocuTree'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_docu_tree'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_docu_tree'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_docu_tree';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_docu_tree';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.DocuTree_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysDocuTree_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_docu_tree')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.docu_tree.";

} // end class WbfsysDocuTree_Domain */

