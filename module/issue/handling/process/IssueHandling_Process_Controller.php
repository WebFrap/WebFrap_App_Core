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
 * @subpackage ModHandling
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class IssueHandling_Process_Controller
  extends ControllerProcess
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
    'form' => array
    (
      'method'    => array( 'GET' ),
      'views'      => array( 'window', 'maintab' )
    ),
    'dropform' => array
    (
      'method'    => array( 'GET' ),
      'views'      => array( 'ajax' )
    ),
    'switchstatus' => array
    (
      'method'    => array( 'PUT' ),
      'views'      => array( 'ajax' )
    ),
    'switchstatusform' => array
    (
      'method'    => array( 'PUT' ),
      'views'      => array( 'ajax' )
    ),
    'switchstatuslisting' => array
    (
      'method'    => array( 'PUT' ),
      'views'      => array( 'ajax' )
    ),
    'showhistory' => array
    (
      'method'    => array( 'GET' ),
      'views'      => array( 'window', 'maintab' )
    ),
    'shownodegraph' => array
    (
      'method'    => array( 'GET' ),
      'views'      => array( 'maintab' )
    ),
    'addcomment' => array
    (
      'method'    => array( 'POST' ),
      'views'      => array( 'ajax' )
    ),
    'showresponsible' => array
    (
      'method'    => array( 'GET' ),
      'views'      => array( 'modal' )
    ),
  );

