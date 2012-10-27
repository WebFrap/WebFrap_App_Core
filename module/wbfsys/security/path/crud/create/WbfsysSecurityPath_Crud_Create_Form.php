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
class WbfsysSecurityPath_Crud_Create_Form
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
  public $namespace  = 'WbfsysSecurityPath';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysSecurityPath';

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
      'wbfsys_security_path' => array
      (
        'id_group' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_root' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_area' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_reference' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'm_parent' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'access_level' => array
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
   * @var WbfsysSecurityPath_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysSecurityPath_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysSecurityPath_Entity $entity
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
      'wbfsys_security_path' => array
      (
        'id_group',
        'id_root',
        'id_area',
        'id_reference',
        'm_parent',
        'access_level',
        'description',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysSecurityPath entity
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
    $this->view->addVar( 'entityWbfsysSecurityPath', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_security_path'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_security_path[id_wbfsys_security_path-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysSecurityPath_IdGroup( $params );
    $this->input_WbfsysSecurityPath_IdRoot( $params );
    $this->input_WbfsysSecurityPath_IdArea( $params );
    $this->input_WbfsysSecurityPath_IdReference( $params );
    $this->input_WbfsysSecurityPath_MParent( $params );
    $this->input_WbfsysSecurityPath_AccessLevel( $params );
    $this->input_WbfsysSecurityPath_Description( $params );
    $this->input_WbfsysSecurityPath_Rowid( $params );
    $this->input_WbfsysSecurityPath_MTimeCreated( $params );
    $this->input_WbfsysSecurityPath_MRoleCreate( $params );
    $this->input_WbfsysSecurityPath_MTimeChanged( $params );
    $this->input_WbfsysSecurityPath_MRoleChange( $params );
    $this->input_WbfsysSecurityPath_MVersion( $params );
    $this->input_WbfsysSecurityPath_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field id_group
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityPath_IdGroup( $params )
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

      $inputIdGroup = $this->view->newInput( 'inputWbfsysSecurityPathIdGroup', 'Window' );
      $this->items['wbfsys_security_path-id_group'] = $inputIdGroup;
      $inputIdGroup->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_security_path[id_group]',
        'id'        => 'wgt-input-wbfsys_security_path_id_group'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Group', 'src' => 'Security Path' ) ),
      ));

      if( $this->assignedForm )
        $inputIdGroup->assignedForm = $this->assignedForm;

      $inputIdGroup->setWidth( 'medium' );

      $inputIdGroup->setData( $this->entity->getData( 'id_group' )  );
      $inputIdGroup->setReadonly( $this->fieldReadOnly( 'wbfsys_security_path', 'id_group' ) );
      $inputIdGroup->setRequired( $this->fieldRequired( 'wbfsys_security_path', 'id_group' ) );
      $inputIdGroup->setLabel( $i18n->l( 'Group', 'wbfsys.security_path.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleGroup.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_security_path_id_group'.($this->suffix?'-'.$this->suffix:'');

      $inputIdGroup->setListUrl ( $listUrl );
      $inputIdGroup->setListIcon( 'control/connect.png' );
      $inputIdGroup->setEntityUrl( 'maintab.php?c=Wbfsys.RoleGroup.edit' );
      $inputIdGroup->conEntity         = $entityWbfsysRoleGroup;
      $inputIdGroup->refresh           = $this->refresh;
      $inputIdGroup->serializeElement  = $this->sendElement;



      $inputIdGroup->view = $this->view;
      $inputIdGroup->buildJavascript( 'wgt-input-wbfsys_security_path_id_group'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdGroup );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityPath_IdGroup */

 /**
  * create the ui element for field id_root
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityPath_IdRoot( $params )
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
      $objidWbfsysSecurityArea = $this->entity->getData( 'id_root' ) ;

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

      $inputIdRoot = $this->view->newInput( 'inputWbfsysSecurityPathIdRoot', 'Window' );
      $this->items['wbfsys_security_path-id_root'] = $inputIdRoot;
      $inputIdRoot->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_security_path[id_root]',
        'id'        => 'wgt-input-wbfsys_security_path_id_root'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Root', 'src' => 'Security Path' ) ),
      ));

      if( $this->assignedForm )
        $inputIdRoot->assignedForm = $this->assignedForm;

      $inputIdRoot->setWidth( 'medium' );

      $inputIdRoot->setData( $this->entity->getData( 'id_root' )  );
      $inputIdRoot->setReadonly( $this->fieldReadOnly( 'wbfsys_security_path', 'id_root' ) );
      $inputIdRoot->setRequired( $this->fieldRequired( 'wbfsys_security_path', 'id_root' ) );
      $inputIdRoot->setLabel( $i18n->l( 'Root', 'wbfsys.security_path.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.SecurityArea.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_security_path_id_root'.($this->suffix?'-'.$this->suffix:'');

      $inputIdRoot->setListUrl ( $listUrl );
      $inputIdRoot->setListIcon( 'control/connect.png' );
      $inputIdRoot->setEntityUrl( 'maintab.php?c=Wbfsys.SecurityArea.edit' );
      $inputIdRoot->conEntity         = $entityWbfsysSecurityArea;
      $inputIdRoot->refresh           = $this->refresh;
      $inputIdRoot->serializeElement  = $this->sendElement;


        $inputIdRoot->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.SecurityArea.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdRoot->view = $this->view;
      $inputIdRoot->buildJavascript( 'wgt-input-wbfsys_security_path_id_root'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdRoot );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityPath_IdRoot */

 /**
  * create the ui element for field id_area
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityPath_IdArea( $params )
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

      $inputIdArea = $this->view->newInput( 'inputWbfsysSecurityPathIdArea', 'Window' );
      $this->items['wbfsys_security_path-id_area'] = $inputIdArea;
      $inputIdArea->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_security_path[id_area]',
        'id'        => 'wgt-input-wbfsys_security_path_id_area'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Area', 'src' => 'Security Path' ) ),
      ));

      if( $this->assignedForm )
        $inputIdArea->assignedForm = $this->assignedForm;

      $inputIdArea->setWidth( 'medium' );

      $inputIdArea->setData( $this->entity->getData( 'id_area' )  );
      $inputIdArea->setReadonly( $this->fieldReadOnly( 'wbfsys_security_path', 'id_area' ) );
      $inputIdArea->setRequired( $this->fieldRequired( 'wbfsys_security_path', 'id_area' ) );
      $inputIdArea->setLabel( $i18n->l( 'Area', 'wbfsys.security_path.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.SecurityArea.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_security_path_id_area'.($this->suffix?'-'.$this->suffix:'');

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
      $inputIdArea->buildJavascript( 'wgt-input-wbfsys_security_path_id_area'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdArea );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityPath_IdArea */

 /**
  * create the ui element for field id_reference
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityPath_IdReference( $params )
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
      $objidWbfsysSecurityArea = $this->entity->getData( 'id_reference' ) ;

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

      $inputIdReference = $this->view->newInput( 'inputWbfsysSecurityPathIdReference', 'Window' );
      $this->items['wbfsys_security_path-id_reference'] = $inputIdReference;
      $inputIdReference->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_security_path[id_reference]',
        'id'        => 'wgt-input-wbfsys_security_path_id_reference'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Reference', 'src' => 'Security Path' ) ),
      ));

      if( $this->assignedForm )
        $inputIdReference->assignedForm = $this->assignedForm;

      $inputIdReference->setWidth( 'medium' );

      $inputIdReference->setData( $this->entity->getData( 'id_reference' )  );
      $inputIdReference->setReadonly( $this->fieldReadOnly( 'wbfsys_security_path', 'id_reference' ) );
      $inputIdReference->setRequired( $this->fieldRequired( 'wbfsys_security_path', 'id_reference' ) );
      $inputIdReference->setLabel( $i18n->l( 'Reference', 'wbfsys.security_path.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.SecurityArea.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_security_path_id_reference'.($this->suffix?'-'.$this->suffix:'');

      $inputIdReference->setListUrl ( $listUrl );
      $inputIdReference->setListIcon( 'control/connect.png' );
      $inputIdReference->setEntityUrl( 'maintab.php?c=Wbfsys.SecurityArea.edit' );
      $inputIdReference->conEntity         = $entityWbfsysSecurityArea;
      $inputIdReference->refresh           = $this->refresh;
      $inputIdReference->serializeElement  = $this->sendElement;


        $inputIdReference->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.SecurityArea.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdReference->view = $this->view;
      $inputIdReference->buildJavascript( 'wgt-input-wbfsys_security_path_id_reference'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdReference );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityPath_IdReference */

 /**
  * create the ui element for field m_parent
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityPath_MParent( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysSecurityPath_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysSecurityPath not exists' );

      Log::warn( 'Looks like the Entity: WbfsysSecurityPath is missing' );

      return;
    }


      //p: Window
      $objidWbfsysSecurityPath = $this->entity->getData( 'm_parent' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysSecurityPath
          || !$entityWbfsysSecurityPath = $this->db->orm->get
          (
            'WbfsysSecurityPath',
            $objidWbfsysSecurityPath
          )
      )
      {
        $entityWbfsysSecurityPath = $this->db->orm->newEntity( 'WbfsysSecurityPath' );
      }

      $inputMParent = $this->view->newInput( 'inputWbfsysSecurityPathMParent', 'Window' );
      $this->items['wbfsys_security_path-m_parent'] = $inputMParent;
      $inputMParent->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_security_path[m_parent]',
        'id'        => 'wgt-input-wbfsys_security_path_m_parent'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Parent', 'src' => 'Security Path' ) ),
      ));

      if( $this->assignedForm )
        $inputMParent->assignedForm = $this->assignedForm;

      $inputMParent->setWidth( 'medium' );

      $inputMParent->setData( $this->entity->getData( 'm_parent' )  );
      $inputMParent->setReadonly( $this->fieldReadOnly( 'wbfsys_security_path', 'm_parent' ) );
      $inputMParent->setRequired( $this->fieldRequired( 'wbfsys_security_path', 'm_parent' ) );
      $inputMParent->setLabel( $i18n->l( 'Parent', 'wbfsys.security_path.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.SecurityPath.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_security_path_m_parent'.($this->suffix?'-'.$this->suffix:'');

      $inputMParent->setListUrl ( $listUrl );
      $inputMParent->setListIcon( 'control/connect.png' );
      $inputMParent->setEntityUrl( 'maintab.php?c=Wbfsys.SecurityPath.edit' );
      $inputMParent->conEntity         = $entityWbfsysSecurityPath;
      $inputMParent->refresh           = $this->refresh;
      $inputMParent->serializeElement  = $this->sendElement;



      $inputMParent->view = $this->view;
      $inputMParent->buildJavascript( 'wgt-input-wbfsys_security_path_m_parent'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMParent );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityPath_MParent */

 /**
  * create the ui element for field access_level
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityPath_AccessLevel( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputAccessLevel = $this->view->newInput( 'inputWbfsysSecurityPathAccessLevel', 'Int' );
      $this->items['wbfsys_security_path-access_level'] = $inputAccessLevel;
      $inputAccessLevel->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_path[access_level]',
          'id'        => 'wgt-input-wbfsys_security_path_access_level'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Level', 'src' => 'Security Path' ) ),
        )
      );
      $inputAccessLevel->setWidth( 'medium' );

$inputAccessLevel->setReadOnly( $this->fieldReadOnly( 'wbfsys_security_path', 'access_level' ) );
      $inputAccessLevel->setRequired( $this->fieldRequired( 'wbfsys_security_path', 'access_level' ) );
      $inputAccessLevel->setData( $this->entity->getData( 'access_level' ) );
      $inputAccessLevel->setLabel( $i18n->l( 'Access Level', 'wbfsys.security_path.label' ) );

      $inputAccessLevel->refresh           = $this->refresh;
      $inputAccessLevel->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysSecurityPath_AccessLevel */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityPath_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysSecurityPathDescription', 'Textarea' );
      $this->items['wbfsys_security_path-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_security_path[description]',
          'id'    => 'wgt-input-wbfsys_security_path_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Security Path' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_security_path', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_security_path', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.security_path.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysSecurityPath_Description */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityPath_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysSecurityPathRowid' , 'int' );
      $this->items['wbfsys_security_path-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_path[rowid]',
          'id'        => 'wgt-input-wbfsys_security_path_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Security Path' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_security_path', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_security_path', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.security_path.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysSecurityPath_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityPath_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysSecurityPathMTimeCreated' , 'Date' );
      $this->items['wbfsys_security_path-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_path[m_time_created]',
          'id'        => 'wgt-input-wbfsys_security_path_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Security Path' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_security_path', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_security_path', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.security_path.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysSecurityPath_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityPath_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysSecurityPathMRoleCreate', 'Window' );
      $this->items['wbfsys_security_path-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_security_path[m_role_create]',
        'id'        => 'wgt-input-wbfsys_security_path_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Security Path' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_security_path', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_security_path', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.security_path.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_security_path_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_security_path_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysSecurityPath_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityPath_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysSecurityPathMTimeChanged' , 'Date' );
      $this->items['wbfsys_security_path-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_path[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_security_path_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Security Path' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_security_path', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_security_path', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.security_path.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysSecurityPath_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityPath_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysSecurityPathMRoleChange', 'Window' );
      $this->items['wbfsys_security_path-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_security_path[m_role_change]',
        'id'        => 'wgt-input-wbfsys_security_path_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Security Path' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_security_path', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_security_path', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.security_path.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_security_path_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_security_path_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysSecurityPath_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityPath_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysSecurityPathMVersion' , 'int' );
      $this->items['wbfsys_security_path-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_path[m_version]',
          'id'        => 'wgt-input-wbfsys_security_path_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Security Path' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_security_path', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_security_path', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.security_path.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysSecurityPath_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityPath_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysSecurityPathMUuid' , 'Text' );
      $this->items['wbfsys_security_path-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_path[m_uuid]',
          'id'        => 'wgt-input-wbfsys_security_path_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Security Path' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_security_path', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_security_path', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.security_path.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysSecurityPath_MUuid */

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
      $orm->getValidationData( 'WbfsysSecurityPath', array_keys( $this->fields['wbfsys_security_path']), true ),
      $orm->getErrorMessages( 'WbfsysSecurityPath' ),
      'wbfsys_security_path'
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



  }//end public function setDefaultData */


}//end class WbfsysSecurityPath_Crud_Create_Form */


