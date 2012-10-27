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
class WbfsysRoleUser_Form
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
  public $keyName     = 'wbfsys_role_user';

  /**
   * the cname for the entities, is used to request metadata from the orm
   * @setter WgtForm::setEntityName()
   * @getter WgtForm::getEntityName()
   * @var string 
   */
  public $entityName  = 'WbfsysRoleUser';

  /**
   * namespace for the actual form
   * @setter WgtForm::setNamespace()
   * @getter WgtForm::getNamespace()
   * @var string 
   */
  public $namespace  = 'WbfsysRoleUser';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtForm::setPrefix()
   * @getter WgtForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysRoleUser';

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
   * @var WbfsysRoleUser_Entity 
   */
  public $entity      = null;
  
////////////////////////////////////////////////////////////////////////////////
// form methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysRoleUser entity
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
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysRoleUser' );
      }
    }

  }//end public function createForm */

 /**
  * create a search form for the WbfsysRoleUser entity
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
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysRoleUser' );
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
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Name (Role User)', 'wbfsys.role_user.label' ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadOnly( $this->isReadOnly( 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel
      (
        $this->view->i18n->l( 'Name', 'wbfsys.role_user.label' ),
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
  * create the ui element for field email
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_email( $params )
  {

      //tpl: class ui:email
      $inputEmail = $this->view->newInput( 'input'.$this->prefix.'Email', 'Email' );
      $this->items['email'] = $inputEmail;
      $inputEmail->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[email]',
          'id'        => 'wgt-input-'.$this->keyName.'_email'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for E-Mail (Role User)', 'wbfsys.role_user.label' ),
          'maxlength' => $this->entity->maxSize( 'email' ),
        )
      );
      $inputEmail->setWidth( 'medium' );

      $inputEmail->setReadOnly( $this->isReadOnly( 'email' ) );
      $inputEmail->setData( $this->entity->getData( 'email' ) );
      $inputEmail->setLabel
      (
        $this->view->i18n->l( 'E-Mail', 'wbfsys.role_user.label' ),
        $this->entity->required( 'email' )
      );

      $inputEmail->refresh           = $this->refresh;
      $inputEmail->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Contact' ,
        true
      );


  }//end public function input_email */

 /**
  * create the ui element for field id_person
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_person( $params )
  {

    if( !Webfrap::classLoadable( 'CorePerson_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity CorePerson not exists' );

      Log::warn('Looks like the Entity: CorePerson is missing');

      return;
    }


      //p: Window
      $objidCorePerson = $this->entity->getData('id_person') ;

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

      $inputIdPerson = $this->view->newInput( 'input'.$this->prefix.'IdPerson', 'Window' );
      $inputIdPerson->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_person]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_person'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Person (Role User)', 'wbfsys.role_user.label' ),
      ));

      if( $this->assignedForm )
        $inputIdPerson->assignedForm = $this->assignedForm;

      $inputIdPerson->setWidth( 'medium' );

      $inputIdPerson->setData( $this->entity->getData( 'id_person' )  );
      $inputIdPerson->setReadOnly( $this->isReadOnly( 'id_person' ) );
      $inputIdPerson->setLabel( $this->view->i18n->l( 'Person', 'wbfsys.role_user.label' ) );


      $listUrl = 'modal.php?c=Core.Person.selection&full_load=true'
        .'&amp;key_name=embed_person&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_person'.($this->suffix?'-'.$this->suffix:'');

      $inputIdPerson->setListUrl ( $listUrl );
      $inputIdPerson->setListIcon( 'control/connect.png' );
      $inputIdPerson->setEntityUrl( 'maintab.php?c=Core.Person.edit' );
      $inputIdPerson->conEntity         = $entityCorePerson;
      $inputIdPerson->refresh           = $this->refresh;
      $inputIdPerson->serializeElement  = $this->sendElement;
      


      $inputIdPerson->view = $this->view;
      $inputIdPerson->buildJavascript( 'wgt-input-'.$this->keyName.'_id_person'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdPerson );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_person */

 /**
  * create the ui element for field id_mandant
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_mandant( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysRoleMandant_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysRoleMandant not exists' );

      Log::warn('Looks like the Entity: WbfsysRoleMandant is missing');

      return;
    }


      //p: Window
      $objidWbfsysRoleMandant = $this->entity->getData('id_mandant') ;

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

      $inputIdMandant = $this->view->newInput( 'input'.$this->prefix.'IdMandant', 'Window' );
      $inputIdMandant->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_mandant]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_mandant'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Mandant (Role User)', 'wbfsys.role_user.label' ),
      ));

      if( $this->assignedForm )
        $inputIdMandant->assignedForm = $this->assignedForm;

      $inputIdMandant->setWidth( 'medium' );

      $inputIdMandant->setData( $this->entity->getData( 'id_mandant' )  );
      $inputIdMandant->setReadOnly( $this->isReadOnly( 'id_mandant' ) );
      $inputIdMandant->setLabel( $this->view->i18n->l( 'Mandant', 'wbfsys.role_user.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleMandant.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_mandant'.($this->suffix?'-'.$this->suffix:'');

      $inputIdMandant->setListUrl ( $listUrl );
      $inputIdMandant->setListIcon( 'control/connect.png' );
      $inputIdMandant->setEntityUrl( 'maintab.php?c=Wbfsys.RoleMandant.edit' );
      $inputIdMandant->conEntity         = $entityWbfsysRoleMandant;
      $inputIdMandant->refresh           = $this->refresh;
      $inputIdMandant->serializeElement  = $this->sendElement;
      


      $inputIdMandant->view = $this->view;
      $inputIdMandant->buildJavascript( 'wgt-input-'.$this->keyName.'_id_mandant'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdMandant );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_mandant */
