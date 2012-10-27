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
 * Entity Class for the Database Table wbfsys_security_access
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysSecurityAccess_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_security_access';

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
  public static $toUrl     = 'index.php?c=Wbfsys.SecurityAccess.show';

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
  public static $entityName  = 'WbfsysSecurityAccess';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Security Access';
      
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
      'id_group'          ,
      'id_area'           ,
      'access_level'      ,
      'ref_access_level'  ,
      'date_start'        ,
      'partial'           ,
      'date_end'          
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
    'id_group'      => 'wbfsys_role_group',
    'id_area'       => 'wbfsys_security_area',
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
    'id_group' => array
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
    'id_area' => array
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
    'access_level' => array
    (
      'text'    , // Validator 
      true      , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      null      , // the default value on create
    ),
    'ref_access_level' => array
    (
      'text'    , // Validator 
      true      , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      null      , // the default value on create
    ),
    /*
    Start Date for security access
    */
    'date_start' => array
    (
      'date'    , // Validator 
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
    Description for security access
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
    'partial' => array
    (
      'text'    , // Validator 
      true      , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      '0'       , // the default value on create
    ),
    /*
    End Date for security access
    */
    'date_end' => array
    (
      'date'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      true      , // is a search field 
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
    'id_group' => array
    (
      'default' => 'wbfsys.security_access.message.error_def_id_group',
      'wrong'   => 'wbfsys.security_access.message.error_wrong_id_group',
      'empty'   => 'wbfsys.security_access.message.error_empty_id_group',
      'max'     => 'wbfsys.security_access.message.error_max_id_group',
      'min'     => 'wbfsys.security_access.message.error_min_id_group',
    ),

    'id_area' => array
    (
      'default' => 'wbfsys.security_access.message.error_def_id_area',
      'wrong'   => 'wbfsys.security_access.message.error_wrong_id_area',
      'empty'   => 'wbfsys.security_access.message.error_empty_id_area',
      'max'     => 'wbfsys.security_access.message.error_max_id_area',
      'min'     => 'wbfsys.security_access.message.error_min_id_area',
    ),

    'access_level' => array
    (
      'default' => 'wbfsys.security_access.message.error_def_access_level',
      'wrong'   => 'wbfsys.security_access.message.error_wrong_access_level',
      'empty'   => 'wbfsys.security_access.message.error_empty_access_level',
      'max'     => 'wbfsys.security_access.message.error_max_access_level',
      'min'     => 'wbfsys.security_access.message.error_min_access_level',
    ),

    'ref_access_level' => array
    (
      'default' => 'wbfsys.security_access.message.error_def_ref_access_level',
      'wrong'   => 'wbfsys.security_access.message.error_wrong_ref_access_level',
      'empty'   => 'wbfsys.security_access.message.error_empty_ref_access_level',
      'max'     => 'wbfsys.security_access.message.error_max_ref_access_level',
      'min'     => 'wbfsys.security_access.message.error_min_ref_access_level',
    ),

    'date_start' => array
    (
      'default' => 'wbfsys.security_access.message.error_def_date_start',
      'wrong'   => 'wbfsys.security_access.message.error_wrong_date_start',
      'max'     => 'wbfsys.security_access.message.error_max_date_start',
      'min'     => 'wbfsys.security_access.message.error_min_date_start',
    ),

    'description' => array
    (
      'default' => 'wbfsys.security_access.message.error_def_description',
      'wrong'   => 'wbfsys.security_access.message.error_wrong_description',
      'max'     => 'wbfsys.security_access.message.error_max_description',
      'min'     => 'wbfsys.security_access.message.error_min_description',
    ),

    'partial' => array
    (
      'default' => 'wbfsys.security_access.message.error_def_partial',
      'wrong'   => 'wbfsys.security_access.message.error_wrong_partial',
      'empty'   => 'wbfsys.security_access.message.error_empty_partial',
      'max'     => 'wbfsys.security_access.message.error_max_partial',
      'min'     => 'wbfsys.security_access.message.error_min_partial',
    ),

    'date_end' => array
    (
      'default' => 'wbfsys.security_access.message.error_def_date_end',
      'wrong'   => 'wbfsys.security_access.message.error_wrong_date_end',
      'max'     => 'wbfsys.security_access.message.error_max_date_end',
      'min'     => 'wbfsys.security_access.message.error_min_date_end',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.security_access.message.error_def_rowid',
      'wrong'   => 'wbfsys.security_access.message.error_wrong_rowid',
      'empty'   => 'wbfsys.security_access.message.error_empty_rowid',
      'max'     => 'wbfsys.security_access.message.error_max_rowid',
      'min'     => 'wbfsys.security_access.message.error_min_rowid',
    ),
  );

}//end class WbfsysSecurityAccess_Entity


