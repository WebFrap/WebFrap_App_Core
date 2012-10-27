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
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class MyUserProfile_Crud_Model
  extends Model
{
  
  /**
  * @var array
  */
  public $insertFields = array();
  
  /**
  * @var array
  */
  public $updateFields = array();

////////////////////////////////////////////////////////////////////////////////
// Get requestes Entity
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @param LibRequestHttp $request
   * @return WbfsysRoleUser_Entity
   */
  public function getRequestedEntity( $request )
  {
    
    $objid     = null;
    $accessKey = null;
    $uuid      = null;
    
    $orm = $this->getOrm();
    
    if( $val = $request->data( 'my_user_profile', Validator::EID, 'objid' ) )
    {
      $objid = $val;
    }
    elseif( $val = $request->param( 'objid', Validator::EID ) )
    {
      $objid = $val;
    }
    elseif( $val = $request->param( 'access_key', Validator::CNAME ) )
    {
      $accessKey = $val;
    }
    elseif( $val = $request->param( 'uuid', Validator::CNAME ) )
    {
      $uuid = $val;
    }
    
    $searchId = null;
    $keyType  = null;
    
    if( $objid )
    {
      $searchId = $objid;
      $keyType  = 'rowid';
      $entity   = $orm->get( 'WbfsysRoleUser', $objid );
    }
    else if( $uuid )
    {
      $searchId = $uuid;
      $keyType  = 'uuid';
      $entity   = $orm->getByUuid( 'WbfsysRoleUser', $uuid );
    }
    else if( $accessKey )
    {
      $searchId = $accessKey;
      $keyType  = 'access_key';
      $entity   = $orm->getByKey( 'WbfsysRoleUser', $accessKey );
    }
    else
    {
      $response = $this->getResponse();
    
      // wenn keiner der 3 keys vorhanden ist, ist die Anfrage per Definition
      // invalid
      throw new InvalidRequest_Exception
      (
        $response->i18n->l
        (
          'There was no valid key in this request.',
          'wbf.message'
        ),
        Error::INVALID_REQUEST
      );
    }
    
    if( $entity )
    {
      $this->setEntityMyUserProfile( $entity );
      return $entity;
    }
    else
    {
      $response = $this->getResponse();
    
      // wenn keine Entity gefunden wurde wird die Anfrage mit einer 
      // Not Found Fehlermeldung beantwortet
      throw new InvalidRequest_Exception
      (
        $this->getResponse()->i18n->l
        (
          'The requested {@resource@} for {@key_type@}: {@id@} not exists!',
          'wbf.message',
          array
          (
            'resource'  => $response->i18n->l( 'My Profile', 'my.user_profile.label' ),
            'key_type'  => $keyType,
            'id'        => $searchId
          )
        ),
        Response::NOT_FOUND
      );
    }
 
    return null;
    
  }//end public function getRequestedEntity */

////////////////////////////////////////////////////////////////////////////////
// Getter for the Entities
////////////////////////////////////////////////////////////////////////////////
    

  /**
  * Erfragen der Haupt Entity unabhängig vom Maskenname
  * @param int $objid
  * @return WbfsysRoleUser_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityMyUserProfile( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysRoleUser_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityMyUserProfile( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysRoleUser_Entity
  */
  public function getEntityMyUserProfile( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityMyUserProfile = $this->getRegisterd( 'main_entity' ) )
      $entityMyUserProfile = $this->getRegisterd( 'entityMyUserProfile' );

    //entity wbfsys_role_user
    if( !$entityMyUserProfile )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityMyUserProfile = $orm->get( 'WbfsysRoleUser', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysroleuser with this id '.$objid,
              'my.user_profile.message'
            )
          );
          return null;
        }

        $this->register( 'entityMyUserProfile', $entityMyUserProfile );
        $this->register( 'main_entity', $entityMyUserProfile);

      }
      else
      {
        $entityMyUserProfile   = new WbfsysRoleUser_Entity() ;
        $this->register( 'entityMyUserProfile', $entityMyUserProfile );
        $this->register( 'main_entity', $entityMyUserProfile);
      }

    }
    elseif( $objid && $objid != $entityMyUserProfile->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityMyUserProfile = $orm->get( 'WbfsysRoleUser', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysroleuser with this id '.$objid,
            'my.user_profile.message'
          )
        );
        return null;
      }

      $this->register( 'entityMyUserProfile', $entityMyUserProfile);
      $this->register( 'main_entity', $entityMyUserProfile);
    }

    return $entityMyUserProfile;

  }//end public function getEntityMyUserProfile */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysRoleUser_Entity $entity
  */
  public function setEntityMyUserProfile( $entity )
  {

    $this->register( 'entityMyUserProfile', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityMyUserProfile */

  /**
  * returns the activ entity with data, or creates a empty one
  * and returns it instead
  *
  * @return EmbedPerson_Entity
  */
  public function getEntityEmbedPerson( $mainEntity = null )
  {

    $response = $this->getResponse();

    $objid = null;

    if( !is_null($mainEntity) )
      $objid = $mainEntity->id_person;

    $entityEmbedPerson = $this->getRegisterd( 'entityEmbedPerson' );

    //entity wbfsys_role_user
    if( !$entityEmbedPerson )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityEmbedPerson = $orm->get( 'CorePerson', $objid) )
        {
          $response->addWarning
          (
            $response->i18n->l
            (
              'Missing the reference dataset coreperson with the id '.$objid,
              'my.user_profile.message'
            )
          );

          $entityEmbedPerson = new CorePerson_Entity;

          $entityEmbedPerson->setId( $objid, true );
          $orm->insert( $entityEmbedPerson, array(), false );

        }
        $this->register( 'entityEmbedPerson', $entityEmbedPerson );
      }
      else
      {
        $entityEmbedPerson   = new CorePerson_Entity() ;
        $this->register( 'entityEmbedPerson', $entityEmbedPerson );
      }

    }
    elseif( $objid  && $objid != $entityEmbedPerson->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityEmbedPerson = $orm->get( 'CorePerson', $objid) )
      {
        $this->getResponse()->addError
        (
          $response->i18n->l
          (
            'Missing the reference dataset coreperson with the id '.$objid,
            'my.user_profile.message'
          )
        );

        $entityEmbedPerson = new CorePerson_Entity;

        $entityEmbedPerson->setId( $objid, true );
        $orm->insert( $entityEmbedPerson );
      }

      $this->register( 'entityEmbedPerson', $entityEmbedPerson );
    }

    return $entityEmbedPerson;

  }//end public function getEntityEmbedPerson */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param EntityEmbedPerson $entity
  */
  public function setEntityEmbedPerson( $entity )
  {

    $this->register( 'entityEmbedPerson', $entity );

  }//end public function setEntityEmbedPerson */

