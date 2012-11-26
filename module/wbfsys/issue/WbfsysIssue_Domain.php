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
 * @subpackage ModIssue
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysIssue_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Issue';

  /**
   * @var string
   */
  public $pLabel = 'Issues';

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
  public $domainKey = 'WbfsysIssue';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_issue';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/issue'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.Issue'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_issue'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_issue'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_issue'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_issue';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_issue';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysIssue_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_issue')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.issue.";

} // end class WbfsysIssue_Domain */

