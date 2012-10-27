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
class WbfsysAudio_Form
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
  public $keyName     = 'wbfsys_audio';

  /**
   * the cname for the entities, is used to request metadata from the orm
   * @setter WgtForm::setEntityName()
   * @getter WgtForm::getEntityName()
   * @var string 
   */
  public $entityName  = 'WbfsysAudio';

  /**
   * namespace for the actual form
   * @setter WgtForm::setNamespace()
   * @getter WgtForm::getNamespace()
   * @var string 
   */
  public $namespace  = 'WbfsysAudio';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtForm::setPrefix()
   * @getter WgtForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysAudio';

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
   * @var WbfsysAudio_Entity 
   */
  public $entity      = null;
  
////////////////////////////////////////////////////////////////////////////////
// form methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * create an IO form for the WbfsysAudio entity
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
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysAudio' );
      }
    }

  }//end public function createForm */

 /**
  * create a search form for the WbfsysAudio entity
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
          Debug::console( 'Call to nonexisting method: '.$method.' in Form: WbfsysAudio' );
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
  * create the ui element for field title
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_title( $params )
  {

      //tpl: class ui:text
      $inputTitle = $this->view->newInput( 'input'.$this->prefix.'Title' , 'Text' );
      $this->items['title'] = $inputTitle;
      $inputTitle->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[title]',
          'id'        => 'wgt-input-'.$this->keyName.'_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip xxlarge'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Title (Audio)', 'wbfsys.audio.label' ),
          'maxlength' => $this->entity->maxSize( 'title' ),
        )
      );
      $inputTitle->setWidth( 'xxlarge' );

      $inputTitle->setReadOnly( $this->isReadOnly( 'title' ) );
      $inputTitle->setData( $this->entity->getSecure('title') );
      $inputTitle->setLabel
      (
        $this->view->i18n->l( 'Title', 'wbfsys.audio.label' ),
        $this->entity->required( 'title' )
      );

      $inputTitle->refresh           = $this->refresh;
      $inputTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_title */

 /**
  * create the ui element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_access_key( $params )
  {

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'input'.$this->prefix.'AccessKey' , 'Text' );
      $this->items['access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[access_key]',
          'id'        => 'wgt-input-'.$this->keyName.'_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_cname medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Access Key (Audio)', 'wbfsys.audio.label' ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadOnly( $this->isReadOnly( 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel
      (
        $this->view->i18n->l( 'Access Key', 'wbfsys.audio.label' ),
        $this->entity->required( 'access_key' )
      );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_access_key */

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
        'title'     => $this->view->i18n->l( 'Insert value for Licence (Audio)', 'wbfsys.audio.label' ),
      ));

      if( $this->assignedForm )
        $inputIdLicence->assignedForm = $this->assignedForm;

      $inputIdLicence->setWidth( 'medium' );

      $inputIdLicence->setData( $this->entity->getData( 'id_licence' )  );
      $inputIdLicence->setReadOnly( $this->isReadOnly( 'id_licence' ) );
      $inputIdLicence->setLabel( $this->view->i18n->l( 'Licence', 'wbfsys.audio.label' ) );


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
  * create the ui element for field id_confidentiality
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_confidentiality( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysConfidentialityLevel_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysConfidentialityLevel_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysConfidentialityLevel_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdConfidentiality = $this->view->newItem( 'input'.$this->prefix.'IdConfidentiality' , 'WbfsysConfidentialityLevel_Selectbox' );
      $this->items['id_confidentiality'] = $inputIdConfidentiality;
      $inputIdConfidentiality->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_confidentiality]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_confidentiality'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Confidentiality (Audio)', 'wbfsys.audio.label' ),
        )
      );
      $inputIdConfidentiality->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdConfidentiality->assignedForm = $this->assignedForm;

      $inputIdConfidentiality->setActive( $this->entity->getData( 'id_confidentiality' ) );
      $inputIdConfidentiality->setReadOnly( $this->isReadOnly( 'id_confidentiality' ) );
      $inputIdConfidentiality->setLabel
      (
        $this->view->i18n->l( 'Confidentiality', 'wbfsys.audio.label' ),
        $this->entity->required( 'id_confidentiality' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:insert' ) )
      {
        $inputIdConfidentiality->refresh           = $this->refresh;
        $inputIdConfidentiality->serializeElement  = $this->sendElement;
        $inputIdConfidentiality->editUrl = 'index.php?c=Wbfsys.ConfidentialityLevel.listing&amp;target='.$this->namespace.'&amp;field=id_confidentiality&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_id_confidentiality'.$this->suffix;
      }
      // set an empty first entry
      $inputIdConfidentiality->setFirstFree( 'No Confidentiality selected' );


      $queryIdConfidentiality = $this->db->newQuery( 'WbfsysConfidentialityLevel_Selectbox' );
      $queryIdConfidentiality->fetchSelectbox();
      $inputIdConfidentiality->setData( $queryIdConfidentiality->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_id_confidentiality */

 /**
  * create the ui element for field id_mediathek
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_mediathek( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysMediathek_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysMediathek not exists' );

      Log::warn('Looks like the Entity: WbfsysMediathek is missing');

      return;
    }


      //p: Window
      $objidWbfsysMediathek = $this->entity->getData('id_mediathek') ;

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

      $inputIdMediathek = $this->view->newInput( 'input'.$this->prefix.'IdMediathek', 'Window' );
      $inputIdMediathek->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => $this->keyName.'[id_mediathek]',
        'id'        => 'wgt-input-'.$this->keyName.'_id_mediathek'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $this->view->i18n->l( 'Insert value for Mediathek (Audio)', 'wbfsys.audio.label' ),
      ));

      if( $this->assignedForm )
        $inputIdMediathek->assignedForm = $this->assignedForm;

      $inputIdMediathek->setWidth( 'medium' );

      $inputIdMediathek->setData( $this->entity->getData( 'id_mediathek' )  );
      $inputIdMediathek->setReadOnly( $this->isReadOnly( 'id_mediathek' ) );
      $inputIdMediathek->setLabel( $this->view->i18n->l( 'Mediathek', 'wbfsys.audio.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Mediathek.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input='.$this->keyName.'_id_mediathek'.($this->suffix?'-'.$this->suffix:'');

      $inputIdMediathek->setListUrl ( $listUrl );
      $inputIdMediathek->setListIcon( 'control/connect.png' );
      $inputIdMediathek->setEntityUrl( 'maintab.php?c=Wbfsys.Mediathek.edit' );
      $inputIdMediathek->conEntity         = $entityWbfsysMediathek;
      $inputIdMediathek->refresh           = $this->refresh;
      $inputIdMediathek->serializeElement  = $this->sendElement;
      


      $inputIdMediathek->view = $this->view;
      $inputIdMediathek->buildJavascript( 'wgt-input-'.$this->keyName.'_id_mediathek'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdMediathek );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_id_mediathek */

 /**
  * create the ui element for field length
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_length( $params )
  {

      //tpl: class ui:int
      $inputLength = $this->view->newInput( 'input'.$this->prefix.'Length' , 'Int' );
      $this->items['length'] = $inputLength;
      $inputLength->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[length]',
          'id'        => 'wgt-input-'.$this->keyName.'_length'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Length (Audio)', 'wbfsys.audio.label' ),
        )
      );
      $inputLength->setWidth( 'medium' );

      $inputLength->setReadOnly( $this->isReadOnly( 'length' ) );
      $inputLength->setData( $this->entity->getData( 'length' ) );
      $inputLength->setLabel
      (
        $this->view->i18n->l( 'Length', 'wbfsys.audio.label' ),
        $this->entity->required( 'length' )
      );

      $inputLength->refresh           = $this->refresh;
      $inputLength->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_length */

 /**
  * create the ui element for field id_codec
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_id_codec( $params )
  {
    if( !Webfrap::classLoadable( 'WbfsysAudioCodec_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysAudioCodec_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysAudioCodec_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdCodec = $this->view->newItem( 'input'.$this->prefix.'IdCodec' , 'WbfsysAudioCodec_Selectbox' );
      $this->items['id_codec'] = $inputIdCodec;
      $inputIdCodec->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_codec]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_codec'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Insert value for Codec (Audio)', 'wbfsys.audio.label' ),
        )
      );
      $inputIdCodec->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdCodec->assignedForm = $this->assignedForm;

      $inputIdCodec->setActive( $this->entity->getData( 'id_codec' ) );
      $inputIdCodec->setReadOnly( $this->isReadOnly( 'id_codec' ) );
      $inputIdCodec->setLabel
      (
        $this->view->i18n->l( 'Codec', 'wbfsys.audio.label' ),
        $this->entity->required( 'id_codec' )
      );

      
      /* @var $acl LibAclAdapter_Db */
      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_audio_codec:insert' ) )
      {
        $inputIdCodec->refresh           = $this->refresh;
        $inputIdCodec->serializeElement  = $this->sendElement;
        $inputIdCodec->editUrl = 'index.php?c=Wbfsys.AudioCodec.listing&amp;target='.$this->namespace.'&amp;field=id_codec&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-'.$this->keyName.'_id_codec'.$this->suffix;
      }
      // set an empty first entry
      $inputIdCodec->setFirstFree( 'No codec selected' );


      $queryIdCodec = $this->db->newQuery( 'WbfsysAudioCodec_Selectbox' );
      $queryIdCodec->fetchSelectbox();
      $inputIdCodec->setData( $queryIdCodec->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );



  }//end public function input_id_codec */

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
          'title'     => $this->view->i18n->l( 'Insert value for File (Audio)', 'wbfsys.audio.label' ),
        )
      );
      $inputFile->setWidth( 'medium' );
      $inputFile->setData( $this->entity->getSecure('file') );
      $inputFile->setReadOnly( $this->isReadOnly( 'file' ) );

      if( $this->assignedForm )
        $inputFile->assignedForm = $this->assignedForm;

      if( ( $objid = $this->entity->getId() ) && $this->entity->file )
        $inputFile->setLink('file.php?f=wbfsys_audio-file-'.$objid.'&amp;n='.base64_encode($this->entity->file));

      $inputFile->setLabel
      (
        $this->view->i18n->l( 'File', 'wbfsys.audio.label' ),
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
        'title'     => $this->view->i18n->l( 'Insert value for Language (Audio)', 'wbfsys.audio.label' ),
      ));

      if( $this->assignedForm )
        $inputIdLang->assignedForm = $this->assignedForm;

      $inputIdLang->setWidth( 'medium' );

      $inputIdLang->setData( $this->entity->getData( 'id_lang' )  );
      $inputIdLang->setReadOnly( $this->isReadOnly( 'id_lang' ) );
      $inputIdLang->setLabel( $this->view->i18n->l( 'Language', 'wbfsys.audio.label' ) );


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
          'title' => $this->view->i18n->l( 'Insert value for Description (Audio)', 'wbfsys.audio.label' ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setData( $this->entity->getSecure('description') );
      $inputDescription->setReadOnly( $this->isReadOnly( 'description' ) );
      $inputDescription->setLabel
      (
        $this->view->i18n->l( 'Description', 'wbfsys.audio.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Mimetype (Audio)', 'wbfsys.audio.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for File Size (Audio)', 'wbfsys.audio.label' ),
        )
      );
      $inputFileSize->setWidth( 'medium' );

      $inputFileSize->setReadOnly( $this->isReadOnly( 'file_size' ) );
      $inputFileSize->setData( $this->entity->getData( 'file_size' ) );
      $inputFileSize->setLabel
      (
        $this->view->i18n->l( 'File Size', 'wbfsys.audio.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for File Hash (Audio)', 'wbfsys.audio.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Rowid (Audio)', 'wbfsys.audio.label' ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadOnly( $this->isReadOnly( 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel
      (
        $this->view->i18n->l( 'Rowid', 'wbfsys.audio.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Time Created (Audio)', 'wbfsys.audio.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadOnly( true );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel
      (
        $this->view->i18n->l( 'Time Created', 'wbfsys.audio.label' ),
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
        'title'     => $this->view->i18n->l( 'Insert value for Role Create (Audio)', 'wbfsys.audio.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadOnly( true );
      $inputMRoleCreate->setLabel( $this->view->i18n->l( 'Role Create', 'wbfsys.audio.label' ) );


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
          'title'     => $this->view->i18n->l( 'Insert value for Time Changed (Audio)', 'wbfsys.audio.label' ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadOnly( true );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel
      (
        $this->view->i18n->l( 'Time Changed', 'wbfsys.audio.label' ),
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
        'title'     => $this->view->i18n->l( 'Insert value for Role Change (Audio)', 'wbfsys.audio.label' ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadOnly( true );
      $inputMRoleChange->setLabel( $this->view->i18n->l( 'Role Change', 'wbfsys.audio.label' ) );


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
          'title'     => $this->view->i18n->l( 'Insert value for Version (Audio)', 'wbfsys.audio.label' ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadOnly( true );
      $inputMVersion->setData( $this->entity->getSecure('m_version') );
      $inputMVersion->setLabel
      (
        $this->view->i18n->l( 'Version', 'wbfsys.audio.label' ),
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
          'title'     => $this->view->i18n->l( 'Insert value for Uuid (Audio)', 'wbfsys.audio.label' ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadOnly( true );
      $inputMUuid->setData( $this->entity->getSecure('m_uuid') );
      $inputMUuid->setLabel
      (
        $this->view->i18n->l( 'Uuid', 'wbfsys.audio.label' ),
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
  * create the search element for field title
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_title( $params )
  {

      //tpl: class ui:text
      $inputTitle = $this->view->newInput( 'input'.$this->prefix.'Title' , 'Text' );
      $this->items['title'] = $inputTitle;
      $inputTitle->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[title]',
          'id'        => 'wgt-input-'.$this->keyName.'_title'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip xxlarge wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Title (Audio)', 'wbfsys.audio.label' ),
          'maxlength' => $this->entity->maxSize( 'title' ),
        )
      );
      $inputTitle->setWidth( 'xxlarge' );

      $inputTitle->setReadOnly( $this->isReadOnly( 'title' ) );
      $inputTitle->setData( $this->entity->getSecure('title') );
      $inputTitle->setLabel
      (
        $this->view->i18n->l( 'Title', 'wbfsys.audio.label' ),
        $this->entity->required( 'title' )
      );

      $inputTitle->refresh           = $this->refresh;
      $inputTitle->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );


  }//end public function search_title */

 /**
  * create the search element for field access_key
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_access_key( $params )
  {

      //tpl: class ui:text
      $inputAccessKey = $this->view->newInput( 'input'.$this->prefix.'AccessKey' , 'Text' );
      $this->items['access_key'] = $inputAccessKey;
      $inputAccessKey->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[access_key]',
          'id'        => 'wgt-input-'.$this->keyName.'_access_key'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip valid_cname medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Access Key (Audio)', 'wbfsys.audio.label' ),
          'maxlength' => $this->entity->maxSize( 'access_key' ),
        )
      );
      $inputAccessKey->setWidth( 'medium' );

      $inputAccessKey->setReadOnly( $this->isReadOnly( 'access_key' ) );
      $inputAccessKey->setData( $this->entity->getSecure('access_key') );
      $inputAccessKey->setLabel
      (
        $this->view->i18n->l( 'Access Key', 'wbfsys.audio.label' ),
        $this->entity->required( 'access_key' )
      );

      $inputAccessKey->refresh           = $this->refresh;
      $inputAccessKey->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );


  }//end public function search_access_key */

 /**
  * create the search element for field id_codec
  * @param TFlag $params named parameters
  * @return void
  */
  public function search_id_codec( $params )
  {

    if( !Webfrap::classLoadable( 'WbfsysAudioCodec_Selectbox' ) )
    {
      if(DEBUG)
        Debug::console( 'WbfsysAudioCodec_Selectbox not exists' );

      Log::warn( 'Looks like Selectbox: WbfsysAudioCodec_Selectbox is missing' );

      return;
    }


      //p: Selectbox
      $inputIdCodec = $this->view->newItem( 'input'.$this->prefix.'IdCodec' , 'WbfsysAudioCodec_Selectbox' );
      $this->items['id_codec'] = $inputIdCodec;
      $inputIdCodec->addAttributes
      (
        array
        (
          'name'      => $this->keyName.'[id_codec][]',
          'id'        => 'wgt-input-'.$this->keyName.'_id_codec'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium wcm_req_search wgt-no-save'.($this->assignedForm?' fparam-'.$this->assignedForm:''),
          'title'     => $this->view->i18n->l( 'Search for Codec (Audio)', 'wbfsys.audio.label' ),
          'multiple'   => 'multiple',
          'size'       => '5',
        )
      );
      $inputIdCodec->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdCodec->assignedForm = $this->assignedForm;

      $inputIdCodec->setActive( $this->entity->getData( 'id_codec' ) );
      $inputIdCodec->setReadOnly( $this->isReadOnly( 'id_codec' ) );
      $inputIdCodec->setLabel
      (
        $this->view->i18n->l( 'Codec', 'wbfsys.audio.label' ),
        $this->entity->required( 'id_codec' )
      );

      // set an empty first entry
      $inputIdCodec->setFirstFree( 'No codec selected' );


      $queryIdCodec = $this->db->newQuery( 'WbfsysAudioCodec_Selectbox' );
      $queryIdCodec->fetchSelectbox();
      $inputIdCodec->setData( $queryIdCodec->getAll() );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Search_Default' ,
        true
      );




  }//end public function search_id_codec */

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

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_audio_m_role_create';

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

    $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection&amp;target=wbfsys_audio_m_role_change';

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




}//end class WbfsysAudio_Form */


