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
class WbfsysIssue_Form
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
  public $keyName     = 'wbfsys_issue';

  /**
   * the cname for the entities, is used to request metadata from the orm
   * @setter WgtForm::setEntityName()
   * @getter WgtForm::getEntityName()
   * @var string 
   */
  public $entityName  = 'WbfsysIssue';

  /**
   * namespace for the actual form
   * @setter WgtForm::setNamespace()
   * @getter WgtForm::getNamespace()
   * @var string 
   */
  public $namespace  = 'WbfsysIssue';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtForm::setPrefix()
   * @getter WgtForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysIssue';

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
   * @var WbfsysIssue_Entity 
   */
  public $entity      = null;
  
////////////////////////////////////////////////////////////////////////////////
// form methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysIssue entity
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
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysIssue' );
      }
    }

  }//end public function createForm */

 /**
  * create a search form for the WbfsysIssue entity
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
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysIssue' );
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
          'title'     => $this->view->i18n->l( 'Insert value for Title (Issue)', 'wbfsys.issue.label' ),
          'maxlength' => $this->entity->maxSize( 'title' ),
        )
      );
      $inputTitle->setWidth( 'xxlarge' );

      $inputTitle->setReadOnly( $this->isReadOnly( 'title' ) );
      $inputTitle->setData( $this->entity->getSecure('title') );
      $inputTitle->setLabel
      (
        $this->view->i18n->l( 'Title', 'wbfsys.issue.label' ),
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
  * create the ui element for field id_type
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_type( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysIssueType_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysIssueType_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysIssueType_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdType = $this->view->newItem( 'input'.$this->prefix.'IdType' , 'WbfsysIssueType_Selectbox' );
      $this->items['id_type'] = $inputIdType;
      $inputIdType->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_type]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_type'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Type (Issue)', 'wbfsys.issue.label' ),
        )
      );
      $inputIdType->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdType->assignedForm = $this->assignedForm;

      $inputIdType->setActive( $this->entity->getData( 'id_type' ) );
      $inputIdType->setReadOnly( $this->isReadOnly( 'id_type' ) );
      $inputIdType->setLabel
      (
        $this->view->i18n->l( 'Type', 'wbfsys.issue.label' ),
        $this->entity->required( 'id_type' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_issue_type:insert' ) )
      {
        $inputIdType->refresh           = $this->refresh;
        $inputIdType->serializeElement  = $this->sendElement;
        $inputIdType->editUrl = 'index.php?c=Wbfsys.IssueType.listing&amp;target='.$this->namespace.'&amp;field=id_type&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_id_type'.$this->suffix;
      }
      // set an empty first entry
      $inputIdType->setFirstFree( 'No Type selected' );


      $queryIdType = $this->db->newQuery( 'WbfsysIssueType_Selectbox' );
      $queryIdType->fetchSelectbox();
      $inputIdType->setData( $queryIdType->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_id_type */

 /**
  * create the ui element for field id_category
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_category( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysCategory_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysCategory_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysCategory_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdCategory = $this->view->newItem( 'input'.$this->prefix.'IdCategory' , 'WbfsysCategory_Selectbox' );
      $this->items['id_category'] = $inputIdCategory;
      $inputIdCategory->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_category]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_category'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Category (Issue)', 'wbfsys.issue.label' ),
        )
      );
      $inputIdCategory->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdCategory->assignedForm = $this->assignedForm;

      $inputIdCategory->setActive( $this->entity->getData( 'id_category' ) );
      $inputIdCategory->setReadOnly( $this->isReadOnly( 'id_category' ) );
      $inputIdCategory->setLabel
      (
        $this->view->i18n->l( 'Category', 'wbfsys.issue.label' ),
        $this->entity->required( 'id_category' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_category:insert' ) )
      {
        $inputIdCategory->refresh           = $this->refresh;
        $inputIdCategory->serializeElement  = $this->sendElement;
        $inputIdCategory->editUrl = 'index.php?c=Wbfsys.Category.listing&amp;target='.$this->namespace.'&amp;field=id_category&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_id_category'.$this->suffix;
      }
      // set an empty first entry
      $inputIdCategory->setFirstFree( 'No category selected' );


      $queryIdCategory = $this->db->newQuery( 'WbfsysCategory_Selectbox' );
      $queryIdCategory->fetchSelectbox();
      $inputIdCategory->setData( $queryIdCategory->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_id_category */

 /**
  * create the ui element for field id_status
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_status( $params )
  {

      //tpl: class ui:progress
      $inputIdStatus = $this->view->newInput( 'input'.$this->prefix.'IdStatus', 'Process' );
      $this->items['id_status'] = $inputIdStatus;
      $inputIdStatus->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_status]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_status'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Process Status (Issue)', 'wbfsys.issue.label' ),
        )
      );
      $inputIdStatus->setWidth( 'medium' );
      $inputIdStatus->setReadOnly( $this->isReadOnly( 'id_status' ) );
      
      $nodeId = $this->entity->getData( 'id_status' );
      
      if( $nodeId )
      {
        $orm    = $this->getOrm();
        
        $nodeEntity  = $orm->get( 'WbfsysProcessNode', $nodeId );
        
        if( $nodeEntity )
        {
          $label       = $nodeEntity->getSecure( 'label' );
          
          if( $nodeEntity->icon )
            $icon      = $this->view->icon( $nodeEntity->icon, $label );
          else 
            $icon       = '';
          
          $inputIdStatus->setNodeLabel( $icon.' Status: '.$label );
        }
        else
        {
          $inputIdStatus->setNodeLabel( 'Invalid Status!' );
        }
        
      }
      else
      {
        $inputIdStatus->setNodeLabel( 'Proccess not yet running' );
      }
      $processSource = 'ajax.php?c=Issue.Handling_Process.dropForm&amp;mask_type=form&amp;objid='.$this->entity;
      
      if( $this->targetMask )
      {
        $processSource .= '&amp;mask='.$this->targetMask;
      }
      
      if( $this->view->id )
      {
        $processSource .= '&amp;view_id='.$this->view->id;
      }
      
      $inputIdStatus->setSource
      ( 
        $processSource
      );
      
      
      $inputIdStatus->setData( $nodeId );
      
      $inputIdStatus->setLabel
      (
        $this->view->i18n->l( 'Process Status', 'wbfsys.issue.label' ),
        $this->entity->required( 'id_status' )
      );

      $inputIdStatus->refresh           = $this->refresh;
      $inputIdStatus->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_status */

 /**
  * create the ui element for field id_severity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_severity( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysIssueSeverity_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysIssueSeverity_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysIssueSeverity_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdSeverity = $this->view->newItem( 'input'.$this->prefix.'IdSeverity' , 'WbfsysIssueSeverity_Selectbox' );
      $this->items['id_severity'] = $inputIdSeverity;
      $inputIdSeverity->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_severity]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_severity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Severity (Issue)', 'wbfsys.issue.label' ),
        )
      );
      $inputIdSeverity->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdSeverity->assignedForm = $this->assignedForm;

      $inputIdSeverity->setActive( $this->entity->getData( 'id_severity' ) );
      $inputIdSeverity->setReadOnly( $this->isReadOnly( 'id_severity' ) );
      $inputIdSeverity->setLabel
      (
        $this->view->i18n->l( 'Severity', 'wbfsys.issue.label' ),
        $this->entity->required( 'id_severity' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_issue_severity:insert' ) )
      {
        $inputIdSeverity->refresh           = $this->refresh;
        $inputIdSeverity->serializeElement  = $this->sendElement;
        $inputIdSeverity->editUrl = 'index.php?c=Wbfsys.IssueSeverity.listing&amp;target='.$this->namespace.'&amp;field=id_severity&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_id_severity'.$this->suffix;
      }
      // set an empty first entry
      $inputIdSeverity->setFirstFree( 'No severity selected' );


      $queryIdSeverity = $this->db->newQuery( 'WbfsysIssueSeverity_Selectbox' );
      $queryIdSeverity->fetchSelectbox();
      $inputIdSeverity->setData( $queryIdSeverity->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_id_severity */

 /**
  * create the ui element for field id_os
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_os( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysOs_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysOs_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysOs_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdOs = $this->view->newItem( 'input'.$this->prefix.'IdOs' , 'WbfsysOs_Selectbox' );
      $this->items['id_os'] = $inputIdOs;
      $inputIdOs->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_os]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_os'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Os (Issue)', 'wbfsys.issue.label' ),
        )
      );
      $inputIdOs->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdOs->assignedForm = $this->assignedForm;

      $inputIdOs->setActive( $this->entity->getData( 'id_os' ) );
      $inputIdOs->setReadOnly( $this->isReadOnly( 'id_os' ) );
      $inputIdOs->setLabel
      (
        $this->view->i18n->l( 'Os', 'wbfsys.issue.label' ),
        $this->entity->required( 'id_os' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdOs->refresh           = $this->refresh;
        $inputIdOs->serializeElement  = $this->sendElement;
        $inputIdOs->editUrl = 'index.php?c=Wbfsys.Os.listing&amp;target='.$this->namespace.'&amp;field=id_os&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_id_os'.$this->suffix;
      }
      // set an empty first entry
      $inputIdOs->setFirstFree( 'No os selected' );


      $queryIdOs = $this->db->newQuery( 'WbfsysOs_Selectbox' );
      $queryIdOs->fetchSelectbox();
      $inputIdOs->setData( $queryIdOs->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_id_os */

 /**
  * create the ui element for field id_priority
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_priority( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysPriority_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysPriority_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysPriority_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdPriority = $this->view->newItem( 'input'.$this->prefix.'IdPriority' , 'WbfsysPriority_Selectbox' );
      $this->items['id_priority'] = $inputIdPriority;
      $inputIdPriority->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_priority]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_priority'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Priority (Issue)', 'wbfsys.issue.label' ),
        )
      );
      $inputIdPriority->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdPriority->assignedForm = $this->assignedForm;

      $inputIdPriority->setActive( $this->entity->getData( 'id_priority' ) );
      $inputIdPriority->setReadOnly( $this->isReadOnly( 'id_priority' ) );
      $inputIdPriority->setLabel
      (
        $this->view->i18n->l( 'Priority', 'wbfsys.issue.label' ),
        $this->entity->required( 'id_priority' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_priority:insert' ) )
      {
        $inputIdPriority->refresh           = $this->refresh;
        $inputIdPriority->serializeElement  = $this->sendElement;
        $inputIdPriority->editUrl = 'index.php?c=Wbfsys.Priority.listing&amp;target='.$this->namespace.'&amp;field=id_priority&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_id_priority'.$this->suffix;
      }
      // set an empty first entry
      $inputIdPriority->setFirstFree( 'No priority selected' );


      $queryIdPriority = $this->db->newQuery( 'WbfsysPriority_Selectbox' );
      $queryIdPriority->fetchSelectbox();
      $inputIdPriority->setData( $queryIdPriority->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_id_priority */

 /**
  * create the ui element for field id_browser
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_browser( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysBrowser_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysBrowser_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysBrowser_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdBrowser = $this->view->newItem( 'input'.$this->prefix.'IdBrowser' , 'WbfsysBrowser_Selectbox' );
      $this->items['id_browser'] = $inputIdBrowser;
      $inputIdBrowser->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_browser]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_browser'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Browser (Issue)', 'wbfsys.issue.label' ),
        )
      );
      $inputIdBrowser->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdBrowser->assignedForm = $this->assignedForm;

      $inputIdBrowser->setActive( $this->entity->getData( 'id_browser' ) );
      $inputIdBrowser->setReadOnly( $this->isReadOnly( 'id_browser' ) );
      $inputIdBrowser->setLabel
      (
        $this->view->i18n->l( 'Browser', 'wbfsys.issue.label' ),
        $this->entity->required( 'id_browser' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdBrowser->refresh           = $this->refresh;
        $inputIdBrowser->serializeElement  = $this->sendElement;
        $inputIdBrowser->editUrl = 'index.php?c=Wbfsys.Browser.listing&amp;target='.$this->namespace.'&amp;field=id_browser&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_id_browser'.$this->suffix;
      }
      // set an empty first entry
      $inputIdBrowser->setFirstFree( 'No browser selected' );


      $queryIdBrowser = $this->db->newQuery( 'WbfsysBrowser_Selectbox' );
      $queryIdBrowser->fetchSelectbox();
      $inputIdBrowser->setData( $queryIdBrowser->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_id_browser */

 /**
  * create the ui element for field id_revision
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_revision( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysRevision_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysRevision not exists' );

      Log::warn('Looks like the Entity: WbfsysRevision is missing');

      return;
    }


      //p: Window
      $objidWbfsysRevision = $this->entity->getData('id_revision') ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysRevision
          || !$entityWbfsysRevision = $this->db->orm->get
          (
            'WbfsysRevision',
            $objidWbfsysRevision
          )
      )
      {
        $entityWbfsysRevision = $this->db->orm->newEntity( 'WbfsysRevision' );
      }

      $inputIdRevision = $this->view->newInput( 'input'.$this->prefix.'IdRevision', 'Window' );
      $inputIdRevision->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_revision]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_revision'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Revision (Issue)', 'wbfsys.issue.label' ),
      ));

      if( $this->assignedForm )
        $inputIdRevision->assignedForm = $this->assignedForm;

      $inputIdRevision->setWidth( 'medium' );

      $inputIdRevision->setData( $this->entity->getData( 'id_revision' )  );
      $inputIdRevision->setReadOnly( $this->isReadOnly( 'id_revision' ) );
      $inputIdRevision->setLabel( $this->view->i18n->l( 'Revision', 'wbfsys.issue.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Revision.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_revision'.($this->suffix?'-'.$this->suffix:'');

      $inputIdRevision->setListUrl ( $listUrl );
      $inputIdRevision->setListIcon( 'control/connect.png' );
      $inputIdRevision->setEntityUrl( 'maintab.php?c=Wbfsys.Revision.edit' );
      $inputIdRevision->conEntity         = $entityWbfsysRevision;
      $inputIdRevision->refresh           = $this->refresh;
      $inputIdRevision->serializeElement  = $this->sendElement;
      


      $inputIdRevision->view = $this->view;
      $inputIdRevision->buildJavascript( 'wgt-input-'.$this->keyName.'_id_revision'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdRevision );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_revision */

 /**
  * create the ui element for field id_finish_revision
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_finish_revision( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysRevision_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysRevision not exists' );

      Log::warn('Looks like the Entity: WbfsysRevision is missing');

      return;
    }


      //p: Window
      $objidWbfsysRevision = $this->entity->getData('id_finish_revision') ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysRevision
          || !$entityWbfsysRevision = $this->db->orm->get
          (
            'WbfsysRevision',
            $objidWbfsysRevision
          )
      )
      {
        $entityWbfsysRevision = $this->db->orm->newEntity( 'WbfsysRevision' );
      }

      $inputIdFinishRevision = $this->view->newInput( 'input'.$this->prefix.'IdFinishRevision', 'Window' );
      $inputIdFinishRevision->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_finish_revision]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_finish_revision'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Finish Revision (Issue)', 'wbfsys.issue.label' ),
      ));

      if( $this->assignedForm )
        $inputIdFinishRevision->assignedForm = $this->assignedForm;

      $inputIdFinishRevision->setWidth( 'medium' );

      $inputIdFinishRevision->setData( $this->entity->getData( 'id_finish_revision' )  );
      $inputIdFinishRevision->setReadOnly( $this->isReadOnly( 'id_finish_revision' ) );
      $inputIdFinishRevision->setLabel( $this->view->i18n->l( 'Finish Revision', 'wbfsys.issue.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Revision.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_finish_revision'.($this->suffix?'-'.$this->suffix:'');

      $inputIdFinishRevision->setListUrl ( $listUrl );
      $inputIdFinishRevision->setListIcon( 'control/connect.png' );
      $inputIdFinishRevision->setEntityUrl( 'maintab.php?c=Wbfsys.Revision.edit' );
      $inputIdFinishRevision->conEntity         = $entityWbfsysRevision;
      $inputIdFinishRevision->refresh           = $this->refresh;
      $inputIdFinishRevision->serializeElement  = $this->sendElement;
      


      $inputIdFinishRevision->view = $this->view;
      $inputIdFinishRevision->buildJavascript( 'wgt-input-'.$this->keyName.'_id_finish_revision'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdFinishRevision );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_finish_revision */

 /**
  * create the ui element for field flag_hidden
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_flag_hidden( $params )
  {

      //tpl: class ui:Checkbox
      $inputFlagHidden = $this->view->newInput( 'input'.$this->prefix.'FlagHidden' , 'Checkbox' );
      $this->items['flag_hidden'] = $inputFlagHidden;
      $inputFlagHidden->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[flag_hidden]',
          'id'        => 'wgt-input-'.$this->keyName.'_flag_hidden'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Hidden (Issue)', 'wbfsys.issue.label' ),
        )
      );
      $inputFlagHidden->setWidth( 'medium' );

      $inputFlagHidden->setReadOnly( $this->isReadOnly( 'flag_hidden' ) );
      $inputFlagHidden->setActive( $this->entity->getBoolean( 'flag_hidden' ) );
      $inputFlagHidden->setLabel
      (
        $this->view->i18n->l( 'Hidden', 'wbfsys.issue.label' ),
        $this->entity->required( 'flag_hidden' )
      );

      $inputFlagHidden->refresh           = $this->refresh;
      $inputFlagHidden->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_flag_hidden */

 /**
  * create the ui element for field finish_till
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_finish_till( $params )
  {

      //tpl: class ui:date
      $inputFinishTill = $this->view->newInput( 'input'.$this->prefix.'FinishTill' , 'Date' );
      $this->items['finish_till'] = $inputFinishTill;
      $inputFinishTill->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[finish_till]',
          'id'        => 'wgt-input-'.$this->keyName.'_finish_till'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Finish Till (Issue)', 'wbfsys.issue.label' ),
          'maxlength' => $this->entity->maxSize( 'finish_till' ),
        )
      );
      $inputFinishTill->setWidth( 'small' );

      $inputFinishTill->setReadOnly( $this->isReadOnly( 'finish_till' ) );
      $inputFinishTill->setData( $this->entity->getDate( 'finish_till' ) );
      $inputFinishTill->setLabel
      (
        $this->view->i18n->l( 'Finish Till', 'wbfsys.issue.label' ),
        $this->entity->required( 'finish_till' )
      );

      $inputFinishTill->refresh           = $this->refresh;
      $inputFinishTill->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_finish_till */

 /**
  * create the ui element for field id_responsible
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_responsible( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysRoleUser_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysRoleUser not exists' );

      Log::warn('Looks like the Entity: WbfsysRoleUser is missing');

      return;
    }


      //p: Window
      $objidWbfsysRoleUser = $this->entity->getData('id_responsible') ;

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

      $inputIdResponsible = $this->view->newInput( 'input'.$this->prefix.'IdResponsible', 'Window' );
      $inputIdResponsible->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_responsible]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_responsible'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Responsible (Issue)', 'wbfsys.issue.label' ),
      ));

      if( $this->assignedForm )
        $inputIdResponsible->assignedForm = $this->assignedForm;

      $inputIdResponsible->setWidth( 'medium' );

      $inputIdResponsible->setData( $this->entity->getData( 'id_responsible' )  );
      $inputIdResponsible->setReadOnly( $this->isReadOnly( 'id_responsible' ) );
      $inputIdResponsible->setLabel( $this->view->i18n->l( 'Responsible', 'wbfsys.issue.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_responsible'.($this->suffix?'-'.$this->suffix:'');

      $inputIdResponsible->setListUrl ( $listUrl );
      $inputIdResponsible->setListIcon( 'control/connect.png' );
      $inputIdResponsible->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.edit' );
      $inputIdResponsible->conEntity         = $entityWbfsysRoleUser;
      $inputIdResponsible->refresh           = $this->refresh;
      $inputIdResponsible->serializeElement  = $this->sendElement;
      

        $inputIdResponsible->setAutocomplete
        (
        '{
          "url":"ajax.php?c=Wbfsys.RoleUser.autocomplete&amp;key=",
          "type":"entity"
          }'
        );
        

      $inputIdResponsible->view = $this->view;
      $inputIdResponsible->buildJavascript( 'wgt-input-'.$this->keyName.'_id_responsible'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdResponsible );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_responsible */

 /**
  * create the ui element for field progress
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_progress( $params )
  {

      //tpl: class ui:progress
      $inputProgress = $this->view->newInput( 'input'.$this->prefix.'Progress' , 'Progress' );
      $this->items['progress'] = $inputProgress;
      $inputProgress->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[progress]',
          'id'        => 'wgt-input-'.$this->keyName.'_progress'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Progress (Issue)', 'wbfsys.issue.label' ),
          'maxlength' => $this->entity->maxSize( 'progress' ),
        )
      );
      $inputProgress->setWidth( 'medium' );

      $inputProgress->setReadOnly( $this->isReadOnly( 'progress' ) );
      $inputProgress->setActive( $this->entity->getSecure('progress') );
      $inputProgress->setLabel
      (
        $this->view->i18n->l( 'Progress', 'wbfsys.issue.label' ),
        $this->entity->required( 'progress' )
      );

      $inputProgress->refresh           = $this->refresh;
      $inputProgress->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_progress */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_vid( $params )
  {

      //tpl: class ui:hidden
      $inputVid = $this->view->newInput( 'input'.$this->prefix.'Vid', 'Hidden' );
      $this->items['vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[vid]',
          'id'        => 'wgt-input-'.$this->keyName.'_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for VID (Issue)', 'wbfsys.issue.label' ),
          'maxlength' => $this->entity->maxSize( 'vid' ),
        )
      );
      $inputVid->setWidth( 'medium' );

      $inputVid->setReadOnly( $this->isReadOnly( 'vid' ) );
      $inputVid->setData( $this->entity->getSecure( 'vid' ) );
      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;


  }//end public function input_vid */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_description( $params )
  {

      //p: textarea
      $inputDescription = $this->view->newInput( 'input'.$this->prefix.'Description', 'Textarea' );
      $this->items['description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => $this->keyName.'[description]',
          'id'    => 'wgt-input-'.$this->keyName.'_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $this->view->i18n->l( 'Insert value for Description (Issue)', 'wbfsys.issue.label' ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setData( $this->entity->getSecure('description') );
      $inputDescription->setReadOnly( $this->isReadOnly( 'description' ) );
      $inputDescription->setLabel
      (
        $this->view->i18n->l( 'Description', 'wbfsys.issue.label' ),
        $this->entity->required( 'description' )
      );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_description */

 /**
  * create the ui element for field error_message
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_error_message( $params )
  {

      //p: textarea
      $inputErrorMessage = $this->view->newInput( 'input'.$this->prefix.'ErrorMessage', 'Textarea' );
      $this->items['error_message'] = $inputErrorMessage;
      $inputErrorMessage->addAttributes
      (
        array
        (
          'name'  => $this->keyName.'[error_message]',
          'id'    => 'wgt-input-'.$this->keyName.'_error_message'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $this->view->i18n->l( 'Insert value for Error message (Issue)', 'wbfsys.issue.label' ),
        )
      );
      $inputErrorMessage->setWidth( 'full' );

      $inputErrorMessage->full = true;
      $inputErrorMessage->setData( $this->entity->getSecure('error_message') );
      $inputErrorMessage->setReadOnly( $this->isReadOnly( 'error_message' ) );
      $inputErrorMessage->setLabel
      (
        $this->view->i18n->l( 'Error message', 'wbfsys.issue.label' ),
        $this->entity->required( 'error_message' )
      );

      $inputErrorMessage->refresh           = $this->refresh;
      $inputErrorMessage->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_error_message */

 /**
  * create the ui element for field id_vid_entity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_vid_entity( $params )
  {

      //tpl: class ui:hidden
      $inputIdVidEntity = $this->view->newInput( 'input'.$this->prefix.'IdVidEntity', 'Hidden' );
      $this->items['id_vid_entity'] = $inputIdVidEntity;
      $inputIdVidEntity->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_vid_entity]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_vid_entity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Entity (Issue)', 'wbfsys.issue.label' ),
          'maxlength' => $this->entity->maxSize( 'id_vid_entity' ),
        )
      );
      $inputIdVidEntity->setWidth( 'medium' );

      $inputIdVidEntity->setReadOnly( $this->isReadOnly( 'id_vid_entity' ) );
      $inputIdVidEntity->setData( $this->entity->getSecure( 'id_vid_entity' ) );
      $inputIdVidEntity->refresh           = $this->refresh;
      $inputIdVidEntity->serializeElement  = $this->sendElement;


  }//end public function input_id_vid_entity */

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
          'title'     => $this->view->i18n->l( 'Insert value for Rowid (Issue)', 'wbfsys.issue.label' ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadOnly( $this->isReadOnly( 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel
      (
        $this->view->i18n->l( 'Rowid', 'wbfsys.issue.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Time Created (Issue)', 'wbfsys.issue.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadOnly( true );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel
      (
        $this->view->i18n->l( 'Time Created', 'wbfsys.issue.label' ),
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
        'title'     => $this->view->i18n->l( 'Insert value for Role Create (Issue)', 'wbfsys.issue.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadOnly( true );
      $inputMRoleCreate->setLabel( $this->view->i18n->l( 'Role Create', 'wbfsys.issue.label' ) );


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
          'title'     => $this->view->i18n->l( 'Insert value for Time Changed (Issue)', 'wbfsys.issue.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadOnly( true );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel
      (
        $this->view->i18n->l( 'Time Changed', 'wbfsys.issue.label' ),
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
        'title'     => $this->view->i18n->l( 'Insert value for Role Change (Issue)', 'wbfsys.issue.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadOnly( true );
      $inputMRoleChange->setLabel( $this->view->i18n->l( 'Role Change', 'wbfsys.issue.label' ) );


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
          'title'     => $this->view->i18n->l( 'Insert value for Version (Issue)', 'wbfsys.issue.label' ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadOnly( true );
      $inputMVersion->setData( $this->entity->getSecure('m_version') );
      $inputMVersion->setLabel
      (
        $this->view->i18n->l( 'Version', 'wbfsys.issue.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Uuid (Issue)', 'wbfsys.issue.label' ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadOnly( true );
      $inputMUuid->setData( $this->entity->getSecure('m_uuid') );
      $inputMUuid->setLabel
      (
        $this->view->i18n->l( 'Uuid', 'wbfsys.issue.label' ),
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
          'title'     => $this->view->i18n->l( 'Search for Title (Issue)', 'wbfsys.issue.label' ),
          'maxlength' => $this->entity->maxSize( 'title' ),
        )
      );
      $inputTitle->setWidth( 'xxlarge' );

      $inputTitle->setReadOnly( $this->isReadOnly( 'title' ) );
      $inputTitle->setData( $this->entity->getSecure('title') );
      $inputTitle->setLabel
      (
        $this->view->i18n->l( 'Title', 'wbfsys.issue.label' ),
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
  * create the search element for field id_type
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_id_type( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysIssueType_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysIssueType_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysIssueType_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdType = $this->view->newItem( 'input'.$this->prefix.'IdType' , 'WbfsysIssueType_Selectbox' );
      $this->items['id_type'] = $inputIdType;
      $inputIdType->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_type][]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_type'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Type (Issue)', 'wbfsys.issue.label' ),
          'multiple'   => 'multiple',
          'size'       => '5',
        )
      );
      $inputIdType->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdType->assignedForm = $this->assignedForm;

      $inputIdType->setActive( $this->entity->getData( 'id_type' ) );
      $inputIdType->setReadOnly( $this->isReadOnly( 'id_type' ) );
      $inputIdType->setLabel
      (
        $this->view->i18n->l( 'Type', 'wbfsys.issue.label' ),
        $this->entity->required( 'id_type' )
      );

      // set an empty first entry
      $inputIdType->setFirstFree( 'No Type selected' );


      $queryIdType = $this->db->newQuery( 'WbfsysIssueType_Selectbox' );
      $queryIdType->fetchSelectbox();
      $inputIdType->setData( $queryIdType->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );




  }//end public function search_id_type */

 /**
  * create the search element for field id_category
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_id_category( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysCategory_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysCategory_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysCategory_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdCategory = $this->view->newItem( 'input'.$this->prefix.'IdCategory' , 'WbfsysCategory_Selectbox' );
      $this->items['id_category'] = $inputIdCategory;
      $inputIdCategory->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_category][]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_category'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Category (Issue)', 'wbfsys.issue.label' ),
          'multiple'   => 'multiple',
          'size'       => '5',
        )
      );
      $inputIdCategory->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdCategory->assignedForm = $this->assignedForm;

      $inputIdCategory->setActive( $this->entity->getData( 'id_category' ) );
      $inputIdCategory->setReadOnly( $this->isReadOnly( 'id_category' ) );
      $inputIdCategory->setLabel
      (
        $this->view->i18n->l( 'Category', 'wbfsys.issue.label' ),
        $this->entity->required( 'id_category' )
      );

      // set an empty first entry
      $inputIdCategory->setFirstFree( 'No category selected' );


      $queryIdCategory = $this->db->newQuery( 'WbfsysCategory_Selectbox' );
      $queryIdCategory->fetchSelectbox();
      $inputIdCategory->setData( $queryIdCategory->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );




  }//end public function search_id_category */

 /**
  * create the search element for field id_severity
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_id_severity( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysIssueSeverity_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysIssueSeverity_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysIssueSeverity_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdSeverity = $this->view->newItem( 'input'.$this->prefix.'IdSeverity' , 'WbfsysIssueSeverity_Selectbox' );
      $this->items['id_severity'] = $inputIdSeverity;
      $inputIdSeverity->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_severity][]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_severity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Severity (Issue)', 'wbfsys.issue.label' ),
          'multiple'   => 'multiple',
          'size'       => '5',
        )
      );
      $inputIdSeverity->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdSeverity->assignedForm = $this->assignedForm;

      $inputIdSeverity->setActive( $this->entity->getData( 'id_severity' ) );
      $inputIdSeverity->setReadOnly( $this->isReadOnly( 'id_severity' ) );
      $inputIdSeverity->setLabel
      (
        $this->view->i18n->l( 'Severity', 'wbfsys.issue.label' ),
        $this->entity->required( 'id_severity' )
      );

      // set an empty first entry
      $inputIdSeverity->setFirstFree( 'No severity selected' );


      $queryIdSeverity = $this->db->newQuery( 'WbfsysIssueSeverity_Selectbox' );
      $queryIdSeverity->fetchSelectbox();
      $inputIdSeverity->setData( $queryIdSeverity->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );




  }//end public function search_id_severity */

 /**
  * create the search element for field id_os
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_id_os( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysOs_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysOs_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysOs_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdOs = $this->view->newItem( 'input'.$this->prefix.'IdOs' , 'WbfsysOs_Selectbox' );
      $this->items['id_os'] = $inputIdOs;
      $inputIdOs->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_os][]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_os'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Os (Issue)', 'wbfsys.issue.label' ),
          'multiple'   => 'multiple',
          'size'       => '5',
        )
      );
      $inputIdOs->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdOs->assignedForm = $this->assignedForm;

      $inputIdOs->setActive( $this->entity->getData( 'id_os' ) );
      $inputIdOs->setReadOnly( $this->isReadOnly( 'id_os' ) );
      $inputIdOs->setLabel
      (
        $this->view->i18n->l( 'Os', 'wbfsys.issue.label' ),
        $this->entity->required( 'id_os' )
      );

      // set an empty first entry
      $inputIdOs->setFirstFree( 'No os selected' );


      $queryIdOs = $this->db->newQuery( 'WbfsysOs_Selectbox' );
      $queryIdOs->fetchSelectbox();
      $inputIdOs->setData( $queryIdOs->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );




  }//end public function search_id_os */

 /**
  * create the search element for field id_priority
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_id_priority( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysPriority_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysPriority_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysPriority_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdPriority = $this->view->newItem( 'input'.$this->prefix.'IdPriority' , 'WbfsysPriority_Selectbox' );
      $this->items['id_priority'] = $inputIdPriority;
      $inputIdPriority->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_priority][]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_priority'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Priority (Issue)', 'wbfsys.issue.label' ),
          'multiple'   => 'multiple',
          'size'       => '5',
        )
      );
      $inputIdPriority->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdPriority->assignedForm = $this->assignedForm;

      $inputIdPriority->setActive( $this->entity->getData( 'id_priority' ) );
      $inputIdPriority->setReadOnly( $this->isReadOnly( 'id_priority' ) );
      $inputIdPriority->setLabel
      (
        $this->view->i18n->l( 'Priority', 'wbfsys.issue.label' ),
        $this->entity->required( 'id_priority' )
      );

      // set an empty first entry
      $inputIdPriority->setFirstFree( 'No priority selected' );


      $queryIdPriority = $this->db->newQuery( 'WbfsysPriority_Selectbox' );
      $queryIdPriority->fetchSelectbox();
      $inputIdPriority->setData( $queryIdPriority->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );




  }//end public function search_id_priority */

 /**
  * create the search element for field id_browser
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_id_browser( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysBrowser_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysBrowser_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysBrowser_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdBrowser = $this->view->newItem( 'input'.$this->prefix.'IdBrowser' , 'WbfsysBrowser_Selectbox' );
      $this->items['id_browser'] = $inputIdBrowser;
      $inputIdBrowser->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_browser][]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_browser'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Browser (Issue)', 'wbfsys.issue.label' ),
          'multiple'   => 'multiple',
          'size'       => '5',
        )
      );
      $inputIdBrowser->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdBrowser->assignedForm = $this->assignedForm;

      $inputIdBrowser->setActive( $this->entity->getData( 'id_browser' ) );
      $inputIdBrowser->setReadOnly( $this->isReadOnly( 'id_browser' ) );
      $inputIdBrowser->setLabel
      (
        $this->view->i18n->l( 'Browser', 'wbfsys.issue.label' ),
        $this->entity->required( 'id_browser' )
      );

      // set an empty first entry
      $inputIdBrowser->setFirstFree( 'No browser selected' );


      $queryIdBrowser = $this->db->newQuery( 'WbfsysBrowser_Selectbox' );
      $queryIdBrowser->fetchSelectbox();
      $inputIdBrowser->setData( $queryIdBrowser->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );




  }//end public function search_id_browser */

 /**
  * create the search element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_description( $params )
  {

      //p: textarea
      $inputDescription = $this->view->newInput( 'input'.$this->prefix.'Description', 'Textarea' );
      $this->items['description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => $this->keyName.'[description]',
          'id'    => 'wgt-input-'.$this->keyName.'_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title' => $this->view->i18n->l( 'Search for Description (Issue)', 'wbfsys.issue.label' ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setData( $this->entity->getSecure('description') );
      $inputDescription->setReadOnly( $this->isReadOnly( 'description' ) );
      $inputDescription->setLabel
      (
        $this->view->i18n->l( 'Description', 'wbfsys.issue.label' ),
        $this->entity->required( 'description' )
      );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Description' ,
        true
      );


  }//end public function search_description */

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

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_issue_m_role_create';

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

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_issue_m_role_change';

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




}//end class WbfsysIssue_Form */


