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
class WbfsysAnnouncement_Crud_Show_Form
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
  public $namespace  = 'WbfsysAnnouncement';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysAnnouncement';

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
      'wbfsys_announcement' => array
      (
        'title' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '400',
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
        'id_user' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_channel' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_process_status' => array
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
        'importance' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'message' => array
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
   * @var WbfsysAnnouncement_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysAnnouncement_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysAnnouncement_Entity $entity
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
      'wbfsys_announcement' => array
      (
        'title',
        'date_start',
        'vid',
        'id_user',
        'id_channel',
        'id_process_status',
        'id_type',
        'importance',
        'message',
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
  * create an IO form for the WbfsysAnnouncement entity
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
    $this->view->addVar( 'entityWbfsysAnnouncement', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_announcement'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_announcement[id_wbfsys_announcement-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysAnnouncement_Title( $params );
    $this->input_WbfsysAnnouncement_DateStart( $params );
    $this->input_WbfsysAnnouncement_Vid( $params );
    $this->input_WbfsysAnnouncement_IdUser( $params );
    $this->input_WbfsysAnnouncement_IdChannel( $params );
    $this->input_WbfsysAnnouncement_IdProcessStatus( $params );
    $this->input_WbfsysAnnouncement_IdType( $params );
    $this->input_WbfsysAnnouncement_Importance( $params );
    $this->input_WbfsysAnnouncement_Message( $params );
    $this->input_WbfsysAnnouncement_DateEnd( $params );
    $this->input_WbfsysAnnouncement_IdVidEntity( $params );
    $this->input_WbfsysAnnouncement_Rowid( $params );
    $this->input_WbfsysAnnouncement_MTimeCreated( $params );
    $this->input_WbfsysAnnouncement_MRoleCreate( $params );
    $this->input_WbfsysAnnouncement_MTimeChanged( $params );
    $this->input_WbfsysAnnouncement_MRoleChange( $params );
    $this->input_WbfsysAnnouncement_MVersion( $params );
    $this->input_WbfsysAnnouncement_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field title
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncement_Title( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputTitle = $this->view->newInput( 'inputWbfsysAnnouncementTitle' , 'Text' );
      $this->items['wbfsys_announcement-title'] = $inputTitle;
      $inputTitle->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement[title]',
          'id'        => 'wgt-input-wbfsys_announcement_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip xxlarge'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Title', 'src' => 'Announcement' ) ),
          'maxlength' => $this->entity->maxSize( 'title' ),
        )
      );
      $inputTitle->setWidth( 'xxlarge' );

      $inputTitle->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement', 'title' ) );
      $inputTitle->setRequired( $this->fieldRequired( 'wbfsys_announcement', 'title' ) );
      $inputTitle->setData( $this->entity->getSecure('title') );
      $inputTitle->setLabel( $i18n->l( 'Title', 'wbfsys.announcement.label' ) );

      $inputTitle->refresh           = $this->refresh;
      $inputTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysAnnouncement_Title */

 /**
  * create the ui element for field date_start
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncement_DateStart( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputDateStart = $this->view->newInput( 'inputWbfsysAnnouncementDateStart' , 'Date' );
      $this->items['wbfsys_announcement-date_start'] = $inputDateStart;
      $inputDateStart->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement[date_start]',
          'id'        => 'wgt-input-wbfsys_announcement_date_start'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Start Date', 'src' => 'Announcement' ) ),
          'maxlength' => $this->entity->maxSize( 'date_start' ),
        )
      );
      $inputDateStart->setWidth( 'small' );

      $inputDateStart->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement', 'date_start' ) );
      $inputDateStart->setRequired( $this->fieldRequired( 'wbfsys_announcement', 'date_start' ) );
      $inputDateStart->setData( $this->entity->getDate( 'date_start' ) );
      $inputDateStart->setLabel( $i18n->l( 'Start Date', 'wbfsys.announcement.label' ) );

      $inputDateStart->refresh           = $this->refresh;
      $inputDateStart->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysAnnouncement_DateStart */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncement_Vid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputVid = $this->view->newInput( 'inputWbfsysAnnouncementVid', 'Hidden' );
      $this->items['wbfsys_announcement-vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement[vid]',
          'id'        => 'wgt-input-wbfsys_announcement_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'VID', 'src' => 'Announcement' ) ),
          'maxlength' => $this->entity->maxSize( 'vid' ),
        )
      );
      $inputVid->setWidth( 'medium' );

      $inputVid->setData( $this->entity->getSecure( 'vid' ) );
      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysAnnouncement_Vid */

 /**
  * create the ui element for field id_user
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncement_IdUser( $params )
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

      $inputIdUser = $this->view->newInput( 'inputWbfsysAnnouncementIdUser', 'Window' );
      $this->items['wbfsys_announcement-id_user'] = $inputIdUser;
      $inputIdUser->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_announcement[id_user]',
        'id'        => 'wgt-input-wbfsys_announcement_id_user'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'User', 'src' => 'Announcement' ) ),
      ));

      if( $this->assignedForm )
        $inputIdUser->assignedForm = $this->assignedForm;

      $inputIdUser->setWidth( 'medium' );

      $inputIdUser->setData( $this->entity->getData( 'id_user' )  );
      $inputIdUser->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement', 'id_user' ) );
      $inputIdUser->setRequired( $this->fieldRequired( 'wbfsys_announcement', 'id_user' ) );
      $inputIdUser->setLabel( $i18n->l( 'User', 'wbfsys.announcement.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_announcement_id_user'.($this->suffix?'-'.$this->suffix:'');

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
      $inputIdUser->buildJavascript( 'wgt-input-wbfsys_announcement_id_user'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdUser );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysAnnouncement_IdUser */

 /**
  * create the ui element for field id_channel
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncement_IdChannel( $params )
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

      $inputIdChannel = $this->view->newInput( 'inputWbfsysAnnouncementIdChannel', 'Window' );
      $this->items['wbfsys_announcement-id_channel'] = $inputIdChannel;
      $inputIdChannel->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_announcement[id_channel]',
        'id'        => 'wgt-input-wbfsys_announcement_id_channel'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Channel', 'src' => 'Announcement' ) ),
      ));

      if( $this->assignedForm )
        $inputIdChannel->assignedForm = $this->assignedForm;

      $inputIdChannel->setWidth( 'medium' );

      $inputIdChannel->setData( $this->entity->getData( 'id_channel' )  );
      $inputIdChannel->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement', 'id_channel' ) );
      $inputIdChannel->setRequired( $this->fieldRequired( 'wbfsys_announcement', 'id_channel' ) );
      $inputIdChannel->setLabel( $i18n->l( 'Channel', 'wbfsys.announcement.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.AnnouncementChannel.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_announcement_id_channel'.($this->suffix?'-'.$this->suffix:'');

      $inputIdChannel->setListUrl ( $listUrl );
      $inputIdChannel->setListIcon( 'control/connect.png' );
      $inputIdChannel->setEntityUrl( 'maintab.php?c=Wbfsys.AnnouncementChannel.edit' );
      $inputIdChannel->conEntity         = $entityWbfsysAnnouncementChannel;
      $inputIdChannel->refresh           = $this->refresh;
      $inputIdChannel->serializeElement  = $this->sendElement;



      $inputIdChannel->view = $this->view;
      $inputIdChannel->buildJavascript( 'wgt-input-wbfsys_announcement_id_channel'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdChannel );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysAnnouncement_IdChannel */

 /**
  * create the ui element for field id_process_status
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncement_IdProcessStatus( $params )
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
      $objidWbfsysProcessStatus = $this->entity->getData( 'id_process_status' ) ;

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

      $inputIdProcessStatus = $this->view->newInput( 'inputWbfsysAnnouncementIdProcessStatus', 'Window' );
      $this->items['wbfsys_announcement-id_process_status'] = $inputIdProcessStatus;
      $inputIdProcessStatus->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_announcement[id_process_status]',
        'id'        => 'wgt-input-wbfsys_announcement_id_process_status'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Process Status', 'src' => 'Announcement' ) ),
      ));

      if( $this->assignedForm )
        $inputIdProcessStatus->assignedForm = $this->assignedForm;

      $inputIdProcessStatus->setWidth( 'medium' );

      $inputIdProcessStatus->setData( $this->entity->getData( 'id_process_status' )  );
      $inputIdProcessStatus->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement', 'id_process_status' ) );
      $inputIdProcessStatus->setRequired( $this->fieldRequired( 'wbfsys_announcement', 'id_process_status' ) );
      $inputIdProcessStatus->setLabel( $i18n->l( 'Process Status', 'wbfsys.announcement.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ProcessStatus.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_announcement_id_process_status'.($this->suffix?'-'.$this->suffix:'');

      $inputIdProcessStatus->setListUrl ( $listUrl );
      $inputIdProcessStatus->setListIcon( 'control/connect.png' );
      $inputIdProcessStatus->setEntityUrl( 'maintab.php?c=Wbfsys.ProcessStatus.edit' );
      $inputIdProcessStatus->conEntity         = $entityWbfsysProcessStatus;
      $inputIdProcessStatus->refresh           = $this->refresh;
      $inputIdProcessStatus->serializeElement  = $this->sendElement;



      $inputIdProcessStatus->view = $this->view;
      $inputIdProcessStatus->buildJavascript( 'wgt-input-wbfsys_announcement_id_process_status'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdProcessStatus );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysAnnouncement_IdProcessStatus */

 /**
  * create the ui element for field id_type
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncement_IdType( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_announcement_id_type'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysAnnouncementType_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysAnnouncementType_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysAnnouncementType_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdType = $this->view->newItem( 'inputWbfsysAnnouncementIdType', 'WbfsysAnnouncementType_Selectbox' );
      $this->items['wbfsys_announcement-id_type'] = $inputIdType;
      $inputIdType->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement[id_type]',
          'id'        => 'wgt-input-wbfsys_announcement_id_type'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Type', 'src' => 'Announcement' ) ),
        )
      );
      $inputIdType->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdType->assignedForm = $this->assignedForm;

      $inputIdType->setActive( $this->entity->getData( 'id_type' ) );
      $inputIdType->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement', 'id_type' ) );
      $inputIdType->setRequired( $this->fieldRequired( 'wbfsys_announcement', 'id_type' ) );


      $inputIdType->setLabel( $i18n->l( 'Type', 'wbfsys.announcement.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_announcement_type:insert' ) )
      {
        $inputIdType->refresh           = $this->refresh;
        $inputIdType->serializeElement  = $this->sendElement;
        $inputIdType->editUrl = 'index.php?c=Wbfsys.AnnouncementType.listing&amp;target='.$this->namespace.'&amp;field=id_type&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_announcement_id_type'.$this->suffix;
      }
      // set an empty first entry
      $inputIdType->setFirstFree( 'No Type selected' );

      
      $queryIdType = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_announcement_id_type'] ) )
      {
      
        $queryIdType = $this->db->newQuery( 'WbfsysAnnouncementType_Selectbox' );

        $queryIdType->fetchSelectbox();
        $inputIdType->setData( $queryIdType->getAll() );
      
      }
      else
      {
        $inputIdType->setData( $this->listElementData['wbfsys_announcement_id_type'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdType )
        $queryIdType = $this->db->newQuery( 'WbfsysAnnouncementType_Selectbox' );
      
      $inputIdType->loadActive = function( $activeId ) use ( $queryIdType ){
 
        return $queryIdType->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysAnnouncement_IdType */

 /**
  * create the ui element for field importance
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_wbfsys_announcement_Importance( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:importance
      $inputImportance = $this->view->newInput( 'inputWbfsysAnnouncementImportance' , 'Importance' );
      $this->items['wbfsys_announcement-importance'] = $inputImportance;
      $inputImportance->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement[importance]',
          'id'        => 'wgt-input-wbfsys_announcement_importance'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Importance', 'src' => 'Announcement' ) ),
        )
      );
      $inputImportance->setWidth( 'medium' );

      $inputImportance->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement', 'importance' ) );
      $inputImportance->setRequired( $this->fieldRequired( 'wbfsys_announcement', 'importance' ) );
      $inputImportance->setActive( $this->entity->getSecure( 'importance' ) );
      $inputImportance->setLabel( $i18n->l( 'Importance', 'wbfsys.announcement.label' ) );

      $inputImportance->refresh           = $this->refresh;
      $inputImportance->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_wbfsys_announcement_Importance */

 /**
  * create the ui element for field message
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncement_Message( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputMessage = $this->view->newInput( 'inputWbfsysAnnouncementMessage', 'Wysiwyg' );
      $inputMessage->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_announcement[message]',
          'id'    => 'wgt-input-wbfsys_announcement_message'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full large-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Message', 'src' => 'Announcement' ) ),
        )
      );
      $inputMessage->setWidth( 'full' );

      $inputMessage->mode = 'rich_text';
      $inputMessage->full = true;

      $inputMessage->setData( $this->entity->getData( 'message' ) );
      $inputMessage->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement', 'message' ) );
      $inputMessage->setRequired( $this->fieldRequired( 'wbfsys_announcement', 'message' ) );
      $inputMessage->setLabel( $i18n->l( 'Message', 'wbfsys.announcement.label' ) );

      $inputMessage->refresh           = $this->refresh;
      $inputMessage->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysAnnouncement_Message */

 /**
  * create the ui element for field date_end
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncement_DateEnd( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputDateEnd = $this->view->newInput( 'inputWbfsysAnnouncementDateEnd' , 'Date' );
      $this->items['wbfsys_announcement-date_end'] = $inputDateEnd;
      $inputDateEnd->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement[date_end]',
          'id'        => 'wgt-input-wbfsys_announcement_date_end'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'End Date', 'src' => 'Announcement' ) ),
          'maxlength' => $this->entity->maxSize( 'date_end' ),
        )
      );
      $inputDateEnd->setWidth( 'small' );

      $inputDateEnd->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement', 'date_end' ) );
      $inputDateEnd->setRequired( $this->fieldRequired( 'wbfsys_announcement', 'date_end' ) );
      $inputDateEnd->setData( $this->entity->getDate( 'date_end' ) );
      $inputDateEnd->setLabel( $i18n->l( 'End Date', 'wbfsys.announcement.label' ) );

      $inputDateEnd->refresh           = $this->refresh;
      $inputDateEnd->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysAnnouncement_DateEnd */

 /**
  * create the ui element for field id_vid_entity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncement_IdVidEntity( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdVidEntity = $this->view->newInput( 'inputWbfsysAnnouncementIdVidEntity', 'Hidden' );
      $this->items['wbfsys_announcement-id_vid_entity'] = $inputIdVidEntity;
      $inputIdVidEntity->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement[id_vid_entity]',
          'id'        => 'wgt-input-wbfsys_announcement_id_vid_entity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Entity', 'src' => 'Announcement' ) ),
          'maxlength' => $this->entity->maxSize( 'id_vid_entity' ),
        )
      );
      $inputIdVidEntity->setWidth( 'medium' );

      $inputIdVidEntity->setData( $this->entity->getSecure( 'id_vid_entity' ) );
      $inputIdVidEntity->refresh           = $this->refresh;
      $inputIdVidEntity->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysAnnouncement_IdVidEntity */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncement_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysAnnouncementRowid' , 'int' );
      $this->items['wbfsys_announcement-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement[rowid]',
          'id'        => 'wgt-input-wbfsys_announcement_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Announcement' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_announcement', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.announcement.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysAnnouncement_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncement_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysAnnouncementMTimeCreated' , 'Date' );
      $this->items['wbfsys_announcement-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement[m_time_created]',
          'id'        => 'wgt-input-wbfsys_announcement_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Announcement' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_announcement', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.announcement.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysAnnouncement_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncement_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysAnnouncementMRoleCreate', 'Window' );
      $this->items['wbfsys_announcement-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_announcement[m_role_create]',
        'id'        => 'wgt-input-wbfsys_announcement_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Announcement' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_announcement', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.announcement.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_announcement_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_announcement_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysAnnouncement_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncement_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysAnnouncementMTimeChanged' , 'Date' );
      $this->items['wbfsys_announcement-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_announcement_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Announcement' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_announcement', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.announcement.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysAnnouncement_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncement_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysAnnouncementMRoleChange', 'Window' );
      $this->items['wbfsys_announcement-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_announcement[m_role_change]',
        'id'        => 'wgt-input-wbfsys_announcement_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Announcement' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_announcement', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.announcement.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_announcement_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_announcement_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysAnnouncement_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncement_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysAnnouncementMVersion' , 'int' );
      $this->items['wbfsys_announcement-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement[m_version]',
          'id'        => 'wgt-input-wbfsys_announcement_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Announcement' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_announcement', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.announcement.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysAnnouncement_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysAnnouncement_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysAnnouncementMUuid' , 'Text' );
      $this->items['wbfsys_announcement-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_announcement[m_uuid]',
          'id'        => 'wgt-input-wbfsys_announcement_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Announcement' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_announcement', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_announcement', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.announcement.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysAnnouncement_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysAnnouncement_Crud_Show_Form */


