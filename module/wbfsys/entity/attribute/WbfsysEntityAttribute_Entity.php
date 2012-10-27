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
 * Entity Class for the Database Table wbfsys_entity_attribute
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysEntityAttribute_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_entity_attribute';

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
  public static $toUrl     = 'index.php?c=Wbfsys.EntityAttribute.show';

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
  public static $entityName  = 'WbfsysEntityAttribute';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Entity Attribute';
      
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
      'id_entity'         ,
      'id_category'       ,
      'id_type'           ,
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
    'id_entity'     => 'wbfsys_entity',
    'id_category'   => 'wbfsys_entity_category',
    'id_type'       => 'wbfsys_entity_attribute_type',
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
    the Name of the entity attribute
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
    Access Key for entity attribute
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
    'id_entity' => array
    (
      'eid'     , // Validator 
      true      , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'id_category' => array
    (
      'eid'     , // Validator 
      true      , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    /*
    Type for entity attribute
    */
    'id_type' => array
    (
      'eid'     , // Validator 
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
    Description for entity attribute
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
      'default' => 'wbfsys.entity_attribute.message.error_def_name',
      'wrong'   => 'wbfsys.entity_attribute.message.error_wrong_name',
      'max'     => 'wbfsys.entity_attribute.message.error_max_name',
      'min'     => 'wbfsys.entity_attribute.message.error_min_name',
    ),

    'access_key' => array
    (
      'default' => 'wbfsys.entity_attribute.message.error_def_access_key',
      'wrong'   => 'wbfsys.entity_attribute.message.error_wrong_access_key',
      'max'     => 'wbfsys.entity_attribute.message.error_max_access_key',
      'min'     => 'wbfsys.entity_attribute.message.error_min_access_key',
    ),

    'id_entity' => array
    (
      'default' => 'wbfsys.entity_attribute.message.error_def_id_entity',
      'wrong'   => 'wbfsys.entity_attribute.message.error_wrong_id_entity',
      'empty'   => 'wbfsys.entity_attribute.message.error_empty_id_entity',
      'max'     => 'wbfsys.entity_attribute.message.error_max_id_entity',
      'min'     => 'wbfsys.entity_attribute.message.error_min_id_entity',
    ),

    'id_category' => array
    (
      'default' => 'wbfsys.entity_attribute.message.error_def_id_category',
      'wrong'   => 'wbfsys.entity_attribute.message.error_wrong_id_category',
      'empty'   => 'wbfsys.entity_attribute.message.error_empty_id_category',
      'max'     => 'wbfsys.entity_attribute.message.error_max_id_category',
      'min'     => 'wbfsys.entity_attribute.message.error_min_id_category',
    ),

    'id_type' => array
    (
      'default' => 'wbfsys.entity_attribute.message.error_def_id_type',
      'wrong'   => 'wbfsys.entity_attribute.message.error_wrong_id_type',
      'empty'   => 'wbfsys.entity_attribute.message.error_empty_id_type',
      'max'     => 'wbfsys.entity_attribute.message.error_max_id_type',
      'min'     => 'wbfsys.entity_attribute.message.error_min_id_type',
    ),

    'description' => array
    (
      'default' => 'wbfsys.entity_attribute.message.error_def_description',
      'wrong'   => 'wbfsys.entity_attribute.message.error_wrong_description',
      'max'     => 'wbfsys.entity_attribute.message.error_max_description',
      'min'     => 'wbfsys.entity_attribute.message.error_min_description',
    ),

    'revision' => array
    (
      'default' => 'wbfsys.entity_attribute.message.error_def_revision',
      'wrong'   => 'wbfsys.entity_attribute.message.error_wrong_revision',
      'max'     => 'wbfsys.entity_attribute.message.error_max_revision',
      'min'     => 'wbfsys.entity_attribute.message.error_min_revision',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.entity_attribute.message.error_def_rowid',
      'wrong'   => 'wbfsys.entity_attribute.message.error_wrong_rowid',
      'empty'   => 'wbfsys.entity_attribute.message.error_empty_rowid',
      'max'     => 'wbfsys.entity_attribute.message.error_max_rowid',
      'min'     => 'wbfsys.entity_attribute.message.error_min_rowid',
    ),
  );

}//end class WbfsysEntityAttribute_Entity