////////////////////////////////////////////////////////////////////////////////
// Crud Methodes
////////////////////////////////////////////////////////////////////////////////
    
////////////////////////////////////////////////////////////////////////////////
// Fetch Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * just fetch the post data without any required validation
   *
   * @param TFlag $params named parameters
   * @param int $id the id for the entity
   *
   * @return boolean
   */
  public function fetchPostData( $params, $id = null )
  {

    $httpRequest = $this->getRequest();
    $response    = $this->getResponse();

    if( !$id )
    {
      $entityMyUserProfile = new WbfsysRoleUser_Entity;
    }
    else
    {

      $orm = $this->getOrm();

      if(!$entityMyUserProfile = $orm->get( 'WbfsysRoleUser',  $id ))
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no My Profile with the id: {@id@}',
            'my.user_profile.message',
            array
            (
              'id' => $id
            )
          )
        );
        $entityMyUserProfile = new WbfsysRoleUser_Entity;
      }
    }

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsMyUserProfile )
      $params->fieldsMyUserProfile  = $entityMyUserProfile->getCols
      (
        $params->categories
      );

    $httpRequest->validate
    (
      $entityMyUserProfile,
      'my_user_profile',
      $params->fieldsMyUserProfile
    );
    $this->register( 'entityMyUserProfile', $entityMyUserProfile );

    return !$response->hasErrors();

  }//end public function fetchPostData */

  /**
   * de:
   * datenquelle für einen autocomplete request
   * @param string $key
   * @param TArray $params
   */
  public function getAutolistByKey( $key, $params )
  {

    $db     = $this->getDb();
    $query  = $db->newQuery( 'MyUserProfile' );
    /* @var $query MyUserProfile_Query  */

    $query->fetchAutocomplete
    (
      $key,
      $params
    );

    return $query->getAll();

  }//end public function getAutolistByKey */

