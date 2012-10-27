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
class WbfsysMessageAddressee_Crud_Create_Form
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
  public $namespace  = 'WbfsysMessageAddressee';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysMessageAddressee';

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
      'wbfsys_message_addressee' => array
      (
        'id_message' => array
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
        'id_area' => array
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
   * @var WbfsysMessageAddressee_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysMessageAddressee_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysMessageAddressee_Entity $entity
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
      'wbfsys_message_addressee' => array
      (
        'id_message',
        'id_type',
        'id_area',
        'vid',
        'id_vid_entity',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysMessageAddressee entity
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
    $this->view->addVar( 'entityWbfsysMessageAddressee', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_message_addressee'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_message_addressee[id_wbfsys_message_addressee-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysMessageAddressee_IdMessage( $params );
    $this->input_WbfsysMessageAddressee_IdType( $params );
    $this->input_WbfsysMessageAddressee_IdArea( $params );
    $this->input_WbfsysMessageAddressee_Vid( $params );
    $this->input_WbfsysMessageAddressee_IdVidEntity( $params );
    $this->input_WbfsysMessageAddressee_Rowid( $params );
    $this->input_WbfsysMessageAddressee_MTimeCreated( $params );
    $this->input_WbfsysMessageAddressee_MRoleCreate( $params );
    $this->input_WbfsysMessageAddressee_MTimeChanged( $params );
    $this->input_WbfsysMessageAddressee_MRoleChange( $params );
    $this->input_WbfsysMessageAddressee_MVersion( $params );
    $this->input_WbfsysMessageAddressee_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field id_message
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageAddressee_IdMessage( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysMessage_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysMessage not exists' );

      Log::warn( 'Looks like the Entity: WbfsysMessage is missing' );

      return;
    }


      //p: Window
      $objidWbfsysMessage = $this->entity->getData( 'id_message' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysMessage
          || !$entityWbfsysMessage = $this->db->orm->get
          (
            'WbfsysMessage',
            $objidWbfsysMessage
          )
      )
      {
        $entityWbfsysMessage = $this->db->orm->newEntity( 'WbfsysMessage' );
      }

      $inputIdMessage = $this->view->newInput( 'inputWbfsysMessageAddresseeIdMessage', 'Window' );
      $this->items['wbfsys_message_addressee-id_message'] = $inputIdMessage;
      $inputIdMessage->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message_addressee[id_message]',
        'id'        => 'wgt-input-wbfsys_message_addressee_id_message'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Message', 'src' => 'Message Addressee' ) ),
      ));

      if( $this->assignedForm )
        $inputIdMessage->assignedForm = $this->assignedForm;

      $inputIdMessage->setWidth( 'medium' );

      $inputIdMessage->setData( $this->entity->getData( 'id_message' )  );
      $inputIdMessage->setReadonly( $this->fieldReadOnly( 'wbfsys_message_addressee', 'id_message' ) );
      $inputIdMessage->setRequired( $this->fieldRequired( 'wbfsys_message_addressee', 'id_message' ) );
      $inputIdMessage->setLabel( $i18n->l( 'Message', 'wbfsys.message_addressee.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Message.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_addressee_id_message'.($this->suffix?'-'.$this->suffix:'');

      $inputIdMessage->setListUrl ( $listUrl );
      $inputIdMessage->setListIcon( 'control/connect.png' );
      $inputIdMessage->setEntityUrl( 'maintab.php?c=Wbfsys.Message.edit' );
      $inputIdMessage->conEntity         = $entityWbfsysMessage;
      $inputIdMessage->refresh           = $this->refresh;
      $inputIdMessage->serializeElement  = $this->sendElement;



      $inputIdMessage->view = $this->view;
      $inputIdMessage->buildJavascript( 'wgt-input-wbfsys_message_addressee_id_message'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdMessage );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMessageAddressee_IdMessage */

 /**
  * create the ui element for field id_type
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageAddressee_IdType( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_message_addressee_id_type'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysMessageAddresseeType_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysMessageAddresseeType_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysMessageAddresseeType_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdType = $this->view->newItem( 'inputWbfsysMessageAddresseeIdType', 'WbfsysMessageAddresseeType_Selectbox' );
      $this->items['wbfsys_message_addressee-id_type'] = $inputIdType;
      $inputIdType->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_addressee[id_type]',
          'id'        => 'wgt-input-wbfsys_message_addressee_id_type'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Type', 'src' => 'Message Addressee' ) ),
        )
      );
      $inputIdType->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdType->assignedForm = $this->assignedForm;

      $inputIdType->setActive( $this->entity->getData( 'id_type' ) );
      $inputIdType->setReadonly( $this->fieldReadOnly( 'wbfsys_message_addressee', 'id_type' ) );
      $inputIdType->setRequired( $this->fieldRequired( 'wbfsys_message_addressee', 'id_type' ) );


      $inputIdType->setLabel( $i18n->l( 'Type', 'wbfsys.message_addressee.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_message_addressee_type:insert' ) )
      {
        $inputIdType->refresh           = $this->refresh;
        $inputIdType->serializeElement  = $this->sendElement;
        $inputIdType->editUrl = 'index.php?c=Wbfsys.MessageAddresseeType.listing&amp;target='.$this->namespace.'&amp;field=id_type&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_message_addressee_id_type'.$this->suffix;
      }
      // set an empty first entry
      $inputIdType->setFirstFree( 'No Type selected' );

      
      $queryIdType = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_message_addressee_id_type'] ) )
      {
      
        $queryIdType = $this->db->newQuery( 'WbfsysMessageAddresseeType_Selectbox' );

        $queryIdType->fetchSelectbox();
        $inputIdType->setData( $queryIdType->getAll() );
      
      }
      else
      {
        $inputIdType->setData( $this->listElementData['wbfsys_message_addressee_id_type'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdType )
        $queryIdType = $this->db->newQuery( 'WbfsysMessageAddresseeType_Selectbox' );
      
      $inputIdType->loadActive = function( $activeId ) use ( $queryIdType ){
 
        return $queryIdType->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMessageAddressee_IdType */

 /**
  * create the ui element for field id_area
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageAddressee_IdArea( $params )
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

      $inputIdArea = $this->view->newInput( 'inputWbfsysMessageAddresseeIdArea', 'Window' );
      $this->items['wbfsys_message_addressee-id_area'] = $inputIdArea;
      $inputIdArea->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message_addressee[id_area]',
        'id'        => 'wgt-input-wbfsys_message_addressee_id_area'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Area', 'src' => 'Message Addressee' ) ),
      ));

      if( $this->assignedForm )
        $inputIdArea->assignedForm = $this->assignedForm;

      $inputIdArea->setWidth( 'medium' );

      $inputIdArea->setData( $this->entity->getData( 'id_area' )  );
      $inputIdArea->setReadonly( $this->fieldReadOnly( 'wbfsys_message_addressee', 'id_area' ) );
      $inputIdArea->setRequired( $this->fieldRequired( 'wbfsys_message_addressee', 'id_area' ) );
      $inputIdArea->setLabel( $i18n->l( 'Area', 'wbfsys.message_addressee.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.SecurityArea.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_addressee_id_area'.($this->suffix?'-'.$this->suffix:'');

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
      $inputIdArea->buildJavascript( 'wgt-input-wbfsys_message_addressee_id_area'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdArea );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysMessageAddressee_IdArea */

 /**
  * create the ui element for field vid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageAddressee_Vid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputVid = $this->view->newInput( 'inputWbfsysMessageAddresseeVid', 'Hidden' );
      $this->items['wbfsys_message_addressee-vid'] = $inputVid;
      $inputVid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_addressee[vid]',
          'id'        => 'wgt-input-wbfsys_message_addressee_vid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'VID', 'src' => 'Message Addressee' ) ),
          'maxlength' => $this->entity->maxSize( 'vid' ),
        )
      );
      $inputVid->setWidth( 'medium' );

      $inputVid->setData( $this->entity->getSecure( 'vid' ) );
      $inputVid->refresh           = $this->refresh;
      $inputVid->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysMessageAddressee_Vid */

 /**
  * create the ui element for field id_vid_entity
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageAddressee_IdVidEntity( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputIdVidEntity = $this->view->newInput( 'inputWbfsysMessageAddresseeIdVidEntity', 'Hidden' );
      $this->items['wbfsys_message_addressee-id_vid_entity'] = $inputIdVidEntity;
      $inputIdVidEntity->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_addressee[id_vid_entity]',
          'id'        => 'wgt-input-wbfsys_message_addressee_id_vid_entity'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Entity', 'src' => 'Message Addressee' ) ),
          'maxlength' => $this->entity->maxSize( 'id_vid_entity' ),
        )
      );
      $inputIdVidEntity->setWidth( 'medium' );

      $inputIdVidEntity->setData( $this->entity->getSecure( 'id_vid_entity' ) );
      $inputIdVidEntity->refresh           = $this->refresh;
      $inputIdVidEntity->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysMessageAddressee_IdVidEntity */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageAddressee_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysMessageAddresseeRowid' , 'int' );
      $this->items['wbfsys_message_addressee-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_addressee[rowid]',
          'id'        => 'wgt-input-wbfsys_message_addressee_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Message Addressee' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_message_addressee', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_message_addressee', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.message_addressee.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMessageAddressee_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageAddressee_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysMessageAddresseeMTimeCreated' , 'Date' );
      $this->items['wbfsys_message_addressee-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_addressee[m_time_created]',
          'id'        => 'wgt-input-wbfsys_message_addressee_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Message Addressee' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_message_addressee', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_message_addressee', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.message_addressee.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysMessageAddressee_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageAddressee_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysMessageAddresseeMRoleCreate', 'Window' );
      $this->items['wbfsys_message_addressee-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message_addressee[m_role_create]',
        'id'        => 'wgt-input-wbfsys_message_addressee_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Message Addressee' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_message_addressee', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_message_addressee', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.message_addressee.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_addressee_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_message_addressee_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysMessageAddressee_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageAddressee_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysMessageAddresseeMTimeChanged' , 'Date' );
      $this->items['wbfsys_message_addressee-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_addressee[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_message_addressee_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Message Addressee' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_message_addressee', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_message_addressee', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.message_addressee.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysMessageAddressee_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageAddressee_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysMessageAddresseeMRoleChange', 'Window' );
      $this->items['wbfsys_message_addressee-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_message_addressee[m_role_change]',
        'id'        => 'wgt-input-wbfsys_message_addressee_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Message Addressee' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_message_addressee', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_message_addressee', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.message_addressee.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_message_addressee_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_message_addressee_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysMessageAddressee_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageAddressee_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysMessageAddresseeMVersion' , 'int' );
      $this->items['wbfsys_message_addressee-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_addressee[m_version]',
          'id'        => 'wgt-input-wbfsys_message_addressee_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Message Addressee' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_message_addressee', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_message_addressee', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.message_addressee.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMessageAddressee_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysMessageAddressee_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysMessageAddresseeMUuid' , 'Text' );
      $this->items['wbfsys_message_addressee-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_message_addressee[m_uuid]',
          'id'        => 'wgt-input-wbfsys_message_addressee_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Message Addressee' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_message_addressee', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_message_addressee', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.message_addressee.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysMessageAddressee_MUuid */

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
      $orm->getValidationData( 'WbfsysMessageAddressee', array_keys( $this->fields['wbfsys_message_addressee']), true ),
      $orm->getErrorMessages( 'WbfsysMessageAddressee' ),
      'wbfsys_message_addressee'
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


}//end class WbfsysMessageAddressee_Crud_Create_Form */


