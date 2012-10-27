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
class WbfsysMyIssues_Crud_Model
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
   * @return WbfsysIssue_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_my_issues', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysIssue', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysIssue', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysIssue', $accessKey );
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
      $this->setEntityWbfsysMyIssues( $entity );
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
            'resource'  => $response->i18n->l( 'My Issues', 'wbfsys.my_issues.label' ),
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
  * @return WbfsysIssue_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysMyIssues( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysIssue_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysMyIssues( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysIssue_Entity
  */
  public function getEntityWbfsysMyIssues( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysMyIssues = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysMyIssues = $this->getRegisterd( 'entityWbfsysMyIssues' );

    //entity wbfsys_issue
    if( !$entityWbfsysMyIssues )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysMyIssues = $orm->get( 'WbfsysIssue', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysissue with this id '.$objid,
              'wbfsys.my_issues.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysMyIssues', $entityWbfsysMyIssues );
        $this->register( 'main_entity', $entityWbfsysMyIssues);

      }
      else
      {
        $entityWbfsysMyIssues   = new WbfsysIssue_Entity() ;
        $this->register( 'entityWbfsysMyIssues', $entityWbfsysMyIssues );
        $this->register( 'main_entity', $entityWbfsysMyIssues);
      }

    }
    elseif( $objid && $objid != $entityWbfsysMyIssues->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysMyIssues = $orm->get( 'WbfsysIssue', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysissue with this id '.$objid,
            'wbfsys.my_issues.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysMyIssues', $entityWbfsysMyIssues);
      $this->register( 'main_entity', $entityWbfsysMyIssues);
    }

    return $entityWbfsysMyIssues;

  }//end public function getEntityWbfsysMyIssues */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysIssue_Entity $entity
  */
  public function setEntityWbfsysMyIssues( $entity )
  {

    $this->register( 'entityWbfsysMyIssues', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysMyIssues */

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
      if( !$entityWbfsysMyIssues = $this->getRegisterd( 'entityWbfsysMyIssues' ) )
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
            array( 'key' => 'entityWbfsysMyIssues' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysMyIssues ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysMyIssues->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create My Issues {@label@}',
            'wbfsys.my_issues.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysMyIssues->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created My Issues {@label@}',
            'wbfsys.my_issues.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New My Issues: '.$entityText,
          'create',
          $entityWbfsysMyIssues
        );

    
    // den Benutzer direkt als Owner in den Acls eintragen
    $this->getAcl()->getManager()->createGroupAssignment
    (
      $this->getUser(),
      'owner',
      'mgmt-wbfsys_issue',
      $entityWbfsysMyIssues
    );
    

        if( $saveSrc )
          $orm->update( $entityWbfsysMyIssues );
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
      if( !$entityWbfsysMyIssues = $this->getRegisterd( 'entityWbfsysMyIssues' ) )
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
            array( 'key' => 'entityWbfsysMyIssues' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysMyIssues ) )
      {
        $entityText = $entityWbfsysMyIssues->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update My Issues {@label@}',
            'wbfsys.my_issues.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysMyIssues->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated My Issues {@label@}',
            'wbfsys.my_issues.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited My Issues: '.$entityText,
          'edit',
          $entityWbfsysMyIssues
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysMyIssues );

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
   * @param WbfsysIssue_Entity $entityWbfsysMyIssues
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysMyIssues, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysMyIssues->getId();
    
    $entityText = $entityWbfsysMyIssues->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysMyIssues );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted My Issues {@label@}',
          'wbfsys.my_issues.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted My Issues: '.$entityText,
          'delete',
          array( 'WbfsysIssue', $delId )
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


      //management  wbfsys_my_issues source wbfsys_issue
      $entityWbfsysMyIssues = $orm->newEntity( 'WbfsysIssue' );

      if( !$params->fieldsWbfsysMyIssues )
      {
        if( isset( $fields['wbfsys_my_issues'] )  )
          $params->fieldsWbfsysMyIssues  = $fields['wbfsys_my_issues'];
        else
          $params->fieldsWbfsysMyIssues  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysMyIssues,
        'wbfsys_my_issues',
        $params->fieldsWbfsysMyIssues
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysMyIssues', $entityWbfsysMyIssues );
      $this->register( 'main_entity', $entityWbfsysMyIssues );

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
   * @param WbfsysMyIssues_Entity $entityWbfsysMyIssues
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysMyIssues, $params, $process_Handling )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysIssue
    if( !$params->fieldsWbfsysMyIssues )
    {
      if( isset( $fields['wbfsys_my_issues'] ) )
        $params->fieldsWbfsysMyIssues = $fields['wbfsys_my_issues'];
      else
        $params->fieldsWbfsysMyIssues = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysMyIssues,
      'wbfsys_my_issues',
      $params->fieldsWbfsysMyIssues
    );
    $this->register( 'entityWbfsysMyIssues', $entityWbfsysMyIssues );
    $this->register( 'main_entity', $entityWbfsysMyIssues );

      
    if( $error = $process_Handling->validate() )
    {
      // ausgabe einer fehlerseite und adieu
      throw new Consistency_Exception
      (
        $response->i18n->l
        (
          'One or more checks failed {@resource@}',
          'wbf.message',
          array
          (
            'resource'  => $response->i18n->l( 'My Issues', 'wbfsys.my_issues.label' )
          )
        )
      );
    }
      

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
      $entityWbfsysMyIssues = new WbfsysIssue_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysMyIssues = $orm->get( 'WbfsysIssue',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no My Issues with the id: {@id@}',
            'wbfsys.my_issues.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysMyIssues = new WbfsysIssue_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysMyIssues )
      $params->fieldsWbfsysMyIssues  = $entityWbfsysMyIssues->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysMyIssues,
      'wbfsys_my_issues',
      $params->fieldsWbfsysMyIssues
    );
    $this->register( 'entityWbfsysMyIssues', $entityWbfsysMyIssues );

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
      'wbfsys_my_issues' => array
      (
        'title',
        'id_type',
        'id_category',
        'id_status',
        'id_severity',
        'id_os',
        'id_priority',
        'id_browser',
        'id_revision',
        'id_finish_revision',
        'flag_hidden',
        'finish_till',
        'id_responsible',
        'progress',
        'vid',
        'description',
        'error_message',
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
    $saveFields['wbfsys_my_issues'] = array();
    $saveFields['wbfsys_my_issues'][] = 'title';
        $saveFields['wbfsys_my_issues'][] = 'id_type';
        $saveFields['wbfsys_my_issues'][] = 'id_category';
        $saveFields['wbfsys_my_issues'][] = 'id_status';
        $saveFields['wbfsys_my_issues'][] = 'id_severity';
        $saveFields['wbfsys_my_issues'][] = 'id_os';
        $saveFields['wbfsys_my_issues'][] = 'id_priority';
        $saveFields['wbfsys_my_issues'][] = 'id_browser';
        $saveFields['wbfsys_my_issues'][] = 'id_revision';
        $saveFields['wbfsys_my_issues'][] = 'id_finish_revision';
        $saveFields['wbfsys_my_issues'][] = 'flag_hidden';
        $saveFields['wbfsys_my_issues'][] = 'finish_till';
        $saveFields['wbfsys_my_issues'][] = 'id_responsible';
        $saveFields['wbfsys_my_issues'][] = 'progress';
        $saveFields['wbfsys_my_issues'][] = 'vid';
        $saveFields['wbfsys_my_issues'][] = 'description';
        $saveFields['wbfsys_my_issues'][] = 'error_message';
        $saveFields['wbfsys_my_issues'][] = 'id_vid_entity';
        $saveFields['wbfsys_my_issues'][] = 'm_version';
    
    
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
      'wbfsys_my_issues' => array
      (
        'title',
        'id_type',
        'id_category',
        'id_status',
        'id_severity',
        'id_os',
        'id_priority',
        'id_browser',
        'id_revision',
        'id_finish_revision',
        'flag_hidden',
        'finish_till',
        'id_responsible',
        'progress',
        'vid',
        'description',
        'error_message',
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
    $saveFields['wbfsys_my_issues'] = array();
    $saveFields['wbfsys_my_issues'][] = 'title';
        $saveFields['wbfsys_my_issues'][] = 'id_type';
        $saveFields['wbfsys_my_issues'][] = 'id_category';
        $saveFields['wbfsys_my_issues'][] = 'id_status';
        $saveFields['wbfsys_my_issues'][] = 'id_severity';
        $saveFields['wbfsys_my_issues'][] = 'id_os';
        $saveFields['wbfsys_my_issues'][] = 'id_priority';
        $saveFields['wbfsys_my_issues'][] = 'id_browser';
        $saveFields['wbfsys_my_issues'][] = 'id_revision';
        $saveFields['wbfsys_my_issues'][] = 'id_finish_revision';
        $saveFields['wbfsys_my_issues'][] = 'flag_hidden';
        $saveFields['wbfsys_my_issues'][] = 'finish_till';
        $saveFields['wbfsys_my_issues'][] = 'id_responsible';
        $saveFields['wbfsys_my_issues'][] = 'progress';
        $saveFields['wbfsys_my_issues'][] = 'vid';
        $saveFields['wbfsys_my_issues'][] = 'description';
        $saveFields['wbfsys_my_issues'][] = 'error_message';
        $saveFields['wbfsys_my_issues'][] = 'id_vid_entity';
        $saveFields['wbfsys_my_issues'][] = 'm_version';
    
    
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

}//end WbfsysMyIssues_Crud_Model

