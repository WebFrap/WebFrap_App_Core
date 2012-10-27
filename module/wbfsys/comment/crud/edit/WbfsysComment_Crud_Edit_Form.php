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
class WbfsysComment_Crud_Edit_Form
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
  public $namespace  = 'WbfsysComment';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysComment';

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
      'wbfsys_comment' => array
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
   * @var WbfsysComment_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysComment_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysComment_Entity $entity
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
      'wbfsys_comment' => array
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
  * create an IO form for the WbfsysComment entity
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
    $this->view->addVar( 'entityWbfsysComment', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_comment'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_comment[id_wbfsys_comment-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysComment_MParent( $params );
    $this->input_WbfsysComment_Title( $params );
    $this->input_WbfsysComment_Rate( $params );
    $this->input_WbfsysComment_Lft( $params );
    $this->input_WbfsysComment_Vid( $params );
    $this->input_WbfsysComment_IdLang( $params );
    $this->input_WbfsysComment_Content( $params );
    $this->input_WbfsysComment_Rgt( $params );
    $this->input_WbfsysComment_IdVidEntity( $params );
    $this->input_WbfsysComment_Rowid( $params );
    $this->input_WbfsysComment_MTimeCreated( $params );
    $this->input_WbfsysComment_MRoleCreate( $params );
    $this->input_WbfsysComment_MTimeChanged( $params );
    $this->input_WbfsysComment_MRoleChange( $params );
    $this->input_WbfsysComment_MVersion( $params );
    $this->input_WbfsysComment_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field m_parent
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysComment_MParent( $params )
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
      $objidWbfsysComment = $this->entity->getData( 'm_parent' ) ;

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

      $inputMParent = $this->view->newInput( 'inputWbfsysCommentMParent', 'Window' );
      $this->items['wbfsys_comment-m_parent'] = $inputMParent;
      $inputMParent->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_comment[m_parent]',
        'id'        => 'wgt-input-wbfsys_comment_m_parent'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Parent Node', 'src' => 'Comment' ) ),
      ));

      if( $this->assignedForm )
        $inputMParent->assignedForm = $this->assignedForm;

      $inputMParent->setWidth( 'medium' );

      $inputMParent->setData( $this->entity->getData( 'm_parent' )  );
      $inputMParent->setReadonly( $this->fieldReadOnly( 'wbfsys_comment', 'm_parent' ) );
      $inputMParent->setRequired( $this->fieldRequired( 'wbfsys_comment', 'm_parent' ) );
      $inputMParent->setLabel( $i18n->l( 'Parent Node', 'wbfsys.comment.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Comment.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_comment_m_parent'.($this->suffix?'-'.$this->suffix:'');

      $inputMParent->setListUrl ( $listUrl );
      $inputMParent->setListIcon( 'control/connect.png' );
      $inputMParent->setEntityUrl( 'maintab.php?c=Wbfsys.Comment.edit' );
      $inputMParent->conEntity         = $entityWbfsysComment;
      $inputMParent->refresh           = $this->refresh;
      $inputMParent->serializeElement  = $this->sendElement;



      $inputMParent->view = $this->view;
      $inputMParent->buildJavascript( 'wgt-input-wbfsys_comment_m_parent'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMParent );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysComment_MParent */

 /**
  * create the ui element for field title
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysComment_Title( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputTitle = $this->view->newInput( 'inputWbfsysCommentTitle' , 'Text' );
      $this->items['wbfsys_comment-title'] = $inputTitle;
      $inputTitle->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_comment[title]',
          'id'        => 'wgt-input-wbfsys_comment_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required xxlarge'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Title', 'src' => 'Comment' ) ),
          'maxlength' => $this->entity->maxSize( 'title' ),
        )
      );
      $inputTitle->setWidth( 'xxlarge' );

      $inputTitle->setReadonly( $this->fieldReadOnly( 'wbfsys_comment', 'title' ) );
      $inputTitle->setRequired( $this->fieldRequired( 'wbfsys_comment', 'title' ) );
      $inputTitle->setData( $this->entity->getSecure('title') );
      $inputTitle->setLabel( $i18n->l( 'Title', 'wbfsys.comment.label' ) );

      $inputTitle->refresh           = $this->refresh;
      $inputTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysComment_Title */

 /**
  * create the ui element for field rate
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysComment_Rate( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:ratingbar
      $inputRate = $this->view->newInput( 'inputWbfsysCommentRate' , 'Ratingbar' );
      $this->items['wbfsys_comment-rate'] = $inputRate;
      $inputRate->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_comment[rate]',
          'id'        => 'wgt-input-wbfsys_comment_rate'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_numeric medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rating', 'src' => 'Comment' ) ),
        )
      );
      $inputRate->setWidth( 'medium' );


      $inputRate->setReadonly( $this->fieldReadOnly( 'wbfsys_comment', 'rate' ) );
      $inputRate->setRequired( $this->fieldRequired( 'wbfsys_comment', 'rate' ) );
      $inputRate->setData( $this->entity->getData( 'rate' ) );
      $inputRate->setLabel( $i18n->l( 'Rating', 'wbfsys.comment.label' ) );

      $inputRate->refresh           = $this->refresh;
      $inputRate->serializeElement  = $this->sendElement;

      $this->view->addJsItem( 'inputWbfsysCommentRate' );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysComment_Rate */

 /**
  * create the ui element for field lft
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysComment_Lft( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputLft = $this->view->newInput( 'inputWbfsysCommentLft', 'Hidden' );
      $this->items['wbfsys_comment-lft'] = $inputLft;
      $inputLft->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_comment[lft]',
          'id'        => 'wgt-input-wbfsys_comment_lft'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Lft', 'src' => 'Comment' ) ),
          'maxlength' => $this->entity->maxSize( 'lft' ),
        )
      );
      $inputLft->setWidth( 'medium' );

      $inputLft->setData( $this->entity->getInt( 'lft' ) );
      $inputLft->refresh           = $this->refresh;
      $inputLft->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysComment_Lft */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysComment_Vid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputVid = $this->view->newInput( 'inputWbfsysCommentVid', 'Hidden' );
      $this->items['wbfsys_comment-vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_comment[vid]',
          'id'        => 'wgt-input-wbfsys_comment_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'VID', 'src' => 'Comment' ) ),
          'maxlength' => $this->entity->maxSize( 'vid' ),
        )
      );
      $inputVid->setWidth( 'medium' );

      $inputVid->setData( $this->entity->getSecure( 'vid' ) );
      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysComment_Vid */

 /**
  * create the ui element for field id_lang
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysComment_IdLang( $params )
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
      $objidWbfsysLanguage = $this->entity->getData( 'id_lang' ) ;

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

      $inputIdLang = $this->view->newInput( 'inputWbfsysCommentIdLang', 'Window' );
      $this->items['wbfsys_comment-id_lang'] = $inputIdLang;
      $inputIdLang->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_comment[id_lang]',
        'id'        => 'wgt-input-wbfsys_comment_id_lang'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Language', 'src' => 'Comment' ) ),
      ));

      if( $this->assignedForm )
        $inputIdLang->assignedForm = $this->assignedForm;

      $inputIdLang->setWidth( 'medium' );

      $inputIdLang->setData( $this->entity->getData( 'id_lang' )  );
      $inputIdLang->setReadonly( $this->fieldReadOnly( 'wbfsys_comment', 'id_lang' ) );
      $inputIdLang->setRequired( $this->fieldRequired( 'wbfsys_comment', 'id_lang' ) );
      $inputIdLang->setLabel( $i18n->l( 'Language', 'wbfsys.comment.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Language.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_comment_id_lang'.($this->suffix?'-'.$this->suffix:'');

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
      $inputIdLang->buildJavascript( 'wgt-input-wbfsys_comment_id_lang'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdLang );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysComment_IdLang */

 /**
  * create the ui element for field content
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysComment_Content( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputContent = $this->view->newInput( 'inputWbfsysCommentContent', 'Textarea' );
      $this->items['wbfsys_comment-content'] = $inputContent;
      $inputContent->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_comment[content]',
          'id'    => 'wgt-input-wbfsys_comment_content'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required full large-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Content', 'src' => 'Comment' ) ),
        )
      );
      $inputContent->setWidth( 'full' );

      $inputContent->full = true;
      $inputContent->setReadonly( $this->fieldReadOnly( 'wbfsys_comment', 'content' ) );
      $inputContent->setRequired( $this->fieldRequired( 'wbfsys_comment', 'content' ) );

      $inputContent->setData( $this->entity->getSecure( 'content' ) );
      $inputContent->setLabel( $i18n->l( 'Content', 'wbfsys.comment.label' ) );

      $inputContent->refresh           = $this->refresh;
      $inputContent->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Content' ,
        true
      );


  }//end public function input_WbfsysComment_Content */

 /**
  * create the ui element for field rgt
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysComment_Rgt( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputRgt = $this->view->newInput( 'inputWbfsysCommentRgt', 'Hidden' );
      $this->items['wbfsys_comment-rgt'] = $inputRgt;
      $inputRgt->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_comment[rgt]',
          'id'        => 'wgt-input-wbfsys_comment_rgt'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rgt', 'src' => 'Comment' ) ),
          'maxlength' => $this->entity->maxSize( 'rgt' ),
        )
      );
      $inputRgt->setWidth( 'medium' );

      $inputRgt->setData( $this->entity->getInt( 'rgt' ) );
      $inputRgt->refresh           = $this->refresh;
      $inputRgt->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysComment_Rgt */

 /**
  * create the ui element for field id_vid_entity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysComment_IdVidEntity( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdVidEntity = $this->view->newInput( 'inputWbfsysCommentIdVidEntity', 'Hidden' );
      $this->items['wbfsys_comment-id_vid_entity'] = $inputIdVidEntity;
      $inputIdVidEntity->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_comment[id_vid_entity]',
          'id'        => 'wgt-input-wbfsys_comment_id_vid_entity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Entity', 'src' => 'Comment' ) ),
          'maxlength' => $this->entity->maxSize( 'id_vid_entity' ),
        )
      );
      $inputIdVidEntity->setWidth( 'medium' );

      $inputIdVidEntity->setData( $this->entity->getSecure( 'id_vid_entity' ) );
      $inputIdVidEntity->refresh           = $this->refresh;
      $inputIdVidEntity->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysComment_IdVidEntity */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysComment_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysCommentRowid' , 'int' );
      $this->items['wbfsys_comment-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_comment[rowid]',
          'id'        => 'wgt-input-wbfsys_comment_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Comment' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_comment', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_comment', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.comment.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysComment_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysComment_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysCommentMTimeCreated' , 'Date' );
      $this->items['wbfsys_comment-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_comment[m_time_created]',
          'id'        => 'wgt-input-wbfsys_comment_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Comment' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_comment', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_comment', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.comment.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysComment_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysComment_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysCommentMRoleCreate', 'Window' );
      $this->items['wbfsys_comment-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_comment[m_role_create]',
        'id'        => 'wgt-input-wbfsys_comment_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Comment' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_comment', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_comment', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.comment.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_comment_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_comment_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysComment_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysComment_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysCommentMTimeChanged' , 'Date' );
      $this->items['wbfsys_comment-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_comment[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_comment_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Comment' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_comment', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_comment', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.comment.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysComment_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysComment_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysCommentMRoleChange', 'Window' );
      $this->items['wbfsys_comment-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_comment[m_role_change]',
        'id'        => 'wgt-input-wbfsys_comment_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Comment' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_comment', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_comment', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.comment.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_comment_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_comment_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysComment_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysComment_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysCommentMVersion' , 'int' );
      $this->items['wbfsys_comment-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_comment[m_version]',
          'id'        => 'wgt-input-wbfsys_comment_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Comment' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_comment', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_comment', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.comment.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysComment_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysComment_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysCommentMUuid' , 'Text' );
      $this->items['wbfsys_comment-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_comment[m_uuid]',
          'id'        => 'wgt-input-wbfsys_comment_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Comment' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_comment', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_comment', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.comment.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysComment_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysComment_Crud_Edit_Form */


