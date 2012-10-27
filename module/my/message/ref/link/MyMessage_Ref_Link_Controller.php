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
 * If you want to extend this class write your coden in ControllerMyMessage
 *
 * NEVER WRITE CODE IN THIS CLASS
 * THE CONTENT OF THIS CLASS IS NOT PERSISTENT AND CAN CHANGE OFTEN
 * ALL YOUR CHANGES WILL BE OVERWRITEN!!!
 * YOU HAVE BEEN WARNED!!!
 *
 * @package WebFrap
 * @subpackage ModMessage
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class MyMessage_Ref_Link_Controller
  extends ControllerCrud
{

////////////////////////////////////////////////////////////////////////////////
// attributes
////////////////////////////////////////////////////////////////////////////////
    
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
    'tab' => array
    (
      'method'    => array( 'GET' ),
      'views'      => array( 'ajax' )
    ),
    'modal' => array
    (
      'method'    => array( 'GET' ),
      'views'      => array( 'modal' )
    ),
    'search' => array
    (
      'method'    => array( 'GET' ),
      'views'      => array( 'ajax' )
    ),
    'connect' => array
    (
      'method'    => array( 'POST', 'PUT' ),
      'views'      => array( 'ajax' )
    ),

  );
    
////////////////////////////////////////////////////////////////////////////////
// tab, listing & selection methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * Service zum laden des link Referenztabs
  * für den my_message management knoten
  *
  * Der Tab wird über das Ajax Interface ausgeliefert 
  *
  * @param TFlag $params named parameters
  * @return boolean false im fehlerfall
  */
  public function service_tab( $request, $response )
  {
    
    // laden der benötigten resourcen
    $user     = $this->getUser();


    // Die ID ist Plicht.
    // Ohne diese können wir keinen Datensatz identifizieren und somit auch
    // auf Anfage logischerweise nicht bearbeiten
    if( !$objid = $this->getOID() )
    {
      // Ok wir haben keine id bekommen, also ist hier schluss
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'The Request for {@service@} was invalid. ID was missing!',
          'wbf.message',
          array
          (
            'service' => $response->i18n->l
      (
        'My Messages',
        'my.message.label'
      )

          )
        ),
        Response::BAD_REQUEST
      );
    }


    // load request parameters an interpret as flags
    $params  = $this->getTabFlags( $request );


    $params->refId = $objid;
    $params->refIdLink = $objid;
    
    if(!$params->ltype)
      $params->ltype = 'table';

    $listType = ucfirst( $params->ltype );
    
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();
        
    $containerClass = "MyMessage_Ref_Link_".$listType."_Access";

    if( !Webfrap::classLoadable( $containerClass ) )
    {
      throw new InvalidRequest_Exception
      (  
        'Called invalid List Type',
        Response::NOT_FOUND
      );
    }
    
    $accessLink = new $containerClass( );
    $accessLink->load( $user->getProfileName(), $params );

    $params->aclNode = 'mgmt-my_message-ref-link';

    $params->accessLink = $accessLink;
    $params->paramsLink = $params;
    
    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
    if( !$accessLink->listing  )
    {
      // ausgabe einer fehlerseite und adieu
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'You have no permission to access this mask!',
          'wbf.message'
        ),
        Response::FORBIDDEN
      );
    }

    // set the save form id
    if( !$params->saveFormId )
      $params->saveFormId = 'wgt-form-my_message-edit-'.$objid;
      
    // die query soll nach der haupt query eine 2te query ausführen
    // um die anzahl der tatsächlichen datensätze ohne limit zu laden
    $params->loadFullSize = true;

    // create a new area with the id of the target element, this area will replace
    // the HTML Node of the target UI Element
    $view      = $response->loadView
    (
      $params->tabId,
      'MyMessage_Ref_Link_'.$listType,
      'displayTab',
      View::AREA
    );

    $view->setPosition( '#'.$params->tabId );
    
    $modelLink = $this->loadModel
    (
      'MyMessage_Ref_Link_'.$listType
    );
    $modelLink->setAccess( $accessLink );
    
    $view->setModel( $modelLink );

    $error = $view->displayTab( $objid, $params );

    if( $error )
    {
      return $error;
    }

    // everything is fine
    return State::OK;

  }//end public function service_tab */


 /**
  * Service zum laden des link Referenztabs
  * für den my_message management knoten
  *
  * Der Tab wird über das Ajax Interface ausgeliefert 
  *
  * @param TFlag $params named parameters
  * @return boolean false im fehlerfall
  */
  public function service_modal( $request, $response )
  {
    
    // laden der benötigten resourcen
    $user     = $this->getUser();


    // Die ID ist Plicht.
    // Ohne diese können wir keinen Datensatz identifizieren und somit auch
    // auf Anfage logischerweise nicht bearbeiten
    if( !$objid = $this->getOID() )
    {
      // Ok wir haben keine id bekommen, also ist hier schluss
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'The Request for {@service@} was invalid. ID was missing!',
          'wbf.message',
          array
          (
            'service' => $response->i18n->l
      (
        'My Messages',
        'my.message.label'
      )

          )
        ),
        Response::BAD_REQUEST
      );
    }


    // load request parameters an interpret as flags
    $params  = $this->getTabFlags( $request );


    $params->refId = $objid;
    $params->refIdLink = $objid;
    
    if(!$params->ltype)
      $params->ltype = 'table';

    $listType = ucfirst( $params->ltype );
    
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();
        
    $containerClass = "MyMessage_Ref_Link_".$listType."_Access";

    if( !Webfrap::classLoadable( $containerClass ) )
    {
      throw new InvalidRequest_Exception
      (  
        'Called invalid List Type',
        Response::NOT_FOUND
      );
    }
    
    $accessLink = new $containerClass( );
    $accessLink->load( $user->getProfileName(), $params );

    $params->aclNode = 'mgmt-my_message-ref-link';

    $params->accessLink = $accessLink;
    $params->paramsLink = $params;
    
    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
    if( !$accessLink->listing  )
    {
      // ausgabe einer fehlerseite und adieu
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'You have no permission to access this mask!',
          'wbf.message'
        ),
        Response::FORBIDDEN
      );
    }

    // set the save form id
    if( !$params->saveFormId )
      $params->saveFormId = 'wgt-form-my_message-edit-'.$objid;
      
    // die query soll nach der haupt query eine 2te query ausführen
    // um die anzahl der tatsächlichen datensätze ohne limit zu laden
    $params->loadFullSize = true;

    // create a new area with the id of the target element, this area will replace
    // the HTML Node of the target UI Element
    $view      = $response->loadView
    (
      $params->tabId,
      'MyMessage_Ref_Link_'.$listType,
      'displayTab'
    );

    $modelLink = $this->loadModel
    (
      'MyMessage_Ref_Link_'.$listType
    );
    $modelLink->setAccess( $accessLink );
    
    $view->setModel( $modelLink );

    $error = $view->displayTab( $objid, $params );

    if( $error )
    {
      return $error;
    }

    // everything is fine
    return State::OK;

  }//end public function service_modal */


  /**
   * the search method for the main table
   * this method is called for paging and search requests
   * it's not recommended to use another method than this for paging, cause
   * this method makes shure that you can page between the search results
   * and do not loose your filters in paging
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function service_search( $request, $response )
  {

    $user      = $this->getUser();


    // Die ID ist Plicht.
    // Ohne diese können wir keinen Datensatz identifizieren und somit auch
    // auf Anfage logischerweise nicht bearbeiten
    if( !$objid = $this->getOID() )
    {
      // Ok wir haben keine id bekommen, also ist hier schluss
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'The Request for {@service@} was invalid. ID was missing!',
          'wbf.message',
          array
          (
            'service' => $response->i18n->l
      (
        'My Messages',
        'my.message.label'
      )

          )
        ),
        Response::BAD_REQUEST
      );
    }


    // extrahieren der flow control flags aus dem benutzer request
    $params       = $this->getListingFlags( $request );
    
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();
    
    if(!$params->ltype)
      $params->ltype = 'table';

    $listType = ucfirst( $params->ltype );

    $containerClass = "MyMessage_Ref_Link_".$listType."_Access";

    if( !Webfrap::classLoadable( $containerClass ) )
    {
      throw new InvalidRequest_Exception
      (  
        'Called invalid List Type',
        Response::NOT_FOUND
      );
    }
    
    $accessLink = new $containerClass( );
    $accessLink->load( $user->getProfileName(), $params );

    $params->aclNode = 'mgmt-my_message-ref-link';

    $params->accessLink = $accessLink;
    $params->paramsLink = $params;

    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
    if( !$accessLink->listing  )
    {
      // ausgabe einer fehlerseite und adieu
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'You have no permission to access this mask!',
          'wbf.message'
        ),
        Response::FORBIDDEN
      );
    }

    // set the ajax flag for custom rendering
    $params->ajax = true;

    // die query soll nach der haupt query eine 2te query ausführen
    // um die anzahl der tatsächlichen datensätze ohne limit zu laden
    $params->loadFullSize = true;

    // set the save form id
    if( !$params->saveFormId )
      $params->saveFormId = 'wgt-form-my_message-edit-'.$objid;

    $model   = $this->loadModel( 'MyMessage_Ref_Link_'.$listType );

    $view    = $response->loadView
    ( 
    	'my_message-ref-link-'.$listType.'-ajax',
    	'MyMessage_Ref_Link_'.$listType,
    	'displaySearch',
    	View::AJAX
    );

    $view->setModel( $model );

    $error = $view->displaySearch( $objid, $params );


    // Die Views geben eine Fehlerobjekt zurück, wenn ein Fehler aufgetreten
    // ist der so schwer war, dass die View den Job abbrechen musste
    // alle nötigen Informationen für den Enduser befinden sich in dem
    // Objekt
    // Standardmäßig entscheiden wir uns mal dafür diese dem User auch Zugänglich
    // zu machen und übergeben den Fehler der ErrorPage welche sich um die
    // korrekte Ausgabe kümmert
    if( $error )
    {

      return $error;
    }

	
		$response->setStatus( Response::OK );
    // wunderbar, kein fehler also melden wir einen Erfolg zurück
    return null;


  }//end public function service_search */

