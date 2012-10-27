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
class WbfsysMask_Crud_Edit_Form
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
  public $namespace  = 'WbfsysMask';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysMask';

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
      'wbfsys_mask' => array
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
        'access_url' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'dset_mask' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'context' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '100',
        ),
        'id_module' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_management' => array
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
   * @var WbfsysMask_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysMask_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysMask_Entity $entity
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
      'wbfsys_mask' => array
      (
        'name',
        'access_key',
        'access_url',
        'dset_mask',
        'context',
        'id_module',
        'id_management',
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
  * create an IO form for the WbfsysMask entity
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
    $this->view->addVar( 'entityWbfsysMask', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_mask'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_mask[id_wbfsys_mask-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysMask_Name( $params );
    $this->input_WbfsysMask_AccessKey( $params );
    $this->input_WbfsysMask_AccessUrl( $params );
    $this->input_WbfsysMask_DsetMask( $params );
    $this->input_WbfsysMask_Context( $params );
    $this->input_WbfsysMask_IdModule( $params );
    $this->input_WbfsysMask_IdManagement( $params );
    $this->input_WbfsysMask_Description( $params );
    $this->input_WbfsysMask_Revision( $params );
    $this->input_WbfsysMask_Rowid( $params );
    $this->input_WbfsysMask_MTimeCreated( $params );
    $this->input_WbfsysMask_MRoleCreate( $params );
    $this->input_WbfsysMask_MTimeChanged( $params );
    $this->input_WbfsysMask_MRoleChange( $params );
    $this->input_WbfsysMask_MVersion( $params );
    $this->input_WbfsysMask_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMask_Name( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputName = $this->view->newInput( 'inputWbfsysMaskName' , 'Text' );
      $this->items['wbfsys_mask-name'] = $inputName;
      $inputName->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask[name]',
          'id'        => 'wgt-input-wbfsys_mask_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Name', 'src' => 'Mask' ) ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadonly( $this->fieldReadOnly( 'wbfsys_mask', 'name' ) );
      $inputName->setRequired( $this->fieldRequired( 'wbfsys_mask', 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel( $i18n->l( 'Name', 'wbfsys.mask.label' ) );

      $inputName->refresh           = $this->refresh;
      $inputName->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMask_Name */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMask_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysMaskAccessKey' , 'Text' );
      $this->items['wbfsys_mask-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask[access_key]',
          'id'        => 'wgt-input-wbfsys_mask_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Mask' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_mask', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_mask', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.mask.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMask_AccessKey */

 /**
  * create the ui element for field access_url
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMask_AccessUrl( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessUrl = $this->view->newInput( 'inputWbfsysMaskAccessUrl' , 'Text' );
      $this->items['wbfsys_mask-access_url'] = $inputAccessUrl;
      $inputAccessUrl->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask[access_url]',
          'id'        => 'wgt-input-wbfsys_mask_access_url'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Url', 'src' => 'Mask' ) ),
          'maxlength' => $this->entity->maxSize( 'access_url' ),
        )
      );
      $inputAccessUrl->setWidth( 'medium' );

      $inputAccessUrl->setReadonly( $this->fieldReadOnly( 'wbfsys_mask', 'access_url' ) );
      $inputAccessUrl->setRequired( $this->fieldRequired( 'wbfsys_mask', 'access_url' ) );
      $inputAccessUrl->setData( $this->entity->getSecure('access_url') );
      $inputAccessUrl->setLabel( $i18n->l( 'Access Url', 'wbfsys.mask.label' ) );

      $inputAccessUrl->refresh           = $this->refresh;
      $inputAccessUrl->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMask_AccessUrl */

 /**
  * create the ui element for field dset_mask
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMask_DsetMask( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputDsetMask = $this->view->newInput( 'inputWbfsysMaskDsetMask', 'Checkbox' );
      $this->items['wbfsys_mask-dset_mask'] = $inputDsetMask;
      $inputDsetMask->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask[dset_mask]',
          'id'        => 'wgt-input-wbfsys_mask_dset_mask'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Dset Mask', 'src' => 'Mask' ) ),
        )
      );
      $inputDsetMask->setWidth( 'medium' );

      $inputDsetMask->setReadonly( $this->fieldReadOnly( 'wbfsys_mask', 'dset_mask' ) );
      $inputDsetMask->setRequired( $this->fieldRequired( 'wbfsys_mask', 'dset_mask' ) );
      $inputDsetMask->setActive( $this->entity->getBoolean( 'dset_mask' ) );
      $inputDsetMask->setLabel( $i18n->l( 'Dset Mask', 'wbfsys.mask.label' ) );

      $inputDsetMask->refresh           = $this->refresh;
      $inputDsetMask->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMask_DsetMask */

 /**
  * create the ui element for field context
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMask_Context( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputContext = $this->view->newInput( 'inputWbfsysMaskContext' , 'Text' );
      $this->items['wbfsys_mask-context'] = $inputContext;
      $inputContext->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask[context]',
          'id'        => 'wgt-input-wbfsys_mask_context'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Context', 'src' => 'Mask' ) ),
          'maxlength' => $this->entity->maxSize( 'context' ),
        )
      );
      $inputContext->setWidth( 'medium' );

      $inputContext->setReadonly( $this->fieldReadOnly( 'wbfsys_mask', 'context' ) );
      $inputContext->setRequired( $this->fieldRequired( 'wbfsys_mask', 'context' ) );
      $inputContext->setData( $this->entity->getSecure('context') );
      $inputContext->setLabel( $i18n->l( 'Context', 'wbfsys.mask.label' ) );

      $inputContext->refresh           = $this->refresh;
      $inputContext->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMask_Context */

 /**
  * create the ui element for field id_module
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMask_IdModule( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysModule_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysModule not exists' );

      Log::warn( 'Looks like the Entity: WbfsysModule is missing' );

      return;
    }


      //p: Window
      $objidWbfsysModule = $this->entity->getData( 'id_module' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysModule
          || !$entityWbfsysModule = $this->db->orm->get
          (
            'WbfsysModule',
            $objidWbfsysModule
          )
      )
      {
        $entityWbfsysModule = $this->db->orm->newEntity( 'WbfsysModule' );
      }

      $inputIdModule = $this->view->newInput( 'inputWbfsysMaskIdModule', 'Window' );
      $this->items['wbfsys_mask-id_module'] = $inputIdModule;
      $inputIdModule->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_mask[id_module]',
        'id'        => 'wgt-input-wbfsys_mask_id_module'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Module', 'src' => 'Mask' ) ),
      ));

      if( $this->assignedForm )
        $inputIdModule->assignedForm = $this->assignedForm;

      $inputIdModule->setWidth( 'medium' );

      $inputIdModule->setData( $this->entity->getData( 'id_module' )  );
      $inputIdModule->setReadonly( $this->fieldReadOnly( 'wbfsys_mask', 'id_module' ) );
      $inputIdModule->setRequired( $this->fieldRequired( 'wbfsys_mask', 'id_module' ) );
      $inputIdModule->setLabel( $i18n->l( 'Module', 'wbfsys.mask.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Module.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_mask_id_module'.($this->suffix?'-'.$this->suffix:'');

      $inputIdModule->setListUrl ( $listUrl );
      $inputIdModule->setListIcon( 'control/connect.png' );
      $inputIdModule->setEntityUrl( 'maintab.php?c=Wbfsys.Module.edit' );
      $inputIdModule->conEntity         = $entityWbfsysModule;
      $inputIdModule->refresh           = $this->refresh;
      $inputIdModule->serializeElement  = $this->sendElement;



      $inputIdModule->view = $this->view;
      $inputIdModule->buildJavascript( 'wgt-input-wbfsys_mask_id_module'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdModule );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMask_IdModule */

 /**
  * create the ui element for field id_management
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMask_IdManagement( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysManagement_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysManagement not exists' );

      Log::warn( 'Looks like the Entity: WbfsysManagement is missing' );

      return;
    }


      //p: Window
      $objidWbfsysManagement = $this->entity->getData( 'id_management' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysManagement
          || !$entityWbfsysManagement = $this->db->orm->get
          (
            'WbfsysManagement',
            $objidWbfsysManagement
          )
      )
      {
        $entityWbfsysManagement = $this->db->orm->newEntity( 'WbfsysManagement' );
      }

      $inputIdManagement = $this->view->newInput( 'inputWbfsysMaskIdManagement', 'Window' );
      $this->items['wbfsys_mask-id_management'] = $inputIdManagement;
      $inputIdManagement->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_mask[id_management]',
        'id'        => 'wgt-input-wbfsys_mask_id_management'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Management', 'src' => 'Mask' ) ),
      ));

      if( $this->assignedForm )
        $inputIdManagement->assignedForm = $this->assignedForm;

      $inputIdManagement->setWidth( 'medium' );

      $inputIdManagement->setData( $this->entity->getData( 'id_management' )  );
      $inputIdManagement->setReadonly( $this->fieldReadOnly( 'wbfsys_mask', 'id_management' ) );
      $inputIdManagement->setRequired( $this->fieldRequired( 'wbfsys_mask', 'id_management' ) );
      $inputIdManagement->setLabel( $i18n->l( 'Management', 'wbfsys.mask.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Management.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_mask_id_management'.($this->suffix?'-'.$this->suffix:'');

      $inputIdManagement->setListUrl ( $listUrl );
      $inputIdManagement->setListIcon( 'control/connect.png' );
      $inputIdManagement->setEntityUrl( 'maintab.php?c=Wbfsys.Management.edit' );
      $inputIdManagement->conEntity         = $entityWbfsysManagement;
      $inputIdManagement->refresh           = $this->refresh;
      $inputIdManagement->serializeElement  = $this->sendElement;



      $inputIdManagement->view = $this->view;
      $inputIdManagement->buildJavascript( 'wgt-input-wbfsys_mask_id_management'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdManagement );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMask_IdManagement */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMask_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysMaskDescription', 'Textarea' );
      $this->items['wbfsys_mask-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_mask[description]',
          'id'    => 'wgt-input-wbfsys_mask_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Mask' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_mask', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_mask', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.mask.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysMask_Description */

 /**
  * create the ui element for field revision
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMask_Revision( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputRevision = $this->view->newInput( 'inputWbfsysMaskRevision', 'Int' );
      $this->items['wbfsys_mask-revision'] = $inputRevision;
      $inputRevision->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask[revision]',
          'id'        => 'wgt-input-wbfsys_mask_revision'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Revision', 'src' => 'Mask' ) ),
        )
      );
      $inputRevision->setWidth( 'medium' );

$inputRevision->setReadOnly( $this->fieldReadOnly( 'wbfsys_mask', 'revision' ) );
      $inputRevision->setRequired( $this->fieldRequired( 'wbfsys_mask', 'revision' ) );
      $inputRevision->setData( $this->entity->getData( 'revision' ) );
      $inputRevision->setLabel( $i18n->l( 'Revision', 'wbfsys.mask.label' ) );

      $inputRevision->refresh           = $this->refresh;
      $inputRevision->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMask_Revision */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMask_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysMaskRowid' , 'int' );
      $this->items['wbfsys_mask-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask[rowid]',
          'id'        => 'wgt-input-wbfsys_mask_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Mask' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_mask', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_mask', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.mask.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMask_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMask_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysMaskMTimeCreated' , 'Date' );
      $this->items['wbfsys_mask-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask[m_time_created]',
          'id'        => 'wgt-input-wbfsys_mask_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Mask' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_mask', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_mask', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.mask.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysMask_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMask_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysMaskMRoleCreate', 'Window' );
      $this->items['wbfsys_mask-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_mask[m_role_create]',
        'id'        => 'wgt-input-wbfsys_mask_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Mask' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_mask', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_mask', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.mask.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_mask_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_mask_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysMask_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMask_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysMaskMTimeChanged' , 'Date' );
      $this->items['wbfsys_mask-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_mask_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Mask' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_mask', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_mask', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.mask.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysMask_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMask_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysMaskMRoleChange', 'Window' );
      $this->items['wbfsys_mask-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_mask[m_role_change]',
        'id'        => 'wgt-input-wbfsys_mask_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Mask' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_mask', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_mask', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.mask.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_mask_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_mask_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysMask_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMask_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysMaskMVersion' , 'int' );
      $this->items['wbfsys_mask-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask[m_version]',
          'id'        => 'wgt-input-wbfsys_mask_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Mask' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_mask', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_mask', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.mask.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMask_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMask_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysMaskMUuid' , 'Text' );
      $this->items['wbfsys_mask-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_mask[m_uuid]',
          'id'        => 'wgt-input-wbfsys_mask_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Mask' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_mask', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_mask', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.mask.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMask_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysMask_Crud_Edit_Form */


