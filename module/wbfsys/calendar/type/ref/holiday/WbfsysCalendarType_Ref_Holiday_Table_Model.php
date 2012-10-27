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
class WbfsysCalendarType_Ref_Holiday_Table_Model
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

    $data['wbfsys_calendar_holiday']  = $this->getEntityWbfsysCalendarHoliday();


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
   * table to list all connected WbfsysCalendarType
   *
   * @param int $idWbfsysCalendarType the id for the reference entity
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysCalendarType, $access, $params  )
  { 
  
    $response  = $this->getResponse();
    
    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysCalendarHoliday_Entity' ) )
    {
      $response->addError
      (
        'tried so search for a nonexisting entity: wbfsys_calendar_holiday with the expected source wbfsys_calendar_holiday'
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

    if( !$fieldsWbfsysCalendarHoliday = $this->getRegisterd( 'search_fields_wbfsys_calendar_holiday' ) )
    {
       $fieldsWbfsysCalendarHoliday   = $orm->getSearchCols( 'WbfsysCalendarHoliday' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_calendar_holiday' ) )
    {
      $fieldsWbfsysCalendarHoliday = array_unique( array_merge
      (
        $fieldsWbfsysCalendarHoliday,
        $refs
      ));
    }

    $filterWbfsysCalendarHoliday     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysCalendarHoliday', $fieldsWbfsysCalendarHoliday ),
      $orm->getErrorMessages( 'WbfsysCalendarHoliday'  ),
      'search_wbfsys_calendar_holiday'
    );
    $condition['wbfsys_calendar_holiday'] = $filterWbfsysCalendarHoliday->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysCalendarType_Ref_Holiday_Table' );
    /* @var $query WbfsysCalendarType_Ref_Holiday_Table_Query  */

    // hard condition
    $query->setCondition( 'wbfsys_calendar_holiday.id_calendar_type = '.$idWbfsysCalendarType );

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

}//end class WbfsysCalendarType_Ref_Holiday_Table_Model

