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
 * Read before change:
 * It's not recommended to change this file inside a Mod or App Project.
 * If you want to change it copy it to a custom project.

 *
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class MyMessage_Crud_Model
  extends Model
{
  
  /**
  * @var array
  */
  public $insertFields = array();
  
  /**
  * @var array
  */
  public $updateFields = array();

////////////////////////////////////////////////////////////////////////////////
// Get requestes Entity
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @param LibRequestHttp $request
   * @return WbfsysMessage_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'my_message', Validator::EID, 'objid' ) )
    {
      $objid = $val;
    }
    elseif( $val = $request->param( 'objid', Validator::EID ) )
    {
      $objid = $val;
    }
    elseif( $val = $request->param( 'access_key', Validator::CNAME ) )
    {
      $accessKey = $val;
    }
    elseif( $val = $request->param( 'uuid', Validator::CNAME ) )
    {
      $uuid = $val;
    }
    
    $searchId = null;
    $keyType  = null;
    
    if( $objid )
    {
      $searchId = $objid;
      $keyType  = 'rowid';
      $entity   = $orm->get( 'WbfsysMessage', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysMessage', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysMessage', $accessKey );
    }
    else
    {
      $response = $this->getResponse();
    
      // wenn keiner der 3 keys vorhanden ist, ist die Anfrage per Definition
      // invalid
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'There was no valid key in this request.',
          'wbf.message'
        ),
        Error::INVALID_REQUEST
      );
    }
    
    if( $entity )
    {
      $this->setEntityMyMessage( $entity );
      return $entity;
    }
    else
    {
      $response = $this->getResponse();
    
      // wenn keine Entity gefunden wurde wird die Anfrage mit einer 
      // Not Found Fehlermeldung beantwortet
      throw new InvalidRequest_Exception
      (
        $this->getResponse()->i18n->l
        (
          'The requested {@resource@} for {@key_type@}: {@id@} not exists!',
          'wbf.message',
          array
          (
            'resource'  => $response->i18n->l( 'My Messages', 'my.message.label' ),
            'key_type'  => $keyType,
            'id'        => $searchId
          )
        ),
        Response::NOT_FOUND
      );
    }
 
    return null;
    
  }//end public function getRequestedEntity */

