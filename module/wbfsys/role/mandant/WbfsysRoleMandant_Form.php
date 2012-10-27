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
class WbfsysRoleMandant_Form
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
  public $keyName     = 'wbfsys_role_mandant';

  /**
   * the cname for the entities, is used to request metadata from the orm
   * @setter WgtForm::setEntityName()
   * @getter WgtForm::getEntityName()
   * @var string 
   */
  public $entityName  = 'WbfsysRoleMandant';

  /**
   * namespace for the actual form
   * @setter WgtForm::setNamespace()
   * @getter WgtForm::getNamespace()
   * @var string 
   */
  public $namespace  = 'WbfsysRoleMandant';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtForm::setPrefix()
   * @getter WgtForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysRoleMandant';

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
   * @var WbfsysRoleMandant_Entity 
   */
  public $entity      = null;
  
////////////////////////////////////////////////////////////////////////////////
// form methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysRoleMandant entity
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
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysRoleMandant' );
      }
    }

  }//end public function createForm */

 /**
  * create a search form for the WbfsysRoleMandant entity
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
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysRoleMandant' );
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
          'title'     => $this->view->i18n->l( 'Insert value for Name (Role Mandant)', 'wbfsys.role_mandant.label' ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadOnly( $this->isReadOnly( 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel
      (
        $this->view->i18n->l( 'Name', 'wbfsys.role_mandant.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Password (Role Mandant)', 'wbfsys.role_mandant.label' ),
          'maxlength' => $this->entity->maxSize( 'password' ),
        )
      );
      $inputPassword->setWidth( 'medium' );

      $inputPassword->setReadOnly( $this->isReadOnly( 'password' ) );
      $inputPassword->setLabel
      (
        $this->view->i18n->l( 'Password', 'wbfsys.role_mandant.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Reset Pwd Key (Role Mandant)', 'wbfsys.role_mandant.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Reset Pwd Date (Role Mandant)', 'wbfsys.role_mandant.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Inactive (Role Mandant)', 'wbfsys.role_mandant.label' ),
        )
      );
      $inputInactive->setWidth( 'medium' );

      $inputInactive->setReadOnly( $this->isReadOnly( 'inactive' ) );
      $inputInactive->setActive( $this->entity->getBoolean( 'inactive' ) );
      $inputInactive->setLabel
      (
        $this->view->i18n->l( 'Inactive', 'wbfsys.role_mandant.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for No Cert required (Role Mandant)', 'wbfsys.role_mandant.label' ),
        )
      );
      $inputNonCertLogin->setWidth( 'medium' );

      $inputNonCertLogin->setReadOnly( $this->isReadOnly( 'non_cert_login' ) );
      $inputNonCertLogin->setActive( $this->entity->getBoolean( 'non_cert_login' ) );
      $inputNonCertLogin->setLabel
      (
        $this->view->i18n->l( 'No Cert required', 'wbfsys.role_mandant.label' ),
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
  * create the ui element for field def_level
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_def_level( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysSecurityLevelValue_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysSecurityLevelValue_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysSecurityLevelValue_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputDefLevel = $this->view->newItem( 'input'.$this->prefix.'DefLevel' , 'WbfsysSecurityLevelValue_Selectbox' );
      $this->items['def_level'] = $inputDefLevel;
      $inputDefLevel->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[def_level]',
          'id'        => 'wgt-input-'.$this->keyName.'_def_level'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Access Level (Role Mandant)', 'wbfsys.role_mandant.label' ),
        )
      );
      $inputDefLevel->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputDefLevel->assignedForm = $this->assignedForm;

      $inputDefLevel->setActive( $this->entity->getData( 'def_level' ) );
      $inputDefLevel->setReadOnly( $this->isReadOnly( 'def_level' ) );
      $inputDefLevel->setLabel
      (
        $this->view->i18n->l( 'Access Level', 'wbfsys.role_mandant.label' ),
        $this->entity->required( 'def_level' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputDefLevel->refresh           = $this->refresh;
        $inputDefLevel->serializeElement  = $this->sendElement;
        $inputDefLevel->editUrl = 'index.php?c=Wbfsys.SecurityLevel.listing&amp;target='.$this->namespace.'&amp;field=def_level&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_def_level'.$this->suffix;
      }
      // set an empty first entry
      $inputDefLevel->setFirstFree( 'No Access Level selected' );


      $queryDefLevel = $this->db->newQuery( 'WbfsysSecurityLevelValue_Selectbox' );
      $queryDefLevel->fetchSelectbox();
      $inputDefLevel->setData( $queryDefLevel->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_def_level */

 /**
  * create the ui element for field def_profile
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_def_profile( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysProfileValue_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysProfileValue_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysProfileValue_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputDefProfile = $this->view->newItem( 'input'.$this->prefix.'DefProfile' , 'WbfsysProfileValue_Selectbox' );
      $this->items['def_profile'] = $inputDefProfile;
      $inputDefProfile->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[def_profile]',
          'id'        => 'wgt-input-'.$this->keyName.'_def_profile'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Profile (Role Mandant)', 'wbfsys.role_mandant.label' ),
        )
      );
      $inputDefProfile->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputDefProfile->assignedForm = $this->assignedForm;

      $inputDefProfile->setActive( $this->entity->getData( 'def_profile' ) );
      $inputDefProfile->setReadOnly( $this->isReadOnly( 'def_profile' ) );
      $inputDefProfile->setLabel
      (
        $this->view->i18n->l( 'Profile', 'wbfsys.role_mandant.label' ),
        $this->entity->required( 'def_profile' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_profile:insert' ) )
      {
        $inputDefProfile->refresh           = $this->refresh;
        $inputDefProfile->serializeElement  = $this->sendElement;
        $inputDefProfile->editUrl = 'index.php?c=Wbfsys.Profile.listing&amp;target='.$this->namespace.'&amp;field=def_profile&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_def_profile'.$this->suffix;
      }
      // set an empty first entry
      $inputDefProfile->setFirstFree( 'No Profile selected' );


      $queryDefProfile = $this->db->newQuery( 'WbfsysProfileValue_Selectbox' );
      $queryDefProfile->fetchSelectbox();
      $inputDefProfile->setData( $queryDefProfile->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_def_profile */

 /**
  * create the ui element for field id_theme_icon
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_theme_icon( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysThemeIcon_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysThemeIcon_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysThemeIcon_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdThemeIcon = $this->view->newItem( 'input'.$this->prefix.'IdThemeIcon' , 'WbfsysThemeIcon_Selectbox' );
      $this->items['id_theme_icon'] = $inputIdThemeIcon;
      $inputIdThemeIcon->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_theme_icon]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_theme_icon'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Theme Icon (Role Mandant)', 'wbfsys.role_mandant.label' ),
        )
      );
      $inputIdThemeIcon->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdThemeIcon->assignedForm = $this->assignedForm;

      $inputIdThemeIcon->setActive( $this->entity->getData( 'id_theme_icon' ) );
      $inputIdThemeIcon->setReadOnly( $this->isReadOnly( 'id_theme_icon' ) );
      $inputIdThemeIcon->setLabel
      (
        $this->view->i18n->l( 'Theme Icon', 'wbfsys.role_mandant.label' ),
        $this->entity->required( 'id_theme_icon' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdThemeIcon->refresh           = $this->refresh;
        $inputIdThemeIcon->serializeElement  = $this->sendElement;
        $inputIdThemeIcon->editUrl = 'index.php?c=Wbfsys.ThemeIcon.listing&amp;target='.$this->namespace.'&amp;field=id_theme_icon&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_id_theme_icon'.$this->suffix;
      }
      // set an empty first entry
      $inputIdThemeIcon->setFirstFree( 'No Theme Icon selected' );


      $queryIdThemeIcon = $this->db->newQuery( 'WbfsysThemeIcon_Selectbox' );
      $queryIdThemeIcon->fetchSelectbox();
      $inputIdThemeIcon->setData( $queryIdThemeIcon->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_id_theme_icon */

 /**
  * create the ui element for field id_theme_layout
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_theme_layout( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysThemeLayout_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysThemeLayout_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysThemeLayout_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdThemeLayout = $this->view->newItem( 'input'.$this->prefix.'IdThemeLayout' , 'WbfsysThemeLayout_Selectbox' );
      $this->items['id_theme_layout'] = $inputIdThemeLayout;
      $inputIdThemeLayout->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_theme_layout]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_theme_layout'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Theme Layout (Role Mandant)', 'wbfsys.role_mandant.label' ),
        )
      );
      $inputIdThemeLayout->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdThemeLayout->assignedForm = $this->assignedForm;

      $inputIdThemeLayout->setActive( $this->entity->getData( 'id_theme_layout' ) );
      $inputIdThemeLayout->setReadOnly( $this->isReadOnly( 'id_theme_layout' ) );
      $inputIdThemeLayout->setLabel
      (
        $this->view->i18n->l( 'Theme Layout', 'wbfsys.role_mandant.label' ),
        $this->entity->required( 'id_theme_layout' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdThemeLayout->refresh           = $this->refresh;
        $inputIdThemeLayout->serializeElement  = $this->sendElement;
        $inputIdThemeLayout->editUrl = 'index.php?c=Wbfsys.ThemeLayout.listing&amp;target='.$this->namespace.'&amp;field=id_theme_layout&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_id_theme_layout'.$this->suffix;
      }
      // set an empty first entry
      $inputIdThemeLayout->setFirstFree( 'No Theme Layout selected' );


      $queryIdThemeLayout = $this->db->newQuery( 'WbfsysThemeLayout_Selectbox' );
      $queryIdThemeLayout->fetchSelectbox();
      $inputIdThemeLayout->setData( $queryIdThemeLayout->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_id_theme_layout */

 /**
  * create the ui element for field type
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_type( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysMandantType_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysMandantType_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysMandantType_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputType = $this->view->newItem( 'input'.$this->prefix.'Type' , 'WbfsysMandantType_Selectbox' );
      $this->items['type'] = $inputType;
      $inputType->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[type]',
          'id'        => 'wgt-input-'.$this->keyName.'_type'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Type (Role Mandant)', 'wbfsys.role_mandant.label' ),
        )
      );
      $inputType->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputType->assignedForm = $this->assignedForm;

      $inputType->setActive( $this->entity->getData( 'type' ) );
      $inputType->setReadOnly( $this->isReadOnly( 'type' ) );
      $inputType->setLabel
      (
        $this->view->i18n->l( 'Type', 'wbfsys.role_mandant.label' ),
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
          'title' => $this->view->i18n->l( 'Insert value for Description (Role Mandant)', 'wbfsys.role_mandant.label' ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setData( $this->entity->getSecure('description') );
      $inputDescription->setReadOnly( $this->isReadOnly( 'description' ) );
      $inputDescription->setLabel
      (
        $this->view->i18n->l( 'Description', 'wbfsys.role_mandant.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Change Password (Role Mandant)', 'wbfsys.role_mandant.label' ),
          'maxlength' => $this->entity->maxSize( 'change_password' ),
        )
      );
      $inputChangePassword->setWidth( 'small' );

      $inputChangePassword->setReadOnly( $this->isReadOnly( 'change_password' ) );
      $inputChangePassword->setData( $this->entity->getDate( 'change_password' ) );
      $inputChangePassword->setLabel
      (
        $this->view->i18n->l( 'Change Password', 'wbfsys.role_mandant.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Salt Password (Role Mandant)', 'wbfsys.role_mandant.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Rowid (Role Mandant)', 'wbfsys.role_mandant.label' ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadOnly( $this->isReadOnly( 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel
      (
        $this->view->i18n->l( 'Rowid', 'wbfsys.role_mandant.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Time Created (Role Mandant)', 'wbfsys.role_mandant.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadOnly( true );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel
      (
        $this->view->i18n->l( 'Time Created', 'wbfsys.role_mandant.label' ),
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
        'title'     => $this->view->i18n->l( 'Insert value for Role Create (Role Mandant)', 'wbfsys.role_mandant.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadOnly( true );
      $inputMRoleCreate->setLabel( $this->view->i18n->l( 'Role Create', 'wbfsys.role_mandant.label' ) );


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
          'title'     => $this->view->i18n->l( 'Insert value for Time Changed (Role Mandant)', 'wbfsys.role_mandant.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadOnly( true );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel
      (
        $this->view->i18n->l( 'Time Changed', 'wbfsys.role_mandant.label' ),
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
        'title'     => $this->view->i18n->l( 'Insert value for Role Change (Role Mandant)', 'wbfsys.role_mandant.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadOnly( true );
      $inputMRoleChange->setLabel( $this->view->i18n->l( 'Role Change', 'wbfsys.role_mandant.label' ) );


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
          'title'     => $this->view->i18n->l( 'Insert value for Version (Role Mandant)', 'wbfsys.role_mandant.label' ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadOnly( true );
      $inputMVersion->setData( $this->entity->getSecure('m_version') );
      $inputMVersion->setLabel
      (
        $this->view->i18n->l( 'Version', 'wbfsys.role_mandant.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Uuid (Role Mandant)', 'wbfsys.role_mandant.label' ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadOnly( true );
      $inputMUuid->setData( $this->entity->getSecure('m_uuid') );
      $inputMUuid->setLabel
      (
        $this->view->i18n->l( 'Uuid', 'wbfsys.role_mandant.label' ),
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
          'title'     => $this->view->i18n->l( 'Search for Name (Role Mandant)', 'wbfsys.role_mandant.label' ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadOnly( $this->isReadOnly( 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel
      (
        $this->view->i18n->l( 'Name', 'wbfsys.role_mandant.label' ),
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
  * create the search element for field def_level
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_def_level( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysSecurityLevelValue_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysSecurityLevelValue_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysSecurityLevelValue_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputDefLevel = $this->view->newItem( 'input'.$this->prefix.'DefLevel' , 'WbfsysSecurityLevelValue_Selectbox' );
      $this->items['def_level'] = $inputDefLevel;
      $inputDefLevel->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[def_level]',
          'id'        => 'wgt-input-'.$this->keyName.'_def_level'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Access Level (Role Mandant)', 'wbfsys.role_mandant.label' ),
        )
      );
      $inputDefLevel->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputDefLevel->assignedForm = $this->assignedForm;

      $inputDefLevel->setActive( $this->entity->getData( 'def_level' ) );
      $inputDefLevel->setReadOnly( $this->isReadOnly( 'def_level' ) );
      $inputDefLevel->setLabel
      (
        $this->view->i18n->l( 'Access Level', 'wbfsys.role_mandant.label' ),
        $this->entity->required( 'def_level' )
      );

      // set an empty first entry
      $inputDefLevel->setFirstFree( 'No Access Level selected' );


      $queryDefLevel = $this->db->newQuery( 'WbfsysSecurityLevelValue_Selectbox' );
      $queryDefLevel->fetchSelectbox();
      $inputDefLevel->setData( $queryDefLevel->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );




  }//end public function search_def_level */

 /**
  * create the search element for field def_profile
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_def_profile( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysProfileValue_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysProfileValue_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysProfileValue_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputDefProfile = $this->view->newItem( 'input'.$this->prefix.'DefProfile' , 'WbfsysProfileValue_Selectbox' );
      $this->items['def_profile'] = $inputDefProfile;
      $inputDefProfile->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[def_profile]',
          'id'        => 'wgt-input-'.$this->keyName.'_def_profile'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Profile (Role Mandant)', 'wbfsys.role_mandant.label' ),
        )
      );
      $inputDefProfile->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputDefProfile->assignedForm = $this->assignedForm;

      $inputDefProfile->setActive( $this->entity->getData( 'def_profile' ) );
      $inputDefProfile->setReadOnly( $this->isReadOnly( 'def_profile' ) );
      $inputDefProfile->setLabel
      (
        $this->view->i18n->l( 'Profile', 'wbfsys.role_mandant.label' ),
        $this->entity->required( 'def_profile' )
      );

      // set an empty first entry
      $inputDefProfile->setFirstFree( 'No Profile selected' );


      $queryDefProfile = $this->db->newQuery( 'WbfsysProfileValue_Selectbox' );
      $queryDefProfile->fetchSelectbox();
      $inputDefProfile->setData( $queryDefProfile->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );




  }//end public function search_def_profile */

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

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_role_mandant_m_role_create';

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

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_role_mandant_m_role_change';

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




}//end class WbfsysRoleMandant_Form */


