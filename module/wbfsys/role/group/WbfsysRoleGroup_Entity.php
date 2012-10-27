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
 * Entity Class for the Database Table wbfsys_role_group
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysRoleGroup_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_role_group';

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
  public static $toUrl     = 'index.php?c=Wbfsys.RoleGroup.show';

 /**
  * all keynames for fields that will be displayed in the textvalue of the entity
  * @var array $textKeys
  */
  public static $textKeys  = array
  (
    'input'  => array( 'name','name'),
    'text'   => array( 'name','name'),
  );


 /**
  * the name of the entity in the System
  * @var string $entityName
  */
  public static $entityName  = 'WbfsysRoleGroup';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Role Group';
      
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
      'name'              ,
      'access_key'        ,
      'id_mandant'        ,
      'id_type'           ,
      'level'             ,
      'system'            ,
      'id_module'         ,
      'revision'          ,
      'flag_core'         
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
    'm_parent'      => 'wbfsys_role_group',
    'id_mandant'    => 'wbfsys_role_mandant',
    'id_type'       => 'wbfsys_role_group_type',
    'level'         => 'wbfsys_security_level',
    'id_module'     => 'wbfsys_module',
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
    the Name of the role group
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
    Access Key for role group
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
    'id_mandant' => array
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
    Type der Gruppen, zb. für ACLs, Mailverteiler, etc.
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
    'level' => array
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
    'system' => array
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
    'flag_core' => array
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
    Description for role group
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
      'default' => 'wbfsys.role_group.message.error_def_name',
      'wrong'   => 'wbfsys.role_group.message.error_wrong_name',
      'max'     => 'wbfsys.role_group.message.error_max_name',
      'min'     => 'wbfsys.role_group.message.error_min_name',
    ),

    'access_key' => array
    (
      'default' => 'wbfsys.role_group.message.error_def_access_key',
      'wrong'   => 'wbfsys.role_group.message.error_wrong_access_key',
      'max'     => 'wbfsys.role_group.message.error_max_access_key',
      'min'     => 'wbfsys.role_group.message.error_min_access_key',
    ),

    'id_mandant' => array
    (
      'default' => 'wbfsys.role_group.message.error_def_id_mandant',
      'wrong'   => 'wbfsys.role_group.message.error_wrong_id_mandant',
      'max'     => 'wbfsys.role_group.message.error_max_id_mandant',
      'min'     => 'wbfsys.role_group.message.error_min_id_mandant',
    ),

    'id_type' => array
    (
      'default' => 'wbfsys.role_group.message.error_def_id_type',
      'wrong'   => 'wbfsys.role_group.message.error_wrong_id_type',
      'max'     => 'wbfsys.role_group.message.error_max_id_type',
      'min'     => 'wbfsys.role_group.message.error_min_id_type',
    ),

    'level' => array
    (
      'default' => 'wbfsys.role_group.message.error_def_level',
      'wrong'   => 'wbfsys.role_group.message.error_wrong_level',
      'max'     => 'wbfsys.role_group.message.error_max_level',
      'min'     => 'wbfsys.role_group.message.error_min_level',
    ),

    'system' => array
    (
      'default' => 'wbfsys.role_group.message.error_def_system',
      'wrong'   => 'wbfsys.role_group.message.error_wrong_system',
      'max'     => 'wbfsys.role_group.message.error_max_system',
      'min'     => 'wbfsys.role_group.message.error_min_system',
    ),

    'id_module' => array
    (
      'default' => 'wbfsys.role_group.message.error_def_id_module',
      'wrong'   => 'wbfsys.role_group.message.error_wrong_id_module',
      'max'     => 'wbfsys.role_group.message.error_max_id_module',
      'min'     => 'wbfsys.role_group.message.error_min_id_module',
    ),

    'revision' => array
    (
      'default' => 'wbfsys.role_group.message.error_def_revision',
      'wrong'   => 'wbfsys.role_group.message.error_wrong_revision',
      'max'     => 'wbfsys.role_group.message.error_max_revision',
      'min'     => 'wbfsys.role_group.message.error_min_revision',
    ),

    'flag_core' => array
    (
      'default' => 'wbfsys.role_group.message.error_def_flag_core',
      'wrong'   => 'wbfsys.role_group.message.error_wrong_flag_core',
      'max'     => 'wbfsys.role_group.message.error_max_flag_core',
      'min'     => 'wbfsys.role_group.message.error_min_flag_core',
    ),

    'description' => array
    (
      'default' => 'wbfsys.role_group.message.error_def_description',
      'wrong'   => 'wbfsys.role_group.message.error_wrong_description',
      'max'     => 'wbfsys.role_group.message.error_max_description',
      'min'     => 'wbfsys.role_group.message.error_min_description',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.role_group.message.error_def_rowid',
      'wrong'   => 'wbfsys.role_group.message.error_wrong_rowid',
      'empty'   => 'wbfsys.role_group.message.error_empty_rowid',
      'max'     => 'wbfsys.role_group.message.error_max_rowid',
      'min'     => 'wbfsys.role_group.message.error_min_rowid',
    ),
  );

}//end class WbfsysRoleGroup_Entity


