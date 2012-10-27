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
class WbfsysImageVariant_Crud_Edit_Form
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
  public $namespace  = 'WbfsysImageVariant';

  /**
   * prename for the ui elements to avoid redundant names in the forms
   * normally the entity key (the tablename), is used
   *
   * @setter WgtCrudForm::setPrefix()
   * @getter WgtCrudForm::getPrefix()
   * @var string 
   */
  public $prefix      = 'WbfsysImageVariant';

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
      'wbfsys_image_variant' => array
      (
        'id_image' => array
        ( 
          'required'  => false, 
          'readonly'  => false, 
          'lenght'    => '',
        ),
        'id_format' => array
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
   * @var WbfsysImageVariant_Entity 
   */
  public $entity      = null;
  
  /**
  * Erfragen der Haupt Entity 
  * @param int $objid
  * @return WbfsysImageVariant_Entity
  */
  public function getEntity( )
  {

    return $this->entity;

  }//end public function getEntity */
    
  /**
  * Setzen der Haupt Entity 
  * @param WbfsysImageVariant_Entity $entity
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
      'wbfsys_image_variant' => array
      (
        'id_image',
        'id_format',
        'id_licence',
        'width',
        'height',
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
  * create an IO form for the WbfsysImageVariant entity
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
    $this->view->addVar( 'entityWbfsysImageVariant', $this->entity );


    $this->db     = $this->getDb();
    
    if( !$this->suffix )
    {
      if( 'create' != $params->context )
        $this->suffix = $this->rowid?:null;
    }

    if( $this->target )
      $sendTo = 'wgt-input-'.$this->target.'-tostring';
    else
      $sendTo = 'wgt-input-wbfsys_image_variant'.($this->suffix?'-'.$this->suffix:'').'-tostring';

    $this->customize();

    $inputToString = $this->view->newInput( 'input'.$this->prefix.'ToString' , 'Text' );
    $inputToString->addAttributes
    (
      array
      (
        'name'  => 'wbfsys_image_variant[id_wbfsys_image_variant-tostring]',
        'id'    => $sendTo,
        'value' => $this->entity->text(),
      )
    );

    $inputToString->setReadOnly( $this->readOnly );
    $inputToString->refresh = $this->refresh;

    $this->input_WbfsysImageVariant_IdImage( $params );
    $this->input_WbfsysImageVariant_IdFormat( $params );
    $this->input_WbfsysImageVariant_IdLicence( $params );
    $this->input_WbfsysImageVariant_Width( $params );
    $this->input_WbfsysImageVariant_Height( $params );
    $this->input_WbfsysImageVariant_File( $params );
    $this->input_WbfsysImageVariant_Description( $params );
    $this->input_WbfsysImageVariant_Mimetype( $params );
    $this->input_WbfsysImageVariant_FileSize( $params );
    $this->input_WbfsysImageVariant_FileHash( $params );
    $this->input_WbfsysImageVariant_Rowid( $params );
    $this->input_WbfsysImageVariant_MTimeCreated( $params );
    $this->input_WbfsysImageVariant_MRoleCreate( $params );
    $this->input_WbfsysImageVariant_MTimeChanged( $params );
    $this->input_WbfsysImageVariant_MRoleChange( $params );
    $this->input_WbfsysImageVariant_MVersion( $params );
    $this->input_WbfsysImageVariant_MUuid( $params );


  }//end public function renderForm */

 /**
  * create the ui element for field id_image
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysImageVariant_IdImage( $params )
  {
    $i18n     = $this->view->i18n;

    if( !Webfrap::classLoadable( 'WbfsysImage_Entity' ) )
    {
      if(DEBUG)
        Debug::console( 'Entity WbfsysImage not exists' );

      Log::warn( 'Looks like the Entity: WbfsysImage is missing' );

      return;
    }


      //p: Window
      $objidWbfsysImage = $this->entity->getData( 'id_image' ) ;

      // entity ids can never be 0 so thats ok
      if
      (
        !$objidWbfsysImage
          || !$entityWbfsysImage = $this->db->orm->get
          (
            'WbfsysImage',
            $objidWbfsysImage
          )
      )
      {
        $entityWbfsysImage = $this->db->orm->newEntity( 'WbfsysImage' );
      }

      $inputIdImage = $this->view->newInput( 'inputWbfsysImageVariantIdImage', 'Window' );
      $this->items['wbfsys_image_variant-id_image'] = $inputIdImage;
      $inputIdImage->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_image_variant[id_image]',
        'id'        => 'wgt-input-wbfsys_image_variant_id_image'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Image', 'src' => 'Image Variant' ) ),
      ));

      if( $this->assignedForm )
        $inputIdImage->assignedForm = $this->assignedForm;

      $inputIdImage->setWidth( 'medium' );

      $inputIdImage->setData( $this->entity->getData( 'id_image' )  );
      $inputIdImage->setReadonly( $this->fieldReadOnly( 'wbfsys_image_variant', 'id_image' ) );
      $inputIdImage->setRequired( $this->fieldRequired( 'wbfsys_image_variant', 'id_image' ) );
      $inputIdImage->setLabel( $i18n->l( 'Image', 'wbfsys.image_variant.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.Image.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_image_variant_id_image'.($this->suffix?'-'.$this->suffix:'');

      $inputIdImage->setListUrl ( $listUrl );
      $inputIdImage->setListIcon( 'control/connect.png' );
      $inputIdImage->setEntityUrl( 'maintab.php?c=Wbfsys.Image.edit' );
      $inputIdImage->conEntity         = $entityWbfsysImage;
      $inputIdImage->refresh           = $this->refresh;
      $inputIdImage->serializeElement  = $this->sendElement;



      $inputIdImage->view = $this->view;
      $inputIdImage->buildJavascript( 'wgt-input-wbfsys_image_variant_id_image'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdImage );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysImageVariant_IdImage */

 /**
  * create the ui element for field id_format
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysImageVariant_IdFormat( $params )
  {
    $i18n     = $this->view->i18n;
    
    if( !isset( $this->listElementData['wbfsys_image_variant_id_format'] ) )
    {
      if( !Webfrap::classLoadable( 'WbfsysImageFormat_Selectbox' ) )
      {
        if( DEBUG )
          Debug::console( 'WbfsysImageFormat_Selectbox not exists' );
  
        Log::warn( 'Looks like Selectbox: WbfsysImageFormat_Selectbox is missing' );
  
        return;
      }
    }


      //p: Selectbox
      $inputIdFormat = $this->view->newItem( 'inputWbfsysImageVariantIdFormat', 'WbfsysImageFormat_Selectbox' );
      $this->items['wbfsys_image_variant-id_format'] = $inputIdFormat;
      $inputIdFormat->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_image_variant[id_format]',
          'id'        => 'wgt-input-wbfsys_image_variant_id_format'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Format', 'src' => 'Image Variant' ) ),
        )
      );
      $inputIdFormat->setWidth( 'medium' );


      if( $this->assignedForm )
        $inputIdFormat->assignedForm = $this->assignedForm;

      $inputIdFormat->setActive( $this->entity->getData( 'id_format' ) );
      $inputIdFormat->setReadonly( $this->fieldReadOnly( 'wbfsys_image_variant', 'id_format' ) );
      $inputIdFormat->setRequired( $this->fieldRequired( 'wbfsys_image_variant', 'id_format' ) );


      $inputIdFormat->setLabel( $i18n->l( 'Format', 'wbfsys.image_variant.label' ) );


      $acl = $this->getAcl();

      if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_image_format:insert' ) )
      {
        $inputIdFormat->refresh           = $this->refresh;
        $inputIdFormat->serializeElement  = $this->sendElement;
        $inputIdFormat->editUrl = 'index.php?c=Wbfsys.ImageFormat.listing&amp;target='.$this->namespace.'&amp;field=id_format&amp;publish=selectbox&amp;suffix='.$this->suffix.'&amp;input_id=wgt-input-wbfsys_image_variant_id_format'.$this->suffix;
      }
      // set an empty first entry
      $inputIdFormat->setFirstFree( 'No Format selected' );

      
      $queryIdFormat = null;
      // prüfen ob nicht schon custom daten gesetzt wurden
      if( !isset( $this->listElementData['wbfsys_image_variant_id_format'] ) )
      {
      
        $queryIdFormat = $this->db->newQuery( 'WbfsysImageFormat_Selectbox' );

        $queryIdFormat->fetchSelectbox();
        $inputIdFormat->setData( $queryIdFormat->getAll() );
      
      }
      else
      {
        $inputIdFormat->setData( $this->listElementData['wbfsys_image_variant_id_format'] );
      }
      
      // fallback funktion um den aktiven datensatz laden zu können, auch wenn 
      // er von filtern in dern selectbox eigentlich ausgeblendet wurde
      // wird nur ausgeführt denn der aktive datensatz nicht in der liste 
      // vorhanden ist
      
      if( !$queryIdFormat )
        $queryIdFormat = $this->db->newQuery( 'WbfsysImageFormat_Selectbox' );
      
      $inputIdFormat->loadActive = function( $activeId ) use ( $queryIdFormat ){
 
        return $queryIdFormat->fetchSelectboxEntry( $activeId );
        
      };
      

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysImageVariant_IdFormat */

 /**
  * create the ui element for field id_licence
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysImageVariant_IdLicence( $params )
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

      $inputIdLicence = $this->view->newInput( 'inputWbfsysImageVariantIdLicence', 'Window' );
      $this->items['wbfsys_image_variant-id_licence'] = $inputIdLicence;
      $inputIdLicence->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_image_variant[id_licence]',
        'id'        => 'wgt-input-wbfsys_image_variant_id_licence'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Licence', 'src' => 'Image Variant' ) ),
      ));

      if( $this->assignedForm )
        $inputIdLicence->assignedForm = $this->assignedForm;

      $inputIdLicence->setWidth( 'medium' );

      $inputIdLicence->setData( $this->entity->getData( 'id_licence' )  );
      $inputIdLicence->setReadonly( $this->fieldReadOnly( 'wbfsys_image_variant', 'id_licence' ) );
      $inputIdLicence->setRequired( $this->fieldRequired( 'wbfsys_image_variant', 'id_licence' ) );
      $inputIdLicence->setLabel( $i18n->l( 'Licence', 'wbfsys.image_variant.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.ContentLicence.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_image_variant_id_licence'.($this->suffix?'-'.$this->suffix:'');

      $inputIdLicence->setListUrl ( $listUrl );
      $inputIdLicence->setListIcon( 'control/connect.png' );
      $inputIdLicence->setEntityUrl( 'maintab.php?c=Wbfsys.ContentLicence.edit' );
      $inputIdLicence->conEntity         = $entityWbfsysContentLicence;
      $inputIdLicence->refresh           = $this->refresh;
      $inputIdLicence->serializeElement  = $this->sendElement;



      $inputIdLicence->view = $this->view;
      $inputIdLicence->buildJavascript( 'wgt-input-wbfsys_image_variant_id_licence'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputIdLicence );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );

  }//end public function input_WbfsysImageVariant_IdLicence */

 /**
  * create the ui element for field width
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysImageVariant_Width( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputWidth = $this->view->newInput( 'inputWbfsysImageVariantWidth', 'Int' );
      $this->items['wbfsys_image_variant-width'] = $inputWidth;
      $inputWidth->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_image_variant[width]',
          'id'        => 'wgt-input-wbfsys_image_variant_width'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Width', 'src' => 'Image Variant' ) ),
        )
      );
      $inputWidth->setWidth( 'medium' );

$inputWidth->setReadOnly( $this->fieldReadOnly( 'wbfsys_image_variant', 'width' ) );
      $inputWidth->setRequired( $this->fieldRequired( 'wbfsys_image_variant', 'width' ) );
      $inputWidth->setData( $this->entity->getData( 'width' ) );
      $inputWidth->setLabel( $i18n->l( 'Width', 'wbfsys.image_variant.label' ) );

      $inputWidth->refresh           = $this->refresh;
      $inputWidth->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysImageVariant_Width */

 /**
  * create the ui element for field height
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysImageVariant_Height( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputHeight = $this->view->newInput( 'inputWbfsysImageVariantHeight', 'Int' );
      $this->items['wbfsys_image_variant-height'] = $inputHeight;
      $inputHeight->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_image_variant[height]',
          'id'        => 'wgt-input-wbfsys_image_variant_height'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Height', 'src' => 'Image Variant' ) ),
        )
      );
      $inputHeight->setWidth( 'medium' );

$inputHeight->setReadOnly( $this->fieldReadOnly( 'wbfsys_image_variant', 'height' ) );
      $inputHeight->setRequired( $this->fieldRequired( 'wbfsys_image_variant', 'height' ) );
      $inputHeight->setData( $this->entity->getData( 'height' ) );
      $inputHeight->setLabel( $i18n->l( 'Height', 'wbfsys.image_variant.label' ) );

      $inputHeight->refresh           = $this->refresh;
      $inputHeight->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysImageVariant_Height */

 /**
  * create the ui element for field file
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysImageVariant_File( $params )
  {
    $i18n     = $this->view->i18n;

      //p: input file
      $inputFile = $this->view->newInput( 'inputWbfsysImageVariantFile' , 'File' );
      $inputFile->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_image_variant[file]',
          'id'        => 'wgt-input-wbfsys_image_variant_file'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium',
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'File', 'src' => 'Image Variant' ) ),
        )
      );
      $inputFile->setWidth( 'medium' );
      $inputFile->setData( $this->entity->getSecure( 'file' ) );
      $inputFile->setReadonly( $this->fieldReadOnly( 'wbfsys_image_variant', 'file' ) );
      $inputFile->setRequired( $this->fieldRequired( 'wbfsys_image_variant', 'file' ) );

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
          'file.php?f=wbfsys_image_variant-file-'.$objid.'&amp;n='
            .base64_encode( $this->entity->file )
        );
      }

      $inputFile->setLabel( $i18n->l( 'File', 'wbfsys.image_variant.label' ) );


      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysImageVariant_File */

 /**
  * create the ui element for field description
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysImageVariant_Description( $params )
  {
    $i18n     = $this->view->i18n;

      //p: textarea
      $inputDescription = $this->view->newInput( 'inputWbfsysImageVariantDescription', 'Textarea' );
      $this->items['wbfsys_image_variant-description'] = $inputDescription;
      $inputDescription->addAttributes
      (
        array
        (
          'name'  => 'wbfsys_image_variant[description]',
          'id'    => 'wgt-input-wbfsys_image_variant_description'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip full medium-height'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title' => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Description', 'src' => 'Image Variant' ) ),
        )
      );
      $inputDescription->setWidth( 'full' );

      $inputDescription->full = true;
      $inputDescription->setReadonly( $this->fieldReadOnly( 'wbfsys_image_variant', 'description' ) );
      $inputDescription->setRequired( $this->fieldRequired( 'wbfsys_image_variant', 'description' ) );

      $inputDescription->setData( $this->entity->getSecure( 'description' ) );
      $inputDescription->setLabel( $i18n->l( 'Description', 'wbfsys.image_variant.label' ) );

      $inputDescription->refresh           = $this->refresh;
      $inputDescription->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Description' ,
        true
      );


  }//end public function input_WbfsysImageVariant_Description */

 /**
  * create the ui element for field mimetype
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysImageVariant_Mimetype( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputMimetype = $this->view->newInput( 'inputWbfsysImageVariantMimetype', 'Hidden' );
      $this->items['wbfsys_image_variant-mimetype'] = $inputMimetype;
      $inputMimetype->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_image_variant[mimetype]',
          'id'        => 'wgt-input-wbfsys_image_variant_mimetype'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Mimetype', 'src' => 'Image Variant' ) ),
          'maxlength' => $this->entity->maxSize( 'mimetype' ),
        )
      );
      $inputMimetype->setWidth( 'medium' );

      $inputMimetype->setData( $this->entity->getSecure( 'mimetype' ) );
      $inputMimetype->refresh           = $this->refresh;
      $inputMimetype->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysImageVariant_Mimetype */

 /**
  * create the ui element for field file_size
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysImageVariant_FileSize( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:int
      $inputFileSize = $this->view->newInput( 'inputWbfsysImageVariantFileSize', 'Int' );
      $this->items['wbfsys_image_variant-file_size'] = $inputFileSize;
      $inputFileSize->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_image_variant[file_size]',
          'id'        => 'wgt-input-wbfsys_image_variant_file_size'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'File Size', 'src' => 'Image Variant' ) ),
        )
      );
      $inputFileSize->setWidth( 'medium' );

$inputFileSize->setReadOnly( $this->fieldReadOnly( 'wbfsys_image_variant', 'file_size' ) );
      $inputFileSize->setRequired( $this->fieldRequired( 'wbfsys_image_variant', 'file_size' ) );
      $inputFileSize->setData( $this->entity->getData( 'file_size' ) );
      $inputFileSize->setLabel( $i18n->l( 'File Size', 'wbfsys.image_variant.label' ) );

      $inputFileSize->refresh           = $this->refresh;
      $inputFileSize->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Default' ,
        true
      );


  }//end public function input_WbfsysImageVariant_FileSize */

 /**
  * create the ui element for field file_hash
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysImageVariant_FileHash( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:hidden
      $inputFileHash = $this->view->newInput( 'inputWbfsysImageVariantFileHash', 'Hidden' );
      $this->items['wbfsys_image_variant-file_hash'] = $inputFileHash;
      $inputFileHash->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_image_variant[file_hash]',
          'id'        => 'wgt-input-wbfsys_image_variant_file_hash'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'File Hash', 'src' => 'Image Variant' ) ),
          'maxlength' => $this->entity->maxSize( 'file_hash' ),
        )
      );
      $inputFileHash->setWidth( 'medium' );

      $inputFileHash->setData( $this->entity->getSecure( 'file_hash' ) );
      $inputFileHash->refresh           = $this->refresh;
      $inputFileHash->serializeElement  = $this->sendElement;


  }//end public function input_WbfsysImageVariant_FileHash */

 /**
  * create the ui element for field rowid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysImageVariant_Rowid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputRowid = $this->view->newInput( 'inputWbfsysImageVariantRowid' , 'int' );
      $this->items['wbfsys_image_variant-rowid'] = $inputRowid;
      $inputRowid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_image_variant[rowid]',
          'id'        => 'wgt-input-wbfsys_image_variant_rowid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_required medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Rowid', 'src' => 'Image Variant' ) ),
        )
      );
      $inputRowid->setWidth( 'medium' );

      $inputRowid->setReadonly( $this->fieldReadOnly( 'wbfsys_image_variant', 'rowid' ) );
      $inputRowid->setRequired( $this->fieldRequired( 'wbfsys_image_variant', 'rowid' ) );
      $inputRowid->setData( $this->entity->getId() );
      $inputRowid->setLabel( $i18n->l( 'Rowid', 'wbfsys.image_variant.label' ) );

      $inputRowid->refresh           = $this->refresh;
      $inputRowid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysImageVariant_Rowid */

 /**
  * create the ui element for field m_time_created
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysImageVariant_MTimeCreated( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeCreated = $this->view->newInput( 'inputWbfsysImageVariantMTimeCreated' , 'Date' );
      $this->items['wbfsys_image_variant-m_time_created'] = $inputMTimeCreated;
      $inputMTimeCreated->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_image_variant[m_time_created]',
          'id'        => 'wgt-input-wbfsys_image_variant_m_time_created'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Created', 'src' => 'Image Variant' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_created' ),
        )
      );
      $inputMTimeCreated->setWidth( 'small' );

      $inputMTimeCreated->setReadonly( $this->fieldReadOnly( 'wbfsys_image_variant', 'm_time_created' ) );
      $inputMTimeCreated->setRequired( $this->fieldRequired( 'wbfsys_image_variant', 'm_time_created' ) );
      $inputMTimeCreated->setData( $this->entity->getDate( 'm_time_created' ) );
      $inputMTimeCreated->setLabel( $i18n->l( 'Time Created', 'wbfsys.image_variant.label' ) );

      $inputMTimeCreated->refresh           = $this->refresh;
      $inputMTimeCreated->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysImageVariant_MTimeCreated */

 /**
  * create the ui element for field m_role_create
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysImageVariant_MRoleCreate( $params )
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

      $inputMRoleCreate = $this->view->newInput( 'inputWbfsysImageVariantMRoleCreate', 'Window' );
      $this->items['wbfsys_image_variant-m_role_create'] = $inputMRoleCreate;
      $inputMRoleCreate->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_image_variant[m_role_create]',
        'id'        => 'wgt-input-wbfsys_image_variant_m_role_create'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Create', 'src' => 'Image Variant' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleCreate->assignedForm = $this->assignedForm;

      $inputMRoleCreate->setWidth( 'medium' );

      $inputMRoleCreate->setData( $this->entity->getData( 'm_role_create' )  );
      $inputMRoleCreate->setReadonly( $this->fieldReadOnly( 'wbfsys_image_variant', 'm_role_create' ) );
      $inputMRoleCreate->setRequired( $this->fieldRequired( 'wbfsys_image_variant', 'm_role_create' ) );
      $inputMRoleCreate->setLabel( $i18n->l( 'Role Create', 'wbfsys.image_variant.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_image_variant_m_role_create'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleCreate->buildJavascript( 'wgt-input-wbfsys_image_variant_m_role_create'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleCreate );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysImageVariant_MRoleCreate */

 /**
  * create the ui element for field m_time_changed
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysImageVariant_MTimeChanged( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui:date
      $inputMTimeChanged = $this->view->newInput( 'inputWbfsysImageVariantMTimeChanged' , 'Date' );
      $this->items['wbfsys_image_variant-m_time_changed'] = $inputMTimeChanged;
      $inputMTimeChanged->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_image_variant[m_time_changed]',
          'id'        => 'wgt-input-wbfsys_image_variant_m_time_changed'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip small'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Time Changed', 'src' => 'Image Variant' ) ),
          'maxlength' => $this->entity->maxSize( 'm_time_changed' ),
        )
      );
      $inputMTimeChanged->setWidth( 'small' );

      $inputMTimeChanged->setReadonly( $this->fieldReadOnly( 'wbfsys_image_variant', 'm_time_changed' ) );
      $inputMTimeChanged->setRequired( $this->fieldRequired( 'wbfsys_image_variant', 'm_time_changed' ) );
      $inputMTimeChanged->setData( $this->entity->getDate( 'm_time_changed' ) );
      $inputMTimeChanged->setLabel( $i18n->l( 'Time Changed', 'wbfsys.image_variant.label' ) );

      $inputMTimeChanged->refresh           = $this->refresh;
      $inputMTimeChanged->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );


  }//end public function input_WbfsysImageVariant_MTimeChanged */

 /**
  * create the ui element for field m_role_change
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysImageVariant_MRoleChange( $params )
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

      $inputMRoleChange = $this->view->newInput( 'inputWbfsysImageVariantMRoleChange', 'Window' );
      $this->items['wbfsys_image_variant-m_role_change'] = $inputMRoleChange;
      $inputMRoleChange->addAttributes(array
      (
        'readonly'  => 'readonly',
        'name'      => 'wbfsys_image_variant[m_role_change]',
        'id'        => 'wgt-input-wbfsys_image_variant_m_role_change'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
        'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Role Change', 'src' => 'Image Variant' ) ),
      ));

      if( $this->assignedForm )
        $inputMRoleChange->assignedForm = $this->assignedForm;

      $inputMRoleChange->setWidth( 'medium' );

      $inputMRoleChange->setData( $this->entity->getData( 'm_role_change' )  );
      $inputMRoleChange->setReadonly( $this->fieldReadOnly( 'wbfsys_image_variant', 'm_role_change' ) );
      $inputMRoleChange->setRequired( $this->fieldRequired( 'wbfsys_image_variant', 'm_role_change' ) );
      $inputMRoleChange->setLabel( $i18n->l( 'Role Change', 'wbfsys.image_variant.label' ) );


      $listUrl = 'modal.php?c=Wbfsys.RoleUser.selection'
        .'&amp;suffix='.$this->suffix.'&amp;input=wbfsys_image_variant_m_role_change'.($this->suffix?'-'.$this->suffix:'');

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
      $inputMRoleChange->buildJavascript( 'wgt-input-wbfsys_image_variant_m_role_change'.($this->suffix?'-'.$this->suffix:'') );
      $this->view->addJsCode( $inputMRoleChange );

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );

  }//end public function input_WbfsysImageVariant_MRoleChange */

 /**
  * create the ui element for field m_version
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysImageVariant_MVersion( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMVersion = $this->view->newInput( 'inputWbfsysImageVariantMVersion' , 'int' );
      $this->items['wbfsys_image_variant-m_version'] = $inputMVersion;
      $inputMVersion->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_image_variant[m_version]',
          'id'        => 'wgt-input-wbfsys_image_variant_m_version'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip wcm_valid_int medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Version', 'src' => 'Image Variant' ) ),
        )
      );
      $inputMVersion->setWidth( 'medium' );

      $inputMVersion->setReadonly( $this->fieldReadOnly( 'wbfsys_image_variant', 'm_version' ) );
      $inputMVersion->setRequired( $this->fieldRequired( 'wbfsys_image_variant', 'm_version' ) );
      $inputMVersion->setData( $this->entity->getSecure( 'm_version' ) );
      $inputMVersion->setLabel( $i18n->l( 'Version', 'wbfsys.image_variant.label' ) );

      $inputMVersion->refresh           = $this->refresh;
      $inputMVersion->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysImageVariant_MVersion */

 /**
  * create the ui element for field m_uuid
  * @param TFlag $params named parameters
  * @return void
  */
  public function input_WbfsysImageVariant_MUuid( $params )
  {
    $i18n     = $this->view->i18n;

      //tpl: class ui: guess
      $inputMUuid = $this->view->newInput( 'inputWbfsysImageVariantMUuid' , 'Text' );
      $this->items['wbfsys_image_variant-m_uuid'] = $inputMUuid;
      $inputMUuid->addAttributes
      (
        array
        (
          'name'      => 'wbfsys_image_variant[m_uuid]',
          'id'        => 'wgt-input-wbfsys_image_variant_m_uuid'.($this->suffix?'-'.$this->suffix:''),
          'class'     => 'wcm wcm_ui_tip medium'.($this->assignedForm?' asgd-'.$this->assignedForm:''),
          'title'     => $i18n->l( 'Insert value for {@attr@} ({@src@})', 'wbf.label', array( 'attr' => 'Uuid', 'src' => 'Image Variant' ) ),
        )
      );
      $inputMUuid->setWidth( 'medium' );

      $inputMUuid->setReadonly( $this->fieldReadOnly( 'wbfsys_image_variant', 'm_uuid' ) );
      $inputMUuid->setRequired( $this->fieldRequired( 'wbfsys_image_variant', 'm_uuid' ) );
      $inputMUuid->setData( $this->entity->getSecure( 'm_uuid' ) );
      $inputMUuid->setLabel( $i18n->l( 'Uuid', 'wbfsys.image_variant.label' ) );

      $inputMUuid->refresh           = $this->refresh;
      $inputMUuid->serializeElement  = $this->sendElement;

      // activate the category
      $this->view->addVar
      (
        'showCat'.$this->namespace.'_Meta' ,
        true
      );



  }//end public function input_WbfsysImageVariant_MUuid */

////////////////////////////////////////////////////////////////////////////////
// Validate Methodes
////////////////////////////////////////////////////////////////////////////////
    

}//end class WbfsysImageVariant_Crud_Edit_Form */


