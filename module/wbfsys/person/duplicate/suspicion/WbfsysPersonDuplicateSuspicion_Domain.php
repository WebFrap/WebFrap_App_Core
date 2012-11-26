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
 * @subpackage ModPersonDuplicateSuspicion
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysPersonDuplicateSuspicion_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Person Duplicate';

  /**
   * @var string
   */
  public $pLabel = 'Person Duplicates';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysPersonDuplicateSuspicion';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_person_duplicate_suspicion';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/person_duplicate_suspicion';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.PersonDuplicateSuspicion';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.person_duplicate_suspicion.';
  
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
  public $domainKey = 'WbfsysPersonDuplicateSuspicion';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_person_duplicate_suspicion';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/person_duplicate_suspicion'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.PersonDuplicateSuspicion'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_person_duplicate_suspicion';
   
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
  public $domainI18n = "wbfsys.person_duplicate_suspicion.";

} // end class WbfsysPersonDuplicateSuspicion_Domain */