////////////////////////////////////////////////////////////////////////////////
// Get Fields
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * just fetch the post data without any required validation
   * @return array
   */
  public function getCreateFields()
  {

    return array
    (
      'my_user_profile' => array
      (
        'name',
        'id_person',
        'id_mandant',
        'm_version',
        'id_employee',
        'password',
        'level',
        'profile',
        'inactive',
        'non_cert_login',
        'description',
      ),
      'embed_person' => array
      (
        'm_version',
        'firstname',
        'lastname',
        'academic_title',
        'noblesse_title',
        'photo',
      ),

    );

  }//end public function getCreateFields */

  /**
   * just fetch the post data without any required validation
   * @return array
   */
  public function getInsertFields()
  {

    if( $this->insertFields )
      return $this->insertFields;
  
    $saveFields = array();
    $saveFields['my_user_profile'] = array();
    $saveFields['my_user_profile'][] = 'name';
        $saveFields['my_user_profile'][] = 'email';
        $saveFields['my_user_profile'][] = 'id_person';
        $saveFields['my_user_profile'][] = 'id_mandant';
        $saveFields['my_user_profile'][] = 'id_employee';
        $saveFields['my_user_profile'][] = 'password';
        $saveFields['my_user_profile'][] = 'reset_pwd_key';
        $saveFields['my_user_profile'][] = 'reset_pwd_date';
        $saveFields['my_user_profile'][] = 'inactive';
        $saveFields['my_user_profile'][] = 'non_cert_login';
        $saveFields['my_user_profile'][] = 'level';
        $saveFields['my_user_profile'][] = 'profile';
        $saveFields['my_user_profile'][] = 'id_domain';
        $saveFields['my_user_profile'][] = 'type';
        $saveFields['my_user_profile'][] = 'description';
        $saveFields['my_user_profile'][] = 'last_login';
        $saveFields['my_user_profile'][] = 'change_password';
        $saveFields['my_user_profile'][] = 'salt_password';
        $saveFields['my_user_profile'][] = 'm_version';
        $saveFields['embed_person'] = array();
    $saveFields['embed_person'][] = 'gender';
        $saveFields['embed_person'][] = 'academic_title';
        $saveFields['embed_person'][] = 'noblesse_title';
        $saveFields['embed_person'][] = 'firstname';
        $saveFields['embed_person'][] = 'lastname';
        $saveFields['embed_person'][] = 'birthday';
        $saveFields['embed_person'][] = 'photo';
        $saveFields['embed_person'][] = 'id_preflang';
        $saveFields['embed_person'][] = 'birth_city';
        $saveFields['embed_person'][] = 'id_nationality';
        $saveFields['embed_person'][] = 'is_alias_for';
        $saveFields['embed_person'][] = 'tax_number';
        $saveFields['embed_person'][] = 'pkid';
        $saveFields['embed_person'][] = 'mimetype';
        $saveFields['embed_person'][] = 'm_version';
    
    
    $this->insertFields = $saveFields;
    return $this->insertFields;

  }//end public function getInsertFields */

  /**
   * just fetch the post data without any required validation
   * @return array
   */
  public function getCreateRoFields( )
  {

    return array
    (

    );

  }//end public function getCreateRoFields */

  /**
   * request all fields that have to be fetched from the request
   * @return array
   */
  public function getEditFields()
  {

    return array
    (
      'my_user_profile' => array
      (
        'name',
        'id_person',
        'id_mandant',
        'rowid',
        'm_time_created',
        'm_role_create',
        'm_time_changed',
        'm_role_change',
        'm_version',
        'm_uuid',
        'password',
        'profile',
        'level',
        'description',
      ),
      'embed_person' => array
      (
        'firstname',
        'lastname',
        'academic_title',
        'noblesse_title',
        'rowid',
        'm_time_created',
        'm_role_create',
        'm_time_changed',
        'm_role_change',
        'm_version',
        'm_uuid',
        'photo',
      ),

    );

  }//end public function getEditFields */

  /**
   * request all fields that have to be fetched from the request
   * @return array
   */
  public function getUpdateFields()
  {

    if( $this->updateFields )
      return $this->updateFields;
  
    $saveFields = array();
    $saveFields['my_user_profile'] = array();
    $saveFields['my_user_profile'][] = 'name';
        $saveFields['my_user_profile'][] = 'id_person';
        $saveFields['my_user_profile'][] = 'id_mandant';
        $saveFields['my_user_profile'][] = 'm_version';
        $saveFields['my_user_profile'][] = 'password';
        $saveFields['my_user_profile'][] = 'profile';
        $saveFields['my_user_profile'][] = 'level';
        $saveFields['my_user_profile'][] = 'description';
        $saveFields['embed_person'] = array();
    $saveFields['embed_person'][] = 'firstname';
        $saveFields['embed_person'][] = 'lastname';
        $saveFields['embed_person'][] = 'academic_title';
        $saveFields['embed_person'][] = 'noblesse_title';
        $saveFields['embed_person'][] = 'm_version';
        $saveFields['embed_person'][] = 'photo';
    
    
    $this->updateFields = $saveFields;
    return $this->updateFields;

  }//end public function getUpdateFields */

  /**
   * request all fields that have to be fetched from the request
   * @return array
   */
  public function getEditRoFields( )
  {

    return array
    (

    );

  }//end public function getEditRoFields */

}//end MyUserProfile_Crud_Model

