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
 * @subpackage ModVrefFileType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysVrefFileType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Vref File Type';

  /**
   * @var string
   */
  public $pLabel = 'Vref File Types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysVrefFileType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_vref_file_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/vref_file_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.VrefFileType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.vref_file_type.';
  
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
  public $domainKey = 'WbfsysVrefFileType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_vref_file_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/vref_file_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.VrefFileType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_vref_file_type'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'wbfsys_vref_file_type'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_vref_file_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_vref_file_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_vref_file_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysVrefFileType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_vref_file_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.vref_file_type.";

} // end class WbfsysVrefFileType_Domain */

