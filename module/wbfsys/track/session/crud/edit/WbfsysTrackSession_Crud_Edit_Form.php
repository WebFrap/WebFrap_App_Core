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
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysTrackSession_Crud_Edit_Form
  extends WgtCrudForm
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * namespace for the actual form
   * @setter WgtCrudForm::setNamespace()
   * @getter WgtCrudForm::getNamespace()
   * @var string 
   */
  public $namespace  = 'WbfsysTrackSession';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysTrackSession';

  /**
   * suffixes are used to create multiple instances of forms for diffrent
   * datasets, normaly the suffix is the id of a dataset or "-new" for
   * create forms
   *
   * @setter WgtCrudForm::setSuffix()
   * @getter WgtCrudForm::getSuffix()
   * @var string 
   */
  public $suffix      = null;
 
  /**
   * Standard Liste der Felder die angezeigt werden sollen
   *
   * @var array
   */
  protected $fields      = array
  (
      'wbfsys_track_session' => array
      (
        'id_session' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'service' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'refer' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'id_person' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'session' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'browser' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'browser_version' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '20',
        ),
        'track_id' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'os' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'os_version' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '20',
        ),
        'rowid' => array
        ( 
          'required'  => true, 
          'readonly'  => true, 
          'lenght'    => '',
        ),
        'm_time_created' => array
        ( 
          'required'  => false, 
          'readonly'  => true, 
          'lenght'    => '',
        ),
        'm_role_create' => array
        ( 
          'required'  => false, 
          'readonly'  => true, 
          'lenght'    => '',
        ),
      ),

  );

  /**
   * Die Haupt Entity für das Formular
   *
   * @var WbfsysTrackSession_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysTrackSession_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysTrackSession_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->entity = $entity;
    $this->rowid  = $entity->getId();
    
  }//end public function setEntity */


  /**
   * request all fields that have to be fetched from the request
   * @return array
   */
  public function getSaveFields()
  {

    return array
    (
      'wbfsys_track_session' => array
      (
        'id_session',
        'service',
        'refer',
        'id_person',
        'session',
        'browser',
        'browser_version',
        'track_id',
        'os',
        'os_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysTrackSession entity
  *
  * @param Entity $entity the entity object
  * @param array $fields list with all elements that shoul be shown in the ui
  * @namedParam TFlag $params named parameters
  * {
  *   string prefix     : prefix for the inputs;
  *   string target     : target for;
  *   boolean readOnly  : set all elements to readonly;
  *   boolean refresh   : refresh the elements in an ajax request ;
  *   boolean sendElement : if true, then the system will send the elements in
  *   ajax requests als serialized html and not only just as value
  * }
  */
  public function renderForm( $params = null  )
  {

    $params  = $this->checkNamedParams( $params );
    $i18n     = $this->view->i18n;
    
    if( $params->access )
      $this->access = $params->access;

    // add the entity to the view
    $this->view->addVar( 'entity', $this->entity );
    $this->view->addVar( 'entityWbfsysTrackSession', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_track_session'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_track_session[id_wbfsys_track_session-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysTrackSession_IdSession( $params );
    $this->input_WbfsysTrackSession_Service( $params );
    $this->input_WbfsysTrackSession_Refer( $params );
    $this->input_WbfsysTrackSession_IdPerson( $params );
    $this->input_WbfsysTrackSession_Session( $params );
    $this->input_WbfsysTrackSession_Browser( $params );
    $this->input_WbfsysTrackSession_BrowserVersion( $params );
    $this->input_WbfsysTrackSession_TrackId( $params );
    $this->input_WbfsysTrackSession_Os( $params );
    $this->input_WbfsysTrackSession_OsVersion( $params );
    $this->input_WbfsysTrackSession_Rowid( $params );
    $this->input_WbfsysTrackSession_MTimeCreated( $params );
    $this->input_WbfsysTrackSession_MRoleCreate( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field id_session
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTrackSession_IdSession( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysTrackSession_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysTrackSession not exists' );

      Log::warn( 'Looks like the Entity: WbfsysTrackSession is missing' );

      return;
    }


      //p: Window
      $objidWbfsysTrackSession = $this->entity->getData( 'id_session' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysTrackSession
          || !$entityWbfsysTrackSession = $this->db->orm->get
          (
            'WbfsysTrackSession',
            $objidWbfsysTrackSession
          )
      )
      {
        $entityWbfsysTrackSession = $this->db->orm->newEntity( 'WbfsysTrackSession' );
      }

      $inputIdSession = $this->view->newInput( 'inputWbfsysTrackSessionIdSession', 'Window' );
      $this->items['wbfsys_track_session-id_session'] = $inputIdSession;
      $inputIdSession->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_track_session[id_session]',
        'id'        => 'wgt-input-wbfsys_track_session_id_session'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Session', 'src' => 'Track Session' ) ),
      ));

      if( $this->assignedForm )
        $inputIdSession->assignedForm = $this->assignedForm;

      $inputIdSession->setWidth( 'medium' );

      $inputIdSession->setData( $this->entity->getData( 'id_session' )  );
      $inputIdSession->setReadonly( $this->fieldReadOnly( 'wbfsys_track_session', 'id_session' ) );
      $inputIdSession->setRequired( $this->fieldRequired( 'wbfsys_track_session', 'id_session' ) );
      $inputIdSession->setLabel( $i18n->l( 'Session', 'wbfsys.track_session.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.TrackSession.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_track_session_id_session'.($this->suffix?'-'.$this->suffix:'');

      $inputIdSession->setListUrl ( $listUrl );
      $inputIdSession->setListIcon( 'control/connect.png' );
      $inputIdSession->setEntityUrl( 'maintab.php?c=Wbfsys.TrackSession.edit' );
      $inputIdSession->conEntity         = $entityWbfsysTrackSession;
      $inputIdSession->refresh           = $this->refresh;
      $inputIdSession->serializeElement  = $this->sendElement;



      $inputIdSession->view = $this->view;
      $inputIdSession->buildJavascript( 'wgt-input-wbfsys_track_session_id_session'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdSession );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysTrackSession_IdSession */

 /**
  * create the ui element for field service
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTrackSession_Service( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputService = $this->view->newInput( 'inputWbfsysTrackSessionService' , 'text' );
      $this->items['wbfsys_track_session-service'] = $inputService;
      $inputService->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_track_session[service]',
          'id'        => 'wgt-input-wbfsys_track_session_service'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_url medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Service', 'src' => 'Track Session' ) ),
        )
      );
      $inputService->setWidth( 'medium' );

      $inputService->setReadonly( $this->fieldReadOnly( 'wbfsys_track_session', 'service' ) );
      $inputService->setRequired( $this->fieldRequired( 'wbfsys_track_session', 'service' ) );
      $inputService->setData( $this->entity->getSecure( 'service' ) );
      $inputService->setLabel( $i18n->l( 'Service', 'wbfsys.track_session.label' ) );

      $inputService->refresh           = $this->refresh;
      $inputService->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_WbfsysTrackSession_Service */

 /**
  * create the ui element for field refer
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTrackSession_Refer( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRefer = $this->view->newInput( 'inputWbfsysTrackSessionRefer' , 'text' );
      $this->items['wbfsys_track_session-refer'] = $inputRefer;
      $inputRefer->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_track_session[refer]',
          'id'        => 'wgt-input-wbfsys_track_session_refer'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_url medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Refer', 'src' => 'Track Session' ) ),
        )
      );
      $inputRefer->setWidth( 'medium' );

      $inputRefer->setReadonly( $this->fieldReadOnly( 'wbfsys_track_session', 'refer' ) );
      $inputRefer->setRequired( $this->fieldRequired( 'wbfsys_track_session', 'refer' ) );
      $inputRefer->setData( $this->entity->getSecure( 'refer' ) );
      $inputRefer->setLabel( $i18n->l( 'Refer', 'wbfsys.track_session.label' ) );

      $inputRefer->refresh           = $this->refresh;
      $inputRefer->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_WbfsysTrackSession_Refer */

 /**
  * create the ui element for field id_person
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTrackSession_IdPerson( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'CorePerson_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity CorePerson not exists' );

      Log::warn( 'Looks like the Entity: CorePerson is missing' );

      return;
    }


      //p: Window
      $objidCorePerson = $this->entity->getData( 'id_person' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidCorePerson
          || !$entityCorePerson = $this->db->orm->get
          (
            'CorePerson',
            $objidCorePerson
          )
      )
      {
        $entityCorePerson = $this->db->orm->newEntity( 'CorePerson' );
      }

      $inputIdPerson = $this->view->newInput( 'inputWbfsysTrackSessionIdPerson', 'Window' );
      $this->items['wbfsys_track_session-id_person'] = $inputIdPerson;
      $inputIdPerson->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_track_session[id_person]',
        'id'        => 'wgt-input-wbfsys_track_session_id_person'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Person', 'src' => 'Track Session' ) ),
      ));

      if( $this->assignedForm )
        $inputIdPerson->assignedForm = $this->assignedForm;

      $inputIdPerson->setWidth( 'medium' );

      $inputIdPerson->setData( $this->entity->getData( 'id_person' )  );
      $inputIdPerson->setReadonly( $this->fieldReadOnly( 'wbfsys_track_session', 'id_person' ) );
      $inputIdPerson->setRequired( $this->fieldRequired( 'wbfsys_track_session', 'id_person' ) );
      $inputIdPerson->setLabel( $i18n->l( 'Person', 'wbfsys.track_session.label' ) );


      $listUrl = 'modal.php?c=Core.Person.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_track_session_id_person'.($this->suffix?'-'.$this->suffix:'');

      $inputIdPerson->setListUrl ( $listUrl );
      $inputIdPerson->setListIcon( 'control/connect.png' );
      $inputIdPerson->setEntityUrl( 'maintab.php?c=Core.Person.edit' );
      $inputIdPerson->conEntity         = $entityCorePerson;
      $inputIdPerson->refresh           = $this->refresh;
      $inputIdPerson->serializeElement  = $this->sendElement;



      $inputIdPerson->view = $this->view;
      $inputIdPerson->buildJavascript( 'wgt-input-wbfsys_track_session_id_person'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdPerson );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysTrackSession_IdPerson */

 /**
  * create the ui element for field session
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTrackSession_Session( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputSession = $this->view->newInput( 'inputWbfsysTrackSessionSession' , 'Text' );
      $this->items['wbfsys_track_session-session'] = $inputSession;
      $inputSession->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_track_session[session]',
          'id'        => 'wgt-input-wbfsys_track_session_session'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Session', 'src' => 'Track Session' ) ),
          'maxlength' => $this->entity->maxSize( 'session' ),
        )
      );
      $inputSession->setWidth( 'medium' );

      $inputSession->setReadonly( $this->fieldReadOnly( 'wbfsys_track_session', 'session' ) );
      $inputSession->setRequired( $this->fieldRequired( 'wbfsys_track_session', 'session' ) );
      $inputSession->setData( $this->entity->getSecure('session') );
      $inputSession->setLabel( $i18n->l( 'Session', 'wbfsys.track_session.label' ) );

      $inputSession->refresh           = $this->refresh;
      $inputSession->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysTrackSession_Session */

 /**
  * create the ui element for field browser
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTrackSession_Browser( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputBrowser = $this->view->newInput( 'inputWbfsysTrackSessionBrowser' , 'Text' );
      $this->items['wbfsys_track_session-browser'] = $inputBrowser;
      $inputBrowser->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_track_session[browser]',
          'id'        => 'wgt-input-wbfsys_track_session_browser'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Browser', 'src' => 'Track Session' ) ),
          'maxlength' => $this->entity->maxSize( 'browser' ),
        )
      );
      $inputBrowser->setWidth( 'medium' );

      $inputBrowser->setReadonly( $this->fieldReadOnly( 'wbfsys_track_session', 'browser' ) );
      $inputBrowser->setRequired( $this->fieldRequired( 'wbfsys_track_session', 'browser' ) );
      $inputBrowser->setData( $this->entity->getSecure('browser') );
      $inputBrowser->setLabel( $i18n->l( 'Browser', 'wbfsys.track_session.label' ) );

      $inputBrowser->refresh           = $this->refresh;
      $inputBrowser->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysTrackSession_Browser */

 /**
  * create the ui element for field browser_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTrackSession_BrowserVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputBrowserVersion = $this->view->newInput( 'inputWbfsysTrackSessionBrowserVersion' , 'Text' );
      $this->items['wbfsys_track_session-browser_version'] = $inputBrowserVersion;
      $inputBrowserVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_track_session[browser_version]',
          'id'        => 'wgt-input-wbfsys_track_session_browser_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Browser version', 'src' => 'Track Session' ) ),
          'maxlength' => $this->entity->maxSize( 'browser_version' ),
        )
      );
      $inputBrowserVersion->setWidth( 'medium' );

      $inputBrowserVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_track_session', 'browser_version' ) );
      $inputBrowserVersion->setRequired( $this->fieldRequired( 'wbfsys_track_session', 'browser_version' ) );
      $inputBrowserVersion->setData( $this->entity->getSecure('browser_version') );
      $inputBrowserVersion->setLabel( $i18n->l( 'Browser version', 'wbfsys.track_session.label' ) );

      $inputBrowserVersion->refresh           = $this->refresh;
      $inputBrowserVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysTrackSession_BrowserVersion */

 /**
  * create the ui element for field track_id
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTrackSession_TrackId( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputTrackId = $this->view->newInput( 'inputWbfsysTrackSessionTrackId' , 'Text' );
      $this->items['wbfsys_track_session-track_id'] = $inputTrackId;
      $inputTrackId->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_track_session[track_id]',
          'id'        => 'wgt-input-wbfsys_track_session_track_id'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'UUID', 'src' => 'Track Session' ) ),
          'maxlength' => $this->entity->maxSize( 'track_id' ),
        )
      );
      $inputTrackId->setWidth( 'medium' );

      $inputTrackId->setReadonly( $this->fieldReadOnly( 'wbfsys_track_session', 'track_id' ) );
      $inputTrackId->setRequired( $this->fieldRequired( 'wbfsys_track_session', 'track_id' ) );
      $inputTrackId->setData( $this->entity->getSecure('track_id') );
      $inputTrackId->setLabel( $i18n->l( 'UUID', 'wbfsys.track_session.label' ) );

      $inputTrackId->refresh           = $this->refresh;
      $inputTrackId->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysTrackSession_TrackId */

 /**
  * create the ui element for field os
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTrackSession_Os( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputOs = $this->view->newInput( 'inputWbfsysTrackSessionOs' , 'Text' );
      $this->items['wbfsys_track_session-os'] = $inputOs;
      $inputOs->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_track_session[os]',
          'id'        => 'wgt-input-wbfsys_track_session_os'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Os', 'src' => 'Track Session' ) ),
          'maxlength' => $this->entity->maxSize( 'os' ),
        )
      );
      $inputOs->setWidth( 'medium' );

      $inputOs->setReadonly( $this->fieldReadOnly( 'wbfsys_track_session', 'os' ) );
      $inputOs->setRequired( $this->fieldRequired( 'wbfsys_track_session', 'os' ) );
      $inputOs->setData( $this->entity->getSecure('os') );
      $inputOs->setLabel( $i18n->l( 'Os', 'wbfsys.track_session.label' ) );

      $inputOs->refresh           = $this->refresh;
      $inputOs->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysTrackSession_Os */

 /**
  * create the ui element for field os_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTrackSession_OsVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputOsVersion = $this->view->newInput( 'inputWbfsysTrackSessionOsVersion' , 'Text' );
      $this->items['wbfsys_track_session-os_version'] = $inputOsVersion;
      $inputOsVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_track_session[os_version]',
          'id'        => 'wgt-input-wbfsys_track_session_os_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Os version', 'src' => 'Track Session' ) ),
          'maxlength' => $this->entity->maxSize( 'os_version' ),
        )
      );
      $inputOsVersion->setWidth( 'medium' );

      $inputOsVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_track_session', 'os_version' ) );
      $inputOsVersion->setRequired( $this->fieldRequired( 'wbfsys_track_session', 'os_version' ) );
      $inputOsVersion->setData( $this->entity->getSecure('os_version') );
      $inputOsVersion->setLabel( $i18n->l( 'Os version', 'wbfsys.track_session.label' ) );

      $inputOsVersion->refresh           = $this->refresh;
      $inputOsVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysTrackSession_OsVersion */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTrackSession_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysTrackSessionRowid' , 'int' );
      $this->items['wbfsys_track_session-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_track_session[rowid]',
          'id'        => 'wgt-input-wbfsys_track_session_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Track Session' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_track_session', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_track_session', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.track_session.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysTrackSession_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTrackSession_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysTrackSessionMTimeCreated' , 'Date' );
      $this->items['wbfsys_track_session-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_track_session[m_time_created]',
          'id'        => 'wgt-input-wbfsys_track_session_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Track Session' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_track_session', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_track_session', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.track_session.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysTrackSession_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTrackSession_MRoleCreate( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysRoleUser_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysRoleUser not exists' );

      Log::warn( 'Looks like the Entity: WbfsysRoleUser is missing' );

      return;
    }


      //p: Window
      $objidWbfsysRoleUser = $this->entity->getData( 'm_role_create' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysRoleUser
          || !$entityWbfsysRoleUser = $this->db->orm->get
          (
            'WbfsysRoleUser',
            $objidWbfsysRoleUser
          )
      )
      {
        $entityWbfsysRoleUser = $this->db->orm->newEntity( 'WbfsysRoleUser' );
      }

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysTrackSessionMRoleCreate', 'Window' );
      $this->items['wbfsys_track_session-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_track_session[m_role_create]',
        'id'        => 'wgt-input-wbfsys_track_session_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Track Session' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_track_session', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_track_session', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.track_session.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_track_session_m_role_create'.($this->suffix?'-'.$this->suffix:'');

      $inputMRoleCreate->setListUrl ( $listUrl );
      $inputMRoleCreate->setListIcon( 'control/connect.png' );
      $inputMRoleCreate->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.edit' );
      $inputMRoleCreate->conEntity         = $entityWbfsysRoleUser;
      $inputMRoleCreate->refresh           = $this->refresh;
      $inputMRoleCreate->serializeElement  = $this->sendElement;


        $inputMRoleCreate->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.RoleUser.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputMRoleCreate->view = $this->view;
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_track_session_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysTrackSession_MRoleCreate */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysTrackSession_Crud_Edit_Form */


