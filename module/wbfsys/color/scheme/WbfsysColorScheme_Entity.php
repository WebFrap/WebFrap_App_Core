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
 * Entity Class for the Database Table wbfsys_color_scheme
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysColorScheme_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_color_scheme';

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
  public static $toUrl     = 'index.php?c=Wbfsys.ColorScheme.show';

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
  public static $entityName  = 'WbfsysColorScheme';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Color Scheme';
      
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
      'display_color'     ,
      'bg_default'        ,
      'font_default'      ,
      'border_default'    ,
      'bg_active'         ,
      'font_active'       ,
      'border_active'     ,
      'bg_hover'          ,
      'font_hover'        ,
      'border_hover'      ,
      'access_key'        
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
    the Name of the color scheme
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
    Color for color scheme
    */
    'display_color' => array
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
    Color for color scheme
    */
    'bg_default' => array
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
    Color for color scheme
    */
    'font_default' => array
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
    Color for color scheme
    */
    'border_default' => array
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
    Color for color scheme
    */
    'bg_active' => array
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
    Color for color scheme
    */
    'font_active' => array
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
    Color for color scheme
    */
    'border_active' => array
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
    Color for color scheme
    */
    'bg_hover' => array
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
    Color for color scheme
    */
    'font_hover' => array
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
    Color for color scheme
    */
    'border_hover' => array
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
    Access Key for color scheme
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
    Description for color scheme
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
      'default' => 'wbfsys.color_scheme.message.error_def_name',
      'wrong'   => 'wbfsys.color_scheme.message.error_wrong_name',
      'max'     => 'wbfsys.color_scheme.message.error_max_name',
      'min'     => 'wbfsys.color_scheme.message.error_min_name',
    ),

    'display_color' => array
    (
      'default' => 'wbfsys.color_scheme.message.error_def_display_color',
      'wrong'   => 'wbfsys.color_scheme.message.error_wrong_display_color',
      'max'     => 'wbfsys.color_scheme.message.error_max_display_color',
      'min'     => 'wbfsys.color_scheme.message.error_min_display_color',
    ),

    'bg_default' => array
    (
      'default' => 'wbfsys.color_scheme.message.error_def_bg_default',
      'wrong'   => 'wbfsys.color_scheme.message.error_wrong_bg_default',
      'max'     => 'wbfsys.color_scheme.message.error_max_bg_default',
      'min'     => 'wbfsys.color_scheme.message.error_min_bg_default',
    ),

    'font_default' => array
    (
      'default' => 'wbfsys.color_scheme.message.error_def_font_default',
      'wrong'   => 'wbfsys.color_scheme.message.error_wrong_font_default',
      'max'     => 'wbfsys.color_scheme.message.error_max_font_default',
      'min'     => 'wbfsys.color_scheme.message.error_min_font_default',
    ),

    'border_default' => array
    (
      'default' => 'wbfsys.color_scheme.message.error_def_border_default',
      'wrong'   => 'wbfsys.color_scheme.message.error_wrong_border_default',
      'max'     => 'wbfsys.color_scheme.message.error_max_border_default',
      'min'     => 'wbfsys.color_scheme.message.error_min_border_default',
    ),

    'bg_active' => array
    (
      'default' => 'wbfsys.color_scheme.message.error_def_bg_active',
      'wrong'   => 'wbfsys.color_scheme.message.error_wrong_bg_active',
      'max'     => 'wbfsys.color_scheme.message.error_max_bg_active',
      'min'     => 'wbfsys.color_scheme.message.error_min_bg_active',
    ),

    'font_active' => array
    (
      'default' => 'wbfsys.color_scheme.message.error_def_font_active',
      'wrong'   => 'wbfsys.color_scheme.message.error_wrong_font_active',
      'max'     => 'wbfsys.color_scheme.message.error_max_font_active',
      'min'     => 'wbfsys.color_scheme.message.error_min_font_active',
    ),

    'border_active' => array
    (
      'default' => 'wbfsys.color_scheme.message.error_def_border_active',
      'wrong'   => 'wbfsys.color_scheme.message.error_wrong_border_active',
      'max'     => 'wbfsys.color_scheme.message.error_max_border_active',
      'min'     => 'wbfsys.color_scheme.message.error_min_border_active',
    ),

    'bg_hover' => array
    (
      'default' => 'wbfsys.color_scheme.message.error_def_bg_hover',
      'wrong'   => 'wbfsys.color_scheme.message.error_wrong_bg_hover',
      'max'     => 'wbfsys.color_scheme.message.error_max_bg_hover',
      'min'     => 'wbfsys.color_scheme.message.error_min_bg_hover',
    ),

    'font_hover' => array
    (
      'default' => 'wbfsys.color_scheme.message.error_def_font_hover',
      'wrong'   => 'wbfsys.color_scheme.message.error_wrong_font_hover',
      'max'     => 'wbfsys.color_scheme.message.error_max_font_hover',
      'min'     => 'wbfsys.color_scheme.message.error_min_font_hover',
    ),

    'border_hover' => array
    (
      'default' => 'wbfsys.color_scheme.message.error_def_border_hover',
      'wrong'   => 'wbfsys.color_scheme.message.error_wrong_border_hover',
      'max'     => 'wbfsys.color_scheme.message.error_max_border_hover',
      'min'     => 'wbfsys.color_scheme.message.error_min_border_hover',
    ),

    'access_key' => array
    (
      'default' => 'wbfsys.color_scheme.message.error_def_access_key',
      'wrong'   => 'wbfsys.color_scheme.message.error_wrong_access_key',
      'max'     => 'wbfsys.color_scheme.message.error_max_access_key',
      'min'     => 'wbfsys.color_scheme.message.error_min_access_key',
    ),

    'description' => array
    (
      'default' => 'wbfsys.color_scheme.message.error_def_description',
      'wrong'   => 'wbfsys.color_scheme.message.error_wrong_description',
      'max'     => 'wbfsys.color_scheme.message.error_max_description',
      'min'     => 'wbfsys.color_scheme.message.error_min_description',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.color_scheme.message.error_def_rowid',
      'wrong'   => 'wbfsys.color_scheme.message.error_wrong_rowid',
      'empty'   => 'wbfsys.color_scheme.message.error_empty_rowid',
      'max'     => 'wbfsys.color_scheme.message.error_max_rowid',
      'min'     => 'wbfsys.color_scheme.message.error_min_rowid',
    ),
  );

}//end class WbfsysColorScheme_Entity


