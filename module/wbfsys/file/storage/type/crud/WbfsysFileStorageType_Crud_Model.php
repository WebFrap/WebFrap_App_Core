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
class WbfsysFileStorageType_Crud_Model
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
   * @return WbfsysFileStorageType_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_file_storage_type', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysFileStorageType', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysFileStorageType', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysFileStorageType', $accessKey );
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
      $this->setEntityWbfsysFileStorageType( $entity );
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
            'resource'  => $response->i18n->l( 'file storage Type', 'wbfsys.file_storage_type.label' ),
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
  * @return WbfsysFileStorageType_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysFileStorageType( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysFileStorageType_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysFileStorageType( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysFileStorageType_Entity
  */
  public function getEntityWbfsysFileStorageType( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysFileStorageType = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysFileStorageType = $this->getRegisterd( 'entityWbfsysFileStorageType' );

    //entity wbfsys_file_storage_type
    if( !$entityWbfsysFileStorageType )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysFileStorageType = $orm->get( 'WbfsysFileStorageType', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysfilestoragetype with this id '.$objid,
              'wbfsys.file_storage_type.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysFileStorageType', $entityWbfsysFileStorageType );
        $this->register( 'main_entity', $entityWbfsysFileStorageType);

      }
      else
      {
        $entityWbfsysFileStorageType   = new WbfsysFileStorageType_Entity() ;
        $this->register( 'entityWbfsysFileStorageType', $entityWbfsysFileStorageType );
        $this->register( 'main_entity', $entityWbfsysFileStorageType);
      }

    }
    elseif( $objid && $objid != $entityWbfsysFileStorageType->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysFileStorageType = $orm->get( 'WbfsysFileStorageType', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysfilestoragetype with this id '.$objid,
            'wbfsys.file_storage_type.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysFileStorageType', $entityWbfsysFileStorageType);
      $this->register( 'main_entity', $entityWbfsysFileStorageType);
    }

    return $entityWbfsysFileStorageType;

  }//end public function getEntityWbfsysFileStorageType */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysFileStorageType_Entity $entity
  */
  public function setEntityWbfsysFileStorageType( $entity )
  {

    $this->register( 'entityWbfsysFileStorageType', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysFileStorageType */

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
      if( !$entityWbfsysFileStorageType = $this->getRegisterd( 'entityWbfsysFileStorageType' ) )
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
            array( 'key' => 'entityWbfsysFileStorageType' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysFileStorageType ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysFileStorageType->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create file storage Type {@label@}',
            'wbfsys.file_storage_type.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysFileStorageType->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created file storage Type {@label@}',
            'wbfsys.file_storage_type.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New file storage Type: '.$entityText,
          'create',
          $entityWbfsysFileStorageType
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysFileStorageType );
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
      if( !$entityWbfsysFileStorageType = $this->getRegisterd( 'entityWbfsysFileStorageType' ) )
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
            array( 'key' => 'entityWbfsysFileStorageType' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysFileStorageType ) )
      {
        $entityText = $entityWbfsysFileStorageType->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update file storage Type {@label@}',
            'wbfsys.file_storage_type.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysFileStorageType->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated file storage Type {@label@}',
            'wbfsys.file_storage_type.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited file storage Type: '.$entityText,
          'edit',
          $entityWbfsysFileStorageType
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysFileStorageType );

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
   * @param WbfsysFileStorageType_Entity $entityWbfsysFileStorageType
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysFileStorageType, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysFileStorageType->getId();
    
    $entityText = $entityWbfsysFileStorageType->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysFileStorageType );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted file storage Type {@label@}',
          'wbfsys.file_storage_type.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted file storage Type: '.$entityText,
          'delete',
          array( 'WbfsysFileStorageType', $delId )
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


      //management  wbfsys_file_storage_type source wbfsys_file_storage_type
      $entityWbfsysFileStorageType = $orm->newEntity( 'WbfsysFileStorageType' );

      if( !$params->fieldsWbfsysFileStorageType )
      {
        if( isset( $fields['wbfsys_file_storage_type'] )  )
          $params->fieldsWbfsysFileStorageType  = $fields['wbfsys_file_storage_type'];
        else
          $params->fieldsWbfsysFileStorageType  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysFileStorageType,
        'wbfsys_file_storage_type',
        $params->fieldsWbfsysFileStorageType
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysFileStorageType', $entityWbfsysFileStorageType );
      $this->register( 'main_entity', $entityWbfsysFileStorageType );

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
   * @param WbfsysFileStorageType_Entity $entityWbfsysFileStorageType
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysFileStorageType, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysFileStorageType
    if( !$params->fieldsWbfsysFileStorageType )
    {
      if( isset( $fields['wbfsys_file_storage_type'] ) )
        $params->fieldsWbfsysFileStorageType = $fields['wbfsys_file_storage_type'];
      else
        $params->fieldsWbfsysFileStorageType = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysFileStorageType,
      'wbfsys_file_storage_type',
      $params->fieldsWbfsysFileStorageType
    );
    $this->register( 'entityWbfsysFileStorageType', $entityWbfsysFileStorageType );
    $this->register( 'main_entity', $entityWbfsysFileStorageType );



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
      $entityWbfsysFileStorageType = new WbfsysFileStorageType_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysFileStorageType = $orm->get( 'WbfsysFileStorageType',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no file storage Type with the id: {@id@}',
            'wbfsys.file_storage_type.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysFileStorageType = new WbfsysFileStorageType_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysFileStorageType )
      $params->fieldsWbfsysFileStorageType  = $entityWbfsysFileStorageType->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysFileStorageType,
      'wbfsys_file_storage_type',
      $params->fieldsWbfsysFileStorageType
    );
    $this->register( 'entityWbfsysFileStorageType', $entityWbfsysFileStorageType );

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
      'wbfsys_file_storage_type' => array
      (
        'm_order',
        'name',
        'access_key',
        'description',
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
    $saveFields['wbfsys_file_storage_type'] = array();
    $saveFields['wbfsys_file_storage_type'][] = 'm_order';
        $saveFields['wbfsys_file_storage_type'][] = 'name';
        $saveFields['wbfsys_file_storage_type'][] = 'access_key';
        $saveFields['wbfsys_file_storage_type'][] = 'description';
        $saveFields['wbfsys_file_storage_type'][] = 'm_version';
    
    
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
      'wbfsys_file_storage_type' => array
      (
        'm_order',
        'name',
        'access_key',
        'description',
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
    $saveFields['wbfsys_file_storage_type'] = array();
    $saveFields['wbfsys_file_storage_type'][] = 'm_order';
        $saveFields['wbfsys_file_storage_type'][] = 'name';
        $saveFields['wbfsys_file_storage_type'][] = 'access_key';
        $saveFields['wbfsys_file_storage_type'][] = 'description';
        $saveFields['wbfsys_file_storage_type'][] = 'm_version';
    
    
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

}//end WbfsysFileStorageType_Crud_Model

