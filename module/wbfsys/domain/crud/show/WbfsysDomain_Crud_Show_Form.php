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
class WbfsysDomain_Crud_Show_Form
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
  public $namespace  = 'WbfsysDomain';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysDomain';

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
      'wbfsys_domain' => array
      (
        'name' => array
        ( 
          'required'  => true, 
          'readonly'  => false, 
          'lenght'    => '255',
        ),
        'id_cms_project' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_owner' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_customer' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_techc' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_adminc' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_registrar' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_dns' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_2dns' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_dns_zone' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'is_primary' => array
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
   * @var WbfsysDomain_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysDomain_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysDomain_Entity $entity
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
      'wbfsys_domain' => array
      (
        'name',
        'id_cms_project',
        'id_owner',
        'id_customer',
        'id_techc',
        'id_adminc',
        'id_registrar',
        'id_dns',
        'id_2dns',
        'id_dns_zone',
        'is_primary',
        'description',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysDomain entity
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
    $this->view->addVar( 'entityWbfsysDomain', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_domain'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_domain[id_wbfsys_domain-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysDomain_Name( $params );
    $this->input_WbfsysDomain_IdCmsProject( $params );
    $this->input_WbfsysDomain_IdOwner( $params );
    $this->input_WbfsysDomain_IdCustomer( $params );
    $this->input_WbfsysDomain_IdTechc( $params );
    $this->input_WbfsysDomain_IdAdminc( $params );
    $this->input_WbfsysDomain_IdRegistrar( $params );
    $this->input_WbfsysDomain_IdDns( $params );
    $this->input_WbfsysDomain_Id2dns( $params );
    $this->input_WbfsysDomain_IdDnsZone( $params );
    $this->input_WbfsysDomain_IsPrimary( $params );
    $this->input_WbfsysDomain_Description( $params );
    $this->input_WbfsysDomain_Rowid( $params );
    $this->input_WbfsysDomain_MTimeCreated( $params );
    $this->input_WbfsysDomain_MRoleCreate( $params );
    $this->input_WbfsysDomain_MTimeChanged( $params );
    $this->input_WbfsysDomain_MRoleChange( $params );
    $this->input_WbfsysDomain_MVersion( $params );
    $this->input_WbfsysDomain_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDomain_Name( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputName = $this->view->newInput( 'inputWbfsysDomainName' , 'Text' );
      $this->items['wbfsys_domain-name'] = $inputName;
      $inputName->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_domain[name]',
          'id'        => 'wgt-input-wbfsys_domain_name'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Name', 'src' => 'Domain' ) ),
          'maxlength' => $this->entity->maxSize( 'name' ),
        )
      );
      $inputName->setWidth( 'medium' );

      $inputName->setReadonly( $this->fieldReadOnly( 'wbfsys_domain', 'name' ) );
      $inputName->setRequired( $this->fieldRequired( 'wbfsys_domain', 'name' ) );
      $inputName->setData( $this->entity->getSecure('name') );
      $inputName->setLabel( $i18n->l( 'Name', 'wbfsys.domain.label' ) );

      $inputName->refresh           = $this->refresh;
      $inputName->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysDomain_Name */
/// windowref to nonexisting cms_project in LibGeneratorWbfFieldWindow
 /**
  * create the ui element for field id_owner
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDomain_IdOwner( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'CorePerson_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity CorePerson not exists' );

      Log::warn( 'Looks like the Entity: CorePerson is missing' );

      return;
    }


      //p: Window
      $objidCorePerson = $this->entity->getData( 'id_owner' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidCorePerson
          || !$entityCorePerson = $this->db->orm->get
          (
            'CorePerson',
            $objidCorePerson
          )
      )
      {
        $entityCorePerson = $this->db->orm->newEntity( 'CorePerson' );
      }

      $inputIdOwner = $this->view->newInput( 'inputWbfsysDomainIdOwner', 'Window' );
      $this->items['wbfsys_domain-id_owner'] = $inputIdOwner;
      $inputIdOwner->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_domain[id_owner]',
        'id'        => 'wgt-input-wbfsys_domain_id_owner'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Owner', 'src' => 'Domain' ) ),
      ));

      if( $this->assignedForm )
        $inputIdOwner->assignedForm = $this->assignedForm;

      $inputIdOwner->setWidth( 'medium' );

      $inputIdOwner->setData( $this->entity->getData( 'id_owner' )  );
      $inputIdOwner->setReadonly( $this->fieldReadOnly( 'wbfsys_domain', 'id_owner' ) );
      $inputIdOwner->setRequired( $this->fieldRequired( 'wbfsys_domain', 'id_owner' ) );
      $inputIdOwner->setLabel( $i18n->l( 'Owner', 'wbfsys.domain.label' ) );


      $listUrl = 'modal.php?c=Core.Person.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_domain_id_owner'.($this->suffix?'-'.$this->suffix:'');

      $inputIdOwner->setListUrl ( $listUrl );
      $inputIdOwner->setListIcon( 'control/connect.png' );
      $inputIdOwner->setEntityUrl( 'maintab.php?c=Core.Person.edit' );
      $inputIdOwner->conEntity         = $entityCorePerson;
      $inputIdOwner->refresh           = $this->refresh;
      $inputIdOwner->serializeElement  = $this->sendElement;



      $inputIdOwner->view = $this->view;
      $inputIdOwner->buildJavascript( 'wgt-input-wbfsys_domain_id_owner'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdOwner );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysDomain_IdOwner */
/// windowref to nonexisting enterprise_customer in LibGeneratorWbfFieldWindow
 /**
  * create the ui element for field id_techc
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDomain_IdTechc( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'CorePerson_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity CorePerson not exists' );

      Log::warn( 'Looks like the Entity: CorePerson is missing' );

      return;
    }


      //p: Window
      $objidCorePerson = $this->entity->getData( 'id_techc' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidCorePerson
          || !$entityCorePerson = $this->db->orm->get
          (
            'CorePerson',
            $objidCorePerson
          )
      )
      {
        $entityCorePerson = $this->db->orm->newEntity( 'CorePerson' );
      }

      $inputIdTechc = $this->view->newInput( 'inputWbfsysDomainIdTechc', 'Window' );
      $this->items['wbfsys_domain-id_techc'] = $inputIdTechc;
      $inputIdTechc->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_domain[id_techc]',
        'id'        => 'wgt-input-wbfsys_domain_id_techc'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Techc', 'src' => 'Domain' ) ),
      ));

      if( $this->assignedForm )
        $inputIdTechc->assignedForm = $this->assignedForm;

      $inputIdTechc->setWidth( 'medium' );

      $inputIdTechc->setData( $this->entity->getData( 'id_techc' )  );
      $inputIdTechc->setReadonly( $this->fieldReadOnly( 'wbfsys_domain', 'id_techc' ) );
      $inputIdTechc->setRequired( $this->fieldRequired( 'wbfsys_domain', 'id_techc' ) );
      $inputIdTechc->setLabel( $i18n->l( 'Techc', 'wbfsys.domain.label' ) );


      $listUrl = 'modal.php?c=Core.Person.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_domain_id_techc'.($this->suffix?'-'.$this->suffix:'');

      $inputIdTechc->setListUrl ( $listUrl );
      $inputIdTechc->setListIcon( 'control/connect.png' );
      $inputIdTechc->setEntityUrl( 'maintab.php?c=Core.Person.edit' );
      $inputIdTechc->conEntity         = $entityCorePerson;
      $inputIdTechc->refresh           = $this->refresh;
      $inputIdTechc->serializeElement  = $this->sendElement;



      $inputIdTechc->view = $this->view;
      $inputIdTechc->buildJavascript( 'wgt-input-wbfsys_domain_id_techc'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdTechc );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysDomain_IdTechc */

 /**
  * create the ui element for field id_adminc
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDomain_IdAdminc( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'CorePerson_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity CorePerson not exists' );

      Log::warn( 'Looks like the Entity: CorePerson is missing' );

      return;
    }


      //p: Window
      $objidCorePerson = $this->entity->getData( 'id_adminc' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidCorePerson
          || !$entityCorePerson = $this->db->orm->get
          (
            'CorePerson',
            $objidCorePerson
          )
      )
      {
        $entityCorePerson = $this->db->orm->newEntity( 'CorePerson' );
      }

      $inputIdAdminc = $this->view->newInput( 'inputWbfsysDomainIdAdminc', 'Window' );
      $this->items['wbfsys_domain-id_adminc'] = $inputIdAdminc;
      $inputIdAdminc->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_domain[id_adminc]',
        'id'        => 'wgt-input-wbfsys_domain_id_adminc'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Adminc', 'src' => 'Domain' ) ),
      ));

      if( $this->assignedForm )
        $inputIdAdminc->assignedForm = $this->assignedForm;

      $inputIdAdminc->setWidth( 'medium' );

      $inputIdAdminc->setData( $this->entity->getData( 'id_adminc' )  );
      $inputIdAdminc->setReadonly( $this->fieldReadOnly( 'wbfsys_domain', 'id_adminc' ) );
      $inputIdAdminc->setRequired( $this->fieldRequired( 'wbfsys_domain', 'id_adminc' ) );
      $inputIdAdminc->setLabel( $i18n->l( 'Adminc', 'wbfsys.domain.label' ) );


      $listUrl = 'modal.php?c=Core.Person.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_domain_id_adminc'.($this->suffix?'-'.$this->suffix:'');

      $inputIdAdminc->setListUrl ( $listUrl );
      $inputIdAdminc->setListIcon( 'control/connect.png' );
      $inputIdAdminc->setEntityUrl( 'maintab.php?c=Core.Person.edit' );
      $inputIdAdminc->conEntity         = $entityCorePerson;
      $inputIdAdminc->refresh           = $this->refresh;
      $inputIdAdminc->serializeElement  = $this->sendElement;



      $inputIdAdminc->view = $this->view;
      $inputIdAdminc->buildJavascript( 'wgt-input-wbfsys_domain_id_adminc'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdAdminc );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysDomain_IdAdminc */
/// windowref to nonexisting hosting_provider in LibGeneratorWbfFieldWindow/// windowref to nonexisting hosting_service in LibGeneratorWbfFieldWindow/// windowref to nonexisting hosting_service in LibGeneratorWbfFieldWindow/// windowref to nonexisting hosting_dns_zone in LibGeneratorWbfFieldWindow
 /**
  * create the ui element for field is_primary
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDomain_IsPrimary( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputIsPrimary = $this->view->newInput( 'inputWbfsysDomainIsPrimary', 'Checkbox' );
      $this->items['wbfsys_domain-is_primary'] = $inputIsPrimary;
      $inputIsPrimary->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_domain[is_primary]',
          'id'        => 'wgt-input-wbfsys_domain_is_primary'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Is Primary', 'src' => 'Domain' ) ),
        )
      );
      $inputIsPrimary->setWidth( 'medium' );

      $inputIsPrimary->setReadonly( $this->fieldReadOnly( 'wbfsys_domain', 'is_primary' ) );
      $inputIsPrimary->setRequired( $this->fieldRequired( 'wbfsys_domain', 'is_primary' ) );
      $inputIsPrimary->setActive( $this->entity->getBoolean( 'is_primary' ) );
      $inputIsPrimary->setLabel( $i18n->l( 'Is Primary', 'wbfsys.domain.label' ) );

      $inputIsPrimary->refresh           = $this->refresh;
      $inputIsPrimary->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysDomain_IsPrimary */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDomain_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysDomainDescription', 'Textarea' );
      $this->items['wbfsys_domain-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_domain[description]',
          'id'    => 'wgt-input-wbfsys_domain_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Domain' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_domain', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_domain', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.domain.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysDomain_Description */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDomain_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysDomainRowid' , 'int' );
      $this->items['wbfsys_domain-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_domain[rowid]',
          'id'        => 'wgt-input-wbfsys_domain_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Domain' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_domain', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_domain', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.domain.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysDomain_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDomain_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysDomainMTimeCreated' , 'Date' );
      $this->items['wbfsys_domain-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_domain[m_time_created]',
          'id'        => 'wgt-input-wbfsys_domain_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Domain' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_domain', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_domain', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.domain.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysDomain_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDomain_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysDomainMRoleCreate', 'Window' );
      $this->items['wbfsys_domain-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_domain[m_role_create]',
        'id'        => 'wgt-input-wbfsys_domain_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Domain' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_domain', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_domain', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.domain.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_domain_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_domain_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysDomain_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDomain_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysDomainMTimeChanged' , 'Date' );
      $this->items['wbfsys_domain-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_domain[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_domain_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Domain' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_domain', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_domain', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.domain.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysDomain_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDomain_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysDomainMRoleChange', 'Window' );
      $this->items['wbfsys_domain-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_domain[m_role_change]',
        'id'        => 'wgt-input-wbfsys_domain_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Domain' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_domain', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_domain', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.domain.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_domain_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_domain_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysDomain_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDomain_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysDomainMVersion' , 'int' );
      $this->items['wbfsys_domain-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_domain[m_version]',
          'id'        => 'wgt-input-wbfsys_domain_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Domain' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_domain', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_domain', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.domain.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysDomain_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysDomain_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysDomainMUuid' , 'Text' );
      $this->items['wbfsys_domain-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_domain[m_uuid]',
          'id'        => 'wgt-input-wbfsys_domain_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Domain' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_domain', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_domain', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.domain.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysDomain_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysDomain_Crud_Show_Form */


