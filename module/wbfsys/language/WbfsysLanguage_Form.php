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
class WbfsysLanguage_Form
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
  public $keyName     = 'wbfsys_language';

  /**
   * the cname for the entities, is used to request metadata from the orm
   * @setter WgtForm::setEntityName()
   * @getter WgtForm::getEntityName()
   * @var string 
   */
  public $entityName  = 'WbfsysLanguage';

  /**
   * namespace for the actual form
   * @setter WgtForm::setNamespace()
   * @getter WgtForm::getNamespace()
   * @var string 
   */
  public $namespace  = 'WbfsysLanguage';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtForm::setPrefix()
   * @getter WgtForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysLanguage';

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
   * @var WbfsysLanguage_Entity 
   */
  public $entity      = null;
  
////////////////////////////////////////////////////////////////////////////////
// form methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysLanguage entity
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
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysLanguage' );
      }
    }

  }//end public function createForm */

 /**
  * create a search form for the WbfsysLanguage entity
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
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysLanguage' );
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
          'title'     => $this->view->i18n->l( 'Insert value for Name (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadOnly( $this->isReadOnly( 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel
      (
        $this->view->i18n->l( 'Name', 'wbfsys.language.label' ),
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
          'class'     => 'wcm wcm_ui_tip valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Access Key (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadOnly( $this->isReadOnly( 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel
      (
        $this->view->i18n->l( 'Access Key', 'wbfsys.language.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Key3 (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'key3' ),
        )
      );
      $inputKey3->setWidth( 'medium' );

      $inputKey3->setReadOnly( $this->isReadOnly( 'key3' ) );
      $inputKey3->setData( $this->entity->getSecure('key3') );
      $inputKey3->setLabel
      (
        $this->view->i18n->l( 'Key3', 'wbfsys.language.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Country Number (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'country_number' ),
        )
      );
      $inputCountryNumber->setWidth( 'medium' );

      $inputCountryNumber->setReadOnly( $this->isReadOnly( 'country_number' ) );
      $inputCountryNumber->setData( $this->entity->getSecure('country_number') );
      $inputCountryNumber->setLabel
      (
        $this->view->i18n->l( 'Country Number', 'wbfsys.language.label' ),
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
  * create the ui element for field key_rfc1766
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_key_rfc1766( $params )
  {

      //tpl: class ui:text
      $inputKeyRfc1766 = $this->view->newInput( 'input'.$this->prefix.'KeyRfc1766' , 'Text' );
      $this->items['key_rfc1766'] = $inputKeyRfc1766;
      $inputKeyRfc1766->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[key_rfc1766]',
          'id'        => 'wgt-input-'.$this->keyName.'_key_rfc1766'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Key rfc1766 (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'key_rfc1766' ),
        )
      );
      $inputKeyRfc1766->setWidth( 'medium' );

      $inputKeyRfc1766->setReadOnly( $this->isReadOnly( 'key_rfc1766' ) );
      $inputKeyRfc1766->setData( $this->entity->getSecure('key_rfc1766') );
      $inputKeyRfc1766->setLabel
      (
        $this->view->i18n->l( 'Key rfc1766', 'wbfsys.language.label' ),
        $this->entity->required( 'key_rfc1766' )
      );

      $inputKeyRfc1766->refresh           = $this->refresh;
      $inputKeyRfc1766->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_key_rfc1766 */

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
          'title'     => $this->view->i18n->l( 'Insert value for Short (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'short' ),
        )
      );
      $inputShort->setWidth( 'medium' );

      $inputShort->setReadOnly( $this->isReadOnly( 'short' ) );
      $inputShort->setData( $this->entity->getSecure('short') );
      $inputShort->setLabel
      (
        $this->view->i18n->l( 'Short', 'wbfsys.language.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Flag (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'flag' ),
        )
      );
      $inputFlag->setWidth( 'medium' );

      $inputFlag->setReadOnly( $this->isReadOnly( 'flag' ) );
      $inputFlag->setData( $this->entity->getSecure('flag') );
      $inputFlag->setLabel
      (
        $this->view->i18n->l( 'Flag', 'wbfsys.language.label' ),
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
  * create the ui element for field is_syslang
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_is_syslang( $params )
  {

      //tpl: class ui:Checkbox
      $inputIsSyslang = $this->view->newInput( 'input'.$this->prefix.'IsSyslang' , 'Checkbox' );
      $this->items['is_syslang'] = $inputIsSyslang;
      $inputIsSyslang->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[is_syslang]',
          'id'        => 'wgt-input-'.$this->keyName.'_is_syslang'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Is Syslang (Language)', 'wbfsys.language.label' ),
        )
      );
      $inputIsSyslang->setWidth( 'medium' );

      $inputIsSyslang->setReadOnly( $this->isReadOnly( 'is_syslang' ) );
      $inputIsSyslang->setActive( $this->entity->getBoolean( 'is_syslang' ) );
      $inputIsSyslang->setLabel
      (
        $this->view->i18n->l( 'Is Syslang', 'wbfsys.language.label' ),
        $this->entity->required( 'is_syslang' )
      );

      $inputIsSyslang->refresh           = $this->refresh;
      $inputIsSyslang->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_is_syslang */

 /**
  * create the ui element for field format_time
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_format_time( $params )
  {

      //tpl: class ui:text
      $inputFormatTime = $this->view->newInput( 'input'.$this->prefix.'FormatTime' , 'Text' );
      $this->items['format_time'] = $inputFormatTime;
      $inputFormatTime->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[format_time]',
          'id'        => 'wgt-input-'.$this->keyName.'_format_time'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Format Time (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'format_time' ),
        )
      );
      $inputFormatTime->setWidth( 'medium' );

      $inputFormatTime->setReadOnly( $this->isReadOnly( 'format_time' ) );
      $inputFormatTime->setData( $this->entity->getSecure('format_time') );
      $inputFormatTime->setLabel
      (
        $this->view->i18n->l( 'Format Time', 'wbfsys.language.label' ),
        $this->entity->required( 'format_time' )
      );

      $inputFormatTime->refresh           = $this->refresh;
      $inputFormatTime->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_format_time */

 /**
  * create the ui element for field format_timestamp
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_format_timestamp( $params )
  {

      //tpl: class ui:text
      $inputFormatTimestamp = $this->view->newInput( 'input'.$this->prefix.'FormatTimestamp' , 'Text' );
      $this->items['format_timestamp'] = $inputFormatTimestamp;
      $inputFormatTimestamp->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[format_timestamp]',
          'id'        => 'wgt-input-'.$this->keyName.'_format_timestamp'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Format Timestamp (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'format_timestamp' ),
        )
      );
      $inputFormatTimestamp->setWidth( 'medium' );

      $inputFormatTimestamp->setReadOnly( $this->isReadOnly( 'format_timestamp' ) );
      $inputFormatTimestamp->setData( $this->entity->getSecure('format_timestamp') );
      $inputFormatTimestamp->setLabel
      (
        $this->view->i18n->l( 'Format Timestamp', 'wbfsys.language.label' ),
        $this->entity->required( 'format_timestamp' )
      );

      $inputFormatTimestamp->refresh           = $this->refresh;
      $inputFormatTimestamp->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_format_timestamp */

 /**
  * create the ui element for field format_date
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_format_date( $params )
  {

      //tpl: class ui:text
      $inputFormatDate = $this->view->newInput( 'input'.$this->prefix.'FormatDate' , 'Text' );
      $this->items['format_date'] = $inputFormatDate;
      $inputFormatDate->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[format_date]',
          'id'        => 'wgt-input-'.$this->keyName.'_format_date'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Format Date (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'format_date' ),
        )
      );
      $inputFormatDate->setWidth( 'medium' );

      $inputFormatDate->setReadOnly( $this->isReadOnly( 'format_date' ) );
      $inputFormatDate->setData( $this->entity->getSecure('format_date') );
      $inputFormatDate->setLabel
      (
        $this->view->i18n->l( 'Format Date', 'wbfsys.language.label' ),
        $this->entity->required( 'format_date' )
      );

      $inputFormatDate->refresh           = $this->refresh;
      $inputFormatDate->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_format_date */

 /**
  * create the ui element for field sep_date
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_sep_date( $params )
  {

      //tpl: class ui:text
      $inputSepDate = $this->view->newInput( 'input'.$this->prefix.'SepDate' , 'Text' );
      $this->items['sep_date'] = $inputSepDate;
      $inputSepDate->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[sep_date]',
          'id'        => 'wgt-input-'.$this->keyName.'_sep_date'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Sep Date (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'sep_date' ),
        )
      );
      $inputSepDate->setWidth( 'medium' );

      $inputSepDate->setReadOnly( $this->isReadOnly( 'sep_date' ) );
      $inputSepDate->setData( $this->entity->getSecure('sep_date') );
      $inputSepDate->setLabel
      (
        $this->view->i18n->l( 'Sep Date', 'wbfsys.language.label' ),
        $this->entity->required( 'sep_date' )
      );

      $inputSepDate->refresh           = $this->refresh;
      $inputSepDate->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_sep_date */

 /**
  * create the ui element for field sep_time
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_sep_time( $params )
  {

      //tpl: class ui:text
      $inputSepTime = $this->view->newInput( 'input'.$this->prefix.'SepTime' , 'Text' );
      $this->items['sep_time'] = $inputSepTime;
      $inputSepTime->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[sep_time]',
          'id'        => 'wgt-input-'.$this->keyName.'_sep_time'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Sep Time (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'sep_time' ),
        )
      );
      $inputSepTime->setWidth( 'medium' );

      $inputSepTime->setReadOnly( $this->isReadOnly( 'sep_time' ) );
      $inputSepTime->setData( $this->entity->getSecure('sep_time') );
      $inputSepTime->setLabel
      (
        $this->view->i18n->l( 'Sep Time', 'wbfsys.language.label' ),
        $this->entity->required( 'sep_time' )
      );

      $inputSepTime->refresh           = $this->refresh;
      $inputSepTime->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_sep_time */

 /**
  * create the ui element for field sep_dec
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_sep_dec( $params )
  {

      //tpl: class ui:text
      $inputSepDec = $this->view->newInput( 'input'.$this->prefix.'SepDec' , 'Text' );
      $this->items['sep_dec'] = $inputSepDec;
      $inputSepDec->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[sep_dec]',
          'id'        => 'wgt-input-'.$this->keyName.'_sep_dec'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Sep Dec (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'sep_dec' ),
        )
      );
      $inputSepDec->setWidth( 'medium' );

      $inputSepDec->setReadOnly( $this->isReadOnly( 'sep_dec' ) );
      $inputSepDec->setData( $this->entity->getSecure('sep_dec') );
      $inputSepDec->setLabel
      (
        $this->view->i18n->l( 'Sep Dec', 'wbfsys.language.label' ),
        $this->entity->required( 'sep_dec' )
      );

      $inputSepDec->refresh           = $this->refresh;
      $inputSepDec->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_sep_dec */

 /**
  * create the ui element for field sep_mil
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_sep_mil( $params )
  {

      //tpl: class ui:text
      $inputSepMil = $this->view->newInput( 'input'.$this->prefix.'SepMil' , 'Text' );
      $this->items['sep_mil'] = $inputSepMil;
      $inputSepMil->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[sep_mil]',
          'id'        => 'wgt-input-'.$this->keyName.'_sep_mil'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Sep Mil (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'sep_mil' ),
        )
      );
      $inputSepMil->setWidth( 'medium' );

      $inputSepMil->setReadOnly( $this->isReadOnly( 'sep_mil' ) );
      $inputSepMil->setData( $this->entity->getSecure('sep_mil') );
      $inputSepMil->setLabel
      (
        $this->view->i18n->l( 'Sep Mil', 'wbfsys.language.label' ),
        $this->entity->required( 'sep_mil' )
      );

      $inputSepMil->refresh           = $this->refresh;
      $inputSepMil->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_sep_mil */

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
          'title'     => $this->view->i18n->l( 'Insert value for Rowid (Language)', 'wbfsys.language.label' ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadOnly( $this->isReadOnly( 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel
      (
        $this->view->i18n->l( 'Rowid', 'wbfsys.language.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Time Created (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadOnly( true );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel
      (
        $this->view->i18n->l( 'Time Created', 'wbfsys.language.label' ),
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
        'title'     => $this->view->i18n->l( 'Insert value for Role Create (Language)', 'wbfsys.language.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadOnly( true );
      $inputMRoleCreate->setLabel( $this->view->i18n->l( 'Role Create', 'wbfsys.language.label' ) );


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
          'title'     => $this->view->i18n->l( 'Insert value for Time Changed (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadOnly( true );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel
      (
        $this->view->i18n->l( 'Time Changed', 'wbfsys.language.label' ),
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
        'title'     => $this->view->i18n->l( 'Insert value for Role Change (Language)', 'wbfsys.language.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadOnly( true );
      $inputMRoleChange->setLabel( $this->view->i18n->l( 'Role Change', 'wbfsys.language.label' ) );


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
          'title'     => $this->view->i18n->l( 'Insert value for Version (Language)', 'wbfsys.language.label' ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadOnly( true );
      $inputMVersion->setData( $this->entity->getSecure('m_version') );
      $inputMVersion->setLabel
      (
        $this->view->i18n->l( 'Version', 'wbfsys.language.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Uuid (Language)', 'wbfsys.language.label' ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadOnly( true );
      $inputMUuid->setData( $this->entity->getSecure('m_uuid') );
      $inputMUuid->setLabel
      (
        $this->view->i18n->l( 'Uuid', 'wbfsys.language.label' ),
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
          'title'     => $this->view->i18n->l( 'Search for Name (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadOnly( $this->isReadOnly( 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel
      (
        $this->view->i18n->l( 'Name', 'wbfsys.language.label' ),
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
          'title'     => $this->view->i18n->l( 'Search for Access Key (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadOnly( $this->isReadOnly( 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel
      (
        $this->view->i18n->l( 'Access Key', 'wbfsys.language.label' ),
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
          'title'     => $this->view->i18n->l( 'Search for Key3 (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'key3' ),
        )
      );
      $inputKey3->setWidth( 'medium' );

      $inputKey3->setReadOnly( $this->isReadOnly( 'key3' ) );
      $inputKey3->setData( $this->entity->getSecure('key3') );
      $inputKey3->setLabel
      (
        $this->view->i18n->l( 'Key3', 'wbfsys.language.label' ),
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
  * create the search element for field key_rfc1766
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_key_rfc1766( $params )
  {

      //tpl: class ui:text
      $inputKeyRfc1766 = $this->view->newInput( 'input'.$this->prefix.'KeyRfc1766' , 'Text' );
      $this->items['key_rfc1766'] = $inputKeyRfc1766;
      $inputKeyRfc1766->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[key_rfc1766]',
          'id'        => 'wgt-input-'.$this->keyName.'_key_rfc1766'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_cname medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Key rfc1766 (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'key_rfc1766' ),
        )
      );
      $inputKeyRfc1766->setWidth( 'medium' );

      $inputKeyRfc1766->setReadOnly( $this->isReadOnly( 'key_rfc1766' ) );
      $inputKeyRfc1766->setData( $this->entity->getSecure('key_rfc1766') );
      $inputKeyRfc1766->setLabel
      (
        $this->view->i18n->l( 'Key rfc1766', 'wbfsys.language.label' ),
        $this->entity->required( 'key_rfc1766' )
      );

      $inputKeyRfc1766->refresh           = $this->refresh;
      $inputKeyRfc1766->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );


  }//end public function search_key_rfc1766 */

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
          'title'     => $this->view->i18n->l( 'Search for Short (Language)', 'wbfsys.language.label' ),
          'maxlength' => $this->entity->maxSize( 'short' ),
        )
      );
      $inputShort->setWidth( 'medium' );

      $inputShort->setReadOnly( $this->isReadOnly( 'short' ) );
      $inputShort->setData( $this->entity->getSecure('short') );
      $inputShort->setLabel
      (
        $this->view->i18n->l( 'Short', 'wbfsys.language.label' ),
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

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_language_m_role_create';

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

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_language_m_role_change';

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




}//end class WbfsysLanguage_Form */


