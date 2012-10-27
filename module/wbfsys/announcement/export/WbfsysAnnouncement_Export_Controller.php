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
 * If you want to extend this class write your coden in ControllerWbfsysAnnouncement
 *
 * NEVER WRITE CODE IN THIS CLASS
 * THE CONTENT OF THIS CLASS IS NOT PERSISTENT AND CAN CHANGE OFTEN
 * ALL YOUR CHANGES WILL BE OVERWRITEN!!!
 * YOU HAVE BEEN WARNED!!!
 *
 * @package WebFrap
 * @subpackage ModAnnouncement
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysAnnouncement_Export_Controller_Genf
  extends Controller
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
    'exportform' => array
    (
      'method'    => array( 'GET' ),
      'views'      => array( 'document' )
    ),
    'exportlist' => array
    (
      'method'    => array( 'GET' ),
      'views'      => array( 'document' )
    ),
  );

  /**
   * the default model for the controller
   * @var WbfsysAnnouncement_Export_Model $model
   */
   protected $model        = null;


////////////////////////////////////////////////////////////////////////////////
// export methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * the default table for the management WbfsysAnnouncement
   * @param LibRequestPhp $request
   * @param LibResponsePhp $response
   * @return boolean
   */
  public function service_exportList( $request, $response )
  {

    // load request parameters an interpret as flags
    $params  = $this->getExportFlags( $request );

    $containerClass = 'WbfsysAnnouncement_Export_Listing_Access';
    
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

    // create a new WbfsysAnnouncement window
    $view = $this->loadView
    (
    	'export-wbfsys_announcement',
    	'WbfsysAnnouncement_Export',
    	'renderExport'
    	
    );
    
    $model = $this->loadModel( 'WbfsysAnnouncement_Export' );
    $view->setModel( $this->model );

    // render the export
    $view->renderExport( $params );


  }//end public function service_exportList */

  /**
   * @param TFlag $params
   * @return TFlag
   */
  protected function getExportFlags( $request )
  {

    $params = new TFlag();

    // per default
    $params->categories = array();

    // get the type for the export format
    $params->type
      = $request->param('type', Validator::CNAME );

    // start position of the query and size of the table
    $params->start
      = $request->param('start', Validator::INT );

    // stepsite for query (limit) and the table
    if( !$params->qsize = $request->param('qsize', Validator::INT ) )
      $params->qsize = '-1';

    // order for the multi display element
    $params->order
      = $request->param('order', Validator::CNAME );

    // flag for beginning seach filter
    if( $text = $request->param('begin', Validator::TEXT  ) )
    {
      // whatever is comming... take the first char
      $params->begin = $text[0];
    }

    // the activ id, mostly needed in exlude calls
    $params->objid
      = $request->param('objid', Validator::EID  );

    return $params;

  }//end protected function getExportFlags */

} // end class WbfsysAnnouncement_Export_Controller_Genf

