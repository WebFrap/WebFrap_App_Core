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
class WbfsysRoleUserMaskEmployee_Crud_Create_Form
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
  public $namespace  = 'WbfsysRoleUserMaskEmployee';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysRoleUserMaskEmployee';

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
      'wbfsys_role_user_mask_employee' => array
      (
        'name' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'id_person' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_mandant' => array
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
        'password' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '64',
        ),
        'level' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'profile' => array
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
      ),
      'embed_person' => array
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
        'photo' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
      ),

  );

  /**
   * Die Haupt Entity für das Formular
   *
   * @var WbfsysRoleUser_Entity 
   */
  public $entity      = null;
  
  /**
  * The EmbedPerson Reference Entity
  *
  * @var EmbedPerson_Entity
  */
  public $entityEmbedPerson;


  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysRoleUser_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysRoleUser_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->entity = $entity;
    $this->rowid  = $entity->getId();
    
  }//end public function setEntity */


  /**
  * returns the activ entity with data, or creates a empty one
  * and returns it instead
  *
  * @return EmbedPerson_Entity
  */
  public function getEntityEmbedPerson(  )
  {

    return $this->entityEmbedPerson;

  }//end public function getEntityEmbedPerson */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param EmbedPerson_Entity $entity
  */
  public function setEntityEmbedPerson( $entity )
  {

    $this->entityEmbedPerson = $entity ;

  }//end public function setEntityEmbedPerson */

  /**
   * request all fields that have to be fetched from the request
   * @return array
   */
  public function getSaveFields()
  {

    return array
    (
      'wbfsys_role_user_mask_employee' => array
      (
        'name',
        'id_person',
        'id_mandant',
        'm_version',
        'password',
        'level',
        'profile',
        'description',
      ),
      'embed_person' => array
      (
        'firstname',
        'lastname',
        'academic_title',
        'noblesse_title',
        'm_version',
        'photo',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysRoleUser entity
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
    $this->view->addVar( 'entityWbfsysRoleUserMaskEmployee', $this->entity );
  $this->view->addVar( 'entityEmbedPerson',  $this->entityEmbedPerson ) ;


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_role_user_mask_employee'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_role_user_mask_employee[id_wbfsys_role_user_mask_employee-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysRoleUserMaskEmployee_Name( $params );
    $this->input_WbfsysRoleUserMaskEmployee_IdPerson( $params );
    $this->input_WbfsysRoleUserMaskEmployee_IdMandant( $params );
    $this->input_WbfsysRoleUserMaskEmployee_Rowid( $params );
    $this->input_EmbedPerson_Firstname( $params );
    $this->input_EmbedPerson_Lastname( $params );
    $this->input_EmbedPerson_AcademicTitle( $params );
    $this->input_EmbedPerson_NoblesseTitle( $params );
    $this->input_WbfsysRoleUserMaskEmployee_MTimeCreated( $params );
    $this->input_WbfsysRoleUserMaskEmployee_MRoleCreate( $params );
    $this->input_WbfsysRoleUserMaskEmployee_MTimeChanged( $params );
    $this->input_WbfsysRoleUserMaskEmployee_MRoleChange( $params );
    $this->input_WbfsysRoleUserMaskEmployee_MVersion( $params );
    $this->input_WbfsysRoleUserMaskEmployee_MUuid( $params );
    $this->input_EmbedPerson_Rowid( $params );
    $this->input_EmbedPerson_MTimeCreated( $params );
    $this->input_EmbedPerson_MRoleCreate( $params );
    $this->input_EmbedPerson_MTimeChanged( $params );
    $this->input_EmbedPerson_MRoleChange( $params );
    $this->input_EmbedPerson_MVersion( $params );
    $this->input_EmbedPerson_MUuid( $params );
    $this->input_EmbedPerson_Photo( $params );
    $this->input_WbfsysRoleUserMaskEmployee_Password( $params );
    $this->input_WbfsysRoleUserMaskEmployee_Level( $params );
    $this->input_WbfsysRoleUserMaskEmployee_Profile( $params );
    $this->input_WbfsysRoleUserMaskEmployee_Description( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleUserMaskEmployee_Name( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputName = $this->view->newInput( 'inputWbfsysRoleUserMaskEmployeeName' , 'Text' );
      $this->items['wbfsys_role_user_mask_employee-name'] = $inputName;
      $inputName->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_user_mask_employee[name]',
          'id'        => 'wgt-input-wbfsys_role_user_mask_employee_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Name', 'src' => 'Role User' ) ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadonly( $this->fieldReadOnly( 'wbfsys_role_user_mask_employee', 'name' ) );
      $inputName->setRequired( $this->fieldRequired( 'wbfsys_role_user_mask_employee', 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel( $i18n->l( 'Name', 'wbfsys.role_user.label' ) );

      $inputName->refresh           = $this->refresh;
      $inputName->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysRoleUserMaskEmployee_Name */

 /**
  * create the ui element for field id_person
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleUserMaskEmployee_IdPerson( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'CorePerson_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity CorePerson not exists' );

      Log::warn( 'Looks like the Entity: CorePerson is missing' );

      return;
    }


      //p: Window
      $objidCorePerson = $this->entity->getData( 'id_person' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidCorePerson
          || !$entityCorePerson = $this->db->orm->get
          (
            'CorePerson',
            $objidCorePerson
          )
      )
      {
        $entityCorePerson = $this->db->orm->newEntity( 'CorePerson' );
      }

      $inputIdPerson = $this->view->newInput( 'inputWbfsysRoleUserMaskEmployeeIdPerson', 'Window' );
      $this->items['wbfsys_role_user_mask_employee-id_person'] = $inputIdPerson;
      $inputIdPerson->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_role_user_mask_employee[id_person]',
        'id'        => 'wgt-input-wbfsys_role_user_mask_employee_id_person'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Person', 'src' => 'Role User' ) ),
      ));

      if( $this->assignedForm )
        $inputIdPerson->assignedForm = $this->assignedForm;

      $inputIdPerson->setWidth( 'medium' );

      $inputIdPerson->setData( $this->entity->getData( 'id_person' )  );
      $inputIdPerson->setReadonly( $this->fieldReadOnly( 'wbfsys_role_user_mask_employee', 'id_person' ) );
      $inputIdPerson->setRequired( $this->fieldRequired( 'wbfsys_role_user_mask_employee', 'id_person' ) );
      $inputIdPerson->setLabel( $i18n->l( 'Person', 'wbfsys.role_user.label' ) );


      $listUrl = 'modal.php?c=Core.Person.selection&amp;full_load=true&amp;context=create'
        .'&amp;key_name=embed_person&amp;suffix='.$this->suffix.'&amp;input=wbfsys_role_user_mask_employee_id_person'.($this->suffix?'-'.$this->suffix:'');

      $inputIdPerson->setListUrl ( $listUrl );
      $inputIdPerson->setListIcon( 'control/connect.png' );
      $inputIdPerson->setEntityUrl( 'maintab.php?c=Core.Person.edit' );
      $inputIdPerson->conEntity         = $entityCorePerson;
      $inputIdPerson->refresh           = $this->refresh;
      $inputIdPerson->serializeElement  = $this->sendElement;



      $inputIdPerson->view = $this->view;
      $inputIdPerson->buildJavascript( 'wgt-input-wbfsys_role_user_mask_employee_id_person'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdPerson );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysRoleUserMaskEmployee_IdPerson */

 /**
  * create the ui element for field id_mandant
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleUserMaskEmployee_IdMandant( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysRoleMandant_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysRoleMandant not exists' );

      Log::warn( 'Looks like the Entity: WbfsysRoleMandant is missing' );

      return;
    }


      //p: Window
      $objidWbfsysRoleMandant = $this->entity->getData( 'id_mandant' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysRoleMandant
          || !$entityWbfsysRoleMandant = $this->db->orm->get
          (
            'WbfsysRoleMandant',
            $objidWbfsysRoleMandant
          )
      )
      {
        $entityWbfsysRoleMandant = $this->db->orm->newEntity( 'WbfsysRoleMandant' );
      }

      $inputIdMandant = $this->view->newInput( 'inputWbfsysRoleUserMaskEmployeeIdMandant', 'Window' );
      $this->items['wbfsys_role_user_mask_employee-id_mandant'] = $inputIdMandant;
      $inputIdMandant->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_role_user_mask_employee[id_mandant]',
        'id'        => 'wgt-input-wbfsys_role_user_mask_employee_id_mandant'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Mandant', 'src' => 'Role User' ) ),
      ));

      if( $this->assignedForm )
        $inputIdMandant->assignedForm = $this->assignedForm;

      $inputIdMandant->setWidth( 'medium' );

      $inputIdMandant->setData( $this->entity->getData( 'id_mandant' )  );
      $inputIdMandant->setReadonly( $this->fieldReadOnly( 'wbfsys_role_user_mask_employee', 'id_mandant' ) );
      $inputIdMandant->setRequired( $this->fieldRequired( 'wbfsys_role_user_mask_employee', 'id_mandant' ) );
      $inputIdMandant->setLabel( $i18n->l( 'Mandant', 'wbfsys.role_user.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleMandant.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_role_user_mask_employee_id_mandant'.($this->suffix?'-'.$this->suffix:'');

      $inputIdMandant->setListUrl ( $listUrl );
      $inputIdMandant->setListIcon( 'control/connect.png' );
      $inputIdMandant->setEntityUrl( 'maintab.php?c=Wbfsys.RoleMandant.edit' );
      $inputIdMandant->conEntity         = $entityWbfsysRoleMandant;
      $inputIdMandant->refresh           = $this->refresh;
      $inputIdMandant->serializeElement  = $this->sendElement;



      $inputIdMandant->view = $this->view;
      $inputIdMandant->buildJavascript( 'wgt-input-wbfsys_role_user_mask_employee_id_mandant'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdMandant );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysRoleUserMaskEmployee_IdMandant */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleUserMaskEmployee_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysRoleUserMaskEmployeeRowid' , 'int' );
      $this->items['wbfsys_role_user_mask_employee-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_user_mask_employee[rowid]',
          'id'        => 'wgt-input-wbfsys_role_user_mask_employee_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Role User' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_role_user_mask_employee', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_role_user_mask_employee', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.role_user.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysRoleUserMaskEmployee_Rowid */

 /**
  * create the ui element for field firstname
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedPerson_Firstname( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputFirstname = $this->view->newInput( 'inputEmbedPersonFirstname' , 'Text' );
      $this->items['embed_person-firstname'] = $inputFirstname;
      $inputFirstname->addAttributes
      (
        array
        (
          'name'      => 'embed_person[firstname]',
          'id'        => 'wgt-input-embed_person_firstname'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Firstname', 'src' => 'Person' ) ),
          'maxlength' => $this->entityEmbedPerson->maxSize( 'firstname' ),
        )
      );
      $inputFirstname->setWidth( 'medium' );

      $inputFirstname->setReadonly( $this->fieldReadOnly( 'embed_person', 'firstname' ) );
      $inputFirstname->setRequired( $this->fieldRequired( 'embed_person', 'firstname' ) );
      $inputFirstname->setData( $this->entityEmbedPerson->getSecure('firstname') );
      $inputFirstname->setLabel( $i18n->l( 'Firstname', 'core.person.label' ) );

      $inputFirstname->refresh           = $this->refresh;
      $inputFirstname->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_EmbedPerson_Firstname */

 /**
  * create the ui element for field lastname
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedPerson_Lastname( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputLastname = $this->view->newInput( 'inputEmbedPersonLastname' , 'Text' );
      $this->items['embed_person-lastname'] = $inputLastname;
      $inputLastname->addAttributes
      (
        array
        (
          'name'      => 'embed_person[lastname]',
          'id'        => 'wgt-input-embed_person_lastname'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Lastname', 'src' => 'Person' ) ),
          'maxlength' => $this->entityEmbedPerson->maxSize( 'lastname' ),
        )
      );
      $inputLastname->setWidth( 'medium' );

      $inputLastname->setReadonly( $this->fieldReadOnly( 'embed_person', 'lastname' ) );
      $inputLastname->setRequired( $this->fieldRequired( 'embed_person', 'lastname' ) );
      $inputLastname->setData( $this->entityEmbedPerson->getSecure('lastname') );
      $inputLastname->setLabel( $i18n->l( 'Lastname', 'core.person.label' ) );

      $inputLastname->refresh           = $this->refresh;
      $inputLastname->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_EmbedPerson_Lastname */

 /**
  * create the ui element for field academic_title
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedPerson_AcademicTitle( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAcademicTitle = $this->view->newInput( 'inputEmbedPersonAcademicTitle' , 'Text' );
      $this->items['embed_person-academic_title'] = $inputAcademicTitle;
      $inputAcademicTitle->addAttributes
      (
        array
        (
          'name'      => 'embed_person[academic_title]',
          'id'        => 'wgt-input-embed_person_academic_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Academic Title', 'src' => 'Person' ) ),
          'maxlength' => $this->entityEmbedPerson->maxSize( 'academic_title' ),
        )
      );
      $inputAcademicTitle->setWidth( 'medium' );

      $inputAcademicTitle->setReadonly( $this->fieldReadOnly( 'embed_person', 'academic_title' ) );
      $inputAcademicTitle->setRequired( $this->fieldRequired( 'embed_person', 'academic_title' ) );
      $inputAcademicTitle->setData( $this->entityEmbedPerson->getSecure('academic_title') );
      $inputAcademicTitle->setLabel( $i18n->l( 'Academic Title', 'core.person.label' ) );

      $inputAcademicTitle->refresh           = $this->refresh;
      $inputAcademicTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_EmbedPerson_AcademicTitle */

 /**
  * create the ui element for field noblesse_title
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedPerson_NoblesseTitle( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputNoblesseTitle = $this->view->newInput( 'inputEmbedPersonNoblesseTitle' , 'Text' );
      $this->items['embed_person-noblesse_title'] = $inputNoblesseTitle;
      $inputNoblesseTitle->addAttributes
      (
        array
        (
          'name'      => 'embed_person[noblesse_title]',
          'id'        => 'wgt-input-embed_person_noblesse_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Noblesse Title', 'src' => 'Person' ) ),
          'maxlength' => $this->entityEmbedPerson->maxSize( 'noblesse_title' ),
        )
      );
      $inputNoblesseTitle->setWidth( 'medium' );

      $inputNoblesseTitle->setReadonly( $this->fieldReadOnly( 'embed_person', 'noblesse_title' ) );
      $inputNoblesseTitle->setRequired( $this->fieldRequired( 'embed_person', 'noblesse_title' ) );
      $inputNoblesseTitle->setData( $this->entityEmbedPerson->getSecure('noblesse_title') );
      $inputNoblesseTitle->setLabel( $i18n->l( 'Noblesse Title', 'core.person.label' ) );

      $inputNoblesseTitle->refresh           = $this->refresh;
      $inputNoblesseTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_EmbedPerson_NoblesseTitle */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleUserMaskEmployee_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysRoleUserMaskEmployeeMTimeCreated' , 'Date' );
      $this->items['wbfsys_role_user_mask_employee-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_user_mask_employee[m_time_created]',
          'id'        => 'wgt-input-wbfsys_role_user_mask_employee_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Role User' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_role_user_mask_employee', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_role_user_mask_employee', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.role_user.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysRoleUserMaskEmployee_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleUserMaskEmployee_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysRoleUserMaskEmployeeMRoleCreate', 'Window' );
      $this->items['wbfsys_role_user_mask_employee-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_role_user_mask_employee[m_role_create]',
        'id'        => 'wgt-input-wbfsys_role_user_mask_employee_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Role User' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_role_user_mask_employee', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_role_user_mask_employee', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.role_user.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_role_user_mask_employee_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_role_user_mask_employee_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysRoleUserMaskEmployee_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleUserMaskEmployee_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysRoleUserMaskEmployeeMTimeChanged' , 'Date' );
      $this->items['wbfsys_role_user_mask_employee-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_user_mask_employee[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_role_user_mask_employee_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Role User' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_role_user_mask_employee', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_role_user_mask_employee', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.role_user.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysRoleUserMaskEmployee_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleUserMaskEmployee_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysRoleUserMaskEmployeeMRoleChange', 'Window' );
      $this->items['wbfsys_role_user_mask_employee-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_role_user_mask_employee[m_role_change]',
        'id'        => 'wgt-input-wbfsys_role_user_mask_employee_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Role User' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_role_user_mask_employee', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_role_user_mask_employee', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.role_user.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_role_user_mask_employee_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_role_user_mask_employee_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysRoleUserMaskEmployee_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleUserMaskEmployee_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysRoleUserMaskEmployeeMVersion' , 'int' );
      $this->items['wbfsys_role_user_mask_employee-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_user_mask_employee[m_version]',
          'id'        => 'wgt-input-wbfsys_role_user_mask_employee_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Role User' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_role_user_mask_employee', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_role_user_mask_employee', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.role_user.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysRoleUserMaskEmployee_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleUserMaskEmployee_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysRoleUserMaskEmployeeMUuid' , 'Text' );
      $this->items['wbfsys_role_user_mask_employee-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_user_mask_employee[m_uuid]',
          'id'        => 'wgt-input-wbfsys_role_user_mask_employee_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Role User' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_role_user_mask_employee', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_role_user_mask_employee', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.role_user.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysRoleUserMaskEmployee_MUuid */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedPerson_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputEmbedPersonRowid' , 'int' );
      $this->items['embed_person-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'embed_person[rowid]',
          'id'        => 'wgt-input-embed_person_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Person' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'embed_person', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'embed_person', 'rowid' ) );
      $inputRowid->setData( $this->entityEmbedPerson->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'core.person.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_EmbedPerson_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedPerson_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputEmbedPersonMTimeCreated' , 'Date' );
      $this->items['embed_person-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'embed_person[m_time_created]',
          'id'        => 'wgt-input-embed_person_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Person' ) ),
          'maxlength' => $this->entityEmbedPerson->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'embed_person', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'embed_person', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entityEmbedPerson->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'core.person.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_EmbedPerson_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedPerson_MRoleCreate( $params )
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
      $objidWbfsysRoleUser = $this->entityEmbedPerson->getData( 'm_role_create' ) ;

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

      $inputMRoleCreate = $this->view->newInput( 'inputEmbedPersonMRoleCreate', 'Window' );
      $this->items['embed_person-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'embed_person[m_role_create]',
        'id'        => 'wgt-input-embed_person_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Person' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entityEmbedPerson->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'embed_person', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'embed_person', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'core.person.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=embed_person_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-embed_person_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_EmbedPerson_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedPerson_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputEmbedPersonMTimeChanged' , 'Date' );
      $this->items['embed_person-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'embed_person[m_time_changed]',
          'id'        => 'wgt-input-embed_person_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Person' ) ),
          'maxlength' => $this->entityEmbedPerson->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'embed_person', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'embed_person', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entityEmbedPerson->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'core.person.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_EmbedPerson_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedPerson_MRoleChange( $params )
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
      $objidWbfsysRoleUser = $this->entityEmbedPerson->getData( 'm_role_change' ) ;

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

      $inputMRoleChange = $this->view->newInput( 'inputEmbedPersonMRoleChange', 'Window' );
      $this->items['embed_person-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'embed_person[m_role_change]',
        'id'        => 'wgt-input-embed_person_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Person' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entityEmbedPerson->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'embed_person', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'embed_person', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'core.person.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=embed_person_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-embed_person_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_EmbedPerson_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedPerson_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputEmbedPersonMVersion' , 'int' );
      $this->items['embed_person-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'embed_person[m_version]',
          'id'        => 'wgt-input-embed_person_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Person' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'embed_person', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'embed_person', 'm_version' ) );
      $inputMVersion->setData( $this->entityEmbedPerson->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'core.person.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_EmbedPerson_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedPerson_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputEmbedPersonMUuid' , 'Text' );
      $this->items['embed_person-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'embed_person[m_uuid]',
          'id'        => 'wgt-input-embed_person_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Person' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'embed_person', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'embed_person', 'm_uuid' ) );
      $inputMUuid->setData( $this->entityEmbedPerson->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'core.person.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_EmbedPerson_MUuid */

 /**
  * create the ui element for field photo
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedPerson_Photo( $params )
  {
    $i18n     = $this->view->i18n;

      //p: input file image
      $inputPhoto = $this->view->newInput( 'inputEmbedPersonPhoto', 'FileImage' );
      $inputPhoto->addAttributes
      (
        array
        (
          'name'      => 'embed_person[photo]',
          'id'        => 'wgt-input-embed_person_photo'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium',
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Photo', 'src' => 'Person' ) ),
        )
      );
      $inputPhoto->setWidth( 'medium' );

      if
      (
        ( $objid = $this->entityEmbedPerson->getId() )
          && $this->entityEmbedPerson->photo
      )
      {
        $inputPhoto->setSource
        (
          'thumb.php?f=core_person-photo-'.$objid.'&amp;n='
            .base64_encode( $this->entityEmbedPerson->photo )
        );
        $inputPhoto->setLink
        (
          'image.php?f=core_person-photo-'.$objid.'&amp;n='
            .base64_encode( $this->entityEmbedPerson->photo )
        );
      }

      if( $this->assignedForm )
        $inputPhoto->assignedForm = $this->assignedForm;

      $inputPhoto->setReadonly( $this->fieldReadOnly( 'embed_person', 'photo' ) );
      $inputPhoto->setRequired( $this->fieldRequired( 'embed_person', 'photo' ) );
      $inputPhoto->setLabel( $i18n->l( 'Photo', 'core.person.label' ) );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_EmbedPerson_Photo */

 /**
  * create the ui element for field password
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleUserMaskEmployee_Password( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:password
      $inputPassword = $this->view->newInput( 'inputWbfsysRoleUserMaskEmployeePassword', 'Password' );
      $this->items['wbfsys_role_user_mask_employee-password'] = $inputPassword;
      $inputPassword->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_user_mask_employee[password]',
          'id'        => 'wgt-input-wbfsys_role_user_mask_employee_password'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_password medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Password', 'src' => 'Role User' ) ),
          'maxlength' => $this->entity->maxSize( 'password' ),
        )
      );
      $inputPassword->setWidth( 'medium' );

      $inputPassword->setReadonly( $this->fieldReadOnly( 'wbfsys_role_user_mask_employee', 'password' ) );
      $inputPassword->setRequired( $this->fieldRequired( 'wbfsys_role_user_mask_employee', 'password' ) );
      $inputPassword->setLabel( $i18n->l( 'Password', 'wbfsys.role_user.label' ) );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysRoleUserMaskEmployee_Password */

 /**
  * create the ui element for field level
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleUserMaskEmployee_Level( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_role_user_mask_employee_level'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysSecurityLevelValue_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysSecurityLevelValue_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysSecurityLevelValue_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputLevel = $this->view->newItem( 'inputWbfsysRoleUserMaskEmployeeLevel', 'WbfsysSecurityLevelValue_Selectbox' );
      $this->items['wbfsys_role_user_mask_employee-level'] = $inputLevel;
      $inputLevel->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_user_mask_employee[level]',
          'id'        => 'wgt-input-wbfsys_role_user_mask_employee_level'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Level', 'src' => 'Role User' ) ),
        )
      );
      $inputLevel->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputLevel->assignedForm = $this->assignedForm;

      $inputLevel->setActive( $this->entity->getData( 'level' ) );
      $inputLevel->setReadonly( $this->fieldReadOnly( 'wbfsys_role_user_mask_employee', 'level' ) );
      $inputLevel->setRequired( $this->fieldRequired( 'wbfsys_role_user_mask_employee', 'level' ) );


      $inputLevel->setLabel( $i18n->l( 'Access Level', 'wbfsys.role_user.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputLevel->refresh           = $this->refresh;
        $inputLevel->serializeElement  = $this->sendElement;
        $inputLevel->editUrl = 'index.php?c=Wbfsys.SecurityLevel.listing&amp;target='.$this->namespace.'&amp;field=level&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_role_user_mask_employee_level'.$this->suffix;
      }
      // set an empty first entry
      $inputLevel->setFirstFree( 'No Access Level selected' );

      
      $queryLevel = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_role_user_mask_employee_level'] ) )
      {
      
        $queryLevel = $this->db->newQuery( 'WbfsysSecurityLevelValue_Selectbox' );

        $queryLevel->fetchSelectbox();
        $inputLevel->setData( $queryLevel->getAll() );
      
      }
      else
      {
        $inputLevel->setData( $this->listElementData['wbfsys_role_user_mask_employee_level'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryLevel )
        $queryLevel = $this->db->newQuery( 'WbfsysSecurityLevelValue_Selectbox' );
      
      $inputLevel->loadActive = function( $activeId ) use ( $queryLevel ){
 
        return $queryLevel->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysRoleUserMaskEmployee_Level */

 /**
  * create the ui element for field profile
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleUserMaskEmployee_Profile( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_role_user_mask_employee_profile'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysProfileValue_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysProfileValue_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysProfileValue_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputProfile = $this->view->newItem( 'inputWbfsysRoleUserMaskEmployeeProfile', 'WbfsysProfileValue_Selectbox' );
      $this->items['wbfsys_role_user_mask_employee-profile'] = $inputProfile;
      $inputProfile->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_user_mask_employee[profile]',
          'id'        => 'wgt-input-wbfsys_role_user_mask_employee_profile'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Profile', 'src' => 'Role User' ) ),
        )
      );
      $inputProfile->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputProfile->assignedForm = $this->assignedForm;

      $inputProfile->setActive( $this->entity->getData( 'profile' ) );
      $inputProfile->setReadonly( $this->fieldReadOnly( 'wbfsys_role_user_mask_employee', 'profile' ) );
      $inputProfile->setRequired( $this->fieldRequired( 'wbfsys_role_user_mask_employee', 'profile' ) );


      $inputProfile->setLabel( $i18n->l( 'Profile', 'wbfsys.role_user.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_profile:insert' ) )
      {
        $inputProfile->refresh           = $this->refresh;
        $inputProfile->serializeElement  = $this->sendElement;
        $inputProfile->editUrl = 'index.php?c=Wbfsys.Profile.listing&amp;target='.$this->namespace.'&amp;field=profile&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_role_user_mask_employee_profile'.$this->suffix;
      }
      // set an empty first entry
      $inputProfile->setFirstFree( 'No Profile selected' );

      
      $queryProfile = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_role_user_mask_employee_profile'] ) )
      {
      
        $queryProfile = $this->db->newQuery( 'WbfsysProfileValue_Selectbox' );

        $queryProfile->fetchSelectbox();
        $inputProfile->setData( $queryProfile->getAll() );
      
      }
      else
      {
        $inputProfile->setData( $this->listElementData['wbfsys_role_user_mask_employee_profile'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryProfile )
        $queryProfile = $this->db->newQuery( 'WbfsysProfileValue_Selectbox' );
      
      $inputProfile->loadActive = function( $activeId ) use ( $queryProfile ){
 
        return $queryProfile->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysRoleUserMaskEmployee_Profile */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleUserMaskEmployee_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysRoleUserMaskEmployeeDescription', 'Textarea' );
      $this->items['wbfsys_role_user_mask_employee-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_role_user_mask_employee[description]',
          'id'    => 'wgt-input-wbfsys_role_user_mask_employee_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Role User' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_role_user_mask_employee', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_role_user_mask_employee', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.role_user.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysRoleUserMaskEmployee_Description */

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
      $orm->getValidationData( 'WbfsysRoleUser', array_keys( $this->fields['wbfsys_role_user_mask_employee']), true ),
      $orm->getErrorMessages( 'WbfsysRoleUser' ),
      'wbfsys_role_user_mask_employee'
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
      
    // Extrahieren der Daten für die embed_person Referenz
    $filterEmbedPerson = $request->checkFormInput
    (
      $orm->getValidationData( 'CorePerson', array_keys( $this->fields['embed_person'] ), true ),
      $orm->getErrorMessages( 'CorePerson' ),
      'embed_person'
    );
    
    $tmpEmbedPerson  = $filterEmbedPerson->getData();
    $dataEmbedPerson = array();
    
    // es werden nur daten gesetzt die tatsächlich übergeben wurden, sonst
    // würden default werte in den entities überschrieben werden
    foreach( $tmpEmbedPerson as $key => $value   )
    {
      if( !is_null( $value ) )
        $dataEmbedPerson[$key] = $value;
    }

    $this->entityEmbedPerson->addData( $dataEmbedPerson );


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


}//end class WbfsysRoleUserMaskEmployee_Crud_Create_Form */


