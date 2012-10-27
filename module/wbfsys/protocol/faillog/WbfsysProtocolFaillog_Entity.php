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
 * Entity Class for the Database Table wbfsys_protocol_faillog
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysProtocolFaillog_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_protocol_faillog';

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
  public static $toUrl     = 'index.php?c=Wbfsys.ProtocolFaillog.show';

 /**
  * all keynames for fields that will be displayed in the textvalue of the entity
  * @var array $textKeys
  */
  public static $textKeys  = array
  (
    'input'  => array( 'user_name'),
    'text'   => array( 'user_name'),
  );


 /**
  * the name of the entity in the System
  * @var string $entityName
  */
  public static $entityName  = 'WbfsysProtocolFaillog';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Protocol Faillog';
      
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
      'user_name'         ,
      'ip_address'        ,
      'custom_data'       ,
      'user_agent'        
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
    /*
    the Name of the protocol faillog
    */
    'user_name' => array
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
    'ip_address' => array
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
    'custom_data' => array
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
    'user_agent' => array
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
    'user_name' => array
    (
      'default' => 'wbfsys.protocol_faillog.message.error_def_user_name',
      'wrong'   => 'wbfsys.protocol_faillog.message.error_wrong_user_name',
      'max'     => 'wbfsys.protocol_faillog.message.error_max_user_name',
      'min'     => 'wbfsys.protocol_faillog.message.error_min_user_name',
    ),

    'ip_address' => array
    (
      'default' => 'wbfsys.protocol_faillog.message.error_def_ip_address',
      'wrong'   => 'wbfsys.protocol_faillog.message.error_wrong_ip_address',
      'max'     => 'wbfsys.protocol_faillog.message.error_max_ip_address',
      'min'     => 'wbfsys.protocol_faillog.message.error_min_ip_address',
    ),

    'custom_data' => array
    (
      'default' => 'wbfsys.protocol_faillog.message.error_def_custom_data',
      'wrong'   => 'wbfsys.protocol_faillog.message.error_wrong_custom_data',
      'max'     => 'wbfsys.protocol_faillog.message.error_max_custom_data',
      'min'     => 'wbfsys.protocol_faillog.message.error_min_custom_data',
    ),

    'user_agent' => array
    (
      'default' => 'wbfsys.protocol_faillog.message.error_def_user_agent',
      'wrong'   => 'wbfsys.protocol_faillog.message.error_wrong_user_agent',
      'max'     => 'wbfsys.protocol_faillog.message.error_max_user_agent',
      'min'     => 'wbfsys.protocol_faillog.message.error_min_user_agent',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.protocol_faillog.message.error_def_rowid',
      'wrong'   => 'wbfsys.protocol_faillog.message.error_wrong_rowid',
      'empty'   => 'wbfsys.protocol_faillog.message.error_empty_rowid',
      'max'     => 'wbfsys.protocol_faillog.message.error_max_rowid',
      'min'     => 'wbfsys.protocol_faillog.message.error_min_rowid',
    ),
  );

}//end class WbfsysProtocolFaillog_Entity


