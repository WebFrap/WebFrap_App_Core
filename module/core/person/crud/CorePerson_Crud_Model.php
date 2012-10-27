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
 * @subpackage ModCore
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CorePerson_Crud_Model
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
   * @return CorePerson_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'core_person', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'CorePerson', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'CorePerson', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'CorePerson', $accessKey );
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
      $this->setEntityCorePerson( $entity );
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
            'resource'  => $response->i18n->l( 'Person', 'core.person.label' ),
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
  * @return CorePerson_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityCorePerson( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param CorePerson_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityCorePerson( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return CorePerson_Entity
  */
  public function getEntityCorePerson( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityCorePerson = $this->getRegisterd( 'main_entity' ) )
      $entityCorePerson = $this->getRegisterd( 'entityCorePerson' );

    //entity core_person
    if( !$entityCorePerson )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityCorePerson = $orm->get( 'CorePerson', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no coreperson with this id '.$objid,
              'core.person.message'
            )
          );
          return null;
        }

        $this->register( 'entityCorePerson', $entityCorePerson );
        $this->register( 'main_entity', $entityCorePerson);

      }
      else
      {
        $entityCorePerson   = new CorePerson_Entity() ;
        $this->register( 'entityCorePerson', $entityCorePerson );
        $this->register( 'main_entity', $entityCorePerson);
      }

    }
    elseif( $objid && $objid != $entityCorePerson->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityCorePerson = $orm->get( 'CorePerson', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no coreperson with this id '.$objid,
            'core.person.message'
          )
        );
        return null;
      }

      $this->register( 'entityCorePerson', $entityCorePerson);
      $this->register( 'main_entity', $entityCorePerson);
    }

    return $entityCorePerson;

  }//end public function getEntityCorePerson */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param CorePerson_Entity $entity
  */
  public function setEntityCorePerson( $entity )
  {

    $this->register( 'entityCorePerson', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityCorePerson */

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
      if( !$entityCorePerson = $this->getRegisterd( 'entityCorePerson' ) )
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
            array( 'key' => 'entityCorePerson' )
          )
        );
      }


      if( !$orm->insert( $entityCorePerson ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityCorePerson->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create Person {@label@}',
            'core.person.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityCorePerson->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created Person {@label@}',
            'core.person.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New Person: '.$entityText,
          'create',
          $entityCorePerson
        );



        if( $saveSrc )
          $orm->update( $entityCorePerson );
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
      if( !$entityCorePerson = $this->getRegisterd( 'entityCorePerson' ) )
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
            array( 'key' => 'entityCorePerson' )
          )
        );
      }


      if( !$orm->update( $entityCorePerson ) )
      {
        $entityText = $entityCorePerson->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update Person {@label@}',
            'core.person.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityCorePerson->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated Person {@label@}',
            'core.person.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited Person: '.$entityText,
          'edit',
          $entityCorePerson
        );



        if( $saveSrc )
          $orm->update( $entityCorePerson );

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
   * @param CorePerson_Entity $entityCorePerson
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityCorePerson, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityCorePerson->getId();
    
    $entityText = $entityCorePerson->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityCorePerson );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Person {@label@}',
          'core.person.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted Person: '.$entityText,
          'delete',
          array( 'CorePerson', $delId )
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


      //management  core_person source core_person
      $entityCorePerson = $orm->newEntity( 'CorePerson' );

      if( !$params->fieldsCorePerson )
      {
        if( isset( $fields['core_person'] )  )
          $params->fieldsCorePerson  = $fields['core_person'];
        else
          $params->fieldsCorePerson  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityCorePerson,
        'core_person',
        $params->fieldsCorePerson
      );

      // register the entity in the mode registry
      $this->register( 'entityCorePerson', $entityCorePerson );
      $this->register( 'main_entity', $entityCorePerson );

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
   * @param CorePerson_Entity $entityCorePerson
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityCorePerson, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity CorePerson
    if( !$params->fieldsCorePerson )
    {
      if( isset( $fields['core_person'] ) )
        $params->fieldsCorePerson = $fields['core_person'];
      else
        $params->fieldsCorePerson = array();
    }

    $httpRequest->validateUpdate
    (
      $entityCorePerson,
      'core_person',
      $params->fieldsCorePerson
    );
    $this->register( 'entityCorePerson', $entityCorePerson );
    $this->register( 'main_entity', $entityCorePerson );



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
      $entityCorePerson = new CorePerson_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityCorePerson = $orm->get( 'CorePerson',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no Person with the id: {@id@}',
            'core.person.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityCorePerson = new CorePerson_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsCorePerson )
      $params->fieldsCorePerson  = $entityCorePerson->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityCorePerson,
      'core_person',
      $params->fieldsCorePerson
    );
    $this->register( 'entityCorePerson', $entityCorePerson );

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
      'core_person' => array
      (
        'firstname',
        'lastname',
        'm_version',
        'academic_title',
        'noblesse_title',
        'photo',
        'birthday',
        'birth_city',
        'id_nationality',
        'id_preflang',
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
    $saveFields['core_person'] = array();
    $saveFields['core_person'][] = 'firstname';
        $saveFields['core_person'][] = 'lastname';
        $saveFields['core_person'][] = 'm_version';
        $saveFields['core_person'][] = 'academic_title';
        $saveFields['core_person'][] = 'noblesse_title';
        $saveFields['core_person'][] = 'photo';
        $saveFields['core_person'][] = 'birthday';
        $saveFields['core_person'][] = 'birth_city';
        $saveFields['core_person'][] = 'id_nationality';
        $saveFields['core_person'][] = 'id_preflang';
    
    
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
      'core_person' => array
      (
        'firstname',
        'lastname',
        'rowid',
        'm_time_created',
        'm_role_create',
        'm_time_changed',
        'm_role_change',
        'm_version',
        'm_uuid',
        'academic_title',
        'noblesse_title',
        'photo',
        'birthday',
        'birth_city',
        'id_nationality',
        'id_preflang',
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
    $saveFields['core_person'] = array();
    $saveFields['core_person'][] = 'firstname';
        $saveFields['core_person'][] = 'lastname';
        $saveFields['core_person'][] = 'm_version';
        $saveFields['core_person'][] = 'academic_title';
        $saveFields['core_person'][] = 'noblesse_title';
        $saveFields['core_person'][] = 'photo';
        $saveFields['core_person'][] = 'birthday';
        $saveFields['core_person'][] = 'birth_city';
        $saveFields['core_person'][] = 'id_nationality';
        $saveFields['core_person'][] = 'id_preflang';
    
    
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

}//end CorePerson_Crud_Model

