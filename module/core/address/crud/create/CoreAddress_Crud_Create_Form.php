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
class CoreAddress_Crud_Create_Form
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
  public $namespace  = 'CoreAddress';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'CoreAddress';

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
      'core_address' => array
      (
        'street' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '200',
        ),
        'postalcode' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '10',
        ),
        'city' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'postbox' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'id_country' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_location' => array
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
   * @var CoreAddress_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return CoreAddress_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param CoreAddress_Entity $entity
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
      'core_address' => array
      (
        'street',
        'postalcode',
        'city',
        'postbox',
        'id_country',
        'id_location',
        'vid',
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
  * create an IO form for the CoreAddress entity
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
    $this->view->addVar( 'entityCoreAddress', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-core_address'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'core_address[id_core_address-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_CoreAddress_Street( $params );
    $this->input_CoreAddress_Postalcode( $params );
    $this->input_CoreAddress_City( $params );
    $this->input_CoreAddress_Postbox( $params );
    $this->input_CoreAddress_IdCountry( $params );
    $this->input_CoreAddress_IdLocation( $params );
    $this->input_CoreAddress_Vid( $params );
    $this->input_CoreAddress_Description( $params );
    $this->input_CoreAddress_IdVidEntity( $params );
    $this->input_CoreAddress_Rowid( $params );
    $this->input_CoreAddress_MTimeCreated( $params );
    $this->input_CoreAddress_MRoleCreate( $params );
    $this->input_CoreAddress_MTimeChanged( $params );
    $this->input_CoreAddress_MRoleChange( $params );
    $this->input_CoreAddress_MVersion( $params );
    $this->input_CoreAddress_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field street
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreAddress_Street( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputStreet = $this->view->newInput( 'inputCoreAddressStreet' , 'Text' );
      $this->items['core_address-street'] = $inputStreet;
      $inputStreet->addAttributes
      (
        array
        (
          'name'      => 'core_address[street]',
          'id'        => 'wgt-input-core_address_street'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Street', 'src' => 'Address' ) ),
          'maxlength' => $this->entity->maxSize( 'street' ),
        )
      );
      $inputStreet->setWidth( 'medium' );

      $inputStreet->setReadonly( $this->fieldReadOnly( 'core_address', 'street' ) );
      $inputStreet->setRequired( $this->fieldRequired( 'core_address', 'street' ) );
      $inputStreet->setData( $this->entity->getSecure('street') );
      $inputStreet->setLabel( $i18n->l( 'Street', 'core.address.label' ) );

      $inputStreet->refresh           = $this->refresh;
      $inputStreet->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Address' ,
        true
      );


  }//end public function input_CoreAddress_Street */

 /**
  * create the ui element for field postalcode
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreAddress_Postalcode( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputPostalcode = $this->view->newInput( 'inputCoreAddressPostalcode' , 'Text' );
      $this->items['core_address-postalcode'] = $inputPostalcode;
      $inputPostalcode->addAttributes
      (
        array
        (
          'name'      => 'core_address[postalcode]',
          'id'        => 'wgt-input-core_address_postalcode'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Postalcode', 'src' => 'Address' ) ),
          'maxlength' => $this->entity->maxSize( 'postalcode' ),
        )
      );
      $inputPostalcode->setWidth( 'medium' );

      $inputPostalcode->setReadonly( $this->fieldReadOnly( 'core_address', 'postalcode' ) );
      $inputPostalcode->setRequired( $this->fieldRequired( 'core_address', 'postalcode' ) );
      $inputPostalcode->setData( $this->entity->getSecure('postalcode') );
      $inputPostalcode->setLabel( $i18n->l( 'Postalcode', 'core.address.label' ) );

      $inputPostalcode->refresh           = $this->refresh;
      $inputPostalcode->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Address' ,
        true
      );


  }//end public function input_CoreAddress_Postalcode */

 /**
  * create the ui element for field city
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreAddress_City( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputCity = $this->view->newInput( 'inputCoreAddressCity' , 'Text' );
      $this->items['core_address-city'] = $inputCity;
      $inputCity->addAttributes
      (
        array
        (
          'name'      => 'core_address[city]',
          'id'        => 'wgt-input-core_address_city'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'City', 'src' => 'Address' ) ),
          'maxlength' => $this->entity->maxSize( 'city' ),
        )
      );
      $inputCity->setWidth( 'medium' );

      $inputCity->setReadonly( $this->fieldReadOnly( 'core_address', 'city' ) );
      $inputCity->setRequired( $this->fieldRequired( 'core_address', 'city' ) );
      $inputCity->setData( $this->entity->getSecure('city') );
      $inputCity->setLabel( $i18n->l( 'City', 'core.address.label' ) );

      $inputCity->refresh           = $this->refresh;
      $inputCity->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Address' ,
        true
      );


  }//end public function input_CoreAddress_City */

 /**
  * create the ui element for field postbox
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreAddress_Postbox( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputPostbox = $this->view->newInput( 'inputCoreAddressPostbox' , 'Text' );
      $this->items['core_address-postbox'] = $inputPostbox;
      $inputPostbox->addAttributes
      (
        array
        (
          'name'      => 'core_address[postbox]',
          'id'        => 'wgt-input-core_address_postbox'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Postbox', 'src' => 'Address' ) ),
          'maxlength' => $this->entity->maxSize( 'postbox' ),
        )
      );
      $inputPostbox->setWidth( 'medium' );

      $inputPostbox->setReadonly( $this->fieldReadOnly( 'core_address', 'postbox' ) );
      $inputPostbox->setRequired( $this->fieldRequired( 'core_address', 'postbox' ) );
      $inputPostbox->setData( $this->entity->getSecure('postbox') );
      $inputPostbox->setLabel( $i18n->l( 'Postbox', 'core.address.label' ) );

      $inputPostbox->refresh           = $this->refresh;
      $inputPostbox->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Address' ,
        true
      );


  }//end public function input_CoreAddress_Postbox */

 /**
  * create the ui element for field id_country
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreAddress_IdCountry( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['core_address_id_country'] ) )
    {
      if( !Webfrap::classLoadable( 'CoreCountry_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'CoreCountry_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: CoreCountry_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdCountry = $this->view->newItem( 'inputCoreAddressIdCountry', 'CoreCountry_Selectbox' );
      $this->items['core_address-id_country'] = $inputIdCountry;
      $inputIdCountry->addAttributes
      (
        array
        (
          'name'      => 'core_address[id_country]',
          'id'        => 'wgt-input-core_address_id_country'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Country', 'src' => 'Address' ) ),
        )
      );
      $inputIdCountry->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdCountry->assignedForm = $this->assignedForm;

      $inputIdCountry->setActive( $this->entity->getData( 'id_country' ) );
      $inputIdCountry->setReadonly( $this->fieldReadOnly( 'core_address', 'id_country' ) );
      $inputIdCountry->setRequired( $this->fieldRequired( 'core_address', 'id_country' ) );


      $inputIdCountry->setLabel( $i18n->l( 'Country', 'core.address.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-core>mod-core-cat-core_data:insert' ) )
      {
        $inputIdCountry->refresh           = $this->refresh;
        $inputIdCountry->serializeElement  = $this->sendElement;
        $inputIdCountry->editUrl = 'index.php?c=Core.Country.listing&amp;target='.$this->namespace.'&amp;field=id_country&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-core_address_id_country'.$this->suffix;
      }
      // set an empty first entry
      $inputIdCountry->setFirstFree( 'No Country selected' );

      
      $queryIdCountry = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['core_address_id_country'] ) )
      {
      
        $queryIdCountry = $this->db->newQuery( 'CoreCountry_Selectbox' );

        $queryIdCountry->fetchSelectbox();
        $inputIdCountry->setData( $queryIdCountry->getAll() );
      
      }
      else
      {
        $inputIdCountry->setData( $this->listElementData['core_address_id_country'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdCountry )
        $queryIdCountry = $this->db->newQuery( 'CoreCountry_Selectbox' );
      
      $inputIdCountry->loadActive = function( $activeId ) use ( $queryIdCountry ){
 
        return $queryIdCountry->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Address' ,
        true
      );

  }//end public function input_CoreAddress_IdCountry */

 /**
  * create the ui element for field id_location
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreAddress_IdLocation( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'CoreLocation_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity CoreLocation not exists' );

      Log::warn( 'Looks like the Entity: CoreLocation is missing' );

      return;
    }


      //p: Window
      $objidCoreLocation = $this->entity->getData( 'id_location' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidCoreLocation
          || !$entityCoreLocation = $this->db->orm->get
          (
            'CoreLocation',
            $objidCoreLocation
          )
      )
      {
        $entityCoreLocation = $this->db->orm->newEntity( 'CoreLocation' );
      }

      $inputIdLocation = $this->view->newInput( 'inputCoreAddressIdLocation', 'Window' );
      $this->items['core_address-id_location'] = $inputIdLocation;
      $inputIdLocation->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'core_address[id_location]',
        'id'        => 'wgt-input-core_address_id_location'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Location', 'src' => 'Address' ) ),
      ));

      if( $this->assignedForm )
        $inputIdLocation->assignedForm = $this->assignedForm;

      $inputIdLocation->setWidth( 'medium' );

      $inputIdLocation->setData( $this->entity->getData( 'id_location' )  );
      $inputIdLocation->setReadonly( $this->fieldReadOnly( 'core_address', 'id_location' ) );
      $inputIdLocation->setRequired( $this->fieldRequired( 'core_address', 'id_location' ) );
      $inputIdLocation->setLabel( $i18n->l( 'Location', 'core.address.label' ) );


      $listUrl = 'modal.php?c=Core.Location.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=core_address_id_location'.($this->suffix?'-'.$this->suffix:'');

      $inputIdLocation->setListUrl ( $listUrl );
      $inputIdLocation->setListIcon( 'control/connect.png' );
      $inputIdLocation->setEntityUrl( 'maintab.php?c=Core.Location.edit' );
      $inputIdLocation->conEntity         = $entityCoreLocation;
      $inputIdLocation->refresh           = $this->refresh;
      $inputIdLocation->serializeElement  = $this->sendElement;



      $inputIdLocation->view = $this->view;
      $inputIdLocation->buildJavascript( 'wgt-input-core_address_id_location'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdLocation );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Address' ,
        true
      );

  }//end public function input_CoreAddress_IdLocation */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreAddress_Vid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputVid = $this->view->newInput( 'inputCoreAddressVid', 'Hidden' );
      $this->items['core_address-vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => 'core_address[vid]',
          'id'        => 'wgt-input-core_address_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'VID', 'src' => 'Address' ) ),
          'maxlength' => $this->entity->maxSize( 'vid' ),
        )
      );
      $inputVid->setWidth( 'medium' );

      $inputVid->setData( $this->entity->getSecure( 'vid' ) );
      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;


  }//end public function input_CoreAddress_Vid */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreAddress_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputCoreAddressDescription', 'Textarea' );
      $this->items['core_address-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'core_address[description]',
          'id'    => 'wgt-input-core_address_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Address' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'core_address', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'core_address', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'core.address.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Address' ,
        true
      );


  }//end public function input_CoreAddress_Description */

 /**
  * create the ui element for field id_vid_entity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreAddress_IdVidEntity( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdVidEntity = $this->view->newInput( 'inputCoreAddressIdVidEntity', 'Hidden' );
      $this->items['core_address-id_vid_entity'] = $inputIdVidEntity;
      $inputIdVidEntity->addAttributes
      (
        array
        (
          'name'      => 'core_address[id_vid_entity]',
          'id'        => 'wgt-input-core_address_id_vid_entity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Entity', 'src' => 'Address' ) ),
          'maxlength' => $this->entity->maxSize( 'id_vid_entity' ),
        )
      );
      $inputIdVidEntity->setWidth( 'medium' );

      $inputIdVidEntity->setData( $this->entity->getSecure( 'id_vid_entity' ) );
      $inputIdVidEntity->refresh           = $this->refresh;
      $inputIdVidEntity->serializeElement  = $this->sendElement;


  }//end public function input_CoreAddress_IdVidEntity */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreAddress_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputCoreAddressRowid' , 'int' );
      $this->items['core_address-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'core_address[rowid]',
          'id'        => 'wgt-input-core_address_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Address' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'core_address', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'core_address', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'core.address.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_CoreAddress_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreAddress_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputCoreAddressMTimeCreated' , 'Date' );
      $this->items['core_address-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'core_address[m_time_created]',
          'id'        => 'wgt-input-core_address_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Address' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'core_address', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'core_address', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'core.address.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_CoreAddress_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreAddress_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputCoreAddressMRoleCreate', 'Window' );
      $this->items['core_address-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'core_address[m_role_create]',
        'id'        => 'wgt-input-core_address_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Address' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'core_address', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'core_address', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'core.address.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=core_address_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-core_address_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_CoreAddress_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreAddress_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputCoreAddressMTimeChanged' , 'Date' );
      $this->items['core_address-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'core_address[m_time_changed]',
          'id'        => 'wgt-input-core_address_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Address' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'core_address', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'core_address', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'core.address.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_CoreAddress_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreAddress_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputCoreAddressMRoleChange', 'Window' );
      $this->items['core_address-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'core_address[m_role_change]',
        'id'        => 'wgt-input-core_address_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Address' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'core_address', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'core_address', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'core.address.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=core_address_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-core_address_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_CoreAddress_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreAddress_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputCoreAddressMVersion' , 'int' );
      $this->items['core_address-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'core_address[m_version]',
          'id'        => 'wgt-input-core_address_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Address' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'core_address', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'core_address', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'core.address.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_CoreAddress_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_CoreAddress_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputCoreAddressMUuid' , 'Text' );
      $this->items['core_address-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'core_address[m_uuid]',
          'id'        => 'wgt-input-core_address_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Address' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'core_address', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'core_address', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'core.address.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_CoreAddress_MUuid */

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
      $orm->getValidationData( 'CoreAddress', array_keys( $this->fields['core_address']), true ),
      $orm->getErrorMessages( 'CoreAddress' ),
      'core_address'
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


}//end class CoreAddress_Crud_Create_Form */


