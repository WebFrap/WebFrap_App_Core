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
class WbfsysMessageSendway_Crud_Model
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
   * @return WbfsysMessageSendway_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_message_sendway', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysMessageSendway', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysMessageSendway', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysMessageSendway', $accessKey );
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
      $this->setEntityWbfsysMessageSendway( $entity );
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
            'resource'  => $response->i18n->l( 'Message Sendway', 'wbfsys.message_sendway.label' ),
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
  * @return WbfsysMessageSendway_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysMessageSendway( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysMessageSendway_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysMessageSendway( $entity );

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
        $this->register( 'main_entity', $entityWbfsysMessageSendway);

      }
      else
      {
        $entityWbfsysMessageSendway   = new WbfsysMessageSendway_Entity() ;
        $this->register( 'entityWbfsysMessageSendway', $entityWbfsysMessageSendway );
        $this->register( 'main_entity', $entityWbfsysMessageSendway);
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

      $this->register( 'entityWbfsysMessageSendway', $entityWbfsysMessageSendway);
      $this->register( 'main_entity', $entityWbfsysMessageSendway);
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
      if( !$entityWbfsysMessageSendway = $this->getRegisterd( 'entityWbfsysMessageSendway' ) )
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
            array( 'key' => 'entityWbfsysMessageSendway' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysMessageSendway ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysMessageSendway->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create Message Sendway {@label@}',
            'wbfsys.message_sendway.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysMessageSendway->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created Message Sendway {@label@}',
            'wbfsys.message_sendway.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New Message Sendway: '.$entityText,
          'create',
          $entityWbfsysMessageSendway
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysMessageSendway );
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
      if( !$entityWbfsysMessageSendway = $this->getRegisterd( 'entityWbfsysMessageSendway' ) )
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
            array( 'key' => 'entityWbfsysMessageSendway' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysMessageSendway ) )
      {
        $entityText = $entityWbfsysMessageSendway->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update Message Sendway {@label@}',
            'wbfsys.message_sendway.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysMessageSendway->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated Message Sendway {@label@}',
            'wbfsys.message_sendway.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited Message Sendway: '.$entityText,
          'edit',
          $entityWbfsysMessageSendway
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysMessageSendway );

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
   * @param WbfsysMessageSendway_Entity $entityWbfsysMessageSendway
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysMessageSendway, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysMessageSendway->getId();
    
    $entityText = $entityWbfsysMessageSendway->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysMessageSendway );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Message Sendway {@label@}',
          'wbfsys.message_sendway.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted Message Sendway: '.$entityText,
          'delete',
          array( 'WbfsysMessageSendway', $delId )
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


      //management  wbfsys_message_sendway source wbfsys_message_sendway
      $entityWbfsysMessageSendway = $orm->newEntity( 'WbfsysMessageSendway' );

      if( !$params->fieldsWbfsysMessageSendway )
      {
        if( isset( $fields['wbfsys_message_sendway'] )  )
          $params->fieldsWbfsysMessageSendway  = $fields['wbfsys_message_sendway'];
        else
          $params->fieldsWbfsysMessageSendway  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysMessageSendway,
        'wbfsys_message_sendway',
        $params->fieldsWbfsysMessageSendway
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysMessageSendway', $entityWbfsysMessageSendway );
      $this->register( 'main_entity', $entityWbfsysMessageSendway );

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
   * @param WbfsysMessageSendway_Entity $entityWbfsysMessageSendway
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysMessageSendway, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysMessageSendway
    if( !$params->fieldsWbfsysMessageSendway )
    {
      if( isset( $fields['wbfsys_message_sendway'] ) )
        $params->fieldsWbfsysMessageSendway = $fields['wbfsys_message_sendway'];
      else
        $params->fieldsWbfsysMessageSendway = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysMessageSendway,
      'wbfsys_message_sendway',
      $params->fieldsWbfsysMessageSendway
    );
    $this->register( 'entityWbfsysMessageSendway', $entityWbfsysMessageSendway );
    $this->register( 'main_entity', $entityWbfsysMessageSendway );



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
      $entityWbfsysMessageSendway = new WbfsysMessageSendway_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysMessageSendway = $orm->get( 'WbfsysMessageSendway',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no Message Sendway with the id: {@id@}',
            'wbfsys.message_sendway.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysMessageSendway = new WbfsysMessageSendway_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysMessageSendway )
      $params->fieldsWbfsysMessageSendway  = $entityWbfsysMessageSendway->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysMessageSendway,
      'wbfsys_message_sendway',
      $params->fieldsWbfsysMessageSendway
    );
    $this->register( 'entityWbfsysMessageSendway', $entityWbfsysMessageSendway );

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
      'wbfsys_message_sendway' => array
      (
        'id_message',
        'id_repository',
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
    $saveFields['wbfsys_message_sendway'] = array();
    $saveFields['wbfsys_message_sendway'][] = 'id_message';
        $saveFields['wbfsys_message_sendway'][] = 'id_repository';
        $saveFields['wbfsys_message_sendway'][] = 'm_version';
    
    
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
      'wbfsys_message_sendway' => array
      (
        'id_message',
        'id_repository',
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
    $saveFields['wbfsys_message_sendway'] = array();
    $saveFields['wbfsys_message_sendway'][] = 'id_message';
        $saveFields['wbfsys_message_sendway'][] = 'id_repository';
        $saveFields['wbfsys_message_sendway'][] = 'm_version';
    
    
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

}//end WbfsysMessageSendway_Crud_Model

