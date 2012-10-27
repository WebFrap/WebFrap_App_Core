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
class CoreCountry_Crud_Edit_Form
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
  public $namespace  = 'CoreCountry';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'CoreCountry';

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
      'core_country' => array
      (
        'name' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'access_key' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'key3' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'country_number' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '3',
        ),
        'flag' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'id_category' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'short' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '5',
        ),
        'id_mainlanguage' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_currency' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'deb_revenue' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'kred_revenue' => array
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
        'm_time_changed' => array
        ( 
          'required'  => false, 
          'readonly'  => true, 
          'lenght'    => '',
        ),
        'm_role_change' => array
        ( 
          'required'  => false, 
          'readonly'  => true, 
          'lenght'    => '',
        ),
        'm_version' => array
        ( 
          'required'  => false, 
          'readonly'  => true, 
          'lenght'    => '',
        ),
        'm_uuid' => array
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
   * @var CoreCountry_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return CoreCountry_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param CoreCountry_Entity $entity
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
      'core_country' => array
      (
        'name',
        'access_key',
        'key3',
        'country_number',
        'flag',
        'id_category',
        'short',
        'id_mainlanguage',
        'id_currency',
        'deb_revenue',
        'kred_revenue',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the CoreCountry entity
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
    $this->view->addVar( 'entityCoreCountry', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-core_country'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'core_country[id_core_country-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_CoreCountry_Name( $params );
    $this->input_CoreCountry_AccessKey( $params );
    $this->input_CoreCountry_Key3( $params );
    $this->input_CoreCountry_CountryNumber( $params );
    $this->input_CoreCountry_Flag( $params );
    $this->input_CoreCountry_IdCategory( $params );
    $this->input_CoreCountry_Short( $params );
    $this->input_CoreCountry_IdMainlanguage( $params );
    $this->input_CoreCountry_IdCurrency( $params );
    $this->input_CoreCountry_DebRevenue( $params );
    $this->input_CoreCountry_KredRevenue( $params );
    $this->input_CoreCountry_Rowid( $params );
    $this->input_CoreCountry_MTimeCreated( $params );
    $this->input_CoreCountry_MRoleCreate( $params );
    $this->input_CoreCountry_MTimeChanged( $params );
    $this->input_CoreCountry_MRoleChange( $params );
    $this->input_CoreCountry_MVersion( $params );
    $this->input_CoreCountry_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreCountry_Name( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputName = $this->view->newInput( 'inputCoreCountryName' , 'Text' );
      $this->items['core_country-name'] = $inputName;
      $inputName->addAttributes
      (
        array
        (
          'name'      => 'core_country[name]',
          'id'        => 'wgt-input-core_country_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Name', 'src' => 'Country' ) ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadonly( $this->fieldReadOnly( 'core_country', 'name' ) );
      $inputName->setRequired( $this->fieldRequired( 'core_country', 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel( $i18n->l( 'Name', 'core.country.label' ) );

      $inputName->refresh           = $this->refresh;
      $inputName->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_CoreCountry_Name */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreCountry_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputCoreCountryAccessKey' , 'Text' );
      $this->items['core_country-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'core_country[access_key]',
          'id'        => 'wgt-input-core_country_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Country' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'core_country', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'core_country', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'core.country.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_CoreCountry_AccessKey */

 /**
  * create the ui element for field key3
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreCountry_Key3( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputKey3 = $this->view->newInput( 'inputCoreCountryKey3' , 'Text' );
      $this->items['core_country-key3'] = $inputKey3;
      $inputKey3->addAttributes
      (
        array
        (
          'name'      => 'core_country[key3]',
          'id'        => 'wgt-input-core_country_key3'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Key3', 'src' => 'Country' ) ),
          'maxlength' => $this->entity->maxSize( 'key3' ),
        )
      );
      $inputKey3->setWidth( 'medium' );

      $inputKey3->setReadonly( $this->fieldReadOnly( 'core_country', 'key3' ) );
      $inputKey3->setRequired( $this->fieldRequired( 'core_country', 'key3' ) );
      $inputKey3->setData( $this->entity->getSecure('key3') );
      $inputKey3->setLabel( $i18n->l( 'Key3', 'core.country.label' ) );

      $inputKey3->refresh           = $this->refresh;
      $inputKey3->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_CoreCountry_Key3 */

 /**
  * create the ui element for field country_number
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreCountry_CountryNumber( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputCountryNumber = $this->view->newInput( 'inputCoreCountryCountryNumber' , 'Text' );
      $this->items['core_country-country_number'] = $inputCountryNumber;
      $inputCountryNumber->addAttributes
      (
        array
        (
          'name'      => 'core_country[country_number]',
          'id'        => 'wgt-input-core_country_country_number'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Country Number', 'src' => 'Country' ) ),
          'maxlength' => $this->entity->maxSize( 'country_number' ),
        )
      );
      $inputCountryNumber->setWidth( 'medium' );

      $inputCountryNumber->setReadonly( $this->fieldReadOnly( 'core_country', 'country_number' ) );
      $inputCountryNumber->setRequired( $this->fieldRequired( 'core_country', 'country_number' ) );
      $inputCountryNumber->setData( $this->entity->getSecure('country_number') );
      $inputCountryNumber->setLabel( $i18n->l( 'Country Number', 'core.country.label' ) );

      $inputCountryNumber->refresh           = $this->refresh;
      $inputCountryNumber->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_CoreCountry_CountryNumber */

 /**
  * create the ui element for field flag
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreCountry_Flag( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputFlag = $this->view->newInput( 'inputCoreCountryFlag' , 'Text' );
      $this->items['core_country-flag'] = $inputFlag;
      $inputFlag->addAttributes
      (
        array
        (
          'name'      => 'core_country[flag]',
          'id'        => 'wgt-input-core_country_flag'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Flag', 'src' => 'Country' ) ),
          'maxlength' => $this->entity->maxSize( 'flag' ),
        )
      );
      $inputFlag->setWidth( 'medium' );

      $inputFlag->setReadonly( $this->fieldReadOnly( 'core_country', 'flag' ) );
      $inputFlag->setRequired( $this->fieldRequired( 'core_country', 'flag' ) );
      $inputFlag->setData( $this->entity->getSecure('flag') );
      $inputFlag->setLabel( $i18n->l( 'Flag', 'core.country.label' ) );

      $inputFlag->refresh           = $this->refresh;
      $inputFlag->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_CoreCountry_Flag */

 /**
  * create the ui element for field id_category
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreCountry_IdCategory( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['core_country_id_category'] ) )
    {
      if( !Webfrap::classLoadable( 'CoreCountryCategory_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'CoreCountryCategory_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: CoreCountryCategory_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdCategory = $this->view->newItem( 'inputCoreCountryIdCategory', 'CoreCountryCategory_Selectbox' );
      $this->items['core_country-id_category'] = $inputIdCategory;
      $inputIdCategory->addAttributes
      (
        array
        (
          'name'      => 'core_country[id_category]',
          'id'        => 'wgt-input-core_country_id_category'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Category', 'src' => 'Country' ) ),
        )
      );
      $inputIdCategory->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdCategory->assignedForm = $this->assignedForm;

      $inputIdCategory->setActive( $this->entity->getData( 'id_category' ) );
      $inputIdCategory->setReadonly( $this->fieldReadOnly( 'core_country', 'id_category' ) );
      $inputIdCategory->setRequired( $this->fieldRequired( 'core_country', 'id_category' ) );


      $inputIdCategory->setLabel( $i18n->l( 'Category', 'core.country.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-core>mgmt-core_country_category:insert' ) )
      {
        $inputIdCategory->refresh           = $this->refresh;
        $inputIdCategory->serializeElement  = $this->sendElement;
        $inputIdCategory->editUrl = 'index.php?c=Core.CountryCategory.listing&amp;target='.$this->namespace.'&amp;field=id_category&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-core_country_id_category'.$this->suffix;
      }
      // set an empty first entry
      $inputIdCategory->setFirstFree( 'No Category selected' );

      
      $queryIdCategory = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['core_country_id_category'] ) )
      {
      
        $queryIdCategory = $this->db->newQuery( 'CoreCountryCategory_Selectbox' );

        $queryIdCategory->fetchSelectbox();
        $inputIdCategory->setData( $queryIdCategory->getAll() );
      
      }
      else
      {
        $inputIdCategory->setData( $this->listElementData['core_country_id_category'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdCategory )
        $queryIdCategory = $this->db->newQuery( 'CoreCountryCategory_Selectbox' );
      
      $inputIdCategory->loadActive = function( $activeId ) use ( $queryIdCategory ){
 
        return $queryIdCategory->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_CoreCountry_IdCategory */

 /**
  * create the ui element for field short
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreCountry_Short( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputShort = $this->view->newInput( 'inputCoreCountryShort' , 'Text' );
      $this->items['core_country-short'] = $inputShort;
      $inputShort->addAttributes
      (
        array
        (
          'name'      => 'core_country[short]',
          'id'        => 'wgt-input-core_country_short'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Shortname', 'src' => 'Country' ) ),
          'maxlength' => $this->entity->maxSize( 'short' ),
        )
      );
      $inputShort->setWidth( 'medium' );

      $inputShort->setReadonly( $this->fieldReadOnly( 'core_country', 'short' ) );
      $inputShort->setRequired( $this->fieldRequired( 'core_country', 'short' ) );
      $inputShort->setData( $this->entity->getSecure('short') );
      $inputShort->setLabel( $i18n->l( 'Shortname', 'core.country.label' ) );

      $inputShort->refresh           = $this->refresh;
      $inputShort->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_CoreCountry_Short */

 /**
  * create the ui element for field id_mainlanguage
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreCountry_IdMainlanguage( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['core_country_id_mainlanguage'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysLanguage_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysLanguage_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysLanguage_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdMainlanguage = $this->view->newItem( 'inputCoreCountryIdMainlanguage', 'WbfsysLanguage_Selectbox' );
      $this->items['core_country-id_mainlanguage'] = $inputIdMainlanguage;
      $inputIdMainlanguage->addAttributes
      (
        array
        (
          'name'      => 'core_country[id_mainlanguage]',
          'id'        => 'wgt-input-core_country_id_mainlanguage'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Main Language', 'src' => 'Country' ) ),
        )
      );
      $inputIdMainlanguage->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdMainlanguage->assignedForm = $this->assignedForm;

      $inputIdMainlanguage->setActive( $this->entity->getData( 'id_mainlanguage' ) );
      $inputIdMainlanguage->setReadonly( $this->fieldReadOnly( 'core_country', 'id_mainlanguage' ) );
      $inputIdMainlanguage->setRequired( $this->fieldRequired( 'core_country', 'id_mainlanguage' ) );


      $inputIdMainlanguage->setLabel( $i18n->l( 'Main Language', 'core.country.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdMainlanguage->refresh           = $this->refresh;
        $inputIdMainlanguage->serializeElement  = $this->sendElement;
        $inputIdMainlanguage->editUrl = 'index.php?c=Wbfsys.Language.listing&amp;target='.$this->namespace.'&amp;field=id_mainlanguage&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-core_country_id_mainlanguage'.$this->suffix;
      }
      // set an empty first entry
      $inputIdMainlanguage->setFirstFree( 'No Main Language selected' );

      
      $queryIdMainlanguage = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['core_country_id_mainlanguage'] ) )
      {
      
        $queryIdMainlanguage = $this->db->newQuery( 'WbfsysLanguage_Selectbox' );

        $queryIdMainlanguage->fetchSelectbox();
        $inputIdMainlanguage->setData( $queryIdMainlanguage->getAll() );
      
      }
      else
      {
        $inputIdMainlanguage->setData( $this->listElementData['core_country_id_mainlanguage'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdMainlanguage )
        $queryIdMainlanguage = $this->db->newQuery( 'WbfsysLanguage_Selectbox' );
      
      $inputIdMainlanguage->loadActive = function( $activeId ) use ( $queryIdMainlanguage ){
 
        return $queryIdMainlanguage->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_CoreCountry_IdMainlanguage */

 /**
  * create the ui element for field id_currency
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreCountry_IdCurrency( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['core_country_id_currency'] ) )
    {
      if( !Webfrap::classLoadable( 'CoreCurrency_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'CoreCurrency_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: CoreCurrency_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdCurrency = $this->view->newItem( 'inputCoreCountryIdCurrency', 'CoreCurrency_Selectbox' );
      $this->items['core_country-id_currency'] = $inputIdCurrency;
      $inputIdCurrency->addAttributes
      (
        array
        (
          'name'      => 'core_country[id_currency]',
          'id'        => 'wgt-input-core_country_id_currency'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Currency', 'src' => 'Country' ) ),
        )
      );
      $inputIdCurrency->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdCurrency->assignedForm = $this->assignedForm;

      $inputIdCurrency->setActive( $this->entity->getData( 'id_currency' ) );
      $inputIdCurrency->setReadonly( $this->fieldReadOnly( 'core_country', 'id_currency' ) );
      $inputIdCurrency->setRequired( $this->fieldRequired( 'core_country', 'id_currency' ) );


      $inputIdCurrency->setLabel( $i18n->l( 'Currency', 'core.country.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-core>mod-core-cat-core_data:insert' ) )
      {
        $inputIdCurrency->refresh           = $this->refresh;
        $inputIdCurrency->serializeElement  = $this->sendElement;
        $inputIdCurrency->editUrl = 'index.php?c=Core.Currency.listing&amp;target='.$this->namespace.'&amp;field=id_currency&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-core_country_id_currency'.$this->suffix;
      }
      // set an empty first entry
      $inputIdCurrency->setFirstFree( 'No Currency selected' );

      
      $queryIdCurrency = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['core_country_id_currency'] ) )
      {
      
        $queryIdCurrency = $this->db->newQuery( 'CoreCurrency_Selectbox' );

        $queryIdCurrency->fetchSelectbox();
        $inputIdCurrency->setData( $queryIdCurrency->getAll() );
      
      }
      else
      {
        $inputIdCurrency->setData( $this->listElementData['core_country_id_currency'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdCurrency )
        $queryIdCurrency = $this->db->newQuery( 'CoreCurrency_Selectbox' );
      
      $inputIdCurrency->loadActive = function( $activeId ) use ( $queryIdCurrency ){
 
        return $queryIdCurrency->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_CoreCountry_IdCurrency */

 /**
  * create the ui element for field deb_revenue
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreCountry_DebRevenue( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['core_country_deb_revenue'] ) )
    {
      if( !Webfrap::classLoadable( 'AccountingRevenueType_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'AccountingRevenueType_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: AccountingRevenueType_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputDebRevenue = $this->view->newItem( 'inputCoreCountryDebRevenue', 'AccountingRevenueType_Selectbox' );
      $this->items['core_country-deb_revenue'] = $inputDebRevenue;
      $inputDebRevenue->addAttributes
      (
        array
        (
          'name'      => 'core_country[deb_revenue]',
          'id'        => 'wgt-input-core_country_deb_revenue'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Debitoren Revenue', 'src' => 'Country' ) ),
        )
      );
      $inputDebRevenue->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputDebRevenue->assignedForm = $this->assignedForm;

      $inputDebRevenue->setActive( $this->entity->getData( 'deb_revenue' ) );
      $inputDebRevenue->setReadonly( $this->fieldReadOnly( 'core_country', 'deb_revenue' ) );
      $inputDebRevenue->setRequired( $this->fieldRequired( 'core_country', 'deb_revenue' ) );


      $inputDebRevenue->setLabel( $i18n->l( 'Debitoren Revenue', 'core.country.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-crm>mgmt-crm_contact_calls:insert' ) )
      {
        $inputDebRevenue->refresh           = $this->refresh;
        $inputDebRevenue->serializeElement  = $this->sendElement;
        $inputDebRevenue->editUrl = 'index.php?c=Crm.ContactCalls.listing&amp;target='.$this->namespace.'&amp;field=deb_revenue&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-core_country_deb_revenue'.$this->suffix;
      }
      // set an empty first entry
      $inputDebRevenue->setFirstFree( 'No Debitoren Revenue selected' );

      
      $queryDebRevenue = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['core_country_deb_revenue'] ) )
      {
      
        $queryDebRevenue = $this->db->newQuery( 'AccountingRevenueType_Selectbox' );

        $queryDebRevenue->fetchSelectbox();
        $inputDebRevenue->setData( $queryDebRevenue->getAll() );
      
      }
      else
      {
        $inputDebRevenue->setData( $this->listElementData['core_country_deb_revenue'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryDebRevenue )
        $queryDebRevenue = $this->db->newQuery( 'AccountingRevenueType_Selectbox' );
      
      $inputDebRevenue->loadActive = function( $activeId ) use ( $queryDebRevenue ){
 
        return $queryDebRevenue->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_CoreCountry_DebRevenue */

 /**
  * create the ui element for field kred_revenue
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreCountry_KredRevenue( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['core_country_kred_revenue'] ) )
    {
      if( !Webfrap::classLoadable( 'AccountingRevenueType_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'AccountingRevenueType_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: AccountingRevenueType_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputKredRevenue = $this->view->newItem( 'inputCoreCountryKredRevenue', 'AccountingRevenueType_Selectbox' );
      $this->items['core_country-kred_revenue'] = $inputKredRevenue;
      $inputKredRevenue->addAttributes
      (
        array
        (
          'name'      => 'core_country[kred_revenue]',
          'id'        => 'wgt-input-core_country_kred_revenue'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Kreditoren Revenue', 'src' => 'Country' ) ),
        )
      );
      $inputKredRevenue->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputKredRevenue->assignedForm = $this->assignedForm;

      $inputKredRevenue->setActive( $this->entity->getData( 'kred_revenue' ) );
      $inputKredRevenue->setReadonly( $this->fieldReadOnly( 'core_country', 'kred_revenue' ) );
      $inputKredRevenue->setRequired( $this->fieldRequired( 'core_country', 'kred_revenue' ) );


      $inputKredRevenue->setLabel( $i18n->l( 'Kreditoren Revenue', 'core.country.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-crm>mgmt-crm_contact_calls:insert' ) )
      {
        $inputKredRevenue->refresh           = $this->refresh;
        $inputKredRevenue->serializeElement  = $this->sendElement;
        $inputKredRevenue->editUrl = 'index.php?c=Crm.ContactCalls.listing&amp;target='.$this->namespace.'&amp;field=kred_revenue&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-core_country_kred_revenue'.$this->suffix;
      }
      // set an empty first entry
      $inputKredRevenue->setFirstFree( 'No Kreditoren Revenue selected' );

      
      $queryKredRevenue = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['core_country_kred_revenue'] ) )
      {
      
        $queryKredRevenue = $this->db->newQuery( 'AccountingRevenueType_Selectbox' );

        $queryKredRevenue->fetchSelectbox();
        $inputKredRevenue->setData( $queryKredRevenue->getAll() );
      
      }
      else
      {
        $inputKredRevenue->setData( $this->listElementData['core_country_kred_revenue'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryKredRevenue )
        $queryKredRevenue = $this->db->newQuery( 'AccountingRevenueType_Selectbox' );
      
      $inputKredRevenue->loadActive = function( $activeId ) use ( $queryKredRevenue ){
 
        return $queryKredRevenue->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_CoreCountry_KredRevenue */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreCountry_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputCoreCountryRowid' , 'int' );
      $this->items['core_country-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'core_country[rowid]',
          'id'        => 'wgt-input-core_country_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Country' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'core_country', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'core_country', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'core.country.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_CoreCountry_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreCountry_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputCoreCountryMTimeCreated' , 'Date' );
      $this->items['core_country-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'core_country[m_time_created]',
          'id'        => 'wgt-input-core_country_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Country' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'core_country', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'core_country', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'core.country.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_CoreCountry_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreCountry_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputCoreCountryMRoleCreate', 'Window' );
      $this->items['core_country-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'core_country[m_role_create]',
        'id'        => 'wgt-input-core_country_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Country' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'core_country', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'core_country', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'core.country.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=core_country_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-core_country_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_CoreCountry_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreCountry_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputCoreCountryMTimeChanged' , 'Date' );
      $this->items['core_country-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'core_country[m_time_changed]',
          'id'        => 'wgt-input-core_country_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Country' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'core_country', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'core_country', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'core.country.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_CoreCountry_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreCountry_MRoleChange( $params )
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
      $objidWbfsysRoleUser = $this->entity->getData( 'm_role_change' ) ;

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

      $inputMRoleChange = $this->view->newInput( 'inputCoreCountryMRoleChange', 'Window' );
      $this->items['core_country-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'core_country[m_role_change]',
        'id'        => 'wgt-input-core_country_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Country' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'core_country', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'core_country', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'core.country.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=core_country_m_role_change'.($this->suffix?'-'.$this->suffix:'');

      $inputMRoleChange->setListUrl ( $listUrl );
      $inputMRoleChange->setListIcon( 'control/connect.png' );
      $inputMRoleChange->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.edit' );
      $inputMRoleChange->conEntity         = $entityWbfsysRoleUser;
      $inputMRoleChange->refresh           = $this->refresh;
      $inputMRoleChange->serializeElement  = $this->sendElement;


        $inputMRoleChange->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.RoleUser.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputMRoleChange->view = $this->view;
      $inputMRoleChange->buildJavascript( 'wgt-input-core_country_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_CoreCountry_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreCountry_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputCoreCountryMVersion' , 'int' );
      $this->items['core_country-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'core_country[m_version]',
          'id'        => 'wgt-input-core_country_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Country' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'core_country', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'core_country', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'core.country.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_CoreCountry_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreCountry_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputCoreCountryMUuid' , 'Text' );
      $this->items['core_country-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'core_country[m_uuid]',
          'id'        => 'wgt-input-core_country_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Country' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'core_country', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'core_country', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'core.country.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_CoreCountry_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class CoreCountry_Crud_Edit_Form */


