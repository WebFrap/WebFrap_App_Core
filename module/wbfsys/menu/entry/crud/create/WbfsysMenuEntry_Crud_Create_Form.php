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
class WbfsysMenuEntry_Crud_Create_Form
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
  public $namespace  = 'WbfsysMenuEntry';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysMenuEntry';

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
      'wbfsys_menu_entry' => array
      (
        'm_parent' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'label' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'icon' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'http_url' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'access_key' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'id_menu' => array
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
        'mimetype' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '20',
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
   * @var WbfsysMenuEntry_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysMenuEntry_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysMenuEntry_Entity $entity
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
      'wbfsys_menu_entry' => array
      (
        'm_parent',
        'label',
        'icon',
        'http_url',
        'access_key',
        'id_menu',
        'description',
        'mimetype',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysMenuEntry entity
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
    $this->view->addVar( 'entityWbfsysMenuEntry', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_menu_entry'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_menu_entry[id_wbfsys_menu_entry-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysMenuEntry_MParent( $params );
    $this->input_WbfsysMenuEntry_Label( $params );
    $this->input_WbfsysMenuEntry_Icon( $params );
    $this->input_WbfsysMenuEntry_HttpUrl( $params );
    $this->input_WbfsysMenuEntry_AccessKey( $params );
    $this->input_WbfsysMenuEntry_IdMenu( $params );
    $this->input_WbfsysMenuEntry_Description( $params );
    $this->input_WbfsysMenuEntry_Mimetype( $params );
    $this->input_WbfsysMenuEntry_Rowid( $params );
    $this->input_WbfsysMenuEntry_MTimeCreated( $params );
    $this->input_WbfsysMenuEntry_MRoleCreate( $params );
    $this->input_WbfsysMenuEntry_MTimeChanged( $params );
    $this->input_WbfsysMenuEntry_MRoleChange( $params );
    $this->input_WbfsysMenuEntry_MVersion( $params );
    $this->input_WbfsysMenuEntry_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field m_parent
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMenuEntry_MParent( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysMenuEntry_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysMenuEntry not exists' );

      Log::warn( 'Looks like the Entity: WbfsysMenuEntry is missing' );

      return;
    }


      //p: Window
      $objidWbfsysMenuEntry = $this->entity->getData( 'm_parent' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysMenuEntry
          || !$entityWbfsysMenuEntry = $this->db->orm->get
          (
            'WbfsysMenuEntry',
            $objidWbfsysMenuEntry
          )
      )
      {
        $entityWbfsysMenuEntry = $this->db->orm->newEntity( 'WbfsysMenuEntry' );
      }

      $inputMParent = $this->view->newInput( 'inputWbfsysMenuEntryMParent', 'Window' );
      $this->items['wbfsys_menu_entry-m_parent'] = $inputMParent;
      $inputMParent->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_menu_entry[m_parent]',
        'id'        => 'wgt-input-wbfsys_menu_entry_m_parent'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Parent Node', 'src' => 'Menu Entry' ) ),
      ));

      if( $this->assignedForm )
        $inputMParent->assignedForm = $this->assignedForm;

      $inputMParent->setWidth( 'medium' );

      $inputMParent->setData( $this->entity->getData( 'm_parent' )  );
      $inputMParent->setReadonly( $this->fieldReadOnly( 'wbfsys_menu_entry', 'm_parent' ) );
      $inputMParent->setRequired( $this->fieldRequired( 'wbfsys_menu_entry', 'm_parent' ) );
      $inputMParent->setLabel( $i18n->l( 'Parent Node', 'wbfsys.menu_entry.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.MenuEntry.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_menu_entry_m_parent'.($this->suffix?'-'.$this->suffix:'');

      $inputMParent->setListUrl ( $listUrl );
      $inputMParent->setListIcon( 'control/connect.png' );
      $inputMParent->setEntityUrl( 'maintab.php?c=Wbfsys.MenuEntry.edit' );
      $inputMParent->conEntity         = $entityWbfsysMenuEntry;
      $inputMParent->refresh           = $this->refresh;
      $inputMParent->serializeElement  = $this->sendElement;



      $inputMParent->view = $this->view;
      $inputMParent->buildJavascript( 'wgt-input-wbfsys_menu_entry_m_parent'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMParent );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMenuEntry_MParent */

 /**
  * create the ui element for field label
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMenuEntry_Label( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputLabel = $this->view->newInput( 'inputWbfsysMenuEntryLabel' , 'Text' );
      $this->items['wbfsys_menu_entry-label'] = $inputLabel;
      $inputLabel->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_menu_entry[label]',
          'id'        => 'wgt-input-wbfsys_menu_entry_label'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Label', 'src' => 'Menu Entry' ) ),
          'maxlength' => $this->entity->maxSize( 'label' ),
        )
      );
      $inputLabel->setWidth( 'medium' );

      $inputLabel->setReadonly( $this->fieldReadOnly( 'wbfsys_menu_entry', 'label' ) );
      $inputLabel->setRequired( $this->fieldRequired( 'wbfsys_menu_entry', 'label' ) );
      $inputLabel->setData( $this->entity->getSecure('label') );
      $inputLabel->setLabel( $i18n->l( 'Label', 'wbfsys.menu_entry.label' ) );

      $inputLabel->refresh           = $this->refresh;
      $inputLabel->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMenuEntry_Label */

 /**
  * create the ui element for field icon
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMenuEntry_Icon( $params )
  {
    $i18n     = $this->view->i18n;

      //p: input file image
      $inputIcon = $this->view->newInput( 'inputWbfsysMenuEntryIcon', 'FileImage' );
      $inputIcon->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_menu_entry[icon]',
          'id'        => 'wgt-input-wbfsys_menu_entry_icon'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium',
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Icon', 'src' => 'Menu Entry' ) ),
        )
      );
      $inputIcon->setWidth( 'medium' );

      if
      (
        ( $objid = $this->entity->getId() )
          && $this->entity->icon
      )
      {
        $inputIcon->setSource
        (
          'thumb.php?f=wbfsys_menu_entry-icon-'.$objid.'&amp;n='
            .base64_encode( $this->entity->icon )
        );
        $inputIcon->setLink
        (
          'image.php?f=wbfsys_menu_entry-icon-'.$objid.'&amp;n='
            .base64_encode( $this->entity->icon )
        );
      }

      if( $this->assignedForm )
        $inputIcon->assignedForm = $this->assignedForm;

      $inputIcon->setReadonly( $this->fieldReadOnly( 'wbfsys_menu_entry', 'icon' ) );
      $inputIcon->setRequired( $this->fieldRequired( 'wbfsys_menu_entry', 'icon' ) );
      $inputIcon->setLabel( $i18n->l( 'Icon', 'wbfsys.menu_entry.label' ) );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMenuEntry_Icon */

 /**
  * create the ui element for field http_url
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMenuEntry_HttpUrl( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputHttpUrl = $this->view->newInput( 'inputWbfsysMenuEntryHttpUrl' , 'text' );
      $this->items['wbfsys_menu_entry-http_url'] = $inputHttpUrl;
      $inputHttpUrl->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_menu_entry[http_url]',
          'id'        => 'wgt-input-wbfsys_menu_entry_http_url'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_url medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'URL', 'src' => 'Menu Entry' ) ),
        )
      );
      $inputHttpUrl->setWidth( 'medium' );

      $inputHttpUrl->setReadonly( $this->fieldReadOnly( 'wbfsys_menu_entry', 'http_url' ) );
      $inputHttpUrl->setRequired( $this->fieldRequired( 'wbfsys_menu_entry', 'http_url' ) );
      $inputHttpUrl->setData( $this->entity->getSecure( 'http_url' ) );
      $inputHttpUrl->setLabel( $i18n->l( 'URL', 'wbfsys.menu_entry.label' ) );

      $inputHttpUrl->refresh           = $this->refresh;
      $inputHttpUrl->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_WbfsysMenuEntry_HttpUrl */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMenuEntry_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysMenuEntryAccessKey' , 'Text' );
      $this->items['wbfsys_menu_entry-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_menu_entry[access_key]',
          'id'        => 'wgt-input-wbfsys_menu_entry_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Menu Entry' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_menu_entry', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_menu_entry', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.menu_entry.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMenuEntry_AccessKey */

 /**
  * create the ui element for field id_menu
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMenuEntry_IdMenu( $params )
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
      $objidWbfsysMenu = $this->entity->getData( 'id_menu' ) ;

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

      $inputIdMenu = $this->view->newInput( 'inputWbfsysMenuEntryIdMenu', 'Window' );
      $this->items['wbfsys_menu_entry-id_menu'] = $inputIdMenu;
      $inputIdMenu->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_menu_entry[id_menu]',
        'id'        => 'wgt-input-wbfsys_menu_entry_id_menu'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Menu', 'src' => 'Menu Entry' ) ),
      ));

      if( $this->assignedForm )
        $inputIdMenu->assignedForm = $this->assignedForm;

      $inputIdMenu->setWidth( 'medium' );

      $inputIdMenu->setData( $this->entity->getData( 'id_menu' )  );
      $inputIdMenu->setReadonly( $this->fieldReadOnly( 'wbfsys_menu_entry', 'id_menu' ) );
      $inputIdMenu->setRequired( $this->fieldRequired( 'wbfsys_menu_entry', 'id_menu' ) );
      $inputIdMenu->setLabel( $i18n->l( 'Menu', 'wbfsys.menu_entry.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Menu.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_menu_entry_id_menu'.($this->suffix?'-'.$this->suffix:'');

      $inputIdMenu->setListUrl ( $listUrl );
      $inputIdMenu->setListIcon( 'control/connect.png' );
      $inputIdMenu->setEntityUrl( 'maintab.php?c=Wbfsys.Menu.edit' );
      $inputIdMenu->conEntity         = $entityWbfsysMenu;
      $inputIdMenu->refresh           = $this->refresh;
      $inputIdMenu->serializeElement  = $this->sendElement;



      $inputIdMenu->view = $this->view;
      $inputIdMenu->buildJavascript( 'wgt-input-wbfsys_menu_entry_id_menu'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdMenu );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMenuEntry_IdMenu */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMenuEntry_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysMenuEntryDescription', 'Textarea' );
      $this->items['wbfsys_menu_entry-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_menu_entry[description]',
          'id'    => 'wgt-input-wbfsys_menu_entry_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Menu Entry' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_menu_entry', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_menu_entry', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.menu_entry.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysMenuEntry_Description */

 /**
  * create the ui element for field mimetype
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMenuEntry_Mimetype( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputMimetype = $this->view->newInput( 'inputWbfsysMenuEntryMimetype', 'Hidden' );
      $this->items['wbfsys_menu_entry-mimetype'] = $inputMimetype;
      $inputMimetype->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_menu_entry[mimetype]',
          'id'        => 'wgt-input-wbfsys_menu_entry_mimetype'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Mimetype', 'src' => 'Menu Entry' ) ),
          'maxlength' => $this->entity->maxSize( 'mimetype' ),
        )
      );
      $inputMimetype->setWidth( 'medium' );

      $inputMimetype->setData( $this->entity->getSecure( 'mimetype' ) );
      $inputMimetype->refresh           = $this->refresh;
      $inputMimetype->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysMenuEntry_Mimetype */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMenuEntry_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysMenuEntryRowid' , 'int' );
      $this->items['wbfsys_menu_entry-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_menu_entry[rowid]',
          'id'        => 'wgt-input-wbfsys_menu_entry_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Menu Entry' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_menu_entry', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_menu_entry', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.menu_entry.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMenuEntry_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMenuEntry_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysMenuEntryMTimeCreated' , 'Date' );
      $this->items['wbfsys_menu_entry-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_menu_entry[m_time_created]',
          'id'        => 'wgt-input-wbfsys_menu_entry_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Menu Entry' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_menu_entry', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_menu_entry', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.menu_entry.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysMenuEntry_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMenuEntry_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysMenuEntryMRoleCreate', 'Window' );
      $this->items['wbfsys_menu_entry-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_menu_entry[m_role_create]',
        'id'        => 'wgt-input-wbfsys_menu_entry_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Menu Entry' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_menu_entry', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_menu_entry', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.menu_entry.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_menu_entry_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_menu_entry_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysMenuEntry_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMenuEntry_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysMenuEntryMTimeChanged' , 'Date' );
      $this->items['wbfsys_menu_entry-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_menu_entry[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_menu_entry_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Menu Entry' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_menu_entry', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_menu_entry', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.menu_entry.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysMenuEntry_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMenuEntry_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysMenuEntryMRoleChange', 'Window' );
      $this->items['wbfsys_menu_entry-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_menu_entry[m_role_change]',
        'id'        => 'wgt-input-wbfsys_menu_entry_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Menu Entry' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_menu_entry', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_menu_entry', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.menu_entry.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_menu_entry_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_menu_entry_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysMenuEntry_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMenuEntry_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysMenuEntryMVersion' , 'int' );
      $this->items['wbfsys_menu_entry-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_menu_entry[m_version]',
          'id'        => 'wgt-input-wbfsys_menu_entry_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Menu Entry' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_menu_entry', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_menu_entry', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.menu_entry.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMenuEntry_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMenuEntry_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysMenuEntryMUuid' , 'Text' );
      $this->items['wbfsys_menu_entry-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_menu_entry[m_uuid]',
          'id'        => 'wgt-input-wbfsys_menu_entry_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Menu Entry' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_menu_entry', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_menu_entry', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.menu_entry.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMenuEntry_MUuid */

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
      $orm->getValidationData( 'WbfsysMenuEntry', array_keys( $this->fields['wbfsys_menu_entry']), true ),
      $orm->getErrorMessages( 'WbfsysMenuEntry' ),
      'wbfsys_menu_entry'
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


}//end class WbfsysMenuEntry_Crud_Create_Form */


