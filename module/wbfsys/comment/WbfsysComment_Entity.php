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
 * Entity Class for the Database Table wbfsys_comment
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysComment_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_comment';

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
  public static $toUrl     = 'index.php?c=Wbfsys.Comment.show';

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
  public static $entityName  = 'WbfsysComment';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Comment';
      
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
      'title'             ,
      'rate'              ,
      'lft'               ,
      'vid'               ,
      'id_lang'           ,
      'rgt'               ,
      'id_vid_entity'     
    ),
    'content' => array
    (
      'content'           
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
    'm_parent'      => 'wbfsys_comment',
    'id_lang'       => 'wbfsys_language',
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
    Ttle the comment
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
    Rating for comment
    */
    'rate' => array
    (
      'numeric' , // Validator 
      false     , // is the field required
      5         , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'lft' => array
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
    /*
    Language for comment
    */
    'id_lang' => array
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
    Content for comment
    */
    'content' => array
    (
      'text'    , // Validator 
      true      , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      true      , // is a search field 
      false     , // is a array in the database
      'content' , // the main category for this field
      ''        , // the default value on create
    ),
    'rgt' => array
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
    'title' => array
    (
      'default' => 'wbfsys.comment.message.error_def_title',
      'wrong'   => 'wbfsys.comment.message.error_wrong_title',
      'empty'   => 'wbfsys.comment.message.error_empty_title',
      'max'     => 'wbfsys.comment.message.error_max_title',
      'min'     => 'wbfsys.comment.message.error_min_title',
    ),

    'rate' => array
    (
      'default' => 'wbfsys.comment.message.error_def_rate',
      'wrong'   => 'wbfsys.comment.message.error_wrong_rate',
      'max'     => 'wbfsys.comment.message.error_max_rate',
      'min'     => 'wbfsys.comment.message.error_min_rate',
    ),

    'lft' => array
    (
      'default' => 'wbfsys.comment.message.error_def_lft',
      'wrong'   => 'wbfsys.comment.message.error_wrong_lft',
      'max'     => 'wbfsys.comment.message.error_max_lft',
      'min'     => 'wbfsys.comment.message.error_min_lft',
    ),

    'vid' => array
    (
      'default' => 'wbfsys.comment.message.error_def_vid',
      'wrong'   => 'wbfsys.comment.message.error_wrong_vid',
      'max'     => 'wbfsys.comment.message.error_max_vid',
      'min'     => 'wbfsys.comment.message.error_min_vid',
    ),

    'id_lang' => array
    (
      'default' => 'wbfsys.comment.message.error_def_id_lang',
      'wrong'   => 'wbfsys.comment.message.error_wrong_id_lang',
      'max'     => 'wbfsys.comment.message.error_max_id_lang',
      'min'     => 'wbfsys.comment.message.error_min_id_lang',
    ),

    'content' => array
    (
      'default' => 'wbfsys.comment.message.error_def_content',
      'wrong'   => 'wbfsys.comment.message.error_wrong_content',
      'empty'   => 'wbfsys.comment.message.error_empty_content',
      'max'     => 'wbfsys.comment.message.error_max_content',
      'min'     => 'wbfsys.comment.message.error_min_content',
    ),

    'rgt' => array
    (
      'default' => 'wbfsys.comment.message.error_def_rgt',
      'wrong'   => 'wbfsys.comment.message.error_wrong_rgt',
      'max'     => 'wbfsys.comment.message.error_max_rgt',
      'min'     => 'wbfsys.comment.message.error_min_rgt',
    ),

    'id_vid_entity' => array
    (
      'default' => 'wbfsys.comment.message.error_def_id_vid_entity',
      'wrong'   => 'wbfsys.comment.message.error_wrong_id_vid_entity',
      'max'     => 'wbfsys.comment.message.error_max_id_vid_entity',
      'min'     => 'wbfsys.comment.message.error_min_id_vid_entity',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.comment.message.error_def_rowid',
      'wrong'   => 'wbfsys.comment.message.error_wrong_rowid',
      'empty'   => 'wbfsys.comment.message.error_empty_rowid',
      'max'     => 'wbfsys.comment.message.error_max_rowid',
      'min'     => 'wbfsys.comment.message.error_min_rowid',
    ),
  );

}//end class WbfsysComment_Entity


