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
class WbfsysDocuTree_Form
  extends WgtForm
{
////////////////////////////////////////////////////////////////////////////////
// attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * the name of the key for the post data
   * @setter WgtForm::setKeyName()
   * @getter WgtForm::getKeyName()
   * @var string 
   */
  public $keyName     = 'wbfsys_docu_tree';

  /**
   * the cname for the entities, is used to request metadata from the orm
   * @setter WgtForm::setEntityName()
   * @getter WgtForm::getEntityName()
   * @var string 
   */
  public $entityName  = 'WbfsysDocuTree';

  /**
   * namespace for the actual form
   * @setter WgtForm::setNamespace()
   * @getter WgtForm::getNamespace()
   * @var string 
   */
  public $namespace  = 'WbfsysDocuTree';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtForm::setPrefix()
   * @getter WgtForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysDocuTree';

  /**
   * suffixes are used to create multiple instances of forms for diffrent
   * datasets, normaly the suffix is the id of a dataset or "-new" for
   * create forms
   *
   * @setter WgtForm::setSuffix()
   * @getter WgtForm::getSuffix()
   * @var string 
   */
  public $suffix      = null;

  /**
   * Die Datenentity für das Formular
   *
   * @var WbfsysDocuTree_Entity 
   */
  public $entity      = null;
  
////////////////////////////////////////////////////////////////////////////////
// form methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysDocuTree entity
  *
  * @param Entity $entity the entity object
  * @param array $fields list with all elements that shoul be shown in the ui
  * @namedParam TFlag $params named parameters
  * {
  *   string keyName    : the key name for the multidim array name of the inputfields;
  *   string prefix     : prefix for the inputs;
  *   string target     : target for;
  *   boolean readOnly  : set all elements to readonly;
  *   boolean refresh   : refresh the elements in an ajax request ;
  *   boolean sendElement : if true, then the system will send the elements in
  *   ajax requests als serialized html and not only just as value
  * }
  */
  public function createForm( $entity, $fields = array(), $params = null  )
  {

    $params = $this->checkNamedParams( $params );

    if( !$entity )
    {
      Error::addError( 'Entity must not be null!!' );
      Message::addError( 'Some internal error occured, it\'s likely, that some data are missing in the ui' );
      return false;
    }

    $this->entity = $entity;
    $this->rowid  = $entity->getId();

    // add the entity to the view
    $this->view->addVar( 'entity'.$this->prefix, $this->entity );

    $this->db     = $this->getDb();

    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-'.$this->keyName.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => $this->keyName.'[id_'.$this->keyName.'-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    // append search meta data
    $this->input_rowid( $params );

    foreach( $fields as $key )
    {
      $method = 'input_'.$key;

      if( method_exists( $this,  $method ) )
      {
        $this->$method( $params );
      }
      else
      {
        if(DEBUG)
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysDocuTree' );
      }
    }

  }//end public function createForm */

 /**
  * create a search form for the WbfsysDocuTree entity
  *
  * @param Entity $entity
  * @param array $fields
  * @param TFlag $params
  */
  public function createSearchForm(  $entity, $fields = array(), $params = null  )
  {

    $this->entity  = $entity;
    $this->rowid   = $entity->getId();

    $this->db      = $this->getDb();
    $params        = $this->checkNamedParams( $params );

    $this->prefix  .= 'Search';
    $this->keyName = 'search_'.$this->keyName;

    if( !$this->suffix )
    {
      $this->suffix = 'search';
    }

    foreach( $fields as $key )
    {
      $method = 'search_'.$key;
      if( method_exists( $this,  $method ) )
      {
        $this->$method( $params );
      }
      else
      {
        if(DEBUG)
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysDocuTree' );
      }
    }

    // append search meta data
    $this->search_m_role_create( $params );
    $this->search_m_role_change( $params );
    $this->search_m_time_created_before( $params );
    $this->search_m_time_created_after( $params );
    $this->search_m_time_changed_before( $params );
    $this->search_m_time_changed_after( $params );
    $this->search_m_rowid( $params );
    $this->search_m_uuid( $params );

  }//end public function createSearchForm */

////////////////////////////////////////////////////////////////////////////////
// field methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create the ui element for field m_parent
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_parent( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysDocuTree_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysDocuTree not exists' );

      Log::warn('Looks like the Entity: WbfsysDocuTree is missing');

      return;
    }


      //p: Window
      $objidWbfsysDocuTree = $this->entity->getData('m_parent') ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysDocuTree
          || !$entityWbfsysDocuTree = $this->db->orm->get
          (
            'WbfsysDocuTree',
            $objidWbfsysDocuTree
          )
      )
      {
        $entityWbfsysDocuTree = $this->db->orm->newEntity( 'WbfsysDocuTree' );
      }

      $inputMParent = $this->view->newInput( 'input'.$this->prefix.'MParent', 'Window' );
      $inputMParent->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[m_parent]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_parent'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Parent Node (Docu Tree)', 'wbfsys.docu_tree.label' ),
      ));

      if( $this->assignedForm )
        $inputMParent->assignedForm = $this->assignedForm;

      $inputMParent->setWidth( 'medium' );

      $inputMParent->setData( $this->entity->getData( 'm_parent' )  );
      $inputMParent->setReadOnly( $this->isReadOnly( 'm_parent' ) );
      $inputMParent->setLabel( $this->view->i18n->l( 'Parent Node', 'wbfsys.docu_tree.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.DocuTree.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_m_parent'.($this->suffix?'-'.$this->suffix:'');

      $inputMParent->setListUrl ( $listUrl );
      $inputMParent->setListIcon( 'control/connect.png' );
      $inputMParent->setEntityUrl( 'maintab.php?c=Wbfsys.DocuTree.edit' );
      $inputMParent->conEntity         = $entityWbfsysDocuTree;
      $inputMParent->refresh           = $this->refresh;
      $inputMParent->serializeElement  = $this->sendElement;
      


      $inputMParent->view = $this->view;
      $inputMParent->buildJavascript( 'wgt-input-'.$this->keyName.'_m_parent'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMParent );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_m_parent */

 /**
  * create the ui element for field title
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_title( $params )
  {

      //tpl: class ui:text
      $inputTitle = $this->view->newInput( 'input'.$this->prefix.'Title' , 'Text' );
      $this->items['title'] = $inputTitle;
      $inputTitle->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[title]',
          'id'        => 'wgt-input-'.$this->keyName.'_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip xxlarge'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Title (Docu Tree)', 'wbfsys.docu_tree.label' ),
          'maxlength' => $this->entity->maxSize( 'title' ),
        )
      );
      $inputTitle->setWidth( 'xxlarge' );

      $inputTitle->setReadOnly( $this->isReadOnly( 'title' ) );
      $inputTitle->setData( $this->entity->getSecure('title') );
      $inputTitle->setLabel
      (
        $this->view->i18n->l( 'Title', 'wbfsys.docu_tree.label' ),
        $this->entity->required( 'title' )
      );

      $inputTitle->refresh           = $this->refresh;
      $inputTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_title */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_access_key( $params )
  {

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'input'.$this->prefix.'AccessKey' , 'Text' );
      $this->items['access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[access_key]',
          'id'        => 'wgt-input-'.$this->keyName.'_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Access Key (Docu Tree)', 'wbfsys.docu_tree.label' ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadOnly( $this->isReadOnly( 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel
      (
        $this->view->i18n->l( 'Access Key', 'wbfsys.docu_tree.label' ),
        $this->entity->required( 'access_key' )
      );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_access_key */

 /**
  * create the ui element for field template
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_template( $params )
  {

      //tpl: class ui:text
      $inputTemplate = $this->view->newInput( 'input'.$this->prefix.'Template' , 'Text' );
      $this->items['template'] = $inputTemplate;
      $inputTemplate->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[template]',
          'id'        => 'wgt-input-'.$this->keyName.'_template'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Template (Docu Tree)', 'wbfsys.docu_tree.label' ),
          'maxlength' => $this->entity->maxSize( 'template' ),
        )
      );
      $inputTemplate->setWidth( 'medium' );

      $inputTemplate->setReadOnly( $this->isReadOnly( 'template' ) );
      $inputTemplate->setData( $this->entity->getSecure('template') );
      $inputTemplate->setLabel
      (
        $this->view->i18n->l( 'Template', 'wbfsys.docu_tree.label' ),
        $this->entity->required( 'template' )
      );

      $inputTemplate->refresh           = $this->refresh;
      $inputTemplate->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_template */

 /**
  * create the ui element for field id_lang
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_lang( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysLanguage_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysLanguage not exists' );

      Log::warn('Looks like the Entity: WbfsysLanguage is missing');

      return;
    }


      //p: Window
      $objidWbfsysLanguage = $this->entity->getData('id_lang') ;

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

      $inputIdLang = $this->view->newInput( 'input'.$this->prefix.'IdLang', 'Window' );
      $inputIdLang->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_lang]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_lang'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Lang (Docu Tree)', 'wbfsys.docu_tree.label' ),
      ));

      if( $this->assignedForm )
        $inputIdLang->assignedForm = $this->assignedForm;

      $inputIdLang->setWidth( 'medium' );

      $inputIdLang->setData( $this->entity->getData( 'id_lang' )  );
      $inputIdLang->setReadOnly( $this->isReadOnly( 'id_lang' ) );
      $inputIdLang->setLabel( $this->view->i18n->l( 'Lang', 'wbfsys.docu_tree.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Language.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_lang'.($this->suffix?'-'.$this->suffix:'');

      $inputIdLang->setListUrl ( $listUrl );
      $inputIdLang->setListIcon( 'control/connect.png' );
      $inputIdLang->setEntityUrl( 'maintab.php?c=Wbfsys.Language.edit' );
      $inputIdLang->conEntity         = $entityWbfsysLanguage;
      $inputIdLang->refresh           = $this->refresh;
      $inputIdLang->serializeElement  = $this->sendElement;
      

        $inputIdLang->setAutocomplete
        (
        '{
          "url":"ajax.php?c=Wbfsys.Language.autocomplete&amp;key=",
          "type":"entity"
          }'
        );
        

      $inputIdLang->view = $this->view;
      $inputIdLang->buildJavascript( 'wgt-input-'.$this->keyName.'_id_lang'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdLang );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_lang */

 /**
  * create the ui element for field content
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_content( $params )
  {

      //p: textarea
      $inputContent = $this->view->newInput( 'input'.$this->prefix.'Content', 'Wysiwyg' );
      $inputContent->addAttributes
      (
        array
        (
          'name'  => $this->keyName.'[content]',
          'id'    => 'wgt-input-'.$this->keyName.'_content'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full large-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $this->view->i18n->l( 'Insert value for Content (Docu Tree)', 'wbfsys.docu_tree.label' ),
        )
      );
      $inputContent->setWidth('full');

      $inputContent->full = true;
      $inputContent->setData( $this->entity->getData( 'content' ) );
      $inputContent->setReadOnly( $this->isReadOnly( 'content' ) );
      $inputContent->setLabel
      (
        $this->view->i18n->l( 'Content', 'wbfsys.docu_tree.label' ),
        $this->entity->required('content')
      );

      $inputContent->refresh           = $this->refresh;
      $inputContent->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_content */

 /**
  * create the ui element for field short_desc
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_short_desc( $params )
  {

      //p: textarea
      $inputShortDesc = $this->view->newInput( 'input'.$this->prefix.'ShortDesc', 'Textarea' );
      $this->items['short_desc'] = $inputShortDesc;
      $inputShortDesc->addAttributes
      (
        array
        (
          'name'  => $this->keyName.'[short_desc]',
          'id'    => 'wgt-input-'.$this->keyName.'_short_desc'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium large-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $this->view->i18n->l( 'Insert value for Short Description (Docu Tree)', 'wbfsys.docu_tree.label' ),
        )
      );
      $inputShortDesc->setWidth( 'medium' );


      $inputShortDesc->setData( $this->entity->getSecure('short_desc') );
      $inputShortDesc->setReadOnly( $this->isReadOnly( 'short_desc' ) );
      $inputShortDesc->setLabel
      (
        $this->view->i18n->l( 'Short Description', 'wbfsys.docu_tree.label' ),
        $this->entity->required( 'short_desc' )
      );

      $inputShortDesc->refresh           = $this->refresh;
      $inputShortDesc->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_short_desc */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_rowid( $params )
  {

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'input'.$this->prefix.'Rowid' , 'int' );
      $this->items['rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[rowid]',
          'id'        => 'wgt-input-'.$this->keyName.'_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Rowid (Docu Tree)', 'wbfsys.docu_tree.label' ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadOnly( $this->isReadOnly( 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel
      (
        $this->view->i18n->l( 'Rowid', 'wbfsys.docu_tree.label' ),
        $this->entity->required( 'rowid' )
      );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_time_created( $params )
  {

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'input'.$this->prefix.'MTimeCreated' , 'Date' );
      $this->items['m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[m_time_created]',
          'id'        => 'wgt-input-'.$this->keyName.'_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Time Created (Docu Tree)', 'wbfsys.docu_tree.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadOnly( true );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel
      (
        $this->view->i18n->l( 'Time Created', 'wbfsys.docu_tree.label' ),
        $this->entity->required( 'm_time_created' )
      );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_m_time_created */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_role_create( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysRoleUser_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysRoleUser not exists' );

      Log::warn('Looks like the Entity: WbfsysRoleUser is missing');

      return;
    }


      //p: Window
      $objidWbfsysRoleUser = $this->entity->getData('m_role_create') ;

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

      $inputMRoleCreate = $this->view->newInput( 'input'.$this->prefix.'MRoleCreate', 'Window' );
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[m_role_create]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Role Create (Docu Tree)', 'wbfsys.docu_tree.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadOnly( true );
      $inputMRoleCreate->setLabel( $this->view->i18n->l( 'Role Create', 'wbfsys.docu_tree.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_m_role_create'.($this->suffix?'-'.$this->suffix:'');

      $inputMRoleCreate->setListUrl ( $listUrl );
      $inputMRoleCreate->setListIcon( 'control/connect.png' );
      $inputMRoleCreate->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.edit' );
      $inputMRoleCreate->conEntity         = $entityWbfsysRoleUser;
      $inputMRoleCreate->refresh           = $this->refresh;
      $inputMRoleCreate->serializeElement  = $this->sendElement;
      

        $inputMRoleCreate->setAutocomplete
        (
        '{
          "url":"ajax.php?c=Wbfsys.RoleUser.autocomplete&amp;key=",
          "type":"entity"
          }'
        );
        

      $inputMRoleCreate->view = $this->view;
      $inputMRoleCreate->buildJavascript( 'wgt-input-'.$this->keyName.'_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_m_role_create */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_time_changed( $params )
  {

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'input'.$this->prefix.'MTimeChanged' , 'Date' );
      $this->items['m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[m_time_changed]',
          'id'        => 'wgt-input-'.$this->keyName.'_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Time Changed (Docu Tree)', 'wbfsys.docu_tree.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadOnly( true );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel
      (
        $this->view->i18n->l( 'Time Changed', 'wbfsys.docu_tree.label' ),
        $this->entity->required( 'm_time_changed' )
      );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_m_time_changed */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_role_change( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysRoleUser_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysRoleUser not exists' );

      Log::warn('Looks like the Entity: WbfsysRoleUser is missing');

      return;
    }


      //p: Window
      $objidWbfsysRoleUser = $this->entity->getData('m_role_change') ;

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

      $inputMRoleChange = $this->view->newInput( 'input'.$this->prefix.'MRoleChange', 'Window' );
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[m_role_change]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Role Change (Docu Tree)', 'wbfsys.docu_tree.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadOnly( true );
      $inputMRoleChange->setLabel( $this->view->i18n->l( 'Role Change', 'wbfsys.docu_tree.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_m_role_change'.($this->suffix?'-'.$this->suffix:'');

      $inputMRoleChange->setListUrl ( $listUrl );
      $inputMRoleChange->setListIcon( 'control/connect.png' );
      $inputMRoleChange->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.edit' );
      $inputMRoleChange->conEntity         = $entityWbfsysRoleUser;
      $inputMRoleChange->refresh           = $this->refresh;
      $inputMRoleChange->serializeElement  = $this->sendElement;
      

        $inputMRoleChange->setAutocomplete
        (
        '{
          "url":"ajax.php?c=Wbfsys.RoleUser.autocomplete&amp;key=",
          "type":"entity"
          }'
        );
        

      $inputMRoleChange->view = $this->view;
      $inputMRoleChange->buildJavascript( 'wgt-input-'.$this->keyName.'_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_m_role_change */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_version( $params )
  {

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'input'.$this->prefix.'MVersion' , 'int' );
      $this->items['m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[m_version]',
          'id'        => 'wgt-input-'.$this->keyName.'_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Version (Docu Tree)', 'wbfsys.docu_tree.label' ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadOnly( true );
      $inputMVersion->setData( $this->entity->getSecure('m_version') );
      $inputMVersion->setLabel
      (
        $this->view->i18n->l( 'Version', 'wbfsys.docu_tree.label' ),
        $this->entity->required( 'm_version' )
      );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_m_version */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_uuid( $params )
  {

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'input'.$this->prefix.'MUuid' , 'Text' );
      $this->items['m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[m_uuid]',
          'id'        => 'wgt-input-'.$this->keyName.'_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Uuid (Docu Tree)', 'wbfsys.docu_tree.label' ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadOnly( true );
      $inputMUuid->setData( $this->entity->getSecure('m_uuid') );
      $inputMUuid->setLabel
      (
        $this->view->i18n->l( 'Uuid', 'wbfsys.docu_tree.label' ),
        $this->entity->required( 'm_uuid' )
      );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_m_uuid */

////////////////////////////////////////////////////////////////////////////////
// search field methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create the search element for field title
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_title( $params )
  {

      //tpl: class ui:text
      $inputTitle = $this->view->newInput( 'input'.$this->prefix.'Title' , 'Text' );
      $this->items['title'] = $inputTitle;
      $inputTitle->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[title]',
          'id'        => 'wgt-input-'.$this->keyName.'_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip xxlarge wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Title (Docu Tree)', 'wbfsys.docu_tree.label' ),
          'maxlength' => $this->entity->maxSize( 'title' ),
        )
      );
      $inputTitle->setWidth( 'xxlarge' );

      $inputTitle->setReadOnly( $this->isReadOnly( 'title' ) );
      $inputTitle->setData( $this->entity->getSecure('title') );
      $inputTitle->setLabel
      (
        $this->view->i18n->l( 'Title', 'wbfsys.docu_tree.label' ),
        $this->entity->required( 'title' )
      );

      $inputTitle->refresh           = $this->refresh;
      $inputTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );


  }//end public function search_title */

 /**
  * create the search element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_access_key( $params )
  {

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'input'.$this->prefix.'AccessKey' , 'Text' );
      $this->items['access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[access_key]',
          'id'        => 'wgt-input-'.$this->keyName.'_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_cname medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Access Key (Docu Tree)', 'wbfsys.docu_tree.label' ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadOnly( $this->isReadOnly( 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel
      (
        $this->view->i18n->l( 'Access Key', 'wbfsys.docu_tree.label' ),
        $this->entity->required( 'access_key' )
      );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );


  }//end public function search_access_key */

 /**
  * create the search element for field template
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_template( $params )
  {

      //tpl: class ui:text
      $inputTemplate = $this->view->newInput( 'input'.$this->prefix.'Template' , 'Text' );
      $this->items['template'] = $inputTemplate;
      $inputTemplate->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[template]',
          'id'        => 'wgt-input-'.$this->keyName.'_template'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_cname medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Template (Docu Tree)', 'wbfsys.docu_tree.label' ),
          'maxlength' => $this->entity->maxSize( 'template' ),
        )
      );
      $inputTemplate->setWidth( 'medium' );

      $inputTemplate->setReadOnly( $this->isReadOnly( 'template' ) );
      $inputTemplate->setData( $this->entity->getSecure('template') );
      $inputTemplate->setLabel
      (
        $this->view->i18n->l( 'Template', 'wbfsys.docu_tree.label' ),
        $this->entity->required( 'template' )
      );

      $inputTemplate->refresh           = $this->refresh;
      $inputTemplate->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );


  }//end public function search_template */

 /**
  * create the search element for field content
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_content( $params )
  {

      //tpl: Wysiwyg search class ui:text
      $inputContent = $this->view->newInput( 'input'.$this->prefix.'Content' , 'Text' );
      $this->items['content'] = $inputContent;
      $inputContent->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[content]',
          'id'        => 'wgt-input-'.$this->keyName.'_content'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full large-height wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Content (Docu Tree)', 'wbfsys.docu_tree.label' ),
        )
      );
      $inputContent->setWidth( 'full' );

      $inputContent->setReadOnly( $this->isReadOnly( 'content' ) );
      $inputContent->setData( $this->entity->getSecure( 'content') );
      $inputContent->setLabel
      (
        $this->view->i18n->l( 'Content', 'wbfsys.docu_tree.label' ),
        $this->entity->required( 'content' )
      );

      $inputContent->refresh           = $this->refresh;
      $inputContent->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );

  }//end public function search_content */

 /**
  * create the search element for field short_desc
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_short_desc( $params )
  {

      //p: textarea
      $inputShortDesc = $this->view->newInput( 'input'.$this->prefix.'ShortDesc', 'Textarea' );
      $this->items['short_desc'] = $inputShortDesc;
      $inputShortDesc->addAttributes
      (
        array
        (
          'name'  => $this->keyName.'[short_desc]',
          'id'    => 'wgt-input-'.$this->keyName.'_short_desc'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium large-height wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title' => $this->view->i18n->l( 'Search for Short Description (Docu Tree)', 'wbfsys.docu_tree.label' ),
        )
      );
      $inputShortDesc->setWidth( 'medium' );


      $inputShortDesc->setData( $this->entity->getSecure('short_desc') );
      $inputShortDesc->setReadOnly( $this->isReadOnly( 'short_desc' ) );
      $inputShortDesc->setLabel
      (
        $this->view->i18n->l( 'Short Description', 'wbfsys.docu_tree.label' ),
        $this->entity->required( 'short_desc' )
      );

      $inputShortDesc->refresh           = $this->refresh;
      $inputShortDesc->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );


  }//end public function search_short_desc */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_role_create( $params )
  {
    //tpl: special

    if( !Webfrap::classLoadable('WbfsysRoleUser_Entity') )
    {
      if(DEBUG)
        Debug::console('Class WbfsysRoleUser_Entity not exists');

      Log::warn('Looks like the Entity: WbfsysRoleUser_Entity is missing');

      return;
    }

    $entityWbfsysRoleUser = $this->db->orm->newEntity('WbfsysRoleUser');

    $inputRole = $this->view->newInput( 'input'.$this->prefix.'MRoleCreate', 'Window' );
    $inputRole->addAttributes
    (
      array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[m_role_create]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_role_create'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search medium wgt-no-save '.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('Creator','wbf.label'),
      )
    );
    $inputRole->setWidth('medium');
    $inputRole->setReadOnly( $this->readOnly );
    $inputRole->setLabel
    (
      $this->view->i18n->l('Creator','wbf.label')
    );

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_docu_tree_m_role_create';

    $inputRole->setListUrl( $listUrl );
    $inputRole->setListIcon( 'control/connect.png' );
    $inputRole->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.show' );
    $inputRole->conEntity         = $entityWbfsysRoleUser;
    $inputRole->refresh           = $this->refresh;
    $inputRole->serializeElement  = $this->sendElement;

    $inputRole->view = $this->view;
    $inputRole->buildJavascript( 'wgt-input-'.$this->keyName.'_m_role_create' );
    $this->view->addJsCode( $inputRole );

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_role_create */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_role_change( $params )
  {
    //tpl: special

    if( !Webfrap::classLoadable( 'WbfsysRoleUser_Entity' ) )
    {
      if(DEBUG)
        Debug::console('Class WbfsysRoleUser_Entity not exists');

      Log::warn('Looks like the Entity: WbfsysRoleUser_Entity is missing');

      return;
    }

    $entityWbfsysRoleUser = $this->db->orm->newEntity('WbfsysRoleUser');

    $inputRole = $this->view->newInput( 'input'.$this->prefix.'MRoleChange', 'Window' );
    $inputRole->addAttributes
    (
      array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[m_role_change]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_role_change'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search medium wgt-no-save '.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('Last Editor','wbf.label'),
      )
    );
    $inputRole->setWidth('medium');
    $inputRole->setReadOnly( $this->readOnly );
    $inputRole->setLabel
    (
      $this->view->i18n->l('Last Editor','wbf.label')
    );

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_docu_tree_m_role_change';

    $inputRole->setListUrl( $listUrl );
    $inputRole->setListIcon( 'control/connect.png' );
    $inputRole->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.show' );
    $inputRole->conEntity         = $entityWbfsysRoleUser;
    $inputRole->refresh           = $this->refresh;
    $inputRole->serializeElement  = $this->sendElement;

    $inputRole->view = $this->view;
    $inputRole->buildJavascript( 'wgt-input-'.$this->keyName.'_m_role_change' );
    $this->view->addJsCode( $inputRole );

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_role_change */


 /**
  *
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_time_created_before( $params )
  {

    //tpl: special
    $inputDate = $this->view->newInput( 'input'.$this->prefix.'MTimeCreatedBefore' , 'Date' );
    $inputDate->addAttributes
    (
      array
      (
        'name'      => $this->keyName.'[m_time_created_before]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_time_created_before'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search small wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('Changed Before','wbf.label'),
      )
    );
    $inputDate->setWidth('small');

    $inputDate->setReadOnly( $this->readOnly );
    $inputDate->setLabel
    (
      $this->view->i18n->l('Created Before','wbf.label')
    );
    $inputDate->refresh           = $this->refresh;
    $inputDate->serializeElement  = $this->sendElement;

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_time_created_before */

 /**
  *
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_time_created_after( $params )
  {

    //tpl: special
    $inputDate = $this->view->newInput( 'input'.$this->prefix.'MTimeCreatedAfter' , 'Date' );
    $inputDate->addAttributes
    (
      array
      (
        'name'      => $this->keyName.'[m_time_created_after]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_time_created_after'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search small wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('Created After','wbf.label'),
      )
    );
    $inputDate->setWidth('small');

    $inputDate->setReadOnly( $this->readOnly );
    $inputDate->setLabel
    (
      $this->view->i18n->l('Created After','wbf.label')
    );
    $inputDate->refresh           = $this->refresh;
    $inputDate->serializeElement  = $this->sendElement;

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_time_created_after */

 /**
  *
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_time_changed_before( $params )
  {

    //tpl: special
    $inputDate = $this->view->newInput( 'input'.$this->prefix.'MTimeChangedBefore' , 'Date' );
    $inputDate->addAttributes
    (
      array
      (
        'name'      => $this->keyName.'[m_time_changed_before]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_time_changed_before'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search small wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('Changed Before','wbf.label'),
      )
    );
    $inputDate->setWidth('small');

    $inputDate->setReadOnly( $this->readOnly );
    $inputDate->setLabel
    (
      $this->view->i18n->l('Changed Before','wbf.label')
    );
    $inputDate->refresh           = $this->refresh;
    $inputDate->serializeElement  = $this->sendElement;

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_time_changed_before */

 /**
  *
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_time_changed_after( $params )
  {

    //tpl: special
    $inputDate = $this->view->newInput( 'input'.$this->prefix.'MTimeChangedAfter' , 'Date' );
    $inputDate->addAttributes
    (
      array
      (
        'name'      => $this->keyName.'[m_time_changed_after]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_time_changed_after'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search small wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('Changed After','wbf.label'),
      )
    );
    $inputDate->setWidth('small');

    $inputDate->setReadOnly( $this->readOnly );
    $inputDate->setLabel
    (
      $this->view->i18n->l('Changed After','wbf.label')
    );
    $inputDate->refresh           = $this->refresh;
    $inputDate->serializeElement  = $this->sendElement;

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_time_changed_after */


 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_rowid( $params )
  {

    //tpl: special
    $inputRowid = $this->view->newInput( 'input'.$this->prefix.'MRowid' , 'Int' );
    $inputRowid->addAttributes
    (
      array
      (
        'name'      => $this->keyName.'[rowid]',
        'id'        => 'wgt-input-'.$this->keyName.'_rowid'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'valid_required medium wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('IDI','wbf.label'),
      )
    );
    $inputRowid->setWidth('medium');

    $inputRowid->setReadOnly( $this->readOnly );
    $inputRowid->setLabel
    (
      $this->view->i18n->l('IDI','wbf.label')
    );
    $inputRowid->refresh           = $this->refresh;
    $inputRowid->serializeElement  = $this->sendElement;

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_rowid */

 /**
  * create the search element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_uuid( $params )
  {

    //tpl: special
    $input = $this->view->newInput( 'input'.$this->prefix.'MUuid' , 'Text' );
    $input->addAttributes
    (
      array
      (
        'name'      => $this->keyName.'[m_uuid]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_uuid'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search medium wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('UUID','wbf.label'),
      )
    );
    $input->setWidth('medium');

    $input->setReadOnly( $this->readOnly );
    $input->setLabel
    (
      $this->view->i18n->l('UUID','wbf.label')
    );
    $input->refresh           = $this->refresh;
    $input->serializeElement  = $this->sendElement;

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );


  }//end public function search_m_uuid */




}//end class WbfsysDocuTree_Form */


