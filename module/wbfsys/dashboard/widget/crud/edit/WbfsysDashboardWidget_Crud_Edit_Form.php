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
class WbfsysDashboardWidget_Crud_Edit_Form
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
  public $namespace  = 'WbfsysDashboardWidget';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysDashboardWidget';

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
      'wbfsys_dashboard_widget' => array
      (
        'vid' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'pos_x' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'pos_y' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'num_entries' => array
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
        'id_dashboard' => array
        ( 
          'required'  => true, 
          'readonly'  => true, 
          'lenght'    => '',
        ),
        'id_widget' => array
        ( 
          'required'  => true, 
          'readonly'  => true, 
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
   * @var WbfsysDashboardWidget_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysDashboardWidget_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysDashboardWidget_Entity $entity
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
      'wbfsys_dashboard_widget' => array
      (
        'vid',
        'pos_x',
        'pos_y',
        'num_entries',
        'id_vid_entity',
        'id_dashboard',
        'id_widget',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysDashboardWidget entity
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
    $this->view->addVar( 'entityWbfsysDashboardWidget', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_dashboard_widget'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_dashboard_widget[id_wbfsys_dashboard_widget-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysDashboardWidget_Vid( $params );
    $this->input_WbfsysDashboardWidget_PosX( $params );
    $this->input_WbfsysDashboardWidget_PosY( $params );
    $this->input_WbfsysDashboardWidget_NumEntries( $params );
    $this->input_WbfsysDashboardWidget_IdVidEntity( $params );
    $this->input_WbfsysDashboardWidget_IdDashboard( $params );
    $this->input_WbfsysDashboardWidget_IdWidget( $params );
    $this->input_WbfsysDashboardWidget_Rowid( $params );
    $this->input_WbfsysDashboardWidget_MTimeCreated( $params );
    $this->input_WbfsysDashboardWidget_MRoleCreate( $params );
    $this->input_WbfsysDashboardWidget_MTimeChanged( $params );
    $this->input_WbfsysDashboardWidget_MRoleChange( $params );
    $this->input_WbfsysDashboardWidget_MVersion( $params );
    $this->input_WbfsysDashboardWidget_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDashboardWidget_Vid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputVid = $this->view->newInput( 'inputWbfsysDashboardWidgetVid', 'Hidden' );
      $this->items['wbfsys_dashboard_widget-vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_dashboard_widget[vid]',
          'id'        => 'wgt-input-wbfsys_dashboard_widget_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'VID', 'src' => 'Dashboard Widget' ) ),
          'maxlength' => $this->entity->maxSize( 'vid' ),
        )
      );
      $inputVid->setWidth( 'medium' );

      $inputVid->setData( $this->entity->getSecure( 'vid' ) );
      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysDashboardWidget_Vid */

 /**
  * create the ui element for field pos_x
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDashboardWidget_PosX( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputPosX = $this->view->newInput( 'inputWbfsysDashboardWidgetPosX', 'Int' );
      $this->items['wbfsys_dashboard_widget-pos_x'] = $inputPosX;
      $inputPosX->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_dashboard_widget[pos_x]',
          'id'        => 'wgt-input-wbfsys_dashboard_widget_pos_x'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Pos X', 'src' => 'Dashboard Widget' ) ),
        )
      );
      $inputPosX->setWidth( 'medium' );

$inputPosX->setReadOnly( $this->fieldReadOnly( 'wbfsys_dashboard_widget', 'pos_x' ) );
      $inputPosX->setRequired( $this->fieldRequired( 'wbfsys_dashboard_widget', 'pos_x' ) );
      $inputPosX->setData( $this->entity->getData( 'pos_x' ) );
      $inputPosX->setLabel( $i18n->l( 'Pos X', 'wbfsys.dashboard_widget.label' ) );

      $inputPosX->refresh           = $this->refresh;
      $inputPosX->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysDashboardWidget_PosX */

 /**
  * create the ui element for field pos_y
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDashboardWidget_PosY( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputPosY = $this->view->newInput( 'inputWbfsysDashboardWidgetPosY', 'Int' );
      $this->items['wbfsys_dashboard_widget-pos_y'] = $inputPosY;
      $inputPosY->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_dashboard_widget[pos_y]',
          'id'        => 'wgt-input-wbfsys_dashboard_widget_pos_y'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Pos Y', 'src' => 'Dashboard Widget' ) ),
        )
      );
      $inputPosY->setWidth( 'medium' );

$inputPosY->setReadOnly( $this->fieldReadOnly( 'wbfsys_dashboard_widget', 'pos_y' ) );
      $inputPosY->setRequired( $this->fieldRequired( 'wbfsys_dashboard_widget', 'pos_y' ) );
      $inputPosY->setData( $this->entity->getData( 'pos_y' ) );
      $inputPosY->setLabel( $i18n->l( 'Pos Y', 'wbfsys.dashboard_widget.label' ) );

      $inputPosY->refresh           = $this->refresh;
      $inputPosY->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysDashboardWidget_PosY */

 /**
  * create the ui element for field num_entries
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDashboardWidget_NumEntries( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputNumEntries = $this->view->newInput( 'inputWbfsysDashboardWidgetNumEntries', 'Int' );
      $this->items['wbfsys_dashboard_widget-num_entries'] = $inputNumEntries;
      $inputNumEntries->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_dashboard_widget[num_entries]',
          'id'        => 'wgt-input-wbfsys_dashboard_widget_num_entries'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Num Entries', 'src' => 'Dashboard Widget' ) ),
        )
      );
      $inputNumEntries->setWidth( 'medium' );

$inputNumEntries->setReadOnly( $this->fieldReadOnly( 'wbfsys_dashboard_widget', 'num_entries' ) );
      $inputNumEntries->setRequired( $this->fieldRequired( 'wbfsys_dashboard_widget', 'num_entries' ) );
      $inputNumEntries->setData( $this->entity->getData( 'num_entries' ) );
      $inputNumEntries->setLabel( $i18n->l( 'Num Entries', 'wbfsys.dashboard_widget.label' ) );

      $inputNumEntries->refresh           = $this->refresh;
      $inputNumEntries->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysDashboardWidget_NumEntries */

 /**
  * create the ui element for field id_vid_entity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDashboardWidget_IdVidEntity( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdVidEntity = $this->view->newInput( 'inputWbfsysDashboardWidgetIdVidEntity', 'Hidden' );
      $this->items['wbfsys_dashboard_widget-id_vid_entity'] = $inputIdVidEntity;
      $inputIdVidEntity->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_dashboard_widget[id_vid_entity]',
          'id'        => 'wgt-input-wbfsys_dashboard_widget_id_vid_entity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Entity', 'src' => 'Dashboard Widget' ) ),
          'maxlength' => $this->entity->maxSize( 'id_vid_entity' ),
        )
      );
      $inputIdVidEntity->setWidth( 'medium' );

      $inputIdVidEntity->setData( $this->entity->getSecure( 'id_vid_entity' ) );
      $inputIdVidEntity->refresh           = $this->refresh;
      $inputIdVidEntity->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysDashboardWidget_IdVidEntity */

 /**
  * create the ui element for field id_dashboard
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDashboardWidget_IdDashboard( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysDashboard_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysDashboard not exists' );

      Log::warn( 'Looks like the Entity: WbfsysDashboard is missing' );

      return;
    }


      //p: Window
      $objidWbfsysDashboard = $this->entity->getData( 'id_dashboard' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysDashboard
          || !$entityWbfsysDashboard = $this->db->orm->get
          (
            'WbfsysDashboard',
            $objidWbfsysDashboard
          )
      )
      {
        $entityWbfsysDashboard = $this->db->orm->newEntity( 'WbfsysDashboard' );
      }

      $inputIdDashboard = $this->view->newInput( 'inputWbfsysDashboardWidgetIdDashboard', 'Window' );
      $this->items['wbfsys_dashboard_widget-id_dashboard'] = $inputIdDashboard;
      $inputIdDashboard->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_dashboard_widget[id_dashboard]',
        'id'        => 'wgt-input-wbfsys_dashboard_widget_id_dashboard'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Dashboard', 'src' => 'Dashboard Widget' ) ),
      ));

      if( $this->assignedForm )
        $inputIdDashboard->assignedForm = $this->assignedForm;

      $inputIdDashboard->setWidth( 'medium' );

      $inputIdDashboard->setData( $this->entity->getData( 'id_dashboard' )  );
      $inputIdDashboard->setReadonly( $this->fieldReadOnly( 'wbfsys_dashboard_widget', 'id_dashboard' ) );
      $inputIdDashboard->setRequired( $this->fieldRequired( 'wbfsys_dashboard_widget', 'id_dashboard' ) );
      $inputIdDashboard->setLabel( $i18n->l( 'Dashboard', 'wbfsys.dashboard_widget.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Dashboard.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_dashboard_widget_id_dashboard'.($this->suffix?'-'.$this->suffix:'');

      $inputIdDashboard->setListUrl ( $listUrl );
      $inputIdDashboard->setListIcon( 'control/connect.png' );
      $inputIdDashboard->setEntityUrl( 'maintab.php?c=Wbfsys.Dashboard.edit' );
      $inputIdDashboard->conEntity         = $entityWbfsysDashboard;
      $inputIdDashboard->refresh           = $this->refresh;
      $inputIdDashboard->serializeElement  = $this->sendElement;



      $inputIdDashboard->view = $this->view;
      $inputIdDashboard->buildJavascript( 'wgt-input-wbfsys_dashboard_widget_id_dashboard'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdDashboard );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysDashboardWidget_IdDashboard */

 /**
  * create the ui element for field id_widget
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDashboardWidget_IdWidget( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysMenuEntry_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysMenuEntry not exists' );

      Log::warn( 'Looks like the Entity: WbfsysMenuEntry is missing' );

      return;
    }


      //p: Window
      $objidWbfsysMenuEntry = $this->entity->getData( 'id_widget' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysMenuEntry
          || !$entityWbfsysMenuEntry = $this->db->orm->get
          (
            'WbfsysMenuEntry',
            $objidWbfsysMenuEntry
          )
      )
      {
        $entityWbfsysMenuEntry = $this->db->orm->newEntity( 'WbfsysMenuEntry' );
      }

      $inputIdWidget = $this->view->newInput( 'inputWbfsysDashboardWidgetIdWidget', 'Window' );
      $this->items['wbfsys_dashboard_widget-id_widget'] = $inputIdWidget;
      $inputIdWidget->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_dashboard_widget[id_widget]',
        'id'        => 'wgt-input-wbfsys_dashboard_widget_id_widget'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Widget', 'src' => 'Dashboard Widget' ) ),
      ));

      if( $this->assignedForm )
        $inputIdWidget->assignedForm = $this->assignedForm;

      $inputIdWidget->setWidth( 'medium' );

      $inputIdWidget->setData( $this->entity->getData( 'id_widget' )  );
      $inputIdWidget->setReadonly( $this->fieldReadOnly( 'wbfsys_dashboard_widget', 'id_widget' ) );
      $inputIdWidget->setRequired( $this->fieldRequired( 'wbfsys_dashboard_widget', 'id_widget' ) );
      $inputIdWidget->setLabel( $i18n->l( 'Widget', 'wbfsys.dashboard_widget.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.MenuEntry.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_dashboard_widget_id_widget'.($this->suffix?'-'.$this->suffix:'');

      $inputIdWidget->setListUrl ( $listUrl );
      $inputIdWidget->setListIcon( 'control/connect.png' );
      $inputIdWidget->setEntityUrl( 'maintab.php?c=Wbfsys.MenuEntry.edit' );
      $inputIdWidget->conEntity         = $entityWbfsysMenuEntry;
      $inputIdWidget->refresh           = $this->refresh;
      $inputIdWidget->serializeElement  = $this->sendElement;



      $inputIdWidget->view = $this->view;
      $inputIdWidget->buildJavascript( 'wgt-input-wbfsys_dashboard_widget_id_widget'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdWidget );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysDashboardWidget_IdWidget */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDashboardWidget_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysDashboardWidgetRowid' , 'int' );
      $this->items['wbfsys_dashboard_widget-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_dashboard_widget[rowid]',
          'id'        => 'wgt-input-wbfsys_dashboard_widget_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Dashboard Widget' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_dashboard_widget', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_dashboard_widget', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.dashboard_widget.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysDashboardWidget_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDashboardWidget_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysDashboardWidgetMTimeCreated' , 'Date' );
      $this->items['wbfsys_dashboard_widget-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_dashboard_widget[m_time_created]',
          'id'        => 'wgt-input-wbfsys_dashboard_widget_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Dashboard Widget' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_dashboard_widget', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_dashboard_widget', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.dashboard_widget.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysDashboardWidget_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDashboardWidget_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysDashboardWidgetMRoleCreate', 'Window' );
      $this->items['wbfsys_dashboard_widget-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_dashboard_widget[m_role_create]',
        'id'        => 'wgt-input-wbfsys_dashboard_widget_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Dashboard Widget' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_dashboard_widget', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_dashboard_widget', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.dashboard_widget.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_dashboard_widget_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_dashboard_widget_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysDashboardWidget_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDashboardWidget_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysDashboardWidgetMTimeChanged' , 'Date' );
      $this->items['wbfsys_dashboard_widget-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_dashboard_widget[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_dashboard_widget_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Dashboard Widget' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_dashboard_widget', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_dashboard_widget', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.dashboard_widget.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysDashboardWidget_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDashboardWidget_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysDashboardWidgetMRoleChange', 'Window' );
      $this->items['wbfsys_dashboard_widget-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_dashboard_widget[m_role_change]',
        'id'        => 'wgt-input-wbfsys_dashboard_widget_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Dashboard Widget' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_dashboard_widget', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_dashboard_widget', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.dashboard_widget.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_dashboard_widget_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_dashboard_widget_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysDashboardWidget_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDashboardWidget_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysDashboardWidgetMVersion' , 'int' );
      $this->items['wbfsys_dashboard_widget-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_dashboard_widget[m_version]',
          'id'        => 'wgt-input-wbfsys_dashboard_widget_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Dashboard Widget' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_dashboard_widget', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_dashboard_widget', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.dashboard_widget.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysDashboardWidget_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDashboardWidget_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysDashboardWidgetMUuid' , 'Text' );
      $this->items['wbfsys_dashboard_widget-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_dashboard_widget[m_uuid]',
          'id'        => 'wgt-input-wbfsys_dashboard_widget_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Dashboard Widget' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_dashboard_widget', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_dashboard_widget', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.dashboard_widget.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysDashboardWidget_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysDashboardWidget_Crud_Edit_Form */


