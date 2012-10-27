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
 * @subpackage ModKnowHowRepository
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysKnowHowRepository_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Know How Repository';

  /**
   * @var string
   */
  public $pLabel = 'Know How Repositorys';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysKnowHowRepository';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_know_how_repository';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/know_how_repository';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.KnowHowRepository';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.know_how_repository.';
  
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
  public $domainKey = 'WbfsysKnowHowRepository';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_know_how_repository';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/know_how_repository'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.KnowHowRepository'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mod-wbfsys-cat-core_data'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mod-wbfsys-cat-core_data'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_know_how_repository';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mod-wbfsys-cat-core_data';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Webfrap.Coredata_Acl';
   
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
  public $domainI18n = "wbfsys.know_how_repository.";

} // end class WbfsysKnowHowRepository_Domain */

