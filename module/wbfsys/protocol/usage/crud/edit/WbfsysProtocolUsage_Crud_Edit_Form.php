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
class WbfsysProtocolUsage_Crud_Edit_Form
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
  public $namespace  = 'WbfsysProtocolUsage';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysProtocolUsage';

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
      'wbfsys_protocol_usage' => array
      (
        'id_browser' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_browser_version' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_os' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_main_language' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'ip_address' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'flag_sso' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
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
   * @var WbfsysProtocolUsage_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysProtocolUsage_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysProtocolUsage_Entity $entity
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
      'wbfsys_protocol_usage' => array
      (
        'id_browser',
        'id_browser_version',
        'id_os',
        'id_main_language',
        'ip_address',
        'flag_sso',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysProtocolUsage entity
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
    $this->view->addVar( 'entityWbfsysProtocolUsage', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_protocol_usage'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_protocol_usage[id_wbfsys_protocol_usage-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysProtocolUsage_IdBrowser( $params );
    $this->input_WbfsysProtocolUsage_IdBrowserVersion( $params );
    $this->input_WbfsysProtocolUsage_IdOs( $params );
    $this->input_WbfsysProtocolUsage_IdMainLanguage( $params );
    $this->input_WbfsysProtocolUsage_IpAddress( $params );
    $this->input_WbfsysProtocolUsage_FlagSso( $params );
    $this->input_WbfsysProtocolUsage_Rowid( $params );
    $this->input_WbfsysProtocolUsage_MTimeCreated( $params );
    $this->input_WbfsysProtocolUsage_MRoleCreate( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field id_browser
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolUsage_IdBrowser( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysBrowser_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysBrowser not exists' );

      Log::warn( 'Looks like the Entity: WbfsysBrowser is missing' );

      return;
    }


      //p: Window
      $objidWbfsysBrowser = $this->entity->getData( 'id_browser' ) ;

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

      $inputIdBrowser = $this->view->newInput( 'inputWbfsysProtocolUsageIdBrowser', 'Window' );
      $this->items['wbfsys_protocol_usage-id_browser'] = $inputIdBrowser;
      $inputIdBrowser->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_protocol_usage[id_browser]',
        'id'        => 'wgt-input-wbfsys_protocol_usage_id_browser'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Browser', 'src' => 'Protocol Usage' ) ),
      ));

      if( $this->assignedForm )
        $inputIdBrowser->assignedForm = $this->assignedForm;

      $inputIdBrowser->setWidth( 'medium' );

      $inputIdBrowser->setData( $this->entity->getData( 'id_browser' )  );
      $inputIdBrowser->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_usage', 'id_browser' ) );
      $inputIdBrowser->setRequired( $this->fieldRequired( 'wbfsys_protocol_usage', 'id_browser' ) );
      $inputIdBrowser->setLabel( $i18n->l( 'Browser', 'wbfsys.protocol_usage.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Browser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_protocol_usage_id_browser'.($this->suffix?'-'.$this->suffix:'');

      $inputIdBrowser->setListUrl ( $listUrl );
      $inputIdBrowser->setListIcon( 'control/connect.png' );
      $inputIdBrowser->setEntityUrl( 'maintab.php?c=Wbfsys.Browser.edit' );
      $inputIdBrowser->conEntity         = $entityWbfsysBrowser;
      $inputIdBrowser->refresh           = $this->refresh;
      $inputIdBrowser->serializeElement  = $this->sendElement;



      $inputIdBrowser->view = $this->view;
      $inputIdBrowser->buildJavascript( 'wgt-input-wbfsys_protocol_usage_id_browser'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdBrowser );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProtocolUsage_IdBrowser */

 /**
  * create the ui element for field id_browser_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolUsage_IdBrowserVersion( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysBrowserVersion_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysBrowserVersion not exists' );

      Log::warn( 'Looks like the Entity: WbfsysBrowserVersion is missing' );

      return;
    }


      //p: Window
      $objidWbfsysBrowserVersion = $this->entity->getData( 'id_browser_version' ) ;

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

      $inputIdBrowserVersion = $this->view->newInput( 'inputWbfsysProtocolUsageIdBrowserVersion', 'Window' );
      $this->items['wbfsys_protocol_usage-id_browser_version'] = $inputIdBrowserVersion;
      $inputIdBrowserVersion->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_protocol_usage[id_browser_version]',
        'id'        => 'wgt-input-wbfsys_protocol_usage_id_browser_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Browser Version', 'src' => 'Protocol Usage' ) ),
      ));

      if( $this->assignedForm )
        $inputIdBrowserVersion->assignedForm = $this->assignedForm;

      $inputIdBrowserVersion->setWidth( 'medium' );

      $inputIdBrowserVersion->setData( $this->entity->getData( 'id_browser_version' )  );
      $inputIdBrowserVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_usage', 'id_browser_version' ) );
      $inputIdBrowserVersion->setRequired( $this->fieldRequired( 'wbfsys_protocol_usage', 'id_browser_version' ) );
      $inputIdBrowserVersion->setLabel( $i18n->l( 'Browser Version', 'wbfsys.protocol_usage.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.BrowserVersion.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_protocol_usage_id_browser_version'.($this->suffix?'-'.$this->suffix:'');

      $inputIdBrowserVersion->setListUrl ( $listUrl );
      $inputIdBrowserVersion->setListIcon( 'control/connect.png' );
      $inputIdBrowserVersion->setEntityUrl( 'maintab.php?c=Wbfsys.BrowserVersion.edit' );
      $inputIdBrowserVersion->conEntity         = $entityWbfsysBrowserVersion;
      $inputIdBrowserVersion->refresh           = $this->refresh;
      $inputIdBrowserVersion->serializeElement  = $this->sendElement;



      $inputIdBrowserVersion->view = $this->view;
      $inputIdBrowserVersion->buildJavascript( 'wgt-input-wbfsys_protocol_usage_id_browser_version'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdBrowserVersion );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProtocolUsage_IdBrowserVersion */

 /**
  * create the ui element for field id_os
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolUsage_IdOs( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysOs_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysOs not exists' );

      Log::warn( 'Looks like the Entity: WbfsysOs is missing' );

      return;
    }


      //p: Window
      $objidWbfsysOs = $this->entity->getData( 'id_os' ) ;

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

      $inputIdOs = $this->view->newInput( 'inputWbfsysProtocolUsageIdOs', 'Window' );
      $this->items['wbfsys_protocol_usage-id_os'] = $inputIdOs;
      $inputIdOs->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_protocol_usage[id_os]',
        'id'        => 'wgt-input-wbfsys_protocol_usage_id_os'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Os', 'src' => 'Protocol Usage' ) ),
      ));

      if( $this->assignedForm )
        $inputIdOs->assignedForm = $this->assignedForm;

      $inputIdOs->setWidth( 'medium' );

      $inputIdOs->setData( $this->entity->getData( 'id_os' )  );
      $inputIdOs->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_usage', 'id_os' ) );
      $inputIdOs->setRequired( $this->fieldRequired( 'wbfsys_protocol_usage', 'id_os' ) );
      $inputIdOs->setLabel( $i18n->l( 'Os', 'wbfsys.protocol_usage.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Os.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_protocol_usage_id_os'.($this->suffix?'-'.$this->suffix:'');

      $inputIdOs->setListUrl ( $listUrl );
      $inputIdOs->setListIcon( 'control/connect.png' );
      $inputIdOs->setEntityUrl( 'maintab.php?c=Wbfsys.Os.edit' );
      $inputIdOs->conEntity         = $entityWbfsysOs;
      $inputIdOs->refresh           = $this->refresh;
      $inputIdOs->serializeElement  = $this->sendElement;



      $inputIdOs->view = $this->view;
      $inputIdOs->buildJavascript( 'wgt-input-wbfsys_protocol_usage_id_os'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdOs );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProtocolUsage_IdOs */

 /**
  * create the ui element for field id_main_language
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolUsage_IdMainLanguage( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysLanguage_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysLanguage not exists' );

      Log::warn( 'Looks like the Entity: WbfsysLanguage is missing' );

      return;
    }


      //p: Window
      $objidWbfsysLanguage = $this->entity->getData( 'id_main_language' ) ;

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

      $inputIdMainLanguage = $this->view->newInput( 'inputWbfsysProtocolUsageIdMainLanguage', 'Window' );
      $this->items['wbfsys_protocol_usage-id_main_language'] = $inputIdMainLanguage;
      $inputIdMainLanguage->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_protocol_usage[id_main_language]',
        'id'        => 'wgt-input-wbfsys_protocol_usage_id_main_language'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Main Language', 'src' => 'Protocol Usage' ) ),
      ));

      if( $this->assignedForm )
        $inputIdMainLanguage->assignedForm = $this->assignedForm;

      $inputIdMainLanguage->setWidth( 'medium' );

      $inputIdMainLanguage->setData( $this->entity->getData( 'id_main_language' )  );
      $inputIdMainLanguage->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_usage', 'id_main_language' ) );
      $inputIdMainLanguage->setRequired( $this->fieldRequired( 'wbfsys_protocol_usage', 'id_main_language' ) );
      $inputIdMainLanguage->setLabel( $i18n->l( 'Main Language', 'wbfsys.protocol_usage.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Language.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_protocol_usage_id_main_language'.($this->suffix?'-'.$this->suffix:'');

      $inputIdMainLanguage->setListUrl ( $listUrl );
      $inputIdMainLanguage->setListIcon( 'control/connect.png' );
      $inputIdMainLanguage->setEntityUrl( 'maintab.php?c=Wbfsys.Language.edit' );
      $inputIdMainLanguage->conEntity         = $entityWbfsysLanguage;
      $inputIdMainLanguage->refresh           = $this->refresh;
      $inputIdMainLanguage->serializeElement  = $this->sendElement;


        $inputIdMainLanguage->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.Language.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdMainLanguage->view = $this->view;
      $inputIdMainLanguage->buildJavascript( 'wgt-input-wbfsys_protocol_usage_id_main_language'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdMainLanguage );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProtocolUsage_IdMainLanguage */

 /**
  * create the ui element for field ip_address
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolUsage_IpAddress( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputIpAddress = $this->view->newInput( 'inputWbfsysProtocolUsageIpAddress' , 'Text' );
      $this->items['wbfsys_protocol_usage-ip_address'] = $inputIpAddress;
      $inputIpAddress->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_protocol_usage[ip_address]',
          'id'        => 'wgt-input-wbfsys_protocol_usage_ip_address'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'IP Address', 'src' => 'Protocol Usage' ) ),
          'maxlength' => $this->entity->maxSize( 'ip_address' ),
        )
      );
      $inputIpAddress->setWidth( 'medium' );

      $inputIpAddress->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_usage', 'ip_address' ) );
      $inputIpAddress->setRequired( $this->fieldRequired( 'wbfsys_protocol_usage', 'ip_address' ) );
      $inputIpAddress->setData( $this->entity->getSecure('ip_address') );
      $inputIpAddress->setLabel( $i18n->l( 'IP Address', 'wbfsys.protocol_usage.label' ) );

      $inputIpAddress->refresh           = $this->refresh;
      $inputIpAddress->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProtocolUsage_IpAddress */

 /**
  * create the ui element for field flag_sso
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolUsage_FlagSso( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputFlagSso = $this->view->newInput( 'inputWbfsysProtocolUsageFlagSso', 'Checkbox' );
      $this->items['wbfsys_protocol_usage-flag_sso'] = $inputFlagSso;
      $inputFlagSso->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_protocol_usage[flag_sso]',
          'id'        => 'wgt-input-wbfsys_protocol_usage_flag_sso'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Sso', 'src' => 'Protocol Usage' ) ),
        )
      );
      $inputFlagSso->setWidth( 'medium' );

      $inputFlagSso->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_usage', 'flag_sso' ) );
      $inputFlagSso->setRequired( $this->fieldRequired( 'wbfsys_protocol_usage', 'flag_sso' ) );
      $inputFlagSso->setActive( $this->entity->getBoolean( 'flag_sso' ) );
      $inputFlagSso->setLabel( $i18n->l( 'Sso', 'wbfsys.protocol_usage.label' ) );

      $inputFlagSso->refresh           = $this->refresh;
      $inputFlagSso->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProtocolUsage_FlagSso */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolUsage_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysProtocolUsageRowid' , 'int' );
      $this->items['wbfsys_protocol_usage-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_protocol_usage[rowid]',
          'id'        => 'wgt-input-wbfsys_protocol_usage_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Protocol Usage' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_usage', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_protocol_usage', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.protocol_usage.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProtocolUsage_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolUsage_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysProtocolUsageMTimeCreated' , 'Date' );
      $this->items['wbfsys_protocol_usage-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_protocol_usage[m_time_created]',
          'id'        => 'wgt-input-wbfsys_protocol_usage_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Protocol Usage' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_usage', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_protocol_usage', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.protocol_usage.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysProtocolUsage_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolUsage_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysProtocolUsageMRoleCreate', 'Window' );
      $this->items['wbfsys_protocol_usage-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_protocol_usage[m_role_create]',
        'id'        => 'wgt-input-wbfsys_protocol_usage_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Protocol Usage' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_usage', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_protocol_usage', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.protocol_usage.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_protocol_usage_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_protocol_usage_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysProtocolUsage_MRoleCreate */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysProtocolUsage_Crud_Edit_Form */


