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
 * @subpackage ModDataLink
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysDataLink_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Data Link';

  /**
   * @var string
   */
  public $pLabel = 'Data Links';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysDataLink';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_data_link';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/data_link';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.DataLink';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.data_link.';
  
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
  public $domainKey = 'WbfsysDataLink';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_data_link';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/data_link'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.DataLink'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_data_link'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_data_link'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_data_link';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_data_link';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.DataLink_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysDataLink_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_data_link')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.data_link.";

} // end class WbfsysDataLink_Domain */

