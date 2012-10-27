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
class WbfsysColorNode_Crud_Create_Form
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
  public $namespace  = 'WbfsysColorNode';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysColorNode';

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
      'wbfsys_color_node' => array
      (
        'm_order' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'name' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'access_key' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'id_scheme' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
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
        'bg_inactive' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '8',
        ),
        'font_inactive' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '8',
        ),
        'border_inactive' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '8',
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
   * @var WbfsysColorNode_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysColorNode_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysColorNode_Entity $entity
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
      'wbfsys_color_node' => array
      (
        'm_order',
        'name',
        'access_key',
        'id_scheme',
        'display_color',
        'bg_default',
        'font_default',
        'border_default',
        'bg_hover',
        'font_hover',
        'border_hover',
        'bg_active',
        'font_active',
        'border_active',
        'bg_inactive',
        'font_inactive',
        'border_inactive',
        'description',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysColorNode entity
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
    $this->view->addVar( 'entityWbfsysColorNode', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_color_node'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_color_node[id_wbfsys_color_node-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysColorNode_MOrder( $params );
    $this->input_WbfsysColorNode_Name( $params );
    $this->input_WbfsysColorNode_AccessKey( $params );
    $this->input_WbfsysColorNode_IdScheme( $params );
    $this->input_WbfsysColorNode_DisplayColor( $params );
    $this->input_WbfsysColorNode_BgDefault( $params );
    $this->input_WbfsysColorNode_FontDefault( $params );
    $this->input_WbfsysColorNode_BorderDefault( $params );
    $this->input_WbfsysColorNode_BgHover( $params );
    $this->input_WbfsysColorNode_FontHover( $params );
    $this->input_WbfsysColorNode_BorderHover( $params );
    $this->input_WbfsysColorNode_BgActive( $params );
    $this->input_WbfsysColorNode_FontActive( $params );
    $this->input_WbfsysColorNode_BorderActive( $params );
    $this->input_WbfsysColorNode_BgInactive( $params );
    $this->input_WbfsysColorNode_FontInactive( $params );
    $this->input_WbfsysColorNode_BorderInactive( $params );
    $this->input_WbfsysColorNode_Description( $params );
    $this->input_WbfsysColorNode_Rowid( $params );
    $this->input_WbfsysColorNode_MTimeCreated( $params );
    $this->input_WbfsysColorNode_MRoleCreate( $params );
    $this->input_WbfsysColorNode_MTimeChanged( $params );
    $this->input_WbfsysColorNode_MRoleChange( $params );
    $this->input_WbfsysColorNode_MVersion( $params );
    $this->input_WbfsysColorNode_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field m_order
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_MOrder( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMOrder = $this->view->newInput( 'inputWbfsysColorNodeMOrder' , 'int' );
      $this->items['wbfsys_color_node-m_order'] = $inputMOrder;
      $inputMOrder->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[m_order]',
          'id'        => 'wgt-input-wbfsys_color_node_m_order'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Order', 'src' => 'Color Node' ) ),
        )
      );
      $inputMOrder->setWidth( 'medium' );

      $inputMOrder->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'm_order' ) );
      $inputMOrder->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'm_order' ) );
      $inputMOrder->setData( $this->entity->getInt( 'm_order' ) );
      $inputMOrder->setLabel( $i18n->l( 'Order', 'wbfsys.color_node.label' ) );

      $inputMOrder->refresh           = $this->refresh;
      $inputMOrder->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysColorNode_MOrder */

 /**
  * create the ui element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_Name( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputName = $this->view->newInput( 'inputWbfsysColorNodeName' , 'Text' );
      $this->items['wbfsys_color_node-name'] = $inputName;
      $inputName->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[name]',
          'id'        => 'wgt-input-wbfsys_color_node_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Name', 'src' => 'Color Node' ) ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'name' ) );
      $inputName->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel( $i18n->l( 'Name', 'wbfsys.color_node.label' ) );

      $inputName->refresh           = $this->refresh;
      $inputName->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorNode_Name */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysColorNodeAccessKey' , 'Text' );
      $this->items['wbfsys_color_node-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[access_key]',
          'id'        => 'wgt-input-wbfsys_color_node_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Color Node' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.color_node.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorNode_AccessKey */

 /**
  * create the ui element for field id_scheme
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_IdScheme( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysColorScheme_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysColorScheme not exists' );

      Log::warn( 'Looks like the Entity: WbfsysColorScheme is missing' );

      return;
    }


      //p: Window
      $objidWbfsysColorScheme = $this->entity->getData( 'id_scheme' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysColorScheme
          || !$entityWbfsysColorScheme = $this->db->orm->get
          (
            'WbfsysColorScheme',
            $objidWbfsysColorScheme
          )
      )
      {
        $entityWbfsysColorScheme = $this->db->orm->newEntity( 'WbfsysColorScheme' );
      }

      $inputIdScheme = $this->view->newInput( 'inputWbfsysColorNodeIdScheme', 'Window' );
      $this->items['wbfsys_color_node-id_scheme'] = $inputIdScheme;
      $inputIdScheme->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_color_node[id_scheme]',
        'id'        => 'wgt-input-wbfsys_color_node_id_scheme'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Scheme', 'src' => 'Color Node' ) ),
      ));

      if( $this->assignedForm )
        $inputIdScheme->assignedForm = $this->assignedForm;

      $inputIdScheme->setWidth( 'medium' );

      $inputIdScheme->setData( $this->entity->getData( 'id_scheme' )  );
      $inputIdScheme->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'id_scheme' ) );
      $inputIdScheme->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'id_scheme' ) );
      $inputIdScheme->setLabel( $i18n->l( 'Scheme', 'wbfsys.color_node.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ColorScheme.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_color_node_id_scheme'.($this->suffix?'-'.$this->suffix:'');

      $inputIdScheme->setListUrl ( $listUrl );
      $inputIdScheme->setListIcon( 'control/connect.png' );
      $inputIdScheme->setEntityUrl( 'maintab.php?c=Wbfsys.ColorScheme.edit' );
      $inputIdScheme->conEntity         = $entityWbfsysColorScheme;
      $inputIdScheme->refresh           = $this->refresh;
      $inputIdScheme->serializeElement  = $this->sendElement;



      $inputIdScheme->view = $this->view;
      $inputIdScheme->buildJavascript( 'wgt-input-wbfsys_color_node_id_scheme'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdScheme );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysColorNode_IdScheme */

 /**
  * create the ui element for field display_color
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_DisplayColor( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputDisplayColor = $this->view->newInput( 'inputWbfsysColorNodeDisplayColor' , 'Colorpicker' );
      $this->items['wbfsys_color_node-display_color'] = $inputDisplayColor;
      $inputDisplayColor->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[display_color]',
          'id'        => 'wgt-input-wbfsys_color_node_display_color'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Display color', 'src' => 'Color Node' ) ),
          'maxlength' => $this->entity->maxSize( 'display_color' ),
        )
      );
      $inputDisplayColor->setWidth( 'medium' );

      $inputDisplayColor->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'display_color' ) );
      $inputDisplayColor->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'display_color' ) );
      $inputDisplayColor->setData( $this->entity->getSecure( 'display_color' ) );
      $inputDisplayColor->setLabel( $i18n->l( 'Display color', 'wbfsys.color_node.label' ) );

      $inputDisplayColor->refresh           = $this->refresh;
      $inputDisplayColor->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorNode_DisplayColor */

 /**
  * create the ui element for field bg_default
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_BgDefault( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputBgDefault = $this->view->newInput( 'inputWbfsysColorNodeBgDefault' , 'Colorpicker' );
      $this->items['wbfsys_color_node-bg_default'] = $inputBgDefault;
      $inputBgDefault->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[bg_default]',
          'id'        => 'wgt-input-wbfsys_color_node_bg_default'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Bg default', 'src' => 'Color Node' ) ),
          'maxlength' => $this->entity->maxSize( 'bg_default' ),
        )
      );
      $inputBgDefault->setWidth( 'medium' );

      $inputBgDefault->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'bg_default' ) );
      $inputBgDefault->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'bg_default' ) );
      $inputBgDefault->setData( $this->entity->getSecure( 'bg_default' ) );
      $inputBgDefault->setLabel( $i18n->l( 'Bg default', 'wbfsys.color_node.label' ) );

      $inputBgDefault->refresh           = $this->refresh;
      $inputBgDefault->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorNode_BgDefault */

 /**
  * create the ui element for field font_default
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_FontDefault( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputFontDefault = $this->view->newInput( 'inputWbfsysColorNodeFontDefault' , 'Colorpicker' );
      $this->items['wbfsys_color_node-font_default'] = $inputFontDefault;
      $inputFontDefault->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[font_default]',
          'id'        => 'wgt-input-wbfsys_color_node_font_default'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Font default', 'src' => 'Color Node' ) ),
          'maxlength' => $this->entity->maxSize( 'font_default' ),
        )
      );
      $inputFontDefault->setWidth( 'medium' );

      $inputFontDefault->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'font_default' ) );
      $inputFontDefault->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'font_default' ) );
      $inputFontDefault->setData( $this->entity->getSecure( 'font_default' ) );
      $inputFontDefault->setLabel( $i18n->l( 'Font default', 'wbfsys.color_node.label' ) );

      $inputFontDefault->refresh           = $this->refresh;
      $inputFontDefault->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorNode_FontDefault */

 /**
  * create the ui element for field border_default
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_BorderDefault( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputBorderDefault = $this->view->newInput( 'inputWbfsysColorNodeBorderDefault' , 'Colorpicker' );
      $this->items['wbfsys_color_node-border_default'] = $inputBorderDefault;
      $inputBorderDefault->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[border_default]',
          'id'        => 'wgt-input-wbfsys_color_node_border_default'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Border default', 'src' => 'Color Node' ) ),
          'maxlength' => $this->entity->maxSize( 'border_default' ),
        )
      );
      $inputBorderDefault->setWidth( 'medium' );

      $inputBorderDefault->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'border_default' ) );
      $inputBorderDefault->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'border_default' ) );
      $inputBorderDefault->setData( $this->entity->getSecure( 'border_default' ) );
      $inputBorderDefault->setLabel( $i18n->l( 'Border default', 'wbfsys.color_node.label' ) );

      $inputBorderDefault->refresh           = $this->refresh;
      $inputBorderDefault->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorNode_BorderDefault */

 /**
  * create the ui element for field bg_hover
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_BgHover( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputBgHover = $this->view->newInput( 'inputWbfsysColorNodeBgHover' , 'Colorpicker' );
      $this->items['wbfsys_color_node-bg_hover'] = $inputBgHover;
      $inputBgHover->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[bg_hover]',
          'id'        => 'wgt-input-wbfsys_color_node_bg_hover'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Bg hover', 'src' => 'Color Node' ) ),
          'maxlength' => $this->entity->maxSize( 'bg_hover' ),
        )
      );
      $inputBgHover->setWidth( 'medium' );

      $inputBgHover->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'bg_hover' ) );
      $inputBgHover->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'bg_hover' ) );
      $inputBgHover->setData( $this->entity->getSecure( 'bg_hover' ) );
      $inputBgHover->setLabel( $i18n->l( 'Bg hover', 'wbfsys.color_node.label' ) );

      $inputBgHover->refresh           = $this->refresh;
      $inputBgHover->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorNode_BgHover */

 /**
  * create the ui element for field font_hover
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_FontHover( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputFontHover = $this->view->newInput( 'inputWbfsysColorNodeFontHover' , 'Colorpicker' );
      $this->items['wbfsys_color_node-font_hover'] = $inputFontHover;
      $inputFontHover->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[font_hover]',
          'id'        => 'wgt-input-wbfsys_color_node_font_hover'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Font hover', 'src' => 'Color Node' ) ),
          'maxlength' => $this->entity->maxSize( 'font_hover' ),
        )
      );
      $inputFontHover->setWidth( 'medium' );

      $inputFontHover->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'font_hover' ) );
      $inputFontHover->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'font_hover' ) );
      $inputFontHover->setData( $this->entity->getSecure( 'font_hover' ) );
      $inputFontHover->setLabel( $i18n->l( 'Font hover', 'wbfsys.color_node.label' ) );

      $inputFontHover->refresh           = $this->refresh;
      $inputFontHover->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorNode_FontHover */

 /**
  * create the ui element for field border_hover
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_BorderHover( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputBorderHover = $this->view->newInput( 'inputWbfsysColorNodeBorderHover' , 'Colorpicker' );
      $this->items['wbfsys_color_node-border_hover'] = $inputBorderHover;
      $inputBorderHover->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[border_hover]',
          'id'        => 'wgt-input-wbfsys_color_node_border_hover'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Border hover', 'src' => 'Color Node' ) ),
          'maxlength' => $this->entity->maxSize( 'border_hover' ),
        )
      );
      $inputBorderHover->setWidth( 'medium' );

      $inputBorderHover->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'border_hover' ) );
      $inputBorderHover->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'border_hover' ) );
      $inputBorderHover->setData( $this->entity->getSecure( 'border_hover' ) );
      $inputBorderHover->setLabel( $i18n->l( 'Border hover', 'wbfsys.color_node.label' ) );

      $inputBorderHover->refresh           = $this->refresh;
      $inputBorderHover->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorNode_BorderHover */

 /**
  * create the ui element for field bg_active
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_BgActive( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputBgActive = $this->view->newInput( 'inputWbfsysColorNodeBgActive' , 'Colorpicker' );
      $this->items['wbfsys_color_node-bg_active'] = $inputBgActive;
      $inputBgActive->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[bg_active]',
          'id'        => 'wgt-input-wbfsys_color_node_bg_active'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Bg active', 'src' => 'Color Node' ) ),
          'maxlength' => $this->entity->maxSize( 'bg_active' ),
        )
      );
      $inputBgActive->setWidth( 'medium' );

      $inputBgActive->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'bg_active' ) );
      $inputBgActive->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'bg_active' ) );
      $inputBgActive->setData( $this->entity->getSecure( 'bg_active' ) );
      $inputBgActive->setLabel( $i18n->l( 'Bg active', 'wbfsys.color_node.label' ) );

      $inputBgActive->refresh           = $this->refresh;
      $inputBgActive->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorNode_BgActive */

 /**
  * create the ui element for field font_active
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_FontActive( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputFontActive = $this->view->newInput( 'inputWbfsysColorNodeFontActive' , 'Colorpicker' );
      $this->items['wbfsys_color_node-font_active'] = $inputFontActive;
      $inputFontActive->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[font_active]',
          'id'        => 'wgt-input-wbfsys_color_node_font_active'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Font active', 'src' => 'Color Node' ) ),
          'maxlength' => $this->entity->maxSize( 'font_active' ),
        )
      );
      $inputFontActive->setWidth( 'medium' );

      $inputFontActive->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'font_active' ) );
      $inputFontActive->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'font_active' ) );
      $inputFontActive->setData( $this->entity->getSecure( 'font_active' ) );
      $inputFontActive->setLabel( $i18n->l( 'Font active', 'wbfsys.color_node.label' ) );

      $inputFontActive->refresh           = $this->refresh;
      $inputFontActive->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorNode_FontActive */

 /**
  * create the ui element for field border_active
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_BorderActive( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputBorderActive = $this->view->newInput( 'inputWbfsysColorNodeBorderActive' , 'Colorpicker' );
      $this->items['wbfsys_color_node-border_active'] = $inputBorderActive;
      $inputBorderActive->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[border_active]',
          'id'        => 'wgt-input-wbfsys_color_node_border_active'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Border active', 'src' => 'Color Node' ) ),
          'maxlength' => $this->entity->maxSize( 'border_active' ),
        )
      );
      $inputBorderActive->setWidth( 'medium' );

      $inputBorderActive->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'border_active' ) );
      $inputBorderActive->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'border_active' ) );
      $inputBorderActive->setData( $this->entity->getSecure( 'border_active' ) );
      $inputBorderActive->setLabel( $i18n->l( 'Border active', 'wbfsys.color_node.label' ) );

      $inputBorderActive->refresh           = $this->refresh;
      $inputBorderActive->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorNode_BorderActive */

 /**
  * create the ui element for field bg_inactive
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_BgInactive( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputBgInactive = $this->view->newInput( 'inputWbfsysColorNodeBgInactive' , 'Colorpicker' );
      $this->items['wbfsys_color_node-bg_inactive'] = $inputBgInactive;
      $inputBgInactive->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[bg_inactive]',
          'id'        => 'wgt-input-wbfsys_color_node_bg_inactive'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Bg inactive', 'src' => 'Color Node' ) ),
          'maxlength' => $this->entity->maxSize( 'bg_inactive' ),
        )
      );
      $inputBgInactive->setWidth( 'medium' );

      $inputBgInactive->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'bg_inactive' ) );
      $inputBgInactive->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'bg_inactive' ) );
      $inputBgInactive->setData( $this->entity->getSecure( 'bg_inactive' ) );
      $inputBgInactive->setLabel( $i18n->l( 'Bg inactive', 'wbfsys.color_node.label' ) );

      $inputBgInactive->refresh           = $this->refresh;
      $inputBgInactive->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorNode_BgInactive */

 /**
  * create the ui element for field font_inactive
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_FontInactive( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputFontInactive = $this->view->newInput( 'inputWbfsysColorNodeFontInactive' , 'Colorpicker' );
      $this->items['wbfsys_color_node-font_inactive'] = $inputFontInactive;
      $inputFontInactive->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[font_inactive]',
          'id'        => 'wgt-input-wbfsys_color_node_font_inactive'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Font inactive', 'src' => 'Color Node' ) ),
          'maxlength' => $this->entity->maxSize( 'font_inactive' ),
        )
      );
      $inputFontInactive->setWidth( 'medium' );

      $inputFontInactive->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'font_inactive' ) );
      $inputFontInactive->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'font_inactive' ) );
      $inputFontInactive->setData( $this->entity->getSecure( 'font_inactive' ) );
      $inputFontInactive->setLabel( $i18n->l( 'Font inactive', 'wbfsys.color_node.label' ) );

      $inputFontInactive->refresh           = $this->refresh;
      $inputFontInactive->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorNode_FontInactive */

 /**
  * create the ui element for field border_inactive
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_BorderInactive( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputBorderInactive = $this->view->newInput( 'inputWbfsysColorNodeBorderInactive' , 'Colorpicker' );
      $this->items['wbfsys_color_node-border_inactive'] = $inputBorderInactive;
      $inputBorderInactive->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[border_inactive]',
          'id'        => 'wgt-input-wbfsys_color_node_border_inactive'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Border inactive', 'src' => 'Color Node' ) ),
          'maxlength' => $this->entity->maxSize( 'border_inactive' ),
        )
      );
      $inputBorderInactive->setWidth( 'medium' );

      $inputBorderInactive->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'border_inactive' ) );
      $inputBorderInactive->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'border_inactive' ) );
      $inputBorderInactive->setData( $this->entity->getSecure( 'border_inactive' ) );
      $inputBorderInactive->setLabel( $i18n->l( 'Border inactive', 'wbfsys.color_node.label' ) );

      $inputBorderInactive->refresh           = $this->refresh;
      $inputBorderInactive->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysColorNode_BorderInactive */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysColorNodeDescription', 'Textarea' );
      $this->items['wbfsys_color_node-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_color_node[description]',
          'id'    => 'wgt-input-wbfsys_color_node_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Color Node' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.color_node.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysColorNode_Description */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysColorNodeRowid' , 'int' );
      $this->items['wbfsys_color_node-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[rowid]',
          'id'        => 'wgt-input-wbfsys_color_node_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Color Node' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.color_node.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysColorNode_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysColorNodeMTimeCreated' , 'Date' );
      $this->items['wbfsys_color_node-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[m_time_created]',
          'id'        => 'wgt-input-wbfsys_color_node_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Color Node' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.color_node.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysColorNode_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysColorNodeMRoleCreate', 'Window' );
      $this->items['wbfsys_color_node-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_color_node[m_role_create]',
        'id'        => 'wgt-input-wbfsys_color_node_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Color Node' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.color_node.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_color_node_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_color_node_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysColorNode_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysColorNodeMTimeChanged' , 'Date' );
      $this->items['wbfsys_color_node-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_color_node_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Color Node' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.color_node.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysColorNode_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysColorNodeMRoleChange', 'Window' );
      $this->items['wbfsys_color_node-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_color_node[m_role_change]',
        'id'        => 'wgt-input-wbfsys_color_node_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Color Node' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.color_node.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_color_node_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_color_node_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysColorNode_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysColorNodeMVersion' , 'int' );
      $this->items['wbfsys_color_node-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[m_version]',
          'id'        => 'wgt-input-wbfsys_color_node_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Color Node' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.color_node.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysColorNode_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysColorNode_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysColorNodeMUuid' , 'Text' );
      $this->items['wbfsys_color_node-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_color_node[m_uuid]',
          'id'        => 'wgt-input-wbfsys_color_node_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Color Node' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_color_node', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_color_node', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.color_node.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysColorNode_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * Wenn die Formularmaske per POST Request aufgerufen wird können default
   * Parameter mitübergeben werden
   *
   * @param LibRequestHttp $request 
   * @throws Wgt_Exception
   */
  public function fetchDefaultData( $request )
  {
    
    // prüfen ob alle nötigen objekte vorhanden sind
    if( !$this->entity )
    {
      throw new Wgt_Exception
      ( 
        "To call fetchDefaultData in a CrudFrom an entity object is required!" 
       );
    }
    
    // laden aller nötigen system resourcen
    $orm      = $this->getOrm();
    $response = $this->getResponse();
    
    // extrahieren der Daten für die Hauptentity
    $filter = $request->checkFormInput
    (
      $orm->getValidationData( 'WbfsysColorNode', array_keys( $this->fields['wbfsys_color_node']), true ),
      $orm->getErrorMessages( 'WbfsysColorNode' ),
      'wbfsys_color_node'
    );
    
    $tmp  = $filter->getData();
    $data = array();
    
    // es werden nur daten gesetzt die tatsächlich übergeben wurden, sonst
    // würden default werte in den entities überschrieben werden
    foreach( $tmp as $key => $value   )
    {
      if( !is_null( $value ) )
        $data[$key] = $value;
    }

    $this->entity->addData( $data );


  }//end public function fetchDefaultData */

  /**
   * Wenn die Formularmaske per POST Request aufgerufen wird können default
   * Parameter mitübergeben werden
   *
   * @param LibRequestHttp $request 
   * @throws Wgt_Exception
   */
  public function setDefaultData( )
  {
    
    // prüfen ob alle nötigen objekte vorhanden sind
    if( !$this->entity )
    {
      throw new Wgt_Exception
      ( 
        "To call fetchDefaultData in a CrudFrom an entity object is required!" 
       );
    }
    
    // laden aller nötigen system resourcen
    $orm      = $this->getOrm();
    $response = $this->getResponse();



  }//end public function setDefaultData */


}//end class WbfsysColorNode_Crud_Create_Form */


