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
 * Entity Class for the Database Table wbfsys_language
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysLanguage_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_language';

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
  public static $toUrl     = 'index.php?c=Wbfsys.Language.show';

 /**
  * all keynames for fields that will be displayed in the textvalue of the entity
  * @var array $textKeys
  */
  public static $textKeys  = array
  (
    'input'  => array( 'name','short'),
    'text'   => array( 'name','short'),
  );


 /**
  * the name of the entity in the System
  * @var string $entityName
  */
  public static $entityName  = 'WbfsysLanguage';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Language';
      
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
      'access_key'        ,
      'key3'              ,
      'country_number'    ,
      'key_rfc1766'       ,
      'short'             ,
      'flag'              ,
      'is_syslang'        ,
      'format_time'       ,
      'format_timestamp'  ,
      'format_date'       ,
      'sep_date'          ,
      'sep_time'          ,
      'sep_dec'           ,
      'sep_mil'           
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
    the Name of the language
    */
    'name' => array
    (
      'text'    , // Validator 
      true      , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      true      , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    /*
    Access Key for language
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
    Access Key for language
    */
    'key3' => array
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
    'country_number' => array
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
    See: http://www.ietf.org/rfc/rfc1766.txt
    */
    'key_rfc1766' => array
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
    Shortname for language
    */
    'short' => array
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
    'flag' => array
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
    'is_syslang' => array
    (
      'boolean' , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'format_time' => array
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
    'format_timestamp' => array
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
    'format_date' => array
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
    'sep_date' => array
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
    'sep_time' => array
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
    'sep_dec' => array
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
    'sep_mil' => array
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
      'default' => 'wbfsys.language.message.error_def_name',
      'wrong'   => 'wbfsys.language.message.error_wrong_name',
      'empty'   => 'wbfsys.language.message.error_empty_name',
      'max'     => 'wbfsys.language.message.error_max_name',
      'min'     => 'wbfsys.language.message.error_min_name',
    ),

    'access_key' => array
    (
      'default' => 'wbfsys.language.message.error_def_access_key',
      'wrong'   => 'wbfsys.language.message.error_wrong_access_key',
      'max'     => 'wbfsys.language.message.error_max_access_key',
      'min'     => 'wbfsys.language.message.error_min_access_key',
    ),

    'key3' => array
    (
      'default' => 'wbfsys.language.message.error_def_key3',
      'wrong'   => 'wbfsys.language.message.error_wrong_key3',
      'max'     => 'wbfsys.language.message.error_max_key3',
      'min'     => 'wbfsys.language.message.error_min_key3',
    ),

    'country_number' => array
    (
      'default' => 'wbfsys.language.message.error_def_country_number',
      'wrong'   => 'wbfsys.language.message.error_wrong_country_number',
      'max'     => 'wbfsys.language.message.error_max_country_number',
      'min'     => 'wbfsys.language.message.error_min_country_number',
    ),

    'key_rfc1766' => array
    (
      'default' => 'wbfsys.language.message.error_def_key_rfc1766',
      'wrong'   => 'wbfsys.language.message.error_wrong_key_rfc1766',
      'max'     => 'wbfsys.language.message.error_max_key_rfc1766',
      'min'     => 'wbfsys.language.message.error_min_key_rfc1766',
    ),

    'short' => array
    (
      'default' => 'wbfsys.language.message.error_def_short',
      'wrong'   => 'wbfsys.language.message.error_wrong_short',
      'max'     => 'wbfsys.language.message.error_max_short',
      'min'     => 'wbfsys.language.message.error_min_short',
    ),

    'flag' => array
    (
      'default' => 'wbfsys.language.message.error_def_flag',
      'wrong'   => 'wbfsys.language.message.error_wrong_flag',
      'max'     => 'wbfsys.language.message.error_max_flag',
      'min'     => 'wbfsys.language.message.error_min_flag',
    ),

    'is_syslang' => array
    (
      'default' => 'wbfsys.language.message.error_def_is_syslang',
      'wrong'   => 'wbfsys.language.message.error_wrong_is_syslang',
      'max'     => 'wbfsys.language.message.error_max_is_syslang',
      'min'     => 'wbfsys.language.message.error_min_is_syslang',
    ),

    'format_time' => array
    (
      'default' => 'wbfsys.language.message.error_def_format_time',
      'wrong'   => 'wbfsys.language.message.error_wrong_format_time',
      'max'     => 'wbfsys.language.message.error_max_format_time',
      'min'     => 'wbfsys.language.message.error_min_format_time',
    ),

    'format_timestamp' => array
    (
      'default' => 'wbfsys.language.message.error_def_format_timestamp',
      'wrong'   => 'wbfsys.language.message.error_wrong_format_timestamp',
      'max'     => 'wbfsys.language.message.error_max_format_timestamp',
      'min'     => 'wbfsys.language.message.error_min_format_timestamp',
    ),

    'format_date' => array
    (
      'default' => 'wbfsys.language.message.error_def_format_date',
      'wrong'   => 'wbfsys.language.message.error_wrong_format_date',
      'max'     => 'wbfsys.language.message.error_max_format_date',
      'min'     => 'wbfsys.language.message.error_min_format_date',
    ),

    'sep_date' => array
    (
      'default' => 'wbfsys.language.message.error_def_sep_date',
      'wrong'   => 'wbfsys.language.message.error_wrong_sep_date',
      'max'     => 'wbfsys.language.message.error_max_sep_date',
      'min'     => 'wbfsys.language.message.error_min_sep_date',
    ),

    'sep_time' => array
    (
      'default' => 'wbfsys.language.message.error_def_sep_time',
      'wrong'   => 'wbfsys.language.message.error_wrong_sep_time',
      'max'     => 'wbfsys.language.message.error_max_sep_time',
      'min'     => 'wbfsys.language.message.error_min_sep_time',
    ),

    'sep_dec' => array
    (
      'default' => 'wbfsys.language.message.error_def_sep_dec',
      'wrong'   => 'wbfsys.language.message.error_wrong_sep_dec',
      'max'     => 'wbfsys.language.message.error_max_sep_dec',
      'min'     => 'wbfsys.language.message.error_min_sep_dec',
    ),

    'sep_mil' => array
    (
      'default' => 'wbfsys.language.message.error_def_sep_mil',
      'wrong'   => 'wbfsys.language.message.error_wrong_sep_mil',
      'max'     => 'wbfsys.language.message.error_max_sep_mil',
      'min'     => 'wbfsys.language.message.error_min_sep_mil',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.language.message.error_def_rowid',
      'wrong'   => 'wbfsys.language.message.error_wrong_rowid',
      'empty'   => 'wbfsys.language.message.error_empty_rowid',
      'max'     => 'wbfsys.language.message.error_max_rowid',
      'min'     => 'wbfsys.language.message.error_min_rowid',
    ),
  );

}//end class WbfsysLanguage_Entity


