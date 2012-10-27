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
 * Entity Class for the Database Table wbfsys_announcement_channel_subscription
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysAnnouncementChannelSubscription_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_announcement_channel_subscription';

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
  public static $toUrl     = 'index.php?c=Wbfsys.AnnouncementChannelSubscription.show';

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
  public static $entityName  = 'WbfsysAnnouncementChannelSubscription';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Announcement Channel Subscription';
      
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
      'id_channel'        ,
      'id_role'           ,
      'date_start'        ,
      'vid'               ,
      'date_end'          ,
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
    'id_channel'    => 'wbfsys_announcement_channel',
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
    'id_channel' => array
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
    'id_role' => array
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
    Start Date for announcement channel subscription
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
    Subscription in relation zu einer Entity, z.B. 
            Subscriben auf den Project Message Channel in Relation zu einem oder mehrere Projekten
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
    End Date for announcement channel subscription
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
    'id_channel' => array
    (
      'default' => 'wbfsys.announcement_channel_subscription.message.error_def_id_channel',
      'wrong'   => 'wbfsys.announcement_channel_subscription.message.error_wrong_id_channel',
      'max'     => 'wbfsys.announcement_channel_subscription.message.error_max_id_channel',
      'min'     => 'wbfsys.announcement_channel_subscription.message.error_min_id_channel',
    ),

    'id_role' => array
    (
      'default' => 'wbfsys.announcement_channel_subscription.message.error_def_id_role',
      'wrong'   => 'wbfsys.announcement_channel_subscription.message.error_wrong_id_role',
      'max'     => 'wbfsys.announcement_channel_subscription.message.error_max_id_role',
      'min'     => 'wbfsys.announcement_channel_subscription.message.error_min_id_role',
    ),

    'date_start' => array
    (
      'default' => 'wbfsys.announcement_channel_subscription.message.error_def_date_start',
      'wrong'   => 'wbfsys.announcement_channel_subscription.message.error_wrong_date_start',
      'max'     => 'wbfsys.announcement_channel_subscription.message.error_max_date_start',
      'min'     => 'wbfsys.announcement_channel_subscription.message.error_min_date_start',
    ),

    'vid' => array
    (
      'default' => 'wbfsys.announcement_channel_subscription.message.error_def_vid',
      'wrong'   => 'wbfsys.announcement_channel_subscription.message.error_wrong_vid',
      'max'     => 'wbfsys.announcement_channel_subscription.message.error_max_vid',
      'min'     => 'wbfsys.announcement_channel_subscription.message.error_min_vid',
    ),

    'date_end' => array
    (
      'default' => 'wbfsys.announcement_channel_subscription.message.error_def_date_end',
      'wrong'   => 'wbfsys.announcement_channel_subscription.message.error_wrong_date_end',
      'max'     => 'wbfsys.announcement_channel_subscription.message.error_max_date_end',
      'min'     => 'wbfsys.announcement_channel_subscription.message.error_min_date_end',
    ),

    'id_vid_entity' => array
    (
      'default' => 'wbfsys.announcement_channel_subscription.message.error_def_id_vid_entity',
      'wrong'   => 'wbfsys.announcement_channel_subscription.message.error_wrong_id_vid_entity',
      'max'     => 'wbfsys.announcement_channel_subscription.message.error_max_id_vid_entity',
      'min'     => 'wbfsys.announcement_channel_subscription.message.error_min_id_vid_entity',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.announcement_channel_subscription.message.error_def_rowid',
      'wrong'   => 'wbfsys.announcement_channel_subscription.message.error_wrong_rowid',
      'empty'   => 'wbfsys.announcement_channel_subscription.message.error_empty_rowid',
      'max'     => 'wbfsys.announcement_channel_subscription.message.error_max_rowid',
      'min'     => 'wbfsys.announcement_channel_subscription.message.error_min_rowid',
    ),
  );

}//end class WbfsysAnnouncementChannelSubscription_Entity


