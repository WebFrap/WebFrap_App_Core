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
class WbfsysUserSetting_Crud_Edit_Form
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
  public $namespace  = 'WbfsysUserSetting';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysUserSetting';

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
      'wbfsys_user_setting' => array
      (
        'id_user' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
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
        'id_language' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'smtp' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'pop3' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'imap' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'sieve' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_maillocation' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_transport' => array
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
   * @var WbfsysUserSetting_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysUserSetting_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysUserSetting_Entity $entity
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
      'wbfsys_user_setting' => array
      (
        'id_user',
        'id_theme_icon',
        'id_theme_layout',
        'id_language',
        'smtp',
        'pop3',
        'imap',
        'sieve',
        'id_maillocation',
        'id_transport',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysUserSetting entity
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
    $this->view->addVar( 'entityWbfsysUserSetting', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_user_setting'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_user_setting[id_wbfsys_user_setting-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysUserSetting_IdUser( $params );
    $this->input_WbfsysUserSetting_IdThemeIcon( $params );
    $this->input_WbfsysUserSetting_IdThemeLayout( $params );
    $this->input_WbfsysUserSetting_IdLanguage( $params );
    $this->input_WbfsysUserSetting_Smtp( $params );
    $this->input_WbfsysUserSetting_Pop3( $params );
    $this->input_WbfsysUserSetting_Imap( $params );
    $this->input_WbfsysUserSetting_Sieve( $params );
    $this->input_WbfsysUserSetting_IdMaillocation( $params );
    $this->input_WbfsysUserSetting_IdTransport( $params );
    $this->input_WbfsysUserSetting_Rowid( $params );
    $this->input_WbfsysUserSetting_MTimeCreated( $params );
    $this->input_WbfsysUserSetting_MRoleCreate( $params );
    $this->input_WbfsysUserSetting_MTimeChanged( $params );
    $this->input_WbfsysUserSetting_MRoleChange( $params );
    $this->input_WbfsysUserSetting_MVersion( $params );
    $this->input_WbfsysUserSetting_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field id_user
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserSetting_IdUser( $params )
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

      $inputIdUser = $this->view->newInput( 'inputWbfsysUserSettingIdUser', 'Window' );
      $this->items['wbfsys_user_setting-id_user'] = $inputIdUser;
      $inputIdUser->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_user_setting[id_user]',
        'id'        => 'wgt-input-wbfsys_user_setting_id_user'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'User', 'src' => 'User Setting' ) ),
      ));

      if( $this->assignedForm )
        $inputIdUser->assignedForm = $this->assignedForm;

      $inputIdUser->setWidth( 'medium' );

      $inputIdUser->setData( $this->entity->getData( 'id_user' )  );
      $inputIdUser->setReadonly( $this->fieldReadOnly( 'wbfsys_user_setting', 'id_user' ) );
      $inputIdUser->setRequired( $this->fieldRequired( 'wbfsys_user_setting', 'id_user' ) );
      $inputIdUser->setLabel( $i18n->l( 'User', 'wbfsys.user_setting.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_user_setting_id_user'.($this->suffix?'-'.$this->suffix:'');

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
      $inputIdUser->buildJavascript( 'wgt-input-wbfsys_user_setting_id_user'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdUser );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysUserSetting_IdUser */

 /**
  * create the ui element for field id_theme_icon
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserSetting_IdThemeIcon( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_user_setting_id_theme_icon'] ) )
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
      $inputIdThemeIcon = $this->view->newItem( 'inputWbfsysUserSettingIdThemeIcon', 'WbfsysThemeIcon_Selectbox' );
      $this->items['wbfsys_user_setting-id_theme_icon'] = $inputIdThemeIcon;
      $inputIdThemeIcon->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_user_setting[id_theme_icon]',
          'id'        => 'wgt-input-wbfsys_user_setting_id_theme_icon'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Theme Icon', 'src' => 'User Setting' ) ),
        )
      );
      $inputIdThemeIcon->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdThemeIcon->assignedForm = $this->assignedForm;

      $inputIdThemeIcon->setActive( $this->entity->getData( 'id_theme_icon' ) );
      $inputIdThemeIcon->setReadonly( $this->fieldReadOnly( 'wbfsys_user_setting', 'id_theme_icon' ) );
      $inputIdThemeIcon->setRequired( $this->fieldRequired( 'wbfsys_user_setting', 'id_theme_icon' ) );


      $inputIdThemeIcon->setLabel( $i18n->l( 'Theme Icon', 'wbfsys.user_setting.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdThemeIcon->refresh           = $this->refresh;
        $inputIdThemeIcon->serializeElement  = $this->sendElement;
        $inputIdThemeIcon->editUrl = 'index.php?c=Wbfsys.ThemeIcon.listing&amp;target='.$this->namespace.'&amp;field=id_theme_icon&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_user_setting_id_theme_icon'.$this->suffix;
      }
      // set an empty first entry
      $inputIdThemeIcon->setFirstFree( 'No Theme Icon selected' );

      
      $queryIdThemeIcon = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_user_setting_id_theme_icon'] ) )
      {
      
        $queryIdThemeIcon = $this->db->newQuery( 'WbfsysThemeIcon_Selectbox' );

        $queryIdThemeIcon->fetchSelectbox();
        $inputIdThemeIcon->setData( $queryIdThemeIcon->getAll() );
      
      }
      else
      {
        $inputIdThemeIcon->setData( $this->listElementData['wbfsys_user_setting_id_theme_icon'] );
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

  }//end public function input_WbfsysUserSetting_IdThemeIcon */

 /**
  * create the ui element for field id_theme_layout
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserSetting_IdThemeLayout( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_user_setting_id_theme_layout'] ) )
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
      $inputIdThemeLayout = $this->view->newItem( 'inputWbfsysUserSettingIdThemeLayout', 'WbfsysThemeLayout_Selectbox' );
      $this->items['wbfsys_user_setting-id_theme_layout'] = $inputIdThemeLayout;
      $inputIdThemeLayout->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_user_setting[id_theme_layout]',
          'id'        => 'wgt-input-wbfsys_user_setting_id_theme_layout'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Theme Layout', 'src' => 'User Setting' ) ),
        )
      );
      $inputIdThemeLayout->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdThemeLayout->assignedForm = $this->assignedForm;

      $inputIdThemeLayout->setActive( $this->entity->getData( 'id_theme_layout' ) );
      $inputIdThemeLayout->setReadonly( $this->fieldReadOnly( 'wbfsys_user_setting', 'id_theme_layout' ) );
      $inputIdThemeLayout->setRequired( $this->fieldRequired( 'wbfsys_user_setting', 'id_theme_layout' ) );


      $inputIdThemeLayout->setLabel( $i18n->l( 'Theme Layout', 'wbfsys.user_setting.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdThemeLayout->refresh           = $this->refresh;
        $inputIdThemeLayout->serializeElement  = $this->sendElement;
        $inputIdThemeLayout->editUrl = 'index.php?c=Wbfsys.ThemeLayout.listing&amp;target='.$this->namespace.'&amp;field=id_theme_layout&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_user_setting_id_theme_layout'.$this->suffix;
      }
      // set an empty first entry
      $inputIdThemeLayout->setFirstFree( 'No Theme Layout selected' );

      
      $queryIdThemeLayout = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_user_setting_id_theme_layout'] ) )
      {
      
        $queryIdThemeLayout = $this->db->newQuery( 'WbfsysThemeLayout_Selectbox' );

        $queryIdThemeLayout->fetchSelectbox();
        $inputIdThemeLayout->setData( $queryIdThemeLayout->getAll() );
      
      }
      else
      {
        $inputIdThemeLayout->setData( $this->listElementData['wbfsys_user_setting_id_theme_layout'] );
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

  }//end public function input_WbfsysUserSetting_IdThemeLayout */

 /**
  * create the ui element for field id_language
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserSetting_IdLanguage( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_user_setting_id_language'] ) )
    {
      if( !Webfrap::classLoadable( 'CoreLanguage_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'CoreLanguage_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: CoreLanguage_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdLanguage = $this->view->newItem( 'inputWbfsysUserSettingIdLanguage', 'CoreLanguage_Selectbox' );
      $this->items['wbfsys_user_setting-id_language'] = $inputIdLanguage;
      $inputIdLanguage->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_user_setting[id_language]',
          'id'        => 'wgt-input-wbfsys_user_setting_id_language'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Language', 'src' => 'User Setting' ) ),
        )
      );
      $inputIdLanguage->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdLanguage->assignedForm = $this->assignedForm;

      $inputIdLanguage->setActive( $this->entity->getData( 'id_language' ) );
      $inputIdLanguage->setReadonly( $this->fieldReadOnly( 'wbfsys_user_setting', 'id_language' ) );
      $inputIdLanguage->setRequired( $this->fieldRequired( 'wbfsys_user_setting', 'id_language' ) );


      $inputIdLanguage->setLabel( $i18n->l( 'Language', 'wbfsys.user_setting.label' ) );

      // set an empty first entry
      $inputIdLanguage->setFirstFree( 'No Language selected' );

      
      $queryIdLanguage = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_user_setting_id_language'] ) )
      {
      
        $queryIdLanguage = $this->db->newQuery( 'CoreLanguage_Selectbox' );

        $queryIdLanguage->fetchSelectbox();
        $inputIdLanguage->setData( $queryIdLanguage->getAll() );
      
      }
      else
      {
        $inputIdLanguage->setData( $this->listElementData['wbfsys_user_setting_id_language'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdLanguage )
        $queryIdLanguage = $this->db->newQuery( 'CoreLanguage_Selectbox' );
      
      $inputIdLanguage->loadActive = function( $activeId ) use ( $queryIdLanguage ){
 
        return $queryIdLanguage->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysUserSetting_IdLanguage */

 /**
  * create the ui element for field smtp
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserSetting_Smtp( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputSmtp = $this->view->newInput( 'inputWbfsysUserSettingSmtp', 'Checkbox' );
      $this->items['wbfsys_user_setting-smtp'] = $inputSmtp;
      $inputSmtp->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_user_setting[smtp]',
          'id'        => 'wgt-input-wbfsys_user_setting_smtp'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Smtp', 'src' => 'User Setting' ) ),
        )
      );
      $inputSmtp->setWidth( 'medium' );

      $inputSmtp->setReadonly( $this->fieldReadOnly( 'wbfsys_user_setting', 'smtp' ) );
      $inputSmtp->setRequired( $this->fieldRequired( 'wbfsys_user_setting', 'smtp' ) );
      $inputSmtp->setActive( $this->entity->getBoolean( 'smtp' ) );
      $inputSmtp->setLabel( $i18n->l( 'Smtp', 'wbfsys.user_setting.label' ) );

      $inputSmtp->refresh           = $this->refresh;
      $inputSmtp->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysUserSetting_Smtp */

 /**
  * create the ui element for field pop3
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserSetting_Pop3( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputPop3 = $this->view->newInput( 'inputWbfsysUserSettingPop3', 'Checkbox' );
      $this->items['wbfsys_user_setting-pop3'] = $inputPop3;
      $inputPop3->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_user_setting[pop3]',
          'id'        => 'wgt-input-wbfsys_user_setting_pop3'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Pop3', 'src' => 'User Setting' ) ),
        )
      );
      $inputPop3->setWidth( 'medium' );

      $inputPop3->setReadonly( $this->fieldReadOnly( 'wbfsys_user_setting', 'pop3' ) );
      $inputPop3->setRequired( $this->fieldRequired( 'wbfsys_user_setting', 'pop3' ) );
      $inputPop3->setActive( $this->entity->getBoolean( 'pop3' ) );
      $inputPop3->setLabel( $i18n->l( 'Pop3', 'wbfsys.user_setting.label' ) );

      $inputPop3->refresh           = $this->refresh;
      $inputPop3->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysUserSetting_Pop3 */

 /**
  * create the ui element for field imap
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserSetting_Imap( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputImap = $this->view->newInput( 'inputWbfsysUserSettingImap', 'Checkbox' );
      $this->items['wbfsys_user_setting-imap'] = $inputImap;
      $inputImap->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_user_setting[imap]',
          'id'        => 'wgt-input-wbfsys_user_setting_imap'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Imap', 'src' => 'User Setting' ) ),
        )
      );
      $inputImap->setWidth( 'medium' );

      $inputImap->setReadonly( $this->fieldReadOnly( 'wbfsys_user_setting', 'imap' ) );
      $inputImap->setRequired( $this->fieldRequired( 'wbfsys_user_setting', 'imap' ) );
      $inputImap->setActive( $this->entity->getBoolean( 'imap' ) );
      $inputImap->setLabel( $i18n->l( 'Imap', 'wbfsys.user_setting.label' ) );

      $inputImap->refresh           = $this->refresh;
      $inputImap->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysUserSetting_Imap */

 /**
  * create the ui element for field sieve
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserSetting_Sieve( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputSieve = $this->view->newInput( 'inputWbfsysUserSettingSieve', 'Checkbox' );
      $this->items['wbfsys_user_setting-sieve'] = $inputSieve;
      $inputSieve->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_user_setting[sieve]',
          'id'        => 'wgt-input-wbfsys_user_setting_sieve'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Sieve', 'src' => 'User Setting' ) ),
        )
      );
      $inputSieve->setWidth( 'medium' );

      $inputSieve->setReadonly( $this->fieldReadOnly( 'wbfsys_user_setting', 'sieve' ) );
      $inputSieve->setRequired( $this->fieldRequired( 'wbfsys_user_setting', 'sieve' ) );
      $inputSieve->setActive( $this->entity->getBoolean( 'sieve' ) );
      $inputSieve->setLabel( $i18n->l( 'Sieve', 'wbfsys.user_setting.label' ) );

      $inputSieve->refresh           = $this->refresh;
      $inputSieve->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysUserSetting_Sieve */
/// windowref to nonexisting wbfsys_mailmanagement_maillocation in LibGeneratorWbfFieldWindow/// windowref to nonexisting wbfsys_mailmanagement_transport in LibGeneratorWbfFieldWindow
 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserSetting_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysUserSettingRowid' , 'int' );
      $this->items['wbfsys_user_setting-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_user_setting[rowid]',
          'id'        => 'wgt-input-wbfsys_user_setting_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'User Setting' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_user_setting', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_user_setting', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.user_setting.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysUserSetting_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserSetting_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysUserSettingMTimeCreated' , 'Date' );
      $this->items['wbfsys_user_setting-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_user_setting[m_time_created]',
          'id'        => 'wgt-input-wbfsys_user_setting_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'User Setting' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_user_setting', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_user_setting', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.user_setting.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysUserSetting_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserSetting_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysUserSettingMRoleCreate', 'Window' );
      $this->items['wbfsys_user_setting-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_user_setting[m_role_create]',
        'id'        => 'wgt-input-wbfsys_user_setting_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'User Setting' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_user_setting', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_user_setting', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.user_setting.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_user_setting_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_user_setting_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysUserSetting_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserSetting_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysUserSettingMTimeChanged' , 'Date' );
      $this->items['wbfsys_user_setting-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_user_setting[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_user_setting_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'User Setting' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_user_setting', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_user_setting', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.user_setting.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysUserSetting_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserSetting_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysUserSettingMRoleChange', 'Window' );
      $this->items['wbfsys_user_setting-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_user_setting[m_role_change]',
        'id'        => 'wgt-input-wbfsys_user_setting_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'User Setting' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_user_setting', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_user_setting', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.user_setting.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_user_setting_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_user_setting_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysUserSetting_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserSetting_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysUserSettingMVersion' , 'int' );
      $this->items['wbfsys_user_setting-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_user_setting[m_version]',
          'id'        => 'wgt-input-wbfsys_user_setting_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'User Setting' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_user_setting', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_user_setting', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.user_setting.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysUserSetting_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserSetting_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysUserSettingMUuid' , 'Text' );
      $this->items['wbfsys_user_setting-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_user_setting[m_uuid]',
          'id'        => 'wgt-input-wbfsys_user_setting_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'User Setting' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_user_setting', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_user_setting', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.user_setting.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysUserSetting_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysUserSetting_Crud_Edit_Form */


