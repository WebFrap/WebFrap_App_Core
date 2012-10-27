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
class WbfsysCustomComment_Crud_Edit_Form
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
  public $namespace  = 'WbfsysCustomComment';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysCustomComment';

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
      'wbfsys_custom_comment' => array
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
        'id_comment' => array
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
      'embed_comment' => array
      (
        'm_parent' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'title' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'rate' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '5.2',
        ),
        'lft' => array
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
        'id_lang' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'content' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'rgt' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_vid_entity' => array
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
   * @var WbfsysCustomComment_Entity 
   */
  public $entity      = null;
  
  /**
  * The EmbedComment Reference Entity
  *
  * @var EmbedComment_Entity
  */
  public $entityEmbedComment;


  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysCustomComment_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysCustomComment_Entity $entity
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
  * @return EmbedComment_Entity
  */
  public function getEntityEmbedComment(  )
  {

    return $this->entityEmbedComment;

  }//end public function getEntityEmbedComment */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param EmbedComment_Entity $entity
  */
  public function setEntityEmbedComment( $entity )
  {

    $this->entityEmbedComment = $entity ;

  }//end public function setEntityEmbedComment */

  /**
   * request all fields that have to be fetched from the request
   * @return array
   */
  public function getSaveFields()
  {

    return array
    (
      'wbfsys_custom_comment' => array
      (
        'vid',
        'id_entity',
        'id_user',
        'id_comment',
        'm_version',
      ),
      'embed_comment' => array
      (
        'm_parent',
        'title',
        'rate',
        'lft',
        'vid',
        'id_lang',
        'content',
        'rgt',
        'id_vid_entity',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysCustomComment entity
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
    $this->view->addVar( 'entityWbfsysCustomComment', $this->entity );
  $this->view->addVar( 'entityEmbedComment',  $this->entityEmbedComment ) ;


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_custom_comment'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_custom_comment[id_wbfsys_custom_comment-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysCustomComment_Vid( $params );
    $this->input_WbfsysCustomComment_IdEntity( $params );
    $this->input_WbfsysCustomComment_IdUser( $params );
    $this->input_WbfsysCustomComment_IdComment( $params );
    $this->input_WbfsysCustomComment_Rowid( $params );
    $this->input_WbfsysCustomComment_MTimeCreated( $params );
    $this->input_WbfsysCustomComment_MRoleCreate( $params );
    $this->input_WbfsysCustomComment_MTimeChanged( $params );
    $this->input_WbfsysCustomComment_MRoleChange( $params );
    $this->input_WbfsysCustomComment_MVersion( $params );
    $this->input_WbfsysCustomComment_MUuid( $params );
    $this->input_EmbedComment_MParent( $params );
    $this->input_EmbedComment_Title( $params );
    $this->input_EmbedComment_Rate( $params );
    $this->input_EmbedComment_Lft( $params );
    $this->input_EmbedComment_Vid( $params );
    $this->input_EmbedComment_IdLang( $params );
    $this->input_EmbedComment_Content( $params );
    $this->input_EmbedComment_Rgt( $params );
    $this->input_EmbedComment_IdVidEntity( $params );
    $this->input_EmbedComment_Rowid( $params );
    $this->input_EmbedComment_MTimeCreated( $params );
    $this->input_EmbedComment_MRoleCreate( $params );
    $this->input_EmbedComment_MTimeChanged( $params );
    $this->input_EmbedComment_MRoleChange( $params );
    $this->input_EmbedComment_MVersion( $params );
    $this->input_EmbedComment_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomComment_Vid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputVid = $this->view->newInput( 'inputWbfsysCustomCommentVid', 'Hidden' );
      $this->items['wbfsys_custom_comment-vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_comment[vid]',
          'id'        => 'wgt-input-wbfsys_custom_comment_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Vid', 'src' => 'Custom Comment' ) ),
          'maxlength' => $this->entity->maxSize( 'vid' ),
        )
      );
      $inputVid->setWidth( 'medium' );

      $inputVid->setData( $this->entity->getInt( 'vid' ) );
      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysCustomComment_Vid */

 /**
  * create the ui element for field id_entity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomComment_IdEntity( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdEntity = $this->view->newInput( 'inputWbfsysCustomCommentIdEntity', 'Hidden' );
      $this->items['wbfsys_custom_comment-id_entity'] = $inputIdEntity;
      $inputIdEntity->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_comment[id_entity]',
          'id'        => 'wgt-input-wbfsys_custom_comment_id_entity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Entity', 'src' => 'Custom Comment' ) ),
          'maxlength' => $this->entity->maxSize( 'id_entity' ),
        )
      );
      $inputIdEntity->setWidth( 'medium' );

      $inputIdEntity->setData( $this->entity->getSecure( 'id_entity' ) );
      $inputIdEntity->refresh           = $this->refresh;
      $inputIdEntity->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysCustomComment_IdEntity */

 /**
  * create the ui element for field id_user
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomComment_IdUser( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdUser = $this->view->newInput( 'inputWbfsysCustomCommentIdUser', 'Hidden' );
      $this->items['wbfsys_custom_comment-id_user'] = $inputIdUser;
      $inputIdUser->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_comment[id_user]',
          'id'        => 'wgt-input-wbfsys_custom_comment_id_user'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'User', 'src' => 'Custom Comment' ) ),
          'maxlength' => $this->entity->maxSize( 'id_user' ),
        )
      );
      $inputIdUser->setWidth( 'medium' );

      $inputIdUser->setData( $this->entity->getSecure( 'id_user' ) );
      $inputIdUser->refresh           = $this->refresh;
      $inputIdUser->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysCustomComment_IdUser */

 /**
  * create the ui element for field id_comment
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomComment_IdComment( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdComment = $this->view->newInput( 'inputWbfsysCustomCommentIdComment', 'Hidden' );
      $this->items['wbfsys_custom_comment-id_comment'] = $inputIdComment;
      $inputIdComment->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_comment[id_comment]',
          'id'        => 'wgt-input-wbfsys_custom_comment_id_comment'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Comment', 'src' => 'Custom Comment' ) ),
          'maxlength' => $this->entity->maxSize( 'id_comment' ),
        )
      );
      $inputIdComment->setWidth( 'medium' );

      $inputIdComment->setData( $this->entity->getSecure( 'id_comment' ) );
      $inputIdComment->refresh           = $this->refresh;
      $inputIdComment->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysCustomComment_IdComment */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomComment_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysCustomCommentRowid' , 'int' );
      $this->items['wbfsys_custom_comment-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_comment[rowid]',
          'id'        => 'wgt-input-wbfsys_custom_comment_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Custom Comment' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_comment', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_custom_comment', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.custom_comment.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysCustomComment_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomComment_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysCustomCommentMTimeCreated' , 'Date' );
      $this->items['wbfsys_custom_comment-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_comment[m_time_created]',
          'id'        => 'wgt-input-wbfsys_custom_comment_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Custom Comment' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_comment', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_custom_comment', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.custom_comment.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysCustomComment_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomComment_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysCustomCommentMRoleCreate', 'Window' );
      $this->items['wbfsys_custom_comment-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_custom_comment[m_role_create]',
        'id'        => 'wgt-input-wbfsys_custom_comment_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Custom Comment' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_comment', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_custom_comment', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.custom_comment.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_custom_comment_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_custom_comment_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysCustomComment_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomComment_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysCustomCommentMTimeChanged' , 'Date' );
      $this->items['wbfsys_custom_comment-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_comment[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_custom_comment_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Custom Comment' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_comment', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_custom_comment', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.custom_comment.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysCustomComment_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomComment_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysCustomCommentMRoleChange', 'Window' );
      $this->items['wbfsys_custom_comment-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_custom_comment[m_role_change]',
        'id'        => 'wgt-input-wbfsys_custom_comment_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Custom Comment' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_comment', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_custom_comment', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.custom_comment.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_custom_comment_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_custom_comment_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysCustomComment_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomComment_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysCustomCommentMVersion' , 'int' );
      $this->items['wbfsys_custom_comment-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_comment[m_version]',
          'id'        => 'wgt-input-wbfsys_custom_comment_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Custom Comment' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_comment', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_custom_comment', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.custom_comment.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysCustomComment_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysCustomComment_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysCustomCommentMUuid' , 'Text' );
      $this->items['wbfsys_custom_comment-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_custom_comment[m_uuid]',
          'id'        => 'wgt-input-wbfsys_custom_comment_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Custom Comment' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_custom_comment', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_custom_comment', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.custom_comment.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysCustomComment_MUuid */

 /**
  * create the ui element for field m_parent
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedComment_MParent( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysComment_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysComment not exists' );

      Log::warn( 'Looks like the Entity: WbfsysComment is missing' );

      return;
    }


      //p: Window
      $objidWbfsysComment = $this->entityEmbedComment->getData( 'm_parent' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysComment
          || !$entityWbfsysComment = $this->db->orm->get
          (
            'WbfsysComment',
            $objidWbfsysComment
          )
      )
      {
        $entityWbfsysComment = $this->db->orm->newEntity( 'WbfsysComment' );
      }

      $inputMParent = $this->view->newInput( 'inputEmbedCommentMParent', 'Window' );
      $this->items['embed_comment-m_parent'] = $inputMParent;
      $inputMParent->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'embed_comment[m_parent]',
        'id'        => 'wgt-input-embed_comment_m_parent'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Parent Node', 'src' => 'Comment' ) ),
      ));

      if( $this->assignedForm )
        $inputMParent->assignedForm = $this->assignedForm;

      $inputMParent->setWidth( 'medium' );

      $inputMParent->setData( $this->entityEmbedComment->getData( 'm_parent' )  );
      $inputMParent->setReadonly( $this->fieldReadOnly( 'embed_comment', 'm_parent' ) );
      $inputMParent->setRequired( $this->fieldRequired( 'embed_comment', 'm_parent' ) );
      $inputMParent->setLabel( $i18n->l( 'Parent Node', 'wbfsys.comment.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Comment.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=embed_comment_m_parent'.($this->suffix?'-'.$this->suffix:'');

      $inputMParent->setListUrl ( $listUrl );
      $inputMParent->setListIcon( 'control/connect.png' );
      $inputMParent->setEntityUrl( 'maintab.php?c=Wbfsys.Comment.edit' );
      $inputMParent->conEntity         = $entityWbfsysComment;
      $inputMParent->refresh           = $this->refresh;
      $inputMParent->serializeElement  = $this->sendElement;



      $inputMParent->view = $this->view;
      $inputMParent->buildJavascript( 'wgt-input-embed_comment_m_parent'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMParent );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_EmbedComment_MParent */

 /**
  * create the ui element for field title
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedComment_Title( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputTitle = $this->view->newInput( 'inputEmbedCommentTitle' , 'Text' );
      $this->items['embed_comment-title'] = $inputTitle;
      $inputTitle->addAttributes
      (
        array
        (
          'name'      => 'embed_comment[title]',
          'id'        => 'wgt-input-embed_comment_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required xxlarge'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Title', 'src' => 'Comment' ) ),
          'maxlength' => $this->entityEmbedComment->maxSize( 'title' ),
        )
      );
      $inputTitle->setWidth( 'xxlarge' );

      $inputTitle->setReadonly( $this->fieldReadOnly( 'embed_comment', 'title' ) );
      $inputTitle->setRequired( $this->fieldRequired( 'embed_comment', 'title' ) );
      $inputTitle->setData( $this->entityEmbedComment->getSecure('title') );
      $inputTitle->setLabel( $i18n->l( 'Title', 'wbfsys.comment.label' ) );

      $inputTitle->refresh           = $this->refresh;
      $inputTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_EmbedComment_Title */

 /**
  * create the ui element for field rate
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedComment_Rate( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:ratingbar
      $inputRate = $this->view->newInput( 'inputEmbedCommentRate' , 'Ratingbar' );
      $this->items['embed_comment-rate'] = $inputRate;
      $inputRate->addAttributes
      (
        array
        (
          'name'      => 'embed_comment[rate]',
          'id'        => 'wgt-input-embed_comment_rate'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_numeric medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rating', 'src' => 'Comment' ) ),
        )
      );
      $inputRate->setWidth( 'medium' );


      $inputRate->setReadonly( $this->fieldReadOnly( 'embed_comment', 'rate' ) );
      $inputRate->setRequired( $this->fieldRequired( 'embed_comment', 'rate' ) );
      $inputRate->setData( $this->entityEmbedComment->getData( 'rate' ) );
      $inputRate->setLabel( $i18n->l( 'Rating', 'wbfsys.comment.label' ) );

      $inputRate->refresh           = $this->refresh;
      $inputRate->serializeElement  = $this->sendElement;

      $this->view->addJsItem( 'inputEmbedCommentRate' );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_EmbedComment_Rate */

 /**
  * create the ui element for field lft
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedComment_Lft( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputLft = $this->view->newInput( 'inputEmbedCommentLft', 'Hidden' );
      $this->items['embed_comment-lft'] = $inputLft;
      $inputLft->addAttributes
      (
        array
        (
          'name'      => 'embed_comment[lft]',
          'id'        => 'wgt-input-embed_comment_lft'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Lft', 'src' => 'Comment' ) ),
          'maxlength' => $this->entityEmbedComment->maxSize( 'lft' ),
        )
      );
      $inputLft->setWidth( 'medium' );

      $inputLft->setData( $this->entityEmbedComment->getInt( 'lft' ) );
      $inputLft->refresh           = $this->refresh;
      $inputLft->serializeElement  = $this->sendElement;


  }//end public function input_EmbedComment_Lft */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedComment_Vid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputVid = $this->view->newInput( 'inputEmbedCommentVid', 'Hidden' );
      $this->items['embed_comment-vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => 'embed_comment[vid]',
          'id'        => 'wgt-input-embed_comment_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'VID', 'src' => 'Comment' ) ),
          'maxlength' => $this->entityEmbedComment->maxSize( 'vid' ),
        )
      );
      $inputVid->setWidth( 'medium' );

      $inputVid->setData( $this->entityEmbedComment->getSecure( 'vid' ) );
      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;


  }//end public function input_EmbedComment_Vid */

 /**
  * create the ui element for field id_lang
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedComment_IdLang( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysLanguage_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysLanguage not exists' );

      Log::warn( 'Looks like the Entity: WbfsysLanguage is missing' );

      return;
    }


      //p: Window
      $objidWbfsysLanguage = $this->entityEmbedComment->getData( 'id_lang' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysLanguage
          || !$entityWbfsysLanguage = $this->db->orm->get
          (
            'WbfsysLanguage',
            $objidWbfsysLanguage
          )
      )
      {
        $entityWbfsysLanguage = $this->db->orm->newEntity( 'WbfsysLanguage' );
      }

      $inputIdLang = $this->view->newInput( 'inputEmbedCommentIdLang', 'Window' );
      $this->items['embed_comment-id_lang'] = $inputIdLang;
      $inputIdLang->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'embed_comment[id_lang]',
        'id'        => 'wgt-input-embed_comment_id_lang'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Language', 'src' => 'Comment' ) ),
      ));

      if( $this->assignedForm )
        $inputIdLang->assignedForm = $this->assignedForm;

      $inputIdLang->setWidth( 'medium' );

      $inputIdLang->setData( $this->entityEmbedComment->getData( 'id_lang' )  );
      $inputIdLang->setReadonly( $this->fieldReadOnly( 'embed_comment', 'id_lang' ) );
      $inputIdLang->setRequired( $this->fieldRequired( 'embed_comment', 'id_lang' ) );
      $inputIdLang->setLabel( $i18n->l( 'Language', 'wbfsys.comment.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Language.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=embed_comment_id_lang'.($this->suffix?'-'.$this->suffix:'');

      $inputIdLang->setListUrl ( $listUrl );
      $inputIdLang->setListIcon( 'control/connect.png' );
      $inputIdLang->setEntityUrl( 'maintab.php?c=Wbfsys.Language.edit' );
      $inputIdLang->conEntity         = $entityWbfsysLanguage;
      $inputIdLang->refresh           = $this->refresh;
      $inputIdLang->serializeElement  = $this->sendElement;


        $inputIdLang->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.Language.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdLang->view = $this->view;
      $inputIdLang->buildJavascript( 'wgt-input-embed_comment_id_lang'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdLang );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_EmbedComment_IdLang */

 /**
  * create the ui element for field content
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedComment_Content( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputContent = $this->view->newInput( 'inputEmbedCommentContent', 'Textarea' );
      $this->items['embed_comment-content'] = $inputContent;
      $inputContent->addAttributes
      (
        array
        (
          'name'  => 'embed_comment[content]',
          'id'    => 'wgt-input-embed_comment_content'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required full large-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Content', 'src' => 'Comment' ) ),
        )
      );
      $inputContent->setWidth( 'full' );

      $inputContent->full = true;
      $inputContent->setReadonly( $this->fieldReadOnly( 'embed_comment', 'content' ) );
      $inputContent->setRequired( $this->fieldRequired( 'embed_comment', 'content' ) );

      $inputContent->setData( $this->entityEmbedComment->getSecure( 'content' ) );
      $inputContent->setLabel( $i18n->l( 'Content', 'wbfsys.comment.label' ) );

      $inputContent->refresh           = $this->refresh;
      $inputContent->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Content' ,
        true
      );


  }//end public function input_EmbedComment_Content */

 /**
  * create the ui element for field rgt
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedComment_Rgt( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputRgt = $this->view->newInput( 'inputEmbedCommentRgt', 'Hidden' );
      $this->items['embed_comment-rgt'] = $inputRgt;
      $inputRgt->addAttributes
      (
        array
        (
          'name'      => 'embed_comment[rgt]',
          'id'        => 'wgt-input-embed_comment_rgt'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rgt', 'src' => 'Comment' ) ),
          'maxlength' => $this->entityEmbedComment->maxSize( 'rgt' ),
        )
      );
      $inputRgt->setWidth( 'medium' );

      $inputRgt->setData( $this->entityEmbedComment->getInt( 'rgt' ) );
      $inputRgt->refresh           = $this->refresh;
      $inputRgt->serializeElement  = $this->sendElement;


  }//end public function input_EmbedComment_Rgt */

 /**
  * create the ui element for field id_vid_entity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedComment_IdVidEntity( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdVidEntity = $this->view->newInput( 'inputEmbedCommentIdVidEntity', 'Hidden' );
      $this->items['embed_comment-id_vid_entity'] = $inputIdVidEntity;
      $inputIdVidEntity->addAttributes
      (
        array
        (
          'name'      => 'embed_comment[id_vid_entity]',
          'id'        => 'wgt-input-embed_comment_id_vid_entity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Entity', 'src' => 'Comment' ) ),
          'maxlength' => $this->entityEmbedComment->maxSize( 'id_vid_entity' ),
        )
      );
      $inputIdVidEntity->setWidth( 'medium' );

      $inputIdVidEntity->setData( $this->entityEmbedComment->getSecure( 'id_vid_entity' ) );
      $inputIdVidEntity->refresh           = $this->refresh;
      $inputIdVidEntity->serializeElement  = $this->sendElement;


  }//end public function input_EmbedComment_IdVidEntity */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedComment_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputEmbedCommentRowid' , 'int' );
      $this->items['embed_comment-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'embed_comment[rowid]',
          'id'        => 'wgt-input-embed_comment_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Comment' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'embed_comment', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'embed_comment', 'rowid' ) );
      $inputRowid->setData( $this->entityEmbedComment->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.comment.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_EmbedComment_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedComment_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputEmbedCommentMTimeCreated' , 'Date' );
      $this->items['embed_comment-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'embed_comment[m_time_created]',
          'id'        => 'wgt-input-embed_comment_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Comment' ) ),
          'maxlength' => $this->entityEmbedComment->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'embed_comment', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'embed_comment', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entityEmbedComment->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.comment.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_EmbedComment_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedComment_MRoleCreate( $params )
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
      $objidWbfsysRoleUser = $this->entityEmbedComment->getData( 'm_role_create' ) ;

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

      $inputMRoleCreate = $this->view->newInput( 'inputEmbedCommentMRoleCreate', 'Window' );
      $this->items['embed_comment-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'embed_comment[m_role_create]',
        'id'        => 'wgt-input-embed_comment_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Comment' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entityEmbedComment->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'embed_comment', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'embed_comment', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.comment.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=embed_comment_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-embed_comment_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_EmbedComment_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedComment_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputEmbedCommentMTimeChanged' , 'Date' );
      $this->items['embed_comment-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'embed_comment[m_time_changed]',
          'id'        => 'wgt-input-embed_comment_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Comment' ) ),
          'maxlength' => $this->entityEmbedComment->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'embed_comment', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'embed_comment', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entityEmbedComment->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.comment.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_EmbedComment_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedComment_MRoleChange( $params )
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
      $objidWbfsysRoleUser = $this->entityEmbedComment->getData( 'm_role_change' ) ;

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

      $inputMRoleChange = $this->view->newInput( 'inputEmbedCommentMRoleChange', 'Window' );
      $this->items['embed_comment-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'embed_comment[m_role_change]',
        'id'        => 'wgt-input-embed_comment_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Comment' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entityEmbedComment->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'embed_comment', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'embed_comment', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.comment.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=embed_comment_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-embed_comment_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_EmbedComment_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedComment_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputEmbedCommentMVersion' , 'int' );
      $this->items['embed_comment-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'embed_comment[m_version]',
          'id'        => 'wgt-input-embed_comment_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Comment' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'embed_comment', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'embed_comment', 'm_version' ) );
      $inputMVersion->setData( $this->entityEmbedComment->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.comment.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_EmbedComment_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_EmbedComment_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputEmbedCommentMUuid' , 'Text' );
      $this->items['embed_comment-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'embed_comment[m_uuid]',
          'id'        => 'wgt-input-embed_comment_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Comment' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'embed_comment', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'embed_comment', 'm_uuid' ) );
      $inputMUuid->setData( $this->entityEmbedComment->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.comment.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_EmbedComment_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysCustomComment_Crud_Edit_Form */


