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
 * @subpackage ModCalendarType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysCalendarType_Domain
  extends DomainNode
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @var string
   */
  public $label = 'calendar Type';

  /**
   * @var string
   */
  public $pLabel = 'calendar Types';

  /**
   * @var string
   */
  public $srcKey = 'WbfsysCalendarType';
  
  /**
   * @var string
   */
  public $srcName = 'wbfsys_calendar_type';
  
  /**
   * @var string
   */
  public $srcPath = 'wbfsys/calendar_type';
  
  /**
   * @var string
   */
  public $srcUrl = 'Wbfsys.CalendarType';
  
  /**
   * @var string
   */
  public $srcI18n = 'wbfsys.calendar_type.';
  
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
  public $domainKey = 'WbfsysCalendarType';

  /**
   * @var string
   */
  public $domainName = 'wbfsys_calendar_type';
  
  /**
   * @var string
   */
  public $domainPath = 'wbfsys/calendar_type'; 
   
  /**
   * @var string
   */
  public $domainUrl = 'Wbfsys.CalendarType'; 
   
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_calendar_type'; 
   
  /**
   * @var string
   */
  public $aclBaseKey = 'mgmt-wbfsys_calendar_type'; 
   
  /**
   * @var string
   */
  public $aclMaskKey = 'mgmt-wbfsys_calendar_type';
   
  /**
   * @var string
   */
  public $domainAcl = 'mod-wbfsys>mgmt-wbfsys_calendar_type';
   
  /**
   * @var string
   */
  public $domainAclUrl = 'Wbfsys.CalendarType_Acl';
   
  /**
   * @var string
   */
  public $domainAclMask = 'WbfsysCalendarType_Acl';
   
  /**
   * @var string
   */
  public $domainAclQuery = "UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_calendar_type')";
   
  /**
   * @var string
   */
  public $domainI18n = "wbfsys.calendar_type.";

} // end class WbfsysCalendarType_Domain */