////////////////////////////////////////////////////////////////////////////////
// else
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * delete a WbfsysDataLink by an ajax request
   * @return boolean
   */
  public function cleanPost( )
  {

    $this->request->removePost( 'wbfsys_data_index' ); //def wbfsys_data_index
    $this->request->removePost( 'wbfsys_data_link' ); //def wbfsys_data_link


  } // end public function cleanPost */

 /**
  * connect existining WbfsysDataIndex to a MyMessage
  *
  * @param TFlag $params named parameters
  */
  public function service_connect( $request, $response )
  {

    // get the parameters from the userinput
    $params = $this->getCrudFlags( $request );
    
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    // zugriffsrechte der referenz prüfen
    $access = $acl->getPathPermission
    (
      $params->aclRoot,
      $params->aclRootId,
      $params->aclLevel,
      $params->aclKey,
      $params->refId,
      'mgmt-my_message-ref-link'
    );

    $params->aclNode = 'mgmt-my_message-ref-link';

    $params->accessLink = $access;
    $params->paramsLink = $params;

    $model  = $this->loadModel( 'MyMessage_Ref_Link_Crud' );
    $model->setAccess( $access );

    // etrahieren der benötigten Daten aus dem request Object
    if( !$model->fetchConnectData( $params ) )
    {
      return new Error
      (
        'The Databody of this request was invalid!',
        Error::INVALID_REQUEST
      );
    }

    // check if a reference with this id's allready exist, normally we do
    // not want to have more than one reference between two entites
    if( !$model->checkUnique() )
    {

      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'This Assignment allready exists!',
          'wbf.message'
        ),
        Error::CONFLICT
      );

    }

    // check if we got all needed ids
    if
    (
      !$refId = $request->data
      (
        'wbfsys_data_link',
        Validator::EID ,
        'id_link'
      )
    )
    {
      // Ok wir haben keine id bekommen, also ist hier schluss
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'The Request for {@service@} was invalid. ID was missing!',
          'wbf.message',
          array
          (
            'service' => 'connect'
          )
        ),
        Response::BAD_REQUEST
      );
    }

    $orm = $this->getDb()->getOrm();

    // load the entity Model
    $entityWbfsysDataIndex = $orm->get( 'WbfsysDataIndex', $refId );

    $model->register
    (
      'entityWbfsysDataIndex',
      $entityWbfsysDataIndex
    );





    /*
     * cause this is a pure ajax request we need no error handling if the insert
     * fails.
     * The Error Message will be handelt by the message system
     */
    if( $model->insert( $params ) )
    {

      
      // erstellen eines listenelement eintrags und senden des
      // Eintrags über das XML Interface
      if( !$params->ltype )
        $params->ltype = 'table';
        
      $conEntiy = $model->getEntity();
      
      // zugriffsrechte der referenz prüfen
      $access = $acl->getPathPermission
      (
        $params->aclRoot,
        $params->aclRootId,
        $params->aclLevel,
        $params->aclKey,
        $params->refId,
        'mgmt-my_message-ref-link',
        $conEntiy
      );
  
      $params->accessLink = $access;

      $listType = ucfirst( $params->ltype );

      $ui = $this->loadUi( 'MyMessage_Ref_Link_'.$listType );
      $listModel = $this->loadModel( 'MyMessage_Ref_Link_'.$listType );
      $listModel->setAccess( $access );
      $ui->setModel( $listModel );

      if( !$ui->listEntry
      ( 
        $conEntiy->getData( 'id_link' ), 
        $access, 
        $params, 
        true 
      ))
      {
        return false;
      }


      $this->cleanPost();
      $model->reset();
    }
    else
    {


    }
    
    $conEntiy = $model->getEntity();
    
    // zugriffsrechte der referenz prüfen
    $access = $acl->getPathPermission
    (
      $params->aclRoot,
      $params->aclRootId,
      $params->aclLevel,
      $params->aclKey,
      $params->refId,
      'mgmt-my_message-ref-link',
      $conEntiy
    );

    $params->accessLink = $access;
    $model->setAccess( $access );




    return true;

  }//end public function service_connect */


} // end MyMessage_Ref_Link_Controller

