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
class WbfsysCommentRatingType_Crud_Model
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
   * @return WbfsysCommentRatingType_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_comment_rating_type', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysCommentRatingType', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysCommentRatingType', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysCommentRatingType', $accessKey );
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
      $this->setEntityWbfsysCommentRatingType( $entity );
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
            'resource'  => $response->i18n->l( 'comment rating Type', 'wbfsys.comment_rating_type.label' ),
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
  * @return WbfsysCommentRatingType_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysCommentRatingType( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysCommentRatingType_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysCommentRatingType( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysCommentRatingType_Entity
  */
  public function getEntityWbfsysCommentRatingType( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysCommentRatingType = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysCommentRatingType = $this->getRegisterd( 'entityWbfsysCommentRatingType' );

    //entity wbfsys_comment_rating_type
    if( !$entityWbfsysCommentRatingType )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysCommentRatingType = $orm->get( 'WbfsysCommentRatingType', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsyscommentratingtype with this id '.$objid,
              'wbfsys.comment_rating_type.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysCommentRatingType', $entityWbfsysCommentRatingType );
        $this->register( 'main_entity', $entityWbfsysCommentRatingType);

      }
      else
      {
        $entityWbfsysCommentRatingType   = new WbfsysCommentRatingType_Entity() ;
        $this->register( 'entityWbfsysCommentRatingType', $entityWbfsysCommentRatingType );
        $this->register( 'main_entity', $entityWbfsysCommentRatingType);
      }

    }
    elseif( $objid && $objid != $entityWbfsysCommentRatingType->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysCommentRatingType = $orm->get( 'WbfsysCommentRatingType', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsyscommentratingtype with this id '.$objid,
            'wbfsys.comment_rating_type.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysCommentRatingType', $entityWbfsysCommentRatingType);
      $this->register( 'main_entity', $entityWbfsysCommentRatingType);
    }

    return $entityWbfsysCommentRatingType;

  }//end public function getEntityWbfsysCommentRatingType */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysCommentRatingType_Entity $entity
  */
  public function setEntityWbfsysCommentRatingType( $entity )
  {

    $this->register( 'entityWbfsysCommentRatingType', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysCommentRatingType */

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
      if( !$entityWbfsysCommentRatingType = $this->getRegisterd( 'entityWbfsysCommentRatingType' ) )
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
            array( 'key' => 'entityWbfsysCommentRatingType' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysCommentRatingType ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysCommentRatingType->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create comment rating Type {@label@}',
            'wbfsys.comment_rating_type.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysCommentRatingType->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created comment rating Type {@label@}',
            'wbfsys.comment_rating_type.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New comment rating Type: '.$entityText,
          'create',
          $entityWbfsysCommentRatingType
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysCommentRatingType );
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
      if( !$entityWbfsysCommentRatingType = $this->getRegisterd( 'entityWbfsysCommentRatingType' ) )
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
            array( 'key' => 'entityWbfsysCommentRatingType' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysCommentRatingType ) )
      {
        $entityText = $entityWbfsysCommentRatingType->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update comment rating Type {@label@}',
            'wbfsys.comment_rating_type.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysCommentRatingType->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated comment rating Type {@label@}',
            'wbfsys.comment_rating_type.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited comment rating Type: '.$entityText,
          'edit',
          $entityWbfsysCommentRatingType
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysCommentRatingType );

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
   * @param WbfsysCommentRatingType_Entity $entityWbfsysCommentRatingType
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysCommentRatingType, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysCommentRatingType->getId();
    
    $entityText = $entityWbfsysCommentRatingType->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysCommentRatingType );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted comment rating Type {@label@}',
          'wbfsys.comment_rating_type.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted comment rating Type: '.$entityText,
          'delete',
          array( 'WbfsysCommentRatingType', $delId )
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


      //management  wbfsys_comment_rating_type source wbfsys_comment_rating_type
      $entityWbfsysCommentRatingType = $orm->newEntity( 'WbfsysCommentRatingType' );

      if( !$params->fieldsWbfsysCommentRatingType )
      {
        if( isset( $fields['wbfsys_comment_rating_type'] )  )
          $params->fieldsWbfsysCommentRatingType  = $fields['wbfsys_comment_rating_type'];
        else
          $params->fieldsWbfsysCommentRatingType  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysCommentRatingType,
        'wbfsys_comment_rating_type',
        $params->fieldsWbfsysCommentRatingType
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysCommentRatingType', $entityWbfsysCommentRatingType );
      $this->register( 'main_entity', $entityWbfsysCommentRatingType );

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
   * @param WbfsysCommentRatingType_Entity $entityWbfsysCommentRatingType
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysCommentRatingType, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysCommentRatingType
    if( !$params->fieldsWbfsysCommentRatingType )
    {
      if( isset( $fields['wbfsys_comment_rating_type'] ) )
        $params->fieldsWbfsysCommentRatingType = $fields['wbfsys_comment_rating_type'];
      else
        $params->fieldsWbfsysCommentRatingType = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysCommentRatingType,
      'wbfsys_comment_rating_type',
      $params->fieldsWbfsysCommentRatingType
    );
    $this->register( 'entityWbfsysCommentRatingType', $entityWbfsysCommentRatingType );
    $this->register( 'main_entity', $entityWbfsysCommentRatingType );



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
      $entityWbfsysCommentRatingType = new WbfsysCommentRatingType_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysCommentRatingType = $orm->get( 'WbfsysCommentRatingType',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no comment rating Type with the id: {@id@}',
            'wbfsys.comment_rating_type.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysCommentRatingType = new WbfsysCommentRatingType_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysCommentRatingType )
      $params->fieldsWbfsysCommentRatingType  = $entityWbfsysCommentRatingType->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysCommentRatingType,
      'wbfsys_comment_rating_type',
      $params->fieldsWbfsysCommentRatingType
    );
    $this->register( 'entityWbfsysCommentRatingType', $entityWbfsysCommentRatingType );

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
      'wbfsys_comment_rating_type' => array
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
    $saveFields['wbfsys_comment_rating_type'] = array();
    $saveFields['wbfsys_comment_rating_type'][] = 'm_order';
        $saveFields['wbfsys_comment_rating_type'][] = 'name';
        $saveFields['wbfsys_comment_rating_type'][] = 'access_key';
        $saveFields['wbfsys_comment_rating_type'][] = 'description';
        $saveFields['wbfsys_comment_rating_type'][] = 'm_version';
    
    
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
      'wbfsys_comment_rating_type' => array
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
    $saveFields['wbfsys_comment_rating_type'] = array();
    $saveFields['wbfsys_comment_rating_type'][] = 'm_order';
        $saveFields['wbfsys_comment_rating_type'][] = 'name';
        $saveFields['wbfsys_comment_rating_type'][] = 'access_key';
        $saveFields['wbfsys_comment_rating_type'][] = 'description';
        $saveFields['wbfsys_comment_rating_type'][] = 'm_version';
    
    
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

}//end WbfsysCommentRatingType_Crud_Model

