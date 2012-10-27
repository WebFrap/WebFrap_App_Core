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
class WbfsysRoleMandant_Crud_Edit_Form
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
  public $namespace  = 'WbfsysRoleMandant';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysRoleMandant';

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
      'wbfsys_role_mandant' => array
      (
        'name' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'password' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '64',
        ),
        'reset_pwd_key' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '50',
        ),
        'reset_pwd_date' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'inactive' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'non_cert_login' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'def_level' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'def_profile' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'id_theme_icon' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_theme_layout' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'type' => array
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
        'change_password' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'salt_password' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '10',
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
   * @var WbfsysRoleMandant_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysRoleMandant_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysRoleMandant_Entity $entity
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
      'wbfsys_role_mandant' => array
      (
        'name',
        'password',
        'reset_pwd_key',
        'reset_pwd_date',
        'inactive',
        'non_cert_login',
        'def_level',
        'def_profile',
        'id_theme_icon',
        'id_theme_layout',
        'type',
        'description',
        'change_password',
        'salt_password',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysRoleMandant entity
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
    $this->view->addVar( 'entityWbfsysRoleMandant', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_role_mandant'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_role_mandant[id_wbfsys_role_mandant-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysRoleMandant_Name( $params );
    $this->input_WbfsysRoleMandant_Password( $params );
    $this->input_WbfsysRoleMandant_ResetPwdKey( $params );
    $this->input_WbfsysRoleMandant_ResetPwdDate( $params );
    $this->input_WbfsysRoleMandant_Inactive( $params );
    $this->input_WbfsysRoleMandant_NonCertLogin( $params );
    $this->input_WbfsysRoleMandant_DefLevel( $params );
    $this->input_WbfsysRoleMandant_DefProfile( $params );
    $this->input_WbfsysRoleMandant_IdThemeIcon( $params );
    $this->input_WbfsysRoleMandant_IdThemeLayout( $params );
    $this->input_WbfsysRoleMandant_Type( $params );
    $this->input_WbfsysRoleMandant_Description( $params );
    $this->input_WbfsysRoleMandant_ChangePassword( $params );
    $this->input_WbfsysRoleMandant_SaltPassword( $params );
    $this->input_WbfsysRoleMandant_Rowid( $params );
    $this->input_WbfsysRoleMandant_MTimeCreated( $params );
    $this->input_WbfsysRoleMandant_MRoleCreate( $params );
    $this->input_WbfsysRoleMandant_MTimeChanged( $params );
    $this->input_WbfsysRoleMandant_MRoleChange( $params );
    $this->input_WbfsysRoleMandant_MVersion( $params );
    $this->input_WbfsysRoleMandant_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_Name( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputName = $this->view->newInput( 'inputWbfsysRoleMandantName' , 'Text' );
      $this->items['wbfsys_role_mandant-name'] = $inputName;
      $inputName->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_mandant[name]',
          'id'        => 'wgt-input-wbfsys_role_mandant_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Name', 'src' => 'Role Mandant' ) ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadonly( $this->fieldReadOnly( 'wbfsys_role_mandant', 'name' ) );
      $inputName->setRequired( $this->fieldRequired( 'wbfsys_role_mandant', 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel( $i18n->l( 'Name', 'wbfsys.role_mandant.label' ) );

      $inputName->refresh           = $this->refresh;
      $inputName->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysRoleMandant_Name */

 /**
  * create the ui element for field password
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_Password( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:password
      $inputPassword = $this->view->newInput( 'inputWbfsysRoleMandantPassword', 'Password' );
      $this->items['wbfsys_role_mandant-password'] = $inputPassword;
      $inputPassword->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_mandant[password]',
          'id'        => 'wgt-input-wbfsys_role_mandant_password'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_password medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Password', 'src' => 'Role Mandant' ) ),
          'maxlength' => $this->entity->maxSize( 'password' ),
        )
      );
      $inputPassword->setWidth( 'medium' );

      $inputPassword->setReadonly( $this->fieldReadOnly( 'wbfsys_role_mandant', 'password' ) );
      $inputPassword->setRequired( $this->fieldRequired( 'wbfsys_role_mandant', 'password' ) );
      $inputPassword->setLabel( $i18n->l( 'Password', 'wbfsys.role_mandant.label' ) );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysRoleMandant_Password */

 /**
  * create the ui element for field reset_pwd_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_ResetPwdKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputResetPwdKey = $this->view->newInput( 'inputWbfsysRoleMandantResetPwdKey', 'Hidden' );
      $this->items['wbfsys_role_mandant-reset_pwd_key'] = $inputResetPwdKey;
      $inputResetPwdKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_mandant[reset_pwd_key]',
          'id'        => 'wgt-input-wbfsys_role_mandant_reset_pwd_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Reset Pwd Key', 'src' => 'Role Mandant' ) ),
          'maxlength' => $this->entity->maxSize( 'reset_pwd_key' ),
        )
      );
      $inputResetPwdKey->setWidth( 'medium' );

      $inputResetPwdKey->setData( $this->entity->getSecure( 'reset_pwd_key' ) );
      $inputResetPwdKey->refresh           = $this->refresh;
      $inputResetPwdKey->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysRoleMandant_ResetPwdKey */

 /**
  * create the ui element for field reset_pwd_date
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_ResetPwdDate( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputResetPwdDate = $this->view->newInput( 'inputWbfsysRoleMandantResetPwdDate', 'Hidden' );
      $this->items['wbfsys_role_mandant-reset_pwd_date'] = $inputResetPwdDate;
      $inputResetPwdDate->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_mandant[reset_pwd_date]',
          'id'        => 'wgt-input-wbfsys_role_mandant_reset_pwd_date'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Reset Pwd Date', 'src' => 'Role Mandant' ) ),
          'maxlength' => $this->entity->maxSize( 'reset_pwd_date' ),
        )
      );
      $inputResetPwdDate->setWidth( 'medium' );

      $inputResetPwdDate->setData( $this->entity->getDate( 'reset_pwd_date' ) );
      $inputResetPwdDate->refresh           = $this->refresh;
      $inputResetPwdDate->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysRoleMandant_ResetPwdDate */

 /**
  * create the ui element for field inactive
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_Inactive( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputInactive = $this->view->newInput( 'inputWbfsysRoleMandantInactive', 'Checkbox' );
      $this->items['wbfsys_role_mandant-inactive'] = $inputInactive;
      $inputInactive->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_mandant[inactive]',
          'id'        => 'wgt-input-wbfsys_role_mandant_inactive'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Inactive', 'src' => 'Role Mandant' ) ),
        )
      );
      $inputInactive->setWidth( 'medium' );

      $inputInactive->setReadonly( $this->fieldReadOnly( 'wbfsys_role_mandant', 'inactive' ) );
      $inputInactive->setRequired( $this->fieldRequired( 'wbfsys_role_mandant', 'inactive' ) );
      $inputInactive->setActive( $this->entity->getBoolean( 'inactive' ) );
      $inputInactive->setLabel( $i18n->l( 'Inactive', 'wbfsys.role_mandant.label' ) );

      $inputInactive->refresh           = $this->refresh;
      $inputInactive->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysRoleMandant_Inactive */

 /**
  * create the ui element for field non_cert_login
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_NonCertLogin( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputNonCertLogin = $this->view->newInput( 'inputWbfsysRoleMandantNonCertLogin', 'Checkbox' );
      $this->items['wbfsys_role_mandant-non_cert_login'] = $inputNonCertLogin;
      $inputNonCertLogin->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_mandant[non_cert_login]',
          'id'        => 'wgt-input-wbfsys_role_mandant_non_cert_login'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'No Cert required', 'src' => 'Role Mandant' ) ),
        )
      );
      $inputNonCertLogin->setWidth( 'medium' );

      $inputNonCertLogin->setReadonly( $this->fieldReadOnly( 'wbfsys_role_mandant', 'non_cert_login' ) );
      $inputNonCertLogin->setRequired( $this->fieldRequired( 'wbfsys_role_mandant', 'non_cert_login' ) );
      $inputNonCertLogin->setActive( $this->entity->getBoolean( 'non_cert_login' ) );
      $inputNonCertLogin->setLabel( $i18n->l( 'No Cert required', 'wbfsys.role_mandant.label' ) );

      $inputNonCertLogin->refresh           = $this->refresh;
      $inputNonCertLogin->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysRoleMandant_NonCertLogin */

 /**
  * create the ui element for field def_level
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_DefLevel( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_role_mandant_def_level'] ) )
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
      $inputDefLevel = $this->view->newItem( 'inputWbfsysRoleMandantDefLevel', 'WbfsysSecurityLevelValue_Selectbox' );
      $this->items['wbfsys_role_mandant-def_level'] = $inputDefLevel;
      $inputDefLevel->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_mandant[def_level]',
          'id'        => 'wgt-input-wbfsys_role_mandant_def_level'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Level', 'src' => 'Role Mandant' ) ),
        )
      );
      $inputDefLevel->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputDefLevel->assignedForm = $this->assignedForm;

      $inputDefLevel->setActive( $this->entity->getData( 'def_level' ) );
      $inputDefLevel->setReadonly( $this->fieldReadOnly( 'wbfsys_role_mandant', 'def_level' ) );
      $inputDefLevel->setRequired( $this->fieldRequired( 'wbfsys_role_mandant', 'def_level' ) );


      $inputDefLevel->setLabel( $i18n->l( 'Access Level', 'wbfsys.role_mandant.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputDefLevel->refresh           = $this->refresh;
        $inputDefLevel->serializeElement  = $this->sendElement;
        $inputDefLevel->editUrl = 'index.php?c=Wbfsys.SecurityLevel.listing&amp;target='.$this->namespace.'&amp;field=def_level&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_role_mandant_def_level'.$this->suffix;
      }
      // set an empty first entry
      $inputDefLevel->setFirstFree( 'No Access Level selected' );

      
      $queryDefLevel = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_role_mandant_def_level'] ) )
      {
      
        $queryDefLevel = $this->db->newQuery( 'WbfsysSecurityLevelValue_Selectbox' );

        $queryDefLevel->fetchSelectbox();
        $inputDefLevel->setData( $queryDefLevel->getAll() );
      
      }
      else
      {
        $inputDefLevel->setData( $this->listElementData['wbfsys_role_mandant_def_level'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryDefLevel )
        $queryDefLevel = $this->db->newQuery( 'WbfsysSecurityLevelValue_Selectbox' );
      
      $inputDefLevel->loadActive = function( $activeId ) use ( $queryDefLevel ){
 
        return $queryDefLevel->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysRoleMandant_DefLevel */

 /**
  * create the ui element for field def_profile
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_DefProfile( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_role_mandant_def_profile'] ) )
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
      $inputDefProfile = $this->view->newItem( 'inputWbfsysRoleMandantDefProfile', 'WbfsysProfileValue_Selectbox' );
      $this->items['wbfsys_role_mandant-def_profile'] = $inputDefProfile;
      $inputDefProfile->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_mandant[def_profile]',
          'id'        => 'wgt-input-wbfsys_role_mandant_def_profile'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Profile', 'src' => 'Role Mandant' ) ),
        )
      );
      $inputDefProfile->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputDefProfile->assignedForm = $this->assignedForm;

      $inputDefProfile->setActive( $this->entity->getData( 'def_profile' ) );
      $inputDefProfile->setReadonly( $this->fieldReadOnly( 'wbfsys_role_mandant', 'def_profile' ) );
      $inputDefProfile->setRequired( $this->fieldRequired( 'wbfsys_role_mandant', 'def_profile' ) );


      $inputDefProfile->setLabel( $i18n->l( 'Profile', 'wbfsys.role_mandant.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_profile:insert' ) )
      {
        $inputDefProfile->refresh           = $this->refresh;
        $inputDefProfile->serializeElement  = $this->sendElement;
        $inputDefProfile->editUrl = 'index.php?c=Wbfsys.Profile.listing&amp;target='.$this->namespace.'&amp;field=def_profile&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_role_mandant_def_profile'.$this->suffix;
      }
      // set an empty first entry
      $inputDefProfile->setFirstFree( 'No Profile selected' );

      
      $queryDefProfile = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_role_mandant_def_profile'] ) )
      {
      
        $queryDefProfile = $this->db->newQuery( 'WbfsysProfileValue_Selectbox' );

        $queryDefProfile->fetchSelectbox();
        $inputDefProfile->setData( $queryDefProfile->getAll() );
      
      }
      else
      {
        $inputDefProfile->setData( $this->listElementData['wbfsys_role_mandant_def_profile'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryDefProfile )
        $queryDefProfile = $this->db->newQuery( 'WbfsysProfileValue_Selectbox' );
      
      $inputDefProfile->loadActive = function( $activeId ) use ( $queryDefProfile ){
 
        return $queryDefProfile->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysRoleMandant_DefProfile */

 /**
  * create the ui element for field id_theme_icon
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_IdThemeIcon( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_role_mandant_id_theme_icon'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysThemeIcon_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysThemeIcon_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysThemeIcon_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdThemeIcon = $this->view->newItem( 'inputWbfsysRoleMandantIdThemeIcon', 'WbfsysThemeIcon_Selectbox' );
      $this->items['wbfsys_role_mandant-id_theme_icon'] = $inputIdThemeIcon;
      $inputIdThemeIcon->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_mandant[id_theme_icon]',
          'id'        => 'wgt-input-wbfsys_role_mandant_id_theme_icon'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Theme Icon', 'src' => 'Role Mandant' ) ),
        )
      );
      $inputIdThemeIcon->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdThemeIcon->assignedForm = $this->assignedForm;

      $inputIdThemeIcon->setActive( $this->entity->getData( 'id_theme_icon' ) );
      $inputIdThemeIcon->setReadonly( $this->fieldReadOnly( 'wbfsys_role_mandant', 'id_theme_icon' ) );
      $inputIdThemeIcon->setRequired( $this->fieldRequired( 'wbfsys_role_mandant', 'id_theme_icon' ) );


      $inputIdThemeIcon->setLabel( $i18n->l( 'Theme Icon', 'wbfsys.role_mandant.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdThemeIcon->refresh           = $this->refresh;
        $inputIdThemeIcon->serializeElement  = $this->sendElement;
        $inputIdThemeIcon->editUrl = 'index.php?c=Wbfsys.ThemeIcon.listing&amp;target='.$this->namespace.'&amp;field=id_theme_icon&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_role_mandant_id_theme_icon'.$this->suffix;
      }
      // set an empty first entry
      $inputIdThemeIcon->setFirstFree( 'No Theme Icon selected' );

      
      $queryIdThemeIcon = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_role_mandant_id_theme_icon'] ) )
      {
      
        $queryIdThemeIcon = $this->db->newQuery( 'WbfsysThemeIcon_Selectbox' );

        $queryIdThemeIcon->fetchSelectbox();
        $inputIdThemeIcon->setData( $queryIdThemeIcon->getAll() );
      
      }
      else
      {
        $inputIdThemeIcon->setData( $this->listElementData['wbfsys_role_mandant_id_theme_icon'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdThemeIcon )
        $queryIdThemeIcon = $this->db->newQuery( 'WbfsysThemeIcon_Selectbox' );
      
      $inputIdThemeIcon->loadActive = function( $activeId ) use ( $queryIdThemeIcon ){
 
        return $queryIdThemeIcon->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysRoleMandant_IdThemeIcon */

 /**
  * create the ui element for field id_theme_layout
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_IdThemeLayout( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_role_mandant_id_theme_layout'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysThemeLayout_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysThemeLayout_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysThemeLayout_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdThemeLayout = $this->view->newItem( 'inputWbfsysRoleMandantIdThemeLayout', 'WbfsysThemeLayout_Selectbox' );
      $this->items['wbfsys_role_mandant-id_theme_layout'] = $inputIdThemeLayout;
      $inputIdThemeLayout->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_mandant[id_theme_layout]',
          'id'        => 'wgt-input-wbfsys_role_mandant_id_theme_layout'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Theme Layout', 'src' => 'Role Mandant' ) ),
        )
      );
      $inputIdThemeLayout->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdThemeLayout->assignedForm = $this->assignedForm;

      $inputIdThemeLayout->setActive( $this->entity->getData( 'id_theme_layout' ) );
      $inputIdThemeLayout->setReadonly( $this->fieldReadOnly( 'wbfsys_role_mandant', 'id_theme_layout' ) );
      $inputIdThemeLayout->setRequired( $this->fieldRequired( 'wbfsys_role_mandant', 'id_theme_layout' ) );


      $inputIdThemeLayout->setLabel( $i18n->l( 'Theme Layout', 'wbfsys.role_mandant.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdThemeLayout->refresh           = $this->refresh;
        $inputIdThemeLayout->serializeElement  = $this->sendElement;
        $inputIdThemeLayout->editUrl = 'index.php?c=Wbfsys.ThemeLayout.listing&amp;target='.$this->namespace.'&amp;field=id_theme_layout&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_role_mandant_id_theme_layout'.$this->suffix;
      }
      // set an empty first entry
      $inputIdThemeLayout->setFirstFree( 'No Theme Layout selected' );

      
      $queryIdThemeLayout = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_role_mandant_id_theme_layout'] ) )
      {
      
        $queryIdThemeLayout = $this->db->newQuery( 'WbfsysThemeLayout_Selectbox' );

        $queryIdThemeLayout->fetchSelectbox();
        $inputIdThemeLayout->setData( $queryIdThemeLayout->getAll() );
      
      }
      else
      {
        $inputIdThemeLayout->setData( $this->listElementData['wbfsys_role_mandant_id_theme_layout'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdThemeLayout )
        $queryIdThemeLayout = $this->db->newQuery( 'WbfsysThemeLayout_Selectbox' );
      
      $inputIdThemeLayout->loadActive = function( $activeId ) use ( $queryIdThemeLayout ){
 
        return $queryIdThemeLayout->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysRoleMandant_IdThemeLayout */

 /**
  * create the ui element for field type
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_Type( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_role_mandant_type'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysMandantType_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysMandantType_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysMandantType_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputType = $this->view->newItem( 'inputWbfsysRoleMandantType', 'WbfsysMandantType_Selectbox' );
      $this->items['wbfsys_role_mandant-type'] = $inputType;
      $inputType->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_mandant[type]',
          'id'        => 'wgt-input-wbfsys_role_mandant_type'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Type', 'src' => 'Role Mandant' ) ),
        )
      );
      $inputType->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputType->assignedForm = $this->assignedForm;

      $inputType->setActive( $this->entity->getData( 'type' ) );
      $inputType->setReadonly( $this->fieldReadOnly( 'wbfsys_role_mandant', 'type' ) );
      $inputType->setRequired( $this->fieldRequired( 'wbfsys_role_mandant', 'type' ) );


      $inputType->setLabel( $i18n->l( 'Type', 'wbfsys.role_mandant.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-crm>mgmt-crm_contact_calls:insert' ) )
      {
        $inputType->refresh           = $this->refresh;
        $inputType->serializeElement  = $this->sendElement;
        $inputType->editUrl = 'index.php?c=Crm.ContactCalls.listing&amp;target='.$this->namespace.'&amp;field=type&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_role_mandant_type'.$this->suffix;
      }
      // set an empty first entry
      $inputType->setFirstFree( 'No Type selected' );



      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysRoleMandant_Type */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysRoleMandantDescription', 'Textarea' );
      $this->items['wbfsys_role_mandant-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_role_mandant[description]',
          'id'    => 'wgt-input-wbfsys_role_mandant_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Role Mandant' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_role_mandant', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_role_mandant', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.role_mandant.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysRoleMandant_Description */

 /**
  * create the ui element for field change_password
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_ChangePassword( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputChangePassword = $this->view->newInput( 'inputWbfsysRoleMandantChangePassword' , 'Date' );
      $this->items['wbfsys_role_mandant-change_password'] = $inputChangePassword;
      $inputChangePassword->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_mandant[change_password]',
          'id'        => 'wgt-input-wbfsys_role_mandant_change_password'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Change Password', 'src' => 'Role Mandant' ) ),
          'maxlength' => $this->entity->maxSize( 'change_password' ),
        )
      );
      $inputChangePassword->setWidth( 'small' );

      $inputChangePassword->setReadonly( $this->fieldReadOnly( 'wbfsys_role_mandant', 'change_password' ) );
      $inputChangePassword->setRequired( $this->fieldRequired( 'wbfsys_role_mandant', 'change_password' ) );
      $inputChangePassword->setData( $this->entity->getDate( 'change_password' ) );
      $inputChangePassword->setLabel( $i18n->l( 'Change Password', 'wbfsys.role_mandant.label' ) );

      $inputChangePassword->refresh           = $this->refresh;
      $inputChangePassword->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysRoleMandant_ChangePassword */

 /**
  * create the ui element for field salt_password
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_SaltPassword( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputSaltPassword = $this->view->newInput( 'inputWbfsysRoleMandantSaltPassword', 'Hidden' );
      $this->items['wbfsys_role_mandant-salt_password'] = $inputSaltPassword;
      $inputSaltPassword->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_mandant[salt_password]',
          'id'        => 'wgt-input-wbfsys_role_mandant_salt_password'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Salt Password', 'src' => 'Role Mandant' ) ),
          'maxlength' => $this->entity->maxSize( 'salt_password' ),
        )
      );
      $inputSaltPassword->setWidth( 'medium' );

      $inputSaltPassword->setData( $this->entity->getSecure( 'salt_password' ) );
      $inputSaltPassword->refresh           = $this->refresh;
      $inputSaltPassword->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysRoleMandant_SaltPassword */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysRoleMandantRowid' , 'int' );
      $this->items['wbfsys_role_mandant-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_mandant[rowid]',
          'id'        => 'wgt-input-wbfsys_role_mandant_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Role Mandant' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_role_mandant', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_role_mandant', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.role_mandant.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysRoleMandant_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysRoleMandantMTimeCreated' , 'Date' );
      $this->items['wbfsys_role_mandant-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_mandant[m_time_created]',
          'id'        => 'wgt-input-wbfsys_role_mandant_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Role Mandant' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_role_mandant', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_role_mandant', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.role_mandant.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysRoleMandant_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysRoleMandantMRoleCreate', 'Window' );
      $this->items['wbfsys_role_mandant-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_role_mandant[m_role_create]',
        'id'        => 'wgt-input-wbfsys_role_mandant_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Role Mandant' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_role_mandant', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_role_mandant', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.role_mandant.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_role_mandant_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_role_mandant_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysRoleMandant_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysRoleMandantMTimeChanged' , 'Date' );
      $this->items['wbfsys_role_mandant-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_mandant[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_role_mandant_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Role Mandant' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_role_mandant', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_role_mandant', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.role_mandant.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysRoleMandant_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysRoleMandantMRoleChange', 'Window' );
      $this->items['wbfsys_role_mandant-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_role_mandant[m_role_change]',
        'id'        => 'wgt-input-wbfsys_role_mandant_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Role Mandant' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_role_mandant', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_role_mandant', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.role_mandant.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_role_mandant_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_role_mandant_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysRoleMandant_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysRoleMandantMVersion' , 'int' );
      $this->items['wbfsys_role_mandant-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_mandant[m_version]',
          'id'        => 'wgt-input-wbfsys_role_mandant_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Role Mandant' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_role_mandant', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_role_mandant', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.role_mandant.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysRoleMandant_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleMandant_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysRoleMandantMUuid' , 'Text' );
      $this->items['wbfsys_role_mandant-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_mandant[m_uuid]',
          'id'        => 'wgt-input-wbfsys_role_mandant_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Role Mandant' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_role_mandant', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_role_mandant', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.role_mandant.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysRoleMandant_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysRoleMandant_Crud_Edit_Form */


