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
 * @subpackage ModFileType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysFileType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'file Type';

  /**
   * @var string
   */
  public $pLabel = 'file Types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysFileType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_file_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/file_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.FileType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.file_type.';
  
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
  public $domainKey = 'WbfsysFileType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_file_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/file_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.FileType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_file_type'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_file_type'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_file_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_file_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_file_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysFileType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_file_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.file_type.";

} // end class WbfsysFileType_Domain */

