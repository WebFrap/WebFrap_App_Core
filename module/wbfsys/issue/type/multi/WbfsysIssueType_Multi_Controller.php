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
 * This is the Genf Class for the Controller in WebFrap MVC
 * If you want to extend this class write your coden in ControllerWbfsysIssueType
 *
 * NEVER WRITE CODE IN THIS CLASS
 * THE CONTENT OF THIS CLASS IS NOT PERSISTENT AND CAN CHANGE OFTEN
 * ALL YOUR CHANGES WILL BE OVERWRITEN!!!
 * YOU HAVE BEEN WARNED!!!
 *
 * @package WebFrap
 * @subpackage ModIssueType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysIssueType_Multi_Controller
  extends Controller
{

////////////////////////////////////////////////////////////////////////////////
// attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * the default model for the controller
   * @var WbfsysIssueType_Multi_Model $model
   */
   protected $model        = null;

  /**
   * the classname for the default model
   * @var string $modelName
   */
   protected $modelName    = false;

  /**
   * Mit den Options wird der zugriff auf die Service Methoden konfiguriert
   * 
   * method: Der Service kann nur mit den im Array vorhandenen HTTP Methoden
   *   aufgerufen werden. Wenn eine falsche Methode verwendet wird, gibt das 
   *   System automatisch eine "Method not Allowed" Fehlermeldung zurück
   * 
   * views: Die Viewtypen die erlaubt sind. Wenn mit einem nicht definierten
   *   Viewtype auf einen Service zugegriffen wird, gibt das System automatisch
   *  eine "Invalid Request" Fehlerseite mit einer Detailierten Meldung, und der
   *  Information welche Services Viewtypen valide sind, zurück
   *  
   * public: boolean wert, ob der Service auch ohne Login aufgerufen werden darf
   *   wenn nicht vorhanden ist die Seite per default nur mit Login zu erreichen
   * 
   * @var array
   */
  protected $options           = array
  (
    'save' => array
    (
      'method'    => array( 'PUT', 'POST' ),
      'views'      => array( 'ajax' )
    ),
    'multisave' => array
    (
      'method'    => array( 'PUT', 'POST' ),
      'views'      => array( 'ajax' )
    ),
    'insert' => array
    (
      'method'    => array( 'PUT', 'POST' ),
      'views'      => array( 'ajax' )
    ),
    'multiinsert' => array
    (
      'method'    => array( 'PUT', 'POST' ),
      'views'      => array( 'ajax' )
    ),
    'update' => array
    (
      'method'    => array( 'PUT', 'POST' ),
      'views'      => array( 'ajax' )
    ),
    'multiupdate' => array
    (
      'method'    => array( 'PUT', 'POST' ),
      'views'      => array( 'ajax' )
    ),
    'delete' => array
    (
      'method'    => array( 'DELETE' ),
      'views'      => array( 'ajax' )
    ),
    'multidelete' => array
    (
      'method'    => array( 'DELETE' ),
      'views'      => array( 'ajax' )
    ),
  );

////////////////////////////////////////////////////////////////////////////////
// methodes
////////////////////////////////////////////////////////////////////////////////
        
 /**
  * save multiple datasets
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  * @return boolean
  */
  public function service_multiSave( $request, $response )
  {
    return $this->service_save( $request, $response );
  }//end public function service_multiSave */

 /**
  * save multiple datasets
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  * @return boolean
  */
  public function service_save( $request, $response )
  {

    $user      = $this->getUser();


    $params = $this->getCrudFlags( $request );
    
    $access = new WbfsysIssueType_Multi_Access_Save( null, null, $this );
    $access->load( $user->getProfileName(), $params );

    // der Access Container des Users für die Resource wird als flag übergeben
    $params->access = $access;
    
    $model = $this->loadModel( 'WbfsysIssueType_Multi' );

    // daten aus dem userrequest extrahieren
    if( $error = $model->fetchMultiSaveData( $params ) )
    {

      return $error;
    }

    // Daten in die Datenbank schreiben
    if( $error = $model->multiSave( $access, $params ) )
    {


      return $error;
    }


    return null;

  }//end public function service_save */
    
 /**
  * update multiple datasets
  * this method just saves existing data, it does not create new entries
  * if the rowid is empty or not exists
  * if you want to have create or update functions use class:
  * ControllerWbfsysIssueTypeGenf::multiSave
  *
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  * @return boolean
  */
  public function service_multiUpdate( $request, $response )
  {
  
    return $this->service_update( $request, $response );
    
  }//end public function service_multiUpdate */

 /**
  * update multiple datasets
  * this method just saves existing data, it does not create new entries
  * if the rowid is empty or not exists
  * if you want to have create or update functions use class:
  * ControllerWbfsysIssueTypeGenf::multiSave
  *
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  * @return boolean
  */
  public function service_update( $request, $response )
  {
 
    $user      = $this->getUser();


    $params = $this->getCrudFlags( $request );
    
    $access = new WbfsysIssueType_Multi_Access_Update( null, null, $this );
    $access->load( $user->getProfileName(), $params );

    // der Access Container des Users für die Resource wird als flag übergeben
    $params->access = $access;

    // laden des benötigten models
    $model = $this->loadModel( 'WbfsysIssueType_Multi' );

    // on multi update we just check and update
    // normaly the data will come from editable tables, so the only relevant
    // data for the client should be a success or error message
    if( $error = $model->fetchMultiUpdateData( $params ) )
    {

      return $error;
    }

    if( $error = $model->multiUpdate( $access, $params ) )
    {


      return $error;
    }


    return true;
      
  }//end public function service_update */
    
 /**
  * insert multiple datasets
  * this method just creates new entries, but does not save, even if there is
  * a valid rowid in the given data
  * if you want to have create or update functions use class:
  * ControllerWbfsysIssueTypeGenf::multiSave
  *
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  * @return boolean
  */
  public function service_multiInsert( $request, $response )
  {
  
    return $this->service_insert( $request, $response );
  
  }//end public function service_multiInsert */

 /**
  * insert multiple datasets
  * this method just creates new entries, but does not save, even if there is
  * a valid rowid in the given data
  * if you want to have create or update functions use class:
  * ControllerWbfsysIssueTypeGenf::multiSave
  *
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  * @return boolean
  */
  public function service_insert( $request, $response )
  {

    $user      = $this->getUser();


    $params = $this->getCrudFlags( $request );
    
    $access = new WbfsysIssueType_Multi_Access_Insert( null, null, $this );
    $access->load( $user->getProfileName(), $params );


    // der Access Container des Users für die Resource wird als flag übergeben
    $params->access = $access;

    $model = $this->loadModel( 'WbfsysIssueType_Multi' );

    // fetch the data from the http request as insert data and validate them
    // automatically with the metadata
    if( $error = $model->fetchMultiInsertData( $params ) )
    {

      return $error;
    }

    if( $error = $model->multiInsert( $access, $params ) )
    {


      return $error;
    }


    
    return null;

  }//end public function service_insert */
    
 /**
  * insert multiple datasets
  * this method just creates new entries, but does not save, even if there is
  * a valid rowid in the given data
  * if you want to have create or update functions use class:
  * ControllerWbfsysIssueTypeGenf::multiDelete
  *
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  * @return boolean
  */
  public function service_multiDelete( $request, $response )
  {

    return $this->service_delete( $request, $response );
  
  }//end public function service_multiDelete */

 /**
  * insert multiple datasets
  * this method just creates new entries, but does not save, even if there is
  * a valid rowid in the given data
  * if you want to have create or update functions use class:
  * ControllerWbfsysIssueTypeGenf::multiDelete
  *
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  * @return boolean
  */
  public function service_delete( $request, $response )
  {

    $user      = $this->getUser();

    $params = $this->getCrudFlags( $request );
    
    $access = new WbfsysIssueType_Multi_Access_Delete( null, null, $this );
    $access->load( $user->getProfileName(), $params );


    // der Access Container des Users für die Resource wird als flag übergeben
    $params->access = $access;

    
    $model = $this->loadModel( 'WbfsysIssueType_Multi' );
    $model->setRequest( $request );
    


    // fetch the data from the http request as insert data and validate them
    // automatically with the metadata
    if( !$deleteIds = $model->fetchMultiDelete( $params ) )
    {

      throw new InvalidRequest_Exception
      (
        'You Forgott to tell us wich datasets we should delete. There was no Information in your request',
        Error::INVALID_REQUEST
      );
    }
    
    if( $error = $model->multiDelete( $access, $deleteIds, $params ) )
    {


      return $error;
    }


    
    return true;

  }//end public function service_delete */

  /**
   * @param TFlag $params
   * @return TFlag
   */
  protected function getCrudFlags( $request )
  {

    $response  = $this->getResponse();

    // create named parameters object
    $params = new TFlag();
      

    // the publish type, like selectbox, tree, table..
    if( $publish  = $request->param( 'publish', Validator::CNAME ) )
      $params->publish   = $publish;

    // listing type
    if( $ltype   = $request->param( 'ltype', Validator::CNAME ) )
      $params->ltype    = $ltype;

    // context
    if( $context   = $request->param( 'context', Validator::CNAME ) )
      $params->context    = $context;

    // if of the target element, can be a table, a tree or whatever
    if( $targetId = $request->param( 'target_id', Validator::CKEY ) )
      $params->targetId  = $targetId;


    // callback for a target function in thr browser
    if( $target   = $request->param( 'target', Validator::CNAME ) )
      $params->target    = $target;

    // mask key
    if( $mask = $request->param( 'mask', Validator::CNAME ) )
      $params->mask  = $mask;

    // mask key
    if( $viewType = $request->param( 'view', Validator::CNAME ) )
      $params->viewType  = $viewType;

    // mask key
    if( $viewId = $request->param( 'view_id', Validator::CKEY ) )
      $params->viewId  = $viewId;

    // refid
    if( $refid = $request->param( 'refid', Validator::INT ) )
      $params->refId  = $refid;

    // startpunkt des pfades für die acls
    if( $aclRoot = $request->param( 'a_root', Validator::CKEY ) )
      $params->aclRoot    = $aclRoot;

    // root mask
    if( $maskRoot = $request->param( 'm_root', Validator::TEXT ) )
      $params->maskRoot    = $maskRoot;

    // die id des Datensatzes von dem aus der Pfad gestartet wurde
    if( $aclRootId = $request->param( 'a_root_id', Validator::INT ) )
      $params->aclRootId    = $aclRootId;

    // der key des knotens auf dem wir uns im pfad gerade befinden
    if( $aclKey = $request->param( 'a_key', Validator::CKEY ) )
      $params->aclKey    = $aclKey;

    // der name des knotens
    if( $aclNode = $request->param( 'a_node', Validator::CKEY ) )
      $params->aclNode    = $aclNode;

    // an welchem punkt des pfades befinden wir uns?
    if( $aclLevel = $request->param( 'a_level', Validator::INT ) )
      $params->aclLevel  = $aclLevel;

    // per default
    $params->categories = array();

    return $params;

  }//end protected function getCrudFlags */

}//end class WbfsysIssueType_Multi_Controller

