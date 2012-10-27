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
 *
 * @package WebFrap
 * @subpackage ModRoleUser
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysRoleUser_Tab_Default_Controller
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
    'load' => array
    (
      'method'    => array( 'GET' ),
      'views'      => array( 'ajax' )
    ),
    'modal' => array
    (
      'method'    => array( 'GET' ),
      'views'      => array( 'modal' )
    ),
    'reload' => array
    (
      'method'    => array( 'GET' ),
      'views'      => array( 'ajax' )
    ),
    'close' => array
    (
      'method'    => array( 'GET' ),
      'views'      => array( 'ajax' )
    ),
  );

////////////////////////////////////////////////////////////////////////////////
// tab methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * open tab default for management view  wbfsys_role_user
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  */
  public function service_load( $request, $response )
  {

    $user      = $this->getUser();

    // prüfen ob eine valide id mit übergeben wurde
    if( !$objid = $this->getOID() )
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
            'resource' => $response->i18n->l
            (
              'System User',
              'wbfsys.role_user.label'
            )
          )
        ),
        Response::BAD_REQUEST
      );
    }

    // load request parameters an interpret as flags
    $params  = $this->getTabFlags( $request );
    
    // die übergebene objid ist die refid
    $params->refId = $objid;
    
    // set the save form id
    if( !$params->saveFormId )
      $params->saveFormId = 'wgt-form-wbfsys_role_user-edit-'.$objid;

    // Die Query soll wenn limit gesetzt wurde, eine 2te query starten
    // um die tatsächliche Anzahl vorhandenen Datensätze für dieses Query
    // zu ermitteln ( Wird zum paging / scrolling benötigt )
    $params->loadFullSize = true;

    // ok nun kommen wir zu der zugriffskontrolle
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    $access = new WbfsysRoleUser_Crud_Access_Tab( null, null, $this );
    $access->load( $user->getProfileName(), new TFlag(), $objid );

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
            'resource'  => $response->i18n->l( 'System User', 'wbfsys.role_user.label' ),
            'id'        => $objid
          )
        ),
        Response::FORBIDDEN
      );
    }


    // der Access Container des Users für die Resource wird als flag übergeben
    $params->access = $access;
    
    
    $params_RefTpl = clone $params;
    
    // tab many to one reference AddressItem 
    $paramsAddressItem             = clone $params_RefTpl;
    $params->paramsAddressItem    = $paramsAddressItem;

    $paramsAddressItem->aclNode  = 'mod-wbfsys-cat-core_data-ref-address_item';

    // zugriffsrechte der address_item referenz prüfen
    $accessAddressItem = new WbfsysRoleUser_Ref_AddressItem_Table_Access( null, null, $this );
    $accessAddressItem->load( $user->getProfileName(), $paramsAddressItem );

    $params->accessAddressItem = $accessAddressItem;
    
    $paramsAddressItem->access = $accessAddressItem;
    $paramsAddressItem->accessAddressItem = $accessAddressItem;


    // create a new area with the id of the target element, this area will replace
    // the HTML Node of the target UI Element
    $view      = $response->loadView
    (
      $params->tabId,
      'WbfsysRoleUser_Tab_Default',
      'displayTab',
      View::AREA
    );
    $view->setPosition( '#'.$params->tabId );
    $view->setModel( $this->loadModel( 'WbfsysRoleUser_Crud' ) );



    $error = $view->displayTab( $objid, $params );

    // ok wenns nen fehler gab behandeln
    if( $error )
    {
      return $error;
    }

    // everything is fine
    return State::OK;

  }//end public function load */


 /**
  * open tab default for management view  wbfsys_role_user
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  */
  public function service_modal( $request, $response )
  {

    $user      = $this->getUser();

    // prüfen ob eine valide id mit übergeben wurde
    if( !$objid = $this->getOID() )
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
            'resource' => $response->i18n->l
            (
              'System User',
              'wbfsys.role_user.label'
            )
          )
        ),
        Response::BAD_REQUEST
      );
    }

    // load request parameters an interpret as flags
    $params  = $this->getTabFlags( $request );
    
    // die übergebene objid ist die refid
    $params->refId = $objid;
    
    // set the save form id
    if( !$params->saveFormId )
      $params->saveFormId = 'wgt-form-wbfsys_role_user-edit-'.$objid;

    // Die Query soll wenn limit gesetzt wurde, eine 2te query starten
    // um die tatsächliche Anzahl vorhandenen Datensätze für dieses Query
    // zu ermitteln ( Wird zum paging / scrolling benötigt )
    $params->loadFullSize = true;

    // ok nun kommen wir zu der zugriffskontrolle
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    $access = new WbfsysRoleUser_Crud_Access_Tab( null, null, $this );
    $access->load( $user->getProfileName(), new TFlag(), $objid );

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
            'resource'  => $response->i18n->l( 'System User', 'wbfsys.role_user.label' ),
            'id'        => $objid
          )
        ),
        Response::FORBIDDEN
      );
    }


    // der Access Container des Users für die Resource wird als flag übergeben
    $params->access = $access;
    
    
    $params_RefTpl = clone $params;
    
    // tab many to one reference AddressItem 
    $paramsAddressItem             = clone $params_RefTpl;
    $params->paramsAddressItem    = $paramsAddressItem;

    $paramsAddressItem->aclNode  = 'mod-wbfsys-cat-core_data-ref-address_item';

    // zugriffsrechte der address_item referenz prüfen
    $accessAddressItem = new WbfsysRoleUser_Ref_AddressItem_Table_Access( null, null, $this );
    $accessAddressItem->load( $user->getProfileName(), $paramsAddressItem );

    $params->accessAddressItem = $accessAddressItem;
    
    $paramsAddressItem->access = $accessAddressItem;
    $paramsAddressItem->accessAddressItem = $accessAddressItem;


    // create a new area with the id of the target element, this area will replace
    // the HTML Node of the target UI Element
    $view      = $response->loadView
    (
      $params->tabId,
      'WbfsysRoleUser_Tab_Default',
      'displayTab'
    );
    $view->setPosition( '#'.$params->tabId );
    $view->setModel( $this->loadModel( 'WbfsysRoleUser_Crud' ) );



    $error = $view->displayTab( $objid, $params );

    // ok wenns nen fehler gab behandeln
    if( $error )
    {
      return $error;
    }

    // everything is fine
    return State::OK;

  }//end public function service_modal */


 /**
  * open tab default for management view  wbfsys_role_user
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  */
  public function service_reload( $request, $response )
  {

    $user      = $this->getUser();

    // check if we got a valid objid
    if( !$objid = $this->getOID() )
    {
      throw new InvalidRequest_Exception
      (
        'Missing the ID',
        Response::BAD_REQUEST
      );
    }
    // load request parameters an interpret as flags
    $params  = $this->getTabFlags( $request );
    
    // die übergebene objid ist die refid
    $params->refId = $objid;
    
    // set the save form id
    if( !$params->saveFormId )
      $params->saveFormId = 'wgt-form-wbfsys_role_user-edit-'.$objid;
      
    // set the flag to load also the sizes
    $params->loadFullSize = true;
    
    // ok nun kommen wir zu der zugriffskontrolle
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();
    
    $access = new WbfsysRoleUser_Crud_Access_Tab( null, null, $this );
    $access->load( $user->getProfileName(), new TFlag(), $objid );

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
            'resource'  => $response->i18n->l( 'System User', 'wbfsys.role_user.label' ),
            'id'        => $objid
          )
        ),
        Response::FORBIDDEN
      );
    }


    // der Access Container des Users für die Resource wird als flag übergeben
    $params->access = $access;

    
    $params_RefTpl = clone $params;
    
    // tab many to one reference AddressItem 
    $paramsAddressItem             = clone $params_RefTpl;
    $params->paramsAddressItem    = $paramsAddressItem;

    $paramsAddressItem->aclNode  = 'mod-wbfsys-cat-core_data-ref-address_item';

    // zugriffsrechte der address_item referenz prüfen
    $accessAddressItem = new WbfsysRoleUser_Ref_AddressItem_Table_Access( null, null, $this );
    $accessAddressItem->load( $user->getProfileName(), $paramsAddressItem );

    $params->accessAddressItem = $accessAddressItem;
    
    $paramsAddressItem->access = $accessAddressItem;
    $paramsAddressItem->accessAddressItem = $accessAddressItem;


    // create a new area with the id of the target element, this area will replace
    // the HTML Node of the target UI Element
    $view      = $response->loadView
    (
      $params->tabId,
      'WbfsysRoleUser_Tab_Default',
      'displayTab',
      View::AREA
    );
    $view->setPosition( '#'.$params->tabId );



    // try to display the tab
    if( $error = $view->displayTab( $objid, $params ) )
    {
      return $error;
    }

    // everything is fine
    return State::OK;

  }//end public function reload */


