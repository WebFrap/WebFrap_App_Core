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
class WbfsysLanguage_Crud_Show_Form
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
  public $namespace  = 'WbfsysLanguage';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysLanguage';

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
      'wbfsys_language' => array
      (
        'name' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'access_key' => array
        ( 
          'required'  => false, 
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
        'key_rfc1766' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'short' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '70',
        ),
        'flag' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '10',
        ),
        'is_syslang' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'format_time' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '25',
        ),
        'format_timestamp' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '25',
        ),
        'format_date' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '25',
        ),
        'sep_date' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '10',
        ),
        'sep_time' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '10',
        ),
        'sep_dec' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '10',
        ),
        'sep_mil' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '10',
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
   * @var WbfsysLanguage_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysLanguage_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysLanguage_Entity $entity
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
      'wbfsys_language' => array
      (
        'name',
        'access_key',
        'key3',
        'country_number',
        'key_rfc1766',
        'short',
        'flag',
        'is_syslang',
        'format_time',
        'format_timestamp',
        'format_date',
        'sep_date',
        'sep_time',
        'sep_dec',
        'sep_mil',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysLanguage entity
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
    $this->view->addVar( 'entityWbfsysLanguage', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_language'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_language[id_wbfsys_language-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysLanguage_Name( $params );
    $this->input_WbfsysLanguage_AccessKey( $params );
    $this->input_WbfsysLanguage_Key3( $params );
    $this->input_WbfsysLanguage_CountryNumber( $params );
    $this->input_WbfsysLanguage_KeyRfc1766( $params );
    $this->input_WbfsysLanguage_Short( $params );
    $this->input_WbfsysLanguage_Flag( $params );
    $this->input_WbfsysLanguage_IsSyslang( $params );
    $this->input_WbfsysLanguage_FormatTime( $params );
    $this->input_WbfsysLanguage_FormatTimestamp( $params );
    $this->input_WbfsysLanguage_FormatDate( $params );
    $this->input_WbfsysLanguage_SepDate( $params );
    $this->input_WbfsysLanguage_SepTime( $params );
    $this->input_WbfsysLanguage_SepDec( $params );
    $this->input_WbfsysLanguage_SepMil( $params );
    $this->input_WbfsysLanguage_Rowid( $params );
    $this->input_WbfsysLanguage_MTimeCreated( $params );
    $this->input_WbfsysLanguage_MRoleCreate( $params );
    $this->input_WbfsysLanguage_MTimeChanged( $params );
    $this->input_WbfsysLanguage_MRoleChange( $params );
    $this->input_WbfsysLanguage_MVersion( $params );
    $this->input_WbfsysLanguage_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_Name( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputName = $this->view->newInput( 'inputWbfsysLanguageName' , 'Text' );
      $this->items['wbfsys_language-name'] = $inputName;
      $inputName->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[name]',
          'id'        => 'wgt-input-wbfsys_language_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Name', 'src' => 'Language' ) ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'name' ) );
      $inputName->setRequired( $this->fieldRequired( 'wbfsys_language', 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel( $i18n->l( 'Name', 'wbfsys.language.label' ) );

      $inputName->refresh           = $this->refresh;
      $inputName->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysLanguage_Name */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysLanguageAccessKey' , 'Text' );
      $this->items['wbfsys_language-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[access_key]',
          'id'        => 'wgt-input-wbfsys_language_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Language' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_language', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.language.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysLanguage_AccessKey */

 /**
  * create the ui element for field key3
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_Key3( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputKey3 = $this->view->newInput( 'inputWbfsysLanguageKey3' , 'Text' );
      $this->items['wbfsys_language-key3'] = $inputKey3;
      $inputKey3->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[key3]',
          'id'        => 'wgt-input-wbfsys_language_key3'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Key3', 'src' => 'Language' ) ),
          'maxlength' => $this->entity->maxSize( 'key3' ),
        )
      );
      $inputKey3->setWidth( 'medium' );

      $inputKey3->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'key3' ) );
      $inputKey3->setRequired( $this->fieldRequired( 'wbfsys_language', 'key3' ) );
      $inputKey3->setData( $this->entity->getSecure('key3') );
      $inputKey3->setLabel( $i18n->l( 'Key3', 'wbfsys.language.label' ) );

      $inputKey3->refresh           = $this->refresh;
      $inputKey3->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysLanguage_Key3 */

 /**
  * create the ui element for field country_number
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_CountryNumber( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputCountryNumber = $this->view->newInput( 'inputWbfsysLanguageCountryNumber' , 'Text' );
      $this->items['wbfsys_language-country_number'] = $inputCountryNumber;
      $inputCountryNumber->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[country_number]',
          'id'        => 'wgt-input-wbfsys_language_country_number'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Country Number', 'src' => 'Language' ) ),
          'maxlength' => $this->entity->maxSize( 'country_number' ),
        )
      );
      $inputCountryNumber->setWidth( 'medium' );

      $inputCountryNumber->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'country_number' ) );
      $inputCountryNumber->setRequired( $this->fieldRequired( 'wbfsys_language', 'country_number' ) );
      $inputCountryNumber->setData( $this->entity->getSecure('country_number') );
      $inputCountryNumber->setLabel( $i18n->l( 'Country Number', 'wbfsys.language.label' ) );

      $inputCountryNumber->refresh           = $this->refresh;
      $inputCountryNumber->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysLanguage_CountryNumber */

 /**
  * create the ui element for field key_rfc1766
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_KeyRfc1766( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputKeyRfc1766 = $this->view->newInput( 'inputWbfsysLanguageKeyRfc1766' , 'Text' );
      $this->items['wbfsys_language-key_rfc1766'] = $inputKeyRfc1766;
      $inputKeyRfc1766->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[key_rfc1766]',
          'id'        => 'wgt-input-wbfsys_language_key_rfc1766'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Key rfc1766', 'src' => 'Language' ) ),
          'maxlength' => $this->entity->maxSize( 'key_rfc1766' ),
        )
      );
      $inputKeyRfc1766->setWidth( 'medium' );

      $inputKeyRfc1766->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'key_rfc1766' ) );
      $inputKeyRfc1766->setRequired( $this->fieldRequired( 'wbfsys_language', 'key_rfc1766' ) );
      $inputKeyRfc1766->setData( $this->entity->getSecure('key_rfc1766') );
      $inputKeyRfc1766->setLabel( $i18n->l( 'Key rfc1766', 'wbfsys.language.label' ) );

      $inputKeyRfc1766->refresh           = $this->refresh;
      $inputKeyRfc1766->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysLanguage_KeyRfc1766 */

 /**
  * create the ui element for field short
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_Short( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputShort = $this->view->newInput( 'inputWbfsysLanguageShort' , 'Text' );
      $this->items['wbfsys_language-short'] = $inputShort;
      $inputShort->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[short]',
          'id'        => 'wgt-input-wbfsys_language_short'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Short', 'src' => 'Language' ) ),
          'maxlength' => $this->entity->maxSize( 'short' ),
        )
      );
      $inputShort->setWidth( 'medium' );

      $inputShort->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'short' ) );
      $inputShort->setRequired( $this->fieldRequired( 'wbfsys_language', 'short' ) );
      $inputShort->setData( $this->entity->getSecure('short') );
      $inputShort->setLabel( $i18n->l( 'Short', 'wbfsys.language.label' ) );

      $inputShort->refresh           = $this->refresh;
      $inputShort->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysLanguage_Short */

 /**
  * create the ui element for field flag
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_Flag( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputFlag = $this->view->newInput( 'inputWbfsysLanguageFlag' , 'Text' );
      $this->items['wbfsys_language-flag'] = $inputFlag;
      $inputFlag->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[flag]',
          'id'        => 'wgt-input-wbfsys_language_flag'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Flag', 'src' => 'Language' ) ),
          'maxlength' => $this->entity->maxSize( 'flag' ),
        )
      );
      $inputFlag->setWidth( 'medium' );

      $inputFlag->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'flag' ) );
      $inputFlag->setRequired( $this->fieldRequired( 'wbfsys_language', 'flag' ) );
      $inputFlag->setData( $this->entity->getSecure('flag') );
      $inputFlag->setLabel( $i18n->l( 'Flag', 'wbfsys.language.label' ) );

      $inputFlag->refresh           = $this->refresh;
      $inputFlag->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysLanguage_Flag */

 /**
  * create the ui element for field is_syslang
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_IsSyslang( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputIsSyslang = $this->view->newInput( 'inputWbfsysLanguageIsSyslang', 'Checkbox' );
      $this->items['wbfsys_language-is_syslang'] = $inputIsSyslang;
      $inputIsSyslang->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[is_syslang]',
          'id'        => 'wgt-input-wbfsys_language_is_syslang'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Is Syslang', 'src' => 'Language' ) ),
        )
      );
      $inputIsSyslang->setWidth( 'medium' );

      $inputIsSyslang->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'is_syslang' ) );
      $inputIsSyslang->setRequired( $this->fieldRequired( 'wbfsys_language', 'is_syslang' ) );
      $inputIsSyslang->setActive( $this->entity->getBoolean( 'is_syslang' ) );
      $inputIsSyslang->setLabel( $i18n->l( 'Is Syslang', 'wbfsys.language.label' ) );

      $inputIsSyslang->refresh           = $this->refresh;
      $inputIsSyslang->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysLanguage_IsSyslang */

 /**
  * create the ui element for field format_time
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_FormatTime( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputFormatTime = $this->view->newInput( 'inputWbfsysLanguageFormatTime' , 'Text' );
      $this->items['wbfsys_language-format_time'] = $inputFormatTime;
      $inputFormatTime->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[format_time]',
          'id'        => 'wgt-input-wbfsys_language_format_time'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Format Time', 'src' => 'Language' ) ),
          'maxlength' => $this->entity->maxSize( 'format_time' ),
        )
      );
      $inputFormatTime->setWidth( 'medium' );

      $inputFormatTime->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'format_time' ) );
      $inputFormatTime->setRequired( $this->fieldRequired( 'wbfsys_language', 'format_time' ) );
      $inputFormatTime->setData( $this->entity->getSecure('format_time') );
      $inputFormatTime->setLabel( $i18n->l( 'Format Time', 'wbfsys.language.label' ) );

      $inputFormatTime->refresh           = $this->refresh;
      $inputFormatTime->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysLanguage_FormatTime */

 /**
  * create the ui element for field format_timestamp
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_FormatTimestamp( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputFormatTimestamp = $this->view->newInput( 'inputWbfsysLanguageFormatTimestamp' , 'Text' );
      $this->items['wbfsys_language-format_timestamp'] = $inputFormatTimestamp;
      $inputFormatTimestamp->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[format_timestamp]',
          'id'        => 'wgt-input-wbfsys_language_format_timestamp'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Format Timestamp', 'src' => 'Language' ) ),
          'maxlength' => $this->entity->maxSize( 'format_timestamp' ),
        )
      );
      $inputFormatTimestamp->setWidth( 'medium' );

      $inputFormatTimestamp->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'format_timestamp' ) );
      $inputFormatTimestamp->setRequired( $this->fieldRequired( 'wbfsys_language', 'format_timestamp' ) );
      $inputFormatTimestamp->setData( $this->entity->getSecure('format_timestamp') );
      $inputFormatTimestamp->setLabel( $i18n->l( 'Format Timestamp', 'wbfsys.language.label' ) );

      $inputFormatTimestamp->refresh           = $this->refresh;
      $inputFormatTimestamp->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysLanguage_FormatTimestamp */

 /**
  * create the ui element for field format_date
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_FormatDate( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputFormatDate = $this->view->newInput( 'inputWbfsysLanguageFormatDate' , 'Text' );
      $this->items['wbfsys_language-format_date'] = $inputFormatDate;
      $inputFormatDate->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[format_date]',
          'id'        => 'wgt-input-wbfsys_language_format_date'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Format Date', 'src' => 'Language' ) ),
          'maxlength' => $this->entity->maxSize( 'format_date' ),
        )
      );
      $inputFormatDate->setWidth( 'medium' );

      $inputFormatDate->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'format_date' ) );
      $inputFormatDate->setRequired( $this->fieldRequired( 'wbfsys_language', 'format_date' ) );
      $inputFormatDate->setData( $this->entity->getSecure('format_date') );
      $inputFormatDate->setLabel( $i18n->l( 'Format Date', 'wbfsys.language.label' ) );

      $inputFormatDate->refresh           = $this->refresh;
      $inputFormatDate->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysLanguage_FormatDate */

 /**
  * create the ui element for field sep_date
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_SepDate( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputSepDate = $this->view->newInput( 'inputWbfsysLanguageSepDate' , 'Text' );
      $this->items['wbfsys_language-sep_date'] = $inputSepDate;
      $inputSepDate->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[sep_date]',
          'id'        => 'wgt-input-wbfsys_language_sep_date'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Sep Date', 'src' => 'Language' ) ),
          'maxlength' => $this->entity->maxSize( 'sep_date' ),
        )
      );
      $inputSepDate->setWidth( 'medium' );

      $inputSepDate->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'sep_date' ) );
      $inputSepDate->setRequired( $this->fieldRequired( 'wbfsys_language', 'sep_date' ) );
      $inputSepDate->setData( $this->entity->getSecure('sep_date') );
      $inputSepDate->setLabel( $i18n->l( 'Sep Date', 'wbfsys.language.label' ) );

      $inputSepDate->refresh           = $this->refresh;
      $inputSepDate->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysLanguage_SepDate */

 /**
  * create the ui element for field sep_time
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_SepTime( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputSepTime = $this->view->newInput( 'inputWbfsysLanguageSepTime' , 'Text' );
      $this->items['wbfsys_language-sep_time'] = $inputSepTime;
      $inputSepTime->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[sep_time]',
          'id'        => 'wgt-input-wbfsys_language_sep_time'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Sep Time', 'src' => 'Language' ) ),
          'maxlength' => $this->entity->maxSize( 'sep_time' ),
        )
      );
      $inputSepTime->setWidth( 'medium' );

      $inputSepTime->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'sep_time' ) );
      $inputSepTime->setRequired( $this->fieldRequired( 'wbfsys_language', 'sep_time' ) );
      $inputSepTime->setData( $this->entity->getSecure('sep_time') );
      $inputSepTime->setLabel( $i18n->l( 'Sep Time', 'wbfsys.language.label' ) );

      $inputSepTime->refresh           = $this->refresh;
      $inputSepTime->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysLanguage_SepTime */

 /**
  * create the ui element for field sep_dec
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_SepDec( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputSepDec = $this->view->newInput( 'inputWbfsysLanguageSepDec' , 'Text' );
      $this->items['wbfsys_language-sep_dec'] = $inputSepDec;
      $inputSepDec->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[sep_dec]',
          'id'        => 'wgt-input-wbfsys_language_sep_dec'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Sep Dec', 'src' => 'Language' ) ),
          'maxlength' => $this->entity->maxSize( 'sep_dec' ),
        )
      );
      $inputSepDec->setWidth( 'medium' );

      $inputSepDec->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'sep_dec' ) );
      $inputSepDec->setRequired( $this->fieldRequired( 'wbfsys_language', 'sep_dec' ) );
      $inputSepDec->setData( $this->entity->getSecure('sep_dec') );
      $inputSepDec->setLabel( $i18n->l( 'Sep Dec', 'wbfsys.language.label' ) );

      $inputSepDec->refresh           = $this->refresh;
      $inputSepDec->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysLanguage_SepDec */

 /**
  * create the ui element for field sep_mil
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_SepMil( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputSepMil = $this->view->newInput( 'inputWbfsysLanguageSepMil' , 'Text' );
      $this->items['wbfsys_language-sep_mil'] = $inputSepMil;
      $inputSepMil->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[sep_mil]',
          'id'        => 'wgt-input-wbfsys_language_sep_mil'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Sep Mil', 'src' => 'Language' ) ),
          'maxlength' => $this->entity->maxSize( 'sep_mil' ),
        )
      );
      $inputSepMil->setWidth( 'medium' );

      $inputSepMil->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'sep_mil' ) );
      $inputSepMil->setRequired( $this->fieldRequired( 'wbfsys_language', 'sep_mil' ) );
      $inputSepMil->setData( $this->entity->getSecure('sep_mil') );
      $inputSepMil->setLabel( $i18n->l( 'Sep Mil', 'wbfsys.language.label' ) );

      $inputSepMil->refresh           = $this->refresh;
      $inputSepMil->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysLanguage_SepMil */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysLanguageRowid' , 'int' );
      $this->items['wbfsys_language-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[rowid]',
          'id'        => 'wgt-input-wbfsys_language_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Language' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_language', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.language.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysLanguage_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysLanguageMTimeCreated' , 'Date' );
      $this->items['wbfsys_language-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[m_time_created]',
          'id'        => 'wgt-input-wbfsys_language_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Language' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_language', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.language.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysLanguage_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysLanguageMRoleCreate', 'Window' );
      $this->items['wbfsys_language-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_language[m_role_create]',
        'id'        => 'wgt-input-wbfsys_language_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Language' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_language', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.language.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_language_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_language_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysLanguage_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysLanguageMTimeChanged' , 'Date' );
      $this->items['wbfsys_language-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_language_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Language' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_language', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.language.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysLanguage_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysLanguageMRoleChange', 'Window' );
      $this->items['wbfsys_language-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_language[m_role_change]',
        'id'        => 'wgt-input-wbfsys_language_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Language' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_language', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.language.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_language_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_language_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysLanguage_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysLanguageMVersion' , 'int' );
      $this->items['wbfsys_language-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[m_version]',
          'id'        => 'wgt-input-wbfsys_language_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Language' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_language', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.language.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysLanguage_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysLanguage_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysLanguageMUuid' , 'Text' );
      $this->items['wbfsys_language-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_language[m_uuid]',
          'id'        => 'wgt-input-wbfsys_language_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Language' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_language', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_language', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.language.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysLanguage_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysLanguage_Crud_Show_Form */


