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
 * @subpackage ModPerson
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CorePerson_Controller
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

  );


////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  *
  * de:
  * {
  *   Diese Methode erstellt das Markup für ein Formular zum erstellen eines
  *   Datensatzes des types: core_person
  *
  *   Diese Methode kann sowohl mit GET als mit POST angesprochen werden.
  *   Mit POST können direkt Standardwerte in ein Formular übergeben weden
  *
  *   Unterstüzte Views:
  *   <ul>
  *     <li>Maintab (standard)</li>
  *     <li>Mainwindow</li>
  *     <li>Modal</li>
  *   </ul>
  *   @tutorial <a href="http://webfrap.net/doc/{{version}}/index.php?page=architecture.views.overview" >Tutorial Viewtypes</a>
  *
  *   @url maintab.php?c=Core.Person.create
  *
  *   @type UI Service
  *   @param LibRequestHttp $request
  *   @param LibResponseHttp $response
  *
  *   @throws InvalidRequest_Exception
  *   @throws AccessDenied_Exception
  * }
  */
  public function service_create( $request, $response )
  {

    // resource laden
    $user      = $this->getUser();
    
    // prüfen ob irgendwelche steuerflags übergeben wurde
    $params  = $this->getFormFlags( $request );

    // der contextKey wird benötigt um potentielle Konflikte in der UI
    // bei der Anzeige von mehreren Windows oder Tabs zu vermeiden
    $params->contextKey = 'core_person-create';

    $access = new CorePerson_Crud_Access_Create( null, null, $this );
    $access->load( $user->getProfileName(), $params );

    // der Access Container des Users für die Resource wird als flag übergeben
    $params->access = $access;

    // wenn er keine neuen Datensätze erstellen darf können wir direkt aufhören
    if( !$access->insert )
    {
      // ausgabe einer fehlerseite und adieu
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'You have no permission to create new entries for {@resource@}!',
          'wbf.message',
          array
          (
            'resource' => $response->i18n->l
            (
              'Person',
              'core.person.label'
            )
          )
        ),
        Response::FORBIDDEN
      );
    }

    $view = $response->loadView
    (
      'form-core_person-create',
      'CorePerson_Crud_Create',
      'displayForm',
      null,
      true
    );
    // laden des models und direkt übergabe in die view
    /* @var $model CorePerson_Crud_Model */
    $model = $this->loadModel( 'CorePerson_Crud' );
    $model->setAccess( $access );
    $view->setModel( $model );

    // die view zum baue des formulars veranlassen
    $error = $view->displayForm( $params );

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


  }//end public function service_create */

 /**
  *
  * de:
  * {
  *   Diese Methode erstellt das Markup für ein Formular zum edititieren eines
  *   Datensatzes des types: core_person
  *
  *   Neben den reinem formularelementen werden referenzen in form von tabs
  *   abgebildet.
  *
  *   Diese Methode kann im gegensatz zu create nicht mit POST sondern nur
  *   per GET Request angesprochen werden.
  *   Das ist wichtig, da sonst für den Benutzer intransparent Datensätze
  *   verändert werden könnten, wenn man mit den Daten aus POST die Input felder
  *   überschreibt
  *
  *   Unterstüzte Views:
  *   <ul>
  *     <li>Maintab (standard)</li>
  *     <li>Mainwindow</li>
  *     <li>Modal</li>
  *   </ul>
  *   @tutorial <a href="http://webfrap.net/doc/{{version}}/index.php?page=architecture.views.overview" >Tutorial Viewtypes</a>
  *
  *   @access maintab.php?c=Core.Person.edit&objid=123
  *
  *   @type UI Service
  *   @param LibRequestHttp $request
  *   @param LibResponseHttp $response
  *
  *   @throws InvalidRequest_Exception
  *   @throws AccessDenied_Exception
  * }
  */
  public function service_edit( $request, $response )
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
            'service' => 'edit'
          )
        ),
        Response::BAD_REQUEST
      );
    }


    // erst mal brauchen wir das passende model
    $model = $this->loadModel( 'CorePerson_Crud' );

    // dann das passende entitiy objekt für den datensatz
    $entityCorePerson = $model->getEntityCorePerson( $objid );

    // wenn null zurückgegeben wurde existiert der datensatz nicht
    // daher muss das System eine 404 Meldung zurückgeben
    if( !$entityCorePerson )
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
            'resource'  => $response->i18n->l( 'Person', 'core.person.label' ),
            'id'        => $objid
          )
        ),
        Response::NOT_FOUND
      );
    }

    // prüfen ob irgendwelche steuerflags übergeben wurde
    $params  = $this->getFormFlags( $request );
    
    // entity mit übergeben
    $params->entity = $entityCorePerson;

    // der contextKey wird benötigt um potentielle Konflikte in der UI
    // bei der Anzeige von mehreren Windows oder Tabs zu vermeiden
    $params->contextKey = 'core_person-edit-'.$objid;
    
    if( !$params->maskRoot )
    	$params->maskRoot = 'core_person:edit';

    $access = new CorePerson_Crud_Access_Edit( null, null, $this );
    $access->load( $user->getProfileName(), $params, $entityCorePerson );

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
            'resource'  => $response->i18n->l( 'Person', 'core.person.label' ),
            'id'        => $objid
          )
        ),
        Response::FORBIDDEN
      );
    }

    // der Access Container des Users für die Resource wird als flag übergeben
    $params->access = $access;
    // no embeded references 

    // laden der passenden view
    $view = $response->loadView
    (
      'form-core_person-edit-'.$objid,
      'CorePerson_Crud_Edit',
      'displayForm',
      null,
      true
    );
    
    // model und request werden zwecks inversion of control an die view
    // übergeben
    $model->setAccess( $access );
    $view->setModel( $model );

    
    // wenn alles glatt geht gibt die view null zurück und der keks ist gegessen
    $error = $view->displayForm( $objid, $params );

    // im Fehlerfall jedoch bekommen wir eine Error Objekt das wird noch kurz
    // behandeln sollten
    if( $error )
    {
          
      return $error;
    }
        
        $protocol = Protocol::getDefault();
        $protocol->updateLastVisited
        (
          'core_person-edit',
          $entityCorePerson,
          'Edit Person :'.$entityCorePerson->text()
        );

          
    return true;

  }//end public function service_edit */

 /**
  *
  * de:
  * {
  *   Diese Methode erstellt das Markup für ein Formular zum edititieren eines
  *   Datensatzes des types: core_person
  *
  *   Neben den reinem formularelementen werden referenzen in form von tabs
  *   abgebildet.
  *
  *   Diese Methode kann im gegensatz zu create nicht mit POST sondern nur
  *   per GET Request angesprochen werden.
  *   Das ist wichtig, da sonst für den Benutzer intransparent Datensätze
  *   verändert werden könnten, wenn man mit den Daten aus POST die Input felder
  *   überschreibt
  *
  *   Unterstüzte Views:
  *   <ul>
  *     <li>Maintab (standard)</li>
  *     <li>Mainwindow</li>
  *     <li>Modal</li>
  *   </ul>
  *   @tutorial <a href="http://webfrap.net/doc/{{version}}/index.php?page=architecture.views.overview" >Tutorial Viewtypes</a>
  *
  *   @access maintab.php?c=Core.Person.edit&objid=123
  *
  *   @type UI Service
  *   @param LibRequestHttp $request
  *   @param LibResponseHttp $response
  *
  *   @throws InvalidRequest_Exception
  *   @throws AccessDenied_Exception
  * }
  */
  public function service_show( $request, $response )
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
            'service' => 'show'
          )
        ),
        Response::BAD_REQUEST
      );
    }


    // erst mal brauchen wir das passende model
    $model = $this->loadModel( 'CorePerson_Crud' );

    // dann das passende entitiy objekt für den datensatz
    $entityCorePerson = $model->getEntityCorePerson( $objid );

    // wenn null zurückgegeben wurde existiert der datensatz nicht
    // daher muss das System eine 404 Meldung zurückgeben
    if( !$entityCorePerson )
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
            'resource'  => $response->i18n->l( 'Person', 'core.person.label' ),
            'id'        => $objid
          )
        ),
        Response::NOT_FOUND
      );
    }

    // prüfen ob irgendwelche steuerflags übergeben wurde
    $params  = $this->getFormFlags( $request );

    // der contextKey wird benötigt um potentielle Konflikte in der UI
    // bei der Anzeige von mehreren Windows oder Tabs zu vermeiden
    $params->contextKey = 'core_person-show-'.$objid;

    // wenn keine root übergeben wird oder wir in level 1 sind
    // dann befinden wir uns im root und brauchen keine pfadafrage
    // um potentielle fehler abzufangen wird auch direkt der richtige Root gesetzt
    // nicht das hier einer einen falschen pfad injected
    if( is_null($params->aclRoot) || 1 == $params->aclLevel  )
    {
      $params->isAclRoot     = true;
      $params->aclRoot       = 'mgmt-core_person';
      $params->maskRoot      = 'core_person:show';
      $params->aclRootId     = $objid;
      $params->aclKey        = 'mgmt-core_person';
      $params->aclNode       = 'mgmt-core_person';
      $params->aclLevel      = 1;
    }

    // ok nun kommen wir zu der zugriffskontrolle
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    // wenn wir in keinem pfad sind nehmen wir einfach die normalen
    // berechtigungen
    if( $params->isAclRoot )
    {
      // da wir die zugriffsrechte mehr als nur einmal brauchen holen wir uns
      // direkt einen acl container
      $access = $acl->getFormPermission
      (
        'mod-core>mgmt-core_person',
        $entityCorePerson
      );
    }
    else
    {
      // da wir die zugriffsrechte mehr als nur einmal brauchen holen wir uns
      // direkt das zugriffslevel
      $access = $acl->getPathPermission
      (
        $params->aclRoot,
        $params->aclRootId,
        $params->aclLevel,
        $params->aclKey,
        $params->refId,
        $params->aclNode,
        $entityCorePerson
      );
    }


    // der Access Container des Users für die Resource wird als flag übergeben
    $params->access = $access;


    // show ist per definition immer readonly
    $params->readOnly = true;

    // laden der passenden view
    $view = $response->loadView
    (
      'form-core_person-edit-'.$objid,
      'CorePerson_Crud_Show',
      'displayForm',
      null,
      true
    );

    // model und request werden zwecks inversion of control an die view
    // übergeben
    $model->setAccess( $access );
    $view->setModel( $model );




    // wenn alles glatt geht gibt die view null zurück und der keks ist gegessen
    $error = $view->displayForm( $objid, $params );

    // im Fehlerfall jedoch bekommen wir eine Error Objekt das wird noch kurz
    // behandeln sollten
    if( $error )
    {


      return $error;
    }
    
        
        $protocol = Protocol::getDefault();
        $protocol->updateLastVisited
        (
          'core_person-show',
          $entityCorePerson,
          'Show Person :'.$entityCorePerson->text()
        );






    return true;

  }//end public function service_show */


