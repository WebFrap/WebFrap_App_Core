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
class WbfsysMaskListSettings_Crud_Show_Form
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
  public $namespace  = 'WbfsysMaskListSettings';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysMaskListSettings';

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
      'wbfsys_mask_list_settings' => array
      (
        'title' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'access_key' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'id_mask' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'col_settings' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'filter_settings' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'description' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'revision' => array
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
   * @var WbfsysMaskListSettings_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysMaskListSettings_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysMaskListSettings_Entity $entity
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
      'wbfsys_mask_list_settings' => array
      (
        'title',
        'access_key',
        'id_mask',
        'col_settings',
        'filter_settings',
        'description',
        'revision',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysMaskListSettings entity
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
    $this->view->addVar( 'entityWbfsysMaskListSettings', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_mask_list_settings'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_mask_list_settings[id_wbfsys_mask_list_settings-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysMaskListSettings_Title( $params );
    $this->input_WbfsysMaskListSettings_AccessKey( $params );
    $this->input_WbfsysMaskListSettings_IdMask( $params );
    $this->input_WbfsysMaskListSettings_ColSettings( $params );
    $this->input_WbfsysMaskListSettings_FilterSettings( $params );
    $this->input_WbfsysMaskListSettings_Description( $params );
    $this->input_WbfsysMaskListSettings_Revision( $params );
    $this->input_WbfsysMaskListSettings_Rowid( $params );
    $this->input_WbfsysMaskListSettings_MTimeCreated( $params );
    $this->input_WbfsysMaskListSettings_MRoleCreate( $params );
    $this->input_WbfsysMaskListSettings_MTimeChanged( $params );
    $this->input_WbfsysMaskListSettings_MRoleChange( $params );
    $this->input_WbfsysMaskListSettings_MVersion( $params );
    $this->input_WbfsysMaskListSettings_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field title
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMaskListSettings_Title( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputTitle = $this->view->newInput( 'inputWbfsysMaskListSettingsTitle' , 'Text' );
      $this->items['wbfsys_mask_list_settings-title'] = $inputTitle;
      $inputTitle->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask_list_settings[title]',
          'id'        => 'wgt-input-wbfsys_mask_list_settings_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required xxlarge'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Title', 'src' => 'Mask List Settings' ) ),
          'maxlength' => $this->entity->maxSize( 'title' ),
        )
      );
      $inputTitle->setWidth( 'xxlarge' );

      $inputTitle->setReadonly( $this->fieldReadOnly( 'wbfsys_mask_list_settings', 'title' ) );
      $inputTitle->setRequired( $this->fieldRequired( 'wbfsys_mask_list_settings', 'title' ) );
      $inputTitle->setData( $this->entity->getSecure('title') );
      $inputTitle->setLabel( $i18n->l( 'Title', 'wbfsys.mask_list_settings.label' ) );

      $inputTitle->refresh           = $this->refresh;
      $inputTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMaskListSettings_Title */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMaskListSettings_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysMaskListSettingsAccessKey' , 'Text' );
      $this->items['wbfsys_mask_list_settings-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask_list_settings[access_key]',
          'id'        => 'wgt-input-wbfsys_mask_list_settings_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Mask List Settings' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_mask_list_settings', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_mask_list_settings', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.mask_list_settings.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMaskListSettings_AccessKey */

 /**
  * create the ui element for field id_mask
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMaskListSettings_IdMask( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysMask_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysMask not exists' );

      Log::warn( 'Looks like the Entity: WbfsysMask is missing' );

      return;
    }


      //p: Window
      $objidWbfsysMask = $this->entity->getData( 'id_mask' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysMask
          || !$entityWbfsysMask = $this->db->orm->get
          (
            'WbfsysMask',
            $objidWbfsysMask
          )
      )
      {
        $entityWbfsysMask = $this->db->orm->newEntity( 'WbfsysMask' );
      }

      $inputIdMask = $this->view->newInput( 'inputWbfsysMaskListSettingsIdMask', 'Window' );
      $this->items['wbfsys_mask_list_settings-id_mask'] = $inputIdMask;
      $inputIdMask->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_mask_list_settings[id_mask]',
        'id'        => 'wgt-input-wbfsys_mask_list_settings_id_mask'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Mask', 'src' => 'Mask List Settings' ) ),
      ));

      if( $this->assignedForm )
        $inputIdMask->assignedForm = $this->assignedForm;

      $inputIdMask->setWidth( 'medium' );

      $inputIdMask->setData( $this->entity->getData( 'id_mask' )  );
      $inputIdMask->setReadonly( $this->fieldReadOnly( 'wbfsys_mask_list_settings', 'id_mask' ) );
      $inputIdMask->setRequired( $this->fieldRequired( 'wbfsys_mask_list_settings', 'id_mask' ) );
      $inputIdMask->setLabel( $i18n->l( 'Mask', 'wbfsys.mask_list_settings.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Mask.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_mask_list_settings_id_mask'.($this->suffix?'-'.$this->suffix:'');

      $inputIdMask->setListUrl ( $listUrl );
      $inputIdMask->setListIcon( 'control/connect.png' );
      $inputIdMask->setEntityUrl( 'maintab.php?c=Wbfsys.Mask.edit' );
      $inputIdMask->conEntity         = $entityWbfsysMask;
      $inputIdMask->refresh           = $this->refresh;
      $inputIdMask->serializeElement  = $this->sendElement;


        $inputIdMask->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.Mask.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdMask->view = $this->view;
      $inputIdMask->buildJavascript( 'wgt-input-wbfsys_mask_list_settings_id_mask'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdMask );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMaskListSettings_IdMask */

 /**
  * create the ui element for field col_settings
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMaskListSettings_ColSettings( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputColSettings = $this->view->newInput( 'inputWbfsysMaskListSettingsColSettings', 'Textarea' );
      $this->items['wbfsys_mask_list_settings-col_settings'] = $inputColSettings;
      $inputColSettings->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_mask_list_settings[col_settings]',
          'id'    => 'wgt-input-wbfsys_mask_list_settings_col_settings'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip large medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Col Settings', 'src' => 'Mask List Settings' ) ),
        )
      );
      $inputColSettings->setWidth( 'large' );


      $inputColSettings->setReadonly( $this->fieldReadOnly( 'wbfsys_mask_list_settings', 'col_settings' ) );
      $inputColSettings->setRequired( $this->fieldRequired( 'wbfsys_mask_list_settings', 'col_settings' ) );

      $inputColSettings->setData( $this->entity->getSecure( 'col_settings' ) );
      $inputColSettings->setLabel( $i18n->l( 'Col Settings', 'wbfsys.mask_list_settings.label' ) );

      $inputColSettings->refresh           = $this->refresh;
      $inputColSettings->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMaskListSettings_ColSettings */

 /**
  * create the ui element for field filter_settings
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMaskListSettings_FilterSettings( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputFilterSettings = $this->view->newInput( 'inputWbfsysMaskListSettingsFilterSettings', 'Textarea' );
      $this->items['wbfsys_mask_list_settings-filter_settings'] = $inputFilterSettings;
      $inputFilterSettings->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_mask_list_settings[filter_settings]',
          'id'    => 'wgt-input-wbfsys_mask_list_settings_filter_settings'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip large medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Filter Settings', 'src' => 'Mask List Settings' ) ),
        )
      );
      $inputFilterSettings->setWidth( 'large' );


      $inputFilterSettings->setReadonly( $this->fieldReadOnly( 'wbfsys_mask_list_settings', 'filter_settings' ) );
      $inputFilterSettings->setRequired( $this->fieldRequired( 'wbfsys_mask_list_settings', 'filter_settings' ) );

      $inputFilterSettings->setData( $this->entity->getSecure( 'filter_settings' ) );
      $inputFilterSettings->setLabel( $i18n->l( 'Filter Settings', 'wbfsys.mask_list_settings.label' ) );

      $inputFilterSettings->refresh           = $this->refresh;
      $inputFilterSettings->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMaskListSettings_FilterSettings */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMaskListSettings_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysMaskListSettingsDescription', 'Textarea' );
      $this->items['wbfsys_mask_list_settings-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_mask_list_settings[description]',
          'id'    => 'wgt-input-wbfsys_mask_list_settings_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Mask List Settings' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_mask_list_settings', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_mask_list_settings', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.mask_list_settings.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysMaskListSettings_Description */

 /**
  * create the ui element for field revision
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMaskListSettings_Revision( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputRevision = $this->view->newInput( 'inputWbfsysMaskListSettingsRevision', 'Int' );
      $this->items['wbfsys_mask_list_settings-revision'] = $inputRevision;
      $inputRevision->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask_list_settings[revision]',
          'id'        => 'wgt-input-wbfsys_mask_list_settings_revision'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Revision', 'src' => 'Mask List Settings' ) ),
        )
      );
      $inputRevision->setWidth( 'medium' );

$inputRevision->setReadOnly( $this->fieldReadOnly( 'wbfsys_mask_list_settings', 'revision' ) );
      $inputRevision->setRequired( $this->fieldRequired( 'wbfsys_mask_list_settings', 'revision' ) );
      $inputRevision->setData( $this->entity->getData( 'revision' ) );
      $inputRevision->setLabel( $i18n->l( 'Revision', 'wbfsys.mask_list_settings.label' ) );

      $inputRevision->refresh           = $this->refresh;
      $inputRevision->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMaskListSettings_Revision */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMaskListSettings_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysMaskListSettingsRowid' , 'int' );
      $this->items['wbfsys_mask_list_settings-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask_list_settings[rowid]',
          'id'        => 'wgt-input-wbfsys_mask_list_settings_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Mask List Settings' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_mask_list_settings', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_mask_list_settings', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.mask_list_settings.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMaskListSettings_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMaskListSettings_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysMaskListSettingsMTimeCreated' , 'Date' );
      $this->items['wbfsys_mask_list_settings-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask_list_settings[m_time_created]',
          'id'        => 'wgt-input-wbfsys_mask_list_settings_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Mask List Settings' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_mask_list_settings', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_mask_list_settings', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.mask_list_settings.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysMaskListSettings_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMaskListSettings_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysMaskListSettingsMRoleCreate', 'Window' );
      $this->items['wbfsys_mask_list_settings-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_mask_list_settings[m_role_create]',
        'id'        => 'wgt-input-wbfsys_mask_list_settings_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Mask List Settings' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_mask_list_settings', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_mask_list_settings', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.mask_list_settings.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_mask_list_settings_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_mask_list_settings_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysMaskListSettings_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMaskListSettings_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysMaskListSettingsMTimeChanged' , 'Date' );
      $this->items['wbfsys_mask_list_settings-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask_list_settings[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_mask_list_settings_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Mask List Settings' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_mask_list_settings', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_mask_list_settings', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.mask_list_settings.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysMaskListSettings_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMaskListSettings_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysMaskListSettingsMRoleChange', 'Window' );
      $this->items['wbfsys_mask_list_settings-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_mask_list_settings[m_role_change]',
        'id'        => 'wgt-input-wbfsys_mask_list_settings_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Mask List Settings' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_mask_list_settings', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_mask_list_settings', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.mask_list_settings.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_mask_list_settings_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_mask_list_settings_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysMaskListSettings_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMaskListSettings_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysMaskListSettingsMVersion' , 'int' );
      $this->items['wbfsys_mask_list_settings-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask_list_settings[m_version]',
          'id'        => 'wgt-input-wbfsys_mask_list_settings_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Mask List Settings' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_mask_list_settings', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_mask_list_settings', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.mask_list_settings.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMaskListSettings_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMaskListSettings_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysMaskListSettingsMUuid' , 'Text' );
      $this->items['wbfsys_mask_list_settings-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask_list_settings[m_uuid]',
          'id'        => 'wgt-input-wbfsys_mask_list_settings_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Mask List Settings' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_mask_list_settings', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_mask_list_settings', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.mask_list_settings.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMaskListSettings_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysMaskListSettings_Crud_Show_Form */


