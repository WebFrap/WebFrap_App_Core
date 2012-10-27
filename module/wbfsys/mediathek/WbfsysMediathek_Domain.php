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
 * @subpackage ModMediathek
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMediathek_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Mediathek';

  /**
   * @var string
   */
  public $pLabel = 'Mediatheks';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysMediathek';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_mediathek';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/mediathek';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.Mediathek';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.mediathek.';
  
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
  public $domainKey = 'WbfsysMediathek';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_mediathek';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/mediathek'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.Mediathek'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_mediathek';
   
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
  public $domainI18n = "wbfsys.mediathek.";

} // end class WbfsysMediathek_Domain */

