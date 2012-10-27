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
 * Entity Class for the Database Table wbfsys_entity
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysEntity_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_entity';

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
  public static $toUrl     = 'index.php?c=Wbfsys.Entity.show';

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
  public static $entityName  = 'WbfsysEntity';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Entity';
      
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
      'flag_index'        ,
      'default_create'    ,
      'default_edit'      ,
      'default_show'      ,
      'default_list'      ,
      'default_selection' ,
      'relevance'         ,
      'id_module'         ,
      'id_security_area'  ,
      'revision'          
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
    'id_module'     => 'wbfsys_module',
    'id_security_area'=> 'wbfsys_security_area',
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
    the Name of the entity
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
    Access Key for entity
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
    'flag_index' => array
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
    /*
    URL entity
    */
    'default_create' => array
    (
      'url'     , // Validator 
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
    URL entity
    */
    'default_edit' => array
    (
      'url'     , // Validator 
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
    URL entity
    */
    'default_show' => array
    (
      'url'     , // Validator 
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
    URL entity
    */
    'default_list' => array
    (
      'url'     , // Validator 
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
    URL entity
    */
    'default_selection' => array
    (
      'url'     , // Validator 
      true      , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      true      , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'relevance' => array
    (
      'text'    , // Validator 
      true      , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'id_module' => array
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
    'id_security_area' => array
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
    Description for entity
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
    'revision' => array
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
      'default' => 'wbfsys.entity.message.error_def_name',
      'wrong'   => 'wbfsys.entity.message.error_wrong_name',
      'empty'   => 'wbfsys.entity.message.error_empty_name',
      'max'     => 'wbfsys.entity.message.error_max_name',
      'min'     => 'wbfsys.entity.message.error_min_name',
    ),

    'access_key' => array
    (
      'default' => 'wbfsys.entity.message.error_def_access_key',
      'wrong'   => 'wbfsys.entity.message.error_wrong_access_key',
      'empty'   => 'wbfsys.entity.message.error_empty_access_key',
      'max'     => 'wbfsys.entity.message.error_max_access_key',
      'min'     => 'wbfsys.entity.message.error_min_access_key',
    ),

    'flag_index' => array
    (
      'default' => 'wbfsys.entity.message.error_def_flag_index',
      'wrong'   => 'wbfsys.entity.message.error_wrong_flag_index',
      'max'     => 'wbfsys.entity.message.error_max_flag_index',
      'min'     => 'wbfsys.entity.message.error_min_flag_index',
    ),

    'default_create' => array
    (
      'default' => 'wbfsys.entity.message.error_def_default_create',
      'wrong'   => 'wbfsys.entity.message.error_wrong_default_create',
      'empty'   => 'wbfsys.entity.message.error_empty_default_create',
      'max'     => 'wbfsys.entity.message.error_max_default_create',
      'min'     => 'wbfsys.entity.message.error_min_default_create',
    ),

    'default_edit' => array
    (
      'default' => 'wbfsys.entity.message.error_def_default_edit',
      'wrong'   => 'wbfsys.entity.message.error_wrong_default_edit',
      'empty'   => 'wbfsys.entity.message.error_empty_default_edit',
      'max'     => 'wbfsys.entity.message.error_max_default_edit',
      'min'     => 'wbfsys.entity.message.error_min_default_edit',
    ),

    'default_show' => array
    (
      'default' => 'wbfsys.entity.message.error_def_default_show',
      'wrong'   => 'wbfsys.entity.message.error_wrong_default_show',
      'empty'   => 'wbfsys.entity.message.error_empty_default_show',
      'max'     => 'wbfsys.entity.message.error_max_default_show',
      'min'     => 'wbfsys.entity.message.error_min_default_show',
    ),

    'default_list' => array
    (
      'default' => 'wbfsys.entity.message.error_def_default_list',
      'wrong'   => 'wbfsys.entity.message.error_wrong_default_list',
      'empty'   => 'wbfsys.entity.message.error_empty_default_list',
      'max'     => 'wbfsys.entity.message.error_max_default_list',
      'min'     => 'wbfsys.entity.message.error_min_default_list',
    ),

    'default_selection' => array
    (
      'default' => 'wbfsys.entity.message.error_def_default_selection',
      'wrong'   => 'wbfsys.entity.message.error_wrong_default_selection',
      'empty'   => 'wbfsys.entity.message.error_empty_default_selection',
      'max'     => 'wbfsys.entity.message.error_max_default_selection',
      'min'     => 'wbfsys.entity.message.error_min_default_selection',
    ),

    'relevance' => array
    (
      'default' => 'wbfsys.entity.message.error_def_relevance',
      'wrong'   => 'wbfsys.entity.message.error_wrong_relevance',
      'empty'   => 'wbfsys.entity.message.error_empty_relevance',
      'max'     => 'wbfsys.entity.message.error_max_relevance',
      'min'     => 'wbfsys.entity.message.error_min_relevance',
    ),

    'id_module' => array
    (
      'default' => 'wbfsys.entity.message.error_def_id_module',
      'wrong'   => 'wbfsys.entity.message.error_wrong_id_module',
      'max'     => 'wbfsys.entity.message.error_max_id_module',
      'min'     => 'wbfsys.entity.message.error_min_id_module',
    ),

    'id_security_area' => array
    (
      'default' => 'wbfsys.entity.message.error_def_id_security_area',
      'wrong'   => 'wbfsys.entity.message.error_wrong_id_security_area',
      'max'     => 'wbfsys.entity.message.error_max_id_security_area',
      'min'     => 'wbfsys.entity.message.error_min_id_security_area',
    ),

    'description' => array
    (
      'default' => 'wbfsys.entity.message.error_def_description',
      'wrong'   => 'wbfsys.entity.message.error_wrong_description',
      'max'     => 'wbfsys.entity.message.error_max_description',
      'min'     => 'wbfsys.entity.message.error_min_description',
    ),

    'revision' => array
    (
      'default' => 'wbfsys.entity.message.error_def_revision',
      'wrong'   => 'wbfsys.entity.message.error_wrong_revision',
      'max'     => 'wbfsys.entity.message.error_max_revision',
      'min'     => 'wbfsys.entity.message.error_min_revision',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.entity.message.error_def_rowid',
      'wrong'   => 'wbfsys.entity.message.error_wrong_rowid',
      'empty'   => 'wbfsys.entity.message.error_empty_rowid',
      'max'     => 'wbfsys.entity.message.error_max_rowid',
      'min'     => 'wbfsys.entity.message.error_min_rowid',
    ),
  );

}//end class WbfsysEntity_Entity


