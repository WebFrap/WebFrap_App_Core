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
 * @subpackage ModConfidentialityLevel
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysConfidentialityLevel_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Confidentiality Level';

  /**
   * @var string
   */
  public $pLabel = 'Confidentiality Levels';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysConfidentialityLevel';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_confidentiality_level';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/confidentiality_level';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.ConfidentialityLevel';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.confidentiality_level.';
  
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
  public $domainKey = 'WbfsysConfidentialityLevel';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_confidentiality_level';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/confidentiality_level'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.ConfidentialityLevel'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mod-wbfsys-cat-core_data'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'bfsys-cat-core_data'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mod-wbfsys-cat-core_data'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_confidentiality_level';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mod-wbfsys-cat-core_data';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
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
  public $domainI18n = "wbfsys.confidentiality_level.";

} // end class WbfsysConfidentialityLevel_Domain */

