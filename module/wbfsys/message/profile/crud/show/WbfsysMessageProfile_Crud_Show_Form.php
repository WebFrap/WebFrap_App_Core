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
class WbfsysMessageProfile_Crud_Show_Form
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
  public $namespace  = 'WbfsysMessageProfile';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysMessageProfile';

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
      'wbfsys_message_profile' => array
      (
        'name' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'id_type' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_visibility' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'user_name' => array
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
        'server' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'description' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_user' => array
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
        'port' => array
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
   * @var WbfsysMessageProfile_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysMessageProfile_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysMessageProfile_Entity $entity
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
      'wbfsys_message_profile' => array
      (
        'name',
        'id_type',
        'id_visibility',
        'user_name',
        'password',
        'server',
        'description',
        'id_user',
        'change_password',
        'salt_password',
        'port',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysMessageProfile entity
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
    $this->view->addVar( 'entityWbfsysMessageProfile', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_message_profile'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_message_profile[id_wbfsys_message_profile-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysMessageProfile_Name( $params );
    $this->input_WbfsysMessageProfile_IdType( $params );
    $this->input_WbfsysMessageProfile_IdVisibility( $params );
    $this->input_WbfsysMessageProfile_UserName( $params );
    $this->input_WbfsysMessageProfile_Password( $params );
    $this->input_WbfsysMessageProfile_Server( $params );
    $this->input_WbfsysMessageProfile_Description( $params );
    $this->input_WbfsysMessageProfile_IdUser( $params );
    $this->input_WbfsysMessageProfile_ChangePassword( $params );
    $this->input_WbfsysMessageProfile_SaltPassword( $params );
    $this->input_WbfsysMessageProfile_Port( $params );
    $this->input_WbfsysMessageProfile_Rowid( $params );
    $this->input_WbfsysMessageProfile_MTimeCreated( $params );
    $this->input_WbfsysMessageProfile_MRoleCreate( $params );
    $this->input_WbfsysMessageProfile_MTimeChanged( $params );
    $this->input_WbfsysMessageProfile_MRoleChange( $params );
    $this->input_WbfsysMessageProfile_MVersion( $params );
    $this->input_WbfsysMessageProfile_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageProfile_Name( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputName = $this->view->newInput( 'inputWbfsysMessageProfileName' , 'Text' );
      $this->items['wbfsys_message_profile-name'] = $inputName;
      $inputName->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_profile[name]',
          'id'        => 'wgt-input-wbfsys_message_profile_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Name', 'src' => 'Message Profile' ) ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadonly( $this->fieldReadOnly( 'wbfsys_message_profile', 'name' ) );
      $inputName->setRequired( $this->fieldRequired( 'wbfsys_message_profile', 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel( $i18n->l( 'Name', 'wbfsys.message_profile.label' ) );

      $inputName->refresh           = $this->refresh;
      $inputName->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMessageProfile_Name */

 /**
  * create the ui element for field id_type
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageProfile_IdType( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_message_profile_id_type'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysMessageProfileType_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysMessageProfileType_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysMessageProfileType_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdType = $this->view->newItem( 'inputWbfsysMessageProfileIdType', 'WbfsysMessageProfileType_Selectbox' );
      $this->items['wbfsys_message_profile-id_type'] = $inputIdType;
      $inputIdType->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_profile[id_type]',
          'id'        => 'wgt-input-wbfsys_message_profile_id_type'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Type', 'src' => 'Message Profile' ) ),
        )
      );
      $inputIdType->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdType->assignedForm = $this->assignedForm;

      $inputIdType->setActive( $this->entity->getData( 'id_type' ) );
      $inputIdType->setReadonly( $this->fieldReadOnly( 'wbfsys_message_profile', 'id_type' ) );
      $inputIdType->setRequired( $this->fieldRequired( 'wbfsys_message_profile', 'id_type' ) );


      $inputIdType->setLabel( $i18n->l( 'Type', 'wbfsys.message_profile.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_message_profile_type:insert' ) )
      {
        $inputIdType->refresh           = $this->refresh;
        $inputIdType->serializeElement  = $this->sendElement;
        $inputIdType->editUrl = 'index.php?c=Wbfsys.MessageProfileType.listing&amp;target='.$this->namespace.'&amp;field=id_type&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_message_profile_id_type'.$this->suffix;
      }
      // set an empty first entry
      $inputIdType->setFirstFree( 'No Type selected' );

      
      $queryIdType = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_message_profile_id_type'] ) )
      {
      
        $queryIdType = $this->db->newQuery( 'WbfsysMessageProfileType_Selectbox' );

        $queryIdType->fetchSelectbox();
        $inputIdType->setData( $queryIdType->getAll() );
      
      }
      else
      {
        $inputIdType->setData( $this->listElementData['wbfsys_message_profile_id_type'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdType )
        $queryIdType = $this->db->newQuery( 'WbfsysMessageProfileType_Selectbox' );
      
      $inputIdType->loadActive = function( $activeId ) use ( $queryIdType ){
 
        return $queryIdType->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMessageProfile_IdType */

 /**
  * create the ui element for field id_visibility
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageProfile_IdVisibility( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_message_profile_id_visibility'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysUserContactVisibility_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysUserContactVisibility_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysUserContactVisibility_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdVisibility = $this->view->newItem( 'inputWbfsysMessageProfileIdVisibility', 'WbfsysUserContactVisibility_Selectbox' );
      $this->items['wbfsys_message_profile-id_visibility'] = $inputIdVisibility;
      $inputIdVisibility->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_profile[id_visibility]',
          'id'        => 'wgt-input-wbfsys_message_profile_id_visibility'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'visibility', 'src' => 'Message Profile' ) ),
        )
      );
      $inputIdVisibility->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdVisibility->assignedForm = $this->assignedForm;

      $inputIdVisibility->setActive( $this->entity->getData( 'id_visibility' ) );
      $inputIdVisibility->setReadonly( $this->fieldReadOnly( 'wbfsys_message_profile', 'id_visibility' ) );
      $inputIdVisibility->setRequired( $this->fieldRequired( 'wbfsys_message_profile', 'id_visibility' ) );


      $inputIdVisibility->setLabel( $i18n->l( 'visibility', 'wbfsys.message_profile.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdVisibility->refresh           = $this->refresh;
        $inputIdVisibility->serializeElement  = $this->sendElement;
        $inputIdVisibility->editUrl = 'index.php?c=Wbfsys.UserContactVisibility.listing&amp;target='.$this->namespace.'&amp;field=id_visibility&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_message_profile_id_visibility'.$this->suffix;
      }
      // set an empty first entry
      $inputIdVisibility->setFirstFree( 'No visibility selected' );

      
      $queryIdVisibility = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_message_profile_id_visibility'] ) )
      {
      
        $queryIdVisibility = $this->db->newQuery( 'WbfsysUserContactVisibility_Selectbox' );

        $queryIdVisibility->fetchSelectbox();
        $inputIdVisibility->setData( $queryIdVisibility->getAll() );
      
      }
      else
      {
        $inputIdVisibility->setData( $this->listElementData['wbfsys_message_profile_id_visibility'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdVisibility )
        $queryIdVisibility = $this->db->newQuery( 'WbfsysUserContactVisibility_Selectbox' );
      
      $inputIdVisibility->loadActive = function( $activeId ) use ( $queryIdVisibility ){
 
        return $queryIdVisibility->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMessageProfile_IdVisibility */

 /**
  * create the ui element for field user_name
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageProfile_UserName( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputUserName = $this->view->newInput( 'inputWbfsysMessageProfileUserName' , 'Text' );
      $this->items['wbfsys_message_profile-user_name'] = $inputUserName;
      $inputUserName->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_profile[user_name]',
          'id'        => 'wgt-input-wbfsys_message_profile_user_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'user name', 'src' => 'Message Profile' ) ),
          'maxlength' => $this->entity->maxSize( 'user_name' ),
        )
      );
      $inputUserName->setWidth( 'medium' );

      $inputUserName->setReadonly( $this->fieldReadOnly( 'wbfsys_message_profile', 'user_name' ) );
      $inputUserName->setRequired( $this->fieldRequired( 'wbfsys_message_profile', 'user_name' ) );
      $inputUserName->setData( $this->entity->getSecure('user_name') );
      $inputUserName->setLabel( $i18n->l( 'user name', 'wbfsys.message_profile.label' ) );

      $inputUserName->refresh           = $this->refresh;
      $inputUserName->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMessageProfile_UserName */

 /**
  * create the ui element for field password
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageProfile_Password( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:password
      $inputPassword = $this->view->newInput( 'inputWbfsysMessageProfilePassword', 'Password' );
      $this->items['wbfsys_message_profile-password'] = $inputPassword;
      $inputPassword->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_profile[password]',
          'id'        => 'wgt-input-wbfsys_message_profile_password'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_password medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Password', 'src' => 'Message Profile' ) ),
          'maxlength' => $this->entity->maxSize( 'password' ),
        )
      );
      $inputPassword->setWidth( 'medium' );

      $inputPassword->setReadonly( $this->fieldReadOnly( 'wbfsys_message_profile', 'password' ) );
      $inputPassword->setRequired( $this->fieldRequired( 'wbfsys_message_profile', 'password' ) );
      $inputPassword->setLabel( $i18n->l( 'Password', 'wbfsys.message_profile.label' ) );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMessageProfile_Password */

 /**
  * create the ui element for field server
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageProfile_Server( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputServer = $this->view->newInput( 'inputWbfsysMessageProfileServer' , 'Text' );
      $this->items['wbfsys_message_profile-server'] = $inputServer;
      $inputServer->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_profile[server]',
          'id'        => 'wgt-input-wbfsys_message_profile_server'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Server Address', 'src' => 'Message Profile' ) ),
          'maxlength' => $this->entity->maxSize( 'server' ),
        )
      );
      $inputServer->setWidth( 'medium' );

      $inputServer->setReadonly( $this->fieldReadOnly( 'wbfsys_message_profile', 'server' ) );
      $inputServer->setRequired( $this->fieldRequired( 'wbfsys_message_profile', 'server' ) );
      $inputServer->setData( $this->entity->getSecure('server') );
      $inputServer->setLabel( $i18n->l( 'Server Address', 'wbfsys.message_profile.label' ) );

      $inputServer->refresh           = $this->refresh;
      $inputServer->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMessageProfile_Server */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageProfile_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysMessageProfileDescription', 'Textarea' );
      $this->items['wbfsys_message_profile-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_message_profile[description]',
          'id'    => 'wgt-input-wbfsys_message_profile_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Message Profile' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_message_profile', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_message_profile', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.message_profile.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysMessageProfile_Description */

 /**
  * create the ui element for field id_user
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageProfile_IdUser( $params )
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
      $objidWbfsysRoleUser = $this->entity->getData( 'id_user' ) ;

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

      $inputIdUser = $this->view->newInput( 'inputWbfsysMessageProfileIdUser', 'Window' );
      $this->items['wbfsys_message_profile-id_user'] = $inputIdUser;
      $inputIdUser->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message_profile[id_user]',
        'id'        => 'wgt-input-wbfsys_message_profile_id_user'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'User', 'src' => 'Message Profile' ) ),
      ));

      if( $this->assignedForm )
        $inputIdUser->assignedForm = $this->assignedForm;

      $inputIdUser->setWidth( 'medium' );

      $inputIdUser->setData( $this->entity->getData( 'id_user' )  );
      $inputIdUser->setReadonly( $this->fieldReadOnly( 'wbfsys_message_profile', 'id_user' ) );
      $inputIdUser->setRequired( $this->fieldRequired( 'wbfsys_message_profile', 'id_user' ) );
      $inputIdUser->setLabel( $i18n->l( 'User', 'wbfsys.message_profile.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_profile_id_user'.($this->suffix?'-'.$this->suffix:'');

      $inputIdUser->setListUrl ( $listUrl );
      $inputIdUser->setListIcon( 'control/connect.png' );
      $inputIdUser->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.edit' );
      $inputIdUser->conEntity         = $entityWbfsysRoleUser;
      $inputIdUser->refresh           = $this->refresh;
      $inputIdUser->serializeElement  = $this->sendElement;


        $inputIdUser->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.RoleUser.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdUser->view = $this->view;
      $inputIdUser->buildJavascript( 'wgt-input-wbfsys_message_profile_id_user'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdUser );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMessageProfile_IdUser */

 /**
  * create the ui element for field change_password
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageProfile_ChangePassword( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputChangePassword = $this->view->newInput( 'inputWbfsysMessageProfileChangePassword' , 'Date' );
      $this->items['wbfsys_message_profile-change_password'] = $inputChangePassword;
      $inputChangePassword->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_profile[change_password]',
          'id'        => 'wgt-input-wbfsys_message_profile_change_password'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Change Password', 'src' => 'Message Profile' ) ),
          'maxlength' => $this->entity->maxSize( 'change_password' ),
        )
      );
      $inputChangePassword->setWidth( 'small' );

      $inputChangePassword->setReadonly( $this->fieldReadOnly( 'wbfsys_message_profile', 'change_password' ) );
      $inputChangePassword->setRequired( $this->fieldRequired( 'wbfsys_message_profile', 'change_password' ) );
      $inputChangePassword->setData( $this->entity->getDate( 'change_password' ) );
      $inputChangePassword->setLabel( $i18n->l( 'Change Password', 'wbfsys.message_profile.label' ) );

      $inputChangePassword->refresh           = $this->refresh;
      $inputChangePassword->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMessageProfile_ChangePassword */

 /**
  * create the ui element for field salt_password
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageProfile_SaltPassword( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputSaltPassword = $this->view->newInput( 'inputWbfsysMessageProfileSaltPassword', 'Hidden' );
      $this->items['wbfsys_message_profile-salt_password'] = $inputSaltPassword;
      $inputSaltPassword->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_profile[salt_password]',
          'id'        => 'wgt-input-wbfsys_message_profile_salt_password'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Salt Password', 'src' => 'Message Profile' ) ),
          'maxlength' => $this->entity->maxSize( 'salt_password' ),
        )
      );
      $inputSaltPassword->setWidth( 'medium' );

      $inputSaltPassword->setData( $this->entity->getSecure( 'salt_password' ) );
      $inputSaltPassword->refresh           = $this->refresh;
      $inputSaltPassword->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysMessageProfile_SaltPassword */

 /**
  * create the ui element for field port
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageProfile_Port( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputPort = $this->view->newInput( 'inputWbfsysMessageProfilePort', 'Int' );
      $this->items['wbfsys_message_profile-port'] = $inputPort;
      $inputPort->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_profile[port]',
          'id'        => 'wgt-input-wbfsys_message_profile_port'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'port', 'src' => 'Message Profile' ) ),
        )
      );
      $inputPort->setWidth( 'medium' );

$inputPort->setReadOnly( $this->fieldReadOnly( 'wbfsys_message_profile', 'port' ) );
      $inputPort->setRequired( $this->fieldRequired( 'wbfsys_message_profile', 'port' ) );
      $inputPort->setData( $this->entity->getData( 'port' ) );
      $inputPort->setLabel( $i18n->l( 'port', 'wbfsys.message_profile.label' ) );

      $inputPort->refresh           = $this->refresh;
      $inputPort->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMessageProfile_Port */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageProfile_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysMessageProfileRowid' , 'int' );
      $this->items['wbfsys_message_profile-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_profile[rowid]',
          'id'        => 'wgt-input-wbfsys_message_profile_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Message Profile' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_message_profile', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_message_profile', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.message_profile.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMessageProfile_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageProfile_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysMessageProfileMTimeCreated' , 'Date' );
      $this->items['wbfsys_message_profile-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_profile[m_time_created]',
          'id'        => 'wgt-input-wbfsys_message_profile_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Message Profile' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_message_profile', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_message_profile', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.message_profile.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysMessageProfile_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageProfile_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysMessageProfileMRoleCreate', 'Window' );
      $this->items['wbfsys_message_profile-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message_profile[m_role_create]',
        'id'        => 'wgt-input-wbfsys_message_profile_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Message Profile' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_message_profile', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_message_profile', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.message_profile.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_profile_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_message_profile_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysMessageProfile_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageProfile_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysMessageProfileMTimeChanged' , 'Date' );
      $this->items['wbfsys_message_profile-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_profile[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_message_profile_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Message Profile' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_message_profile', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_message_profile', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.message_profile.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysMessageProfile_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageProfile_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysMessageProfileMRoleChange', 'Window' );
      $this->items['wbfsys_message_profile-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message_profile[m_role_change]',
        'id'        => 'wgt-input-wbfsys_message_profile_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Message Profile' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_message_profile', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_message_profile', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.message_profile.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_profile_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_message_profile_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysMessageProfile_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageProfile_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysMessageProfileMVersion' , 'int' );
      $this->items['wbfsys_message_profile-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_profile[m_version]',
          'id'        => 'wgt-input-wbfsys_message_profile_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Message Profile' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_message_profile', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_message_profile', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.message_profile.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMessageProfile_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageProfile_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysMessageProfileMUuid' , 'Text' );
      $this->items['wbfsys_message_profile-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_profile[m_uuid]',
          'id'        => 'wgt-input-wbfsys_message_profile_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Message Profile' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_message_profile', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_message_profile', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.message_profile.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMessageProfile_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysMessageProfile_Crud_Show_Form */


