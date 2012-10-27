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
class WbfsysCommentRating_Crud_Model
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
   * @return WbfsysCommentRating_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_comment_rating', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysCommentRating', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysCommentRating', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysCommentRating', $accessKey );
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
      $this->setEntityWbfsysCommentRating( $entity );
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
            'resource'  => $response->i18n->l( 'Comment Rating', 'wbfsys.comment_rating.label' ),
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
  * @return WbfsysCommentRating_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysCommentRating( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysCommentRating_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysCommentRating( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysCommentRating_Entity
  */
  public function getEntityWbfsysCommentRating( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysCommentRating = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysCommentRating = $this->getRegisterd( 'entityWbfsysCommentRating' );

    //entity wbfsys_comment_rating
    if( !$entityWbfsysCommentRating )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysCommentRating = $orm->get( 'WbfsysCommentRating', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsyscommentrating with this id '.$objid,
              'wbfsys.comment_rating.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysCommentRating', $entityWbfsysCommentRating );
        $this->register( 'main_entity', $entityWbfsysCommentRating);

      }
      else
      {
        $entityWbfsysCommentRating   = new WbfsysCommentRating_Entity() ;
        $this->register( 'entityWbfsysCommentRating', $entityWbfsysCommentRating );
        $this->register( 'main_entity', $entityWbfsysCommentRating);
      }

    }
    elseif( $objid && $objid != $entityWbfsysCommentRating->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysCommentRating = $orm->get( 'WbfsysCommentRating', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsyscommentrating with this id '.$objid,
            'wbfsys.comment_rating.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysCommentRating', $entityWbfsysCommentRating);
      $this->register( 'main_entity', $entityWbfsysCommentRating);
    }

    return $entityWbfsysCommentRating;

  }//end public function getEntityWbfsysCommentRating */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysCommentRating_Entity $entity
  */
  public function setEntityWbfsysCommentRating( $entity )
  {

    $this->register( 'entityWbfsysCommentRating', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysCommentRating */

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
      if( !$entityWbfsysCommentRating = $this->getRegisterd( 'entityWbfsysCommentRating' ) )
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
            array( 'key' => 'entityWbfsysCommentRating' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysCommentRating ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysCommentRating->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create Comment Rating {@label@}',
            'wbfsys.comment_rating.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysCommentRating->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created Comment Rating {@label@}',
            'wbfsys.comment_rating.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New Comment Rating: '.$entityText,
          'create',
          $entityWbfsysCommentRating
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysCommentRating );
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
      if( !$entityWbfsysCommentRating = $this->getRegisterd( 'entityWbfsysCommentRating' ) )
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
            array( 'key' => 'entityWbfsysCommentRating' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysCommentRating ) )
      {
        $entityText = $entityWbfsysCommentRating->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update Comment Rating {@label@}',
            'wbfsys.comment_rating.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysCommentRating->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated Comment Rating {@label@}',
            'wbfsys.comment_rating.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited Comment Rating: '.$entityText,
          'edit',
          $entityWbfsysCommentRating
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysCommentRating );

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
   * @param WbfsysCommentRating_Entity $entityWbfsysCommentRating
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysCommentRating, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysCommentRating->getId();
    
    $entityText = $entityWbfsysCommentRating->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysCommentRating );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Comment Rating {@label@}',
          'wbfsys.comment_rating.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted Comment Rating: '.$entityText,
          'delete',
          array( 'WbfsysCommentRating', $delId )
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


      //management  wbfsys_comment_rating source wbfsys_comment_rating
      $entityWbfsysCommentRating = $orm->newEntity( 'WbfsysCommentRating' );

      if( !$params->fieldsWbfsysCommentRating )
      {
        if( isset( $fields['wbfsys_comment_rating'] )  )
          $params->fieldsWbfsysCommentRating  = $fields['wbfsys_comment_rating'];
        else
          $params->fieldsWbfsysCommentRating  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysCommentRating,
        'wbfsys_comment_rating',
        $params->fieldsWbfsysCommentRating
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysCommentRating', $entityWbfsysCommentRating );
      $this->register( 'main_entity', $entityWbfsysCommentRating );

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
   * @param WbfsysCommentRating_Entity $entityWbfsysCommentRating
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysCommentRating, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysCommentRating
    if( !$params->fieldsWbfsysCommentRating )
    {
      if( isset( $fields['wbfsys_comment_rating'] ) )
        $params->fieldsWbfsysCommentRating = $fields['wbfsys_comment_rating'];
      else
        $params->fieldsWbfsysCommentRating = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysCommentRating,
      'wbfsys_comment_rating',
      $params->fieldsWbfsysCommentRating
    );
    $this->register( 'entityWbfsysCommentRating', $entityWbfsysCommentRating );
    $this->register( 'main_entity', $entityWbfsysCommentRating );



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
      $entityWbfsysCommentRating = new WbfsysCommentRating_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysCommentRating = $orm->get( 'WbfsysCommentRating',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no Comment Rating with the id: {@id@}',
            'wbfsys.comment_rating.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysCommentRating = new WbfsysCommentRating_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysCommentRating )
      $params->fieldsWbfsysCommentRating  = $entityWbfsysCommentRating->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysCommentRating,
      'wbfsys_comment_rating',
      $params->fieldsWbfsysCommentRating
    );
    $this->register( 'entityWbfsysCommentRating', $entityWbfsysCommentRating );

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
      'wbfsys_comment_rating' => array
      (
        'id_comment',
        'ugly_level',
        'id_type',
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
    $saveFields['wbfsys_comment_rating'] = array();
    $saveFields['wbfsys_comment_rating'][] = 'id_comment';
        $saveFields['wbfsys_comment_rating'][] = 'ugly_level';
        $saveFields['wbfsys_comment_rating'][] = 'id_type';
        $saveFields['wbfsys_comment_rating'][] = 'm_version';
    
    
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
      'wbfsys_comment_rating' => array
      (
        'id_comment',
        'ugly_level',
        'id_type',
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
    $saveFields['wbfsys_comment_rating'] = array();
    $saveFields['wbfsys_comment_rating'][] = 'id_comment';
        $saveFields['wbfsys_comment_rating'][] = 'ugly_level';
        $saveFields['wbfsys_comment_rating'][] = 'id_type';
        $saveFields['wbfsys_comment_rating'][] = 'm_version';
    
    
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

}//end WbfsysCommentRating_Crud_Model

