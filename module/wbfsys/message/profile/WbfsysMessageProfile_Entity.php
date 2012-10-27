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
 * Entity Class for the Database Table wbfsys_message_profile
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMessageProfile_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_message_profile';

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
  public static $toUrl     = 'index.php?c=Wbfsys.MessageProfile.show';

 /**
  * all keynames for fields that will be displayed in the textvalue of the entity
  * @var array $textKeys
  */
  public static $textKeys  = array
  (
    'input'  => array( 'name','user_name'),
    'text'   => array( 'name','user_name'),
  );


 /**
  * the name of the entity in the System
  * @var string $entityName
  */
  public static $entityName  = 'WbfsysMessageProfile';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Message Profile';
      
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
      'id_type'           ,
      'id_visibility'     ,
      'user_name'         ,
      'password'          ,
      'server'            ,
      'id_user'           ,
      'change_password'   ,
      'salt_password'     ,
      'port'              
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
    'id_type'       => 'wbfsys_message_profile_type',
    'id_visibility' => 'wbfsys_user_contact_visibility',
    'id_user'       => 'wbfsys_role_user',
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
    the Name of the message profile
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
    Welchen Type hat diese Quelle?
              Mail, Facebook, Messenger usw.
              Kann auch eine assynchrone Quelle wie z.B ein RSS Feed sein.
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
    Sichtbarkeit dieser Kontaktmöglichkeit für andere
    */
    'id_visibility' => array
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
    the Name of the message profile
    */
    'user_name' => array
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
    /*
    Server Address for message profile
    */
    'server' => array
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
    Description for message profile
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
    'id_user' => array
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
    /*
    server port for message profile
    */
    'port' => array
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
      'default' => 'wbfsys.message_profile.message.error_def_name',
      'wrong'   => 'wbfsys.message_profile.message.error_wrong_name',
      'max'     => 'wbfsys.message_profile.message.error_max_name',
      'min'     => 'wbfsys.message_profile.message.error_min_name',
    ),

    'id_type' => array
    (
      'default' => 'wbfsys.message_profile.message.error_def_id_type',
      'wrong'   => 'wbfsys.message_profile.message.error_wrong_id_type',
      'max'     => 'wbfsys.message_profile.message.error_max_id_type',
      'min'     => 'wbfsys.message_profile.message.error_min_id_type',
    ),

    'id_visibility' => array
    (
      'default' => 'wbfsys.message_profile.message.error_def_id_visibility',
      'wrong'   => 'wbfsys.message_profile.message.error_wrong_id_visibility',
      'max'     => 'wbfsys.message_profile.message.error_max_id_visibility',
      'min'     => 'wbfsys.message_profile.message.error_min_id_visibility',
    ),

    'user_name' => array
    (
      'default' => 'wbfsys.message_profile.message.error_def_user_name',
      'wrong'   => 'wbfsys.message_profile.message.error_wrong_user_name',
      'max'     => 'wbfsys.message_profile.message.error_max_user_name',
      'min'     => 'wbfsys.message_profile.message.error_min_user_name',
    ),

    'password' => array
    (
      'default' => 'wbfsys.message_profile.message.error_def_password',
      'wrong'   => 'wbfsys.message_profile.message.error_wrong_password',
      'max'     => 'wbfsys.message_profile.message.error_max_password',
      'min'     => 'wbfsys.message_profile.message.error_min_password',
    ),

    'server' => array
    (
      'default' => 'wbfsys.message_profile.message.error_def_server',
      'wrong'   => 'wbfsys.message_profile.message.error_wrong_server',
      'max'     => 'wbfsys.message_profile.message.error_max_server',
      'min'     => 'wbfsys.message_profile.message.error_min_server',
    ),

    'description' => array
    (
      'default' => 'wbfsys.message_profile.message.error_def_description',
      'wrong'   => 'wbfsys.message_profile.message.error_wrong_description',
      'max'     => 'wbfsys.message_profile.message.error_max_description',
      'min'     => 'wbfsys.message_profile.message.error_min_description',
    ),

    'id_user' => array
    (
      'default' => 'wbfsys.message_profile.message.error_def_id_user',
      'wrong'   => 'wbfsys.message_profile.message.error_wrong_id_user',
      'max'     => 'wbfsys.message_profile.message.error_max_id_user',
      'min'     => 'wbfsys.message_profile.message.error_min_id_user',
    ),

    'change_password' => array
    (
      'default' => 'wbfsys.message_profile.message.error_def_change_password',
      'wrong'   => 'wbfsys.message_profile.message.error_wrong_change_password',
      'max'     => 'wbfsys.message_profile.message.error_max_change_password',
      'min'     => 'wbfsys.message_profile.message.error_min_change_password',
    ),

    'salt_password' => array
    (
      'default' => 'wbfsys.message_profile.message.error_def_salt_password',
      'wrong'   => 'wbfsys.message_profile.message.error_wrong_salt_password',
      'max'     => 'wbfsys.message_profile.message.error_max_salt_password',
      'min'     => 'wbfsys.message_profile.message.error_min_salt_password',
    ),

    'port' => array
    (
      'default' => 'wbfsys.message_profile.message.error_def_port',
      'wrong'   => 'wbfsys.message_profile.message.error_wrong_port',
      'max'     => 'wbfsys.message_profile.message.error_max_port',
      'min'     => 'wbfsys.message_profile.message.error_min_port',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.message_profile.message.error_def_rowid',
      'wrong'   => 'wbfsys.message_profile.message.error_wrong_rowid',
      'empty'   => 'wbfsys.message_profile.message.error_empty_rowid',
      'max'     => 'wbfsys.message_profile.message.error_max_rowid',
      'min'     => 'wbfsys.message_profile.message.error_min_rowid',
    ),
  );

}//end class WbfsysMessageProfile_Entity