////////////////////////////////////////////////////////////////////////////////
// flag creation for flow controll
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @param TFlag $params
   * @return TFlag
   */
  protected function getTabFlags( $request )
  {

    $response  = $this->getResponse();

    $params = new TFlagListing( $request );
      

    // per default
    $params->categories = array();

    // listing type
    if( $ltype   = $request->param( 'ltype', Validator::CNAME ) )
      $params->ltype    = $ltype;

    // context type
    if( $context = $request->param( 'context', Validator::CNAME ) )
      $params->context    = $context;

    // start position of the query and size of the table
    $params->start
      = $request->param('start', Validator::INT );

    // stepsite for query (limit) and the table
    if( !$params->qsize = $request->param('qsize', Validator::INT ) )
      $params->qsize = Wgt::$defListSize;

    // order for the multi display element
    $params->order
      = $request->param('order', Validator::CNAME );

    // target for a callback function
    $params->target
      = $request->param('target', Validator::CKEY  );

    // target for some ui element
    $params->targetId
      = $request->param('target_id', Validator::CKEY  );

    // target for some ui element
    $params->tabId
      = $request->param('tabid', Validator::CKEY  );

    // flag for beginning seach filter
    if( $text = $request->param('begin', Validator::TEXT  ) )
    {
      // whatever is comming... take the first char
      $params->begin = $text[0];
    }

    // exclude whatever
    $params->exclude
      = $request->param('exclude', Validator::CKEY  );

    // the activ id, mostly needed in exlude calls
    $params->objid
      = $request->param('objid', Validator::EID  );

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


    return $params;

  }//end protected function getTabFlags */

} // end WbfsysRoleUser_Tab_Default_Controller */