////////////////////////////////////////////////////////////////////////////////
// Callable Methodes
////////////////////////////////////////////////////////////////////////////////


  /**
   * @param LibRequestHttp $request
   * @param LibResponseHttp $response
   *
   * @throws LibProcess_Exception Model_Exception
   * @return Error im Fehlerfall
   */
  public function service_form( $request, $response )
  {
    
    $db       = $this->getDb();
    $user     = $this->getUser();
    
    $params   = $this->getFlags( $request );
    
    $model = $this->loadModel
    (
      'IssueHandling_Process', 
      array
      (
        Base::DB,
        Base::RESPONSE,
        Base::USER
      ) 
    );
    
    $statusId = $request->param( 'objid', Validator::EID );
    
    if( !$statusId )
    {
      throw new InvalidRequest_Exception
      ( 
        "Invalid Request, missing the Status ID for the Process", 
        Response::BAD_REQUEST 
      );
    }

      
    // build process
    $process = new IssueHandling_Process( $db );
      
    $process->loadByStatus( $statusId, $params );
    $process->fetchServiceRequest( );
    
    // benutzer zugriff laden
    $access = new IssueHandling_Process_Access( null, null, $this );
    $access->load( $user->getProfileName(), $params, $process->getEntity() );

    $params->process  = $process;
    $params->entity   = $process->getEntity();
    
    $view = $response->loadView
    ( 
      'form-issue_handling-process-'.$statusId, 
      'IssueHandling_Process',
      'displayForm'
    );

    
    $view->displayForm( $process, $params );

    // expliziet keinen Fehler zurückgeben
    return null;
    
  }//end public function service_form */
  
  /**
   * @param LibRequestHttp $request
   * @param LibResponseHttp $response
   * 
   * @throws LibProcess_Exception, Model_Exception
   * 
   * @return Error
   */
  public function service_dropForm( $request, $response )
  {
    
    $db       = $this->getDb();
    $orm      = $this->getOrm();
    $user     = $this->getUser();
    
    $params   = $this->getFlags( $request );
    
    $model = $this->loadModel
    (
      'IssueHandling_Process', 
      array
      (
        Base::DB,
        Base::RESPONSE,
        Base::USER
      ) 
    );
    
    $entityId = $request->param( 'objid', Validator::EID );
    $inputId  = $request->param( 'input', Validator::CKEY );
    
    $params->ltype      = $request->param( 'ltype', Validator::CNAME );
    $params->mask      = $request->param( 'mask', Validator::CNAME );
    $params->element   = $request->param( 'element', Validator::CKEY );
    $params->maskType  = $request->param( 'mask_type', Validator::CNAME );
    $params->refId     = $request->param( 'refid', Validator::EID );
    
    if( !$entityId )
    {
      $this->errorPage
      ( 
        "Invalid Request, missing the Status ID for the Process", 
        Response::BAD_REQUEST 
      );
      return false;
    }
    
    // build process
    $process = new IssueHandling_Process( $db );
      
 
    $entity = $orm->get( 'WbfsysIssue', $entityId );
    
    $process->load( $entity, $params );
    $process->fetchServiceRequest( );
    
    // benutzer zugriff laden
    $access = new IssueHandling_Process_Access();
    $access->load( $user->getProfileName(), $params, $process->getEntity() );

    $process->setUserRoles( $access->getRoles() );
    $params->process  = $process;
    $params->entity   = $process->getEntity();
    $params->inputId  = $inputId;
    $params->formId   = 'wgt-form-'.$process;
    
    $view = $response->loadView
    ( 
      'dropform-issue_handling-process-'.$entityId, 
      'IssueHandling_Process',
      'displayDropForm'
    );

    
    $view->displayDropForm( $process, $params );
    
  }//end public function service_dropForm */
  
  /**
   * @param LibRequestHttp $request
   * @param LibResponseHttp $response
   */
  public function service_switchStatus( $request, $response )
  {
    
    $db       = $this->getDb();
    $user     = $this->getUser();
    
    $params = $this->getFlags( $request );
    
    $model = $this->loadModel
    (
      'IssueHandling_Process', 
      array
      (// inject required resources
        Base::DB,
        Base::RESPONSE,
        Base::REQUEST,
        Base::USER
      ) 
    );
    
    $statusId = $request->param( 'objid', Validator::EID );
    
    if( !$statusId )
    {
      throw new InvalidRequest_Exception
      ( 
        "Invalid Request, missing the Status ID for the Process", 
        Response::BAD_REQUEST 
      );
    }

    // build process
    $process = new IssueHandling_Process( $db );
      
    $process->loadByStatus( $statusId, $params );
    $process->fetchRequest();
    
    $entity = $process->getEntity();
    
    if( $params->mask )
    {
      $className = $params->mask.'_Crud_Access_Edit';
      
      if( Webfrap::classloadable( $className ) )
        $access = new $className( null, null, $this );
      else
      {
        Log::warn
        ( 
          "Missing requested mask ".$params->mask." Fallback to default access check." 
          ."This should be no problems as the default access should only provide a minimal access level."
          ."The worst thing that can happen, is that somebody get a request denied, even he should have access."
        );
        $access = new IssueHandling_Process_Access( null, null, $this );
      }
      
    }
    else 
    {
      $access = new IssueHandling_Process_Access( null, null, $this );
    }
    $access->load( $user->getProfileName(),  $params, $entity );
    
    $params->access = $access;

    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
    if( !$access->update )
    {
      // ausgabe einer fehlerseite und adieu
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'You have no permission to update {@resource@}:{@id@}',
          'wbf.message',
          array
          (
            'resource'  => $response->i18n->l( 'Issue', 'wbfsys.issue.label' ),
            'id'        => $statusId
          )
        ),
        Response::FORBIDDEN
      );
    }
    
    if( $error = $process->validate(  ) )
    {
      // ausgabe einer fehlerseite und adieu
      throw new Consistency_Exception
      (
        $response->i18n->l
        (
          'One or more checks failed {@resource@}:{@id@}',
          'wbf.message',
          array
          (
            'resource'  => $response->i18n->l( 'Issue', 'wbfsys.issue.label' ),
            'id'        => $statusId
          )
        )
      );
    }

    $process->trigger( 'before', $params );
    $process->trigger( 'success', $params, true );
    $process->trigger( 'after', $params );
    
    if( $params->viewId )
      $this->tplEngine->closeTab( $params->viewId );
    
    //$request->addParam( 'objid', $entity->getId()  );
    //Webfrap::getActive()->redirectByTripple( 'Wbfsys.Issue.edit' );

    
  }//end public function service_switchStatus */
  
