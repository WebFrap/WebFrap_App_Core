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
 * Entity Class for the Database Table core_person
 * 
 * @package WebFrap
 * @subpackage ModCore
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CorePerson_Entity
  extends Entity
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * the name of the sql table for the entity
  * @var string $table
  */
  public static $table     = 'core_person';

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
  public static $toUrl     = 'index.php?c=Core.Person.show';

 /**
  * all keynames for fields that will be displayed in the textvalue of the entity
  * @var array $textKeys
  */
  public static $textKeys  = array
  (
    'input'  => array( 'firstname','lastname'),
    'text'   => array( 'firstname','lastname'),
  );


 /**
  * the name of the entity in the System
  * @var string $entityName
  */
  public static $entityName  = 'CorePerson';

 /**
  * the description
  * @var string $description
  */
  public static $description  = 'a simple person';

 /**
  * the default lable
  * @var string
  */
  public static $label  = 'Person';
      
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
      'gender'            ,
      'academic_title'    ,
      'noblesse_title'    ,
      'firstname'         ,
      'lastname'          ,
      'birthday'          ,
      'photo'             ,
      'is_alias_for'      ,
      'mimetype'          
    ),
    'personal_data' => array
    (
      'id_preflang'       ,
      'birth_city'        ,
      'id_nationality'    
    ),
    'ident_data' => array
    (
      'tax_number'        ,
      'pkid'              
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
    'id_preflang'   => 'wbfsys_language',
    'id_nationality'=> 'core_country',
    'is_alias_for'  => 'core_person',
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
    'gender' => array
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
    'academic_title' => array
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
    'noblesse_title' => array
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
    the Name of the person
    */
    'firstname' => array
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
    the Name of the person
    */
    'lastname' => array
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
    'birthday' => array
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
    'photo' => array
    (
      'image'   , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'default' , // the main category for this field
      ''        , // the default value on create
    ),
    'id_preflang' => array
    (
      'eid'     , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'personal_data', // the main category for this field
      ''        , // the default value on create
    ),
    'birth_city' => array
    (
      'text'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'personal_data', // the main category for this field
      ''        , // the default value on create
    ),
    'id_nationality' => array
    (
      'eid'     , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      false     , // is a search field 
      false     , // is a array in the database
      'personal_data', // the main category for this field
      ''        , // the default value on create
    ),
    'is_alias_for' => array
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
    'tax_number' => array
    (
      'text'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      true      , // is a search field 
      false     , // is a array in the database
      'ident_data', // the main category for this field
      ''        , // the default value on create
    ),
    'pkid' => array
    (
      'text'    , // Validator 
      false     , // is the field required
      null      , // max size for this field
      null      , // min size fpr this field
      true      , // needs quotes to be add in a sql query? 
      true      , // is a search field 
      false     , // is a array in the database
      'ident_data', // the main category for this field
      ''        , // the default value on create
    ),
    'mimetype' => array
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
    'gender' => array
    (
      'default' => 'core.person.message.error_def_gender',
      'wrong'   => 'core.person.message.error_wrong_gender',
      'max'     => 'core.person.message.error_max_gender',
      'min'     => 'core.person.message.error_min_gender',
    ),

    'academic_title' => array
    (
      'default' => 'core.person.message.error_def_academic_title',
      'wrong'   => 'core.person.message.error_wrong_academic_title',
      'max'     => 'core.person.message.error_max_academic_title',
      'min'     => 'core.person.message.error_min_academic_title',
    ),

    'noblesse_title' => array
    (
      'default' => 'core.person.message.error_def_noblesse_title',
      'wrong'   => 'core.person.message.error_wrong_noblesse_title',
      'max'     => 'core.person.message.error_max_noblesse_title',
      'min'     => 'core.person.message.error_min_noblesse_title',
    ),

    'firstname' => array
    (
      'default' => 'core.person.message.error_def_firstname',
      'wrong'   => 'core.person.message.error_wrong_firstname',
      'max'     => 'core.person.message.error_max_firstname',
      'min'     => 'core.person.message.error_min_firstname',
    ),

    'lastname' => array
    (
      'default' => 'core.person.message.error_def_lastname',
      'wrong'   => 'core.person.message.error_wrong_lastname',
      'max'     => 'core.person.message.error_max_lastname',
      'min'     => 'core.person.message.error_min_lastname',
    ),

    'birthday' => array
    (
      'default' => 'core.person.message.error_def_birthday',
      'wrong'   => 'core.person.message.error_wrong_birthday',
      'max'     => 'core.person.message.error_max_birthday',
      'min'     => 'core.person.message.error_min_birthday',
    ),

    'photo' => array
    (
      'default' => 'core.person.message.error_def_photo',
      'wrong'   => 'core.person.message.error_wrong_photo',
      'max'     => 'core.person.message.error_max_photo',
      'min'     => 'core.person.message.error_min_photo',
    ),

    'id_preflang' => array
    (
      'default' => 'core.person.message.error_def_id_preflang',
      'wrong'   => 'core.person.message.error_wrong_id_preflang',
      'max'     => 'core.person.message.error_max_id_preflang',
      'min'     => 'core.person.message.error_min_id_preflang',
    ),

    'birth_city' => array
    (
      'default' => 'core.person.message.error_def_birth_city',
      'wrong'   => 'core.person.message.error_wrong_birth_city',
      'max'     => 'core.person.message.error_max_birth_city',
      'min'     => 'core.person.message.error_min_birth_city',
    ),

    'id_nationality' => array
    (
      'default' => 'core.person.message.error_def_id_nationality',
      'wrong'   => 'core.person.message.error_wrong_id_nationality',
      'max'     => 'core.person.message.error_max_id_nationality',
      'min'     => 'core.person.message.error_min_id_nationality',
    ),

    'is_alias_for' => array
    (
      'default' => 'core.person.message.error_def_is_alias_for',
      'wrong'   => 'core.person.message.error_wrong_is_alias_for',
      'max'     => 'core.person.message.error_max_is_alias_for',
      'min'     => 'core.person.message.error_min_is_alias_for',
    ),

    'tax_number' => array
    (
      'default' => 'core.person.message.error_def_tax_number',
      'wrong'   => 'core.person.message.error_wrong_tax_number',
      'max'     => 'core.person.message.error_max_tax_number',
      'min'     => 'core.person.message.error_min_tax_number',
    ),

    'pkid' => array
    (
      'default' => 'core.person.message.error_def_pkid',
      'wrong'   => 'core.person.message.error_wrong_pkid',
      'max'     => 'core.person.message.error_max_pkid',
      'min'     => 'core.person.message.error_min_pkid',
    ),

    'mimetype' => array
    (
      'default' => 'core.person.message.error_def_mimetype',
      'wrong'   => 'core.person.message.error_wrong_mimetype',
      'max'     => 'core.person.message.error_max_mimetype',
      'min'     => 'core.person.message.error_min_mimetype',
    ),

    'rowid' => array
    (
      'default' => 'core.person.message.error_def_rowid',
      'wrong'   => 'core.person.message.error_wrong_rowid',
      'empty'   => 'core.person.message.error_empty_rowid',
      'max'     => 'core.person.message.error_max_rowid',
      'min'     => 'core.person.message.error_min_rowid',
    ),
  );

}//end class CorePerson_Entity


