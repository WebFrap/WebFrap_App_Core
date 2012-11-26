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
 * @subpackage ModTreeNode
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysTreeNode_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Tree Node';

  /**
   * @var string
   */
  public $pLabel = 'Tree Nodes';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysTreeNode';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_tree_node';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/tree_node';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.TreeNode';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.tree_node.';
  
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
  public $domainKey = 'WbfsysTreeNode';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_tree_node';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/tree_node'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.TreeNode'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_tree_node'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_tree_node'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_tree_node'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_tree_node';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_tree_node';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysTreeNode_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_tree_node')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.tree_node.";

} // end class WbfsysTreeNode_Domain */

