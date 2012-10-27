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
 * @subpackage ModFileStorageType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysFileStorageType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'file storage Type';

  /**
   * @var string
   */
  public $pLabel = 'file storage Types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysFileStorageType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_file_storage_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/file_storage_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.FileStorageType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.file_storage_type.';
  
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
  public $domainKey = 'WbfsysFileStorageType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_file_storage_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/file_storage_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.FileStorageType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_file_storage_type'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_file_storage_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_file_storage_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_file_storage_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.FileStorageType_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysFileStorageType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_file_storage_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.file_storage_type.";

} // end class WbfsysFileStorageType_Domain */

