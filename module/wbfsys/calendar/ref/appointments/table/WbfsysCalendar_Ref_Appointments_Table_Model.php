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
class WbfsysCalendar_Ref_Appointments_Table_Model
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

  /**
   * just fetch the post data without any required validation
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function getEntryData( $params )
  {

    $orm   = $this->getOrm();
    $data  = array();

    $data['wbfsys_calendar_appointment']  = $this->getEntityWbfsysCalendarAppointment();


    $tabData = array();

    foreach( $data as $tabName => $ent )
    {
      // prüfen ob etwas gefunden wurde
      if( !$ent )
      {
        Debug::console( "Missing Entity for Reference: ".$tabName );
        continue;
      }

      $tabData = array_merge( $tabData , $ent->getAllData( $tabName ) );
    }



    return $tabData;

  }// end public function getEntryData */

////////////////////////////////////////////////////////////////////////////////
// search
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * table to list all connected WbfsysCalendar
   *
   * @param int $idWbfsysCalendar the id for the reference entity
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysCalendar, $access, $params  )
  { 
  
    $response  = $this->getResponse();
    
    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysCalendarAppointment_Entity' ) )
    {
      $response->addError
      (
        'tried so search for a nonexisting entity: wbfsys_calendar_appointment with the expected source wbfsys_calendar_appointment'
      );
      return array();
    }

    $db          = $this->getDb();
    $orm         = $db->getOrm();
    $httpRequest = $this->getRequest();
    $user        = $this->getUser();
    $view        = $this->getView();


    $condition = array();




    if( $free = $httpRequest->param( 'free_search' , Validator::TEXT ) )
      $condition['free'] = $free;

    if( !$fieldsWbfsysCalendarAppointment = $this->getRegisterd( 'search_fields_wbfsys_calendar_appointment' ) )
    {
       $fieldsWbfsysCalendarAppointment   = $orm->getSearchCols( 'WbfsysCalendarAppointment' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_calendar_appointment' ) )
    {
      $fieldsWbfsysCalendarAppointment = array_unique( array_merge
      (
        $fieldsWbfsysCalendarAppointment,
        $refs
      ));
    }

    $filterWbfsysCalendarAppointment     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysCalendarAppointment', $fieldsWbfsysCalendarAppointment ),
      $orm->getErrorMessages( 'WbfsysCalendarAppointment'  ),
      'search_wbfsys_calendar_appointment'
    );
    $condition['wbfsys_calendar_appointment'] = $filterWbfsysCalendarAppointment->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysCalendar_Ref_Appointments_Table' );
    /* @var $query WbfsysCalendar_Ref_Appointments_Table_Query  */

    // hard condition
    $query->setCondition( 'wbfsys_calendar_appointment.id_calendar = '.$idWbfsysCalendar );

    $validKeys  = $access->fetchListIds
    ( 
      $user->getProfileName(), 
      $query, 
      'table',  
      $condition, 
      $params 
    );

    $query->fetchInAcls
    (
      $validKeys,
      $params
    );



    return $query;

  }//end public public search */

}//end class WbfsysCalendar_Ref_Appointments_Table_Model

