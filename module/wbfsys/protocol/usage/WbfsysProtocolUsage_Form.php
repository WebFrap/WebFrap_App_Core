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
class WbfsysProtocolUsage_Form
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
  public $keyName     = 'wbfsys_protocol_usage';

  /**
   * the cname for the entities, is used to request metadata from the orm
   * @setter WgtForm::setEntityName()
   * @getter WgtForm::getEntityName()
   * @var string 
   */
  public $entityName  = 'WbfsysProtocolUsage';

  /**
   * namespace for the actual form
   * @setter WgtForm::setNamespace()
   * @getter WgtForm::getNamespace()
   * @var string 
   */
  public $namespace  = 'WbfsysProtocolUsage';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtForm::setPrefix()
   * @getter WgtForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysProtocolUsage';

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
   * @var WbfsysProtocolUsage_Entity 
   */
  public $entity      = null;
  
////////////////////////////////////////////////////////////////////////////////
// form methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysProtocolUsage entity
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
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysProtocolUsage' );
      }
    }

  }//end public function createForm */

 /**
  * create a search form for the WbfsysProtocolUsage entity
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
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysProtocolUsage' );
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
  * create the ui element for field id_browser
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_browser( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysBrowser_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysBrowser not exists' );

      Log::warn('Looks like the Entity: WbfsysBrowser is missing');

      return;
    }


      //p: Window
      $objidWbfsysBrowser = $this->entity->getData('id_browser') ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysBrowser
          || !$entityWbfsysBrowser = $this->db->orm->get
          (
            'WbfsysBrowser',
            $objidWbfsysBrowser
          )
      )
      {
        $entityWbfsysBrowser = $this->db->orm->newEntity( 'WbfsysBrowser' );
      }

      $inputIdBrowser = $this->view->newInput( 'input'.$this->prefix.'IdBrowser', 'Window' );
      $inputIdBrowser->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_browser]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_browser'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Browser (Protocol Usage)', 'wbfsys.protocol_usage.label' ),
      ));

      if( $this->assignedForm )
        $inputIdBrowser->assignedForm = $this->assignedForm;

      $inputIdBrowser->setWidth( 'medium' );

      $inputIdBrowser->setData( $this->entity->getData( 'id_browser' )  );
      $inputIdBrowser->setReadOnly( $this->isReadOnly( 'id_browser' ) );
      $inputIdBrowser->setLabel( $this->view->i18n->l( 'Browser', 'wbfsys.protocol_usage.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Browser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_browser'.($this->suffix?'-'.$this->suffix:'');

      $inputIdBrowser->setListUrl ( $listUrl );
      $inputIdBrowser->setListIcon( 'control/connect.png' );
      $inputIdBrowser->setEntityUrl( 'maintab.php?c=Wbfsys.Browser.edit' );
      $inputIdBrowser->conEntity         = $entityWbfsysBrowser;
      $inputIdBrowser->refresh           = $this->refresh;
      $inputIdBrowser->serializeElement  = $this->sendElement;
      


      $inputIdBrowser->view = $this->view;
      $inputIdBrowser->buildJavascript( 'wgt-input-'.$this->keyName.'_id_browser'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdBrowser );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_browser */

 /**
  * create the ui element for field id_browser_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_browser_version( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysBrowserVersion_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysBrowserVersion not exists' );

      Log::warn('Looks like the Entity: WbfsysBrowserVersion is missing');

      return;
    }


      //p: Window
      $objidWbfsysBrowserVersion = $this->entity->getData('id_browser_version') ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysBrowserVersion
          || !$entityWbfsysBrowserVersion = $this->db->orm->get
          (
            'WbfsysBrowserVersion',
            $objidWbfsysBrowserVersion
          )
      )
      {
        $entityWbfsysBrowserVersion = $this->db->orm->newEntity( 'WbfsysBrowserVersion' );
      }

      $inputIdBrowserVersion = $this->view->newInput( 'input'.$this->prefix.'IdBrowserVersion', 'Window' );
      $inputIdBrowserVersion->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_browser_version]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_browser_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Browser Version (Protocol Usage)', 'wbfsys.protocol_usage.label' ),
      ));

      if( $this->assignedForm )
        $inputIdBrowserVersion->assignedForm = $this->assignedForm;

      $inputIdBrowserVersion->setWidth( 'medium' );

      $inputIdBrowserVersion->setData( $this->entity->getData( 'id_browser_version' )  );
      $inputIdBrowserVersion->setReadOnly( $this->isReadOnly( 'id_browser_version' ) );
      $inputIdBrowserVersion->setLabel( $this->view->i18n->l( 'Browser Version', 'wbfsys.protocol_usage.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.BrowserVersion.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_browser_version'.($this->suffix?'-'.$this->suffix:'');

      $inputIdBrowserVersion->setListUrl ( $listUrl );
      $inputIdBrowserVersion->setListIcon( 'control/connect.png' );
      $inputIdBrowserVersion->setEntityUrl( 'maintab.php?c=Wbfsys.BrowserVersion.edit' );
      $inputIdBrowserVersion->conEntity         = $entityWbfsysBrowserVersion;
      $inputIdBrowserVersion->refresh           = $this->refresh;
      $inputIdBrowserVersion->serializeElement  = $this->sendElement;
      


      $inputIdBrowserVersion->view = $this->view;
      $inputIdBrowserVersion->buildJavascript( 'wgt-input-'.$this->keyName.'_id_browser_version'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdBrowserVersion );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_browser_version */

 /**
  * create the ui element for field id_os
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_os( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysOs_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysOs not exists' );

      Log::warn('Looks like the Entity: WbfsysOs is missing');

      return;
    }


      //p: Window
      $objidWbfsysOs = $this->entity->getData('id_os') ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysOs
          || !$entityWbfsysOs = $this->db->orm->get
          (
            'WbfsysOs',
            $objidWbfsysOs
          )
      )
      {
        $entityWbfsysOs = $this->db->orm->newEntity( 'WbfsysOs' );
      }

      $inputIdOs = $this->view->newInput( 'input'.$this->prefix.'IdOs', 'Window' );
      $inputIdOs->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_os]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_os'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Os (Protocol Usage)', 'wbfsys.protocol_usage.label' ),
      ));

      if( $this->assignedForm )
        $inputIdOs->assignedForm = $this->assignedForm;

      $inputIdOs->setWidth( 'medium' );

      $inputIdOs->setData( $this->entity->getData( 'id_os' )  );
      $inputIdOs->setReadOnly( $this->isReadOnly( 'id_os' ) );
      $inputIdOs->setLabel( $this->view->i18n->l( 'Os', 'wbfsys.protocol_usage.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Os.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_os'.($this->suffix?'-'.$this->suffix:'');

      $inputIdOs->setListUrl ( $listUrl );
      $inputIdOs->setListIcon( 'control/connect.png' );
      $inputIdOs->setEntityUrl( 'maintab.php?c=Wbfsys.Os.edit' );
      $inputIdOs->conEntity         = $entityWbfsysOs;
      $inputIdOs->refresh           = $this->refresh;
      $inputIdOs->serializeElement  = $this->sendElement;
      


      $inputIdOs->view = $this->view;
      $inputIdOs->buildJavascript( 'wgt-input-'.$this->keyName.'_id_os'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdOs );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_os */

 /**
  * create the ui element for field id_main_language
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_main_language( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysLanguage_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysLanguage not exists' );

      Log::warn('Looks like the Entity: WbfsysLanguage is missing');

      return;
    }


      //p: Window
      $objidWbfsysLanguage = $this->entity->getData('id_main_language') ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysLanguage
          || !$entityWbfsysLanguage = $this->db->orm->get
          (
            'WbfsysLanguage',
            $objidWbfsysLanguage
          )
      )
      {
        $entityWbfsysLanguage = $this->db->orm->newEntity( 'WbfsysLanguage' );
      }

      $inputIdMainLanguage = $this->view->newInput( 'input'.$this->prefix.'IdMainLanguage', 'Window' );
      $inputIdMainLanguage->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_main_language]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_main_language'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Main Language (Protocol Usage)', 'wbfsys.protocol_usage.label' ),
      ));

      if( $this->assignedForm )
        $inputIdMainLanguage->assignedForm = $this->assignedForm;

      $inputIdMainLanguage->setWidth( 'medium' );

      $inputIdMainLanguage->setData( $this->entity->getData( 'id_main_language' )  );
      $inputIdMainLanguage->setReadOnly( $this->isReadOnly( 'id_main_language' ) );
      $inputIdMainLanguage->setLabel( $this->view->i18n->l( 'Main Language', 'wbfsys.protocol_usage.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Language.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_main_language'.($this->suffix?'-'.$this->suffix:'');

      $inputIdMainLanguage->setListUrl ( $listUrl );
      $inputIdMainLanguage->setListIcon( 'control/connect.png' );
      $inputIdMainLanguage->setEntityUrl( 'maintab.php?c=Wbfsys.Language.edit' );
      $inputIdMainLanguage->conEntity         = $entityWbfsysLanguage;
      $inputIdMainLanguage->refresh           = $this->refresh;
      $inputIdMainLanguage->serializeElement  = $this->sendElement;
      

        $inputIdMainLanguage->setAutocomplete
        (
        '{
          "url":"ajax.php?c=Wbfsys.Language.autocomplete&amp;key=",
          "type":"entity"
          }'
        );
        

      $inputIdMainLanguage->view = $this->view;
      $inputIdMainLanguage->buildJavascript( 'wgt-input-'.$this->keyName.'_id_main_language'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdMainLanguage );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_main_language */

 /**
  * create the ui element for field ip_address
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_ip_address( $params )
  {

      //tpl: class ui:text
      $inputIpAddress = $this->view->newInput( 'input'.$this->prefix.'IpAddress' , 'Text' );
      $this->items['ip_address'] = $inputIpAddress;
      $inputIpAddress->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[ip_address]',
          'id'        => 'wgt-input-'.$this->keyName.'_ip_address'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for IP Address (Protocol Usage)', 'wbfsys.protocol_usage.label' ),
          'maxlength' => $this->entity->maxSize( 'ip_address' ),
        )
      );
      $inputIpAddress->setWidth( 'medium' );

      $inputIpAddress->setReadOnly( $this->isReadOnly( 'ip_address' ) );
      $inputIpAddress->setData( $this->entity->getSecure('ip_address') );
      $inputIpAddress->setLabel
      (
        $this->view->i18n->l( 'IP Address', 'wbfsys.protocol_usage.label' ),
        $this->entity->required( 'ip_address' )
      );

      $inputIpAddress->refresh           = $this->refresh;
      $inputIpAddress->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_ip_address */

 /**
  * create the ui element for field flag_sso
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_flag_sso( $params )
  {

      //tpl: class ui:Checkbox
      $inputFlagSso = $this->view->newInput( 'input'.$this->prefix.'FlagSso' , 'Checkbox' );
      $this->items['flag_sso'] = $inputFlagSso;
      $inputFlagSso->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[flag_sso]',
          'id'        => 'wgt-input-'.$this->keyName.'_flag_sso'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Sso (Protocol Usage)', 'wbfsys.protocol_usage.label' ),
        )
      );
      $inputFlagSso->setWidth( 'medium' );

      $inputFlagSso->setReadOnly( $this->isReadOnly( 'flag_sso' ) );
      $inputFlagSso->setActive( $this->entity->getBoolean( 'flag_sso' ) );
      $inputFlagSso->setLabel
      (
        $this->view->i18n->l( 'Sso', 'wbfsys.protocol_usage.label' ),
        $this->entity->required( 'flag_sso' )
      );

      $inputFlagSso->refresh           = $this->refresh;
      $inputFlagSso->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_flag_sso */

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
          'title'     => $this->view->i18n->l( 'Insert value for Rowid (Protocol Usage)', 'wbfsys.protocol_usage.label' ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadOnly( $this->isReadOnly( 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel
      (
        $this->view->i18n->l( 'Rowid', 'wbfsys.protocol_usage.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Time Created (Protocol Usage)', 'wbfsys.protocol_usage.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadOnly( true );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel
      (
        $this->view->i18n->l( 'Time Created', 'wbfsys.protocol_usage.label' ),
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
        'title'     => $this->view->i18n->l( 'Insert value for Role Create (Protocol Usage)', 'wbfsys.protocol_usage.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadOnly( true );
      $inputMRoleCreate->setLabel( $this->view->i18n->l( 'Role Create', 'wbfsys.protocol_usage.label' ) );


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

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_protocol_usage_m_role_create';

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

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_protocol_usage_m_role_change';

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




}//end class WbfsysProtocolUsage_Form */


