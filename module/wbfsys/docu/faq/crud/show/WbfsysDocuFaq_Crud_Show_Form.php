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
class WbfsysDocuFaq_Crud_Show_Form
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
  public $namespace  = 'WbfsysDocuFaq';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysDocuFaq';

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
      'wbfsys_docu_faq' => array
      (
        'question' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'vid' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'answer' => array
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
   * @var WbfsysDocuFaq_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysDocuFaq_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysDocuFaq_Entity $entity
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
      'wbfsys_docu_faq' => array
      (
        'question',
        'vid',
        'answer',
        'id_vid_entity',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysDocuFaq entity
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
    $this->view->addVar( 'entityWbfsysDocuFaq', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_docu_faq'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_docu_faq[id_wbfsys_docu_faq-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysDocuFaq_Question( $params );
    $this->input_WbfsysDocuFaq_Vid( $params );
    $this->input_WbfsysDocuFaq_Answer( $params );
    $this->input_WbfsysDocuFaq_IdVidEntity( $params );
    $this->input_WbfsysDocuFaq_Rowid( $params );
    $this->input_WbfsysDocuFaq_MTimeCreated( $params );
    $this->input_WbfsysDocuFaq_MRoleCreate( $params );
    $this->input_WbfsysDocuFaq_MTimeChanged( $params );
    $this->input_WbfsysDocuFaq_MRoleChange( $params );
    $this->input_WbfsysDocuFaq_MVersion( $params );
    $this->input_WbfsysDocuFaq_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field question
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuFaq_Question( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputQuestion = $this->view->newInput( 'inputWbfsysDocuFaqQuestion' , 'Text' );
      $this->items['wbfsys_docu_faq-question'] = $inputQuestion;
      $inputQuestion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_docu_faq[question]',
          'id'        => 'wgt-input-wbfsys_docu_faq_question'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip xxlarge'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'question', 'src' => 'Docu Faq' ) ),
          'maxlength' => $this->entity->maxSize( 'question' ),
        )
      );
      $inputQuestion->setWidth( 'xxlarge' );

      $inputQuestion->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_faq', 'question' ) );
      $inputQuestion->setRequired( $this->fieldRequired( 'wbfsys_docu_faq', 'question' ) );
      $inputQuestion->setData( $this->entity->getSecure('question') );
      $inputQuestion->setLabel( $i18n->l( 'question', 'wbfsys.docu_faq.label' ) );

      $inputQuestion->refresh           = $this->refresh;
      $inputQuestion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysDocuFaq_Question */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuFaq_Vid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputVid = $this->view->newInput( 'inputWbfsysDocuFaqVid', 'Hidden' );
      $this->items['wbfsys_docu_faq-vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_docu_faq[vid]',
          'id'        => 'wgt-input-wbfsys_docu_faq_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'VID', 'src' => 'Docu Faq' ) ),
          'maxlength' => $this->entity->maxSize( 'vid' ),
        )
      );
      $inputVid->setWidth( 'medium' );

      $inputVid->setData( $this->entity->getSecure( 'vid' ) );
      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysDocuFaq_Vid */

 /**
  * create the ui element for field answer
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuFaq_Answer( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputAnswer = $this->view->newInput( 'inputWbfsysDocuFaqAnswer', 'Textarea' );
      $this->items['wbfsys_docu_faq-answer'] = $inputAnswer;
      $inputAnswer->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_docu_faq[answer]',
          'id'    => 'wgt-input-wbfsys_docu_faq_answer'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full large-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'answer', 'src' => 'Docu Faq' ) ),
        )
      );
      $inputAnswer->setWidth( 'full' );

      $inputAnswer->full = true;
      $inputAnswer->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_faq', 'answer' ) );
      $inputAnswer->setRequired( $this->fieldRequired( 'wbfsys_docu_faq', 'answer' ) );

      $inputAnswer->setData( $this->entity->getSecure( 'answer' ) );
      $inputAnswer->setLabel( $i18n->l( 'answer', 'wbfsys.docu_faq.label' ) );

      $inputAnswer->refresh           = $this->refresh;
      $inputAnswer->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Content' ,
        true
      );


  }//end public function input_WbfsysDocuFaq_Answer */

 /**
  * create the ui element for field id_vid_entity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuFaq_IdVidEntity( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdVidEntity = $this->view->newInput( 'inputWbfsysDocuFaqIdVidEntity', 'Hidden' );
      $this->items['wbfsys_docu_faq-id_vid_entity'] = $inputIdVidEntity;
      $inputIdVidEntity->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_docu_faq[id_vid_entity]',
          'id'        => 'wgt-input-wbfsys_docu_faq_id_vid_entity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Entity', 'src' => 'Docu Faq' ) ),
          'maxlength' => $this->entity->maxSize( 'id_vid_entity' ),
        )
      );
      $inputIdVidEntity->setWidth( 'medium' );

      $inputIdVidEntity->setData( $this->entity->getSecure( 'id_vid_entity' ) );
      $inputIdVidEntity->refresh           = $this->refresh;
      $inputIdVidEntity->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysDocuFaq_IdVidEntity */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuFaq_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysDocuFaqRowid' , 'int' );
      $this->items['wbfsys_docu_faq-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_docu_faq[rowid]',
          'id'        => 'wgt-input-wbfsys_docu_faq_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Docu Faq' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_faq', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_docu_faq', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.docu_faq.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysDocuFaq_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuFaq_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysDocuFaqMTimeCreated' , 'Date' );
      $this->items['wbfsys_docu_faq-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_docu_faq[m_time_created]',
          'id'        => 'wgt-input-wbfsys_docu_faq_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Docu Faq' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_faq', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_docu_faq', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.docu_faq.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysDocuFaq_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuFaq_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysDocuFaqMRoleCreate', 'Window' );
      $this->items['wbfsys_docu_faq-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_docu_faq[m_role_create]',
        'id'        => 'wgt-input-wbfsys_docu_faq_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Docu Faq' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_faq', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_docu_faq', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.docu_faq.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_docu_faq_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_docu_faq_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysDocuFaq_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuFaq_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysDocuFaqMTimeChanged' , 'Date' );
      $this->items['wbfsys_docu_faq-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_docu_faq[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_docu_faq_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Docu Faq' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_faq', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_docu_faq', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.docu_faq.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysDocuFaq_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuFaq_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysDocuFaqMRoleChange', 'Window' );
      $this->items['wbfsys_docu_faq-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_docu_faq[m_role_change]',
        'id'        => 'wgt-input-wbfsys_docu_faq_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Docu Faq' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_faq', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_docu_faq', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.docu_faq.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_docu_faq_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_docu_faq_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysDocuFaq_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuFaq_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysDocuFaqMVersion' , 'int' );
      $this->items['wbfsys_docu_faq-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_docu_faq[m_version]',
          'id'        => 'wgt-input-wbfsys_docu_faq_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Docu Faq' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_faq', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_docu_faq', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.docu_faq.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysDocuFaq_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDocuFaq_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysDocuFaqMUuid' , 'Text' );
      $this->items['wbfsys_docu_faq-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_docu_faq[m_uuid]',
          'id'        => 'wgt-input-wbfsys_docu_faq_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Docu Faq' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_docu_faq', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_docu_faq', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.docu_faq.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysDocuFaq_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysDocuFaq_Crud_Show_Form */


