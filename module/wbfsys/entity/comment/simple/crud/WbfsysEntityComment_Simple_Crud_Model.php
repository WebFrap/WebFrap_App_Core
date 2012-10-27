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
class WbfsysEntityComment_Simple_Crud_Model
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
   * @return WbfsysEntityComment_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_entity_comment-simple', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysEntityComment', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysEntityComment', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysEntityComment', $accessKey );
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
      $this->setEntityWbfsysEntityComment_Simple( $entity );
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
            'resource'  => $response->i18n->l( 'Comment', 'wbfsys.entity_comment_simple.label' ),
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
  * @return WbfsysEntityComment_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityComment_Simple( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysEntityComment_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityComment_Simple( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityComment_Entity
  */
  public function getEntityWbfsysEntityComment_Simple( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysEntityComment_Simple = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntityComment_Simple = $this->getRegisterd( 'entityWbfsysEntityComment_Simple' );

    //entity wbfsys_entity_comment
    if( !$entityWbfsysEntityComment_Simple )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntityComment_Simple = $orm->get( 'WbfsysEntityComment', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentitycomment with this id '.$objid,
              'wbfsys.entity_comment_simple.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntityComment_Simple', $entityWbfsysEntityComment_Simple );
        $this->register( 'main_entity', $entityWbfsysEntityComment_Simple);

      }
      else
      {
        $entityWbfsysEntityComment_Simple   = new WbfsysEntityComment_Entity() ;
        $this->register( 'entityWbfsysEntityComment_Simple', $entityWbfsysEntityComment_Simple );
        $this->register( 'main_entity', $entityWbfsysEntityComment_Simple);
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntityComment_Simple->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntityComment_Simple = $orm->get( 'WbfsysEntityComment', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentitycomment with this id '.$objid,
            'wbfsys.entity_comment_simple.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntityComment_Simple', $entityWbfsysEntityComment_Simple);
      $this->register( 'main_entity', $entityWbfsysEntityComment_Simple);
    }

    return $entityWbfsysEntityComment_Simple;

  }//end public function getEntityWbfsysEntityComment_Simple */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityComment_Entity $entity
  */
  public function setEntityWbfsysEntityComment_Simple( $entity )
  {

    $this->register( 'entityWbfsysEntityComment_Simple', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntityComment_Simple */

  /**
  * returns the activ entity with data, or creates a empty one
  * and returns it instead
  *
  * @return EmbedComment_Entity
  */
  public function getEntityEmbedComment( $mainEntity = null )
  {

    $response = $this->getResponse();

    $objid = null;

    if( !is_null($mainEntity) )
      $objid = $mainEntity->id_comment;

    $entityEmbedComment = $this->getRegisterd( 'entityEmbedComment' );

    //entity wbfsys_entity_comment
    if( !$entityEmbedComment )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityEmbedComment = $orm->get( 'WbfsysComment', $objid) )
        {
          $response->addWarning
          (
            $response->i18n->l
            (
              'Missing the reference dataset wbfsyscomment with the id '.$objid,
              'wbfsys.entity_comment_simple.message'
            )
          );

          $entityEmbedComment = new WbfsysComment_Entity;

          $entityEmbedComment->title = ' ';
          $entityEmbedComment->content = ' ';
          $entityEmbedComment->setId( $objid, true );
          $orm->insert( $entityEmbedComment, array(), false );

        }
        $this->register( 'entityEmbedComment', $entityEmbedComment );
      }
      else
      {
        $entityEmbedComment   = new WbfsysComment_Entity() ;
        $this->register( 'entityEmbedComment', $entityEmbedComment );
      }

    }
    elseif( $objid  && $objid != $entityEmbedComment->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityEmbedComment = $orm->get( 'WbfsysComment', $objid) )
      {
        $this->getResponse()->addError
        (
          $response->i18n->l
          (
            'Missing the reference dataset wbfsyscomment with the id '.$objid,
            'wbfsys.entity_comment_simple.message'
          )
        );

        $entityEmbedComment = new WbfsysComment_Entity;

          $entityEmbedComment->title = ' ';
          $entityEmbedComment->content = ' ';
        $entityEmbedComment->setId( $objid, true );
        $orm->insert( $entityEmbedComment );
      }

      $this->register( 'entityEmbedComment', $entityEmbedComment );
    }

    return $entityEmbedComment;

  }//end public function getEntityEmbedComment */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param EntityEmbedComment $entity
  */
  public function setEntityEmbedComment( $entity )
  {

    $this->register( 'entityEmbedComment', $entity );

  }//end public function setEntityEmbedComment */

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
      if( !$entityWbfsysEntityComment_Simple = $this->getRegisterd( 'entityWbfsysEntityComment_Simple' ) )
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
            array( 'key' => 'entityWbfsysEntityComment_Simple' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysEntityComment_Simple ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysEntityComment_Simple->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create Comment {@label@}',
            'wbfsys.entity_comment_simple.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysEntityComment_Simple->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created Comment {@label@}',
            'wbfsys.entity_comment_simple.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New Comment: '.$entityText,
          'create',
          $entityWbfsysEntityComment_Simple
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysEntityComment_Simple );
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
      if( !$entityWbfsysEntityComment_Simple = $this->getRegisterd( 'entityWbfsysEntityComment_Simple' ) )
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
            array( 'key' => 'entityWbfsysEntityComment_Simple' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysEntityComment_Simple ) )
      {
        $entityText = $entityWbfsysEntityComment_Simple->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update Comment {@label@}',
            'wbfsys.entity_comment_simple.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysEntityComment_Simple->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated Comment {@label@}',
            'wbfsys.entity_comment_simple.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited Comment: '.$entityText,
          'edit',
          $entityWbfsysEntityComment_Simple
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysEntityComment_Simple );

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
   * @param WbfsysEntityComment_Entity $entityWbfsysEntityComment_Simple
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysEntityComment_Simple, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysEntityComment_Simple->getId();
    
    $entityText = $entityWbfsysEntityComment_Simple->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysEntityComment_Simple );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Comment {@label@}',
          'wbfsys.entity_comment_simple.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted Comment: '.$entityText,
          'delete',
          array( 'WbfsysEntityComment', $delId )
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


      //management  wbfsys_entity_comment-simple source wbfsys_entity_comment
      $entityWbfsysEntityComment_Simple = $orm->newEntity( 'WbfsysEntityComment' );

      if( !$params->fieldsWbfsysEntityComment_Simple )
      {
        if( isset( $fields['wbfsys_entity_comment-simple'] )  )
          $params->fieldsWbfsysEntityComment_Simple  = $fields['wbfsys_entity_comment-simple'];
        else
          $params->fieldsWbfsysEntityComment_Simple  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysEntityComment_Simple,
        'wbfsys_entity_comment-simple',
        $params->fieldsWbfsysEntityComment_Simple
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysEntityComment_Simple', $entityWbfsysEntityComment_Simple );
      $this->register( 'main_entity', $entityWbfsysEntityComment_Simple );

      //entity wbfsys_comment
      if( $idEmbedComment = $this->request->data( 'embed_comment', Validator::EID, 'rowid' ) )
      {
        $entityEmbedComment   = $orm->get( 'WbfsysComment', $idEmbedComment );
      }
      else
      {
        $entityEmbedComment   = $orm->newEntity( 'WbfsysComment' );
      }

      if( !$params->fieldsEmbedComment )
      {
        if( isset( $fields['embed_comment'] ) )
          $params->fieldsEmbedComment  = $fields['embed_comment'];
        else
          $params->fieldsEmbedComment  = array();
      }


      // if we have an id this dataset has to be updated
      if( $idEmbedComment )
      {
        // if the validation fails report
        $httpRequest->validateUpdate
        (
          $entityEmbedComment,
          'embed_comment',
          $params->fieldsEmbedComment
        );
      }
      else // else we have to create a new one
      {
        // if the validation fails report
        $httpRequest->validateInsert
        (
          $entityEmbedComment,
          'embed_comment',
          $params->fieldsEmbedComment
        );
      }

      // register the entity in the model registry
      $this->register('entityEmbedComment',$entityEmbedComment);

     $entityWbfsysEntityComment_Simple->id_comment = $entityEmbedComment; //src is saved after target

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
   * @param WbfsysEntityComment_Simple_Entity $entityWbfsysEntityComment_Simple
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysEntityComment_Simple, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysEntityComment
    if( !$params->fieldsWbfsysEntityComment_Simple )
    {
      if( isset( $fields['wbfsys_entity_comment-simple'] ) )
        $params->fieldsWbfsysEntityComment_Simple = $fields['wbfsys_entity_comment-simple'];
      else
        $params->fieldsWbfsysEntityComment_Simple = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysEntityComment_Simple,
      'wbfsys_entity_comment-simple',
      $params->fieldsWbfsysEntityComment_Simple
    );
    $this->register( 'entityWbfsysEntityComment_Simple', $entityWbfsysEntityComment_Simple );
    $this->register( 'main_entity', $entityWbfsysEntityComment_Simple );

    if( !$idEmbedComment = $httpRequest->data( 'embed_comment', Validator::EID, 'rowid' ) )
      $idEmbedComment = $entityWbfsysEntityComment_Simple->id_comment;

    //entity WbfsysComment
    if( !$idEmbedComment )
    {
      $entityEmbedComment = new WbfsysComment_Entity;
    }
    else
    {
      $entityEmbedComment = $orm->get( 'WbfsysComment', $idEmbedComment );
    }

    if( !$params->fieldsEmbedComment )
    {
      if( isset( $fields['embed_comment'] ) )
        $params->fieldsEmbedComment = $fields['embed_comment'];
      else
        $params->fieldsEmbedComment = array();
    }

    if( $idEmbedComment )
    {
      $httpRequest->validateUpdate
      (
        $entityEmbedComment,
        'embed_comment',
        $params->fieldsEmbedComment
      );
    }
    else
    {
      $httpRequest->validateInsert
      (
        $entityEmbedComment,
        'embed_comment',
        $params->fieldsEmbedComment
      );
    }

    $this->register( 'entityEmbedComment', $entityEmbedComment );
    $entityWbfsysEntityComment_Simple->id_comment = $entityEmbedComment; //src is saved after target


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
      $entityWbfsysEntityComment_Simple = new WbfsysEntityComment_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysEntityComment_Simple = $orm->get( 'WbfsysEntityComment',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no Comment with the id: {@id@}',
            'wbfsys.entity_comment_simple.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysEntityComment_Simple = new WbfsysEntityComment_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysEntityComment_Simple )
      $params->fieldsWbfsysEntityComment_Simple  = $entityWbfsysEntityComment_Simple->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysEntityComment_Simple,
      'wbfsys_entity_comment-simple',
      $params->fieldsWbfsysEntityComment_Simple
    );
    $this->register( 'entityWbfsysEntityComment_Simple', $entityWbfsysEntityComment_Simple );

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
      'wbfsys_entity_comment-simple' => array
      (
        'm_version',
        'vid',
        'id_comment',
      ),
      'embed_comment' => array
      (
        'title',
        'content',
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
    $saveFields['wbfsys_entity_comment-simple'] = array();
    $saveFields['wbfsys_entity_comment-simple'][] = 'm_version';
        $saveFields['wbfsys_entity_comment-simple'][] = 'vid';
        $saveFields['wbfsys_entity_comment-simple'][] = 'id_comment';
        $saveFields['embed_comment'] = array();
    $saveFields['embed_comment'][] = 'title';
        $saveFields['embed_comment'][] = 'content';
        $saveFields['embed_comment'][] = 'm_version';
    
    
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
      'wbfsys_entity_comment-simple' => array
      (
        'rowid',
        'm_time_created',
        'm_role_create',
        'm_time_changed',
        'm_role_change',
        'm_version',
        'm_uuid',
        'vid',
        'id_comment',
      ),
      'embed_comment' => array
      (
        'title',
        'content',
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
    $saveFields['wbfsys_entity_comment-simple'] = array();
    $saveFields['wbfsys_entity_comment-simple'][] = 'm_version';
        $saveFields['wbfsys_entity_comment-simple'][] = 'vid';
        $saveFields['wbfsys_entity_comment-simple'][] = 'id_comment';
        $saveFields['embed_comment'] = array();
    $saveFields['embed_comment'][] = 'title';
        $saveFields['embed_comment'][] = 'content';
        $saveFields['embed_comment'][] = 'm_version';
    
    
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

}//end WbfsysEntityComment_Simple_Crud_Model

