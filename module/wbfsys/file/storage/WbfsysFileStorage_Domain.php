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
 * @subpackage ModFileStorage
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysFileStorage_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'File Storage';

  /**
   * @var string
   */
  public $pLabel = 'File Storages';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysFileStorage';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_file_storage';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/file_storage';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.FileStorage';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.file_storage.';
  
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
  public $domainKey = 'WbfsysFileStorage';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_file_storage';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/file_storage'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.FileStorage'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_file_storage';
   
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
  public $domainI18n = "wbfsys.file_storage.";

} // end class WbfsysFileStorage_Domain */

