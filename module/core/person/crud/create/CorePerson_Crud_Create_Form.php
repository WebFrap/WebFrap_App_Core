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
class CorePerson_Crud_Create_Form
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
  public $namespace  = 'CorePerson';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'CorePerson';

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
      'core_person' => array
      (
        'firstname' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'lastname' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
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
        'academic_title' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '50',
        ),
        'noblesse_title' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '50',
        ),
        'photo' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'birthday' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'birth_city' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'id_nationality' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_preflang' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
      ),

  );

  /**
   * Die Haupt Entity für das Formular
   *
   * @var CorePerson_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return CorePerson_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param CorePerson_Entity $entity
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
      'core_person' => array
      (
        'firstname',
        'lastname',
        'm_version',
        'academic_title',
        'noblesse_title',
        'photo',
        'birthday',
        'birth_city',
        'id_nationality',
        'id_preflang',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the CorePerson entity
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
    $this->view->addVar( 'entityCorePerson', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-core_person'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'core_person[id_core_person-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_CorePerson_Firstname( $params );
    $this->input_CorePerson_Lastname( $params );
    $this->input_CorePerson_Rowid( $params );
    $this->input_CorePerson_MTimeCreated( $params );
    $this->input_CorePerson_MRoleCreate( $params );
    $this->input_CorePerson_MTimeChanged( $params );
    $this->input_CorePerson_MRoleChange( $params );
    $this->input_CorePerson_MVersion( $params );
    $this->input_CorePerson_MUuid( $params );
    $this->input_CorePerson_AcademicTitle( $params );
    $this->input_CorePerson_NoblesseTitle( $params );
    $this->input_CorePerson_Photo( $params );
    $this->input_CorePerson_Birthday( $params );
    $this->input_CorePerson_BirthCity( $params );
    $this->input_CorePerson_IdNationality( $params );
    $this->input_CorePerson_IdPreflang( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field firstname
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CorePerson_Firstname( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputFirstname = $this->view->newInput( 'inputCorePersonFirstname' , 'Text' );
      $this->items['core_person-firstname'] = $inputFirstname;
      $inputFirstname->addAttributes
      (
        array
        (
          'name'      => 'core_person[firstname]',
          'id'        => 'wgt-input-core_person_firstname'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Firstname', 'src' => 'Person' ) ),
          'maxlength' => $this->entity->maxSize( 'firstname' ),
        )
      );
      $inputFirstname->setWidth( 'medium' );

      $inputFirstname->setReadonly( $this->fieldReadOnly( 'core_person', 'firstname' ) );
      $inputFirstname->setRequired( $this->fieldRequired( 'core_person', 'firstname' ) );
      $inputFirstname->setData( $this->entity->getSecure('firstname') );
      $inputFirstname->setLabel( $i18n->l( 'Firstname', 'core.person.label' ) );

      $inputFirstname->refresh           = $this->refresh;
      $inputFirstname->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_CorePerson_Firstname */

 /**
  * create the ui element for field lastname
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CorePerson_Lastname( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputLastname = $this->view->newInput( 'inputCorePersonLastname' , 'Text' );
      $this->items['core_person-lastname'] = $inputLastname;
      $inputLastname->addAttributes
      (
        array
        (
          'name'      => 'core_person[lastname]',
          'id'        => 'wgt-input-core_person_lastname'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Lastname', 'src' => 'Person' ) ),
          'maxlength' => $this->entity->maxSize( 'lastname' ),
        )
      );
      $inputLastname->setWidth( 'medium' );

      $inputLastname->setReadonly( $this->fieldReadOnly( 'core_person', 'lastname' ) );
      $inputLastname->setRequired( $this->fieldRequired( 'core_person', 'lastname' ) );
      $inputLastname->setData( $this->entity->getSecure('lastname') );
      $inputLastname->setLabel( $i18n->l( 'Lastname', 'core.person.label' ) );

      $inputLastname->refresh           = $this->refresh;
      $inputLastname->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_CorePerson_Lastname */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CorePerson_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputCorePersonRowid' , 'int' );
      $this->items['core_person-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'core_person[rowid]',
          'id'        => 'wgt-input-core_person_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Person' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'core_person', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'core_person', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'core.person.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_CorePerson_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CorePerson_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputCorePersonMTimeCreated' , 'Date' );
      $this->items['core_person-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'core_person[m_time_created]',
          'id'        => 'wgt-input-core_person_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Person' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'core_person', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'core_person', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'core.person.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_CorePerson_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CorePerson_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputCorePersonMRoleCreate', 'Window' );
      $this->items['core_person-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'core_person[m_role_create]',
        'id'        => 'wgt-input-core_person_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Person' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'core_person', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'core_person', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'core.person.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=core_person_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-core_person_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_CorePerson_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CorePerson_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputCorePersonMTimeChanged' , 'Date' );
      $this->items['core_person-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'core_person[m_time_changed]',
          'id'        => 'wgt-input-core_person_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Person' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'core_person', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'core_person', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'core.person.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_CorePerson_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CorePerson_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputCorePersonMRoleChange', 'Window' );
      $this->items['core_person-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'core_person[m_role_change]',
        'id'        => 'wgt-input-core_person_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Person' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'core_person', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'core_person', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'core.person.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=core_person_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-core_person_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_CorePerson_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CorePerson_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputCorePersonMVersion' , 'int' );
      $this->items['core_person-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'core_person[m_version]',
          'id'        => 'wgt-input-core_person_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Person' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'core_person', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'core_person', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'core.person.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_CorePerson_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CorePerson_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputCorePersonMUuid' , 'Text' );
      $this->items['core_person-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'core_person[m_uuid]',
          'id'        => 'wgt-input-core_person_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Person' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'core_person', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'core_person', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'core.person.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_CorePerson_MUuid */

 /**
  * create the ui element for field academic_title
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CorePerson_AcademicTitle( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAcademicTitle = $this->view->newInput( 'inputCorePersonAcademicTitle' , 'Text' );
      $this->items['core_person-academic_title'] = $inputAcademicTitle;
      $inputAcademicTitle->addAttributes
      (
        array
        (
          'name'      => 'core_person[academic_title]',
          'id'        => 'wgt-input-core_person_academic_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Academic Title', 'src' => 'Person' ) ),
          'maxlength' => $this->entity->maxSize( 'academic_title' ),
        )
      );
      $inputAcademicTitle->setWidth( 'medium' );

      $inputAcademicTitle->setReadonly( $this->fieldReadOnly( 'core_person', 'academic_title' ) );
      $inputAcademicTitle->setRequired( $this->fieldRequired( 'core_person', 'academic_title' ) );
      $inputAcademicTitle->setData( $this->entity->getSecure('academic_title') );
      $inputAcademicTitle->setLabel( $i18n->l( 'Academic Title', 'core.person.label' ) );

      $inputAcademicTitle->refresh           = $this->refresh;
      $inputAcademicTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_CorePerson_AcademicTitle */

 /**
  * create the ui element for field noblesse_title
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CorePerson_NoblesseTitle( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputNoblesseTitle = $this->view->newInput( 'inputCorePersonNoblesseTitle' , 'Text' );
      $this->items['core_person-noblesse_title'] = $inputNoblesseTitle;
      $inputNoblesseTitle->addAttributes
      (
        array
        (
          'name'      => 'core_person[noblesse_title]',
          'id'        => 'wgt-input-core_person_noblesse_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Noblesse Title', 'src' => 'Person' ) ),
          'maxlength' => $this->entity->maxSize( 'noblesse_title' ),
        )
      );
      $inputNoblesseTitle->setWidth( 'medium' );

      $inputNoblesseTitle->setReadonly( $this->fieldReadOnly( 'core_person', 'noblesse_title' ) );
      $inputNoblesseTitle->setRequired( $this->fieldRequired( 'core_person', 'noblesse_title' ) );
      $inputNoblesseTitle->setData( $this->entity->getSecure('noblesse_title') );
      $inputNoblesseTitle->setLabel( $i18n->l( 'Noblesse Title', 'core.person.label' ) );

      $inputNoblesseTitle->refresh           = $this->refresh;
      $inputNoblesseTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_CorePerson_NoblesseTitle */

 /**
  * create the ui element for field photo
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CorePerson_Photo( $params )
  {
    $i18n     = $this->view->i18n;

      //p: input file image
      $inputPhoto = $this->view->newInput( 'inputCorePersonPhoto', 'FileImage' );
      $inputPhoto->addAttributes
      (
        array
        (
          'name'      => 'core_person[photo]',
          'id'        => 'wgt-input-core_person_photo'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium',
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Photo', 'src' => 'Person' ) ),
        )
      );
      $inputPhoto->setWidth( 'medium' );

      if
      (
        ( $objid = $this->entity->getId() )
          && $this->entity->photo
      )
      {
        $inputPhoto->setSource
        (
          'thumb.php?f=core_person-photo-'.$objid.'&amp;n='
            .base64_encode( $this->entity->photo )
        );
        $inputPhoto->setLink
        (
          'image.php?f=core_person-photo-'.$objid.'&amp;n='
            .base64_encode( $this->entity->photo )
        );
      }

      if( $this->assignedForm )
        $inputPhoto->assignedForm = $this->assignedForm;

      $inputPhoto->setReadonly( $this->fieldReadOnly( 'core_person', 'photo' ) );
      $inputPhoto->setRequired( $this->fieldRequired( 'core_person', 'photo' ) );
      $inputPhoto->setLabel( $i18n->l( 'Photo', 'core.person.label' ) );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_CorePerson_Photo */

 /**
  * create the ui element for field birthday
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CorePerson_Birthday( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputBirthday = $this->view->newInput( 'inputCorePersonBirthday' , 'Date' );
      $this->items['core_person-birthday'] = $inputBirthday;
      $inputBirthday->addAttributes
      (
        array
        (
          'name'      => 'core_person[birthday]',
          'id'        => 'wgt-input-core_person_birthday'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Birthday', 'src' => 'Person' ) ),
          'maxlength' => $this->entity->maxSize( 'birthday' ),
        )
      );
      $inputBirthday->setWidth( 'small' );

      $inputBirthday->setReadonly( $this->fieldReadOnly( 'core_person', 'birthday' ) );
      $inputBirthday->setRequired( $this->fieldRequired( 'core_person', 'birthday' ) );
      $inputBirthday->setData( $this->entity->getDate( 'birthday' ) );
      $inputBirthday->setLabel( $i18n->l( 'Birthday', 'core.person.label' ) );

      $inputBirthday->refresh           = $this->refresh;
      $inputBirthday->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_CorePerson_Birthday */

 /**
  * create the ui element for field birth_city
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CorePerson_BirthCity( $params  )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: autocomplete
      $inputBirthCity = $this->view->newInput( 'inputCorePersonBirthCity', 'Autocomplete' );
      $this->items['core_person-birth_city'] = $inputBirthCity;
      $inputBirthCity->addAttributes
      (
        array
        (
          'name'      => 'core_person[birth_city]',
          'id'        => 'wgt-input-core_person_birth_city'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Birth City', 'src' => 'Person' ) ),
          'maxlength' => $this->entity->maxSize( 'birth_city' ),
        )
      );
      $inputBirthCity->setWidth( 'medium' );

      $inputBirthCity->setReadonly( $this->fieldReadOnly( 'core_person', 'birth_city' ) );
      $inputBirthCity->setRequired( $this->fieldRequired( 'core_person', 'birth_city' ) );
      $inputBirthCity->setData( $this->entity->getSecure( 'birth_city' ) );
      $inputBirthCity->setLabel( $i18n->l( 'Birth City', 'core.person.label' ) );

      $inputBirthCity->refresh = $this->refresh;
      $inputBirthCity->setLoadParam( 'CorePerson', 'BirthCity' );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_PersonalData' ,
        true
      );

  }//end public function input_CorePerson_BirthCity */

 /**
  * create the ui element for field id_nationality
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CorePerson_IdNationality( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['core_person_id_nationality'] ) )
    {
      if( !Webfrap::classLoadable( 'CoreCountry_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'CoreCountry_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: CoreCountry_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdNationality = $this->view->newItem( 'inputCorePersonIdNationality', 'CoreCountry_Selectbox' );
      $this->items['core_person-id_nationality'] = $inputIdNationality;
      $inputIdNationality->addAttributes
      (
        array
        (
          'name'      => 'core_person[id_nationality]',
          'id'        => 'wgt-input-core_person_id_nationality'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Nationality', 'src' => 'Person' ) ),
        )
      );
      $inputIdNationality->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdNationality->assignedForm = $this->assignedForm;

      $inputIdNationality->setActive( $this->entity->getData( 'id_nationality' ) );
      $inputIdNationality->setReadonly( $this->fieldReadOnly( 'core_person', 'id_nationality' ) );
      $inputIdNationality->setRequired( $this->fieldRequired( 'core_person', 'id_nationality' ) );


      $inputIdNationality->setLabel( $i18n->l( 'Nationality', 'core.person.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-core>mod-core-cat-core_data:insert' ) )
      {
        $inputIdNationality->refresh           = $this->refresh;
        $inputIdNationality->serializeElement  = $this->sendElement;
        $inputIdNationality->editUrl = 'index.php?c=Core.Country.listing&amp;target='.$this->namespace.'&amp;field=id_nationality&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-core_person_id_nationality'.$this->suffix;
      }
      // set an empty first entry
      $inputIdNationality->setFirstFree( 'No Nationality selected' );

      
      $queryIdNationality = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['core_person_id_nationality'] ) )
      {
      
        $queryIdNationality = $this->db->newQuery( 'CoreCountry_Selectbox' );

        $queryIdNationality->fetchSelectbox();
        $inputIdNationality->setData( $queryIdNationality->getAll() );
      
      }
      else
      {
        $inputIdNationality->setData( $this->listElementData['core_person_id_nationality'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdNationality )
        $queryIdNationality = $this->db->newQuery( 'CoreCountry_Selectbox' );
      
      $inputIdNationality->loadActive = function( $activeId ) use ( $queryIdNationality ){
 
        return $queryIdNationality->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_PersonalData' ,
        true
      );

  }//end public function input_CorePerson_IdNationality */

 /**
  * create the ui element for field id_preflang
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CorePerson_IdPreflang( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['core_person_id_preflang'] ) )
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
      $inputIdPreflang = $this->view->newItem( 'inputCorePersonIdPreflang', 'WbfsysLanguage_Selectbox' );
      $this->items['core_person-id_preflang'] = $inputIdPreflang;
      $inputIdPreflang->addAttributes
      (
        array
        (
          'name'      => 'core_person[id_preflang]',
          'id'        => 'wgt-input-core_person_id_preflang'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Preferd Language', 'src' => 'Person' ) ),
        )
      );
      $inputIdPreflang->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdPreflang->assignedForm = $this->assignedForm;

      $inputIdPreflang->setActive( $this->entity->getData( 'id_preflang' ) );
      $inputIdPreflang->setReadonly( $this->fieldReadOnly( 'core_person', 'id_preflang' ) );
      $inputIdPreflang->setRequired( $this->fieldRequired( 'core_person', 'id_preflang' ) );


      $inputIdPreflang->setLabel( $i18n->l( 'Preferd Language', 'core.person.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdPreflang->refresh           = $this->refresh;
        $inputIdPreflang->serializeElement  = $this->sendElement;
        $inputIdPreflang->editUrl = 'index.php?c=Wbfsys.Language.listing&amp;target='.$this->namespace.'&amp;field=id_preflang&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-core_person_id_preflang'.$this->suffix;
      }
      // set an empty first entry
      $inputIdPreflang->setFirstFree( 'No Preferd Language selected' );

      
      $queryIdPreflang = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['core_person_id_preflang'] ) )
      {
      
        $queryIdPreflang = $this->db->newQuery( 'WbfsysLanguage_Selectbox' );

        $queryIdPreflang->fetchSelectbox();
        $inputIdPreflang->setData( $queryIdPreflang->getAll() );
      
      }
      else
      {
        $inputIdPreflang->setData( $this->listElementData['core_person_id_preflang'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdPreflang )
        $queryIdPreflang = $this->db->newQuery( 'WbfsysLanguage_Selectbox' );
      
      $inputIdPreflang->loadActive = function( $activeId ) use ( $queryIdPreflang ){
 
        return $queryIdPreflang->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_PersonalData' ,
        true
      );

  }//end public function input_CorePerson_IdPreflang */

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
      $orm->getValidationData( 'CorePerson', array_keys( $this->fields['core_person']), true ),
      $orm->getErrorMessages( 'CorePerson' ),
      'core_person'
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


}//end class CorePerson_Crud_Create_Form */


