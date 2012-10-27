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
class WbfsysVideoVariant_Form
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
  public $keyName     = 'wbfsys_video_variant';

  /**
   * the cname for the entities, is used to request metadata from the orm
   * @setter WgtForm::setEntityName()
   * @getter WgtForm::getEntityName()
   * @var string 
   */
  public $entityName  = 'WbfsysVideoVariant';

  /**
   * namespace for the actual form
   * @setter WgtForm::setNamespace()
   * @getter WgtForm::getNamespace()
   * @var string 
   */
  public $namespace  = 'WbfsysVideoVariant';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtForm::setPrefix()
   * @getter WgtForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysVideoVariant';

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
   * @var WbfsysVideoVariant_Entity 
   */
  public $entity      = null;
  
////////////////////////////////////////////////////////////////////////////////
// form methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysVideoVariant entity
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
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysVideoVariant' );
      }
    }

  }//end public function createForm */

 /**
  * create a search form for the WbfsysVideoVariant entity
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
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysVideoVariant' );
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
  * create the ui element for field id_video
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_video( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysVideo_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysVideo not exists' );

      Log::warn('Looks like the Entity: WbfsysVideo is missing');

      return;
    }


      //p: Window
      $objidWbfsysVideo = $this->entity->getData('id_video') ;

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

      $inputIdVideo = $this->view->newInput( 'input'.$this->prefix.'IdVideo', 'Window' );
      $inputIdVideo->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_video]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_video'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Video (Video Variant)', 'wbfsys.video_variant.label' ),
      ));

      if( $this->assignedForm )
        $inputIdVideo->assignedForm = $this->assignedForm;

      $inputIdVideo->setWidth( 'medium' );

      $inputIdVideo->setData( $this->entity->getData( 'id_video' )  );
      $inputIdVideo->setReadOnly( $this->isReadOnly( 'id_video' ) );
      $inputIdVideo->setLabel( $this->view->i18n->l( 'Video', 'wbfsys.video_variant.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Video.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_video'.($this->suffix?'-'.$this->suffix:'');

      $inputIdVideo->setListUrl ( $listUrl );
      $inputIdVideo->setListIcon( 'control/connect.png' );
      $inputIdVideo->setEntityUrl( 'maintab.php?c=Wbfsys.Video.edit' );
      $inputIdVideo->conEntity         = $entityWbfsysVideo;
      $inputIdVideo->refresh           = $this->refresh;
      $inputIdVideo->serializeElement  = $this->sendElement;
      


      $inputIdVideo->view = $this->view;
      $inputIdVideo->buildJavascript( 'wgt-input-'.$this->keyName.'_id_video'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdVideo );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_video */

 /**
  * create the ui element for field id_video_codec
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_video_codec( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysVideoCodec_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysVideoCodec_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysVideoCodec_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdVideoCodec = $this->view->newItem( 'input'.$this->prefix.'IdVideoCodec' , 'WbfsysVideoCodec_Selectbox' );
      $this->items['id_video_codec'] = $inputIdVideoCodec;
      $inputIdVideoCodec->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_video_codec]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_video_codec'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Video codec (Video Variant)', 'wbfsys.video_variant.label' ),
        )
      );
      $inputIdVideoCodec->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdVideoCodec->assignedForm = $this->assignedForm;

      $inputIdVideoCodec->setActive( $this->entity->getData( 'id_video_codec' ) );
      $inputIdVideoCodec->setReadOnly( $this->isReadOnly( 'id_video_codec' ) );
      $inputIdVideoCodec->setLabel
      (
        $this->view->i18n->l( 'Video codec', 'wbfsys.video_variant.label' ),
        $this->entity->required( 'id_video_codec' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_video_codec:insert' ) )
      {
        $inputIdVideoCodec->refresh           = $this->refresh;
        $inputIdVideoCodec->serializeElement  = $this->sendElement;
        $inputIdVideoCodec->editUrl = 'index.php?c=Wbfsys.VideoCodec.listing&amp;target='.$this->namespace.'&amp;field=id_video_codec&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_id_video_codec'.$this->suffix;
      }
      // set an empty first entry
      $inputIdVideoCodec->setFirstFree( 'No video codec selected' );


      $queryIdVideoCodec = $this->db->newQuery( 'WbfsysVideoCodec_Selectbox' );
      $queryIdVideoCodec->fetchSelectbox();
      $inputIdVideoCodec->setData( $queryIdVideoCodec->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_id_video_codec */

 /**
  * create the ui element for field id_audio_codec
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_audio_codec( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysAudioCodec_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysAudioCodec_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysAudioCodec_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdAudioCodec = $this->view->newItem( 'input'.$this->prefix.'IdAudioCodec' , 'WbfsysAudioCodec_Selectbox' );
      $this->items['id_audio_codec'] = $inputIdAudioCodec;
      $inputIdAudioCodec->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_audio_codec]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_audio_codec'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Audio codec (Video Variant)', 'wbfsys.video_variant.label' ),
        )
      );
      $inputIdAudioCodec->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdAudioCodec->assignedForm = $this->assignedForm;

      $inputIdAudioCodec->setActive( $this->entity->getData( 'id_audio_codec' ) );
      $inputIdAudioCodec->setReadOnly( $this->isReadOnly( 'id_audio_codec' ) );
      $inputIdAudioCodec->setLabel
      (
        $this->view->i18n->l( 'Audio codec', 'wbfsys.video_variant.label' ),
        $this->entity->required( 'id_audio_codec' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_audio_codec:insert' ) )
      {
        $inputIdAudioCodec->refresh           = $this->refresh;
        $inputIdAudioCodec->serializeElement  = $this->sendElement;
        $inputIdAudioCodec->editUrl = 'index.php?c=Wbfsys.AudioCodec.listing&amp;target='.$this->namespace.'&amp;field=id_audio_codec&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_id_audio_codec'.$this->suffix;
      }
      // set an empty first entry
      $inputIdAudioCodec->setFirstFree( 'No audio codec selected' );


      $queryIdAudioCodec = $this->db->newQuery( 'WbfsysAudioCodec_Selectbox' );
      $queryIdAudioCodec->fetchSelectbox();
      $inputIdAudioCodec->setData( $queryIdAudioCodec->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_id_audio_codec */

 /**
  * create the ui element for field id_licence
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_licence( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysContentLicence_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysContentLicence not exists' );

      Log::warn('Looks like the Entity: WbfsysContentLicence is missing');

      return;
    }


      //p: Window
      $objidWbfsysContentLicence = $this->entity->getData('id_licence') ;

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

      $inputIdLicence = $this->view->newInput( 'input'.$this->prefix.'IdLicence', 'Window' );
      $inputIdLicence->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_licence]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_licence'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Licence (Video Variant)', 'wbfsys.video_variant.label' ),
      ));

      if( $this->assignedForm )
        $inputIdLicence->assignedForm = $this->assignedForm;

      $inputIdLicence->setWidth( 'medium' );

      $inputIdLicence->setData( $this->entity->getData( 'id_licence' )  );
      $inputIdLicence->setReadOnly( $this->isReadOnly( 'id_licence' ) );
      $inputIdLicence->setLabel( $this->view->i18n->l( 'Licence', 'wbfsys.video_variant.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ContentLicence.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_licence'.($this->suffix?'-'.$this->suffix:'');

      $inputIdLicence->setListUrl ( $listUrl );
      $inputIdLicence->setListIcon( 'control/connect.png' );
      $inputIdLicence->setEntityUrl( 'maintab.php?c=Wbfsys.ContentLicence.edit' );
      $inputIdLicence->conEntity         = $entityWbfsysContentLicence;
      $inputIdLicence->refresh           = $this->refresh;
      $inputIdLicence->serializeElement  = $this->sendElement;
      


      $inputIdLicence->view = $this->view;
      $inputIdLicence->buildJavascript( 'wgt-input-'.$this->keyName.'_id_licence'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdLicence );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_licence */

 /**
  * create the ui element for field width
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_width( $params )
  {

      //tpl: class ui:int
      $inputWidth = $this->view->newInput( 'input'.$this->prefix.'Width' , 'Int' );
      $this->items['width'] = $inputWidth;
      $inputWidth->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[width]',
          'id'        => 'wgt-input-'.$this->keyName.'_width'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Width (Video Variant)', 'wbfsys.video_variant.label' ),
        )
      );
      $inputWidth->setWidth( 'medium' );

      $inputWidth->setReadOnly( $this->isReadOnly( 'width' ) );
      $inputWidth->setData( $this->entity->getData( 'width' ) );
      $inputWidth->setLabel
      (
        $this->view->i18n->l( 'Width', 'wbfsys.video_variant.label' ),
        $this->entity->required( 'width' )
      );

      $inputWidth->refresh           = $this->refresh;
      $inputWidth->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_width */

 /**
  * create the ui element for field height
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_height( $params )
  {

      //tpl: class ui:int
      $inputHeight = $this->view->newInput( 'input'.$this->prefix.'Height' , 'Int' );
      $this->items['height'] = $inputHeight;
      $inputHeight->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[height]',
          'id'        => 'wgt-input-'.$this->keyName.'_height'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Height (Video Variant)', 'wbfsys.video_variant.label' ),
        )
      );
      $inputHeight->setWidth( 'medium' );

      $inputHeight->setReadOnly( $this->isReadOnly( 'height' ) );
      $inputHeight->setData( $this->entity->getData( 'height' ) );
      $inputHeight->setLabel
      (
        $this->view->i18n->l( 'Height', 'wbfsys.video_variant.label' ),
        $this->entity->required( 'height' )
      );

      $inputHeight->refresh           = $this->refresh;
      $inputHeight->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_height */

 /**
  * create the ui element for field id_lang
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_lang( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysLanguage_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysLanguage not exists' );

      Log::warn('Looks like the Entity: WbfsysLanguage is missing');

      return;
    }


      //p: Window
      $objidWbfsysLanguage = $this->entity->getData('id_lang') ;

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

      $inputIdLang = $this->view->newInput( 'input'.$this->prefix.'IdLang', 'Window' );
      $inputIdLang->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_lang]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_lang'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Language (Video Variant)', 'wbfsys.video_variant.label' ),
      ));

      if( $this->assignedForm )
        $inputIdLang->assignedForm = $this->assignedForm;

      $inputIdLang->setWidth( 'medium' );

      $inputIdLang->setData( $this->entity->getData( 'id_lang' )  );
      $inputIdLang->setReadOnly( $this->isReadOnly( 'id_lang' ) );
      $inputIdLang->setLabel( $this->view->i18n->l( 'Language', 'wbfsys.video_variant.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Language.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_lang'.($this->suffix?'-'.$this->suffix:'');

      $inputIdLang->setListUrl ( $listUrl );
      $inputIdLang->setListIcon( 'control/connect.png' );
      $inputIdLang->setEntityUrl( 'maintab.php?c=Wbfsys.Language.edit' );
      $inputIdLang->conEntity         = $entityWbfsysLanguage;
      $inputIdLang->refresh           = $this->refresh;
      $inputIdLang->serializeElement  = $this->sendElement;
      

        $inputIdLang->setAutocomplete
        (
        '{
          "url":"ajax.php?c=Wbfsys.Language.autocomplete&amp;key=",
          "type":"entity"
          }'
        );
        

      $inputIdLang->view = $this->view;
      $inputIdLang->buildJavascript( 'wgt-input-'.$this->keyName.'_id_lang'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdLang );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_lang */

 /**
  * create the ui element for field file
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_file( $params )
  {

      //p: input file
      $inputFile = $this->view->newInput( 'input'.$this->prefix.'File' , 'File' );
      $inputFile->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[file]',
          'id'        => 'wgt-input-'.$this->keyName.'_file'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium',
          'title'     => $this->view->i18n->l( 'Insert value for File (Video Variant)', 'wbfsys.video_variant.label' ),
        )
      );
      $inputFile->setWidth( 'medium' );
      $inputFile->setData( $this->entity->getSecure('file') );
      $inputFile->setReadOnly( $this->isReadOnly( 'file' ) );

      if( $this->assignedForm )
        $inputFile->assignedForm = $this->assignedForm;

      if( ( $objid = $this->entity->getId() ) && $this->entity->file )
        $inputFile->setLink('file.php?f=wbfsys_video_variant-file-'.$objid.'&amp;n='.base64_encode($this->entity->file));

      $inputFile->setLabel
      (
        $this->view->i18n->l( 'File', 'wbfsys.video_variant.label' ),
        $this->entity->required('file')
      );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_file */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_description( $params )
  {

      //p: textarea
      $inputDescription = $this->view->newInput( 'input'.$this->prefix.'Description', 'Textarea' );
      $this->items['description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => $this->keyName.'[description]',
          'id'    => 'wgt-input-'.$this->keyName.'_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $this->view->i18n->l( 'Insert value for Description (Video Variant)', 'wbfsys.video_variant.label' ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setData( $this->entity->getSecure('description') );
      $inputDescription->setReadOnly( $this->isReadOnly( 'description' ) );
      $inputDescription->setLabel
      (
        $this->view->i18n->l( 'Description', 'wbfsys.video_variant.label' ),
        $this->entity->required( 'description' )
      );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_description */

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
          'title'     => $this->view->i18n->l( 'Insert value for Mimetype (Video Variant)', 'wbfsys.video_variant.label' ),
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
  * create the ui element for field file_size
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_file_size( $params )
  {

      //tpl: class ui:int
      $inputFileSize = $this->view->newInput( 'input'.$this->prefix.'FileSize' , 'Int' );
      $this->items['file_size'] = $inputFileSize;
      $inputFileSize->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[file_size]',
          'id'        => 'wgt-input-'.$this->keyName.'_file_size'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for File Size (Video Variant)', 'wbfsys.video_variant.label' ),
        )
      );
      $inputFileSize->setWidth( 'medium' );

      $inputFileSize->setReadOnly( $this->isReadOnly( 'file_size' ) );
      $inputFileSize->setData( $this->entity->getData( 'file_size' ) );
      $inputFileSize->setLabel
      (
        $this->view->i18n->l( 'File Size', 'wbfsys.video_variant.label' ),
        $this->entity->required( 'file_size' )
      );

      $inputFileSize->refresh           = $this->refresh;
      $inputFileSize->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_file_size */

 /**
  * create the ui element for field file_hash
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_file_hash( $params )
  {

      //tpl: class ui:hidden
      $inputFileHash = $this->view->newInput( 'input'.$this->prefix.'FileHash', 'Hidden' );
      $this->items['file_hash'] = $inputFileHash;
      $inputFileHash->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[file_hash]',
          'id'        => 'wgt-input-'.$this->keyName.'_file_hash'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for File Hash (Video Variant)', 'wbfsys.video_variant.label' ),
          'maxlength' => $this->entity->maxSize( 'file_hash' ),
        )
      );
      $inputFileHash->setWidth( 'medium' );

      $inputFileHash->setReadOnly( $this->isReadOnly( 'file_hash' ) );
      $inputFileHash->setData( $this->entity->getSecure( 'file_hash' ) );
      $inputFileHash->refresh           = $this->refresh;
      $inputFileHash->serializeElement  = $this->sendElement;


  }//end public function input_file_hash */

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
          'title'     => $this->view->i18n->l( 'Insert value for Rowid (Video Variant)', 'wbfsys.video_variant.label' ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadOnly( $this->isReadOnly( 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel
      (
        $this->view->i18n->l( 'Rowid', 'wbfsys.video_variant.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Time Created (Video Variant)', 'wbfsys.video_variant.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadOnly( true );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel
      (
        $this->view->i18n->l( 'Time Created', 'wbfsys.video_variant.label' ),
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
        'title'     => $this->view->i18n->l( 'Insert value for Role Create (Video Variant)', 'wbfsys.video_variant.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadOnly( true );
      $inputMRoleCreate->setLabel( $this->view->i18n->l( 'Role Create', 'wbfsys.video_variant.label' ) );


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
          'title'     => $this->view->i18n->l( 'Insert value for Time Changed (Video Variant)', 'wbfsys.video_variant.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadOnly( true );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel
      (
        $this->view->i18n->l( 'Time Changed', 'wbfsys.video_variant.label' ),
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
        'title'     => $this->view->i18n->l( 'Insert value for Role Change (Video Variant)', 'wbfsys.video_variant.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadOnly( true );
      $inputMRoleChange->setLabel( $this->view->i18n->l( 'Role Change', 'wbfsys.video_variant.label' ) );


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
          'title'     => $this->view->i18n->l( 'Insert value for Version (Video Variant)', 'wbfsys.video_variant.label' ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadOnly( true );
      $inputMVersion->setData( $this->entity->getSecure('m_version') );
      $inputMVersion->setLabel
      (
        $this->view->i18n->l( 'Version', 'wbfsys.video_variant.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Uuid (Video Variant)', 'wbfsys.video_variant.label' ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadOnly( true );
      $inputMUuid->setData( $this->entity->getSecure('m_uuid') );
      $inputMUuid->setLabel
      (
        $this->view->i18n->l( 'Uuid', 'wbfsys.video_variant.label' ),
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
  * create the search element for field id_video_codec
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_id_video_codec( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysVideoCodec_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysVideoCodec_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysVideoCodec_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdVideoCodec = $this->view->newItem( 'input'.$this->prefix.'IdVideoCodec' , 'WbfsysVideoCodec_Selectbox' );
      $this->items['id_video_codec'] = $inputIdVideoCodec;
      $inputIdVideoCodec->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_video_codec][]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_video_codec'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Video codec (Video Variant)', 'wbfsys.video_variant.label' ),
          'multiple'   => 'multiple',
          'size'       => '5',
        )
      );
      $inputIdVideoCodec->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdVideoCodec->assignedForm = $this->assignedForm;

      $inputIdVideoCodec->setActive( $this->entity->getData( 'id_video_codec' ) );
      $inputIdVideoCodec->setReadOnly( $this->isReadOnly( 'id_video_codec' ) );
      $inputIdVideoCodec->setLabel
      (
        $this->view->i18n->l( 'Video codec', 'wbfsys.video_variant.label' ),
        $this->entity->required( 'id_video_codec' )
      );

      // set an empty first entry
      $inputIdVideoCodec->setFirstFree( 'No video codec selected' );


      $queryIdVideoCodec = $this->db->newQuery( 'WbfsysVideoCodec_Selectbox' );
      $queryIdVideoCodec->fetchSelectbox();
      $inputIdVideoCodec->setData( $queryIdVideoCodec->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );




  }//end public function search_id_video_codec */

 /**
  * create the search element for field id_audio_codec
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_id_audio_codec( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysAudioCodec_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysAudioCodec_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysAudioCodec_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdAudioCodec = $this->view->newItem( 'input'.$this->prefix.'IdAudioCodec' , 'WbfsysAudioCodec_Selectbox' );
      $this->items['id_audio_codec'] = $inputIdAudioCodec;
      $inputIdAudioCodec->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_audio_codec][]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_audio_codec'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Audio codec (Video Variant)', 'wbfsys.video_variant.label' ),
          'multiple'   => 'multiple',
          'size'       => '5',
        )
      );
      $inputIdAudioCodec->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdAudioCodec->assignedForm = $this->assignedForm;

      $inputIdAudioCodec->setActive( $this->entity->getData( 'id_audio_codec' ) );
      $inputIdAudioCodec->setReadOnly( $this->isReadOnly( 'id_audio_codec' ) );
      $inputIdAudioCodec->setLabel
      (
        $this->view->i18n->l( 'Audio codec', 'wbfsys.video_variant.label' ),
        $this->entity->required( 'id_audio_codec' )
      );

      // set an empty first entry
      $inputIdAudioCodec->setFirstFree( 'No audio codec selected' );


      $queryIdAudioCodec = $this->db->newQuery( 'WbfsysAudioCodec_Selectbox' );
      $queryIdAudioCodec->fetchSelectbox();
      $inputIdAudioCodec->setData( $queryIdAudioCodec->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );




  }//end public function search_id_audio_codec */

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

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_video_variant_m_role_create';

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

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_video_variant_m_role_change';

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




}//end class WbfsysVideoVariant_Form */


