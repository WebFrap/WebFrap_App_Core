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
class WbfsysProcessStatus_Form
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
  public $keyName     = 'wbfsys_process_status';

  /**
   * the cname for the entities, is used to request metadata from the orm
   * @setter WgtForm::setEntityName()
   * @getter WgtForm::getEntityName()
   * @var string 
   */
  public $entityName  = 'WbfsysProcessStatus';

  /**
   * namespace for the actual form
   * @setter WgtForm::setNamespace()
   * @getter WgtForm::getNamespace()
   * @var string 
   */
  public $namespace  = 'WbfsysProcessStatus';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtForm::setPrefix()
   * @getter WgtForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysProcessStatus';

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
   * @var WbfsysProcessStatus_Entity 
   */
  public $entity      = null;
  
////////////////////////////////////////////////////////////////////////////////
// form methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysProcessStatus entity
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
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysProcessStatus' );
      }
    }

  }//end public function createForm */

 /**
  * create a search form for the WbfsysProcessStatus entity
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
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysProcessStatus' );
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
          'title'     => $this->view->i18n->l( 'Insert value for VID (Process Status)', 'wbfsys.process_status.label' ),
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
  * create the ui element for field id_user
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_user( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysRoleUser_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysRoleUser not exists' );

      Log::warn('Looks like the Entity: WbfsysRoleUser is missing');

      return;
    }


      //p: Window
      $objidWbfsysRoleUser = $this->entity->getData('id_user') ;

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

      $inputIdUser = $this->view->newInput( 'input'.$this->prefix.'IdUser', 'Window' );
      $inputIdUser->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_user]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_user'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for User (Process Status)', 'wbfsys.process_status.label' ),
      ));

      if( $this->assignedForm )
        $inputIdUser->assignedForm = $this->assignedForm;

      $inputIdUser->setWidth( 'medium' );

      $inputIdUser->setData( $this->entity->getData( 'id_user' )  );
      $inputIdUser->setReadOnly( $this->isReadOnly( 'id_user' ) );
      $inputIdUser->setLabel( $this->view->i18n->l( 'User', 'wbfsys.process_status.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_user'.($this->suffix?'-'.$this->suffix:'');

      $inputIdUser->setListUrl ( $listUrl );
      $inputIdUser->setListIcon( 'control/connect.png' );
      $inputIdUser->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.edit' );
      $inputIdUser->conEntity         = $entityWbfsysRoleUser;
      $inputIdUser->refresh           = $this->refresh;
      $inputIdUser->serializeElement  = $this->sendElement;
      

        $inputIdUser->setAutocomplete
        (
        '{
          "url":"ajax.php?c=Wbfsys.RoleUser.autocomplete&amp;key=",
          "type":"entity"
          }'
        );
        

      $inputIdUser->view = $this->view;
      $inputIdUser->buildJavascript( 'wgt-input-'.$this->keyName.'_id_user'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdUser );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_user */

 /**
  * create the ui element for field id_process
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_process( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysProcess_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysProcess not exists' );

      Log::warn('Looks like the Entity: WbfsysProcess is missing');

      return;
    }


      //p: Window
      $objidWbfsysProcess = $this->entity->getData('id_process') ;

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

      $inputIdProcess = $this->view->newInput( 'input'.$this->prefix.'IdProcess', 'Window' );
      $inputIdProcess->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_process]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_process'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Process (Process Status)', 'wbfsys.process_status.label' ),
      ));

      if( $this->assignedForm )
        $inputIdProcess->assignedForm = $this->assignedForm;

      $inputIdProcess->setWidth( 'medium' );

      $inputIdProcess->setData( $this->entity->getData( 'id_process' )  );
      $inputIdProcess->setReadOnly( $this->isReadOnly( 'id_process' ) );
      $inputIdProcess->setLabel( $this->view->i18n->l( 'Process', 'wbfsys.process_status.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Process.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_process'.($this->suffix?'-'.$this->suffix:'');

      $inputIdProcess->setListUrl ( $listUrl );
      $inputIdProcess->setListIcon( 'control/connect.png' );
      $inputIdProcess->setEntityUrl( 'maintab.php?c=Wbfsys.Process.edit' );
      $inputIdProcess->conEntity         = $entityWbfsysProcess;
      $inputIdProcess->refresh           = $this->refresh;
      $inputIdProcess->serializeElement  = $this->sendElement;
      


      $inputIdProcess->view = $this->view;
      $inputIdProcess->buildJavascript( 'wgt-input-'.$this->keyName.'_id_process'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdProcess );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_process */

 /**
  * create the ui element for field id_phase
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_phase( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysProcessPhase_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysProcessPhase not exists' );

      Log::warn('Looks like the Entity: WbfsysProcessPhase is missing');

      return;
    }


      //p: Window
      $objidWbfsysProcessPhase = $this->entity->getData('id_phase') ;

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

      $inputIdPhase = $this->view->newInput( 'input'.$this->prefix.'IdPhase', 'Window' );
      $inputIdPhase->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_phase]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_phase'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Phase (Process Status)', 'wbfsys.process_status.label' ),
      ));

      if( $this->assignedForm )
        $inputIdPhase->assignedForm = $this->assignedForm;

      $inputIdPhase->setWidth( 'medium' );

      $inputIdPhase->setData( $this->entity->getData( 'id_phase' )  );
      $inputIdPhase->setReadOnly( $this->isReadOnly( 'id_phase' ) );
      $inputIdPhase->setLabel( $this->view->i18n->l( 'Phase', 'wbfsys.process_status.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ProcessPhase.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_phase'.($this->suffix?'-'.$this->suffix:'');

      $inputIdPhase->setListUrl ( $listUrl );
      $inputIdPhase->setListIcon( 'control/connect.png' );
      $inputIdPhase->setEntityUrl( 'maintab.php?c=Wbfsys.ProcessPhase.edit' );
      $inputIdPhase->conEntity         = $entityWbfsysProcessPhase;
      $inputIdPhase->refresh           = $this->refresh;
      $inputIdPhase->serializeElement  = $this->sendElement;
      


      $inputIdPhase->view = $this->view;
      $inputIdPhase->buildJavascript( 'wgt-input-'.$this->keyName.'_id_phase'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdPhase );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_phase */

 /**
  * create the ui element for field id_start_node
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_start_node( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysProcessNode_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysProcessNode not exists' );

      Log::warn('Looks like the Entity: WbfsysProcessNode is missing');

      return;
    }


      //p: Window
      $objidWbfsysProcessNode = $this->entity->getData('id_start_node') ;

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

      $inputIdStartNode = $this->view->newInput( 'input'.$this->prefix.'IdStartNode', 'Window' );
      $inputIdStartNode->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_start_node]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_start_node'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Start Node (Process Status)', 'wbfsys.process_status.label' ),
      ));

      if( $this->assignedForm )
        $inputIdStartNode->assignedForm = $this->assignedForm;

      $inputIdStartNode->setWidth( 'medium' );

      $inputIdStartNode->setData( $this->entity->getData( 'id_start_node' )  );
      $inputIdStartNode->setReadOnly( $this->isReadOnly( 'id_start_node' ) );
      $inputIdStartNode->setLabel( $this->view->i18n->l( 'Start Node', 'wbfsys.process_status.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ProcessNode.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_start_node'.($this->suffix?'-'.$this->suffix:'');

      $inputIdStartNode->setListUrl ( $listUrl );
      $inputIdStartNode->setListIcon( 'control/connect.png' );
      $inputIdStartNode->setEntityUrl( 'maintab.php?c=Wbfsys.ProcessNode.edit' );
      $inputIdStartNode->conEntity         = $entityWbfsysProcessNode;
      $inputIdStartNode->refresh           = $this->refresh;
      $inputIdStartNode->serializeElement  = $this->sendElement;
      


      $inputIdStartNode->view = $this->view;
      $inputIdStartNode->buildJavascript( 'wgt-input-'.$this->keyName.'_id_start_node'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdStartNode );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_start_node */

 /**
  * create the ui element for field id_last_node
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_last_node( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysProcessNode_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysProcessNode not exists' );

      Log::warn('Looks like the Entity: WbfsysProcessNode is missing');

      return;
    }


      //p: Window
      $objidWbfsysProcessNode = $this->entity->getData('id_last_node') ;

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

      $inputIdLastNode = $this->view->newInput( 'input'.$this->prefix.'IdLastNode', 'Window' );
      $inputIdLastNode->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_last_node]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_last_node'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Last Node (Process Status)', 'wbfsys.process_status.label' ),
      ));

      if( $this->assignedForm )
        $inputIdLastNode->assignedForm = $this->assignedForm;

      $inputIdLastNode->setWidth( 'medium' );

      $inputIdLastNode->setData( $this->entity->getData( 'id_last_node' )  );
      $inputIdLastNode->setReadOnly( $this->isReadOnly( 'id_last_node' ) );
      $inputIdLastNode->setLabel( $this->view->i18n->l( 'Last Node', 'wbfsys.process_status.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ProcessNode.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_last_node'.($this->suffix?'-'.$this->suffix:'');

      $inputIdLastNode->setListUrl ( $listUrl );
      $inputIdLastNode->setListIcon( 'control/connect.png' );
      $inputIdLastNode->setEntityUrl( 'maintab.php?c=Wbfsys.ProcessNode.edit' );
      $inputIdLastNode->conEntity         = $entityWbfsysProcessNode;
      $inputIdLastNode->refresh           = $this->refresh;
      $inputIdLastNode->serializeElement  = $this->sendElement;
      


      $inputIdLastNode->view = $this->view;
      $inputIdLastNode->buildJavascript( 'wgt-input-'.$this->keyName.'_id_last_node'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdLastNode );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_last_node */

 /**
  * create the ui element for field id_actual_node
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_actual_node( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysProcessNode_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysProcessNode not exists' );

      Log::warn('Looks like the Entity: WbfsysProcessNode is missing');

      return;
    }


      //p: Window
      $objidWbfsysProcessNode = $this->entity->getData('id_actual_node') ;

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

      $inputIdActualNode = $this->view->newInput( 'input'.$this->prefix.'IdActualNode', 'Window' );
      $inputIdActualNode->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_actual_node]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_actual_node'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Actual Node (Process Status)', 'wbfsys.process_status.label' ),
      ));

      if( $this->assignedForm )
        $inputIdActualNode->assignedForm = $this->assignedForm;

      $inputIdActualNode->setWidth( 'medium' );

      $inputIdActualNode->setData( $this->entity->getData( 'id_actual_node' )  );
      $inputIdActualNode->setReadOnly( $this->isReadOnly( 'id_actual_node' ) );
      $inputIdActualNode->setLabel( $this->view->i18n->l( 'Actual Node', 'wbfsys.process_status.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ProcessNode.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_actual_node'.($this->suffix?'-'.$this->suffix:'');

      $inputIdActualNode->setListUrl ( $listUrl );
      $inputIdActualNode->setListIcon( 'control/connect.png' );
      $inputIdActualNode->setEntityUrl( 'maintab.php?c=Wbfsys.ProcessNode.edit' );
      $inputIdActualNode->conEntity         = $entityWbfsysProcessNode;
      $inputIdActualNode->refresh           = $this->refresh;
      $inputIdActualNode->serializeElement  = $this->sendElement;
      


      $inputIdActualNode->view = $this->view;
      $inputIdActualNode->buildJavascript( 'wgt-input-'.$this->keyName.'_id_actual_node'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdActualNode );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_actual_node */

 /**
  * create the ui element for field actual_node_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_actual_node_key( $params )
  {

      //tpl: class ui:text
      $inputActualNodeKey = $this->view->newInput( 'input'.$this->prefix.'ActualNodeKey' , 'Text' );
      $this->items['actual_node_key'] = $inputActualNodeKey;
      $inputActualNodeKey->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[actual_node_key]',
          'id'        => 'wgt-input-'.$this->keyName.'_actual_node_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Actual node key (Process Status)', 'wbfsys.process_status.label' ),
          'maxlength' => $this->entity->maxSize( 'actual_node_key' ),
        )
      );
      $inputActualNodeKey->setWidth( 'medium' );

      $inputActualNodeKey->setReadOnly( $this->isReadOnly( 'actual_node_key' ) );
      $inputActualNodeKey->setData( $this->entity->getSecure('actual_node_key') );
      $inputActualNodeKey->setLabel
      (
        $this->view->i18n->l( 'Actual node key', 'wbfsys.process_status.label' ),
        $this->entity->required( 'actual_node_key' )
      );

      $inputActualNodeKey->refresh           = $this->refresh;
      $inputActualNodeKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_actual_node_key */

 /**
  * create the ui element for field value_highest_node
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_value_highest_node( $params )
  {

      //tpl: class ui:int
      $inputValueHighestNode = $this->view->newInput( 'input'.$this->prefix.'ValueHighestNode' , 'Int' );
      $this->items['value_highest_node'] = $inputValueHighestNode;
      $inputValueHighestNode->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[value_highest_node]',
          'id'        => 'wgt-input-'.$this->keyName.'_value_highest_node'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Value Highest Node (Process Status)', 'wbfsys.process_status.label' ),
        )
      );
      $inputValueHighestNode->setWidth( 'medium' );

      $inputValueHighestNode->setReadOnly( $this->isReadOnly( 'value_highest_node' ) );
      $inputValueHighestNode->setData( $this->entity->getData( 'value_highest_node' ) );
      $inputValueHighestNode->setLabel
      (
        $this->view->i18n->l( 'Value Highest Node', 'wbfsys.process_status.label' ),
        $this->entity->required( 'value_highest_node' )
      );

      $inputValueHighestNode->refresh           = $this->refresh;
      $inputValueHighestNode->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_value_highest_node */

 /**
  * create the ui element for field id_end_node
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_end_node( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysProcessNode_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysProcessNode not exists' );

      Log::warn('Looks like the Entity: WbfsysProcessNode is missing');

      return;
    }


      //p: Window
      $objidWbfsysProcessNode = $this->entity->getData('id_end_node') ;

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

      $inputIdEndNode = $this->view->newInput( 'input'.$this->prefix.'IdEndNode', 'Window' );
      $inputIdEndNode->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_end_node]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_end_node'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for End Node (Process Status)', 'wbfsys.process_status.label' ),
      ));

      if( $this->assignedForm )
        $inputIdEndNode->assignedForm = $this->assignedForm;

      $inputIdEndNode->setWidth( 'medium' );

      $inputIdEndNode->setData( $this->entity->getData( 'id_end_node' )  );
      $inputIdEndNode->setReadOnly( $this->isReadOnly( 'id_end_node' ) );
      $inputIdEndNode->setLabel( $this->view->i18n->l( 'End Node', 'wbfsys.process_status.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ProcessNode.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_end_node'.($this->suffix?'-'.$this->suffix:'');

      $inputIdEndNode->setListUrl ( $listUrl );
      $inputIdEndNode->setListIcon( 'control/connect.png' );
      $inputIdEndNode->setEntityUrl( 'maintab.php?c=Wbfsys.ProcessNode.edit' );
      $inputIdEndNode->conEntity         = $entityWbfsysProcessNode;
      $inputIdEndNode->refresh           = $this->refresh;
      $inputIdEndNode->serializeElement  = $this->sendElement;
      


      $inputIdEndNode->view = $this->view;
      $inputIdEndNode->buildJavascript( 'wgt-input-'.$this->keyName.'_id_end_node'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdEndNode );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_end_node */

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
          'title'     => $this->view->i18n->l( 'Insert value for Entity (Process Status)', 'wbfsys.process_status.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Rowid (Process Status)', 'wbfsys.process_status.label' ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadOnly( $this->isReadOnly( 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel
      (
        $this->view->i18n->l( 'Rowid', 'wbfsys.process_status.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Time Created (Process Status)', 'wbfsys.process_status.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadOnly( true );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel
      (
        $this->view->i18n->l( 'Time Created', 'wbfsys.process_status.label' ),
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
        'title'     => $this->view->i18n->l( 'Insert value for Role Create (Process Status)', 'wbfsys.process_status.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadOnly( true );
      $inputMRoleCreate->setLabel( $this->view->i18n->l( 'Role Create', 'wbfsys.process_status.label' ) );


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
          'title'     => $this->view->i18n->l( 'Insert value for Time Changed (Process Status)', 'wbfsys.process_status.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadOnly( true );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel
      (
        $this->view->i18n->l( 'Time Changed', 'wbfsys.process_status.label' ),
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
        'title'     => $this->view->i18n->l( 'Insert value for Role Change (Process Status)', 'wbfsys.process_status.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadOnly( true );
      $inputMRoleChange->setLabel( $this->view->i18n->l( 'Role Change', 'wbfsys.process_status.label' ) );


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
          'title'     => $this->view->i18n->l( 'Insert value for Version (Process Status)', 'wbfsys.process_status.label' ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadOnly( true );
      $inputMVersion->setData( $this->entity->getSecure('m_version') );
      $inputMVersion->setLabel
      (
        $this->view->i18n->l( 'Version', 'wbfsys.process_status.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Uuid (Process Status)', 'wbfsys.process_status.label' ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadOnly( true );
      $inputMUuid->setData( $this->entity->getSecure('m_uuid') );
      $inputMUuid->setLabel
      (
        $this->view->i18n->l( 'Uuid', 'wbfsys.process_status.label' ),
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
  * create the search element for field actual_node_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_actual_node_key( $params )
  {

      //tpl: class ui:text
      $inputActualNodeKey = $this->view->newInput( 'input'.$this->prefix.'ActualNodeKey' , 'Text' );
      $this->items['actual_node_key'] = $inputActualNodeKey;
      $inputActualNodeKey->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[actual_node_key]',
          'id'        => 'wgt-input-'.$this->keyName.'_actual_node_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_cname medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Actual node key (Process Status)', 'wbfsys.process_status.label' ),
          'maxlength' => $this->entity->maxSize( 'actual_node_key' ),
        )
      );
      $inputActualNodeKey->setWidth( 'medium' );

      $inputActualNodeKey->setReadOnly( $this->isReadOnly( 'actual_node_key' ) );
      $inputActualNodeKey->setData( $this->entity->getSecure('actual_node_key') );
      $inputActualNodeKey->setLabel
      (
        $this->view->i18n->l( 'Actual node key', 'wbfsys.process_status.label' ),
        $this->entity->required( 'actual_node_key' )
      );

      $inputActualNodeKey->refresh           = $this->refresh;
      $inputActualNodeKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );


  }//end public function search_actual_node_key */

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

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_process_status_m_role_create';

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

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_process_status_m_role_change';

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




}//end class WbfsysProcessStatus_Form */


