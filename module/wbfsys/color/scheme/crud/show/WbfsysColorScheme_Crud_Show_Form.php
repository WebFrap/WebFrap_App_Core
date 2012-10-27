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
class WbfsysColorScheme_Crud_Show_Form
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
  public $namespace  = 'WbfsysColorScheme';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysColorScheme';

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
      'wbfsys_color_scheme' => array
      (
        'name' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'display_color' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '8',
        ),
        'bg_default' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '8',
        ),
        'font_default' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '8',
        ),
        'border_default' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '8',
        ),
        'bg_active' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '8',
        ),
        'font_active' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '8',
        ),
        'border_active' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '8',
        ),
        'bg_hover' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '8',
        ),
        'font_hover' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '8',
        ),
        'border_hover' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '8',
        ),
        'access_key' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'description' => array
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
   * @var WbfsysColorScheme_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysColorScheme_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysColorScheme_Entity $entity
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
      'wbfsys_color_scheme' => array
      (
        'name',
        'display_color',
        'bg_default',
        'font_default',
        'border_default',
        'bg_active',
        'font_active',
        'border_active',
        'bg_hover',
        'font_hover',
        'border_hover',
        'access_key',
        'description',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysColorScheme entity
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
    $this->view->addVar( 'entityWbfsysColorScheme', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_color_scheme'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_color_scheme[id_wbfsys_color_scheme-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysColorScheme_Name( $params );
    $this->input_WbfsysColorScheme_DisplayColor( $params );
    $this->input_WbfsysColorScheme_BgDefault( $params );
    $this->input_WbfsysColorScheme_FontDefault( $params );
    $this->input_WbfsysColorScheme_BorderDefault( $params );
    $this->input_WbfsysColorScheme_BgActive( $params );
    $this->input_WbfsysColorScheme_FontActive( $params );
    $this->input_WbfsysColorScheme_BorderActive( $params );
    $this->input_WbfsysColorScheme_BgHover( $params );
    $this->input_WbfsysColorScheme_FontHover( $params );
    $this->input_WbfsysColorScheme_BorderHover( $params );
    $this->input_WbfsysColorScheme_AccessKey( $params );
    $this->input_WbfsysColorScheme_Description( $params );
    $this->input_WbfsysColorScheme_Rowid( $params );
    $this->input_WbfsysColorScheme_MTimeCreated( $params );
    $this->input_WbfsysColorScheme_MRoleCreate( $params );
    $this->input_WbfsysColorScheme_MTimeChanged( $params );
    $this->input_WbfsysColorScheme_MRoleChange( $params );
    $this->input_WbfsysColorScheme_MVersion( $params );
    $this->input_WbfsysColorScheme_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_Name( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputName = $this->view->newInput( 'inputWbfsysColorSchemeName' , 'Text' );
      $this->items['wbfsys_color_scheme-name'] = $inputName;
      $inputName->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_scheme[name]',
          'id'        => 'wgt-input-wbfsys_color_scheme_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Name', 'src' => 'Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'name' ) );
      $inputName->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel( $i18n->l( 'Name', 'wbfsys.color_scheme.label' ) );

      $inputName->refresh           = $this->refresh;
      $inputName->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorScheme_Name */

 /**
  * create the ui element for field display_color
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_DisplayColor( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputDisplayColor = $this->view->newInput( 'inputWbfsysColorSchemeDisplayColor' , 'Colorpicker' );
      $this->items['wbfsys_color_scheme-display_color'] = $inputDisplayColor;
      $inputDisplayColor->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_scheme[display_color]',
          'id'        => 'wgt-input-wbfsys_color_scheme_display_color'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Display color', 'src' => 'Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'display_color' ),
        )
      );
      $inputDisplayColor->setWidth( 'medium' );

      $inputDisplayColor->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'display_color' ) );
      $inputDisplayColor->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'display_color' ) );
      $inputDisplayColor->setData( $this->entity->getSecure( 'display_color' ) );
      $inputDisplayColor->setLabel( $i18n->l( 'Display color', 'wbfsys.color_scheme.label' ) );

      $inputDisplayColor->refresh           = $this->refresh;
      $inputDisplayColor->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorScheme_DisplayColor */

 /**
  * create the ui element for field bg_default
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_BgDefault( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputBgDefault = $this->view->newInput( 'inputWbfsysColorSchemeBgDefault' , 'Colorpicker' );
      $this->items['wbfsys_color_scheme-bg_default'] = $inputBgDefault;
      $inputBgDefault->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_scheme[bg_default]',
          'id'        => 'wgt-input-wbfsys_color_scheme_bg_default'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Bg default', 'src' => 'Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'bg_default' ),
        )
      );
      $inputBgDefault->setWidth( 'medium' );

      $inputBgDefault->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'bg_default' ) );
      $inputBgDefault->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'bg_default' ) );
      $inputBgDefault->setData( $this->entity->getSecure( 'bg_default' ) );
      $inputBgDefault->setLabel( $i18n->l( 'Bg default', 'wbfsys.color_scheme.label' ) );

      $inputBgDefault->refresh           = $this->refresh;
      $inputBgDefault->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorScheme_BgDefault */

 /**
  * create the ui element for field font_default
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_FontDefault( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputFontDefault = $this->view->newInput( 'inputWbfsysColorSchemeFontDefault' , 'Colorpicker' );
      $this->items['wbfsys_color_scheme-font_default'] = $inputFontDefault;
      $inputFontDefault->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_scheme[font_default]',
          'id'        => 'wgt-input-wbfsys_color_scheme_font_default'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Font default', 'src' => 'Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'font_default' ),
        )
      );
      $inputFontDefault->setWidth( 'medium' );

      $inputFontDefault->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'font_default' ) );
      $inputFontDefault->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'font_default' ) );
      $inputFontDefault->setData( $this->entity->getSecure( 'font_default' ) );
      $inputFontDefault->setLabel( $i18n->l( 'Font default', 'wbfsys.color_scheme.label' ) );

      $inputFontDefault->refresh           = $this->refresh;
      $inputFontDefault->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorScheme_FontDefault */

 /**
  * create the ui element for field border_default
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_BorderDefault( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputBorderDefault = $this->view->newInput( 'inputWbfsysColorSchemeBorderDefault' , 'Colorpicker' );
      $this->items['wbfsys_color_scheme-border_default'] = $inputBorderDefault;
      $inputBorderDefault->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_scheme[border_default]',
          'id'        => 'wgt-input-wbfsys_color_scheme_border_default'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Border default', 'src' => 'Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'border_default' ),
        )
      );
      $inputBorderDefault->setWidth( 'medium' );

      $inputBorderDefault->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'border_default' ) );
      $inputBorderDefault->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'border_default' ) );
      $inputBorderDefault->setData( $this->entity->getSecure( 'border_default' ) );
      $inputBorderDefault->setLabel( $i18n->l( 'Border default', 'wbfsys.color_scheme.label' ) );

      $inputBorderDefault->refresh           = $this->refresh;
      $inputBorderDefault->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorScheme_BorderDefault */

 /**
  * create the ui element for field bg_active
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_BgActive( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputBgActive = $this->view->newInput( 'inputWbfsysColorSchemeBgActive' , 'Colorpicker' );
      $this->items['wbfsys_color_scheme-bg_active'] = $inputBgActive;
      $inputBgActive->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_scheme[bg_active]',
          'id'        => 'wgt-input-wbfsys_color_scheme_bg_active'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Bg active', 'src' => 'Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'bg_active' ),
        )
      );
      $inputBgActive->setWidth( 'medium' );

      $inputBgActive->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'bg_active' ) );
      $inputBgActive->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'bg_active' ) );
      $inputBgActive->setData( $this->entity->getSecure( 'bg_active' ) );
      $inputBgActive->setLabel( $i18n->l( 'Bg active', 'wbfsys.color_scheme.label' ) );

      $inputBgActive->refresh           = $this->refresh;
      $inputBgActive->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorScheme_BgActive */

 /**
  * create the ui element for field font_active
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_FontActive( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputFontActive = $this->view->newInput( 'inputWbfsysColorSchemeFontActive' , 'Colorpicker' );
      $this->items['wbfsys_color_scheme-font_active'] = $inputFontActive;
      $inputFontActive->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_scheme[font_active]',
          'id'        => 'wgt-input-wbfsys_color_scheme_font_active'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Font active', 'src' => 'Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'font_active' ),
        )
      );
      $inputFontActive->setWidth( 'medium' );

      $inputFontActive->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'font_active' ) );
      $inputFontActive->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'font_active' ) );
      $inputFontActive->setData( $this->entity->getSecure( 'font_active' ) );
      $inputFontActive->setLabel( $i18n->l( 'Font active', 'wbfsys.color_scheme.label' ) );

      $inputFontActive->refresh           = $this->refresh;
      $inputFontActive->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorScheme_FontActive */

 /**
  * create the ui element for field border_active
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_BorderActive( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputBorderActive = $this->view->newInput( 'inputWbfsysColorSchemeBorderActive' , 'Colorpicker' );
      $this->items['wbfsys_color_scheme-border_active'] = $inputBorderActive;
      $inputBorderActive->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_scheme[border_active]',
          'id'        => 'wgt-input-wbfsys_color_scheme_border_active'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Border active', 'src' => 'Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'border_active' ),
        )
      );
      $inputBorderActive->setWidth( 'medium' );

      $inputBorderActive->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'border_active' ) );
      $inputBorderActive->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'border_active' ) );
      $inputBorderActive->setData( $this->entity->getSecure( 'border_active' ) );
      $inputBorderActive->setLabel( $i18n->l( 'Border active', 'wbfsys.color_scheme.label' ) );

      $inputBorderActive->refresh           = $this->refresh;
      $inputBorderActive->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorScheme_BorderActive */

 /**
  * create the ui element for field bg_hover
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_BgHover( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputBgHover = $this->view->newInput( 'inputWbfsysColorSchemeBgHover' , 'Colorpicker' );
      $this->items['wbfsys_color_scheme-bg_hover'] = $inputBgHover;
      $inputBgHover->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_scheme[bg_hover]',
          'id'        => 'wgt-input-wbfsys_color_scheme_bg_hover'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Bg hover', 'src' => 'Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'bg_hover' ),
        )
      );
      $inputBgHover->setWidth( 'medium' );

      $inputBgHover->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'bg_hover' ) );
      $inputBgHover->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'bg_hover' ) );
      $inputBgHover->setData( $this->entity->getSecure( 'bg_hover' ) );
      $inputBgHover->setLabel( $i18n->l( 'Bg hover', 'wbfsys.color_scheme.label' ) );

      $inputBgHover->refresh           = $this->refresh;
      $inputBgHover->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorScheme_BgHover */

 /**
  * create the ui element for field font_hover
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_FontHover( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputFontHover = $this->view->newInput( 'inputWbfsysColorSchemeFontHover' , 'Colorpicker' );
      $this->items['wbfsys_color_scheme-font_hover'] = $inputFontHover;
      $inputFontHover->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_scheme[font_hover]',
          'id'        => 'wgt-input-wbfsys_color_scheme_font_hover'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Font hover', 'src' => 'Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'font_hover' ),
        )
      );
      $inputFontHover->setWidth( 'medium' );

      $inputFontHover->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'font_hover' ) );
      $inputFontHover->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'font_hover' ) );
      $inputFontHover->setData( $this->entity->getSecure( 'font_hover' ) );
      $inputFontHover->setLabel( $i18n->l( 'Font hover', 'wbfsys.color_scheme.label' ) );

      $inputFontHover->refresh           = $this->refresh;
      $inputFontHover->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorScheme_FontHover */

 /**
  * create the ui element for field border_hover
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_BorderHover( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputBorderHover = $this->view->newInput( 'inputWbfsysColorSchemeBorderHover' , 'Colorpicker' );
      $this->items['wbfsys_color_scheme-border_hover'] = $inputBorderHover;
      $inputBorderHover->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_scheme[border_hover]',
          'id'        => 'wgt-input-wbfsys_color_scheme_border_hover'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Border hover', 'src' => 'Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'border_hover' ),
        )
      );
      $inputBorderHover->setWidth( 'medium' );

      $inputBorderHover->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'border_hover' ) );
      $inputBorderHover->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'border_hover' ) );
      $inputBorderHover->setData( $this->entity->getSecure( 'border_hover' ) );
      $inputBorderHover->setLabel( $i18n->l( 'Border hover', 'wbfsys.color_scheme.label' ) );

      $inputBorderHover->refresh           = $this->refresh;
      $inputBorderHover->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorScheme_BorderHover */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysColorSchemeAccessKey' , 'Text' );
      $this->items['wbfsys_color_scheme-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_scheme[access_key]',
          'id'        => 'wgt-input-wbfsys_color_scheme_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.color_scheme.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorScheme_AccessKey */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysColorSchemeDescription', 'Textarea' );
      $this->items['wbfsys_color_scheme-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_color_scheme[description]',
          'id'    => 'wgt-input-wbfsys_color_scheme_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Color Scheme' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.color_scheme.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysColorScheme_Description */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysColorSchemeRowid' , 'int' );
      $this->items['wbfsys_color_scheme-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_scheme[rowid]',
          'id'        => 'wgt-input-wbfsys_color_scheme_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Color Scheme' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.color_scheme.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysColorScheme_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysColorSchemeMTimeCreated' , 'Date' );
      $this->items['wbfsys_color_scheme-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_scheme[m_time_created]',
          'id'        => 'wgt-input-wbfsys_color_scheme_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.color_scheme.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysColorScheme_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysColorSchemeMRoleCreate', 'Window' );
      $this->items['wbfsys_color_scheme-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_color_scheme[m_role_create]',
        'id'        => 'wgt-input-wbfsys_color_scheme_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Color Scheme' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.color_scheme.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_color_scheme_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_color_scheme_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysColorScheme_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysColorSchemeMTimeChanged' , 'Date' );
      $this->items['wbfsys_color_scheme-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_scheme[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_color_scheme_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.color_scheme.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysColorScheme_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysColorSchemeMRoleChange', 'Window' );
      $this->items['wbfsys_color_scheme-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_color_scheme[m_role_change]',
        'id'        => 'wgt-input-wbfsys_color_scheme_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Color Scheme' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.color_scheme.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_color_scheme_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_color_scheme_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysColorScheme_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysColorSchemeMVersion' , 'int' );
      $this->items['wbfsys_color_scheme-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_scheme[m_version]',
          'id'        => 'wgt-input-wbfsys_color_scheme_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Color Scheme' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.color_scheme.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysColorScheme_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorScheme_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysColorSchemeMUuid' , 'Text' );
      $this->items['wbfsys_color_scheme-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_scheme[m_uuid]',
          'id'        => 'wgt-input-wbfsys_color_scheme_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Color Scheme' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_color_scheme', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_color_scheme', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.color_scheme.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysColorScheme_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysColorScheme_Crud_Show_Form */


