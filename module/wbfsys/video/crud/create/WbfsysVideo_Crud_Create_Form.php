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
class WbfsysVideo_Crud_Create_Form
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
  public $namespace  = 'WbfsysVideo';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysVideo';

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
      'wbfsys_video' => array
      (
        'title' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '400',
        ),
        'access_key' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '120',
        ),
        'id_mediathek' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_licence' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_confidentiality' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_video_codec' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_audio_codec' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'width' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'height' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'length' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'flag_color' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'flag_sound' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_lang' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'file' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '250',
        ),
        'description' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'mimetype' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '20',
        ),
        'file_size' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'file_hash' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '32',
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
   * @var WbfsysVideo_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysVideo_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysVideo_Entity $entity
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
      'wbfsys_video' => array
      (
        'title',
        'access_key',
        'id_mediathek',
        'id_licence',
        'id_confidentiality',
        'id_video_codec',
        'id_audio_codec',
        'width',
        'height',
        'length',
        'flag_color',
        'flag_sound',
        'id_lang',
        'file',
        'description',
        'mimetype',
        'file_size',
        'file_hash',
        'm_version',
      ),

    );

  }//end public function getSaveFields */

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysVideo entity
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
    $this->view->addVar( 'entityWbfsysVideo', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_video'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_video[id_wbfsys_video-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysVideo_Title( $params );
    $this->input_WbfsysVideo_AccessKey( $params );
    $this->input_WbfsysVideo_IdMediathek( $params );
    $this->input_WbfsysVideo_IdLicence( $params );
    $this->input_WbfsysVideo_IdConfidentiality( $params );
    $this->input_WbfsysVideo_IdVideoCodec( $params );
    $this->input_WbfsysVideo_IdAudioCodec( $params );
    $this->input_WbfsysVideo_Width( $params );
    $this->input_WbfsysVideo_Height( $params );
    $this->input_WbfsysVideo_Length( $params );
    $this->input_WbfsysVideo_FlagColor( $params );
    $this->input_WbfsysVideo_FlagSound( $params );
    $this->input_WbfsysVideo_IdLang( $params );
    $this->input_WbfsysVideo_File( $params );
    $this->input_WbfsysVideo_Description( $params );
    $this->input_WbfsysVideo_Mimetype( $params );
    $this->input_WbfsysVideo_FileSize( $params );
    $this->input_WbfsysVideo_FileHash( $params );
    $this->input_WbfsysVideo_Rowid( $params );
    $this->input_WbfsysVideo_MTimeCreated( $params );
    $this->input_WbfsysVideo_MRoleCreate( $params );
    $this->input_WbfsysVideo_MTimeChanged( $params );
    $this->input_WbfsysVideo_MRoleChange( $params );
    $this->input_WbfsysVideo_MVersion( $params );
    $this->input_WbfsysVideo_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field title
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_Title( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputTitle = $this->view->newInput( 'inputWbfsysVideoTitle' , 'Text' );
      $this->items['wbfsys_video-title'] = $inputTitle;
      $inputTitle->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[title]',
          'id'        => 'wgt-input-wbfsys_video_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip xxlarge'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Title', 'src' => 'Video' ) ),
          'maxlength' => $this->entity->maxSize( 'title' ),
        )
      );
      $inputTitle->setWidth( 'xxlarge' );

      $inputTitle->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'title' ) );
      $inputTitle->setRequired( $this->fieldRequired( 'wbfsys_video', 'title' ) );
      $inputTitle->setData( $this->entity->getSecure('title') );
      $inputTitle->setLabel( $i18n->l( 'Title', 'wbfsys.video.label' ) );

      $inputTitle->refresh           = $this->refresh;
      $inputTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysVideo_Title */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_AccessKey( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'inputWbfsysVideoAccessKey' , 'Text' );
      $this->items['wbfsys_video-access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[access_key]',
          'id'        => 'wgt-input-wbfsys_video_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Access Key', 'src' => 'Video' ) ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'access_key' ) );
      $inputAccessKey->setRequired( $this->fieldRequired( 'wbfsys_video', 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel( $i18n->l( 'Access Key', 'wbfsys.video.label' ) );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysVideo_AccessKey */

 /**
  * create the ui element for field id_mediathek
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_IdMediathek( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysMediathek_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysMediathek not exists' );

      Log::warn( 'Looks like the Entity: WbfsysMediathek is missing' );

      return;
    }


      //p: Window
      $objidWbfsysMediathek = $this->entity->getData( 'id_mediathek' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysMediathek
          || !$entityWbfsysMediathek = $this->db->orm->get
          (
            'WbfsysMediathek',
            $objidWbfsysMediathek
          )
      )
      {
        $entityWbfsysMediathek = $this->db->orm->newEntity( 'WbfsysMediathek' );
      }

      $inputIdMediathek = $this->view->newInput( 'inputWbfsysVideoIdMediathek', 'Window' );
      $this->items['wbfsys_video-id_mediathek'] = $inputIdMediathek;
      $inputIdMediathek->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_video[id_mediathek]',
        'id'        => 'wgt-input-wbfsys_video_id_mediathek'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Mediathek', 'src' => 'Video' ) ),
      ));

      if( $this->assignedForm )
        $inputIdMediathek->assignedForm = $this->assignedForm;

      $inputIdMediathek->setWidth( 'medium' );

      $inputIdMediathek->setData( $this->entity->getData( 'id_mediathek' )  );
      $inputIdMediathek->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'id_mediathek' ) );
      $inputIdMediathek->setRequired( $this->fieldRequired( 'wbfsys_video', 'id_mediathek' ) );
      $inputIdMediathek->setLabel( $i18n->l( 'Mediathek', 'wbfsys.video.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Mediathek.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_video_id_mediathek'.($this->suffix?'-'.$this->suffix:'');

      $inputIdMediathek->setListUrl ( $listUrl );
      $inputIdMediathek->setListIcon( 'control/connect.png' );
      $inputIdMediathek->setEntityUrl( 'maintab.php?c=Wbfsys.Mediathek.edit' );
      $inputIdMediathek->conEntity         = $entityWbfsysMediathek;
      $inputIdMediathek->refresh           = $this->refresh;
      $inputIdMediathek->serializeElement  = $this->sendElement;



      $inputIdMediathek->view = $this->view;
      $inputIdMediathek->buildJavascript( 'wgt-input-wbfsys_video_id_mediathek'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdMediathek );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysVideo_IdMediathek */

 /**
  * create the ui element for field id_licence
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_IdLicence( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysContentLicence_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysContentLicence not exists' );

      Log::warn( 'Looks like the Entity: WbfsysContentLicence is missing' );

      return;
    }


      //p: Window
      $objidWbfsysContentLicence = $this->entity->getData( 'id_licence' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysContentLicence
          || !$entityWbfsysContentLicence = $this->db->orm->get
          (
            'WbfsysContentLicence',
            $objidWbfsysContentLicence
          )
      )
      {
        $entityWbfsysContentLicence = $this->db->orm->newEntity( 'WbfsysContentLicence' );
      }

      $inputIdLicence = $this->view->newInput( 'inputWbfsysVideoIdLicence', 'Window' );
      $this->items['wbfsys_video-id_licence'] = $inputIdLicence;
      $inputIdLicence->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_video[id_licence]',
        'id'        => 'wgt-input-wbfsys_video_id_licence'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Licence', 'src' => 'Video' ) ),
      ));

      if( $this->assignedForm )
        $inputIdLicence->assignedForm = $this->assignedForm;

      $inputIdLicence->setWidth( 'medium' );

      $inputIdLicence->setData( $this->entity->getData( 'id_licence' )  );
      $inputIdLicence->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'id_licence' ) );
      $inputIdLicence->setRequired( $this->fieldRequired( 'wbfsys_video', 'id_licence' ) );
      $inputIdLicence->setLabel( $i18n->l( 'Licence', 'wbfsys.video.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ContentLicence.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_video_id_licence'.($this->suffix?'-'.$this->suffix:'');

      $inputIdLicence->setListUrl ( $listUrl );
      $inputIdLicence->setListIcon( 'control/connect.png' );
      $inputIdLicence->setEntityUrl( 'maintab.php?c=Wbfsys.ContentLicence.edit' );
      $inputIdLicence->conEntity         = $entityWbfsysContentLicence;
      $inputIdLicence->refresh           = $this->refresh;
      $inputIdLicence->serializeElement  = $this->sendElement;



      $inputIdLicence->view = $this->view;
      $inputIdLicence->buildJavascript( 'wgt-input-wbfsys_video_id_licence'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdLicence );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysVideo_IdLicence */

 /**
  * create the ui element for field id_confidentiality
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_IdConfidentiality( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_video_id_confidentiality'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysConfidentialityLevel_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysConfidentialityLevel_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysConfidentialityLevel_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdConfidentiality = $this->view->newItem( 'inputWbfsysVideoIdConfidentiality', 'WbfsysConfidentialityLevel_Selectbox' );
      $this->items['wbfsys_video-id_confidentiality'] = $inputIdConfidentiality;
      $inputIdConfidentiality->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[id_confidentiality]',
          'id'        => 'wgt-input-wbfsys_video_id_confidentiality'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Confidentiality', 'src' => 'Video' ) ),
        )
      );
      $inputIdConfidentiality->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdConfidentiality->assignedForm = $this->assignedForm;

      $inputIdConfidentiality->setActive( $this->entity->getData( 'id_confidentiality' ) );
      $inputIdConfidentiality->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'id_confidentiality' ) );
      $inputIdConfidentiality->setRequired( $this->fieldRequired( 'wbfsys_video', 'id_confidentiality' ) );


      $inputIdConfidentiality->setLabel( $i18n->l( 'Confidentiality', 'wbfsys.video.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdConfidentiality->refresh           = $this->refresh;
        $inputIdConfidentiality->serializeElement  = $this->sendElement;
        $inputIdConfidentiality->editUrl = 'index.php?c=Wbfsys.ConfidentialityLevel.listing&amp;target='.$this->namespace.'&amp;field=id_confidentiality&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_video_id_confidentiality'.$this->suffix;
      }
      // set an empty first entry
      $inputIdConfidentiality->setFirstFree( 'No Confidentiality selected' );

      
      $queryIdConfidentiality = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_video_id_confidentiality'] ) )
      {
      
        $queryIdConfidentiality = $this->db->newQuery( 'WbfsysConfidentialityLevel_Selectbox' );

        $queryIdConfidentiality->fetchSelectbox();
        $inputIdConfidentiality->setData( $queryIdConfidentiality->getAll() );
      
      }
      else
      {
        $inputIdConfidentiality->setData( $this->listElementData['wbfsys_video_id_confidentiality'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdConfidentiality )
        $queryIdConfidentiality = $this->db->newQuery( 'WbfsysConfidentialityLevel_Selectbox' );
      
      $inputIdConfidentiality->loadActive = function( $activeId ) use ( $queryIdConfidentiality ){
 
        return $queryIdConfidentiality->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysVideo_IdConfidentiality */

 /**
  * create the ui element for field id_video_codec
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_IdVideoCodec( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_video_id_video_codec'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysVideoCodec_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysVideoCodec_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysVideoCodec_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdVideoCodec = $this->view->newItem( 'inputWbfsysVideoIdVideoCodec', 'WbfsysVideoCodec_Selectbox' );
      $this->items['wbfsys_video-id_video_codec'] = $inputIdVideoCodec;
      $inputIdVideoCodec->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[id_video_codec]',
          'id'        => 'wgt-input-wbfsys_video_id_video_codec'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Video codec', 'src' => 'Video' ) ),
        )
      );
      $inputIdVideoCodec->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdVideoCodec->assignedForm = $this->assignedForm;

      $inputIdVideoCodec->setActive( $this->entity->getData( 'id_video_codec' ) );
      $inputIdVideoCodec->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'id_video_codec' ) );
      $inputIdVideoCodec->setRequired( $this->fieldRequired( 'wbfsys_video', 'id_video_codec' ) );


      $inputIdVideoCodec->setLabel( $i18n->l( 'Video codec', 'wbfsys.video.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_video_codec:insert' ) )
      {
        $inputIdVideoCodec->refresh           = $this->refresh;
        $inputIdVideoCodec->serializeElement  = $this->sendElement;
        $inputIdVideoCodec->editUrl = 'index.php?c=Wbfsys.VideoCodec.listing&amp;target='.$this->namespace.'&amp;field=id_video_codec&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_video_id_video_codec'.$this->suffix;
      }
      // set an empty first entry
      $inputIdVideoCodec->setFirstFree( 'No Video codec selected' );

      
      $queryIdVideoCodec = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_video_id_video_codec'] ) )
      {
      
        $queryIdVideoCodec = $this->db->newQuery( 'WbfsysVideoCodec_Selectbox' );

        $queryIdVideoCodec->fetchSelectbox();
        $inputIdVideoCodec->setData( $queryIdVideoCodec->getAll() );
      
      }
      else
      {
        $inputIdVideoCodec->setData( $this->listElementData['wbfsys_video_id_video_codec'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdVideoCodec )
        $queryIdVideoCodec = $this->db->newQuery( 'WbfsysVideoCodec_Selectbox' );
      
      $inputIdVideoCodec->loadActive = function( $activeId ) use ( $queryIdVideoCodec ){
 
        return $queryIdVideoCodec->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysVideo_IdVideoCodec */

 /**
  * create the ui element for field id_audio_codec
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_IdAudioCodec( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_video_id_audio_codec'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysAudioCodec_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysAudioCodec_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysAudioCodec_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdAudioCodec = $this->view->newItem( 'inputWbfsysVideoIdAudioCodec', 'WbfsysAudioCodec_Selectbox' );
      $this->items['wbfsys_video-id_audio_codec'] = $inputIdAudioCodec;
      $inputIdAudioCodec->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[id_audio_codec]',
          'id'        => 'wgt-input-wbfsys_video_id_audio_codec'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Audio codec', 'src' => 'Video' ) ),
        )
      );
      $inputIdAudioCodec->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdAudioCodec->assignedForm = $this->assignedForm;

      $inputIdAudioCodec->setActive( $this->entity->getData( 'id_audio_codec' ) );
      $inputIdAudioCodec->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'id_audio_codec' ) );
      $inputIdAudioCodec->setRequired( $this->fieldRequired( 'wbfsys_video', 'id_audio_codec' ) );


      $inputIdAudioCodec->setLabel( $i18n->l( 'Audio codec', 'wbfsys.video.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_audio_codec:insert' ) )
      {
        $inputIdAudioCodec->refresh           = $this->refresh;
        $inputIdAudioCodec->serializeElement  = $this->sendElement;
        $inputIdAudioCodec->editUrl = 'index.php?c=Wbfsys.AudioCodec.listing&amp;target='.$this->namespace.'&amp;field=id_audio_codec&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_video_id_audio_codec'.$this->suffix;
      }
      // set an empty first entry
      $inputIdAudioCodec->setFirstFree( 'No Audio codec selected' );

      
      $queryIdAudioCodec = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_video_id_audio_codec'] ) )
      {
      
        $queryIdAudioCodec = $this->db->newQuery( 'WbfsysAudioCodec_Selectbox' );

        $queryIdAudioCodec->fetchSelectbox();
        $inputIdAudioCodec->setData( $queryIdAudioCodec->getAll() );
      
      }
      else
      {
        $inputIdAudioCodec->setData( $this->listElementData['wbfsys_video_id_audio_codec'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdAudioCodec )
        $queryIdAudioCodec = $this->db->newQuery( 'WbfsysAudioCodec_Selectbox' );
      
      $inputIdAudioCodec->loadActive = function( $activeId ) use ( $queryIdAudioCodec ){
 
        return $queryIdAudioCodec->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysVideo_IdAudioCodec */

 /**
  * create the ui element for field width
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_Width( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputWidth = $this->view->newInput( 'inputWbfsysVideoWidth', 'Int' );
      $this->items['wbfsys_video-width'] = $inputWidth;
      $inputWidth->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[width]',
          'id'        => 'wgt-input-wbfsys_video_width'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Width', 'src' => 'Video' ) ),
        )
      );
      $inputWidth->setWidth( 'medium' );

$inputWidth->setReadOnly( $this->fieldReadOnly( 'wbfsys_video', 'width' ) );
      $inputWidth->setRequired( $this->fieldRequired( 'wbfsys_video', 'width' ) );
      $inputWidth->setData( $this->entity->getData( 'width' ) );
      $inputWidth->setLabel( $i18n->l( 'Width', 'wbfsys.video.label' ) );

      $inputWidth->refresh           = $this->refresh;
      $inputWidth->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysVideo_Width */

 /**
  * create the ui element for field height
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_Height( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputHeight = $this->view->newInput( 'inputWbfsysVideoHeight', 'Int' );
      $this->items['wbfsys_video-height'] = $inputHeight;
      $inputHeight->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[height]',
          'id'        => 'wgt-input-wbfsys_video_height'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Height', 'src' => 'Video' ) ),
        )
      );
      $inputHeight->setWidth( 'medium' );

$inputHeight->setReadOnly( $this->fieldReadOnly( 'wbfsys_video', 'height' ) );
      $inputHeight->setRequired( $this->fieldRequired( 'wbfsys_video', 'height' ) );
      $inputHeight->setData( $this->entity->getData( 'height' ) );
      $inputHeight->setLabel( $i18n->l( 'Height', 'wbfsys.video.label' ) );

      $inputHeight->refresh           = $this->refresh;
      $inputHeight->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysVideo_Height */

 /**
  * create the ui element for field length
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_Length( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputLength = $this->view->newInput( 'inputWbfsysVideoLength', 'Int' );
      $this->items['wbfsys_video-length'] = $inputLength;
      $inputLength->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[length]',
          'id'        => 'wgt-input-wbfsys_video_length'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Length', 'src' => 'Video' ) ),
        )
      );
      $inputLength->setWidth( 'medium' );

$inputLength->setReadOnly( $this->fieldReadOnly( 'wbfsys_video', 'length' ) );
      $inputLength->setRequired( $this->fieldRequired( 'wbfsys_video', 'length' ) );
      $inputLength->setData( $this->entity->getData( 'length' ) );
      $inputLength->setLabel( $i18n->l( 'Length', 'wbfsys.video.label' ) );

      $inputLength->refresh           = $this->refresh;
      $inputLength->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysVideo_Length */

 /**
  * create the ui element for field flag_color
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_FlagColor( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputFlagColor = $this->view->newInput( 'inputWbfsysVideoFlagColor', 'Checkbox' );
      $this->items['wbfsys_video-flag_color'] = $inputFlagColor;
      $inputFlagColor->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[flag_color]',
          'id'        => 'wgt-input-wbfsys_video_flag_color'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Color', 'src' => 'Video' ) ),
        )
      );
      $inputFlagColor->setWidth( 'medium' );

      $inputFlagColor->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'flag_color' ) );
      $inputFlagColor->setRequired( $this->fieldRequired( 'wbfsys_video', 'flag_color' ) );
      $inputFlagColor->setActive( $this->entity->getBoolean( 'flag_color' ) );
      $inputFlagColor->setLabel( $i18n->l( 'Color', 'wbfsys.video.label' ) );

      $inputFlagColor->refresh           = $this->refresh;
      $inputFlagColor->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysVideo_FlagColor */

 /**
  * create the ui element for field flag_sound
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_FlagSound( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:Checkbox
      $inputFlagSound = $this->view->newInput( 'inputWbfsysVideoFlagSound', 'Checkbox' );
      $this->items['wbfsys_video-flag_sound'] = $inputFlagSound;
      $inputFlagSound->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[flag_sound]',
          'id'        => 'wgt-input-wbfsys_video_flag_sound'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Sound', 'src' => 'Video' ) ),
        )
      );
      $inputFlagSound->setWidth( 'medium' );

      $inputFlagSound->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'flag_sound' ) );
      $inputFlagSound->setRequired( $this->fieldRequired( 'wbfsys_video', 'flag_sound' ) );
      $inputFlagSound->setActive( $this->entity->getBoolean( 'flag_sound' ) );
      $inputFlagSound->setLabel( $i18n->l( 'Sound', 'wbfsys.video.label' ) );

      $inputFlagSound->refresh           = $this->refresh;
      $inputFlagSound->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysVideo_FlagSound */

 /**
  * create the ui element for field id_lang
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_IdLang( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysLanguage_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysLanguage not exists' );

      Log::warn( 'Looks like the Entity: WbfsysLanguage is missing' );

      return;
    }


      //p: Window
      $objidWbfsysLanguage = $this->entity->getData( 'id_lang' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysLanguage
          || !$entityWbfsysLanguage = $this->db->orm->get
          (
            'WbfsysLanguage',
            $objidWbfsysLanguage
          )
      )
      {
        $entityWbfsysLanguage = $this->db->orm->newEntity( 'WbfsysLanguage' );
      }

      $inputIdLang = $this->view->newInput( 'inputWbfsysVideoIdLang', 'Window' );
      $this->items['wbfsys_video-id_lang'] = $inputIdLang;
      $inputIdLang->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_video[id_lang]',
        'id'        => 'wgt-input-wbfsys_video_id_lang'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Language', 'src' => 'Video' ) ),
      ));

      if( $this->assignedForm )
        $inputIdLang->assignedForm = $this->assignedForm;

      $inputIdLang->setWidth( 'medium' );

      $inputIdLang->setData( $this->entity->getData( 'id_lang' )  );
      $inputIdLang->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'id_lang' ) );
      $inputIdLang->setRequired( $this->fieldRequired( 'wbfsys_video', 'id_lang' ) );
      $inputIdLang->setLabel( $i18n->l( 'Language', 'wbfsys.video.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Language.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_video_id_lang'.($this->suffix?'-'.$this->suffix:'');

      $inputIdLang->setListUrl ( $listUrl );
      $inputIdLang->setListIcon( 'control/connect.png' );
      $inputIdLang->setEntityUrl( 'maintab.php?c=Wbfsys.Language.edit' );
      $inputIdLang->conEntity         = $entityWbfsysLanguage;
      $inputIdLang->refresh           = $this->refresh;
      $inputIdLang->serializeElement  = $this->sendElement;


        $inputIdLang->setAutocomplete
        ('{
          "url":"ajax.php?c=Wbfsys.Language.autocomplete&amp;key=",
          "type":"entity"
          }'
        );


      $inputIdLang->view = $this->view;
      $inputIdLang->buildJavascript( 'wgt-input-wbfsys_video_id_lang'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdLang );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysVideo_IdLang */

 /**
  * create the ui element for field file
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_File( $params )
  {
    $i18n     = $this->view->i18n;

      //p: input file
      $inputFile = $this->view->newInput( 'inputWbfsysVideoFile' , 'File' );
      $inputFile->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[file]',
          'id'        => 'wgt-input-wbfsys_video_file'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium',
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'File', 'src' => 'Video' ) ),
        )
      );
      $inputFile->setWidth( 'medium' );
      $inputFile->setData( $this->entity->getSecure( 'file' ) );
      $inputFile->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'file' ) );
      $inputFile->setRequired( $this->fieldRequired( 'wbfsys_video', 'file' ) );

      if( $this->assignedForm )
        $inputFile->assignedForm = $this->assignedForm;

      if
      (
        ( $objid = $this->entity->getId() )
          && $this->entity->file
      )
      {
        $inputFile->setLink
        (
          'file.php?f=wbfsys_video-file-'.$objid.'&amp;n='
            .base64_encode( $this->entity->file )
        );
      }

      $inputFile->setLabel( $i18n->l( 'File', 'wbfsys.video.label' ) );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysVideo_File */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysVideoDescription', 'Textarea' );
      $this->items['wbfsys_video-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_video[description]',
          'id'    => 'wgt-input-wbfsys_video_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Video' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_video', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.video.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysVideo_Description */

 /**
  * create the ui element for field mimetype
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_Mimetype( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputMimetype = $this->view->newInput( 'inputWbfsysVideoMimetype', 'Hidden' );
      $this->items['wbfsys_video-mimetype'] = $inputMimetype;
      $inputMimetype->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[mimetype]',
          'id'        => 'wgt-input-wbfsys_video_mimetype'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Mimetype', 'src' => 'Video' ) ),
          'maxlength' => $this->entity->maxSize( 'mimetype' ),
        )
      );
      $inputMimetype->setWidth( 'medium' );

      $inputMimetype->setData( $this->entity->getSecure( 'mimetype' ) );
      $inputMimetype->refresh           = $this->refresh;
      $inputMimetype->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysVideo_Mimetype */

 /**
  * create the ui element for field file_size
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_FileSize( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputFileSize = $this->view->newInput( 'inputWbfsysVideoFileSize', 'Int' );
      $this->items['wbfsys_video-file_size'] = $inputFileSize;
      $inputFileSize->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[file_size]',
          'id'        => 'wgt-input-wbfsys_video_file_size'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'File Size', 'src' => 'Video' ) ),
        )
      );
      $inputFileSize->setWidth( 'medium' );

$inputFileSize->setReadOnly( $this->fieldReadOnly( 'wbfsys_video', 'file_size' ) );
      $inputFileSize->setRequired( $this->fieldRequired( 'wbfsys_video', 'file_size' ) );
      $inputFileSize->setData( $this->entity->getData( 'file_size' ) );
      $inputFileSize->setLabel( $i18n->l( 'File Size', 'wbfsys.video.label' ) );

      $inputFileSize->refresh           = $this->refresh;
      $inputFileSize->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysVideo_FileSize */

 /**
  * create the ui element for field file_hash
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_FileHash( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputFileHash = $this->view->newInput( 'inputWbfsysVideoFileHash', 'Hidden' );
      $this->items['wbfsys_video-file_hash'] = $inputFileHash;
      $inputFileHash->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[file_hash]',
          'id'        => 'wgt-input-wbfsys_video_file_hash'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'File Hash', 'src' => 'Video' ) ),
          'maxlength' => $this->entity->maxSize( 'file_hash' ),
        )
      );
      $inputFileHash->setWidth( 'medium' );

      $inputFileHash->setData( $this->entity->getSecure( 'file_hash' ) );
      $inputFileHash->refresh           = $this->refresh;
      $inputFileHash->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysVideo_FileHash */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysVideoRowid' , 'int' );
      $this->items['wbfsys_video-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[rowid]',
          'id'        => 'wgt-input-wbfsys_video_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Video' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_video', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.video.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysVideo_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysVideoMTimeCreated' , 'Date' );
      $this->items['wbfsys_video-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[m_time_created]',
          'id'        => 'wgt-input-wbfsys_video_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Video' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_video', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.video.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysVideo_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysVideoMRoleCreate', 'Window' );
      $this->items['wbfsys_video-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_video[m_role_create]',
        'id'        => 'wgt-input-wbfsys_video_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Video' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_video', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.video.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_video_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_video_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysVideo_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysVideoMTimeChanged' , 'Date' );
      $this->items['wbfsys_video-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_video_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Video' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_video', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.video.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysVideo_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysVideoMRoleChange', 'Window' );
      $this->items['wbfsys_video-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_video[m_role_change]',
        'id'        => 'wgt-input-wbfsys_video_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Video' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_video', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.video.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_video_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_video_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysVideo_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysVideoMVersion' , 'int' );
      $this->items['wbfsys_video-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[m_version]',
          'id'        => 'wgt-input-wbfsys_video_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Video' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_video', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.video.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysVideo_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideo_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysVideoMUuid' , 'Text' );
      $this->items['wbfsys_video-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video[m_uuid]',
          'id'        => 'wgt-input-wbfsys_video_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Video' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_video', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_video', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.video.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysVideo_MUuid */

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
      $orm->getValidationData( 'WbfsysVideo', array_keys( $this->fields['wbfsys_video']), true ),
      $orm->getErrorMessages( 'WbfsysVideo' ),
      'wbfsys_video'
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


    // ui: checkbox
    if( is_null( $this->entity->flag_color ) )
      $this->entity->flag_color = true;

    // ui: checkbox
    if( is_null( $this->entity->flag_sound ) )
      $this->entity->flag_sound = true;


  }//end public function setDefaultData */


}//end class WbfsysVideo_Crud_Create_Form */


