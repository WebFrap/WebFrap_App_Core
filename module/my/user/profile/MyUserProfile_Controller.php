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
 * @subpackage ModUserProfile
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class MyUserProfile_Controller
  extends ControllerCrud
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
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
    'create' => array
    (
      'method'    => array( 'GET', 'POST' ),
      'views'      => array( 'modal', 'maintab' )
    ),
    'edit' => array
    (
      'method'    => array( 'GET', 'PUT' ),
      'views'      => array( 'modal', 'maintab' )
    ),
    'show' => array
    (
      'method'    => array( 'GET' ),
      'views'      => array( 'modal', 'maintab' )
    ),
    'data' => array
    (
      'method'    => array( 'GET' ),
      'views'      => array( 'ajax' )
    ),
    'append' => array
    (
      'method'    => array( 'GET' ),
      'views'      => array( 'ajax' )
    ),
    'listing' => array
    (
      'method'    => array( 'GET', 'POST' ),
      'views'      => array( 'modal', 'maintab' )
    ),
    'search' => array
    (
      'method'    => array( 'GET', 'POST' ),
      'views'      => array( 'ajax' )
    ),
    'selection' => array
    (
      'method'    => array( 'GET', 'POST' ),
      'views'      => array( 'modal', 'maintab' )
    ),
    'filter' => array
    (
      'method'    => array( 'GET', 'POST' ),
      'views'      => array( 'ajax' )
    ),
    'autocomplete' => array
    (
      'method'    => array( 'GET', 'POST' ),
      'views'      => array( 'ajax' )
    ),
    'textbykey' => array
    (
      'method'    => array( 'GET', 'POST' ),
      'views'      => array( 'ajax' )
    ),
    'delete' => array
    (
      'method'    => array( 'DELETE' ),
      'views'      => array( 'ajax' )
    ),
    'insert' => array
    (
      'method'    => array( 'POST' ),
      'views'      => array( 'ajax', 'modal', 'maintab' )
    ),
    'update' => array
    (
      'method'    => array( 'POST', 'PUT' ),
      'views'      => array( 'ajax', 'modal', 'maintab' )
    ),
    'deleteall' => array
    (
      'method'    => array( 'DELETE' ),
      'views'      => array( 'ajax' )
    ),
    'deleteselection' => array
    (
      'method'    => array( 'DELETE' ),
      'views'      => array( 'ajax' )
    ),

  );


////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
////////////////////////////////////////////////////////////////////////////////
// Crud Persistence Methodes
////////////////////////////////////////////////////////////////////////////////
    
////////////////////////////////////////////////////////////////////////////////
// Table & List Methodes
////////////////////////////////////////////////////////////////////////////////
    
