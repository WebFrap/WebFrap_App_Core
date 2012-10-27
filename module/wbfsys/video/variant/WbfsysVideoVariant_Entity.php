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
 * Read before change:
 * It's not recommended to change this file inside a Mod or App Project.
 * If you want to change it copy it to a custom project.

 *
 * Entity Class for the Database Table wbfsys_video_variant
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysVideoVariant_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_video_variant';

 /**
  * the name of primary key field in the sql table
  * mostly will be rowid
  * @var string $tablePk
  */
  public static $tablePk   = 'rowid';

 /**
  * the default url to show an entry of this dataset
  * @var string $tablePk
  */
  public static $toUrl     = 'index.php?c=Wbfsys.VideoVariant.show';

 /**
  * all keynames for fields that will be displayed in the textvalue of the entity
  * @var array $textKeys
  */
  public static $textKeys  = array
  (
    'input'  => array( ),
    'text'   => array( ),
  );


 /**
  * the name of the entity in the System
  * @var string $entityName
  */
  public static $entityName  = 'WbfsysVideoVariant';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Video Variant';
      
 /**
  * @var boolean
  */
  public static $trackChanges  = true;
  
 /**
  * @var boolean
  */
  public static $trackCreation = true;
  
 /**
  * @var boolean
  */
  public static $trackDeletion = false;
  
 /**
  * @var boolean
  */
  public static $isSyncable    = true;
        
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $categories = array
  (
    'default' => array
    (
      'id_video'          ,
      'id_video_codec'    ,
      'id_audio_codec'    ,
      'id_licence'        ,
      'width'             ,
      'height'            ,
      'id_lang'           ,
      'file'              ,
      'mimetype'          ,
      'file_size'         ,
      'file_hash'         
    ),
    'description' => array
    (
      'description'       
    ),
    'meta' => array
    (
      'rowid'             ,
      'm_time_created'    ,
      'm_role_create'     ,
      'm_time_changed'    ,
      'm_role_change'     ,
      'm_version'         ,
      'm_uuid'            
    ),
  );

 /**
  * all link references from this entity to other entities
  * @var string $table
  */
  public static $links = array
  (
    'id_video'      => 'wbfsys_video',
    'id_video_codec'=> 'wbfsys_video_codec',
    'id_audio_codec'=> 'wbfsys_audio_codec',
    'id_licence'    => 'wbfsys_content_licence',
    'id_lang'       => 'wbfsys_language',
    'm_role_create' => 'wbfsys_role_user',
    'm_role_change' => 'wbfsys_role_user',
  );

  /**
  * references for this entity
  * @var array
  */
  public static $references = array
  (
  );


 /**
  * the cols of this entity
  *
  * 1: Validator
  * 2: Allows Empty Value?
  * 3: Max Size
  * 4: Min Size
  * 5: Need quotes by embeding in SQL?
  * 6: Is A Searchfield?
  * 7: Is multiple / array in db
  * 8: Main Category
  *
  * @var array
  */
  public static $cols = array
  (
    'id_video' => array
    (
      'eid'     , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    /*
    video codec for video variant
    */
    'id_video_codec' => array
    (
      'eid'     , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      true      , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    /*
    audio codec for video variant
    */
    'id_audio_codec' => array
    (
      'eid'     , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      true      , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'id_licence' => array
    (
      'eid'     , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'width' => array
    (
      'text'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'height' => array
    (
      'text'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    /*
    Language for video variant
    */
    'id_lang' => array
    (
      'eid'     , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'file' => array
    (
      'file'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    /*
    Description for video variant
    */
    'description' => array
    (
      'text'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'description', // the main category for this field
      ''        , // the default value on create
    ),
    'mimetype' => array
    (
      'text'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'file_size' => array
    (
      'text'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'file_hash' => array
    (
      'text'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'rowid' => array
    (
      'eid'     , // Validator 
      true      , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'meta'    , // the main category for this field
      ''        , // the default value on create
    ),
    'm_time_created' => array
    (
      'timestamp', // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'meta'    , // the main category for this field
      ''        , // the default value on create
    ),
    'm_role_create' => array
    (
      'eid'     , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'meta'    , // the main category for this field
      ''        , // the default value on create
    ),
    'm_time_changed' => array
    (
      'timestamp', // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'meta'    , // the main category for this field
      ''        , // the default value on create
    ),
    'm_role_change' => array
    (
      'eid'     , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'meta'    , // the main category for this field
      ''        , // the default value on create
    ),
    'm_version' => array
    (
      'int'     , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'meta'    , // the main category for this field
      ''        , // the default value on create
    ),
    'm_uuid' => array
    (
      'text'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'meta'    , // the main category for this field
      ''        , // the default value on create
    ),
  );

 /**
  * the error messages for this entity
  * @var array
  */
  public static $messages = array
  (
    'id_video' => array
    (
      'default' => 'wbfsys.video_variant.message.error_def_id_video',
      'wrong'   => 'wbfsys.video_variant.message.error_wrong_id_video',
      'max'     => 'wbfsys.video_variant.message.error_max_id_video',
      'min'     => 'wbfsys.video_variant.message.error_min_id_video',
    ),

    'id_video_codec' => array
    (
      'default' => 'wbfsys.video_variant.message.error_def_id_video_codec',
      'wrong'   => 'wbfsys.video_variant.message.error_wrong_id_video_codec',
      'max'     => 'wbfsys.video_variant.message.error_max_id_video_codec',
      'min'     => 'wbfsys.video_variant.message.error_min_id_video_codec',
    ),

    'id_audio_codec' => array
    (
      'default' => 'wbfsys.video_variant.message.error_def_id_audio_codec',
      'wrong'   => 'wbfsys.video_variant.message.error_wrong_id_audio_codec',
      'max'     => 'wbfsys.video_variant.message.error_max_id_audio_codec',
      'min'     => 'wbfsys.video_variant.message.error_min_id_audio_codec',
    ),

    'id_licence' => array
    (
      'default' => 'wbfsys.video_variant.message.error_def_id_licence',
      'wrong'   => 'wbfsys.video_variant.message.error_wrong_id_licence',
      'max'     => 'wbfsys.video_variant.message.error_max_id_licence',
      'min'     => 'wbfsys.video_variant.message.error_min_id_licence',
    ),

    'width' => array
    (
      'default' => 'wbfsys.video_variant.message.error_def_width',
      'wrong'   => 'wbfsys.video_variant.message.error_wrong_width',
      'max'     => 'wbfsys.video_variant.message.error_max_width',
      'min'     => 'wbfsys.video_variant.message.error_min_width',
    ),

    'height' => array
    (
      'default' => 'wbfsys.video_variant.message.error_def_height',
      'wrong'   => 'wbfsys.video_variant.message.error_wrong_height',
      'max'     => 'wbfsys.video_variant.message.error_max_height',
      'min'     => 'wbfsys.video_variant.message.error_min_height',
    ),

    'id_lang' => array
    (
      'default' => 'wbfsys.video_variant.message.error_def_id_lang',
      'wrong'   => 'wbfsys.video_variant.message.error_wrong_id_lang',
      'max'     => 'wbfsys.video_variant.message.error_max_id_lang',
      'min'     => 'wbfsys.video_variant.message.error_min_id_lang',
    ),

    'file' => array
    (
      'default' => 'wbfsys.video_variant.message.error_def_file',
      'wrong'   => 'wbfsys.video_variant.message.error_wrong_file',
      'max'     => 'wbfsys.video_variant.message.error_max_file',
      'min'     => 'wbfsys.video_variant.message.error_min_file',
    ),

    'description' => array
    (
      'default' => 'wbfsys.video_variant.message.error_def_description',
      'wrong'   => 'wbfsys.video_variant.message.error_wrong_description',
      'max'     => 'wbfsys.video_variant.message.error_max_description',
      'min'     => 'wbfsys.video_variant.message.error_min_description',
    ),

    'mimetype' => array
    (
      'default' => 'wbfsys.video_variant.message.error_def_mimetype',
      'wrong'   => 'wbfsys.video_variant.message.error_wrong_mimetype',
      'max'     => 'wbfsys.video_variant.message.error_max_mimetype',
      'min'     => 'wbfsys.video_variant.message.error_min_mimetype',
    ),

    'file_size' => array
    (
      'default' => 'wbfsys.video_variant.message.error_def_file_size',
      'wrong'   => 'wbfsys.video_variant.message.error_wrong_file_size',
      'max'     => 'wbfsys.video_variant.message.error_max_file_size',
      'min'     => 'wbfsys.video_variant.message.error_min_file_size',
    ),

    'file_hash' => array
    (
      'default' => 'wbfsys.video_variant.message.error_def_file_hash',
      'wrong'   => 'wbfsys.video_variant.message.error_wrong_file_hash',
      'max'     => 'wbfsys.video_variant.message.error_max_file_hash',
      'min'     => 'wbfsys.video_variant.message.error_min_file_hash',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.video_variant.message.error_def_rowid',
      'wrong'   => 'wbfsys.video_variant.message.error_wrong_rowid',
      'empty'   => 'wbfsys.video_variant.message.error_empty_rowid',
      'max'     => 'wbfsys.video_variant.message.error_max_rowid',
      'min'     => 'wbfsys.video_variant.message.error_min_rowid',
    ),
  );

}//end class WbfsysVideoVariant_Entity


