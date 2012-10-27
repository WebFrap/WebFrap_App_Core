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
class WbfsysRoleUserMaskEmployee_Crud_Model
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
   * @return WbfsysRoleUser_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_role_user_mask_employee', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysRoleUser', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysRoleUser', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysRoleUser', $accessKey );
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
      $this->setEntityWbfsysRoleUserMaskEmployee( $entity );
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
            'resource'  => $response->i18n->l( 'Employee', 'wbfsys.role_user_mask_employee.label' ),
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
  * @return WbfsysRoleUser_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysRoleUserMaskEmployee( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysRoleUser_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysRoleUserMaskEmployee( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysRoleUser_Entity
  */
  public function getEntityWbfsysRoleUserMaskEmployee( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysRoleUserMaskEmployee = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysRoleUserMaskEmployee = $this->getRegisterd( 'entityWbfsysRoleUserMaskEmployee' );

    //entity wbfsys_role_user
    if( !$entityWbfsysRoleUserMaskEmployee )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysRoleUserMaskEmployee = $orm->get( 'WbfsysRoleUser', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysroleuser with this id '.$objid,
              'wbfsys.role_user_mask_employee.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysRoleUserMaskEmployee', $entityWbfsysRoleUserMaskEmployee );
        $this->register( 'main_entity', $entityWbfsysRoleUserMaskEmployee);

      }
      else
      {
        $entityWbfsysRoleUserMaskEmployee   = new WbfsysRoleUser_Entity() ;
        $this->register( 'entityWbfsysRoleUserMaskEmployee', $entityWbfsysRoleUserMaskEmployee );
        $this->register( 'main_entity', $entityWbfsysRoleUserMaskEmployee);
      }

    }
    elseif( $objid && $objid != $entityWbfsysRoleUserMaskEmployee->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysRoleUserMaskEmployee = $orm->get( 'WbfsysRoleUser', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysroleuser with this id '.$objid,
            'wbfsys.role_user_mask_employee.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysRoleUserMaskEmployee', $entityWbfsysRoleUserMaskEmployee);
      $this->register( 'main_entity', $entityWbfsysRoleUserMaskEmployee);
    }

    return $entityWbfsysRoleUserMaskEmployee;

  }//end public function getEntityWbfsysRoleUserMaskEmployee */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysRoleUser_Entity $entity
  */
  public function setEntityWbfsysRoleUserMaskEmployee( $entity )
  {

    $this->register( 'entityWbfsysRoleUserMaskEmployee', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysRoleUserMaskEmployee */

  /**
  * returns the activ entity with data, or creates a empty one
  * and returns it instead
  *
  * @return EmbedPerson_Entity
  */
  public function getEntityEmbedPerson( $mainEntity = null )
  {

    $response = $this->getResponse();

    $objid = null;

    if( !is_null($mainEntity) )
      $objid = $mainEntity->id_person;

    $entityEmbedPerson = $this->getRegisterd( 'entityEmbedPerson' );

    //entity wbfsys_role_user
    if( !$entityEmbedPerson )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityEmbedPerson = $orm->get( 'CorePerson', $objid) )
        {
          $response->addWarning
          (
            $response->i18n->l
            (
              'Missing the reference dataset coreperson with the id '.$objid,
              'wbfsys.role_user_mask_employee.message'
            )
          );

          $entityEmbedPerson = new CorePerson_Entity;

          $entityEmbedPerson->setId( $objid, true );
          $orm->insert( $entityEmbedPerson, array(), false );

        }
        $this->register( 'entityEmbedPerson', $entityEmbedPerson );
      }
      else
      {
        $entityEmbedPerson   = new CorePerson_Entity() ;
        $this->register( 'entityEmbedPerson', $entityEmbedPerson );
      }

    }
    elseif( $objid  && $objid != $entityEmbedPerson->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityEmbedPerson = $orm->get( 'CorePerson', $objid) )
      {
        $this->getResponse()->addError
        (
          $response->i18n->l
          (
            'Missing the reference dataset coreperson with the id '.$objid,
            'wbfsys.role_user_mask_employee.message'
          )
        );

        $entityEmbedPerson = new CorePerson_Entity;

        $entityEmbedPerson->setId( $objid, true );
        $orm->insert( $entityEmbedPerson );
      }

      $this->register( 'entityEmbedPerson', $entityEmbedPerson );
    }

    return $entityEmbedPerson;

  }//end public function getEntityEmbedPerson */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param EntityEmbedPerson $entity
  */
  public function setEntityEmbedPerson( $entity )
  {

    $this->register( 'entityEmbedPerson', $entity );

  }//end public function setEntityEmbedPerson */

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
      if( !$entityWbfsysRoleUserMaskEmployee = $this->getRegisterd( 'entityWbfsysRoleUserMaskEmployee' ) )
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
            array( 'key' => 'entityWbfsysRoleUserMaskEmployee' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysRoleUserMaskEmployee ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysRoleUserMaskEmployee->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create Employee {@label@}',
            'wbfsys.role_user_mask_employee.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysRoleUserMaskEmployee->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created Employee {@label@}',
            'wbfsys.role_user_mask_employee.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New Employee: '.$entityText,
          'create',
          $entityWbfsysRoleUserMaskEmployee
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysRoleUserMaskEmployee );
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
      if( !$entityWbfsysRoleUserMaskEmployee = $this->getRegisterd( 'entityWbfsysRoleUserMaskEmployee' ) )
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
            array( 'key' => 'entityWbfsysRoleUserMaskEmployee' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysRoleUserMaskEmployee ) )
      {
        $entityText = $entityWbfsysRoleUserMaskEmployee->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update Employee {@label@}',
            'wbfsys.role_user_mask_employee.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysRoleUserMaskEmployee->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated Employee {@label@}',
            'wbfsys.role_user_mask_employee.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited Employee: '.$entityText,
          'edit',
          $entityWbfsysRoleUserMaskEmployee
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysRoleUserMaskEmployee );

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
   * @param WbfsysRoleUser_Entity $entityWbfsysRoleUserMaskEmployee
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysRoleUserMaskEmployee, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysRoleUserMaskEmployee->getId();
    
    $entityText = $entityWbfsysRoleUserMaskEmployee->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysRoleUserMaskEmployee );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Employee {@label@}',
          'wbfsys.role_user_mask_employee.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted Employee: '.$entityText,
          'delete',
          array( 'WbfsysRoleUser', $delId )
        );

    
    // Alle Assignments des Users entfernen
    $this->getAcl()->getManager()->cleanUserRelations( $delId );
    
      
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


      //management  wbfsys_role_user_mask_employee source wbfsys_role_user
      $entityWbfsysRoleUserMaskEmployee = $orm->newEntity( 'WbfsysRoleUser' );

      if( !$params->fieldsWbfsysRoleUserMaskEmployee )
      {
        if( isset( $fields['wbfsys_role_user_mask_employee'] )  )
          $params->fieldsWbfsysRoleUserMaskEmployee  = $fields['wbfsys_role_user_mask_employee'];
        else
          $params->fieldsWbfsysRoleUserMaskEmployee  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysRoleUserMaskEmployee,
        'wbfsys_role_user_mask_employee',
        $params->fieldsWbfsysRoleUserMaskEmployee
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysRoleUserMaskEmployee', $entityWbfsysRoleUserMaskEmployee );
      $this->register( 'main_entity', $entityWbfsysRoleUserMaskEmployee );

      //entity core_person
      if( $idEmbedPerson = $this->request->data( 'embed_person', Validator::EID, 'rowid' ) )
      {
        $entityEmbedPerson   = $orm->get( 'CorePerson', $idEmbedPerson );
      }
      else
      {
        $entityEmbedPerson   = $orm->newEntity( 'CorePerson' );
      }

      if( !$params->fieldsEmbedPerson )
      {
        if( isset( $fields['embed_person'] ) )
          $params->fieldsEmbedPerson  = $fields['embed_person'];
        else
          $params->fieldsEmbedPerson  = array();
      }


      // if we have an id this dataset has to be updated
      if( $idEmbedPerson )
      {
        // if the validation fails report
        $httpRequest->validateUpdate
        (
          $entityEmbedPerson,
          'embed_person',
          $params->fieldsEmbedPerson
        );
      }
      else // else we have to create a new one
      {
        // if the validation fails report
        $httpRequest->validateInsert
        (
          $entityEmbedPerson,
          'embed_person',
          $params->fieldsEmbedPerson
        );
      }

      // register the entity in the model registry
      $this->register('entityEmbedPerson',$entityEmbedPerson);

     $entityWbfsysRoleUserMaskEmployee->id_person = $entityEmbedPerson; //src is saved after target

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
   * @param WbfsysRoleUserMaskEmployee_Entity $entityWbfsysRoleUserMaskEmployee
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysRoleUserMaskEmployee, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysRoleUser
    if( !$params->fieldsWbfsysRoleUserMaskEmployee )
    {
      if( isset( $fields['wbfsys_role_user_mask_employee'] ) )
        $params->fieldsWbfsysRoleUserMaskEmployee = $fields['wbfsys_role_user_mask_employee'];
      else
        $params->fieldsWbfsysRoleUserMaskEmployee = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysRoleUserMaskEmployee,
      'wbfsys_role_user_mask_employee',
      $params->fieldsWbfsysRoleUserMaskEmployee
    );
    $this->register( 'entityWbfsysRoleUserMaskEmployee', $entityWbfsysRoleUserMaskEmployee );
    $this->register( 'main_entity', $entityWbfsysRoleUserMaskEmployee );

    if( !$idEmbedPerson = $httpRequest->data( 'embed_person', Validator::EID, 'rowid' ) )
      $idEmbedPerson = $entityWbfsysRoleUserMaskEmployee->id_person;

    //entity CorePerson
    if( !$idEmbedPerson )
    {
      $entityEmbedPerson = new CorePerson_Entity;
    }
    else
    {
      $entityEmbedPerson = $orm->get( 'CorePerson', $idEmbedPerson );
    }

    if( !$params->fieldsEmbedPerson )
    {
      if( isset( $fields['embed_person'] ) )
        $params->fieldsEmbedPerson = $fields['embed_person'];
      else
        $params->fieldsEmbedPerson = array();
    }

    if( $idEmbedPerson )
    {
      $httpRequest->validateUpdate
      (
        $entityEmbedPerson,
        'embed_person',
        $params->fieldsEmbedPerson
      );
    }
    else
    {
      $httpRequest->validateInsert
      (
        $entityEmbedPerson,
        'embed_person',
        $params->fieldsEmbedPerson
      );
    }

    $this->register( 'entityEmbedPerson', $entityEmbedPerson );
    $entityWbfsysRoleUserMaskEmployee->id_person = $entityEmbedPerson; //src is saved after target


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
      $entityWbfsysRoleUserMaskEmployee = new WbfsysRoleUser_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysRoleUserMaskEmployee = $orm->get( 'WbfsysRoleUser',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no Employee with the id: {@id@}',
            'wbfsys.role_user_mask_employee.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysRoleUserMaskEmployee = new WbfsysRoleUser_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysRoleUserMaskEmployee )
      $params->fieldsWbfsysRoleUserMaskEmployee  = $entityWbfsysRoleUserMaskEmployee->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysRoleUserMaskEmployee,
      'wbfsys_role_user_mask_employee',
      $params->fieldsWbfsysRoleUserMaskEmployee
    );
    $this->register( 'entityWbfsysRoleUserMaskEmployee', $entityWbfsysRoleUserMaskEmployee );

    return !$response->hasErrors();

  }//end public function fetchPostData */

  /**
   * de:
   * datenquelle für einen autocomplete request
   * @param string $key
   * @param TArray $params
   */
  public function getAutolistByKey( $key, $params )
  {

    $db     = $this->getDb();
    $query  = $db->newQuery( 'WbfsysRoleUserMaskEmployee' );
    /* @var $query WbfsysRoleUserMaskEmployee_Query  */

    $query->fetchAutocomplete
    (
      $key,
      $params
    );

    return $query->getAll();

  }//end public function getAutolistByKey */

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
      'wbfsys_role_user_mask_employee' => array
      (
        'name',
        'id_person',
        'id_mandant',
        'm_version',
        'password',
        'level',
        'profile',
        'description',
      ),
      'embed_person' => array
      (
        'firstname',
        'lastname',
        'academic_title',
        'noblesse_title',
        'm_version',
        'photo',
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
    $saveFields['wbfsys_role_user_mask_employee'] = array();
    $saveFields['wbfsys_role_user_mask_employee'][] = 'name';
        $saveFields['wbfsys_role_user_mask_employee'][] = 'id_person';
        $saveFields['wbfsys_role_user_mask_employee'][] = 'id_mandant';
        $saveFields['wbfsys_role_user_mask_employee'][] = 'm_version';
        $saveFields['wbfsys_role_user_mask_employee'][] = 'password';
        $saveFields['wbfsys_role_user_mask_employee'][] = 'level';
        $saveFields['wbfsys_role_user_mask_employee'][] = 'profile';
        $saveFields['wbfsys_role_user_mask_employee'][] = 'description';
        $saveFields['embed_person'] = array();
    $saveFields['embed_person'][] = 'firstname';
        $saveFields['embed_person'][] = 'lastname';
        $saveFields['embed_person'][] = 'academic_title';
        $saveFields['embed_person'][] = 'noblesse_title';
        $saveFields['embed_person'][] = 'm_version';
        $saveFields['embed_person'][] = 'photo';
    
    
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
      'wbfsys_role_user_mask_employee' => array
      (
        'name',
        'id_person',
        'id_mandant',
        'rowid',
        'm_time_created',
        'm_role_create',
        'm_time_changed',
        'm_role_change',
        'm_version',
        'm_uuid',
        'password',
        'profile',
        'level',
        'description',
      ),
      'embed_person' => array
      (
        'firstname',
        'lastname',
        'academic_title',
        'noblesse_title',
        'rowid',
        'm_time_created',
        'm_role_create',
        'm_time_changed',
        'm_role_change',
        'm_version',
        'm_uuid',
        'photo',
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
    $saveFields['wbfsys_role_user_mask_employee'] = array();
    $saveFields['wbfsys_role_user_mask_employee'][] = 'name';
        $saveFields['wbfsys_role_user_mask_employee'][] = 'id_person';
        $saveFields['wbfsys_role_user_mask_employee'][] = 'id_mandant';
        $saveFields['wbfsys_role_user_mask_employee'][] = 'm_version';
        $saveFields['wbfsys_role_user_mask_employee'][] = 'password';
        $saveFields['wbfsys_role_user_mask_employee'][] = 'profile';
        $saveFields['wbfsys_role_user_mask_employee'][] = 'level';
        $saveFields['wbfsys_role_user_mask_employee'][] = 'description';
        $saveFields['embed_person'] = array();
    $saveFields['embed_person'][] = 'firstname';
        $saveFields['embed_person'][] = 'lastname';
        $saveFields['embed_person'][] = 'academic_title';
        $saveFields['embed_person'][] = 'noblesse_title';
        $saveFields['embed_person'][] = 'm_version';
        $saveFields['embed_person'][] = 'photo';
    
    
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

}//end WbfsysRoleUserMaskEmployee_Crud_Model

