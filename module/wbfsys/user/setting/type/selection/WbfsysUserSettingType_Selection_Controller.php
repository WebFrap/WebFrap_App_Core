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
 * @subpackage ModUserSettingType
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysUserSettingType_Selection_Controller
  extends ControllerCrud
{
////////////////////////////////////////////////////////////////////////////////
// list methodes
////////////////////////////////////////////////////////////////////////////////

  /**
   * the default selection for the management  WbfsysUserSettingType
   *
   * @param LibRequestHttp $request
   * @param LibResponseHttp $response
   *
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
    $params->contextKey = 'wbfsys_user_setting_type-selection';

    // ok nun kommen wir zu der zugriffskontrolle
    $access = new WbfsysUserSettingType_Selection_Access( null, null, $this );
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
      'selection_wbfsys_user_setting_type',
      'WbfsysUserSettingType_Selection',
      'displaySelection'
    );



    $view->setModel( $this->loadModel( 'WbfsysUserSettingType_Selection' ) );

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
  * @call GET/POST: maintab.php?c=Wbfsys.UserSettingType.filter
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
  *
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
    $params->contextKey = 'wbfsys_user_setting_type-selection';

    // ok nun kommen wir zu der zugriffskontrolle
    $acl = $this->getAcl( );

    $access = new WbfsysUserSettingType_Selection_Access( null, null, $this );
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

    $model   = $this->loadModel( 'WbfsysUserSettingType_Selection' );

    $view = $response->loadView
    (
      'selection_wbfsys_user_setting_type',
      'WbfsysUserSettingType_Selection',
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


  }//end public function service_filter */

} // end class WbfsysUserSettingType_Selection_Controller */
