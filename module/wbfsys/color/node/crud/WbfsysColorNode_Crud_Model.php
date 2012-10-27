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
class WbfsysColorNode_Crud_Model
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
   * @return WbfsysColorNode_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'wbfsys_color_node', Validator::EID, 'objid' ) )
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
      $entity   = $orm->get( 'WbfsysColorNode', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysColorNode', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysColorNode', $accessKey );
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
      $this->setEntityWbfsysColorNode( $entity );
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
            'resource'  => $response->i18n->l( 'Color Node', 'wbfsys.color_node.label' ),
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
  * @return WbfsysColorNode_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysColorNode( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysColorNode_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysColorNode( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysColorNode_Entity
  */
  public function getEntityWbfsysColorNode( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysColorNode = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysColorNode = $this->getRegisterd( 'entityWbfsysColorNode' );

    //entity wbfsys_color_node
    if( !$entityWbfsysColorNode )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysColorNode = $orm->get( 'WbfsysColorNode', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsyscolornode with this id '.$objid,
              'wbfsys.color_node.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysColorNode', $entityWbfsysColorNode );
        $this->register( 'main_entity', $entityWbfsysColorNode);

      }
      else
      {
        $entityWbfsysColorNode   = new WbfsysColorNode_Entity() ;
        $this->register( 'entityWbfsysColorNode', $entityWbfsysColorNode );
        $this->register( 'main_entity', $entityWbfsysColorNode);
      }

    }
    elseif( $objid && $objid != $entityWbfsysColorNode->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysColorNode = $orm->get( 'WbfsysColorNode', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsyscolornode with this id '.$objid,
            'wbfsys.color_node.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysColorNode', $entityWbfsysColorNode);
      $this->register( 'main_entity', $entityWbfsysColorNode);
    }

    return $entityWbfsysColorNode;

  }//end public function getEntityWbfsysColorNode */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysColorNode_Entity $entity
  */
  public function setEntityWbfsysColorNode( $entity )
  {

    $this->register( 'entityWbfsysColorNode', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysColorNode */

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
      if( !$entityWbfsysColorNode = $this->getRegisterd( 'entityWbfsysColorNode' ) )
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
            array( 'key' => 'entityWbfsysColorNode' )
          )
        );
      }


      if( !$orm->insert( $entityWbfsysColorNode ) )
      {
        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $entityText = $entityWbfsysColorNode->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to create Color Node {@label@}',
            'wbfsys.color_node.message',
            array
            (
              'label' => $entityText
            )
          )
        );

      }
      else
      {
        $entityText  = $entityWbfsysColorNode->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully created Color Node {@label@}',
            'wbfsys.color_node.message',
            array( 'label' => $entityText )
          )
        );
        $saveSrc = false;


        $this->protocol
        (
          'Created New Color Node: '.$entityText,
          'create',
          $entityWbfsysColorNode
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysColorNode );
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
      if( !$entityWbfsysColorNode = $this->getRegisterd( 'entityWbfsysColorNode' ) )
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
            array( 'key' => 'entityWbfsysColorNode' )
          )
        );
      }


      if( !$orm->update( $entityWbfsysColorNode ) )
      {
        $entityText = $entityWbfsysColorNode->text();

        // hier wird erst mal nur eine meldung gemacht,
        // die rückgabe des fehlers passiert am ende der methode, wo
        // geprüft wird ob ein fehler in der queue existiert
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update Color Node {@label@}',
            'wbfsys.color_node.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

      }
      else
      {
        $entityText = $entityWbfsysColorNode->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated Color Node {@label@}',
            'wbfsys.color_node.message',
            array
            (
              'label' =>  $entityText
            )
          )
        );

        $saveSrc = false;


        $this->protocol
        (
          'edited Color Node: '.$entityText,
          'edit',
          $entityWbfsysColorNode
        );



        if( $saveSrc )
          $orm->update( $entityWbfsysColorNode );

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
   * @param WbfsysColorNode_Entity $entityWbfsysColorNode
   * @param TFlag $params named parameters
   *
   * @return void|Error im Fehlerfall
   */
  public function delete( $entityWbfsysColorNode, $params  )
  {

    // laden der benötigten resource
    $response  = $this->getResponse();
    $db        = $this->getDb();
    $orm       = $db->getOrm();
    $acl       = $this->getAcl();
    
    $delId     = $entityWbfsysColorNode->getId();
    
    $entityText = $entityWbfsysColorNode->text();
    
    try
    {
      $db->begin();

      // delete wirft eine exception wenn etwas schief geht
      $orm->delete( $entityWbfsysColorNode );

      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Color Node {@label@}',
          'wbfsys.color_node.message',
          array( 'label' => $entityText )
        )
      );

        $this->protocol
        (
          'Deleted Color Node: '.$entityText,
          'delete',
          array( 'WbfsysColorNode', $delId )
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


      //management  wbfsys_color_node source wbfsys_color_node
      $entityWbfsysColorNode = $orm->newEntity( 'WbfsysColorNode' );

      if( !$params->fieldsWbfsysColorNode )
      {
        if( isset( $fields['wbfsys_color_node'] )  )
          $params->fieldsWbfsysColorNode  = $fields['wbfsys_color_node'];
        else
          $params->fieldsWbfsysColorNode  = array();
      }

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysColorNode,
        'wbfsys_color_node',
        $params->fieldsWbfsysColorNode
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysColorNode', $entityWbfsysColorNode );
      $this->register( 'main_entity', $entityWbfsysColorNode );

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
   * @param WbfsysColorNode_Entity $entityWbfsysColorNode
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $entityWbfsysColorNode, $params )
  {

    $view        = $this->getView();
    $httpRequest = $this->getRequest();
    
    /* var $response LibResponsePhp */
    $response    = $this->getResponse();
    
    /* var $orm LibDbOrm */
    $orm         = $this->getOrm();

    $fields      = $this->getUpdateFields();


    //entity WbfsysColorNode
    if( !$params->fieldsWbfsysColorNode )
    {
      if( isset( $fields['wbfsys_color_node'] ) )
        $params->fieldsWbfsysColorNode = $fields['wbfsys_color_node'];
      else
        $params->fieldsWbfsysColorNode = array();
    }

    $httpRequest->validateUpdate
    (
      $entityWbfsysColorNode,
      'wbfsys_color_node',
      $params->fieldsWbfsysColorNode
    );
    $this->register( 'entityWbfsysColorNode', $entityWbfsysColorNode );
    $this->register( 'main_entity', $entityWbfsysColorNode );



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
      $entityWbfsysColorNode = new WbfsysColorNode_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityWbfsysColorNode = $orm->get( 'WbfsysColorNode',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no Color Node with the id: {@id@}',
            'wbfsys.color_node.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityWbfsysColorNode = new WbfsysColorNode_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysColorNode )
      $params->fieldsWbfsysColorNode  = $entityWbfsysColorNode->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityWbfsysColorNode,
      'wbfsys_color_node',
      $params->fieldsWbfsysColorNode
    );
    $this->register( 'entityWbfsysColorNode', $entityWbfsysColorNode );

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
      'wbfsys_color_node' => array
      (
        'm_order',
        'name',
        'access_key',
        'id_scheme',
        'display_color',
        'bg_default',
        'font_default',
        'border_default',
        'bg_hover',
        'font_hover',
        'border_hover',
        'bg_active',
        'font_active',
        'border_active',
        'bg_inactive',
        'font_inactive',
        'border_inactive',
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
    $saveFields['wbfsys_color_node'] = array();
    $saveFields['wbfsys_color_node'][] = 'm_order';
        $saveFields['wbfsys_color_node'][] = 'name';
        $saveFields['wbfsys_color_node'][] = 'access_key';
        $saveFields['wbfsys_color_node'][] = 'id_scheme';
        $saveFields['wbfsys_color_node'][] = 'display_color';
        $saveFields['wbfsys_color_node'][] = 'bg_default';
        $saveFields['wbfsys_color_node'][] = 'font_default';
        $saveFields['wbfsys_color_node'][] = 'border_default';
        $saveFields['wbfsys_color_node'][] = 'bg_hover';
        $saveFields['wbfsys_color_node'][] = 'font_hover';
        $saveFields['wbfsys_color_node'][] = 'border_hover';
        $saveFields['wbfsys_color_node'][] = 'bg_active';
        $saveFields['wbfsys_color_node'][] = 'font_active';
        $saveFields['wbfsys_color_node'][] = 'border_active';
        $saveFields['wbfsys_color_node'][] = 'bg_inactive';
        $saveFields['wbfsys_color_node'][] = 'font_inactive';
        $saveFields['wbfsys_color_node'][] = 'border_inactive';
        $saveFields['wbfsys_color_node'][] = 'description';
        $saveFields['wbfsys_color_node'][] = 'm_version';
    
    
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
      'wbfsys_color_node' => array
      (
        'm_order',
        'name',
        'access_key',
        'id_scheme',
        'display_color',
        'bg_default',
        'font_default',
        'border_default',
        'bg_hover',
        'font_hover',
        'border_hover',
        'bg_active',
        'font_active',
        'border_active',
        'bg_inactive',
        'font_inactive',
        'border_inactive',
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
    $saveFields['wbfsys_color_node'] = array();
    $saveFields['wbfsys_color_node'][] = 'm_order';
        $saveFields['wbfsys_color_node'][] = 'name';
        $saveFields['wbfsys_color_node'][] = 'access_key';
        $saveFields['wbfsys_color_node'][] = 'id_scheme';
        $saveFields['wbfsys_color_node'][] = 'display_color';
        $saveFields['wbfsys_color_node'][] = 'bg_default';
        $saveFields['wbfsys_color_node'][] = 'font_default';
        $saveFields['wbfsys_color_node'][] = 'border_default';
        $saveFields['wbfsys_color_node'][] = 'bg_hover';
        $saveFields['wbfsys_color_node'][] = 'font_hover';
        $saveFields['wbfsys_color_node'][] = 'border_hover';
        $saveFields['wbfsys_color_node'][] = 'bg_active';
        $saveFields['wbfsys_color_node'][] = 'font_active';
        $saveFields['wbfsys_color_node'][] = 'border_active';
        $saveFields['wbfsys_color_node'][] = 'bg_inactive';
        $saveFields['wbfsys_color_node'][] = 'font_inactive';
        $saveFields['wbfsys_color_node'][] = 'border_inactive';
        $saveFields['wbfsys_color_node'][] = 'description';
        $saveFields['wbfsys_color_node'][] = 'm_version';
    
    
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

}//end WbfsysColorNode_Crud_Model

