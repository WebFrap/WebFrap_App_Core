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
 * @subpackage ModDocuFaq
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysDocuFaq_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'FAQ';

  /**
   * @var string
   */
  public $pLabel = 'FAQs';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysDocuFaq';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_docu_faq';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/docu_faq';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.DocuFaq';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.docu_faq.';
  
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
  public $domainKey = 'WbfsysDocuFaq';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_docu_faq';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/docu_faq'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.DocuFaq'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_docu_faq';
   
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
  public $domainI18n = "wbfsys.docu_faq.";

} // end class WbfsysDocuFaq_Domain */

