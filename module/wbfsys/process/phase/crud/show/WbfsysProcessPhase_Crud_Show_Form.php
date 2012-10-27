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
class WbfsysProcessPhase_Crud_Show_Form
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
  public $namespace  = 'WbfsysProcessPhase';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysProcessPhase';

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
      'wbfsys_process_phase' => array
      (
        'label' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'access_key' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'id_process' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'icon' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'revision' => array
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
        'm_order' => array
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
   * @var WbfsysProcessPhase_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysProcessPhase_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysProcessPhase_Entity $entity
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
      'wbfsys_process_phase' => array
      (
        'label',
        'access_key',
        'id_process',
        'icon',
        'revision',
        'description',
        'm_order',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysProcessPhase entity
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
    $this->view->addVar( 'entityWbfsysProcessPhase', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_process_phase'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_process_phase[id_wbfsys_process_phase-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysProcessPhase_Label( $params );
    $this->input_WbfsysProcessPhase_AccessKey( $params );
    $this->input_WbfsysProcessPhase_IdProcess( $params );
    $this->input_WbfsysProcessPhase_Icon( $params );
    $this->input_WbfsysProcessPhase_Revision( $params );
    $this->input_WbfsysProcessPhase_Description( $params );
    $this->input_WbfsysProcessPhase_MOrder( $params );
    $this->input_WbfsysProcessPhase_Rowid( $params );
    $this->input_WbfsysProcessPhase_MTimeCreated( $params );
    $this->input_WbfsysProcessPhase_MRoleCreate( $params );
    $this->input_WbfsysProcessPhase_MTimeChanged( $params );
    $this->input_WbfsysProcessPhase_MRoleChange( $params );
    $this->input_WbfsysProcessPhase_MVersion( $params );
    $this->input_WbfsysProcessPhase_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field label
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessPhase_Label( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputLabel = $this->view->newInput( 'inputWbfsysProcessPhaseLabel' , 'Text' );
      $this->items['wbfsys_process_phase-label'] = $inputLabel;
      $inputLabel->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_phase[label]',
          'id'        => 'wgt-input-wbfsys_process_phase_label'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Label', 'src' => 'Process Phase' ) ),
          'maxlength' => $this->entity->maxSize( 'label' ),
        )
      );
      $inputLabel->setWidth( 'medium' );

      $inputLabel->setReadonly( $this->fieldReadOnly( 'wbfsys_process_phase', 'label' ) );
      $inputLabel->setRequired( $this->fieldRequired( 'wbfsys_process_phase', 'label' ) );
      $inputLabel->setData( $this->entity->getSecure('label') );
      $inputLabel->setLabel( $i18n->l( 'Label', 'wbfsys.process_phase.label' ) );

      $inputLabel->refresh           = $this->refresh;
      $inputLabel->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessPhase_Label */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessPhase_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysProcessPhaseAccessKey' , 'Text' );
      $this->items['wbfsys_process_phase-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_phase[access_key]',
          'id'        => 'wgt-input-wbfsys_process_phase_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Process Phase' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_process_phase', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_process_phase', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.process_phase.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessPhase_AccessKey */

 /**
  * create the ui element for field id_process
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessPhase_IdProcess( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysProcess_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysProcess not exists' );

      Log::warn( 'Looks like the Entity: WbfsysProcess is missing' );

      return;
    }


      //p: Window
      $objidWbfsysProcess = $this->entity->getData( 'id_process' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysProcess
          || !$entityWbfsysProcess = $this->db->orm->get
          (
            'WbfsysProcess',
            $objidWbfsysProcess
          )
      )
      {
        $entityWbfsysProcess = $this->db->orm->newEntity( 'WbfsysProcess' );
      }

      $inputIdProcess = $this->view->newInput( 'inputWbfsysProcessPhaseIdProcess', 'Window' );
      $this->items['wbfsys_process_phase-id_process'] = $inputIdProcess;
      $inputIdProcess->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_phase[id_process]',
        'id'        => 'wgt-input-wbfsys_process_phase_id_process'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Process', 'src' => 'Process Phase' ) ),
      ));

      if( $this->assignedForm )
        $inputIdProcess->assignedForm = $this->assignedForm;

      $inputIdProcess->setWidth( 'medium' );

      $inputIdProcess->setData( $this->entity->getData( 'id_process' )  );
      $inputIdProcess->setReadonly( $this->fieldReadOnly( 'wbfsys_process_phase', 'id_process' ) );
      $inputIdProcess->setRequired( $this->fieldRequired( 'wbfsys_process_phase', 'id_process' ) );
      $inputIdProcess->setLabel( $i18n->l( 'Process', 'wbfsys.process_phase.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Process.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_phase_id_process'.($this->suffix?'-'.$this->suffix:'');

      $inputIdProcess->setListUrl ( $listUrl );
      $inputIdProcess->setListIcon( 'control/connect.png' );
      $inputIdProcess->setEntityUrl( 'maintab.php?c=Wbfsys.Process.edit' );
      $inputIdProcess->conEntity         = $entityWbfsysProcess;
      $inputIdProcess->refresh           = $this->refresh;
      $inputIdProcess->serializeElement  = $this->sendElement;



      $inputIdProcess->view = $this->view;
      $inputIdProcess->buildJavascript( 'wgt-input-wbfsys_process_phase_id_process'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdProcess );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProcessPhase_IdProcess */

 /**
  * create the ui element for field icon
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessPhase_Icon( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputIcon = $this->view->newInput( 'inputWbfsysProcessPhaseIcon' , 'Text' );
      $this->items['wbfsys_process_phase-icon'] = $inputIcon;
      $inputIcon->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_phase[icon]',
          'id'        => 'wgt-input-wbfsys_process_phase_icon'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Icon', 'src' => 'Process Phase' ) ),
          'maxlength' => $this->entity->maxSize( 'icon' ),
        )
      );
      $inputIcon->setWidth( 'medium' );

      $inputIcon->setReadonly( $this->fieldReadOnly( 'wbfsys_process_phase', 'icon' ) );
      $inputIcon->setRequired( $this->fieldRequired( 'wbfsys_process_phase', 'icon' ) );
      $inputIcon->setData( $this->entity->getSecure('icon') );
      $inputIcon->setLabel( $i18n->l( 'Icon', 'wbfsys.process_phase.label' ) );

      $inputIcon->refresh           = $this->refresh;
      $inputIcon->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessPhase_Icon */

 /**
  * create the ui element for field revision
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessPhase_Revision( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputRevision = $this->view->newInput( 'inputWbfsysProcessPhaseRevision', 'Int' );
      $this->items['wbfsys_process_phase-revision'] = $inputRevision;
      $inputRevision->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_phase[revision]',
          'id'        => 'wgt-input-wbfsys_process_phase_revision'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Revision', 'src' => 'Process Phase' ) ),
        )
      );
      $inputRevision->setWidth( 'medium' );

$inputRevision->setReadOnly( $this->fieldReadOnly( 'wbfsys_process_phase', 'revision' ) );
      $inputRevision->setRequired( $this->fieldRequired( 'wbfsys_process_phase', 'revision' ) );
      $inputRevision->setData( $this->entity->getData( 'revision' ) );
      $inputRevision->setLabel( $i18n->l( 'Revision', 'wbfsys.process_phase.label' ) );

      $inputRevision->refresh           = $this->refresh;
      $inputRevision->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessPhase_Revision */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessPhase_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysProcessPhaseDescription', 'Textarea' );
      $this->items['wbfsys_process_phase-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_process_phase[description]',
          'id'    => 'wgt-input-wbfsys_process_phase_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Process Phase' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_process_phase', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_process_phase', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.process_phase.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysProcessPhase_Description */

 /**
  * create the ui element for field m_order
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessPhase_MOrder( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMOrder = $this->view->newInput( 'inputWbfsysProcessPhaseMOrder' , 'int' );
      $this->items['wbfsys_process_phase-m_order'] = $inputMOrder;
      $inputMOrder->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_phase[m_order]',
          'id'        => 'wgt-input-wbfsys_process_phase_m_order'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Order', 'src' => 'Process Phase' ) ),
        )
      );
      $inputMOrder->setWidth( 'medium' );

      $inputMOrder->setReadonly( $this->fieldReadOnly( 'wbfsys_process_phase', 'm_order' ) );
      $inputMOrder->setRequired( $this->fieldRequired( 'wbfsys_process_phase', 'm_order' ) );
      $inputMOrder->setData( $this->entity->getInt( 'm_order' ) );
      $inputMOrder->setLabel( $i18n->l( 'Order', 'wbfsys.process_phase.label' ) );

      $inputMOrder->refresh           = $this->refresh;
      $inputMOrder->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProcessPhase_MOrder */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessPhase_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysProcessPhaseRowid' , 'int' );
      $this->items['wbfsys_process_phase-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_phase[rowid]',
          'id'        => 'wgt-input-wbfsys_process_phase_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Process Phase' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_process_phase', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_process_phase', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.process_phase.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProcessPhase_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessPhase_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysProcessPhaseMTimeCreated' , 'Date' );
      $this->items['wbfsys_process_phase-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_phase[m_time_created]',
          'id'        => 'wgt-input-wbfsys_process_phase_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Process Phase' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_process_phase', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_process_phase', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.process_phase.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysProcessPhase_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessPhase_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysProcessPhaseMRoleCreate', 'Window' );
      $this->items['wbfsys_process_phase-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_phase[m_role_create]',
        'id'        => 'wgt-input-wbfsys_process_phase_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Process Phase' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_process_phase', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_process_phase', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.process_phase.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_phase_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_process_phase_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysProcessPhase_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessPhase_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysProcessPhaseMTimeChanged' , 'Date' );
      $this->items['wbfsys_process_phase-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_phase[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_process_phase_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Process Phase' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_process_phase', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_process_phase', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.process_phase.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysProcessPhase_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessPhase_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysProcessPhaseMRoleChange', 'Window' );
      $this->items['wbfsys_process_phase-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_phase[m_role_change]',
        'id'        => 'wgt-input-wbfsys_process_phase_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Process Phase' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_process_phase', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_process_phase', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.process_phase.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_phase_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_process_phase_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysProcessPhase_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessPhase_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysProcessPhaseMVersion' , 'int' );
      $this->items['wbfsys_process_phase-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_phase[m_version]',
          'id'        => 'wgt-input-wbfsys_process_phase_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Process Phase' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_process_phase', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_process_phase', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.process_phase.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProcessPhase_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessPhase_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysProcessPhaseMUuid' , 'Text' );
      $this->items['wbfsys_process_phase-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_phase[m_uuid]',
          'id'        => 'wgt-input-wbfsys_process_phase_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Process Phase' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_process_phase', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_process_phase', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.process_phase.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProcessPhase_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysProcessPhase_Crud_Show_Form */


