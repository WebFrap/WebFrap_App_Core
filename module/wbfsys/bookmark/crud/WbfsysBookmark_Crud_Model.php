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
class WbfsysBookmark_Crud_Model
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
   * @return WbfsysBookmark_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_bookmark', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysBookmark', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysBookmark', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysBookmark', $accessKey );
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
      $this->setEntityWbfsysBookmark( $entity );
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
            'resource'  => $response->i18n->l( 'Bookmark', 'wbfsys.bookmark.label' ),
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
  * @return WbfsysBookmark_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysBookmark( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysBookmark_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysBookmark( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysBookmark_Entity
  */
  public function getEntityWbfsysBookmark( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysBookmark = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysBookmark = $this->getRegisterd( 'entityWbfsysBookmark' );

    //entity wbfsys_bookmark
    if( !$entityWbfsysBookmark )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysBookmark = $orm->get( 'WbfsysBookmark', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysbookmark with this id '.$objid,
              'wbfsys.bookmark.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysBookmark', $entityWbfsysBookmark );
        $this->register( 'main_entity', $entityWbfsysBookmark);

      }
      else
      {
        $entityWbfsysBookmark   = new WbfsysBookmark_Entity() ;
        $this->register( 'entityWbfsysBookmark', $entityWbfsysBookmark );
        $this->register( 'main_entity', $entityWbfsysBookmark);
      }

    }
    elseif( $objid && $objid != $entityWbfsysBookmark->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysBookmark = $orm->get( 'WbfsysBookmark', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysbookmark with this id '.$objid,
            'wbfsys.bookmark.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysBookmark', $entityWbfsysBookmark);
      $this->register( 'main_entity', $entityWbfsysBookmark);
    }

    return $entityWbfsysBookmark;

  }//end public function getEntityWbfsysBookmark */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysBookmark_Entity $entity
  */
  public function setEntityWbfsysBookmark( $entity )
  {

    $this->register( 'entityWbfsysBookmark', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysBookmark */

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
      if( !$entityWbfsysBookmark = $this->getRegisterd( 'entityWbfsysBookmark' ) )
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
            array( 'key' => 'entityWbfsysBookmark' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysBookmark ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysBookmark->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create Bookmark {@label@}',
            'wbfsys.bookmark.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysBookmark->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created Bookmark {@label@}',
            'wbfsys.bookmark.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New Bookmark: '.$entityText,
          'create',
          $entityWbfsysBookmark
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysBookmark );
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
      if( !$entityWbfsysBookmark = $this->getRegisterd( 'entityWbfsysBookmark' ) )
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
            array( 'key' => 'entityWbfsysBookmark' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysBookmark ) )
      {
        $entityText = $entityWbfsysBookmark->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update Bookmark {@label@}',
            'wbfsys.bookmark.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysBookmark->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated Bookmark {@label@}',
            'wbfsys.bookmark.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited Bookmark: '.$entityText,
          'edit',
          $entityWbfsysBookmark
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysBookmark );

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
   * @param WbfsysBookmark_Entity $entityWbfsysBookmark
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysBookmark, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysBookmark->getId();
    
    $entityText = $entityWbfsysBookmark->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysBookmark );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Bookmark {@label@}',
          'wbfsys.bookmark.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted Bookmark: '.$entityText,
          'delete',
          array( 'WbfsysBookmark', $delId )
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


      //management  wbfsys_bookmark source wbfsys_bookmark
      $entityWbfsysBookmark = $orm->newEntity( 'WbfsysBookmark' );

      if( !$params->fieldsWbfsysBookmark )
      {
        if( isset( $fields['wbfsys_bookmark'] )  )
          $params->fieldsWbfsysBookmark  = $fields['wbfsys_bookmark'];
        else
          $params->fieldsWbfsysBookmark  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysBookmark,
        'wbfsys_bookmark',
        $params->fieldsWbfsysBookmark
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysBookmark', $entityWbfsysBookmark );
      $this->register( 'main_entity', $entityWbfsysBookmark );

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
   * @param WbfsysBookmark_Entity $entityWbfsysBookmark
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysBookmark, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysBookmark
    if( !$params->fieldsWbfsysBookmark )
    {
      if( isset( $fields['wbfsys_bookmark'] ) )
        $params->fieldsWbfsysBookmark = $fields['wbfsys_bookmark'];
      else
        $params->fieldsWbfsysBookmark = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysBookmark,
      'wbfsys_bookmark',
      $params->fieldsWbfsysBookmark
    );
    $this->register( 'entityWbfsysBookmark', $entityWbfsysBookmark );
    $this->register( 'main_entity', $entityWbfsysBookmark );



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
      $entityWbfsysBookmark = new WbfsysBookmark_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysBookmark = $orm->get( 'WbfsysBookmark',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no Bookmark with the id: {@id@}',
            'wbfsys.bookmark.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysBookmark = new WbfsysBookmark_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysBookmark )
      $params->fieldsWbfsysBookmark  = $entityWbfsysBookmark->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysBookmark,
      'wbfsys_bookmark',
      $params->fieldsWbfsysBookmark
    );
    $this->register( 'entityWbfsysBookmark', $entityWbfsysBookmark );

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
      'wbfsys_bookmark' => array
      (
        'title',
        'id_role',
        'id_entity',
        'vid',
        'url',
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
    $saveFields['wbfsys_bookmark'] = array();
    $saveFields['wbfsys_bookmark'][] = 'title';
        $saveFields['wbfsys_bookmark'][] = 'id_role';
        $saveFields['wbfsys_bookmark'][] = 'id_entity';
        $saveFields['wbfsys_bookmark'][] = 'vid';
        $saveFields['wbfsys_bookmark'][] = 'url';
        $saveFields['wbfsys_bookmark'][] = 'description';
        $saveFields['wbfsys_bookmark'][] = 'm_version';
    
    
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
      'wbfsys_bookmark' => array
      (
        'title',
        'id_role',
        'id_entity',
        'vid',
        'url',
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
    $saveFields['wbfsys_bookmark'] = array();
    $saveFields['wbfsys_bookmark'][] = 'title';
        $saveFields['wbfsys_bookmark'][] = 'id_role';
        $saveFields['wbfsys_bookmark'][] = 'id_entity';
        $saveFields['wbfsys_bookmark'][] = 'vid';
        $saveFields['wbfsys_bookmark'][] = 'url';
        $saveFields['wbfsys_bookmark'][] = 'description';
        $saveFields['wbfsys_bookmark'][] = 'm_version';
    
    
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

}//end WbfsysBookmark_Crud_Model

