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
class WbfsysSecurityArea_Crud_Create_Form
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
  public $namespace  = 'WbfsysSecurityArea';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysSecurityArea';

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
      'wbfsys_security_area' => array
      (
        'm_parent' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'label' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'id_ref_listing' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_ref_access' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_ref_insert' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_ref_update' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_ref_delete' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_ref_admin' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_level_listing' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_level_access' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_level_insert' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_level_update' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_level_delete' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_level_admin' => array
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
        'id_target' => array
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
        'access_key' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'type_key' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'parent_key' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'source_key' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'id_source' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'parent_path' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '500',
        ),
        'revision' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'flag_system' => array
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
   * @var WbfsysSecurityArea_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysSecurityArea_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysSecurityArea_Entity $entity
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
      'wbfsys_security_area' => array
      (
        'm_parent',
        'label',
        'id_ref_listing',
        'id_ref_access',
        'id_ref_insert',
        'id_ref_update',
        'id_ref_delete',
        'id_ref_admin',
        'id_level_listing',
        'id_level_access',
        'id_level_insert',
        'id_level_update',
        'id_level_delete',
        'id_level_admin',
        'vid',
        'id_target',
        'id_type',
        'access_key',
        'type_key',
        'parent_key',
        'source_key',
        'id_source',
        'parent_path',
        'revision',
        'flag_system',
        'description',
        'id_vid_entity',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysSecurityArea entity
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
    $this->view->addVar( 'entityWbfsysSecurityArea', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_security_area'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_security_area[id_wbfsys_security_area-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysSecurityArea_MParent( $params );
    $this->input_WbfsysSecurityArea_Label( $params );
    $this->input_WbfsysSecurityArea_IdRefListing( $params );
    $this->input_WbfsysSecurityArea_IdRefAccess( $params );
    $this->input_WbfsysSecurityArea_IdRefInsert( $params );
    $this->input_WbfsysSecurityArea_IdRefUpdate( $params );
    $this->input_WbfsysSecurityArea_IdRefDelete( $params );
    $this->input_WbfsysSecurityArea_IdRefAdmin( $params );
    $this->input_WbfsysSecurityArea_IdLevelListing( $params );
    $this->input_WbfsysSecurityArea_IdLevelAccess( $params );
    $this->input_WbfsysSecurityArea_IdLevelInsert( $params );
    $this->input_WbfsysSecurityArea_IdLevelUpdate( $params );
    $this->input_WbfsysSecurityArea_IdLevelDelete( $params );
    $this->input_WbfsysSecurityArea_IdLevelAdmin( $params );
    $this->input_WbfsysSecurityArea_Vid( $params );
    $this->input_WbfsysSecurityArea_IdTarget( $params );
    $this->input_WbfsysSecurityArea_IdType( $params );
    $this->input_WbfsysSecurityArea_AccessKey( $params );
    $this->input_WbfsysSecurityArea_TypeKey( $params );
    $this->input_WbfsysSecurityArea_ParentKey( $params );
    $this->input_WbfsysSecurityArea_SourceKey( $params );
    $this->input_WbfsysSecurityArea_IdSource( $params );
    $this->input_WbfsysSecurityArea_ParentPath( $params );
    $this->input_WbfsysSecurityArea_Revision( $params );
    $this->input_WbfsysSecurityArea_FlagSystem( $params );
    $this->input_WbfsysSecurityArea_Description( $params );
    $this->input_WbfsysSecurityArea_IdVidEntity( $params );
    $this->input_WbfsysSecurityArea_Rowid( $params );
    $this->input_WbfsysSecurityArea_MTimeCreated( $params );
    $this->input_WbfsysSecurityArea_MRoleCreate( $params );
    $this->input_WbfsysSecurityArea_MTimeChanged( $params );
    $this->input_WbfsysSecurityArea_MRoleChange( $params );
    $this->input_WbfsysSecurityArea_MVersion( $params );
    $this->input_WbfsysSecurityArea_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field m_parent
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_MParent( $params )
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
      $objidWbfsysSecurityArea = $this->entity->getData( 'm_parent' ) ;

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

      $inputMParent = $this->view->newInput( 'inputWbfsysSecurityAreaMParent', 'Window' );
      $this->items['wbfsys_security_area-m_parent'] = $inputMParent;
      $inputMParent->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_security_area[m_parent]',
        'id'        => 'wgt-input-wbfsys_security_area_m_parent'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Parent Node', 'src' => 'Security Area' ) ),
      ));

      if( $this->assignedForm )
        $inputMParent->assignedForm = $this->assignedForm;

      $inputMParent->setWidth( 'medium' );

      $inputMParent->setData( $this->entity->getData( 'm_parent' )  );
      $inputMParent->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'm_parent' ) );
      $inputMParent->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'm_parent' ) );
      $inputMParent->setLabel( $i18n->l( 'Parent Node', 'wbfsys.security_area.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.SecurityArea.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_security_area_m_parent'.($this->suffix?'-'.$this->suffix:'');

      $inputMParent->setListUrl ( $listUrl );
      $inputMParent->setListIcon( 'control/connect.png' );
      $inputMParent->setEntityUrl( 'maintab.php?c=Wbfsys.SecurityArea.edit' );
      $inputMParent->conEntity         = $entityWbfsysSecurityArea;
      $inputMParent->refresh           = $this->refresh;
      $inputMParent->serializeElement  = $this->sendElement;


        $inputMParent->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.SecurityArea.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputMParent->view = $this->view;
      $inputMParent->buildJavascript( 'wgt-input-wbfsys_security_area_m_parent'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMParent );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityArea_MParent */

 /**
  * create the ui element for field label
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_Label( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputLabel = $this->view->newInput( 'inputWbfsysSecurityAreaLabel' , 'Text' );
      $this->items['wbfsys_security_area-label'] = $inputLabel;
      $inputLabel->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[label]',
          'id'        => 'wgt-input-wbfsys_security_area_label'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Label', 'src' => 'Security Area' ) ),
          'maxlength' => $this->entity->maxSize( 'label' ),
        )
      );
      $inputLabel->setWidth( 'medium' );

      $inputLabel->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'label' ) );
      $inputLabel->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'label' ) );
      $inputLabel->setData( $this->entity->getSecure('label') );
      $inputLabel->setLabel( $i18n->l( 'Label', 'wbfsys.security_area.label' ) );

      $inputLabel->refresh           = $this->refresh;
      $inputLabel->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysSecurityArea_Label */

 /**
  * create the ui element for field id_ref_listing
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_IdRefListing( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_security_area_id_ref_listing'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysSecurityLevel_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysSecurityLevel_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysSecurityLevel_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdRefListing = $this->view->newItem( 'inputWbfsysSecurityAreaIdRefListing', 'WbfsysSecurityLevel_Selectbox' );
      $this->items['wbfsys_security_area-id_ref_listing'] = $inputIdRefListing;
      $inputIdRefListing->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[id_ref_listing]',
          'id'        => 'wgt-input-wbfsys_security_area_id_ref_listing'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Ref Listing', 'src' => 'Security Area' ) ),
        )
      );
      $inputIdRefListing->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdRefListing->assignedForm = $this->assignedForm;

      $inputIdRefListing->setActive( $this->entity->getData( 'id_ref_listing' ) );
      $inputIdRefListing->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'id_ref_listing' ) );
      $inputIdRefListing->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'id_ref_listing' ) );


      $inputIdRefListing->setLabel( $i18n->l( 'Ref Listing', 'wbfsys.security_area.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdRefListing->refresh           = $this->refresh;
        $inputIdRefListing->serializeElement  = $this->sendElement;
        $inputIdRefListing->editUrl = 'index.php?c=Wbfsys.SecurityLevel.listing&amp;target='.$this->namespace.'&amp;field=id_ref_listing&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_security_area_id_ref_listing'.$this->suffix;
      }
      // set an empty first entry
      $inputIdRefListing->setFirstFree( 'No Ref Listing selected' );

      
      $queryIdRefListing = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_security_area_id_ref_listing'] ) )
      {
      
        $queryIdRefListing = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );

        $queryIdRefListing->fetchSelectbox();
        $inputIdRefListing->setData( $queryIdRefListing->getAll() );
      
      }
      else
      {
        $inputIdRefListing->setData( $this->listElementData['wbfsys_security_area_id_ref_listing'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdRefListing )
        $queryIdRefListing = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );
      
      $inputIdRefListing->loadActive = function( $activeId ) use ( $queryIdRefListing ){
 
        return $queryIdRefListing->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityArea_IdRefListing */

 /**
  * create the ui element for field id_ref_access
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_IdRefAccess( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_security_area_id_ref_access'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysSecurityLevel_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysSecurityLevel_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysSecurityLevel_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdRefAccess = $this->view->newItem( 'inputWbfsysSecurityAreaIdRefAccess', 'WbfsysSecurityLevel_Selectbox' );
      $this->items['wbfsys_security_area-id_ref_access'] = $inputIdRefAccess;
      $inputIdRefAccess->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[id_ref_access]',
          'id'        => 'wgt-input-wbfsys_security_area_id_ref_access'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Ref Access', 'src' => 'Security Area' ) ),
        )
      );
      $inputIdRefAccess->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdRefAccess->assignedForm = $this->assignedForm;

      $inputIdRefAccess->setActive( $this->entity->getData( 'id_ref_access' ) );
      $inputIdRefAccess->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'id_ref_access' ) );
      $inputIdRefAccess->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'id_ref_access' ) );


      $inputIdRefAccess->setLabel( $i18n->l( 'Ref Access', 'wbfsys.security_area.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdRefAccess->refresh           = $this->refresh;
        $inputIdRefAccess->serializeElement  = $this->sendElement;
        $inputIdRefAccess->editUrl = 'index.php?c=Wbfsys.SecurityLevel.listing&amp;target='.$this->namespace.'&amp;field=id_ref_access&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_security_area_id_ref_access'.$this->suffix;
      }
      // set an empty first entry
      $inputIdRefAccess->setFirstFree( 'No Ref Access selected' );

      
      $queryIdRefAccess = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_security_area_id_ref_access'] ) )
      {
      
        $queryIdRefAccess = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );

        $queryIdRefAccess->fetchSelectbox();
        $inputIdRefAccess->setData( $queryIdRefAccess->getAll() );
      
      }
      else
      {
        $inputIdRefAccess->setData( $this->listElementData['wbfsys_security_area_id_ref_access'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdRefAccess )
        $queryIdRefAccess = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );
      
      $inputIdRefAccess->loadActive = function( $activeId ) use ( $queryIdRefAccess ){
 
        return $queryIdRefAccess->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityArea_IdRefAccess */

 /**
  * create the ui element for field id_ref_insert
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_IdRefInsert( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_security_area_id_ref_insert'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysSecurityLevel_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysSecurityLevel_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysSecurityLevel_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdRefInsert = $this->view->newItem( 'inputWbfsysSecurityAreaIdRefInsert', 'WbfsysSecurityLevel_Selectbox' );
      $this->items['wbfsys_security_area-id_ref_insert'] = $inputIdRefInsert;
      $inputIdRefInsert->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[id_ref_insert]',
          'id'        => 'wgt-input-wbfsys_security_area_id_ref_insert'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Ref Insert', 'src' => 'Security Area' ) ),
        )
      );
      $inputIdRefInsert->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdRefInsert->assignedForm = $this->assignedForm;

      $inputIdRefInsert->setActive( $this->entity->getData( 'id_ref_insert' ) );
      $inputIdRefInsert->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'id_ref_insert' ) );
      $inputIdRefInsert->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'id_ref_insert' ) );


      $inputIdRefInsert->setLabel( $i18n->l( 'Ref Insert', 'wbfsys.security_area.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdRefInsert->refresh           = $this->refresh;
        $inputIdRefInsert->serializeElement  = $this->sendElement;
        $inputIdRefInsert->editUrl = 'index.php?c=Wbfsys.SecurityLevel.listing&amp;target='.$this->namespace.'&amp;field=id_ref_insert&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_security_area_id_ref_insert'.$this->suffix;
      }
      // set an empty first entry
      $inputIdRefInsert->setFirstFree( 'No Ref Insert selected' );

      
      $queryIdRefInsert = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_security_area_id_ref_insert'] ) )
      {
      
        $queryIdRefInsert = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );

        $queryIdRefInsert->fetchSelectbox();
        $inputIdRefInsert->setData( $queryIdRefInsert->getAll() );
      
      }
      else
      {
        $inputIdRefInsert->setData( $this->listElementData['wbfsys_security_area_id_ref_insert'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdRefInsert )
        $queryIdRefInsert = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );
      
      $inputIdRefInsert->loadActive = function( $activeId ) use ( $queryIdRefInsert ){
 
        return $queryIdRefInsert->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityArea_IdRefInsert */

 /**
  * create the ui element for field id_ref_update
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_IdRefUpdate( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_security_area_id_ref_update'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysSecurityLevel_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysSecurityLevel_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysSecurityLevel_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdRefUpdate = $this->view->newItem( 'inputWbfsysSecurityAreaIdRefUpdate', 'WbfsysSecurityLevel_Selectbox' );
      $this->items['wbfsys_security_area-id_ref_update'] = $inputIdRefUpdate;
      $inputIdRefUpdate->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[id_ref_update]',
          'id'        => 'wgt-input-wbfsys_security_area_id_ref_update'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Ref Update', 'src' => 'Security Area' ) ),
        )
      );
      $inputIdRefUpdate->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdRefUpdate->assignedForm = $this->assignedForm;

      $inputIdRefUpdate->setActive( $this->entity->getData( 'id_ref_update' ) );
      $inputIdRefUpdate->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'id_ref_update' ) );
      $inputIdRefUpdate->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'id_ref_update' ) );


      $inputIdRefUpdate->setLabel( $i18n->l( 'Ref Update', 'wbfsys.security_area.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdRefUpdate->refresh           = $this->refresh;
        $inputIdRefUpdate->serializeElement  = $this->sendElement;
        $inputIdRefUpdate->editUrl = 'index.php?c=Wbfsys.SecurityLevel.listing&amp;target='.$this->namespace.'&amp;field=id_ref_update&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_security_area_id_ref_update'.$this->suffix;
      }
      // set an empty first entry
      $inputIdRefUpdate->setFirstFree( 'No Ref Update selected' );

      
      $queryIdRefUpdate = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_security_area_id_ref_update'] ) )
      {
      
        $queryIdRefUpdate = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );

        $queryIdRefUpdate->fetchSelectbox();
        $inputIdRefUpdate->setData( $queryIdRefUpdate->getAll() );
      
      }
      else
      {
        $inputIdRefUpdate->setData( $this->listElementData['wbfsys_security_area_id_ref_update'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdRefUpdate )
        $queryIdRefUpdate = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );
      
      $inputIdRefUpdate->loadActive = function( $activeId ) use ( $queryIdRefUpdate ){
 
        return $queryIdRefUpdate->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityArea_IdRefUpdate */

 /**
  * create the ui element for field id_ref_delete
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_IdRefDelete( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_security_area_id_ref_delete'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysSecurityLevel_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysSecurityLevel_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysSecurityLevel_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdRefDelete = $this->view->newItem( 'inputWbfsysSecurityAreaIdRefDelete', 'WbfsysSecurityLevel_Selectbox' );
      $this->items['wbfsys_security_area-id_ref_delete'] = $inputIdRefDelete;
      $inputIdRefDelete->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[id_ref_delete]',
          'id'        => 'wgt-input-wbfsys_security_area_id_ref_delete'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Ref Delete', 'src' => 'Security Area' ) ),
        )
      );
      $inputIdRefDelete->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdRefDelete->assignedForm = $this->assignedForm;

      $inputIdRefDelete->setActive( $this->entity->getData( 'id_ref_delete' ) );
      $inputIdRefDelete->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'id_ref_delete' ) );
      $inputIdRefDelete->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'id_ref_delete' ) );


      $inputIdRefDelete->setLabel( $i18n->l( 'Ref Delete', 'wbfsys.security_area.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdRefDelete->refresh           = $this->refresh;
        $inputIdRefDelete->serializeElement  = $this->sendElement;
        $inputIdRefDelete->editUrl = 'index.php?c=Wbfsys.SecurityLevel.listing&amp;target='.$this->namespace.'&amp;field=id_ref_delete&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_security_area_id_ref_delete'.$this->suffix;
      }
      // set an empty first entry
      $inputIdRefDelete->setFirstFree( 'No Ref Delete selected' );

      
      $queryIdRefDelete = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_security_area_id_ref_delete'] ) )
      {
      
        $queryIdRefDelete = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );

        $queryIdRefDelete->fetchSelectbox();
        $inputIdRefDelete->setData( $queryIdRefDelete->getAll() );
      
      }
      else
      {
        $inputIdRefDelete->setData( $this->listElementData['wbfsys_security_area_id_ref_delete'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdRefDelete )
        $queryIdRefDelete = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );
      
      $inputIdRefDelete->loadActive = function( $activeId ) use ( $queryIdRefDelete ){
 
        return $queryIdRefDelete->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityArea_IdRefDelete */

 /**
  * create the ui element for field id_ref_admin
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_IdRefAdmin( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_security_area_id_ref_admin'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysSecurityLevel_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysSecurityLevel_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysSecurityLevel_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdRefAdmin = $this->view->newItem( 'inputWbfsysSecurityAreaIdRefAdmin', 'WbfsysSecurityLevel_Selectbox' );
      $this->items['wbfsys_security_area-id_ref_admin'] = $inputIdRefAdmin;
      $inputIdRefAdmin->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[id_ref_admin]',
          'id'        => 'wgt-input-wbfsys_security_area_id_ref_admin'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Ref Admin', 'src' => 'Security Area' ) ),
        )
      );
      $inputIdRefAdmin->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdRefAdmin->assignedForm = $this->assignedForm;

      $inputIdRefAdmin->setActive( $this->entity->getData( 'id_ref_admin' ) );
      $inputIdRefAdmin->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'id_ref_admin' ) );
      $inputIdRefAdmin->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'id_ref_admin' ) );


      $inputIdRefAdmin->setLabel( $i18n->l( 'Ref Admin', 'wbfsys.security_area.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdRefAdmin->refresh           = $this->refresh;
        $inputIdRefAdmin->serializeElement  = $this->sendElement;
        $inputIdRefAdmin->editUrl = 'index.php?c=Wbfsys.SecurityLevel.listing&amp;target='.$this->namespace.'&amp;field=id_ref_admin&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_security_area_id_ref_admin'.$this->suffix;
      }
      // set an empty first entry
      $inputIdRefAdmin->setFirstFree( 'No Ref Admin selected' );

      
      $queryIdRefAdmin = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_security_area_id_ref_admin'] ) )
      {
      
        $queryIdRefAdmin = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );

        $queryIdRefAdmin->fetchSelectbox();
        $inputIdRefAdmin->setData( $queryIdRefAdmin->getAll() );
      
      }
      else
      {
        $inputIdRefAdmin->setData( $this->listElementData['wbfsys_security_area_id_ref_admin'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdRefAdmin )
        $queryIdRefAdmin = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );
      
      $inputIdRefAdmin->loadActive = function( $activeId ) use ( $queryIdRefAdmin ){
 
        return $queryIdRefAdmin->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityArea_IdRefAdmin */

 /**
  * create the ui element for field id_level_listing
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_IdLevelListing( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_security_area_id_level_listing'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysSecurityLevel_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysSecurityLevel_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysSecurityLevel_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdLevelListing = $this->view->newItem( 'inputWbfsysSecurityAreaIdLevelListing', 'WbfsysSecurityLevel_Selectbox' );
      $this->items['wbfsys_security_area-id_level_listing'] = $inputIdLevelListing;
      $inputIdLevelListing->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[id_level_listing]',
          'id'        => 'wgt-input-wbfsys_security_area_id_level_listing'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Level Listing', 'src' => 'Security Area' ) ),
        )
      );
      $inputIdLevelListing->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdLevelListing->assignedForm = $this->assignedForm;

      $inputIdLevelListing->setActive( $this->entity->getData( 'id_level_listing' ) );
      $inputIdLevelListing->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'id_level_listing' ) );
      $inputIdLevelListing->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'id_level_listing' ) );


      $inputIdLevelListing->setLabel( $i18n->l( 'Level Listing', 'wbfsys.security_area.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdLevelListing->refresh           = $this->refresh;
        $inputIdLevelListing->serializeElement  = $this->sendElement;
        $inputIdLevelListing->editUrl = 'index.php?c=Wbfsys.SecurityLevel.listing&amp;target='.$this->namespace.'&amp;field=id_level_listing&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_security_area_id_level_listing'.$this->suffix;
      }
      // set an empty first entry
      $inputIdLevelListing->setFirstFree( 'No Level Listing selected' );

      
      $queryIdLevelListing = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_security_area_id_level_listing'] ) )
      {
      
        $queryIdLevelListing = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );

        $queryIdLevelListing->fetchSelectbox();
        $inputIdLevelListing->setData( $queryIdLevelListing->getAll() );
      
      }
      else
      {
        $inputIdLevelListing->setData( $this->listElementData['wbfsys_security_area_id_level_listing'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdLevelListing )
        $queryIdLevelListing = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );
      
      $inputIdLevelListing->loadActive = function( $activeId ) use ( $queryIdLevelListing ){
 
        return $queryIdLevelListing->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityArea_IdLevelListing */

 /**
  * create the ui element for field id_level_access
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_IdLevelAccess( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_security_area_id_level_access'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysSecurityLevel_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysSecurityLevel_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysSecurityLevel_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdLevelAccess = $this->view->newItem( 'inputWbfsysSecurityAreaIdLevelAccess', 'WbfsysSecurityLevel_Selectbox' );
      $this->items['wbfsys_security_area-id_level_access'] = $inputIdLevelAccess;
      $inputIdLevelAccess->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[id_level_access]',
          'id'        => 'wgt-input-wbfsys_security_area_id_level_access'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Level Access', 'src' => 'Security Area' ) ),
        )
      );
      $inputIdLevelAccess->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdLevelAccess->assignedForm = $this->assignedForm;

      $inputIdLevelAccess->setActive( $this->entity->getData( 'id_level_access' ) );
      $inputIdLevelAccess->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'id_level_access' ) );
      $inputIdLevelAccess->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'id_level_access' ) );


      $inputIdLevelAccess->setLabel( $i18n->l( 'Level Access', 'wbfsys.security_area.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdLevelAccess->refresh           = $this->refresh;
        $inputIdLevelAccess->serializeElement  = $this->sendElement;
        $inputIdLevelAccess->editUrl = 'index.php?c=Wbfsys.SecurityLevel.listing&amp;target='.$this->namespace.'&amp;field=id_level_access&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_security_area_id_level_access'.$this->suffix;
      }
      // set an empty first entry
      $inputIdLevelAccess->setFirstFree( 'No Level Access selected' );

      
      $queryIdLevelAccess = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_security_area_id_level_access'] ) )
      {
      
        $queryIdLevelAccess = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );

        $queryIdLevelAccess->fetchSelectbox();
        $inputIdLevelAccess->setData( $queryIdLevelAccess->getAll() );
      
      }
      else
      {
        $inputIdLevelAccess->setData( $this->listElementData['wbfsys_security_area_id_level_access'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdLevelAccess )
        $queryIdLevelAccess = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );
      
      $inputIdLevelAccess->loadActive = function( $activeId ) use ( $queryIdLevelAccess ){
 
        return $queryIdLevelAccess->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityArea_IdLevelAccess */

 /**
  * create the ui element for field id_level_insert
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_IdLevelInsert( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_security_area_id_level_insert'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysSecurityLevel_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysSecurityLevel_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysSecurityLevel_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdLevelInsert = $this->view->newItem( 'inputWbfsysSecurityAreaIdLevelInsert', 'WbfsysSecurityLevel_Selectbox' );
      $this->items['wbfsys_security_area-id_level_insert'] = $inputIdLevelInsert;
      $inputIdLevelInsert->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[id_level_insert]',
          'id'        => 'wgt-input-wbfsys_security_area_id_level_insert'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Level Insert', 'src' => 'Security Area' ) ),
        )
      );
      $inputIdLevelInsert->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdLevelInsert->assignedForm = $this->assignedForm;

      $inputIdLevelInsert->setActive( $this->entity->getData( 'id_level_insert' ) );
      $inputIdLevelInsert->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'id_level_insert' ) );
      $inputIdLevelInsert->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'id_level_insert' ) );


      $inputIdLevelInsert->setLabel( $i18n->l( 'Level Insert', 'wbfsys.security_area.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdLevelInsert->refresh           = $this->refresh;
        $inputIdLevelInsert->serializeElement  = $this->sendElement;
        $inputIdLevelInsert->editUrl = 'index.php?c=Wbfsys.SecurityLevel.listing&amp;target='.$this->namespace.'&amp;field=id_level_insert&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_security_area_id_level_insert'.$this->suffix;
      }
      // set an empty first entry
      $inputIdLevelInsert->setFirstFree( 'No Level Insert selected' );

      
      $queryIdLevelInsert = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_security_area_id_level_insert'] ) )
      {
      
        $queryIdLevelInsert = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );

        $queryIdLevelInsert->fetchSelectbox();
        $inputIdLevelInsert->setData( $queryIdLevelInsert->getAll() );
      
      }
      else
      {
        $inputIdLevelInsert->setData( $this->listElementData['wbfsys_security_area_id_level_insert'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdLevelInsert )
        $queryIdLevelInsert = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );
      
      $inputIdLevelInsert->loadActive = function( $activeId ) use ( $queryIdLevelInsert ){
 
        return $queryIdLevelInsert->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityArea_IdLevelInsert */

 /**
  * create the ui element for field id_level_update
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_IdLevelUpdate( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_security_area_id_level_update'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysSecurityLevel_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysSecurityLevel_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysSecurityLevel_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdLevelUpdate = $this->view->newItem( 'inputWbfsysSecurityAreaIdLevelUpdate', 'WbfsysSecurityLevel_Selectbox' );
      $this->items['wbfsys_security_area-id_level_update'] = $inputIdLevelUpdate;
      $inputIdLevelUpdate->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[id_level_update]',
          'id'        => 'wgt-input-wbfsys_security_area_id_level_update'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Level Update', 'src' => 'Security Area' ) ),
        )
      );
      $inputIdLevelUpdate->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdLevelUpdate->assignedForm = $this->assignedForm;

      $inputIdLevelUpdate->setActive( $this->entity->getData( 'id_level_update' ) );
      $inputIdLevelUpdate->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'id_level_update' ) );
      $inputIdLevelUpdate->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'id_level_update' ) );


      $inputIdLevelUpdate->setLabel( $i18n->l( 'Level Update', 'wbfsys.security_area.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdLevelUpdate->refresh           = $this->refresh;
        $inputIdLevelUpdate->serializeElement  = $this->sendElement;
        $inputIdLevelUpdate->editUrl = 'index.php?c=Wbfsys.SecurityLevel.listing&amp;target='.$this->namespace.'&amp;field=id_level_update&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_security_area_id_level_update'.$this->suffix;
      }
      // set an empty first entry
      $inputIdLevelUpdate->setFirstFree( 'No Level Update selected' );

      
      $queryIdLevelUpdate = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_security_area_id_level_update'] ) )
      {
      
        $queryIdLevelUpdate = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );

        $queryIdLevelUpdate->fetchSelectbox();
        $inputIdLevelUpdate->setData( $queryIdLevelUpdate->getAll() );
      
      }
      else
      {
        $inputIdLevelUpdate->setData( $this->listElementData['wbfsys_security_area_id_level_update'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdLevelUpdate )
        $queryIdLevelUpdate = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );
      
      $inputIdLevelUpdate->loadActive = function( $activeId ) use ( $queryIdLevelUpdate ){
 
        return $queryIdLevelUpdate->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityArea_IdLevelUpdate */

 /**
  * create the ui element for field id_level_delete
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_IdLevelDelete( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_security_area_id_level_delete'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysSecurityLevel_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysSecurityLevel_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysSecurityLevel_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdLevelDelete = $this->view->newItem( 'inputWbfsysSecurityAreaIdLevelDelete', 'WbfsysSecurityLevel_Selectbox' );
      $this->items['wbfsys_security_area-id_level_delete'] = $inputIdLevelDelete;
      $inputIdLevelDelete->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[id_level_delete]',
          'id'        => 'wgt-input-wbfsys_security_area_id_level_delete'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Level Delete', 'src' => 'Security Area' ) ),
        )
      );
      $inputIdLevelDelete->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdLevelDelete->assignedForm = $this->assignedForm;

      $inputIdLevelDelete->setActive( $this->entity->getData( 'id_level_delete' ) );
      $inputIdLevelDelete->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'id_level_delete' ) );
      $inputIdLevelDelete->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'id_level_delete' ) );


      $inputIdLevelDelete->setLabel( $i18n->l( 'Level Delete', 'wbfsys.security_area.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdLevelDelete->refresh           = $this->refresh;
        $inputIdLevelDelete->serializeElement  = $this->sendElement;
        $inputIdLevelDelete->editUrl = 'index.php?c=Wbfsys.SecurityLevel.listing&amp;target='.$this->namespace.'&amp;field=id_level_delete&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_security_area_id_level_delete'.$this->suffix;
      }
      // set an empty first entry
      $inputIdLevelDelete->setFirstFree( 'No Level Delete selected' );

      
      $queryIdLevelDelete = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_security_area_id_level_delete'] ) )
      {
      
        $queryIdLevelDelete = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );

        $queryIdLevelDelete->fetchSelectbox();
        $inputIdLevelDelete->setData( $queryIdLevelDelete->getAll() );
      
      }
      else
      {
        $inputIdLevelDelete->setData( $this->listElementData['wbfsys_security_area_id_level_delete'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdLevelDelete )
        $queryIdLevelDelete = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );
      
      $inputIdLevelDelete->loadActive = function( $activeId ) use ( $queryIdLevelDelete ){
 
        return $queryIdLevelDelete->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityArea_IdLevelDelete */

 /**
  * create the ui element for field id_level_admin
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_IdLevelAdmin( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_security_area_id_level_admin'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysSecurityLevel_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysSecurityLevel_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysSecurityLevel_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdLevelAdmin = $this->view->newItem( 'inputWbfsysSecurityAreaIdLevelAdmin', 'WbfsysSecurityLevel_Selectbox' );
      $this->items['wbfsys_security_area-id_level_admin'] = $inputIdLevelAdmin;
      $inputIdLevelAdmin->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[id_level_admin]',
          'id'        => 'wgt-input-wbfsys_security_area_id_level_admin'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Level Admin', 'src' => 'Security Area' ) ),
        )
      );
      $inputIdLevelAdmin->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdLevelAdmin->assignedForm = $this->assignedForm;

      $inputIdLevelAdmin->setActive( $this->entity->getData( 'id_level_admin' ) );
      $inputIdLevelAdmin->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'id_level_admin' ) );
      $inputIdLevelAdmin->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'id_level_admin' ) );


      $inputIdLevelAdmin->setLabel( $i18n->l( 'Level Admin', 'wbfsys.security_area.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdLevelAdmin->refresh           = $this->refresh;
        $inputIdLevelAdmin->serializeElement  = $this->sendElement;
        $inputIdLevelAdmin->editUrl = 'index.php?c=Wbfsys.SecurityLevel.listing&amp;target='.$this->namespace.'&amp;field=id_level_admin&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_security_area_id_level_admin'.$this->suffix;
      }
      // set an empty first entry
      $inputIdLevelAdmin->setFirstFree( 'No Level Admin selected' );

      
      $queryIdLevelAdmin = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_security_area_id_level_admin'] ) )
      {
      
        $queryIdLevelAdmin = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );

        $queryIdLevelAdmin->fetchSelectbox();
        $inputIdLevelAdmin->setData( $queryIdLevelAdmin->getAll() );
      
      }
      else
      {
        $inputIdLevelAdmin->setData( $this->listElementData['wbfsys_security_area_id_level_admin'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdLevelAdmin )
        $queryIdLevelAdmin = $this->db->newQuery( 'WbfsysSecurityLevel_Selectbox' );
      
      $inputIdLevelAdmin->loadActive = function( $activeId ) use ( $queryIdLevelAdmin ){
 
        return $queryIdLevelAdmin->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityArea_IdLevelAdmin */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_Vid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputVid = $this->view->newInput( 'inputWbfsysSecurityAreaVid', 'Hidden' );
      $this->items['wbfsys_security_area-vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[vid]',
          'id'        => 'wgt-input-wbfsys_security_area_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'VID', 'src' => 'Security Area' ) ),
          'maxlength' => $this->entity->maxSize( 'vid' ),
        )
      );
      $inputVid->setWidth( 'medium' );

      $inputVid->setData( $this->entity->getSecure( 'vid' ) );
      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysSecurityArea_Vid */

 /**
  * create the ui element for field id_target
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_IdTarget( $params )
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
      $objidWbfsysSecurityArea = $this->entity->getData( 'id_target' ) ;

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

      $inputIdTarget = $this->view->newInput( 'inputWbfsysSecurityAreaIdTarget', 'Window' );
      $this->items['wbfsys_security_area-id_target'] = $inputIdTarget;
      $inputIdTarget->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_security_area[id_target]',
        'id'        => 'wgt-input-wbfsys_security_area_id_target'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Target', 'src' => 'Security Area' ) ),
      ));

      if( $this->assignedForm )
        $inputIdTarget->assignedForm = $this->assignedForm;

      $inputIdTarget->setWidth( 'medium' );

      $inputIdTarget->setData( $this->entity->getData( 'id_target' )  );
      $inputIdTarget->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'id_target' ) );
      $inputIdTarget->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'id_target' ) );
      $inputIdTarget->setLabel( $i18n->l( 'Target', 'wbfsys.security_area.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.SecurityArea.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_security_area_id_target'.($this->suffix?'-'.$this->suffix:'');

      $inputIdTarget->setListUrl ( $listUrl );
      $inputIdTarget->setListIcon( 'control/connect.png' );
      $inputIdTarget->setEntityUrl( 'maintab.php?c=Wbfsys.SecurityArea.edit' );
      $inputIdTarget->conEntity         = $entityWbfsysSecurityArea;
      $inputIdTarget->refresh           = $this->refresh;
      $inputIdTarget->serializeElement  = $this->sendElement;


        $inputIdTarget->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.SecurityArea.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdTarget->view = $this->view;
      $inputIdTarget->buildJavascript( 'wgt-input-wbfsys_security_area_id_target'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdTarget );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityArea_IdTarget */

 /**
  * create the ui element for field id_type
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_IdType( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_security_area_id_type'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysSecurityAreaType_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysSecurityAreaType_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysSecurityAreaType_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdType = $this->view->newItem( 'inputWbfsysSecurityAreaIdType', 'WbfsysSecurityAreaType_Selectbox' );
      $this->items['wbfsys_security_area-id_type'] = $inputIdType;
      $inputIdType->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[id_type]',
          'id'        => 'wgt-input-wbfsys_security_area_id_type'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Type', 'src' => 'Security Area' ) ),
        )
      );
      $inputIdType->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdType->assignedForm = $this->assignedForm;

      $inputIdType->setActive( $this->entity->getData( 'id_type' ) );
      $inputIdType->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'id_type' ) );
      $inputIdType->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'id_type' ) );


      $inputIdType->setLabel( $i18n->l( 'Type', 'wbfsys.security_area.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_security_area_type:insert' ) )
      {
        $inputIdType->refresh           = $this->refresh;
        $inputIdType->serializeElement  = $this->sendElement;
        $inputIdType->editUrl = 'index.php?c=Wbfsys.SecurityAreaType.listing&amp;target='.$this->namespace.'&amp;field=id_type&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_security_area_id_type'.$this->suffix;
      }
      // set an empty first entry
      $inputIdType->setFirstFree( 'No Type selected' );

      
      $queryIdType = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_security_area_id_type'] ) )
      {
      
        $queryIdType = $this->db->newQuery( 'WbfsysSecurityAreaType_Selectbox' );

        $queryIdType->fetchSelectbox();
        $inputIdType->setData( $queryIdType->getAll() );
      
      }
      else
      {
        $inputIdType->setData( $this->listElementData['wbfsys_security_area_id_type'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdType )
        $queryIdType = $this->db->newQuery( 'WbfsysSecurityAreaType_Selectbox' );
      
      $inputIdType->loadActive = function( $activeId ) use ( $queryIdType ){
 
        return $queryIdType->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityArea_IdType */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysSecurityAreaAccessKey' , 'Text' );
      $this->items['wbfsys_security_area-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[access_key]',
          'id'        => 'wgt-input-wbfsys_security_area_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Security Area' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.security_area.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysSecurityArea_AccessKey */

 /**
  * create the ui element for field type_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_TypeKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputTypeKey = $this->view->newInput( 'inputWbfsysSecurityAreaTypeKey' , 'Text' );
      $this->items['wbfsys_security_area-type_key'] = $inputTypeKey;
      $inputTypeKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[type_key]',
          'id'        => 'wgt-input-wbfsys_security_area_type_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Type key', 'src' => 'Security Area' ) ),
          'maxlength' => $this->entity->maxSize( 'type_key' ),
        )
      );
      $inputTypeKey->setWidth( 'medium' );

      $inputTypeKey->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'type_key' ) );
      $inputTypeKey->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'type_key' ) );
      $inputTypeKey->setData( $this->entity->getSecure('type_key') );
      $inputTypeKey->setLabel( $i18n->l( 'Type key', 'wbfsys.security_area.label' ) );

      $inputTypeKey->refresh           = $this->refresh;
      $inputTypeKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysSecurityArea_TypeKey */

 /**
  * create the ui element for field parent_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_ParentKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputParentKey = $this->view->newInput( 'inputWbfsysSecurityAreaParentKey' , 'Text' );
      $this->items['wbfsys_security_area-parent_key'] = $inputParentKey;
      $inputParentKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[parent_key]',
          'id'        => 'wgt-input-wbfsys_security_area_parent_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Parent key', 'src' => 'Security Area' ) ),
          'maxlength' => $this->entity->maxSize( 'parent_key' ),
        )
      );
      $inputParentKey->setWidth( 'medium' );

      $inputParentKey->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'parent_key' ) );
      $inputParentKey->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'parent_key' ) );
      $inputParentKey->setData( $this->entity->getSecure('parent_key') );
      $inputParentKey->setLabel( $i18n->l( 'Parent key', 'wbfsys.security_area.label' ) );

      $inputParentKey->refresh           = $this->refresh;
      $inputParentKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysSecurityArea_ParentKey */

 /**
  * create the ui element for field source_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_SourceKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputSourceKey = $this->view->newInput( 'inputWbfsysSecurityAreaSourceKey' , 'Text' );
      $this->items['wbfsys_security_area-source_key'] = $inputSourceKey;
      $inputSourceKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[source_key]',
          'id'        => 'wgt-input-wbfsys_security_area_source_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Source key', 'src' => 'Security Area' ) ),
          'maxlength' => $this->entity->maxSize( 'source_key' ),
        )
      );
      $inputSourceKey->setWidth( 'medium' );

      $inputSourceKey->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'source_key' ) );
      $inputSourceKey->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'source_key' ) );
      $inputSourceKey->setData( $this->entity->getSecure('source_key') );
      $inputSourceKey->setLabel( $i18n->l( 'Source key', 'wbfsys.security_area.label' ) );

      $inputSourceKey->refresh           = $this->refresh;
      $inputSourceKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysSecurityArea_SourceKey */

 /**
  * create the ui element for field id_source
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_IdSource( $params )
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
      $objidWbfsysSecurityArea = $this->entity->getData( 'id_source' ) ;

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

      $inputIdSource = $this->view->newInput( 'inputWbfsysSecurityAreaIdSource', 'Window' );
      $this->items['wbfsys_security_area-id_source'] = $inputIdSource;
      $inputIdSource->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_security_area[id_source]',
        'id'        => 'wgt-input-wbfsys_security_area_id_source'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Source', 'src' => 'Security Area' ) ),
      ));

      if( $this->assignedForm )
        $inputIdSource->assignedForm = $this->assignedForm;

      $inputIdSource->setWidth( 'medium' );

      $inputIdSource->setData( $this->entity->getData( 'id_source' )  );
      $inputIdSource->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'id_source' ) );
      $inputIdSource->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'id_source' ) );
      $inputIdSource->setLabel( $i18n->l( 'Source', 'wbfsys.security_area.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.SecurityArea.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_security_area_id_source'.($this->suffix?'-'.$this->suffix:'');

      $inputIdSource->setListUrl ( $listUrl );
      $inputIdSource->setListIcon( 'control/connect.png' );
      $inputIdSource->setEntityUrl( 'maintab.php?c=Wbfsys.SecurityArea.edit' );
      $inputIdSource->conEntity         = $entityWbfsysSecurityArea;
      $inputIdSource->refresh           = $this->refresh;
      $inputIdSource->serializeElement  = $this->sendElement;


        $inputIdSource->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.SecurityArea.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdSource->view = $this->view;
      $inputIdSource->buildJavascript( 'wgt-input-wbfsys_security_area_id_source'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdSource );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysSecurityArea_IdSource */

 /**
  * create the ui element for field parent_path
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_ParentPath( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputParentPath = $this->view->newInput( 'inputWbfsysSecurityAreaParentPath' , 'Text' );
      $this->items['wbfsys_security_area-parent_path'] = $inputParentPath;
      $inputParentPath->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[parent_path]',
          'id'        => 'wgt-input-wbfsys_security_area_parent_path'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Parent Path', 'src' => 'Security Area' ) ),
          'maxlength' => $this->entity->maxSize( 'parent_path' ),
        )
      );
      $inputParentPath->setWidth( 'medium' );

      $inputParentPath->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'parent_path' ) );
      $inputParentPath->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'parent_path' ) );
      $inputParentPath->setData( $this->entity->getSecure('parent_path') );
      $inputParentPath->setLabel( $i18n->l( 'Parent Path', 'wbfsys.security_area.label' ) );

      $inputParentPath->refresh           = $this->refresh;
      $inputParentPath->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysSecurityArea_ParentPath */

 /**
  * create the ui element for field revision
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_Revision( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputRevision = $this->view->newInput( 'inputWbfsysSecurityAreaRevision', 'Int' );
      $this->items['wbfsys_security_area-revision'] = $inputRevision;
      $inputRevision->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[revision]',
          'id'        => 'wgt-input-wbfsys_security_area_revision'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Revision', 'src' => 'Security Area' ) ),
        )
      );
      $inputRevision->setWidth( 'medium' );

$inputRevision->setReadOnly( $this->fieldReadOnly( 'wbfsys_security_area', 'revision' ) );
      $inputRevision->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'revision' ) );
      $inputRevision->setData( $this->entity->getData( 'revision' ) );
      $inputRevision->setLabel( $i18n->l( 'Revision', 'wbfsys.security_area.label' ) );

      $inputRevision->refresh           = $this->refresh;
      $inputRevision->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysSecurityArea_Revision */

 /**
  * create the ui element for field flag_system
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_FlagSystem( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputFlagSystem = $this->view->newInput( 'inputWbfsysSecurityAreaFlagSystem', 'Checkbox' );
      $this->items['wbfsys_security_area-flag_system'] = $inputFlagSystem;
      $inputFlagSystem->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[flag_system]',
          'id'        => 'wgt-input-wbfsys_security_area_flag_system'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'System', 'src' => 'Security Area' ) ),
        )
      );
      $inputFlagSystem->setWidth( 'medium' );

      $inputFlagSystem->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'flag_system' ) );
      $inputFlagSystem->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'flag_system' ) );
      $inputFlagSystem->setActive( $this->entity->getBoolean( 'flag_system' ) );
      $inputFlagSystem->setLabel( $i18n->l( 'System', 'wbfsys.security_area.label' ) );

      $inputFlagSystem->refresh           = $this->refresh;
      $inputFlagSystem->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysSecurityArea_FlagSystem */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysSecurityAreaDescription', 'Textarea' );
      $this->items['wbfsys_security_area-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_security_area[description]',
          'id'    => 'wgt-input-wbfsys_security_area_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Security Area' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.security_area.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysSecurityArea_Description */

 /**
  * create the ui element for field id_vid_entity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_IdVidEntity( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdVidEntity = $this->view->newInput( 'inputWbfsysSecurityAreaIdVidEntity', 'Hidden' );
      $this->items['wbfsys_security_area-id_vid_entity'] = $inputIdVidEntity;
      $inputIdVidEntity->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[id_vid_entity]',
          'id'        => 'wgt-input-wbfsys_security_area_id_vid_entity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Entity', 'src' => 'Security Area' ) ),
          'maxlength' => $this->entity->maxSize( 'id_vid_entity' ),
        )
      );
      $inputIdVidEntity->setWidth( 'medium' );

      $inputIdVidEntity->setData( $this->entity->getSecure( 'id_vid_entity' ) );
      $inputIdVidEntity->refresh           = $this->refresh;
      $inputIdVidEntity->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysSecurityArea_IdVidEntity */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysSecurityAreaRowid' , 'int' );
      $this->items['wbfsys_security_area-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[rowid]',
          'id'        => 'wgt-input-wbfsys_security_area_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Security Area' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.security_area.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysSecurityArea_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysSecurityAreaMTimeCreated' , 'Date' );
      $this->items['wbfsys_security_area-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[m_time_created]',
          'id'        => 'wgt-input-wbfsys_security_area_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Security Area' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.security_area.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysSecurityArea_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysSecurityAreaMRoleCreate', 'Window' );
      $this->items['wbfsys_security_area-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_security_area[m_role_create]',
        'id'        => 'wgt-input-wbfsys_security_area_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Security Area' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.security_area.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_security_area_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_security_area_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysSecurityArea_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysSecurityAreaMTimeChanged' , 'Date' );
      $this->items['wbfsys_security_area-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_security_area_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Security Area' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.security_area.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysSecurityArea_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysSecurityAreaMRoleChange', 'Window' );
      $this->items['wbfsys_security_area-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_security_area[m_role_change]',
        'id'        => 'wgt-input-wbfsys_security_area_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Security Area' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.security_area.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_security_area_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_security_area_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysSecurityArea_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysSecurityAreaMVersion' , 'int' );
      $this->items['wbfsys_security_area-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[m_version]',
          'id'        => 'wgt-input-wbfsys_security_area_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Security Area' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.security_area.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysSecurityArea_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysSecurityArea_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysSecurityAreaMUuid' , 'Text' );
      $this->items['wbfsys_security_area-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_security_area[m_uuid]',
          'id'        => 'wgt-input-wbfsys_security_area_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Security Area' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_security_area', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_security_area', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.security_area.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysSecurityArea_MUuid */

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
      $orm->getValidationData( 'WbfsysSecurityArea', array_keys( $this->fields['wbfsys_security_area']), true ),
      $orm->getErrorMessages( 'WbfsysSecurityArea' ),
      'wbfsys_security_area'
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


}//end class WbfsysSecurityArea_Crud_Create_Form */


