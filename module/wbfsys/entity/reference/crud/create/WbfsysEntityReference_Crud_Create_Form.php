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
class WbfsysEntityReference_Crud_Create_Form
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
  public $namespace  = 'WbfsysEntityReference';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysEntityReference';

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
      'wbfsys_entity_reference' => array
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
        'id_field_from' => array
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
        'id_field_to' => array
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
   * @var WbfsysEntityReference_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysEntityReference_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysEntityReference_Entity $entity
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
      'wbfsys_entity_reference' => array
      (
        'access_key',
        'id_from',
        'id_field_from',
        'id_to',
        'id_field_to',
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
  * create an IO form for the WbfsysEntityReference entity
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
    $this->view->addVar( 'entityWbfsysEntityReference', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_entity_reference'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_entity_reference[id_wbfsys_entity_reference-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysEntityReference_AccessKey( $params );
    $this->input_WbfsysEntityReference_IdFrom( $params );
    $this->input_WbfsysEntityReference_IdFieldFrom( $params );
    $this->input_WbfsysEntityReference_IdTo( $params );
    $this->input_WbfsysEntityReference_IdFieldTo( $params );
    $this->input_WbfsysEntityReference_Description( $params );
    $this->input_WbfsysEntityReference_Revision( $params );
    $this->input_WbfsysEntityReference_Rowid( $params );
    $this->input_WbfsysEntityReference_MTimeCreated( $params );
    $this->input_WbfsysEntityReference_MRoleCreate( $params );
    $this->input_WbfsysEntityReference_MTimeChanged( $params );
    $this->input_WbfsysEntityReference_MRoleChange( $params );
    $this->input_WbfsysEntityReference_MVersion( $params );
    $this->input_WbfsysEntityReference_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntityReference_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysEntityReferenceAccessKey' , 'Text' );
      $this->items['wbfsys_entity_reference-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity_reference[access_key]',
          'id'        => 'wgt-input-wbfsys_entity_reference_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Entity Reference' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_entity_reference', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_entity_reference', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.entity_reference.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysEntityReference_AccessKey */

 /**
  * create the ui element for field id_from
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntityReference_IdFrom( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysEntity_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysEntity not exists' );

      Log::warn( 'Looks like the Entity: WbfsysEntity is missing' );

      return;
    }


      //p: Window
      $objidWbfsysEntity = $this->entity->getData( 'id_from' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysEntity
          || !$entityWbfsysEntity = $this->db->orm->get
          (
            'WbfsysEntity',
            $objidWbfsysEntity
          )
      )
      {
        $entityWbfsysEntity = $this->db->orm->newEntity( 'WbfsysEntity' );
      }

      $inputIdFrom = $this->view->newInput( 'inputWbfsysEntityReferenceIdFrom', 'Window' );
      $this->items['wbfsys_entity_reference-id_from'] = $inputIdFrom;
      $inputIdFrom->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_entity_reference[id_from]',
        'id'        => 'wgt-input-wbfsys_entity_reference_id_from'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'From', 'src' => 'Entity Reference' ) ),
      ));

      if( $this->assignedForm )
        $inputIdFrom->assignedForm = $this->assignedForm;

      $inputIdFrom->setWidth( 'medium' );

      $inputIdFrom->setData( $this->entity->getData( 'id_from' )  );
      $inputIdFrom->setReadonly( $this->fieldReadOnly( 'wbfsys_entity_reference', 'id_from' ) );
      $inputIdFrom->setRequired( $this->fieldRequired( 'wbfsys_entity_reference', 'id_from' ) );
      $inputIdFrom->setLabel( $i18n->l( 'From', 'wbfsys.entity_reference.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Entity.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_entity_reference_id_from'.($this->suffix?'-'.$this->suffix:'');

      $inputIdFrom->setListUrl ( $listUrl );
      $inputIdFrom->setListIcon( 'control/connect.png' );
      $inputIdFrom->setEntityUrl( 'maintab.php?c=Wbfsys.Entity.edit' );
      $inputIdFrom->conEntity         = $entityWbfsysEntity;
      $inputIdFrom->refresh           = $this->refresh;
      $inputIdFrom->serializeElement  = $this->sendElement;


        $inputIdFrom->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.Entity.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdFrom->view = $this->view;
      $inputIdFrom->buildJavascript( 'wgt-input-wbfsys_entity_reference_id_from'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdFrom );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysEntityReference_IdFrom */

 /**
  * create the ui element for field id_field_from
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntityReference_IdFieldFrom( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysEntityAttribute_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysEntityAttribute not exists' );

      Log::warn( 'Looks like the Entity: WbfsysEntityAttribute is missing' );

      return;
    }


      //p: Window
      $objidWbfsysEntityAttribute = $this->entity->getData( 'id_field_from' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysEntityAttribute
          || !$entityWbfsysEntityAttribute = $this->db->orm->get
          (
            'WbfsysEntityAttribute',
            $objidWbfsysEntityAttribute
          )
      )
      {
        $entityWbfsysEntityAttribute = $this->db->orm->newEntity( 'WbfsysEntityAttribute' );
      }

      $inputIdFieldFrom = $this->view->newInput( 'inputWbfsysEntityReferenceIdFieldFrom', 'Window' );
      $this->items['wbfsys_entity_reference-id_field_from'] = $inputIdFieldFrom;
      $inputIdFieldFrom->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_entity_reference[id_field_from]',
        'id'        => 'wgt-input-wbfsys_entity_reference_id_field_from'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Field From', 'src' => 'Entity Reference' ) ),
      ));

      if( $this->assignedForm )
        $inputIdFieldFrom->assignedForm = $this->assignedForm;

      $inputIdFieldFrom->setWidth( 'medium' );

      $inputIdFieldFrom->setData( $this->entity->getData( 'id_field_from' )  );
      $inputIdFieldFrom->setReadonly( $this->fieldReadOnly( 'wbfsys_entity_reference', 'id_field_from' ) );
      $inputIdFieldFrom->setRequired( $this->fieldRequired( 'wbfsys_entity_reference', 'id_field_from' ) );
      $inputIdFieldFrom->setLabel( $i18n->l( 'Field From', 'wbfsys.entity_reference.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.EntityAttribute.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_entity_reference_id_field_from'.($this->suffix?'-'.$this->suffix:'');

      $inputIdFieldFrom->setListUrl ( $listUrl );
      $inputIdFieldFrom->setListIcon( 'control/connect.png' );
      $inputIdFieldFrom->setEntityUrl( 'maintab.php?c=Wbfsys.EntityAttribute.edit' );
      $inputIdFieldFrom->conEntity         = $entityWbfsysEntityAttribute;
      $inputIdFieldFrom->refresh           = $this->refresh;
      $inputIdFieldFrom->serializeElement  = $this->sendElement;


        $inputIdFieldFrom->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.EntityAttribute.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdFieldFrom->view = $this->view;
      $inputIdFieldFrom->buildJavascript( 'wgt-input-wbfsys_entity_reference_id_field_from'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdFieldFrom );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysEntityReference_IdFieldFrom */

 /**
  * create the ui element for field id_to
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntityReference_IdTo( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysEntity_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysEntity not exists' );

      Log::warn( 'Looks like the Entity: WbfsysEntity is missing' );

      return;
    }


      //p: Window
      $objidWbfsysEntity = $this->entity->getData( 'id_to' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysEntity
          || !$entityWbfsysEntity = $this->db->orm->get
          (
            'WbfsysEntity',
            $objidWbfsysEntity
          )
      )
      {
        $entityWbfsysEntity = $this->db->orm->newEntity( 'WbfsysEntity' );
      }

      $inputIdTo = $this->view->newInput( 'inputWbfsysEntityReferenceIdTo', 'Window' );
      $this->items['wbfsys_entity_reference-id_to'] = $inputIdTo;
      $inputIdTo->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_entity_reference[id_to]',
        'id'        => 'wgt-input-wbfsys_entity_reference_id_to'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'To', 'src' => 'Entity Reference' ) ),
      ));

      if( $this->assignedForm )
        $inputIdTo->assignedForm = $this->assignedForm;

      $inputIdTo->setWidth( 'medium' );

      $inputIdTo->setData( $this->entity->getData( 'id_to' )  );
      $inputIdTo->setReadonly( $this->fieldReadOnly( 'wbfsys_entity_reference', 'id_to' ) );
      $inputIdTo->setRequired( $this->fieldRequired( 'wbfsys_entity_reference', 'id_to' ) );
      $inputIdTo->setLabel( $i18n->l( 'To', 'wbfsys.entity_reference.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Entity.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_entity_reference_id_to'.($this->suffix?'-'.$this->suffix:'');

      $inputIdTo->setListUrl ( $listUrl );
      $inputIdTo->setListIcon( 'control/connect.png' );
      $inputIdTo->setEntityUrl( 'maintab.php?c=Wbfsys.Entity.edit' );
      $inputIdTo->conEntity         = $entityWbfsysEntity;
      $inputIdTo->refresh           = $this->refresh;
      $inputIdTo->serializeElement  = $this->sendElement;


        $inputIdTo->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.Entity.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdTo->view = $this->view;
      $inputIdTo->buildJavascript( 'wgt-input-wbfsys_entity_reference_id_to'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdTo );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysEntityReference_IdTo */

 /**
  * create the ui element for field id_field_to
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntityReference_IdFieldTo( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysEntityAttribute_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysEntityAttribute not exists' );

      Log::warn( 'Looks like the Entity: WbfsysEntityAttribute is missing' );

      return;
    }


      //p: Window
      $objidWbfsysEntityAttribute = $this->entity->getData( 'id_field_to' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysEntityAttribute
          || !$entityWbfsysEntityAttribute = $this->db->orm->get
          (
            'WbfsysEntityAttribute',
            $objidWbfsysEntityAttribute
          )
      )
      {
        $entityWbfsysEntityAttribute = $this->db->orm->newEntity( 'WbfsysEntityAttribute' );
      }

      $inputIdFieldTo = $this->view->newInput( 'inputWbfsysEntityReferenceIdFieldTo', 'Window' );
      $this->items['wbfsys_entity_reference-id_field_to'] = $inputIdFieldTo;
      $inputIdFieldTo->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_entity_reference[id_field_to]',
        'id'        => 'wgt-input-wbfsys_entity_reference_id_field_to'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Field To', 'src' => 'Entity Reference' ) ),
      ));

      if( $this->assignedForm )
        $inputIdFieldTo->assignedForm = $this->assignedForm;

      $inputIdFieldTo->setWidth( 'medium' );

      $inputIdFieldTo->setData( $this->entity->getData( 'id_field_to' )  );
      $inputIdFieldTo->setReadonly( $this->fieldReadOnly( 'wbfsys_entity_reference', 'id_field_to' ) );
      $inputIdFieldTo->setRequired( $this->fieldRequired( 'wbfsys_entity_reference', 'id_field_to' ) );
      $inputIdFieldTo->setLabel( $i18n->l( 'Field To', 'wbfsys.entity_reference.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.EntityAttribute.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_entity_reference_id_field_to'.($this->suffix?'-'.$this->suffix:'');

      $inputIdFieldTo->setListUrl ( $listUrl );
      $inputIdFieldTo->setListIcon( 'control/connect.png' );
      $inputIdFieldTo->setEntityUrl( 'maintab.php?c=Wbfsys.EntityAttribute.edit' );
      $inputIdFieldTo->conEntity         = $entityWbfsysEntityAttribute;
      $inputIdFieldTo->refresh           = $this->refresh;
      $inputIdFieldTo->serializeElement  = $this->sendElement;


        $inputIdFieldTo->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.EntityAttribute.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdFieldTo->view = $this->view;
      $inputIdFieldTo->buildJavascript( 'wgt-input-wbfsys_entity_reference_id_field_to'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdFieldTo );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysEntityReference_IdFieldTo */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntityReference_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysEntityReferenceDescription', 'Textarea' );
      $this->items['wbfsys_entity_reference-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_entity_reference[description]',
          'id'    => 'wgt-input-wbfsys_entity_reference_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Entity Reference' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_entity_reference', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_entity_reference', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.entity_reference.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysEntityReference_Description */

 /**
  * create the ui element for field revision
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntityReference_Revision( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputRevision = $this->view->newInput( 'inputWbfsysEntityReferenceRevision', 'Int' );
      $this->items['wbfsys_entity_reference-revision'] = $inputRevision;
      $inputRevision->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity_reference[revision]',
          'id'        => 'wgt-input-wbfsys_entity_reference_revision'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Revision', 'src' => 'Entity Reference' ) ),
        )
      );
      $inputRevision->setWidth( 'medium' );

$inputRevision->setReadOnly( $this->fieldReadOnly( 'wbfsys_entity_reference', 'revision' ) );
      $inputRevision->setRequired( $this->fieldRequired( 'wbfsys_entity_reference', 'revision' ) );
      $inputRevision->setData( $this->entity->getData( 'revision' ) );
      $inputRevision->setLabel( $i18n->l( 'Revision', 'wbfsys.entity_reference.label' ) );

      $inputRevision->refresh           = $this->refresh;
      $inputRevision->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysEntityReference_Revision */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntityReference_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysEntityReferenceRowid' , 'int' );
      $this->items['wbfsys_entity_reference-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity_reference[rowid]',
          'id'        => 'wgt-input-wbfsys_entity_reference_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Entity Reference' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_entity_reference', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_entity_reference', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.entity_reference.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysEntityReference_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntityReference_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysEntityReferenceMTimeCreated' , 'Date' );
      $this->items['wbfsys_entity_reference-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity_reference[m_time_created]',
          'id'        => 'wgt-input-wbfsys_entity_reference_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Entity Reference' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_entity_reference', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_entity_reference', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.entity_reference.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysEntityReference_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntityReference_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysEntityReferenceMRoleCreate', 'Window' );
      $this->items['wbfsys_entity_reference-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_entity_reference[m_role_create]',
        'id'        => 'wgt-input-wbfsys_entity_reference_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Entity Reference' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_entity_reference', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_entity_reference', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.entity_reference.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_entity_reference_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_entity_reference_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysEntityReference_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntityReference_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysEntityReferenceMTimeChanged' , 'Date' );
      $this->items['wbfsys_entity_reference-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity_reference[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_entity_reference_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Entity Reference' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_entity_reference', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_entity_reference', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.entity_reference.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysEntityReference_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntityReference_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysEntityReferenceMRoleChange', 'Window' );
      $this->items['wbfsys_entity_reference-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_entity_reference[m_role_change]',
        'id'        => 'wgt-input-wbfsys_entity_reference_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Entity Reference' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_entity_reference', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_entity_reference', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.entity_reference.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_entity_reference_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_entity_reference_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysEntityReference_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntityReference_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysEntityReferenceMVersion' , 'int' );
      $this->items['wbfsys_entity_reference-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity_reference[m_version]',
          'id'        => 'wgt-input-wbfsys_entity_reference_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Entity Reference' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_entity_reference', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_entity_reference', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.entity_reference.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysEntityReference_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysEntityReference_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysEntityReferenceMUuid' , 'Text' );
      $this->items['wbfsys_entity_reference-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_entity_reference[m_uuid]',
          'id'        => 'wgt-input-wbfsys_entity_reference_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Entity Reference' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_entity_reference', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_entity_reference', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.entity_reference.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysEntityReference_MUuid */

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
      $orm->getValidationData( 'WbfsysEntityReference', array_keys( $this->fields['wbfsys_entity_reference']), true ),
      $orm->getErrorMessages( 'WbfsysEntityReference' ),
      'wbfsys_entity_reference'
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


}//end class WbfsysEntityReference_Crud_Create_Form */


