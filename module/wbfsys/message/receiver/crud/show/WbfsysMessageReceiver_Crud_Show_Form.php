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
class WbfsysMessageReceiver_Crud_Show_Form
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
  public $namespace  = 'WbfsysMessageReceiver';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysMessageReceiver';

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
      'wbfsys_message_receiver' => array
      (
        'id_status' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'visible' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'opened' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_message' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_receiver' => array
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
   * @var WbfsysMessageReceiver_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysMessageReceiver_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysMessageReceiver_Entity $entity
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
      'wbfsys_message_receiver' => array
      (
        'id_status',
        'visible',
        'opened',
        'id_message',
        'id_receiver',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysMessageReceiver entity
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
    $this->view->addVar( 'entityWbfsysMessageReceiver', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_message_receiver'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_message_receiver[id_wbfsys_message_receiver-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysMessageReceiver_IdStatus( $params );
    $this->input_WbfsysMessageReceiver_Visible( $params );
    $this->input_WbfsysMessageReceiver_Opened( $params );
    $this->input_WbfsysMessageReceiver_IdMessage( $params );
    $this->input_WbfsysMessageReceiver_IdReceiver( $params );
    $this->input_WbfsysMessageReceiver_Rowid( $params );
    $this->input_WbfsysMessageReceiver_MTimeCreated( $params );
    $this->input_WbfsysMessageReceiver_MRoleCreate( $params );
    $this->input_WbfsysMessageReceiver_MTimeChanged( $params );
    $this->input_WbfsysMessageReceiver_MRoleChange( $params );
    $this->input_WbfsysMessageReceiver_MVersion( $params );
    $this->input_WbfsysMessageReceiver_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field id_status
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReceiver_IdStatus( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_message_receiver_id_status'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysMessageStatus_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysMessageStatus_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysMessageStatus_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdStatus = $this->view->newItem( 'inputWbfsysMessageReceiverIdStatus', 'WbfsysMessageStatus_Selectbox' );
      $this->items['wbfsys_message_receiver-id_status'] = $inputIdStatus;
      $inputIdStatus->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_receiver[id_status]',
          'id'        => 'wgt-input-wbfsys_message_receiver_id_status'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Status', 'src' => 'Message Receiver' ) ),
        )
      );
      $inputIdStatus->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdStatus->assignedForm = $this->assignedForm;

      $inputIdStatus->setActive( $this->entity->getData( 'id_status' ) );
      $inputIdStatus->setReadonly( $this->fieldReadOnly( 'wbfsys_message_receiver', 'id_status' ) );
      $inputIdStatus->setRequired( $this->fieldRequired( 'wbfsys_message_receiver', 'id_status' ) );


      $inputIdStatus->setLabel( $i18n->l( 'Status', 'wbfsys.message_receiver.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdStatus->refresh           = $this->refresh;
        $inputIdStatus->serializeElement  = $this->sendElement;
        $inputIdStatus->editUrl = 'index.php?c=Wbfsys.MessageStatus.listing&amp;target='.$this->namespace.'&amp;field=id_status&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_message_receiver_id_status'.$this->suffix;
      }
      // set an empty first entry
      $inputIdStatus->setFirstFree( 'No Status selected' );

      
      $queryIdStatus = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_message_receiver_id_status'] ) )
      {
      
        $queryIdStatus = $this->db->newQuery( 'WbfsysMessageStatus_Selectbox' );

        $queryIdStatus->fetchSelectbox();
        $inputIdStatus->setData( $queryIdStatus->getAll() );
      
      }
      else
      {
        $inputIdStatus->setData( $this->listElementData['wbfsys_message_receiver_id_status'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdStatus )
        $queryIdStatus = $this->db->newQuery( 'WbfsysMessageStatus_Selectbox' );
      
      $inputIdStatus->loadActive = function( $activeId ) use ( $queryIdStatus ){
 
        return $queryIdStatus->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMessageReceiver_IdStatus */

 /**
  * create the ui element for field visible
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReceiver_Visible( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputVisible = $this->view->newInput( 'inputWbfsysMessageReceiverVisible', 'Checkbox' );
      $this->items['wbfsys_message_receiver-visible'] = $inputVisible;
      $inputVisible->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_receiver[visible]',
          'id'        => 'wgt-input-wbfsys_message_receiver_visible'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Visible', 'src' => 'Message Receiver' ) ),
        )
      );
      $inputVisible->setWidth( 'medium' );

      $inputVisible->setReadonly( $this->fieldReadOnly( 'wbfsys_message_receiver', 'visible' ) );
      $inputVisible->setRequired( $this->fieldRequired( 'wbfsys_message_receiver', 'visible' ) );
      $inputVisible->setActive( $this->entity->getBoolean( 'visible' ) );
      $inputVisible->setLabel( $i18n->l( 'Visible', 'wbfsys.message_receiver.label' ) );

      $inputVisible->refresh           = $this->refresh;
      $inputVisible->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMessageReceiver_Visible */

 /**
  * create the ui element for field opened
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReceiver_Opened( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:timestamp
      $inputOpened = $this->view->newInput( 'inputWbfsysMessageReceiverOpened', 'Timestamp' );
      $this->items['wbfsys_message_receiver-opened'] = $inputOpened;
      $inputOpened->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_receiver[opened]',
          'id'        => 'wgt-input-wbfsys_message_receiver_opened'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Opened', 'src' => 'Message Receiver' ) )
        )
      );
      $inputOpened->setWidth( 'medium' );

      $inputOpened->setReadonly( $this->fieldReadOnly( 'wbfsys_message_receiver', 'opened' ) );
      $inputOpened->setRequired( $this->fieldRequired( 'wbfsys_message_receiver', 'opened' ) );
      $inputOpened->setData
      (
        $this->entity->getTimestamp( 'opened' )
      );
      $inputOpened->setLabel( $i18n->l( 'Opened', 'wbfsys.message_receiver.label' ) );

      $inputOpened->refresh           = $this->refresh;
      $inputOpened->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMessageReceiver_Opened */

 /**
  * create the ui element for field id_message
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReceiver_IdMessage( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysMessage_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysMessage not exists' );

      Log::warn( 'Looks like the Entity: WbfsysMessage is missing' );

      return;
    }


      //p: Window
      $objidWbfsysMessage = $this->entity->getData( 'id_message' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysMessage
          || !$entityWbfsysMessage = $this->db->orm->get
          (
            'WbfsysMessage',
            $objidWbfsysMessage
          )
      )
      {
        $entityWbfsysMessage = $this->db->orm->newEntity( 'WbfsysMessage' );
      }

      $inputIdMessage = $this->view->newInput( 'inputWbfsysMessageReceiverIdMessage', 'Window' );
      $this->items['wbfsys_message_receiver-id_message'] = $inputIdMessage;
      $inputIdMessage->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message_receiver[id_message]',
        'id'        => 'wgt-input-wbfsys_message_receiver_id_message'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Message', 'src' => 'Message Receiver' ) ),
      ));

      if( $this->assignedForm )
        $inputIdMessage->assignedForm = $this->assignedForm;

      $inputIdMessage->setWidth( 'medium' );

      $inputIdMessage->setData( $this->entity->getData( 'id_message' )  );
      $inputIdMessage->setReadonly( $this->fieldReadOnly( 'wbfsys_message_receiver', 'id_message' ) );
      $inputIdMessage->setRequired( $this->fieldRequired( 'wbfsys_message_receiver', 'id_message' ) );
      $inputIdMessage->setLabel( $i18n->l( 'Message', 'wbfsys.message_receiver.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Message.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_receiver_id_message'.($this->suffix?'-'.$this->suffix:'');

      $inputIdMessage->setListUrl ( $listUrl );
      $inputIdMessage->setListIcon( 'control/connect.png' );
      $inputIdMessage->setEntityUrl( 'maintab.php?c=Wbfsys.Message.edit' );
      $inputIdMessage->conEntity         = $entityWbfsysMessage;
      $inputIdMessage->refresh           = $this->refresh;
      $inputIdMessage->serializeElement  = $this->sendElement;



      $inputIdMessage->view = $this->view;
      $inputIdMessage->buildJavascript( 'wgt-input-wbfsys_message_receiver_id_message'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdMessage );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMessageReceiver_IdMessage */

 /**
  * create the ui element for field id_receiver
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReceiver_IdReceiver( $params )
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
      $objidWbfsysRoleUser = $this->entity->getData( 'id_receiver' ) ;

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

      $inputIdReceiver = $this->view->newInput( 'inputWbfsysMessageReceiverIdReceiver', 'Window' );
      $this->items['wbfsys_message_receiver-id_receiver'] = $inputIdReceiver;
      $inputIdReceiver->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message_receiver[id_receiver]',
        'id'        => 'wgt-input-wbfsys_message_receiver_id_receiver'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Receiver', 'src' => 'Message Receiver' ) ),
      ));

      if( $this->assignedForm )
        $inputIdReceiver->assignedForm = $this->assignedForm;

      $inputIdReceiver->setWidth( 'medium' );

      $inputIdReceiver->setData( $this->entity->getData( 'id_receiver' )  );
      $inputIdReceiver->setReadonly( $this->fieldReadOnly( 'wbfsys_message_receiver', 'id_receiver' ) );
      $inputIdReceiver->setRequired( $this->fieldRequired( 'wbfsys_message_receiver', 'id_receiver' ) );
      $inputIdReceiver->setLabel( $i18n->l( 'Receiver', 'wbfsys.message_receiver.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_receiver_id_receiver'.($this->suffix?'-'.$this->suffix:'');

      $inputIdReceiver->setListUrl ( $listUrl );
      $inputIdReceiver->setListIcon( 'control/connect.png' );
      $inputIdReceiver->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.edit' );
      $inputIdReceiver->conEntity         = $entityWbfsysRoleUser;
      $inputIdReceiver->refresh           = $this->refresh;
      $inputIdReceiver->serializeElement  = $this->sendElement;


        $inputIdReceiver->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.RoleUser.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdReceiver->view = $this->view;
      $inputIdReceiver->buildJavascript( 'wgt-input-wbfsys_message_receiver_id_receiver'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdReceiver );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMessageReceiver_IdReceiver */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReceiver_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysMessageReceiverRowid' , 'int' );
      $this->items['wbfsys_message_receiver-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_receiver[rowid]',
          'id'        => 'wgt-input-wbfsys_message_receiver_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Message Receiver' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_message_receiver', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_message_receiver', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.message_receiver.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMessageReceiver_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReceiver_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysMessageReceiverMTimeCreated' , 'Date' );
      $this->items['wbfsys_message_receiver-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_receiver[m_time_created]',
          'id'        => 'wgt-input-wbfsys_message_receiver_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Message Receiver' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_message_receiver', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_message_receiver', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.message_receiver.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysMessageReceiver_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReceiver_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysMessageReceiverMRoleCreate', 'Window' );
      $this->items['wbfsys_message_receiver-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message_receiver[m_role_create]',
        'id'        => 'wgt-input-wbfsys_message_receiver_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Message Receiver' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_message_receiver', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_message_receiver', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.message_receiver.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_receiver_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_message_receiver_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysMessageReceiver_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReceiver_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysMessageReceiverMTimeChanged' , 'Date' );
      $this->items['wbfsys_message_receiver-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_receiver[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_message_receiver_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Message Receiver' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_message_receiver', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_message_receiver', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.message_receiver.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysMessageReceiver_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReceiver_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysMessageReceiverMRoleChange', 'Window' );
      $this->items['wbfsys_message_receiver-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message_receiver[m_role_change]',
        'id'        => 'wgt-input-wbfsys_message_receiver_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Message Receiver' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_message_receiver', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_message_receiver', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.message_receiver.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_receiver_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_message_receiver_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysMessageReceiver_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReceiver_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysMessageReceiverMVersion' , 'int' );
      $this->items['wbfsys_message_receiver-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_receiver[m_version]',
          'id'        => 'wgt-input-wbfsys_message_receiver_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Message Receiver' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_message_receiver', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_message_receiver', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.message_receiver.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMessageReceiver_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageReceiver_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysMessageReceiverMUuid' , 'Text' );
      $this->items['wbfsys_message_receiver-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_receiver[m_uuid]',
          'id'        => 'wgt-input-wbfsys_message_receiver_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Message Receiver' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_message_receiver', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_message_receiver', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.message_receiver.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMessageReceiver_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysMessageReceiver_Crud_Show_Form */


