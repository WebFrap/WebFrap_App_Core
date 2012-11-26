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
class WbfsysMessage_Crud_Show_Form
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
  public $namespace  = 'WbfsysMessage';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysMessage';

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
      'wbfsys_message' => array
      (
        'id_sender' => array
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
        'id_answer_to' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'message_id' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '100',
        ),
        'id_refer' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'priority' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'deliver_date' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'title' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'message' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_sender_status' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_receiver_status' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'flag_sender_deleted' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'flag_receiver_deleted' => array
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
   * @var WbfsysMessage_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysMessage_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysMessage_Entity $entity
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
      'wbfsys_message' => array
      (
        'id_sender',
        'id_receiver',
        'id_answer_to',
        'message_id',
        'id_refer',
        'priority',
        'deliver_date',
        'title',
        'message',
        'id_sender_status',
        'id_receiver_status',
        'flag_sender_deleted',
        'flag_receiver_deleted',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysMessage entity
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
    $this->view->addVar( 'entityWbfsysMessage', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_message'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_message[id_wbfsys_message-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysMessage_IdSender( $params );
    $this->input_WbfsysMessage_IdReceiver( $params );
    $this->input_WbfsysMessage_IdAnswerTo( $params );
    $this->input_WbfsysMessage_MessageId( $params );
    $this->input_WbfsysMessage_IdRefer( $params );
    $this->input_WbfsysMessage_Priority( $params );
    $this->input_WbfsysMessage_DeliverDate( $params );
    $this->input_WbfsysMessage_Title( $params );
    $this->input_WbfsysMessage_Message( $params );
    $this->input_WbfsysMessage_IdSenderStatus( $params );
    $this->input_WbfsysMessage_IdReceiverStatus( $params );
    $this->input_WbfsysMessage_FlagSenderDeleted( $params );
    $this->input_WbfsysMessage_FlagReceiverDeleted( $params );
    $this->input_WbfsysMessage_Rowid( $params );
    $this->input_WbfsysMessage_MTimeCreated( $params );
    $this->input_WbfsysMessage_MRoleCreate( $params );
    $this->input_WbfsysMessage_MTimeChanged( $params );
    $this->input_WbfsysMessage_MRoleChange( $params );
    $this->input_WbfsysMessage_MVersion( $params );
    $this->input_WbfsysMessage_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field id_sender
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_IdSender( $params )
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
      $objidWbfsysRoleUser = $this->entity->getData( 'id_sender' ) ;

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

      $inputIdSender = $this->view->newInput( 'inputWbfsysMessageIdSender', 'Window' );
      $this->items['wbfsys_message-id_sender'] = $inputIdSender;
      $inputIdSender->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message[id_sender]',
        'id'        => 'wgt-input-wbfsys_message_id_sender'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Sender', 'src' => 'Message' ) ),
      ));

      if( $this->assignedForm )
        $inputIdSender->assignedForm = $this->assignedForm;

      $inputIdSender->setWidth( 'medium' );

      $inputIdSender->setData( $this->entity->getData( 'id_sender' )  );
      $inputIdSender->setReadonly( $this->fieldReadOnly( 'wbfsys_message', 'id_sender' ) );
      $inputIdSender->setRequired( $this->fieldRequired( 'wbfsys_message', 'id_sender' ) );
      $inputIdSender->setLabel( $i18n->l( 'Sender', 'wbfsys.message.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_id_sender'.($this->suffix?'-'.$this->suffix:'');

      $inputIdSender->setListUrl ( $listUrl );
      $inputIdSender->setListIcon( 'control/connect.png' );
      $inputIdSender->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.edit' );
      $inputIdSender->conEntity         = $entityWbfsysRoleUser;
      $inputIdSender->refresh           = $this->refresh;
      $inputIdSender->serializeElement  = $this->sendElement;


        $inputIdSender->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.RoleUser.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdSender->view = $this->view;
      $inputIdSender->buildJavascript( 'wgt-input-wbfsys_message_id_sender'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdSender );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMessage_IdSender */

 /**
  * create the ui element for field id_receiver
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_IdReceiver( $params )
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

      $inputIdReceiver = $this->view->newInput( 'inputWbfsysMessageIdReceiver', 'Window' );
      $this->items['wbfsys_message-id_receiver'] = $inputIdReceiver;
      $inputIdReceiver->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message[id_receiver]',
        'id'        => 'wgt-input-wbfsys_message_id_receiver'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Receiver', 'src' => 'Message' ) ),
      ));

      if( $this->assignedForm )
        $inputIdReceiver->assignedForm = $this->assignedForm;

      $inputIdReceiver->setWidth( 'medium' );

      $inputIdReceiver->setData( $this->entity->getData( 'id_receiver' )  );
      $inputIdReceiver->setReadonly( $this->fieldReadOnly( 'wbfsys_message', 'id_receiver' ) );
      $inputIdReceiver->setRequired( $this->fieldRequired( 'wbfsys_message', 'id_receiver' ) );
      $inputIdReceiver->setLabel( $i18n->l( 'Receiver', 'wbfsys.message.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_id_receiver'.($this->suffix?'-'.$this->suffix:'');

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
      $inputIdReceiver->buildJavascript( 'wgt-input-wbfsys_message_id_receiver'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdReceiver );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMessage_IdReceiver */

 /**
  * create the ui element for field id_answer_to
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_IdAnswerTo( $params )
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
      $objidWbfsysRoleUser = $this->entity->getData( 'id_answer_to' ) ;

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

      $inputIdAnswerTo = $this->view->newInput( 'inputWbfsysMessageIdAnswerTo', 'Window' );
      $this->items['wbfsys_message-id_answer_to'] = $inputIdAnswerTo;
      $inputIdAnswerTo->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message[id_answer_to]',
        'id'        => 'wgt-input-wbfsys_message_id_answer_to'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Answer To', 'src' => 'Message' ) ),
      ));

      if( $this->assignedForm )
        $inputIdAnswerTo->assignedForm = $this->assignedForm;

      $inputIdAnswerTo->setWidth( 'medium' );

      $inputIdAnswerTo->setData( $this->entity->getData( 'id_answer_to' )  );
      $inputIdAnswerTo->setReadonly( $this->fieldReadOnly( 'wbfsys_message', 'id_answer_to' ) );
      $inputIdAnswerTo->setRequired( $this->fieldRequired( 'wbfsys_message', 'id_answer_to' ) );
      $inputIdAnswerTo->setLabel( $i18n->l( 'Answer To', 'wbfsys.message.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_id_answer_to'.($this->suffix?'-'.$this->suffix:'');

      $inputIdAnswerTo->setListUrl ( $listUrl );
      $inputIdAnswerTo->setListIcon( 'control/connect.png' );
      $inputIdAnswerTo->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.edit' );
      $inputIdAnswerTo->conEntity         = $entityWbfsysRoleUser;
      $inputIdAnswerTo->refresh           = $this->refresh;
      $inputIdAnswerTo->serializeElement  = $this->sendElement;


        $inputIdAnswerTo->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.RoleUser.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdAnswerTo->view = $this->view;
      $inputIdAnswerTo->buildJavascript( 'wgt-input-wbfsys_message_id_answer_to'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdAnswerTo );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMessage_IdAnswerTo */

 /**
  * create the ui element for field message_id
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_MessageId( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputMessageId = $this->view->newInput( 'inputWbfsysMessageMessageId' , 'Text' );
      $this->items['wbfsys_message-message_id'] = $inputMessageId;
      $inputMessageId->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message[message_id]',
          'id'        => 'wgt-input-wbfsys_message_message_id'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Message Id', 'src' => 'Message' ) ),
          'maxlength' => $this->entity->maxSize( 'message_id' ),
        )
      );
      $inputMessageId->setWidth( 'medium' );

      $inputMessageId->setReadonly( $this->fieldReadOnly( 'wbfsys_message', 'message_id' ) );
      $inputMessageId->setRequired( $this->fieldRequired( 'wbfsys_message', 'message_id' ) );
      $inputMessageId->setData( $this->entity->getSecure('message_id') );
      $inputMessageId->setLabel( $i18n->l( 'Message Id', 'wbfsys.message.label' ) );

      $inputMessageId->refresh           = $this->refresh;
      $inputMessageId->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMessage_MessageId */

 /**
  * create the ui element for field id_refer
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_IdRefer( $params )
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
      $objidWbfsysMessage = $this->entity->getData( 'id_refer' ) ;

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

      $inputIdRefer = $this->view->newInput( 'inputWbfsysMessageIdRefer', 'Window' );
      $this->items['wbfsys_message-id_refer'] = $inputIdRefer;
      $inputIdRefer->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message[id_refer]',
        'id'        => 'wgt-input-wbfsys_message_id_refer'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Refer', 'src' => 'Message' ) ),
      ));

      if( $this->assignedForm )
        $inputIdRefer->assignedForm = $this->assignedForm;

      $inputIdRefer->setWidth( 'medium' );

      $inputIdRefer->setData( $this->entity->getData( 'id_refer' )  );
      $inputIdRefer->setReadonly( $this->fieldReadOnly( 'wbfsys_message', 'id_refer' ) );
      $inputIdRefer->setRequired( $this->fieldRequired( 'wbfsys_message', 'id_refer' ) );
      $inputIdRefer->setLabel( $i18n->l( 'Refer', 'wbfsys.message.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Message.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_id_refer'.($this->suffix?'-'.$this->suffix:'');

      $inputIdRefer->setListUrl ( $listUrl );
      $inputIdRefer->setListIcon( 'control/connect.png' );
      $inputIdRefer->setEntityUrl( 'maintab.php?c=Wbfsys.Message.edit' );
      $inputIdRefer->conEntity         = $entityWbfsysMessage;
      $inputIdRefer->refresh           = $this->refresh;
      $inputIdRefer->serializeElement  = $this->sendElement;



      $inputIdRefer->view = $this->view;
      $inputIdRefer->buildJavascript( 'wgt-input-wbfsys_message_id_refer'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdRefer );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMessage_IdRefer */

 /**
  * create the ui element for field priority
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_Priority( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:priority
      $inputPriority = $this->view->newInput( 'inputWbfsysMessagePriority' , 'Priority' );
      $this->items['wbfsys_message-priority'] = $inputPriority;
      $inputPriority->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message[priority]',
          'id'        => 'wgt-input-wbfsys_message_priority'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Priority', 'src' => 'Message' ) ),
        )
      );
      $inputPriority->setWidth( 'medium' );

      $inputPriority->setReadonly( $this->fieldReadOnly( 'wbfsys_message', 'priority' ) );
      $inputPriority->setRequired( $this->fieldRequired( 'wbfsys_message', 'priority' ) );
      $inputPriority->setActive( $this->entity->getSecure('priority') );
      $inputPriority->setLabel( $i18n->l( 'Priority', 'wbfsys.message.label' ) );

      $inputPriority->refresh           = $this->refresh;
      $inputPriority->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMessage_Priority */

 /**
  * create the ui element for field deliver_date
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_DeliverDate( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:timestamp
      $inputDeliverDate = $this->view->newInput( 'inputWbfsysMessageDeliverDate', 'Timestamp' );
      $this->items['wbfsys_message-deliver_date'] = $inputDeliverDate;
      $inputDeliverDate->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message[deliver_date]',
          'id'        => 'wgt-input-wbfsys_message_deliver_date'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Deliver Date', 'src' => 'Message' ) )
        )
      );
      $inputDeliverDate->setWidth( 'medium' );

      $inputDeliverDate->setReadonly( $this->fieldReadOnly( 'wbfsys_message', 'deliver_date' ) );
      $inputDeliverDate->setRequired( $this->fieldRequired( 'wbfsys_message', 'deliver_date' ) );
      $inputDeliverDate->setData
      (
        $this->entity->getTimestamp( 'deliver_date' )
      );
      $inputDeliverDate->setLabel( $i18n->l( 'Deliver Date', 'wbfsys.message.label' ) );

      $inputDeliverDate->refresh           = $this->refresh;
      $inputDeliverDate->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMessage_DeliverDate */

 /**
  * create the ui element for field title
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_Title( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputTitle = $this->view->newInput( 'inputWbfsysMessageTitle' , 'Text' );
      $this->items['wbfsys_message-title'] = $inputTitle;
      $inputTitle->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message[title]',
          'id'        => 'wgt-input-wbfsys_message_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip xxlarge'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Title', 'src' => 'Message' ) ),
          'maxlength' => $this->entity->maxSize( 'title' ),
        )
      );
      $inputTitle->setWidth( 'xxlarge' );

      $inputTitle->setReadonly( $this->fieldReadOnly( 'wbfsys_message', 'title' ) );
      $inputTitle->setRequired( $this->fieldRequired( 'wbfsys_message', 'title' ) );
      $inputTitle->setData( $this->entity->getSecure('title') );
      $inputTitle->setLabel( $i18n->l( 'Title', 'wbfsys.message.label' ) );

      $inputTitle->refresh           = $this->refresh;
      $inputTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMessage_Title */

 /**
  * create the ui element for field message
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_Message( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputMessage = $this->view->newInput( 'inputWbfsysMessageMessage', 'Wysiwyg' );
      $inputMessage->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_message[message]',
          'id'    => 'wgt-input-wbfsys_message_message'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full large-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'message', 'src' => 'Message' ) ),
        )
      );
      $inputMessage->setWidth( 'full' );

      $inputMessage->mode = 'rich_text';
      $inputMessage->full = true;

      $inputMessage->setData( $this->entity->getData( 'message' ) );
      $inputMessage->setReadonly( $this->fieldReadOnly( 'wbfsys_message', 'message' ) );
      $inputMessage->setRequired( $this->fieldRequired( 'wbfsys_message', 'message' ) );
      $inputMessage->setLabel( $i18n->l( 'message', 'wbfsys.message.label' ) );

      $inputMessage->refresh           = $this->refresh;
      $inputMessage->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMessage_Message */

 /**
  * create the ui element for field id_sender_status
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_IdSenderStatus( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputIdSenderStatus = $this->view->newInput( 'inputWbfsysMessageIdSenderStatus', 'Int' );
      $this->items['wbfsys_message-id_sender_status'] = $inputIdSenderStatus;
      $inputIdSenderStatus->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message[id_sender_status]',
          'id'        => 'wgt-input-wbfsys_message_id_sender_status'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Sender Status', 'src' => 'Message' ) ),
        )
      );
      $inputIdSenderStatus->setWidth( 'medium' );

$inputIdSenderStatus->setReadOnly( $this->fieldReadOnly( 'wbfsys_message', 'id_sender_status' ) );
      $inputIdSenderStatus->setRequired( $this->fieldRequired( 'wbfsys_message', 'id_sender_status' ) );
      $inputIdSenderStatus->setData( $this->entity->getData( 'id_sender_status' ) );
      $inputIdSenderStatus->setLabel( $i18n->l( 'Sender Status', 'wbfsys.message.label' ) );

      $inputIdSenderStatus->refresh           = $this->refresh;
      $inputIdSenderStatus->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMessage_IdSenderStatus */

 /**
  * create the ui element for field id_receiver_status
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_IdReceiverStatus( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputIdReceiverStatus = $this->view->newInput( 'inputWbfsysMessageIdReceiverStatus', 'Int' );
      $this->items['wbfsys_message-id_receiver_status'] = $inputIdReceiverStatus;
      $inputIdReceiverStatus->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message[id_receiver_status]',
          'id'        => 'wgt-input-wbfsys_message_id_receiver_status'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Receiver Status', 'src' => 'Message' ) ),
        )
      );
      $inputIdReceiverStatus->setWidth( 'medium' );

$inputIdReceiverStatus->setReadOnly( $this->fieldReadOnly( 'wbfsys_message', 'id_receiver_status' ) );
      $inputIdReceiverStatus->setRequired( $this->fieldRequired( 'wbfsys_message', 'id_receiver_status' ) );
      $inputIdReceiverStatus->setData( $this->entity->getData( 'id_receiver_status' ) );
      $inputIdReceiverStatus->setLabel( $i18n->l( 'Receiver Status', 'wbfsys.message.label' ) );

      $inputIdReceiverStatus->refresh           = $this->refresh;
      $inputIdReceiverStatus->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMessage_IdReceiverStatus */

 /**
  * create the ui element for field flag_sender_deleted
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_FlagSenderDeleted( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputFlagSenderDeleted = $this->view->newInput( 'inputWbfsysMessageFlagSenderDeleted', 'Checkbox' );
      $this->items['wbfsys_message-flag_sender_deleted'] = $inputFlagSenderDeleted;
      $inputFlagSenderDeleted->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message[flag_sender_deleted]',
          'id'        => 'wgt-input-wbfsys_message_flag_sender_deleted'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Sender Deleted', 'src' => 'Message' ) ),
        )
      );
      $inputFlagSenderDeleted->setWidth( 'medium' );

      $inputFlagSenderDeleted->setReadonly( $this->fieldReadOnly( 'wbfsys_message', 'flag_sender_deleted' ) );
      $inputFlagSenderDeleted->setRequired( $this->fieldRequired( 'wbfsys_message', 'flag_sender_deleted' ) );
      $inputFlagSenderDeleted->setActive( $this->entity->getBoolean( 'flag_sender_deleted' ) );
      $inputFlagSenderDeleted->setLabel( $i18n->l( 'Sender Deleted', 'wbfsys.message.label' ) );

      $inputFlagSenderDeleted->refresh           = $this->refresh;
      $inputFlagSenderDeleted->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMessage_FlagSenderDeleted */

 /**
  * create the ui element for field flag_receiver_deleted
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_FlagReceiverDeleted( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputFlagReceiverDeleted = $this->view->newInput( 'inputWbfsysMessageFlagReceiverDeleted', 'Checkbox' );
      $this->items['wbfsys_message-flag_receiver_deleted'] = $inputFlagReceiverDeleted;
      $inputFlagReceiverDeleted->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message[flag_receiver_deleted]',
          'id'        => 'wgt-input-wbfsys_message_flag_receiver_deleted'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Receiver Deleted', 'src' => 'Message' ) ),
        )
      );
      $inputFlagReceiverDeleted->setWidth( 'medium' );

      $inputFlagReceiverDeleted->setReadonly( $this->fieldReadOnly( 'wbfsys_message', 'flag_receiver_deleted' ) );
      $inputFlagReceiverDeleted->setRequired( $this->fieldRequired( 'wbfsys_message', 'flag_receiver_deleted' ) );
      $inputFlagReceiverDeleted->setActive( $this->entity->getBoolean( 'flag_receiver_deleted' ) );
      $inputFlagReceiverDeleted->setLabel( $i18n->l( 'Receiver Deleted', 'wbfsys.message.label' ) );

      $inputFlagReceiverDeleted->refresh           = $this->refresh;
      $inputFlagReceiverDeleted->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysMessage_FlagReceiverDeleted */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysMessageRowid' , 'int' );
      $this->items['wbfsys_message-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message[rowid]',
          'id'        => 'wgt-input-wbfsys_message_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Message' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_message', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_message', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.message.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMessage_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysMessageMTimeCreated' , 'Date' );
      $this->items['wbfsys_message-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message[m_time_created]',
          'id'        => 'wgt-input-wbfsys_message_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Message' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_message', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_message', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.message.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysMessage_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysMessageMRoleCreate', 'Window' );
      $this->items['wbfsys_message-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message[m_role_create]',
        'id'        => 'wgt-input-wbfsys_message_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Message' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_message', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_message', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.message.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_message_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysMessage_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysMessageMTimeChanged' , 'Date' );
      $this->items['wbfsys_message-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_message_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Message' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_message', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_message', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.message.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysMessage_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysMessageMRoleChange', 'Window' );
      $this->items['wbfsys_message-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message[m_role_change]',
        'id'        => 'wgt-input-wbfsys_message_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Message' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_message', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_message', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.message.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_message_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysMessage_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysMessageMVersion' , 'int' );
      $this->items['wbfsys_message-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message[m_version]',
          'id'        => 'wgt-input-wbfsys_message_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Message' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_message', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_message', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.message.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMessage_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessage_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysMessageMUuid' , 'Text' );
      $this->items['wbfsys_message-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message[m_uuid]',
          'id'        => 'wgt-input-wbfsys_message_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Message' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_message', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_message', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.message.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMessage_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysMessage_Crud_Show_Form */


