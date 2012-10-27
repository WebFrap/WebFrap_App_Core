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
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysCalendarType_Ref_Holiday_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysCalendarHoliday_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysCalendarHoliday( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysCalendarHoliday_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysCalendarHoliday(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysCalendarHoliday_Entity
  */
  public function getEntityWbfsysCalendarHoliday( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysCalendarHoliday = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysCalendarHoliday = $this->getRegisterd( 'entityWbfsysCalendarHoliday' );

    //entity wbfsys_calendar_holiday
    if( !$entityWbfsysCalendarHoliday )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysCalendarHoliday = $orm->get( 'WbfsysCalendarHoliday', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsyscalendarholiday with this id '.$objid,
              'wbfsys.calendar_holiday.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysCalendarHoliday', $entityWbfsysCalendarHoliday );
        $this->register( 'main_entity', $entityWbfsysCalendarHoliday );

      }
      else
      {
        $entityWbfsysCalendarHoliday   = new WbfsysCalendarHoliday_Entity() ;
        $this->register( 'entityWbfsysCalendarHoliday', $entityWbfsysCalendarHoliday );
        $this->register( 'main_entity', $entityWbfsysCalendarHoliday );
      }

    }
    elseif( $objid && $objid != $entityWbfsysCalendarHoliday->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysCalendarHoliday = $orm->get( 'WbfsysCalendarHoliday', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsyscalendarholiday with this id '.$objid,
            'wbfsys.calendar_holiday.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysCalendarHoliday', $entityWbfsysCalendarHoliday );
      $this->register( 'main_entity', $entityWbfsysCalendarHoliday );
    }

    return $entityWbfsysCalendarHoliday;

  }//end public function getEntityWbfsysCalendarHoliday */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysCalendarHoliday_Entity $entity
  */
  public function setEntityWbfsysCalendarHoliday( $entity )
  {

    $this->register( 'entityWbfsysCalendarHoliday', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysCalendarHoliday */

////////////////////////////////////////////////////////////////////////////////
// get fields
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * just fetch the post data without any required validation
   * @return array
   */
  public function getCreateFields()
  {

    return array
    (
      'wbfsys_calendar_holiday' => array
      (
        'name',
        'access_key',
        'the_day',
        'level',
        'id_calendar_type',
        'description',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysCalendarType_Ref_Holiday_Crud_Model

