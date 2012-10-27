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
 * @subpackage ModCore
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CorePerson_Form
  extends WgtForm
{
////////////////////////////////////////////////////////////////////////////////
// attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * the name of the key for the post data
   * @setter WgtForm::setKeyName()
   * @getter WgtForm::getKeyName()
   * @var string 
   */
  public $keyName     = 'core_person';

  /**
   * the cname for the entities, is used to request metadata from the orm
   * @setter WgtForm::setEntityName()
   * @getter WgtForm::getEntityName()
   * @var string 
   */
  public $entityName  = 'CorePerson';

  /**
   * namespace for the actual form
   * @setter WgtForm::setNamespace()
   * @getter WgtForm::getNamespace()
   * @var string 
   */
  public $namespace  = 'CorePerson';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtForm::setPrefix()
   * @getter WgtForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'CorePerson';

  /**
   * suffixes are used to create multiple instances of forms for diffrent
   * datasets, normaly the suffix is the id of a dataset or "-new" for
   * create forms
   *
   * @setter WgtForm::setSuffix()
   * @getter WgtForm::getSuffix()
   * @var string 
   */
  public $suffix      = null;

  /**
   * Die Datenentity für das Formular
   *
   * @var CorePerson_Entity 
   */
  public $entity      = null;
  
////////////////////////////////////////////////////////////////////////////////
// form methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the CorePerson entity
  *
  * @param Entity $entity the entity object
  * @param array $fields list with all elements that shoul be shown in the ui
  * @namedParam TFlag $params named parameters
  * {
  *   string keyName    : the key name for the multidim array name of the inputfields;
  *   string prefix     : prefix for the inputs;
  *   string target     : target for;
  *   boolean readOnly  : set all elements to readonly;
  *   boolean refresh   : refresh the elements in an ajax request ;
  *   boolean sendElement : if true, then the system will send the elements in
  *   ajax requests als serialized html and not only just as value
  * }
  */
  public function createForm( $entity, $fields = array(), $params = null  )
  {

    $params = $this->checkNamedParams( $params );

    if( !$entity )
    {
      Error::addError( 'Entity must not be null!!' );
      Message::addError( 'Some internal error occured, it\'s likely, that some data are missing in the ui' );
      return false;
    }

    $this->entity = $entity;
    $this->rowid  = $entity->getId();

    // add the entity to the view
    $this->view->addVar( 'entity'.$this->prefix, $this->entity );

    $this->db     = $this->getDb();

    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-'.$this->keyName.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => $this->keyName.'[id_'.$this->keyName.'-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    // append search meta data
    $this->input_rowid( $params );

    foreach( $fields as $key )
    {
      $method = 'input_'.$key;

      if( method_exists( $this,  $method ) )
      {
        $this->$method( $params );
      }
      else
      {
        if(DEBUG)
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: CorePerson' );
      }
    }

  }//end public function createForm */

 /**
  * create a search form for the CorePerson entity
  *
  * @param Entity $entity
  * @param array $fields
  * @param TFlag $params
  */
  public function createSearchForm(  $entity, $fields = array(), $params = null  )
  {

    $this->entity  = $entity;
    $this->rowid   = $entity->getId();

    $this->db      = $this->getDb();
    $params        = $this->checkNamedParams( $params );

    $this->prefix  .= 'Search';
    $this->keyName = 'search_'.$this->keyName;

    if( !$this->suffix )
    {
      $this->suffix = 'search';
    }

    foreach( $fields as $key )
    {
      $method = 'search_'.$key;
      if( method_exists( $this,  $method ) )
      {
        $this->$method( $params );
      }
      else
      {
        if(DEBUG)
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: CorePerson' );
      }
    }

    // append search meta data
    $this->search_m_role_create( $params );
    $this->search_m_role_change( $params );
    $this->search_m_time_created_before( $params );
    $this->search_m_time_created_after( $params );
    $this->search_m_time_changed_before( $params );
    $this->search_m_time_changed_after( $params );
    $this->search_m_rowid( $params );
    $this->search_m_uuid( $params );

  }//end public function createSearchForm */

////////////////////////////////////////////////////////////////////////////////
// field methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create the ui element for field gender
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_gender( $params )
  {
    if( !Webfrap::classLoadable( 'BaseGender_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'BaseGender_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: BaseGender_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputGender = $this->view->newItem( 'input'.$this->prefix.'Gender' , 'BaseGender_Selectbox' );
      $this->items['gender'] = $inputGender;
      $inputGender->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[gender]',
          'id'        => 'wgt-input-'.$this->keyName.'_gender'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Gender (Person)', 'core.person.label' ),
        )
      );
      $inputGender->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputGender->assignedForm = $this->assignedForm;

      $inputGender->setActive( $this->entity->getData( 'gender' ) );
      $inputGender->setReadOnly( $this->isReadOnly( 'gender' ) );
      $inputGender->setLabel
      (
        $this->view->i18n->l( 'Gender', 'core.person.label' ),
        $this->entity->required( 'gender' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-crm>mgmt-crm_contact_calls:insert' ) )
      {
        $inputGender->refresh           = $this->refresh;
        $inputGender->serializeElement  = $this->sendElement;
        $inputGender->editUrl = 'index.php?c=Crm.ContactCalls.listing&amp;target='.$this->namespace.'&amp;field=gender&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_gender'.$this->suffix;
      }
      // set an empty first entry
      $inputGender->setFirstFree( 'No Gender selected' );


      $queryGender = $this->db->newQuery( 'BaseGender_Selectbox' );
      $queryGender->fetchSelectbox();
      $inputGender->setData( $queryGender->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_gender */

 /**
  * create the ui element for field academic_title
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_academic_title( $params )
  {

      //tpl: class ui:text
      $inputAcademicTitle = $this->view->newInput( 'input'.$this->prefix.'AcademicTitle' , 'Text' );
      $this->items['academic_title'] = $inputAcademicTitle;
      $inputAcademicTitle->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[academic_title]',
          'id'        => 'wgt-input-'.$this->keyName.'_academic_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Academic Title (Person)', 'core.person.label' ),
          'maxlength' => $this->entity->maxSize( 'academic_title' ),
        )
      );
      $inputAcademicTitle->setWidth( 'medium' );

      $inputAcademicTitle->setReadOnly( $this->isReadOnly( 'academic_title' ) );
      $inputAcademicTitle->setData( $this->entity->getSecure('academic_title') );
      $inputAcademicTitle->setLabel
      (
        $this->view->i18n->l( 'Academic Title', 'core.person.label' ),
        $this->entity->required( 'academic_title' )
      );

      $inputAcademicTitle->refresh           = $this->refresh;
      $inputAcademicTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_academic_title */

 /**
  * create the ui element for field noblesse_title
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_noblesse_title( $params )
  {

      //tpl: class ui:text
      $inputNoblesseTitle = $this->view->newInput( 'input'.$this->prefix.'NoblesseTitle' , 'Text' );
      $this->items['noblesse_title'] = $inputNoblesseTitle;
      $inputNoblesseTitle->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[noblesse_title]',
          'id'        => 'wgt-input-'.$this->keyName.'_noblesse_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Noblesse Title (Person)', 'core.person.label' ),
          'maxlength' => $this->entity->maxSize( 'noblesse_title' ),
        )
      );
      $inputNoblesseTitle->setWidth( 'medium' );

      $inputNoblesseTitle->setReadOnly( $this->isReadOnly( 'noblesse_title' ) );
      $inputNoblesseTitle->setData( $this->entity->getSecure('noblesse_title') );
      $inputNoblesseTitle->setLabel
      (
        $this->view->i18n->l( 'Noblesse Title', 'core.person.label' ),
        $this->entity->required( 'noblesse_title' )
      );

      $inputNoblesseTitle->refresh           = $this->refresh;
      $inputNoblesseTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_noblesse_title */

 /**
  * create the ui element for field firstname
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_firstname( $params )
  {

      //tpl: class ui:text
      $inputFirstname = $this->view->newInput( 'input'.$this->prefix.'Firstname' , 'Text' );
      $this->items['firstname'] = $inputFirstname;
      $inputFirstname->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[firstname]',
          'id'        => 'wgt-input-'.$this->keyName.'_firstname'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Firstname (Person)', 'core.person.label' ),
          'maxlength' => $this->entity->maxSize( 'firstname' ),
        )
      );
      $inputFirstname->setWidth( 'medium' );

      $inputFirstname->setReadOnly( $this->isReadOnly( 'firstname' ) );
      $inputFirstname->setData( $this->entity->getSecure('firstname') );
      $inputFirstname->setLabel
      (
        $this->view->i18n->l( 'Firstname', 'core.person.label' ),
        $this->entity->required( 'firstname' )
      );

      $inputFirstname->refresh           = $this->refresh;
      $inputFirstname->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_firstname */

 /**
  * create the ui element for field lastname
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_lastname( $params )
  {

      //tpl: class ui:text
      $inputLastname = $this->view->newInput( 'input'.$this->prefix.'Lastname' , 'Text' );
      $this->items['lastname'] = $inputLastname;
      $inputLastname->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[lastname]',
          'id'        => 'wgt-input-'.$this->keyName.'_lastname'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Lastname (Person)', 'core.person.label' ),
          'maxlength' => $this->entity->maxSize( 'lastname' ),
        )
      );
      $inputLastname->setWidth( 'medium' );

      $inputLastname->setReadOnly( $this->isReadOnly( 'lastname' ) );
      $inputLastname->setData( $this->entity->getSecure('lastname') );
      $inputLastname->setLabel
      (
        $this->view->i18n->l( 'Lastname', 'core.person.label' ),
        $this->entity->required( 'lastname' )
      );

      $inputLastname->refresh           = $this->refresh;
      $inputLastname->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_lastname */

 /**
  * create the ui element for field birthday
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_birthday( $params )
  {

      //tpl: class ui:date
      $inputBirthday = $this->view->newInput( 'input'.$this->prefix.'Birthday' , 'Date' );
      $this->items['birthday'] = $inputBirthday;
      $inputBirthday->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[birthday]',
          'id'        => 'wgt-input-'.$this->keyName.'_birthday'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Birthday (Person)', 'core.person.label' ),
          'maxlength' => $this->entity->maxSize( 'birthday' ),
        )
      );
      $inputBirthday->setWidth( 'small' );

      $inputBirthday->setReadOnly( $this->isReadOnly( 'birthday' ) );
      $inputBirthday->setData( $this->entity->getDate( 'birthday' ) );
      $inputBirthday->setLabel
      (
        $this->view->i18n->l( 'Birthday', 'core.person.label' ),
        $this->entity->required( 'birthday' )
      );

      $inputBirthday->refresh           = $this->refresh;
      $inputBirthday->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_birthday */

 /**
  * create the ui element for field photo
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_photo( $params )
  {

      //p: input file image
      $inputPhoto = $this->view->newInput( 'input'.$this->prefix.'Photo', 'FileImage' );
      $inputPhoto->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[photo]',
          'id'        => 'wgt-input-'.$this->keyName.'_photo'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium',
          'title'     => $this->view->i18n->l( 'Insert value for Photo (Person)', 'core.person.label' ),
        )
      );
      $inputPhoto->setWidth( 'medium' );

      if( ( $objid = $this->entity->getId() ) && $this->entity->photo )
      {
        $inputPhoto->setSource('thumb.php?f=core_person-photo-'.$objid.'&amp;n='.base64_encode($this->entity->photo));
        $inputPhoto->setLink('image.php?f=core_person-photo-'.$objid.'&amp;n='.base64_encode($this->entity->photo));
      }

      if( $this->assignedForm )
        $inputPhoto->assignedForm = $this->assignedForm;

      $inputPhoto->setReadOnly( $this->isReadOnly( 'photo' ) );
      $inputPhoto->setLabel
      (
        $this->view->i18n->l( 'Photo', 'core.person.label' ) ,
        $this->entity->required( 'photo' )
      );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_photo */

 /**
  * create the ui element for field id_preflang
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_preflang( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysLanguage_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysLanguage_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysLanguage_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdPreflang = $this->view->newItem( 'input'.$this->prefix.'IdPreflang' , 'WbfsysLanguage_Selectbox' );
      $this->items['id_preflang'] = $inputIdPreflang;
      $inputIdPreflang->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_preflang]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_preflang'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Preferd Language (Person)', 'core.person.label' ),
        )
      );
      $inputIdPreflang->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdPreflang->assignedForm = $this->assignedForm;

      $inputIdPreflang->setActive( $this->entity->getData( 'id_preflang' ) );
      $inputIdPreflang->setReadOnly( $this->isReadOnly( 'id_preflang' ) );
      $inputIdPreflang->setLabel
      (
        $this->view->i18n->l( 'Preferd Language', 'core.person.label' ),
        $this->entity->required( 'id_preflang' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdPreflang->refresh           = $this->refresh;
        $inputIdPreflang->serializeElement  = $this->sendElement;
        $inputIdPreflang->editUrl = 'index.php?c=Wbfsys.Language.listing&amp;target='.$this->namespace.'&amp;field=id_preflang&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_id_preflang'.$this->suffix;
      }
      // set an empty first entry
      $inputIdPreflang->setFirstFree( 'No Preferd Language selected' );


      $queryIdPreflang = $this->db->newQuery( 'WbfsysLanguage_Selectbox' );
      $queryIdPreflang->fetchSelectbox();
      $inputIdPreflang->setData( $queryIdPreflang->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_PersonalData' ,
        true
      );



  }//end public function input_id_preflang */

 /**
  * create the ui element for field birth_city
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_birth_city( $params  )
  {

      //tpl: class ui: autocomplete
      $inputBirthCity = $this->view->newInput( 'input'.$this->prefix.'BirthCity', 'Autocomplete' );
      $this->items['birth_city'] = $inputBirthCity;
      $inputBirthCity->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[birth_city]',
          'id'        => 'wgt-input-'.$this->keyName.'_birth_city'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Birth City (Person)', 'core.person.label' ),
          'maxlength' => $this->entity->maxSize( 'birth_city' ),
        ) 
      );
      $inputBirthCity->setWidth( 'medium' );

      $inputBirthCity->setReadOnly( $this->isReadOnly( 'birth_city' ) );
      $inputBirthCity->setData( $this->entity->getSecure( 'birth_city' ) );
      $inputBirthCity->setLabel
      (
        $this->view->i18n->l( 'Birth City', 'core.person.label' ),
        $this->entity->required( 'birth_city' )
      );

      $inputBirthCity->refresh = $this->refresh;
      $inputBirthCity->setLoadParam( 'CorePerson', 'BirthCity' );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_PersonalData' ,
        true
      );

  }//end public function input_birth_city */

 /**
  * create the ui element for field id_nationality
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_nationality( $params )
  {
    if( !Webfrap::classLoadable( 'CoreCountry_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'CoreCountry_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: CoreCountry_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdNationality = $this->view->newItem( 'input'.$this->prefix.'IdNationality' , 'CoreCountry_Selectbox' );
      $this->items['id_nationality'] = $inputIdNationality;
      $inputIdNationality->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_nationality]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_nationality'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Nationality (Person)', 'core.person.label' ),
        )
      );
      $inputIdNationality->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdNationality->assignedForm = $this->assignedForm;

      $inputIdNationality->setActive( $this->entity->getData( 'id_nationality' ) );
      $inputIdNationality->setReadOnly( $this->isReadOnly( 'id_nationality' ) );
      $inputIdNationality->setLabel
      (
        $this->view->i18n->l( 'Nationality', 'core.person.label' ),
        $this->entity->required( 'id_nationality' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-core>mod-core-cat-core_data:insert' ) )
      {
        $inputIdNationality->refresh           = $this->refresh;
        $inputIdNationality->serializeElement  = $this->sendElement;
        $inputIdNationality->editUrl = 'index.php?c=Core.Country.listing&amp;target='.$this->namespace.'&amp;field=id_nationality&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_id_nationality'.$this->suffix;
      }
      // set an empty first entry
      $inputIdNationality->setFirstFree( 'No Nationality selected' );


      $queryIdNationality = $this->db->newQuery( 'CoreCountry_Selectbox' );
      $queryIdNationality->fetchSelectbox();
      $inputIdNationality->setData( $queryIdNationality->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_PersonalData' ,
        true
      );



  }//end public function input_id_nationality */

 /**
  * create the ui element for field is_alias_for
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_is_alias_for( $params )
  {

    if( !Webfrap::classLoadable( 'CorePerson_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity CorePerson not exists' );

      Log::warn('Looks like the Entity: CorePerson is missing');

      return;
    }


      //p: Window
      $objidCorePerson = $this->entity->getData('is_alias_for') ;

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

      $inputIsAliasFor = $this->view->newInput( 'input'.$this->prefix.'IsAliasFor', 'Window' );
      $inputIsAliasFor->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[is_alias_for]',
        'id'        => 'wgt-input-'.$this->keyName.'_is_alias_for'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Is Alias For (Person)', 'core.person.label' ),
      ));

      if( $this->assignedForm )
        $inputIsAliasFor->assignedForm = $this->assignedForm;

      $inputIsAliasFor->setWidth( 'medium' );

      $inputIsAliasFor->setData( $this->entity->getData( 'is_alias_for' )  );
      $inputIsAliasFor->setReadOnly( $this->isReadOnly( 'is_alias_for' ) );
      $inputIsAliasFor->setLabel( $this->view->i18n->l( 'Is Alias For', 'core.person.label' ) );


      $listUrl = 'modal.php?c=Core.Person.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_is_alias_for'.($this->suffix?'-'.$this->suffix:'');

      $inputIsAliasFor->setListUrl ( $listUrl );
      $inputIsAliasFor->setListIcon( 'control/connect.png' );
      $inputIsAliasFor->setEntityUrl( 'maintab.php?c=Core.Person.edit' );
      $inputIsAliasFor->conEntity         = $entityCorePerson;
      $inputIsAliasFor->refresh           = $this->refresh;
      $inputIsAliasFor->serializeElement  = $this->sendElement;
      


      $inputIsAliasFor->view = $this->view;
      $inputIsAliasFor->buildJavascript( 'wgt-input-'.$this->keyName.'_is_alias_for'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIsAliasFor );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_is_alias_for */

 /**
  * create the ui element for field tax_number
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_tax_number( $params )
  {

      //tpl: class ui:text
      $inputTaxNumber = $this->view->newInput( 'input'.$this->prefix.'TaxNumber' , 'Text' );
      $this->items['tax_number'] = $inputTaxNumber;
      $inputTaxNumber->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[tax_number]',
          'id'        => 'wgt-input-'.$this->keyName.'_tax_number'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Tax Number (Person)', 'core.person.label' ),
          'maxlength' => $this->entity->maxSize( 'tax_number' ),
        )
      );
      $inputTaxNumber->setWidth( 'medium' );

      $inputTaxNumber->setReadOnly( $this->isReadOnly( 'tax_number' ) );
      $inputTaxNumber->setData( $this->entity->getSecure('tax_number') );
      $inputTaxNumber->setLabel
      (
        $this->view->i18n->l( 'Tax Number', 'core.person.label' ),
        $this->entity->required( 'tax_number' )
      );

      $inputTaxNumber->refresh           = $this->refresh;
      $inputTaxNumber->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_IdentData' ,
        true
      );


  }//end public function input_tax_number */

 /**
  * create the ui element for field pkid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_pkid( $params )
  {

      //tpl: class ui:text
      $inputPkid = $this->view->newInput( 'input'.$this->prefix.'Pkid' , 'Text' );
      $this->items['pkid'] = $inputPkid;
      $inputPkid->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[pkid]',
          'id'        => 'wgt-input-'.$this->keyName.'_pkid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Personal Ident (Person)', 'core.person.label' ),
          'maxlength' => $this->entity->maxSize( 'pkid' ),
        )
      );
      $inputPkid->setWidth( 'medium' );

      $inputPkid->setReadOnly( $this->isReadOnly( 'pkid' ) );
      $inputPkid->setData( $this->entity->getSecure('pkid') );
      $inputPkid->setLabel
      (
        $this->view->i18n->l( 'Personal Ident', 'core.person.label' ),
        $this->entity->required( 'pkid' )
      );

      $inputPkid->refresh           = $this->refresh;
      $inputPkid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_IdentData' ,
        true
      );


  }//end public function input_pkid */

 /**
  * create the ui element for field mimetype
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_mimetype( $params )
  {

      //tpl: class ui:hidden
      $inputMimetype = $this->view->newInput( 'input'.$this->prefix.'Mimetype', 'Hidden' );
      $this->items['mimetype'] = $inputMimetype;
      $inputMimetype->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[mimetype]',
          'id'        => 'wgt-input-'.$this->keyName.'_mimetype'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Mimetype (Person)', 'core.person.label' ),
          'maxlength' => $this->entity->maxSize( 'mimetype' ),
        )
      );
      $inputMimetype->setWidth( 'medium' );

      $inputMimetype->setReadOnly( $this->isReadOnly( 'mimetype' ) );
      $inputMimetype->setData( $this->entity->getSecure( 'mimetype' ) );
      $inputMimetype->refresh           = $this->refresh;
      $inputMimetype->serializeElement  = $this->sendElement;


  }//end public function input_mimetype */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_rowid( $params )
  {

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'input'.$this->prefix.'Rowid' , 'int' );
      $this->items['rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[rowid]',
          'id'        => 'wgt-input-'.$this->keyName.'_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Rowid (Person)', 'core.person.label' ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadOnly( $this->isReadOnly( 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel
      (
        $this->view->i18n->l( 'Rowid', 'core.person.label' ),
        $this->entity->required( 'rowid' )
      );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_time_created( $params )
  {

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'input'.$this->prefix.'MTimeCreated' , 'Date' );
      $this->items['m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[m_time_created]',
          'id'        => 'wgt-input-'.$this->keyName.'_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Time Created (Person)', 'core.person.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadOnly( true );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel
      (
        $this->view->i18n->l( 'Time Created', 'core.person.label' ),
        $this->entity->required( 'm_time_created' )
      );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_m_time_created */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_role_create( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysRoleUser_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysRoleUser not exists' );

      Log::warn('Looks like the Entity: WbfsysRoleUser is missing');

      return;
    }


      //p: Window
      $objidWbfsysRoleUser = $this->entity->getData('m_role_create') ;

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

      $inputMRoleCreate = $this->view->newInput( 'input'.$this->prefix.'MRoleCreate', 'Window' );
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[m_role_create]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Role Create (Person)', 'core.person.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadOnly( true );
      $inputMRoleCreate->setLabel( $this->view->i18n->l( 'Role Create', 'core.person.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_m_role_create'.($this->suffix?'-'.$this->suffix:'');

      $inputMRoleCreate->setListUrl ( $listUrl );
      $inputMRoleCreate->setListIcon( 'control/connect.png' );
      $inputMRoleCreate->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.edit' );
      $inputMRoleCreate->conEntity         = $entityWbfsysRoleUser;
      $inputMRoleCreate->refresh           = $this->refresh;
      $inputMRoleCreate->serializeElement  = $this->sendElement;
      

        $inputMRoleCreate->setAutocomplete
        (
        '{
          "url":"ajax.php?c=Wbfsys.RoleUser.autocomplete&amp;key=",
          "type":"entity"
          }'
        );
        

      $inputMRoleCreate->view = $this->view;
      $inputMRoleCreate->buildJavascript( 'wgt-input-'.$this->keyName.'_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_m_role_create */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_time_changed( $params )
  {

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'input'.$this->prefix.'MTimeChanged' , 'Date' );
      $this->items['m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[m_time_changed]',
          'id'        => 'wgt-input-'.$this->keyName.'_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Time Changed (Person)', 'core.person.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadOnly( true );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel
      (
        $this->view->i18n->l( 'Time Changed', 'core.person.label' ),
        $this->entity->required( 'm_time_changed' )
      );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_m_time_changed */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_role_change( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysRoleUser_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysRoleUser not exists' );

      Log::warn('Looks like the Entity: WbfsysRoleUser is missing');

      return;
    }


      //p: Window
      $objidWbfsysRoleUser = $this->entity->getData('m_role_change') ;

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

      $inputMRoleChange = $this->view->newInput( 'input'.$this->prefix.'MRoleChange', 'Window' );
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[m_role_change]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Role Change (Person)', 'core.person.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadOnly( true );
      $inputMRoleChange->setLabel( $this->view->i18n->l( 'Role Change', 'core.person.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_m_role_change'.($this->suffix?'-'.$this->suffix:'');

      $inputMRoleChange->setListUrl ( $listUrl );
      $inputMRoleChange->setListIcon( 'control/connect.png' );
      $inputMRoleChange->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.edit' );
      $inputMRoleChange->conEntity         = $entityWbfsysRoleUser;
      $inputMRoleChange->refresh           = $this->refresh;
      $inputMRoleChange->serializeElement  = $this->sendElement;
      

        $inputMRoleChange->setAutocomplete
        (
        '{
          "url":"ajax.php?c=Wbfsys.RoleUser.autocomplete&amp;key=",
          "type":"entity"
          }'
        );
        

      $inputMRoleChange->view = $this->view;
      $inputMRoleChange->buildJavascript( 'wgt-input-'.$this->keyName.'_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_m_role_change */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_version( $params )
  {

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'input'.$this->prefix.'MVersion' , 'int' );
      $this->items['m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[m_version]',
          'id'        => 'wgt-input-'.$this->keyName.'_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Version (Person)', 'core.person.label' ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadOnly( true );
      $inputMVersion->setData( $this->entity->getSecure('m_version') );
      $inputMVersion->setLabel
      (
        $this->view->i18n->l( 'Version', 'core.person.label' ),
        $this->entity->required( 'm_version' )
      );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_m_version */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_m_uuid( $params )
  {

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'input'.$this->prefix.'MUuid' , 'Text' );
      $this->items['m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[m_uuid]',
          'id'        => 'wgt-input-'.$this->keyName.'_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Uuid (Person)', 'core.person.label' ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadOnly( true );
      $inputMUuid->setData( $this->entity->getSecure('m_uuid') );
      $inputMUuid->setLabel
      (
        $this->view->i18n->l( 'Uuid', 'core.person.label' ),
        $this->entity->required( 'm_uuid' )
      );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_m_uuid */

////////////////////////////////////////////////////////////////////////////////
// search field methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create the search element for field firstname
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_firstname( $params )
  {

      //tpl: class ui:text
      $inputFirstname = $this->view->newInput( 'input'.$this->prefix.'Firstname' , 'Text' );
      $this->items['firstname'] = $inputFirstname;
      $inputFirstname->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[firstname]',
          'id'        => 'wgt-input-'.$this->keyName.'_firstname'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Firstname (Person)', 'core.person.label' ),
          'maxlength' => $this->entity->maxSize( 'firstname' ),
        )
      );
      $inputFirstname->setWidth( 'medium' );

      $inputFirstname->setReadOnly( $this->isReadOnly( 'firstname' ) );
      $inputFirstname->setData( $this->entity->getSecure('firstname') );
      $inputFirstname->setLabel
      (
        $this->view->i18n->l( 'Firstname', 'core.person.label' ),
        $this->entity->required( 'firstname' )
      );

      $inputFirstname->refresh           = $this->refresh;
      $inputFirstname->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );


  }//end public function search_firstname */

 /**
  * create the search element for field lastname
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_lastname( $params )
  {

      //tpl: class ui:text
      $inputLastname = $this->view->newInput( 'input'.$this->prefix.'Lastname' , 'Text' );
      $this->items['lastname'] = $inputLastname;
      $inputLastname->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[lastname]',
          'id'        => 'wgt-input-'.$this->keyName.'_lastname'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Lastname (Person)', 'core.person.label' ),
          'maxlength' => $this->entity->maxSize( 'lastname' ),
        )
      );
      $inputLastname->setWidth( 'medium' );

      $inputLastname->setReadOnly( $this->isReadOnly( 'lastname' ) );
      $inputLastname->setData( $this->entity->getSecure('lastname') );
      $inputLastname->setLabel
      (
        $this->view->i18n->l( 'Lastname', 'core.person.label' ),
        $this->entity->required( 'lastname' )
      );

      $inputLastname->refresh           = $this->refresh;
      $inputLastname->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );


  }//end public function search_lastname */

 /**
  * create the search element for field tax_number
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_tax_number( $params )
  {

      //tpl: class ui:text
      $inputTaxNumber = $this->view->newInput( 'input'.$this->prefix.'TaxNumber' , 'Text' );
      $this->items['tax_number'] = $inputTaxNumber;
      $inputTaxNumber->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[tax_number]',
          'id'        => 'wgt-input-'.$this->keyName.'_tax_number'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Tax Number (Person)', 'core.person.label' ),
          'maxlength' => $this->entity->maxSize( 'tax_number' ),
        )
      );
      $inputTaxNumber->setWidth( 'medium' );

      $inputTaxNumber->setReadOnly( $this->isReadOnly( 'tax_number' ) );
      $inputTaxNumber->setData( $this->entity->getSecure('tax_number') );
      $inputTaxNumber->setLabel
      (
        $this->view->i18n->l( 'Tax Number', 'core.person.label' ),
        $this->entity->required( 'tax_number' )
      );

      $inputTaxNumber->refresh           = $this->refresh;
      $inputTaxNumber->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_IdentData' ,
        true
      );


  }//end public function search_tax_number */

 /**
  * create the search element for field pkid
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_pkid( $params )
  {

      //tpl: class ui:text
      $inputPkid = $this->view->newInput( 'input'.$this->prefix.'Pkid' , 'Text' );
      $this->items['pkid'] = $inputPkid;
      $inputPkid->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[pkid]',
          'id'        => 'wgt-input-'.$this->keyName.'_pkid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Personal Ident (Person)', 'core.person.label' ),
          'maxlength' => $this->entity->maxSize( 'pkid' ),
        )
      );
      $inputPkid->setWidth( 'medium' );

      $inputPkid->setReadOnly( $this->isReadOnly( 'pkid' ) );
      $inputPkid->setData( $this->entity->getSecure('pkid') );
      $inputPkid->setLabel
      (
        $this->view->i18n->l( 'Personal Ident', 'core.person.label' ),
        $this->entity->required( 'pkid' )
      );

      $inputPkid->refresh           = $this->refresh;
      $inputPkid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_IdentData' ,
        true
      );


  }//end public function search_pkid */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_role_create( $params )
  {
    //tpl: special

    if( !Webfrap::classLoadable('WbfsysRoleUser_Entity') )
    {
      if(DEBUG)
        Debug::console('Class WbfsysRoleUser_Entity not exists');

      Log::warn('Looks like the Entity: WbfsysRoleUser_Entity is missing');

      return;
    }

    $entityWbfsysRoleUser = $this->db->orm->newEntity('WbfsysRoleUser');

    $inputRole = $this->view->newInput( 'input'.$this->prefix.'MRoleCreate', 'Window' );
    $inputRole->addAttributes
    (
      array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[m_role_create]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_role_create'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search medium wgt-no-save '.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('Creator','wbf.label'),
      )
    );
    $inputRole->setWidth('medium');
    $inputRole->setReadOnly( $this->readOnly );
    $inputRole->setLabel
    (
      $this->view->i18n->l('Creator','wbf.label')
    );

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=core_person_m_role_create';

    $inputRole->setListUrl( $listUrl );
    $inputRole->setListIcon( 'control/connect.png' );
    $inputRole->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.show' );
    $inputRole->conEntity         = $entityWbfsysRoleUser;
    $inputRole->refresh           = $this->refresh;
    $inputRole->serializeElement  = $this->sendElement;

    $inputRole->view = $this->view;
    $inputRole->buildJavascript( 'wgt-input-'.$this->keyName.'_m_role_create' );
    $this->view->addJsCode( $inputRole );

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_role_create */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_role_change( $params )
  {
    //tpl: special

    if( !Webfrap::classLoadable( 'WbfsysRoleUser_Entity' ) )
    {
      if(DEBUG)
        Debug::console('Class WbfsysRoleUser_Entity not exists');

      Log::warn('Looks like the Entity: WbfsysRoleUser_Entity is missing');

      return;
    }

    $entityWbfsysRoleUser = $this->db->orm->newEntity('WbfsysRoleUser');

    $inputRole = $this->view->newInput( 'input'.$this->prefix.'MRoleChange', 'Window' );
    $inputRole->addAttributes
    (
      array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[m_role_change]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_role_change'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search medium wgt-no-save '.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('Last Editor','wbf.label'),
      )
    );
    $inputRole->setWidth('medium');
    $inputRole->setReadOnly( $this->readOnly );
    $inputRole->setLabel
    (
      $this->view->i18n->l('Last Editor','wbf.label')
    );

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=core_person_m_role_change';

    $inputRole->setListUrl( $listUrl );
    $inputRole->setListIcon( 'control/connect.png' );
    $inputRole->setEntityUrl( 'maintab.php?c=Wbfsys.RoleUser.show' );
    $inputRole->conEntity         = $entityWbfsysRoleUser;
    $inputRole->refresh           = $this->refresh;
    $inputRole->serializeElement  = $this->sendElement;

    $inputRole->view = $this->view;
    $inputRole->buildJavascript( 'wgt-input-'.$this->keyName.'_m_role_change' );
    $this->view->addJsCode( $inputRole );

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_role_change */


 /**
  *
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_time_created_before( $params )
  {

    //tpl: special
    $inputDate = $this->view->newInput( 'input'.$this->prefix.'MTimeCreatedBefore' , 'Date' );
    $inputDate->addAttributes
    (
      array
      (
        'name'      => $this->keyName.'[m_time_created_before]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_time_created_before'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search small wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('Changed Before','wbf.label'),
      )
    );
    $inputDate->setWidth('small');

    $inputDate->setReadOnly( $this->readOnly );
    $inputDate->setLabel
    (
      $this->view->i18n->l('Created Before','wbf.label')
    );
    $inputDate->refresh           = $this->refresh;
    $inputDate->serializeElement  = $this->sendElement;

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_time_created_before */

 /**
  *
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_time_created_after( $params )
  {

    //tpl: special
    $inputDate = $this->view->newInput( 'input'.$this->prefix.'MTimeCreatedAfter' , 'Date' );
    $inputDate->addAttributes
    (
      array
      (
        'name'      => $this->keyName.'[m_time_created_after]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_time_created_after'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search small wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('Created After','wbf.label'),
      )
    );
    $inputDate->setWidth('small');

    $inputDate->setReadOnly( $this->readOnly );
    $inputDate->setLabel
    (
      $this->view->i18n->l('Created After','wbf.label')
    );
    $inputDate->refresh           = $this->refresh;
    $inputDate->serializeElement  = $this->sendElement;

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_time_created_after */

 /**
  *
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_time_changed_before( $params )
  {

    //tpl: special
    $inputDate = $this->view->newInput( 'input'.$this->prefix.'MTimeChangedBefore' , 'Date' );
    $inputDate->addAttributes
    (
      array
      (
        'name'      => $this->keyName.'[m_time_changed_before]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_time_changed_before'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search small wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('Changed Before','wbf.label'),
      )
    );
    $inputDate->setWidth('small');

    $inputDate->setReadOnly( $this->readOnly );
    $inputDate->setLabel
    (
      $this->view->i18n->l('Changed Before','wbf.label')
    );
    $inputDate->refresh           = $this->refresh;
    $inputDate->serializeElement  = $this->sendElement;

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_time_changed_before */

 /**
  *
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_time_changed_after( $params )
  {

    //tpl: special
    $inputDate = $this->view->newInput( 'input'.$this->prefix.'MTimeChangedAfter' , 'Date' );
    $inputDate->addAttributes
    (
      array
      (
        'name'      => $this->keyName.'[m_time_changed_after]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_time_changed_after'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search small wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('Changed After','wbf.label'),
      )
    );
    $inputDate->setWidth('small');

    $inputDate->setReadOnly( $this->readOnly );
    $inputDate->setLabel
    (
      $this->view->i18n->l('Changed After','wbf.label')
    );
    $inputDate->refresh           = $this->refresh;
    $inputDate->serializeElement  = $this->sendElement;

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_time_changed_after */


 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_rowid( $params )
  {

    //tpl: special
    $inputRowid = $this->view->newInput( 'input'.$this->prefix.'MRowid' , 'Int' );
    $inputRowid->addAttributes
    (
      array
      (
        'name'      => $this->keyName.'[rowid]',
        'id'        => 'wgt-input-'.$this->keyName.'_rowid'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'valid_required medium wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('IDI','wbf.label'),
      )
    );
    $inputRowid->setWidth('medium');

    $inputRowid->setReadOnly( $this->readOnly );
    $inputRowid->setLabel
    (
      $this->view->i18n->l('IDI','wbf.label')
    );
    $inputRowid->refresh           = $this->refresh;
    $inputRowid->serializeElement  = $this->sendElement;

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );

  }//end public function search_m_rowid */

 /**
  * create the search element for field name
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_m_uuid( $params )
  {

    //tpl: special
    $input = $this->view->newInput( 'input'.$this->prefix.'MUuid' , 'Text' );
    $input->addAttributes
    (
      array
      (
        'name'      => $this->keyName.'[m_uuid]',
        'id'        => 'wgt-input-'.$this->keyName.'_m_uuid'.($this->suffix?'-'.$this->suffix:''),
        'class'     => 'wcm wcm_req_search medium wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l('UUID','wbf.label'),
      )
    );
    $input->setWidth('medium');

    $input->setReadOnly( $this->readOnly );
    $input->setLabel
    (
      $this->view->i18n->l('UUID','wbf.label')
    );
    $input->refresh           = $this->refresh;
    $input->serializeElement  = $this->sendElement;

    // activate the category
    $this->view->addVar
    (
      'showCat'.$this->namespace.'_Search_Meta' ,
      true
    );


  }//end public function search_m_uuid */




}//end class CorePerson_Form */


