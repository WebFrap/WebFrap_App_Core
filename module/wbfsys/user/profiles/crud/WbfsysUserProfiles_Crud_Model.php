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
class WbfsysUserProfiles_Crud_Model
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
   * @return WbfsysUserProfiles_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_user_profiles', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysUserProfiles', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysUserProfiles', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysUserProfiles', $accessKey );
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
      $this->setEntityWbfsysUserProfiles( $entity );
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
            'resource'  => $response->i18n->l( 'User Profiles', 'wbfsys.user_profiles.label' ),
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
  * @return WbfsysUserProfiles_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysUserProfiles( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysUserProfiles_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysUserProfiles( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysUserProfiles_Entity
  */
  public function getEntityWbfsysUserProfiles( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysUserProfiles = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysUserProfiles = $this->getRegisterd( 'entityWbfsysUserProfiles' );

    //entity wbfsys_user_profiles
    if( !$entityWbfsysUserProfiles )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysUserProfiles = $orm->get( 'WbfsysUserProfiles', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysuserprofiles with this id '.$objid,
              'wbfsys.user_profiles.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysUserProfiles', $entityWbfsysUserProfiles );
        $this->register( 'main_entity', $entityWbfsysUserProfiles);

      }
      else
      {
        $entityWbfsysUserProfiles   = new WbfsysUserProfiles_Entity() ;
        $this->register( 'entityWbfsysUserProfiles', $entityWbfsysUserProfiles );
        $this->register( 'main_entity', $entityWbfsysUserProfiles);
      }

    }
    elseif( $objid && $objid != $entityWbfsysUserProfiles->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysUserProfiles = $orm->get( 'WbfsysUserProfiles', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysuserprofiles with this id '.$objid,
            'wbfsys.user_profiles.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysUserProfiles', $entityWbfsysUserProfiles);
      $this->register( 'main_entity', $entityWbfsysUserProfiles);
    }

    return $entityWbfsysUserProfiles;

  }//end public function getEntityWbfsysUserProfiles */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysUserProfiles_Entity $entity
  */
  public function setEntityWbfsysUserProfiles( $entity )
  {

    $this->register( 'entityWbfsysUserProfiles', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysUserProfiles */

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
      if( !$entityWbfsysUserProfiles = $this->getRegisterd( 'entityWbfsysUserProfiles' ) )
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
            array( 'key' => 'entityWbfsysUserProfiles' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysUserProfiles ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysUserProfiles->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create User Profiles {@label@}',
            'wbfsys.user_profiles.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysUserProfiles->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created User Profiles {@label@}',
            'wbfsys.user_profiles.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New User Profiles: '.$entityText,
          'create',
          $entityWbfsysUserProfiles
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysUserProfiles );
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
      if( !$entityWbfsysUserProfiles = $this->getRegisterd( 'entityWbfsysUserProfiles' ) )
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
            array( 'key' => 'entityWbfsysUserProfiles' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysUserProfiles ) )
      {
        $entityText = $entityWbfsysUserProfiles->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update User Profiles {@label@}',
            'wbfsys.user_profiles.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysUserProfiles->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated User Profiles {@label@}',
            'wbfsys.user_profiles.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited User Profiles: '.$entityText,
          'edit',
          $entityWbfsysUserProfiles
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysUserProfiles );

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
   * @param WbfsysUserProfiles_Entity $entityWbfsysUserProfiles
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysUserProfiles, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysUserProfiles->getId();
    
    $entityText = $entityWbfsysUserProfiles->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysUserProfiles );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted User Profiles {@label@}',
          'wbfsys.user_profiles.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted User Profiles: '.$entityText,
          'delete',
          array( 'WbfsysUserProfiles', $delId )
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


      //management  wbfsys_user_profiles source wbfsys_user_profiles
      $entityWbfsysUserProfiles = $orm->newEntity( 'WbfsysUserProfiles' );

      if( !$params->fieldsWbfsysUserProfiles )
      {
        if( isset( $fields['wbfsys_user_profiles'] )  )
          $params->fieldsWbfsysUserProfiles  = $fields['wbfsys_user_profiles'];
        else
          $params->fieldsWbfsysUserProfiles  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysUserProfiles,
        'wbfsys_user_profiles',
        $params->fieldsWbfsysUserProfiles
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysUserProfiles', $entityWbfsysUserProfiles );
      $this->register( 'main_entity', $entityWbfsysUserProfiles );

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
   * @param WbfsysUserProfiles_Entity $entityWbfsysUserProfiles
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysUserProfiles, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysUserProfiles
    if( !$params->fieldsWbfsysUserProfiles )
    {
      if( isset( $fields['wbfsys_user_profiles'] ) )
        $params->fieldsWbfsysUserProfiles = $fields['wbfsys_user_profiles'];
      else
        $params->fieldsWbfsysUserProfiles = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysUserProfiles,
      'wbfsys_user_profiles',
      $params->fieldsWbfsysUserProfiles
    );
    $this->register( 'entityWbfsysUserProfiles', $entityWbfsysUserProfiles );
    $this->register( 'main_entity', $entityWbfsysUserProfiles );



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
      $entityWbfsysUserProfiles = new WbfsysUserProfiles_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysUserProfiles = $orm->get( 'WbfsysUserProfiles',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no User Profiles with the id: {@id@}',
            'wbfsys.user_profiles.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysUserProfiles = new WbfsysUserProfiles_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysUserProfiles )
      $params->fieldsWbfsysUserProfiles  = $entityWbfsysUserProfiles->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysUserProfiles,
      'wbfsys_user_profiles',
      $params->fieldsWbfsysUserProfiles
    );
    $this->register( 'entityWbfsysUserProfiles', $entityWbfsysUserProfiles );

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
      'wbfsys_user_profiles' => array
      (
        'id_user',
        'id_profile',
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
    $saveFields['wbfsys_user_profiles'] = array();
    $saveFields['wbfsys_user_profiles'][] = 'id_user';
        $saveFields['wbfsys_user_profiles'][] = 'id_profile';
        $saveFields['wbfsys_user_profiles'][] = 'm_version';
    
    
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
      'wbfsys_user_profiles' => array
      (
        'id_user',
        'id_profile',
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
    $saveFields['wbfsys_user_profiles'] = array();
    $saveFields['wbfsys_user_profiles'][] = 'id_user';
        $saveFields['wbfsys_user_profiles'][] = 'id_profile';
        $saveFields['wbfsys_user_profiles'][] = 'm_version';
    
    
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

}//end WbfsysUserProfiles_Crud_Model

