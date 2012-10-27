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
class WbfsysGroupUsers_Crud_Create_Form
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
  public $namespace  = 'WbfsysGroupUsers';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysGroupUsers';

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
      'wbfsys_group_users' => array
      (
        'id_user' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_group' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_area' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'partial' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'ident_key' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'vid' => array
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
        'description' => array
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
   * @var WbfsysGroupUsers_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysGroupUsers_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysGroupUsers_Entity $entity
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
      'wbfsys_group_users' => array
      (
        'id_user',
        'id_group',
        'id_area',
        'partial',
        'ident_key',
        'vid',
        'date_start',
        'description',
        'date_end',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysGroupUsers entity
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
    $this->view->addVar( 'entityWbfsysGroupUsers', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_group_users'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_group_users[id_wbfsys_group_users-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysGroupUsers_IdUser( $params );
    $this->input_WbfsysGroupUsers_IdGroup( $params );
    $this->input_WbfsysGroupUsers_IdArea( $params );
    $this->input_WbfsysGroupUsers_Partial( $params );
    $this->input_WbfsysGroupUsers_IdentKey( $params );
    $this->input_WbfsysGroupUsers_Vid( $params );
    $this->input_WbfsysGroupUsers_DateStart( $params );
    $this->input_WbfsysGroupUsers_Description( $params );
    $this->input_WbfsysGroupUsers_DateEnd( $params );
    $this->input_WbfsysGroupUsers_Rowid( $params );
    $this->input_WbfsysGroupUsers_MTimeCreated( $params );
    $this->input_WbfsysGroupUsers_MRoleCreate( $params );
    $this->input_WbfsysGroupUsers_MTimeChanged( $params );
    $this->input_WbfsysGroupUsers_MRoleChange( $params );
    $this->input_WbfsysGroupUsers_MVersion( $params );
    $this->input_WbfsysGroupUsers_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field id_user
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysGroupUsers_IdUser( $params )
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

      $inputIdUser = $this->view->newInput( 'inputWbfsysGroupUsersIdUser', 'Window' );
      $this->items['wbfsys_group_users-id_user'] = $inputIdUser;
      $inputIdUser->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_group_users[id_user]',
        'id'        => 'wgt-input-wbfsys_group_users_id_user'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'User', 'src' => 'Group Users' ) ),
      ));

      if( $this->assignedForm )
        $inputIdUser->assignedForm = $this->assignedForm;

      $inputIdUser->setWidth( 'medium' );

      $inputIdUser->setData( $this->entity->getData( 'id_user' )  );
      $inputIdUser->setReadonly( $this->fieldReadOnly( 'wbfsys_group_users', 'id_user' ) );
      $inputIdUser->setRequired( $this->fieldRequired( 'wbfsys_group_users', 'id_user' ) );
      $inputIdUser->setLabel( $i18n->l( 'User', 'wbfsys.group_users.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_group_users_id_user'.($this->suffix?'-'.$this->suffix:'');

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
      $inputIdUser->buildJavascript( 'wgt-input-wbfsys_group_users_id_user'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdUser );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysGroupUsers_IdUser */

 /**
  * create the ui element for field id_group
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysGroupUsers_IdGroup( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysRoleGroup_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysRoleGroup not exists' );

      Log::warn( 'Looks like the Entity: WbfsysRoleGroup is missing' );

      return;
    }


      //p: Window
      $objidWbfsysRoleGroup = $this->entity->getData( 'id_group' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysRoleGroup
          || !$entityWbfsysRoleGroup = $this->db->orm->get
          (
            'WbfsysRoleGroup',
            $objidWbfsysRoleGroup
          )
      )
      {
        $entityWbfsysRoleGroup = $this->db->orm->newEntity( 'WbfsysRoleGroup' );
      }

      $inputIdGroup = $this->view->newInput( 'inputWbfsysGroupUsersIdGroup', 'Window' );
      $this->items['wbfsys_group_users-id_group'] = $inputIdGroup;
      $inputIdGroup->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_group_users[id_group]',
        'id'        => 'wgt-input-wbfsys_group_users_id_group'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Group', 'src' => 'Group Users' ) ),
      ));

      if( $this->assignedForm )
        $inputIdGroup->assignedForm = $this->assignedForm;

      $inputIdGroup->setWidth( 'medium' );

      $inputIdGroup->setData( $this->entity->getData( 'id_group' )  );
      $inputIdGroup->setReadonly( $this->fieldReadOnly( 'wbfsys_group_users', 'id_group' ) );
      $inputIdGroup->setRequired( $this->fieldRequired( 'wbfsys_group_users', 'id_group' ) );
      $inputIdGroup->setLabel( $i18n->l( 'Group', 'wbfsys.group_users.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleGroup.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_group_users_id_group'.($this->suffix?'-'.$this->suffix:'');

      $inputIdGroup->setListUrl ( $listUrl );
      $inputIdGroup->setListIcon( 'control/connect.png' );
      $inputIdGroup->setEntityUrl( 'maintab.php?c=Wbfsys.RoleGroup.edit' );
      $inputIdGroup->conEntity         = $entityWbfsysRoleGroup;
      $inputIdGroup->refresh           = $this->refresh;
      $inputIdGroup->serializeElement  = $this->sendElement;



      $inputIdGroup->view = $this->view;
      $inputIdGroup->buildJavascript( 'wgt-input-wbfsys_group_users_id_group'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdGroup );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysGroupUsers_IdGroup */

 /**
  * create the ui element for field id_area
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysGroupUsers_IdArea( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysSecurityArea_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysSecurityArea not exists' );

      Log::warn( 'Looks like the Entity: WbfsysSecurityArea is missing' );

      return;
    }


      //p: Window
      $objidWbfsysSecurityArea = $this->entity->getData( 'id_area' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysSecurityArea
          || !$entityWbfsysSecurityArea = $this->db->orm->get
          (
            'WbfsysSecurityArea',
            $objidWbfsysSecurityArea
          )
      )
      {
        $entityWbfsysSecurityArea = $this->db->orm->newEntity( 'WbfsysSecurityArea' );
      }

      $inputIdArea = $this->view->newInput( 'inputWbfsysGroupUsersIdArea', 'Window' );
      $this->items['wbfsys_group_users-id_area'] = $inputIdArea;
      $inputIdArea->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_group_users[id_area]',
        'id'        => 'wgt-input-wbfsys_group_users_id_area'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Area', 'src' => 'Group Users' ) ),
      ));

      if( $this->assignedForm )
        $inputIdArea->assignedForm = $this->assignedForm;

      $inputIdArea->setWidth( 'medium' );

      $inputIdArea->setData( $this->entity->getData( 'id_area' )  );
      $inputIdArea->setReadonly( $this->fieldReadOnly( 'wbfsys_group_users', 'id_area' ) );
      $inputIdArea->setRequired( $this->fieldRequired( 'wbfsys_group_users', 'id_area' ) );
      $inputIdArea->setLabel( $i18n->l( 'Area', 'wbfsys.group_users.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.SecurityArea.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_group_users_id_area'.($this->suffix?'-'.$this->suffix:'');

      $inputIdArea->setListUrl ( $listUrl );
      $inputIdArea->setListIcon( 'control/connect.png' );
      $inputIdArea->setEntityUrl( 'maintab.php?c=Wbfsys.SecurityArea.edit' );
      $inputIdArea->conEntity         = $entityWbfsysSecurityArea;
      $inputIdArea->refresh           = $this->refresh;
      $inputIdArea->serializeElement  = $this->sendElement;


        $inputIdArea->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.SecurityArea.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdArea->view = $this->view;
      $inputIdArea->buildJavascript( 'wgt-input-wbfsys_group_users_id_area'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdArea );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysGroupUsers_IdArea */

 /**
  * create the ui element for field partial
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysGroupUsers_Partial( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputPartial = $this->view->newInput( 'inputWbfsysGroupUsersPartial', 'Int' );
      $this->items['wbfsys_group_users-partial'] = $inputPartial;
      $inputPartial->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_group_users[partial]',
          'id'        => 'wgt-input-wbfsys_group_users_partial'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Partial', 'src' => 'Group Users' ) ),
        )
      );
      $inputPartial->setWidth( 'medium' );

$inputPartial->setReadOnly( $this->fieldReadOnly( 'wbfsys_group_users', 'partial' ) );
      $inputPartial->setRequired( $this->fieldRequired( 'wbfsys_group_users', 'partial' ) );
      $inputPartial->setData( $this->entity->getData( 'partial' ) );
      $inputPartial->setLabel( $i18n->l( 'Partial', 'wbfsys.group_users.label' ) );

      $inputPartial->refresh           = $this->refresh;
      $inputPartial->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysGroupUsers_Partial */

 /**
  * create the ui element for field ident_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysGroupUsers_IdentKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputIdentKey = $this->view->newInput( 'inputWbfsysGroupUsersIdentKey' , 'Text' );
      $this->items['wbfsys_group_users-ident_key'] = $inputIdentKey;
      $inputIdentKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_group_users[ident_key]',
          'id'        => 'wgt-input-wbfsys_group_users_ident_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Ident key', 'src' => 'Group Users' ) ),
          'maxlength' => $this->entity->maxSize( 'ident_key' ),
        )
      );
      $inputIdentKey->setWidth( 'medium' );

      $inputIdentKey->setReadonly( $this->fieldReadOnly( 'wbfsys_group_users', 'ident_key' ) );
      $inputIdentKey->setRequired( $this->fieldRequired( 'wbfsys_group_users', 'ident_key' ) );
      $inputIdentKey->setData( $this->entity->getSecure('ident_key') );
      $inputIdentKey->setLabel( $i18n->l( 'Ident key', 'wbfsys.group_users.label' ) );

      $inputIdentKey->refresh           = $this->refresh;
      $inputIdentKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysGroupUsers_IdentKey */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysGroupUsers_Vid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputVid = $this->view->newInput( 'inputWbfsysGroupUsersVid', 'Int' );
      $this->items['wbfsys_group_users-vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_group_users[vid]',
          'id'        => 'wgt-input-wbfsys_group_users_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Vid', 'src' => 'Group Users' ) ),
        )
      );
      $inputVid->setWidth( 'medium' );

