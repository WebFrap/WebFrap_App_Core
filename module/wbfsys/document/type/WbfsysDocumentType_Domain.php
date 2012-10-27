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
 * @subpackage ModDocumentType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysDocumentType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'document Type';

  /**
   * @var string
   */
  public $pLabel = 'document Types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysDocumentType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_document_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/document_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.DocumentType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.document_type.';
  
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
  public $domainKey = 'WbfsysDocumentType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_document_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/document_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.DocumentType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_document_type'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_document_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_document_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_document_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.DocumentType_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysDocumentType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_document_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.document_type.";

} // end class WbfsysDocumentType_Domain */

