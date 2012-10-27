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
class WbfsysProtocolFaillog_Crud_Show_Form
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
  public $namespace  = 'WbfsysProtocolFaillog';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysProtocolFaillog';

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
      'wbfsys_protocol_faillog' => array
      (
        'user_name' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'ip_address' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'custom_data' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'user_agent' => array
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
   * @var WbfsysProtocolFaillog_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysProtocolFaillog_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysProtocolFaillog_Entity $entity
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
      'wbfsys_protocol_faillog' => array
      (
        'user_name',
        'ip_address',
        'custom_data',
        'user_agent',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysProtocolFaillog entity
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
    $this->view->addVar( 'entityWbfsysProtocolFaillog', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_protocol_faillog'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_protocol_faillog[id_wbfsys_protocol_faillog-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysProtocolFaillog_UserName( $params );
    $this->input_WbfsysProtocolFaillog_IpAddress( $params );
    $this->input_WbfsysProtocolFaillog_CustomData( $params );
    $this->input_WbfsysProtocolFaillog_UserAgent( $params );
    $this->input_WbfsysProtocolFaillog_Rowid( $params );
    $this->input_WbfsysProtocolFaillog_MTimeCreated( $params );
    $this->input_WbfsysProtocolFaillog_MRoleCreate( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field user_name
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolFaillog_UserName( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputUserName = $this->view->newInput( 'inputWbfsysProtocolFaillogUserName' , 'Text' );
      $this->items['wbfsys_protocol_faillog-user_name'] = $inputUserName;
      $inputUserName->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_protocol_faillog[user_name]',
          'id'        => 'wgt-input-wbfsys_protocol_faillog_user_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'User name', 'src' => 'Protocol Faillog' ) ),
          'maxlength' => $this->entity->maxSize( 'user_name' ),
        )
      );
      $inputUserName->setWidth( 'medium' );

      $inputUserName->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_faillog', 'user_name' ) );
      $inputUserName->setRequired( $this->fieldRequired( 'wbfsys_protocol_faillog', 'user_name' ) );
      $inputUserName->setData( $this->entity->getSecure('user_name') );
      $inputUserName->setLabel( $i18n->l( 'User name', 'wbfsys.protocol_faillog.label' ) );

      $inputUserName->refresh           = $this->refresh;
      $inputUserName->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProtocolFaillog_UserName */

 /**
  * create the ui element for field ip_address
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolFaillog_IpAddress( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputIpAddress = $this->view->newInput( 'inputWbfsysProtocolFaillogIpAddress' , 'Text' );
      $this->items['wbfsys_protocol_faillog-ip_address'] = $inputIpAddress;
      $inputIpAddress->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_protocol_faillog[ip_address]',
          'id'        => 'wgt-input-wbfsys_protocol_faillog_ip_address'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'IP Address', 'src' => 'Protocol Faillog' ) ),
          'maxlength' => $this->entity->maxSize( 'ip_address' ),
        )
      );
      $inputIpAddress->setWidth( 'medium' );

      $inputIpAddress->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_faillog', 'ip_address' ) );
      $inputIpAddress->setRequired( $this->fieldRequired( 'wbfsys_protocol_faillog', 'ip_address' ) );
      $inputIpAddress->setData( $this->entity->getSecure('ip_address') );
      $inputIpAddress->setLabel( $i18n->l( 'IP Address', 'wbfsys.protocol_faillog.label' ) );

      $inputIpAddress->refresh           = $this->refresh;
      $inputIpAddress->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProtocolFaillog_IpAddress */

 /**
  * create the ui element for field custom_data
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolFaillog_CustomData( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputCustomData = $this->view->newInput( 'inputWbfsysProtocolFaillogCustomData', 'Textarea' );
      $this->items['wbfsys_protocol_faillog-custom_data'] = $inputCustomData;
      $inputCustomData->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_protocol_faillog[custom_data]',
          'id'    => 'wgt-input-wbfsys_protocol_faillog_custom_data'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip large medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Custom Data', 'src' => 'Protocol Faillog' ) ),
        )
      );
      $inputCustomData->setWidth( 'large' );


      $inputCustomData->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_faillog', 'custom_data' ) );
      $inputCustomData->setRequired( $this->fieldRequired( 'wbfsys_protocol_faillog', 'custom_data' ) );

      $inputCustomData->setData( $this->entity->getSecure( 'custom_data' ) );
      $inputCustomData->setLabel( $i18n->l( 'Custom Data', 'wbfsys.protocol_faillog.label' ) );

      $inputCustomData->refresh           = $this->refresh;
      $inputCustomData->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProtocolFaillog_CustomData */

 /**
  * create the ui element for field user_agent
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolFaillog_UserAgent( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputUserAgent = $this->view->newInput( 'inputWbfsysProtocolFaillogUserAgent', 'Textarea' );
      $this->items['wbfsys_protocol_faillog-user_agent'] = $inputUserAgent;
      $inputUserAgent->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_protocol_faillog[user_agent]',
          'id'    => 'wgt-input-wbfsys_protocol_faillog_user_agent'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip large medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'User Agent', 'src' => 'Protocol Faillog' ) ),
        )
      );
      $inputUserAgent->setWidth( 'large' );


      $inputUserAgent->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_faillog', 'user_agent' ) );
      $inputUserAgent->setRequired( $this->fieldRequired( 'wbfsys_protocol_faillog', 'user_agent' ) );

      $inputUserAgent->setData( $this->entity->getSecure( 'user_agent' ) );
      $inputUserAgent->setLabel( $i18n->l( 'User Agent', 'wbfsys.protocol_faillog.label' ) );

      $inputUserAgent->refresh           = $this->refresh;
      $inputUserAgent->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysProtocolFaillog_UserAgent */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolFaillog_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysProtocolFaillogRowid' , 'int' );
      $this->items['wbfsys_protocol_faillog-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_protocol_faillog[rowid]',
          'id'        => 'wgt-input-wbfsys_protocol_faillog_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Protocol Faillog' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_faillog', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_protocol_faillog', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.protocol_faillog.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysProtocolFaillog_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolFaillog_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysProtocolFaillogMTimeCreated' , 'Date' );
      $this->items['wbfsys_protocol_faillog-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_protocol_faillog[m_time_created]',
          'id'        => 'wgt-input-wbfsys_protocol_faillog_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Protocol Faillog' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_faillog', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_protocol_faillog', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.protocol_faillog.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysProtocolFaillog_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysProtocolFaillog_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysProtocolFaillogMRoleCreate', 'Window' );
      $this->items['wbfsys_protocol_faillog-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_protocol_faillog[m_role_create]',
        'id'        => 'wgt-input-wbfsys_protocol_faillog_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Protocol Faillog' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_protocol_faillog', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_protocol_faillog', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.protocol_faillog.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_protocol_faillog_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_protocol_faillog_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysProtocolFaillog_MRoleCreate */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysProtocolFaillog_Crud_Show_Form */


