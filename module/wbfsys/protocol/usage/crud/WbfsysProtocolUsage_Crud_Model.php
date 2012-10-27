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
class WbfsysProtocolUsage_Crud_Model
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
   * @return WbfsysProtocolUsage_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_protocol_usage', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysProtocolUsage', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysProtocolUsage', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysProtocolUsage', $accessKey );
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
      $this->setEntityWbfsysProtocolUsage( $entity );
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
            'resource'  => $response->i18n->l( 'Protocol Usage', 'wbfsys.protocol_usage.label' ),
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
  * @return WbfsysProtocolUsage_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysProtocolUsage( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysProtocolUsage_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysProtocolUsage( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysProtocolUsage_Entity
  */
  public function getEntityWbfsysProtocolUsage( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysProtocolUsage = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysProtocolUsage = $this->getRegisterd( 'entityWbfsysProtocolUsage' );

    //entity wbfsys_protocol_usage
    if( !$entityWbfsysProtocolUsage )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysProtocolUsage = $orm->get( 'WbfsysProtocolUsage', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysprotocolusage with this id '.$objid,
              'wbfsys.protocol_usage.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysProtocolUsage', $entityWbfsysProtocolUsage );
        $this->register( 'main_entity', $entityWbfsysProtocolUsage);

      }
      else
      {
        $entityWbfsysProtocolUsage   = new WbfsysProtocolUsage_Entity() ;
        $this->register( 'entityWbfsysProtocolUsage', $entityWbfsysProtocolUsage );
        $this->register( 'main_entity', $entityWbfsysProtocolUsage);
      }

    }
    elseif( $objid && $objid != $entityWbfsysProtocolUsage->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysProtocolUsage = $orm->get( 'WbfsysProtocolUsage', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysprotocolusage with this id '.$objid,
            'wbfsys.protocol_usage.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysProtocolUsage', $entityWbfsysProtocolUsage);
      $this->register( 'main_entity', $entityWbfsysProtocolUsage);
    }

    return $entityWbfsysProtocolUsage;

  }//end public function getEntityWbfsysProtocolUsage */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysProtocolUsage_Entity $entity
  */
  public function setEntityWbfsysProtocolUsage( $entity )
  {

    $this->register( 'entityWbfsysProtocolUsage', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysProtocolUsage */

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
      if( !$entityWbfsysProtocolUsage = $this->getRegisterd( 'entityWbfsysProtocolUsage' ) )
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
            array( 'key' => 'entityWbfsysProtocolUsage' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysProtocolUsage ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysProtocolUsage->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create Protocol Usage {@label@}',
            'wbfsys.protocol_usage.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysProtocolUsage->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created Protocol Usage {@label@}',
            'wbfsys.protocol_usage.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New Protocol Usage: '.$entityText,
          'create',
          $entityWbfsysProtocolUsage
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysProtocolUsage );
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
      if( !$entityWbfsysProtocolUsage = $this->getRegisterd( 'entityWbfsysProtocolUsage' ) )
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
            array( 'key' => 'entityWbfsysProtocolUsage' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysProtocolUsage ) )
      {
        $entityText = $entityWbfsysProtocolUsage->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update Protocol Usage {@label@}',
            'wbfsys.protocol_usage.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysProtocolUsage->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated Protocol Usage {@label@}',
            'wbfsys.protocol_usage.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited Protocol Usage: '.$entityText,
          'edit',
          $entityWbfsysProtocolUsage
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysProtocolUsage );

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
   * @param WbfsysProtocolUsage_Entity $entityWbfsysProtocolUsage
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysProtocolUsage, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysProtocolUsage->getId();
    
    $entityText = $entityWbfsysProtocolUsage->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysProtocolUsage );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Protocol Usage {@label@}',
          'wbfsys.protocol_usage.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted Protocol Usage: '.$entityText,
          'delete',
          array( 'WbfsysProtocolUsage', $delId )
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


      //management  wbfsys_protocol_usage source wbfsys_protocol_usage
      $entityWbfsysProtocolUsage = $orm->newEntity( 'WbfsysProtocolUsage' );

      if( !$params->fieldsWbfsysProtocolUsage )
      {
        if( isset( $fields['wbfsys_protocol_usage'] )  )
          $params->fieldsWbfsysProtocolUsage  = $fields['wbfsys_protocol_usage'];
        else
          $params->fieldsWbfsysProtocolUsage  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysProtocolUsage,
        'wbfsys_protocol_usage',
        $params->fieldsWbfsysProtocolUsage
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysProtocolUsage', $entityWbfsysProtocolUsage );
      $this->register( 'main_entity', $entityWbfsysProtocolUsage );

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
   * @param WbfsysProtocolUsage_Entity $entityWbfsysProtocolUsage
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysProtocolUsage, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysProtocolUsage
    if( !$params->fieldsWbfsysProtocolUsage )
    {
      if( isset( $fields['wbfsys_protocol_usage'] ) )
        $params->fieldsWbfsysProtocolUsage = $fields['wbfsys_protocol_usage'];
      else
        $params->fieldsWbfsysProtocolUsage = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysProtocolUsage,
      'wbfsys_protocol_usage',
      $params->fieldsWbfsysProtocolUsage
    );
    $this->register( 'entityWbfsysProtocolUsage', $entityWbfsysProtocolUsage );
    $this->register( 'main_entity', $entityWbfsysProtocolUsage );



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
      $entityWbfsysProtocolUsage = new WbfsysProtocolUsage_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysProtocolUsage = $orm->get( 'WbfsysProtocolUsage',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no Protocol Usage with the id: {@id@}',
            'wbfsys.protocol_usage.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysProtocolUsage = new WbfsysProtocolUsage_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysProtocolUsage )
      $params->fieldsWbfsysProtocolUsage  = $entityWbfsysProtocolUsage->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysProtocolUsage,
      'wbfsys_protocol_usage',
      $params->fieldsWbfsysProtocolUsage
    );
    $this->register( 'entityWbfsysProtocolUsage', $entityWbfsysProtocolUsage );

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
      'wbfsys_protocol_usage' => array
      (
        'id_browser',
        'id_browser_version',
        'id_os',
        'id_main_language',
        'ip_address',
        'flag_sso',
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
    $saveFields['wbfsys_protocol_usage'] = array();
    $saveFields['wbfsys_protocol_usage'][] = 'id_browser';
        $saveFields['wbfsys_protocol_usage'][] = 'id_browser_version';
        $saveFields['wbfsys_protocol_usage'][] = 'id_os';
        $saveFields['wbfsys_protocol_usage'][] = 'id_main_language';
        $saveFields['wbfsys_protocol_usage'][] = 'ip_address';
        $saveFields['wbfsys_protocol_usage'][] = 'flag_sso';
    
    
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
      'wbfsys_protocol_usage' => array
      (
        'id_browser',
        'id_browser_version',
        'id_os',
        'id_main_language',
        'ip_address',
        'flag_sso',
        'rowid',
        'm_time_created',
        'm_role_create',
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
    $saveFields['wbfsys_protocol_usage'] = array();
    $saveFields['wbfsys_protocol_usage'][] = 'id_browser';
        $saveFields['wbfsys_protocol_usage'][] = 'id_browser_version';
        $saveFields['wbfsys_protocol_usage'][] = 'id_os';
        $saveFields['wbfsys_protocol_usage'][] = 'id_main_language';
        $saveFields['wbfsys_protocol_usage'][] = 'ip_address';
        $saveFields['wbfsys_protocol_usage'][] = 'flag_sso';
    
    
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

}//end WbfsysProtocolUsage_Crud_Model

