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
class WbfsysUserContactVisibility_Crud_Model
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
   * @return WbfsysUserContactVisibility_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_user_contact_visibility', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysUserContactVisibility', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysUserContactVisibility', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysUserContactVisibility', $accessKey );
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
      $this->setEntityWbfsysUserContactVisibility( $entity );
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
            'resource'  => $response->i18n->l( 'message profile visibility', 'wbfsys.user_contact_visibility.label' ),
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
  * @return WbfsysUserContactVisibility_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysUserContactVisibility( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysUserContactVisibility_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysUserContactVisibility( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysUserContactVisibility_Entity
  */
  public function getEntityWbfsysUserContactVisibility( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysUserContactVisibility = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysUserContactVisibility = $this->getRegisterd( 'entityWbfsysUserContactVisibility' );

    //entity wbfsys_user_contact_visibility
    if( !$entityWbfsysUserContactVisibility )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysUserContactVisibility = $orm->get( 'WbfsysUserContactVisibility', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysusercontactvisibility with this id '.$objid,
              'wbfsys.user_contact_visibility.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysUserContactVisibility', $entityWbfsysUserContactVisibility );
        $this->register( 'main_entity', $entityWbfsysUserContactVisibility);

      }
      else
      {
        $entityWbfsysUserContactVisibility   = new WbfsysUserContactVisibility_Entity() ;
        $this->register( 'entityWbfsysUserContactVisibility', $entityWbfsysUserContactVisibility );
        $this->register( 'main_entity', $entityWbfsysUserContactVisibility);
      }

    }
    elseif( $objid && $objid != $entityWbfsysUserContactVisibility->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysUserContactVisibility = $orm->get( 'WbfsysUserContactVisibility', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysusercontactvisibility with this id '.$objid,
            'wbfsys.user_contact_visibility.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysUserContactVisibility', $entityWbfsysUserContactVisibility);
      $this->register( 'main_entity', $entityWbfsysUserContactVisibility);
    }

    return $entityWbfsysUserContactVisibility;

  }//end public function getEntityWbfsysUserContactVisibility */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysUserContactVisibility_Entity $entity
  */
  public function setEntityWbfsysUserContactVisibility( $entity )
  {

    $this->register( 'entityWbfsysUserContactVisibility', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysUserContactVisibility */

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
      if( !$entityWbfsysUserContactVisibility = $this->getRegisterd( 'entityWbfsysUserContactVisibility' ) )
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
            array( 'key' => 'entityWbfsysUserContactVisibility' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysUserContactVisibility ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysUserContactVisibility->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create message profile visibility {@label@}',
            'wbfsys.user_contact_visibility.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysUserContactVisibility->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created message profile visibility {@label@}',
            'wbfsys.user_contact_visibility.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New message profile visibility: '.$entityText,
          'create',
          $entityWbfsysUserContactVisibility
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysUserContactVisibility );
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
      if( !$entityWbfsysUserContactVisibility = $this->getRegisterd( 'entityWbfsysUserContactVisibility' ) )
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
            array( 'key' => 'entityWbfsysUserContactVisibility' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysUserContactVisibility ) )
      {
        $entityText = $entityWbfsysUserContactVisibility->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update message profile visibility {@label@}',
            'wbfsys.user_contact_visibility.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysUserContactVisibility->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated message profile visibility {@label@}',
            'wbfsys.user_contact_visibility.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited message profile visibility: '.$entityText,
          'edit',
          $entityWbfsysUserContactVisibility
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysUserContactVisibility );

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
   * @param WbfsysUserContactVisibility_Entity $entityWbfsysUserContactVisibility
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysUserContactVisibility, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysUserContactVisibility->getId();
    
    $entityText = $entityWbfsysUserContactVisibility->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysUserContactVisibility );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted message profile visibility {@label@}',
          'wbfsys.user_contact_visibility.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted message profile visibility: '.$entityText,
          'delete',
          array( 'WbfsysUserContactVisibility', $delId )
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


      //management  wbfsys_user_contact_visibility source wbfsys_user_contact_visibility
      $entityWbfsysUserContactVisibility = $orm->newEntity( 'WbfsysUserContactVisibility' );

      if( !$params->fieldsWbfsysUserContactVisibility )
      {
        if( isset( $fields['wbfsys_user_contact_visibility'] )  )
          $params->fieldsWbfsysUserContactVisibility  = $fields['wbfsys_user_contact_visibility'];
        else
          $params->fieldsWbfsysUserContactVisibility  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysUserContactVisibility,
        'wbfsys_user_contact_visibility',
        $params->fieldsWbfsysUserContactVisibility
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysUserContactVisibility', $entityWbfsysUserContactVisibility );
      $this->register( 'main_entity', $entityWbfsysUserContactVisibility );

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
   * @param WbfsysUserContactVisibility_Entity $entityWbfsysUserContactVisibility
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysUserContactVisibility, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysUserContactVisibility
    if( !$params->fieldsWbfsysUserContactVisibility )
    {
      if( isset( $fields['wbfsys_user_contact_visibility'] ) )
        $params->fieldsWbfsysUserContactVisibility = $fields['wbfsys_user_contact_visibility'];
      else
        $params->fieldsWbfsysUserContactVisibility = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysUserContactVisibility,
      'wbfsys_user_contact_visibility',
      $params->fieldsWbfsysUserContactVisibility
    );
    $this->register( 'entityWbfsysUserContactVisibility', $entityWbfsysUserContactVisibility );
    $this->register( 'main_entity', $entityWbfsysUserContactVisibility );



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
      $entityWbfsysUserContactVisibility = new WbfsysUserContactVisibility_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysUserContactVisibility = $orm->get( 'WbfsysUserContactVisibility',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no message profile visibility with the id: {@id@}',
            'wbfsys.user_contact_visibility.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysUserContactVisibility = new WbfsysUserContactVisibility_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysUserContactVisibility )
      $params->fieldsWbfsysUserContactVisibility  = $entityWbfsysUserContactVisibility->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysUserContactVisibility,
      'wbfsys_user_contact_visibility',
      $params->fieldsWbfsysUserContactVisibility
    );
    $this->register( 'entityWbfsysUserContactVisibility', $entityWbfsysUserContactVisibility );

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
      'wbfsys_user_contact_visibility' => array
      (
        'name',
        'access_key',
        'description',
        'm_order',
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
    $saveFields['wbfsys_user_contact_visibility'] = array();
    $saveFields['wbfsys_user_contact_visibility'][] = 'name';
        $saveFields['wbfsys_user_contact_visibility'][] = 'access_key';
        $saveFields['wbfsys_user_contact_visibility'][] = 'description';
        $saveFields['wbfsys_user_contact_visibility'][] = 'm_order';
        $saveFields['wbfsys_user_contact_visibility'][] = 'm_version';
    
    
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
      'wbfsys_user_contact_visibility' => array
      (
        'name',
        'access_key',
        'description',
        'm_order',
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
    $saveFields['wbfsys_user_contact_visibility'] = array();
    $saveFields['wbfsys_user_contact_visibility'][] = 'name';
        $saveFields['wbfsys_user_contact_visibility'][] = 'access_key';
        $saveFields['wbfsys_user_contact_visibility'][] = 'description';
        $saveFields['wbfsys_user_contact_visibility'][] = 'm_order';
        $saveFields['wbfsys_user_contact_visibility'][] = 'm_version';
    
    
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

}//end WbfsysUserContactVisibility_Crud_Model

