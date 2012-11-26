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
class WbfsysProcessState_Crud_Show_Form
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
  public $namespace  = 'WbfsysProcessState';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysProcessState';

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
      'wbfsys_process_state' => array
      (
        'label' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'access_key' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'id_process' => array
        ( 
          'required'  => true, 
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
   * @var WbfsysProcessState_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysProcessState_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysProcessState_Entity $entity
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
      'wbfsys_process_state' => array
      (
        'label',
        'access_key',
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
  * create an IO form for the WbfsysProcessState entity
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
    $this->view->addVar( 'entityWbfsysProcessState', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_process_state'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_process_state[id_wbfsys_process_state-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysProcessState_Label( $params );
    $this->input_WbfsysProcessState_AccessKey( $params );
    $this->input_WbfsysProcessState_IdProcess( $params );
    $this->input_WbfsysProcessState_IdPhase( $params );
    $this->input_WbfsysProcessState_Description( $params );
    $this->input_WbfsysProcessState_BgColor( $params );
    $this->input_WbfsysProcessState_TextColor( $params );
    $this->input_WbfsysProcessState_BorderColor( $params );
    $this->input_WbfsysProcessState_Icon( $params );
    $this->input_WbfsysProcessState_Revision( $params );
    $this->input_WbfsysProcessState_MOrder( $params );
    $this->input_WbfsysProcessState_Rowid( $params );
    $this->input_WbfsysProcessState_MTimeCreated( $params );
    $this->input_WbfsysProcessState_MRoleCreate( $params );
    $this->input_WbfsysProcessState_MTimeChanged( $params );
    $this->input_WbfsysProcessState_MRoleChange( $params );
    $this->input_WbfsysProcessState_MVersion( $params );
    $this->input_WbfsysProcessState_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field label
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessState_Label( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputLabel = $this->view->newInput( 'inputWbfsysProcessStateLabel' , 'Text' );
      $this->items['wbfsys_process_state-label'] = $inputLabel;
      $inputLabel->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_state[label]',
          'id'        => 'wgt-input-wbfsys_process_state_label'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'label', 'src' => 'Process State' ) ),
          'maxlength' => $this->entity->maxSize( 'label' ),
        )
      );
      $inputLabel->setWidth( 'medium' );

      $inputLabel->setReadonly( $this->fieldReadOnly( 'wbfsys_process_state', 'label' ) );
      $inputLabel->setRequired( $this->fieldRequired( 'wbfsys_process_state', 'label' ) );
      $inputLabel->setData( $this->entity->getSecure('label') );
      $inputLabel->setLabel( $i18n->l( 'label', 'wbfsys.process_state.label' ) );

      $inputLabel->refresh           = $this->refresh;
      $inputLabel->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessState_Label */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessState_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysProcessStateAccessKey' , 'Text' );
      $this->items['wbfsys_process_state-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_state[access_key]',
          'id'        => 'wgt-input-wbfsys_process_state_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Process State' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_process_state', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_process_state', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.process_state.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessState_AccessKey */

 /**
  * create the ui element for field id_process
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessState_IdProcess( $params )
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

      $inputIdProcess = $this->view->newInput( 'inputWbfsysProcessStateIdProcess', 'Window' );
      $this->items['wbfsys_process_state-id_process'] = $inputIdProcess;
      $inputIdProcess->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_state[id_process]',
        'id'        => 'wgt-input-wbfsys_process_state_id_process'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Process', 'src' => 'Process State' ) ),
      ));

      if( $this->assignedForm )
        $inputIdProcess->assignedForm = $this->assignedForm;

      $inputIdProcess->setWidth( 'medium' );

      $inputIdProcess->setData( $this->entity->getData( 'id_process' )  );
      $inputIdProcess->setReadonly( $this->fieldReadOnly( 'wbfsys_process_state', 'id_process' ) );
      $inputIdProcess->setRequired( $this->fieldRequired( 'wbfsys_process_state', 'id_process' ) );
      $inputIdProcess->setLabel( $i18n->l( 'Process', 'wbfsys.process_state.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Process.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_state_id_process'.($this->suffix?'-'.$this->suffix:'');

      $inputIdProcess->setListUrl ( $listUrl );
      $inputIdProcess->setListIcon( 'control/connect.png' );
      $inputIdProcess->setEntityUrl( 'maintab.php?c=Wbfsys.Process.edit' );
      $inputIdProcess->conEntity         = $entityWbfsysProcess;
      $inputIdProcess->refresh           = $this->refresh;
      $inputIdProcess->serializeElement  = $this->sendElement;



      $inputIdProcess->view = $this->view;
      $inputIdProcess->buildJavascript( 'wgt-input-wbfsys_process_state_id_process'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdProcess );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProcessState_IdProcess */

 /**
  * create the ui element for field id_phase
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessState_IdPhase( $params )
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

      $inputIdPhase = $this->view->newInput( 'inputWbfsysProcessStateIdPhase', 'Window' );
      $this->items['wbfsys_process_state-id_phase'] = $inputIdPhase;
      $inputIdPhase->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_state[id_phase]',
        'id'        => 'wgt-input-wbfsys_process_state_id_phase'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Phase', 'src' => 'Process State' ) ),
      ));

      if( $this->assignedForm )
        $inputIdPhase->assignedForm = $this->assignedForm;

      $inputIdPhase->setWidth( 'medium' );

      $inputIdPhase->setData( $this->entity->getData( 'id_phase' )  );
      $inputIdPhase->setReadonly( $this->fieldReadOnly( 'wbfsys_process_state', 'id_phase' ) );
      $inputIdPhase->setRequired( $this->fieldRequired( 'wbfsys_process_state', 'id_phase' ) );
      $inputIdPhase->setLabel( $i18n->l( 'Phase', 'wbfsys.process_state.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ProcessPhase.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_state_id_phase'.($this->suffix?'-'.$this->suffix:'');

      $inputIdPhase->setListUrl ( $listUrl );
      $inputIdPhase->setListIcon( 'control/connect.png' );
      $inputIdPhase->setEntityUrl( 'maintab.php?c=Wbfsys.ProcessPhase.edit' );
      $inputIdPhase->conEntity         = $entityWbfsysProcessPhase;
      $inputIdPhase->refresh           = $this->refresh;
      $inputIdPhase->serializeElement  = $this->sendElement;



      $inputIdPhase->view = $this->view;
      $inputIdPhase->buildJavascript( 'wgt-input-wbfsys_process_state_id_phase'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdPhase );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProcessState_IdPhase */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessState_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysProcessStateDescription', 'Textarea' );
      $this->items['wbfsys_process_state-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_process_state[description]',
          'id'    => 'wgt-input-wbfsys_process_state_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Process State' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_process_state', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_process_state', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.process_state.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysProcessState_Description */

 /**
  * create the ui element for field bg_color
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessState_BgColor( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputBgColor = $this->view->newInput( 'inputWbfsysProcessStateBgColor' , 'Colorpicker' );
      $this->items['wbfsys_process_state-bg_color'] = $inputBgColor;
      $inputBgColor->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_state[bg_color]',
          'id'        => 'wgt-input-wbfsys_process_state_bg_color'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'bg color', 'src' => 'Process State' ) ),
          'maxlength' => $this->entity->maxSize( 'bg_color' ),
        )
      );
      $inputBgColor->setWidth( 'medium' );

      $inputBgColor->setReadonly( $this->fieldReadOnly( 'wbfsys_process_state', 'bg_color' ) );
      $inputBgColor->setRequired( $this->fieldRequired( 'wbfsys_process_state', 'bg_color' ) );
      $inputBgColor->setData( $this->entity->getSecure( 'bg_color' ) );
      $inputBgColor->setLabel( $i18n->l( 'bg color', 'wbfsys.process_state.label' ) );

      $inputBgColor->refresh           = $this->refresh;
      $inputBgColor->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessState_BgColor */

 /**
  * create the ui element for field text_color
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessState_TextColor( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputTextColor = $this->view->newInput( 'inputWbfsysProcessStateTextColor' , 'Colorpicker' );
      $this->items['wbfsys_process_state-text_color'] = $inputTextColor;
      $inputTextColor->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_state[text_color]',
          'id'        => 'wgt-input-wbfsys_process_state_text_color'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'text color', 'src' => 'Process State' ) ),
          'maxlength' => $this->entity->maxSize( 'text_color' ),
        )
      );
      $inputTextColor->setWidth( 'medium' );

      $inputTextColor->setReadonly( $this->fieldReadOnly( 'wbfsys_process_state', 'text_color' ) );
      $inputTextColor->setRequired( $this->fieldRequired( 'wbfsys_process_state', 'text_color' ) );
      $inputTextColor->setData( $this->entity->getSecure( 'text_color' ) );
      $inputTextColor->setLabel( $i18n->l( 'text color', 'wbfsys.process_state.label' ) );

      $inputTextColor->refresh           = $this->refresh;
      $inputTextColor->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessState_TextColor */

 /**
  * create the ui element for field border_color
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessState_BorderColor( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:colorpicker
      $inputBorderColor = $this->view->newInput( 'inputWbfsysProcessStateBorderColor' , 'Colorpicker' );
      $this->items['wbfsys_process_state-border_color'] = $inputBorderColor;
      $inputBorderColor->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_state[border_color]',
          'id'        => 'wgt-input-wbfsys_process_state_border_color'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'border color', 'src' => 'Process State' ) ),
          'maxlength' => $this->entity->maxSize( 'border_color' ),
        )
      );
      $inputBorderColor->setWidth( 'medium' );

      $inputBorderColor->setReadonly( $this->fieldReadOnly( 'wbfsys_process_state', 'border_color' ) );
      $inputBorderColor->setRequired( $this->fieldRequired( 'wbfsys_process_state', 'border_color' ) );
      $inputBorderColor->setData( $this->entity->getSecure( 'border_color' ) );
      $inputBorderColor->setLabel( $i18n->l( 'border color', 'wbfsys.process_state.label' ) );

      $inputBorderColor->refresh           = $this->refresh;
      $inputBorderColor->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessState_BorderColor */

 /**
  * create the ui element for field icon
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessState_Icon( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputIcon = $this->view->newInput( 'inputWbfsysProcessStateIcon' , 'Text' );
      $this->items['wbfsys_process_state-icon'] = $inputIcon;
      $inputIcon->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_state[icon]',
          'id'        => 'wgt-input-wbfsys_process_state_icon'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Icon', 'src' => 'Process State' ) ),
          'maxlength' => $this->entity->maxSize( 'icon' ),
        )
      );
      $inputIcon->setWidth( 'medium' );

      $inputIcon->setReadonly( $this->fieldReadOnly( 'wbfsys_process_state', 'icon' ) );
      $inputIcon->setRequired( $this->fieldRequired( 'wbfsys_process_state', 'icon' ) );
      $inputIcon->setData( $this->entity->getSecure('icon') );
      $inputIcon->setLabel( $i18n->l( 'Icon', 'wbfsys.process_state.label' ) );

      $inputIcon->refresh           = $this->refresh;
      $inputIcon->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessState_Icon */

 /**
  * create the ui element for field revision
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessState_Revision( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputRevision = $this->view->newInput( 'inputWbfsysProcessStateRevision', 'Int' );
      $this->items['wbfsys_process_state-revision'] = $inputRevision;
      $inputRevision->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_state[revision]',
          'id'        => 'wgt-input-wbfsys_process_state_revision'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Revision', 'src' => 'Process State' ) ),
        )
      );
      $inputRevision->setWidth( 'medium' );

$inputRevision->setReadOnly( $this->fieldReadOnly( 'wbfsys_process_state', 'revision' ) );
      $inputRevision->setRequired( $this->fieldRequired( 'wbfsys_process_state', 'revision' ) );
      $inputRevision->setData( $this->entity->getData( 'revision' ) );
      $inputRevision->setLabel( $i18n->l( 'Revision', 'wbfsys.process_state.label' ) );

      $inputRevision->refresh           = $this->refresh;
      $inputRevision->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessState_Revision */

 /**
  * create the ui element for field m_order
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessState_MOrder( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMOrder = $this->view->newInput( 'inputWbfsysProcessStateMOrder' , 'int' );
      $this->items['wbfsys_process_state-m_order'] = $inputMOrder;
      $inputMOrder->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_state[m_order]',
          'id'        => 'wgt-input-wbfsys_process_state_m_order'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Order', 'src' => 'Process State' ) ),
        )
      );
      $inputMOrder->setWidth( 'medium' );

      $inputMOrder->setReadonly( $this->fieldReadOnly( 'wbfsys_process_state', 'm_order' ) );
      $inputMOrder->setRequired( $this->fieldRequired( 'wbfsys_process_state', 'm_order' ) );
      $inputMOrder->setData( $this->entity->getInt( 'm_order' ) );
      $inputMOrder->setLabel( $i18n->l( 'Order', 'wbfsys.process_state.label' ) );

      $inputMOrder->refresh           = $this->refresh;
      $inputMOrder->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProcessState_MOrder */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessState_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysProcessStateRowid' , 'int' );
      $this->items['wbfsys_process_state-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_state[rowid]',
          'id'        => 'wgt-input-wbfsys_process_state_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Process State' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_process_state', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_process_state', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.process_state.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProcessState_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessState_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysProcessStateMTimeCreated' , 'Date' );
      $this->items['wbfsys_process_state-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_state[m_time_created]',
          'id'        => 'wgt-input-wbfsys_process_state_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Process State' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_process_state', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_process_state', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.process_state.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysProcessState_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessState_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysProcessStateMRoleCreate', 'Window' );
      $this->items['wbfsys_process_state-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_state[m_role_create]',
        'id'        => 'wgt-input-wbfsys_process_state_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Process State' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_process_state', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_process_state', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.process_state.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_state_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_process_state_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysProcessState_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessState_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysProcessStateMTimeChanged' , 'Date' );
      $this->items['wbfsys_process_state-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_state[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_process_state_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Process State' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_process_state', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_process_state', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.process_state.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysProcessState_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessState_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysProcessStateMRoleChange', 'Window' );
      $this->items['wbfsys_process_state-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_state[m_role_change]',
        'id'        => 'wgt-input-wbfsys_process_state_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Process State' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_process_state', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_process_state', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.process_state.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_state_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_process_state_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysProcessState_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessState_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysProcessStateMVersion' , 'int' );
      $this->items['wbfsys_process_state-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_state[m_version]',
          'id'        => 'wgt-input-wbfsys_process_state_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Process State' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_process_state', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_process_state', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.process_state.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProcessState_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessState_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysProcessStateMUuid' , 'Text' );
      $this->items['wbfsys_process_state-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_state[m_uuid]',
          'id'        => 'wgt-input-wbfsys_process_state_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Process State' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_process_state', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_process_state', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.process_state.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProcessState_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysProcessState_Crud_Show_Form */


