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
class WbfsysProcessStatus_Crud_Edit_Form
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
  public $namespace  = 'WbfsysProcessStatus';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysProcessStatus';

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
      'wbfsys_process_status' => array
      (
        'vid' => array
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
        'id_start_node' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_last_node' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_actual_node' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'actual_node_key' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'value_highest_node' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_end_node' => array
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
   * @var WbfsysProcessStatus_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysProcessStatus_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysProcessStatus_Entity $entity
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
      'wbfsys_process_status' => array
      (
        'vid',
        'id_user',
        'id_process',
        'id_phase',
        'id_start_node',
        'id_last_node',
        'id_actual_node',
        'actual_node_key',
        'value_highest_node',
        'id_end_node',
        'id_vid_entity',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysProcessStatus entity
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
    $this->view->addVar( 'entityWbfsysProcessStatus', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_process_status'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_process_status[id_wbfsys_process_status-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysProcessStatus_Vid( $params );
    $this->input_WbfsysProcessStatus_IdUser( $params );
    $this->input_WbfsysProcessStatus_IdProcess( $params );
    $this->input_WbfsysProcessStatus_IdPhase( $params );
    $this->input_WbfsysProcessStatus_IdStartNode( $params );
    $this->input_WbfsysProcessStatus_IdLastNode( $params );
    $this->input_WbfsysProcessStatus_IdActualNode( $params );
    $this->input_WbfsysProcessStatus_ActualNodeKey( $params );
    $this->input_WbfsysProcessStatus_ValueHighestNode( $params );
    $this->input_WbfsysProcessStatus_IdEndNode( $params );
    $this->input_WbfsysProcessStatus_IdVidEntity( $params );
    $this->input_WbfsysProcessStatus_Rowid( $params );
    $this->input_WbfsysProcessStatus_MTimeCreated( $params );
    $this->input_WbfsysProcessStatus_MRoleCreate( $params );
    $this->input_WbfsysProcessStatus_MTimeChanged( $params );
    $this->input_WbfsysProcessStatus_MRoleChange( $params );
    $this->input_WbfsysProcessStatus_MVersion( $params );
    $this->input_WbfsysProcessStatus_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStatus_Vid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputVid = $this->view->newInput( 'inputWbfsysProcessStatusVid', 'Hidden' );
      $this->items['wbfsys_process_status-vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_status[vid]',
          'id'        => 'wgt-input-wbfsys_process_status_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'VID', 'src' => 'Process Status' ) ),
          'maxlength' => $this->entity->maxSize( 'vid' ),
        )
      );
      $inputVid->setWidth( 'medium' );

      $inputVid->setData( $this->entity->getSecure( 'vid' ) );
      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysProcessStatus_Vid */

 /**
  * create the ui element for field id_user
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStatus_IdUser( $params )
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
      $objidWbfsysRoleUser = $this->entity->getData( 'id_user' ) ;

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

      $inputIdUser = $this->view->newInput( 'inputWbfsysProcessStatusIdUser', 'Window' );
      $this->items['wbfsys_process_status-id_user'] = $inputIdUser;
      $inputIdUser->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_status[id_user]',
        'id'        => 'wgt-input-wbfsys_process_status_id_user'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'User', 'src' => 'Process Status' ) ),
      ));

      if( $this->assignedForm )
        $inputIdUser->assignedForm = $this->assignedForm;

      $inputIdUser->setWidth( 'medium' );

      $inputIdUser->setData( $this->entity->getData( 'id_user' )  );
      $inputIdUser->setReadonly( $this->fieldReadOnly( 'wbfsys_process_status', 'id_user' ) );
      $inputIdUser->setRequired( $this->fieldRequired( 'wbfsys_process_status', 'id_user' ) );
      $inputIdUser->setLabel( $i18n->l( 'User', 'wbfsys.process_status.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_status_id_user'.($this->suffix?'-'.$this->suffix:'');

      $inputIdUser->setListUrl ( $listUrl );
      $inputIdUser->setListIcon( 'control/connect.png' );
      $inputIdUser->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.edit' );
      $inputIdUser->conEntity         = $entityWbfsysRoleUser;
      $inputIdUser->refresh           = $this->refresh;
      $inputIdUser->serializeElement  = $this->sendElement;


        $inputIdUser->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.RoleUser.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdUser->view = $this->view;
      $inputIdUser->buildJavascript( 'wgt-input-wbfsys_process_status_id_user'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdUser );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProcessStatus_IdUser */

 /**
  * create the ui element for field id_process
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStatus_IdProcess( $params )
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

      $inputIdProcess = $this->view->newInput( 'inputWbfsysProcessStatusIdProcess', 'Window' );
      $this->items['wbfsys_process_status-id_process'] = $inputIdProcess;
      $inputIdProcess->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_status[id_process]',
        'id'        => 'wgt-input-wbfsys_process_status_id_process'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Process', 'src' => 'Process Status' ) ),
      ));

      if( $this->assignedForm )
        $inputIdProcess->assignedForm = $this->assignedForm;

      $inputIdProcess->setWidth( 'medium' );

      $inputIdProcess->setData( $this->entity->getData( 'id_process' )  );
      $inputIdProcess->setReadonly( $this->fieldReadOnly( 'wbfsys_process_status', 'id_process' ) );
      $inputIdProcess->setRequired( $this->fieldRequired( 'wbfsys_process_status', 'id_process' ) );
      $inputIdProcess->setLabel( $i18n->l( 'Process', 'wbfsys.process_status.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Process.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_status_id_process'.($this->suffix?'-'.$this->suffix:'');

      $inputIdProcess->setListUrl ( $listUrl );
      $inputIdProcess->setListIcon( 'control/connect.png' );
      $inputIdProcess->setEntityUrl( 'maintab.php?c=Wbfsys.Process.edit' );
      $inputIdProcess->conEntity         = $entityWbfsysProcess;
      $inputIdProcess->refresh           = $this->refresh;
      $inputIdProcess->serializeElement  = $this->sendElement;



      $inputIdProcess->view = $this->view;
      $inputIdProcess->buildJavascript( 'wgt-input-wbfsys_process_status_id_process'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdProcess );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProcessStatus_IdProcess */

 /**
  * create the ui element for field id_phase
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStatus_IdPhase( $params )
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

      $inputIdPhase = $this->view->newInput( 'inputWbfsysProcessStatusIdPhase', 'Window' );
      $this->items['wbfsys_process_status-id_phase'] = $inputIdPhase;
      $inputIdPhase->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_status[id_phase]',
        'id'        => 'wgt-input-wbfsys_process_status_id_phase'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Phase', 'src' => 'Process Status' ) ),
      ));

      if( $this->assignedForm )
        $inputIdPhase->assignedForm = $this->assignedForm;

      $inputIdPhase->setWidth( 'medium' );

      $inputIdPhase->setData( $this->entity->getData( 'id_phase' )  );
      $inputIdPhase->setReadonly( $this->fieldReadOnly( 'wbfsys_process_status', 'id_phase' ) );
      $inputIdPhase->setRequired( $this->fieldRequired( 'wbfsys_process_status', 'id_phase' ) );
      $inputIdPhase->setLabel( $i18n->l( 'Phase', 'wbfsys.process_status.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ProcessPhase.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_status_id_phase'.($this->suffix?'-'.$this->suffix:'');

      $inputIdPhase->setListUrl ( $listUrl );
      $inputIdPhase->setListIcon( 'control/connect.png' );
      $inputIdPhase->setEntityUrl( 'maintab.php?c=Wbfsys.ProcessPhase.edit' );
      $inputIdPhase->conEntity         = $entityWbfsysProcessPhase;
      $inputIdPhase->refresh           = $this->refresh;
      $inputIdPhase->serializeElement  = $this->sendElement;



      $inputIdPhase->view = $this->view;
      $inputIdPhase->buildJavascript( 'wgt-input-wbfsys_process_status_id_phase'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdPhase );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProcessStatus_IdPhase */

 /**
  * create the ui element for field id_start_node
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStatus_IdStartNode( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysProcessNode_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysProcessNode not exists' );

      Log::warn( 'Looks like the Entity: WbfsysProcessNode is missing' );

      return;
    }


      //p: Window
      $objidWbfsysProcessNode = $this->entity->getData( 'id_start_node' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysProcessNode
          || !$entityWbfsysProcessNode = $this->db->orm->get
          (
            'WbfsysProcessNode',
            $objidWbfsysProcessNode
          )
      )
      {
        $entityWbfsysProcessNode = $this->db->orm->newEntity( 'WbfsysProcessNode' );
      }

      $inputIdStartNode = $this->view->newInput( 'inputWbfsysProcessStatusIdStartNode', 'Window' );
      $this->items['wbfsys_process_status-id_start_node'] = $inputIdStartNode;
      $inputIdStartNode->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_status[id_start_node]',
        'id'        => 'wgt-input-wbfsys_process_status_id_start_node'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Start Node', 'src' => 'Process Status' ) ),
      ));

      if( $this->assignedForm )
        $inputIdStartNode->assignedForm = $this->assignedForm;

      $inputIdStartNode->setWidth( 'medium' );

      $inputIdStartNode->setData( $this->entity->getData( 'id_start_node' )  );
      $inputIdStartNode->setReadonly( $this->fieldReadOnly( 'wbfsys_process_status', 'id_start_node' ) );
      $inputIdStartNode->setRequired( $this->fieldRequired( 'wbfsys_process_status', 'id_start_node' ) );
      $inputIdStartNode->setLabel( $i18n->l( 'Start Node', 'wbfsys.process_status.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ProcessNode.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_status_id_start_node'.($this->suffix?'-'.$this->suffix:'');

      $inputIdStartNode->setListUrl ( $listUrl );
      $inputIdStartNode->setListIcon( 'control/connect.png' );
      $inputIdStartNode->setEntityUrl( 'maintab.php?c=Wbfsys.ProcessNode.edit' );
      $inputIdStartNode->conEntity         = $entityWbfsysProcessNode;
      $inputIdStartNode->refresh           = $this->refresh;
      $inputIdStartNode->serializeElement  = $this->sendElement;



      $inputIdStartNode->view = $this->view;
      $inputIdStartNode->buildJavascript( 'wgt-input-wbfsys_process_status_id_start_node'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdStartNode );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProcessStatus_IdStartNode */

 /**
  * create the ui element for field id_last_node
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStatus_IdLastNode( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysProcessNode_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysProcessNode not exists' );

      Log::warn( 'Looks like the Entity: WbfsysProcessNode is missing' );

      return;
    }


      //p: Window
      $objidWbfsysProcessNode = $this->entity->getData( 'id_last_node' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysProcessNode
          || !$entityWbfsysProcessNode = $this->db->orm->get
          (
            'WbfsysProcessNode',
            $objidWbfsysProcessNode
          )
      )
      {
        $entityWbfsysProcessNode = $this->db->orm->newEntity( 'WbfsysProcessNode' );
      }

      $inputIdLastNode = $this->view->newInput( 'inputWbfsysProcessStatusIdLastNode', 'Window' );
      $this->items['wbfsys_process_status-id_last_node'] = $inputIdLastNode;
      $inputIdLastNode->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_status[id_last_node]',
        'id'        => 'wgt-input-wbfsys_process_status_id_last_node'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Last Node', 'src' => 'Process Status' ) ),
      ));

      if( $this->assignedForm )
        $inputIdLastNode->assignedForm = $this->assignedForm;

      $inputIdLastNode->setWidth( 'medium' );

      $inputIdLastNode->setData( $this->entity->getData( 'id_last_node' )  );
      $inputIdLastNode->setReadonly( $this->fieldReadOnly( 'wbfsys_process_status', 'id_last_node' ) );
      $inputIdLastNode->setRequired( $this->fieldRequired( 'wbfsys_process_status', 'id_last_node' ) );
      $inputIdLastNode->setLabel( $i18n->l( 'Last Node', 'wbfsys.process_status.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ProcessNode.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_status_id_last_node'.($this->suffix?'-'.$this->suffix:'');

      $inputIdLastNode->setListUrl ( $listUrl );
      $inputIdLastNode->setListIcon( 'control/connect.png' );
      $inputIdLastNode->setEntityUrl( 'maintab.php?c=Wbfsys.ProcessNode.edit' );
      $inputIdLastNode->conEntity         = $entityWbfsysProcessNode;
      $inputIdLastNode->refresh           = $this->refresh;
      $inputIdLastNode->serializeElement  = $this->sendElement;



      $inputIdLastNode->view = $this->view;
      $inputIdLastNode->buildJavascript( 'wgt-input-wbfsys_process_status_id_last_node'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdLastNode );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProcessStatus_IdLastNode */

 /**
  * create the ui element for field id_actual_node
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStatus_IdActualNode( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysProcessNode_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysProcessNode not exists' );

      Log::warn( 'Looks like the Entity: WbfsysProcessNode is missing' );

      return;
    }


      //p: Window
      $objidWbfsysProcessNode = $this->entity->getData( 'id_actual_node' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysProcessNode
          || !$entityWbfsysProcessNode = $this->db->orm->get
          (
            'WbfsysProcessNode',
            $objidWbfsysProcessNode
          )
      )
      {
        $entityWbfsysProcessNode = $this->db->orm->newEntity( 'WbfsysProcessNode' );
      }

      $inputIdActualNode = $this->view->newInput( 'inputWbfsysProcessStatusIdActualNode', 'Window' );
      $this->items['wbfsys_process_status-id_actual_node'] = $inputIdActualNode;
      $inputIdActualNode->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_status[id_actual_node]',
        'id'        => 'wgt-input-wbfsys_process_status_id_actual_node'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Actual Node', 'src' => 'Process Status' ) ),
      ));

      if( $this->assignedForm )
        $inputIdActualNode->assignedForm = $this->assignedForm;

      $inputIdActualNode->setWidth( 'medium' );

      $inputIdActualNode->setData( $this->entity->getData( 'id_actual_node' )  );
      $inputIdActualNode->setReadonly( $this->fieldReadOnly( 'wbfsys_process_status', 'id_actual_node' ) );
      $inputIdActualNode->setRequired( $this->fieldRequired( 'wbfsys_process_status', 'id_actual_node' ) );
      $inputIdActualNode->setLabel( $i18n->l( 'Actual Node', 'wbfsys.process_status.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ProcessNode.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_status_id_actual_node'.($this->suffix?'-'.$this->suffix:'');

      $inputIdActualNode->setListUrl ( $listUrl );
      $inputIdActualNode->setListIcon( 'control/connect.png' );
      $inputIdActualNode->setEntityUrl( 'maintab.php?c=Wbfsys.ProcessNode.edit' );
      $inputIdActualNode->conEntity         = $entityWbfsysProcessNode;
      $inputIdActualNode->refresh           = $this->refresh;
      $inputIdActualNode->serializeElement  = $this->sendElement;



      $inputIdActualNode->view = $this->view;
      $inputIdActualNode->buildJavascript( 'wgt-input-wbfsys_process_status_id_actual_node'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdActualNode );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProcessStatus_IdActualNode */

 /**
  * create the ui element for field actual_node_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStatus_ActualNodeKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputActualNodeKey = $this->view->newInput( 'inputWbfsysProcessStatusActualNodeKey' , 'Text' );
      $this->items['wbfsys_process_status-actual_node_key'] = $inputActualNodeKey;
      $inputActualNodeKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_status[actual_node_key]',
          'id'        => 'wgt-input-wbfsys_process_status_actual_node_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'actual node key', 'src' => 'Process Status' ) ),
          'maxlength' => $this->entity->maxSize( 'actual_node_key' ),
        )
      );
      $inputActualNodeKey->setWidth( 'medium' );

      $inputActualNodeKey->setReadonly( $this->fieldReadOnly( 'wbfsys_process_status', 'actual_node_key' ) );
      $inputActualNodeKey->setRequired( $this->fieldRequired( 'wbfsys_process_status', 'actual_node_key' ) );
      $inputActualNodeKey->setData( $this->entity->getSecure('actual_node_key') );
      $inputActualNodeKey->setLabel( $i18n->l( 'actual node key', 'wbfsys.process_status.label' ) );

      $inputActualNodeKey->refresh           = $this->refresh;
      $inputActualNodeKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessStatus_ActualNodeKey */

 /**
  * create the ui element for field value_highest_node
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStatus_ValueHighestNode( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputValueHighestNode = $this->view->newInput( 'inputWbfsysProcessStatusValueHighestNode', 'Int' );
      $this->items['wbfsys_process_status-value_highest_node'] = $inputValueHighestNode;
      $inputValueHighestNode->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_status[value_highest_node]',
          'id'        => 'wgt-input-wbfsys_process_status_value_highest_node'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Value Highest Node', 'src' => 'Process Status' ) ),
        )
      );
      $inputValueHighestNode->setWidth( 'medium' );

$inputValueHighestNode->setReadOnly( $this->fieldReadOnly( 'wbfsys_process_status', 'value_highest_node' ) );
      $inputValueHighestNode->setRequired( $this->fieldRequired( 'wbfsys_process_status', 'value_highest_node' ) );
      $inputValueHighestNode->setData( $this->entity->getData( 'value_highest_node' ) );
      $inputValueHighestNode->setLabel( $i18n->l( 'Value Highest Node', 'wbfsys.process_status.label' ) );

      $inputValueHighestNode->refresh           = $this->refresh;
      $inputValueHighestNode->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessStatus_ValueHighestNode */

 /**
  * create the ui element for field id_end_node
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStatus_IdEndNode( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysProcessNode_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysProcessNode not exists' );

      Log::warn( 'Looks like the Entity: WbfsysProcessNode is missing' );

      return;
    }


      //p: Window
      $objidWbfsysProcessNode = $this->entity->getData( 'id_end_node' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysProcessNode
          || !$entityWbfsysProcessNode = $this->db->orm->get
          (
            'WbfsysProcessNode',
            $objidWbfsysProcessNode
          )
      )
      {
        $entityWbfsysProcessNode = $this->db->orm->newEntity( 'WbfsysProcessNode' );
      }

      $inputIdEndNode = $this->view->newInput( 'inputWbfsysProcessStatusIdEndNode', 'Window' );
      $this->items['wbfsys_process_status-id_end_node'] = $inputIdEndNode;
      $inputIdEndNode->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_status[id_end_node]',
        'id'        => 'wgt-input-wbfsys_process_status_id_end_node'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'End Node', 'src' => 'Process Status' ) ),
      ));

      if( $this->assignedForm )
        $inputIdEndNode->assignedForm = $this->assignedForm;

      $inputIdEndNode->setWidth( 'medium' );

      $inputIdEndNode->setData( $this->entity->getData( 'id_end_node' )  );
      $inputIdEndNode->setReadonly( $this->fieldReadOnly( 'wbfsys_process_status', 'id_end_node' ) );
      $inputIdEndNode->setRequired( $this->fieldRequired( 'wbfsys_process_status', 'id_end_node' ) );
      $inputIdEndNode->setLabel( $i18n->l( 'End Node', 'wbfsys.process_status.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ProcessNode.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_status_id_end_node'.($this->suffix?'-'.$this->suffix:'');

      $inputIdEndNode->setListUrl ( $listUrl );
      $inputIdEndNode->setListIcon( 'control/connect.png' );
      $inputIdEndNode->setEntityUrl( 'maintab.php?c=Wbfsys.ProcessNode.edit' );
      $inputIdEndNode->conEntity         = $entityWbfsysProcessNode;
      $inputIdEndNode->refresh           = $this->refresh;
      $inputIdEndNode->serializeElement  = $this->sendElement;



      $inputIdEndNode->view = $this->view;
      $inputIdEndNode->buildJavascript( 'wgt-input-wbfsys_process_status_id_end_node'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdEndNode );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProcessStatus_IdEndNode */

 /**
  * create the ui element for field id_vid_entity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStatus_IdVidEntity( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdVidEntity = $this->view->newInput( 'inputWbfsysProcessStatusIdVidEntity', 'Hidden' );
      $this->items['wbfsys_process_status-id_vid_entity'] = $inputIdVidEntity;
      $inputIdVidEntity->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_status[id_vid_entity]',
          'id'        => 'wgt-input-wbfsys_process_status_id_vid_entity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Entity', 'src' => 'Process Status' ) ),
          'maxlength' => $this->entity->maxSize( 'id_vid_entity' ),
        )
      );
      $inputIdVidEntity->setWidth( 'medium' );

      $inputIdVidEntity->setData( $this->entity->getSecure( 'id_vid_entity' ) );
      $inputIdVidEntity->refresh           = $this->refresh;
      $inputIdVidEntity->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysProcessStatus_IdVidEntity */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStatus_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysProcessStatusRowid' , 'int' );
      $this->items['wbfsys_process_status-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_status[rowid]',
          'id'        => 'wgt-input-wbfsys_process_status_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Process Status' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_process_status', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_process_status', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.process_status.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProcessStatus_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStatus_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysProcessStatusMTimeCreated' , 'Date' );
      $this->items['wbfsys_process_status-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_status[m_time_created]',
          'id'        => 'wgt-input-wbfsys_process_status_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Process Status' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_process_status', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_process_status', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.process_status.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysProcessStatus_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStatus_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysProcessStatusMRoleCreate', 'Window' );
      $this->items['wbfsys_process_status-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_status[m_role_create]',
        'id'        => 'wgt-input-wbfsys_process_status_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Process Status' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_process_status', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_process_status', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.process_status.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_status_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_process_status_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysProcessStatus_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStatus_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysProcessStatusMTimeChanged' , 'Date' );
      $this->items['wbfsys_process_status-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_status[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_process_status_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Process Status' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_process_status', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_process_status', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.process_status.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysProcessStatus_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStatus_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysProcessStatusMRoleChange', 'Window' );
      $this->items['wbfsys_process_status-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_status[m_role_change]',
        'id'        => 'wgt-input-wbfsys_process_status_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Process Status' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_process_status', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_process_status', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.process_status.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_status_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_process_status_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysProcessStatus_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStatus_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysProcessStatusMVersion' , 'int' );
      $this->items['wbfsys_process_status-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_status[m_version]',
          'id'        => 'wgt-input-wbfsys_process_status_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Process Status' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_process_status', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_process_status', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.process_status.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProcessStatus_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStatus_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysProcessStatusMUuid' , 'Text' );
      $this->items['wbfsys_process_status-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_status[m_uuid]',
          'id'        => 'wgt-input-wbfsys_process_status_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Process Status' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_process_status', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_process_status', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.process_status.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProcessStatus_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysProcessStatus_Crud_Edit_Form */


