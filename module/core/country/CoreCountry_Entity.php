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
 * Entity Class for the Database Table core_country
 * 
 * @package WebFrap
 * @subpackage ModCore
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreCountry_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'core_country';

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
  public static $toUrl     = 'index.php?c=Core.Country.show';

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
  public static $entityName  = 'CoreCountry';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Country';
      
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
      'flag'              ,
      'id_category'       ,
      'short'             ,
      'id_mainlanguage'   ,
      'id_currency'       ,
      'deb_revenue'       ,
      'kred_revenue'      
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
    'id_category'   => 'core_country_category',
    'id_mainlanguage'=> 'wbfsys_language',
    'id_currency'   => 'core_currency',
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
    the Name of the country
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
    Access Key for country
    */
    'access_key' => array
    (
      'cname'   , // Validator 
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
    Access Key for country
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
    /*
    Category for country
    */
    'id_category' => array
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
    'id_mainlanguage' => array
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
    Main currency in this land
    */
    'id_currency' => array
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
    'deb_revenue' => array
    (
      'smallint', // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'kred_revenue' => array
    (
      'smallint', // Validator 
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
      'default' => 'core.country.message.error_def_name',
      'wrong'   => 'core.country.message.error_wrong_name',
      'empty'   => 'core.country.message.error_empty_name',
      'max'     => 'core.country.message.error_max_name',
      'min'     => 'core.country.message.error_min_name',
    ),

    'access_key' => array
    (
      'default' => 'core.country.message.error_def_access_key',
      'wrong'   => 'core.country.message.error_wrong_access_key',
      'empty'   => 'core.country.message.error_empty_access_key',
      'max'     => 'core.country.message.error_max_access_key',
      'min'     => 'core.country.message.error_min_access_key',
    ),

    'key3' => array
    (
      'default' => 'core.country.message.error_def_key3',
      'wrong'   => 'core.country.message.error_wrong_key3',
      'max'     => 'core.country.message.error_max_key3',
      'min'     => 'core.country.message.error_min_key3',
    ),

    'country_number' => array
    (
      'default' => 'core.country.message.error_def_country_number',
      'wrong'   => 'core.country.message.error_wrong_country_number',
      'max'     => 'core.country.message.error_max_country_number',
      'min'     => 'core.country.message.error_min_country_number',
    ),

    'flag' => array
    (
      'default' => 'core.country.message.error_def_flag',
      'wrong'   => 'core.country.message.error_wrong_flag',
      'max'     => 'core.country.message.error_max_flag',
      'min'     => 'core.country.message.error_min_flag',
    ),

    'id_category' => array
    (
      'default' => 'core.country.message.error_def_id_category',
      'wrong'   => 'core.country.message.error_wrong_id_category',
      'max'     => 'core.country.message.error_max_id_category',
      'min'     => 'core.country.message.error_min_id_category',
    ),

    'short' => array
    (
      'default' => 'core.country.message.error_def_short',
      'wrong'   => 'core.country.message.error_wrong_short',
      'max'     => 'core.country.message.error_max_short',
      'min'     => 'core.country.message.error_min_short',
    ),

    'id_mainlanguage' => array
    (
      'default' => 'core.country.message.error_def_id_mainlanguage',
      'wrong'   => 'core.country.message.error_wrong_id_mainlanguage',
      'max'     => 'core.country.message.error_max_id_mainlanguage',
      'min'     => 'core.country.message.error_min_id_mainlanguage',
    ),

    'id_currency' => array
    (
      'default' => 'core.country.message.error_def_id_currency',
      'wrong'   => 'core.country.message.error_wrong_id_currency',
      'max'     => 'core.country.message.error_max_id_currency',
      'min'     => 'core.country.message.error_min_id_currency',
    ),

    'deb_revenue' => array
    (
      'default' => 'core.country.message.error_def_deb_revenue',
      'wrong'   => 'core.country.message.error_wrong_deb_revenue',
      'max'     => 'core.country.message.error_max_deb_revenue',
      'min'     => 'core.country.message.error_min_deb_revenue',
    ),

    'kred_revenue' => array
    (
      'default' => 'core.country.message.error_def_kred_revenue',
      'wrong'   => 'core.country.message.error_wrong_kred_revenue',
      'max'     => 'core.country.message.error_max_kred_revenue',
      'min'     => 'core.country.message.error_min_kred_revenue',
    ),

    'rowid' => array
    (
      'default' => 'core.country.message.error_def_rowid',
      'wrong'   => 'core.country.message.error_wrong_rowid',
      'empty'   => 'core.country.message.error_empty_rowid',
      'max'     => 'core.country.message.error_max_rowid',
      'min'     => 'core.country.message.error_min_rowid',
    ),
  );

}//end class CoreCountry_Entity


