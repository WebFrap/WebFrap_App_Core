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
class WbfsysManagementReference_Crud_Show_Form
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
  public $namespace  = 'WbfsysManagementReference';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysManagementReference';

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
      'wbfsys_management_reference' => array
      (
        'access_key' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'id_from' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_to' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_reference' => array
        ( 
          'required'  => true, 
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
   * @var WbfsysManagementReference_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysManagementReference_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysManagementReference_Entity $entity
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
      'wbfsys_management_reference' => array
      (
        'access_key',
        'id_from',
        'id_to',
        'id_reference',
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
  * create an IO form for the WbfsysManagementReference entity
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
    $this->view->addVar( 'entityWbfsysManagementReference', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_management_reference'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_management_reference[id_wbfsys_management_reference-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysManagementReference_AccessKey( $params );
    $this->input_WbfsysManagementReference_IdFrom( $params );
    $this->input_WbfsysManagementReference_IdTo( $params );
    $this->input_WbfsysManagementReference_IdReference( $params );
    $this->input_WbfsysManagementReference_Description( $params );
    $this->input_WbfsysManagementReference_Revision( $params );
    $this->input_WbfsysManagementReference_Rowid( $params );
    $this->input_WbfsysManagementReference_MTimeCreated( $params );
    $this->input_WbfsysManagementReference_MRoleCreate( $params );
    $this->input_WbfsysManagementReference_MTimeChanged( $params );
    $this->input_WbfsysManagementReference_MRoleChange( $params );
    $this->input_WbfsysManagementReference_MVersion( $params );
    $this->input_WbfsysManagementReference_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysManagementReference_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysManagementReferenceAccessKey' , 'Text' );
      $this->items['wbfsys_management_reference-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_management_reference[access_key]',
          'id'        => 'wgt-input-wbfsys_management_reference_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Management Reference' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_management_reference', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_management_reference', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.management_reference.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysManagementReference_AccessKey */

 /**
  * create the ui element for field id_from
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysManagementReference_IdFrom( $params )
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
      $objidWbfsysManagement = $this->entity->getData( 'id_from' ) ;

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

      $inputIdFrom = $this->view->newInput( 'inputWbfsysManagementReferenceIdFrom', 'Window' );
      $this->items['wbfsys_management_reference-id_from'] = $inputIdFrom;
      $inputIdFrom->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_management_reference[id_from]',
        'id'        => 'wgt-input-wbfsys_management_reference_id_from'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'From', 'src' => 'Management Reference' ) ),
      ));

      if( $this->assignedForm )
        $inputIdFrom->assignedForm = $this->assignedForm;

      $inputIdFrom->setWidth( 'medium' );

      $inputIdFrom->setData( $this->entity->getData( 'id_from' )  );
      $inputIdFrom->setReadonly( $this->fieldReadOnly( 'wbfsys_management_reference', 'id_from' ) );
      $inputIdFrom->setRequired( $this->fieldRequired( 'wbfsys_management_reference', 'id_from' ) );
      $inputIdFrom->setLabel( $i18n->l( 'From', 'wbfsys.management_reference.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Management.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_management_reference_id_from'.($this->suffix?'-'.$this->suffix:'');

      $inputIdFrom->setListUrl ( $listUrl );
      $inputIdFrom->setListIcon( 'control/connect.png' );
      $inputIdFrom->setEntityUrl( 'maintab.php?c=Wbfsys.Management.edit' );
      $inputIdFrom->conEntity         = $entityWbfsysManagement;
      $inputIdFrom->refresh           = $this->refresh;
      $inputIdFrom->serializeElement  = $this->sendElement;



      $inputIdFrom->view = $this->view;
      $inputIdFrom->buildJavascript( 'wgt-input-wbfsys_management_reference_id_from'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdFrom );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysManagementReference_IdFrom */

 /**
  * create the ui element for field id_to
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysManagementReference_IdTo( $params )
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
      $objidWbfsysManagement = $this->entity->getData( 'id_to' ) ;

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

      $inputIdTo = $this->view->newInput( 'inputWbfsysManagementReferenceIdTo', 'Window' );
      $this->items['wbfsys_management_reference-id_to'] = $inputIdTo;
      $inputIdTo->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_management_reference[id_to]',
        'id'        => 'wgt-input-wbfsys_management_reference_id_to'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'To', 'src' => 'Management Reference' ) ),
      ));

      if( $this->assignedForm )
        $inputIdTo->assignedForm = $this->assignedForm;

      $inputIdTo->setWidth( 'medium' );

      $inputIdTo->setData( $this->entity->getData( 'id_to' )  );
      $inputIdTo->setReadonly( $this->fieldReadOnly( 'wbfsys_management_reference', 'id_to' ) );
      $inputIdTo->setRequired( $this->fieldRequired( 'wbfsys_management_reference', 'id_to' ) );
      $inputIdTo->setLabel( $i18n->l( 'To', 'wbfsys.management_reference.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Management.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_management_reference_id_to'.($this->suffix?'-'.$this->suffix:'');

      $inputIdTo->setListUrl ( $listUrl );
      $inputIdTo->setListIcon( 'control/connect.png' );
      $inputIdTo->setEntityUrl( 'maintab.php?c=Wbfsys.Management.edit' );
      $inputIdTo->conEntity         = $entityWbfsysManagement;
      $inputIdTo->refresh           = $this->refresh;
      $inputIdTo->serializeElement  = $this->sendElement;



      $inputIdTo->view = $this->view;
      $inputIdTo->buildJavascript( 'wgt-input-wbfsys_management_reference_id_to'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdTo );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysManagementReference_IdTo */

 /**
  * create the ui element for field id_reference
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysManagementReference_IdReference( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysEntityReference_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysEntityReference not exists' );

      Log::warn( 'Looks like the Entity: WbfsysEntityReference is missing' );

      return;
    }


      //p: Window
      $objidWbfsysEntityReference = $this->entity->getData( 'id_reference' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysEntityReference
          || !$entityWbfsysEntityReference = $this->db->orm->get
          (
            'WbfsysEntityReference',
            $objidWbfsysEntityReference
          )
      )
      {
        $entityWbfsysEntityReference = $this->db->orm->newEntity( 'WbfsysEntityReference' );
      }

      $inputIdReference = $this->view->newInput( 'inputWbfsysManagementReferenceIdReference', 'Window' );
      $this->items['wbfsys_management_reference-id_reference'] = $inputIdReference;
      $inputIdReference->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_management_reference[id_reference]',
        'id'        => 'wgt-input-wbfsys_management_reference_id_reference'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Reference', 'src' => 'Management Reference' ) ),
      ));

      if( $this->assignedForm )
        $inputIdReference->assignedForm = $this->assignedForm;

      $inputIdReference->setWidth( 'medium' );

      $inputIdReference->setData( $this->entity->getData( 'id_reference' )  );
      $inputIdReference->setReadonly( $this->fieldReadOnly( 'wbfsys_management_reference', 'id_reference' ) );
      $inputIdReference->setRequired( $this->fieldRequired( 'wbfsys_management_reference', 'id_reference' ) );
      $inputIdReference->setLabel( $i18n->l( 'Reference', 'wbfsys.management_reference.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.EntityReference.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_management_reference_id_reference'.($this->suffix?'-'.$this->suffix:'');

      $inputIdReference->setListUrl ( $listUrl );
      $inputIdReference->setListIcon( 'control/connect.png' );
      $inputIdReference->setEntityUrl( 'maintab.php?c=Wbfsys.EntityReference.edit' );
      $inputIdReference->conEntity         = $entityWbfsysEntityReference;
      $inputIdReference->refresh           = $this->refresh;
      $inputIdReference->serializeElement  = $this->sendElement;



      $inputIdReference->view = $this->view;
      $inputIdReference->buildJavascript( 'wgt-input-wbfsys_management_reference_id_reference'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdReference );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysManagementReference_IdReference */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysManagementReference_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysManagementReferenceDescription', 'Textarea' );
      $this->items['wbfsys_management_reference-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_management_reference[description]',
          'id'    => 'wgt-input-wbfsys_management_reference_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Management Reference' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_management_reference', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_management_reference', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.management_reference.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysManagementReference_Description */

 /**
  * create the ui element for field revision
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysManagementReference_Revision( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputRevision = $this->view->newInput( 'inputWbfsysManagementReferenceRevision', 'Int' );
      $this->items['wbfsys_management_reference-revision'] = $inputRevision;
      $inputRevision->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_management_reference[revision]',
          'id'        => 'wgt-input-wbfsys_management_reference_revision'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Revision', 'src' => 'Management Reference' ) ),
        )
      );
      $inputRevision->setWidth( 'medium' );

$inputRevision->setReadOnly( $this->fieldReadOnly( 'wbfsys_management_reference', 'revision' ) );
      $inputRevision->setRequired( $this->fieldRequired( 'wbfsys_management_reference', 'revision' ) );
      $inputRevision->setData( $this->entity->getData( 'revision' ) );
      $inputRevision->setLabel( $i18n->l( 'Revision', 'wbfsys.management_reference.label' ) );

      $inputRevision->refresh           = $this->refresh;
      $inputRevision->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysManagementReference_Revision */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysManagementReference_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysManagementReferenceRowid' , 'int' );
      $this->items['wbfsys_management_reference-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_management_reference[rowid]',
          'id'        => 'wgt-input-wbfsys_management_reference_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Management Reference' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_management_reference', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_management_reference', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.management_reference.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysManagementReference_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysManagementReference_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysManagementReferenceMTimeCreated' , 'Date' );
      $this->items['wbfsys_management_reference-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_management_reference[m_time_created]',
          'id'        => 'wgt-input-wbfsys_management_reference_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Management Reference' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_management_reference', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_management_reference', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.management_reference.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysManagementReference_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysManagementReference_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysManagementReferenceMRoleCreate', 'Window' );
      $this->items['wbfsys_management_reference-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_management_reference[m_role_create]',
        'id'        => 'wgt-input-wbfsys_management_reference_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Management Reference' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_management_reference', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_management_reference', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.management_reference.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_management_reference_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_management_reference_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysManagementReference_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysManagementReference_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysManagementReferenceMTimeChanged' , 'Date' );
      $this->items['wbfsys_management_reference-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_management_reference[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_management_reference_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Management Reference' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_management_reference', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_management_reference', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.management_reference.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysManagementReference_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysManagementReference_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysManagementReferenceMRoleChange', 'Window' );
      $this->items['wbfsys_management_reference-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_management_reference[m_role_change]',
        'id'        => 'wgt-input-wbfsys_management_reference_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Management Reference' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_management_reference', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_management_reference', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.management_reference.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_management_reference_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_management_reference_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysManagementReference_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysManagementReference_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysManagementReferenceMVersion' , 'int' );
      $this->items['wbfsys_management_reference-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_management_reference[m_version]',
          'id'        => 'wgt-input-wbfsys_management_reference_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Management Reference' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_management_reference', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_management_reference', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.management_reference.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysManagementReference_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysManagementReference_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysManagementReferenceMUuid' , 'Text' );
      $this->items['wbfsys_management_reference-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_management_reference[m_uuid]',
          'id'        => 'wgt-input-wbfsys_management_reference_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Management Reference' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_management_reference', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_management_reference', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.management_reference.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysManagementReference_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysManagementReference_Crud_Show_Form */


