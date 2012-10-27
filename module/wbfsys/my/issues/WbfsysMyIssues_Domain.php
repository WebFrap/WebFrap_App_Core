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
 * @subpackage ModMyIssues
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMyIssues_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'My Issues';

  /**
   * @var string
   */
  public $pLabel = 'My Issues';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysIssue';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_issue';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/issue';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.Issue';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.issue.';
  
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
  public $domainKey = 'WbfsysMyIssues';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_my_issues';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/my_issues'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.MyIssues'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_my_issues'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_issue'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_my_issues';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys/mgmt-wbfsys_issue>mgmt-wbfsys_my_issues';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.MyIssues_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysMyIssues_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_issue'), UPPER('mgmt-wbfsys_my_issues')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.my_issues.";

} // end class WbfsysMyIssues_Domain */