////////////////////////////////////////////////////////////////////////////////
// Crud Persistence Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * de:
  * Service zum Erstellen neuer Datensätze des types: core_person
  *
  * Diese Methode kann nur mit POST angesprochen werden, da nur vorgesehen
  * is neue datensätze anzuhängen, jedoch keine mit einer vorgegebenen ID
  * zu erstellen.
  *
  * @call POST ajax.php?c=Core.Person.insert
  * {
  *   @get_param: cname ltype, der Type der des Listenelements. Sollte sinnigerweise
  *     der gleich type wie das Listenelement sein, für das die Suche angestoßen wurde
  *
  *   @get_param: cname view_type, der genaue View Type, zb. Maintab, Modal etc.,
  *     welcher verwendet wurde den eintrag zu erstellen.
  *     Wird benötigt um im client die maske ansprechen zu können
  *
  *   @get_param: cname mask, Mask ist ein key mit dem angegeben wird welche
  *     View genau verwendet werden soll. Dieser Parameter ist nötig, da es pro
  *     tabelle mehrere management sichten geben kann die jeweils eigenen
  *     listenformate haben
  *
  *   @get_param: cname refid, Wird benötigt wenn dieser Datensatz in Relation
  *     zu einem Hauptdatensatz als referenz in einem Tab, bzw ManyToX Element
  *     erstellt wurde.
  *
  *   @get_param: cname view_id, Die genaue ID der Maske. Wird benötigt um
  *     die Maske bei der Rückgabe adressieren zu können
  *
  * }
  * 
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  *
  * @throws InvalidRequest_Exception
  * @throws AccessDenied_Exception
  */
  public function service_insert( $request, $response )
  {

    // resource laden
    $user      = $this->getUser();

    // create named params object
    $params = $this->getCrudFlags( $request );

    // der contextKey wird benötigt um potentielle Konflikte in der UI
    // bei der Anzeige von mehreren Windows oder Tabs zu vermeiden
    $params->contextKey = 'core_person-insert';

    $access = new CorePerson_Crud_Access_Insert( null, null, $this );
    $access->load( $user->getProfileName(),  $params );

    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
    if( !$access->insert )
    {
      // ausgabe einer fehlerseite und adieu
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'You have no permission to create {@resource@}',
          'wbf.message',
          array
          (
            'resource' => $response->i18n->l
            (
              'Person',
              'core.person.label'
            )
          )
        ),
        Response::FORBIDDEN
      );
    }


    // der Access Container des Users für die Resource wird als flag übergeben
    $params->access = $access;

    // das crud model wird zum validieren des requests und zum erstellen
    // des neuen datensatzes benötigt
    /* @var $model CorePerson_Crud_Model */
    $model = $this->loadModel( 'CorePerson_Crud' );
    $model->setAccess( $access );

    // die genauen fehlermeldungen werden direkt vom validator in die
    // message queue gepackt
    if( !$model->fetchInsertData( $params ) )
    {
      // wenn die daten nicht valide sind, dann war es eine ungültige anfrage
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'The Insert Request for {@resource@} was invalid.',
          'wbf.message',
          array
          (
            'resource' => $response->i18n->l( 'Person', 'core.person.label' )
          )
        ),
        Response::BAD_REQUEST
      );
    }


    // die daten in die datenbank persistieren
    // das modell hat die entity bereits in sich, daher müssen wir hier
    // nur noch die anweisung zum speichern geben
    if( $error = $model->insert( $params ) )
    {

      // hm ok irgendwas ist gerade ziemlich schief gelaufen
      throw new InvalidRequest_Exception
      (
        $error->message,
        $error->errorKey
      );
    }
    else
    {
    
    	$entityCorePerson = $model->getEntity();
    
      // der contextKey wird benötigt um potentielle Konflikte in der UI
      // bei der Anzeige von mehreren Windows oder Tabs zu vermeiden
      $params->contextKey = 'core_person-update-'.$entityCorePerson;
  
      $access = new CorePerson_Crud_Access_Update( null, null, $this );
      $access->load( $user->getProfileName(), $params, $entityCorePerson );
    


      if( !$params->ltype )
        $params->ltype = 'table';

      if( !$params->viewType )
        $params->viewType = 'maintab';

      $listType = ucfirst( $params->ltype );

      // die Maske über welche der neue Liste Eintrag gerendert werden soll
      if( !$params->mask )
        $params->mask = 'CorePerson';

      // laden der angeforderten view
      $view = $response->loadView
      (
        'listing_core_person',
        $params->mask.'_'.$listType,
        'displayInsert'
      );

      // model wird benötigt
      /* @var $model CorePerson_Table_Model */ // nicht zwangsweise dieses model aber höchstwarhscheinlich
      $model = $this->loadModel( $params->mask.'_'.$listType );
      $model->setAccess( $access );
      $view->setModel( $model );

      $error = $view->displayInsert( $params );

      // im Fehlerfall jedoch bekommen wir eine Error Objekt das wird noch kurz
      // behandeln sollten
      if( $error )
      {
        return $error;
      }

    }

    // wenn die reopen flag mitgeschickt wurde
    // soll der Datensatz direkt im Edit Window geöffnet werden
    if( $request->param( 'reopen', Validator::BOOLEAN ) )
    {
    	// den hauptdatensatz holen
      $this->editForm( $model->getEntity(), $model, $params );
    }

    $response->setStatus( Response::CREATED );
    
    // wenn wir hier ankommen, dann hat alles geklappt
    return true;

  }//end public function service_insert */

 /**
  * de:
  * Service zum updaten eines Datensazes
  *
  * @call POST ajax.php?c=Core.Person.update
  * {
  *   @get_param: cname ltype, der Type der des Listenelements. Sollte sinnigerweise
  *     der gleich type wie das Listenelement sein, für das die Suche angestoßen wurde
  *
  *   @get_param: cname view_type, der genaue View Type, zb. Maintab, Modal etc.,
  *     welcher verwendet wurde den eintrag zu erstellen.
  *     Wird benötigt um im client die maske ansprechen zu können
  *
  *   @get_param: cname mask, Mask ist ein key mit dem angegeben wird welche
  *     View genau verwendet werden soll. Dieser Parameter ist nötig, da es pro
  *     tabelle mehrere management sichten geben kann die jeweils eigenen
  *     listenformate haben
  *
  *   @get_param: cname refid, Wird benötigt wenn dieser Datensatz in Relation
  *     zu einem Hauptdatensatz als referenz in einem Tab, bzw ManyToX Element
  *     erstellt wurde.
  *
  *   @get_param: cname view_id, Die genaue ID der Maske. Wird benötigt um
  *     die Maske bei der Rückgabe adressieren zu können
  *
  * }
  *
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  *
  * @throws InvalidRequest_Exception
  * @throws AccessDenied_Exception
  */
  public function service_update( $request, $response )
  {

    // resource laden
    $user      = $this->getUser( );


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
            'service' => 'update'
          )
        ),
        Response::BAD_REQUEST
      );
    }


    // erst mal brauchen wir das passende model
    $model = $this->loadModel( 'CorePerson_Crud' );

    // dann das passende entitiy objekt für den datensatz
    $entityCorePerson = $model->getEntityCorePerson( $objid );

    // wenn null zurückgegeben wurde existiert der datensatz nicht
    // daher muss das System eine 404 Meldung zurückgeben
    if( !$entityCorePerson )
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
            'resource'  => $response->i18n->l( 'Person', 'core.person.label' ),
            'id'        => $objid
          )
        ),
        Response::NOT_FOUND
      );
    }


    // interpret the parameters from the request
    $params = $this->getCrudFlags( $request );

    // der contextKey wird benötigt um potentielle Konflikte in der UI
    // bei der Anzeige von mehreren Windows oder Tabs zu vermeiden
    $params->contextKey = 'core_person-update-'.$objid;

    $access = new CorePerson_Crud_Access_Update( null, null, $this );
    $access->load( $user->getProfileName(),  $params, $entityCorePerson );

    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
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
            'resource'  => $response->i18n->l( 'Person', 'core.person.label' ),
            'id'        => $objid
          )
        ),
        Response::FORBIDDEN
      );
    }

    // der Access Container des Users für die Resource wird als flag übergeben
    $params->access = $access;
    $model->setAccess( $access );
    
    

    // fetch the data from the http request and load it in the model registry
    // if fails stop here
    if( !$model->fetchUpdateData( $entityCorePerson, $params ) )
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
            'resource' => $response->i18n->l( 'Person', 'core.person.label' )
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

    
      

    if( !$params->ltype )
      $params->ltype = 'table';

    $listType = ucfirst( $params->ltype );
    
    // die Maske über welche der neue Liste Eintrag gerendert werden soll
    if( !$params->mask )
      $params->mask = 'CorePerson';

    // wirft einen InvalidRequest_Exception wenn die angeforderte View nicht vorhanden ist
    $view = $response->loadView
    (
      'listing_core_person',
      $params->mask.'_'.$listType,
      'displayUpdate'
    );

    // model wird benötigt
    /* @var $model CorePerson_Table_Model */ // nicht zwangsweise dieses model aber höchstwarhscheinlich
    $model = $this->loadModel( $params->mask.'_'.$listType );
    $model->setAccess( $access );
    $view->setModel( $model );

    $error = $view->displayUpdate( $params );

    // im Fehlerfall jedoch bekommen wir eine Error Objekt das wird noch kurz
    // behandeln sollten
    if( $error )
    {
      return $error;
    }


    if( $params->reload )
    {
      $params->targetMask = $params->mask;
      $this->editForm( $objid, $model, $params );
    }
    
    $response->setStatus( Response::CHANGED );

    // ok angekommen? dann ist ja alles klar
    return true;

  }//end public function service_update */

 /**
  *
  * @param int $objid container für benamte parameter
  * @param CorePerson_Crud_Model $model the model
  * @param TFlag $params container für benamte parameter
  *
  * @throws InvalidRequest_Exception
  * @throws AccessDenied_Exception
  *
  */
  protected function editForm( $objid, $model, $params )
  {

    // resource laden
    $request   = $this->getRequest();
    $response  = $this->getResponse();
    $user      = $this->getUser();
   
    if( !$params->maskRoot )
    	$params->maskRoot = 'core_person:edit';
        
    $access = $params->access;
    // no embeded references 

    $access->loadDefReferences( $params, $objid );

    // laden der passenden view
    $view = $response->loadView
    (
      'form-core_person-edit-'.$objid,
      'CorePerson_Crud_Edit',
      'displayForm',
      View::MAINTAB,
      true
    );
    
    // model und request werden zwecks inversion of control an die view
    // übergeben
    $view->setModel( $model );

    // wenn alles glatt geht gibt die view null zurück und der keks ist gegessen
    $error = $view->displayForm( $objid, $params );

    // im Fehlerfall jedoch bekommen wir eine Error Objekt das wird noch kurz
    // behandeln sollten
    if( $error )
    {
      return $error;
    }
    
    return true;

  }//end protected function editForm */


 /**
  * de:
  * service zum löschen eines eintrags aus der datenbank
  * der eintrag muss direkt mit der rowid adressiert werden
  *
  * @access DELETE ajax.php?c=Core.Person.delete&objid=123
  *
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  * @return boolean success flag
  */
  public function service_delete( $request, $response )
  {

    // resource laden
    $user      = $this->getUser();

    // prüfen ob eine valide id mit übergeben wurde
    if( !$objid = $this->getOID( ) )
    {
      // wenn nicht ist die anfrage per definition invalide
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'The Request for {@resource@} was invalid. ID was missing!',
          'wbf.message',
          array
          (
            'resource' => $response->i18n->l( 'Person', 'core.person.label' )
          )
        ),
        Response::BAD_REQUEST
      );
    }

    // erst mal brauchen wir das passende model
    /* @var $model CorePerson_Crud_Model */
    $model = $this->loadModel( 'CorePerson_Crud' );

    // dann das passende entitiy objekt für den datensatz
    $entityCorePerson = $model->getEntityCorePerson( $objid );

    // wenn null zurückgegeben wurde existiert der datensatz nicht
    // daher muss das System eine 404 Meldung zurückgeben
    if( !$entityCorePerson )
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
            'resource'  => $response->i18n->l( 'Person', 'core.person.label' ),
            'id'        => $objid
          )
        ),
        Response::NOT_FOUND
      );
    }


    // interpret the given user parameters
    $params = $this->getCrudFlags( $request );

    // der contextKey wird benötigt um potentielle Konflikte in der UI
    // bei der Anzeige von mehreren Windows oder Tabs zu vermeiden
    $params->contextKey = 'core_person-delete-'.$objid;

    $access = new CorePerson_Crud_Access_Delete( null, null, $this );
    $access->load( $user->getProfileName(), $params, $entityCorePerson );

    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
    if( !$access->delete )
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
            'resource'  => $response->i18n->l( 'Person', 'core.person.label' ),
            'id'        => $objid
          )
        ),
        Response::FORBIDDEN
      );
    }

    // der Access Container des Users für die Resource wird als flag übergeben
    $params->access = $access;
    $model->setAccess( $access );

    if( !$params->ltype )
      $params->ltype = 'table';

    if( !$params->mask )
      $params->mask = 'CorePerson';

    $listType = ucfirst( $params->ltype );

    $error = $model->delete( $entityCorePerson, $params );

    // try to delete the dataset
    if( $error )
    {


      // hm ok irgendwas ist gerade ziemlich schief gelaufen
      return $error;
    }


    // laden der angeforderten view
    $view = $response->loadView
    (
      'listing_core_person',
      $params->mask.'_'.$listType,
      'displayDelete',
      null,
      true
    );

    // model wird benötigt
    $view->setModel( $this->loadModel( $params->mask.'_'.$listType ) );



    $error = $view->displayDelete( $entityCorePerson, $params );

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

	
		$response->setStatus( Response::CHANGED );
    // wunderbar, kein fehler also melden wir einen Erfolg zurück
    return null;


  }//end public function service_delete */

