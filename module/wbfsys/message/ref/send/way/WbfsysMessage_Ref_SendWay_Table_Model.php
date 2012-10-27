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
class WbfsysMessage_Ref_SendWay_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMessageSendway_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysMessageSendway( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMessageSendway_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysMessageSendway(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMessageSendway_Entity
  */
  public function getEntityWbfsysMessageSendway( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysMessageSendway = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysMessageSendway = $this->getRegisterd( 'entityWbfsysMessageSendway' );


    //entity wbfsys_message_sendway
    if( !$entityWbfsysMessageSendway )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysMessageSendway = $orm->get( 'WbfsysMessageSendway', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmessagesendway with this id '.$objid,
              'wbfsys.message_sendway.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysMessageSendway', $entityWbfsysMessageSendway );
        $this->register( 'main_entity', $entityWbfsysMessageSendway );

      }
      else
      {
        $entityWbfsysMessageSendway   = new WbfsysMessageSendway_Entity() ;
        $this->register( 'entityWbfsysMessageSendway', $entityWbfsysMessageSendway );
        $this->register( 'main_entity', $entityWbfsysMessageSendway );
      }

    }
    elseif( $objid && $objid != $entityWbfsysMessageSendway->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysMessageSendway = $orm->get( 'WbfsysMessageSendway', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmessagesendway with this id '.$objid,
            'wbfsys.message_sendway.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysMessageSendway', $entityWbfsysMessageSendway );
      $this->register( 'main_entity', $entityWbfsysMessageSendway );
    }

    return $entityWbfsysMessageSendway;

  }//end public function getEntityWbfsysMessageSendway */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMessageSendway_Entity $entity
  */
  public function setEntityWbfsysMessageSendway( $entity )
  {

    $this->register( 'entityWbfsysMessageSendway', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysMessageSendway */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMessageRepository_Entity
  */
  public function getEntityWbfsysMessageRepository( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysMessageRepository = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysMessageRepository = $this->getRegisterd( 'entityWbfsysMessageRepository' );

    //entity wbfsys_message_repository
    if( !$entityWbfsysMessageRepository )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysMessageRepository = $orm->get( 'WbfsysMessageRepository', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmessagerepository with this id '.$objid,
              'wbfsys.message_repository.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysMessageRepository', $entityWbfsysMessageRepository );
        $this->register( 'main_entity', $entityWbfsysMessageRepository );

      }
      else
      {
        $entityWbfsysMessageRepository   = new WbfsysMessageRepository_Entity() ;
        $this->register( 'entityWbfsysMessageRepository', $entityWbfsysMessageRepository );
        $this->register( 'main_entity', $entityWbfsysMessageRepository );
      }

    }
    elseif( $objid && $objid != $entityWbfsysMessageRepository->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysMessageRepository = $orm->get( 'WbfsysMessageRepository', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmessagerepository with this id '.$objid,
            'wbfsys.message_repository.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysMessageRepository', $entityWbfsysMessageRepository );
      $this->register( 'main_entity', $entityWbfsysMessageRepository );
    }

    return $entityWbfsysMessageRepository;

  }//end public function getEntityWbfsysMessageRepository */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMessageRepository_Entity $entity
  */
  public function setEntityWbfsysMessageRepository( $entity )
  {

    $this->register( 'entityWbfsysMessageRepository', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysMessageRepository */

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

    $data['wbfsys_message_sendway']  = $this->getEntityWbfsysMessageSendway();
    $data['wbfsys_message_repository']  = $this->getEntityWbfsysMessageRepository( $data['wbfsys_message_sendway']->id_repository );


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
   * table to list all connected WbfsysMessage
   *
   * @param int $idWbfsysMessage the id for the reference entity
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysMessage, $access, $params  )
  {

    $response  = $this->getResponse();

    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysMessageRepository_Entity' ) )
    {
      Error::addError
      (
        'tried so search for a nonexisting entity: wbfsys_message_repository with the expected source wbfsys_message_repository'
      );
      return array();
    }

    $db          = $this->getDb();
    $orm         = $db->getOrm();
    $httpRequest = $this->getRequest();
    $user        = $this->getUser();
    $view        = $this->getView();
    
		$extendedConditions = array();

    $condition = array();




    if( $free = $httpRequest->param( 'free_search' , Validator::TEXT ) )
      $condition['free'] = $free;

    if( !$fieldsWbfsysMessageSendway = $this->getRegisterd( 'search_fields_wbfsys_message_sendway' ) )
    {
       $fieldsWbfsysMessageSendway   = $orm->getSearchCols( 'WbfsysMessageSendway' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_message_sendway' ) )
    {
      $fieldsWbfsysMessageSendway = array_unique( array_merge
      (
        $fieldsWbfsysMessageSendway,
        $refs
      ));
    }

    $filterWbfsysMessageSendway     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysMessageSendway', $fieldsWbfsysMessageSendway ),
      $orm->getErrorMessages( 'WbfsysMessageSendway'  ),
      'search_wbfsys_message_sendway'
    );
    $condition['wbfsys_message_sendway'] = $filterWbfsysMessageSendway->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysMessage_Ref_SendWay_Table' );
    /* @var $query WbfsysMessage_Ref_SendWay_Table_Query  */
    $query->extendedConditions = $extendedConditions;

    // hard condition
    $query->setCondition( 'wbfsys_message_sendway.id_message = '.$idWbfsysMessage );
    
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

}//end class WbfsysMessage_Ref_SendWay_Table_Model

