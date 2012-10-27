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
 * @subpackage ModEntityCalendar
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysEntityCalendar_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Entity Calendar';

  /**
   * @var string
   */
  public $pLabel = 'Entity Calendars';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysEntityCalendar';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_entity_calendar';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/entity_calendar';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.EntityCalendar';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.entity_calendar.';
  
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
  public $domainKey = 'WbfsysEntityCalendar';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_entity_calendar';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/entity_calendar'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.EntityCalendar'; 
   
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
  public $aclMaskKey = 'mgmt-wbfsys_entity_calendar';
   
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
  public $domainI18n = "wbfsys.entity_calendar.";

} // end class WbfsysEntityCalendar_Domain */

