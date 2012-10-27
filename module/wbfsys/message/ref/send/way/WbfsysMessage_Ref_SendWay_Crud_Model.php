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
class WbfsysMessage_Ref_SendWay_Crud_Model
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

////////////////////////////////////////////////////////////////////////////////
// crud methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * insert an entity
   * this method fetchs the activ entity from the registry an tries to
   * insert it at the database
   * all connected entities will be added too
   *
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function insert( $params )
  {

    $orm       = $this->getOrm();
    $view      = $this->getView();
    $response  = $this->getResponse();

    try
    {
      if( !$entityWbfsysMessageSendway = $this->getEntityWbfsysMessageSendway() )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'entityWbfsysMessageSendway was not registered'
        );
      }

      if( !$orm->insert($entityWbfsysMessageSendway) )
      {

        $entityText = $entityWbfsysMessageSendway->text();
        $response->addError
        (
          $view->i18n->l
          (
            'Failed to create Message Sendway {@label@}',
            'wbfsys.message.message',
            array( 'label' => $entityText )
          )
        );
      }
      else
      {
        $entityText  = $entityWbfsysMessageSendway->text();

        $this->getResponse()->addMessage
        (
          $view->i18n->l
          (
            'Successfully created Message Sendway {@label@}',
            'wbfsys.message.message',
            array( 'label' => $entityText)
          )
        );


        $this->protocol
        (
          'created new Message Sendway: '.$entityText,
          'create',
          $entityWbfsysMessageSendway
        );


      }

    }
    catch( LibDb_Exception $e )
    {

      $response->addError($e->getMessage());
    }
    catch( Model_Exception $e )
    {

      $response->addError($e->getMessage());
    }

    return !$this->getResponse()->hasErrors();

  }//end public function insert */

////////////////////////////////////////////////////////////////////////////////
// fetch methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * fetch the data from the http request object for an insert
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchConnectData( $params )
  {

    $httpRequest = $this->getRequest();
    $orm         = $this->getOrm();
    $view        = $this->getView();

    try
    {

      //management  wbfsys_message_sendway source wbfsys_message_sendway
      $entityWbfsysMessageSendway = $orm->newEntity( 'WbfsysMessageSendway' );

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysMessageSendway,
        'wbfsys_message_sendway',
        array( 'id_repository', 'id_message' )
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysMessageSendway', $entityWbfsysMessageSendway );


      return !$this->getResponse()->hasErrors();
    }
    catch( InvalidInput_Exception $e )
    {
      return null;
    }

  }//end public function fetchConnectData */

////////////////////////////////////////////////////////////////////////////////
// check methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * check if the reference allready exists
   * @param Entity $entity
   * @return boolean
   */
  public function checkUnique( $entity = null )
  {

    $orm = $this->getOrm();

    if(!$entity)
      $entity =  $this->getRegisterd('entityWbfsysMessageSendway');

    return $orm->checkUnique
    (
      $entity ,
      array( 'id_repository', 'id_message' )
    );

  }//end public function checkUnique */

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
      'wbfsys_message_sendway' => array
      (
        'id_message',
        'id_repository',
        'm_version',
      ),
      'wbfsys_message_repository' => array
      (
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysMessage_Ref_SendWay_Crud_Model