/// windowref to nonexisting hr_employee in LibGenfTreeRootEntity
 /**
  * create the ui element for field password
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_password( $params )
  {

      //tpl: class ui:password
      $inputPassword = $this->view->newInput( 'input'.$this->prefix.'Password', 'Password' );
      $this->items['password'] = $inputPassword;
      $inputPassword->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[password]',
          'id'        => 'wgt-input-'.$this->keyName.'_password'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_password medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Password (Role User)', 'wbfsys.role_user.label' ),
          'maxlength' => $this->entity->maxSize( 'password' ),
        )
      );
      $inputPassword->setWidth( 'medium' );

      $inputPassword->setReadOnly( $this->isReadOnly( 'password' ) );
      $inputPassword->setLabel
      (
        $this->view->i18n->l( 'Password', 'wbfsys.role_user.label' ),
        $this->entity->required( 'password' )
      );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_password */

 /**
  * create the ui element for field reset_pwd_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_reset_pwd_key( $params )
  {

      //tpl: class ui:hidden
      $inputResetPwdKey = $this->view->newInput( 'input'.$this->prefix.'ResetPwdKey', 'Hidden' );
      $this->items['reset_pwd_key'] = $inputResetPwdKey;
      $inputResetPwdKey->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[reset_pwd_key]',
          'id'        => 'wgt-input-'.$this->keyName.'_reset_pwd_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Reset Pwd Key (Role User)', 'wbfsys.role_user.label' ),
          'maxlength' => $this->entity->maxSize( 'reset_pwd_key' ),
        )
      );
      $inputResetPwdKey->setWidth( 'medium' );

      $inputResetPwdKey->setReadOnly( $this->isReadOnly( 'reset_pwd_key' ) );
      $inputResetPwdKey->setData( $this->entity->getSecure( 'reset_pwd_key' ) );
      $inputResetPwdKey->refresh           = $this->refresh;
      $inputResetPwdKey->serializeElement  = $this->sendElement;


  }//end public function input_reset_pwd_key */

 /**
  * create the ui element for field reset_pwd_date
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_reset_pwd_date( $params )
  {

      //tpl: class ui:hidden
      $inputResetPwdDate = $this->view->newInput( 'input'.$this->prefix.'ResetPwdDate', 'Hidden' );
      $this->items['reset_pwd_date'] = $inputResetPwdDate;
      $inputResetPwdDate->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[reset_pwd_date]',
          'id'        => 'wgt-input-'.$this->keyName.'_reset_pwd_date'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Reset Pwd Date (Role User)', 'wbfsys.role_user.label' ),
          'maxlength' => $this->entity->maxSize( 'reset_pwd_date' ),
        )
      );
      $inputResetPwdDate->setWidth( 'medium' );

      $inputResetPwdDate->setReadOnly( $this->isReadOnly( 'reset_pwd_date' ) );
      $inputResetPwdDate->setData( $this->entity->getDate( 'reset_pwd_date' ) );
      $inputResetPwdDate->refresh           = $this->refresh;
      $inputResetPwdDate->serializeElement  = $this->sendElement;


  }//end public function input_reset_pwd_date */

 /**
  * create the ui element for field inactive
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_inactive( $params )
  {

      //tpl: class ui:Checkbox
      $inputInactive = $this->view->newInput( 'input'.$this->prefix.'Inactive' , 'Checkbox' );
      $this->items['inactive'] = $inputInactive;
      $inputInactive->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[inactive]',
          'id'        => 'wgt-input-'.$this->keyName.'_inactive'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Inactive (Role User)', 'wbfsys.role_user.label' ),
        )
      );
      $inputInactive->setWidth( 'medium' );

      $inputInactive->setReadOnly( $this->isReadOnly( 'inactive' ) );
      $inputInactive->setActive( $this->entity->getBoolean( 'inactive' ) );
      $inputInactive->setLabel
      (
        $this->view->i18n->l( 'Inactive', 'wbfsys.role_user.label' ),
        $this->entity->required( 'inactive' )
      );

      $inputInactive->refresh           = $this->refresh;
      $inputInactive->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_inactive */

 /**
  * create the ui element for field non_cert_login
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_non_cert_login( $params )
  {

      //tpl: class ui:Checkbox
      $inputNonCertLogin = $this->view->newInput( 'input'.$this->prefix.'NonCertLogin' , 'Checkbox' );
      $this->items['non_cert_login'] = $inputNonCertLogin;
      $inputNonCertLogin->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[non_cert_login]',
          'id'        => 'wgt-input-'.$this->keyName.'_non_cert_login'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for No Cert required (Role User)', 'wbfsys.role_user.label' ),
        )
      );
      $inputNonCertLogin->setWidth( 'medium' );

      $inputNonCertLogin->setReadOnly( $this->isReadOnly( 'non_cert_login' ) );
      $inputNonCertLogin->setActive( $this->entity->getBoolean( 'non_cert_login' ) );
      $inputNonCertLogin->setLabel
      (
        $this->view->i18n->l( 'No Cert required', 'wbfsys.role_user.label' ),
        $this->entity->required( 'non_cert_login' )
      );

      $inputNonCertLogin->refresh           = $this->refresh;
      $inputNonCertLogin->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_non_cert_login */

 /**
  * create the ui element for field level
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_level( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysSecurityLevelValue_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysSecurityLevelValue_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysSecurityLevelValue_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputLevel = $this->view->newItem( 'input'.$this->prefix.'Level' , 'WbfsysSecurityLevelValue_Selectbox' );
      $this->items['level'] = $inputLevel;
      $inputLevel->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[level]',
          'id'        => 'wgt-input-'.$this->keyName.'_level'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Access Level (Role User)', 'wbfsys.role_user.label' ),
        )
      );
      $inputLevel->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputLevel->assignedForm = $this->assignedForm;

      $inputLevel->setActive( $this->entity->getData( 'level' ) );
      $inputLevel->setReadOnly( $this->isReadOnly( 'level' ) );
      $inputLevel->setLabel
      (
        $this->view->i18n->l( 'Access Level', 'wbfsys.role_user.label' ),
        $this->entity->required( 'level' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputLevel->refresh           = $this->refresh;
        $inputLevel->serializeElement  = $this->sendElement;
        $inputLevel->editUrl = 'index.php?c=Wbfsys.SecurityLevel.listing&amp;target='.$this->namespace.'&amp;field=level&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_level'.$this->suffix;
      }
      // set an empty first entry
      $inputLevel->setFirstFree( 'No Access Level selected' );


      $queryLevel = $this->db->newQuery( 'WbfsysSecurityLevelValue_Selectbox' );
      $queryLevel->fetchSelectbox();
      $inputLevel->setData( $queryLevel->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_level */

 /**
  * create the ui element for field profile
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_profile( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysProfileValue_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysProfileValue_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysProfileValue_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputProfile = $this->view->newItem( 'input'.$this->prefix.'Profile' , 'WbfsysProfileValue_Selectbox' );
      $this->items['profile'] = $inputProfile;
      $inputProfile->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[profile]',
          'id'        => 'wgt-input-'.$this->keyName.'_profile'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Profile (Role User)', 'wbfsys.role_user.label' ),
        )
      );
      $inputProfile->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputProfile->assignedForm = $this->assignedForm;

      $inputProfile->setActive( $this->entity->getData( 'profile' ) );
      $inputProfile->setReadOnly( $this->isReadOnly( 'profile' ) );
      $inputProfile->setLabel
      (
        $this->view->i18n->l( 'Profile', 'wbfsys.role_user.label' ),
        $this->entity->required( 'profile' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_profile:insert' ) )
      {
        $inputProfile->refresh           = $this->refresh;
        $inputProfile->serializeElement  = $this->sendElement;
        $inputProfile->editUrl = 'index.php?c=Wbfsys.Profile.listing&amp;target='.$this->namespace.'&amp;field=profile&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_profile'.$this->suffix;
      }
      // set an empty first entry
      $inputProfile->setFirstFree( 'No Profile selected' );


      $queryProfile = $this->db->newQuery( 'WbfsysProfileValue_Selectbox' );
      $queryProfile->fetchSelectbox();
      $inputProfile->setData( $queryProfile->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_profile */

 /**
  * create the ui element for field id_domain
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_domain( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysDomain_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysDomain not exists' );

      Log::warn('Looks like the Entity: WbfsysDomain is missing');

      return;
    }


      //p: Window
      $objidWbfsysDomain = $this->entity->getData('id_domain') ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysDomain
          || !$entityWbfsysDomain = $this->db->orm->get
          (
            'WbfsysDomain',
            $objidWbfsysDomain
          )
      )
      {
        $entityWbfsysDomain = $this->db->orm->newEntity( 'WbfsysDomain' );
      }

      $inputIdDomain = $this->view->newInput( 'input'.$this->prefix.'IdDomain', 'Window' );
      $inputIdDomain->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_domain]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_domain'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Domain (Role User)', 'wbfsys.role_user.label' ),
      ));

      if( $this->assignedForm )
        $inputIdDomain->assignedForm = $this->assignedForm;

      $inputIdDomain->setWidth( 'medium' );

      $inputIdDomain->setData( $this->entity->getData( 'id_domain' )  );
      $inputIdDomain->setReadOnly( $this->isReadOnly( 'id_domain' ) );
      $inputIdDomain->setLabel( $this->view->i18n->l( 'Domain', 'wbfsys.role_user.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Domain.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_domain'.($this->suffix?'-'.$this->suffix:'');

      $inputIdDomain->setListUrl ( $listUrl );
      $inputIdDomain->setListIcon( 'control/connect.png' );
      $inputIdDomain->setEntityUrl( 'maintab.php?c=Wbfsys.Domain.edit' );
      $inputIdDomain->conEntity         = $entityWbfsysDomain;
      $inputIdDomain->refresh           = $this->refresh;
      $inputIdDomain->serializeElement  = $this->sendElement;
      


      $inputIdDomain->view = $this->view;
      $inputIdDomain->buildJavascript( 'wgt-input-'.$this->keyName.'_id_domain'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdDomain );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_domain */

 /**
  * create the ui element for field type
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_type( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysUserType_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysUserType_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysUserType_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputType = $this->view->newItem( 'input'.$this->prefix.'Type' , 'WbfsysUserType_Selectbox' );
      $this->items['type'] = $inputType;
      $inputType->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[type]',
          'id'        => 'wgt-input-'.$this->keyName.'_type'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Type (Role User)', 'wbfsys.role_user.label' ),
        )
      );
      $inputType->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputType->assignedForm = $this->assignedForm;

      $inputType->setActive( $this->entity->getData( 'type' ) );
      $inputType->setReadOnly( $this->isReadOnly( 'type' ) );
      $inputType->setLabel
      (
        $this->view->i18n->l( 'Type', 'wbfsys.role_user.label' ),
        $this->entity->required( 'type' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-crm>mgmt-crm_contact_calls:insert' ) )
      {
        $inputType->refresh           = $this->refresh;
        $inputType->serializeElement  = $this->sendElement;
        $inputType->editUrl = 'index.php?c=Crm.ContactCalls.listing&amp;target='.$this->namespace.'&amp;field=type&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_type'.$this->suffix;
      }
      // set an empty first entry
      $inputType->setFirstFree( 'No Type selected' );



      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_type */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_description( $params )
  {

      //p: textarea
      $inputDescription = $this->view->newInput( 'input'.$this->prefix.'Description', 'Textarea' );
      $this->items['description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => $this->keyName.'[description]',
          'id'    => 'wgt-input-'.$this->keyName.'_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $this->view->i18n->l( 'Insert value for Description (Role User)', 'wbfsys.role_user.label' ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setData( $this->entity->getSecure('description') );
      $inputDescription->setReadOnly( $this->isReadOnly( 'description' ) );
      $inputDescription->setLabel
      (
        $this->view->i18n->l( 'Description', 'wbfsys.role_user.label' ),
        $this->entity->required( 'description' )
      );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_description */

 /**
  * create the ui element for field last_login
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_last_login( $params )
  {

      //tpl: class ui:timestamp
      $inputLastLogin = $this->view->newInput( 'input'.$this->prefix.'LastLogin' , 'Timestamp' );
      $this->items['last_login'] = $inputLastLogin;
      $inputLastLogin->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[last_login]',
          'id'        => 'wgt-input-'.$this->keyName.'_last_login'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Last Login (Role User)', 'wbfsys.role_user.label' ),
          'maxlength' => $this->entity->maxSize( 'last_login' ),
        )
      );
      $inputLastLogin->setWidth( 'medium' );

      $inputLastLogin->setReadOnly( $this->isReadOnly( 'last_login' ) );
      $inputLastLogin->setData( $this->entity->getTimestamp( 'last_login' ) );
      $inputLastLogin->setLabel
      (
        $this->view->i18n->l( 'Last Login', 'wbfsys.role_user.label' ),
        $this->entity->required( 'last_login' )
      );

      $inputLastLogin->refresh           = $this->refresh;
      $inputLastLogin->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_last_login */

 /**
  * create the ui element for field change_password
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_change_password( $params )
  {

      //tpl: class ui:date
      $inputChangePassword = $this->view->newInput( 'input'.$this->prefix.'ChangePassword' , 'Date' );
      $this->items['change_password'] = $inputChangePassword;
      $inputChangePassword->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[change_password]',
          'id'        => 'wgt-input-'.$this->keyName.'_change_password'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Change Password (Role User)', 'wbfsys.role_user.label' ),
          'maxlength' => $this->entity->maxSize( 'change_password' ),
        )
      );
      $inputChangePassword->setWidth( 'small' );

      $inputChangePassword->setReadOnly( $this->isReadOnly( 'change_password' ) );
      $inputChangePassword->setData( $this->entity->getDate( 'change_password' ) );
      $inputChangePassword->setLabel
      (
        $this->view->i18n->l( 'Change Password', 'wbfsys.role_user.label' ),
        $this->entity->required( 'change_password' )
      );

      $inputChangePassword->refresh           = $this->refresh;
      $inputChangePassword->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_change_password */

 /**
  * create the ui element for field salt_password
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_salt_password( $params )
  {

      //tpl: class ui:hidden
      $inputSaltPassword = $this->view->newInput( 'input'.$this->prefix.'SaltPassword', 'Hidden' );
      $this->items['salt_password'] = $inputSaltPassword;
      $inputSaltPassword->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[salt_password]',
          'id'        => 'wgt-input-'.$this->keyName.'_salt_password'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Salt Password (Role User)', 'wbfsys.role_user.label' ),
          'maxlength' => $this->entity->maxSize( 'salt_password' ),
        )
      );
      $inputSaltPassword->setWidth( 'medium' );

      $inputSaltPassword->setReadOnly( $this->isReadOnly( 'salt_password' ) );
      $inputSaltPassword->setData( $this->entity->getSecure( 'salt_password' ) );
      $inputSaltPassword->refresh           = $this->refresh;
      $inputSaltPassword->serializeElement  = $this->sendElement;


  }//end public function input_salt_password */

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
          'title'     => $this->view->i18n->l( 'Insert value for Rowid (Role User)', 'wbfsys.role_user.label' ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadOnly( $this->isReadOnly( 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel
      (
        $this->view->i18n->l( 'Rowid', 'wbfsys.role_user.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Time Created (Role User)', 'wbfsys.role_user.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadOnly( true );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel
      (
        $this->view->i18n->l( 'Time Created', 'wbfsys.role_user.label' ),
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
        'title'     => $this->view->i18n->l( 'Insert value for Role Create (Role User)', 'wbfsys.role_user.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadOnly( true );
      $inputMRoleCreate->setLabel( $this->view->i18n->l( 'Role Create', 'wbfsys.role_user.label' ) );


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
          'title'     => $this->view->i18n->l( 'Insert value for Time Changed (Role User)', 'wbfsys.role_user.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadOnly( true );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel
      (
        $this->view->i18n->l( 'Time Changed', 'wbfsys.role_user.label' ),
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
        'title'     => $this->view->i18n->l( 'Insert value for Role Change (Role User)', 'wbfsys.role_user.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadOnly( true );
      $inputMRoleChange->setLabel( $this->view->i18n->l( 'Role Change', 'wbfsys.role_user.label' ) );


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
          'title'     => $this->view->i18n->l( 'Insert value for Version (Role User)', 'wbfsys.role_user.label' ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadOnly( true );
      $inputMVersion->setData( $this->entity->getSecure('m_version') );
      $inputMVersion->setLabel
      (
        $this->view->i18n->l( 'Version', 'wbfsys.role_user.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Uuid (Role User)', 'wbfsys.role_user.label' ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadOnly( true );
      $inputMUuid->setData( $this->entity->getSecure('m_uuid') );
      $inputMUuid->setLabel
      (
        $this->view->i18n->l( 'Uuid', 'wbfsys.role_user.label' ),
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
          'title'     => $this->view->i18n->l( 'Search for Name (Role User)', 'wbfsys.role_user.label' ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadOnly( $this->isReadOnly( 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel
      (
        $this->view->i18n->l( 'Name', 'wbfsys.role_user.label' ),
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
  * create the search element for field email
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_email( $params )
  {

      //tpl: class ui:email
      $inputEmail = $this->view->newInput( 'input'.$this->prefix.'Email', 'Email' );
      $this->items['email'] = $inputEmail;
      $inputEmail->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[email]',
          'id'        => 'wgt-input-'.$this->keyName.'_email'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for E-Mail (Role User)', 'wbfsys.role_user.label' ),
          'maxlength' => $this->entity->maxSize( 'email' ),
        )
      );
      $inputEmail->setWidth( 'medium' );

      $inputEmail->setReadOnly( $this->isReadOnly( 'email' ) );
      $inputEmail->setData( $this->entity->getData( 'email' ) );
      $inputEmail->setLabel
      (
        $this->view->i18n->l( 'E-Mail', 'wbfsys.role_user.label' ),
        $this->entity->required( 'email' )
      );

      $inputEmail->refresh           = $this->refresh;
      $inputEmail->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Contact' ,
        true
      );


  }//end public function search_email */

 /**
  * create the search element for field level
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_level( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysSecurityLevelValue_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysSecurityLevelValue_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysSecurityLevelValue_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputLevel = $this->view->newItem( 'input'.$this->prefix.'Level' , 'WbfsysSecurityLevelValue_Selectbox' );
      $this->items['level'] = $inputLevel;
      $inputLevel->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[level]',
          'id'        => 'wgt-input-'.$this->keyName.'_level'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Access Level (Role User)', 'wbfsys.role_user.label' ),
        )
      );
      $inputLevel->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputLevel->assignedForm = $this->assignedForm;

      $inputLevel->setActive( $this->entity->getData( 'level' ) );
      $inputLevel->setReadOnly( $this->isReadOnly( 'level' ) );
      $inputLevel->setLabel
      (
        $this->view->i18n->l( 'Access Level', 'wbfsys.role_user.label' ),
        $this->entity->required( 'level' )
      );

      // set an empty first entry
      $inputLevel->setFirstFree( 'No Access Level selected' );


      $queryLevel = $this->db->newQuery( 'WbfsysSecurityLevelValue_Selectbox' );
      $queryLevel->fetchSelectbox();
      $inputLevel->setData( $queryLevel->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );




  }//end public function search_level */

 /**
  * create the search element for field profile
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_profile( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysProfileValue_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysProfileValue_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysProfileValue_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputProfile = $this->view->newItem( 'input'.$this->prefix.'Profile' , 'WbfsysProfileValue_Selectbox' );
      $this->items['profile'] = $inputProfile;
      $inputProfile->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[profile]',
          'id'        => 'wgt-input-'.$this->keyName.'_profile'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Profile (Role User)', 'wbfsys.role_user.label' ),
        )
      );
      $inputProfile->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputProfile->assignedForm = $this->assignedForm;

      $inputProfile->setActive( $this->entity->getData( 'profile' ) );
      $inputProfile->setReadOnly( $this->isReadOnly( 'profile' ) );
      $inputProfile->setLabel
      (
        $this->view->i18n->l( 'Profile', 'wbfsys.role_user.label' ),
        $this->entity->required( 'profile' )
      );

      // set an empty first entry
      $inputProfile->setFirstFree( 'No Profile selected' );


      $queryProfile = $this->db->newQuery( 'WbfsysProfileValue_Selectbox' );
      $queryProfile->fetchSelectbox();
      $inputProfile->setData( $queryProfile->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );




  }//end public function search_profile */

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

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_role_user_m_role_create';

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

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_role_user_m_role_change';

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




}//end class WbfsysRoleUser_Form */


