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
class WbfsysCalendar_Ref_Appointments_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysCalendarAppointment_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysCalendarAppointment( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysCalendarAppointment_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysCalendarAppointment(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysCalendarAppointment_Entity
  */
  public function getEntityWbfsysCalendarAppointment( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysCalendarAppointment = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysCalendarAppointment = $this->getRegisterd( 'entityWbfsysCalendarAppointment' );

    //entity wbfsys_calendar_appointment
    if( !$entityWbfsysCalendarAppointment )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysCalendarAppointment = $orm->get( 'WbfsysCalendarAppointment', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsyscalendarappointment with this id '.$objid,
              'wbfsys.calendar_appointment.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysCalendarAppointment', $entityWbfsysCalendarAppointment );
        $this->register( 'main_entity', $entityWbfsysCalendarAppointment );

      }
      else
      {
        $entityWbfsysCalendarAppointment   = new WbfsysCalendarAppointment_Entity() ;
        $this->register( 'entityWbfsysCalendarAppointment', $entityWbfsysCalendarAppointment );
        $this->register( 'main_entity', $entityWbfsysCalendarAppointment );
      }

    }
    elseif( $objid && $objid != $entityWbfsysCalendarAppointment->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysCalendarAppointment = $orm->get( 'WbfsysCalendarAppointment', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsyscalendarappointment with this id '.$objid,
            'wbfsys.calendar_appointment.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysCalendarAppointment', $entityWbfsysCalendarAppointment );
      $this->register( 'main_entity', $entityWbfsysCalendarAppointment );
    }

    return $entityWbfsysCalendarAppointment;

  }//end public function getEntityWbfsysCalendarAppointment */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysCalendarAppointment_Entity $entity
  */
  public function setEntityWbfsysCalendarAppointment( $entity )
  {

    $this->register( 'entityWbfsysCalendarAppointment', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysCalendarAppointment */

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
      'wbfsys_calendar_appointment' => array
      (
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysCalendar_Ref_Appointments_Crud_Model

