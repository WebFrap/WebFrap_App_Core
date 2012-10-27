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
class WbfsysUserAnnouncement_Crud_Edit_Form
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
  public $namespace  = 'WbfsysUserAnnouncement';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysUserAnnouncement';

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
      'wbfsys_user_announcement' => array
      (
        'id_announcement' => array
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
        'id_status' => array
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
   * @var WbfsysUserAnnouncement_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysUserAnnouncement_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysUserAnnouncement_Entity $entity
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
      'wbfsys_user_announcement' => array
      (
        'id_announcement',
        'id_user',
        'id_status',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysUserAnnouncement entity
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
    $this->view->addVar( 'entityWbfsysUserAnnouncement', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_user_announcement'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_user_announcement[id_wbfsys_user_announcement-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysUserAnnouncement_IdAnnouncement( $params );
    $this->input_WbfsysUserAnnouncement_IdUser( $params );
    $this->input_WbfsysUserAnnouncement_IdStatus( $params );
    $this->input_WbfsysUserAnnouncement_Rowid( $params );
    $this->input_WbfsysUserAnnouncement_MTimeCreated( $params );
    $this->input_WbfsysUserAnnouncement_MRoleCreate( $params );
    $this->input_WbfsysUserAnnouncement_MTimeChanged( $params );
    $this->input_WbfsysUserAnnouncement_MRoleChange( $params );
    $this->input_WbfsysUserAnnouncement_MVersion( $params );
    $this->input_WbfsysUserAnnouncement_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field id_announcement
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserAnnouncement_IdAnnouncement( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysAnnouncement_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysAnnouncement not exists' );

      Log::warn( 'Looks like the Entity: WbfsysAnnouncement is missing' );

      return;
    }


      //p: Window
      $objidWbfsysAnnouncement = $this->entity->getData( 'id_announcement' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysAnnouncement
          || !$entityWbfsysAnnouncement = $this->db->orm->get
          (
            'WbfsysAnnouncement',
            $objidWbfsysAnnouncement
          )
      )
      {
        $entityWbfsysAnnouncement = $this->db->orm->newEntity( 'WbfsysAnnouncement' );
      }

      $inputIdAnnouncement = $this->view->newInput( 'inputWbfsysUserAnnouncementIdAnnouncement', 'Window' );
      $this->items['wbfsys_user_announcement-id_announcement'] = $inputIdAnnouncement;
      $inputIdAnnouncement->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_user_announcement[id_announcement]',
        'id'        => 'wgt-input-wbfsys_user_announcement_id_announcement'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Announcement', 'src' => 'User Announcement' ) ),
      ));

      if( $this->assignedForm )
        $inputIdAnnouncement->assignedForm = $this->assignedForm;

      $inputIdAnnouncement->setWidth( 'medium' );

      $inputIdAnnouncement->setData( $this->entity->getData( 'id_announcement' )  );
      $inputIdAnnouncement->setReadonly( $this->fieldReadOnly( 'wbfsys_user_announcement', 'id_announcement' ) );
      $inputIdAnnouncement->setRequired( $this->fieldRequired( 'wbfsys_user_announcement', 'id_announcement' ) );
      $inputIdAnnouncement->setLabel( $i18n->l( 'Announcement', 'wbfsys.user_announcement.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Announcement.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_user_announcement_id_announcement'.($this->suffix?'-'.$this->suffix:'');

      $inputIdAnnouncement->setListUrl ( $listUrl );
      $inputIdAnnouncement->setListIcon( 'control/connect.png' );
      $inputIdAnnouncement->setEntityUrl( 'maintab.php?c=Wbfsys.Announcement.edit' );
      $inputIdAnnouncement->conEntity         = $entityWbfsysAnnouncement;
      $inputIdAnnouncement->refresh           = $this->refresh;
      $inputIdAnnouncement->serializeElement  = $this->sendElement;



      $inputIdAnnouncement->view = $this->view;
      $inputIdAnnouncement->buildJavascript( 'wgt-input-wbfsys_user_announcement_id_announcement'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdAnnouncement );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysUserAnnouncement_IdAnnouncement */

 /**
  * create the ui element for field id_user
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserAnnouncement_IdUser( $params )
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

      $inputIdUser = $this->view->newInput( 'inputWbfsysUserAnnouncementIdUser', 'Window' );
      $this->items['wbfsys_user_announcement-id_user'] = $inputIdUser;
      $inputIdUser->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_user_announcement[id_user]',
        'id'        => 'wgt-input-wbfsys_user_announcement_id_user'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'User', 'src' => 'User Announcement' ) ),
      ));

      if( $this->assignedForm )
        $inputIdUser->assignedForm = $this->assignedForm;

      $inputIdUser->setWidth( 'medium' );

      $inputIdUser->setData( $this->entity->getData( 'id_user' )  );
      $inputIdUser->setReadonly( $this->fieldReadOnly( 'wbfsys_user_announcement', 'id_user' ) );
      $inputIdUser->setRequired( $this->fieldRequired( 'wbfsys_user_announcement', 'id_user' ) );
      $inputIdUser->setLabel( $i18n->l( 'User', 'wbfsys.user_announcement.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_user_announcement_id_user'.($this->suffix?'-'.$this->suffix:'');

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
      $inputIdUser->buildJavascript( 'wgt-input-wbfsys_user_announcement_id_user'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdUser );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysUserAnnouncement_IdUser */

 /**
  * create the ui element for field id_status
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserAnnouncement_IdStatus( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_user_announcement_id_status'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysUserAnnouncementStatus_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysUserAnnouncementStatus_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysUserAnnouncementStatus_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdStatus = $this->view->newItem( 'inputWbfsysUserAnnouncementIdStatus', 'WbfsysUserAnnouncementStatus_Selectbox' );
      $this->items['wbfsys_user_announcement-id_status'] = $inputIdStatus;
      $inputIdStatus->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_user_announcement[id_status]',
          'id'        => 'wgt-input-wbfsys_user_announcement_id_status'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Status', 'src' => 'User Announcement' ) ),
        )
      );
      $inputIdStatus->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdStatus->assignedForm = $this->assignedForm;

      $inputIdStatus->setActive( $this->entity->getData( 'id_status' ) );
      $inputIdStatus->setReadonly( $this->fieldReadOnly( 'wbfsys_user_announcement', 'id_status' ) );
      $inputIdStatus->setRequired( $this->fieldRequired( 'wbfsys_user_announcement', 'id_status' ) );


      $inputIdStatus->setLabel( $i18n->l( 'Status', 'wbfsys.user_announcement.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdStatus->refresh           = $this->refresh;
        $inputIdStatus->serializeElement  = $this->sendElement;
        $inputIdStatus->editUrl = 'index.php?c=Wbfsys.UserAnnouncementStatus.listing&amp;target='.$this->namespace.'&amp;field=id_status&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_user_announcement_id_status'.$this->suffix;
      }
      // set an empty first entry
      $inputIdStatus->setFirstFree( 'No Status selected' );

      
      $queryIdStatus = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_user_announcement_id_status'] ) )
      {
      
        $queryIdStatus = $this->db->newQuery( 'WbfsysUserAnnouncementStatus_Selectbox' );

        $queryIdStatus->fetchSelectbox();
        $inputIdStatus->setData( $queryIdStatus->getAll() );
      
      }
      else
      {
        $inputIdStatus->setData( $this->listElementData['wbfsys_user_announcement_id_status'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdStatus )
        $queryIdStatus = $this->db->newQuery( 'WbfsysUserAnnouncementStatus_Selectbox' );
      
      $inputIdStatus->loadActive = function( $activeId ) use ( $queryIdStatus ){
 
        return $queryIdStatus->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysUserAnnouncement_IdStatus */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserAnnouncement_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysUserAnnouncementRowid' , 'int' );
      $this->items['wbfsys_user_announcement-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_user_announcement[rowid]',
          'id'        => 'wgt-input-wbfsys_user_announcement_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'User Announcement' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_user_announcement', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_user_announcement', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.user_announcement.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysUserAnnouncement_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserAnnouncement_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysUserAnnouncementMTimeCreated' , 'Date' );
      $this->items['wbfsys_user_announcement-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_user_announcement[m_time_created]',
          'id'        => 'wgt-input-wbfsys_user_announcement_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'User Announcement' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_user_announcement', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_user_announcement', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.user_announcement.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysUserAnnouncement_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserAnnouncement_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysUserAnnouncementMRoleCreate', 'Window' );
      $this->items['wbfsys_user_announcement-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_user_announcement[m_role_create]',
        'id'        => 'wgt-input-wbfsys_user_announcement_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'User Announcement' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_user_announcement', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_user_announcement', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.user_announcement.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_user_announcement_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_user_announcement_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysUserAnnouncement_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserAnnouncement_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysUserAnnouncementMTimeChanged' , 'Date' );
      $this->items['wbfsys_user_announcement-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_user_announcement[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_user_announcement_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'User Announcement' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_user_announcement', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_user_announcement', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.user_announcement.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysUserAnnouncement_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserAnnouncement_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysUserAnnouncementMRoleChange', 'Window' );
      $this->items['wbfsys_user_announcement-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_user_announcement[m_role_change]',
        'id'        => 'wgt-input-wbfsys_user_announcement_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'User Announcement' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_user_announcement', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_user_announcement', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.user_announcement.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_user_announcement_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_user_announcement_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysUserAnnouncement_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserAnnouncement_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysUserAnnouncementMVersion' , 'int' );
      $this->items['wbfsys_user_announcement-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_user_announcement[m_version]',
          'id'        => 'wgt-input-wbfsys_user_announcement_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'User Announcement' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_user_announcement', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_user_announcement', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.user_announcement.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysUserAnnouncement_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysUserAnnouncement_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysUserAnnouncementMUuid' , 'Text' );
      $this->items['wbfsys_user_announcement-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_user_announcement[m_uuid]',
          'id'        => 'wgt-input-wbfsys_user_announcement_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'User Announcement' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_user_announcement', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_user_announcement', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.user_announcement.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysUserAnnouncement_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysUserAnnouncement_Crud_Edit_Form */