////////////////////////////////////////////////////////////////////////////////
// Getter for the Entities
////////////////////////////////////////////////////////////////////////////////
    

  /**
  * Erfragen der Haupt Entity unabhängig vom Maskenname
  * @param int $objid
  * @return WbfsysMessage_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityMyMessage( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysMessage_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityMyMessage( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMessage_Entity
  */
  public function getEntityMyMessage( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityMyMessage = $this->getRegisterd( 'main_entity' ) )
      $entityMyMessage = $this->getRegisterd( 'entityMyMessage' );

    //entity wbfsys_message
    if( !$entityMyMessage )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityMyMessage = $orm->get( 'WbfsysMessage', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmessage with this id '.$objid,
              'my.message.message'
            )
          );
          return null;
        }

        $this->register( 'entityMyMessage', $entityMyMessage );
        $this->register( 'main_entity', $entityMyMessage);

      }
      else
      {
        $entityMyMessage   = new WbfsysMessage_Entity() ;
        $this->register( 'entityMyMessage', $entityMyMessage );
        $this->register( 'main_entity', $entityMyMessage);
      }

    }
    elseif( $objid && $objid != $entityMyMessage->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityMyMessage = $orm->get( 'WbfsysMessage', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmessage with this id '.$objid,
            'my.message.message'
          )
        );
        return null;
      }

      $this->register( 'entityMyMessage', $entityMyMessage);
      $this->register( 'main_entity', $entityMyMessage);
    }

    return $entityMyMessage;

  }//end public function getEntityMyMessage */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMessage_Entity $entity
  */
  public function setEntityMyMessage( $entity )
  {

    $this->register( 'entityMyMessage', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityMyMessage */

////////////////////////////////////////////////////////////////////////////////
// Crud Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @lang en:
   * insert an entity
   * this method fetchs the activ entity from the registry an tries to
   * insert it at the database
   * all connected entities will be added too
   *
   * @lang de:
   * Methode zum erstellen eines neuen Datensatzes.
   * Die Methode geht davon aus, dass sich das zu speichernde Entity Objekt
   * in der Model Registry befindet
   *
   * @param TFlag $params named parameters
   * @return null|Error im Fehlerfall
   */
  public function insert( $params )
  {

    // laden der resourcen
    $view     = $this->getView();
    $response = $this->getResponse();
    $db       = $this->getDb();
    $orm      = $db->getOrm();
    try
    {
      if( !$entityMyMessage = $this->getRegisterd( 'entityMyMessage' ) )
      {
        return new Error
        (
          $response->i18n->l
          (
            'Sorry, something went wrong!',
            'wbfsys.message'
          ),
          Response::INTERNAL_ERROR,
          $response->i18n->l
          (
            'The expected Entity with the key {@key@} was not in the registry',
            'wbf.message',
            array( 'key' => 'entityMyMessage' )
          )
        );
      }


      if( !$orm->insert( $entityMyMessage ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityMyMessage->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create My Messages {@label@}',
            'my.message.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityMyMessage->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created My Messages {@label@}',
            'my.message.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New My Messages: '.$entityText,
          'create',
          $entityMyMessage
        );



        if( $saveSrc )
          $orm->update( $entityMyMessage );
      }

    }
    catch( LibDb_Exception $e )
    {
      return new Error( $e, Response::INTERNAL_ERROR );
    }

    if( $response->hasErrors() )
    {
      return new Error
      (
        $response->i18n->l
        (
          'Sorry, something went wrong!',
          'wbf.message'
        ),
        Response::INTERNAL_ERROR
      );
    }
    else
    {
      return null;
    }

  }//end public function insert */

  /**
   * the update method of the model
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function update( $params )
  {

    // laden der resourcen
    $view     = $this->getView();
    $response = $this->getResponse();
    $db       = $this->getDb();
    $orm      = $db->getOrm();
    try
    {
      if( !$entityMyMessage = $this->getRegisterd( 'entityMyMessage' ) )
      {
        return new Error
        (
          $response->i18n->l
          (
            'Sorry, something went wrong!',
            'wbf.message'
          ),
          Response::INTERNAL_ERROR,
          $response->i18n->l
          (
            'The expected Entity with the key {@key@} was not in the registry',
            'wbf.message',
            array( 'key' => 'entityMyMessage' )
          )
        );
      }


      if( !$orm->update( $entityMyMessage ) )
      {
        $entityText = $entityMyMessage->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update My Messages {@label@}',
            'my.message.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityMyMessage->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated My Messages {@label@}',
            'my.message.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited My Messages: '.$entityText,
          'edit',
          $entityMyMessage
        );



        if( $saveSrc )
          $orm->update( $entityMyMessage );

      }
    }
    catch( LibDb_Exception $e )
    {
      return new Error( $e, Response::INTERNAL_ERROR );
    }

    // prüfen ob fehler in der message queue gelandet sind
    if( $response->hasErrors() )
    {
      // wenn ja geben wir dem controller ein Fehlerojekt zurück
      // das er behandeln soll
      return new Error
      (
        $response->i18n->l
        (
          'Sorry, something went wrong!',
          'wbf.message'
        ),
        Response::INTERNAL_ERROR
      );
    }
    else
    {
      return null;
    }

  }//end public function update */

  /**
   * en:
   * delete a dataset from the database
   *
   * de:
   * Löschen eines Datensatzes von der Datenbank
   *
   * @param WbfsysMessage_Entity $entityMyMessage
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityMyMessage, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityMyMessage->getId();
    
    $entityText = $entityMyMessage->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityMyMessage );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted My Messages {@label@}',
          'my.message.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted My Messages: '.$entityText,
          'delete',
          array( 'WbfsysMessage', $delId )
        );


      
      // alle Relationen von Personen auf diesen Datensatz löschen
      $acl->getManager()->cleanDatasetRelations( $delId );
      
      $db->commit();
      return null;
    }
    catch( LibDb_Exception $e )
    {
      $db->rollback();
      $response->addError
      (
        $response->i18n->l
        (
          'Failed to delete {@label@}',
          'wbfsys.msg',
          array
          (
            'label'=> $entityText
          )
        )
      );


      return new Error
      (
        $response->i18n->l
        (
          'Sorry, something went wrong!',
          'wbf.message'
        ),
        Response::INTERNAL_ERROR
      );

    }

  }//end public function delete */

////////////////////////////////////////////////////////////////////////////////
// Fetch Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * de:
   * Laden aller POST key=>value paare aus dem request
   * Die Daten werden direkt validiert und in neue entity objekte passende
   * zur zieltabelle gepackt.
   * Bei invaliden werten werden die Fehlermeldungen direkt in die
   * Message Queue geschrieben.
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchInsertData(  $params )
  {

    $httpRequest = $this->getRequest();
    $orm         = $this->getOrm();

    try
    {

      $fields = $this->getInsertFields();


      //management  my_message source wbfsys_message
      $entityMyMessage = $orm->newEntity( 'WbfsysMessage' );

      if( !$params->fieldsMyMessage )
      {
        if( isset( $fields['my_message'] )  )
          $params->fieldsMyMessage  = $fields['my_message'];
        else
          $params->fieldsMyMessage  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityMyMessage,
        'my_message',
        $params->fieldsMyMessage
      );

      // register the entity in the mode registry
      $this->register( 'entityMyMessage', $entityMyMessage );
      $this->register( 'main_entity', $entityMyMessage );

      return !$this->getResponse()->hasErrors();
    }
    catch( InvalidInput_Exception $e )
    {
      return null;
    }

  }//end public function fetchInsertData */

  /**
   * Auswerten des HTTP Request Objektes des Clients
   * Es werden alle Daten ausgelesen und validiert.
   *
   * Treten Fehler auf werden dieses über das Responseobjekt direkt in die 
   * Fehlerausgabe geschrieben.
   *
   * @param MyMessage_Entity $entityMyMessage
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityMyMessage, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysMessage
    if( !$params->fieldsMyMessage )
    {
      if( isset( $fields['my_message'] ) )
        $params->fieldsMyMessage = $fields['my_message'];
      else
        $params->fieldsMyMessage = array();
    }

    $httpRequest->validateUpdate
    (
      $entityMyMessage,
      'my_message',
      $params->fieldsMyMessage
    );
    $this->register( 'entityMyMessage', $entityMyMessage );
    $this->register( 'main_entity', $entityMyMessage );



    // check if there where any errors if not fine
    return !$response->hasErrors();

  }//end public function fetchUpdateData */

  /**
   * just fetch the post data without any required validation
   *
   * @param TFlag $params named parameters
   * @param int $id the id for the entity
   *
   * @return boolean
   */
  public function fetchPostData( $params, $id = null )
  {

    $httpRequest = $this->getRequest();
    $response    = $this->getResponse();

    if( !$id )
    {
      $entityMyMessage = new WbfsysMessage_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityMyMessage = $orm->get( 'WbfsysMessage',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no My Messages with the id: {@id@}',
            'my.message.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityMyMessage = new WbfsysMessage_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsMyMessage )
      $params->fieldsMyMessage  = $entityMyMessage->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityMyMessage,
      'my_message',
      $params->fieldsMyMessage
    );
    $this->register( 'entityMyMessage', $entityMyMessage );

    return !$response->hasErrors();

  }//end public function fetchPostData */

////////////////////////////////////////////////////////////////////////////////
// Get Fields
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * just fetch the post data without any required validation
   * @return array
   */
  public function getCreateFields()
  {

    return array
    (
      'my_message' => array
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

  /**
   * just fetch the post data without any required validation
   * @return array
   */
  public function getInsertFields()
  {

    if( $this->insertFields )
      return $this->insertFields;
  
    $saveFields = array();
    $saveFields['my_message'] = array();
    $saveFields['my_message'][] = 'id_sender';
        $saveFields['my_message'][] = 'id_receiver';
        $saveFields['my_message'][] = 'id_answer_to';
        $saveFields['my_message'][] = 'message_id';
        $saveFields['my_message'][] = 'id_refer';
        $saveFields['my_message'][] = 'priority';
        $saveFields['my_message'][] = 'deliver_date';
        $saveFields['my_message'][] = 'title';
        $saveFields['my_message'][] = 'message';
        $saveFields['my_message'][] = 'id_sender_status';
        $saveFields['my_message'][] = 'id_receiver_status';
        $saveFields['my_message'][] = 'flag_sender_deleted';
        $saveFields['my_message'][] = 'flag_receiver_deleted';
        $saveFields['my_message'][] = 'm_version';
    
    
    $this->insertFields = $saveFields;
    return $this->insertFields;

  }//end public function getInsertFields */

  /**
   * just fetch the post data without any required validation
   * @return array
   */
  public function getCreateRoFields( )
  {

    return array
    (

    );

  }//end public function getCreateRoFields */

  /**
   * request all fields that have to be fetched from the request
   * @return array
   */
  public function getEditFields()
  {

    return array
    (
      'my_message' => array
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
        'rowid',
        'm_time_created',
        'm_role_create',
        'm_time_changed',
        'm_role_change',
        'm_version',
        'm_uuid',
      ),

    );

  }//end public function getEditFields */

  /**
   * request all fields that have to be fetched from the request
   * @return array
   */
  public function getUpdateFields()
  {

    if( $this->updateFields )
      return $this->updateFields;
  
    $saveFields = array();
    $saveFields['my_message'] = array();
    $saveFields['my_message'][] = 'id_sender';
        $saveFields['my_message'][] = 'id_receiver';
        $saveFields['my_message'][] = 'id_answer_to';
        $saveFields['my_message'][] = 'message_id';
        $saveFields['my_message'][] = 'id_refer';
        $saveFields['my_message'][] = 'priority';
        $saveFields['my_message'][] = 'deliver_date';
        $saveFields['my_message'][] = 'title';
        $saveFields['my_message'][] = 'message';
        $saveFields['my_message'][] = 'id_sender_status';
        $saveFields['my_message'][] = 'id_receiver_status';
        $saveFields['my_message'][] = 'flag_sender_deleted';
        $saveFields['my_message'][] = 'flag_receiver_deleted';
        $saveFields['my_message'][] = 'm_version';
    
    
    $this->updateFields = $saveFields;
    return $this->updateFields;

  }//end public function getUpdateFields */

  /**
   * request all fields that have to be fetched from the request
   * @return array
   */
  public function getEditRoFields( )
  {

    return array
    (

    );

  }//end public function getEditRoFields */

}//end MyMessage_Crud_Model

