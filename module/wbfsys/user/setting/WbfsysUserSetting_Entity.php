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
 * Entity Class for the Database Table wbfsys_user_setting
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysUserSetting_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_user_setting';

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
  public static $toUrl     = 'index.php?c=Wbfsys.UserSetting.show';

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
  public static $entityName  = 'WbfsysUserSetting';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'User Setting';
      
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
      'id_user'           ,
      'id_theme_icon'     ,
      'id_theme_layout'   ,
      'id_language'       ,
      'smtp'              ,
      'pop3'              ,
      'imap'              ,
      'sieve'             ,
      'id_maillocation'   ,
      'id_transport'      
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
    'id_user'       => 'wbfsys_role_user',
    'id_theme_icon' => 'wbfsys_theme_icon',
    'id_theme_layout'=> 'wbfsys_theme_layout',
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
    'id_theme_icon' => array
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
    'id_theme_layout' => array
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
    'id_language' => array
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
    'smtp' => array
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
    'pop3' => array
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
    'imap' => array
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
    'sieve' => array
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
    'id_maillocation' => array
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
    'id_transport' => array
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
    'id_user' => array
    (
      'default' => 'wbfsys.user_setting.message.error_def_id_user',
      'wrong'   => 'wbfsys.user_setting.message.error_wrong_id_user',
      'max'     => 'wbfsys.user_setting.message.error_max_id_user',
      'min'     => 'wbfsys.user_setting.message.error_min_id_user',
    ),

    'id_theme_icon' => array
    (
      'default' => 'wbfsys.user_setting.message.error_def_id_theme_icon',
      'wrong'   => 'wbfsys.user_setting.message.error_wrong_id_theme_icon',
      'max'     => 'wbfsys.user_setting.message.error_max_id_theme_icon',
      'min'     => 'wbfsys.user_setting.message.error_min_id_theme_icon',
    ),

    'id_theme_layout' => array
    (
      'default' => 'wbfsys.user_setting.message.error_def_id_theme_layout',
      'wrong'   => 'wbfsys.user_setting.message.error_wrong_id_theme_layout',
      'max'     => 'wbfsys.user_setting.message.error_max_id_theme_layout',
      'min'     => 'wbfsys.user_setting.message.error_min_id_theme_layout',
    ),

    'id_language' => array
    (
      'default' => 'wbfsys.user_setting.message.error_def_id_language',
      'wrong'   => 'wbfsys.user_setting.message.error_wrong_id_language',
      'max'     => 'wbfsys.user_setting.message.error_max_id_language',
      'min'     => 'wbfsys.user_setting.message.error_min_id_language',
    ),

    'smtp' => array
    (
      'default' => 'wbfsys.user_setting.message.error_def_smtp',
      'wrong'   => 'wbfsys.user_setting.message.error_wrong_smtp',
      'max'     => 'wbfsys.user_setting.message.error_max_smtp',
      'min'     => 'wbfsys.user_setting.message.error_min_smtp',
    ),

    'pop3' => array
    (
      'default' => 'wbfsys.user_setting.message.error_def_pop3',
      'wrong'   => 'wbfsys.user_setting.message.error_wrong_pop3',
      'max'     => 'wbfsys.user_setting.message.error_max_pop3',
      'min'     => 'wbfsys.user_setting.message.error_min_pop3',
    ),

    'imap' => array
    (
      'default' => 'wbfsys.user_setting.message.error_def_imap',
      'wrong'   => 'wbfsys.user_setting.message.error_wrong_imap',
      'max'     => 'wbfsys.user_setting.message.error_max_imap',
      'min'     => 'wbfsys.user_setting.message.error_min_imap',
    ),

    'sieve' => array
    (
      'default' => 'wbfsys.user_setting.message.error_def_sieve',
      'wrong'   => 'wbfsys.user_setting.message.error_wrong_sieve',
      'max'     => 'wbfsys.user_setting.message.error_max_sieve',
      'min'     => 'wbfsys.user_setting.message.error_min_sieve',
    ),

    'id_maillocation' => array
    (
      'default' => 'wbfsys.user_setting.message.error_def_id_maillocation',
      'wrong'   => 'wbfsys.user_setting.message.error_wrong_id_maillocation',
      'max'     => 'wbfsys.user_setting.message.error_max_id_maillocation',
      'min'     => 'wbfsys.user_setting.message.error_min_id_maillocation',
    ),

    'id_transport' => array
    (
      'default' => 'wbfsys.user_setting.message.error_def_id_transport',
      'wrong'   => 'wbfsys.user_setting.message.error_wrong_id_transport',
      'max'     => 'wbfsys.user_setting.message.error_max_id_transport',
      'min'     => 'wbfsys.user_setting.message.error_min_id_transport',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.user_setting.message.error_def_rowid',
      'wrong'   => 'wbfsys.user_setting.message.error_wrong_rowid',
      'empty'   => 'wbfsys.user_setting.message.error_empty_rowid',
      'max'     => 'wbfsys.user_setting.message.error_max_rowid',
      'min'     => 'wbfsys.user_setting.message.error_min_rowid',
    ),
  );

}//end class WbfsysUserSetting_Entity


