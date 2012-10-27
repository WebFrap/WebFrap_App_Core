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
class WbfsysAnnouncementChannel_Ref_UserSubscriptions_Table_Model
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

  /**
   * just fetch the post data without any required validation
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function getEntryData( $params )
  {

    $orm   = $this->getOrm();
    $data  = array();

    $data['wbfsys_announcement_channel_subscription']  = $this->getEntityWbfsysAnnouncementChannelSubscription();
    $data['wbfsys_role_user']  = $this->getEntityWbfsysRoleUser( $data['wbfsys_announcement_channel_subscription']->id_role );
    $data['embed_person'] = $this->getEntityEmbedPerson( $data['wbfsys_role_user'] );


    $tabData = array();

    foreach( $data as $tabName => $ent )
    {
      // prüfen ob etwas gefunden wurde
      if( !$ent )
      {
        Debug::console( "Missing Entity for Reference: ".$tabName );
        continue;
      }

      $tabData = array_merge( $tabData , $ent->getAllData( $tabName ) );
    }


    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_role_user']->id_mandant )
    {
      $valWbfsysRoleMandant = $orm->getField
      (
        'WbfsysRoleMandant',
        'rowid = '.$data['wbfsys_role_user']->id_mandant,
        'name'
      );
      $tabData['wbfsys_role_mandant_name'] = $valWbfsysRoleMandant;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_role_mandant_name'] = '';
    }

    // if we have a value, try to load the display field (codeTableRefFields 1)
    if( $data['wbfsys_role_user']->profile )
    {
      $valWbfsysProfile = $orm->getField( 'WbfsysProfile', "upper(access_key) = upper('{$data['wbfsys_role_user']->profile}')" , 'name'  );
      $tabData['wbfsys_profile_name'] = $valWbfsysProfile;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_profile_name'] = '';
    }


    return $tabData;

  }// end public function getEntryData */

////////////////////////////////////////////////////////////////////////////////
// search
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * table to list all connected WbfsysAnnouncementChannel
   *
   * @param int $idWbfsysAnnouncementChannel the id for the reference entity
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysAnnouncementChannel, $access, $params  )
  {

    $response  = $this->getResponse();

    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysRoleUser_Entity' ) )
    {
      Error::addError
      (
        'tried so search for a nonexisting entity: wbfsys_role_user with the expected source wbfsys_role_user'
      );
      return array();
    }

    $db          = $this->getDb();
    $orm         = $db->getOrm();
    $httpRequest = $this->getRequest();
    $user        = $this->getUser();
    $view        = $this->getView();
    
		$extendedConditions = array();

    $condition = array();




    if( $free = $httpRequest->param( 'free_search' , Validator::TEXT ) )
      $condition['free'] = $free;

    if( !$fieldsWbfsysAnnouncementChannelSubscription = $this->getRegisterd( 'search_fields_wbfsys_announcement_channel_subscription' ) )
    {
       $fieldsWbfsysAnnouncementChannelSubscription   = $orm->getSearchCols( 'WbfsysAnnouncementChannelSubscription' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_announcement_channel_subscription' ) )
    {
      $fieldsWbfsysAnnouncementChannelSubscription = array_unique( array_merge
      (
        $fieldsWbfsysAnnouncementChannelSubscription,
        $refs
      ));
    }

    $filterWbfsysAnnouncementChannelSubscription     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysAnnouncementChannelSubscription', $fieldsWbfsysAnnouncementChannelSubscription ),
      $orm->getErrorMessages( 'WbfsysAnnouncementChannelSubscription'  ),
      'search_wbfsys_announcement_channel_subscription'
    );
    $condition['wbfsys_announcement_channel_subscription'] = $filterWbfsysAnnouncementChannelSubscription->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysAnnouncementChannel_Ref_UserSubscriptions_Table' );
    /* @var $query WbfsysAnnouncementChannel_Ref_UserSubscriptions_Table_Query  */
    $query->extendedConditions = $extendedConditions;

    // hard condition
    $query->setCondition( 'wbfsys_announcement_channel_subscription.id_channel = '.$idWbfsysAnnouncementChannel );
    
    $validKeys  = $access->fetchListIds
    ( 
      $user->getProfileName(), 
      $query, 
      'table',  
      $condition, 
      $params 
    );

    $query->fetchInAcls
    (
      $validKeys,
      $params
    );



    return $query;

  }//end public public search */

}//end class WbfsysAnnouncementChannel_Ref_UserSubscriptions_Table_Model

