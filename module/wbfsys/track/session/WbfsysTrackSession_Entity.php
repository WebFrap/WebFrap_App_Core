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
 * Entity Class for the Database Table wbfsys_track_session
 * 
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysTrackSession_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'wbfsys_track_session';

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
  public static $toUrl     = 'index.php?c=Wbfsys.TrackSession.show';

 /**
  * all keynames for fields that will be displayed in the textvalue of the entity
  * @var array $textKeys
  */
  public static $textKeys  = array
  (
    'input'  => array( 'session','browser','os'),
    'text'   => array( 'session','browser','os'),
  );


 /**
  * the name of the entity in the System
  * @var string $entityName
  */
  public static $entityName  = 'WbfsysTrackSession';

 /**
  * the description
  * @var string $description
  */
  public static $description  = '';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Track Session';
      
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
      'id_session'        ,
      'service'           ,
      'refer'             ,
      'id_person'         ,
      'session'           ,
      'browser'           ,
      'browser_version'   ,
      'os'                ,
      'os_version'        
    ),
    'meta' => array
    (
      'track_id'          ,
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
    'id_session'    => 'wbfsys_track_session',
    'id_person'     => 'core_person',
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
    'id_session' => array
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
    URL track session
    */
    'service' => array
    (
      'url'     , // Validator 
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
    URL track session
    */
    'refer' => array
    (
      'url'     , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      true      , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'id_person' => array
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
    the Name of the track session
    */
    'session' => array
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
    the Name of the track session
    */
    'browser' => array
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
    Version
    */
    'browser_version' => array
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
    UUID for track session
    */
    'track_id' => array
    (
      'uuid'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      true      , // is a search field 
      false     , // is a array in the database
      'meta'    , // the main category for this field
      ''        , // the default value on create
    ),
    /*
    the Name of the track session
    */
    'os' => array
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
    Version
    */
    'os_version' => array
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
    'id_session' => array
    (
      'default' => 'wbfsys.track_session.message.error_def_id_session',
      'wrong'   => 'wbfsys.track_session.message.error_wrong_id_session',
      'max'     => 'wbfsys.track_session.message.error_max_id_session',
      'min'     => 'wbfsys.track_session.message.error_min_id_session',
    ),

    'service' => array
    (
      'default' => 'wbfsys.track_session.message.error_def_service',
      'wrong'   => 'wbfsys.track_session.message.error_wrong_service',
      'max'     => 'wbfsys.track_session.message.error_max_service',
      'min'     => 'wbfsys.track_session.message.error_min_service',
    ),

    'refer' => array
    (
      'default' => 'wbfsys.track_session.message.error_def_refer',
      'wrong'   => 'wbfsys.track_session.message.error_wrong_refer',
      'max'     => 'wbfsys.track_session.message.error_max_refer',
      'min'     => 'wbfsys.track_session.message.error_min_refer',
    ),

    'id_person' => array
    (
      'default' => 'wbfsys.track_session.message.error_def_id_person',
      'wrong'   => 'wbfsys.track_session.message.error_wrong_id_person',
      'max'     => 'wbfsys.track_session.message.error_max_id_person',
      'min'     => 'wbfsys.track_session.message.error_min_id_person',
    ),

    'session' => array
    (
      'default' => 'wbfsys.track_session.message.error_def_session',
      'wrong'   => 'wbfsys.track_session.message.error_wrong_session',
      'max'     => 'wbfsys.track_session.message.error_max_session',
      'min'     => 'wbfsys.track_session.message.error_min_session',
    ),

    'browser' => array
    (
      'default' => 'wbfsys.track_session.message.error_def_browser',
      'wrong'   => 'wbfsys.track_session.message.error_wrong_browser',
      'max'     => 'wbfsys.track_session.message.error_max_browser',
      'min'     => 'wbfsys.track_session.message.error_min_browser',
    ),

    'browser_version' => array
    (
      'default' => 'wbfsys.track_session.message.error_def_browser_version',
      'wrong'   => 'wbfsys.track_session.message.error_wrong_browser_version',
      'max'     => 'wbfsys.track_session.message.error_max_browser_version',
      'min'     => 'wbfsys.track_session.message.error_min_browser_version',
    ),

    'track_id' => array
    (
      'default' => 'wbfsys.track_session.message.error_def_track_id',
      'wrong'   => 'wbfsys.track_session.message.error_wrong_track_id',
      'max'     => 'wbfsys.track_session.message.error_max_track_id',
      'min'     => 'wbfsys.track_session.message.error_min_track_id',
    ),

    'os' => array
    (
      'default' => 'wbfsys.track_session.message.error_def_os',
      'wrong'   => 'wbfsys.track_session.message.error_wrong_os',
      'max'     => 'wbfsys.track_session.message.error_max_os',
      'min'     => 'wbfsys.track_session.message.error_min_os',
    ),

    'os_version' => array
    (
      'default' => 'wbfsys.track_session.message.error_def_os_version',
      'wrong'   => 'wbfsys.track_session.message.error_wrong_os_version',
      'max'     => 'wbfsys.track_session.message.error_max_os_version',
      'min'     => 'wbfsys.track_session.message.error_min_os_version',
    ),

    'rowid' => array
    (
      'default' => 'wbfsys.track_session.message.error_def_rowid',
      'wrong'   => 'wbfsys.track_session.message.error_wrong_rowid',
      'empty'   => 'wbfsys.track_session.message.error_empty_rowid',
      'max'     => 'wbfsys.track_session.message.error_max_rowid',
      'min'     => 'wbfsys.track_session.message.error_min_rowid',
    ),
  );

}//end class WbfsysTrackSession_Entity


