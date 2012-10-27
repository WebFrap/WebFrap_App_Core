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
 * Entity Class for the Database Table wbfsys_process_node
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysProcessNode_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_process_node';

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
  public static $toUrl     = 'index.php?c=Wbfsys.ProcessNode.show';

 /**
  * all keynames for fields that will be displayed in the textvalue of the entity
  * @var array $textKeys
  */
  public static $textKeys  = array
  (
    'input'  => array( 'label'),
    'text'   => array( 'label'),
  );


 /**
  * the name of the entity in the System
  * @var string $entityName
  */
  public static $entityName  = 'WbfsysProcessNode';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Process Node';
      
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
      'label'             ,
      'access_key'        ,
      'phase_key'         ,
      'is_start_node'     ,
      'is_end_node'       ,
      'id_process'        ,
      'id_phase'          ,
      'bg_color'          ,
      'text_color'        ,
      'border_color'      ,
      'icon'              ,
      'revision'          
    ),
    'description' => array
    (
      'description'       
    ),
    'meta' => array
    (
      'm_order'           ,
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
    'id_process'    => 'wbfsys_process',
    'id_phase'      => 'wbfsys_process_phase',
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
    the Name of the process node
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
    Access Key for process node
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
    Access Key for process node
    */
    'phase_key' => array
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
    'is_start_node' => array
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
    'is_end_node' => array
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
    /*
    Description for process node
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
    /*
    Color for process node
    */
    'bg_color' => array
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
    Color for process node
    */
    'text_color' => array
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
    Color for process node
    */
    'border_color' => array
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
    'icon' => array
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
    /*
    Order for process node
    */
    'm_order' => array
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
    'label' => array
    (
      'default' => 'wbfsys.process_node.message.error_def_label',
      'wrong'   => 'wbfsys.process_node.message.error_wrong_label',
      'max'     => 'wbfsys.process_node.message.error_max_label',
      'min'     => 'wbfsys.process_node.message.error_min_label',
    ),

    'access_key' => array
    (
      'default' => 'wbfsys.process_node.message.error_def_access_key',
      'wrong'   => 'wbfsys.process_node.message.error_wrong_access_key',
      'max'     => 'wbfsys.process_node.message.error_max_access_key',
      'min'     => 'wbfsys.process_node.message.error_min_access_key',
    ),

    'phase_key' => array
    (
      'default' => 'wbfsys.process_node.message.error_def_phase_key',
      'wrong'   => 'wbfsys.process_node.message.error_wrong_phase_key',
      'max'     => 'wbfsys.process_node.message.error_max_phase_key',
      'min'     => 'wbfsys.process_node.message.error_min_phase_key',
    ),

    'is_start_node' => array
    (
      'default' => 'wbfsys.process_node.message.error_def_is_start_node',
      'wrong'   => 'wbfsys.process_node.message.error_wrong_is_start_node',
      'max'     => 'wbfsys.process_node.message.error_max_is_start_node',
      'min'     => 'wbfsys.process_node.message.error_min_is_start_node',
    ),

    'is_end_node' => array
    (
      'default' => 'wbfsys.process_node.message.error_def_is_end_node',
      'wrong'   => 'wbfsys.process_node.message.error_wrong_is_end_node',
      'max'     => 'wbfsys.process_node.message.error_max_is_end_node',
      'min'     => 'wbfsys.process_node.message.error_min_is_end_node',
    ),

    'id_process' => array
    (
      'default' => 'wbfsys.process_node.message.error_def_id_process',
      'wrong'   => 'wbfsys.process_node.message.error_wrong_id_process',
      'max'     => 'wbfsys.process_node.message.error_max_id_process',
      'min'     => 'wbfsys.process_node.message.error_min_id_process',
    ),

    'id_phase' => array
    (
      'default' => 'wbfsys.process_node.message.error_def_id_phase',
      'wrong'   => 'wbfsys.process_node.message.error_wrong_id_phase',
      'max'     => 'wbfsys.process_node.message.error_max_id_phase',
      'min'     => 'wbfsys.process_node.message.error_min_id_phase',
    ),

    'description' => array
    (
      'default' => 'wbfsys.process_node.message.error_def_description',
      'wrong'   => 'wbfsys.process_node.message.error_wrong_description',
      'max'     => 'wbfsys.process_node.message.error_max_description',
      'min'     => 'wbfsys.process_node.message.error_min_description',
    ),

    'bg_color' => array
    (
      'default' => 'wbfsys.process_node.message.error_def_bg_color',
      'wrong'   => 'wbfsys.process_node.message.error_wrong_bg_color',
      'max'     => 'wbfsys.process_node.message.error_max_bg_color',
      'min'     => 'wbfsys.process_node.message.error_min_bg_color',
    ),

    'text_color' => array
    (
      'default' => 'wbfsys.process_node.message.error_def_text_color',
      'wrong'   => 'wbfsys.process_node.message.error_wrong_text_color',
      'max'     => 'wbfsys.process_node.message.error_max_text_color',
      'min'     => 'wbfsys.process_node.message.error_min_text_color',
    ),

    'border_color' => array
    (
      'default' => 'wbfsys.process_node.message.error_def_border_color',
      'wrong'   => 'wbfsys.process_node.message.error_wrong_border_color',
      'max'     => 'wbfsys.process_node.message.error_max_border_color',
      'min'     => 'wbfsys.process_node.message.error_min_border_color',
    ),

    'icon' => array
    (
      'default' => 'wbfsys.process_node.message.error_def_icon',
      'wrong'   => 'wbfsys.process_node.message.error_wrong_icon',
      'max'     => 'wbfsys.process_node.message.error_max_icon',
      'min'     => 'wbfsys.process_node.message.error_min_icon',
    ),

    'revision' => array
    (
      'default' => 'wbfsys.process_node.message.error_def_revision',
      'wrong'   => 'wbfsys.process_node.message.error_wrong_revision',
      'max'     => 'wbfsys.process_node.message.error_max_revision',
      'min'     => 'wbfsys.process_node.message.error_min_revision',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.process_node.message.error_def_rowid',
      'wrong'   => 'wbfsys.process_node.message.error_wrong_rowid',
      'empty'   => 'wbfsys.process_node.message.error_empty_rowid',
      'max'     => 'wbfsys.process_node.message.error_max_rowid',
      'min'     => 'wbfsys.process_node.message.error_min_rowid',
    ),
  );

}//end class WbfsysProcessNode_Entity


