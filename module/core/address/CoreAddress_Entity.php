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
 * Entity Class for the Database Table core_address
 * 
 * @package WebFrap
 * @subpackage ModCore
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreAddress_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'core_address';

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
  public static $toUrl     = 'index.php?c=Core.Address.show';

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
  public static $entityName  = 'CoreAddress';

 /**
  * the description
  * @var string $description
  */
  public static $description  = 'All existing adresses in the system. Whenever you need an
	    address create or link to one of the adresses here';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Address';
      
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
    'address' => array
    (
      'street'            ,
      'postalcode'        ,
      'city'              ,
      'postbox'           ,
      'id_country'        ,
      'id_location'       ,
      'description'       
    ),
    'default' => array
    (
      'vid'               ,
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
    'id_country'    => 'core_country',
    'id_location'   => 'core_location',
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
    Street
    */
    'street' => array
    (
      'text'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'address' , // the main category for this field
      ''        , // the default value on create
    ),
    /*
    the postalcode
    */
    'postalcode' => array
    (
      'text'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'address' , // the main category for this field
      ''        , // the default value on create
    ),
    'city' => array
    (
      'text'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'address' , // the main category for this field
      ''        , // the default value on create
    ),
    /*
    postbox in german Postfach
    */
    'postbox' => array
    (
      'text'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'address' , // the main category for this field
      ''        , // the default value on create
    ),
    /*
    country
    */
    'id_country' => array
    (
      'eid'     , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'address' , // the main category for this field
      ''        , // the default value on create
    ),
    /*
    Location
    */
    'id_location' => array
    (
      'eid'     , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'address' , // the main category for this field
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
    Description for address
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
      'address' , // the main category for this field
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
    'street' => array
    (
      'default' => 'core.address.message.error_def_street',
      'wrong'   => 'core.address.message.error_wrong_street',
      'max'     => 'core.address.message.error_max_street',
      'min'     => 'core.address.message.error_min_street',
    ),

    'postalcode' => array
    (
      'default' => 'core.address.message.error_def_postalcode',
      'wrong'   => 'core.address.message.error_wrong_postalcode',
      'max'     => 'core.address.message.error_max_postalcode',
      'min'     => 'core.address.message.error_min_postalcode',
    ),

    'city' => array
    (
      'default' => 'core.address.message.error_def_city',
      'wrong'   => 'core.address.message.error_wrong_city',
      'max'     => 'core.address.message.error_max_city',
      'min'     => 'core.address.message.error_min_city',
    ),

    'postbox' => array
    (
      'default' => 'core.address.message.error_def_postbox',
      'wrong'   => 'core.address.message.error_wrong_postbox',
      'max'     => 'core.address.message.error_max_postbox',
      'min'     => 'core.address.message.error_min_postbox',
    ),

    'id_country' => array
    (
      'default' => 'core.address.message.error_def_id_country',
      'wrong'   => 'core.address.message.error_wrong_id_country',
      'max'     => 'core.address.message.error_max_id_country',
      'min'     => 'core.address.message.error_min_id_country',
    ),

    'id_location' => array
    (
      'default' => 'core.address.message.error_def_id_location',
      'wrong'   => 'core.address.message.error_wrong_id_location',
      'max'     => 'core.address.message.error_max_id_location',
      'min'     => 'core.address.message.error_min_id_location',
    ),

    'vid' => array
    (
      'default' => 'core.address.message.error_def_vid',
      'wrong'   => 'core.address.message.error_wrong_vid',
      'max'     => 'core.address.message.error_max_vid',
      'min'     => 'core.address.message.error_min_vid',
    ),

    'description' => array
    (
      'default' => 'core.address.message.error_def_description',
      'wrong'   => 'core.address.message.error_wrong_description',
      'max'     => 'core.address.message.error_max_description',
      'min'     => 'core.address.message.error_min_description',
    ),

    'id_vid_entity' => array
    (
      'default' => 'core.address.message.error_def_id_vid_entity',
      'wrong'   => 'core.address.message.error_wrong_id_vid_entity',
      'max'     => 'core.address.message.error_max_id_vid_entity',
      'min'     => 'core.address.message.error_min_id_vid_entity',
    ),

    'rowid' => array
    (
      'default' => 'core.address.message.error_def_rowid',
      'wrong'   => 'core.address.message.error_wrong_rowid',
      'empty'   => 'core.address.message.error_empty_rowid',
      'max'     => 'core.address.message.error_max_rowid',
      'min'     => 'core.address.message.error_min_rowid',
    ),
  );

}//end class CoreAddress_Entity


