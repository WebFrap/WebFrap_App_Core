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
class WbfsysCustomTag_Crud_Model
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
   * @return WbfsysCustomTag_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_custom_tag', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysCustomTag', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysCustomTag', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysCustomTag', $accessKey );
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
      $this->setEntityWbfsysCustomTag( $entity );
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
            'resource'  => $response->i18n->l( 'Custom Tag', 'wbfsys.custom_tag.label' ),
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
  * @return WbfsysCustomTag_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysCustomTag( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysCustomTag_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysCustomTag( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysCustomTag_Entity
  */
  public function getEntityWbfsysCustomTag( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysCustomTag = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysCustomTag = $this->getRegisterd( 'entityWbfsysCustomTag' );

    //entity wbfsys_custom_tag
    if( !$entityWbfsysCustomTag )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysCustomTag = $orm->get( 'WbfsysCustomTag', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsyscustomtag with this id '.$objid,
              'wbfsys.custom_tag.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysCustomTag', $entityWbfsysCustomTag );
        $this->register( 'main_entity', $entityWbfsysCustomTag);

      }
      else
      {
        $entityWbfsysCustomTag   = new WbfsysCustomTag_Entity() ;
        $this->register( 'entityWbfsysCustomTag', $entityWbfsysCustomTag );
        $this->register( 'main_entity', $entityWbfsysCustomTag);
      }

    }
    elseif( $objid && $objid != $entityWbfsysCustomTag->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysCustomTag = $orm->get( 'WbfsysCustomTag', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsyscustomtag with this id '.$objid,
            'wbfsys.custom_tag.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysCustomTag', $entityWbfsysCustomTag);
      $this->register( 'main_entity', $entityWbfsysCustomTag);
    }

    return $entityWbfsysCustomTag;

  }//end public function getEntityWbfsysCustomTag */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysCustomTag_Entity $entity
  */
  public function setEntityWbfsysCustomTag( $entity )
  {

    $this->register( 'entityWbfsysCustomTag', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysCustomTag */

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

    //entity wbfsys_custom_tag
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
              'wbfsys.custom_tag.message'
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
            'wbfsys.custom_tag.message'
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
      if( !$entityWbfsysCustomTag = $this->getRegisterd( 'entityWbfsysCustomTag' ) )
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
            array( 'key' => 'entityWbfsysCustomTag' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysCustomTag ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysCustomTag->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create Custom Tag {@label@}',
            'wbfsys.custom_tag.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysCustomTag->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created Custom Tag {@label@}',
            'wbfsys.custom_tag.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New Custom Tag: '.$entityText,
          'create',
          $entityWbfsysCustomTag
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysCustomTag );
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
      if( !$entityWbfsysCustomTag = $this->getRegisterd( 'entityWbfsysCustomTag' ) )
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
            array( 'key' => 'entityWbfsysCustomTag' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysCustomTag ) )
      {
        $entityText = $entityWbfsysCustomTag->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update Custom Tag {@label@}',
            'wbfsys.custom_tag.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysCustomTag->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated Custom Tag {@label@}',
            'wbfsys.custom_tag.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited Custom Tag: '.$entityText,
          'edit',
          $entityWbfsysCustomTag
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysCustomTag );

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
   * @param WbfsysCustomTag_Entity $entityWbfsysCustomTag
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysCustomTag, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysCustomTag->getId();
    
    $entityText = $entityWbfsysCustomTag->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysCustomTag );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Custom Tag {@label@}',
          'wbfsys.custom_tag.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted Custom Tag: '.$entityText,
          'delete',
          array( 'WbfsysCustomTag', $delId )
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


      //management  wbfsys_custom_tag source wbfsys_custom_tag
      $entityWbfsysCustomTag = $orm->newEntity( 'WbfsysCustomTag' );

      if( !$params->fieldsWbfsysCustomTag )
      {
        if( isset( $fields['wbfsys_custom_tag'] )  )
          $params->fieldsWbfsysCustomTag  = $fields['wbfsys_custom_tag'];
        else
          $params->fieldsWbfsysCustomTag  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysCustomTag,
        'wbfsys_custom_tag',
        $params->fieldsWbfsysCustomTag
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysCustomTag', $entityWbfsysCustomTag );
      $this->register( 'main_entity', $entityWbfsysCustomTag );

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

     $entityWbfsysCustomTag->id_tag = $entityEmbedTag; //src is saved after target

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
   * @param WbfsysCustomTag_Entity $entityWbfsysCustomTag
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysCustomTag, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysCustomTag
    if( !$params->fieldsWbfsysCustomTag )
    {
      if( isset( $fields['wbfsys_custom_tag'] ) )
        $params->fieldsWbfsysCustomTag = $fields['wbfsys_custom_tag'];
      else
        $params->fieldsWbfsysCustomTag = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysCustomTag,
      'wbfsys_custom_tag',
      $params->fieldsWbfsysCustomTag
    );
    $this->register( 'entityWbfsysCustomTag', $entityWbfsysCustomTag );
    $this->register( 'main_entity', $entityWbfsysCustomTag );

    if( !$idEmbedTag = $httpRequest->data( 'embed_tag', Validator::EID, 'rowid' ) )
      $idEmbedTag = $entityWbfsysCustomTag->id_tag;

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
    $entityWbfsysCustomTag->id_tag = $entityEmbedTag; //src is saved after target


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
      $entityWbfsysCustomTag = new WbfsysCustomTag_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysCustomTag = $orm->get( 'WbfsysCustomTag',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no Custom Tag with the id: {@id@}',
            'wbfsys.custom_tag.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysCustomTag = new WbfsysCustomTag_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysCustomTag )
      $params->fieldsWbfsysCustomTag  = $entityWbfsysCustomTag->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysCustomTag,
      'wbfsys_custom_tag',
      $params->fieldsWbfsysCustomTag
    );
    $this->register( 'entityWbfsysCustomTag', $entityWbfsysCustomTag );

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
      'wbfsys_custom_tag' => array
      (
        'vid',
        'id_entity',
        'id_user',
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
    $saveFields['wbfsys_custom_tag'] = array();
    $saveFields['wbfsys_custom_tag'][] = 'vid';
        $saveFields['wbfsys_custom_tag'][] = 'id_entity';
        $saveFields['wbfsys_custom_tag'][] = 'id_user';
        $saveFields['wbfsys_custom_tag'][] = 'id_tag';
        $saveFields['wbfsys_custom_tag'][] = 'm_version';
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
      'wbfsys_custom_tag' => array
      (
        'vid',
        'id_entity',
        'id_user',
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
    $saveFields['wbfsys_custom_tag'] = array();
    $saveFields['wbfsys_custom_tag'][] = 'vid';
        $saveFields['wbfsys_custom_tag'][] = 'id_entity';
        $saveFields['wbfsys_custom_tag'][] = 'id_user';
        $saveFields['wbfsys_custom_tag'][] = 'id_tag';
        $saveFields['wbfsys_custom_tag'][] = 'm_version';
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

}//end WbfsysCustomTag_Crud_Model

