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
 * Entity Class for the Database Table wbfsys_security_area
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysSecurityArea_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_security_area';

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
  public static $toUrl     = 'index.php?c=Wbfsys.SecurityArea.show';

 /**
  * all keynames for fields that will be displayed in the textvalue of the entity
  * @var array $textKeys
  */
  public static $textKeys  = array
  (
    'input'  => array( 'label'),
    'text'   => array( 'label'),
  );


 /**
  * the name of the entity in the System
  * @var string $entityName
  */
  public static $entityName  = 'WbfsysSecurityArea';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Security Area';
      
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
      'm_parent'          ,
      'label'             ,
      'id_ref_listing'    ,
      'id_ref_access'     ,
      'id_ref_insert'     ,
      'id_ref_update'     ,
      'id_ref_delete'     ,
      'id_ref_admin'      ,
      'id_level_listing'  ,
      'id_level_access'   ,
      'id_level_insert'   ,
      'id_level_update'   ,
      'id_level_delete'   ,
      'id_level_admin'    ,
      'vid'               ,
      'id_target'         ,
      'id_type'           ,
      'access_key'        ,
      'type_key'          ,
      'parent_key'        ,
      'source_key'        ,
      'id_source'         ,
      'parent_path'       ,
      'revision'          ,
      'flag_system'       ,
      'id_vid_entity'     
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
    'm_parent'      => 'wbfsys_security_area',
    'id_ref_listing'=> 'wbfsys_security_level',
    'id_ref_access' => 'wbfsys_security_level',
    'id_ref_insert' => 'wbfsys_security_level',
    'id_ref_update' => 'wbfsys_security_level',
    'id_ref_delete' => 'wbfsys_security_level',
    'id_ref_admin'  => 'wbfsys_security_level',
    'id_level_listing'=> 'wbfsys_security_level',
    'id_level_access'=> 'wbfsys_security_level',
    'id_level_insert'=> 'wbfsys_security_level',
    'id_level_update'=> 'wbfsys_security_level',
    'id_level_delete'=> 'wbfsys_security_level',
    'id_level_admin'=> 'wbfsys_security_level',
    'id_target'     => 'wbfsys_security_area',
    'id_type'       => 'wbfsys_security_area_type',
    'id_source'     => 'wbfsys_security_area',
    'id_vid_entity' => 'wbfsys_entity',
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
    'm_parent' => array
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
    Label for security area
    */
    'label' => array
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
    'id_ref_listing' => array
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
    'id_ref_access' => array
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
    'id_ref_insert' => array
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
    'id_ref_update' => array
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
    'id_ref_delete' => array
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
    'id_ref_admin' => array
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
    'id_level_listing' => array
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
    'id_level_access' => array
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
    'id_level_insert' => array
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
    'id_level_update' => array
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
    'id_level_delete' => array
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
    'id_level_admin' => array
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
    Virtual ID for a target dataset
    */
    'vid' => array
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
    'id_target' => array
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
    Type for security area
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
    Access Key for security area
    */
    'access_key' => array
    (
      'ckey'    , // Validator 
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
    Access Key for security area
    */
    'type_key' => array
    (
      'ckey'    , // Validator 
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
    Access Key for security area
    */
    'parent_key' => array
    (
      'ckey'    , // Validator 
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
    Access Key for security area
    */
    'source_key' => array
    (
      'ckey'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      true      , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'id_source' => array
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
    'parent_path' => array
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
    'flag_system' => array
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
    Description for security area
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
    /*
    Reference to the entity for the virtual connection
    */
    'id_vid_entity' => array
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
    'label' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_label',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_label',
      'empty'   => 'wbfsys.security_area.message.error_empty_label',
      'max'     => 'wbfsys.security_area.message.error_max_label',
      'min'     => 'wbfsys.security_area.message.error_min_label',
    ),

    'id_ref_listing' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_id_ref_listing',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_id_ref_listing',
      'max'     => 'wbfsys.security_area.message.error_max_id_ref_listing',
      'min'     => 'wbfsys.security_area.message.error_min_id_ref_listing',
    ),

    'id_ref_access' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_id_ref_access',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_id_ref_access',
      'max'     => 'wbfsys.security_area.message.error_max_id_ref_access',
      'min'     => 'wbfsys.security_area.message.error_min_id_ref_access',
    ),

    'id_ref_insert' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_id_ref_insert',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_id_ref_insert',
      'max'     => 'wbfsys.security_area.message.error_max_id_ref_insert',
      'min'     => 'wbfsys.security_area.message.error_min_id_ref_insert',
    ),

    'id_ref_update' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_id_ref_update',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_id_ref_update',
      'max'     => 'wbfsys.security_area.message.error_max_id_ref_update',
      'min'     => 'wbfsys.security_area.message.error_min_id_ref_update',
    ),

    'id_ref_delete' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_id_ref_delete',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_id_ref_delete',
      'max'     => 'wbfsys.security_area.message.error_max_id_ref_delete',
      'min'     => 'wbfsys.security_area.message.error_min_id_ref_delete',
    ),

    'id_ref_admin' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_id_ref_admin',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_id_ref_admin',
      'max'     => 'wbfsys.security_area.message.error_max_id_ref_admin',
      'min'     => 'wbfsys.security_area.message.error_min_id_ref_admin',
    ),

    'id_level_listing' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_id_level_listing',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_id_level_listing',
      'max'     => 'wbfsys.security_area.message.error_max_id_level_listing',
      'min'     => 'wbfsys.security_area.message.error_min_id_level_listing',
    ),

    'id_level_access' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_id_level_access',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_id_level_access',
      'max'     => 'wbfsys.security_area.message.error_max_id_level_access',
      'min'     => 'wbfsys.security_area.message.error_min_id_level_access',
    ),

    'id_level_insert' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_id_level_insert',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_id_level_insert',
      'max'     => 'wbfsys.security_area.message.error_max_id_level_insert',
      'min'     => 'wbfsys.security_area.message.error_min_id_level_insert',
    ),

    'id_level_update' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_id_level_update',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_id_level_update',
      'max'     => 'wbfsys.security_area.message.error_max_id_level_update',
      'min'     => 'wbfsys.security_area.message.error_min_id_level_update',
    ),

    'id_level_delete' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_id_level_delete',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_id_level_delete',
      'max'     => 'wbfsys.security_area.message.error_max_id_level_delete',
      'min'     => 'wbfsys.security_area.message.error_min_id_level_delete',
    ),

    'id_level_admin' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_id_level_admin',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_id_level_admin',
      'max'     => 'wbfsys.security_area.message.error_max_id_level_admin',
      'min'     => 'wbfsys.security_area.message.error_min_id_level_admin',
    ),

    'vid' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_vid',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_vid',
      'max'     => 'wbfsys.security_area.message.error_max_vid',
      'min'     => 'wbfsys.security_area.message.error_min_vid',
    ),

    'id_target' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_id_target',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_id_target',
      'max'     => 'wbfsys.security_area.message.error_max_id_target',
      'min'     => 'wbfsys.security_area.message.error_min_id_target',
    ),

    'id_type' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_id_type',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_id_type',
      'max'     => 'wbfsys.security_area.message.error_max_id_type',
      'min'     => 'wbfsys.security_area.message.error_min_id_type',
    ),

    'access_key' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_access_key',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_access_key',
      'empty'   => 'wbfsys.security_area.message.error_empty_access_key',
      'max'     => 'wbfsys.security_area.message.error_max_access_key',
      'min'     => 'wbfsys.security_area.message.error_min_access_key',
    ),

    'type_key' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_type_key',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_type_key',
      'max'     => 'wbfsys.security_area.message.error_max_type_key',
      'min'     => 'wbfsys.security_area.message.error_min_type_key',
    ),

    'parent_key' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_parent_key',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_parent_key',
      'max'     => 'wbfsys.security_area.message.error_max_parent_key',
      'min'     => 'wbfsys.security_area.message.error_min_parent_key',
    ),

    'source_key' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_source_key',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_source_key',
      'max'     => 'wbfsys.security_area.message.error_max_source_key',
      'min'     => 'wbfsys.security_area.message.error_min_source_key',
    ),

    'id_source' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_id_source',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_id_source',
      'max'     => 'wbfsys.security_area.message.error_max_id_source',
      'min'     => 'wbfsys.security_area.message.error_min_id_source',
    ),

    'parent_path' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_parent_path',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_parent_path',
      'max'     => 'wbfsys.security_area.message.error_max_parent_path',
      'min'     => 'wbfsys.security_area.message.error_min_parent_path',
    ),

    'revision' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_revision',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_revision',
      'max'     => 'wbfsys.security_area.message.error_max_revision',
      'min'     => 'wbfsys.security_area.message.error_min_revision',
    ),

    'flag_system' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_flag_system',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_flag_system',
      'max'     => 'wbfsys.security_area.message.error_max_flag_system',
      'min'     => 'wbfsys.security_area.message.error_min_flag_system',
    ),

    'description' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_description',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_description',
      'max'     => 'wbfsys.security_area.message.error_max_description',
      'min'     => 'wbfsys.security_area.message.error_min_description',
    ),

    'id_vid_entity' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_id_vid_entity',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_id_vid_entity',
      'max'     => 'wbfsys.security_area.message.error_max_id_vid_entity',
      'min'     => 'wbfsys.security_area.message.error_min_id_vid_entity',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.security_area.message.error_def_rowid',
      'wrong'   => 'wbfsys.security_area.message.error_wrong_rowid',
      'empty'   => 'wbfsys.security_area.message.error_empty_rowid',
      'max'     => 'wbfsys.security_area.message.error_max_rowid',
      'min'     => 'wbfsys.security_area.message.error_min_rowid',
    ),
  );

}//end class WbfsysSecurityArea_Entity


