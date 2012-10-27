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
class WbfsysProfileQuicklink_Crud_Edit_Form
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
  public $namespace  = 'WbfsysProfileQuicklink';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysProfileQuicklink';

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
      'wbfsys_profile_quicklink' => array
      (
        'id_profile' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'access_key' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'label' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'http_url' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'short_desc' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'revision' => array
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
   * @var WbfsysProfileQuicklink_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysProfileQuicklink_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysProfileQuicklink_Entity $entity
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
      'wbfsys_profile_quicklink' => array
      (
        'id_profile',
        'access_key',
        'label',
        'http_url',
        'short_desc',
        'revision',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysProfileQuicklink entity
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
    $this->view->addVar( 'entityWbfsysProfileQuicklink', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_profile_quicklink'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_profile_quicklink[id_wbfsys_profile_quicklink-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysProfileQuicklink_IdProfile( $params );
    $this->input_WbfsysProfileQuicklink_AccessKey( $params );
    $this->input_WbfsysProfileQuicklink_Label( $params );
    $this->input_WbfsysProfileQuicklink_HttpUrl( $params );
    $this->input_WbfsysProfileQuicklink_ShortDesc( $params );
    $this->input_WbfsysProfileQuicklink_Revision( $params );
    $this->input_WbfsysProfileQuicklink_Rowid( $params );
    $this->input_WbfsysProfileQuicklink_MTimeCreated( $params );
    $this->input_WbfsysProfileQuicklink_MRoleCreate( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field id_profile
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProfileQuicklink_IdProfile( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysProfile_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysProfile not exists' );

      Log::warn( 'Looks like the Entity: WbfsysProfile is missing' );

      return;
    }


      //p: Window
      $objidWbfsysProfile = $this->entity->getData( 'id_profile' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysProfile
          || !$entityWbfsysProfile = $this->db->orm->get
          (
            'WbfsysProfile',
            $objidWbfsysProfile
          )
      )
      {
        $entityWbfsysProfile = $this->db->orm->newEntity( 'WbfsysProfile' );
      }

      $inputIdProfile = $this->view->newInput( 'inputWbfsysProfileQuicklinkIdProfile', 'Window' );
      $this->items['wbfsys_profile_quicklink-id_profile'] = $inputIdProfile;
      $inputIdProfile->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_profile_quicklink[id_profile]',
        'id'        => 'wgt-input-wbfsys_profile_quicklink_id_profile'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Profile', 'src' => 'Profile Quicklink' ) ),
      ));

      if( $this->assignedForm )
        $inputIdProfile->assignedForm = $this->assignedForm;

      $inputIdProfile->setWidth( 'medium' );

      $inputIdProfile->setData( $this->entity->getData( 'id_profile' )  );
      $inputIdProfile->setReadonly( $this->fieldReadOnly( 'wbfsys_profile_quicklink', 'id_profile' ) );
      $inputIdProfile->setRequired( $this->fieldRequired( 'wbfsys_profile_quicklink', 'id_profile' ) );
      $inputIdProfile->setLabel( $i18n->l( 'Profile', 'wbfsys.profile_quicklink.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Profile.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_profile_quicklink_id_profile'.($this->suffix?'-'.$this->suffix:'');

      $inputIdProfile->setListUrl ( $listUrl );
      $inputIdProfile->setListIcon( 'control/connect.png' );
      $inputIdProfile->setEntityUrl( 'maintab.php?c=Wbfsys.Profile.edit' );
      $inputIdProfile->conEntity         = $entityWbfsysProfile;
      $inputIdProfile->refresh           = $this->refresh;
      $inputIdProfile->serializeElement  = $this->sendElement;



      $inputIdProfile->view = $this->view;
      $inputIdProfile->buildJavascript( 'wgt-input-wbfsys_profile_quicklink_id_profile'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdProfile );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysProfileQuicklink_IdProfile */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProfileQuicklink_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysProfileQuicklinkAccessKey' , 'Text' );
      $this->items['wbfsys_profile_quicklink-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_profile_quicklink[access_key]',
          'id'        => 'wgt-input-wbfsys_profile_quicklink_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Profile Quicklink' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_profile_quicklink', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_profile_quicklink', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.profile_quicklink.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProfileQuicklink_AccessKey */

 /**
  * create the ui element for field label
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProfileQuicklink_Label( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputLabel = $this->view->newInput( 'inputWbfsysProfileQuicklinkLabel' , 'Text' );
      $this->items['wbfsys_profile_quicklink-label'] = $inputLabel;
      $inputLabel->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_profile_quicklink[label]',
          'id'        => 'wgt-input-wbfsys_profile_quicklink_label'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Label', 'src' => 'Profile Quicklink' ) ),
          'maxlength' => $this->entity->maxSize( 'label' ),
        )
      );
      $inputLabel->setWidth( 'medium' );

      $inputLabel->setReadonly( $this->fieldReadOnly( 'wbfsys_profile_quicklink', 'label' ) );
      $inputLabel->setRequired( $this->fieldRequired( 'wbfsys_profile_quicklink', 'label' ) );
      $inputLabel->setData( $this->entity->getSecure('label') );
      $inputLabel->setLabel( $i18n->l( 'Label', 'wbfsys.profile_quicklink.label' ) );

      $inputLabel->refresh           = $this->refresh;
      $inputLabel->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProfileQuicklink_Label */

 /**
  * create the ui element for field http_url
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProfileQuicklink_HttpUrl( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputHttpUrl = $this->view->newInput( 'inputWbfsysProfileQuicklinkHttpUrl' , 'text' );
      $this->items['wbfsys_profile_quicklink-http_url'] = $inputHttpUrl;
      $inputHttpUrl->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_profile_quicklink[http_url]',
          'id'        => 'wgt-input-wbfsys_profile_quicklink_http_url'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'URL', 'src' => 'Profile Quicklink' ) ),
        )
      );
      $inputHttpUrl->setWidth( 'medium' );

      $inputHttpUrl->setReadonly( $this->fieldReadOnly( 'wbfsys_profile_quicklink', 'http_url' ) );
      $inputHttpUrl->setRequired( $this->fieldRequired( 'wbfsys_profile_quicklink', 'http_url' ) );
      $inputHttpUrl->setData( $this->entity->getSecure( 'http_url' ) );
      $inputHttpUrl->setLabel( $i18n->l( 'URL', 'wbfsys.profile_quicklink.label' ) );

      $inputHttpUrl->refresh           = $this->refresh;
      $inputHttpUrl->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_WbfsysProfileQuicklink_HttpUrl */

 /**
  * create the ui element for field short_desc
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProfileQuicklink_ShortDesc( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputShortDesc = $this->view->newInput( 'inputWbfsysProfileQuicklinkShortDesc' , 'Text' );
      $this->items['wbfsys_profile_quicklink-short_desc'] = $inputShortDesc;
      $inputShortDesc->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_profile_quicklink[short_desc]',
          'id'        => 'wgt-input-wbfsys_profile_quicklink_short_desc'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Short desc', 'src' => 'Profile Quicklink' ) ),
          'maxlength' => $this->entity->maxSize( 'short_desc' ),
        )
      );
      $inputShortDesc->setWidth( 'medium' );

      $inputShortDesc->setReadonly( $this->fieldReadOnly( 'wbfsys_profile_quicklink', 'short_desc' ) );
      $inputShortDesc->setRequired( $this->fieldRequired( 'wbfsys_profile_quicklink', 'short_desc' ) );
      $inputShortDesc->setData( $this->entity->getSecure('short_desc') );
      $inputShortDesc->setLabel( $i18n->l( 'Short desc', 'wbfsys.profile_quicklink.label' ) );

      $inputShortDesc->refresh           = $this->refresh;
      $inputShortDesc->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProfileQuicklink_ShortDesc */

 /**
  * create the ui element for field revision
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProfileQuicklink_Revision( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputRevision = $this->view->newInput( 'inputWbfsysProfileQuicklinkRevision', 'Int' );
      $this->items['wbfsys_profile_quicklink-revision'] = $inputRevision;
      $inputRevision->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_profile_quicklink[revision]',
          'id'        => 'wgt-input-wbfsys_profile_quicklink_revision'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Revision', 'src' => 'Profile Quicklink' ) ),
        )
      );
      $inputRevision->setWidth( 'medium' );

$inputRevision->setReadOnly( $this->fieldReadOnly( 'wbfsys_profile_quicklink', 'revision' ) );
      $inputRevision->setRequired( $this->fieldRequired( 'wbfsys_profile_quicklink', 'revision' ) );
      $inputRevision->setData( $this->entity->getData( 'revision' ) );
      $inputRevision->setLabel( $i18n->l( 'Revision', 'wbfsys.profile_quicklink.label' ) );

      $inputRevision->refresh           = $this->refresh;
      $inputRevision->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProfileQuicklink_Revision */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProfileQuicklink_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysProfileQuicklinkRowid' , 'int' );
      $this->items['wbfsys_profile_quicklink-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_profile_quicklink[rowid]',
          'id'        => 'wgt-input-wbfsys_profile_quicklink_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Profile Quicklink' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_profile_quicklink', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_profile_quicklink', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.profile_quicklink.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProfileQuicklink_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProfileQuicklink_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysProfileQuicklinkMTimeCreated' , 'Date' );
      $this->items['wbfsys_profile_quicklink-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_profile_quicklink[m_time_created]',
          'id'        => 'wgt-input-wbfsys_profile_quicklink_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Profile Quicklink' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_profile_quicklink', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_profile_quicklink', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.profile_quicklink.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysProfileQuicklink_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProfileQuicklink_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysProfileQuicklinkMRoleCreate', 'Window' );
      $this->items['wbfsys_profile_quicklink-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_profile_quicklink[m_role_create]',
        'id'        => 'wgt-input-wbfsys_profile_quicklink_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Profile Quicklink' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_profile_quicklink', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_profile_quicklink', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.profile_quicklink.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_profile_quicklink_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_profile_quicklink_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysProfileQuicklink_MRoleCreate */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysProfileQuicklink_Crud_Edit_Form */


