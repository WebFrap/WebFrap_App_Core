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
 * Entity Class for the Database Table wbfsys_document
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysDocument_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_document';

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
  public static $toUrl     = 'index.php?c=Wbfsys.Document.show';

 /**
  * all keynames for fields that will be displayed in the textvalue of the entity
  * @var array $textKeys
  */
  public static $textKeys  = array
  (
    'input'  => array( 'name','title'),
    'text'   => array( 'name','title'),
  );


 /**
  * the name of the entity in the System
  * @var string $entityName
  */
  public static $entityName  = 'WbfsysDocument';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Document';
      
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
      'name'              ,
      'title'             ,
      'access_key'        ,
      'id_licence'        ,
      'id_confidentiality',
      'id_mediathek'      ,
      'id_type'           ,
      'id_lang'           ,
      'content'           ,
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
    'id_licence'    => 'wbfsys_content_licence',
    'id_confidentiality'=> 'wbfsys_confidentiality_level',
    'id_mediathek'  => 'wbfsys_mediathek',
    'id_type'       => 'wbfsys_document_type',
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
    the Name of the document
    */
    'name' => array
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
    Ttle the document
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
    Access Key for document
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
    /*
    Type for document
    */
    'id_type' => array
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
    Language for document
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
    Content for document
    */
    'content' => array
    (
      'html'    , // Validator 
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
    Description for document
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
    'name' => array
    (
      'default' => 'wbfsys.document.message.error_def_name',
      'wrong'   => 'wbfsys.document.message.error_wrong_name',
      'max'     => 'wbfsys.document.message.error_max_name',
      'min'     => 'wbfsys.document.message.error_min_name',
    ),

    'title' => array
    (
      'default' => 'wbfsys.document.message.error_def_title',
      'wrong'   => 'wbfsys.document.message.error_wrong_title',
      'max'     => 'wbfsys.document.message.error_max_title',
      'min'     => 'wbfsys.document.message.error_min_title',
    ),

    'access_key' => array
    (
      'default' => 'wbfsys.document.message.error_def_access_key',
      'wrong'   => 'wbfsys.document.message.error_wrong_access_key',
      'max'     => 'wbfsys.document.message.error_max_access_key',
      'min'     => 'wbfsys.document.message.error_min_access_key',
    ),

    'id_licence' => array
    (
      'default' => 'wbfsys.document.message.error_def_id_licence',
      'wrong'   => 'wbfsys.document.message.error_wrong_id_licence',
      'max'     => 'wbfsys.document.message.error_max_id_licence',
      'min'     => 'wbfsys.document.message.error_min_id_licence',
    ),

    'id_confidentiality' => array
    (
      'default' => 'wbfsys.document.message.error_def_id_confidentiality',
      'wrong'   => 'wbfsys.document.message.error_wrong_id_confidentiality',
      'max'     => 'wbfsys.document.message.error_max_id_confidentiality',
      'min'     => 'wbfsys.document.message.error_min_id_confidentiality',
    ),

    'id_mediathek' => array
    (
      'default' => 'wbfsys.document.message.error_def_id_mediathek',
      'wrong'   => 'wbfsys.document.message.error_wrong_id_mediathek',
      'max'     => 'wbfsys.document.message.error_max_id_mediathek',
      'min'     => 'wbfsys.document.message.error_min_id_mediathek',
    ),

    'id_type' => array
    (
      'default' => 'wbfsys.document.message.error_def_id_type',
      'wrong'   => 'wbfsys.document.message.error_wrong_id_type',
      'max'     => 'wbfsys.document.message.error_max_id_type',
      'min'     => 'wbfsys.document.message.error_min_id_type',
    ),

    'id_lang' => array
    (
      'default' => 'wbfsys.document.message.error_def_id_lang',
      'wrong'   => 'wbfsys.document.message.error_wrong_id_lang',
      'max'     => 'wbfsys.document.message.error_max_id_lang',
      'min'     => 'wbfsys.document.message.error_min_id_lang',
    ),

    'content' => array
    (
      'default' => 'wbfsys.document.message.error_def_content',
      'wrong'   => 'wbfsys.document.message.error_wrong_content',
      'max'     => 'wbfsys.document.message.error_max_content',
      'min'     => 'wbfsys.document.message.error_min_content',
    ),

    'file' => array
    (
      'default' => 'wbfsys.document.message.error_def_file',
      'wrong'   => 'wbfsys.document.message.error_wrong_file',
      'max'     => 'wbfsys.document.message.error_max_file',
      'min'     => 'wbfsys.document.message.error_min_file',
    ),

    'description' => array
    (
      'default' => 'wbfsys.document.message.error_def_description',
      'wrong'   => 'wbfsys.document.message.error_wrong_description',
      'max'     => 'wbfsys.document.message.error_max_description',
      'min'     => 'wbfsys.document.message.error_min_description',
    ),

    'mimetype' => array
    (
      'default' => 'wbfsys.document.message.error_def_mimetype',
      'wrong'   => 'wbfsys.document.message.error_wrong_mimetype',
      'max'     => 'wbfsys.document.message.error_max_mimetype',
      'min'     => 'wbfsys.document.message.error_min_mimetype',
    ),

    'file_size' => array
    (
      'default' => 'wbfsys.document.message.error_def_file_size',
      'wrong'   => 'wbfsys.document.message.error_wrong_file_size',
      'max'     => 'wbfsys.document.message.error_max_file_size',
      'min'     => 'wbfsys.document.message.error_min_file_size',
    ),

    'file_hash' => array
    (
      'default' => 'wbfsys.document.message.error_def_file_hash',
      'wrong'   => 'wbfsys.document.message.error_wrong_file_hash',
      'max'     => 'wbfsys.document.message.error_max_file_hash',
      'min'     => 'wbfsys.document.message.error_min_file_hash',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.document.message.error_def_rowid',
      'wrong'   => 'wbfsys.document.message.error_wrong_rowid',
      'empty'   => 'wbfsys.document.message.error_empty_rowid',
      'max'     => 'wbfsys.document.message.error_max_rowid',
      'min'     => 'wbfsys.document.message.error_min_rowid',
    ),
  );

}//end class WbfsysDocument_Entity


