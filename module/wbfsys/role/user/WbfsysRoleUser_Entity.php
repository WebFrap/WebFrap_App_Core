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
 * Entity Class for the Database Table wbfsys_role_user
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysRoleUser_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_role_user';

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
  public static $toUrl     = 'index.php?c=Wbfsys.RoleUser.show';

 /**
  * all keynames for fields that will be displayed in the textvalue of the entity
  * @var array $textKeys
  */
  public static $textKeys  = array
  (
    'input'  => array( 'name','lastname','name'),
    'text'   => array( 'name','lastname','name'),
  );


 /**
  * the name of the entity in the System
  * @var string $entityName
  */
  public static $entityName  = 'WbfsysRoleUser';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Role User';
      
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
      'id_person'         ,
      'id_mandant'        ,
      'id_employee'       ,
      'password'          ,
      'reset_pwd_key'     ,
      'reset_pwd_date'    ,
      'inactive'          ,
      'non_cert_login'    ,
      'level'             ,
      'profile'           ,
      'id_domain'         ,
      'type'              ,
      'last_login'        ,
      'change_password'   ,
      'salt_password'     
    ),
    'contact' => array
    (
      'email'             
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
    'id_person'     => 'core_person',
    'id_mandant'    => 'wbfsys_role_mandant',
    'level'         => 'wbfsys_security_level',
    'profile'       => 'wbfsys_profile',
    'id_domain'     => 'wbfsys_domain',
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
    the Name of the role user
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
    'email' => array
    (
      'text'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      true      , // is a search field 
      false     , // is a array in the database
      'contact' , // the main category for this field
      ''        , // the default value on create
    ),
    'id_person' => array
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
    'id_employee' => array
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
    'password' => array
    (
      'password', // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'reset_pwd_key' => array
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
    'reset_pwd_date' => array
    (
      'timestamp', // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'inactive' => array
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
    'non_cert_login' => array
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
    'profile' => array
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
    'id_domain' => array
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
    'type' => array
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
    Description for role user
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
    'last_login' => array
    (
      'timestamp', // Validator 
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
    Date until the password has to be changed
    */
    'change_password' => array
    (
      'date'    , // Validator 
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
    Salt Value for the password
    */
    'salt_password' => array
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
      'default' => 'wbfsys.role_user.message.error_def_name',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_name',
      'max'     => 'wbfsys.role_user.message.error_max_name',
      'min'     => 'wbfsys.role_user.message.error_min_name',
    ),

    'email' => array
    (
      'default' => 'wbfsys.role_user.message.error_def_email',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_email',
      'max'     => 'wbfsys.role_user.message.error_max_email',
      'min'     => 'wbfsys.role_user.message.error_min_email',
    ),

    'id_person' => array
    (
      'default' => 'wbfsys.role_user.message.error_def_id_person',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_id_person',
      'max'     => 'wbfsys.role_user.message.error_max_id_person',
      'min'     => 'wbfsys.role_user.message.error_min_id_person',
    ),

    'id_mandant' => array
    (
      'default' => 'wbfsys.role_user.message.error_def_id_mandant',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_id_mandant',
      'max'     => 'wbfsys.role_user.message.error_max_id_mandant',
      'min'     => 'wbfsys.role_user.message.error_min_id_mandant',
    ),

    'id_employee' => array
    (
      'default' => 'wbfsys.role_user.message.error_def_id_employee',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_id_employee',
      'max'     => 'wbfsys.role_user.message.error_max_id_employee',
      'min'     => 'wbfsys.role_user.message.error_min_id_employee',
    ),

    'password' => array
    (
      'default' => 'wbfsys.role_user.message.error_def_password',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_password',
      'max'     => 'wbfsys.role_user.message.error_max_password',
      'min'     => 'wbfsys.role_user.message.error_min_password',
    ),

    'reset_pwd_key' => array
    (
      'default' => 'wbfsys.role_user.message.error_def_reset_pwd_key',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_reset_pwd_key',
      'max'     => 'wbfsys.role_user.message.error_max_reset_pwd_key',
      'min'     => 'wbfsys.role_user.message.error_min_reset_pwd_key',
    ),

    'reset_pwd_date' => array
    (
      'default' => 'wbfsys.role_user.message.error_def_reset_pwd_date',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_reset_pwd_date',
      'max'     => 'wbfsys.role_user.message.error_max_reset_pwd_date',
      'min'     => 'wbfsys.role_user.message.error_min_reset_pwd_date',
    ),

    'inactive' => array
    (
      'default' => 'wbfsys.role_user.message.error_def_inactive',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_inactive',
      'max'     => 'wbfsys.role_user.message.error_max_inactive',
      'min'     => 'wbfsys.role_user.message.error_min_inactive',
    ),

    'non_cert_login' => array
    (
      'default' => 'wbfsys.role_user.message.error_def_non_cert_login',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_non_cert_login',
      'max'     => 'wbfsys.role_user.message.error_max_non_cert_login',
      'min'     => 'wbfsys.role_user.message.error_min_non_cert_login',
    ),

    'level' => array
    (
      'default' => 'wbfsys.role_user.message.error_def_level',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_level',
      'max'     => 'wbfsys.role_user.message.error_max_level',
      'min'     => 'wbfsys.role_user.message.error_min_level',
    ),

    'profile' => array
    (
      'default' => 'wbfsys.role_user.message.error_def_profile',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_profile',
      'max'     => 'wbfsys.role_user.message.error_max_profile',
      'min'     => 'wbfsys.role_user.message.error_min_profile',
    ),

    'id_domain' => array
    (
      'default' => 'wbfsys.role_user.message.error_def_id_domain',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_id_domain',
      'max'     => 'wbfsys.role_user.message.error_max_id_domain',
      'min'     => 'wbfsys.role_user.message.error_min_id_domain',
    ),

    'type' => array
    (
      'default' => 'wbfsys.role_user.message.error_def_type',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_type',
      'max'     => 'wbfsys.role_user.message.error_max_type',
      'min'     => 'wbfsys.role_user.message.error_min_type',
    ),

    'description' => array
    (
      'default' => 'wbfsys.role_user.message.error_def_description',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_description',
      'max'     => 'wbfsys.role_user.message.error_max_description',
      'min'     => 'wbfsys.role_user.message.error_min_description',
    ),

    'last_login' => array
    (
      'default' => 'wbfsys.role_user.message.error_def_last_login',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_last_login',
      'max'     => 'wbfsys.role_user.message.error_max_last_login',
      'min'     => 'wbfsys.role_user.message.error_min_last_login',
    ),

    'change_password' => array
    (
      'default' => 'wbfsys.role_user.message.error_def_change_password',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_change_password',
      'max'     => 'wbfsys.role_user.message.error_max_change_password',
      'min'     => 'wbfsys.role_user.message.error_min_change_password',
    ),

    'salt_password' => array
    (
      'default' => 'wbfsys.role_user.message.error_def_salt_password',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_salt_password',
      'max'     => 'wbfsys.role_user.message.error_max_salt_password',
      'min'     => 'wbfsys.role_user.message.error_min_salt_password',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.role_user.message.error_def_rowid',
      'wrong'   => 'wbfsys.role_user.message.error_wrong_rowid',
      'empty'   => 'wbfsys.role_user.message.error_empty_rowid',
      'max'     => 'wbfsys.role_user.message.error_max_rowid',
      'min'     => 'wbfsys.role_user.message.error_min_rowid',
    ),
  );

}//end class WbfsysRoleUser_Entity


