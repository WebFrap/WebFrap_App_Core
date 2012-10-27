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
class WbfsysCustomColorScheme_Crud_Create_Form
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
  public $namespace  = 'WbfsysCustomColorScheme';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysCustomColorScheme';

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
      'wbfsys_custom_color_scheme' => array
      (
        'vid' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_entity' => array
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
        'id_scheme' => array
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
   * @var WbfsysCustomColorScheme_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysCustomColorScheme_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysCustomColorScheme_Entity $entity
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
      'wbfsys_custom_color_scheme' => array
      (
        'vid',
        'id_entity',
        'id_user',
        'id_scheme',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysCustomColorScheme entity
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
    $this->view->addVar( 'entityWbfsysCustomColorScheme', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_custom_color_scheme'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_custom_color_scheme[id_wbfsys_custom_color_scheme-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysCustomColorScheme_Vid( $params );
    $this->input_WbfsysCustomColorScheme_IdEntity( $params );
    $this->input_WbfsysCustomColorScheme_IdUser( $params );
    $this->input_WbfsysCustomColorScheme_IdScheme( $params );
    $this->input_WbfsysCustomColorScheme_Rowid( $params );
    $this->input_WbfsysCustomColorScheme_MTimeCreated( $params );
    $this->input_WbfsysCustomColorScheme_MRoleCreate( $params );
    $this->input_WbfsysCustomColorScheme_MTimeChanged( $params );
    $this->input_WbfsysCustomColorScheme_MRoleChange( $params );
    $this->input_WbfsysCustomColorScheme_MVersion( $params );
    $this->input_WbfsysCustomColorScheme_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomColorScheme_Vid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputVid = $this->view->newInput( 'inputWbfsysCustomColorSchemeVid', 'Hidden' );
      $this->items['wbfsys_custom_color_scheme-vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_color_scheme[vid]',
          'id'        => 'wgt-input-wbfsys_custom_color_scheme_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Vid', 'src' => 'Custom Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'vid' ),
        )
      );
      $inputVid->setWidth( 'medium' );

      $inputVid->setData( $this->entity->getInt( 'vid' ) );
      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysCustomColorScheme_Vid */

 /**
  * create the ui element for field id_entity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomColorScheme_IdEntity( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdEntity = $this->view->newInput( 'inputWbfsysCustomColorSchemeIdEntity', 'Hidden' );
      $this->items['wbfsys_custom_color_scheme-id_entity'] = $inputIdEntity;
      $inputIdEntity->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_color_scheme[id_entity]',
          'id'        => 'wgt-input-wbfsys_custom_color_scheme_id_entity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Entity', 'src' => 'Custom Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'id_entity' ),
        )
      );
      $inputIdEntity->setWidth( 'medium' );

      $inputIdEntity->setData( $this->entity->getSecure( 'id_entity' ) );
      $inputIdEntity->refresh           = $this->refresh;
      $inputIdEntity->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysCustomColorScheme_IdEntity */

 /**
  * create the ui element for field id_user
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomColorScheme_IdUser( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdUser = $this->view->newInput( 'inputWbfsysCustomColorSchemeIdUser', 'Hidden' );
      $this->items['wbfsys_custom_color_scheme-id_user'] = $inputIdUser;
      $inputIdUser->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_color_scheme[id_user]',
          'id'        => 'wgt-input-wbfsys_custom_color_scheme_id_user'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'User', 'src' => 'Custom Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'id_user' ),
        )
      );
      $inputIdUser->setWidth( 'medium' );

      $inputIdUser->setData( $this->entity->getSecure( 'id_user' ) );
      $inputIdUser->refresh           = $this->refresh;
      $inputIdUser->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysCustomColorScheme_IdUser */

 /**
  * create the ui element for field id_scheme
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomColorScheme_IdScheme( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysColorScheme_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysColorScheme not exists' );

      Log::warn( 'Looks like the Entity: WbfsysColorScheme is missing' );

      return;
    }


      //p: Window
      $objidWbfsysColorScheme = $this->entity->getData( 'id_scheme' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysColorScheme
          || !$entityWbfsysColorScheme = $this->db->orm->get
          (
            'WbfsysColorScheme',
            $objidWbfsysColorScheme
          )
      )
      {
        $entityWbfsysColorScheme = $this->db->orm->newEntity( 'WbfsysColorScheme' );
      }

      $inputIdScheme = $this->view->newInput( 'inputWbfsysCustomColorSchemeIdScheme', 'Window' );
      $this->items['wbfsys_custom_color_scheme-id_scheme'] = $inputIdScheme;
      $inputIdScheme->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_custom_color_scheme[id_scheme]',
        'id'        => 'wgt-input-wbfsys_custom_color_scheme_id_scheme'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Scheme', 'src' => 'Custom Color Scheme' ) ),
      ));

      if( $this->assignedForm )
        $inputIdScheme->assignedForm = $this->assignedForm;

      $inputIdScheme->setWidth( 'medium' );

      $inputIdScheme->setData( $this->entity->getData( 'id_scheme' )  );
      $inputIdScheme->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_color_scheme', 'id_scheme' ) );
      $inputIdScheme->setRequired( $this->fieldRequired( 'wbfsys_custom_color_scheme', 'id_scheme' ) );
      $inputIdScheme->setLabel( $i18n->l( 'Scheme', 'wbfsys.custom_color_scheme.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ColorScheme.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_custom_color_scheme_id_scheme'.($this->suffix?'-'.$this->suffix:'');

      $inputIdScheme->setListUrl ( $listUrl );
      $inputIdScheme->setListIcon( 'control/connect.png' );
      $inputIdScheme->setEntityUrl( 'maintab.php?c=Wbfsys.ColorScheme.edit' );
      $inputIdScheme->conEntity         = $entityWbfsysColorScheme;
      $inputIdScheme->refresh           = $this->refresh;
      $inputIdScheme->serializeElement  = $this->sendElement;



      $inputIdScheme->view = $this->view;
      $inputIdScheme->buildJavascript( 'wgt-input-wbfsys_custom_color_scheme_id_scheme'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdScheme );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysCustomColorScheme_IdScheme */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomColorScheme_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysCustomColorSchemeRowid' , 'int' );
      $this->items['wbfsys_custom_color_scheme-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_color_scheme[rowid]',
          'id'        => 'wgt-input-wbfsys_custom_color_scheme_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Custom Color Scheme' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_color_scheme', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_custom_color_scheme', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.custom_color_scheme.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysCustomColorScheme_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomColorScheme_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysCustomColorSchemeMTimeCreated' , 'Date' );
      $this->items['wbfsys_custom_color_scheme-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_color_scheme[m_time_created]',
          'id'        => 'wgt-input-wbfsys_custom_color_scheme_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Custom Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_color_scheme', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_custom_color_scheme', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.custom_color_scheme.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysCustomColorScheme_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomColorScheme_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysCustomColorSchemeMRoleCreate', 'Window' );
      $this->items['wbfsys_custom_color_scheme-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_custom_color_scheme[m_role_create]',
        'id'        => 'wgt-input-wbfsys_custom_color_scheme_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Custom Color Scheme' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_color_scheme', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_custom_color_scheme', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.custom_color_scheme.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_custom_color_scheme_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_custom_color_scheme_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysCustomColorScheme_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomColorScheme_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysCustomColorSchemeMTimeChanged' , 'Date' );
      $this->items['wbfsys_custom_color_scheme-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_color_scheme[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_custom_color_scheme_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Custom Color Scheme' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_color_scheme', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_custom_color_scheme', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.custom_color_scheme.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysCustomColorScheme_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomColorScheme_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysCustomColorSchemeMRoleChange', 'Window' );
      $this->items['wbfsys_custom_color_scheme-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_custom_color_scheme[m_role_change]',
        'id'        => 'wgt-input-wbfsys_custom_color_scheme_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Custom Color Scheme' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_color_scheme', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_custom_color_scheme', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.custom_color_scheme.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_custom_color_scheme_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_custom_color_scheme_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysCustomColorScheme_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomColorScheme_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysCustomColorSchemeMVersion' , 'int' );
      $this->items['wbfsys_custom_color_scheme-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_color_scheme[m_version]',
          'id'        => 'wgt-input-wbfsys_custom_color_scheme_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Custom Color Scheme' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_color_scheme', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_custom_color_scheme', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.custom_color_scheme.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysCustomColorScheme_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomColorScheme_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysCustomColorSchemeMUuid' , 'Text' );
      $this->items['wbfsys_custom_color_scheme-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_color_scheme[m_uuid]',
          'id'        => 'wgt-input-wbfsys_custom_color_scheme_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Custom Color Scheme' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_color_scheme', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_custom_color_scheme', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.custom_color_scheme.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysCustomColorScheme_MUuid */

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
      $orm->getValidationData( 'WbfsysCustomColorScheme', array_keys( $this->fields['wbfsys_custom_color_scheme']), true ),
      $orm->getErrorMessages( 'WbfsysCustomColorScheme' ),
      'wbfsys_custom_color_scheme'
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


}//end class WbfsysCustomColorScheme_Crud_Create_Form */