/**
   * @param LibRequestHttp $request
   * @param LibResponseHttp $response
   */
  public function service_switchStatusForm( $request, $response )
  {
    
    $db       = $this->getDb();
    $user     = $this->getUser();
    
    $params = $this->getFlags( $request );
    
    $model = $this->loadModel
    (
      'IssueHandling_Process', 
      array
      (// inject required resources
        Base::DB,
        Base::RESPONSE,
        Base::REQUEST,
        Base::USER
      ) 
    );
    
    // der Type der Liste der in dem das Feld ausgetauscht werden soll
    $params->ltype = $request->param( 'ltype', Validator::CNAME );
    
    // der Namespace / die Maske in dem das Listenelement sich befindet
    $params->mask = $request->param( 'mask', Validator::CNAME );
    
    // laden der ID des Listenelements
    $params->targetId = $request->param( 'element', Validator::CKEY );
    
    // referenzid auf den hauptdatensatz, wird nur bei listenelementn
    // in tabs benötigt
    $params->refId = $request->param( 'refid', Validator::EID );
    
    $statusId = $request->param( 'objid', Validator::EID );
    
    if( !$statusId )
    {
      throw new InvalidRequest_Exception
      ( 
        "Invalid Request, missing the Status ID for the Process", 
        Response::BAD_REQUEST 
      );
    }

    // build process
    $process = new IssueHandling_Process( $db );
      
    $process->loadByStatus( $statusId, $params );
    $process->fetchServiceRequest();
    
    $entity = $process->getEntity();
    
    if( $params->mask )
    {
      $className = $params->mask.'_Crud_Access_Edit';
      
      if( Webfrap::classloadable( $className ) )
        $access = new $className( null, null, $this );
      else
      {
        Log::warn
        ( 
          "Missing requested mask ".$params->mask." Fallback to default access check." 
          ."This should be no problems as the default access should only provide a minimal access level."
          ."The worst thing that can happen, is that somebody get a request denied, even he should have access."
        );
        $access = new IssueHandling_Process_Access( null, null, $this );
      }
      
    }
    else 
    {
      $access = new IssueHandling_Process_Access( null, null, $this );
    }
    $access->load( $user->getProfileName(),  $params, $entity );
    
    $params->access = $access;

    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
    if( !$access->update )
    {
      // ausgabe einer fehlerseite und adieu
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'You have no permission to update {@resource@}:{@id@}',
          'wbf.message',
          array
          (
            'resource'  => $response->i18n->l( 'Issue', 'wbfsys.issue.label' ),
            'id'        => $objid
          )
        ),
        Response::FORBIDDEN
      );
    }
    
    if( $error = $process->validate() )
    {
      // ausgabe einer fehlerseite und adieu
      throw new Consistency_Exception
      (
        $response->i18n->l
        (
          'One or more checks failed {@resource@}:{@id@}',
          'wbf.message',
          array
          (
            'resource'  => $response->i18n->l( 'Issue', 'wbfsys.issue.label' ),
            'id'        => $statusId
          )
        )
      );
    }
    
    
    $process->trigger( 'before', $params );
    $process->trigger( 'success', $params, true );
    $process->trigger( 'after', $params );
    
    $this->tpl->addJsCode( "\$S.fn.miniMenu.close();" );
    
    if( $params->viewId )
      $this->tplEngine->closeTab( $params->viewId );

    // darstellung ders Listeneintrags
    if( !$params->ltype )
      $params->ltype = 'table';

    $listType = ucfirst( $params->ltype );

    if( !$params->mask )
      $params->mask = 'WbfsysIssue';

    // laden der angeforderten view
    $view = $response->loadView
    (
      'listing_wbfsys_issue',
      $params->mask.'_'.$listType,
      'displayUpdate',
      View::AJAX
    );

    // Das Model der View übergeben
    $listModel = $this->loadModel( $params->mask.'_'.$listType );
    $listModel->setEntityWbfsysIssue( $entity );
    
    $view->setModel( $listModel );

    $error = $view->displayUpdate( $params );

    // im Fehlerfall jedoch bekommen wir eine Error Objekt das wird noch kurz
    // behandeln sollten
    if( $error )
    {
      return $error;
    }
      
    //$request->addParam( 'objid', $entity->getId()  );
    //Webfrap::getActive()->redirectByTripple( 'Wbfsys.Issue.edit' );

    
  }//end public function service_switchStatusForm */
  
  /**
   * @param LibRequestHttp $request
   * @param LibResponseHttp $response
   */
  public function service_switchStatusListing( $request, $response )
  {
    
    $db       = $this->getDb();
    $user     = $this->getUser();
    
    $params = $this->getFlags( $request );
    
    // der Type der Liste der in dem das Feld ausgetauscht werden soll
    $params->ltype = $request->param( 'ltype', Validator::CNAME );
    
    // der Namespace / die Maske in dem das Listenelement sich befindet
    $params->mask = $request->param( 'mask', Validator::CNAME );
    
    // laden der ID des Listenelements
    $params->targetId = $request->param( 'element', Validator::CKEY );
    
    // referenzid auf den hauptdatensatz, wird nur bei listenelementn
    // in tabs benötigt
    $params->refId = $request->param( 'refid', Validator::EID );
    
    $statusId = $request->param( 'objid', Validator::EID );
    
    if( !$statusId )
    {
      throw new InvalidRequest_Exception
      ( 
        "Invalid Request, missing the Status ID for the Process", 
        Response::BAD_REQUEST 
      );
    }
    
    $model = $this->loadModel
    (
      'IssueHandling_Process', 
      array
      (// inject required resources
        Base::DB,
        Base::RESPONSE,
        Base::REQUEST,
        Base::USER
      ) 
    );

    // build process
    $process = new IssueHandling_Process( $db );
      
    $process->loadByStatus( $statusId, $params );
    $process->fetchServiceRequest();

    $entity = $process->getEntity();
    
    if( $params->mask )
    {
      $className = $params->mask.'_Crud_Access_Edit';
      
      if( Webfrap::classloadable( $className ) )
        $access = new $className( null, null, $this );
      else
      {
        Log::warn
        ( 
          "Missing requested mask ".$params->mask." Fallback to default access check." 
          ."This should be no problems as the default access should only provide a minimal access level."
          ."The worst thing that can happen, is that somebody get a request denied, even he should have access."
        );
        $access = new IssueHandling_Process_Access( null, null, $this );
      }
      
    }
    else 
    {
      $access = new IssueHandling_Process_Access( null, null, $this );
    }
    
    $access->load( $user->getProfileName(), $params, $entity );
    
    $params->access = $access;

    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
    if( !$access->update )
    {
      // ausgabe einer fehlerseite und adieu
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'You have no permission to update {@resource@}:{@id@}',
          'wbf.message',
          array
          (
            'resource'  => $response->i18n->l( 'Issue', 'wbfsys.issue.label' ),
            'id'        => $statusId
          )
        ),
        Response::FORBIDDEN
      );
    }
    
    
    if( $error = $process->validate() )
    {
      // ausgabe einer fehlerseite und adieu
      throw new Consistency_Exception
      (
        $response->i18n->l
        (
          'One or more checks failed {@resource@}:{@id@}',
          'wbf.message',
          array
          (
            'resource'  => $response->i18n->l( 'Issue', 'wbfsys.issue.label' ),
            'id'        => $statusId
          )
        )
      );
    }
    
    $process->trigger( 'before', $params );
    $process->trigger( 'success', $params, true );
    $process->trigger( 'after', $params );
    
    $this->tpl->addJsCode( "\$S.fn.miniMenu.close();" );
    
    // darstellung ders Listeneintrags
    if( !$params->ltype )
      $params->ltype = 'table';

    $listType = ucfirst( $params->ltype );

    if( !$params->mask )
      $params->mask = 'WbfsysIssue';

    // laden der angeforderten view
    $view = $response->loadView
    (
      'listing_wbfsys_issue',
      $params->mask.'_'.$listType,
      'displayUpdate',
      View::AJAX
    );

    // Das Model der View übergeben
    $listModel = $this->loadModel( $params->mask.'_'.$listType );
    $listModel->setEntity( $entity );
    
    $view->setModel( $listModel );

    $error = $view->displayUpdate( $params );

    // im Fehlerfall jedoch bekommen wir eine Error Objekt das wird noch kurz
    // behandeln sollten
    if( $error )
    {
      return $error;
    }
    
    return null;
    
  }//end public function service_switchStatusListing */
  
  /**
   * @param LibRequestHttp $request
   * @param LibResponseHttp $response
   *
   * @throws LibProcess_Exception Model_Exception
   * @return Error im Fehlerfall
   */
  public function service_showNodeGraph( $request, $response )
  {
    
    $db       = $this->getDb();
    $user     = $this->getUser();
    
    $params   = $this->getFlags( $request );
    
    $model = $this->loadModel
    (
      'IssueHandling_Process'
    );
    
    $statusId = $request->param( 'objid', Validator::EID );
    
    if( !$statusId )
    {
      throw new InvalidRequest_Exception
      ( 
        "Invalid Request, missing the Status ID for the Process", 
        Response::BAD_REQUEST 
      );
    }

    // build process
    $process = $model->loadProcess( $statusId, $params );
    
    // Benutzer zugriff laden
    $access = new IssueHandling_Process_Access( null, null, $this );
    $access->load( $user->getProfileName(), $params, $process->getEntity() );

    $params->process  = $process;
    $params->entity   = $process->getEntity();
    
    $view = $response->loadView
    ( 
      'form-issue_handling-graph-'.$statusId, 
      'IssueHandling_Process_Graph',
      'displayGraph',
      null,
      true
    );

    $view->displayGraph( $process, $params );

    // expliziet keinen Fehler zurückgeben
    return null;
    
  }//end public function service_showNodeGraph */  
  
  /**
   * @param LibRequestHttp $request
   * @param LibResponseHttp $response
   *
   * @throws LibProcess_Exception Model_Exception
   * @return Error im Fehlerfall
   */
  public function service_showResponsible( $request, $response )
  {
    
    $db       = $this->getDb();
    $user     = $this->getUser();
    
    $params   = $this->getFlags( $request );
    
    $model = $this->loadModel
    (
      'IssueHandling_Process'
    );
    
    $statusId     = $request->param( 'objid', Validator::EID );
    $receiverKey = $request->param( 'key', Validator::CNAME );
    
    if( !$statusId )
    {
      throw new InvalidRequest_Exception
      ( 
        "Invalid Request, missing the Status ID for the Process", 
        Response::BAD_REQUEST 
      );
    }

    // build process
    $process = $model->loadProcess( $statusId, $params );
    
    // Benutzer zugriff laden
    $access = new IssueHandling_Process_Access( null, null, $this );
    $access->load( $user->getProfileName(), $params, $process->getEntity() );

    $params->process  = $process;
    $params->entity   = $process->getEntity();
    
    $view = $response->loadView
    ( 
      'form-issue_handling-receiver-'.$statusId, 
      'IssueHandling_Process_Receiver',
      'displayReceiver',
      null,
      true
    );
    $view->setModel( $model );

    $view->displayReceiver( $process, $receiverKey, $params );

    // expliziet keinen Fehler zurückgeben
    return null;
    
  }//end public function service_showResponsible */  
  
} // end class IssueHandling_Process_Controller */

