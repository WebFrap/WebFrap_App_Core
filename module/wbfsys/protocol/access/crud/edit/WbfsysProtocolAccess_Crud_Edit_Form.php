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
class WbfsysProtocolAccess_Crud_Edit_Form
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
  public $namespace  = 'WbfsysProtocolAccess';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysProtocolAccess';

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
      'wbfsys_protocol_access' => array
      (
        'vid' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'label' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'id_mask' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'counter' => array
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
      ),

  );

  /**
   * Die Haupt Entity für das Formular
   *
   * @var WbfsysProtocolAccess_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysProtocolAccess_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysProtocolAccess_Entity $entity
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
      'wbfsys_protocol_access' => array
      (
        'vid',
        'label',
        'id_mask',
        'counter',
        'id_vid_entity',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysProtocolAccess entity
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
    $this->view->addVar( 'entityWbfsysProtocolAccess', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_protocol_access'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_protocol_access[id_wbfsys_protocol_access-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysProtocolAccess_Vid( $params );
    $this->input_WbfsysProtocolAccess_Label( $params );
    $this->input_WbfsysProtocolAccess_IdMask( $params );
    $this->input_WbfsysProtocolAccess_Counter( $params );
    $this->input_WbfsysProtocolAccess_IdVidEntity( $params );
    $this->input_WbfsysProtocolAccess_Rowid( $params );
    $this->input_WbfsysProtocolAccess_MTimeCreated( $params );
    $this->input_WbfsysProtocolAccess_MRoleCreate( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolAccess_Vid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputVid = $this->view->newInput( 'inputWbfsysProtocolAccessVid', 'Hidden' );
      $this->items['wbfsys_protocol_access-vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_protocol_access[vid]',
          'id'        => 'wgt-input-wbfsys_protocol_access_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'VID', 'src' => 'Protocol Access' ) ),
          'maxlength' => $this->entity->maxSize( 'vid' ),
        )
      );
      $inputVid->setWidth( 'medium' );

      $inputVid->setData( $this->entity->getSecure( 'vid' ) );
      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysProtocolAccess_Vid */

 /**
  * create the ui element for field label
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolAccess_Label( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputLabel = $this->view->newInput( 'inputWbfsysProtocolAccessLabel' , 'Text' );
      $this->items['wbfsys_protocol_access-label'] = $inputLabel;
      $inputLabel->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_protocol_access[label]',
          'id'        => 'wgt-input-wbfsys_protocol_access_label'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Label', 'src' => 'Protocol Access' ) ),
          'maxlength' => $this->entity->maxSize( 'label' ),
        )
      );
      $inputLabel->setWidth( 'medium' );

      $inputLabel->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_access', 'label' ) );
      $inputLabel->setRequired( $this->fieldRequired( 'wbfsys_protocol_access', 'label' ) );
      $inputLabel->setData( $this->entity->getSecure('label') );
      $inputLabel->setLabel( $i18n->l( 'Label', 'wbfsys.protocol_access.label' ) );

      $inputLabel->refresh           = $this->refresh;
      $inputLabel->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProtocolAccess_Label */

 /**
  * create the ui element for field id_mask
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolAccess_IdMask( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysMask_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysMask not exists' );

      Log::warn( 'Looks like the Entity: WbfsysMask is missing' );

      return;
    }


      //p: Window
      $objidWbfsysMask = $this->entity->getData( 'id_mask' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysMask
          || !$entityWbfsysMask = $this->db->orm->get
          (
            'WbfsysMask',
            $objidWbfsysMask
          )
      )
      {
        $entityWbfsysMask = $this->db->orm->newEntity( 'WbfsysMask' );
      }

      $inputIdMask = $this->view->newInput( 'inputWbfsysProtocolAccessIdMask', 'Window' );
      $this->items['wbfsys_protocol_access-id_mask'] = $inputIdMask;
      $inputIdMask->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_protocol_access[id_mask]',
        'id'        => 'wgt-input-wbfsys_protocol_access_id_mask'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Mask', 'src' => 'Protocol Access' ) ),
      ));

      if( $this->assignedForm )
        $inputIdMask->assignedForm = $this->assignedForm;

      $inputIdMask->setWidth( 'medium' );

      $inputIdMask->setData( $this->entity->getData( 'id_mask' )  );
      $inputIdMask->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_access', 'id_mask' ) );
      $inputIdMask->setRequired( $this->fieldRequired( 'wbfsys_protocol_access', 'id_mask' ) );
      $inputIdMask->setLabel( $i18n->l( 'Mask', 'wbfsys.protocol_access.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Mask.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_protocol_access_id_mask'.($this->suffix?'-'.$this->suffix:'');

      $inputIdMask->setListUrl ( $listUrl );
      $inputIdMask->setListIcon( 'control/connect.png' );
      $inputIdMask->setEntityUrl( 'maintab.php?c=Wbfsys.Mask.edit' );
      $inputIdMask->conEntity         = $entityWbfsysMask;
      $inputIdMask->refresh           = $this->refresh;
      $inputIdMask->serializeElement  = $this->sendElement;


        $inputIdMask->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.Mask.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdMask->view = $this->view;
      $inputIdMask->buildJavascript( 'wgt-input-wbfsys_protocol_access_id_mask'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdMask );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProtocolAccess_IdMask */

 /**
  * create the ui element for field counter
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolAccess_Counter( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputCounter = $this->view->newInput( 'inputWbfsysProtocolAccessCounter', 'Int' );
      $this->items['wbfsys_protocol_access-counter'] = $inputCounter;
      $inputCounter->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_protocol_access[counter]',
          'id'        => 'wgt-input-wbfsys_protocol_access_counter'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Counter', 'src' => 'Protocol Access' ) ),
        )
      );
      $inputCounter->setWidth( 'medium' );

$inputCounter->setReadOnly( $this->fieldReadOnly( 'wbfsys_protocol_access', 'counter' ) );
      $inputCounter->setRequired( $this->fieldRequired( 'wbfsys_protocol_access', 'counter' ) );
      $inputCounter->setData( $this->entity->getData( 'counter' ) );
      $inputCounter->setLabel( $i18n->l( 'Counter', 'wbfsys.protocol_access.label' ) );

      $inputCounter->refresh           = $this->refresh;
      $inputCounter->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProtocolAccess_Counter */

 /**
  * create the ui element for field id_vid_entity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolAccess_IdVidEntity( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdVidEntity = $this->view->newInput( 'inputWbfsysProtocolAccessIdVidEntity', 'Hidden' );
      $this->items['wbfsys_protocol_access-id_vid_entity'] = $inputIdVidEntity;
      $inputIdVidEntity->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_protocol_access[id_vid_entity]',
          'id'        => 'wgt-input-wbfsys_protocol_access_id_vid_entity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Entity', 'src' => 'Protocol Access' ) ),
          'maxlength' => $this->entity->maxSize( 'id_vid_entity' ),
        )
      );
      $inputIdVidEntity->setWidth( 'medium' );

      $inputIdVidEntity->setData( $this->entity->getSecure( 'id_vid_entity' ) );
      $inputIdVidEntity->refresh           = $this->refresh;
      $inputIdVidEntity->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysProtocolAccess_IdVidEntity */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolAccess_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysProtocolAccessRowid' , 'int' );
      $this->items['wbfsys_protocol_access-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_protocol_access[rowid]',
          'id'        => 'wgt-input-wbfsys_protocol_access_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Protocol Access' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_access', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_protocol_access', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.protocol_access.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProtocolAccess_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolAccess_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysProtocolAccessMTimeCreated' , 'Date' );
      $this->items['wbfsys_protocol_access-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_protocol_access[m_time_created]',
          'id'        => 'wgt-input-wbfsys_protocol_access_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Protocol Access' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_access', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_protocol_access', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.protocol_access.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysProtocolAccess_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolAccess_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysProtocolAccessMRoleCreate', 'Window' );
      $this->items['wbfsys_protocol_access-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_protocol_access[m_role_create]',
        'id'        => 'wgt-input-wbfsys_protocol_access_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Protocol Access' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_access', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_protocol_access', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.protocol_access.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_protocol_access_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_protocol_access_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysProtocolAccess_MRoleCreate */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysProtocolAccess_Crud_Edit_Form */