////////////////////////////////////////////////////////////////////////////////
// Table & List Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * de:
  *
  * Die listing methode erstellt eine UI mit einer einem listenlement
  * das standardelement ist ein grid
  *
  * Diese Methode akzeptiert nur GET Requests
  *
  * Unterstüzte Views:
  * <ul>
  *   <li>Maintab (standard)</li>
  *   <li>Mainwindow</li>
  *   <li>Modal</li>
  * </ul>
  * @tutorial <a href="http://webfrap.net/doc/{{version}}/index.php?page=architecture.views.overview" >Tutorial Viewtypes</a>
  *
  * @url maintab.php?c=Core.Person.listing
  *
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  *
  * @throws InvalidRequest_Exception
  * @throws AccessDenied_Exception
  */
  public function service_listing( $request, $response )
  {

    // resource laden
    $user      = $this->getUser();

    // load request parameters an interpret as flags
    $params  = $this->getListingFlags( $request );

    // der contextKey wird benötigt um potentielle Konflikte in der UI
    // bei der Anzeige von mehreren Windows oder Tabs zu vermeiden
    $params->contextKey = 'core_person-listing';


    // wenn kein listentype definiert wurde, wird table als standard type
    // verwendet. Über den ltype kann der user über den parameter bestimmen
    // welches listingelement er gerne hätte
    if( !$params->ltype )
      $params->ltype = 'table';

    $listType = ucfirst( $params->ltype );
    
    // ok nun kommen wir zu der zugriffskontrolle
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    $containerClass = 'CorePerson_'.$listType.'_Access';
    
    if( !Webfrap::classLoadable( $containerClass ) )
    {
      // ausgabe einer fehlerseite und adieu
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'Invalid Access Type',
          'wbf.message'
        ),
        Response::NOT_IMPLEMENTED
      );
    }
    
    // laden des containers zum prüfen der zugriffsrechte
    $access = new $containerClass( null, null, $this );
    $access->load( $user->getProfileName(), $params );

     // access direkt übergeben
    $params->access = $access;

    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
    if( !$access->listing  )
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

    
		// Wirft eine InvalidRequest_Exception wenn die View nicht vorhanden ist
    $view = $response->loadView
    (
      'listing_core_person',
      'CorePerson_'.$listType,
      'displayListing',
      null,
      true
    );

    ///TODO prüfen warum hier insert war und ob das wirklich gebraucht wird
    $params->insert = false;

    // da wir ein paging implementieren wollen muss die query prüfen
    // wieviele datensätze sie ohne das limit hätte laden können
    // loadFullSize setzt das flag diese information zu laden
    $params->loadFullSize = true;

    // da wir das model hier nicht brauchen packen wir es direkt in die view
    /* @var $model CorePerson_Table_Model */
    $model = $this->loadModel( 'CorePerson_'.$listType );
    $model->setAccess( $access );

        $protocol = Protocol::getDefault();
        $protocol->updateLastVisited
        (
          'core_person-'.$params->ltype,
          'CorePerson',
          'List of Persons'
        );

    $view->setModel( $model );

    // gibt ein error objekt zurück wenn es fehl schlägt
    $error = $view->displayListing( $params );


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


  }//end public function service_listing */

 /**
  * en:
  * the search method for the main table
  * this method is called for paging and search requests
  * it's not recommended to use another method than this for paging, cause
  * this method makes shure that you can page between the search results
  * and do not loose your filters in paging
  *
  * de:
  * Die Suchefunktion, liefert Daten im Format passend zu Listmethode
  *
  * Diese Methode wird sowohl für die Suche, als auch für einfach Paging oder Append
  * Operationen auf dem Hauplistenelement verwendet
  *
  * @call GET/POST: maintab.php?c=Enterprise.Company.search
  * {
  *   @get_param: cname ltype, der Type der des Listenelements. Sollte sinnigerweise
  *     der gleich type wie das Listenelement sein, für das die Suche angestoßen wurde
  *
  *   @get_param: int start, Offset für die Listenelemente. Wird absolut übergeben und nicht
  *     mit multiplikator ( 50 anstelle von <strike>5 mal listengröße</strike> )
  *
  *   @get_param: int qsize, Die Anzahl der zu Ladenten Einträge. Momentan wird alles > 500 auf 500 gekappt
  *     alles kleiner 0 wird auf den standardwert von aktuell 25 gesetzt
  *
  *   @get_param: array(string fieldname => string [asc|desc] ) order, Die Daten für die Sortierung
  *
  *   @get_param: char begin, Mit Begin wird ein Buchstabe übergeben, der verwendet wird die Listeelemente
  *     nach dem Anfangsbuchstaben zu filtern. Kann im Prinzip jedes beliebige Zeichen, also auch eine Zahl sein
  *
  *   @get_param: ckey target_id, Die HTML Id, des Zielelements. Diese ID is wichtig, wenn das HTML Element
  *     in dem das Suchergebniss platziert werden soll, eine andere ID als die in der Methode hinterlegt
  *     Standard HTML ID hat
  *
  *
  *   @post_param: Die POST-Üparameter sind im Gegensaz zu den GET-Parametern dynamisch.
  *   Es werden lediglich suchfelder ausgewertet
  * }
  *
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  * @return boolean
  */
  public function service_search( $request, $response )
  {

    // resource laden
    $user      = $this->getUser();

    // laden der steuerungs parameter
    $params  = $this->getListingFlags( $request );

    // der contextKey wird benötigt um potentielle Konflikte in der UI
    // bei der Anzeige von mehreren Windows oder Tabs zu vermeiden
    $params->contextKey = 'core_person-listing';

    // wenn kein listentype definiert wurde, wird table als standard type
    // verwendet. Über den ltype kann der user über den parameter bestimmen
    // welches listingelement er gerne hätte
    if( !$params->ltype )
      $params->ltype = 'table';

    $listType = ucfirst( $params->ltype );
    
    // ok nun kommen wir zu der zugriffskontrolle
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    $containerClass = 'CorePerson_'.$listType.'_Access';
    
    if( !Webfrap::classLoadable( $containerClass ) )
    {
      // ausgabe einer fehlerseite und adieu
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'Invalid Access Type',
          'wbf.message'
        ),
        Response::NOT_IMPLEMENTED
      );
    }
    
    $access = new $containerClass( null, null, $this );
    $access->load( $user->getProfileName(), $params );

    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
    if( !$access->listing )
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

    // access direkt übergeben
    $params->access = $access;

    // definiere, dass dies ein ajax request ist
    // diese information ist später wichtig um entscheiden zu können in welcher
    // form das listenelement in den element index übergeben werden soll
    $params->ajax = true;

    // when we not append, then we need to load the full size for paging
    $params->loadFullSize = true;

    /* @var $model CorePerson_Table_Model */
    $model   = $this->loadModel( 'CorePerson_'.$listType );
    $model->setAccess( $access );

    $view = $response->loadView
    (
      'listing_core_person',
      'CorePerson_'.$listType,
      'displaySearch',
      null,
      true
    );

    $view->setModel( $model );
    $error =  $view->displaySearch( $params );

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

  /**
   * the default selection for the management  CorePerson
   * @param LibRequestHttp $request
   * @param LibResponseHttp $response
   * @return boolean
   */
  public function service_selection( $request, $response )
  {

    // resource laden
    $user      = $this->getUser();
    $acl       = $this->getAcl( );

    // laden der steuerungs parameter
    $params  = $this->getListingFlags( $request );

    // der contextKey wird benötigt um potentielle Konflikte in der UI
    // bei der Anzeige von mehreren Windows oder Tabs zu vermeiden
    $params->contextKey = 'core_person-selection';

    // ok nun kommen wir zu der zugriffskontrolle
    $access = new CorePerson_Selection_Access( null, null, $this );
    $access->load( $user->getProfileName(), $params );

    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
    if( !$access->listing  )
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


    // access direkt übergeben
    $params->access = $access;

    $view = $response->loadView
    (
      'selection_core_person',
      'CorePerson_Selection',
      'displaySelection',
      null,
      true
    );


    
    $model = $this->loadModel( 'CorePerson_Selection' );
    $model->setAccess( $access );
    $view->setModel( $model );

    // set selection mode
    $params->publish = 'selection';
    $params->insert   = true;

    // the database should load the full size of the query
    $params->loadFullSize = true;

    $error = $view->displaySelection( $params );

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


  }//end public function service_selection */

 /**
  *
  * de:
  * Die Suchefunktion, für die selection
  *
  * Diese Methode wird sowohl für die Suche, als auch für einfach Paging oder Append
  * Operationen auf dem Selection Listelement verwendet
  *
  * @call GET/POST: maintab.php?c=Core.Person.filter
  * {
  *   @get_param: cname ltype, der Type der des Listenelements. Sollte sinnigerweise
  *     der gleich type wie das Listenelement sein, für das die Suche angestoßen wurde
  *
  *   @get_param: int start, Offset für die Listenelemente. Wird absolut übergeben und nicht
  *     mit multiplikator ( 50 anstelle von <strike>5 mal listengröße</strike> )
  *
  *   @get_param: int qsize, Die Anzahl der zu Ladenten Einträge. Momentan wird alles > 500 auf 500 gekappt
  *     alles kleiner 0 wird auf den standardwert von aktuell 25 gesetzt
  *
  *   @get_param: array(string fieldname => string [asc|desc] ) order, Die Daten für die Sortierung
  *
  *   @get_param: char begin, Mit Begin wird ein Buchstabe übergeben, der verwendet wird die Listeelemente
  *     nach dem Anfangsbuchstaben zu filtern. Kann im Prinzip jedes beliebige Zeichen, also auch eine Zahl sein
  *
  *   @get_param: ckey target_id, Die HTML Id, des Zielelements. Diese ID is wichtig, wenn das HTML Element
  *     in dem das Suchergebniss platziert werden soll, eine andere ID als die in der Methode hinterlegt
  *     Standard HTML ID hat
  *
  *
  *   @post_param: Die POST-Üparameter sind im Gegensaz zu den GET-Parametern dynamisch.
  *   Es werden lediglich suchfelder ausgewertet
  * }
  *
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  * @return boolean
  */
  public function service_filter( $request, $response )
  {

    // resource laden
    $user      = $this->getUser();

    // laden der steuerungs parameter
    $params  = $this->getListingFlags( $request );

    // der contextKey wird benötigt um potentielle Konflikte in der UI
    // bei der Anzeige von mehreren Windows oder Tabs zu vermeiden
    $params->contextKey = 'core_person-selection';

    // ok nun kommen wir zu der zugriffskontrolle
    $acl = $this->getAcl( );

    $access = new CorePerson_Selection_Access( null, null, $this );
    $access->load( $user->getProfileName(), $params );

    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
    if( !$access->listing  )
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

    // access direkt übergeben
    $params->access = $access;

    // definiere, dass dies ein ajax request ist
    // diese information ist später wichtig um entscheiden zu können in welcher
    // form das listenelement in den element index übergeben werden soll
    $params->ajax = true;

    // when we not append, then we need to load the full size for paging
    $params->loadFullSize = true;

    /* @var $model CorePerson_Selection_Model */
    $model   = $this->loadModel( 'CorePerson_Selection' );
    $model->setAccess( $access );

    $view = $response->loadView
    (
      'selection_core_person',
      'CorePerson_Selection',
      'displaySearch',
      null,
      true
    );


    $view->setModel( $model );
    $error =  $view->displaySearch( $params );

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


  }//end public function service_filter */

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
    $model = $this->loadModel( 'CorePerson_Crud' );

    // dann das passende entitiy objekt für den datensatz
    $entityCorePerson = $model->getEntityCorePerson( $objid );

    // wenn null zurückgegeben wurde existiert der datensatz nicht
    // daher muss das System eine 404 Meldung zurückgeben
    if( !$entityCorePerson )
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
            'resource'  => $response->i18n->l( 'Person', 'core.person.label' ),
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
      'mod-core>mgmt-core_person',
      $entityCorePerson
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
              'Person',
              'core.person.label'
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
      $params->contextKey = 'core_person-data-'.$objid;
    else
      $params->contextKey = 'core_person-data';

    // laden der passenden view
    $view = $response->loadView
    (
      'tmp-core_person',
      'CorePerson',
      'displayData'
    );

    // model und request werden zwecks inversion of control an die view
    // übergeben
    $model->setAccess( $access );
    $view->setModel( $model );



    // wenn alles glatt geht gibt die view null zurück und der keks ist gegessen
    $error = $view->displayData( $entityCorePerson, $params );


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
    $model = $this->loadModel( 'CorePerson_Crud' );

    // dann das passende entitiy objekt für den datensatz
    $entityCorePerson = $model->getEntityCorePerson( $objid );

    // wenn null zurückgegeben wurde existiert der datensatz nicht
    // daher muss das System eine 404 Meldung zurückgeben
    if( !$entityCorePerson )
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
            'resource'  => $response->i18n->l( 'Person', 'core.person.label' ),
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
      'mod-core>mgmt-core_person',
      $entityCorePerson
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
              'Person',
              'core.person.label'
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
    $params->contextKey = 'core_person-append-'.$objid;

    // fetch only id fields from the request
    $fields = $request->paramSearchIds();

    // fetch the data from the http request and load it in the model registry
    // if fails stop here
    if( !$model->fetchUpdateData( $entityCorePerson, $params ) )
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
              'Person',
              'core.person.label'
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
    $ui = $this->loadUi( 'CorePerson_'.$listType );
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
    $model = $this->loadModel( 'CorePerson_Crud' );

    // dann das passende entitiy objekt für den datensatz
    $entityCorePerson = $model->getEntityCorePerson( $objid );

    // wenn null zurückgegeben wurde existiert der datensatz nicht
    // daher muss das System eine 404 Meldung zurückgeben
    if( !$entityCorePerson )
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
            'resource'  => $response->i18n->l( 'Person', 'core.person.label' ),
            'id'        => $objid
          )
        ),
        Response::NOT_FOUND
      );
    }


    // ok nun kommen wir zu der zugriffskontrolle
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    $access = new CorePerson_Crud_Access_Listing( null, null, $this );
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
            'resource' => $response->i18n->l( 'Person', 'core.person.label' ),
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
    $params->contextKey = 'core_person-text_by_key_'.$objid;

    $params->target = $request->param( 'target', Validator::CNAME );

    $ui = $this->loadUi( 'CorePerson_Crud' );
    $model->setAccess( $access );
    $ui->setModel( $model );


    $ui->textByKey( $entityCorePerson, $params );



  }//end public function service_textByKey */

////////////////////////////////////////////////////////////////////////////////
// Protected temporary methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * clean the post data after a sucess full request
   * @return boolean
   */
  public function cleanPost( )
  {

    $this->request->removeData( 'core_person' );

    // still running? fine :-)
    return true;

  }//end public function cleanPost */

} // end class CorePerson_Controller */