////////////////////////////////////////////////////////////////////////////////
// request methodes for data
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * data is a call for request form data
  * if the param full_load is in the url data will send all entity data
  * in a form replacement ajax responce
  *
  * default is just to send the text value of the requested entity and
  * position it in a input field, normally used for window assignments
  *
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  *
  * @throws InvalidRequest_Exception
  * @throws AccessDenied_Exception
  */
  public function service_data( $request, $response )
  {

    // resource laden
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
            'service' => 'data'
          )
        ),
        Response::BAD_REQUEST
      );
    }


    // erst mal brauchen wir das passende model
    $model = $this->loadModel( 'MyUserProfile_Crud' );

    // dann das passende entitiy objekt für den datensatz
    $entityMyUserProfile = $model->getEntityMyUserProfile( $objid );

    // wenn null zurückgegeben wurde existiert der datensatz nicht
    // daher muss das System eine 404 Meldung zurückgeben
    if( !$entityMyUserProfile )
    {
      // if not this request is per definition invalid
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'The requested {@resource@} for ID {@id@} not exists!',
          'wbf.message',
          array
          (
            'resource'  => $response->i18n->l( 'My Profile', 'my.user_profile.label' ),
            'id'        => $objid
          )
        ),
        Response::NOT_FOUND
      );
    }


    // ok nun kommen wir zu der zugriffskontrolle
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    // da wir die zugriffsrechte mehr als nur einmal brauchen holen wir uns
    // direkt das zugriffslevel
    $access = $acl->getPermission
    (
      'mod-wbfsys>mod-wbfsys-cat-core_data',
      $entityMyUserProfile
    );

    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
    if( !$access->access )
    {
      // ausgabe einer fehlerseite und adieu
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'You have no permission to access {@resource@}:{@id@}',
          'wbf.message',
          array
          (
            'resource' => $response->i18n->l
            (
              'My Profile',
              'my.user_profile.label'
            ),
            'id' => $objid
          )
        ),
        Response::FORBIDDEN
      );
    }


    // if the params are empty create a params object
    $params = new TFlag();

    // fetch the user parameters and map them on the param object
    $params->input     = $request->param( 'input', Validator::CKEY );
    $params->fullLoad  = $request->param( 'full_load', Validator::CNAME );
    $params->keyName   = $request->param( 'key_name', Validator::CKEY );
    $params->suffix    = $request->param( 'suffix', Validator::CKEY );
    $params->context   = $request->param( 'context', Validator::CKEY );

    // der contextKey wird benötigt um potentielle Konflikte in der UI
    // bei der Anzeige von mehreren Windows oder Tabs zu vermeiden
    
    if( $params->context && 'create' == $params->context )
      $params->contextKey = 'my_user_profile-data-'.$objid;
    else
      $params->contextKey = 'my_user_profile-data';

    // laden der passenden view
    $view = $response->loadView
    (
      'tmp-my_user_profile',
      'MyUserProfile',
      'displayData'
    );

    // model und request werden zwecks inversion of control an die view
    // übergeben
    $model->setAccess( $access );
    $view->setModel( $model );



    // wenn alles glatt geht gibt die view null zurück und der keks ist gegessen
    $error = $view->displayData( $entityMyUserProfile, $params );


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


  }//end public function service_data */

 /**
  * data is a call for request form data
  * if the param full_load is in the url data will send all entity data
  * in a form replacement ajax responce
  *
  * default is just to send the text value of the requested entity and
  * position it in a input field, normally used for window assignments
  *
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  *
  * @throws InvalidRequest_Exception
  * @throws AccessDenied_Exception
  */
  public function service_append( $request, $response )
  {

    // resource laden
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
            'service' => 'append'
          )
        ),
        Response::BAD_REQUEST
      );
    }


    // erst mal brauchen wir das passende model
    $model = $this->loadModel( 'MyUserProfile_Crud' );

    // dann das passende entitiy objekt für den datensatz
    $entityMyUserProfile = $model->getEntityMyUserProfile( $objid );

    // wenn null zurückgegeben wurde existiert der datensatz nicht
    // daher muss das System eine 404 Meldung zurückgeben
    if( !$entityMyUserProfile )
    {
      // if not this request is per definition invalid
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'The requested {@resource@} for ID {@id@} not exists!',
          'wbf.message',
          array
          (
            'resource'  => $response->i18n->l( 'My Profile', 'my.user_profile.label' ),
            'id'        => $objid
          )
        ),
        Response::NOT_FOUND
      );
    }


    // ok nun kommen wir zu der zugriffskontrolle
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    // da wir die zugriffsrechte mehr als nur einmal brauchen holen wir uns
    // direkt das zugriffslevel
    $access = $acl->getPermission
    (
      'mod-wbfsys>mod-wbfsys-cat-core_data',
      $entityMyUserProfile
    );

    // jo ändern können sollte er schon
    if( !$access->update )
    {
      // ausgabe einer fehlerseite und adieu
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'You have no permission to access {@resource@}:{@id@}',
          'wbf.message',
          array
          (
            'resource'  => $response->i18n->l
            (
              'My Profile',
              'my.user_profile.label'
            ),
            'id'        => $objid
          )
        ),
        Response::FORBIDDEN
      );
    }



    // interpret the parameters from the request
    $params = $this->getCrudFlags( $request );
    $params->access = $access;

    // der contextKey wird benötigt um potentielle Konflikte in der UI
    // bei der Anzeige von mehreren Windows oder Tabs zu vermeiden
    $params->contextKey = 'my_user_profile-append-'.$objid;

    // fetch only id fields from the request
    $fields = $request->paramSearchIds();

    // fetch the data from the http request and load it in the model registry
    // if fails stop here
    if( !$model->fetchUpdateData( $entityMyUserProfile, $params ) )
    {
      // wenn die daten nicht valide sind, dann war es eine ungültige anfrage
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'The Update Request for {@resource@} was invalid.',
          'wbf.message',
          array
          (
            'resource' => $response->i18n->l
            (
              'My Profile',
              'my.user_profile.label'
            )
          )
        ),
        Response::BAD_REQUEST
      );
    }

    // when we are here the data must be valid ( if not your meta model is broken! )
    // try to update
    if( $error = $model->update( $params ) )
    {


      // hm ok irgendwas ist gerade ziemlich schief gelaufen
      return $error;
    }


    
    if(!$params->ltype)
      $params->ltype = 'table';

    $listType = ucfirst( $params->ltype );

    // send the table rows of the affected entries to the browser
    $ui = $this->loadUi( 'MyUserProfile_'.$listType );
    $model->setAccess( $access );
    $ui->setModel( $model );

    if( !$ui->listEntry( $params->accecss, $params, true ) )
      return false;

    // if this point is reached everything is fine
    return true;

  }//end public function service_append */

  /**
   * request the value of a specific field in the database by a given id
   * and a fieldname
   * @param LibRequestHttp $request
   * @param LibResponseHttp $response
   * @return void
   */
  public function service_textByKey( $request, $response )
  {

    // resource laden
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
            'service' => 'textByKey'
          )
        ),
        Response::BAD_REQUEST
      );
    }


    // erst mal brauchen wir das passende model
    $model = $this->loadModel( 'MyUserProfile_Crud' );

    // dann das passende entitiy objekt für den datensatz
    $entityMyUserProfile = $model->getEntityMyUserProfile( $objid );

    // wenn null zurückgegeben wurde existiert der datensatz nicht
    // daher muss das System eine 404 Meldung zurückgeben
    if( !$entityMyUserProfile )
    {
      // if not this request is per definition invalid
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'The requested {@resource@} for ID {@id@} not exists!',
          'wbf.message',
          array
          (
            'resource'  => $response->i18n->l( 'My Profile', 'my.user_profile.label' ),
            'id'        => $objid
          )
        ),
        Response::NOT_FOUND
      );
    }


    // ok nun kommen wir zu der zugriffskontrolle
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    $access = new MyUserProfile_Crud_Access_Listing( null, null, $this );
    $access->load( $user->getProfileName(), $params );

    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
    if( !$access->access )
    {
      // ausgabe einer fehlerseite und adieu
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'You have no permission to access {@resource@}:{@id@}',
          'wbf.message',
          array
          (
            'resource' => $response->i18n->l( 'My Profile', 'my.user_profile.label' ),
            'id' => $objid
          )
        ),
        Response::FORBIDDEN
      );
    }


    // if the params are empty create a params object
    $params = new TFlag();
      

    // der contextKey wird benötigt um potentielle Konflikte in der UI
    // bei der Anzeige von mehreren Windows oder Tabs zu vermeiden
    $params->contextKey = 'my_user_profile-text_by_key_'.$objid;

    $params->target = $request->param( 'target', Validator::CNAME );

    $ui = $this->loadUi( 'MyUserProfile_Crud' );
    $model->setAccess( $access );
    $ui->setModel( $model );


    $ui->textByKey( $entityMyUserProfile, $params );



  }//end public function service_textByKey */

  /**
   * Standard Service für Autoloadelemente wie zb. Window Inputfelder
   * Über diesen Service kann analog zu dem Selection / Search Service
   * Eine gefilterte Liste angefragt werden um Zuweisungen zu vereinfachen
   *
   * @param LibRequestHttp $request
   * @param LibResponseHttp $response
   * @return void
   */
  public function service_autocomplete( $request, $response )
  {

    // resource laden
    $user     = $this->getUser();
    $acl      = $this->getAcl();

    // check the permissions
    if( !$acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing'  ) )
    {
      // ausgabe einer fehlerseite und adieu
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'You have no permission to access {@service@}',
          'wbf.message',
          array
          (
            'service' => $response->i18n->l( 'Autocomplete', 'wbf.label' )
          )
        ),
        Response::FORBIDDEN
      );
    }


    // load request parameters an interpret as flags
    $params = $this->getListingFlags( $request );

    // der contextKey wird benötigt um potentielle Konflikte in der UI
    // bei der Anzeige von mehreren Windows oder Tabs zu vermeiden
    $params->contextKey = 'my_user_profile-autocomplete';

    $view  = $response->loadView
    (
    	'my_user_profile-ajax', 
    	'MyUserProfile',
    	'displayAutocomplete',
    	View::AJAX
    );
    /* @var $model MyUserProfile_Crud_Model */
    $model  = $this->loadModel( 'MyUserProfile_Crud' );
    //$model->setAccess( $access );
    $view->setModel( $model );

    $searchKey  = $this->request->param( 'key', Validator::TEXT );

    $error = $view->displayAutocomplete( $searchKey, $params );

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


  }//end public function service_autocomplete */

////////////////////////////////////////////////////////////////////////////////
// Protected temporary methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * clean the post data after a sucess full request
   * @return boolean
   */
  public function cleanPost( )
  {

    $this->request->removeData( 'my_user_profile' ); //def my_user_profile
    $this->request->removeData( 'core_person' );


    // still running? fine :-)
    return true;

  }//end public function cleanPost */

} // end class MyUserProfile_Controller */

