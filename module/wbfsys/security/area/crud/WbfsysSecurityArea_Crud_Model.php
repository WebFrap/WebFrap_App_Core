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
class WbfsysSecurityArea_Crud_Model
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
   * @return WbfsysSecurityArea_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_security_area', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysSecurityArea', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysSecurityArea', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysSecurityArea', $accessKey );
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
      $this->setEntityWbfsysSecurityArea( $entity );
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
            'resource'  => $response->i18n->l( 'Security Area', 'wbfsys.security_area.label' ),
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
  * @return WbfsysSecurityArea_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysSecurityArea( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysSecurityArea_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysSecurityArea( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysSecurityArea_Entity
  */
  public function getEntityWbfsysSecurityArea( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysSecurityArea = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysSecurityArea = $this->getRegisterd( 'entityWbfsysSecurityArea' );

    //entity wbfsys_security_area
    if( !$entityWbfsysSecurityArea )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysSecurityArea = $orm->get( 'WbfsysSecurityArea', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsyssecurityarea with this id '.$objid,
              'wbfsys.security_area.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysSecurityArea', $entityWbfsysSecurityArea );
        $this->register( 'main_entity', $entityWbfsysSecurityArea);

      }
      else
      {
        $entityWbfsysSecurityArea   = new WbfsysSecurityArea_Entity() ;
        $this->register( 'entityWbfsysSecurityArea', $entityWbfsysSecurityArea );
        $this->register( 'main_entity', $entityWbfsysSecurityArea);
      }

    }
    elseif( $objid && $objid != $entityWbfsysSecurityArea->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysSecurityArea = $orm->get( 'WbfsysSecurityArea', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsyssecurityarea with this id '.$objid,
            'wbfsys.security_area.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysSecurityArea', $entityWbfsysSecurityArea);
      $this->register( 'main_entity', $entityWbfsysSecurityArea);
    }

    return $entityWbfsysSecurityArea;

  }//end public function getEntityWbfsysSecurityArea */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysSecurityArea_Entity $entity
  */
  public function setEntityWbfsysSecurityArea( $entity )
  {

    $this->register( 'entityWbfsysSecurityArea', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysSecurityArea */

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
      if( !$entityWbfsysSecurityArea = $this->getRegisterd( 'entityWbfsysSecurityArea' ) )
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
            array( 'key' => 'entityWbfsysSecurityArea' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysSecurityArea ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysSecurityArea->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create Security Area {@label@}',
            'wbfsys.security_area.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysSecurityArea->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created Security Area {@label@}',
            'wbfsys.security_area.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New Security Area: '.$entityText,
          'create',
          $entityWbfsysSecurityArea
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysSecurityArea );
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
      if( !$entityWbfsysSecurityArea = $this->getRegisterd( 'entityWbfsysSecurityArea' ) )
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
            array( 'key' => 'entityWbfsysSecurityArea' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysSecurityArea ) )
      {
        $entityText = $entityWbfsysSecurityArea->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update Security Area {@label@}',
            'wbfsys.security_area.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysSecurityArea->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated Security Area {@label@}',
            'wbfsys.security_area.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited Security Area: '.$entityText,
          'edit',
          $entityWbfsysSecurityArea
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysSecurityArea );

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
   * @param WbfsysSecurityArea_Entity $entityWbfsysSecurityArea
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysSecurityArea, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysSecurityArea->getId();
    
    $entityText = $entityWbfsysSecurityArea->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysSecurityArea );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Security Area {@label@}',
          'wbfsys.security_area.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted Security Area: '.$entityText,
          'delete',
          array( 'WbfsysSecurityArea', $delId )
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


      //management  wbfsys_security_area source wbfsys_security_area
      $entityWbfsysSecurityArea = $orm->newEntity( 'WbfsysSecurityArea' );

      if( !$params->fieldsWbfsysSecurityArea )
      {
        if( isset( $fields['wbfsys_security_area'] )  )
          $params->fieldsWbfsysSecurityArea  = $fields['wbfsys_security_area'];
        else
          $params->fieldsWbfsysSecurityArea  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysSecurityArea,
        'wbfsys_security_area',
        $params->fieldsWbfsysSecurityArea
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysSecurityArea', $entityWbfsysSecurityArea );
      $this->register( 'main_entity', $entityWbfsysSecurityArea );

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
   * @param WbfsysSecurityArea_Entity $entityWbfsysSecurityArea
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysSecurityArea, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysSecurityArea
    if( !$params->fieldsWbfsysSecurityArea )
    {
      if( isset( $fields['wbfsys_security_area'] ) )
        $params->fieldsWbfsysSecurityArea = $fields['wbfsys_security_area'];
      else
        $params->fieldsWbfsysSecurityArea = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysSecurityArea,
      'wbfsys_security_area',
      $params->fieldsWbfsysSecurityArea
    );
    $this->register( 'entityWbfsysSecurityArea', $entityWbfsysSecurityArea );
    $this->register( 'main_entity', $entityWbfsysSecurityArea );



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
      $entityWbfsysSecurityArea = new WbfsysSecurityArea_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysSecurityArea = $orm->get( 'WbfsysSecurityArea',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no Security Area with the id: {@id@}',
            'wbfsys.security_area.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysSecurityArea = new WbfsysSecurityArea_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysSecurityArea )
      $params->fieldsWbfsysSecurityArea  = $entityWbfsysSecurityArea->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysSecurityArea,
      'wbfsys_security_area',
      $params->fieldsWbfsysSecurityArea
    );
    $this->register( 'entityWbfsysSecurityArea', $entityWbfsysSecurityArea );

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
    $query  = $db->newQuery( 'WbfsysSecurityArea' );
    /* @var $query WbfsysSecurityArea_Query  */

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
      'wbfsys_security_area' => array
      (
        'm_parent',
        'label',
        'id_ref_listing',
        'id_ref_access',
        'id_ref_insert',
        'id_ref_update',
        'id_ref_delete',
        'id_ref_admin',
        'id_level_listing',
        'id_level_access',
        'id_level_insert',
        'id_level_update',
        'id_level_delete',
        'id_level_admin',
        'vid',
        'id_target',
        'id_type',
        'access_key',
        'type_key',
        'parent_key',
        'source_key',
        'id_source',
        'parent_path',
        'revision',
        'flag_system',
        'description',
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
    $saveFields['wbfsys_security_area'] = array();
    $saveFields['wbfsys_security_area'][] = 'm_parent';
        $saveFields['wbfsys_security_area'][] = 'label';
        $saveFields['wbfsys_security_area'][] = 'id_ref_listing';
        $saveFields['wbfsys_security_area'][] = 'id_ref_access';
        $saveFields['wbfsys_security_area'][] = 'id_ref_insert';
        $saveFields['wbfsys_security_area'][] = 'id_ref_update';
        $saveFields['wbfsys_security_area'][] = 'id_ref_delete';
        $saveFields['wbfsys_security_area'][] = 'id_ref_admin';
        $saveFields['wbfsys_security_area'][] = 'id_level_listing';
        $saveFields['wbfsys_security_area'][] = 'id_level_access';
        $saveFields['wbfsys_security_area'][] = 'id_level_insert';
        $saveFields['wbfsys_security_area'][] = 'id_level_update';
        $saveFields['wbfsys_security_area'][] = 'id_level_delete';
        $saveFields['wbfsys_security_area'][] = 'id_level_admin';
        $saveFields['wbfsys_security_area'][] = 'vid';
        $saveFields['wbfsys_security_area'][] = 'id_target';
        $saveFields['wbfsys_security_area'][] = 'id_type';
        $saveFields['wbfsys_security_area'][] = 'access_key';
        $saveFields['wbfsys_security_area'][] = 'type_key';
        $saveFields['wbfsys_security_area'][] = 'parent_key';
        $saveFields['wbfsys_security_area'][] = 'source_key';
        $saveFields['wbfsys_security_area'][] = 'id_source';
        $saveFields['wbfsys_security_area'][] = 'parent_path';
        $saveFields['wbfsys_security_area'][] = 'revision';
        $saveFields['wbfsys_security_area'][] = 'flag_system';
        $saveFields['wbfsys_security_area'][] = 'description';
        $saveFields['wbfsys_security_area'][] = 'id_vid_entity';
        $saveFields['wbfsys_security_area'][] = 'm_version';
    
    
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
      'wbfsys_security_area' => array
      (
        'm_parent',
        'label',
        'id_ref_listing',
        'id_ref_access',
        'id_ref_insert',
        'id_ref_update',
        'id_ref_delete',
        'id_ref_admin',
        'id_level_listing',
        'id_level_access',
        'id_level_insert',
        'id_level_update',
        'id_level_delete',
        'id_level_admin',
        'vid',
        'id_target',
        'id_type',
        'access_key',
        'type_key',
        'parent_key',
        'source_key',
        'id_source',
        'parent_path',
        'revision',
        'flag_system',
        'description',
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
    $saveFields['wbfsys_security_area'] = array();
    $saveFields['wbfsys_security_area'][] = 'm_parent';
        $saveFields['wbfsys_security_area'][] = 'label';
        $saveFields['wbfsys_security_area'][] = 'id_ref_listing';
        $saveFields['wbfsys_security_area'][] = 'id_ref_access';
        $saveFields['wbfsys_security_area'][] = 'id_ref_insert';
        $saveFields['wbfsys_security_area'][] = 'id_ref_update';
        $saveFields['wbfsys_security_area'][] = 'id_ref_delete';
        $saveFields['wbfsys_security_area'][] = 'id_ref_admin';
        $saveFields['wbfsys_security_area'][] = 'id_level_listing';
        $saveFields['wbfsys_security_area'][] = 'id_level_access';
        $saveFields['wbfsys_security_area'][] = 'id_level_insert';
        $saveFields['wbfsys_security_area'][] = 'id_level_update';
        $saveFields['wbfsys_security_area'][] = 'id_level_delete';
        $saveFields['wbfsys_security_area'][] = 'id_level_admin';
        $saveFields['wbfsys_security_area'][] = 'vid';
        $saveFields['wbfsys_security_area'][] = 'id_target';
        $saveFields['wbfsys_security_area'][] = 'id_type';
        $saveFields['wbfsys_security_area'][] = 'access_key';
        $saveFields['wbfsys_security_area'][] = 'type_key';
        $saveFields['wbfsys_security_area'][] = 'parent_key';
        $saveFields['wbfsys_security_area'][] = 'source_key';
        $saveFields['wbfsys_security_area'][] = 'id_source';
        $saveFields['wbfsys_security_area'][] = 'parent_path';
        $saveFields['wbfsys_security_area'][] = 'revision';
        $saveFields['wbfsys_security_area'][] = 'flag_system';
        $saveFields['wbfsys_security_area'][] = 'description';
        $saveFields['wbfsys_security_area'][] = 'id_vid_entity';
        $saveFields['wbfsys_security_area'][] = 'm_version';
    
    
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

}//end WbfsysSecurityArea_Crud_Model

