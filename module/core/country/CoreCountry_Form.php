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
 * @subpackage ModCore
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreCountry_Form
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
  public $keyName     = 'core_country';

  /**
   * the cname for the entities, is used to request metadata from the orm
   * @setter WgtForm::setEntityName()
   * @getter WgtForm::getEntityName()
   * @var string 
   */
  public $entityName  = 'CoreCountry';

  /**
   * namespace for the actual form
   * @setter WgtForm::setNamespace()
   * @getter WgtForm::getNamespace()
   * @var string 
   */
  public $namespace  = 'CoreCountry';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtForm::setPrefix()
   * @getter WgtForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'CoreCountry';

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
   * @var CoreCountry_Entity 
   */
  public $entity      = null;
  
////////////////////////////////////////////////////////////////////////////////
// form methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the CoreCountry entity
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
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: CoreCountry' );
      }
    }

  }//end public function createForm */

 /**
  * create a search form for the CoreCountry entity
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
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: CoreCountry' );
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
  * create the ui element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_name( $params )
  {

      //tpl: class ui:text
      $inputName = $this->view->newInput( 'input'.$this->prefix.'Name' , 'Text' );
      $this->items['name'] = $inputName;
      $inputName->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[name]',
          'id'        => 'wgt-input-'.$this->keyName.'_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Name (Country)', 'core.country.label' ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadOnly( $this->isReadOnly( 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel
      (
        $this->view->i18n->l( 'Name', 'core.country.label' ),
        $this->entity->required( 'name' )
      );

      $inputName->refresh           = $this->refresh;
      $inputName->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_name */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_access_key( $params )
  {

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'input'.$this->prefix.'AccessKey' , 'Text' );
      $this->items['access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[access_key]',
          'id'        => 'wgt-input-'.$this->keyName.'_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_required valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Access Key (Country)', 'core.country.label' ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadOnly( $this->isReadOnly( 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel
      (
        $this->view->i18n->l( 'Access Key', 'core.country.label' ),
        $this->entity->required( 'access_key' )
      );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_access_key */

 /**
  * create the ui element for field key3
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_key3( $params )
  {

      //tpl: class ui:text
      $inputKey3 = $this->view->newInput( 'input'.$this->prefix.'Key3' , 'Text' );
      $this->items['key3'] = $inputKey3;
      $inputKey3->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[key3]',
          'id'        => 'wgt-input-'.$this->keyName.'_key3'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Key3 (Country)', 'core.country.label' ),
          'maxlength' => $this->entity->maxSize( 'key3' ),
        )
      );
      $inputKey3->setWidth( 'medium' );

      $inputKey3->setReadOnly( $this->isReadOnly( 'key3' ) );
      $inputKey3->setData( $this->entity->getSecure('key3') );
      $inputKey3->setLabel
      (
        $this->view->i18n->l( 'Key3', 'core.country.label' ),
        $this->entity->required( 'key3' )
      );

      $inputKey3->refresh           = $this->refresh;
      $inputKey3->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_key3 */

 /**
  * create the ui element for field country_number
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_country_number( $params )
  {

      //tpl: class ui:text
      $inputCountryNumber = $this->view->newInput( 'input'.$this->prefix.'CountryNumber' , 'Text' );
      $this->items['country_number'] = $inputCountryNumber;
      $inputCountryNumber->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[country_number]',
          'id'        => 'wgt-input-'.$this->keyName.'_country_number'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Country Number (Country)', 'core.country.label' ),
          'maxlength' => $this->entity->maxSize( 'country_number' ),
        )
      );
      $inputCountryNumber->setWidth( 'medium' );

      $inputCountryNumber->setReadOnly( $this->isReadOnly( 'country_number' ) );
      $inputCountryNumber->setData( $this->entity->getSecure('country_number') );
      $inputCountryNumber->setLabel
      (
        $this->view->i18n->l( 'Country Number', 'core.country.label' ),
        $this->entity->required( 'country_number' )
      );

      $inputCountryNumber->refresh           = $this->refresh;
      $inputCountryNumber->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_country_number */

 /**
  * create the ui element for field flag
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_flag( $params )
  {

      //tpl: class ui:text
      $inputFlag = $this->view->newInput( 'input'.$this->prefix.'Flag' , 'Text' );
      $this->items['flag'] = $inputFlag;
      $inputFlag->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[flag]',
          'id'        => 'wgt-input-'.$this->keyName.'_flag'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Flag (Country)', 'core.country.label' ),
          'maxlength' => $this->entity->maxSize( 'flag' ),
        )
      );
      $inputFlag->setWidth( 'medium' );

      $inputFlag->setReadOnly( $this->isReadOnly( 'flag' ) );
      $inputFlag->setData( $this->entity->getSecure('flag') );
      $inputFlag->setLabel
      (
        $this->view->i18n->l( 'Flag', 'core.country.label' ),
        $this->entity->required( 'flag' )
      );

      $inputFlag->refresh           = $this->refresh;
      $inputFlag->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_flag */

 /**
  * create the ui element for field id_category
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_category( $params )
  {
    if( !Webfrap::classLoadable( 'CoreCountryCategory_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'CoreCountryCategory_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: CoreCountryCategory_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdCategory = $this->view->newItem( 'input'.$this->prefix.'IdCategory' , 'CoreCountryCategory_Selectbox' );
      $this->items['id_category'] = $inputIdCategory;
      $inputIdCategory->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_category]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_category'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Category (Country)', 'core.country.label' ),
        )
      );
      $inputIdCategory->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdCategory->assignedForm = $this->assignedForm;

      $inputIdCategory->setActive( $this->entity->getData( 'id_category' ) );
      $inputIdCategory->setReadOnly( $this->isReadOnly( 'id_category' ) );
      $inputIdCategory->setLabel
      (
        $this->view->i18n->l( 'Category', 'core.country.label' ),
        $this->entity->required( 'id_category' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-core>mgmt-core_country_category:insert' ) )
      {
        $inputIdCategory->refresh           = $this->refresh;
        $inputIdCategory->serializeElement  = $this->sendElement;
        $inputIdCategory->editUrl = 'index.php?c=Core.CountryCategory.listing&amp;target='.$this->namespace.'&amp;field=id_category&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_id_category'.$this->suffix;
      }
      // set an empty first entry
      $inputIdCategory->setFirstFree( 'No Category selected' );


      $queryIdCategory = $this->db->newQuery( 'CoreCountryCategory_Selectbox' );
      $queryIdCategory->fetchSelectbox();
      $inputIdCategory->setData( $queryIdCategory->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_id_category */

 /**
  * create the ui element for field short
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_short( $params )
  {

      //tpl: class ui:text
      $inputShort = $this->view->newInput( 'input'.$this->prefix.'Short' , 'Text' );
      $this->items['short'] = $inputShort;
      $inputShort->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[short]',
          'id'        => 'wgt-input-'.$this->keyName.'_short'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Shortname (Country)', 'core.country.label' ),
          'maxlength' => $this->entity->maxSize( 'short' ),
        )
      );
      $inputShort->setWidth( 'medium' );

      $inputShort->setReadOnly( $this->isReadOnly( 'short' ) );
      $inputShort->setData( $this->entity->getSecure('short') );
      $inputShort->setLabel
      (
        $this->view->i18n->l( 'Shortname', 'core.country.label' ),
        $this->entity->required( 'short' )
      );

      $inputShort->refresh           = $this->refresh;
      $inputShort->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_short */

 /**
  * create the ui element for field id_mainlanguage
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_mainlanguage( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysLanguage_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysLanguage_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysLanguage_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdMainlanguage = $this->view->newItem( 'input'.$this->prefix.'IdMainlanguage' , 'WbfsysLanguage_Selectbox' );
      $this->items['id_mainlanguage'] = $inputIdMainlanguage;
      $inputIdMainlanguage->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_mainlanguage]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_mainlanguage'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Main Language (Country)', 'core.country.label' ),
        )
      );
      $inputIdMainlanguage->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdMainlanguage->assignedForm = $this->assignedForm;

      $inputIdMainlanguage->setActive( $this->entity->getData( 'id_mainlanguage' ) );
      $inputIdMainlanguage->setReadOnly( $this->isReadOnly( 'id_mainlanguage' ) );
      $inputIdMainlanguage->setLabel
      (
        $this->view->i18n->l( 'Main Language', 'core.country.label' ),
        $this->entity->required( 'id_mainlanguage' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdMainlanguage->refresh           = $this->refresh;
        $inputIdMainlanguage->serializeElement  = $this->sendElement;
        $inputIdMainlanguage->editUrl = 'index.php?c=Wbfsys.Language.listing&amp;target='.$this->namespace.'&amp;field=id_mainlanguage&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_id_mainlanguage'.$this->suffix;
      }
      // set an empty first entry
      $inputIdMainlanguage->setFirstFree( 'No Main Language selected' );


      $queryIdMainlanguage = $this->db->newQuery( 'WbfsysLanguage_Selectbox' );
      $queryIdMainlanguage->fetchSelectbox();
      $inputIdMainlanguage->setData( $queryIdMainlanguage->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_id_mainlanguage */

 /**
  * create the ui element for field id_currency
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_currency( $params )
  {
    if( !Webfrap::classLoadable( 'CoreCurrency_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'CoreCurrency_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: CoreCurrency_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdCurrency = $this->view->newItem( 'input'.$this->prefix.'IdCurrency' , 'CoreCurrency_Selectbox' );
      $this->items['id_currency'] = $inputIdCurrency;
      $inputIdCurrency->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_currency]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_currency'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Currency (Country)', 'core.country.label' ),
        )
      );
      $inputIdCurrency->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdCurrency->assignedForm = $this->assignedForm;

      $inputIdCurrency->setActive( $this->entity->getData( 'id_currency' ) );
      $inputIdCurrency->setReadOnly( $this->isReadOnly( 'id_currency' ) );
      $inputIdCurrency->setLabel
      (
        $this->view->i18n->l( 'Currency', 'core.country.label' ),
        $this->entity->required( 'id_currency' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-core>mod-core-cat-core_data:insert' ) )
      {
        $inputIdCurrency->refresh           = $this->refresh;
        $inputIdCurrency->serializeElement  = $this->sendElement;
        $inputIdCurrency->editUrl = 'index.php?c=Core.Currency.listing&amp;target='.$this->namespace.'&amp;field=id_currency&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_id_currency'.$this->suffix;
      }
      // set an empty first entry
      $inputIdCurrency->setFirstFree( 'No Currency selected' );


      $queryIdCurrency = $this->db->newQuery( 'CoreCurrency_Selectbox' );
      $queryIdCurrency->fetchSelectbox();
      $inputIdCurrency->setData( $queryIdCurrency->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_id_currency */

 /**
  * create the ui element for field deb_revenue
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_deb_revenue( $params )
  {
    if( !Webfrap::classLoadable( 'AccountingRevenueType_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'AccountingRevenueType_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: AccountingRevenueType_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputDebRevenue = $this->view->newItem( 'input'.$this->prefix.'DebRevenue' , 'AccountingRevenueType_Selectbox' );
      $this->items['deb_revenue'] = $inputDebRevenue;
      $inputDebRevenue->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[deb_revenue]',
          'id'        => 'wgt-input-'.$this->keyName.'_deb_revenue'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Debitoren Revenue (Country)', 'core.country.label' ),
        )
      );
      $inputDebRevenue->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputDebRevenue->assignedForm = $this->assignedForm;

      $inputDebRevenue->setActive( $this->entity->getData( 'deb_revenue' ) );
      $inputDebRevenue->setReadOnly( $this->isReadOnly( 'deb_revenue' ) );
      $inputDebRevenue->setLabel
      (
        $this->view->i18n->l( 'Debitoren Revenue', 'core.country.label' ),
        $this->entity->required( 'deb_revenue' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-crm>mgmt-crm_contact_calls:insert' ) )
      {
        $inputDebRevenue->refresh           = $this->refresh;
        $inputDebRevenue->serializeElement  = $this->sendElement;
        $inputDebRevenue->editUrl = 'index.php?c=Crm.ContactCalls.listing&amp;target='.$this->namespace.'&amp;field=deb_revenue&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_deb_revenue'.$this->suffix;
      }
      // set an empty first entry
      $inputDebRevenue->setFirstFree( 'No Debitoren Revenue selected' );


      $queryDebRevenue = $this->db->newQuery( 'AccountingRevenueType_Selectbox' );
      $queryDebRevenue->fetchSelectbox();
      $inputDebRevenue->setData( $queryDebRevenue->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_deb_revenue */

 /**
  * create the ui element for field kred_revenue
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_kred_revenue( $params )
  {
    if( !Webfrap::classLoadable( 'AccountingRevenueType_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'AccountingRevenueType_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: AccountingRevenueType_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputKredRevenue = $this->view->newItem( 'input'.$this->prefix.'KredRevenue' , 'AccountingRevenueType_Selectbox' );
      $this->items['kred_revenue'] = $inputKredRevenue;
      $inputKredRevenue->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[kred_revenue]',
          'id'        => 'wgt-input-'.$this->keyName.'_kred_revenue'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Kreditoren Revenue (Country)', 'core.country.label' ),
        )
      );
      $inputKredRevenue->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputKredRevenue->assignedForm = $this->assignedForm;

      $inputKredRevenue->setActive( $this->entity->getData( 'kred_revenue' ) );
      $inputKredRevenue->setReadOnly( $this->isReadOnly( 'kred_revenue' ) );
      $inputKredRevenue->setLabel
      (
        $this->view->i18n->l( 'Kreditoren Revenue', 'core.country.label' ),
        $this->entity->required( 'kred_revenue' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-crm>mgmt-crm_contact_calls:insert' ) )
      {
        $inputKredRevenue->refresh           = $this->refresh;
        $inputKredRevenue->serializeElement  = $this->sendElement;
        $inputKredRevenue->editUrl = 'index.php?c=Crm.ContactCalls.listing&amp;target='.$this->namespace.'&amp;field=kred_revenue&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_kred_revenue'.$this->suffix;
      }
      // set an empty first entry
      $inputKredRevenue->setFirstFree( 'No Kreditoren Revenue selected' );


      $queryKredRevenue = $this->db->newQuery( 'AccountingRevenueType_Selectbox' );
      $queryKredRevenue->fetchSelectbox();
      $inputKredRevenue->setData( $queryKredRevenue->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_kred_revenue */

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
          'title'     => $this->view->i18n->l( 'Insert value for Rowid (Country)', 'core.country.label' ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadOnly( $this->isReadOnly( 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel
      (
        $this->view->i18n->l( 'Rowid', 'core.country.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Time Created (Country)', 'core.country.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadOnly( true );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel
      (
        $this->view->i18n->l( 'Time Created', 'core.country.label' ),
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
        'title'     => $this->view->i18n->l( 'Insert value for Role Create (Country)', 'core.country.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadOnly( true );
      $inputMRoleCreate->setLabel( $this->view->i18n->l( 'Role Create', 'core.country.label' ) );


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

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_time_changed( $params )
  {

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'input'.$this->prefix.'MTimeChanged' , 'Date' );
      $this->items['m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[m_time_changed]',
          'id'        => 'wgt-input-'.$this->keyName.'_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Time Changed (Country)', 'core.country.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadOnly( true );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel
      (
        $this->view->i18n->l( 'Time Changed', 'core.country.label' ),
        $this->entity->required( 'm_time_changed' )
      );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_m_time_changed */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_role_change( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysRoleUser_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysRoleUser not exists' );

      Log::warn('Looks like the Entity: WbfsysRoleUser is missing');

      return;
    }


      //p: Window
      $objidWbfsysRoleUser = $this->entity->getData('m_role_change') ;

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

      $inputMRoleChange = $this->view->newInput( 'input'.$this->prefix.'MRoleChange', 'Window' );
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[m_role_change]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Role Change (Country)', 'core.country.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadOnly( true );
      $inputMRoleChange->setLabel( $this->view->i18n->l( 'Role Change', 'core.country.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_m_role_change'.($this->suffix?'-'.$this->suffix:'');

      $inputMRoleChange->setListUrl ( $listUrl );
      $inputMRoleChange->setListIcon( 'control/connect.png' );
      $inputMRoleChange->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.edit' );
      $inputMRoleChange->conEntity         = $entityWbfsysRoleUser;
      $inputMRoleChange->refresh           = $this->refresh;
      $inputMRoleChange->serializeElement  = $this->sendElement;
      

        $inputMRoleChange->setAutocomplete
        (
        '{
          "url":"ajax.php?c=Wbfsys.RoleUser.autocomplete&amp;key=",
          "type":"entity"
          }'
        );
        

      $inputMRoleChange->view = $this->view;
      $inputMRoleChange->buildJavascript( 'wgt-input-'.$this->keyName.'_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_m_role_change */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_version( $params )
  {

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'input'.$this->prefix.'MVersion' , 'int' );
      $this->items['m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[m_version]',
          'id'        => 'wgt-input-'.$this->keyName.'_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Version (Country)', 'core.country.label' ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadOnly( true );
      $inputMVersion->setData( $this->entity->getSecure('m_version') );
      $inputMVersion->setLabel
      (
        $this->view->i18n->l( 'Version', 'core.country.label' ),
        $this->entity->required( 'm_version' )
      );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_m_version */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_uuid( $params )
  {

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'input'.$this->prefix.'MUuid' , 'Text' );
      $this->items['m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[m_uuid]',
          'id'        => 'wgt-input-'.$this->keyName.'_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Uuid (Country)', 'core.country.label' ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadOnly( true );
      $inputMUuid->setData( $this->entity->getSecure('m_uuid') );
      $inputMUuid->setLabel
      (
        $this->view->i18n->l( 'Uuid', 'core.country.label' ),
        $this->entity->required( 'm_uuid' )
      );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_m_uuid */

////////////////////////////////////////////////////////////////////////////////
// search field methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create the search element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_name( $params )
  {

      //tpl: class ui:text
      $inputName = $this->view->newInput( 'input'.$this->prefix.'Name' , 'Text' );
      $this->items['name'] = $inputName;
      $inputName->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[name]',
          'id'        => 'wgt-input-'.$this->keyName.'_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Name (Country)', 'core.country.label' ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadOnly( $this->isReadOnly( 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel
      (
        $this->view->i18n->l( 'Name', 'core.country.label' ),
        $this->entity->required( 'name' )
      );

      $inputName->refresh           = $this->refresh;
      $inputName->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );


  }//end public function search_name */

 /**
  * create the search element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_access_key( $params )
  {

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'input'.$this->prefix.'AccessKey' , 'Text' );
      $this->items['access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[access_key]',
          'id'        => 'wgt-input-'.$this->keyName.'_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_cname medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Access Key (Country)', 'core.country.label' ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadOnly( $this->isReadOnly( 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel
      (
        $this->view->i18n->l( 'Access Key', 'core.country.label' ),
        $this->entity->required( 'access_key' )
      );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );


  }//end public function search_access_key */

 /**
  * create the search element for field key3
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_key3( $params )
  {

      //tpl: class ui:text
      $inputKey3 = $this->view->newInput( 'input'.$this->prefix.'Key3' , 'Text' );
      $this->items['key3'] = $inputKey3;
      $inputKey3->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[key3]',
          'id'        => 'wgt-input-'.$this->keyName.'_key3'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_cname medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Key3 (Country)', 'core.country.label' ),
          'maxlength' => $this->entity->maxSize( 'key3' ),
        )
      );
      $inputKey3->setWidth( 'medium' );

      $inputKey3->setReadOnly( $this->isReadOnly( 'key3' ) );
      $inputKey3->setData( $this->entity->getSecure('key3') );
      $inputKey3->setLabel
      (
        $this->view->i18n->l( 'Key3', 'core.country.label' ),
        $this->entity->required( 'key3' )
      );

      $inputKey3->refresh           = $this->refresh;
      $inputKey3->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );


  }//end public function search_key3 */

 /**
  * create the search element for field short
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_short( $params )
  {

      //tpl: class ui:text
      $inputShort = $this->view->newInput( 'input'.$this->prefix.'Short' , 'Text' );
      $this->items['short'] = $inputShort;
      $inputShort->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[short]',
          'id'        => 'wgt-input-'.$this->keyName.'_short'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Shortname (Country)', 'core.country.label' ),
          'maxlength' => $this->entity->maxSize( 'short' ),
        )
      );
      $inputShort->setWidth( 'medium' );

      $inputShort->setReadOnly( $this->isReadOnly( 'short' ) );
      $inputShort->setData( $this->entity->getSecure('short') );
      $inputShort->setLabel
      (
        $this->view->i18n->l( 'Shortname', 'core.country.label' ),
        $this->entity->required( 'short' )
      );

      $inputShort->refresh           = $this->refresh;
      $inputShort->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );


  }//end public function search_short */

 /**
  * create the search element for field id_currency
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_id_currency( $params )
  {

    if( !Webfrap::classLoadable( 'CoreCurrency_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'CoreCurrency_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: CoreCurrency_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdCurrency = $this->view->newItem( 'input'.$this->prefix.'IdCurrency' , 'CoreCurrency_Selectbox' );
      $this->items['id_currency'] = $inputIdCurrency;
      $inputIdCurrency->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_currency]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_currency'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Currency (Country)', 'core.country.label' ),
        )
      );
      $inputIdCurrency->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdCurrency->assignedForm = $this->assignedForm;

      $inputIdCurrency->setActive( $this->entity->getData( 'id_currency' ) );
      $inputIdCurrency->setReadOnly( $this->isReadOnly( 'id_currency' ) );
      $inputIdCurrency->setLabel
      (
        $this->view->i18n->l( 'Currency', 'core.country.label' ),
        $this->entity->required( 'id_currency' )
      );

      // set an empty first entry
      $inputIdCurrency->setFirstFree( 'No Currency selected' );


      $queryIdCurrency = $this->db->newQuery( 'CoreCurrency_Selectbox' );
      $queryIdCurrency->fetchSelectbox();
      $inputIdCurrency->setData( $queryIdCurrency->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );




  }//end public function search_id_currency */

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

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=core_country_m_role_create';

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

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=core_country_m_role_change';

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




}//end class CoreCountry_Form */


