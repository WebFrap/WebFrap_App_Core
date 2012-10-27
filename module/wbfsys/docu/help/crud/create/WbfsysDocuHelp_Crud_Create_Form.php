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
class WbfsysDocuHelp_Crud_Create_Form
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
  public $namespace  = 'WbfsysDocuHelp';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysDocuHelp';

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
      'wbfsys_docu_help' => array
      (
        'title' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'id_mask' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'access_key' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'content' => array
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
   * @var WbfsysDocuHelp_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysDocuHelp_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysDocuHelp_Entity $entity
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
      'wbfsys_docu_help' => array
      (
        'title',
        'id_mask',
        'access_key',
        'content',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysDocuHelp entity
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
    $this->view->addVar( 'entityWbfsysDocuHelp', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_docu_help'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_docu_help[id_wbfsys_docu_help-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysDocuHelp_Title( $params );
    $this->input_WbfsysDocuHelp_IdMask( $params );
    $this->input_WbfsysDocuHelp_AccessKey( $params );
    $this->input_WbfsysDocuHelp_Content( $params );
    $this->input_WbfsysDocuHelp_Rowid( $params );
    $this->input_WbfsysDocuHelp_MTimeCreated( $params );
    $this->input_WbfsysDocuHelp_MRoleCreate( $params );
    $this->input_WbfsysDocuHelp_MTimeChanged( $params );
    $this->input_WbfsysDocuHelp_MRoleChange( $params );
    $this->input_WbfsysDocuHelp_MVersion( $params );
    $this->input_WbfsysDocuHelp_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field title
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuHelp_Title( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputTitle = $this->view->newInput( 'inputWbfsysDocuHelpTitle' , 'Text' );
      $this->items['wbfsys_docu_help-title'] = $inputTitle;
      $inputTitle->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_docu_help[title]',
          'id'        => 'wgt-input-wbfsys_docu_help_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip xxlarge'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Title', 'src' => 'Docu Help' ) ),
          'maxlength' => $this->entity->maxSize( 'title' ),
        )
      );
      $inputTitle->setWidth( 'xxlarge' );

      $inputTitle->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_help', 'title' ) );
      $inputTitle->setRequired( $this->fieldRequired( 'wbfsys_docu_help', 'title' ) );
      $inputTitle->setData( $this->entity->getSecure('title') );
      $inputTitle->setLabel( $i18n->l( 'Title', 'wbfsys.docu_help.label' ) );

      $inputTitle->refresh           = $this->refresh;
      $inputTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysDocuHelp_Title */

 /**
  * create the ui element for field id_mask
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuHelp_IdMask( $params )
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

      $inputIdMask = $this->view->newInput( 'inputWbfsysDocuHelpIdMask', 'Window' );
      $this->items['wbfsys_docu_help-id_mask'] = $inputIdMask;
      $inputIdMask->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_docu_help[id_mask]',
        'id'        => 'wgt-input-wbfsys_docu_help_id_mask'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Mask', 'src' => 'Docu Help' ) ),
      ));

      if( $this->assignedForm )
        $inputIdMask->assignedForm = $this->assignedForm;

      $inputIdMask->setWidth( 'medium' );

      $inputIdMask->setData( $this->entity->getData( 'id_mask' )  );
      $inputIdMask->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_help', 'id_mask' ) );
      $inputIdMask->setRequired( $this->fieldRequired( 'wbfsys_docu_help', 'id_mask' ) );
      $inputIdMask->setLabel( $i18n->l( 'Mask', 'wbfsys.docu_help.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Mask.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_docu_help_id_mask'.($this->suffix?'-'.$this->suffix:'');

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
      $inputIdMask->buildJavascript( 'wgt-input-wbfsys_docu_help_id_mask'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdMask );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysDocuHelp_IdMask */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuHelp_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysDocuHelpAccessKey' , 'Text' );
      $this->items['wbfsys_docu_help-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_docu_help[access_key]',
          'id'        => 'wgt-input-wbfsys_docu_help_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Docu Help' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_help', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_docu_help', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.docu_help.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysDocuHelp_AccessKey */

 /**
  * create the ui element for field content
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuHelp_Content( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputContent = $this->view->newInput( 'inputWbfsysDocuHelpContent', 'Wysiwyg' );
      $inputContent->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_docu_help[content]',
          'id'    => 'wgt-input-wbfsys_docu_help_content'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full large-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Content', 'src' => 'Docu Help' ) ),
        )
      );
      $inputContent->setWidth( 'full' );

      $inputContent->mode = 'rich_text';
      $inputContent->full = true;

      $inputContent->setData( $this->entity->getData( 'content' ) );
      $inputContent->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_help', 'content' ) );
      $inputContent->setRequired( $this->fieldRequired( 'wbfsys_docu_help', 'content' ) );
      $inputContent->setLabel( $i18n->l( 'Content', 'wbfsys.docu_help.label' ) );

      $inputContent->refresh           = $this->refresh;
      $inputContent->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysDocuHelp_Content */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuHelp_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysDocuHelpRowid' , 'int' );
      $this->items['wbfsys_docu_help-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_docu_help[rowid]',
          'id'        => 'wgt-input-wbfsys_docu_help_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Docu Help' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_help', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_docu_help', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.docu_help.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysDocuHelp_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuHelp_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysDocuHelpMTimeCreated' , 'Date' );
      $this->items['wbfsys_docu_help-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_docu_help[m_time_created]',
          'id'        => 'wgt-input-wbfsys_docu_help_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Docu Help' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_help', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_docu_help', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.docu_help.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysDocuHelp_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuHelp_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysDocuHelpMRoleCreate', 'Window' );
      $this->items['wbfsys_docu_help-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_docu_help[m_role_create]',
        'id'        => 'wgt-input-wbfsys_docu_help_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Docu Help' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_help', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_docu_help', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.docu_help.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_docu_help_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_docu_help_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysDocuHelp_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuHelp_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysDocuHelpMTimeChanged' , 'Date' );
      $this->items['wbfsys_docu_help-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_docu_help[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_docu_help_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Docu Help' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_help', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_docu_help', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.docu_help.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysDocuHelp_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuHelp_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysDocuHelpMRoleChange', 'Window' );
      $this->items['wbfsys_docu_help-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_docu_help[m_role_change]',
        'id'        => 'wgt-input-wbfsys_docu_help_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Docu Help' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_help', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_docu_help', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.docu_help.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_docu_help_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_docu_help_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysDocuHelp_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuHelp_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysDocuHelpMVersion' , 'int' );
      $this->items['wbfsys_docu_help-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_docu_help[m_version]',
          'id'        => 'wgt-input-wbfsys_docu_help_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Docu Help' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_help', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_docu_help', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.docu_help.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysDocuHelp_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuHelp_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysDocuHelpMUuid' , 'Text' );
      $this->items['wbfsys_docu_help-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_docu_help[m_uuid]',
          'id'        => 'wgt-input-wbfsys_docu_help_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Docu Help' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_help', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_docu_help', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.docu_help.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysDocuHelp_MUuid */

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
      $orm->getValidationData( 'WbfsysDocuHelp', array_keys( $this->fields['wbfsys_docu_help']), true ),
      $orm->getErrorMessages( 'WbfsysDocuHelp' ),
      'wbfsys_docu_help'
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


}//end class WbfsysDocuHelp_Crud_Create_Form */


