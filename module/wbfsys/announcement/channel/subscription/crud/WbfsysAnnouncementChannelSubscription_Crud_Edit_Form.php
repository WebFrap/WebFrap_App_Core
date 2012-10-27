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
class WbfsysAnnouncementChannelSubscription_Crud_Edit_Form
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
  public $namespace  = 'WbfsysAnnouncementChannelSubscription';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysAnnouncementChannelSubscription';

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
      'wbfsys_announcement_channel_subscription' => array
      (
        'id_channel' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_role' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'date_start' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'vid' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'date_end' => array
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
   * @var WbfsysAnnouncementChannelSubscription_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysAnnouncementChannelSubscription_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysAnnouncementChannelSubscription_Entity $entity
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
      'wbfsys_announcement_channel_subscription' => array
      (
        'id_channel',
        'id_role',
        'date_start',
        'vid',
        'date_end',
        'id_vid_entity',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysAnnouncementChannelSubscription entity
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
    $this->view->addVar( 'entityWbfsysAnnouncementChannelSubscription', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_announcement_channel_subscription'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_announcement_channel_subscription[id_wbfsys_announcement_channel_subscription-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysAnnouncementChannelSubscription_IdChannel( $params );
    $this->input_WbfsysAnnouncementChannelSubscription_IdRole( $params );
    $this->input_WbfsysAnnouncementChannelSubscription_DateStart( $params );
    $this->input_WbfsysAnnouncementChannelSubscription_Vid( $params );
    $this->input_WbfsysAnnouncementChannelSubscription_DateEnd( $params );
    $this->input_WbfsysAnnouncementChannelSubscription_IdVidEntity( $params );
    $this->input_WbfsysAnnouncementChannelSubscription_Rowid( $params );
    $this->input_WbfsysAnnouncementChannelSubscription_MTimeCreated( $params );
    $this->input_WbfsysAnnouncementChannelSubscription_MRoleCreate( $params );
    $this->input_WbfsysAnnouncementChannelSubscription_MTimeChanged( $params );
    $this->input_WbfsysAnnouncementChannelSubscription_MRoleChange( $params );
    $this->input_WbfsysAnnouncementChannelSubscription_MVersion( $params );
    $this->input_WbfsysAnnouncementChannelSubscription_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field id_channel
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncementChannelSubscription_IdChannel( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysAnnouncementChannel_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysAnnouncementChannel not exists' );

      Log::warn( 'Looks like the Entity: WbfsysAnnouncementChannel is missing' );

      return;
    }


      //p: Window
      $objidWbfsysAnnouncementChannel = $this->entity->getData( 'id_channel' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysAnnouncementChannel
          || !$entityWbfsysAnnouncementChannel = $this->db->orm->get
          (
            'WbfsysAnnouncementChannel',
            $objidWbfsysAnnouncementChannel
          )
      )
      {
        $entityWbfsysAnnouncementChannel = $this->db->orm->newEntity( 'WbfsysAnnouncementChannel' );
      }

      $inputIdChannel = $this->view->newInput( 'inputWbfsysAnnouncementChannelSubscriptionIdChannel', 'Window' );
      $this->items['wbfsys_announcement_channel_subscription-id_channel'] = $inputIdChannel;
      $inputIdChannel->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_announcement_channel_subscription[id_channel]',
        'id'        => 'wgt-input-wbfsys_announcement_channel_subscription_id_channel'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Channel', 'src' => 'Announcement Channel Subscription' ) ),
      ));

      if( $this->assignedForm )
        $inputIdChannel->assignedForm = $this->assignedForm;

      $inputIdChannel->setWidth( 'medium' );

      $inputIdChannel->setData( $this->entity->getData( 'id_channel' )  );
      $inputIdChannel->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement_channel_subscription', 'id_channel' ) );
      $inputIdChannel->setRequired( $this->fieldRequired( 'wbfsys_announcement_channel_subscription', 'id_channel' ) );
      $inputIdChannel->setLabel( $i18n->l( 'Channel', 'wbfsys.announcement_channel_subscription.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.AnnouncementChannel.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_announcement_channel_subscription_id_channel'.($this->suffix?'-'.$this->suffix:'');

      $inputIdChannel->setListUrl ( $listUrl );
      $inputIdChannel->setListIcon( 'control/connect.png' );
      $inputIdChannel->setEntityUrl( 'maintab.php?c=Wbfsys.AnnouncementChannel.edit' );
      $inputIdChannel->conEntity         = $entityWbfsysAnnouncementChannel;
      $inputIdChannel->refresh           = $this->refresh;
      $inputIdChannel->serializeElement  = $this->sendElement;



      $inputIdChannel->view = $this->view;
      $inputIdChannel->buildJavascript( 'wgt-input-wbfsys_announcement_channel_subscription_id_channel'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdChannel );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysAnnouncementChannelSubscription_IdChannel */

 /**
  * create the ui element for field id_role
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncementChannelSubscription_IdRole( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputIdRole = $this->view->newInput( 'inputWbfsysAnnouncementChannelSubscriptionIdRole', 'Int' );
      $this->items['wbfsys_announcement_channel_subscription-id_role'] = $inputIdRole;
      $inputIdRole->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement_channel_subscription[id_role]',
          'id'        => 'wgt-input-wbfsys_announcement_channel_subscription_id_role'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role', 'src' => 'Announcement Channel Subscription' ) ),
        )
      );
      $inputIdRole->setWidth( 'medium' );

$inputIdRole->setReadOnly( $this->fieldReadOnly( 'wbfsys_announcement_channel_subscription', 'id_role' ) );
      $inputIdRole->setRequired( $this->fieldRequired( 'wbfsys_announcement_channel_subscription', 'id_role' ) );
      $inputIdRole->setData( $this->entity->getData( 'id_role' ) );
      $inputIdRole->setLabel( $i18n->l( 'Role', 'wbfsys.announcement_channel_subscription.label' ) );

      $inputIdRole->refresh           = $this->refresh;
      $inputIdRole->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysAnnouncementChannelSubscription_IdRole */

 /**
  * create the ui element for field date_start
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncementChannelSubscription_DateStart( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputDateStart = $this->view->newInput( 'inputWbfsysAnnouncementChannelSubscriptionDateStart' , 'Date' );
      $this->items['wbfsys_announcement_channel_subscription-date_start'] = $inputDateStart;
      $inputDateStart->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement_channel_subscription[date_start]',
          'id'        => 'wgt-input-wbfsys_announcement_channel_subscription_date_start'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Start Date', 'src' => 'Announcement Channel Subscription' ) ),
          'maxlength' => $this->entity->maxSize( 'date_start' ),
        )
      );
      $inputDateStart->setWidth( 'small' );

      $inputDateStart->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement_channel_subscription', 'date_start' ) );
      $inputDateStart->setRequired( $this->fieldRequired( 'wbfsys_announcement_channel_subscription', 'date_start' ) );
      $inputDateStart->setData( $this->entity->getDate( 'date_start' ) );
      $inputDateStart->setLabel( $i18n->l( 'Start Date', 'wbfsys.announcement_channel_subscription.label' ) );

      $inputDateStart->refresh           = $this->refresh;
      $inputDateStart->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysAnnouncementChannelSubscription_DateStart */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncementChannelSubscription_Vid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputVid = $this->view->newInput( 'inputWbfsysAnnouncementChannelSubscriptionVid', 'Hidden' );
      $this->items['wbfsys_announcement_channel_subscription-vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement_channel_subscription[vid]',
          'id'        => 'wgt-input-wbfsys_announcement_channel_subscription_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'VID', 'src' => 'Announcement Channel Subscription' ) ),
          'maxlength' => $this->entity->maxSize( 'vid' ),
        )
      );
      $inputVid->setWidth( 'medium' );

      $inputVid->setData( $this->entity->getSecure( 'vid' ) );
      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysAnnouncementChannelSubscription_Vid */

 /**
  * create the ui element for field date_end
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncementChannelSubscription_DateEnd( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputDateEnd = $this->view->newInput( 'inputWbfsysAnnouncementChannelSubscriptionDateEnd' , 'Date' );
      $this->items['wbfsys_announcement_channel_subscription-date_end'] = $inputDateEnd;
      $inputDateEnd->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement_channel_subscription[date_end]',
          'id'        => 'wgt-input-wbfsys_announcement_channel_subscription_date_end'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'End Date', 'src' => 'Announcement Channel Subscription' ) ),
          'maxlength' => $this->entity->maxSize( 'date_end' ),
        )
      );
      $inputDateEnd->setWidth( 'small' );

      $inputDateEnd->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement_channel_subscription', 'date_end' ) );
      $inputDateEnd->setRequired( $this->fieldRequired( 'wbfsys_announcement_channel_subscription', 'date_end' ) );
      $inputDateEnd->setData( $this->entity->getDate( 'date_end' ) );
      $inputDateEnd->setLabel( $i18n->l( 'End Date', 'wbfsys.announcement_channel_subscription.label' ) );

      $inputDateEnd->refresh           = $this->refresh;
      $inputDateEnd->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysAnnouncementChannelSubscription_DateEnd */

 /**
  * create the ui element for field id_vid_entity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncementChannelSubscription_IdVidEntity( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdVidEntity = $this->view->newInput( 'inputWbfsysAnnouncementChannelSubscriptionIdVidEntity', 'Hidden' );
      $this->items['wbfsys_announcement_channel_subscription-id_vid_entity'] = $inputIdVidEntity;
      $inputIdVidEntity->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement_channel_subscription[id_vid_entity]',
          'id'        => 'wgt-input-wbfsys_announcement_channel_subscription_id_vid_entity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Entity', 'src' => 'Announcement Channel Subscription' ) ),
          'maxlength' => $this->entity->maxSize( 'id_vid_entity' ),
        )
      );
      $inputIdVidEntity->setWidth( 'medium' );

      $inputIdVidEntity->setData( $this->entity->getSecure( 'id_vid_entity' ) );
      $inputIdVidEntity->refresh           = $this->refresh;
      $inputIdVidEntity->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysAnnouncementChannelSubscription_IdVidEntity */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncementChannelSubscription_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysAnnouncementChannelSubscriptionRowid' , 'int' );
      $this->items['wbfsys_announcement_channel_subscription-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement_channel_subscription[rowid]',
          'id'        => 'wgt-input-wbfsys_announcement_channel_subscription_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Announcement Channel Subscription' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement_channel_subscription', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_announcement_channel_subscription', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.announcement_channel_subscription.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysAnnouncementChannelSubscription_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncementChannelSubscription_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysAnnouncementChannelSubscriptionMTimeCreated' , 'Date' );
      $this->items['wbfsys_announcement_channel_subscription-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement_channel_subscription[m_time_created]',
          'id'        => 'wgt-input-wbfsys_announcement_channel_subscription_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Announcement Channel Subscription' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement_channel_subscription', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_announcement_channel_subscription', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.announcement_channel_subscription.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysAnnouncementChannelSubscription_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncementChannelSubscription_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysAnnouncementChannelSubscriptionMRoleCreate', 'Window' );
      $this->items['wbfsys_announcement_channel_subscription-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_announcement_channel_subscription[m_role_create]',
        'id'        => 'wgt-input-wbfsys_announcement_channel_subscription_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Announcement Channel Subscription' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement_channel_subscription', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_announcement_channel_subscription', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.announcement_channel_subscription.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_announcement_channel_subscription_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_announcement_channel_subscription_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysAnnouncementChannelSubscription_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncementChannelSubscription_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysAnnouncementChannelSubscriptionMTimeChanged' , 'Date' );
      $this->items['wbfsys_announcement_channel_subscription-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement_channel_subscription[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_announcement_channel_subscription_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Announcement Channel Subscription' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement_channel_subscription', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_announcement_channel_subscription', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.announcement_channel_subscription.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysAnnouncementChannelSubscription_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncementChannelSubscription_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysAnnouncementChannelSubscriptionMRoleChange', 'Window' );
      $this->items['wbfsys_announcement_channel_subscription-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_announcement_channel_subscription[m_role_change]',
        'id'        => 'wgt-input-wbfsys_announcement_channel_subscription_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Announcement Channel Subscription' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement_channel_subscription', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_announcement_channel_subscription', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.announcement_channel_subscription.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_announcement_channel_subscription_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_announcement_channel_subscription_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysAnnouncementChannelSubscription_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncementChannelSubscription_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysAnnouncementChannelSubscriptionMVersion' , 'int' );
      $this->items['wbfsys_announcement_channel_subscription-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement_channel_subscription[m_version]',
          'id'        => 'wgt-input-wbfsys_announcement_channel_subscription_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Announcement Channel Subscription' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement_channel_subscription', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_announcement_channel_subscription', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.announcement_channel_subscription.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysAnnouncementChannelSubscription_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncementChannelSubscription_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysAnnouncementChannelSubscriptionMUuid' , 'Text' );
      $this->items['wbfsys_announcement_channel_subscription-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement_channel_subscription[m_uuid]',
          'id'        => 'wgt-input-wbfsys_announcement_channel_subscription_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Announcement Channel Subscription' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement_channel_subscription', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_announcement_channel_subscription', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.announcement_channel_subscription.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysAnnouncementChannelSubscription_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysAnnouncementChannelSubscription_Crud_Edit_Form */


