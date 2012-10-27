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
 * @subpackage ModColorNode
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysColorNode_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Color Node';

  /**
   * @var string
   */
  public $pLabel = 'Color Nodes';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysColorNode';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_color_node';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/color_node';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.ColorNode';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.color_node.';
  
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
  public $domainKey = 'WbfsysColorNode';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_color_node';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/color_node'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.ColorNode'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_color_node'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_color_node'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_color_node';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_color_node';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.ColorNode_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysColorNode_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_color_node')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.color_node.";

} // end class WbfsysColorNode_Domain */

