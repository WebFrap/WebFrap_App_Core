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
class WbfsysEntityAttachment_Crud_Model
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
   * @return WbfsysEntityAttachment_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_entity_attachment', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysEntityAttachment', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysEntityAttachment', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysEntityAttachment', $accessKey );
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
      $this->setEntityWbfsysEntityAttachment( $entity );
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
            'resource'  => $response->i18n->l( 'Entity Attachment', 'wbfsys.entity_attachment.label' ),
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
  * @return WbfsysEntityAttachment_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityAttachment( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysEntityAttachment_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityAttachment( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityAttachment_Entity
  */
  public function getEntityWbfsysEntityAttachment( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysEntityAttachment = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntityAttachment = $this->getRegisterd( 'entityWbfsysEntityAttachment' );

    //entity wbfsys_entity_attachment
    if( !$entityWbfsysEntityAttachment )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntityAttachment = $orm->get( 'WbfsysEntityAttachment', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentityattachment with this id '.$objid,
              'wbfsys.entity_attachment.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntityAttachment', $entityWbfsysEntityAttachment );
        $this->register( 'main_entity', $entityWbfsysEntityAttachment);

      }
      else
      {
        $entityWbfsysEntityAttachment   = new WbfsysEntityAttachment_Entity() ;
        $this->register( 'entityWbfsysEntityAttachment', $entityWbfsysEntityAttachment );
        $this->register( 'main_entity', $entityWbfsysEntityAttachment);
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntityAttachment->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntityAttachment = $orm->get( 'WbfsysEntityAttachment', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentityattachment with this id '.$objid,
            'wbfsys.entity_attachment.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntityAttachment', $entityWbfsysEntityAttachment);
      $this->register( 'main_entity', $entityWbfsysEntityAttachment);
    }

    return $entityWbfsysEntityAttachment;

  }//end public function getEntityWbfsysEntityAttachment */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityAttachment_Entity $entity
  */
  public function setEntityWbfsysEntityAttachment( $entity )
  {

    $this->register( 'entityWbfsysEntityAttachment', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntityAttachment */

  /**
  * returns the activ entity with data, or creates a empty one
  * and returns it instead
  *
  * @return EntityFile_Entity
  */
  public function getEntityEntityFile( $mainEntity = null )
  {

    $response = $this->getResponse();

    $objid = null;

    if( !is_null($mainEntity) )
      $objid = $mainEntity->id_file;

    $entityEntityFile = $this->getRegisterd( 'entityEntityFile' );

    //entity wbfsys_entity_attachment
    if( !$entityEntityFile )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityEntityFile = $orm->get( 'WbfsysFile', $objid) )
        {
          $response->addWarning
          (
            $response->i18n->l
            (
              'Missing the reference dataset wbfsysfile with the id '.$objid,
              'wbfsys.entity_attachment.message'
            )
          );

          $entityEntityFile = new WbfsysFile_Entity;

          $entityEntityFile->setId( $objid, true );
          $orm->insert( $entityEntityFile, array(), false );

        }
        $this->register( 'entityEntityFile', $entityEntityFile );
      }
      else
      {
        $entityEntityFile   = new WbfsysFile_Entity() ;
        $this->register( 'entityEntityFile', $entityEntityFile );
      }

    }
    elseif( $objid  && $objid != $entityEntityFile->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityEntityFile = $orm->get( 'WbfsysFile', $objid) )
      {
        $this->getResponse()->addError
        (
          $response->i18n->l
          (
            'Missing the reference dataset wbfsysfile with the id '.$objid,
            'wbfsys.entity_attachment.message'
          )
        );

        $entityEntityFile = new WbfsysFile_Entity;

        $entityEntityFile->setId( $objid, true );
        $orm->insert( $entityEntityFile );
      }

      $this->register( 'entityEntityFile', $entityEntityFile );
    }

    return $entityEntityFile;

  }//end public function getEntityEntityFile */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param EntityEntityFile $entity
  */
  public function setEntityEntityFile( $entity )
  {

    $this->register( 'entityEntityFile', $entity );

  }//end public function setEntityEntityFile */

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
      if( !$entityWbfsysEntityAttachment = $this->getRegisterd( 'entityWbfsysEntityAttachment' ) )
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
            array( 'key' => 'entityWbfsysEntityAttachment' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysEntityAttachment ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysEntityAttachment->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create Entity Attachment {@label@}',
            'wbfsys.entity_attachment.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysEntityAttachment->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created Entity Attachment {@label@}',
            'wbfsys.entity_attachment.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New Entity Attachment: '.$entityText,
          'create',
          $entityWbfsysEntityAttachment
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysEntityAttachment );
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
      if( !$entityWbfsysEntityAttachment = $this->getRegisterd( 'entityWbfsysEntityAttachment' ) )
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
            array( 'key' => 'entityWbfsysEntityAttachment' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysEntityAttachment ) )
      {
        $entityText = $entityWbfsysEntityAttachment->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update Entity Attachment {@label@}',
            'wbfsys.entity_attachment.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysEntityAttachment->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated Entity Attachment {@label@}',
            'wbfsys.entity_attachment.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited Entity Attachment: '.$entityText,
          'edit',
          $entityWbfsysEntityAttachment
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysEntityAttachment );

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
   * @param WbfsysEntityAttachment_Entity $entityWbfsysEntityAttachment
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysEntityAttachment, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysEntityAttachment->getId();
    
    $entityText = $entityWbfsysEntityAttachment->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysEntityAttachment );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Entity Attachment {@label@}',
          'wbfsys.entity_attachment.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted Entity Attachment: '.$entityText,
          'delete',
          array( 'WbfsysEntityAttachment', $delId )
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


      //management  wbfsys_entity_attachment source wbfsys_entity_attachment
      $entityWbfsysEntityAttachment = $orm->newEntity( 'WbfsysEntityAttachment' );

      if( !$params->fieldsWbfsysEntityAttachment )
      {
        if( isset( $fields['wbfsys_entity_attachment'] )  )
          $params->fieldsWbfsysEntityAttachment  = $fields['wbfsys_entity_attachment'];
        else
          $params->fieldsWbfsysEntityAttachment  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysEntityAttachment,
        'wbfsys_entity_attachment',
        $params->fieldsWbfsysEntityAttachment
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysEntityAttachment', $entityWbfsysEntityAttachment );
      $this->register( 'main_entity', $entityWbfsysEntityAttachment );

      //entity wbfsys_file
      if( $idEntityFile = $this->request->data( 'entity_file', Validator::EID, 'rowid' ) )
      {
        $entityEntityFile   = $orm->get( 'WbfsysFile', $idEntityFile );
      }
      else
      {
        $entityEntityFile   = $orm->newEntity( 'WbfsysFile' );
      }

      if( !$params->fieldsEntityFile )
      {
        if( isset( $fields['entity_file'] ) )
          $params->fieldsEntityFile  = $fields['entity_file'];
        else
          $params->fieldsEntityFile  = array();
      }


      // if we have an id this dataset has to be updated
      if( $idEntityFile )
      {
        // if the validation fails report
        $httpRequest->validateUpdate
        (
          $entityEntityFile,
          'entity_file',
          $params->fieldsEntityFile
        );
      }
      else // else we have to create a new one
      {
        // if the validation fails report
        $httpRequest->validateInsert
        (
          $entityEntityFile,
          'entity_file',
          $params->fieldsEntityFile
        );
      }

      // register the entity in the model registry
      $this->register('entityEntityFile',$entityEntityFile);

     $entityWbfsysEntityAttachment->id_file = $entityEntityFile; //src is saved after target

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
   * @param WbfsysEntityAttachment_Entity $entityWbfsysEntityAttachment
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysEntityAttachment, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysEntityAttachment
    if( !$params->fieldsWbfsysEntityAttachment )
    {
      if( isset( $fields['wbfsys_entity_attachment'] ) )
        $params->fieldsWbfsysEntityAttachment = $fields['wbfsys_entity_attachment'];
      else
        $params->fieldsWbfsysEntityAttachment = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysEntityAttachment,
      'wbfsys_entity_attachment',
      $params->fieldsWbfsysEntityAttachment
    );
    $this->register( 'entityWbfsysEntityAttachment', $entityWbfsysEntityAttachment );
    $this->register( 'main_entity', $entityWbfsysEntityAttachment );

    if( !$idEntityFile = $httpRequest->data( 'entity_file', Validator::EID, 'rowid' ) )
      $idEntityFile = $entityWbfsysEntityAttachment->id_file;

    //entity WbfsysFile
    if( !$idEntityFile )
    {
      $entityEntityFile = new WbfsysFile_Entity;
    }
    else
    {
      $entityEntityFile = $orm->get( 'WbfsysFile', $idEntityFile );
    }

    if( !$params->fieldsEntityFile )
    {
      if( isset( $fields['entity_file'] ) )
        $params->fieldsEntityFile = $fields['entity_file'];
      else
        $params->fieldsEntityFile = array();
    }

    if( $idEntityFile )
    {
      $httpRequest->validateUpdate
      (
        $entityEntityFile,
        'entity_file',
        $params->fieldsEntityFile
      );
    }
    else
    {
      $httpRequest->validateInsert
      (
        $entityEntityFile,
        'entity_file',
        $params->fieldsEntityFile
      );
    }

    $this->register( 'entityEntityFile', $entityEntityFile );
    $entityWbfsysEntityAttachment->id_file = $entityEntityFile; //src is saved after target


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
      $entityWbfsysEntityAttachment = new WbfsysEntityAttachment_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysEntityAttachment = $orm->get( 'WbfsysEntityAttachment',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no Entity Attachment with the id: {@id@}',
            'wbfsys.entity_attachment.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysEntityAttachment = new WbfsysEntityAttachment_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysEntityAttachment )
      $params->fieldsWbfsysEntityAttachment  = $entityWbfsysEntityAttachment->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysEntityAttachment,
      'wbfsys_entity_attachment',
      $params->fieldsWbfsysEntityAttachment
    );
    $this->register( 'entityWbfsysEntityAttachment', $entityWbfsysEntityAttachment );

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
      'wbfsys_entity_attachment' => array
      (
        'm_version',
        'vid',
        'id_file',
      ),
      'entity_file' => array
      (
        'name',
        'link',
        'id_type',
        'm_version',
        'description',
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
    $saveFields['wbfsys_entity_attachment'] = array();
    $saveFields['wbfsys_entity_attachment'][] = 'm_version';
        $saveFields['wbfsys_entity_attachment'][] = 'vid';
        $saveFields['wbfsys_entity_attachment'][] = 'id_file';
        $saveFields['entity_file'] = array();
    $saveFields['entity_file'][] = 'name';
        $saveFields['entity_file'][] = 'link';
        $saveFields['entity_file'][] = 'id_type';
        $saveFields['entity_file'][] = 'm_version';
        $saveFields['entity_file'][] = 'description';
    
    
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
      'wbfsys_entity_attachment' => array
      (
        'rowid',
        'm_time_created',
        'm_role_create',
        'm_time_changed',
        'm_role_change',
        'm_version',
        'm_uuid',
        'vid',
        'id_file',
      ),
      'entity_file' => array
      (
        'name',
        'link',
        'id_type',
        'rowid',
        'm_time_created',
        'm_role_create',
        'm_time_changed',
        'm_role_change',
        'm_version',
        'm_uuid',
        'description',
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
    $saveFields['wbfsys_entity_attachment'] = array();
    $saveFields['wbfsys_entity_attachment'][] = 'm_version';
        $saveFields['wbfsys_entity_attachment'][] = 'vid';
        $saveFields['wbfsys_entity_attachment'][] = 'id_file';
        $saveFields['entity_file'] = array();
    $saveFields['entity_file'][] = 'name';
        $saveFields['entity_file'][] = 'link';
        $saveFields['entity_file'][] = 'id_type';
        $saveFields['entity_file'][] = 'm_version';
        $saveFields['entity_file'][] = 'description';
    
    
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

}//end WbfsysEntityAttachment_Crud_Model

