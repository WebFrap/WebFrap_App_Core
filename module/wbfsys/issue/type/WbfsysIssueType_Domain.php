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
 * @subpackage ModIssueType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysIssueType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'issue Type';

  /**
   * @var string
   */
  public $pLabel = 'issue Types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysIssueType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_issue_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/issue_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.IssueType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.issue_type.';
  
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
  public $domainKey = 'WbfsysIssueType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_issue_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/issue_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.IssueType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_issue_type'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_issue_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_issue_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_issue_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.IssueType_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysIssueType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_issue_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.issue_type.";

} // end class WbfsysIssueType_Domain */

