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
 * Entity Class for the Database Table wbfsys_entity_reference
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysEntityReference_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_entity_reference';

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
  public static $toUrl     = 'index.php?c=Wbfsys.EntityReference.show';

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
  public static $entityName  = 'WbfsysEntityReference';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Entity Reference';
      
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
      'access_key'        ,
      'id_from'           ,
      'id_field_from'     ,
      'id_to'             ,
      'id_field_to'       ,
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
    'id_from'       => 'wbfsys_entity',
    'id_field_from' => 'wbfsys_entity_attribute',
    'id_to'         => 'wbfsys_entity',
    'id_field_to'   => 'wbfsys_entity_attribute',
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
    Access Key for entity reference
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
    'id_from' => array
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
    'id_field_from' => array
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
    'id_to' => array
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
    'id_field_to' => array
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
    Description for entity reference
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
    'access_key' => array
    (
      'default' => 'wbfsys.entity_reference.message.error_def_access_key',
      'wrong'   => 'wbfsys.entity_reference.message.error_wrong_access_key',
      'max'     => 'wbfsys.entity_reference.message.error_max_access_key',
      'min'     => 'wbfsys.entity_reference.message.error_min_access_key',
    ),

    'id_from' => array
    (
      'default' => 'wbfsys.entity_reference.message.error_def_id_from',
      'wrong'   => 'wbfsys.entity_reference.message.error_wrong_id_from',
      'empty'   => 'wbfsys.entity_reference.message.error_empty_id_from',
      'max'     => 'wbfsys.entity_reference.message.error_max_id_from',
      'min'     => 'wbfsys.entity_reference.message.error_min_id_from',
    ),

    'id_field_from' => array
    (
      'default' => 'wbfsys.entity_reference.message.error_def_id_field_from',
      'wrong'   => 'wbfsys.entity_reference.message.error_wrong_id_field_from',
      'empty'   => 'wbfsys.entity_reference.message.error_empty_id_field_from',
      'max'     => 'wbfsys.entity_reference.message.error_max_id_field_from',
      'min'     => 'wbfsys.entity_reference.message.error_min_id_field_from',
    ),

    'id_to' => array
    (
      'default' => 'wbfsys.entity_reference.message.error_def_id_to',
      'wrong'   => 'wbfsys.entity_reference.message.error_wrong_id_to',
      'empty'   => 'wbfsys.entity_reference.message.error_empty_id_to',
      'max'     => 'wbfsys.entity_reference.message.error_max_id_to',
      'min'     => 'wbfsys.entity_reference.message.error_min_id_to',
    ),

    'id_field_to' => array
    (
      'default' => 'wbfsys.entity_reference.message.error_def_id_field_to',
      'wrong'   => 'wbfsys.entity_reference.message.error_wrong_id_field_to',
      'empty'   => 'wbfsys.entity_reference.message.error_empty_id_field_to',
      'max'     => 'wbfsys.entity_reference.message.error_max_id_field_to',
      'min'     => 'wbfsys.entity_reference.message.error_min_id_field_to',
    ),

    'description' => array
    (
      'default' => 'wbfsys.entity_reference.message.error_def_description',
      'wrong'   => 'wbfsys.entity_reference.message.error_wrong_description',
      'max'     => 'wbfsys.entity_reference.message.error_max_description',
      'min'     => 'wbfsys.entity_reference.message.error_min_description',
    ),

    'revision' => array
    (
      'default' => 'wbfsys.entity_reference.message.error_def_revision',
      'wrong'   => 'wbfsys.entity_reference.message.error_wrong_revision',
      'max'     => 'wbfsys.entity_reference.message.error_max_revision',
      'min'     => 'wbfsys.entity_reference.message.error_min_revision',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.entity_reference.message.error_def_rowid',
      'wrong'   => 'wbfsys.entity_reference.message.error_wrong_rowid',
      'empty'   => 'wbfsys.entity_reference.message.error_empty_rowid',
      'max'     => 'wbfsys.entity_reference.message.error_max_rowid',
      'min'     => 'wbfsys.entity_reference.message.error_min_rowid',
    ),
  );

}//end class WbfsysEntityReference_Entity