$inputVid->setReadOnly( $this->fieldReadOnly( 'wbfsys_group_users', 'vid' ) );
      $inputVid->setRequired( $this->fieldRequired( 'wbfsys_group_users', 'vid' ) );
      $inputVid->setData( $this->entity->getData( 'vid' ) );
      $inputVid->setLabel( $i18n->l( 'Vid', 'wbfsys.group_users.label' ) );

      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysGroupUsers_Vid */

 /**
  * create the ui element for field date_start
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysGroupUsers_DateStart( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputDateStart = $this->view->newInput( 'inputWbfsysGroupUsersDateStart' , 'Date' );
      $this->items['wbfsys_group_users-date_start'] = $inputDateStart;
      $inputDateStart->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_group_users[date_start]',
          'id'        => 'wgt-input-wbfsys_group_users_date_start'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Start Date', 'src' => 'Group Users' ) ),
          'maxlength' => $this->entity->maxSize( 'date_start' ),
        )
      );
      $inputDateStart->setWidth( 'small' );

      $inputDateStart->setReadonly( $this->fieldReadOnly( 'wbfsys_group_users', 'date_start' ) );
      $inputDateStart->setRequired( $this->fieldRequired( 'wbfsys_group_users', 'date_start' ) );
      $inputDateStart->setData( $this->entity->getDate( 'date_start' ) );
      $inputDateStart->setLabel( $i18n->l( 'Start Date', 'wbfsys.group_users.label' ) );

      $inputDateStart->refresh           = $this->refresh;
      $inputDateStart->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysGroupUsers_DateStart */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysGroupUsers_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysGroupUsersDescription', 'Textarea' );
      $this->items['wbfsys_group_users-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_group_users[description]',
          'id'    => 'wgt-input-wbfsys_group_users_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Group Users' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_group_users', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_group_users', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.group_users.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysGroupUsers_Description */

 /**
  * create the ui element for field date_end
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysGroupUsers_DateEnd( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputDateEnd = $this->view->newInput( 'inputWbfsysGroupUsersDateEnd' , 'Date' );
      $this->items['wbfsys_group_users-date_end'] = $inputDateEnd;
      $inputDateEnd->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_group_users[date_end]',
          'id'        => 'wgt-input-wbfsys_group_users_date_end'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'End Date', 'src' => 'Group Users' ) ),
          'maxlength' => $this->entity->maxSize( 'date_end' ),
        )
      );
      $inputDateEnd->setWidth( 'small' );

      $inputDateEnd->setReadonly( $this->fieldReadOnly( 'wbfsys_group_users', 'date_end' ) );
      $inputDateEnd->setRequired( $this->fieldRequired( 'wbfsys_group_users', 'date_end' ) );
      $inputDateEnd->setData( $this->entity->getDate( 'date_end' ) );
      $inputDateEnd->setLabel( $i18n->l( 'End Date', 'wbfsys.group_users.label' ) );

      $inputDateEnd->refresh           = $this->refresh;
      $inputDateEnd->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysGroupUsers_DateEnd */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysGroupUsers_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysGroupUsersRowid' , 'int' );
      $this->items['wbfsys_group_users-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_group_users[rowid]',
          'id'        => 'wgt-input-wbfsys_group_users_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Group Users' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_group_users', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_group_users', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.group_users.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysGroupUsers_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysGroupUsers_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysGroupUsersMTimeCreated' , 'Date' );
      $this->items['wbfsys_group_users-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_group_users[m_time_created]',
          'id'        => 'wgt-input-wbfsys_group_users_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Group Users' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_group_users', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_group_users', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.group_users.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysGroupUsers_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysGroupUsers_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysGroupUsersMRoleCreate', 'Window' );
      $this->items['wbfsys_group_users-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_group_users[m_role_create]',
        'id'        => 'wgt-input-wbfsys_group_users_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Group Users' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_group_users', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_group_users', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.group_users.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_group_users_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_group_users_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysGroupUsers_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysGroupUsers_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysGroupUsersMTimeChanged' , 'Date' );
      $this->items['wbfsys_group_users-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_group_users[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_group_users_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Group Users' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_group_users', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_group_users', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.group_users.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysGroupUsers_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysGroupUsers_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysGroupUsersMRoleChange', 'Window' );
      $this->items['wbfsys_group_users-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_group_users[m_role_change]',
        'id'        => 'wgt-input-wbfsys_group_users_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Group Users' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_group_users', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_group_users', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.group_users.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_group_users_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_group_users_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysGroupUsers_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysGroupUsers_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysGroupUsersMVersion' , 'int' );
      $this->items['wbfsys_group_users-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_group_users[m_version]',
          'id'        => 'wgt-input-wbfsys_group_users_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Group Users' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_group_users', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_group_users', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.group_users.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysGroupUsers_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysGroupUsers_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysGroupUsersMUuid' , 'Text' );
      $this->items['wbfsys_group_users-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_group_users[m_uuid]',
          'id'        => 'wgt-input-wbfsys_group_users_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Group Users' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_group_users', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_group_users', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.group_users.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysGroupUsers_MUuid */

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
      $orm->getValidationData( 'WbfsysGroupUsers', array_keys( $this->fields['wbfsys_group_users']), true ),
      $orm->getErrorMessages( 'WbfsysGroupUsers' ),
      'wbfsys_group_users'
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


    // ui: int
    if( is_null( $this->entity->partial ) )
      $this->entity->partial = '0';


  }//end public function setDefaultData */


}//end class WbfsysGroupUsers_Crud_Create_Form */


