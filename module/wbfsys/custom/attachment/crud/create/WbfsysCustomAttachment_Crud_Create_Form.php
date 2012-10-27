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
class WbfsysCustomAttachment_Crud_Create_Form
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
  public $namespace  = 'WbfsysCustomAttachment';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysCustomAttachment';

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
      'wbfsys_custom_attachment' => array
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
        'id_file' => array
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
      'entity_file' => array
      (
        'access_key' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'name' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'link' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'activ' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_type' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_confidentiality' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'flag_local' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_licence' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'flag_versioning' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_mediathek' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_storage' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'max_version' => array
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
        'file_size' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'file_hash' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '32',
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
   * @var WbfsysCustomAttachment_Entity 
   */
  public $entity      = null;
  
  /**
  * The EntityFile Reference Entity
  *
  * @var EntityFile_Entity
  */
  public $entityEntityFile;


  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysCustomAttachment_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysCustomAttachment_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->entity = $entity;
    $this->rowid  = $entity->getId();
    
  }//end public function setEntity */


  /**
  * returns the activ entity with data, or creates a empty one
  * and returns it instead
  *
  * @return EntityFile_Entity
  */
  public function getEntityEntityFile(  )
  {

    return $this->entityEntityFile;

  }//end public function getEntityEntityFile */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param EntityFile_Entity $entity
  */
  public function setEntityEntityFile( $entity )
  {

    $this->entityEntityFile = $entity ;

  }//end public function setEntityEntityFile */

  /**
   * request all fields that have to be fetched from the request
   * @return array
   */
  public function getSaveFields()
  {

    return array
    (
      'wbfsys_custom_attachment' => array
      (
        'vid',
        'id_entity',
        'id_user',
        'id_file',
        'm_version',
      ),
      'entity_file' => array
      (
        'access_key',
        'name',
        'link',
        'activ',
        'id_type',
        'id_confidentiality',
        'flag_local',
        'id_licence',
        'flag_versioning',
        'id_mediathek',
        'id_storage',
        'max_version',
        'id_visibility',
        'description',
        'mimetype',
        'file_size',
        'file_hash',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysCustomAttachment entity
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
    $this->view->addVar( 'entityWbfsysCustomAttachment', $this->entity );
  $this->view->addVar( 'entityEntityFile',  $this->entityEntityFile ) ;


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_custom_attachment'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_custom_attachment[id_wbfsys_custom_attachment-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysCustomAttachment_Vid( $params );
    $this->input_WbfsysCustomAttachment_IdEntity( $params );
    $this->input_WbfsysCustomAttachment_IdUser( $params );
    $this->input_WbfsysCustomAttachment_IdFile( $params );
    $this->input_WbfsysCustomAttachment_Rowid( $params );
    $this->input_WbfsysCustomAttachment_MTimeCreated( $params );
    $this->input_WbfsysCustomAttachment_MRoleCreate( $params );
    $this->input_WbfsysCustomAttachment_MTimeChanged( $params );
    $this->input_WbfsysCustomAttachment_MRoleChange( $params );
    $this->input_WbfsysCustomAttachment_MVersion( $params );
    $this->input_WbfsysCustomAttachment_MUuid( $params );
    $this->input_EntityFile_AccessKey( $params );
    $this->input_EntityFile_Name( $params );
    $this->input_EntityFile_Link( $params );
    $this->input_EntityFile_Activ( $params );
    $this->input_EntityFile_IdType( $params );
    $this->input_EntityFile_IdConfidentiality( $params );
    $this->input_EntityFile_FlagLocal( $params );
    $this->input_EntityFile_IdLicence( $params );
    $this->input_EntityFile_FlagVersioning( $params );
    $this->input_EntityFile_IdMediathek( $params );
    $this->input_EntityFile_IdStorage( $params );
    $this->input_EntityFile_MaxVersion( $params );
    $this->input_EntityFile_IdVisibility( $params );
    $this->input_EntityFile_Description( $params );
    $this->input_EntityFile_Mimetype( $params );
    $this->input_EntityFile_FileSize( $params );
    $this->input_EntityFile_FileHash( $params );
    $this->input_EntityFile_Rowid( $params );
    $this->input_EntityFile_MTimeCreated( $params );
    $this->input_EntityFile_MRoleCreate( $params );
    $this->input_EntityFile_MTimeChanged( $params );
    $this->input_EntityFile_MRoleChange( $params );
    $this->input_EntityFile_MVersion( $params );
    $this->input_EntityFile_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomAttachment_Vid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputVid = $this->view->newInput( 'inputWbfsysCustomAttachmentVid', 'Hidden' );
      $this->items['wbfsys_custom_attachment-vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_attachment[vid]',
          'id'        => 'wgt-input-wbfsys_custom_attachment_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Vid', 'src' => 'Custom Attachment' ) ),
          'maxlength' => $this->entity->maxSize( 'vid' ),
        )
      );
      $inputVid->setWidth( 'medium' );

      $inputVid->setData( $this->entity->getInt( 'vid' ) );
      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysCustomAttachment_Vid */

 /**
  * create the ui element for field id_entity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomAttachment_IdEntity( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdEntity = $this->view->newInput( 'inputWbfsysCustomAttachmentIdEntity', 'Hidden' );
      $this->items['wbfsys_custom_attachment-id_entity'] = $inputIdEntity;
      $inputIdEntity->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_attachment[id_entity]',
          'id'        => 'wgt-input-wbfsys_custom_attachment_id_entity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Entity', 'src' => 'Custom Attachment' ) ),
          'maxlength' => $this->entity->maxSize( 'id_entity' ),
        )
      );
      $inputIdEntity->setWidth( 'medium' );

      $inputIdEntity->setData( $this->entity->getSecure( 'id_entity' ) );
      $inputIdEntity->refresh           = $this->refresh;
      $inputIdEntity->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysCustomAttachment_IdEntity */

 /**
  * create the ui element for field id_user
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomAttachment_IdUser( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdUser = $this->view->newInput( 'inputWbfsysCustomAttachmentIdUser', 'Hidden' );
      $this->items['wbfsys_custom_attachment-id_user'] = $inputIdUser;
      $inputIdUser->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_attachment[id_user]',
          'id'        => 'wgt-input-wbfsys_custom_attachment_id_user'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'User', 'src' => 'Custom Attachment' ) ),
          'maxlength' => $this->entity->maxSize( 'id_user' ),
        )
      );
      $inputIdUser->setWidth( 'medium' );

      $inputIdUser->setData( $this->entity->getSecure( 'id_user' ) );
      $inputIdUser->refresh           = $this->refresh;
      $inputIdUser->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysCustomAttachment_IdUser */

 /**
  * create the ui element for field id_file
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomAttachment_IdFile( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdFile = $this->view->newInput( 'inputWbfsysCustomAttachmentIdFile', 'Hidden' );
      $this->items['wbfsys_custom_attachment-id_file'] = $inputIdFile;
      $inputIdFile->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_attachment[id_file]',
          'id'        => 'wgt-input-wbfsys_custom_attachment_id_file'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'File', 'src' => 'Custom Attachment' ) ),
          'maxlength' => $this->entity->maxSize( 'id_file' ),
        )
      );
      $inputIdFile->setWidth( 'medium' );

      $inputIdFile->setData( $this->entity->getSecure( 'id_file' ) );
      $inputIdFile->refresh           = $this->refresh;
      $inputIdFile->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysCustomAttachment_IdFile */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomAttachment_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysCustomAttachmentRowid' , 'int' );
      $this->items['wbfsys_custom_attachment-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_attachment[rowid]',
          'id'        => 'wgt-input-wbfsys_custom_attachment_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Custom Attachment' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_attachment', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_custom_attachment', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.custom_attachment.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysCustomAttachment_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomAttachment_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysCustomAttachmentMTimeCreated' , 'Date' );
      $this->items['wbfsys_custom_attachment-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_attachment[m_time_created]',
          'id'        => 'wgt-input-wbfsys_custom_attachment_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Custom Attachment' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_attachment', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_custom_attachment', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.custom_attachment.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysCustomAttachment_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomAttachment_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysCustomAttachmentMRoleCreate', 'Window' );
      $this->items['wbfsys_custom_attachment-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_custom_attachment[m_role_create]',
        'id'        => 'wgt-input-wbfsys_custom_attachment_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Custom Attachment' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_attachment', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_custom_attachment', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.custom_attachment.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_custom_attachment_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_custom_attachment_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysCustomAttachment_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomAttachment_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysCustomAttachmentMTimeChanged' , 'Date' );
      $this->items['wbfsys_custom_attachment-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_attachment[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_custom_attachment_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Custom Attachment' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_attachment', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_custom_attachment', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.custom_attachment.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysCustomAttachment_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomAttachment_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysCustomAttachmentMRoleChange', 'Window' );
      $this->items['wbfsys_custom_attachment-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_custom_attachment[m_role_change]',
        'id'        => 'wgt-input-wbfsys_custom_attachment_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Custom Attachment' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_attachment', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_custom_attachment', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.custom_attachment.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_custom_attachment_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_custom_attachment_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysCustomAttachment_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomAttachment_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysCustomAttachmentMVersion' , 'int' );
      $this->items['wbfsys_custom_attachment-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_attachment[m_version]',
          'id'        => 'wgt-input-wbfsys_custom_attachment_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Custom Attachment' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_attachment', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_custom_attachment', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.custom_attachment.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysCustomAttachment_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomAttachment_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysCustomAttachmentMUuid' , 'Text' );
      $this->items['wbfsys_custom_attachment-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_attachment[m_uuid]',
          'id'        => 'wgt-input-wbfsys_custom_attachment_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Custom Attachment' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_attachment', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_custom_attachment', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.custom_attachment.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysCustomAttachment_MUuid */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputEntityFileAccessKey' , 'Text' );
      $this->items['entity_file-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'entity_file[access_key]',
          'id'        => 'wgt-input-entity_file_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'File' ) ),
          'maxlength' => $this->entityEntityFile->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'entity_file', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'entity_file', 'access_key' ) );
      $inputAccessKey->setData( $this->entityEntityFile->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.file.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_EntityFile_AccessKey */

 /**
  * create the ui element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_Name( $params )
  {
    $i18n     = $this->view->i18n;

      //p: input file
      $inputName = $this->view->newInput( 'inputEntityFileName' , 'File' );
      $inputName->addAttributes
      (
        array
        (
          'name'      => 'entity_file[name]',
          'id'        => 'wgt-input-entity_file_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium',
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Name', 'src' => 'File' ) ),
        )
      );
      $inputName->setWidth( 'medium' );
      $inputName->setData( $this->entityEntityFile->getSecure( 'name' ) );
      $inputName->setReadonly( $this->fieldReadOnly( 'entity_file', 'name' ) );
      $inputName->setRequired( $this->fieldRequired( 'entity_file', 'name' ) );

      if( $this->assignedForm )
        $inputName->assignedForm = $this->assignedForm;

      if
      (
        ( $objid = $this->entityEntityFile->getId() )
          && $this->entityEntityFile->name
      )
      {
        $inputName->setLink
        (
          'file.php?f=wbfsys_file-name-'.$objid.'&amp;n='
            .base64_encode( $this->entityEntityFile->name )
        );
      }

      $inputName->setLabel( $i18n->l( 'Name', 'wbfsys.file.label' ) );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_EntityFile_Name */

 /**
  * create the ui element for field link
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_Link( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputLink = $this->view->newInput( 'inputEntityFileLink' , 'text' );
      $this->items['entity_file-link'] = $inputLink;
      $inputLink->addAttributes
      (
        array
        (
          'name'      => 'entity_file[link]',
          'id'        => 'wgt-input-entity_file_link'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Link', 'src' => 'File' ) ),
        )
      );
      $inputLink->setWidth( 'medium' );

      $inputLink->setReadonly( $this->fieldReadOnly( 'entity_file', 'link' ) );
      $inputLink->setRequired( $this->fieldRequired( 'entity_file', 'link' ) );
      $inputLink->setData( $this->entityEntityFile->getSecure( 'link' ) );
      $inputLink->setLabel( $i18n->l( 'Link', 'wbfsys.file.label' ) );

      $inputLink->refresh           = $this->refresh;
      $inputLink->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_EntityFile_Link */

 /**
  * create the ui element for field activ
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_Activ( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputActiv = $this->view->newInput( 'inputEntityFileActiv', 'Checkbox' );
      $this->items['entity_file-activ'] = $inputActiv;
      $inputActiv->addAttributes
      (
        array
        (
          'name'      => 'entity_file[activ]',
          'id'        => 'wgt-input-entity_file_activ'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Activ', 'src' => 'File' ) ),
        )
      );
      $inputActiv->setWidth( 'medium' );

      $inputActiv->setReadonly( $this->fieldReadOnly( 'entity_file', 'activ' ) );
      $inputActiv->setRequired( $this->fieldRequired( 'entity_file', 'activ' ) );
      $inputActiv->setActive( $this->entityEntityFile->getBoolean( 'activ' ) );
      $inputActiv->setLabel( $i18n->l( 'Activ', 'wbfsys.file.label' ) );

      $inputActiv->refresh           = $this->refresh;
      $inputActiv->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_EntityFile_Activ */

 /**
  * create the ui element for field id_type
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_IdType( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['entity_file_id_type'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysFileType_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysFileType_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysFileType_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdType = $this->view->newItem( 'inputEntityFileIdType', 'WbfsysFileType_Selectbox' );
      $this->items['entity_file-id_type'] = $inputIdType;
      $inputIdType->addAttributes
      (
        array
        (
          'name'      => 'entity_file[id_type]',
          'id'        => 'wgt-input-entity_file_id_type'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Type', 'src' => 'File' ) ),
        )
      );
      $inputIdType->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdType->assignedForm = $this->assignedForm;

      $inputIdType->setActive( $this->entityEntityFile->getData( 'id_type' ) );
      $inputIdType->setReadonly( $this->fieldReadOnly( 'entity_file', 'id_type' ) );
      $inputIdType->setRequired( $this->fieldRequired( 'entity_file', 'id_type' ) );


      $inputIdType->setLabel( $i18n->l( 'Type', 'wbfsys.file.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_file_type:insert' ) )
      {
        $inputIdType->refresh           = $this->refresh;
        $inputIdType->serializeElement  = $this->sendElement;
        $inputIdType->editUrl = 'index.php?c=Wbfsys.FileType.listing&amp;target='.$this->namespace.'&amp;field=id_type&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-entity_file_id_type'.$this->suffix;
      }
      // set an empty first entry
      $inputIdType->setFirstFree( 'No Type selected' );

      
      $queryIdType = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['entity_file_id_type'] ) )
      {
      
        $queryIdType = $this->db->newQuery( 'WbfsysFileType_Selectbox' );

        $queryIdType->fetchSelectbox();
        $inputIdType->setData( $queryIdType->getAll() );
      
      }
      else
      {
        $inputIdType->setData( $this->listElementData['entity_file_id_type'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdType )
        $queryIdType = $this->db->newQuery( 'WbfsysFileType_Selectbox' );
      
      $inputIdType->loadActive = function( $activeId ) use ( $queryIdType ){
 
        return $queryIdType->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_EntityFile_IdType */

 /**
  * create the ui element for field id_confidentiality
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_IdConfidentiality( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['entity_file_id_confidentiality'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysConfidentialityLevel_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysConfidentialityLevel_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysConfidentialityLevel_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdConfidentiality = $this->view->newItem( 'inputEntityFileIdConfidentiality', 'WbfsysConfidentialityLevel_Selectbox' );
      $this->items['entity_file-id_confidentiality'] = $inputIdConfidentiality;
      $inputIdConfidentiality->addAttributes
      (
        array
        (
          'name'      => 'entity_file[id_confidentiality]',
          'id'        => 'wgt-input-entity_file_id_confidentiality'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Confidentiality', 'src' => 'File' ) ),
        )
      );
      $inputIdConfidentiality->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdConfidentiality->assignedForm = $this->assignedForm;

      $inputIdConfidentiality->setActive( $this->entityEntityFile->getData( 'id_confidentiality' ) );
      $inputIdConfidentiality->setReadonly( $this->fieldReadOnly( 'entity_file', 'id_confidentiality' ) );
      $inputIdConfidentiality->setRequired( $this->fieldRequired( 'entity_file', 'id_confidentiality' ) );


      $inputIdConfidentiality->setLabel( $i18n->l( 'Confidentiality', 'wbfsys.file.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdConfidentiality->refresh           = $this->refresh;
        $inputIdConfidentiality->serializeElement  = $this->sendElement;
        $inputIdConfidentiality->editUrl = 'index.php?c=Wbfsys.ConfidentialityLevel.listing&amp;target='.$this->namespace.'&amp;field=id_confidentiality&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-entity_file_id_confidentiality'.$this->suffix;
      }
      // set an empty first entry
      $inputIdConfidentiality->setFirstFree( 'No Confidentiality selected' );

      
      $queryIdConfidentiality = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['entity_file_id_confidentiality'] ) )
      {
      
        $queryIdConfidentiality = $this->db->newQuery( 'WbfsysConfidentialityLevel_Selectbox' );

        $queryIdConfidentiality->fetchSelectbox();
        $inputIdConfidentiality->setData( $queryIdConfidentiality->getAll() );
      
      }
      else
      {
        $inputIdConfidentiality->setData( $this->listElementData['entity_file_id_confidentiality'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdConfidentiality )
        $queryIdConfidentiality = $this->db->newQuery( 'WbfsysConfidentialityLevel_Selectbox' );
      
      $inputIdConfidentiality->loadActive = function( $activeId ) use ( $queryIdConfidentiality ){
 
        return $queryIdConfidentiality->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_EntityFile_IdConfidentiality */

 /**
  * create the ui element for field flag_local
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_FlagLocal( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputFlagLocal = $this->view->newInput( 'inputEntityFileFlagLocal', 'Checkbox' );
      $this->items['entity_file-flag_local'] = $inputFlagLocal;
      $inputFlagLocal->addAttributes
      (
        array
        (
          'name'      => 'entity_file[flag_local]',
          'id'        => 'wgt-input-entity_file_flag_local'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Local', 'src' => 'File' ) ),
        )
      );
      $inputFlagLocal->setWidth( 'medium' );

      $inputFlagLocal->setReadonly( $this->fieldReadOnly( 'entity_file', 'flag_local' ) );
      $inputFlagLocal->setRequired( $this->fieldRequired( 'entity_file', 'flag_local' ) );
      $inputFlagLocal->setActive( $this->entityEntityFile->getBoolean( 'flag_local' ) );
      $inputFlagLocal->setLabel( $i18n->l( 'Local', 'wbfsys.file.label' ) );

      $inputFlagLocal->refresh           = $this->refresh;
      $inputFlagLocal->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_EntityFile_FlagLocal */

 /**
  * create the ui element for field id_licence
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_IdLicence( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysContentLicence_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysContentLicence not exists' );

      Log::warn( 'Looks like the Entity: WbfsysContentLicence is missing' );

      return;
    }


      //p: Window
      $objidWbfsysContentLicence = $this->entityEntityFile->getData( 'id_licence' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysContentLicence
          || !$entityWbfsysContentLicence = $this->db->orm->get
          (
            'WbfsysContentLicence',
            $objidWbfsysContentLicence
          )
      )
      {
        $entityWbfsysContentLicence = $this->db->orm->newEntity( 'WbfsysContentLicence' );
      }

      $inputIdLicence = $this->view->newInput( 'inputEntityFileIdLicence', 'Window' );
      $this->items['entity_file-id_licence'] = $inputIdLicence;
      $inputIdLicence->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'entity_file[id_licence]',
        'id'        => 'wgt-input-entity_file_id_licence'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Licence', 'src' => 'File' ) ),
      ));

      if( $this->assignedForm )
        $inputIdLicence->assignedForm = $this->assignedForm;

      $inputIdLicence->setWidth( 'medium' );

      $inputIdLicence->setData( $this->entityEntityFile->getData( 'id_licence' )  );
      $inputIdLicence->setReadonly( $this->fieldReadOnly( 'entity_file', 'id_licence' ) );
      $inputIdLicence->setRequired( $this->fieldRequired( 'entity_file', 'id_licence' ) );
      $inputIdLicence->setLabel( $i18n->l( 'Licence', 'wbfsys.file.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ContentLicence.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=entity_file_id_licence'.($this->suffix?'-'.$this->suffix:'');

      $inputIdLicence->setListUrl ( $listUrl );
      $inputIdLicence->setListIcon( 'control/connect.png' );
      $inputIdLicence->setEntityUrl( 'maintab.php?c=Wbfsys.ContentLicence.edit' );
      $inputIdLicence->conEntity         = $entityWbfsysContentLicence;
      $inputIdLicence->refresh           = $this->refresh;
      $inputIdLicence->serializeElement  = $this->sendElement;



      $inputIdLicence->view = $this->view;
      $inputIdLicence->buildJavascript( 'wgt-input-entity_file_id_licence'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdLicence );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_EntityFile_IdLicence */

 /**
  * create the ui element for field flag_versioning
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_FlagVersioning( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputFlagVersioning = $this->view->newInput( 'inputEntityFileFlagVersioning', 'Checkbox' );
      $this->items['entity_file-flag_versioning'] = $inputFlagVersioning;
      $inputFlagVersioning->addAttributes
      (
        array
        (
          'name'      => 'entity_file[flag_versioning]',
          'id'        => 'wgt-input-entity_file_flag_versioning'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Versioning', 'src' => 'File' ) ),
        )
      );
      $inputFlagVersioning->setWidth( 'medium' );

      $inputFlagVersioning->setReadonly( $this->fieldReadOnly( 'entity_file', 'flag_versioning' ) );
      $inputFlagVersioning->setRequired( $this->fieldRequired( 'entity_file', 'flag_versioning' ) );
      $inputFlagVersioning->setActive( $this->entityEntityFile->getBoolean( 'flag_versioning' ) );
      $inputFlagVersioning->setLabel( $i18n->l( 'Versioning', 'wbfsys.file.label' ) );

      $inputFlagVersioning->refresh           = $this->refresh;
      $inputFlagVersioning->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_EntityFile_FlagVersioning */

 /**
  * create the ui element for field id_mediathek
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_IdMediathek( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysMediathek_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysMediathek not exists' );

      Log::warn( 'Looks like the Entity: WbfsysMediathek is missing' );

      return;
    }


      //p: Window
      $objidWbfsysMediathek = $this->entityEntityFile->getData( 'id_mediathek' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysMediathek
          || !$entityWbfsysMediathek = $this->db->orm->get
          (
            'WbfsysMediathek',
            $objidWbfsysMediathek
          )
      )
      {
        $entityWbfsysMediathek = $this->db->orm->newEntity( 'WbfsysMediathek' );
      }

      $inputIdMediathek = $this->view->newInput( 'inputEntityFileIdMediathek', 'Window' );
      $this->items['entity_file-id_mediathek'] = $inputIdMediathek;
      $inputIdMediathek->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'entity_file[id_mediathek]',
        'id'        => 'wgt-input-entity_file_id_mediathek'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Mediathek', 'src' => 'File' ) ),
      ));

      if( $this->assignedForm )
        $inputIdMediathek->assignedForm = $this->assignedForm;

      $inputIdMediathek->setWidth( 'medium' );

      $inputIdMediathek->setData( $this->entityEntityFile->getData( 'id_mediathek' )  );
      $inputIdMediathek->setReadonly( $this->fieldReadOnly( 'entity_file', 'id_mediathek' ) );
      $inputIdMediathek->setRequired( $this->fieldRequired( 'entity_file', 'id_mediathek' ) );
      $inputIdMediathek->setLabel( $i18n->l( 'Mediathek', 'wbfsys.file.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Mediathek.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=entity_file_id_mediathek'.($this->suffix?'-'.$this->suffix:'');

      $inputIdMediathek->setListUrl ( $listUrl );
      $inputIdMediathek->setListIcon( 'control/connect.png' );
      $inputIdMediathek->setEntityUrl( 'maintab.php?c=Wbfsys.Mediathek.edit' );
      $inputIdMediathek->conEntity         = $entityWbfsysMediathek;
      $inputIdMediathek->refresh           = $this->refresh;
      $inputIdMediathek->serializeElement  = $this->sendElement;



      $inputIdMediathek->view = $this->view;
      $inputIdMediathek->buildJavascript( 'wgt-input-entity_file_id_mediathek'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdMediathek );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_EntityFile_IdMediathek */

 /**
  * create the ui element for field id_storage
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_IdStorage( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['entity_file_id_storage'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysFileStorage_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysFileStorage_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysFileStorage_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdStorage = $this->view->newItem( 'inputEntityFileIdStorage', 'WbfsysFileStorage_Selectbox' );
      $this->items['entity_file-id_storage'] = $inputIdStorage;
      $inputIdStorage->addAttributes
      (
        array
        (
          'name'      => 'entity_file[id_storage]',
          'id'        => 'wgt-input-entity_file_id_storage'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Storage', 'src' => 'File' ) ),
        )
      );
      $inputIdStorage->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdStorage->assignedForm = $this->assignedForm;

      $inputIdStorage->setActive( $this->entityEntityFile->getData( 'id_storage' ) );
      $inputIdStorage->setReadonly( $this->fieldReadOnly( 'entity_file', 'id_storage' ) );
      $inputIdStorage->setRequired( $this->fieldRequired( 'entity_file', 'id_storage' ) );


      $inputIdStorage->setLabel( $i18n->l( 'Storage', 'wbfsys.file.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdStorage->refresh           = $this->refresh;
        $inputIdStorage->serializeElement  = $this->sendElement;
        $inputIdStorage->editUrl = 'index.php?c=Wbfsys.FileStorage.listing&amp;target='.$this->namespace.'&amp;field=id_storage&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-entity_file_id_storage'.$this->suffix;
      }
      // set an empty first entry
      $inputIdStorage->setFirstFree( 'No Storage selected' );

      
      $queryIdStorage = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['entity_file_id_storage'] ) )
      {
      
        $queryIdStorage = $this->db->newQuery( 'WbfsysFileStorage_Selectbox' );

        $queryIdStorage->fetchSelectbox();
        $inputIdStorage->setData( $queryIdStorage->getAll() );
      
      }
      else
      {
        $inputIdStorage->setData( $this->listElementData['entity_file_id_storage'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdStorage )
        $queryIdStorage = $this->db->newQuery( 'WbfsysFileStorage_Selectbox' );
      
      $inputIdStorage->loadActive = function( $activeId ) use ( $queryIdStorage ){
 
        return $queryIdStorage->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_EntityFile_IdStorage */

 /**
  * create the ui element for field max_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_MaxVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputMaxVersion = $this->view->newInput( 'inputEntityFileMaxVersion', 'Hidden' );
      $this->items['entity_file-max_version'] = $inputMaxVersion;
      $inputMaxVersion->addAttributes
      (
        array
        (
          'name'      => 'entity_file[max_version]',
          'id'        => 'wgt-input-entity_file_max_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Max Version', 'src' => 'File' ) ),
          'maxlength' => $this->entityEntityFile->maxSize( 'max_version' ),
        )
      );
      $inputMaxVersion->setWidth( 'medium' );

      $inputMaxVersion->setData( $this->entityEntityFile->getInt( 'max_version' ) );
      $inputMaxVersion->refresh           = $this->refresh;
      $inputMaxVersion->serializeElement  = $this->sendElement;


  }//end public function input_EntityFile_MaxVersion */

 /**
  * create the ui element for field id_visibility
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_IdVisibility( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdVisibility = $this->view->newInput( 'inputEntityFileIdVisibility', 'Hidden' );
      $this->items['entity_file-id_visibility'] = $inputIdVisibility;
      $inputIdVisibility->addAttributes
      (
        array
        (
          'name'      => 'entity_file[id_visibility]',
          'id'        => 'wgt-input-entity_file_id_visibility'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Visibility', 'src' => 'File' ) ),
          'maxlength' => $this->entityEntityFile->maxSize( 'id_visibility' ),
        )
      );
      $inputIdVisibility->setWidth( 'medium' );

      $inputIdVisibility->setData( $this->entityEntityFile->getInt( 'id_visibility' ) );
      $inputIdVisibility->refresh           = $this->refresh;
      $inputIdVisibility->serializeElement  = $this->sendElement;


  }//end public function input_EntityFile_IdVisibility */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputEntityFileDescription', 'Textarea' );
      $this->items['entity_file-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'entity_file[description]',
          'id'    => 'wgt-input-entity_file_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'File' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'entity_file', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'entity_file', 'description' ) );

      $inputDescription->setData( $this->entityEntityFile->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.file.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_EntityFile_Description */

 /**
  * create the ui element for field mimetype
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_Mimetype( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputMimetype = $this->view->newInput( 'inputEntityFileMimetype', 'Hidden' );
      $this->items['entity_file-mimetype'] = $inputMimetype;
      $inputMimetype->addAttributes
      (
        array
        (
          'name'      => 'entity_file[mimetype]',
          'id'        => 'wgt-input-entity_file_mimetype'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Mimetype', 'src' => 'File' ) ),
          'maxlength' => $this->entityEntityFile->maxSize( 'mimetype' ),
        )
      );
      $inputMimetype->setWidth( 'medium' );

      $inputMimetype->setData( $this->entityEntityFile->getSecure( 'mimetype' ) );
      $inputMimetype->refresh           = $this->refresh;
      $inputMimetype->serializeElement  = $this->sendElement;


  }//end public function input_EntityFile_Mimetype */

 /**
  * create the ui element for field file_size
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_FileSize( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputFileSize = $this->view->newInput( 'inputEntityFileFileSize', 'Int' );
      $this->items['entity_file-file_size'] = $inputFileSize;
      $inputFileSize->addAttributes
      (
        array
        (
          'name'      => 'entity_file[file_size]',
          'id'        => 'wgt-input-entity_file_file_size'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'File Size', 'src' => 'File' ) ),
        )
      );
      $inputFileSize->setWidth( 'medium' );

$inputFileSize->setReadOnly( $this->fieldReadOnly( 'entity_file', 'file_size' ) );
      $inputFileSize->setRequired( $this->fieldRequired( 'entity_file', 'file_size' ) );
      $inputFileSize->setData( $this->entityEntityFile->getData( 'file_size' ) );
      $inputFileSize->setLabel( $i18n->l( 'File Size', 'wbfsys.file.label' ) );

      $inputFileSize->refresh           = $this->refresh;
      $inputFileSize->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_EntityFile_FileSize */

 /**
  * create the ui element for field file_hash
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_FileHash( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputFileHash = $this->view->newInput( 'inputEntityFileFileHash', 'Hidden' );
      $this->items['entity_file-file_hash'] = $inputFileHash;
      $inputFileHash->addAttributes
      (
        array
        (
          'name'      => 'entity_file[file_hash]',
          'id'        => 'wgt-input-entity_file_file_hash'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'File Hash', 'src' => 'File' ) ),
          'maxlength' => $this->entityEntityFile->maxSize( 'file_hash' ),
        )
      );
      $inputFileHash->setWidth( 'medium' );

      $inputFileHash->setData( $this->entityEntityFile->getSecure( 'file_hash' ) );
      $inputFileHash->refresh           = $this->refresh;
      $inputFileHash->serializeElement  = $this->sendElement;


  }//end public function input_EntityFile_FileHash */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputEntityFileRowid' , 'int' );
      $this->items['entity_file-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'entity_file[rowid]',
          'id'        => 'wgt-input-entity_file_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'File' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'entity_file', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'entity_file', 'rowid' ) );
      $inputRowid->setData( $this->entityEntityFile->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.file.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_EntityFile_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputEntityFileMTimeCreated' , 'Date' );
      $this->items['entity_file-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'entity_file[m_time_created]',
          'id'        => 'wgt-input-entity_file_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'File' ) ),
          'maxlength' => $this->entityEntityFile->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'entity_file', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'entity_file', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entityEntityFile->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.file.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_EntityFile_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_MRoleCreate( $params )
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
      $objidWbfsysRoleUser = $this->entityEntityFile->getData( 'm_role_create' ) ;

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

      $inputMRoleCreate = $this->view->newInput( 'inputEntityFileMRoleCreate', 'Window' );
      $this->items['entity_file-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'entity_file[m_role_create]',
        'id'        => 'wgt-input-entity_file_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'File' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entityEntityFile->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'entity_file', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'entity_file', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.file.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=entity_file_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-entity_file_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_EntityFile_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputEntityFileMTimeChanged' , 'Date' );
      $this->items['entity_file-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'entity_file[m_time_changed]',
          'id'        => 'wgt-input-entity_file_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'File' ) ),
          'maxlength' => $this->entityEntityFile->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'entity_file', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'entity_file', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entityEntityFile->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.file.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_EntityFile_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_MRoleChange( $params )
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
      $objidWbfsysRoleUser = $this->entityEntityFile->getData( 'm_role_change' ) ;

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

      $inputMRoleChange = $this->view->newInput( 'inputEntityFileMRoleChange', 'Window' );
      $this->items['entity_file-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'entity_file[m_role_change]',
        'id'        => 'wgt-input-entity_file_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'File' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entityEntityFile->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'entity_file', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'entity_file', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.file.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=entity_file_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-entity_file_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_EntityFile_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputEntityFileMVersion' , 'int' );
      $this->items['entity_file-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'entity_file[m_version]',
          'id'        => 'wgt-input-entity_file_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'File' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'entity_file', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'entity_file', 'm_version' ) );
      $inputMVersion->setData( $this->entityEntityFile->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.file.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_EntityFile_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EntityFile_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputEntityFileMUuid' , 'Text' );
      $this->items['entity_file-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'entity_file[m_uuid]',
          'id'        => 'wgt-input-entity_file_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'File' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'entity_file', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'entity_file', 'm_uuid' ) );
      $inputMUuid->setData( $this->entityEntityFile->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.file.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_EntityFile_MUuid */

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
      $orm->getValidationData( 'WbfsysCustomAttachment', array_keys( $this->fields['wbfsys_custom_attachment']), true ),
      $orm->getErrorMessages( 'WbfsysCustomAttachment' ),
      'wbfsys_custom_attachment'
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
      
    // Extrahieren der Daten für die entity_file Referenz
    $filterEntityFile = $request->checkFormInput
    (
      $orm->getValidationData( 'WbfsysFile', array_keys( $this->fields['entity_file'] ), true ),
      $orm->getErrorMessages( 'WbfsysFile' ),
      'entity_file'
    );
    
    $tmpEntityFile  = $filterEntityFile->getData();
    $dataEntityFile = array();
    
    // es werden nur daten gesetzt die tatsächlich übergeben wurden, sonst
    // würden default werte in den entities überschrieben werden
    foreach( $tmpEntityFile as $key => $value   )
    {
      if( !is_null( $value ) )
        $dataEntityFile[$key] = $value;
    }

    $this->entityEntityFile->addData( $dataEntityFile );


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


    // ui: checkbox
    if( is_null( $this->entityEntityFile->activ ) )
      $this->entityEntityFile->activ = true;


  }//end public function setDefaultData */


}//end class WbfsysCustomAttachment_Crud_Create_Form */


