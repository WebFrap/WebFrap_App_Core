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
class WbfsysEntityTag_Crud_Model
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
   * @return WbfsysEntityTag_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_entity_tag', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysEntityTag', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysEntityTag', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysEntityTag', $accessKey );
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
      $this->setEntityWbfsysEntityTag( $entity );
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
            'resource'  => $response->i18n->l( 'Entity Tag', 'wbfsys.entity_tag.label' ),
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
  * @return WbfsysEntityTag_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityTag( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysEntityTag_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityTag( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityTag_Entity
  */
  public function getEntityWbfsysEntityTag( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysEntityTag = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntityTag = $this->getRegisterd( 'entityWbfsysEntityTag' );

    //entity wbfsys_entity_tag
    if( !$entityWbfsysEntityTag )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntityTag = $orm->get( 'WbfsysEntityTag', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentitytag with this id '.$objid,
              'wbfsys.entity_tag.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntityTag', $entityWbfsysEntityTag );
        $this->register( 'main_entity', $entityWbfsysEntityTag);

      }
      else
      {
        $entityWbfsysEntityTag   = new WbfsysEntityTag_Entity() ;
        $this->register( 'entityWbfsysEntityTag', $entityWbfsysEntityTag );
        $this->register( 'main_entity', $entityWbfsysEntityTag);
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntityTag->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntityTag = $orm->get( 'WbfsysEntityTag', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentitytag with this id '.$objid,
            'wbfsys.entity_tag.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntityTag', $entityWbfsysEntityTag);
      $this->register( 'main_entity', $entityWbfsysEntityTag);
    }

    return $entityWbfsysEntityTag;

  }//end public function getEntityWbfsysEntityTag */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityTag_Entity $entity
  */
  public function setEntityWbfsysEntityTag( $entity )
  {

    $this->register( 'entityWbfsysEntityTag', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntityTag */

  /**
  * returns the activ entity with data, or creates a empty one
  * and returns it instead
  *
  * @return EmbedTag_Entity
  */
  public function getEntityEmbedTag( $mainEntity = null )
  {

    $response = $this->getResponse();

    $objid = null;

    if( !is_null($mainEntity) )
      $objid = $mainEntity->id_tag;

    $entityEmbedTag = $this->getRegisterd( 'entityEmbedTag' );

    //entity wbfsys_entity_tag
    if( !$entityEmbedTag )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityEmbedTag = $orm->get( 'WbfsysTag', $objid) )
        {
          $response->addWarning
          (
            $response->i18n->l
            (
              'Missing the reference dataset wbfsystag with the id '.$objid,
              'wbfsys.entity_tag.message'
            )
          );

          $entityEmbedTag = new WbfsysTag_Entity;

          $entityEmbedTag->name = ' ';
          $entityEmbedTag->setId( $objid, true );
          $orm->insert( $entityEmbedTag, array(), false );

        }
        $this->register( 'entityEmbedTag', $entityEmbedTag );
      }
      else
      {
        $entityEmbedTag   = new WbfsysTag_Entity() ;
        $this->register( 'entityEmbedTag', $entityEmbedTag );
      }

    }
    elseif( $objid  && $objid != $entityEmbedTag->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityEmbedTag = $orm->get( 'WbfsysTag', $objid) )
      {
        $this->getResponse()->addError
        (
          $response->i18n->l
          (
            'Missing the reference dataset wbfsystag with the id '.$objid,
            'wbfsys.entity_tag.message'
          )
        );

        $entityEmbedTag = new WbfsysTag_Entity;

          $entityEmbedTag->name = ' ';
        $entityEmbedTag->setId( $objid, true );
        $orm->insert( $entityEmbedTag );
      }

      $this->register( 'entityEmbedTag', $entityEmbedTag );
    }

    return $entityEmbedTag;

  }//end public function getEntityEmbedTag */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param EntityEmbedTag $entity
  */
  public function setEntityEmbedTag( $entity )
  {

    $this->register( 'entityEmbedTag', $entity );

  }//end public function setEntityEmbedTag */

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
      if( !$entityWbfsysEntityTag = $this->getRegisterd( 'entityWbfsysEntityTag' ) )
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
            array( 'key' => 'entityWbfsysEntityTag' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysEntityTag ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysEntityTag->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create Entity Tag {@label@}',
            'wbfsys.entity_tag.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysEntityTag->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created Entity Tag {@label@}',
            'wbfsys.entity_tag.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New Entity Tag: '.$entityText,
          'create',
          $entityWbfsysEntityTag
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysEntityTag );
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
      if( !$entityWbfsysEntityTag = $this->getRegisterd( 'entityWbfsysEntityTag' ) )
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
            array( 'key' => 'entityWbfsysEntityTag' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysEntityTag ) )
      {
        $entityText = $entityWbfsysEntityTag->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update Entity Tag {@label@}',
            'wbfsys.entity_tag.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysEntityTag->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated Entity Tag {@label@}',
            'wbfsys.entity_tag.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited Entity Tag: '.$entityText,
          'edit',
          $entityWbfsysEntityTag
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysEntityTag );

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
   * @param WbfsysEntityTag_Entity $entityWbfsysEntityTag
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysEntityTag, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysEntityTag->getId();
    
    $entityText = $entityWbfsysEntityTag->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysEntityTag );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Entity Tag {@label@}',
          'wbfsys.entity_tag.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted Entity Tag: '.$entityText,
          'delete',
          array( 'WbfsysEntityTag', $delId )
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


      //management  wbfsys_entity_tag source wbfsys_entity_tag
      $entityWbfsysEntityTag = $orm->newEntity( 'WbfsysEntityTag' );

      if( !$params->fieldsWbfsysEntityTag )
      {
        if( isset( $fields['wbfsys_entity_tag'] )  )
          $params->fieldsWbfsysEntityTag  = $fields['wbfsys_entity_tag'];
        else
          $params->fieldsWbfsysEntityTag  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysEntityTag,
        'wbfsys_entity_tag',
        $params->fieldsWbfsysEntityTag
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysEntityTag', $entityWbfsysEntityTag );
      $this->register( 'main_entity', $entityWbfsysEntityTag );

      //entity wbfsys_tag
      if( $idEmbedTag = $this->request->data( 'embed_tag', Validator::EID, 'rowid' ) )
      {
        $entityEmbedTag   = $orm->get( 'WbfsysTag', $idEmbedTag );
      }
      else
      {
        $entityEmbedTag   = $orm->newEntity( 'WbfsysTag' );
      }

      if( !$params->fieldsEmbedTag )
      {
        if( isset( $fields['embed_tag'] ) )
          $params->fieldsEmbedTag  = $fields['embed_tag'];
        else
          $params->fieldsEmbedTag  = array();
      }


      // if we have an id this dataset has to be updated
      if( $idEmbedTag )
      {
        // if the validation fails report
        $httpRequest->validateUpdate
        (
          $entityEmbedTag,
          'embed_tag',
          $params->fieldsEmbedTag
        );
      }
      else // else we have to create a new one
      {
        // if the validation fails report
        $httpRequest->validateInsert
        (
          $entityEmbedTag,
          'embed_tag',
          $params->fieldsEmbedTag
        );
      }

      // register the entity in the model registry
      $this->register('entityEmbedTag',$entityEmbedTag);

     $entityWbfsysEntityTag->id_tag = $entityEmbedTag; //src is saved after target

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
   * @param WbfsysEntityTag_Entity $entityWbfsysEntityTag
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysEntityTag, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysEntityTag
    if( !$params->fieldsWbfsysEntityTag )
    {
      if( isset( $fields['wbfsys_entity_tag'] ) )
        $params->fieldsWbfsysEntityTag = $fields['wbfsys_entity_tag'];
      else
        $params->fieldsWbfsysEntityTag = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysEntityTag,
      'wbfsys_entity_tag',
      $params->fieldsWbfsysEntityTag
    );
    $this->register( 'entityWbfsysEntityTag', $entityWbfsysEntityTag );
    $this->register( 'main_entity', $entityWbfsysEntityTag );

    if( !$idEmbedTag = $httpRequest->data( 'embed_tag', Validator::EID, 'rowid' ) )
      $idEmbedTag = $entityWbfsysEntityTag->id_tag;

    //entity WbfsysTag
    if( !$idEmbedTag )
    {
      $entityEmbedTag = new WbfsysTag_Entity;
    }
    else
    {
      $entityEmbedTag = $orm->get( 'WbfsysTag', $idEmbedTag );
    }

    if( !$params->fieldsEmbedTag )
    {
      if( isset( $fields['embed_tag'] ) )
        $params->fieldsEmbedTag = $fields['embed_tag'];
      else
        $params->fieldsEmbedTag = array();
    }

    if( $idEmbedTag )
    {
      $httpRequest->validateUpdate
      (
        $entityEmbedTag,
        'embed_tag',
        $params->fieldsEmbedTag
      );
    }
    else
    {
      $httpRequest->validateInsert
      (
        $entityEmbedTag,
        'embed_tag',
        $params->fieldsEmbedTag
      );
    }

    $this->register( 'entityEmbedTag', $entityEmbedTag );
    $entityWbfsysEntityTag->id_tag = $entityEmbedTag; //src is saved after target


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
      $entityWbfsysEntityTag = new WbfsysEntityTag_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysEntityTag = $orm->get( 'WbfsysEntityTag',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no Entity Tag with the id: {@id@}',
            'wbfsys.entity_tag.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysEntityTag = new WbfsysEntityTag_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysEntityTag )
      $params->fieldsWbfsysEntityTag  = $entityWbfsysEntityTag->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysEntityTag,
      'wbfsys_entity_tag',
      $params->fieldsWbfsysEntityTag
    );
    $this->register( 'entityWbfsysEntityTag', $entityWbfsysEntityTag );

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
      'wbfsys_entity_tag' => array
      (
        'vid',
        'id_entity',
        'id_tag',
        'm_version',
      ),
      'embed_tag' => array
      (
        'name',
        'access_key',
        'id_lang',
        'm_parent',
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
    $saveFields['wbfsys_entity_tag'] = array();
    $saveFields['wbfsys_entity_tag'][] = 'vid';
        $saveFields['wbfsys_entity_tag'][] = 'id_entity';
        $saveFields['wbfsys_entity_tag'][] = 'id_tag';
        $saveFields['wbfsys_entity_tag'][] = 'm_version';
        $saveFields['embed_tag'] = array();
    $saveFields['embed_tag'][] = 'name';
        $saveFields['embed_tag'][] = 'access_key';
        $saveFields['embed_tag'][] = 'id_lang';
        $saveFields['embed_tag'][] = 'm_parent';
        $saveFields['embed_tag'][] = 'description';
    
    
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
      'wbfsys_entity_tag' => array
      (
        'vid',
        'id_entity',
        'id_tag',
        'rowid',
        'm_time_created',
        'm_role_create',
        'm_time_changed',
        'm_role_change',
        'm_version',
        'm_uuid',
      ),
      'embed_tag' => array
      (
        'name',
        'access_key',
        'id_lang',
        'm_parent',
        'description',
        'rowid',
        'm_time_created',
        'm_role_create',
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
    $saveFields['wbfsys_entity_tag'] = array();
    $saveFields['wbfsys_entity_tag'][] = 'vid';
        $saveFields['wbfsys_entity_tag'][] = 'id_entity';
        $saveFields['wbfsys_entity_tag'][] = 'id_tag';
        $saveFields['wbfsys_entity_tag'][] = 'm_version';
        $saveFields['embed_tag'] = array();
    $saveFields['embed_tag'][] = 'name';
        $saveFields['embed_tag'][] = 'access_key';
        $saveFields['embed_tag'][] = 'id_lang';
        $saveFields['embed_tag'][] = 'm_parent';
        $saveFields['embed_tag'][] = 'description';
    
    
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

}//end WbfsysEntityTag_Crud_Model

