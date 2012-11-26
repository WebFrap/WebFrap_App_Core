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
class WbfsysEntity_Crud_Show_Form
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
  public $namespace  = 'WbfsysEntity';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysEntity';

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
      'wbfsys_entity' => array
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
        'flag_index' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'default_create' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'default_edit' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'default_show' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'default_list' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'default_selection' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'relevance' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '10',
        ),
        'id_module' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_security_area' => array
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
   * @var WbfsysEntity_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysEntity_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysEntity_Entity $entity
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
      'wbfsys_entity' => array
      (
        'name',
        'access_key',
        'flag_index',
        'default_create',
        'default_edit',
        'default_show',
        'default_list',
        'default_selection',
        'relevance',
        'id_module',
        'id_security_area',
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
  * create an IO form for the WbfsysEntity entity
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
    $this->view->addVar( 'entityWbfsysEntity', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_entity'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_entity[id_wbfsys_entity-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysEntity_Name( $params );
    $this->input_WbfsysEntity_AccessKey( $params );
    $this->input_WbfsysEntity_FlagIndex( $params );
    $this->input_WbfsysEntity_DefaultCreate( $params );
    $this->input_WbfsysEntity_DefaultEdit( $params );
    $this->input_WbfsysEntity_DefaultShow( $params );
    $this->input_WbfsysEntity_DefaultList( $params );
    $this->input_WbfsysEntity_DefaultSelection( $params );
    $this->input_WbfsysEntity_Relevance( $params );
    $this->input_WbfsysEntity_IdModule( $params );
    $this->input_WbfsysEntity_IdSecurityArea( $params );
    $this->input_WbfsysEntity_Description( $params );
    $this->input_WbfsysEntity_Revision( $params );
    $this->input_WbfsysEntity_Rowid( $params );
    $this->input_WbfsysEntity_MTimeCreated( $params );
    $this->input_WbfsysEntity_MRoleCreate( $params );
    $this->input_WbfsysEntity_MTimeChanged( $params );
    $this->input_WbfsysEntity_MRoleChange( $params );
    $this->input_WbfsysEntity_MVersion( $params );
    $this->input_WbfsysEntity_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_Name( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputName = $this->view->newInput( 'inputWbfsysEntityName' , 'Text' );
      $this->items['wbfsys_entity-name'] = $inputName;
      $inputName->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity[name]',
          'id'        => 'wgt-input-wbfsys_entity_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Name', 'src' => 'Entity' ) ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'name' ) );
      $inputName->setRequired( $this->fieldRequired( 'wbfsys_entity', 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel( $i18n->l( 'Name', 'wbfsys.entity.label' ) );

      $inputName->refresh           = $this->refresh;
      $inputName->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysEntity_Name */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysEntityAccessKey' , 'Text' );
      $this->items['wbfsys_entity-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity[access_key]',
          'id'        => 'wgt-input-wbfsys_entity_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Entity' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_entity', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.entity.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysEntity_AccessKey */

 /**
  * create the ui element for field flag_index
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_FlagIndex( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputFlagIndex = $this->view->newInput( 'inputWbfsysEntityFlagIndex', 'Checkbox' );
      $this->items['wbfsys_entity-flag_index'] = $inputFlagIndex;
      $inputFlagIndex->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity[flag_index]',
          'id'        => 'wgt-input-wbfsys_entity_flag_index'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Index', 'src' => 'Entity' ) ),
        )
      );
      $inputFlagIndex->setWidth( 'medium' );

      $inputFlagIndex->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'flag_index' ) );
      $inputFlagIndex->setRequired( $this->fieldRequired( 'wbfsys_entity', 'flag_index' ) );
      $inputFlagIndex->setActive( $this->entity->getBoolean( 'flag_index' ) );
      $inputFlagIndex->setLabel( $i18n->l( 'Index', 'wbfsys.entity.label' ) );

      $inputFlagIndex->refresh           = $this->refresh;
      $inputFlagIndex->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysEntity_FlagIndex */

 /**
  * create the ui element for field default_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_DefaultCreate( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputDefaultCreate = $this->view->newInput( 'inputWbfsysEntityDefaultCreate' , 'text' );
      $this->items['wbfsys_entity-default_create'] = $inputDefaultCreate;
      $inputDefaultCreate->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity[default_create]',
          'id'        => 'wgt-input-wbfsys_entity_default_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required wcm_valid_url medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'default create', 'src' => 'Entity' ) ),
        )
      );
      $inputDefaultCreate->setWidth( 'medium' );

      $inputDefaultCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'default_create' ) );
      $inputDefaultCreate->setRequired( $this->fieldRequired( 'wbfsys_entity', 'default_create' ) );
      $inputDefaultCreate->setData( $this->entity->getSecure( 'default_create' ) );
      $inputDefaultCreate->setLabel( $i18n->l( 'default create', 'wbfsys.entity.label' ) );

      $inputDefaultCreate->refresh           = $this->refresh;
      $inputDefaultCreate->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_WbfsysEntity_DefaultCreate */

 /**
  * create the ui element for field default_edit
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_DefaultEdit( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputDefaultEdit = $this->view->newInput( 'inputWbfsysEntityDefaultEdit' , 'text' );
      $this->items['wbfsys_entity-default_edit'] = $inputDefaultEdit;
      $inputDefaultEdit->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity[default_edit]',
          'id'        => 'wgt-input-wbfsys_entity_default_edit'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required wcm_valid_url medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'default edit', 'src' => 'Entity' ) ),
        )
      );
      $inputDefaultEdit->setWidth( 'medium' );

      $inputDefaultEdit->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'default_edit' ) );
      $inputDefaultEdit->setRequired( $this->fieldRequired( 'wbfsys_entity', 'default_edit' ) );
      $inputDefaultEdit->setData( $this->entity->getSecure( 'default_edit' ) );
      $inputDefaultEdit->setLabel( $i18n->l( 'default edit', 'wbfsys.entity.label' ) );

      $inputDefaultEdit->refresh           = $this->refresh;
      $inputDefaultEdit->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_WbfsysEntity_DefaultEdit */

 /**
  * create the ui element for field default_show
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_DefaultShow( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputDefaultShow = $this->view->newInput( 'inputWbfsysEntityDefaultShow' , 'text' );
      $this->items['wbfsys_entity-default_show'] = $inputDefaultShow;
      $inputDefaultShow->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity[default_show]',
          'id'        => 'wgt-input-wbfsys_entity_default_show'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required wcm_valid_url medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'default show', 'src' => 'Entity' ) ),
        )
      );
      $inputDefaultShow->setWidth( 'medium' );

      $inputDefaultShow->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'default_show' ) );
      $inputDefaultShow->setRequired( $this->fieldRequired( 'wbfsys_entity', 'default_show' ) );
      $inputDefaultShow->setData( $this->entity->getSecure( 'default_show' ) );
      $inputDefaultShow->setLabel( $i18n->l( 'default show', 'wbfsys.entity.label' ) );

      $inputDefaultShow->refresh           = $this->refresh;
      $inputDefaultShow->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_WbfsysEntity_DefaultShow */

 /**
  * create the ui element for field default_list
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_DefaultList( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputDefaultList = $this->view->newInput( 'inputWbfsysEntityDefaultList' , 'text' );
      $this->items['wbfsys_entity-default_list'] = $inputDefaultList;
      $inputDefaultList->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity[default_list]',
          'id'        => 'wgt-input-wbfsys_entity_default_list'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required wcm_valid_url medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'default list', 'src' => 'Entity' ) ),
        )
      );
      $inputDefaultList->setWidth( 'medium' );

      $inputDefaultList->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'default_list' ) );
      $inputDefaultList->setRequired( $this->fieldRequired( 'wbfsys_entity', 'default_list' ) );
      $inputDefaultList->setData( $this->entity->getSecure( 'default_list' ) );
      $inputDefaultList->setLabel( $i18n->l( 'default list', 'wbfsys.entity.label' ) );

      $inputDefaultList->refresh           = $this->refresh;
      $inputDefaultList->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_WbfsysEntity_DefaultList */

 /**
  * create the ui element for field default_selection
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_DefaultSelection( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputDefaultSelection = $this->view->newInput( 'inputWbfsysEntityDefaultSelection' , 'text' );
      $this->items['wbfsys_entity-default_selection'] = $inputDefaultSelection;
      $inputDefaultSelection->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity[default_selection]',
          'id'        => 'wgt-input-wbfsys_entity_default_selection'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required wcm_valid_url medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'default selection', 'src' => 'Entity' ) ),
        )
      );
      $inputDefaultSelection->setWidth( 'medium' );

      $inputDefaultSelection->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'default_selection' ) );
      $inputDefaultSelection->setRequired( $this->fieldRequired( 'wbfsys_entity', 'default_selection' ) );
      $inputDefaultSelection->setData( $this->entity->getSecure( 'default_selection' ) );
      $inputDefaultSelection->setLabel( $i18n->l( 'default selection', 'wbfsys.entity.label' ) );

      $inputDefaultSelection->refresh           = $this->refresh;
      $inputDefaultSelection->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_WbfsysEntity_DefaultSelection */

 /**
  * create the ui element for field relevance
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_Relevance( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputRelevance = $this->view->newInput( 'inputWbfsysEntityRelevance' , 'Text' );
      $this->items['wbfsys_entity-relevance'] = $inputRelevance;
      $inputRelevance->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity[relevance]',
          'id'        => 'wgt-input-wbfsys_entity_relevance'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Relevance', 'src' => 'Entity' ) ),
          'maxlength' => $this->entity->maxSize( 'relevance' ),
        )
      );
      $inputRelevance->setWidth( 'medium' );

      $inputRelevance->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'relevance' ) );
      $inputRelevance->setRequired( $this->fieldRequired( 'wbfsys_entity', 'relevance' ) );
      $inputRelevance->setData( $this->entity->getSecure('relevance') );
      $inputRelevance->setLabel( $i18n->l( 'Relevance', 'wbfsys.entity.label' ) );

      $inputRelevance->refresh           = $this->refresh;
      $inputRelevance->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysEntity_Relevance */

 /**
  * create the ui element for field id_module
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_IdModule( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysModule_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysModule not exists' );

      Log::warn( 'Looks like the Entity: WbfsysModule is missing' );

      return;
    }


      //p: Window
      $objidWbfsysModule = $this->entity->getData( 'id_module' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysModule
          || !$entityWbfsysModule = $this->db->orm->get
          (
            'WbfsysModule',
            $objidWbfsysModule
          )
      )
      {
        $entityWbfsysModule = $this->db->orm->newEntity( 'WbfsysModule' );
      }

      $inputIdModule = $this->view->newInput( 'inputWbfsysEntityIdModule', 'Window' );
      $this->items['wbfsys_entity-id_module'] = $inputIdModule;
      $inputIdModule->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_entity[id_module]',
        'id'        => 'wgt-input-wbfsys_entity_id_module'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Module', 'src' => 'Entity' ) ),
      ));

      if( $this->assignedForm )
        $inputIdModule->assignedForm = $this->assignedForm;

      $inputIdModule->setWidth( 'medium' );

      $inputIdModule->setData( $this->entity->getData( 'id_module' )  );
      $inputIdModule->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'id_module' ) );
      $inputIdModule->setRequired( $this->fieldRequired( 'wbfsys_entity', 'id_module' ) );
      $inputIdModule->setLabel( $i18n->l( 'Module', 'wbfsys.entity.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Module.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_entity_id_module'.($this->suffix?'-'.$this->suffix:'');

      $inputIdModule->setListUrl ( $listUrl );
      $inputIdModule->setListIcon( 'control/connect.png' );
      $inputIdModule->setEntityUrl( 'maintab.php?c=Wbfsys.Module.edit' );
      $inputIdModule->conEntity         = $entityWbfsysModule;
      $inputIdModule->refresh           = $this->refresh;
      $inputIdModule->serializeElement  = $this->sendElement;



      $inputIdModule->view = $this->view;
      $inputIdModule->buildJavascript( 'wgt-input-wbfsys_entity_id_module'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdModule );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysEntity_IdModule */

 /**
  * create the ui element for field id_security_area
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_IdSecurityArea( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysSecurityArea_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysSecurityArea not exists' );

      Log::warn( 'Looks like the Entity: WbfsysSecurityArea is missing' );

      return;
    }


      //p: Window
      $objidWbfsysSecurityArea = $this->entity->getData( 'id_security_area' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysSecurityArea
          || !$entityWbfsysSecurityArea = $this->db->orm->get
          (
            'WbfsysSecurityArea',
            $objidWbfsysSecurityArea
          )
      )
      {
        $entityWbfsysSecurityArea = $this->db->orm->newEntity( 'WbfsysSecurityArea' );
      }

      $inputIdSecurityArea = $this->view->newInput( 'inputWbfsysEntityIdSecurityArea', 'Window' );
      $this->items['wbfsys_entity-id_security_area'] = $inputIdSecurityArea;
      $inputIdSecurityArea->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_entity[id_security_area]',
        'id'        => 'wgt-input-wbfsys_entity_id_security_area'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Security Area', 'src' => 'Entity' ) ),
      ));

      if( $this->assignedForm )
        $inputIdSecurityArea->assignedForm = $this->assignedForm;

      $inputIdSecurityArea->setWidth( 'medium' );

      $inputIdSecurityArea->setData( $this->entity->getData( 'id_security_area' )  );
      $inputIdSecurityArea->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'id_security_area' ) );
      $inputIdSecurityArea->setRequired( $this->fieldRequired( 'wbfsys_entity', 'id_security_area' ) );
      $inputIdSecurityArea->setLabel( $i18n->l( 'Security Area', 'wbfsys.entity.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.SecurityArea.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_entity_id_security_area'.($this->suffix?'-'.$this->suffix:'');

      $inputIdSecurityArea->setListUrl ( $listUrl );
      $inputIdSecurityArea->setListIcon( 'control/connect.png' );
      $inputIdSecurityArea->setEntityUrl( 'maintab.php?c=Wbfsys.SecurityArea.edit' );
      $inputIdSecurityArea->conEntity         = $entityWbfsysSecurityArea;
      $inputIdSecurityArea->refresh           = $this->refresh;
      $inputIdSecurityArea->serializeElement  = $this->sendElement;


        $inputIdSecurityArea->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.SecurityArea.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdSecurityArea->view = $this->view;
      $inputIdSecurityArea->buildJavascript( 'wgt-input-wbfsys_entity_id_security_area'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdSecurityArea );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysEntity_IdSecurityArea */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysEntityDescription', 'Textarea' );
      $this->items['wbfsys_entity-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_entity[description]',
          'id'    => 'wgt-input-wbfsys_entity_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Entity' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_entity', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.entity.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysEntity_Description */

 /**
  * create the ui element for field revision
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_Revision( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputRevision = $this->view->newInput( 'inputWbfsysEntityRevision', 'Int' );
      $this->items['wbfsys_entity-revision'] = $inputRevision;
      $inputRevision->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity[revision]',
          'id'        => 'wgt-input-wbfsys_entity_revision'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Revision', 'src' => 'Entity' ) ),
        )
      );
      $inputRevision->setWidth( 'medium' );

$inputRevision->setReadOnly( $this->fieldReadOnly( 'wbfsys_entity', 'revision' ) );
      $inputRevision->setRequired( $this->fieldRequired( 'wbfsys_entity', 'revision' ) );
      $inputRevision->setData( $this->entity->getData( 'revision' ) );
      $inputRevision->setLabel( $i18n->l( 'Revision', 'wbfsys.entity.label' ) );

      $inputRevision->refresh           = $this->refresh;
      $inputRevision->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysEntity_Revision */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysEntityRowid' , 'int' );
      $this->items['wbfsys_entity-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity[rowid]',
          'id'        => 'wgt-input-wbfsys_entity_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Entity' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_entity', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.entity.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysEntity_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysEntityMTimeCreated' , 'Date' );
      $this->items['wbfsys_entity-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity[m_time_created]',
          'id'        => 'wgt-input-wbfsys_entity_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Entity' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_entity', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.entity.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysEntity_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysEntityMRoleCreate', 'Window' );
      $this->items['wbfsys_entity-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_entity[m_role_create]',
        'id'        => 'wgt-input-wbfsys_entity_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Entity' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_entity', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.entity.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_entity_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_entity_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysEntity_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysEntityMTimeChanged' , 'Date' );
      $this->items['wbfsys_entity-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_entity_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Entity' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_entity', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.entity.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysEntity_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysEntityMRoleChange', 'Window' );
      $this->items['wbfsys_entity-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_entity[m_role_change]',
        'id'        => 'wgt-input-wbfsys_entity_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Entity' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_entity', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.entity.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_entity_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_entity_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysEntity_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysEntityMVersion' , 'int' );
      $this->items['wbfsys_entity-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity[m_version]',
          'id'        => 'wgt-input-wbfsys_entity_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Entity' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_entity', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.entity.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysEntity_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntity_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysEntityMUuid' , 'Text' );
      $this->items['wbfsys_entity-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity[m_uuid]',
          'id'        => 'wgt-input-wbfsys_entity_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Entity' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_entity', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_entity', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.entity.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysEntity_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysEntity_Crud_Show_Form */


