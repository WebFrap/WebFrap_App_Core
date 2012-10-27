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
class WbfsysRoleGroup_Crud_Model
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
   * @return WbfsysRoleGroup_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_role_group', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysRoleGroup', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysRoleGroup', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysRoleGroup', $accessKey );
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
      $this->setEntityWbfsysRoleGroup( $entity );
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
            'resource'  => $response->i18n->l( 'User Roles', 'wbfsys.role_group.label' ),
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
  * @return WbfsysRoleGroup_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysRoleGroup( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysRoleGroup_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysRoleGroup( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysRoleGroup_Entity
  */
  public function getEntityWbfsysRoleGroup( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysRoleGroup = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysRoleGroup = $this->getRegisterd( 'entityWbfsysRoleGroup' );

    //entity wbfsys_role_group
    if( !$entityWbfsysRoleGroup )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysRoleGroup = $orm->get( 'WbfsysRoleGroup', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysrolegroup with this id '.$objid,
              'wbfsys.role_group.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysRoleGroup', $entityWbfsysRoleGroup );
        $this->register( 'main_entity', $entityWbfsysRoleGroup);

      }
      else
      {
        $entityWbfsysRoleGroup   = new WbfsysRoleGroup_Entity() ;
        $this->register( 'entityWbfsysRoleGroup', $entityWbfsysRoleGroup );
        $this->register( 'main_entity', $entityWbfsysRoleGroup);
      }

    }
    elseif( $objid && $objid != $entityWbfsysRoleGroup->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysRoleGroup = $orm->get( 'WbfsysRoleGroup', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysrolegroup with this id '.$objid,
            'wbfsys.role_group.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysRoleGroup', $entityWbfsysRoleGroup);
      $this->register( 'main_entity', $entityWbfsysRoleGroup);
    }

    return $entityWbfsysRoleGroup;

  }//end public function getEntityWbfsysRoleGroup */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysRoleGroup_Entity $entity
  */
  public function setEntityWbfsysRoleGroup( $entity )
  {

    $this->register( 'entityWbfsysRoleGroup', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysRoleGroup */

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
      if( !$entityWbfsysRoleGroup = $this->getRegisterd( 'entityWbfsysRoleGroup' ) )
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
            array( 'key' => 'entityWbfsysRoleGroup' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysRoleGroup ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysRoleGroup->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create User Roles {@label@}',
            'wbfsys.role_group.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysRoleGroup->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created User Roles {@label@}',
            'wbfsys.role_group.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New User Roles: '.$entityText,
          'create',
          $entityWbfsysRoleGroup
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysRoleGroup );
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
      if( !$entityWbfsysRoleGroup = $this->getRegisterd( 'entityWbfsysRoleGroup' ) )
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
            array( 'key' => 'entityWbfsysRoleGroup' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysRoleGroup ) )
      {
        $entityText = $entityWbfsysRoleGroup->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update User Roles {@label@}',
            'wbfsys.role_group.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysRoleGroup->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated User Roles {@label@}',
            'wbfsys.role_group.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited User Roles: '.$entityText,
          'edit',
          $entityWbfsysRoleGroup
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysRoleGroup );

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
   * @param WbfsysRoleGroup_Entity $entityWbfsysRoleGroup
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysRoleGroup, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysRoleGroup->getId();
    
    $entityText = $entityWbfsysRoleGroup->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysRoleGroup );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted User Roles {@label@}',
          'wbfsys.role_group.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted User Roles: '.$entityText,
          'delete',
          array( 'WbfsysRoleGroup', $delId )
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


      //management  wbfsys_role_group source wbfsys_role_group
      $entityWbfsysRoleGroup = $orm->newEntity( 'WbfsysRoleGroup' );

      if( !$params->fieldsWbfsysRoleGroup )
      {
        if( isset( $fields['wbfsys_role_group'] )  )
          $params->fieldsWbfsysRoleGroup  = $fields['wbfsys_role_group'];
        else
          $params->fieldsWbfsysRoleGroup  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysRoleGroup,
        'wbfsys_role_group',
        $params->fieldsWbfsysRoleGroup
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysRoleGroup', $entityWbfsysRoleGroup );
      $this->register( 'main_entity', $entityWbfsysRoleGroup );

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
   * @param WbfsysRoleGroup_Entity $entityWbfsysRoleGroup
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysRoleGroup, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysRoleGroup
    if( !$params->fieldsWbfsysRoleGroup )
    {
      if( isset( $fields['wbfsys_role_group'] ) )
        $params->fieldsWbfsysRoleGroup = $fields['wbfsys_role_group'];
      else
        $params->fieldsWbfsysRoleGroup = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysRoleGroup,
      'wbfsys_role_group',
      $params->fieldsWbfsysRoleGroup
    );
    $this->register( 'entityWbfsysRoleGroup', $entityWbfsysRoleGroup );
    $this->register( 'main_entity', $entityWbfsysRoleGroup );



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
      $entityWbfsysRoleGroup = new WbfsysRoleGroup_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysRoleGroup = $orm->get( 'WbfsysRoleGroup',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no User Roles with the id: {@id@}',
            'wbfsys.role_group.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysRoleGroup = new WbfsysRoleGroup_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysRoleGroup )
      $params->fieldsWbfsysRoleGroup  = $entityWbfsysRoleGroup->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysRoleGroup,
      'wbfsys_role_group',
      $params->fieldsWbfsysRoleGroup
    );
    $this->register( 'entityWbfsysRoleGroup', $entityWbfsysRoleGroup );

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
      'wbfsys_role_group' => array
      (
        'm_parent',
        'name',
        'access_key',
        'id_mandant',
        'id_type',
        'level',
        'system',
        'id_module',
        'revision',
        'flag_core',
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
    $saveFields['wbfsys_role_group'] = array();
    $saveFields['wbfsys_role_group'][] = 'm_parent';
        $saveFields['wbfsys_role_group'][] = 'name';
        $saveFields['wbfsys_role_group'][] = 'access_key';
        $saveFields['wbfsys_role_group'][] = 'id_mandant';
        $saveFields['wbfsys_role_group'][] = 'id_type';
        $saveFields['wbfsys_role_group'][] = 'level';
        $saveFields['wbfsys_role_group'][] = 'system';
        $saveFields['wbfsys_role_group'][] = 'id_module';
        $saveFields['wbfsys_role_group'][] = 'revision';
        $saveFields['wbfsys_role_group'][] = 'flag_core';
        $saveFields['wbfsys_role_group'][] = 'description';
        $saveFields['wbfsys_role_group'][] = 'm_version';
    
    
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
      'wbfsys_role_group' => array
      (
        'm_parent',
        'name',
        'access_key',
        'id_mandant',
        'id_type',
        'level',
        'system',
        'id_module',
        'revision',
        'flag_core',
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
    $saveFields['wbfsys_role_group'] = array();
    $saveFields['wbfsys_role_group'][] = 'm_parent';
        $saveFields['wbfsys_role_group'][] = 'name';
        $saveFields['wbfsys_role_group'][] = 'access_key';
        $saveFields['wbfsys_role_group'][] = 'id_mandant';
        $saveFields['wbfsys_role_group'][] = 'id_type';
        $saveFields['wbfsys_role_group'][] = 'level';
        $saveFields['wbfsys_role_group'][] = 'system';
        $saveFields['wbfsys_role_group'][] = 'id_module';
        $saveFields['wbfsys_role_group'][] = 'revision';
        $saveFields['wbfsys_role_group'][] = 'flag_core';
        $saveFields['wbfsys_role_group'][] = 'description';
        $saveFields['wbfsys_role_group'][] = 'm_version';
    
    
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

}//end WbfsysRoleGroup_Crud_Model

