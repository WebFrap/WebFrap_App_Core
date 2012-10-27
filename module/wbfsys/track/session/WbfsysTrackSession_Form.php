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
class WbfsysTrackSession_Form
  extends WgtForm
{
////////////////////////////////////////////////////////////////////////////////
// attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * the name of the key for the post data
   * @setter WgtForm::setKeyName()
   * @getter WgtForm::getKeyName()
   * @var string 
   */
  public $keyName     = 'wbfsys_track_session';

  /**
   * the cname for the entities, is used to request metadata from the orm
   * @setter WgtForm::setEntityName()
   * @getter WgtForm::getEntityName()
   * @var string 
   */
  public $entityName  = 'WbfsysTrackSession';

  /**
   * namespace for the actual form
   * @setter WgtForm::setNamespace()
   * @getter WgtForm::getNamespace()
   * @var string 
   */
  public $namespace  = 'WbfsysTrackSession';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtForm::setPrefix()
   * @getter WgtForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysTrackSession';

  /**
   * suffixes are used to create multiple instances of forms for diffrent
   * datasets, normaly the suffix is the id of a dataset or "-new" for
   * create forms
   *
   * @setter WgtForm::setSuffix()
   * @getter WgtForm::getSuffix()
   * @var string 
   */
  public $suffix      = null;

  /**
   * Die Datenentity für das Formular
   *
   * @var WbfsysTrackSession_Entity 
   */
  public $entity      = null;
  
////////////////////////////////////////////////////////////////////////////////
// form methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysTrackSession entity
  *
  * @param Entity $entity the entity object
  * @param array $fields list with all elements that shoul be shown in the ui
  * @namedParam TFlag $params named parameters
  * {
  *   string keyName    : the key name for the multidim array name of the inputfields;
  *   string prefix     : prefix for the inputs;
  *   string target     : target for;
  *   boolean readOnly  : set all elements to readonly;
  *   boolean refresh   : refresh the elements in an ajax request ;
  *   boolean sendElement : if true, then the system will send the elements in
  *   ajax requests als serialized html and not only just as value
  * }
  */
  public function createForm( $entity, $fields = array(), $params = null  )
  {

    $params = $this->checkNamedParams( $params );

    if( !$entity )
    {
      Error::addError( 'Entity must not be null!!' );
      Message::addError( 'Some internal error occured, it\'s likely, that some data are missing in the ui' );
      return false;
    }

    $this->entity = $entity;
    $this->rowid  = $entity->getId();

    // add the entity to the view
    $this->view->addVar( 'entity'.$this->prefix, $this->entity );

    $this->db     = $this->getDb();

    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-'.$this->keyName.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => $this->keyName.'[id_'.$this->keyName.'-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    // append search meta data
    $this->input_rowid( $params );

    foreach( $fields as $key )
    {
      $method = 'input_'.$key;

      if( method_exists( $this,  $method ) )
      {
        $this->$method( $params );
      }
      else
      {
        if(DEBUG)
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysTrackSession' );
      }
    }

  }//end public function createForm */

 /**
  * create a search form for the WbfsysTrackSession entity
  *
  * @param Entity $entity
  * @param array $fields
  * @param TFlag $params
  */
  public function createSearchForm(  $entity, $fields = array(), $params = null  )
  {

    $this->entity  = $entity;
    $this->rowid   = $entity->getId();

    $this->db      = $this->getDb();
    $params        = $this->checkNamedParams( $params );

    $this->prefix  .= 'Search';
    $this->keyName = 'search_'.$this->keyName;

    if( !$this->suffix )
    {
      $this->suffix = 'search';
    }

    foreach( $fields as $key )
    {
      $method = 'search_'.$key;
      if( method_exists( $this,  $method ) )
      {
        $this->$method( $params );
      }
      else
      {
        if(DEBUG)
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysTrackSession' );
      }
    }

    // append search meta data
    $this->search_m_role_create( $params );
    $this->search_m_role_change( $params );
    $this->search_m_time_created_before( $params );
    $this->search_m_time_created_after( $params );
    $this->search_m_time_changed_before( $params );
    $this->search_m_time_changed_after( $params );
    $this->search_m_rowid( $params );
    $this->search_m_uuid( $params );

  }//end public function createSearchForm */

////////////////////////////////////////////////////////////////////////////////
// field methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create the ui element for field id_session
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_session( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysTrackSession_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysTrackSession not exists' );

      Log::warn('Looks like the Entity: WbfsysTrackSession is missing');

      return;
    }


      //p: Window
      $objidWbfsysTrackSession = $this->entity->getData('id_session') ;

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

      $inputIdSession = $this->view->newInput( 'input'.$this->prefix.'IdSession', 'Window' );
      $inputIdSession->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_session]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_session'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Session (Track Session)', 'wbfsys.track_session.label' ),
      ));

      if( $this->assignedForm )
        $inputIdSession->assignedForm = $this->assignedForm;

      $inputIdSession->setWidth( 'medium' );

      $inputIdSession->setData( $this->entity->getData( 'id_session' )  );
      $inputIdSession->setReadOnly( $this->isReadOnly( 'id_session' ) );
      $inputIdSession->setLabel( $this->view->i18n->l( 'Session', 'wbfsys.track_session.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.TrackSession.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_session'.($this->suffix?'-'.$this->suffix:'');

      $inputIdSession->setListUrl ( $listUrl );
      $inputIdSession->setListIcon( 'control/connect.png' );
      $inputIdSession->setEntityUrl( 'maintab.php?c=Wbfsys.TrackSession.edit' );
      $inputIdSession->conEntity         = $entityWbfsysTrackSession;
      $inputIdSession->refresh           = $this->refresh;
      $inputIdSession->serializeElement  = $this->sendElement;
      


      $inputIdSession->view = $this->view;
      $inputIdSession->buildJavascript( 'wgt-input-'.$this->keyName.'_id_session'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdSession );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_session */

 /**
  * create the ui element for field service
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_service( $params )
  {

      //tpl: class ui: guess
      $inputService = $this->view->newInput( 'input'.$this->prefix.'Service' , 'text' );
      $this->items['service'] = $inputService;
      $inputService->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[service]',
          'id'        => 'wgt-input-'.$this->keyName.'_service'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_url medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Service (Track Session)', 'wbfsys.track_session.label' ),
        )
      );
      $inputService->setWidth( 'medium' );

      $inputService->setReadOnly( $this->isReadOnly( 'service' ) );
      $inputService->setData( $this->entity->getSecure('service') );
      $inputService->setLabel
      (
        $this->view->i18n->l( 'Service', 'wbfsys.track_session.label' ),
        $this->entity->required( 'service' )
      );

      $inputService->refresh           = $this->refresh;
      $inputService->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_service */

 /**
  * create the ui element for field refer
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_refer( $params )
  {

      //tpl: class ui: guess
      $inputRefer = $this->view->newInput( 'input'.$this->prefix.'Refer' , 'text' );
      $this->items['refer'] = $inputRefer;
      $inputRefer->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[refer]',
          'id'        => 'wgt-input-'.$this->keyName.'_refer'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_url medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Refer (Track Session)', 'wbfsys.track_session.label' ),
        )
      );
      $inputRefer->setWidth( 'medium' );

      $inputRefer->setReadOnly( $this->isReadOnly( 'refer' ) );
      $inputRefer->setData( $this->entity->getSecure('refer') );
      $inputRefer->setLabel
      (
        $this->view->i18n->l( 'Refer', 'wbfsys.track_session.label' ),
        $this->entity->required( 'refer' )
      );

      $inputRefer->refresh           = $this->refresh;
      $inputRefer->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_refer */

 /**
  * create the ui element for field id_person
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_person( $params )
  {

    if( !Webfrap::classLoadable( 'CorePerson_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity CorePerson not exists' );

      Log::warn('Looks like the Entity: CorePerson is missing');

      return;
    }


      //p: Window
      $objidCorePerson = $this->entity->getData('id_person') ;

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

      $inputIdPerson = $this->view->newInput( 'input'.$this->prefix.'IdPerson', 'Window' );
      $inputIdPerson->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_person]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_person'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Person (Track Session)', 'wbfsys.track_session.label' ),
      ));

      if( $this->assignedForm )
        $inputIdPerson->assignedForm = $this->assignedForm;

      $inputIdPerson->setWidth( 'medium' );

      $inputIdPerson->setData( $this->entity->getData( 'id_person' )  );
      $inputIdPerson->setReadOnly( $this->isReadOnly( 'id_person' ) );
      $inputIdPerson->setLabel( $this->view->i18n->l( 'Person', 'wbfsys.track_session.label' ) );


      $listUrl = 'modal.php?c=Core.Person.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_person'.($this->suffix?'-'.$this->suffix:'');

      $inputIdPerson->setListUrl ( $listUrl );
      $inputIdPerson->setListIcon( 'control/connect.png' );
      $inputIdPerson->setEntityUrl( 'maintab.php?c=Core.Person.edit' );
      $inputIdPerson->conEntity         = $entityCorePerson;
      $inputIdPerson->refresh           = $this->refresh;
      $inputIdPerson->serializeElement  = $this->sendElement;
      


      $inputIdPerson->view = $this->view;
      $inputIdPerson->buildJavascript( 'wgt-input-'.$this->keyName.'_id_person'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdPerson );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_person */

 /**
  * create the ui element for field session
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_session( $params )
  {

      //tpl: class ui:text
      $inputSession = $this->view->newInput( 'input'.$this->prefix.'Session' , 'Text' );
      $this->items['session'] = $inputSession;
      $inputSession->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[session]',
          'id'        => 'wgt-input-'.$this->keyName.'_session'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Session (Track Session)', 'wbfsys.track_session.label' ),
          'maxlength' => $this->entity->maxSize( 'session' ),
        )
      );
      $inputSession->setWidth( 'medium' );

      $inputSession->setReadOnly( $this->isReadOnly( 'session' ) );
      $inputSession->setData( $this->entity->getSecure('session') );
      $inputSession->setLabel
      (
        $this->view->i18n->l( 'Session', 'wbfsys.track_session.label' ),
        $this->entity->required( 'session' )
      );

      $inputSession->refresh           = $this->refresh;
      $inputSession->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_session */

 /**
  * create the ui element for field browser
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_browser( $params )
  {

      //tpl: class ui:text
      $inputBrowser = $this->view->newInput( 'input'.$this->prefix.'Browser' , 'Text' );
      $this->items['browser'] = $inputBrowser;
      $inputBrowser->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[browser]',
          'id'        => 'wgt-input-'.$this->keyName.'_browser'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Browser (Track Session)', 'wbfsys.track_session.label' ),
          'maxlength' => $this->entity->maxSize( 'browser' ),
        )
      );
      $inputBrowser->setWidth( 'medium' );

      $inputBrowser->setReadOnly( $this->isReadOnly( 'browser' ) );
      $inputBrowser->setData( $this->entity->getSecure('browser') );
      $inputBrowser->setLabel
      (
        $this->view->i18n->l( 'Browser', 'wbfsys.track_session.label' ),
        $this->entity->required( 'browser' )
      );

      $inputBrowser->refresh           = $this->refresh;
      $inputBrowser->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_browser */

 /**
  * create the ui element for field browser_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_browser_version( $params )
  {

      //tpl: class ui:text
      $inputBrowserVersion = $this->view->newInput( 'input'.$this->prefix.'BrowserVersion' , 'Text' );
      $this->items['browser_version'] = $inputBrowserVersion;
      $inputBrowserVersion->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[browser_version]',
          'id'        => 'wgt-input-'.$this->keyName.'_browser_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Browser version (Track Session)', 'wbfsys.track_session.label' ),
          'maxlength' => $this->entity->maxSize( 'browser_version' ),
        )
      );
      $inputBrowserVersion->setWidth( 'medium' );

      $inputBrowserVersion->setReadOnly( $this->isReadOnly( 'browser_version' ) );
      $inputBrowserVersion->setData( $this->entity->getSecure('browser_version') );
      $inputBrowserVersion->setLabel
      (
        $this->view->i18n->l( 'Browser version', 'wbfsys.track_session.label' ),
        $this->entity->required( 'browser_version' )
      );

      $inputBrowserVersion->refresh           = $this->refresh;
      $inputBrowserVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_browser_version */

 /**
  * create the ui element for field track_id
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_track_id( $params )
  {

      //tpl: class ui:text
      $inputTrackId = $this->view->newInput( 'input'.$this->prefix.'TrackId' , 'Text' );
      $this->items['track_id'] = $inputTrackId;
      $inputTrackId->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[track_id]',
          'id'        => 'wgt-input-'.$this->keyName.'_track_id'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for UUID (Track Session)', 'wbfsys.track_session.label' ),
          'maxlength' => $this->entity->maxSize( 'track_id' ),
        )
      );
      $inputTrackId->setWidth( 'medium' );

      $inputTrackId->setReadOnly( $this->isReadOnly( 'track_id' ) );
      $inputTrackId->setData( $this->entity->getSecure('track_id') );
      $inputTrackId->setLabel
      (
        $this->view->i18n->l( 'UUID', 'wbfsys.track_session.label' ),
        $this->entity->required( 'track_id' )
      );

      $inputTrackId->refresh           = $this->refresh;
      $inputTrackId->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_track_id */

 /**
  * create the ui element for field os
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_os( $params )
  {

      //tpl: class ui:text
      $inputOs = $this->view->newInput( 'input'.$this->prefix.'Os' , 'Text' );
      $this->items['os'] = $inputOs;
      $inputOs->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[os]',
          'id'        => 'wgt-input-'.$this->keyName.'_os'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Os (Track Session)', 'wbfsys.track_session.label' ),
          'maxlength' => $this->entity->maxSize( 'os' ),
        )
      );
      $inputOs->setWidth( 'medium' );

      $inputOs->setReadOnly( $this->isReadOnly( 'os' ) );
      $inputOs->setData( $this->entity->getSecure('os') );
      $inputOs->setLabel
      (
        $this->view->i18n->l( 'Os', 'wbfsys.track_session.label' ),
        $this->entity->required( 'os' )
      );

      $inputOs->refresh           = $this->refresh;
      $inputOs->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_os */

 /**
  * create the ui element for field os_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_os_version( $params )
  {

      //tpl: class ui:text
      $inputOsVersion = $this->view->newInput( 'input'.$this->prefix.'OsVersion' , 'Text' );
      $this->items['os_version'] = $inputOsVersion;
      $inputOsVersion->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[os_version]',
          'id'        => 'wgt-input-'.$this->keyName.'_os_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Os version (Track Session)', 'wbfsys.track_session.label' ),
          'maxlength' => $this->entity->maxSize( 'os_version' ),
        )
      );
      $inputOsVersion->setWidth( 'medium' );

      $inputOsVersion->setReadOnly( $this->isReadOnly( 'os_version' ) );
      $inputOsVersion->setData( $this->entity->getSecure('os_version') );
      $inputOsVersion->setLabel
      (
        $this->view->i18n->l( 'Os version', 'wbfsys.track_session.label' ),
        $this->entity->required( 'os_version' )
      );

      $inputOsVersion->refresh           = $this->refresh;
      $inputOsVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_os_version */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_rowid( $params )
  {

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'input'.$this->prefix.'Rowid' , 'int' );
      $this->items['rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[rowid]',
          'id'        => 'wgt-input-'.$this->keyName.'_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Rowid (Track Session)', 'wbfsys.track_session.label' ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadOnly( $this->isReadOnly( 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel
      (
        $this->view->i18n->l( 'Rowid', 'wbfsys.track_session.label' ),
        $this->entity->required( 'rowid' )
      );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_time_created( $params )
  {

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'input'.$this->prefix.'MTimeCreated' , 'Date' );
      $this->items['m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[m_time_created]',
          'id'        => 'wgt-input-'.$this->keyName.'_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Time Created (Track Session)', 'wbfsys.track_session.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadOnly( true );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel
      (
        $this->view->i18n->l( 'Time Created', 'wbfsys.track_session.label' ),
        $this->entity->required( 'm_time_created' )
      );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_m_time_created */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_role_create( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysRoleUser_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysRoleUser not exists' );

      Log::warn('Looks like the Entity: WbfsysRoleUser is missing');

      return;
    }


      //p: Window
      $objidWbfsysRoleUser = $this->entity->getData('m_role_create') ;

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

      $inputMRoleCreate = $this->view->newInput( 'input'.$this->prefix.'MRoleCreate', 'Window' );
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[m_role_create]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Role Create (Track Session)', 'wbfsys.track_session.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadOnly( true );
      $inputMRoleCreate->setLabel( $this->view->i18n->l( 'Role Create', 'wbfsys.track_session.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_m_role_create'.($this->suffix?'-'.$this->suffix:'');

      $inputMRoleCreate->setListUrl ( $listUrl );
      $inputMRoleCreate->setListIcon( 'control/connect.png' );
      $inputMRoleCreate->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.edit' );
      $inputMRoleCreate->conEntity         = $entityWbfsysRoleUser;
      $inputMRoleCreate->refresh           = $this->refresh;
      $inputMRoleCreate->serializeElement  = $this->sendElement;
      

        $inputMRoleCreate->setAutocomplete
        (
        '{
          "url":"ajax.php?c=Wbfsys.RoleUser.autocomplete&amp;key=",
          "type":"entity"
          }'
        );
        

      $inputMRoleCreate->view = $this->view;
      $inputMRoleCreate->buildJavascript( 'wgt-input-'.$this->keyName.'_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_m_role_create */

////////////////////////////////////////////////////////////////////////////////
// search field methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create the search element for field service
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_service( $params )
  {

      //tpl: class ui: guess
      $inputService = $this->view->newInput( 'input'.$this->prefix.'Service' , 'text' );
      $this->items['service'] = $inputService;
      $inputService->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[service]',
          'id'        => 'wgt-input-'.$this->keyName.'_service'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_url medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Service (Track Session)', 'wbfsys.track_session.label' ),
        )
      );
      $inputService->setWidth( 'medium' );

      $inputService->setReadOnly( $this->isReadOnly( 'service' ) );
      $inputService->setData( $this->entity->getSecure('service') );
      $inputService->setLabel
      (
        $this->view->i18n->l( 'Service', 'wbfsys.track_session.label' ),
        $this->entity->required( 'service' )
      );

      $inputService->refresh           = $this->refresh;
      $inputService->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );



  }//end public function search_service */

 /**
  * create the search element for field refer
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_refer( $params )
  {

      //tpl: class ui: guess
      $inputRefer = $this->view->newInput( 'input'.$this->prefix.'Refer' , 'text' );
      $this->items['refer'] = $inputRefer;
      $inputRefer->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[refer]',
          'id'        => 'wgt-input-'.$this->keyName.'_refer'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_url medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Refer (Track Session)', 'wbfsys.track_session.label' ),
        )
      );
      $inputRefer->setWidth( 'medium' );

      $inputRefer->setReadOnly( $this->isReadOnly( 'refer' ) );
      $inputRefer->setData( $this->entity->getSecure('refer') );
      $inputRefer->setLabel
      (
        $this->view->i18n->l( 'Refer', 'wbfsys.track_session.label' ),
        $this->entity->required( 'refer' )
      );

      $inputRefer->refresh           = $this->refresh;
      $inputRefer->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );



  }//end public function search_refer */

 /**
  * create the search element for field session
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_session( $params )
  {

      //tpl: class ui:text
      $inputSession = $this->view->newInput( 'input'.$this->prefix.'Session' , 'Text' );
      $this->items['session'] = $inputSession;
      $inputSession->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[session]',
          'id'        => 'wgt-input-'.$this->keyName.'_session'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Session (Track Session)', 'wbfsys.track_session.label' ),
          'maxlength' => $this->entity->maxSize( 'session' ),
        )
      );
      $inputSession->setWidth( 'medium' );

      $inputSession->setReadOnly( $this->isReadOnly( 'session' ) );
      $inputSession->setData( $this->entity->getSecure('session') );
      $inputSession->setLabel
      (
        $this->view->i18n->l( 'Session', 'wbfsys.track_session.label' ),
        $this->entity->required( 'session' )
      );

      $inputSession->refresh           = $this->refresh;
      $inputSession->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );


  }//end public function search_session */

 /**
  * create the search element for field browser
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_browser( $params )
  {

      //tpl: class ui:text
      $inputBrowser = $this->view->newInput( 'input'.$this->prefix.'Browser' , 'Text' );
      $this->items['browser'] = $inputBrowser;
      $inputBrowser->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[browser]',
          'id'        => 'wgt-input-'.$this->keyName.'_browser'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Browser (Track Session)', 'wbfsys.track_session.label' ),
          'maxlength' => $this->entity->maxSize( 'browser' ),
        )
      );
      $inputBrowser->setWidth( 'medium' );

      $inputBrowser->setReadOnly( $this->isReadOnly( 'browser' ) );
      $inputBrowser->setData( $this->entity->getSecure('browser') );
      $inputBrowser->setLabel
      (
        $this->view->i18n->l( 'Browser', 'wbfsys.track_session.label' ),
        $this->entity->required( 'browser' )
      );

      $inputBrowser->refresh           = $this->refresh;
      $inputBrowser->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );


  }//end public function search_browser */

 /**
  * create the search element for field track_id
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_track_id( $params )
  {

      //tpl: class ui:text
      $inputTrackId = $this->view->newInput( 'input'.$this->prefix.'TrackId' , 'Text' );
      $this->items['track_id'] = $inputTrackId;
      $inputTrackId->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[track_id]',
          'id'        => 'wgt-input-'.$this->keyName.'_track_id'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for UUID (Track Session)', 'wbfsys.track_session.label' ),
          'maxlength' => $this->entity->maxSize( 'track_id' ),
        )
      );
      $inputTrackId->setWidth( 'medium' );

      $inputTrackId->setReadOnly( $this->isReadOnly( 'track_id' ) );
      $inputTrackId->setData( $this->entity->getSecure('track_id') );
      $inputTrackId->setLabel
      (
        $this->view->i18n->l( 'UUID', 'wbfsys.track_session.label' ),
        $this->entity->required( 'track_id' )
      );

      $inputTrackId->refresh           = $this->refresh;
      $inputTrackId->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Meta' ,
        true
      );


  }//end public function search_track_id */

 /**
  * create the search element for field os
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_os( $params )
  {

      //tpl: class ui:text
      $inputOs = $this->view->newInput( 'input'.$this->prefix.'Os' , 'Text' );
      $this->items['os'] = $inputOs;
      $inputOs->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[os]',
          'id'        => 'wgt-input-'.$this->keyName.'_os'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Os (Track Session)', 'wbfsys.track_session.label' ),
          'maxlength' => $this->entity->maxSize( 'os' ),
        )
      );
      $inputOs->setWidth( 'medium' );

      $inputOs->setReadOnly( $this->isReadOnly( 'os' ) );
      $inputOs->setData( $this->entity->getSecure('os') );
      $inputOs->setLabel
      (
        $this->view->i18n->l( 'Os', 'wbfsys.track_session.label' ),
        $this->entity->required( 'os' )
      );

      $inputOs->refresh           = $this->refresh;
      $inputOs->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );


  }//end public function search_os */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_role_create( $params )
  {
    //tpl: special

    if( !Webfrap::classLoadable('WbfsysRoleUser_Entity') )
    {
      if(DEBUG)
        Debug::console('Class WbfsysRoleUser_Entity not exists');

      Log::warn('Looks like the Entity: WbfsysRoleUser_Entity is missing');

      return;
    }

    $entityWbfsysRoleUser = $this->db->orm->newEntity('WbfsysRoleUser');

    $inputRole = $this->view->newInput( 'input'.$this->prefix.'MRoleCreate', 'Window' );
    $inputRole->addAttributes
    (
      array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[m_role_create]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_role_create'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search medium wgt-no-save '.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('Creator','wbf.label'),
      )
    );
    $inputRole->setWidth('medium');
    $inputRole->setReadOnly( $this->readOnly );
    $inputRole->setLabel
    (
      $this->view->i18n->l('Creator','wbf.label')
    );

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_track_session_m_role_create';

    $inputRole->setListUrl( $listUrl );
    $inputRole->setListIcon( 'control/connect.png' );
    $inputRole->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.show' );
    $inputRole->conEntity         = $entityWbfsysRoleUser;
    $inputRole->refresh           = $this->refresh;
    $inputRole->serializeElement  = $this->sendElement;

    $inputRole->view = $this->view;
    $inputRole->buildJavascript( 'wgt-input-'.$this->keyName.'_m_role_create' );
    $this->view->addJsCode( $inputRole );

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_role_create */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_role_change( $params )
  {
    //tpl: special

    if( !Webfrap::classLoadable( 'WbfsysRoleUser_Entity' ) )
    {
      if(DEBUG)
        Debug::console('Class WbfsysRoleUser_Entity not exists');

      Log::warn('Looks like the Entity: WbfsysRoleUser_Entity is missing');

      return;
    }

    $entityWbfsysRoleUser = $this->db->orm->newEntity('WbfsysRoleUser');

    $inputRole = $this->view->newInput( 'input'.$this->prefix.'MRoleChange', 'Window' );
    $inputRole->addAttributes
    (
      array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[m_role_change]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_role_change'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search medium wgt-no-save '.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('Last Editor','wbf.label'),
      )
    );
    $inputRole->setWidth('medium');
    $inputRole->setReadOnly( $this->readOnly );
    $inputRole->setLabel
    (
      $this->view->i18n->l('Last Editor','wbf.label')
    );

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_track_session_m_role_change';

    $inputRole->setListUrl( $listUrl );
    $inputRole->setListIcon( 'control/connect.png' );
    $inputRole->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.show' );
    $inputRole->conEntity         = $entityWbfsysRoleUser;
    $inputRole->refresh           = $this->refresh;
    $inputRole->serializeElement  = $this->sendElement;

    $inputRole->view = $this->view;
    $inputRole->buildJavascript( 'wgt-input-'.$this->keyName.'_m_role_change' );
    $this->view->addJsCode( $inputRole );

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_role_change */


 /**
  *
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_time_created_before( $params )
  {

    //tpl: special
    $inputDate = $this->view->newInput( 'input'.$this->prefix.'MTimeCreatedBefore' , 'Date' );
    $inputDate->addAttributes
    (
      array
      (
        'name'      => $this->keyName.'[m_time_created_before]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_time_created_before'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search small wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('Changed Before','wbf.label'),
      )
    );
    $inputDate->setWidth('small');

    $inputDate->setReadOnly( $this->readOnly );
    $inputDate->setLabel
    (
      $this->view->i18n->l('Created Before','wbf.label')
    );
    $inputDate->refresh           = $this->refresh;
    $inputDate->serializeElement  = $this->sendElement;

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_time_created_before */

 /**
  *
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_time_created_after( $params )
  {

    //tpl: special
    $inputDate = $this->view->newInput( 'input'.$this->prefix.'MTimeCreatedAfter' , 'Date' );
    $inputDate->addAttributes
    (
      array
      (
        'name'      => $this->keyName.'[m_time_created_after]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_time_created_after'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search small wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('Created After','wbf.label'),
      )
    );
    $inputDate->setWidth('small');

    $inputDate->setReadOnly( $this->readOnly );
    $inputDate->setLabel
    (
      $this->view->i18n->l('Created After','wbf.label')
    );
    $inputDate->refresh           = $this->refresh;
    $inputDate->serializeElement  = $this->sendElement;

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_time_created_after */

 /**
  *
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_time_changed_before( $params )
  {

    //tpl: special
    $inputDate = $this->view->newInput( 'input'.$this->prefix.'MTimeChangedBefore' , 'Date' );
    $inputDate->addAttributes
    (
      array
      (
        'name'      => $this->keyName.'[m_time_changed_before]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_time_changed_before'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search small wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('Changed Before','wbf.label'),
      )
    );
    $inputDate->setWidth('small');

    $inputDate->setReadOnly( $this->readOnly );
    $inputDate->setLabel
    (
      $this->view->i18n->l('Changed Before','wbf.label')
    );
    $inputDate->refresh           = $this->refresh;
    $inputDate->serializeElement  = $this->sendElement;

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_time_changed_before */

 /**
  *
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_time_changed_after( $params )
  {

    //tpl: special
    $inputDate = $this->view->newInput( 'input'.$this->prefix.'MTimeChangedAfter' , 'Date' );
    $inputDate->addAttributes
    (
      array
      (
        'name'      => $this->keyName.'[m_time_changed_after]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_time_changed_after'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search small wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('Changed After','wbf.label'),
      )
    );
    $inputDate->setWidth('small');

    $inputDate->setReadOnly( $this->readOnly );
    $inputDate->setLabel
    (
      $this->view->i18n->l('Changed After','wbf.label')
    );
    $inputDate->refresh           = $this->refresh;
    $inputDate->serializeElement  = $this->sendElement;

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_time_changed_after */


 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_rowid( $params )
  {

    //tpl: special
    $inputRowid = $this->view->newInput( 'input'.$this->prefix.'MRowid' , 'Int' );
    $inputRowid->addAttributes
    (
      array
      (
        'name'      => $this->keyName.'[rowid]',
        'id'        => 'wgt-input-'.$this->keyName.'_rowid'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'valid_required medium wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('IDI','wbf.label'),
      )
    );
    $inputRowid->setWidth('medium');

    $inputRowid->setReadOnly( $this->readOnly );
    $inputRowid->setLabel
    (
      $this->view->i18n->l('IDI','wbf.label')
    );
    $inputRowid->refresh           = $this->refresh;
    $inputRowid->serializeElement  = $this->sendElement;

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_rowid */

 /**
  * create the search element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_uuid( $params )
  {

    //tpl: special
    $input = $this->view->newInput( 'input'.$this->prefix.'MUuid' , 'Text' );
    $input->addAttributes
    (
      array
      (
        'name'      => $this->keyName.'[m_uuid]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_uuid'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search medium wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('UUID','wbf.label'),
      )
    );
    $input->setWidth('medium');

    $input->setReadOnly( $this->readOnly );
    $input->setLabel
    (
      $this->view->i18n->l('UUID','wbf.label')
    );
    $input->refresh           = $this->refresh;
    $input->serializeElement  = $this->sendElement;

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );


  }//end public function search_m_uuid */




}//end class WbfsysTrackSession_Form */


