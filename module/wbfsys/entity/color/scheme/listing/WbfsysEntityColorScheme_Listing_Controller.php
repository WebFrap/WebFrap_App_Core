
/**
 * Read before change:
 * It's not recommended to change this file inside a Mod or App Project.
 * If you want to change it copy it to a custom project.

 *
 * @package WebFrap
 * @subpackage ModEntityColorScheme
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysEntityColorScheme_Listing_Controller
  extends ControllerCrud
{
////////////////////////////////////////////////////////////////////////////////
// list methodes
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
  * @url maintab.php?c=Wbfsys.EntityColorScheme.listing
  *
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  * @return boolean
  */
  public function service_listing( $request, $response )
  {

    // resource laden
    $user      = $this->getUser();

    // load request parameters an interpret as flags
    $params  = $this->getListingFlags( $request );

    // der contextKey wird benötigt um potentielle Konflikte in der UI
    // bei der Anzeige von mehreren Windows oder Tabs zu vermeiden
    $params->contextKey = 'wbfsys_entity_color_scheme-listing';


    // wenn kein listentype definiert wurde, wird table als standard type
    // verwendet. Über den ltype kann der user über den parameter bestimmen
    // welches listingelement er gerne hätte
    if( !$params->ltype )
      $params->ltype = 'table';

    $listType = ucfirst( $params->ltype );
    
    // ok nun kommen wir zu der zugriffskontrolle
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    $containerClass = 'WbfsysEntityColorScheme_'.$listType.'_Access';
    
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

    
    $view = $response->loadView
    (
      'listing_wbfsys_entity_color_scheme',
      'WbfsysEntityColorScheme_'.$listType,
      'displayListing'
    );

    ///TODO prüfen warum hier insert war und ob das wirklich gebraucht wird
    $params->insert = false;

    // da wir ein paging implementieren wollen muss die query prüfen
    // wieviele datensätze sie ohne das limit hätte laden können
    // loadFullSize setzt das flag diese information zu laden
    $params->loadFullSize = true;

    // da wir das model hier nicht brauchen packen wir es direkt in die view
    $view->setModel( $this->loadModel( 'WbfsysEntityColorScheme_'.$listType ) );

    // ok zusammenbauen der ausgabe
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
    $params->contextKey = 'wbfsys_entity_color_scheme-listing';

    // wenn kein listentype definiert wurde, wird table als standard type
    // verwendet. Über den ltype kann der user über den parameter bestimmen
    // welches listingelement er gerne hätte
    if( !$params->ltype )
      $params->ltype = 'table';

    $listType = ucfirst( $params->ltype );
    
    // ok nun kommen wir zu der zugriffskontrolle
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    $containerClass = 'WbfsysEntityColorScheme_'.$listType.'_Access';
    
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

    $model   = $this->loadModel( 'WbfsysEntityColorScheme_'.$listType );

    $view = $response->loadView
    (
      'listing_wbfsys_entity_color_scheme',
      'WbfsysEntityColorScheme_'.$listType,
      'displaySearch'
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

} // end class WbfsysEntityColorScheme_Listing_Controller */
