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
class WbfsysTreeNode_Crud_Create_Form
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
  public $namespace  = 'WbfsysTreeNode';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysTreeNode';

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
      'wbfsys_tree_node' => array
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
        'id_tree' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'flag_folder' => array
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
        'entity' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'icon' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
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
   * @var WbfsysTreeNode_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysTreeNode_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysTreeNode_Entity $entity
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
      'wbfsys_tree_node' => array
      (
        'm_parent',
        'name',
        'id_tree',
        'flag_folder',
        'vid',
        'entity',
        'icon',
        'description',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysTreeNode entity
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
    $this->view->addVar( 'entityWbfsysTreeNode', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_tree_node'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_tree_node[id_wbfsys_tree_node-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysTreeNode_MParent( $params );
    $this->input_WbfsysTreeNode_Name( $params );
    $this->input_WbfsysTreeNode_IdTree( $params );
    $this->input_WbfsysTreeNode_FlagFolder( $params );
    $this->input_WbfsysTreeNode_Vid( $params );
    $this->input_WbfsysTreeNode_Entity( $params );
    $this->input_WbfsysTreeNode_Icon( $params );
    $this->input_WbfsysTreeNode_Description( $params );
    $this->input_WbfsysTreeNode_Rowid( $params );
    $this->input_WbfsysTreeNode_MTimeCreated( $params );
    $this->input_WbfsysTreeNode_MRoleCreate( $params );
    $this->input_WbfsysTreeNode_MTimeChanged( $params );
    $this->input_WbfsysTreeNode_MRoleChange( $params );
    $this->input_WbfsysTreeNode_MVersion( $params );
    $this->input_WbfsysTreeNode_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field m_parent
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTreeNode_MParent( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysTreeNode_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysTreeNode not exists' );

      Log::warn( 'Looks like the Entity: WbfsysTreeNode is missing' );

      return;
    }


      //p: Window
      $objidWbfsysTreeNode = $this->entity->getData( 'm_parent' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysTreeNode
          || !$entityWbfsysTreeNode = $this->db->orm->get
          (
            'WbfsysTreeNode',
            $objidWbfsysTreeNode
          )
      )
      {
        $entityWbfsysTreeNode = $this->db->orm->newEntity( 'WbfsysTreeNode' );
      }

      $inputMParent = $this->view->newInput( 'inputWbfsysTreeNodeMParent', 'Window' );
      $this->items['wbfsys_tree_node-m_parent'] = $inputMParent;
      $inputMParent->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_tree_node[m_parent]',
        'id'        => 'wgt-input-wbfsys_tree_node_m_parent'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Parent Node', 'src' => 'Tree Node' ) ),
      ));

      if( $this->assignedForm )
        $inputMParent->assignedForm = $this->assignedForm;

      $inputMParent->setWidth( 'medium' );

      $inputMParent->setData( $this->entity->getData( 'm_parent' )  );
      $inputMParent->setReadonly( $this->fieldReadOnly( 'wbfsys_tree_node', 'm_parent' ) );
      $inputMParent->setRequired( $this->fieldRequired( 'wbfsys_tree_node', 'm_parent' ) );
      $inputMParent->setLabel( $i18n->l( 'Parent Node', 'wbfsys.tree_node.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.TreeNode.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_tree_node_m_parent'.($this->suffix?'-'.$this->suffix:'');

      $inputMParent->setListUrl ( $listUrl );
      $inputMParent->setListIcon( 'control/connect.png' );
      $inputMParent->setEntityUrl( 'maintab.php?c=Wbfsys.TreeNode.edit' );
      $inputMParent->conEntity         = $entityWbfsysTreeNode;
      $inputMParent->refresh           = $this->refresh;
      $inputMParent->serializeElement  = $this->sendElement;



      $inputMParent->view = $this->view;
      $inputMParent->buildJavascript( 'wgt-input-wbfsys_tree_node_m_parent'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMParent );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysTreeNode_MParent */

 /**
  * create the ui element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTreeNode_Name( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputName = $this->view->newInput( 'inputWbfsysTreeNodeName' , 'Text' );
      $this->items['wbfsys_tree_node-name'] = $inputName;
      $inputName->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_tree_node[name]',
          'id'        => 'wgt-input-wbfsys_tree_node_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Name', 'src' => 'Tree Node' ) ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadonly( $this->fieldReadOnly( 'wbfsys_tree_node', 'name' ) );
      $inputName->setRequired( $this->fieldRequired( 'wbfsys_tree_node', 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel( $i18n->l( 'Name', 'wbfsys.tree_node.label' ) );

      $inputName->refresh           = $this->refresh;
      $inputName->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysTreeNode_Name */

 /**
  * create the ui element for field id_tree
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTreeNode_IdTree( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysTree_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysTree not exists' );

      Log::warn( 'Looks like the Entity: WbfsysTree is missing' );

      return;
    }


      //p: Window
      $objidWbfsysTree = $this->entity->getData( 'id_tree' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysTree
          || !$entityWbfsysTree = $this->db->orm->get
          (
            'WbfsysTree',
            $objidWbfsysTree
          )
      )
      {
        $entityWbfsysTree = $this->db->orm->newEntity( 'WbfsysTree' );
      }

      $inputIdTree = $this->view->newInput( 'inputWbfsysTreeNodeIdTree', 'Window' );
      $this->items['wbfsys_tree_node-id_tree'] = $inputIdTree;
      $inputIdTree->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_tree_node[id_tree]',
        'id'        => 'wgt-input-wbfsys_tree_node_id_tree'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Tree', 'src' => 'Tree Node' ) ),
      ));

      if( $this->assignedForm )
        $inputIdTree->assignedForm = $this->assignedForm;

      $inputIdTree->setWidth( 'medium' );

      $inputIdTree->setData( $this->entity->getData( 'id_tree' )  );
      $inputIdTree->setReadonly( $this->fieldReadOnly( 'wbfsys_tree_node', 'id_tree' ) );
      $inputIdTree->setRequired( $this->fieldRequired( 'wbfsys_tree_node', 'id_tree' ) );
      $inputIdTree->setLabel( $i18n->l( 'Tree', 'wbfsys.tree_node.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Tree.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_tree_node_id_tree'.($this->suffix?'-'.$this->suffix:'');

      $inputIdTree->setListUrl ( $listUrl );
      $inputIdTree->setListIcon( 'control/connect.png' );
      $inputIdTree->setEntityUrl( 'maintab.php?c=Wbfsys.Tree.edit' );
      $inputIdTree->conEntity         = $entityWbfsysTree;
      $inputIdTree->refresh           = $this->refresh;
      $inputIdTree->serializeElement  = $this->sendElement;



      $inputIdTree->view = $this->view;
      $inputIdTree->buildJavascript( 'wgt-input-wbfsys_tree_node_id_tree'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdTree );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysTreeNode_IdTree */

 /**
  * create the ui element for field flag_folder
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTreeNode_FlagFolder( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputFlagFolder = $this->view->newInput( 'inputWbfsysTreeNodeFlagFolder', 'Checkbox' );
      $this->items['wbfsys_tree_node-flag_folder'] = $inputFlagFolder;
      $inputFlagFolder->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_tree_node[flag_folder]',
          'id'        => 'wgt-input-wbfsys_tree_node_flag_folder'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Folder', 'src' => 'Tree Node' ) ),
        )
      );
      $inputFlagFolder->setWidth( 'medium' );

      $inputFlagFolder->setReadonly( $this->fieldReadOnly( 'wbfsys_tree_node', 'flag_folder' ) );
      $inputFlagFolder->setRequired( $this->fieldRequired( 'wbfsys_tree_node', 'flag_folder' ) );
      $inputFlagFolder->setActive( $this->entity->getBoolean( 'flag_folder' ) );
      $inputFlagFolder->setLabel( $i18n->l( 'Folder', 'wbfsys.tree_node.label' ) );

      $inputFlagFolder->refresh           = $this->refresh;
      $inputFlagFolder->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysTreeNode_FlagFolder */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTreeNode_Vid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputVid = $this->view->newInput( 'inputWbfsysTreeNodeVid', 'Int' );
      $this->items['wbfsys_tree_node-vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_tree_node[vid]',
          'id'        => 'wgt-input-wbfsys_tree_node_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Vid', 'src' => 'Tree Node' ) ),
        )
      );
      $inputVid->setWidth( 'medium' );

