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
 * Entity Class for the Database Table wbfsys_file_type
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysFileType_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_file_type';

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
  public static $toUrl     = 'index.php?c=Wbfsys.FileType.show';

 /**
  * all keynames for fields that will be displayed in the textvalue of the entity
  * @var array $textKeys
  */
  public static $textKeys  = array
  (
    'input'  => array( 'name'),
    'text'   => array( 'name'),
  );


 /**
  * the name of the entity in the System
  * @var string $entityName
  */
  public static $entityName  = 'WbfsysFileType';

 /**
  * the description
  * @var string $description
  */
  public static $description  = 'file Type';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'File Type';
      
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
    'meta' => array
    (
      'm_order'           ,
      'rowid'             ,
      'm_time_created'    ,
      'm_role_create'     ,
      'm_time_changed'    ,
      'm_role_change'     ,
      'm_version'         ,
      'm_uuid'            
    ),
    'default' => array
    (
      'name'              ,
      'access_key'        ,
      'mimetype'          ,
      'ending'            ,
      'id_mgmt'           ,
      'flag_global'       
    ),
    'description' => array
    (
      'description'       
    ),
  );

 /**
  * all link references from this entity to other entities
  * @var string $table
  */
  public static $links = array
  (
    'id_mgmt'       => 'wbfsys_management',
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
    Order for file type
    */
    'm_order' => array
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
    /*
    the Name of the file type
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
    Access Key for file type
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
    /*
    Description for file type
    */
    'description' => array
    (
      'text'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      true      , // is a search field 
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
    'ending' => array
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
    'id_mgmt' => array
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
    Flag if this type is global or should only be displaye explicit
    */
    'flag_global' => array
    (
      'boolean' , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      null      , // the default value on create
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
      'default' => 'wbfsys.file_type.message.error_def_name',
      'wrong'   => 'wbfsys.file_type.message.error_wrong_name',
      'max'     => 'wbfsys.file_type.message.error_max_name',
      'min'     => 'wbfsys.file_type.message.error_min_name',
    ),

    'access_key' => array
    (
      'default' => 'wbfsys.file_type.message.error_def_access_key',
      'wrong'   => 'wbfsys.file_type.message.error_wrong_access_key',
      'max'     => 'wbfsys.file_type.message.error_max_access_key',
      'min'     => 'wbfsys.file_type.message.error_min_access_key',
    ),

    'description' => array
    (
      'default' => 'wbfsys.file_type.message.error_def_description',
      'wrong'   => 'wbfsys.file_type.message.error_wrong_description',
      'max'     => 'wbfsys.file_type.message.error_max_description',
      'min'     => 'wbfsys.file_type.message.error_min_description',
    ),

    'mimetype' => array
    (
      'default' => 'wbfsys.file_type.message.error_def_mimetype',
      'wrong'   => 'wbfsys.file_type.message.error_wrong_mimetype',
      'max'     => 'wbfsys.file_type.message.error_max_mimetype',
      'min'     => 'wbfsys.file_type.message.error_min_mimetype',
    ),

    'ending' => array
    (
      'default' => 'wbfsys.file_type.message.error_def_ending',
      'wrong'   => 'wbfsys.file_type.message.error_wrong_ending',
      'max'     => 'wbfsys.file_type.message.error_max_ending',
      'min'     => 'wbfsys.file_type.message.error_min_ending',
    ),

    'id_mgmt' => array
    (
      'default' => 'wbfsys.file_type.message.error_def_id_mgmt',
      'wrong'   => 'wbfsys.file_type.message.error_wrong_id_mgmt',
      'max'     => 'wbfsys.file_type.message.error_max_id_mgmt',
      'min'     => 'wbfsys.file_type.message.error_min_id_mgmt',
    ),

    'flag_global' => array
    (
      'default' => 'wbfsys.file_type.message.error_def_flag_global',
      'wrong'   => 'wbfsys.file_type.message.error_wrong_flag_global',
      'max'     => 'wbfsys.file_type.message.error_max_flag_global',
      'min'     => 'wbfsys.file_type.message.error_min_flag_global',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.file_type.message.error_def_rowid',
      'wrong'   => 'wbfsys.file_type.message.error_wrong_rowid',
      'empty'   => 'wbfsys.file_type.message.error_empty_rowid',
      'max'     => 'wbfsys.file_type.message.error_max_rowid',
      'min'     => 'wbfsys.file_type.message.error_min_rowid',
    ),
  );

}//end class WbfsysFileType_Entity


