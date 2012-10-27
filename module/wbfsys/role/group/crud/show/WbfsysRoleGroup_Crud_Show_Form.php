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
class WbfsysRoleGroup_Crud_Show_Form
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
  public $namespace  = 'WbfsysRoleGroup';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysRoleGroup';

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
      'wbfsys_role_group' => array
      (
        'm_parent' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'name' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'access_key' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'id_mandant' => array
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
        'level' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'system' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_module' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'revision' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'flag_core' => array
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
   * @var WbfsysRoleGroup_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysRoleGroup_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysRoleGroup_Entity $entity
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
      'wbfsys_role_group' => array
      (
        'm_parent',
        'name',
        'access_key',
        'id_mandant',
        'id_type',
        'level',
        'system',
        'id_module',
        'revision',
        'flag_core',
        'description',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysRoleGroup entity
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
    $this->view->addVar( 'entityWbfsysRoleGroup', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_role_group'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_role_group[id_wbfsys_role_group-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysRoleGroup_MParent( $params );
    $this->input_WbfsysRoleGroup_Name( $params );
    $this->input_WbfsysRoleGroup_AccessKey( $params );
    $this->input_WbfsysRoleGroup_IdMandant( $params );
    $this->input_WbfsysRoleGroup_IdType( $params );
    $this->input_WbfsysRoleGroup_Level( $params );
    $this->input_WbfsysRoleGroup_System( $params );
    $this->input_WbfsysRoleGroup_IdModule( $params );
    $this->input_WbfsysRoleGroup_Revision( $params );
    $this->input_WbfsysRoleGroup_FlagCore( $params );
    $this->input_WbfsysRoleGroup_Description( $params );
    $this->input_WbfsysRoleGroup_Rowid( $params );
    $this->input_WbfsysRoleGroup_MTimeCreated( $params );
    $this->input_WbfsysRoleGroup_MRoleCreate( $params );
    $this->input_WbfsysRoleGroup_MTimeChanged( $params );
    $this->input_WbfsysRoleGroup_MRoleChange( $params );
    $this->input_WbfsysRoleGroup_MVersion( $params );
    $this->input_WbfsysRoleGroup_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field m_parent
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleGroup_MParent( $params )
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
      $objidWbfsysRoleGroup = $this->entity->getData( 'm_parent' ) ;

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

      $inputMParent = $this->view->newInput( 'inputWbfsysRoleGroupMParent', 'Window' );
      $this->items['wbfsys_role_group-m_parent'] = $inputMParent;
      $inputMParent->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_role_group[m_parent]',
        'id'        => 'wgt-input-wbfsys_role_group_m_parent'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Parent Node', 'src' => 'Role Group' ) ),
      ));

      if( $this->assignedForm )
        $inputMParent->assignedForm = $this->assignedForm;

      $inputMParent->setWidth( 'medium' );

      $inputMParent->setData( $this->entity->getData( 'm_parent' )  );
      $inputMParent->setReadonly( $this->fieldReadOnly( 'wbfsys_role_group', 'm_parent' ) );
      $inputMParent->setRequired( $this->fieldRequired( 'wbfsys_role_group', 'm_parent' ) );
      $inputMParent->setLabel( $i18n->l( 'Parent Node', 'wbfsys.role_group.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleGroup.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_role_group_m_parent'.($this->suffix?'-'.$this->suffix:'');

      $inputMParent->setListUrl ( $listUrl );
      $inputMParent->setListIcon( 'control/connect.png' );
      $inputMParent->setEntityUrl( 'maintab.php?c=Wbfsys.RoleGroup.edit' );
      $inputMParent->conEntity         = $entityWbfsysRoleGroup;
      $inputMParent->refresh           = $this->refresh;
      $inputMParent->serializeElement  = $this->sendElement;



      $inputMParent->view = $this->view;
      $inputMParent->buildJavascript( 'wgt-input-wbfsys_role_group_m_parent'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMParent );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysRoleGroup_MParent */

 /**
  * create the ui element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleGroup_Name( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputName = $this->view->newInput( 'inputWbfsysRoleGroupName' , 'Text' );
      $this->items['wbfsys_role_group-name'] = $inputName;
      $inputName->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_group[name]',
          'id'        => 'wgt-input-wbfsys_role_group_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Name', 'src' => 'Role Group' ) ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadonly( $this->fieldReadOnly( 'wbfsys_role_group', 'name' ) );
      $inputName->setRequired( $this->fieldRequired( 'wbfsys_role_group', 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel( $i18n->l( 'Name', 'wbfsys.role_group.label' ) );

      $inputName->refresh           = $this->refresh;
      $inputName->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysRoleGroup_Name */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleGroup_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysRoleGroupAccessKey' , 'Text' );
      $this->items['wbfsys_role_group-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_group[access_key]',
          'id'        => 'wgt-input-wbfsys_role_group_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Role Group' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_role_group', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_role_group', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.role_group.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysRoleGroup_AccessKey */

 /**
  * create the ui element for field id_mandant
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleGroup_IdMandant( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysRoleMandant_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysRoleMandant not exists' );

      Log::warn( 'Looks like the Entity: WbfsysRoleMandant is missing' );

      return;
    }


      //p: Window
      $objidWbfsysRoleMandant = $this->entity->getData( 'id_mandant' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysRoleMandant
          || !$entityWbfsysRoleMandant = $this->db->orm->get
          (
            'WbfsysRoleMandant',
            $objidWbfsysRoleMandant
          )
      )
      {
        $entityWbfsysRoleMandant = $this->db->orm->newEntity( 'WbfsysRoleMandant' );
      }

      $inputIdMandant = $this->view->newInput( 'inputWbfsysRoleGroupIdMandant', 'Window' );
      $this->items['wbfsys_role_group-id_mandant'] = $inputIdMandant;
      $inputIdMandant->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_role_group[id_mandant]',
        'id'        => 'wgt-input-wbfsys_role_group_id_mandant'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Mandant', 'src' => 'Role Group' ) ),
      ));

      if( $this->assignedForm )
        $inputIdMandant->assignedForm = $this->assignedForm;

      $inputIdMandant->setWidth( 'medium' );

      $inputIdMandant->setData( $this->entity->getData( 'id_mandant' )  );
      $inputIdMandant->setReadonly( $this->fieldReadOnly( 'wbfsys_role_group', 'id_mandant' ) );
      $inputIdMandant->setRequired( $this->fieldRequired( 'wbfsys_role_group', 'id_mandant' ) );
      $inputIdMandant->setLabel( $i18n->l( 'Mandant', 'wbfsys.role_group.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleMandant.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_role_group_id_mandant'.($this->suffix?'-'.$this->suffix:'');

      $inputIdMandant->setListUrl ( $listUrl );
      $inputIdMandant->setListIcon( 'control/connect.png' );
      $inputIdMandant->setEntityUrl( 'maintab.php?c=Wbfsys.RoleMandant.edit' );
      $inputIdMandant->conEntity         = $entityWbfsysRoleMandant;
      $inputIdMandant->refresh           = $this->refresh;
      $inputIdMandant->serializeElement  = $this->sendElement;



      $inputIdMandant->view = $this->view;
      $inputIdMandant->buildJavascript( 'wgt-input-wbfsys_role_group_id_mandant'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdMandant );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysRoleGroup_IdMandant */

 /**
  * create the ui element for field id_type
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleGroup_IdType( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_role_group_id_type'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysRoleGroupType_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysRoleGroupType_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysRoleGroupType_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdType = $this->view->newItem( 'inputWbfsysRoleGroupIdType', 'WbfsysRoleGroupType_Selectbox' );
      $this->items['wbfsys_role_group-id_type'] = $inputIdType;
      $inputIdType->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_group[id_type]',
          'id'        => 'wgt-input-wbfsys_role_group_id_type'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Type', 'src' => 'Role Group' ) ),
        )
      );
      $inputIdType->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdType->assignedForm = $this->assignedForm;

      $inputIdType->setActive( $this->entity->getData( 'id_type' ) );
      $inputIdType->setReadonly( $this->fieldReadOnly( 'wbfsys_role_group', 'id_type' ) );
      $inputIdType->setRequired( $this->fieldRequired( 'wbfsys_role_group', 'id_type' ) );


      $inputIdType->setLabel( $i18n->l( 'Type', 'wbfsys.role_group.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_role_group_type:insert' ) )
      {
        $inputIdType->refresh           = $this->refresh;
        $inputIdType->serializeElement  = $this->sendElement;
        $inputIdType->editUrl = 'index.php?c=Wbfsys.RoleGroupType.listing&amp;target='.$this->namespace.'&amp;field=id_type&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_role_group_id_type'.$this->suffix;
      }
      // set an empty first entry
      $inputIdType->setFirstFree( 'No Type selected' );

      
      $queryIdType = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_role_group_id_type'] ) )
      {
      
        $queryIdType = $this->db->newQuery( 'WbfsysRoleGroupType_Selectbox' );

        $queryIdType->fetchSelectbox();
        $inputIdType->setData( $queryIdType->getAll() );
      
      }
      else
      {
        $inputIdType->setData( $this->listElementData['wbfsys_role_group_id_type'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdType )
        $queryIdType = $this->db->newQuery( 'WbfsysRoleGroupType_Selectbox' );
      
      $inputIdType->loadActive = function( $activeId ) use ( $queryIdType ){
 
        return $queryIdType->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysRoleGroup_IdType */

 /**
  * create the ui element for field level
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleGroup_Level( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_role_group_level'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysSecurityLevelValue_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysSecurityLevelValue_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysSecurityLevelValue_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputLevel = $this->view->newItem( 'inputWbfsysRoleGroupLevel', 'WbfsysSecurityLevelValue_Selectbox' );
      $this->items['wbfsys_role_group-level'] = $inputLevel;
      $inputLevel->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_group[level]',
          'id'        => 'wgt-input-wbfsys_role_group_level'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Level', 'src' => 'Role Group' ) ),
        )
      );
      $inputLevel->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputLevel->assignedForm = $this->assignedForm;

      $inputLevel->setActive( $this->entity->getData( 'level' ) );
      $inputLevel->setReadonly( $this->fieldReadOnly( 'wbfsys_role_group', 'level' ) );
      $inputLevel->setRequired( $this->fieldRequired( 'wbfsys_role_group', 'level' ) );


      $inputLevel->setLabel( $i18n->l( 'Access Level', 'wbfsys.role_group.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputLevel->refresh           = $this->refresh;
        $inputLevel->serializeElement  = $this->sendElement;
        $inputLevel->editUrl = 'index.php?c=Wbfsys.SecurityLevel.listing&amp;target='.$this->namespace.'&amp;field=level&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_role_group_level'.$this->suffix;
      }
      // set an empty first entry
      $inputLevel->setFirstFree( 'No Access Level selected' );

      
      $queryLevel = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_role_group_level'] ) )
      {
      
        $queryLevel = $this->db->newQuery( 'WbfsysSecurityLevelValue_Selectbox' );

        $queryLevel->fetchSelectbox();
        $inputLevel->setData( $queryLevel->getAll() );
      
      }
      else
      {
        $inputLevel->setData( $this->listElementData['wbfsys_role_group_level'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryLevel )
        $queryLevel = $this->db->newQuery( 'WbfsysSecurityLevelValue_Selectbox' );
      
      $inputLevel->loadActive = function( $activeId ) use ( $queryLevel ){
 
        return $queryLevel->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysRoleGroup_Level */

 /**
  * create the ui element for field system
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleGroup_System( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputSystem = $this->view->newInput( 'inputWbfsysRoleGroupSystem', 'Checkbox' );
      $this->items['wbfsys_role_group-system'] = $inputSystem;
      $inputSystem->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_group[system]',
          'id'        => 'wgt-input-wbfsys_role_group_system'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'System', 'src' => 'Role Group' ) ),
        )
      );
      $inputSystem->setWidth( 'medium' );

      $inputSystem->setReadonly( $this->fieldReadOnly( 'wbfsys_role_group', 'system' ) );
      $inputSystem->setRequired( $this->fieldRequired( 'wbfsys_role_group', 'system' ) );
      $inputSystem->setActive( $this->entity->getBoolean( 'system' ) );
      $inputSystem->setLabel( $i18n->l( 'System', 'wbfsys.role_group.label' ) );

      $inputSystem->refresh           = $this->refresh;
      $inputSystem->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysRoleGroup_System */

 /**
  * create the ui element for field id_module
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleGroup_IdModule( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysModule_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysModule not exists' );

      Log::warn( 'Looks like the Entity: WbfsysModule is missing' );

      return;
    }


      //p: Window
      $objidWbfsysModule = $this->entity->getData( 'id_module' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysModule
          || !$entityWbfsysModule = $this->db->orm->get
          (
            'WbfsysModule',
            $objidWbfsysModule
          )
      )
      {
        $entityWbfsysModule = $this->db->orm->newEntity( 'WbfsysModule' );
      }

      $inputIdModule = $this->view->newInput( 'inputWbfsysRoleGroupIdModule', 'Window' );
      $this->items['wbfsys_role_group-id_module'] = $inputIdModule;
      $inputIdModule->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_role_group[id_module]',
        'id'        => 'wgt-input-wbfsys_role_group_id_module'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Module', 'src' => 'Role Group' ) ),
      ));

      if( $this->assignedForm )
        $inputIdModule->assignedForm = $this->assignedForm;

      $inputIdModule->setWidth( 'medium' );

      $inputIdModule->setData( $this->entity->getData( 'id_module' )  );
      $inputIdModule->setReadonly( $this->fieldReadOnly( 'wbfsys_role_group', 'id_module' ) );
      $inputIdModule->setRequired( $this->fieldRequired( 'wbfsys_role_group', 'id_module' ) );
      $inputIdModule->setLabel( $i18n->l( 'Module', 'wbfsys.role_group.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Module.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_role_group_id_module'.($this->suffix?'-'.$this->suffix:'');

      $inputIdModule->setListUrl ( $listUrl );
      $inputIdModule->setListIcon( 'control/connect.png' );
      $inputIdModule->setEntityUrl( 'maintab.php?c=Wbfsys.Module.edit' );
      $inputIdModule->conEntity         = $entityWbfsysModule;
      $inputIdModule->refresh           = $this->refresh;
      $inputIdModule->serializeElement  = $this->sendElement;



      $inputIdModule->view = $this->view;
      $inputIdModule->buildJavascript( 'wgt-input-wbfsys_role_group_id_module'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdModule );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysRoleGroup_IdModule */

 /**
  * create the ui element for field revision
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleGroup_Revision( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputRevision = $this->view->newInput( 'inputWbfsysRoleGroupRevision', 'Int' );
      $this->items['wbfsys_role_group-revision'] = $inputRevision;
      $inputRevision->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_group[revision]',
          'id'        => 'wgt-input-wbfsys_role_group_revision'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Revision', 'src' => 'Role Group' ) ),
        )
      );
      $inputRevision->setWidth( 'medium' );

$inputRevision->setReadOnly( $this->fieldReadOnly( 'wbfsys_role_group', 'revision' ) );
      $inputRevision->setRequired( $this->fieldRequired( 'wbfsys_role_group', 'revision' ) );
      $inputRevision->setData( $this->entity->getData( 'revision' ) );
      $inputRevision->setLabel( $i18n->l( 'Revision', 'wbfsys.role_group.label' ) );

      $inputRevision->refresh           = $this->refresh;
      $inputRevision->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysRoleGroup_Revision */

 /**
  * create the ui element for field flag_core
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleGroup_FlagCore( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputFlagCore = $this->view->newInput( 'inputWbfsysRoleGroupFlagCore', 'Checkbox' );
      $this->items['wbfsys_role_group-flag_core'] = $inputFlagCore;
      $inputFlagCore->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_group[flag_core]',
          'id'        => 'wgt-input-wbfsys_role_group_flag_core'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Core', 'src' => 'Role Group' ) ),
        )
      );
      $inputFlagCore->setWidth( 'medium' );

      $inputFlagCore->setReadonly( $this->fieldReadOnly( 'wbfsys_role_group', 'flag_core' ) );
      $inputFlagCore->setRequired( $this->fieldRequired( 'wbfsys_role_group', 'flag_core' ) );
      $inputFlagCore->setActive( $this->entity->getBoolean( 'flag_core' ) );
      $inputFlagCore->setLabel( $i18n->l( 'Core', 'wbfsys.role_group.label' ) );

      $inputFlagCore->refresh           = $this->refresh;
      $inputFlagCore->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysRoleGroup_FlagCore */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleGroup_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysRoleGroupDescription', 'Textarea' );
      $this->items['wbfsys_role_group-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_role_group[description]',
          'id'    => 'wgt-input-wbfsys_role_group_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Role Group' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_role_group', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_role_group', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.role_group.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysRoleGroup_Description */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleGroup_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysRoleGroupRowid' , 'int' );
      $this->items['wbfsys_role_group-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_group[rowid]',
          'id'        => 'wgt-input-wbfsys_role_group_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Role Group' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_role_group', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_role_group', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.role_group.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysRoleGroup_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleGroup_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysRoleGroupMTimeCreated' , 'Date' );
      $this->items['wbfsys_role_group-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_group[m_time_created]',
          'id'        => 'wgt-input-wbfsys_role_group_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Role Group' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_role_group', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_role_group', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.role_group.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysRoleGroup_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleGroup_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysRoleGroupMRoleCreate', 'Window' );
      $this->items['wbfsys_role_group-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_role_group[m_role_create]',
        'id'        => 'wgt-input-wbfsys_role_group_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Role Group' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_role_group', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_role_group', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.role_group.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_role_group_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_role_group_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysRoleGroup_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleGroup_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysRoleGroupMTimeChanged' , 'Date' );
      $this->items['wbfsys_role_group-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_group[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_role_group_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Role Group' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_role_group', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_role_group', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.role_group.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysRoleGroup_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleGroup_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysRoleGroupMRoleChange', 'Window' );
      $this->items['wbfsys_role_group-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_role_group[m_role_change]',
        'id'        => 'wgt-input-wbfsys_role_group_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Role Group' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_role_group', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_role_group', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.role_group.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_role_group_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_role_group_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysRoleGroup_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleGroup_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysRoleGroupMVersion' , 'int' );
      $this->items['wbfsys_role_group-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_group[m_version]',
          'id'        => 'wgt-input-wbfsys_role_group_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Role Group' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_role_group', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_role_group', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.role_group.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysRoleGroup_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysRoleGroup_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysRoleGroupMUuid' , 'Text' );
      $this->items['wbfsys_role_group-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_role_group[m_uuid]',
          'id'        => 'wgt-input-wbfsys_role_group_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Role Group' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_role_group', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_role_group', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.role_group.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysRoleGroup_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysRoleGroup_Crud_Show_Form */


