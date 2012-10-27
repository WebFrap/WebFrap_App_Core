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
class WbfsysProcessNode_Crud_Edit_Form
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
  public $namespace  = 'WbfsysProcessNode';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysProcessNode';

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
      'wbfsys_process_node' => array
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
        'phase_key' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'is_start_node' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'is_end_node' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_process' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_phase' => array
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
        'bg_color' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '8',
        ),
        'text_color' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '8',
        ),
        'border_color' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '8',
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
   * @var WbfsysProcessNode_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysProcessNode_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysProcessNode_Entity $entity
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
      'wbfsys_process_node' => array
      (
        'label',
        'access_key',
        'phase_key',
        'is_start_node',
        'is_end_node',
        'id_process',
        'id_phase',
        'description',
        'bg_color',
        'text_color',
        'border_color',
        'icon',
        'revision',
        'm_order',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysProcessNode entity
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
    $this->view->addVar( 'entityWbfsysProcessNode', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_process_node'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_process_node[id_wbfsys_process_node-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysProcessNode_Label( $params );
    $this->input_WbfsysProcessNode_AccessKey( $params );
    $this->input_WbfsysProcessNode_PhaseKey( $params );
    $this->input_WbfsysProcessNode_IsStartNode( $params );
    $this->input_WbfsysProcessNode_IsEndNode( $params );
    $this->input_WbfsysProcessNode_IdProcess( $params );
    $this->input_WbfsysProcessNode_IdPhase( $params );
    $this->input_WbfsysProcessNode_Description( $params );
    $this->input_WbfsysProcessNode_BgColor( $params );
    $this->input_WbfsysProcessNode_TextColor( $params );
    $this->input_WbfsysProcessNode_BorderColor( $params );
    $this->input_WbfsysProcessNode_Icon( $params );
    $this->input_WbfsysProcessNode_Revision( $params );
    $this->input_WbfsysProcessNode_MOrder( $params );
    $this->input_WbfsysProcessNode_Rowid( $params );
    $this->input_WbfsysProcessNode_MTimeCreated( $params );
    $this->input_WbfsysProcessNode_MRoleCreate( $params );
    $this->input_WbfsysProcessNode_MTimeChanged( $params );
    $this->input_WbfsysProcessNode_MRoleChange( $params );
    $this->input_WbfsysProcessNode_MVersion( $params );
    $this->input_WbfsysProcessNode_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field label
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_Label( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputLabel = $this->view->newInput( 'inputWbfsysProcessNodeLabel' , 'Text' );
      $this->items['wbfsys_process_node-label'] = $inputLabel;
      $inputLabel->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_node[label]',
          'id'        => 'wgt-input-wbfsys_process_node_label'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Label', 'src' => 'Process Node' ) ),
          'maxlength' => $this->entity->maxSize( 'label' ),
        )
      );
      $inputLabel->setWidth( 'medium' );

      $inputLabel->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'label' ) );
      $inputLabel->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'label' ) );
      $inputLabel->setData( $this->entity->getSecure('label') );
      $inputLabel->setLabel( $i18n->l( 'Label', 'wbfsys.process_node.label' ) );

      $inputLabel->refresh           = $this->refresh;
      $inputLabel->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessNode_Label */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysProcessNodeAccessKey' , 'Text' );
      $this->items['wbfsys_process_node-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_node[access_key]',
          'id'        => 'wgt-input-wbfsys_process_node_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Process Node' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.process_node.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessNode_AccessKey */

 /**
  * create the ui element for field phase_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_PhaseKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputPhaseKey = $this->view->newInput( 'inputWbfsysProcessNodePhaseKey' , 'Text' );
      $this->items['wbfsys_process_node-phase_key'] = $inputPhaseKey;
      $inputPhaseKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_node[phase_key]',
          'id'        => 'wgt-input-wbfsys_process_node_phase_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Phase key', 'src' => 'Process Node' ) ),
          'maxlength' => $this->entity->maxSize( 'phase_key' ),
        )
      );
      $inputPhaseKey->setWidth( 'medium' );

      $inputPhaseKey->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'phase_key' ) );
      $inputPhaseKey->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'phase_key' ) );
      $inputPhaseKey->setData( $this->entity->getSecure('phase_key') );
      $inputPhaseKey->setLabel( $i18n->l( 'Phase key', 'wbfsys.process_node.label' ) );

      $inputPhaseKey->refresh           = $this->refresh;
      $inputPhaseKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessNode_PhaseKey */

 /**
  * create the ui element for field is_start_node
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_IsStartNode( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputIsStartNode = $this->view->newInput( 'inputWbfsysProcessNodeIsStartNode', 'Checkbox' );
      $this->items['wbfsys_process_node-is_start_node'] = $inputIsStartNode;
      $inputIsStartNode->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_node[is_start_node]',
          'id'        => 'wgt-input-wbfsys_process_node_is_start_node'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Is Start Node', 'src' => 'Process Node' ) ),
        )
      );
      $inputIsStartNode->setWidth( 'medium' );

      $inputIsStartNode->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'is_start_node' ) );
      $inputIsStartNode->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'is_start_node' ) );
      $inputIsStartNode->setActive( $this->entity->getBoolean( 'is_start_node' ) );
      $inputIsStartNode->setLabel( $i18n->l( 'Is Start Node', 'wbfsys.process_node.label' ) );

      $inputIsStartNode->refresh           = $this->refresh;
      $inputIsStartNode->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessNode_IsStartNode */

 /**
  * create the ui element for field is_end_node
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_IsEndNode( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputIsEndNode = $this->view->newInput( 'inputWbfsysProcessNodeIsEndNode', 'Checkbox' );
      $this->items['wbfsys_process_node-is_end_node'] = $inputIsEndNode;
      $inputIsEndNode->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_node[is_end_node]',
          'id'        => 'wgt-input-wbfsys_process_node_is_end_node'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Is End Node', 'src' => 'Process Node' ) ),
        )
      );
      $inputIsEndNode->setWidth( 'medium' );

      $inputIsEndNode->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'is_end_node' ) );
      $inputIsEndNode->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'is_end_node' ) );
      $inputIsEndNode->setActive( $this->entity->getBoolean( 'is_end_node' ) );
      $inputIsEndNode->setLabel( $i18n->l( 'Is End Node', 'wbfsys.process_node.label' ) );

      $inputIsEndNode->refresh           = $this->refresh;
      $inputIsEndNode->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessNode_IsEndNode */

 /**
  * create the ui element for field id_process
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_IdProcess( $params )
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

      $inputIdProcess = $this->view->newInput( 'inputWbfsysProcessNodeIdProcess', 'Window' );
      $this->items['wbfsys_process_node-id_process'] = $inputIdProcess;
      $inputIdProcess->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_node[id_process]',
        'id'        => 'wgt-input-wbfsys_process_node_id_process'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Process', 'src' => 'Process Node' ) ),
      ));

      if( $this->assignedForm )
        $inputIdProcess->assignedForm = $this->assignedForm;

      $inputIdProcess->setWidth( 'medium' );

      $inputIdProcess->setData( $this->entity->getData( 'id_process' )  );
      $inputIdProcess->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'id_process' ) );
      $inputIdProcess->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'id_process' ) );
      $inputIdProcess->setLabel( $i18n->l( 'Process', 'wbfsys.process_node.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Process.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_node_id_process'.($this->suffix?'-'.$this->suffix:'');

      $inputIdProcess->setListUrl ( $listUrl );
      $inputIdProcess->setListIcon( 'control/connect.png' );
      $inputIdProcess->setEntityUrl( 'maintab.php?c=Wbfsys.Process.edit' );
      $inputIdProcess->conEntity         = $entityWbfsysProcess;
      $inputIdProcess->refresh           = $this->refresh;
      $inputIdProcess->serializeElement  = $this->sendElement;



      $inputIdProcess->view = $this->view;
      $inputIdProcess->buildJavascript( 'wgt-input-wbfsys_process_node_id_process'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdProcess );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProcessNode_IdProcess */

 /**
  * create the ui element for field id_phase
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_IdPhase( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysProcessPhase_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysProcessPhase not exists' );

      Log::warn( 'Looks like the Entity: WbfsysProcessPhase is missing' );

      return;
    }


      //p: Window
      $objidWbfsysProcessPhase = $this->entity->getData( 'id_phase' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysProcessPhase
          || !$entityWbfsysProcessPhase = $this->db->orm->get
          (
            'WbfsysProcessPhase',
            $objidWbfsysProcessPhase
          )
      )
      {
        $entityWbfsysProcessPhase = $this->db->orm->newEntity( 'WbfsysProcessPhase' );
      }

      $inputIdPhase = $this->view->newInput( 'inputWbfsysProcessNodeIdPhase', 'Window' );
      $this->items['wbfsys_process_node-id_phase'] = $inputIdPhase;
      $inputIdPhase->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_node[id_phase]',
        'id'        => 'wgt-input-wbfsys_process_node_id_phase'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Phase', 'src' => 'Process Node' ) ),
      ));

      if( $this->assignedForm )
        $inputIdPhase->assignedForm = $this->assignedForm;

      $inputIdPhase->setWidth( 'medium' );

      $inputIdPhase->setData( $this->entity->getData( 'id_phase' )  );
      $inputIdPhase->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'id_phase' ) );
      $inputIdPhase->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'id_phase' ) );
      $inputIdPhase->setLabel( $i18n->l( 'Phase', 'wbfsys.process_node.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ProcessPhase.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_node_id_phase'.($this->suffix?'-'.$this->suffix:'');

      $inputIdPhase->setListUrl ( $listUrl );
      $inputIdPhase->setListIcon( 'control/connect.png' );
      $inputIdPhase->setEntityUrl( 'maintab.php?c=Wbfsys.ProcessPhase.edit' );
      $inputIdPhase->conEntity         = $entityWbfsysProcessPhase;
      $inputIdPhase->refresh           = $this->refresh;
      $inputIdPhase->serializeElement  = $this->sendElement;



      $inputIdPhase->view = $this->view;
      $inputIdPhase->buildJavascript( 'wgt-input-wbfsys_process_node_id_phase'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdPhase );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProcessNode_IdPhase */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysProcessNodeDescription', 'Textarea' );
      $this->items['wbfsys_process_node-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_process_node[description]',
          'id'    => 'wgt-input-wbfsys_process_node_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Process Node' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.process_node.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysProcessNode_Description */

 /**
  * create the ui element for field bg_color
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_BgColor( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputBgColor = $this->view->newInput( 'inputWbfsysProcessNodeBgColor' , 'Colorpicker' );
      $this->items['wbfsys_process_node-bg_color'] = $inputBgColor;
      $inputBgColor->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_node[bg_color]',
          'id'        => 'wgt-input-wbfsys_process_node_bg_color'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Bg color', 'src' => 'Process Node' ) ),
          'maxlength' => $this->entity->maxSize( 'bg_color' ),
        )
      );
      $inputBgColor->setWidth( 'medium' );

      $inputBgColor->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'bg_color' ) );
      $inputBgColor->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'bg_color' ) );
      $inputBgColor->setData( $this->entity->getSecure( 'bg_color' ) );
      $inputBgColor->setLabel( $i18n->l( 'Bg color', 'wbfsys.process_node.label' ) );

      $inputBgColor->refresh           = $this->refresh;
      $inputBgColor->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessNode_BgColor */

 /**
  * create the ui element for field text_color
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_TextColor( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputTextColor = $this->view->newInput( 'inputWbfsysProcessNodeTextColor' , 'Colorpicker' );
      $this->items['wbfsys_process_node-text_color'] = $inputTextColor;
      $inputTextColor->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_node[text_color]',
          'id'        => 'wgt-input-wbfsys_process_node_text_color'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Text color', 'src' => 'Process Node' ) ),
          'maxlength' => $this->entity->maxSize( 'text_color' ),
        )
      );
      $inputTextColor->setWidth( 'medium' );

      $inputTextColor->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'text_color' ) );
      $inputTextColor->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'text_color' ) );
      $inputTextColor->setData( $this->entity->getSecure( 'text_color' ) );
      $inputTextColor->setLabel( $i18n->l( 'Text color', 'wbfsys.process_node.label' ) );

      $inputTextColor->refresh           = $this->refresh;
      $inputTextColor->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessNode_TextColor */

 /**
  * create the ui element for field border_color
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_BorderColor( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputBorderColor = $this->view->newInput( 'inputWbfsysProcessNodeBorderColor' , 'Colorpicker' );
      $this->items['wbfsys_process_node-border_color'] = $inputBorderColor;
      $inputBorderColor->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_node[border_color]',
          'id'        => 'wgt-input-wbfsys_process_node_border_color'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Border color', 'src' => 'Process Node' ) ),
          'maxlength' => $this->entity->maxSize( 'border_color' ),
        )
      );
      $inputBorderColor->setWidth( 'medium' );

      $inputBorderColor->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'border_color' ) );
      $inputBorderColor->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'border_color' ) );
      $inputBorderColor->setData( $this->entity->getSecure( 'border_color' ) );
      $inputBorderColor->setLabel( $i18n->l( 'Border color', 'wbfsys.process_node.label' ) );

      $inputBorderColor->refresh           = $this->refresh;
      $inputBorderColor->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessNode_BorderColor */

 /**
  * create the ui element for field icon
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_Icon( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputIcon = $this->view->newInput( 'inputWbfsysProcessNodeIcon' , 'Text' );
      $this->items['wbfsys_process_node-icon'] = $inputIcon;
      $inputIcon->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_node[icon]',
          'id'        => 'wgt-input-wbfsys_process_node_icon'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Icon', 'src' => 'Process Node' ) ),
          'maxlength' => $this->entity->maxSize( 'icon' ),
        )
      );
      $inputIcon->setWidth( 'medium' );

      $inputIcon->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'icon' ) );
      $inputIcon->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'icon' ) );
      $inputIcon->setData( $this->entity->getSecure('icon') );
      $inputIcon->setLabel( $i18n->l( 'Icon', 'wbfsys.process_node.label' ) );

      $inputIcon->refresh           = $this->refresh;
      $inputIcon->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessNode_Icon */

 /**
  * create the ui element for field revision
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_Revision( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputRevision = $this->view->newInput( 'inputWbfsysProcessNodeRevision', 'Int' );
      $this->items['wbfsys_process_node-revision'] = $inputRevision;
      $inputRevision->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_node[revision]',
          'id'        => 'wgt-input-wbfsys_process_node_revision'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Revision', 'src' => 'Process Node' ) ),
        )
      );
      $inputRevision->setWidth( 'medium' );

$inputRevision->setReadOnly( $this->fieldReadOnly( 'wbfsys_process_node', 'revision' ) );
      $inputRevision->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'revision' ) );
      $inputRevision->setData( $this->entity->getData( 'revision' ) );
      $inputRevision->setLabel( $i18n->l( 'Revision', 'wbfsys.process_node.label' ) );

      $inputRevision->refresh           = $this->refresh;
      $inputRevision->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessNode_Revision */

 /**
  * create the ui element for field m_order
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_MOrder( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMOrder = $this->view->newInput( 'inputWbfsysProcessNodeMOrder' , 'int' );
      $this->items['wbfsys_process_node-m_order'] = $inputMOrder;
      $inputMOrder->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_node[m_order]',
          'id'        => 'wgt-input-wbfsys_process_node_m_order'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Order', 'src' => 'Process Node' ) ),
        )
      );
      $inputMOrder->setWidth( 'medium' );

      $inputMOrder->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'm_order' ) );
      $inputMOrder->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'm_order' ) );
      $inputMOrder->setData( $this->entity->getInt( 'm_order' ) );
      $inputMOrder->setLabel( $i18n->l( 'Order', 'wbfsys.process_node.label' ) );

      $inputMOrder->refresh           = $this->refresh;
      $inputMOrder->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProcessNode_MOrder */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysProcessNodeRowid' , 'int' );
      $this->items['wbfsys_process_node-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_node[rowid]',
          'id'        => 'wgt-input-wbfsys_process_node_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Process Node' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.process_node.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProcessNode_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysProcessNodeMTimeCreated' , 'Date' );
      $this->items['wbfsys_process_node-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_node[m_time_created]',
          'id'        => 'wgt-input-wbfsys_process_node_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Process Node' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.process_node.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysProcessNode_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysProcessNodeMRoleCreate', 'Window' );
      $this->items['wbfsys_process_node-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_node[m_role_create]',
        'id'        => 'wgt-input-wbfsys_process_node_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Process Node' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.process_node.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_node_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_process_node_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysProcessNode_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysProcessNodeMTimeChanged' , 'Date' );
      $this->items['wbfsys_process_node-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_node[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_process_node_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Process Node' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.process_node.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysProcessNode_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysProcessNodeMRoleChange', 'Window' );
      $this->items['wbfsys_process_node-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_node[m_role_change]',
        'id'        => 'wgt-input-wbfsys_process_node_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Process Node' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.process_node.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_node_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_process_node_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysProcessNode_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysProcessNodeMVersion' , 'int' );
      $this->items['wbfsys_process_node-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_node[m_version]',
          'id'        => 'wgt-input-wbfsys_process_node_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Process Node' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.process_node.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProcessNode_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessNode_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysProcessNodeMUuid' , 'Text' );
      $this->items['wbfsys_process_node-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_node[m_uuid]',
          'id'        => 'wgt-input-wbfsys_process_node_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Process Node' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_process_node', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_process_node', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.process_node.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProcessNode_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysProcessNode_Crud_Edit_Form */


