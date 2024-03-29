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
class WbfsysIssue_Crud_Create_Form
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
  public $namespace  = 'WbfsysIssue';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysIssue';

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
      'wbfsys_issue' => array
      (
        'title' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'id_type' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_category' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_status' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_severity' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_os' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_priority' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_browser' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_revision' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_finish_revision' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'flag_hidden' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'finish_till' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_responsible' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'progress' => array
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
        'description' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'error_message' => array
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
   * @var WbfsysIssue_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysIssue_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysIssue_Entity $entity
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
      'wbfsys_issue' => array
      (
        'title',
        'id_type',
        'id_category',
        'id_status',
        'id_severity',
        'id_os',
        'id_priority',
        'id_browser',
        'id_revision',
        'id_finish_revision',
        'flag_hidden',
        'finish_till',
        'id_responsible',
        'progress',
        'vid',
        'description',
        'error_message',
        'id_vid_entity',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysIssue entity
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
    $this->view->addVar( 'entityWbfsysIssue', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_issue'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_issue[id_wbfsys_issue-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysIssue_Title( $params );
    $this->input_WbfsysIssue_IdType( $params );
    $this->input_WbfsysIssue_IdCategory( $params );
    $this->input_WbfsysIssue_IdStatus( $params );
    $this->input_WbfsysIssue_IdSeverity( $params );
    $this->input_WbfsysIssue_IdOs( $params );
    $this->input_WbfsysIssue_IdPriority( $params );
    $this->input_WbfsysIssue_IdBrowser( $params );
    $this->input_WbfsysIssue_IdRevision( $params );
    $this->input_WbfsysIssue_IdFinishRevision( $params );
    $this->input_WbfsysIssue_FlagHidden( $params );
    $this->input_WbfsysIssue_FinishTill( $params );
    $this->input_WbfsysIssue_IdResponsible( $params );
    $this->input_WbfsysIssue_Progress( $params );
    $this->input_WbfsysIssue_Vid( $params );
    $this->input_WbfsysIssue_Description( $params );
    $this->input_WbfsysIssue_ErrorMessage( $params );
    $this->input_WbfsysIssue_IdVidEntity( $params );
    $this->input_WbfsysIssue_Rowid( $params );
    $this->input_WbfsysIssue_MTimeCreated( $params );
    $this->input_WbfsysIssue_MRoleCreate( $params );
    $this->input_WbfsysIssue_MTimeChanged( $params );
    $this->input_WbfsysIssue_MRoleChange( $params );
    $this->input_WbfsysIssue_MVersion( $params );
    $this->input_WbfsysIssue_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field title
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_Title( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputTitle = $this->view->newInput( 'inputWbfsysIssueTitle' , 'Text' );
      $this->items['wbfsys_issue-title'] = $inputTitle;
      $inputTitle->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_issue[title]',
          'id'        => 'wgt-input-wbfsys_issue_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip xxlarge'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Title', 'src' => 'Issue' ) ),
          'maxlength' => $this->entity->maxSize( 'title' ),
        )
      );
      $inputTitle->setWidth( 'xxlarge' );

      $inputTitle->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'title' ) );
      $inputTitle->setRequired( $this->fieldRequired( 'wbfsys_issue', 'title' ) );
      $inputTitle->setData( $this->entity->getSecure('title') );
      $inputTitle->setLabel( $i18n->l( 'Title', 'wbfsys.issue.label' ) );

      $inputTitle->refresh           = $this->refresh;
      $inputTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysIssue_Title */

 /**
  * create the ui element for field id_type
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_IdType( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_issue_id_type'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysIssueType_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysIssueType_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysIssueType_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdType = $this->view->newItem( 'inputWbfsysIssueIdType', 'WbfsysIssueType_Selectbox' );
      $this->items['wbfsys_issue-id_type'] = $inputIdType;
      $inputIdType->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_issue[id_type]',
          'id'        => 'wgt-input-wbfsys_issue_id_type'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Type', 'src' => 'Issue' ) ),
        )
      );
      $inputIdType->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdType->assignedForm = $this->assignedForm;

      $inputIdType->setActive( $this->entity->getData( 'id_type' ) );
      $inputIdType->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'id_type' ) );
      $inputIdType->setRequired( $this->fieldRequired( 'wbfsys_issue', 'id_type' ) );


      $inputIdType->setLabel( $i18n->l( 'Type', 'wbfsys.issue.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_issue_type:insert' ) )
      {
        $inputIdType->refresh           = $this->refresh;
        $inputIdType->serializeElement  = $this->sendElement;
        $inputIdType->editUrl = 'index.php?c=Wbfsys.IssueType.listing&amp;target='.$this->namespace.'&amp;field=id_type&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_issue_id_type'.$this->suffix;
      }
      // set an empty first entry
      $inputIdType->setFirstFree( 'No Type selected' );

      
      $queryIdType = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_issue_id_type'] ) )
      {
      
        $queryIdType = $this->db->newQuery( 'WbfsysIssueType_Selectbox' );

        $queryIdType->fetchSelectbox();
        $inputIdType->setData( $queryIdType->getAll() );
      
      }
      else
      {
        $inputIdType->setData( $this->listElementData['wbfsys_issue_id_type'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdType )
        $queryIdType = $this->db->newQuery( 'WbfsysIssueType_Selectbox' );
      
      $inputIdType->loadActive = function( $activeId ) use ( $queryIdType ){
 
        return $queryIdType->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysIssue_IdType */

 /**
  * create the ui element for field id_category
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_IdCategory( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_issue_id_category'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysCategory_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysCategory_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysCategory_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdCategory = $this->view->newItem( 'inputWbfsysIssueIdCategory', 'WbfsysCategory_Selectbox' );
      $this->items['wbfsys_issue-id_category'] = $inputIdCategory;
      $inputIdCategory->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_issue[id_category]',
          'id'        => 'wgt-input-wbfsys_issue_id_category'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'category', 'src' => 'Issue' ) ),
        )
      );
      $inputIdCategory->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdCategory->assignedForm = $this->assignedForm;

      $inputIdCategory->setActive( $this->entity->getData( 'id_category' ) );
      $inputIdCategory->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'id_category' ) );
      $inputIdCategory->setRequired( $this->fieldRequired( 'wbfsys_issue', 'id_category' ) );


      $inputIdCategory->setLabel( $i18n->l( 'category', 'wbfsys.issue.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_category:insert' ) )
      {
        $inputIdCategory->refresh           = $this->refresh;
        $inputIdCategory->serializeElement  = $this->sendElement;
        $inputIdCategory->editUrl = 'index.php?c=Wbfsys.Category.listing&amp;target='.$this->namespace.'&amp;field=id_category&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_issue_id_category'.$this->suffix;
      }
      // set an empty first entry
      $inputIdCategory->setFirstFree( 'No category selected' );

      
      $queryIdCategory = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_issue_id_category'] ) )
      {
      
        $queryIdCategory = $this->db->newQuery( 'WbfsysCategory_Selectbox' );

        $queryIdCategory->fetchSelectbox();
        $inputIdCategory->setData( $queryIdCategory->getAll() );
      
      }
      else
      {
        $inputIdCategory->setData( $this->listElementData['wbfsys_issue_id_category'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdCategory )
        $queryIdCategory = $this->db->newQuery( 'WbfsysCategory_Selectbox' );
      
      $inputIdCategory->loadActive = function( $activeId ) use ( $queryIdCategory ){
 
        return $queryIdCategory->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysIssue_IdCategory */

 /**
  * create the ui element for field id_status
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_IdStatus( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:progress
      $inputIdStatus = $this->view->newInput( 'inputWbfsysIssueIdStatus', 'Process' );
      $this->items['wbfsys_issue-id_status'] = $inputIdStatus;
      $inputIdStatus->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_issue[id_status]',
          'id'        => 'wgt-input-wbfsys_issue_id_status'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Process Status', 'src' => 'Issue' ) ),
        )
      );
      $inputIdStatus->setWidth( 'medium' );
      $inputIdStatus->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'id_status' ) );
      $inputIdStatus->setRequired( $this->fieldRequired( 'wbfsys_issue', 'id_status' ) );
      
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
      
      $inputIdStatus->setLabel( $i18n->l( 'Process Status', 'wbfsys.issue.label' ) );

      $inputIdStatus->refresh           = $this->refresh;
      $inputIdStatus->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysIssue_IdStatus */

 /**
  * create the ui element for field id_severity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_IdSeverity( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_issue_id_severity'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysIssueSeverity_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysIssueSeverity_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysIssueSeverity_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdSeverity = $this->view->newItem( 'inputWbfsysIssueIdSeverity', 'WbfsysIssueSeverity_Selectbox' );
      $this->items['wbfsys_issue-id_severity'] = $inputIdSeverity;
      $inputIdSeverity->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_issue[id_severity]',
          'id'        => 'wgt-input-wbfsys_issue_id_severity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'severity', 'src' => 'Issue' ) ),
        )
      );
      $inputIdSeverity->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdSeverity->assignedForm = $this->assignedForm;

      $inputIdSeverity->setActive( $this->entity->getData( 'id_severity' ) );
      $inputIdSeverity->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'id_severity' ) );
      $inputIdSeverity->setRequired( $this->fieldRequired( 'wbfsys_issue', 'id_severity' ) );


      $inputIdSeverity->setLabel( $i18n->l( 'severity', 'wbfsys.issue.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_issue_severity:insert' ) )
      {
        $inputIdSeverity->refresh           = $this->refresh;
        $inputIdSeverity->serializeElement  = $this->sendElement;
        $inputIdSeverity->editUrl = 'index.php?c=Wbfsys.IssueSeverity.listing&amp;target='.$this->namespace.'&amp;field=id_severity&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_issue_id_severity'.$this->suffix;
      }
      // set an empty first entry
      $inputIdSeverity->setFirstFree( 'No severity selected' );

      
      $queryIdSeverity = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_issue_id_severity'] ) )
      {
      
        $queryIdSeverity = $this->db->newQuery( 'WbfsysIssueSeverity_Selectbox' );

        $queryIdSeverity->fetchSelectbox();
        $inputIdSeverity->setData( $queryIdSeverity->getAll() );
      
      }
      else
      {
        $inputIdSeverity->setData( $this->listElementData['wbfsys_issue_id_severity'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdSeverity )
        $queryIdSeverity = $this->db->newQuery( 'WbfsysIssueSeverity_Selectbox' );
      
      $inputIdSeverity->loadActive = function( $activeId ) use ( $queryIdSeverity ){
 
        return $queryIdSeverity->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysIssue_IdSeverity */

 /**
  * create the ui element for field id_os
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_IdOs( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_issue_id_os'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysOs_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysOs_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysOs_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdOs = $this->view->newItem( 'inputWbfsysIssueIdOs', 'WbfsysOs_Selectbox' );
      $this->items['wbfsys_issue-id_os'] = $inputIdOs;
      $inputIdOs->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_issue[id_os]',
          'id'        => 'wgt-input-wbfsys_issue_id_os'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'os', 'src' => 'Issue' ) ),
        )
      );
      $inputIdOs->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdOs->assignedForm = $this->assignedForm;

      $inputIdOs->setActive( $this->entity->getData( 'id_os' ) );
      $inputIdOs->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'id_os' ) );
      $inputIdOs->setRequired( $this->fieldRequired( 'wbfsys_issue', 'id_os' ) );


      $inputIdOs->setLabel( $i18n->l( 'os', 'wbfsys.issue.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdOs->refresh           = $this->refresh;
        $inputIdOs->serializeElement  = $this->sendElement;
        $inputIdOs->editUrl = 'index.php?c=Wbfsys.Os.listing&amp;target='.$this->namespace.'&amp;field=id_os&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_issue_id_os'.$this->suffix;
      }
      // set an empty first entry
      $inputIdOs->setFirstFree( 'No os selected' );

      
      $queryIdOs = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_issue_id_os'] ) )
      {
      
        $queryIdOs = $this->db->newQuery( 'WbfsysOs_Selectbox' );

        $queryIdOs->fetchSelectbox();
        $inputIdOs->setData( $queryIdOs->getAll() );
      
      }
      else
      {
        $inputIdOs->setData( $this->listElementData['wbfsys_issue_id_os'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdOs )
        $queryIdOs = $this->db->newQuery( 'WbfsysOs_Selectbox' );
      
      $inputIdOs->loadActive = function( $activeId ) use ( $queryIdOs ){
 
        return $queryIdOs->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysIssue_IdOs */

 /**
  * create the ui element for field id_priority
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_IdPriority( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_issue_id_priority'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysPriority_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysPriority_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysPriority_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdPriority = $this->view->newItem( 'inputWbfsysIssueIdPriority', 'WbfsysPriority_Selectbox' );
      $this->items['wbfsys_issue-id_priority'] = $inputIdPriority;
      $inputIdPriority->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_issue[id_priority]',
          'id'        => 'wgt-input-wbfsys_issue_id_priority'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'priority', 'src' => 'Issue' ) ),
        )
      );
      $inputIdPriority->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdPriority->assignedForm = $this->assignedForm;

      $inputIdPriority->setActive( $this->entity->getData( 'id_priority' ) );
      $inputIdPriority->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'id_priority' ) );
      $inputIdPriority->setRequired( $this->fieldRequired( 'wbfsys_issue', 'id_priority' ) );


      $inputIdPriority->setLabel( $i18n->l( 'priority', 'wbfsys.issue.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_priority:insert' ) )
      {
        $inputIdPriority->refresh           = $this->refresh;
        $inputIdPriority->serializeElement  = $this->sendElement;
        $inputIdPriority->editUrl = 'index.php?c=Wbfsys.Priority.listing&amp;target='.$this->namespace.'&amp;field=id_priority&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_issue_id_priority'.$this->suffix;
      }
      // set an empty first entry
      $inputIdPriority->setFirstFree( 'No priority selected' );

      
      $queryIdPriority = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_issue_id_priority'] ) )
      {
      
        $queryIdPriority = $this->db->newQuery( 'WbfsysPriority_Selectbox' );

        $queryIdPriority->fetchSelectbox();
        $inputIdPriority->setData( $queryIdPriority->getAll() );
      
      }
      else
      {
        $inputIdPriority->setData( $this->listElementData['wbfsys_issue_id_priority'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdPriority )
        $queryIdPriority = $this->db->newQuery( 'WbfsysPriority_Selectbox' );
      
      $inputIdPriority->loadActive = function( $activeId ) use ( $queryIdPriority ){
 
        return $queryIdPriority->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysIssue_IdPriority */

 /**
  * create the ui element for field id_browser
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_IdBrowser( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_issue_id_browser'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysBrowser_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysBrowser_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysBrowser_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdBrowser = $this->view->newItem( 'inputWbfsysIssueIdBrowser', 'WbfsysBrowser_Selectbox' );
      $this->items['wbfsys_issue-id_browser'] = $inputIdBrowser;
      $inputIdBrowser->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_issue[id_browser]',
          'id'        => 'wgt-input-wbfsys_issue_id_browser'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'browser', 'src' => 'Issue' ) ),
        )
      );
      $inputIdBrowser->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdBrowser->assignedForm = $this->assignedForm;

      $inputIdBrowser->setActive( $this->entity->getData( 'id_browser' ) );
      $inputIdBrowser->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'id_browser' ) );
      $inputIdBrowser->setRequired( $this->fieldRequired( 'wbfsys_issue', 'id_browser' ) );


      $inputIdBrowser->setLabel( $i18n->l( 'browser', 'wbfsys.issue.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdBrowser->refresh           = $this->refresh;
        $inputIdBrowser->serializeElement  = $this->sendElement;
        $inputIdBrowser->editUrl = 'index.php?c=Wbfsys.Browser.listing&amp;target='.$this->namespace.'&amp;field=id_browser&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_issue_id_browser'.$this->suffix;
      }
      // set an empty first entry
      $inputIdBrowser->setFirstFree( 'No browser selected' );

      
      $queryIdBrowser = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_issue_id_browser'] ) )
      {
      
        $queryIdBrowser = $this->db->newQuery( 'WbfsysBrowser_Selectbox' );

        $queryIdBrowser->fetchSelectbox();
        $inputIdBrowser->setData( $queryIdBrowser->getAll() );
      
      }
      else
      {
        $inputIdBrowser->setData( $this->listElementData['wbfsys_issue_id_browser'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdBrowser )
        $queryIdBrowser = $this->db->newQuery( 'WbfsysBrowser_Selectbox' );
      
      $inputIdBrowser->loadActive = function( $activeId ) use ( $queryIdBrowser ){
 
        return $queryIdBrowser->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysIssue_IdBrowser */

 /**
  * create the ui element for field id_revision
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_IdRevision( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysRevision_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysRevision not exists' );

      Log::warn( 'Looks like the Entity: WbfsysRevision is missing' );

      return;
    }


      //p: Window
      $objidWbfsysRevision = $this->entity->getData( 'id_revision' ) ;

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

      $inputIdRevision = $this->view->newInput( 'inputWbfsysIssueIdRevision', 'Window' );
      $this->items['wbfsys_issue-id_revision'] = $inputIdRevision;
      $inputIdRevision->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_issue[id_revision]',
        'id'        => 'wgt-input-wbfsys_issue_id_revision'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Revision', 'src' => 'Issue' ) ),
      ));

      if( $this->assignedForm )
        $inputIdRevision->assignedForm = $this->assignedForm;

      $inputIdRevision->setWidth( 'medium' );

      $inputIdRevision->setData( $this->entity->getData( 'id_revision' )  );
      $inputIdRevision->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'id_revision' ) );
      $inputIdRevision->setRequired( $this->fieldRequired( 'wbfsys_issue', 'id_revision' ) );
      $inputIdRevision->setLabel( $i18n->l( 'Revision', 'wbfsys.issue.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Revision.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_issue_id_revision'.($this->suffix?'-'.$this->suffix:'');

      $inputIdRevision->setListUrl ( $listUrl );
      $inputIdRevision->setListIcon( 'control/connect.png' );
      $inputIdRevision->setEntityUrl( 'maintab.php?c=Wbfsys.Revision.edit' );
      $inputIdRevision->conEntity         = $entityWbfsysRevision;
      $inputIdRevision->refresh           = $this->refresh;
      $inputIdRevision->serializeElement  = $this->sendElement;



      $inputIdRevision->view = $this->view;
      $inputIdRevision->buildJavascript( 'wgt-input-wbfsys_issue_id_revision'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdRevision );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysIssue_IdRevision */

 /**
  * create the ui element for field id_finish_revision
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_IdFinishRevision( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysRevision_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysRevision not exists' );

      Log::warn( 'Looks like the Entity: WbfsysRevision is missing' );

      return;
    }


      //p: Window
      $objidWbfsysRevision = $this->entity->getData( 'id_finish_revision' ) ;

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

      $inputIdFinishRevision = $this->view->newInput( 'inputWbfsysIssueIdFinishRevision', 'Window' );
      $this->items['wbfsys_issue-id_finish_revision'] = $inputIdFinishRevision;
      $inputIdFinishRevision->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_issue[id_finish_revision]',
        'id'        => 'wgt-input-wbfsys_issue_id_finish_revision'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Finish Revision', 'src' => 'Issue' ) ),
      ));

      if( $this->assignedForm )
        $inputIdFinishRevision->assignedForm = $this->assignedForm;

      $inputIdFinishRevision->setWidth( 'medium' );

      $inputIdFinishRevision->setData( $this->entity->getData( 'id_finish_revision' )  );
      $inputIdFinishRevision->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'id_finish_revision' ) );
      $inputIdFinishRevision->setRequired( $this->fieldRequired( 'wbfsys_issue', 'id_finish_revision' ) );
      $inputIdFinishRevision->setLabel( $i18n->l( 'Finish Revision', 'wbfsys.issue.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Revision.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_issue_id_finish_revision'.($this->suffix?'-'.$this->suffix:'');

      $inputIdFinishRevision->setListUrl ( $listUrl );
      $inputIdFinishRevision->setListIcon( 'control/connect.png' );
      $inputIdFinishRevision->setEntityUrl( 'maintab.php?c=Wbfsys.Revision.edit' );
      $inputIdFinishRevision->conEntity         = $entityWbfsysRevision;
      $inputIdFinishRevision->refresh           = $this->refresh;
      $inputIdFinishRevision->serializeElement  = $this->sendElement;



      $inputIdFinishRevision->view = $this->view;
      $inputIdFinishRevision->buildJavascript( 'wgt-input-wbfsys_issue_id_finish_revision'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdFinishRevision );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysIssue_IdFinishRevision */

 /**
  * create the ui element for field flag_hidden
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_FlagHidden( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputFlagHidden = $this->view->newInput( 'inputWbfsysIssueFlagHidden', 'Checkbox' );
      $this->items['wbfsys_issue-flag_hidden'] = $inputFlagHidden;
      $inputFlagHidden->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_issue[flag_hidden]',
          'id'        => 'wgt-input-wbfsys_issue_flag_hidden'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Hidden', 'src' => 'Issue' ) ),
        )
      );
      $inputFlagHidden->setWidth( 'medium' );

      $inputFlagHidden->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'flag_hidden' ) );
      $inputFlagHidden->setRequired( $this->fieldRequired( 'wbfsys_issue', 'flag_hidden' ) );
      $inputFlagHidden->setActive( $this->entity->getBoolean( 'flag_hidden' ) );
      $inputFlagHidden->setLabel( $i18n->l( 'Hidden', 'wbfsys.issue.label' ) );

      $inputFlagHidden->refresh           = $this->refresh;
      $inputFlagHidden->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysIssue_FlagHidden */

 /**
  * create the ui element for field finish_till
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_FinishTill( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputFinishTill = $this->view->newInput( 'inputWbfsysIssueFinishTill' , 'Date' );
      $this->items['wbfsys_issue-finish_till'] = $inputFinishTill;
      $inputFinishTill->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_issue[finish_till]',
          'id'        => 'wgt-input-wbfsys_issue_finish_till'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Finish Till', 'src' => 'Issue' ) ),
          'maxlength' => $this->entity->maxSize( 'finish_till' ),
        )
      );
      $inputFinishTill->setWidth( 'small' );

      $inputFinishTill->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'finish_till' ) );
      $inputFinishTill->setRequired( $this->fieldRequired( 'wbfsys_issue', 'finish_till' ) );
      $inputFinishTill->setData( $this->entity->getDate( 'finish_till' ) );
      $inputFinishTill->setLabel( $i18n->l( 'Finish Till', 'wbfsys.issue.label' ) );

      $inputFinishTill->refresh           = $this->refresh;
      $inputFinishTill->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysIssue_FinishTill */

 /**
  * create the ui element for field id_responsible
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_IdResponsible( $params )
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
      $objidWbfsysRoleUser = $this->entity->getData( 'id_responsible' ) ;

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

      $inputIdResponsible = $this->view->newInput( 'inputWbfsysIssueIdResponsible', 'Window' );
      $this->items['wbfsys_issue-id_responsible'] = $inputIdResponsible;
      $inputIdResponsible->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_issue[id_responsible]',
        'id'        => 'wgt-input-wbfsys_issue_id_responsible'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Responsible', 'src' => 'Issue' ) ),
      ));

      if( $this->assignedForm )
        $inputIdResponsible->assignedForm = $this->assignedForm;

      $inputIdResponsible->setWidth( 'medium' );

      $inputIdResponsible->setData( $this->entity->getData( 'id_responsible' )  );
      $inputIdResponsible->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'id_responsible' ) );
      $inputIdResponsible->setRequired( $this->fieldRequired( 'wbfsys_issue', 'id_responsible' ) );
      $inputIdResponsible->setLabel( $i18n->l( 'Responsible', 'wbfsys.issue.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_issue_id_responsible'.($this->suffix?'-'.$this->suffix:'');

      $inputIdResponsible->setListUrl ( $listUrl );
      $inputIdResponsible->setListIcon( 'control/connect.png' );
      $inputIdResponsible->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.edit' );
      $inputIdResponsible->conEntity         = $entityWbfsysRoleUser;
      $inputIdResponsible->refresh           = $this->refresh;
      $inputIdResponsible->serializeElement  = $this->sendElement;


        $inputIdResponsible->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.RoleUser.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdResponsible->view = $this->view;
      $inputIdResponsible->buildJavascript( 'wgt-input-wbfsys_issue_id_responsible'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdResponsible );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysIssue_IdResponsible */

 /**
  * create the ui element for field progress
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_Progress( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:progress
      $inputProgress = $this->view->newInput( 'inputWbfsysIssueProgress' , 'Progress' );
      $this->items['wbfsys_issue-progress'] = $inputProgress;
      $inputProgress->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_issue[progress]',
          'id'        => 'wgt-input-wbfsys_issue_progress'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Progress', 'src' => 'Issue' ) ),
          'maxlength' => $this->entity->maxSize( 'progress' ),
        )
      );
      $inputProgress->setWidth( 'medium' );

      $inputProgress->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'progress' ) );
      $inputProgress->setRequired( $this->fieldRequired( 'wbfsys_issue', 'progress' ) );
      $inputProgress->setActive( $this->entity->getSecure('progress') );
      $inputProgress->setLabel( $i18n->l( 'Progress', 'wbfsys.issue.label' ) );

      $inputProgress->refresh           = $this->refresh;
      $inputProgress->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysIssue_Progress */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_Vid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputVid = $this->view->newInput( 'inputWbfsysIssueVid', 'Hidden' );
      $this->items['wbfsys_issue-vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_issue[vid]',
          'id'        => 'wgt-input-wbfsys_issue_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'VID', 'src' => 'Issue' ) ),
          'maxlength' => $this->entity->maxSize( 'vid' ),
        )
      );
      $inputVid->setWidth( 'medium' );

      $inputVid->setData( $this->entity->getSecure( 'vid' ) );
      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysIssue_Vid */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysIssueDescription', 'Textarea' );
      $this->items['wbfsys_issue-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_issue[description]',
          'id'    => 'wgt-input-wbfsys_issue_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Issue' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_issue', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.issue.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysIssue_Description */

 /**
  * create the ui element for field error_message
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_ErrorMessage( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputErrorMessage = $this->view->newInput( 'inputWbfsysIssueErrorMessage', 'Textarea' );
      $this->items['wbfsys_issue-error_message'] = $inputErrorMessage;
      $inputErrorMessage->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_issue[error_message]',
          'id'    => 'wgt-input-wbfsys_issue_error_message'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'error message', 'src' => 'Issue' ) ),
        )
      );
      $inputErrorMessage->setWidth( 'full' );

      $inputErrorMessage->full = true;
      $inputErrorMessage->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'error_message' ) );
      $inputErrorMessage->setRequired( $this->fieldRequired( 'wbfsys_issue', 'error_message' ) );

      $inputErrorMessage->setData( $this->entity->getSecure( 'error_message' ) );
      $inputErrorMessage->setLabel( $i18n->l( 'error message', 'wbfsys.issue.label' ) );

      $inputErrorMessage->refresh           = $this->refresh;
      $inputErrorMessage->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysIssue_ErrorMessage */

 /**
  * create the ui element for field id_vid_entity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_IdVidEntity( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdVidEntity = $this->view->newInput( 'inputWbfsysIssueIdVidEntity', 'Hidden' );
      $this->items['wbfsys_issue-id_vid_entity'] = $inputIdVidEntity;
      $inputIdVidEntity->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_issue[id_vid_entity]',
          'id'        => 'wgt-input-wbfsys_issue_id_vid_entity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Entity', 'src' => 'Issue' ) ),
          'maxlength' => $this->entity->maxSize( 'id_vid_entity' ),
        )
      );
      $inputIdVidEntity->setWidth( 'medium' );

      $inputIdVidEntity->setData( $this->entity->getSecure( 'id_vid_entity' ) );
      $inputIdVidEntity->refresh           = $this->refresh;
      $inputIdVidEntity->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysIssue_IdVidEntity */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysIssueRowid' , 'int' );
      $this->items['wbfsys_issue-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_issue[rowid]',
          'id'        => 'wgt-input-wbfsys_issue_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Issue' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_issue', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.issue.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysIssue_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysIssueMTimeCreated' , 'Date' );
      $this->items['wbfsys_issue-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_issue[m_time_created]',
          'id'        => 'wgt-input-wbfsys_issue_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Issue' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_issue', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.issue.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysIssue_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysIssueMRoleCreate', 'Window' );
      $this->items['wbfsys_issue-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_issue[m_role_create]',
        'id'        => 'wgt-input-wbfsys_issue_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Issue' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_issue', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.issue.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_issue_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_issue_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysIssue_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysIssueMTimeChanged' , 'Date' );
      $this->items['wbfsys_issue-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_issue[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_issue_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Issue' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_issue', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.issue.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysIssue_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysIssueMRoleChange', 'Window' );
      $this->items['wbfsys_issue-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_issue[m_role_change]',
        'id'        => 'wgt-input-wbfsys_issue_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Issue' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_issue', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.issue.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_issue_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_issue_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysIssue_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysIssueMVersion' , 'int' );
      $this->items['wbfsys_issue-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_issue[m_version]',
          'id'        => 'wgt-input-wbfsys_issue_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Issue' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_issue', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.issue.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysIssue_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysIssue_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysIssueMUuid' , 'Text' );
      $this->items['wbfsys_issue-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_issue[m_uuid]',
          'id'        => 'wgt-input-wbfsys_issue_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Issue' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_issue', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_issue', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.issue.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysIssue_MUuid */

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
      $orm->getValidationData( 'WbfsysIssue', array_keys( $this->fields['wbfsys_issue']), true ),
      $orm->getErrorMessages( 'WbfsysIssue' ),
      'wbfsys_issue'
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


}//end class WbfsysIssue_Crud_Create_Form */


