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
class WbfsysThemeIcon_Crud_Show_Form
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
  public $namespace  = 'WbfsysThemeIcon';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysThemeIcon';

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
      'wbfsys_theme_icon' => array
      (
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
        'path' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '400',
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
   * @var WbfsysThemeIcon_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysThemeIcon_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysThemeIcon_Entity $entity
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
      'wbfsys_theme_icon' => array
      (
        'name',
        'access_key',
        'path',
        'description',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysThemeIcon entity
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
    $this->view->addVar( 'entityWbfsysThemeIcon', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_theme_icon'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_theme_icon[id_wbfsys_theme_icon-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysThemeIcon_Name( $params );
    $this->input_WbfsysThemeIcon_AccessKey( $params );
    $this->input_WbfsysThemeIcon_Path( $params );
    $this->input_WbfsysThemeIcon_Description( $params );
    $this->input_WbfsysThemeIcon_Rowid( $params );
    $this->input_WbfsysThemeIcon_MTimeCreated( $params );
    $this->input_WbfsysThemeIcon_MRoleCreate( $params );
    $this->input_WbfsysThemeIcon_MTimeChanged( $params );
    $this->input_WbfsysThemeIcon_MRoleChange( $params );
    $this->input_WbfsysThemeIcon_MVersion( $params );
    $this->input_WbfsysThemeIcon_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysThemeIcon_Name( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputName = $this->view->newInput( 'inputWbfsysThemeIconName' , 'Text' );
      $this->items['wbfsys_theme_icon-name'] = $inputName;
      $inputName->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_theme_icon[name]',
          'id'        => 'wgt-input-wbfsys_theme_icon_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Name', 'src' => 'Theme Icon' ) ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadonly( $this->fieldReadOnly( 'wbfsys_theme_icon', 'name' ) );
      $inputName->setRequired( $this->fieldRequired( 'wbfsys_theme_icon', 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel( $i18n->l( 'Name', 'wbfsys.theme_icon.label' ) );

      $inputName->refresh           = $this->refresh;
      $inputName->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysThemeIcon_Name */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysThemeIcon_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysThemeIconAccessKey' , 'Text' );
      $this->items['wbfsys_theme_icon-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_theme_icon[access_key]',
          'id'        => 'wgt-input-wbfsys_theme_icon_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Theme Icon' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_theme_icon', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_theme_icon', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.theme_icon.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysThemeIcon_AccessKey */

 /**
  * create the ui element for field path
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysThemeIcon_Path( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputPath = $this->view->newInput( 'inputWbfsysThemeIconPath' , 'Text' );
      $this->items['wbfsys_theme_icon-path'] = $inputPath;
      $inputPath->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_theme_icon[path]',
          'id'        => 'wgt-input-wbfsys_theme_icon_path'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Path', 'src' => 'Theme Icon' ) ),
          'maxlength' => $this->entity->maxSize( 'path' ),
        )
      );
      $inputPath->setWidth( 'medium' );

      $inputPath->setReadonly( $this->fieldReadOnly( 'wbfsys_theme_icon', 'path' ) );
      $inputPath->setRequired( $this->fieldRequired( 'wbfsys_theme_icon', 'path' ) );
      $inputPath->setData( $this->entity->getSecure('path') );
      $inputPath->setLabel( $i18n->l( 'Path', 'wbfsys.theme_icon.label' ) );

      $inputPath->refresh           = $this->refresh;
      $inputPath->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysThemeIcon_Path */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysThemeIcon_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysThemeIconDescription', 'Textarea' );
      $this->items['wbfsys_theme_icon-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_theme_icon[description]',
          'id'    => 'wgt-input-wbfsys_theme_icon_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Theme Icon' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_theme_icon', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_theme_icon', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.theme_icon.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysThemeIcon_Description */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysThemeIcon_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysThemeIconRowid' , 'int' );
      $this->items['wbfsys_theme_icon-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_theme_icon[rowid]',
          'id'        => 'wgt-input-wbfsys_theme_icon_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Theme Icon' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_theme_icon', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_theme_icon', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.theme_icon.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysThemeIcon_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysThemeIcon_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysThemeIconMTimeCreated' , 'Date' );
      $this->items['wbfsys_theme_icon-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_theme_icon[m_time_created]',
          'id'        => 'wgt-input-wbfsys_theme_icon_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Theme Icon' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_theme_icon', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_theme_icon', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.theme_icon.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysThemeIcon_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysThemeIcon_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysThemeIconMRoleCreate', 'Window' );
      $this->items['wbfsys_theme_icon-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_theme_icon[m_role_create]',
        'id'        => 'wgt-input-wbfsys_theme_icon_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Theme Icon' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_theme_icon', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_theme_icon', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.theme_icon.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_theme_icon_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_theme_icon_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysThemeIcon_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysThemeIcon_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysThemeIconMTimeChanged' , 'Date' );
      $this->items['wbfsys_theme_icon-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_theme_icon[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_theme_icon_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Theme Icon' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_theme_icon', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_theme_icon', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.theme_icon.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysThemeIcon_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysThemeIcon_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysThemeIconMRoleChange', 'Window' );
      $this->items['wbfsys_theme_icon-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_theme_icon[m_role_change]',
        'id'        => 'wgt-input-wbfsys_theme_icon_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Theme Icon' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_theme_icon', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_theme_icon', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.theme_icon.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_theme_icon_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_theme_icon_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysThemeIcon_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysThemeIcon_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysThemeIconMVersion' , 'int' );
      $this->items['wbfsys_theme_icon-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_theme_icon[m_version]',
          'id'        => 'wgt-input-wbfsys_theme_icon_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Theme Icon' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_theme_icon', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_theme_icon', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.theme_icon.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysThemeIcon_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysThemeIcon_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysThemeIconMUuid' , 'Text' );
      $this->items['wbfsys_theme_icon-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_theme_icon[m_uuid]',
          'id'        => 'wgt-input-wbfsys_theme_icon_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Theme Icon' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_theme_icon', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_theme_icon', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.theme_icon.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysThemeIcon_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysThemeIcon_Crud_Show_Form */


