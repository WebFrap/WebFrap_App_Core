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
class WbfsysDesktop_Crud_Edit_Form
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
  public $namespace  = 'WbfsysDesktop';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysDesktop';

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
      'wbfsys_desktop' => array
      (
        'name' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'access_key' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'id_app' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_main_menu' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_main_tree' => array
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
        'revision' => array
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
   * @var WbfsysDesktop_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysDesktop_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysDesktop_Entity $entity
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
      'wbfsys_desktop' => array
      (
        'name',
        'access_key',
        'id_app',
        'id_main_menu',
        'id_main_tree',
        'description',
        'revision',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysDesktop entity
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
    $this->view->addVar( 'entityWbfsysDesktop', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_desktop'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_desktop[id_wbfsys_desktop-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysDesktop_Name( $params );
    $this->input_WbfsysDesktop_AccessKey( $params );
    $this->input_WbfsysDesktop_IdApp( $params );
    $this->input_WbfsysDesktop_IdMainMenu( $params );
    $this->input_WbfsysDesktop_IdMainTree( $params );
    $this->input_WbfsysDesktop_Description( $params );
    $this->input_WbfsysDesktop_Revision( $params );
    $this->input_WbfsysDesktop_Rowid( $params );
    $this->input_WbfsysDesktop_MTimeCreated( $params );
    $this->input_WbfsysDesktop_MRoleCreate( $params );
    $this->input_WbfsysDesktop_MTimeChanged( $params );
    $this->input_WbfsysDesktop_MRoleChange( $params );
    $this->input_WbfsysDesktop_MVersion( $params );
    $this->input_WbfsysDesktop_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDesktop_Name( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputName = $this->view->newInput( 'inputWbfsysDesktopName' , 'Text' );
      $this->items['wbfsys_desktop-name'] = $inputName;
      $inputName->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_desktop[name]',
          'id'        => 'wgt-input-wbfsys_desktop_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Name', 'src' => 'Desktop' ) ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadonly( $this->fieldReadOnly( 'wbfsys_desktop', 'name' ) );
      $inputName->setRequired( $this->fieldRequired( 'wbfsys_desktop', 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel( $i18n->l( 'Name', 'wbfsys.desktop.label' ) );

      $inputName->refresh           = $this->refresh;
      $inputName->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysDesktop_Name */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDesktop_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysDesktopAccessKey' , 'Text' );
      $this->items['wbfsys_desktop-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_desktop[access_key]',
          'id'        => 'wgt-input-wbfsys_desktop_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Desktop' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_desktop', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_desktop', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.desktop.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysDesktop_AccessKey */

 /**
  * create the ui element for field id_app
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDesktop_IdApp( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysApp_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysApp not exists' );

      Log::warn( 'Looks like the Entity: WbfsysApp is missing' );

      return;
    }


      //p: Window
      $objidWbfsysApp = $this->entity->getData( 'id_app' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysApp
          || !$entityWbfsysApp = $this->db->orm->get
          (
            'WbfsysApp',
            $objidWbfsysApp
          )
      )
      {
        $entityWbfsysApp = $this->db->orm->newEntity( 'WbfsysApp' );
      }

      $inputIdApp = $this->view->newInput( 'inputWbfsysDesktopIdApp', 'Window' );
      $this->items['wbfsys_desktop-id_app'] = $inputIdApp;
      $inputIdApp->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_desktop[id_app]',
        'id'        => 'wgt-input-wbfsys_desktop_id_app'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'App', 'src' => 'Desktop' ) ),
      ));

      if( $this->assignedForm )
        $inputIdApp->assignedForm = $this->assignedForm;

      $inputIdApp->setWidth( 'medium' );

      $inputIdApp->setData( $this->entity->getData( 'id_app' )  );
      $inputIdApp->setReadonly( $this->fieldReadOnly( 'wbfsys_desktop', 'id_app' ) );
      $inputIdApp->setRequired( $this->fieldRequired( 'wbfsys_desktop', 'id_app' ) );
      $inputIdApp->setLabel( $i18n->l( 'App', 'wbfsys.desktop.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.App.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_desktop_id_app'.($this->suffix?'-'.$this->suffix:'');

      $inputIdApp->setListUrl ( $listUrl );
      $inputIdApp->setListIcon( 'control/connect.png' );
      $inputIdApp->setEntityUrl( 'maintab.php?c=Wbfsys.App.edit' );
      $inputIdApp->conEntity         = $entityWbfsysApp;
      $inputIdApp->refresh           = $this->refresh;
      $inputIdApp->serializeElement  = $this->sendElement;



      $inputIdApp->view = $this->view;
      $inputIdApp->buildJavascript( 'wgt-input-wbfsys_desktop_id_app'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdApp );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysDesktop_IdApp */

 /**
  * create the ui element for field id_main_menu
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDesktop_IdMainMenu( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysMenu_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysMenu not exists' );

      Log::warn( 'Looks like the Entity: WbfsysMenu is missing' );

      return;
    }


      //p: Window
      $objidWbfsysMenu = $this->entity->getData( 'id_main_menu' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysMenu
          || !$entityWbfsysMenu = $this->db->orm->get
          (
            'WbfsysMenu',
            $objidWbfsysMenu
          )
      )
      {
        $entityWbfsysMenu = $this->db->orm->newEntity( 'WbfsysMenu' );
      }

      $inputIdMainMenu = $this->view->newInput( 'inputWbfsysDesktopIdMainMenu', 'Window' );
      $this->items['wbfsys_desktop-id_main_menu'] = $inputIdMainMenu;
      $inputIdMainMenu->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_desktop[id_main_menu]',
        'id'        => 'wgt-input-wbfsys_desktop_id_main_menu'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Main Menu', 'src' => 'Desktop' ) ),
      ));

      if( $this->assignedForm )
        $inputIdMainMenu->assignedForm = $this->assignedForm;

      $inputIdMainMenu->setWidth( 'medium' );

      $inputIdMainMenu->setData( $this->entity->getData( 'id_main_menu' )  );
      $inputIdMainMenu->setReadonly( $this->fieldReadOnly( 'wbfsys_desktop', 'id_main_menu' ) );
      $inputIdMainMenu->setRequired( $this->fieldRequired( 'wbfsys_desktop', 'id_main_menu' ) );
      $inputIdMainMenu->setLabel( $i18n->l( 'Main Menu', 'wbfsys.desktop.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Menu.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_desktop_id_main_menu'.($this->suffix?'-'.$this->suffix:'');

      $inputIdMainMenu->setListUrl ( $listUrl );
      $inputIdMainMenu->setListIcon( 'control/connect.png' );
      $inputIdMainMenu->setEntityUrl( 'maintab.php?c=Wbfsys.Menu.edit' );
      $inputIdMainMenu->conEntity         = $entityWbfsysMenu;
      $inputIdMainMenu->refresh           = $this->refresh;
      $inputIdMainMenu->serializeElement  = $this->sendElement;



      $inputIdMainMenu->view = $this->view;
      $inputIdMainMenu->buildJavascript( 'wgt-input-wbfsys_desktop_id_main_menu'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdMainMenu );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysDesktop_IdMainMenu */

 /**
  * create the ui element for field id_main_tree
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDesktop_IdMainTree( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysMenu_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysMenu not exists' );

      Log::warn( 'Looks like the Entity: WbfsysMenu is missing' );

      return;
    }


      //p: Window
      $objidWbfsysMenu = $this->entity->getData( 'id_main_tree' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysMenu
          || !$entityWbfsysMenu = $this->db->orm->get
          (
            'WbfsysMenu',
            $objidWbfsysMenu
          )
      )
      {
        $entityWbfsysMenu = $this->db->orm->newEntity( 'WbfsysMenu' );
      }

      $inputIdMainTree = $this->view->newInput( 'inputWbfsysDesktopIdMainTree', 'Window' );
      $this->items['wbfsys_desktop-id_main_tree'] = $inputIdMainTree;
      $inputIdMainTree->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_desktop[id_main_tree]',
        'id'        => 'wgt-input-wbfsys_desktop_id_main_tree'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Main Tree', 'src' => 'Desktop' ) ),
      ));

      if( $this->assignedForm )
        $inputIdMainTree->assignedForm = $this->assignedForm;

      $inputIdMainTree->setWidth( 'medium' );

      $inputIdMainTree->setData( $this->entity->getData( 'id_main_tree' )  );
      $inputIdMainTree->setReadonly( $this->fieldReadOnly( 'wbfsys_desktop', 'id_main_tree' ) );
      $inputIdMainTree->setRequired( $this->fieldRequired( 'wbfsys_desktop', 'id_main_tree' ) );
      $inputIdMainTree->setLabel( $i18n->l( 'Main Tree', 'wbfsys.desktop.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Menu.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_desktop_id_main_tree'.($this->suffix?'-'.$this->suffix:'');

      $inputIdMainTree->setListUrl ( $listUrl );
      $inputIdMainTree->setListIcon( 'control/connect.png' );
      $inputIdMainTree->setEntityUrl( 'maintab.php?c=Wbfsys.Menu.edit' );
      $inputIdMainTree->conEntity         = $entityWbfsysMenu;
      $inputIdMainTree->refresh           = $this->refresh;
      $inputIdMainTree->serializeElement  = $this->sendElement;



      $inputIdMainTree->view = $this->view;
      $inputIdMainTree->buildJavascript( 'wgt-input-wbfsys_desktop_id_main_tree'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdMainTree );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysDesktop_IdMainTree */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDesktop_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysDesktopDescription', 'Textarea' );
      $this->items['wbfsys_desktop-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_desktop[description]',
          'id'    => 'wgt-input-wbfsys_desktop_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Desktop' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_desktop', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_desktop', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.desktop.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysDesktop_Description */

 /**
  * create the ui element for field revision
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDesktop_Revision( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputRevision = $this->view->newInput( 'inputWbfsysDesktopRevision', 'Int' );
      $this->items['wbfsys_desktop-revision'] = $inputRevision;
      $inputRevision->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_desktop[revision]',
          'id'        => 'wgt-input-wbfsys_desktop_revision'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Revision', 'src' => 'Desktop' ) ),
        )
      );
      $inputRevision->setWidth( 'medium' );

$inputRevision->setReadOnly( $this->fieldReadOnly( 'wbfsys_desktop', 'revision' ) );
      $inputRevision->setRequired( $this->fieldRequired( 'wbfsys_desktop', 'revision' ) );
      $inputRevision->setData( $this->entity->getData( 'revision' ) );
      $inputRevision->setLabel( $i18n->l( 'Revision', 'wbfsys.desktop.label' ) );

      $inputRevision->refresh           = $this->refresh;
      $inputRevision->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysDesktop_Revision */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDesktop_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysDesktopRowid' , 'int' );
      $this->items['wbfsys_desktop-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_desktop[rowid]',
          'id'        => 'wgt-input-wbfsys_desktop_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Desktop' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_desktop', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_desktop', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.desktop.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysDesktop_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDesktop_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysDesktopMTimeCreated' , 'Date' );
      $this->items['wbfsys_desktop-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_desktop[m_time_created]',
          'id'        => 'wgt-input-wbfsys_desktop_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Desktop' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_desktop', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_desktop', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.desktop.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysDesktop_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDesktop_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysDesktopMRoleCreate', 'Window' );
      $this->items['wbfsys_desktop-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_desktop[m_role_create]',
        'id'        => 'wgt-input-wbfsys_desktop_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Desktop' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_desktop', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_desktop', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.desktop.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_desktop_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_desktop_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysDesktop_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDesktop_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysDesktopMTimeChanged' , 'Date' );
      $this->items['wbfsys_desktop-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_desktop[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_desktop_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Desktop' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_desktop', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_desktop', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.desktop.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysDesktop_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDesktop_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysDesktopMRoleChange', 'Window' );
      $this->items['wbfsys_desktop-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_desktop[m_role_change]',
        'id'        => 'wgt-input-wbfsys_desktop_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Desktop' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_desktop', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_desktop', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.desktop.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_desktop_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_desktop_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysDesktop_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDesktop_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysDesktopMVersion' , 'int' );
      $this->items['wbfsys_desktop-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_desktop[m_version]',
          'id'        => 'wgt-input-wbfsys_desktop_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Desktop' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_desktop', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_desktop', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.desktop.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysDesktop_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDesktop_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysDesktopMUuid' , 'Text' );
      $this->items['wbfsys_desktop-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_desktop[m_uuid]',
          'id'        => 'wgt-input-wbfsys_desktop_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Desktop' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_desktop', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_desktop', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.desktop.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysDesktop_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysDesktop_Crud_Edit_Form */


