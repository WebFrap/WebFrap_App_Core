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
class WbfsysTaskGroup_Crud_Edit_Form
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
  public $namespace  = 'WbfsysTaskGroup';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysTaskGroup';

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
      'wbfsys_task_group' => array
      (
        'id_responsible' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_group' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_task' => array
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
   * @var WbfsysTaskGroup_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysTaskGroup_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysTaskGroup_Entity $entity
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
      'wbfsys_task_group' => array
      (
        'id_responsible',
        'id_group',
        'id_task',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysTaskGroup entity
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
    $this->view->addVar( 'entityWbfsysTaskGroup', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_task_group'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_task_group[id_wbfsys_task_group-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysTaskGroup_IdResponsible( $params );
    $this->input_WbfsysTaskGroup_IdGroup( $params );
    $this->input_WbfsysTaskGroup_IdTask( $params );
    $this->input_WbfsysTaskGroup_Rowid( $params );
    $this->input_WbfsysTaskGroup_MTimeCreated( $params );
    $this->input_WbfsysTaskGroup_MRoleCreate( $params );
    $this->input_WbfsysTaskGroup_MTimeChanged( $params );
    $this->input_WbfsysTaskGroup_MRoleChange( $params );
    $this->input_WbfsysTaskGroup_MVersion( $params );
    $this->input_WbfsysTaskGroup_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field id_responsible
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTaskGroup_IdResponsible( $params )
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
      $objidWbfsysRoleUser = $this->entity->getData( 'id_responsible' ) ;

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

      $inputIdResponsible = $this->view->newInput( 'inputWbfsysTaskGroupIdResponsible', 'Window' );
      $this->items['wbfsys_task_group-id_responsible'] = $inputIdResponsible;
      $inputIdResponsible->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_task_group[id_responsible]',
        'id'        => 'wgt-input-wbfsys_task_group_id_responsible'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Responsible', 'src' => 'Task Group' ) ),
      ));

      if( $this->assignedForm )
        $inputIdResponsible->assignedForm = $this->assignedForm;

      $inputIdResponsible->setWidth( 'medium' );

      $inputIdResponsible->setData( $this->entity->getData( 'id_responsible' )  );
      $inputIdResponsible->setReadonly( $this->fieldReadOnly( 'wbfsys_task_group', 'id_responsible' ) );
      $inputIdResponsible->setRequired( $this->fieldRequired( 'wbfsys_task_group', 'id_responsible' ) );
      $inputIdResponsible->setLabel( $i18n->l( 'Responsible', 'wbfsys.task_group.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_task_group_id_responsible'.($this->suffix?'-'.$this->suffix:'');

      $inputIdResponsible->setListUrl ( $listUrl );
      $inputIdResponsible->setListIcon( 'control/connect.png' );
      $inputIdResponsible->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.edit' );
      $inputIdResponsible->conEntity         = $entityWbfsysRoleUser;
      $inputIdResponsible->refresh           = $this->refresh;
      $inputIdResponsible->serializeElement  = $this->sendElement;


        $inputIdResponsible->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.RoleUser.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdResponsible->view = $this->view;
      $inputIdResponsible->buildJavascript( 'wgt-input-wbfsys_task_group_id_responsible'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdResponsible );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysTaskGroup_IdResponsible */

 /**
  * create the ui element for field id_group
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTaskGroup_IdGroup( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysRoleGroup_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysRoleGroup not exists' );

      Log::warn( 'Looks like the Entity: WbfsysRoleGroup is missing' );

      return;
    }


      //p: Window
      $objidWbfsysRoleGroup = $this->entity->getData( 'id_group' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysRoleGroup
          || !$entityWbfsysRoleGroup = $this->db->orm->get
          (
            'WbfsysRoleGroup',
            $objidWbfsysRoleGroup
          )
      )
      {
        $entityWbfsysRoleGroup = $this->db->orm->newEntity( 'WbfsysRoleGroup' );
      }

      $inputIdGroup = $this->view->newInput( 'inputWbfsysTaskGroupIdGroup', 'Window' );
      $this->items['wbfsys_task_group-id_group'] = $inputIdGroup;
      $inputIdGroup->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_task_group[id_group]',
        'id'        => 'wgt-input-wbfsys_task_group_id_group'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Group', 'src' => 'Task Group' ) ),
      ));

      if( $this->assignedForm )
        $inputIdGroup->assignedForm = $this->assignedForm;

      $inputIdGroup->setWidth( 'medium' );

      $inputIdGroup->setData( $this->entity->getData( 'id_group' )  );
      $inputIdGroup->setReadonly( $this->fieldReadOnly( 'wbfsys_task_group', 'id_group' ) );
      $inputIdGroup->setRequired( $this->fieldRequired( 'wbfsys_task_group', 'id_group' ) );
      $inputIdGroup->setLabel( $i18n->l( 'Group', 'wbfsys.task_group.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleGroup.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_task_group_id_group'.($this->suffix?'-'.$this->suffix:'');

      $inputIdGroup->setListUrl ( $listUrl );
      $inputIdGroup->setListIcon( 'control/connect.png' );
      $inputIdGroup->setEntityUrl( 'maintab.php?c=Wbfsys.RoleGroup.edit' );
      $inputIdGroup->conEntity         = $entityWbfsysRoleGroup;
      $inputIdGroup->refresh           = $this->refresh;
      $inputIdGroup->serializeElement  = $this->sendElement;



      $inputIdGroup->view = $this->view;
      $inputIdGroup->buildJavascript( 'wgt-input-wbfsys_task_group_id_group'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdGroup );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysTaskGroup_IdGroup */

 /**
  * create the ui element for field id_task
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTaskGroup_IdTask( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysTask_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysTask not exists' );

      Log::warn( 'Looks like the Entity: WbfsysTask is missing' );

      return;
    }


      //p: Window
      $objidWbfsysTask = $this->entity->getData( 'id_task' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysTask
          || !$entityWbfsysTask = $this->db->orm->get
          (
            'WbfsysTask',
            $objidWbfsysTask
          )
      )
      {
        $entityWbfsysTask = $this->db->orm->newEntity( 'WbfsysTask' );
      }

      $inputIdTask = $this->view->newInput( 'inputWbfsysTaskGroupIdTask', 'Window' );
      $this->items['wbfsys_task_group-id_task'] = $inputIdTask;
      $inputIdTask->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_task_group[id_task]',
        'id'        => 'wgt-input-wbfsys_task_group_id_task'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Task', 'src' => 'Task Group' ) ),
      ));

      if( $this->assignedForm )
        $inputIdTask->assignedForm = $this->assignedForm;

      $inputIdTask->setWidth( 'medium' );

      $inputIdTask->setData( $this->entity->getData( 'id_task' )  );
      $inputIdTask->setReadonly( $this->fieldReadOnly( 'wbfsys_task_group', 'id_task' ) );
      $inputIdTask->setRequired( $this->fieldRequired( 'wbfsys_task_group', 'id_task' ) );
      $inputIdTask->setLabel( $i18n->l( 'Task', 'wbfsys.task_group.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Task.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_task_group_id_task'.($this->suffix?'-'.$this->suffix:'');

      $inputIdTask->setListUrl ( $listUrl );
      $inputIdTask->setListIcon( 'control/connect.png' );
      $inputIdTask->setEntityUrl( 'maintab.php?c=Wbfsys.Task.edit' );
      $inputIdTask->conEntity         = $entityWbfsysTask;
      $inputIdTask->refresh           = $this->refresh;
      $inputIdTask->serializeElement  = $this->sendElement;



      $inputIdTask->view = $this->view;
      $inputIdTask->buildJavascript( 'wgt-input-wbfsys_task_group_id_task'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdTask );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysTaskGroup_IdTask */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTaskGroup_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysTaskGroupRowid' , 'int' );
      $this->items['wbfsys_task_group-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_task_group[rowid]',
          'id'        => 'wgt-input-wbfsys_task_group_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Task Group' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_task_group', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_task_group', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.task_group.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysTaskGroup_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTaskGroup_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysTaskGroupMTimeCreated' , 'Date' );
      $this->items['wbfsys_task_group-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_task_group[m_time_created]',
          'id'        => 'wgt-input-wbfsys_task_group_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Task Group' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_task_group', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_task_group', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.task_group.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysTaskGroup_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTaskGroup_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysTaskGroupMRoleCreate', 'Window' );
      $this->items['wbfsys_task_group-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_task_group[m_role_create]',
        'id'        => 'wgt-input-wbfsys_task_group_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Task Group' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_task_group', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_task_group', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.task_group.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_task_group_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_task_group_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysTaskGroup_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTaskGroup_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysTaskGroupMTimeChanged' , 'Date' );
      $this->items['wbfsys_task_group-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_task_group[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_task_group_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Task Group' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_task_group', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_task_group', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.task_group.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysTaskGroup_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTaskGroup_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysTaskGroupMRoleChange', 'Window' );
      $this->items['wbfsys_task_group-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_task_group[m_role_change]',
        'id'        => 'wgt-input-wbfsys_task_group_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Task Group' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_task_group', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_task_group', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.task_group.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_task_group_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_task_group_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysTaskGroup_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTaskGroup_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysTaskGroupMVersion' , 'int' );
      $this->items['wbfsys_task_group-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_task_group[m_version]',
          'id'        => 'wgt-input-wbfsys_task_group_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Task Group' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_task_group', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_task_group', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.task_group.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysTaskGroup_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTaskGroup_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysTaskGroupMUuid' , 'Text' );
      $this->items['wbfsys_task_group-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_task_group[m_uuid]',
          'id'        => 'wgt-input-wbfsys_task_group_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Task Group' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_task_group', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_task_group', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.task_group.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysTaskGroup_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysTaskGroup_Crud_Edit_Form */


