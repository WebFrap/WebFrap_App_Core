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
 * If you want to extend this class write your coden in ControllerWbfsysEntity
 *
 * NEVER WRITE CODE IN THIS CLASS
 * THE CONTENT OF THIS CLASS IS NOT PERSISTENT AND CAN CHANGE OFTEN
 * ALL YOUR CHANGES WILL BE OVERWRITEN!!!
 * YOU HAVE BEEN WARNED!!!
 *
 * @package WebFrap
 * @subpackage ModEntity
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysEntity_Ref_Attributes_Controller
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
  );
    
////////////////////////////////////////////////////////////////////////////////
// listing & selection methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * Service zum laden des attributes Referenztabs
  * für den wbfsys_entity management knoten
  *
  * Der Tab wird über das Ajax Interface ausgeliefert 
  *
  * @param TFlag $params named parameters
  * @return boolean false im fehlerfall
  */
  public function service_tab( $request, $response )
  {

    // laden der benötigten resource objekte
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
        'Entity',
        'wbfsys.entity.label'
      )

          )
        ),
        Response::BAD_REQUEST
      );
    }


    // etrahieren der control flags aus dem user request
    $params  = $this->getTabFlags( $request );

    $params->refId = $objid;    
    $params->refIdAttributes = $objid;
    
    // wenn kein listenelement expliziet angeforder wird, wird hier
    // standardmäßig table verwendet
    if(!$params->ltype)
      $params->ltype = 'table';

    $listType = ucfirst($params->ltype);
    
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    $containerClass = "WbfsysEntity_Ref_Attributes_".$listType."_Access";

    if( !Webfrap::classLoadable( $containerClass ) )
    {
      throw new InvalidRequest_Exception
      (  
        'Called invalid List Type',
        Response::NOT_FOUND
      );
    }
    
    $accessAttributes = new $containerClass( );
    $accessAttributes->load( $user->getProfileName(), $params );

    $params->aclNode = 'mod-wbfsys-cat-core_data-ref-attributes';

    $params->accessAttributes = $accessAttributes;
    $params->paramsAttributes = $params;
    
    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
    if( !$accessAttributes->listing  )
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
      $params->saveFormId = 'wgt-form-wbfsys_entity-edit-'.$objid;
      
    // die query soll nach der haupt query eine 2te query ausführen
    // um die anzahl der tatsächlichen datensätze ohne limit zu laden
    $params->loadFullSize = true;



    // create a new area with the id of the target element, this area will replace
    // the HTML Node of the target UI Element
    $view      = $response->loadView
    (
      $params->tabId,
      'WbfsysEntity_Ref_Attributes_'.$listType,
      'displayTab',
      View::AREA
    );

    $view->setPosition( '#'.$params->tabId );
    
    $modelAttributes = $this->loadModel
    (
      'WbfsysEntity_Ref_Attributes_'.$listType
    );
    $modelAttributes->setAccess( $accessAttributes );
    
    $view->setModel( $modelAttributes );

    $error = $view->displayTab( $objid, $params );


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


  }//end public function service_tab */


 /**
  * Service zum laden des attributes Referenztabs
  * für den wbfsys_entity management knoten
  *
  * Der Tab wird über das Ajax Interface ausgeliefert 
  *
  * @param TFlag $params named parameters
  * @return boolean false im fehlerfall
  */
  public function service_modal( $request, $response )
  {

    // laden der benötigten resource objekte
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
        'Entity',
        'wbfsys.entity.label'
      )

          )
        ),
        Response::BAD_REQUEST
      );
    }


    // etrahieren der control flags aus dem user request
    $params  = $this->getTabFlags( $request );

    $params->refId = $objid;    
    $params->refIdAttributes = $objid;
    
    // wenn kein listenelement expliziet angeforder wird, wird hier
    // standardmäßig table verwendet
    if(!$params->ltype)
      $params->ltype = 'table';

    $listType = ucfirst($params->ltype);
    
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    $containerClass = "WbfsysEntity_Ref_Attributes_".$listType."_Access";

    if( !Webfrap::classLoadable( $containerClass ) )
    {
      throw new InvalidRequest_Exception
      (  
        'Called invalid List Type',
        Response::NOT_FOUND
      );
    }
    
    $accessAttributes = new $containerClass( );
    $accessAttributes->load( $user->getProfileName(), $params );

    $params->aclNode = 'mod-wbfsys-cat-core_data-ref-attributes';

    $params->accessAttributes = $accessAttributes;
    $params->paramsAttributes = $params;
    
    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
    if( !$accessAttributes->listing  )
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
      $params->saveFormId = 'wgt-form-wbfsys_entity-edit-'.$objid;
      
    // die query soll nach der haupt query eine 2te query ausführen
    // um die anzahl der tatsächlichen datensätze ohne limit zu laden
    $params->loadFullSize = true;



    // create a new area with the id of the target element, this area will replace
    // the HTML Node of the target UI Element
    $view      = $response->loadView
    (
      $params->tabId,
      'WbfsysEntity_Ref_Attributes_'.$listType,
      'displayTab'
    );

    $modelAttributes = $this->loadModel
    (
      'WbfsysEntity_Ref_Attributes_'.$listType
    );
    $modelAttributes->setAccess( $accessAttributes );
    
    $view->setModel( $modelAttributes );

    $error = $view->displayTab( $objid, $params );


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
        'Entity',
        'wbfsys.entity.label'
      )

          )
        ),
        Response::BAD_REQUEST
      );
    }


    // load the flow flags
    $params       = $this->getListingFlags( $request );

    // the default listing type is table here
    // this value is valid when there is a specific listing implementation
    // for this type
    if( !$params->ltype )
      $params->ltype = 'table';

    $listType = ucfirst( $params->ltype );
    
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    $containerClass = "WbfsysEntity_Ref_Attributes_".$listType."_Access";

    if( !Webfrap::classLoadable( $containerClass ) )
    {
      throw new InvalidRequest_Exception
      (  
        'Called invalid List Type',
        Response::NOT_FOUND
      );
    }
    
    $accessAttributes = new $containerClass( );
    $accessAttributes->load( $user->getProfileName(), $params );

    $params->aclNode = 'mod-wbfsys-cat-core_data-ref-attributes';

    $params->accessAttributes = $accessAttributes;
    $params->paramsAttributes = $params;

    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
    if( !$accessAttributes->listing  )
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
      $params->saveFormId = 'wgt-form-wbfsys_entity-edit-'.$objid;

    $params->refId = $objid;    $params->refIdAttributes = $objid;

    // load the model and run the search
    $model   = $this->loadModel( 'WbfsysEntity_Ref_Attributes_'.$listType );

    $view    = $response->loadView
    ( 
    	'wbfsys_entity-ref-attributes-'.$listType.'-ajax',
    	'WbfsysEntity_Ref_Attributes_'.$listType,
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
   * delete a WbfsysEntityAttribute by an ajax request
   * @return boolean
   */
  public function cleanPost( )
  {

    $this->request->removePost( 'wbfsys_entity_attribute' ); //def wbfsys_entity_attribute


  } // end public function cleanPost */

} // end WbfsysEntity_Ref_Attributes_Controller

