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
class WbfsysEntityRole_Crud_Model
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
   * @return WbfsysEntityRole_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_entity_role', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysEntityRole', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysEntityRole', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysEntityRole', $accessKey );
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
      $this->setEntityWbfsysEntityRole( $entity );
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
            'resource'  => $response->i18n->l( 'Entity Role', 'wbfsys.entity_role.label' ),
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
  * @return WbfsysEntityRole_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityRole( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysEntityRole_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityRole( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityRole_Entity
  */
  public function getEntityWbfsysEntityRole( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysEntityRole = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntityRole = $this->getRegisterd( 'entityWbfsysEntityRole' );

    //entity wbfsys_entity_role
    if( !$entityWbfsysEntityRole )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntityRole = $orm->get( 'WbfsysEntityRole', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentityrole with this id '.$objid,
              'wbfsys.entity_role.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntityRole', $entityWbfsysEntityRole );
        $this->register( 'main_entity', $entityWbfsysEntityRole);

      }
      else
      {
        $entityWbfsysEntityRole   = new WbfsysEntityRole_Entity() ;
        $this->register( 'entityWbfsysEntityRole', $entityWbfsysEntityRole );
        $this->register( 'main_entity', $entityWbfsysEntityRole);
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntityRole->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntityRole = $orm->get( 'WbfsysEntityRole', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentityrole with this id '.$objid,
            'wbfsys.entity_role.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntityRole', $entityWbfsysEntityRole);
      $this->register( 'main_entity', $entityWbfsysEntityRole);
    }

    return $entityWbfsysEntityRole;

  }//end public function getEntityWbfsysEntityRole */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityRole_Entity $entity
  */
  public function setEntityWbfsysEntityRole( $entity )
  {

    $this->register( 'entityWbfsysEntityRole', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntityRole */

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
      if( !$entityWbfsysEntityRole = $this->getRegisterd( 'entityWbfsysEntityRole' ) )
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
            array( 'key' => 'entityWbfsysEntityRole' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysEntityRole ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysEntityRole->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create Entity Role {@label@}',
            'wbfsys.entity_role.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysEntityRole->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created Entity Role {@label@}',
            'wbfsys.entity_role.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New Entity Role: '.$entityText,
          'create',
          $entityWbfsysEntityRole
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysEntityRole );
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
      if( !$entityWbfsysEntityRole = $this->getRegisterd( 'entityWbfsysEntityRole' ) )
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
            array( 'key' => 'entityWbfsysEntityRole' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysEntityRole ) )
      {
        $entityText = $entityWbfsysEntityRole->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update Entity Role {@label@}',
            'wbfsys.entity_role.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysEntityRole->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated Entity Role {@label@}',
            'wbfsys.entity_role.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited Entity Role: '.$entityText,
          'edit',
          $entityWbfsysEntityRole
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysEntityRole );

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
   * @param WbfsysEntityRole_Entity $entityWbfsysEntityRole
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysEntityRole, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysEntityRole->getId();
    
    $entityText = $entityWbfsysEntityRole->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysEntityRole );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Entity Role {@label@}',
          'wbfsys.entity_role.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted Entity Role: '.$entityText,
          'delete',
          array( 'WbfsysEntityRole', $delId )
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


      //management  wbfsys_entity_role source wbfsys_entity_role
      $entityWbfsysEntityRole = $orm->newEntity( 'WbfsysEntityRole' );

      if( !$params->fieldsWbfsysEntityRole )
      {
        if( isset( $fields['wbfsys_entity_role'] )  )
          $params->fieldsWbfsysEntityRole  = $fields['wbfsys_entity_role'];
        else
          $params->fieldsWbfsysEntityRole  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysEntityRole,
        'wbfsys_entity_role',
        $params->fieldsWbfsysEntityRole
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysEntityRole', $entityWbfsysEntityRole );
      $this->register( 'main_entity', $entityWbfsysEntityRole );

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
   * @param WbfsysEntityRole_Entity $entityWbfsysEntityRole
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysEntityRole, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysEntityRole
    if( !$params->fieldsWbfsysEntityRole )
    {
      if( isset( $fields['wbfsys_entity_role'] ) )
        $params->fieldsWbfsysEntityRole = $fields['wbfsys_entity_role'];
      else
        $params->fieldsWbfsysEntityRole = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysEntityRole,
      'wbfsys_entity_role',
      $params->fieldsWbfsysEntityRole
    );
    $this->register( 'entityWbfsysEntityRole', $entityWbfsysEntityRole );
    $this->register( 'main_entity', $entityWbfsysEntityRole );



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
      $entityWbfsysEntityRole = new WbfsysEntityRole_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysEntityRole = $orm->get( 'WbfsysEntityRole',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no Entity Role with the id: {@id@}',
            'wbfsys.entity_role.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysEntityRole = new WbfsysEntityRole_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysEntityRole )
      $params->fieldsWbfsysEntityRole  = $entityWbfsysEntityRole->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysEntityRole,
      'wbfsys_entity_role',
      $params->fieldsWbfsysEntityRole
    );
    $this->register( 'entityWbfsysEntityRole', $entityWbfsysEntityRole );

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
      'wbfsys_entity_role' => array
      (
        'vid',
        'id_entity',
        'id_role',
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
    $saveFields['wbfsys_entity_role'] = array();
    $saveFields['wbfsys_entity_role'][] = 'vid';
        $saveFields['wbfsys_entity_role'][] = 'id_entity';
        $saveFields['wbfsys_entity_role'][] = 'id_role';
        $saveFields['wbfsys_entity_role'][] = 'm_version';
    
    
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
      'wbfsys_entity_role' => array
      (
        'vid',
        'id_entity',
        'id_role',
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
    $saveFields['wbfsys_entity_role'] = array();
    $saveFields['wbfsys_entity_role'][] = 'vid';
        $saveFields['wbfsys_entity_role'][] = 'id_entity';
        $saveFields['wbfsys_entity_role'][] = 'id_role';
        $saveFields['wbfsys_entity_role'][] = 'm_version';
    
    
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

}//end WbfsysEntityRole_Crud_Model

