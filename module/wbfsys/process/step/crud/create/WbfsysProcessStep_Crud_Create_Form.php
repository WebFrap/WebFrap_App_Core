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
class WbfsysProcessStep_Crud_Create_Form
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
  public $namespace  = 'WbfsysProcessStep';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysProcessStep';

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
      'wbfsys_process_step' => array
      (
        'id_from' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_to' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_type' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_process_instance' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'comment' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'rate' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '5.2',
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
   * @var WbfsysProcessStep_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysProcessStep_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysProcessStep_Entity $entity
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
      'wbfsys_process_step' => array
      (
        'id_from',
        'id_to',
        'id_type',
        'id_process_instance',
        'comment',
        'rate',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysProcessStep entity
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
    $this->view->addVar( 'entityWbfsysProcessStep', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_process_step'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_process_step[id_wbfsys_process_step-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysProcessStep_IdFrom( $params );
    $this->input_WbfsysProcessStep_IdTo( $params );
    $this->input_WbfsysProcessStep_IdType( $params );
    $this->input_WbfsysProcessStep_IdProcessInstance( $params );
    $this->input_WbfsysProcessStep_Comment( $params );
    $this->input_WbfsysProcessStep_Rate( $params );
    $this->input_WbfsysProcessStep_Rowid( $params );
    $this->input_WbfsysProcessStep_MTimeCreated( $params );
    $this->input_WbfsysProcessStep_MRoleCreate( $params );
    $this->input_WbfsysProcessStep_MTimeChanged( $params );
    $this->input_WbfsysProcessStep_MRoleChange( $params );
    $this->input_WbfsysProcessStep_MVersion( $params );
    $this->input_WbfsysProcessStep_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field id_from
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStep_IdFrom( $params )
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
      $objidWbfsysProcessNode = $this->entity->getData( 'id_from' ) ;

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

      $inputIdFrom = $this->view->newInput( 'inputWbfsysProcessStepIdFrom', 'Window' );
      $this->items['wbfsys_process_step-id_from'] = $inputIdFrom;
      $inputIdFrom->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_step[id_from]',
        'id'        => 'wgt-input-wbfsys_process_step_id_from'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'From', 'src' => 'Process Step' ) ),
      ));

      if( $this->assignedForm )
        $inputIdFrom->assignedForm = $this->assignedForm;

      $inputIdFrom->setWidth( 'medium' );

      $inputIdFrom->setData( $this->entity->getData( 'id_from' )  );
      $inputIdFrom->setReadonly( $this->fieldReadOnly( 'wbfsys_process_step', 'id_from' ) );
      $inputIdFrom->setRequired( $this->fieldRequired( 'wbfsys_process_step', 'id_from' ) );
      $inputIdFrom->setLabel( $i18n->l( 'From', 'wbfsys.process_step.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ProcessNode.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_step_id_from'.($this->suffix?'-'.$this->suffix:'');

      $inputIdFrom->setListUrl ( $listUrl );
      $inputIdFrom->setListIcon( 'control/connect.png' );
      $inputIdFrom->setEntityUrl( 'maintab.php?c=Wbfsys.ProcessNode.edit' );
      $inputIdFrom->conEntity         = $entityWbfsysProcessNode;
      $inputIdFrom->refresh           = $this->refresh;
      $inputIdFrom->serializeElement  = $this->sendElement;



      $inputIdFrom->view = $this->view;
      $inputIdFrom->buildJavascript( 'wgt-input-wbfsys_process_step_id_from'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdFrom );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProcessStep_IdFrom */

 /**
  * create the ui element for field id_to
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStep_IdTo( $params )
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
      $objidWbfsysProcessNode = $this->entity->getData( 'id_to' ) ;

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

      $inputIdTo = $this->view->newInput( 'inputWbfsysProcessStepIdTo', 'Window' );
      $this->items['wbfsys_process_step-id_to'] = $inputIdTo;
      $inputIdTo->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_step[id_to]',
        'id'        => 'wgt-input-wbfsys_process_step_id_to'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'To', 'src' => 'Process Step' ) ),
      ));

      if( $this->assignedForm )
        $inputIdTo->assignedForm = $this->assignedForm;

      $inputIdTo->setWidth( 'medium' );

      $inputIdTo->setData( $this->entity->getData( 'id_to' )  );
      $inputIdTo->setReadonly( $this->fieldReadOnly( 'wbfsys_process_step', 'id_to' ) );
      $inputIdTo->setRequired( $this->fieldRequired( 'wbfsys_process_step', 'id_to' ) );
      $inputIdTo->setLabel( $i18n->l( 'To', 'wbfsys.process_step.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ProcessNode.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_step_id_to'.($this->suffix?'-'.$this->suffix:'');

      $inputIdTo->setListUrl ( $listUrl );
      $inputIdTo->setListIcon( 'control/connect.png' );
      $inputIdTo->setEntityUrl( 'maintab.php?c=Wbfsys.ProcessNode.edit' );
      $inputIdTo->conEntity         = $entityWbfsysProcessNode;
      $inputIdTo->refresh           = $this->refresh;
      $inputIdTo->serializeElement  = $this->sendElement;



      $inputIdTo->view = $this->view;
      $inputIdTo->buildJavascript( 'wgt-input-wbfsys_process_step_id_to'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdTo );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProcessStep_IdTo */

 /**
  * create the ui element for field id_type
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStep_IdType( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_process_step_id_type'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysProcessStepType_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysProcessStepType_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysProcessStepType_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdType = $this->view->newItem( 'inputWbfsysProcessStepIdType', 'WbfsysProcessStepType_Selectbox' );
      $this->items['wbfsys_process_step-id_type'] = $inputIdType;
      $inputIdType->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_step[id_type]',
          'id'        => 'wgt-input-wbfsys_process_step_id_type'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Type', 'src' => 'Process Step' ) ),
        )
      );
      $inputIdType->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdType->assignedForm = $this->assignedForm;

      $inputIdType->setActive( $this->entity->getData( 'id_type' ) );
      $inputIdType->setReadonly( $this->fieldReadOnly( 'wbfsys_process_step', 'id_type' ) );
      $inputIdType->setRequired( $this->fieldRequired( 'wbfsys_process_step', 'id_type' ) );


      $inputIdType->setLabel( $i18n->l( 'Type', 'wbfsys.process_step.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_process_step_type:insert' ) )
      {
        $inputIdType->refresh           = $this->refresh;
        $inputIdType->serializeElement  = $this->sendElement;
        $inputIdType->editUrl = 'index.php?c=Wbfsys.ProcessStepType.listing&amp;target='.$this->namespace.'&amp;field=id_type&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_process_step_id_type'.$this->suffix;
      }
      // set an empty first entry
      $inputIdType->setFirstFree( 'No Type selected' );

      
      $queryIdType = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_process_step_id_type'] ) )
      {
      
        $queryIdType = $this->db->newQuery( 'WbfsysProcessStepType_Selectbox' );

        $queryIdType->fetchSelectbox();
        $inputIdType->setData( $queryIdType->getAll() );
      
      }
      else
      {
        $inputIdType->setData( $this->listElementData['wbfsys_process_step_id_type'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdType )
        $queryIdType = $this->db->newQuery( 'WbfsysProcessStepType_Selectbox' );
      
      $inputIdType->loadActive = function( $activeId ) use ( $queryIdType ){
 
        return $queryIdType->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProcessStep_IdType */

 /**
  * create the ui element for field id_process_instance
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStep_IdProcessInstance( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysProcessStatus_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysProcessStatus not exists' );

      Log::warn( 'Looks like the Entity: WbfsysProcessStatus is missing' );

      return;
    }


      //p: Window
      $objidWbfsysProcessStatus = $this->entity->getData( 'id_process_instance' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysProcessStatus
          || !$entityWbfsysProcessStatus = $this->db->orm->get
          (
            'WbfsysProcessStatus',
            $objidWbfsysProcessStatus
          )
      )
      {
        $entityWbfsysProcessStatus = $this->db->orm->newEntity( 'WbfsysProcessStatus' );
      }

      $inputIdProcessInstance = $this->view->newInput( 'inputWbfsysProcessStepIdProcessInstance', 'Window' );
      $this->items['wbfsys_process_step-id_process_instance'] = $inputIdProcessInstance;
      $inputIdProcessInstance->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_step[id_process_instance]',
        'id'        => 'wgt-input-wbfsys_process_step_id_process_instance'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Process Instance', 'src' => 'Process Step' ) ),
      ));

      if( $this->assignedForm )
        $inputIdProcessInstance->assignedForm = $this->assignedForm;

      $inputIdProcessInstance->setWidth( 'medium' );

      $inputIdProcessInstance->setData( $this->entity->getData( 'id_process_instance' )  );
      $inputIdProcessInstance->setReadonly( $this->fieldReadOnly( 'wbfsys_process_step', 'id_process_instance' ) );
      $inputIdProcessInstance->setRequired( $this->fieldRequired( 'wbfsys_process_step', 'id_process_instance' ) );
      $inputIdProcessInstance->setLabel( $i18n->l( 'Process Instance', 'wbfsys.process_step.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ProcessStatus.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_step_id_process_instance'.($this->suffix?'-'.$this->suffix:'');

      $inputIdProcessInstance->setListUrl ( $listUrl );
      $inputIdProcessInstance->setListIcon( 'control/connect.png' );
      $inputIdProcessInstance->setEntityUrl( 'maintab.php?c=Wbfsys.ProcessStatus.edit' );
      $inputIdProcessInstance->conEntity         = $entityWbfsysProcessStatus;
      $inputIdProcessInstance->refresh           = $this->refresh;
      $inputIdProcessInstance->serializeElement  = $this->sendElement;



      $inputIdProcessInstance->view = $this->view;
      $inputIdProcessInstance->buildJavascript( 'wgt-input-wbfsys_process_step_id_process_instance'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdProcessInstance );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProcessStep_IdProcessInstance */

 /**
  * create the ui element for field comment
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStep_Comment( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputComment = $this->view->newInput( 'inputWbfsysProcessStepComment', 'Textarea' );
      $this->items['wbfsys_process_step-comment'] = $inputComment;
      $inputComment->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_process_step[comment]',
          'id'    => 'wgt-input-wbfsys_process_step_comment'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip large medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Comment', 'src' => 'Process Step' ) ),
        )
      );
      $inputComment->setWidth( 'large' );


      $inputComment->setReadonly( $this->fieldReadOnly( 'wbfsys_process_step', 'comment' ) );
      $inputComment->setRequired( $this->fieldRequired( 'wbfsys_process_step', 'comment' ) );

      $inputComment->setData( $this->entity->getSecure( 'comment' ) );
      $inputComment->setLabel( $i18n->l( 'Comment', 'wbfsys.process_step.label' ) );

      $inputComment->refresh           = $this->refresh;
      $inputComment->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Comment' ,
        true
      );


  }//end public function input_WbfsysProcessStep_Comment */

 /**
  * create the ui element for field rate
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStep_Rate( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:ratingbar
      $inputRate = $this->view->newInput( 'inputWbfsysProcessStepRate' , 'Ratingbar' );
      $this->items['wbfsys_process_step-rate'] = $inputRate;
      $inputRate->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_step[rate]',
          'id'        => 'wgt-input-wbfsys_process_step_rate'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_numeric medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rating', 'src' => 'Process Step' ) ),
        )
      );
      $inputRate->setWidth( 'medium' );


      $inputRate->setReadonly( $this->fieldReadOnly( 'wbfsys_process_step', 'rate' ) );
      $inputRate->setRequired( $this->fieldRequired( 'wbfsys_process_step', 'rate' ) );
      $inputRate->setData( $this->entity->getData( 'rate' ) );
      $inputRate->setLabel( $i18n->l( 'Rating', 'wbfsys.process_step.label' ) );

      $inputRate->refresh           = $this->refresh;
      $inputRate->serializeElement  = $this->sendElement;

      $this->view->addJsItem( 'inputWbfsysProcessStepRate' );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProcessStep_Rate */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStep_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysProcessStepRowid' , 'int' );
      $this->items['wbfsys_process_step-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_step[rowid]',
          'id'        => 'wgt-input-wbfsys_process_step_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Process Step' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_process_step', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_process_step', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.process_step.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProcessStep_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStep_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysProcessStepMTimeCreated' , 'Date' );
      $this->items['wbfsys_process_step-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_step[m_time_created]',
          'id'        => 'wgt-input-wbfsys_process_step_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Process Step' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_process_step', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_process_step', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.process_step.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysProcessStep_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStep_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysProcessStepMRoleCreate', 'Window' );
      $this->items['wbfsys_process_step-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_step[m_role_create]',
        'id'        => 'wgt-input-wbfsys_process_step_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Process Step' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_process_step', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_process_step', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.process_step.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_step_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_process_step_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysProcessStep_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStep_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysProcessStepMTimeChanged' , 'Date' );
      $this->items['wbfsys_process_step-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_step[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_process_step_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Process Step' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_process_step', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_process_step', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.process_step.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysProcessStep_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStep_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysProcessStepMRoleChange', 'Window' );
      $this->items['wbfsys_process_step-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_process_step[m_role_change]',
        'id'        => 'wgt-input-wbfsys_process_step_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Process Step' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_process_step', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_process_step', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.process_step.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_process_step_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_process_step_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysProcessStep_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStep_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysProcessStepMVersion' , 'int' );
      $this->items['wbfsys_process_step-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_step[m_version]',
          'id'        => 'wgt-input-wbfsys_process_step_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Process Step' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_process_step', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_process_step', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.process_step.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProcessStep_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProcessStep_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysProcessStepMUuid' , 'Text' );
      $this->items['wbfsys_process_step-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_process_step[m_uuid]',
          'id'        => 'wgt-input-wbfsys_process_step_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Process Step' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_process_step', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_process_step', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.process_step.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProcessStep_MUuid */

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
      $orm->getValidationData( 'WbfsysProcessStep', array_keys( $this->fields['wbfsys_process_step']), true ),
      $orm->getErrorMessages( 'WbfsysProcessStep' ),
      'wbfsys_process_step'
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


}//end class WbfsysProcessStep_Crud_Create_Form */


