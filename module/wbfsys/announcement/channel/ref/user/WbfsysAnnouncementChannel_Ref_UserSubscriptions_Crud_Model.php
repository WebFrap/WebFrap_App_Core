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
class WbfsysAnnouncementChannel_Ref_UserSubscriptions_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysAnnouncementChannelSubscription_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysAnnouncementChannelSubscription( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysAnnouncementChannelSubscription_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysAnnouncementChannelSubscription(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysAnnouncementChannelSubscription_Entity
  */
  public function getEntityWbfsysAnnouncementChannelSubscription( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysAnnouncementChannelSubscription = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysAnnouncementChannelSubscription = $this->getRegisterd( 'entityWbfsysAnnouncementChannelSubscription' );


    //entity wbfsys_announcement_channel_subscription
    if( !$entityWbfsysAnnouncementChannelSubscription )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysAnnouncementChannelSubscription = $orm->get( 'WbfsysAnnouncementChannelSubscription', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysannouncementchannelsubscription with this id '.$objid,
              'wbfsys.announcement_channel_subscription.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysAnnouncementChannelSubscription', $entityWbfsysAnnouncementChannelSubscription );
        $this->register( 'main_entity', $entityWbfsysAnnouncementChannelSubscription );

      }
      else
      {
        $entityWbfsysAnnouncementChannelSubscription   = new WbfsysAnnouncementChannelSubscription_Entity() ;
        $this->register( 'entityWbfsysAnnouncementChannelSubscription', $entityWbfsysAnnouncementChannelSubscription );
        $this->register( 'main_entity', $entityWbfsysAnnouncementChannelSubscription );
      }

    }
    elseif( $objid && $objid != $entityWbfsysAnnouncementChannelSubscription->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysAnnouncementChannelSubscription = $orm->get( 'WbfsysAnnouncementChannelSubscription', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysannouncementchannelsubscription with this id '.$objid,
            'wbfsys.announcement_channel_subscription.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysAnnouncementChannelSubscription', $entityWbfsysAnnouncementChannelSubscription );
      $this->register( 'main_entity', $entityWbfsysAnnouncementChannelSubscription );
    }

    return $entityWbfsysAnnouncementChannelSubscription;

  }//end public function getEntityWbfsysAnnouncementChannelSubscription */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysAnnouncementChannelSubscription_Entity $entity
  */
  public function setEntityWbfsysAnnouncementChannelSubscription( $entity )
  {

    $this->register( 'entityWbfsysAnnouncementChannelSubscription', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysAnnouncementChannelSubscription */

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
      if( !$entityWbfsysAnnouncementChannelSubscription = $this->getEntityWbfsysAnnouncementChannelSubscription() )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'entityWbfsysAnnouncementChannelSubscription was not registered'
        );
      }

      if( !$orm->insert( $entityWbfsysAnnouncementChannelSubscription ) )
      {

        $entityText = $entityWbfsysAnnouncementChannelSubscription->text();
        $response->addError
        (
          $view->i18n->l
          (
            'Failed to create Announcement Subscription {@label@}',
            'wbfsys.announcement_channel.message',
            array( 'label' => $entityText )
          )
        );
      }
      else
      {
        $entityText  = $entityWbfsysAnnouncementChannelSubscription->text();

        $this->getResponse()->addMessage
        (
          $view->i18n->l
          (
            'Successfully created Announcement Subscription {@label@}',
            'wbfsys.announcement_channel.message',
            array( 'label' => $entityText)
          )
        );


        $this->protocol
        (
          'created new Announcement Subscription: '.$entityText,
          'create',
          $entityWbfsysAnnouncementChannelSubscription
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

      //management  wbfsys_announcement_channel_subscription source wbfsys_announcement_channel_subscription
      $entityWbfsysAnnouncementChannelSubscription = $orm->newEntity( 'WbfsysAnnouncementChannelSubscription' );

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysAnnouncementChannelSubscription,
        'wbfsys_announcement_channel_subscription',
        array( 'id_role', 'id_channel' )
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysAnnouncementChannelSubscription', $entityWbfsysAnnouncementChannelSubscription );


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
      $entity =  $this->getRegisterd('entityWbfsysAnnouncementChannelSubscription');

    return $orm->checkUnique
    (
      $entity ,
      array( 'id_role', 'id_channel' )
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
      'wbfsys_announcement_channel_subscription' => array
      (
        'id_channel',
        'id_role',
        'date_start',
        'vid',
        'date_end',
        'id_vid_entity',
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

}//end class WbfsysAnnouncementChannel_Ref_UserSubscriptions_Crud_Model

