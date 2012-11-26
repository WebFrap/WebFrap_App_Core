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
class MyMessage_Ref_References_Crud_Model
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
      if( !$entityWbfsysMessageReferences = $this->getEntityWbfsysMessageReferences() )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'entityWbfsysMessageReferences was not registered'
        );
      }

      if( !$orm->insert( $entityWbfsysMessageReferences ) )
      {

        $entityText = $entityWbfsysMessageReferences->text();
        $response->addError
        (
          $view->i18n->l
          (
            'Failed to create Nachrichten Quelle {@label@}',
            'my.message.message',
            array( 'label' => $entityText )
          )
        );
      }
      else
      {
        $entityText  = $entityWbfsysMessageReferences->text();

        $this->getResponse()->addMessage
        (
          $view->i18n->l
          (
            'Successfully created Nachrichten Quelle {@label@}',
            'my.message.message',
            array( 'label' => $entityText)
          )
        );


        $this->protocol
        (
          'created new Nachrichten Quelle: '.$entityText,
          'create',
          $entityWbfsysMessageReferences
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

      //management  wbfsys_message_references source wbfsys_message_references
      $entityWbfsysMessageReferences = $orm->newEntity( 'WbfsysMessageReferences' );

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysMessageReferences,
        'wbfsys_message_references',
        array( 'id_reference', 'id_message' )
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysMessageReferences', $entityWbfsysMessageReferences );


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
      $entity =  $this->getRegisterd('entityWbfsysMessageReferences');

    return $orm->checkUnique
    (
      $entity ,
      array( 'id_reference', 'id_message' )
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
      'wbfsys_message_references' => array
      (
        'id_message',
        'id_entity',
        'vid',
        'id_reference',
        'm_version',
      ),
      'wbfsys_message' => array
      (
        'id_sender',
        'id_receiver',
        'id_answer_to',
        'message_id',
        'id_refer',
        'priority',
        'deliver_date',
        'title',
        'message',
        'id_sender_status',
        'id_receiver_status',
        'flag_sender_deleted',
        'flag_receiver_deleted',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class MyMessage_Ref_References_Crud_Model

