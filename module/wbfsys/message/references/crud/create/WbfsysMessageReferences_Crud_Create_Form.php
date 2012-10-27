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
class WbfsysMessageReferences_Crud_Create_Form
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
  public $namespace  = 'WbfsysMessageReferences';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysMessageReferences';

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
      'wbfsys_message_references' => array
      (
        'id_message' => array
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
        'vid' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_reference' => array
        ( 
          'required'  => true, 
          'readonly'  => true, 
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
   * @var WbfsysMessageReferences_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysMessageReferences_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysMessageReferences_Entity $entity
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
      'wbfsys_message_references' => array
      (
        'id_message',
        'id_entity',
        'vid',
        'id_reference',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysMessageReferences entity
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
    $this->view->addVar( 'entityWbfsysMessageReferences', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_message_references'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_message_references[id_wbfsys_message_references-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysMessageReferences_IdMessage( $params );
    $this->input_WbfsysMessageReferences_IdEntity( $params );
    $this->input_WbfsysMessageReferences_Vid( $params );
    $this->input_WbfsysMessageReferences_IdReference( $params );
    $this->input_WbfsysMessageReferences_Rowid( $params );
    $this->input_WbfsysMessageReferences_MTimeCreated( $params );
    $this->input_WbfsysMessageReferences_MRoleCreate( $params );
    $this->input_WbfsysMessageReferences_MTimeChanged( $params );
    $this->input_WbfsysMessageReferences_MRoleChange( $params );
    $this->input_WbfsysMessageReferences_MVersion( $params );
    $this->input_WbfsysMessageReferences_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field id_message
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReferences_IdMessage( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysMessage_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysMessage not exists' );

      Log::warn( 'Looks like the Entity: WbfsysMessage is missing' );

      return;
    }


      //p: Window
      $objidWbfsysMessage = $this->entity->getData( 'id_message' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysMessage
          || !$entityWbfsysMessage = $this->db->orm->get
          (
            'WbfsysMessage',
            $objidWbfsysMessage
          )
      )
      {
        $entityWbfsysMessage = $this->db->orm->newEntity( 'WbfsysMessage' );
      }

      $inputIdMessage = $this->view->newInput( 'inputWbfsysMessageReferencesIdMessage', 'Window' );
      $this->items['wbfsys_message_references-id_message'] = $inputIdMessage;
      $inputIdMessage->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message_references[id_message]',
        'id'        => 'wgt-input-wbfsys_message_references_id_message'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Message', 'src' => 'Message References' ) ),
      ));

      if( $this->assignedForm )
        $inputIdMessage->assignedForm = $this->assignedForm;

      $inputIdMessage->setWidth( 'medium' );

      $inputIdMessage->setData( $this->entity->getData( 'id_message' )  );
      $inputIdMessage->setReadonly( $this->fieldReadOnly( 'wbfsys_message_references', 'id_message' ) );
      $inputIdMessage->setRequired( $this->fieldRequired( 'wbfsys_message_references', 'id_message' ) );
      $inputIdMessage->setLabel( $i18n->l( 'Message', 'wbfsys.message_references.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Message.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_references_id_message'.($this->suffix?'-'.$this->suffix:'');

      $inputIdMessage->setListUrl ( $listUrl );
      $inputIdMessage->setListIcon( 'control/connect.png' );
      $inputIdMessage->setEntityUrl( 'maintab.php?c=Wbfsys.Message.edit' );
      $inputIdMessage->conEntity         = $entityWbfsysMessage;
      $inputIdMessage->refresh           = $this->refresh;
      $inputIdMessage->serializeElement  = $this->sendElement;



      $inputIdMessage->view = $this->view;
      $inputIdMessage->buildJavascript( 'wgt-input-wbfsys_message_references_id_message'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdMessage );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMessageReferences_IdMessage */

 /**
  * create the ui element for field id_entity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReferences_IdEntity( $params )
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
      $objidWbfsysEntity = $this->entity->getData( 'id_entity' ) ;

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

      $inputIdEntity = $this->view->newInput( 'inputWbfsysMessageReferencesIdEntity', 'Window' );
      $this->items['wbfsys_message_references-id_entity'] = $inputIdEntity;
      $inputIdEntity->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message_references[id_entity]',
        'id'        => 'wgt-input-wbfsys_message_references_id_entity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Entity', 'src' => 'Message References' ) ),
      ));

      if( $this->assignedForm )
        $inputIdEntity->assignedForm = $this->assignedForm;

      $inputIdEntity->setWidth( 'medium' );

      $inputIdEntity->setData( $this->entity->getData( 'id_entity' )  );
      $inputIdEntity->setReadonly( $this->fieldReadOnly( 'wbfsys_message_references', 'id_entity' ) );
      $inputIdEntity->setRequired( $this->fieldRequired( 'wbfsys_message_references', 'id_entity' ) );
      $inputIdEntity->setLabel( $i18n->l( 'Entity', 'wbfsys.message_references.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Entity.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_references_id_entity'.($this->suffix?'-'.$this->suffix:'');

      $inputIdEntity->setListUrl ( $listUrl );
      $inputIdEntity->setListIcon( 'control/connect.png' );
      $inputIdEntity->setEntityUrl( 'maintab.php?c=Wbfsys.Entity.edit' );
      $inputIdEntity->conEntity         = $entityWbfsysEntity;
      $inputIdEntity->refresh           = $this->refresh;
      $inputIdEntity->serializeElement  = $this->sendElement;


        $inputIdEntity->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.Entity.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdEntity->view = $this->view;
      $inputIdEntity->buildJavascript( 'wgt-input-wbfsys_message_references_id_entity'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdEntity );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMessageReferences_IdEntity */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReferences_Vid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputVid = $this->view->newInput( 'inputWbfsysMessageReferencesVid', 'Int' );
      $this->items['wbfsys_message_references-vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_references[vid]',
          'id'        => 'wgt-input-wbfsys_message_references_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Vid', 'src' => 'Message References' ) ),
        )
      );
      $inputVid->setWidth( 'medium' );

$inputVid->setReadOnly( $this->fieldReadOnly( 'wbfsys_message_references', 'vid' ) );
      $inputVid->setRequired( $this->fieldRequired( 'wbfsys_message_references', 'vid' ) );
      $inputVid->setData( $this->entity->getData( 'vid' ) );
      $inputVid->setLabel( $i18n->l( 'Vid', 'wbfsys.message_references.label' ) );

      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMessageReferences_Vid */

 /**
  * create the ui element for field id_reference
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReferences_IdReference( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysMessage_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysMessage not exists' );

      Log::warn( 'Looks like the Entity: WbfsysMessage is missing' );

      return;
    }


      //p: Window
      $objidWbfsysMessage = $this->entity->getData( 'id_reference' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysMessage
          || !$entityWbfsysMessage = $this->db->orm->get
          (
            'WbfsysMessage',
            $objidWbfsysMessage
          )
      )
      {
        $entityWbfsysMessage = $this->db->orm->newEntity( 'WbfsysMessage' );
      }

      $inputIdReference = $this->view->newInput( 'inputWbfsysMessageReferencesIdReference', 'Window' );
      $this->items['wbfsys_message_references-id_reference'] = $inputIdReference;
      $inputIdReference->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message_references[id_reference]',
        'id'        => 'wgt-input-wbfsys_message_references_id_reference'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Reference', 'src' => 'Message References' ) ),
      ));

      if( $this->assignedForm )
        $inputIdReference->assignedForm = $this->assignedForm;

      $inputIdReference->setWidth( 'medium' );

      $inputIdReference->setData( $this->entity->getData( 'id_reference' )  );
      $inputIdReference->setReadonly( $this->fieldReadOnly( 'wbfsys_message_references', 'id_reference' ) );
      $inputIdReference->setRequired( $this->fieldRequired( 'wbfsys_message_references', 'id_reference' ) );
      $inputIdReference->setLabel( $i18n->l( 'Reference', 'wbfsys.message_references.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Message.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_references_id_reference'.($this->suffix?'-'.$this->suffix:'');

      $inputIdReference->setListUrl ( $listUrl );
      $inputIdReference->setListIcon( 'control/connect.png' );
      $inputIdReference->setEntityUrl( 'maintab.php?c=Wbfsys.Message.edit' );
      $inputIdReference->conEntity         = $entityWbfsysMessage;
      $inputIdReference->refresh           = $this->refresh;
      $inputIdReference->serializeElement  = $this->sendElement;



      $inputIdReference->view = $this->view;
      $inputIdReference->buildJavascript( 'wgt-input-wbfsys_message_references_id_reference'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdReference );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMessageReferences_IdReference */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReferences_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysMessageReferencesRowid' , 'int' );
      $this->items['wbfsys_message_references-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_references[rowid]',
          'id'        => 'wgt-input-wbfsys_message_references_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Message References' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_message_references', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_message_references', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.message_references.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMessageReferences_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReferences_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysMessageReferencesMTimeCreated' , 'Date' );
      $this->items['wbfsys_message_references-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_references[m_time_created]',
          'id'        => 'wgt-input-wbfsys_message_references_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Message References' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_message_references', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_message_references', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.message_references.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysMessageReferences_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReferences_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysMessageReferencesMRoleCreate', 'Window' );
      $this->items['wbfsys_message_references-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message_references[m_role_create]',
        'id'        => 'wgt-input-wbfsys_message_references_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Message References' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_message_references', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_message_references', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.message_references.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_references_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_message_references_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysMessageReferences_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReferences_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysMessageReferencesMTimeChanged' , 'Date' );
      $this->items['wbfsys_message_references-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_references[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_message_references_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Message References' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_message_references', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_message_references', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.message_references.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysMessageReferences_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReferences_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysMessageReferencesMRoleChange', 'Window' );
      $this->items['wbfsys_message_references-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message_references[m_role_change]',
        'id'        => 'wgt-input-wbfsys_message_references_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Message References' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_message_references', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_message_references', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.message_references.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_references_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_message_references_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysMessageReferences_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReferences_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysMessageReferencesMVersion' , 'int' );
      $this->items['wbfsys_message_references-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_references[m_version]',
          'id'        => 'wgt-input-wbfsys_message_references_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Message References' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_message_references', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_message_references', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.message_references.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMessageReferences_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReferences_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysMessageReferencesMUuid' , 'Text' );
      $this->items['wbfsys_message_references-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_references[m_uuid]',
          'id'        => 'wgt-input-wbfsys_message_references_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Message References' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_message_references', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_message_references', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.message_references.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMessageReferences_MUuid */

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
      $orm->getValidationData( 'WbfsysMessageReferences', array_keys( $this->fields['wbfsys_message_references']), true ),
      $orm->getErrorMessages( 'WbfsysMessageReferences' ),
      'wbfsys_message_references'
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


}//end class WbfsysMessageReferences_Crud_Create_Form */


