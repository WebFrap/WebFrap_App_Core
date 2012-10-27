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
 * Entity Class for the Database Table wbfsys_issue
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysIssue_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_issue';

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
  public static $toUrl     = 'index.php?c=Wbfsys.Issue.show';

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
  public static $entityName  = 'WbfsysIssue';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Issue';
      
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
      'id_type'           ,
      'id_category'       ,
      'id_status'         ,
      'id_severity'       ,
      'id_os'             ,
      'id_priority'       ,
      'id_browser'        ,
      'id_revision'       ,
      'id_finish_revision',
      'flag_hidden'       ,
      'finish_till'       ,
      'id_responsible'    ,
      'progress'          ,
      'vid'               ,
      'id_vid_entity'     
    ),
    'description' => array
    (
      'description'       ,
      'error_message'     
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
    'id_type'       => 'wbfsys_issue_type',
    'id_category'   => 'wbfsys_category',
    'id_status'     => 'wbfsys_process_node',
    'id_severity'   => 'wbfsys_issue_severity',
    'id_os'         => 'wbfsys_os',
    'id_priority'   => 'wbfsys_priority',
    'id_browser'    => 'wbfsys_browser',
    'id_revision'   => 'wbfsys_revision',
    'id_finish_revision'=> 'wbfsys_revision',
    'id_responsible'=> 'wbfsys_role_user',
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
    /*
    Ttle the issue
    */
    'title' => array
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
    ist es ein bugreport / whislist / planned feature
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
    Kategorien im Projekt Datenbank / View / Modul
    */
    'id_category' => array
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
    Status for issue
    */
    'id_status' => array
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
    leicht/mittel/schwer wird vom reporter vergeben
    */
    'id_severity' => array
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
    Welches Betriebsystem
    */
    'id_os' => array
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
    Die Priotität des Issues, wird vom Entwickler / Manager vergeben
    */
    'id_priority' => array
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
    Welche Plattform / Browser
    */
    'id_browser' => array
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
    'id_revision' => array
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
    'id_finish_revision' => array
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
    'flag_hidden' => array
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
    'finish_till' => array
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
    'id_responsible' => array
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
    Progress for issue
    */
    'progress' => array
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
    Description for issue
    */
    'description' => array
    (
      'text'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      true      , // is a search field 
      false     , // is a array in the database
      'description', // the main category for this field
      ''        , // the default value on create
    ),
    /*
    Description for issue
    */
    'error_message' => array
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
    'title' => array
    (
      'default' => 'wbfsys.issue.message.error_def_title',
      'wrong'   => 'wbfsys.issue.message.error_wrong_title',
      'max'     => 'wbfsys.issue.message.error_max_title',
      'min'     => 'wbfsys.issue.message.error_min_title',
    ),

    'id_type' => array
    (
      'default' => 'wbfsys.issue.message.error_def_id_type',
      'wrong'   => 'wbfsys.issue.message.error_wrong_id_type',
      'max'     => 'wbfsys.issue.message.error_max_id_type',
      'min'     => 'wbfsys.issue.message.error_min_id_type',
    ),

    'id_category' => array
    (
      'default' => 'wbfsys.issue.message.error_def_id_category',
      'wrong'   => 'wbfsys.issue.message.error_wrong_id_category',
      'max'     => 'wbfsys.issue.message.error_max_id_category',
      'min'     => 'wbfsys.issue.message.error_min_id_category',
    ),

    'id_status' => array
    (
      'default' => 'wbfsys.issue.message.error_def_id_status',
      'wrong'   => 'wbfsys.issue.message.error_wrong_id_status',
      'max'     => 'wbfsys.issue.message.error_max_id_status',
      'min'     => 'wbfsys.issue.message.error_min_id_status',
    ),

    'id_severity' => array
    (
      'default' => 'wbfsys.issue.message.error_def_id_severity',
      'wrong'   => 'wbfsys.issue.message.error_wrong_id_severity',
      'max'     => 'wbfsys.issue.message.error_max_id_severity',
      'min'     => 'wbfsys.issue.message.error_min_id_severity',
    ),

    'id_os' => array
    (
      'default' => 'wbfsys.issue.message.error_def_id_os',
      'wrong'   => 'wbfsys.issue.message.error_wrong_id_os',
      'max'     => 'wbfsys.issue.message.error_max_id_os',
      'min'     => 'wbfsys.issue.message.error_min_id_os',
    ),

    'id_priority' => array
    (
      'default' => 'wbfsys.issue.message.error_def_id_priority',
      'wrong'   => 'wbfsys.issue.message.error_wrong_id_priority',
      'max'     => 'wbfsys.issue.message.error_max_id_priority',
      'min'     => 'wbfsys.issue.message.error_min_id_priority',
    ),

    'id_browser' => array
    (
      'default' => 'wbfsys.issue.message.error_def_id_browser',
      'wrong'   => 'wbfsys.issue.message.error_wrong_id_browser',
      'max'     => 'wbfsys.issue.message.error_max_id_browser',
      'min'     => 'wbfsys.issue.message.error_min_id_browser',
    ),

    'id_revision' => array
    (
      'default' => 'wbfsys.issue.message.error_def_id_revision',
      'wrong'   => 'wbfsys.issue.message.error_wrong_id_revision',
      'max'     => 'wbfsys.issue.message.error_max_id_revision',
      'min'     => 'wbfsys.issue.message.error_min_id_revision',
    ),

    'id_finish_revision' => array
    (
      'default' => 'wbfsys.issue.message.error_def_id_finish_revision',
      'wrong'   => 'wbfsys.issue.message.error_wrong_id_finish_revision',
      'max'     => 'wbfsys.issue.message.error_max_id_finish_revision',
      'min'     => 'wbfsys.issue.message.error_min_id_finish_revision',
    ),

    'flag_hidden' => array
    (
      'default' => 'wbfsys.issue.message.error_def_flag_hidden',
      'wrong'   => 'wbfsys.issue.message.error_wrong_flag_hidden',
      'max'     => 'wbfsys.issue.message.error_max_flag_hidden',
      'min'     => 'wbfsys.issue.message.error_min_flag_hidden',
    ),

    'finish_till' => array
    (
      'default' => 'wbfsys.issue.message.error_def_finish_till',
      'wrong'   => 'wbfsys.issue.message.error_wrong_finish_till',
      'max'     => 'wbfsys.issue.message.error_max_finish_till',
      'min'     => 'wbfsys.issue.message.error_min_finish_till',
    ),

    'id_responsible' => array
    (
      'default' => 'wbfsys.issue.message.error_def_id_responsible',
      'wrong'   => 'wbfsys.issue.message.error_wrong_id_responsible',
      'max'     => 'wbfsys.issue.message.error_max_id_responsible',
      'min'     => 'wbfsys.issue.message.error_min_id_responsible',
    ),

    'progress' => array
    (
      'default' => 'wbfsys.issue.message.error_def_progress',
      'wrong'   => 'wbfsys.issue.message.error_wrong_progress',
      'max'     => 'wbfsys.issue.message.error_max_progress',
      'min'     => 'wbfsys.issue.message.error_min_progress',
    ),

    'vid' => array
    (
      'default' => 'wbfsys.issue.message.error_def_vid',
      'wrong'   => 'wbfsys.issue.message.error_wrong_vid',
      'max'     => 'wbfsys.issue.message.error_max_vid',
      'min'     => 'wbfsys.issue.message.error_min_vid',
    ),

    'description' => array
    (
      'default' => 'wbfsys.issue.message.error_def_description',
      'wrong'   => 'wbfsys.issue.message.error_wrong_description',
      'max'     => 'wbfsys.issue.message.error_max_description',
      'min'     => 'wbfsys.issue.message.error_min_description',
    ),

    'error_message' => array
    (
      'default' => 'wbfsys.issue.message.error_def_error_message',
      'wrong'   => 'wbfsys.issue.message.error_wrong_error_message',
      'max'     => 'wbfsys.issue.message.error_max_error_message',
      'min'     => 'wbfsys.issue.message.error_min_error_message',
    ),

    'id_vid_entity' => array
    (
      'default' => 'wbfsys.issue.message.error_def_id_vid_entity',
      'wrong'   => 'wbfsys.issue.message.error_wrong_id_vid_entity',
      'max'     => 'wbfsys.issue.message.error_max_id_vid_entity',
      'min'     => 'wbfsys.issue.message.error_min_id_vid_entity',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.issue.message.error_def_rowid',
      'wrong'   => 'wbfsys.issue.message.error_wrong_rowid',
      'empty'   => 'wbfsys.issue.message.error_empty_rowid',
      'max'     => 'wbfsys.issue.message.error_max_rowid',
      'min'     => 'wbfsys.issue.message.error_min_rowid',
    ),
  );

}//end class WbfsysIssue_Entity


