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
 * Entity Class for the Database Table wbfsys_audio
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysAudio_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_audio';

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
  public static $toUrl     = 'index.php?c=Wbfsys.Audio.show';

 /**
  * all keynames for fields that will be displayed in the textvalue of the entity
  * @var array $textKeys
  */
  public static $textKeys  = array
  (
    'input'  => array( 'title'),
    'text'   => array( 'title'),
  );


 /**
  * the name of the entity in the System
  * @var string $entityName
  */
  public static $entityName  = 'WbfsysAudio';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Audio';
      
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
      'title'             ,
      'access_key'        ,
      'id_licence'        ,
      'id_confidentiality',
      'id_mediathek'      ,
      'length'            ,
      'id_codec'          ,
      'file'              ,
      'id_lang'           ,
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
    'id_licence'    => 'wbfsys_content_licence',
    'id_confidentiality'=> 'wbfsys_confidentiality_level',
    'id_mediathek'  => 'wbfsys_mediathek',
    'id_codec'      => 'wbfsys_audio_codec',
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
    /*
    Ttle the audio
    */
    'title' => array
    (
      'text'    , // Validator 
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
    Access Key for audio
    */
    'access_key' => array
    (
      'cname'   , // Validator 
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
    'id_confidentiality' => array
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
    'id_mediathek' => array
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
    'length' => array
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
    codec for audio
    */
    'id_codec' => array
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
    Language for audio
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
    /*
    Description for audio
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
    'title' => array
    (
      'default' => 'wbfsys.audio.message.error_def_title',
      'wrong'   => 'wbfsys.audio.message.error_wrong_title',
      'max'     => 'wbfsys.audio.message.error_max_title',
      'min'     => 'wbfsys.audio.message.error_min_title',
    ),

    'access_key' => array
    (
      'default' => 'wbfsys.audio.message.error_def_access_key',
      'wrong'   => 'wbfsys.audio.message.error_wrong_access_key',
      'max'     => 'wbfsys.audio.message.error_max_access_key',
      'min'     => 'wbfsys.audio.message.error_min_access_key',
    ),

    'id_licence' => array
    (
      'default' => 'wbfsys.audio.message.error_def_id_licence',
      'wrong'   => 'wbfsys.audio.message.error_wrong_id_licence',
      'max'     => 'wbfsys.audio.message.error_max_id_licence',
      'min'     => 'wbfsys.audio.message.error_min_id_licence',
    ),

    'id_confidentiality' => array
    (
      'default' => 'wbfsys.audio.message.error_def_id_confidentiality',
      'wrong'   => 'wbfsys.audio.message.error_wrong_id_confidentiality',
      'max'     => 'wbfsys.audio.message.error_max_id_confidentiality',
      'min'     => 'wbfsys.audio.message.error_min_id_confidentiality',
    ),

    'id_mediathek' => array
    (
      'default' => 'wbfsys.audio.message.error_def_id_mediathek',
      'wrong'   => 'wbfsys.audio.message.error_wrong_id_mediathek',
      'max'     => 'wbfsys.audio.message.error_max_id_mediathek',
      'min'     => 'wbfsys.audio.message.error_min_id_mediathek',
    ),

    'length' => array
    (
      'default' => 'wbfsys.audio.message.error_def_length',
      'wrong'   => 'wbfsys.audio.message.error_wrong_length',
      'max'     => 'wbfsys.audio.message.error_max_length',
      'min'     => 'wbfsys.audio.message.error_min_length',
    ),

    'id_codec' => array
    (
      'default' => 'wbfsys.audio.message.error_def_id_codec',
      'wrong'   => 'wbfsys.audio.message.error_wrong_id_codec',
      'max'     => 'wbfsys.audio.message.error_max_id_codec',
      'min'     => 'wbfsys.audio.message.error_min_id_codec',
    ),

    'file' => array
    (
      'default' => 'wbfsys.audio.message.error_def_file',
      'wrong'   => 'wbfsys.audio.message.error_wrong_file',
      'max'     => 'wbfsys.audio.message.error_max_file',
      'min'     => 'wbfsys.audio.message.error_min_file',
    ),

    'id_lang' => array
    (
      'default' => 'wbfsys.audio.message.error_def_id_lang',
      'wrong'   => 'wbfsys.audio.message.error_wrong_id_lang',
      'max'     => 'wbfsys.audio.message.error_max_id_lang',
      'min'     => 'wbfsys.audio.message.error_min_id_lang',
    ),

    'description' => array
    (
      'default' => 'wbfsys.audio.message.error_def_description',
      'wrong'   => 'wbfsys.audio.message.error_wrong_description',
      'max'     => 'wbfsys.audio.message.error_max_description',
      'min'     => 'wbfsys.audio.message.error_min_description',
    ),

    'mimetype' => array
    (
      'default' => 'wbfsys.audio.message.error_def_mimetype',
      'wrong'   => 'wbfsys.audio.message.error_wrong_mimetype',
      'max'     => 'wbfsys.audio.message.error_max_mimetype',
      'min'     => 'wbfsys.audio.message.error_min_mimetype',
    ),

    'file_size' => array
    (
      'default' => 'wbfsys.audio.message.error_def_file_size',
      'wrong'   => 'wbfsys.audio.message.error_wrong_file_size',
      'max'     => 'wbfsys.audio.message.error_max_file_size',
      'min'     => 'wbfsys.audio.message.error_min_file_size',
    ),

    'file_hash' => array
    (
      'default' => 'wbfsys.audio.message.error_def_file_hash',
      'wrong'   => 'wbfsys.audio.message.error_wrong_file_hash',
      'max'     => 'wbfsys.audio.message.error_max_file_hash',
      'min'     => 'wbfsys.audio.message.error_min_file_hash',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.audio.message.error_def_rowid',
      'wrong'   => 'wbfsys.audio.message.error_wrong_rowid',
      'empty'   => 'wbfsys.audio.message.error_empty_rowid',
      'max'     => 'wbfsys.audio.message.error_max_rowid',
      'min'     => 'wbfsys.audio.message.error_min_rowid',
    ),
  );

}//end class WbfsysAudio_Entity


