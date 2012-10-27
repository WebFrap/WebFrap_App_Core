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
 * Entity Class for the Database Table wbfsys_message
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMessage_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_message';

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
  public static $toUrl     = 'index.php?c=Wbfsys.Message.show';

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
  public static $entityName  = 'WbfsysMessage';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Message';
      
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
      'id_sender'         ,
      'id_receiver'       ,
      'id_answer_to'      ,
      'message_id'        ,
      'id_refer'          ,
      'priority'          ,
      'deliver_date'      ,
      'title'             ,
      'message'           ,
      'id_sender_status'  ,
      'id_receiver_status',
      'flag_sender_deleted',
      'flag_receiver_deleted'
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
    'id_sender'     => 'wbfsys_role_user',
    'id_receiver'   => 'wbfsys_role_user',
    'id_answer_to'  => 'wbfsys_role_user',
    'id_refer'      => 'wbfsys_message',
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
    'id_sender' => array
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
    'id_receiver' => array
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
    'id_answer_to' => array
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
    'message_id' => array
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
    'id_refer' => array
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
    'priority' => array
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
    'deliver_date' => array
    (
      'timestamp', // Validator 
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
    Ttle the message
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
    Content for message
    */
    'message' => array
    (
      'html'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      true      , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'id_sender_status' => array
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
    'id_receiver_status' => array
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
    'flag_sender_deleted' => array
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
    'flag_receiver_deleted' => array
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
    'id_sender' => array
    (
      'default' => 'wbfsys.message.message.error_def_id_sender',
      'wrong'   => 'wbfsys.message.message.error_wrong_id_sender',
      'max'     => 'wbfsys.message.message.error_max_id_sender',
      'min'     => 'wbfsys.message.message.error_min_id_sender',
    ),

    'id_receiver' => array
    (
      'default' => 'wbfsys.message.message.error_def_id_receiver',
      'wrong'   => 'wbfsys.message.message.error_wrong_id_receiver',
      'max'     => 'wbfsys.message.message.error_max_id_receiver',
      'min'     => 'wbfsys.message.message.error_min_id_receiver',
    ),

    'id_answer_to' => array
    (
      'default' => 'wbfsys.message.message.error_def_id_answer_to',
      'wrong'   => 'wbfsys.message.message.error_wrong_id_answer_to',
      'max'     => 'wbfsys.message.message.error_max_id_answer_to',
      'min'     => 'wbfsys.message.message.error_min_id_answer_to',
    ),

    'message_id' => array
    (
      'default' => 'wbfsys.message.message.error_def_message_id',
      'wrong'   => 'wbfsys.message.message.error_wrong_message_id',
      'max'     => 'wbfsys.message.message.error_max_message_id',
      'min'     => 'wbfsys.message.message.error_min_message_id',
    ),

    'id_refer' => array
    (
      'default' => 'wbfsys.message.message.error_def_id_refer',
      'wrong'   => 'wbfsys.message.message.error_wrong_id_refer',
      'max'     => 'wbfsys.message.message.error_max_id_refer',
      'min'     => 'wbfsys.message.message.error_min_id_refer',
    ),

    'priority' => array
    (
      'default' => 'wbfsys.message.message.error_def_priority',
      'wrong'   => 'wbfsys.message.message.error_wrong_priority',
      'max'     => 'wbfsys.message.message.error_max_priority',
      'min'     => 'wbfsys.message.message.error_min_priority',
    ),

    'deliver_date' => array
    (
      'default' => 'wbfsys.message.message.error_def_deliver_date',
      'wrong'   => 'wbfsys.message.message.error_wrong_deliver_date',
      'max'     => 'wbfsys.message.message.error_max_deliver_date',
      'min'     => 'wbfsys.message.message.error_min_deliver_date',
    ),

    'title' => array
    (
      'default' => 'wbfsys.message.message.error_def_title',
      'wrong'   => 'wbfsys.message.message.error_wrong_title',
      'max'     => 'wbfsys.message.message.error_max_title',
      'min'     => 'wbfsys.message.message.error_min_title',
    ),

    'message' => array
    (
      'default' => 'wbfsys.message.message.error_def_message',
      'wrong'   => 'wbfsys.message.message.error_wrong_message',
      'max'     => 'wbfsys.message.message.error_max_message',
      'min'     => 'wbfsys.message.message.error_min_message',
    ),

    'id_sender_status' => array
    (
      'default' => 'wbfsys.message.message.error_def_id_sender_status',
      'wrong'   => 'wbfsys.message.message.error_wrong_id_sender_status',
      'max'     => 'wbfsys.message.message.error_max_id_sender_status',
      'min'     => 'wbfsys.message.message.error_min_id_sender_status',
    ),

    'id_receiver_status' => array
    (
      'default' => 'wbfsys.message.message.error_def_id_receiver_status',
      'wrong'   => 'wbfsys.message.message.error_wrong_id_receiver_status',
      'max'     => 'wbfsys.message.message.error_max_id_receiver_status',
      'min'     => 'wbfsys.message.message.error_min_id_receiver_status',
    ),

    'flag_sender_deleted' => array
    (
      'default' => 'wbfsys.message.message.error_def_flag_sender_deleted',
      'wrong'   => 'wbfsys.message.message.error_wrong_flag_sender_deleted',
      'max'     => 'wbfsys.message.message.error_max_flag_sender_deleted',
      'min'     => 'wbfsys.message.message.error_min_flag_sender_deleted',
    ),

    'flag_receiver_deleted' => array
    (
      'default' => 'wbfsys.message.message.error_def_flag_receiver_deleted',
      'wrong'   => 'wbfsys.message.message.error_wrong_flag_receiver_deleted',
      'max'     => 'wbfsys.message.message.error_max_flag_receiver_deleted',
      'min'     => 'wbfsys.message.message.error_min_flag_receiver_deleted',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.message.message.error_def_rowid',
      'wrong'   => 'wbfsys.message.message.error_wrong_rowid',
      'empty'   => 'wbfsys.message.message.error_empty_rowid',
      'max'     => 'wbfsys.message.message.error_max_rowid',
      'min'     => 'wbfsys.message.message.error_min_rowid',
    ),
  );

}//end class WbfsysMessage_Entity


