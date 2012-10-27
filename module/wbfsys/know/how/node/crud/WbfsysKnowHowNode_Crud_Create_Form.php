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
class WbfsysKnowHowNode_Crud_Create_Form
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
  public $namespace  = 'WbfsysKnowHowNode';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysKnowHowNode';

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
      'wbfsys_know_how_node' => array
      (
        'access_key' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'title' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'id_repository' => array
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
        'raw_content' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'content' => array
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
   * @var WbfsysKnowHowNode_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysKnowHowNode_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysKnowHowNode_Entity $entity
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
      'wbfsys_know_how_node' => array
      (
        'access_key',
        'title',
        'id_repository',
        'id_lang',
        'raw_content',
        'content',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysKnowHowNode entity
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
    $this->view->addVar( 'entityWbfsysKnowHowNode', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_know_how_node'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_know_how_node[id_wbfsys_know_how_node-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysKnowHowNode_AccessKey( $params );
    $this->input_WbfsysKnowHowNode_Title( $params );
    $this->input_WbfsysKnowHowNode_IdRepository( $params );
    $this->input_WbfsysKnowHowNode_IdLang( $params );
    $this->input_WbfsysKnowHowNode_RawContent( $params );
    $this->input_WbfsysKnowHowNode_Content( $params );
    $this->input_WbfsysKnowHowNode_Rowid( $params );
    $this->input_WbfsysKnowHowNode_MTimeCreated( $params );
    $this->input_WbfsysKnowHowNode_MRoleCreate( $params );
    $this->input_WbfsysKnowHowNode_MTimeChanged( $params );
    $this->input_WbfsysKnowHowNode_MRoleChange( $params );
    $this->input_WbfsysKnowHowNode_MVersion( $params );
    $this->input_WbfsysKnowHowNode_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysKnowHowNode_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysKnowHowNodeAccessKey' , 'Text' );
      $this->items['wbfsys_know_how_node-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_know_how_node[access_key]',
          'id'        => 'wgt-input-wbfsys_know_how_node_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Know How Node' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_know_how_node', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_know_how_node', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.know_how_node.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysKnowHowNode_AccessKey */

 /**
  * create the ui element for field title
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysKnowHowNode_Title( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputTitle = $this->view->newInput( 'inputWbfsysKnowHowNodeTitle' , 'Text' );
      $this->items['wbfsys_know_how_node-title'] = $inputTitle;
      $inputTitle->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_know_how_node[title]',
          'id'        => 'wgt-input-wbfsys_know_how_node_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip xxlarge'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Title', 'src' => 'Know How Node' ) ),
          'maxlength' => $this->entity->maxSize( 'title' ),
        )
      );
      $inputTitle->setWidth( 'xxlarge' );

      $inputTitle->setReadonly( $this->fieldReadOnly( 'wbfsys_know_how_node', 'title' ) );
      $inputTitle->setRequired( $this->fieldRequired( 'wbfsys_know_how_node', 'title' ) );
      $inputTitle->setData( $this->entity->getSecure('title') );
      $inputTitle->setLabel( $i18n->l( 'Title', 'wbfsys.know_how_node.label' ) );

      $inputTitle->refresh           = $this->refresh;
      $inputTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysKnowHowNode_Title */

 /**
  * create the ui element for field id_repository
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysKnowHowNode_IdRepository( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysKnowHowRepository_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysKnowHowRepository not exists' );

      Log::warn( 'Looks like the Entity: WbfsysKnowHowRepository is missing' );

      return;
    }


      //p: Window
      $objidWbfsysKnowHowRepository = $this->entity->getData( 'id_repository' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysKnowHowRepository
          || !$entityWbfsysKnowHowRepository = $this->db->orm->get
          (
            'WbfsysKnowHowRepository',
            $objidWbfsysKnowHowRepository
          )
      )
      {
        $entityWbfsysKnowHowRepository = $this->db->orm->newEntity( 'WbfsysKnowHowRepository' );
      }

      $inputIdRepository = $this->view->newInput( 'inputWbfsysKnowHowNodeIdRepository', 'Window' );
      $this->items['wbfsys_know_how_node-id_repository'] = $inputIdRepository;
      $inputIdRepository->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_know_how_node[id_repository]',
        'id'        => 'wgt-input-wbfsys_know_how_node_id_repository'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Repository', 'src' => 'Know How Node' ) ),
      ));

      if( $this->assignedForm )
        $inputIdRepository->assignedForm = $this->assignedForm;

      $inputIdRepository->setWidth( 'medium' );

      $inputIdRepository->setData( $this->entity->getData( 'id_repository' )  );
      $inputIdRepository->setReadonly( $this->fieldReadOnly( 'wbfsys_know_how_node', 'id_repository' ) );
      $inputIdRepository->setRequired( $this->fieldRequired( 'wbfsys_know_how_node', 'id_repository' ) );
      $inputIdRepository->setLabel( $i18n->l( 'Repository', 'wbfsys.know_how_node.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.KnowHowRepository.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_know_how_node_id_repository'.($this->suffix?'-'.$this->suffix:'');

      $inputIdRepository->setListUrl ( $listUrl );
      $inputIdRepository->setListIcon( 'control/connect.png' );
      $inputIdRepository->setEntityUrl( 'maintab.php?c=Wbfsys.KnowHowRepository.edit' );
      $inputIdRepository->conEntity         = $entityWbfsysKnowHowRepository;
      $inputIdRepository->refresh           = $this->refresh;
      $inputIdRepository->serializeElement  = $this->sendElement;



      $inputIdRepository->view = $this->view;
      $inputIdRepository->buildJavascript( 'wgt-input-wbfsys_know_how_node_id_repository'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdRepository );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysKnowHowNode_IdRepository */

 /**
  * create the ui element for field id_lang
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysKnowHowNode_IdLang( $params )
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

      $inputIdLang = $this->view->newInput( 'inputWbfsysKnowHowNodeIdLang', 'Window' );
      $this->items['wbfsys_know_how_node-id_lang'] = $inputIdLang;
      $inputIdLang->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_know_how_node[id_lang]',
        'id'        => 'wgt-input-wbfsys_know_how_node_id_lang'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Language', 'src' => 'Know How Node' ) ),
      ));

      if( $this->assignedForm )
        $inputIdLang->assignedForm = $this->assignedForm;

      $inputIdLang->setWidth( 'medium' );

      $inputIdLang->setData( $this->entity->getData( 'id_lang' )  );
      $inputIdLang->setReadonly( $this->fieldReadOnly( 'wbfsys_know_how_node', 'id_lang' ) );
      $inputIdLang->setRequired( $this->fieldRequired( 'wbfsys_know_how_node', 'id_lang' ) );
      $inputIdLang->setLabel( $i18n->l( 'Language', 'wbfsys.know_how_node.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Language.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_know_how_node_id_lang'.($this->suffix?'-'.$this->suffix:'');

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
      $inputIdLang->buildJavascript( 'wgt-input-wbfsys_know_how_node_id_lang'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdLang );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysKnowHowNode_IdLang */

 /**
  * create the ui element for field raw_content
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysKnowHowNode_RawContent( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputRawContent = $this->view->newInput( 'inputWbfsysKnowHowNodeRawContent', 'Wysiwyg' );
      $inputRawContent->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_know_how_node[raw_content]',
          'id'    => 'wgt-input-wbfsys_know_how_node_raw_content'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full large-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Raw content', 'src' => 'Know How Node' ) ),
        )
      );
      $inputRawContent->setWidth( 'full' );

      $inputRawContent->mode = 'rich_text';
      $inputRawContent->full = true;

      $inputRawContent->setData( $this->entity->getData( 'raw_content' ) );
      $inputRawContent->setReadonly( $this->fieldReadOnly( 'wbfsys_know_how_node', 'raw_content' ) );
      $inputRawContent->setRequired( $this->fieldRequired( 'wbfsys_know_how_node', 'raw_content' ) );
      $inputRawContent->setLabel( $i18n->l( 'Raw content', 'wbfsys.know_how_node.label' ) );

      $inputRawContent->refresh           = $this->refresh;
      $inputRawContent->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysKnowHowNode_RawContent */

 /**
  * create the ui element for field content
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysKnowHowNode_Content( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputContent = $this->view->newInput( 'inputWbfsysKnowHowNodeContent', 'Hidden' );
      $this->items['wbfsys_know_how_node-content'] = $inputContent;
      $inputContent->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_know_how_node[content]',
          'id'        => 'wgt-input-wbfsys_know_how_node_content'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Content', 'src' => 'Know How Node' ) ),
          'maxlength' => $this->entity->maxSize( 'content' ),
        )
      );
      $inputContent->setWidth( 'medium' );

      $inputContent->setData( $this->entity->getSecure( 'content' ) );
      $inputContent->refresh           = $this->refresh;
      $inputContent->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysKnowHowNode_Content */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysKnowHowNode_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysKnowHowNodeRowid' , 'int' );
      $this->items['wbfsys_know_how_node-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_know_how_node[rowid]',
          'id'        => 'wgt-input-wbfsys_know_how_node_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Know How Node' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_know_how_node', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_know_how_node', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.know_how_node.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysKnowHowNode_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysKnowHowNode_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysKnowHowNodeMTimeCreated' , 'Date' );
      $this->items['wbfsys_know_how_node-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_know_how_node[m_time_created]',
          'id'        => 'wgt-input-wbfsys_know_how_node_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Know How Node' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_know_how_node', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_know_how_node', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.know_how_node.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysKnowHowNode_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysKnowHowNode_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysKnowHowNodeMRoleCreate', 'Window' );
      $this->items['wbfsys_know_how_node-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_know_how_node[m_role_create]',
        'id'        => 'wgt-input-wbfsys_know_how_node_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Know How Node' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_know_how_node', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_know_how_node', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.know_how_node.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_know_how_node_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_know_how_node_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysKnowHowNode_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysKnowHowNode_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysKnowHowNodeMTimeChanged' , 'Date' );
      $this->items['wbfsys_know_how_node-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_know_how_node[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_know_how_node_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Know How Node' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_know_how_node', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_know_how_node', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.know_how_node.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysKnowHowNode_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysKnowHowNode_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysKnowHowNodeMRoleChange', 'Window' );
      $this->items['wbfsys_know_how_node-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_know_how_node[m_role_change]',
        'id'        => 'wgt-input-wbfsys_know_how_node_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Know How Node' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_know_how_node', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_know_how_node', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.know_how_node.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_know_how_node_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_know_how_node_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysKnowHowNode_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysKnowHowNode_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysKnowHowNodeMVersion' , 'int' );
      $this->items['wbfsys_know_how_node-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_know_how_node[m_version]',
          'id'        => 'wgt-input-wbfsys_know_how_node_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Know How Node' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_know_how_node', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_know_how_node', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.know_how_node.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysKnowHowNode_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysKnowHowNode_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysKnowHowNodeMUuid' , 'Text' );
      $this->items['wbfsys_know_how_node-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_know_how_node[m_uuid]',
          'id'        => 'wgt-input-wbfsys_know_how_node_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Know How Node' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_know_how_node', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_know_how_node', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.know_how_node.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysKnowHowNode_MUuid */

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
      $orm->getValidationData( 'WbfsysKnowHowNode', array_keys( $this->fields['wbfsys_know_how_node']), true ),
      $orm->getErrorMessages( 'WbfsysKnowHowNode' ),
      'wbfsys_know_how_node'
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


}//end class WbfsysKnowHowNode_Crud_Create_Form */


