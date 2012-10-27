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
class WbfsysVideoVariant_Crud_Create_Form
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
  public $namespace  = 'WbfsysVideoVariant';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysVideoVariant';

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
      'wbfsys_video_variant' => array
      (
        'id_video' => array
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
        'id_licence' => array
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
   * @var WbfsysVideoVariant_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysVideoVariant_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysVideoVariant_Entity $entity
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
      'wbfsys_video_variant' => array
      (
        'id_video',
        'id_video_codec',
        'id_audio_codec',
        'id_licence',
        'width',
        'height',
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
  * create an IO form for the WbfsysVideoVariant entity
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
    $this->view->addVar( 'entityWbfsysVideoVariant', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_video_variant'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_video_variant[id_wbfsys_video_variant-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysVideoVariant_IdVideo( $params );
    $this->input_WbfsysVideoVariant_IdVideoCodec( $params );
    $this->input_WbfsysVideoVariant_IdAudioCodec( $params );
    $this->input_WbfsysVideoVariant_IdLicence( $params );
    $this->input_WbfsysVideoVariant_Width( $params );
    $this->input_WbfsysVideoVariant_Height( $params );
    $this->input_WbfsysVideoVariant_IdLang( $params );
    $this->input_WbfsysVideoVariant_File( $params );
    $this->input_WbfsysVideoVariant_Description( $params );
    $this->input_WbfsysVideoVariant_Mimetype( $params );
    $this->input_WbfsysVideoVariant_FileSize( $params );
    $this->input_WbfsysVideoVariant_FileHash( $params );
    $this->input_WbfsysVideoVariant_Rowid( $params );
    $this->input_WbfsysVideoVariant_MTimeCreated( $params );
    $this->input_WbfsysVideoVariant_MRoleCreate( $params );
    $this->input_WbfsysVideoVariant_MTimeChanged( $params );
    $this->input_WbfsysVideoVariant_MRoleChange( $params );
    $this->input_WbfsysVideoVariant_MVersion( $params );
    $this->input_WbfsysVideoVariant_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field id_video
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_IdVideo( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysVideo_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysVideo not exists' );

      Log::warn( 'Looks like the Entity: WbfsysVideo is missing' );

      return;
    }


      //p: Window
      $objidWbfsysVideo = $this->entity->getData( 'id_video' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysVideo
          || !$entityWbfsysVideo = $this->db->orm->get
          (
            'WbfsysVideo',
            $objidWbfsysVideo
          )
      )
      {
        $entityWbfsysVideo = $this->db->orm->newEntity( 'WbfsysVideo' );
      }

      $inputIdVideo = $this->view->newInput( 'inputWbfsysVideoVariantIdVideo', 'Window' );
      $this->items['wbfsys_video_variant-id_video'] = $inputIdVideo;
      $inputIdVideo->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_video_variant[id_video]',
        'id'        => 'wgt-input-wbfsys_video_variant_id_video'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Video', 'src' => 'Video Variant' ) ),
      ));

      if( $this->assignedForm )
        $inputIdVideo->assignedForm = $this->assignedForm;

      $inputIdVideo->setWidth( 'medium' );

      $inputIdVideo->setData( $this->entity->getData( 'id_video' )  );
      $inputIdVideo->setReadonly( $this->fieldReadOnly( 'wbfsys_video_variant', 'id_video' ) );
      $inputIdVideo->setRequired( $this->fieldRequired( 'wbfsys_video_variant', 'id_video' ) );
      $inputIdVideo->setLabel( $i18n->l( 'Video', 'wbfsys.video_variant.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Video.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_video_variant_id_video'.($this->suffix?'-'.$this->suffix:'');

      $inputIdVideo->setListUrl ( $listUrl );
      $inputIdVideo->setListIcon( 'control/connect.png' );
      $inputIdVideo->setEntityUrl( 'maintab.php?c=Wbfsys.Video.edit' );
      $inputIdVideo->conEntity         = $entityWbfsysVideo;
      $inputIdVideo->refresh           = $this->refresh;
      $inputIdVideo->serializeElement  = $this->sendElement;



      $inputIdVideo->view = $this->view;
      $inputIdVideo->buildJavascript( 'wgt-input-wbfsys_video_variant_id_video'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdVideo );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysVideoVariant_IdVideo */

 /**
  * create the ui element for field id_video_codec
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_IdVideoCodec( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_video_variant_id_video_codec'] ) )
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
      $inputIdVideoCodec = $this->view->newItem( 'inputWbfsysVideoVariantIdVideoCodec', 'WbfsysVideoCodec_Selectbox' );
      $this->items['wbfsys_video_variant-id_video_codec'] = $inputIdVideoCodec;
      $inputIdVideoCodec->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video_variant[id_video_codec]',
          'id'        => 'wgt-input-wbfsys_video_variant_id_video_codec'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Video codec', 'src' => 'Video Variant' ) ),
        )
      );
      $inputIdVideoCodec->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdVideoCodec->assignedForm = $this->assignedForm;

      $inputIdVideoCodec->setActive( $this->entity->getData( 'id_video_codec' ) );
      $inputIdVideoCodec->setReadonly( $this->fieldReadOnly( 'wbfsys_video_variant', 'id_video_codec' ) );
      $inputIdVideoCodec->setRequired( $this->fieldRequired( 'wbfsys_video_variant', 'id_video_codec' ) );


      $inputIdVideoCodec->setLabel( $i18n->l( 'Video codec', 'wbfsys.video_variant.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_video_codec:insert' ) )
      {
        $inputIdVideoCodec->refresh           = $this->refresh;
        $inputIdVideoCodec->serializeElement  = $this->sendElement;
        $inputIdVideoCodec->editUrl = 'index.php?c=Wbfsys.VideoCodec.listing&amp;target='.$this->namespace.'&amp;field=id_video_codec&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_video_variant_id_video_codec'.$this->suffix;
      }
      // set an empty first entry
      $inputIdVideoCodec->setFirstFree( 'No Video codec selected' );

      
      $queryIdVideoCodec = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_video_variant_id_video_codec'] ) )
      {
      
        $queryIdVideoCodec = $this->db->newQuery( 'WbfsysVideoCodec_Selectbox' );

        $queryIdVideoCodec->fetchSelectbox();
        $inputIdVideoCodec->setData( $queryIdVideoCodec->getAll() );
      
      }
      else
      {
        $inputIdVideoCodec->setData( $this->listElementData['wbfsys_video_variant_id_video_codec'] );
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

  }//end public function input_WbfsysVideoVariant_IdVideoCodec */

 /**
  * create the ui element for field id_audio_codec
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_IdAudioCodec( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_video_variant_id_audio_codec'] ) )
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
      $inputIdAudioCodec = $this->view->newItem( 'inputWbfsysVideoVariantIdAudioCodec', 'WbfsysAudioCodec_Selectbox' );
      $this->items['wbfsys_video_variant-id_audio_codec'] = $inputIdAudioCodec;
      $inputIdAudioCodec->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video_variant[id_audio_codec]',
          'id'        => 'wgt-input-wbfsys_video_variant_id_audio_codec'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Audio codec', 'src' => 'Video Variant' ) ),
        )
      );
      $inputIdAudioCodec->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdAudioCodec->assignedForm = $this->assignedForm;

      $inputIdAudioCodec->setActive( $this->entity->getData( 'id_audio_codec' ) );
      $inputIdAudioCodec->setReadonly( $this->fieldReadOnly( 'wbfsys_video_variant', 'id_audio_codec' ) );
      $inputIdAudioCodec->setRequired( $this->fieldRequired( 'wbfsys_video_variant', 'id_audio_codec' ) );


      $inputIdAudioCodec->setLabel( $i18n->l( 'Audio codec', 'wbfsys.video_variant.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_audio_codec:insert' ) )
      {
        $inputIdAudioCodec->refresh           = $this->refresh;
        $inputIdAudioCodec->serializeElement  = $this->sendElement;
        $inputIdAudioCodec->editUrl = 'index.php?c=Wbfsys.AudioCodec.listing&amp;target='.$this->namespace.'&amp;field=id_audio_codec&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_video_variant_id_audio_codec'.$this->suffix;
      }
      // set an empty first entry
      $inputIdAudioCodec->setFirstFree( 'No Audio codec selected' );

      
      $queryIdAudioCodec = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_video_variant_id_audio_codec'] ) )
      {
      
        $queryIdAudioCodec = $this->db->newQuery( 'WbfsysAudioCodec_Selectbox' );

        $queryIdAudioCodec->fetchSelectbox();
        $inputIdAudioCodec->setData( $queryIdAudioCodec->getAll() );
      
      }
      else
      {
        $inputIdAudioCodec->setData( $this->listElementData['wbfsys_video_variant_id_audio_codec'] );
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

  }//end public function input_WbfsysVideoVariant_IdAudioCodec */

 /**
  * create the ui element for field id_licence
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_IdLicence( $params )
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

      $inputIdLicence = $this->view->newInput( 'inputWbfsysVideoVariantIdLicence', 'Window' );
      $this->items['wbfsys_video_variant-id_licence'] = $inputIdLicence;
      $inputIdLicence->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_video_variant[id_licence]',
        'id'        => 'wgt-input-wbfsys_video_variant_id_licence'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Licence', 'src' => 'Video Variant' ) ),
      ));

      if( $this->assignedForm )
        $inputIdLicence->assignedForm = $this->assignedForm;

      $inputIdLicence->setWidth( 'medium' );

      $inputIdLicence->setData( $this->entity->getData( 'id_licence' )  );
      $inputIdLicence->setReadonly( $this->fieldReadOnly( 'wbfsys_video_variant', 'id_licence' ) );
      $inputIdLicence->setRequired( $this->fieldRequired( 'wbfsys_video_variant', 'id_licence' ) );
      $inputIdLicence->setLabel( $i18n->l( 'Licence', 'wbfsys.video_variant.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ContentLicence.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_video_variant_id_licence'.($this->suffix?'-'.$this->suffix:'');

      $inputIdLicence->setListUrl ( $listUrl );
      $inputIdLicence->setListIcon( 'control/connect.png' );
      $inputIdLicence->setEntityUrl( 'maintab.php?c=Wbfsys.ContentLicence.edit' );
      $inputIdLicence->conEntity         = $entityWbfsysContentLicence;
      $inputIdLicence->refresh           = $this->refresh;
      $inputIdLicence->serializeElement  = $this->sendElement;



      $inputIdLicence->view = $this->view;
      $inputIdLicence->buildJavascript( 'wgt-input-wbfsys_video_variant_id_licence'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdLicence );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysVideoVariant_IdLicence */

 /**
  * create the ui element for field width
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_Width( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputWidth = $this->view->newInput( 'inputWbfsysVideoVariantWidth', 'Int' );
      $this->items['wbfsys_video_variant-width'] = $inputWidth;
      $inputWidth->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video_variant[width]',
          'id'        => 'wgt-input-wbfsys_video_variant_width'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Width', 'src' => 'Video Variant' ) ),
        )
      );
      $inputWidth->setWidth( 'medium' );

$inputWidth->setReadOnly( $this->fieldReadOnly( 'wbfsys_video_variant', 'width' ) );
      $inputWidth->setRequired( $this->fieldRequired( 'wbfsys_video_variant', 'width' ) );
      $inputWidth->setData( $this->entity->getData( 'width' ) );
      $inputWidth->setLabel( $i18n->l( 'Width', 'wbfsys.video_variant.label' ) );

      $inputWidth->refresh           = $this->refresh;
      $inputWidth->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysVideoVariant_Width */

 /**
  * create the ui element for field height
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_Height( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputHeight = $this->view->newInput( 'inputWbfsysVideoVariantHeight', 'Int' );
      $this->items['wbfsys_video_variant-height'] = $inputHeight;
      $inputHeight->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video_variant[height]',
          'id'        => 'wgt-input-wbfsys_video_variant_height'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Height', 'src' => 'Video Variant' ) ),
        )
      );
      $inputHeight->setWidth( 'medium' );

$inputHeight->setReadOnly( $this->fieldReadOnly( 'wbfsys_video_variant', 'height' ) );
      $inputHeight->setRequired( $this->fieldRequired( 'wbfsys_video_variant', 'height' ) );
      $inputHeight->setData( $this->entity->getData( 'height' ) );
      $inputHeight->setLabel( $i18n->l( 'Height', 'wbfsys.video_variant.label' ) );

      $inputHeight->refresh           = $this->refresh;
      $inputHeight->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysVideoVariant_Height */

 /**
  * create the ui element for field id_lang
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_IdLang( $params )
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

      $inputIdLang = $this->view->newInput( 'inputWbfsysVideoVariantIdLang', 'Window' );
      $this->items['wbfsys_video_variant-id_lang'] = $inputIdLang;
      $inputIdLang->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_video_variant[id_lang]',
        'id'        => 'wgt-input-wbfsys_video_variant_id_lang'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Language', 'src' => 'Video Variant' ) ),
      ));

      if( $this->assignedForm )
        $inputIdLang->assignedForm = $this->assignedForm;

      $inputIdLang->setWidth( 'medium' );

      $inputIdLang->setData( $this->entity->getData( 'id_lang' )  );
      $inputIdLang->setReadonly( $this->fieldReadOnly( 'wbfsys_video_variant', 'id_lang' ) );
      $inputIdLang->setRequired( $this->fieldRequired( 'wbfsys_video_variant', 'id_lang' ) );
      $inputIdLang->setLabel( $i18n->l( 'Language', 'wbfsys.video_variant.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Language.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_video_variant_id_lang'.($this->suffix?'-'.$this->suffix:'');

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
      $inputIdLang->buildJavascript( 'wgt-input-wbfsys_video_variant_id_lang'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdLang );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysVideoVariant_IdLang */

 /**
  * create the ui element for field file
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_File( $params )
  {
    $i18n     = $this->view->i18n;

      //p: input file
      $inputFile = $this->view->newInput( 'inputWbfsysVideoVariantFile' , 'File' );
      $inputFile->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video_variant[file]',
          'id'        => 'wgt-input-wbfsys_video_variant_file'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium',
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'File', 'src' => 'Video Variant' ) ),
        )
      );
      $inputFile->setWidth( 'medium' );
      $inputFile->setData( $this->entity->getSecure( 'file' ) );
      $inputFile->setReadonly( $this->fieldReadOnly( 'wbfsys_video_variant', 'file' ) );
      $inputFile->setRequired( $this->fieldRequired( 'wbfsys_video_variant', 'file' ) );

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
          'file.php?f=wbfsys_video_variant-file-'.$objid.'&amp;n='
            .base64_encode( $this->entity->file )
        );
      }

      $inputFile->setLabel( $i18n->l( 'File', 'wbfsys.video_variant.label' ) );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysVideoVariant_File */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysVideoVariantDescription', 'Textarea' );
      $this->items['wbfsys_video_variant-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_video_variant[description]',
          'id'    => 'wgt-input-wbfsys_video_variant_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Video Variant' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_video_variant', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_video_variant', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.video_variant.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysVideoVariant_Description */

 /**
  * create the ui element for field mimetype
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_Mimetype( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputMimetype = $this->view->newInput( 'inputWbfsysVideoVariantMimetype', 'Hidden' );
      $this->items['wbfsys_video_variant-mimetype'] = $inputMimetype;
      $inputMimetype->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video_variant[mimetype]',
          'id'        => 'wgt-input-wbfsys_video_variant_mimetype'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Mimetype', 'src' => 'Video Variant' ) ),
          'maxlength' => $this->entity->maxSize( 'mimetype' ),
        )
      );
      $inputMimetype->setWidth( 'medium' );

      $inputMimetype->setData( $this->entity->getSecure( 'mimetype' ) );
      $inputMimetype->refresh           = $this->refresh;
      $inputMimetype->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysVideoVariant_Mimetype */

 /**
  * create the ui element for field file_size
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_FileSize( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputFileSize = $this->view->newInput( 'inputWbfsysVideoVariantFileSize', 'Int' );
      $this->items['wbfsys_video_variant-file_size'] = $inputFileSize;
      $inputFileSize->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video_variant[file_size]',
          'id'        => 'wgt-input-wbfsys_video_variant_file_size'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'File Size', 'src' => 'Video Variant' ) ),
        )
      );
      $inputFileSize->setWidth( 'medium' );

$inputFileSize->setReadOnly( $this->fieldReadOnly( 'wbfsys_video_variant', 'file_size' ) );
      $inputFileSize->setRequired( $this->fieldRequired( 'wbfsys_video_variant', 'file_size' ) );
      $inputFileSize->setData( $this->entity->getData( 'file_size' ) );
      $inputFileSize->setLabel( $i18n->l( 'File Size', 'wbfsys.video_variant.label' ) );

      $inputFileSize->refresh           = $this->refresh;
      $inputFileSize->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysVideoVariant_FileSize */

 /**
  * create the ui element for field file_hash
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_FileHash( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputFileHash = $this->view->newInput( 'inputWbfsysVideoVariantFileHash', 'Hidden' );
      $this->items['wbfsys_video_variant-file_hash'] = $inputFileHash;
      $inputFileHash->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video_variant[file_hash]',
          'id'        => 'wgt-input-wbfsys_video_variant_file_hash'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'File Hash', 'src' => 'Video Variant' ) ),
          'maxlength' => $this->entity->maxSize( 'file_hash' ),
        )
      );
      $inputFileHash->setWidth( 'medium' );

      $inputFileHash->setData( $this->entity->getSecure( 'file_hash' ) );
      $inputFileHash->refresh           = $this->refresh;
      $inputFileHash->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysVideoVariant_FileHash */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysVideoVariantRowid' , 'int' );
      $this->items['wbfsys_video_variant-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video_variant[rowid]',
          'id'        => 'wgt-input-wbfsys_video_variant_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Video Variant' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_video_variant', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_video_variant', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.video_variant.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysVideoVariant_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysVideoVariantMTimeCreated' , 'Date' );
      $this->items['wbfsys_video_variant-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video_variant[m_time_created]',
          'id'        => 'wgt-input-wbfsys_video_variant_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Video Variant' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_video_variant', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_video_variant', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.video_variant.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysVideoVariant_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysVideoVariantMRoleCreate', 'Window' );
      $this->items['wbfsys_video_variant-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_video_variant[m_role_create]',
        'id'        => 'wgt-input-wbfsys_video_variant_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Video Variant' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_video_variant', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_video_variant', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.video_variant.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_video_variant_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_video_variant_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysVideoVariant_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysVideoVariantMTimeChanged' , 'Date' );
      $this->items['wbfsys_video_variant-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video_variant[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_video_variant_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Video Variant' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_video_variant', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_video_variant', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.video_variant.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysVideoVariant_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysVideoVariantMRoleChange', 'Window' );
      $this->items['wbfsys_video_variant-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_video_variant[m_role_change]',
        'id'        => 'wgt-input-wbfsys_video_variant_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Video Variant' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_video_variant', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_video_variant', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.video_variant.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;context=create'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_video_variant_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_video_variant_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysVideoVariant_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysVideoVariantMVersion' , 'int' );
      $this->items['wbfsys_video_variant-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video_variant[m_version]',
          'id'        => 'wgt-input-wbfsys_video_variant_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Video Variant' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_video_variant', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_video_variant', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.video_variant.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysVideoVariant_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysVideoVariant_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysVideoVariantMUuid' , 'Text' );
      $this->items['wbfsys_video_variant-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_video_variant[m_uuid]',
          'id'        => 'wgt-input-wbfsys_video_variant_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Video Variant' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_video_variant', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_video_variant', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.video_variant.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysVideoVariant_MUuid */

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
      $orm->getValidationData( 'WbfsysVideoVariant', array_keys( $this->fields['wbfsys_video_variant']), true ),
      $orm->getErrorMessages( 'WbfsysVideoVariant' ),
      'wbfsys_video_variant'
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


}//end class WbfsysVideoVariant_Crud_Create_Form */


