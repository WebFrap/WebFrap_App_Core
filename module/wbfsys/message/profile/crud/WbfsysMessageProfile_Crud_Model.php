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
class WbfsysMessageProfile_Crud_Model
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
   * @return WbfsysMessageProfile_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_message_profile', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysMessageProfile', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysMessageProfile', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysMessageProfile', $accessKey );
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
      $this->setEntityWbfsysMessageProfile( $entity );
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
            'resource'  => $response->i18n->l( 'Nachrichten Quelle', 'wbfsys.message_profile.label' ),
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
  * @return WbfsysMessageProfile_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysMessageProfile( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysMessageProfile_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysMessageProfile( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMessageProfile_Entity
  */
  public function getEntityWbfsysMessageProfile( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysMessageProfile = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysMessageProfile = $this->getRegisterd( 'entityWbfsysMessageProfile' );

    //entity wbfsys_message_profile
    if( !$entityWbfsysMessageProfile )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysMessageProfile = $orm->get( 'WbfsysMessageProfile', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmessageprofile with this id '.$objid,
              'wbfsys.message_profile.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysMessageProfile', $entityWbfsysMessageProfile );
        $this->register( 'main_entity', $entityWbfsysMessageProfile);

      }
      else
      {
        $entityWbfsysMessageProfile   = new WbfsysMessageProfile_Entity() ;
        $this->register( 'entityWbfsysMessageProfile', $entityWbfsysMessageProfile );
        $this->register( 'main_entity', $entityWbfsysMessageProfile);
      }

    }
    elseif( $objid && $objid != $entityWbfsysMessageProfile->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysMessageProfile = $orm->get( 'WbfsysMessageProfile', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmessageprofile with this id '.$objid,
            'wbfsys.message_profile.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysMessageProfile', $entityWbfsysMessageProfile);
      $this->register( 'main_entity', $entityWbfsysMessageProfile);
    }

    return $entityWbfsysMessageProfile;

  }//end public function getEntityWbfsysMessageProfile */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMessageProfile_Entity $entity
  */
  public function setEntityWbfsysMessageProfile( $entity )
  {

    $this->register( 'entityWbfsysMessageProfile', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysMessageProfile */

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
      if( !$entityWbfsysMessageProfile = $this->getRegisterd( 'entityWbfsysMessageProfile' ) )
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
            array( 'key' => 'entityWbfsysMessageProfile' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysMessageProfile ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysMessageProfile->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create Nachrichten Quelle {@label@}',
            'wbfsys.message_profile.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysMessageProfile->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created Nachrichten Quelle {@label@}',
            'wbfsys.message_profile.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New Nachrichten Quelle: '.$entityText,
          'create',
          $entityWbfsysMessageProfile
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysMessageProfile );
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
      if( !$entityWbfsysMessageProfile = $this->getRegisterd( 'entityWbfsysMessageProfile' ) )
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
            array( 'key' => 'entityWbfsysMessageProfile' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysMessageProfile ) )
      {
        $entityText = $entityWbfsysMessageProfile->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update Nachrichten Quelle {@label@}',
            'wbfsys.message_profile.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysMessageProfile->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated Nachrichten Quelle {@label@}',
            'wbfsys.message_profile.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited Nachrichten Quelle: '.$entityText,
          'edit',
          $entityWbfsysMessageProfile
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysMessageProfile );

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
   * @param WbfsysMessageProfile_Entity $entityWbfsysMessageProfile
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysMessageProfile, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysMessageProfile->getId();
    
    $entityText = $entityWbfsysMessageProfile->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysMessageProfile );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Nachrichten Quelle {@label@}',
          'wbfsys.message_profile.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted Nachrichten Quelle: '.$entityText,
          'delete',
          array( 'WbfsysMessageProfile', $delId )
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


      //management  wbfsys_message_profile source wbfsys_message_profile
      $entityWbfsysMessageProfile = $orm->newEntity( 'WbfsysMessageProfile' );

      if( !$params->fieldsWbfsysMessageProfile )
      {
        if( isset( $fields['wbfsys_message_profile'] )  )
          $params->fieldsWbfsysMessageProfile  = $fields['wbfsys_message_profile'];
        else
          $params->fieldsWbfsysMessageProfile  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysMessageProfile,
        'wbfsys_message_profile',
        $params->fieldsWbfsysMessageProfile
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysMessageProfile', $entityWbfsysMessageProfile );
      $this->register( 'main_entity', $entityWbfsysMessageProfile );

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
   * @param WbfsysMessageProfile_Entity $entityWbfsysMessageProfile
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysMessageProfile, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysMessageProfile
    if( !$params->fieldsWbfsysMessageProfile )
    {
      if( isset( $fields['wbfsys_message_profile'] ) )
        $params->fieldsWbfsysMessageProfile = $fields['wbfsys_message_profile'];
      else
        $params->fieldsWbfsysMessageProfile = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysMessageProfile,
      'wbfsys_message_profile',
      $params->fieldsWbfsysMessageProfile
    );
    $this->register( 'entityWbfsysMessageProfile', $entityWbfsysMessageProfile );
    $this->register( 'main_entity', $entityWbfsysMessageProfile );



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
      $entityWbfsysMessageProfile = new WbfsysMessageProfile_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysMessageProfile = $orm->get( 'WbfsysMessageProfile',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no Nachrichten Quelle with the id: {@id@}',
            'wbfsys.message_profile.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysMessageProfile = new WbfsysMessageProfile_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysMessageProfile )
      $params->fieldsWbfsysMessageProfile  = $entityWbfsysMessageProfile->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysMessageProfile,
      'wbfsys_message_profile',
      $params->fieldsWbfsysMessageProfile
    );
    $this->register( 'entityWbfsysMessageProfile', $entityWbfsysMessageProfile );

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
      'wbfsys_message_profile' => array
      (
        'name',
        'id_type',
        'id_visibility',
        'user_name',
        'password',
        'server',
        'description',
        'id_user',
        'change_password',
        'salt_password',
        'port',
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
    $saveFields['wbfsys_message_profile'] = array();
    $saveFields['wbfsys_message_profile'][] = 'name';
        $saveFields['wbfsys_message_profile'][] = 'id_type';
        $saveFields['wbfsys_message_profile'][] = 'id_visibility';
        $saveFields['wbfsys_message_profile'][] = 'user_name';
        $saveFields['wbfsys_message_profile'][] = 'password';
        $saveFields['wbfsys_message_profile'][] = 'server';
        $saveFields['wbfsys_message_profile'][] = 'description';
        $saveFields['wbfsys_message_profile'][] = 'id_user';
        $saveFields['wbfsys_message_profile'][] = 'change_password';
        $saveFields['wbfsys_message_profile'][] = 'salt_password';
        $saveFields['wbfsys_message_profile'][] = 'port';
        $saveFields['wbfsys_message_profile'][] = 'm_version';
    
    
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
      'wbfsys_message_profile' => array
      (
        'name',
        'id_type',
        'id_visibility',
        'user_name',
        'password',
        'server',
        'description',
        'id_user',
        'change_password',
        'salt_password',
        'port',
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
    $saveFields['wbfsys_message_profile'] = array();
    $saveFields['wbfsys_message_profile'][] = 'name';
        $saveFields['wbfsys_message_profile'][] = 'id_type';
        $saveFields['wbfsys_message_profile'][] = 'id_visibility';
        $saveFields['wbfsys_message_profile'][] = 'user_name';
        $saveFields['wbfsys_message_profile'][] = 'password';
        $saveFields['wbfsys_message_profile'][] = 'server';
        $saveFields['wbfsys_message_profile'][] = 'description';
        $saveFields['wbfsys_message_profile'][] = 'id_user';
        $saveFields['wbfsys_message_profile'][] = 'change_password';
        $saveFields['wbfsys_message_profile'][] = 'salt_password';
        $saveFields['wbfsys_message_profile'][] = 'port';
        $saveFields['wbfsys_message_profile'][] = 'm_version';
    
    
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

}//end WbfsysMessageProfile_Crud_Model

