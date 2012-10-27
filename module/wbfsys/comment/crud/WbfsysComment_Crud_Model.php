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
class WbfsysComment_Crud_Model
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
   * @return WbfsysComment_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_comment', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysComment', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysComment', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysComment', $accessKey );
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
      $this->setEntityWbfsysComment( $entity );
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
            'resource'  => $response->i18n->l( 'Comment', 'wbfsys.comment.label' ),
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
  * @return WbfsysComment_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysComment( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysComment_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysComment( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysComment_Entity
  */
  public function getEntityWbfsysComment( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysComment = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysComment = $this->getRegisterd( 'entityWbfsysComment' );

    //entity wbfsys_comment
    if( !$entityWbfsysComment )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysComment = $orm->get( 'WbfsysComment', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsyscomment with this id '.$objid,
              'wbfsys.comment.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysComment', $entityWbfsysComment );
        $this->register( 'main_entity', $entityWbfsysComment);

      }
      else
      {
        $entityWbfsysComment   = new WbfsysComment_Entity() ;
        $this->register( 'entityWbfsysComment', $entityWbfsysComment );
        $this->register( 'main_entity', $entityWbfsysComment);
      }

    }
    elseif( $objid && $objid != $entityWbfsysComment->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysComment = $orm->get( 'WbfsysComment', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsyscomment with this id '.$objid,
            'wbfsys.comment.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysComment', $entityWbfsysComment);
      $this->register( 'main_entity', $entityWbfsysComment);
    }

    return $entityWbfsysComment;

  }//end public function getEntityWbfsysComment */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysComment_Entity $entity
  */
  public function setEntityWbfsysComment( $entity )
  {

    $this->register( 'entityWbfsysComment', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysComment */

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
      if( !$entityWbfsysComment = $this->getRegisterd( 'entityWbfsysComment' ) )
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
            array( 'key' => 'entityWbfsysComment' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysComment ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysComment->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create Comment {@label@}',
            'wbfsys.comment.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysComment->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created Comment {@label@}',
            'wbfsys.comment.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New Comment: '.$entityText,
          'create',
          $entityWbfsysComment
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysComment );
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
      if( !$entityWbfsysComment = $this->getRegisterd( 'entityWbfsysComment' ) )
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
            array( 'key' => 'entityWbfsysComment' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysComment ) )
      {
        $entityText = $entityWbfsysComment->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update Comment {@label@}',
            'wbfsys.comment.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysComment->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated Comment {@label@}',
            'wbfsys.comment.message',
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
          $entityWbfsysComment
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysComment );

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
   * @param WbfsysComment_Entity $entityWbfsysComment
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysComment, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysComment->getId();
    
    $entityText = $entityWbfsysComment->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysComment );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Comment {@label@}',
          'wbfsys.comment.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted Comment: '.$entityText,
          'delete',
          array( 'WbfsysComment', $delId )
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


      //management  wbfsys_comment source wbfsys_comment
      $entityWbfsysComment = $orm->newEntity( 'WbfsysComment' );

      if( !$params->fieldsWbfsysComment )
      {
        if( isset( $fields['wbfsys_comment'] )  )
          $params->fieldsWbfsysComment  = $fields['wbfsys_comment'];
        else
          $params->fieldsWbfsysComment  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysComment,
        'wbfsys_comment',
        $params->fieldsWbfsysComment
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysComment', $entityWbfsysComment );
      $this->register( 'main_entity', $entityWbfsysComment );

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
   * @param WbfsysComment_Entity $entityWbfsysComment
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysComment, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysComment
    if( !$params->fieldsWbfsysComment )
    {
      if( isset( $fields['wbfsys_comment'] ) )
        $params->fieldsWbfsysComment = $fields['wbfsys_comment'];
      else
        $params->fieldsWbfsysComment = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysComment,
      'wbfsys_comment',
      $params->fieldsWbfsysComment
    );
    $this->register( 'entityWbfsysComment', $entityWbfsysComment );
    $this->register( 'main_entity', $entityWbfsysComment );



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
      $entityWbfsysComment = new WbfsysComment_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysComment = $orm->get( 'WbfsysComment',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no Comment with the id: {@id@}',
            'wbfsys.comment.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysComment = new WbfsysComment_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysComment )
      $params->fieldsWbfsysComment  = $entityWbfsysComment->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysComment,
      'wbfsys_comment',
      $params->fieldsWbfsysComment
    );
    $this->register( 'entityWbfsysComment', $entityWbfsysComment );

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
      'wbfsys_comment' => array
      (
        'm_parent',
        'title',
        'rate',
        'lft',
        'vid',
        'id_lang',
        'content',
        'rgt',
        'id_vid_entity',
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
    $saveFields['wbfsys_comment'] = array();
    $saveFields['wbfsys_comment'][] = 'm_parent';
        $saveFields['wbfsys_comment'][] = 'title';
        $saveFields['wbfsys_comment'][] = 'rate';
        $saveFields['wbfsys_comment'][] = 'lft';
        $saveFields['wbfsys_comment'][] = 'vid';
        $saveFields['wbfsys_comment'][] = 'id_lang';
        $saveFields['wbfsys_comment'][] = 'content';
        $saveFields['wbfsys_comment'][] = 'rgt';
        $saveFields['wbfsys_comment'][] = 'id_vid_entity';
        $saveFields['wbfsys_comment'][] = 'm_version';
    
    
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
      'wbfsys_comment' => array
      (
        'm_parent',
        'title',
        'rate',
        'lft',
        'vid',
        'id_lang',
        'content',
        'rgt',
        'id_vid_entity',
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
    $saveFields['wbfsys_comment'] = array();
    $saveFields['wbfsys_comment'][] = 'm_parent';
        $saveFields['wbfsys_comment'][] = 'title';
        $saveFields['wbfsys_comment'][] = 'rate';
        $saveFields['wbfsys_comment'][] = 'lft';
        $saveFields['wbfsys_comment'][] = 'vid';
        $saveFields['wbfsys_comment'][] = 'id_lang';
        $saveFields['wbfsys_comment'][] = 'content';
        $saveFields['wbfsys_comment'][] = 'rgt';
        $saveFields['wbfsys_comment'][] = 'id_vid_entity';
        $saveFields['wbfsys_comment'][] = 'm_version';
    
    
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

}//end WbfsysComment_Crud_Model

