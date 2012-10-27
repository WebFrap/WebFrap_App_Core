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
 * Entity Class for the Database Table wbfsys_process_status
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysProcessStatus_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_process_status';

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
  public static $toUrl     = 'index.php?c=Wbfsys.ProcessStatus.show';

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
  public static $entityName  = 'WbfsysProcessStatus';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Process Status';
      
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
      'vid'               ,
      'id_user'           ,
      'id_process'        ,
      'id_phase'          ,
      'id_start_node'     ,
      'id_last_node'      ,
      'id_actual_node'    ,
      'actual_node_key'   ,
      'value_highest_node',
      'id_end_node'       ,
      'id_vid_entity'     
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
    'id_process'    => 'wbfsys_process',
    'id_phase'      => 'wbfsys_process_phase',
    'id_start_node' => 'wbfsys_process_node',
    'id_last_node'  => 'wbfsys_process_node',
    'id_actual_node'=> 'wbfsys_process_node',
    'id_end_node'   => 'wbfsys_process_node',
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
    'id_process' => array
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
    'id_phase' => array
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
    'id_start_node' => array
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
    'id_last_node' => array
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
    'id_actual_node' => array
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
    Der Access key des aktuellen Knotens.
In der Hoffnung, dass nicht jemand auf die Idee kommt dauernd den Namen des Knotens
ändern zu wollen.
    */
    'actual_node_key' => array
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
    'value_highest_node' => array
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
    'id_end_node' => array
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
    'vid' => array
    (
      'default' => 'wbfsys.process_status.message.error_def_vid',
      'wrong'   => 'wbfsys.process_status.message.error_wrong_vid',
      'max'     => 'wbfsys.process_status.message.error_max_vid',
      'min'     => 'wbfsys.process_status.message.error_min_vid',
    ),

    'id_user' => array
    (
      'default' => 'wbfsys.process_status.message.error_def_id_user',
      'wrong'   => 'wbfsys.process_status.message.error_wrong_id_user',
      'max'     => 'wbfsys.process_status.message.error_max_id_user',
      'min'     => 'wbfsys.process_status.message.error_min_id_user',
    ),

    'id_process' => array
    (
      'default' => 'wbfsys.process_status.message.error_def_id_process',
      'wrong'   => 'wbfsys.process_status.message.error_wrong_id_process',
      'max'     => 'wbfsys.process_status.message.error_max_id_process',
      'min'     => 'wbfsys.process_status.message.error_min_id_process',
    ),

    'id_phase' => array
    (
      'default' => 'wbfsys.process_status.message.error_def_id_phase',
      'wrong'   => 'wbfsys.process_status.message.error_wrong_id_phase',
      'max'     => 'wbfsys.process_status.message.error_max_id_phase',
      'min'     => 'wbfsys.process_status.message.error_min_id_phase',
    ),

    'id_start_node' => array
    (
      'default' => 'wbfsys.process_status.message.error_def_id_start_node',
      'wrong'   => 'wbfsys.process_status.message.error_wrong_id_start_node',
      'max'     => 'wbfsys.process_status.message.error_max_id_start_node',
      'min'     => 'wbfsys.process_status.message.error_min_id_start_node',
    ),

    'id_last_node' => array
    (
      'default' => 'wbfsys.process_status.message.error_def_id_last_node',
      'wrong'   => 'wbfsys.process_status.message.error_wrong_id_last_node',
      'max'     => 'wbfsys.process_status.message.error_max_id_last_node',
      'min'     => 'wbfsys.process_status.message.error_min_id_last_node',
    ),

    'id_actual_node' => array
    (
      'default' => 'wbfsys.process_status.message.error_def_id_actual_node',
      'wrong'   => 'wbfsys.process_status.message.error_wrong_id_actual_node',
      'max'     => 'wbfsys.process_status.message.error_max_id_actual_node',
      'min'     => 'wbfsys.process_status.message.error_min_id_actual_node',
    ),

    'actual_node_key' => array
    (
      'default' => 'wbfsys.process_status.message.error_def_actual_node_key',
      'wrong'   => 'wbfsys.process_status.message.error_wrong_actual_node_key',
      'max'     => 'wbfsys.process_status.message.error_max_actual_node_key',
      'min'     => 'wbfsys.process_status.message.error_min_actual_node_key',
    ),

    'value_highest_node' => array
    (
      'default' => 'wbfsys.process_status.message.error_def_value_highest_node',
      'wrong'   => 'wbfsys.process_status.message.error_wrong_value_highest_node',
      'max'     => 'wbfsys.process_status.message.error_max_value_highest_node',
      'min'     => 'wbfsys.process_status.message.error_min_value_highest_node',
    ),

    'id_end_node' => array
    (
      'default' => 'wbfsys.process_status.message.error_def_id_end_node',
      'wrong'   => 'wbfsys.process_status.message.error_wrong_id_end_node',
      'max'     => 'wbfsys.process_status.message.error_max_id_end_node',
      'min'     => 'wbfsys.process_status.message.error_min_id_end_node',
    ),

    'id_vid_entity' => array
    (
      'default' => 'wbfsys.process_status.message.error_def_id_vid_entity',
      'wrong'   => 'wbfsys.process_status.message.error_wrong_id_vid_entity',
      'max'     => 'wbfsys.process_status.message.error_max_id_vid_entity',
      'min'     => 'wbfsys.process_status.message.error_min_id_vid_entity',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.process_status.message.error_def_rowid',
      'wrong'   => 'wbfsys.process_status.message.error_wrong_rowid',
      'empty'   => 'wbfsys.process_status.message.error_empty_rowid',
      'max'     => 'wbfsys.process_status.message.error_max_rowid',
      'min'     => 'wbfsys.process_status.message.error_min_rowid',
    ),
  );

}//end class WbfsysProcessStatus_Entity


