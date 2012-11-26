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
 * @subpackage ModCalendarHoliday
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysCalendarHoliday_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'Holiday';

  /**
   * @var string
   */
  public $pLabel = 'Holidays';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysCalendarHoliday';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_calendar_holiday';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/calendar_holiday';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.CalendarHoliday';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.calendar_holiday.';
  
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
  public $domainKey = 'WbfsysCalendarHoliday';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_calendar_holiday';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/calendar_holiday'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.CalendarHoliday'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mod-wbfsys-cat-core_data'; 
  
  /**
   * @var string
   */
  public $aclDomainKey = 'bfsys-cat-core_data'; 
  
  /**
   * @var string
   */
  public $aclBaseKey = 'mod-wbfsys-cat-core_data'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_calendar_holiday';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mod-wbfsys-cat-core_data';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Acl.Mgmt';
   
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
  public $domainI18n = "wbfsys.calendar_holiday.";

} // end class WbfsysCalendarHoliday_Domain */

