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
 * Entity Class for the Database Table wbfsys_mask_list_settings
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMaskListSettings_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_mask_list_settings';

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
  public static $toUrl     = 'index.php?c=Wbfsys.MaskListSettings.show';

 /**
  * all keynames for fields that will be displayed in the textvalue of the entity
  * @var array $textKeys
  */
  public static $textKeys  = array
  (
    'input'  => array( 'title'),
    'text'   => array( 'title'),
  );


 /**
  * the name of the entity in the System
  * @var string $entityName
  */
  public static $entityName  = 'WbfsysMaskListSettings';

 /**
  * the description
  * @var string $description
  */
  public static $description  = 'Mask List Settings';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Mask List Settings';
      
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
      'title'             ,
      'access_key'        ,
      'id_mask'           ,
      'col_settings'      ,
      'filter_settings'   ,
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
    'id_mask'       => 'wbfsys_mask',
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
    Ttle the mask list settings
    */
    'title' => array
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
    Access Key for mask list settings
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
    'id_mask' => array
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
    'col_settings' => array
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
    'filter_settings' => array
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
    Description for mask list settings
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
    'title' => array
    (
      'default' => 'wbfsys.mask_list_settings.message.error_def_title',
      'wrong'   => 'wbfsys.mask_list_settings.message.error_wrong_title',
      'empty'   => 'wbfsys.mask_list_settings.message.error_empty_title',
      'max'     => 'wbfsys.mask_list_settings.message.error_max_title',
      'min'     => 'wbfsys.mask_list_settings.message.error_min_title',
    ),

    'access_key' => array
    (
      'default' => 'wbfsys.mask_list_settings.message.error_def_access_key',
      'wrong'   => 'wbfsys.mask_list_settings.message.error_wrong_access_key',
      'empty'   => 'wbfsys.mask_list_settings.message.error_empty_access_key',
      'max'     => 'wbfsys.mask_list_settings.message.error_max_access_key',
      'min'     => 'wbfsys.mask_list_settings.message.error_min_access_key',
    ),

    'id_mask' => array
    (
      'default' => 'wbfsys.mask_list_settings.message.error_def_id_mask',
      'wrong'   => 'wbfsys.mask_list_settings.message.error_wrong_id_mask',
      'empty'   => 'wbfsys.mask_list_settings.message.error_empty_id_mask',
      'max'     => 'wbfsys.mask_list_settings.message.error_max_id_mask',
      'min'     => 'wbfsys.mask_list_settings.message.error_min_id_mask',
    ),

    'col_settings' => array
    (
      'default' => 'wbfsys.mask_list_settings.message.error_def_col_settings',
      'wrong'   => 'wbfsys.mask_list_settings.message.error_wrong_col_settings',
      'max'     => 'wbfsys.mask_list_settings.message.error_max_col_settings',
      'min'     => 'wbfsys.mask_list_settings.message.error_min_col_settings',
    ),

    'filter_settings' => array
    (
      'default' => 'wbfsys.mask_list_settings.message.error_def_filter_settings',
      'wrong'   => 'wbfsys.mask_list_settings.message.error_wrong_filter_settings',
      'max'     => 'wbfsys.mask_list_settings.message.error_max_filter_settings',
      'min'     => 'wbfsys.mask_list_settings.message.error_min_filter_settings',
    ),

    'description' => array
    (
      'default' => 'wbfsys.mask_list_settings.message.error_def_description',
      'wrong'   => 'wbfsys.mask_list_settings.message.error_wrong_description',
      'max'     => 'wbfsys.mask_list_settings.message.error_max_description',
      'min'     => 'wbfsys.mask_list_settings.message.error_min_description',
    ),

    'revision' => array
    (
      'default' => 'wbfsys.mask_list_settings.message.error_def_revision',
      'wrong'   => 'wbfsys.mask_list_settings.message.error_wrong_revision',
      'max'     => 'wbfsys.mask_list_settings.message.error_max_revision',
      'min'     => 'wbfsys.mask_list_settings.message.error_min_revision',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.mask_list_settings.message.error_def_rowid',
      'wrong'   => 'wbfsys.mask_list_settings.message.error_wrong_rowid',
      'empty'   => 'wbfsys.mask_list_settings.message.error_empty_rowid',
      'max'     => 'wbfsys.mask_list_settings.message.error_max_rowid',
      'min'     => 'wbfsys.mask_list_settings.message.error_min_rowid',
    ),
  );

}//end class WbfsysMaskListSettings_Entity


