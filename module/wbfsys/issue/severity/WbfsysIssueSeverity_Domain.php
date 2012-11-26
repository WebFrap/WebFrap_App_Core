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
 * @subpackage ModIssueSeverity
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysIssueSeverity_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'issue severity';

  /**
   * @var string
   */
  public $pLabel = 'issue severitys';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysIssueSeverity';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_issue_severity';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/issue_severity';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.IssueSeverity';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.issue_severity.';
  
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
  public $domainKey = 'WbfsysIssueSeverity';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_issue_severity';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/issue_severity'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.IssueSeverity'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_issue_severity'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_issue_severity'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_issue_severity'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_issue_severity';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_issue_severity';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysIssueSeverity_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_issue_severity')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.issue_severity.";

} // end class WbfsysIssueSeverity_Domain */

