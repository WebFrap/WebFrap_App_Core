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
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysAnnouncement_Ref_Status_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysUserAnnouncement_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysUserAnnouncement( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysUserAnnouncement_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysUserAnnouncement(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysUserAnnouncement_Entity
  */
  public function getEntityWbfsysUserAnnouncement( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysUserAnnouncement = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysUserAnnouncement = $this->getRegisterd( 'entityWbfsysUserAnnouncement' );


    //entity wbfsys_user_announcement
    if( !$entityWbfsysUserAnnouncement )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysUserAnnouncement = $orm->get( 'WbfsysUserAnnouncement', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysuserannouncement with this id '.$objid,
              'wbfsys.user_announcement.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysUserAnnouncement', $entityWbfsysUserAnnouncement );
        $this->register( 'main_entity', $entityWbfsysUserAnnouncement );

      }
      else
      {
        $entityWbfsysUserAnnouncement   = new WbfsysUserAnnouncement_Entity() ;
        $this->register( 'entityWbfsysUserAnnouncement', $entityWbfsysUserAnnouncement );
        $this->register( 'main_entity', $entityWbfsysUserAnnouncement );
      }

    }
    elseif( $objid && $objid != $entityWbfsysUserAnnouncement->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysUserAnnouncement = $orm->get( 'WbfsysUserAnnouncement', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysuserannouncement with this id '.$objid,
            'wbfsys.user_announcement.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysUserAnnouncement', $entityWbfsysUserAnnouncement );
      $this->register( 'main_entity', $entityWbfsysUserAnnouncement );
    }

    return $entityWbfsysUserAnnouncement;

  }//end public function getEntityWbfsysUserAnnouncement */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysUserAnnouncement_Entity $entity
  */
  public function setEntityWbfsysUserAnnouncement( $entity )
  {

    $this->register( 'entityWbfsysUserAnnouncement', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysUserAnnouncement */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysRoleUser_Entity
  */
  public function getEntityWbfsysRoleUser( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysRoleUser = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysRoleUser = $this->getRegisterd( 'entityWbfsysRoleUser' );

    //entity wbfsys_role_user
    if( !$entityWbfsysRoleUser )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysRoleUser = $orm->get( 'WbfsysRoleUser', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysroleuser with this id '.$objid,
              'wbfsys.role_user.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysRoleUser', $entityWbfsysRoleUser );
        $this->register( 'main_entity', $entityWbfsysRoleUser );

      }
      else
      {
        $entityWbfsysRoleUser   = new WbfsysRoleUser_Entity() ;
        $this->register( 'entityWbfsysRoleUser', $entityWbfsysRoleUser );
        $this->register( 'main_entity', $entityWbfsysRoleUser );
      }

    }
    elseif( $objid && $objid != $entityWbfsysRoleUser->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysRoleUser = $orm->get( 'WbfsysRoleUser', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysroleuser with this id '.$objid,
            'wbfsys.role_user.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysRoleUser', $entityWbfsysRoleUser );
      $this->register( 'main_entity', $entityWbfsysRoleUser );
    }

    return $entityWbfsysRoleUser;

  }//end public function getEntityWbfsysRoleUser */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysRoleUser_Entity $entity
  */
  public function setEntityWbfsysRoleUser( $entity )
  {

    $this->register( 'entityWbfsysRoleUser', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysRoleUser */

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
              'wbfsys.role_user.message'
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
            'wbfsys.role_user.message'
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
// crud methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * insert an entity
   * this method fetchs the activ entity from the registry an tries to
   * insert it at the database
   * all connected entities will be added too
   *
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function insert( $params )
  {

    $orm       = $this->getOrm();
    $view      = $this->getView();
    $response  = $this->getResponse();

    try
    {
      if( !$entityWbfsysUserAnnouncement = $this->getEntityWbfsysUserAnnouncement() )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'entityWbfsysUserAnnouncement was not registered'
        );
      }

      if( !$orm->insert( $entityWbfsysUserAnnouncement ) )
      {

        $entityText = $entityWbfsysUserAnnouncement->text();
        $response->addError
        (
          $view->i18n->l
          (
            'Failed to create User Announcement Status {@label@}',
            'wbfsys.announcement.message',
            array( 'label' => $entityText )
          )
        );
      }
      else
      {
        $entityText  = $entityWbfsysUserAnnouncement->text();

        $this->getResponse()->addMessage
        (
          $view->i18n->l
          (
            'Successfully created User Announcement Status {@label@}',
            'wbfsys.announcement.message',
            array( 'label' => $entityText)
          )
        );


        $this->protocol
        (
          'created new User Announcement Status: '.$entityText,
          'create',
          $entityWbfsysUserAnnouncement
        );


      }

    }
    catch( LibDb_Exception $e )
    {

      $response->addError($e->getMessage());
    }
    catch( Model_Exception $e )
    {

      $response->addError($e->getMessage());
    }

    return !$this->getResponse()->hasErrors();

  }//end public function insert */

////////////////////////////////////////////////////////////////////////////////
// fetch methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * fetch the data from the http request object for an insert
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchConnectData( $params )
  {

    $httpRequest = $this->getRequest();
    $orm         = $this->getOrm();
    $view        = $this->getView();

    try
    {

      //management  wbfsys_user_announcement source wbfsys_user_announcement
      $entityWbfsysUserAnnouncement = $orm->newEntity( 'WbfsysUserAnnouncement' );

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysUserAnnouncement,
        'wbfsys_user_announcement',
        array( 'id_user', 'id_announcement' )
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysUserAnnouncement', $entityWbfsysUserAnnouncement );


      return !$this->getResponse()->hasErrors();
    }
    catch( InvalidInput_Exception $e )
    {
      return null;
    }

  }//end public function fetchConnectData */

////////////////////////////////////////////////////////////////////////////////
// check methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * check if the reference allready exists
   * @param Entity $entity
   * @return boolean
   */
  public function checkUnique( $entity = null )
  {

    $orm = $this->getOrm();

    if(!$entity)
      $entity =  $this->getRegisterd('entityWbfsysUserAnnouncement');

    return $orm->checkUnique
    (
      $entity ,
      array( 'id_user', 'id_announcement' )
    );

  }//end public function checkUnique */

////////////////////////////////////////////////////////////////////////////////
// get fields
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * just fetch the post data without any required validation
   * @return array
   */
  public function getCreateFields()
  {

    return array
    (
      'wbfsys_user_announcement' => array
      (
        'id_announcement',
        'id_user',
        'id_status',
        'm_version',
      ),
      'wbfsys_role_user' => array
      (
        'name',
        'email',
        'id_person',
        'id_mandant',
        'id_employee',
        'password',
        'reset_pwd_key',
        'reset_pwd_date',
        'inactive',
        'non_cert_login',
        'level',
        'profile',
        'id_domain',
        'type',
        'description',
        'last_login',
        'change_password',
        'salt_password',
        'm_version',
      ),
      'embed_person' => array
      (
        'gender',
        'academic_title',
        'noblesse_title',
        'firstname',
        'lastname',
        'birthday',
        'photo',
        'id_preflang',
        'birth_city',
        'id_nationality',
        'is_alias_for',
        'tax_number',
        'pkid',
        'mimetype',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysAnnouncement_Ref_Status_Crud_Model

