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
 * Entity Class for the Database Table wbfsys_profile_quicklink
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysProfileQuicklink_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_profile_quicklink';

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
  public static $toUrl     = 'index.php?c=Wbfsys.ProfileQuicklink.show';

 /**
  * all keynames for fields that will be displayed in the textvalue of the entity
  * @var array $textKeys
  */
  public static $textKeys  = array
  (
    'input'  => array( 'short_desc'),
    'text'   => array( 'short_desc'),
  );


 /**
  * the name of the entity in the System
  * @var string $entityName
  */
  public static $entityName  = 'WbfsysProfileQuicklink';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Profile Quicklink';
      
 /**
  * @var boolean
  */
  public static $trackChanges  = false;
  
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
  public static $isSyncable    = false;
        
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $categories = array
  (
    'default' => array
    (
      'id_profile'        ,
      'access_key'        ,
      'label'             ,
      'http_url'          ,
      'short_desc'        ,
      'revision'          
    ),
    'meta' => array
    (
      'rowid'             ,
      'm_time_created'    ,
      'm_role_create'     
    ),
  );

 /**
  * all link references from this entity to other entities
  * @var string $table
  */
  public static $links = array
  (
    'id_profile'    => 'wbfsys_profile',
    'm_role_create' => 'wbfsys_role_user',
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
    'id_profile' => array
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
    Access Key for profile quicklink
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
    Label for profile quicklink
    */
    'label' => array
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
    URL profile quicklink
    */
    'http_url' => array
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
    short desc for profile quicklink
    */
    'short_desc' => array
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
  );

 /**
  * the error messages for this entity
  * @var array
  */
  public static $messages = array
  (
    'id_profile' => array
    (
      'default' => 'wbfsys.profile_quicklink.message.error_def_id_profile',
      'wrong'   => 'wbfsys.profile_quicklink.message.error_wrong_id_profile',
      'max'     => 'wbfsys.profile_quicklink.message.error_max_id_profile',
      'min'     => 'wbfsys.profile_quicklink.message.error_min_id_profile',
    ),

    'access_key' => array
    (
      'default' => 'wbfsys.profile_quicklink.message.error_def_access_key',
      'wrong'   => 'wbfsys.profile_quicklink.message.error_wrong_access_key',
      'max'     => 'wbfsys.profile_quicklink.message.error_max_access_key',
      'min'     => 'wbfsys.profile_quicklink.message.error_min_access_key',
    ),

    'label' => array
    (
      'default' => 'wbfsys.profile_quicklink.message.error_def_label',
      'wrong'   => 'wbfsys.profile_quicklink.message.error_wrong_label',
      'max'     => 'wbfsys.profile_quicklink.message.error_max_label',
      'min'     => 'wbfsys.profile_quicklink.message.error_min_label',
    ),

    'http_url' => array
    (
      'default' => 'wbfsys.profile_quicklink.message.error_def_http_url',
      'wrong'   => 'wbfsys.profile_quicklink.message.error_wrong_http_url',
      'max'     => 'wbfsys.profile_quicklink.message.error_max_http_url',
      'min'     => 'wbfsys.profile_quicklink.message.error_min_http_url',
    ),

    'short_desc' => array
    (
      'default' => 'wbfsys.profile_quicklink.message.error_def_short_desc',
      'wrong'   => 'wbfsys.profile_quicklink.message.error_wrong_short_desc',
      'max'     => 'wbfsys.profile_quicklink.message.error_max_short_desc',
      'min'     => 'wbfsys.profile_quicklink.message.error_min_short_desc',
    ),

    'revision' => array
    (
      'default' => 'wbfsys.profile_quicklink.message.error_def_revision',
      'wrong'   => 'wbfsys.profile_quicklink.message.error_wrong_revision',
      'max'     => 'wbfsys.profile_quicklink.message.error_max_revision',
      'min'     => 'wbfsys.profile_quicklink.message.error_min_revision',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.profile_quicklink.message.error_def_rowid',
      'wrong'   => 'wbfsys.profile_quicklink.message.error_wrong_rowid',
      'empty'   => 'wbfsys.profile_quicklink.message.error_empty_rowid',
      'max'     => 'wbfsys.profile_quicklink.message.error_max_rowid',
      'min'     => 'wbfsys.profile_quicklink.message.error_min_rowid',
    ),
  );

}//end class WbfsysProfileQuicklink_Entity


