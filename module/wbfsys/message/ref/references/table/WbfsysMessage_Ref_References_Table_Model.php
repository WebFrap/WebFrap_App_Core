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
class WbfsysMessage_Ref_References_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMessageReferences_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysMessageReferences( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMessageReferences_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysMessageReferences(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMessageReferences_Entity
  */
  public function getEntityWbfsysMessageReferences( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysMessageReferences = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysMessageReferences = $this->getRegisterd( 'entityWbfsysMessageReferences' );


    //entity wbfsys_message_references
    if( !$entityWbfsysMessageReferences )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysMessageReferences = $orm->get( 'WbfsysMessageReferences', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmessagereferences with this id '.$objid,
              'wbfsys.message_references.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysMessageReferences', $entityWbfsysMessageReferences );
        $this->register( 'main_entity', $entityWbfsysMessageReferences );

      }
      else
      {
        $entityWbfsysMessageReferences   = new WbfsysMessageReferences_Entity() ;
        $this->register( 'entityWbfsysMessageReferences', $entityWbfsysMessageReferences );
        $this->register( 'main_entity', $entityWbfsysMessageReferences );
      }

    }
    elseif( $objid && $objid != $entityWbfsysMessageReferences->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysMessageReferences = $orm->get( 'WbfsysMessageReferences', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmessagereferences with this id '.$objid,
            'wbfsys.message_references.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysMessageReferences', $entityWbfsysMessageReferences );
      $this->register( 'main_entity', $entityWbfsysMessageReferences );
    }

    return $entityWbfsysMessageReferences;

  }//end public function getEntityWbfsysMessageReferences */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMessageReferences_Entity $entity
  */
  public function setEntityWbfsysMessageReferences( $entity )
  {

    $this->register( 'entityWbfsysMessageReferences', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysMessageReferences */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMessage_Entity
  */
  public function getEntityWbfsysMessage( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysMessage = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysMessage = $this->getRegisterd( 'entityWbfsysMessage' );

    //entity wbfsys_message
    if( !$entityWbfsysMessage )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysMessage = $orm->get( 'WbfsysMessage', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmessage with this id '.$objid,
              'wbfsys.message.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysMessage', $entityWbfsysMessage );
        $this->register( 'main_entity', $entityWbfsysMessage );

      }
      else
      {
        $entityWbfsysMessage   = new WbfsysMessage_Entity() ;
        $this->register( 'entityWbfsysMessage', $entityWbfsysMessage );
        $this->register( 'main_entity', $entityWbfsysMessage );
      }

    }
    elseif( $objid && $objid != $entityWbfsysMessage->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysMessage = $orm->get( 'WbfsysMessage', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmessage with this id '.$objid,
            'wbfsys.message.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysMessage', $entityWbfsysMessage );
      $this->register( 'main_entity', $entityWbfsysMessage );
    }

    return $entityWbfsysMessage;

  }//end public function getEntityWbfsysMessage */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMessage_Entity $entity
  */
  public function setEntityWbfsysMessage( $entity )
  {

    $this->register( 'entityWbfsysMessage', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysMessage */

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

    $data['wbfsys_message_references']  = $this->getEntityWbfsysMessageReferences();
    $data['wbfsys_message']  = $this->getEntityWbfsysMessage( $data['wbfsys_message_references']->id_reference );


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
    if( !Webfrap::classLoadable( 'WbfsysMessage_Entity' ) )
    {
      Error::addError
      (
        'tried so search for a nonexisting entity: wbfsys_message with the expected source wbfsys_message'
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

    if( !$fieldsWbfsysMessageReferences = $this->getRegisterd( 'search_fields_wbfsys_message_references' ) )
    {
       $fieldsWbfsysMessageReferences   = $orm->getSearchCols( 'WbfsysMessageReferences' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_message_references' ) )
    {
      $fieldsWbfsysMessageReferences = array_unique( array_merge
      (
        $fieldsWbfsysMessageReferences,
        $refs
      ));
    }

    $filterWbfsysMessageReferences     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysMessageReferences', $fieldsWbfsysMessageReferences ),
      $orm->getErrorMessages( 'WbfsysMessageReferences'  ),
      'search_wbfsys_message_references'
    );
    $condition['wbfsys_message_references'] = $filterWbfsysMessageReferences->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysMessage_Ref_References_Table' );
    /* @var $query WbfsysMessage_Ref_References_Table_Query  */
    $query->extendedConditions = $extendedConditions;

    // hard condition
    $query->setCondition( 'wbfsys_message_references.id_message = '.$idWbfsysMessage );
    
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

}//end class WbfsysMessage_Ref_References_Table_Model