$inputVid->setReadOnly( $this->fieldReadOnly( 'wbfsys_tree_node', 'vid' ) );
      $inputVid->setRequired( $this->fieldRequired( 'wbfsys_tree_node', 'vid' ) );
      $inputVid->setData( $this->entity->getData( 'vid' ) );
      $inputVid->setLabel( $i18n->l( 'Vid', 'wbfsys.tree_node.label' ) );

      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysTreeNode_Vid */

 /**
  * create the ui element for field entity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTreeNode_Entity( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysEntity_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysEntity not exists' );

      Log::warn( 'Looks like the Entity: WbfsysEntity is missing' );

      return;
    }


      //p: Window
      $objidWbfsysEntity = $this->entity->getData( 'entity' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysEntity
          || !$entityWbfsysEntity = $this->db->orm->get
          (
            'WbfsysEntity',
            $objidWbfsysEntity
          )
      )
      {
        $entityWbfsysEntity = $this->db->orm->newEntity( 'WbfsysEntity' );
      }

      $inputEntity = $this->view->newInput( 'inputWbfsysTreeNodeEntity', 'Window' );
      $this->items['wbfsys_tree_node-entity'] = $inputEntity;
      $inputEntity->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_tree_node[entity]',
        'id'        => 'wgt-input-wbfsys_tree_node_entity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Entity', 'src' => 'Tree Node' ) ),
      ));

      if( $this->assignedForm )
        $inputEntity->assignedForm = $this->assignedForm;

      $inputEntity->setWidth( 'medium' );

      $inputEntity->setData( $this->entity->getData( 'entity' )  );
      $inputEntity->setReadonly( $this->fieldReadOnly( 'wbfsys_tree_node', 'entity' ) );
      $inputEntity->setRequired( $this->fieldRequired( 'wbfsys_tree_node', 'entity' ) );
      $inputEntity->setLabel( $i18n->l( 'Entity', 'wbfsys.tree_node.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Entity.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_tree_node_entity'.($this->suffix?'-'.$this->suffix:'');

      $inputEntity->setListUrl ( $listUrl );
      $inputEntity->setListIcon( 'control/connect.png' );
      $inputEntity->setEntityUrl( 'maintab.php?c=Wbfsys.Entity.edit' );
      $inputEntity->conEntity         = $entityWbfsysEntity;
      $inputEntity->refresh           = $this->refresh;
      $inputEntity->serializeElement  = $this->sendElement;


        $inputEntity->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.Entity.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputEntity->view = $this->view;
      $inputEntity->buildJavascript( 'wgt-input-wbfsys_tree_node_entity'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputEntity );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysTreeNode_Entity */

 /**
  * create the ui element for field icon
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTreeNode_Icon( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputIcon = $this->view->newInput( 'inputWbfsysTreeNodeIcon' , 'Text' );
      $this->items['wbfsys_tree_node-icon'] = $inputIcon;
      $inputIcon->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_tree_node[icon]',
          'id'        => 'wgt-input-wbfsys_tree_node_icon'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Icon', 'src' => 'Tree Node' ) ),
          'maxlength' => $this->entity->maxSize( 'icon' ),
        )
      );
      $inputIcon->setWidth( 'medium' );

      $inputIcon->setReadonly( $this->fieldReadOnly( 'wbfsys_tree_node', 'icon' ) );
      $inputIcon->setRequired( $this->fieldRequired( 'wbfsys_tree_node', 'icon' ) );
      $inputIcon->setData( $this->entity->getSecure('icon') );
      $inputIcon->setLabel( $i18n->l( 'Icon', 'wbfsys.tree_node.label' ) );

      $inputIcon->refresh           = $this->refresh;
      $inputIcon->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysTreeNode_Icon */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTreeNode_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysTreeNodeDescription', 'Textarea' );
      $this->items['wbfsys_tree_node-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_tree_node[description]',
          'id'    => 'wgt-input-wbfsys_tree_node_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Tree Node' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_tree_node', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_tree_node', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.tree_node.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysTreeNode_Description */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTreeNode_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysTreeNodeRowid' , 'int' );
      $this->items['wbfsys_tree_node-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_tree_node[rowid]',
          'id'        => 'wgt-input-wbfsys_tree_node_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Tree Node' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_tree_node', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_tree_node', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.tree_node.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysTreeNode_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTreeNode_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysTreeNodeMTimeCreated' , 'Date' );
      $this->items['wbfsys_tree_node-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_tree_node[m_time_created]',
          'id'        => 'wgt-input-wbfsys_tree_node_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Tree Node' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_tree_node', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_tree_node', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.tree_node.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysTreeNode_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTreeNode_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysTreeNodeMRoleCreate', 'Window' );
      $this->items['wbfsys_tree_node-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_tree_node[m_role_create]',
        'id'        => 'wgt-input-wbfsys_tree_node_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Tree Node' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_tree_node', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_tree_node', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.tree_node.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_tree_node_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_tree_node_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysTreeNode_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTreeNode_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysTreeNodeMTimeChanged' , 'Date' );
      $this->items['wbfsys_tree_node-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_tree_node[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_tree_node_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Tree Node' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_tree_node', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_tree_node', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.tree_node.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysTreeNode_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTreeNode_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysTreeNodeMRoleChange', 'Window' );
      $this->items['wbfsys_tree_node-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_tree_node[m_role_change]',
        'id'        => 'wgt-input-wbfsys_tree_node_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Tree Node' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_tree_node', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_tree_node', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.tree_node.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_tree_node_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_tree_node_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysTreeNode_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTreeNode_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysTreeNodeMVersion' , 'int' );
      $this->items['wbfsys_tree_node-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_tree_node[m_version]',
          'id'        => 'wgt-input-wbfsys_tree_node_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Tree Node' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_tree_node', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_tree_node', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.tree_node.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysTreeNode_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysTreeNode_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysTreeNodeMUuid' , 'Text' );
      $this->items['wbfsys_tree_node-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_tree_node[m_uuid]',
          'id'        => 'wgt-input-wbfsys_tree_node_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Tree Node' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_tree_node', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_tree_node', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.tree_node.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysTreeNode_MUuid */

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
      $orm->getValidationData( 'WbfsysTreeNode', array_keys( $this->fields['wbfsys_tree_node']), true ),
      $orm->getErrorMessages( 'WbfsysTreeNode' ),
      'wbfsys_tree_node'
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


}//end class WbfsysTreeNode_Crud_Create_Form */


