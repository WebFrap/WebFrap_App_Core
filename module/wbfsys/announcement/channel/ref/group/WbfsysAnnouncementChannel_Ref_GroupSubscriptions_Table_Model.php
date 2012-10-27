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
class WbfsysAnnouncementChannel_Ref_GroupSubscriptions_Table_Model
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
  * @return WbfsysRoleGroup_Entity
  */
  public function getEntityWbfsysRoleGroup( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysRoleGroup = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysRoleGroup = $this->getRegisterd( 'entityWbfsysRoleGroup' );

    //entity wbfsys_role_group
    if( !$entityWbfsysRoleGroup )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysRoleGroup = $orm->get( 'WbfsysRoleGroup', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysrolegroup with this id '.$objid,
              'wbfsys.role_group.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysRoleGroup', $entityWbfsysRoleGroup );
        $this->register( 'main_entity', $entityWbfsysRoleGroup );

      }
      else
      {
        $entityWbfsysRoleGroup   = new WbfsysRoleGroup_Entity() ;
        $this->register( 'entityWbfsysRoleGroup', $entityWbfsysRoleGroup );
        $this->register( 'main_entity', $entityWbfsysRoleGroup );
      }

    }
    elseif( $objid && $objid != $entityWbfsysRoleGroup->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysRoleGroup = $orm->get( 'WbfsysRoleGroup', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysrolegroup with this id '.$objid,
            'wbfsys.role_group.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysRoleGroup', $entityWbfsysRoleGroup );
      $this->register( 'main_entity', $entityWbfsysRoleGroup );
    }

    return $entityWbfsysRoleGroup;

  }//end public function getEntityWbfsysRoleGroup */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysRoleGroup_Entity $entity
  */
  public function setEntityWbfsysRoleGroup( $entity )
  {

    $this->register( 'entityWbfsysRoleGroup', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysRoleGroup */

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
    $data['wbfsys_role_group']  = $this->getEntityWbfsysRoleGroup( $data['wbfsys_announcement_channel_subscription']->id_role );


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
    if( $data['wbfsys_role_group']->id_mandant )
    {
      $valWbfsysRoleMandant = $orm->getField
      (
        'WbfsysRoleMandant',
        'rowid = '.$data['wbfsys_role_group']->id_mandant,
        'name'
      );
      $tabData['wbfsys_role_mandant_name'] = $valWbfsysRoleMandant;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_role_mandant_name'] = '';
    }

    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_role_group']->id_type )
    {
      $valWbfsysRoleGroupType = $orm->getField
      (
        'WbfsysRoleGroupType',
        'rowid = '.$data['wbfsys_role_group']->id_type,
        'name'
      );
      $tabData['wbfsys_role_group_type_name'] = $valWbfsysRoleGroupType;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_role_group_type_name'] = '';
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
    if( !Webfrap::classLoadable( 'WbfsysRoleGroup_Entity' ) )
    {
      Error::addError
      (
        'tried so search for a nonexisting entity: wbfsys_role_group with the expected source wbfsys_role_group'
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
    $query = $db->newQuery( 'WbfsysAnnouncementChannel_Ref_GroupSubscriptions_Table' );
    /* @var $query WbfsysAnnouncementChannel_Ref_GroupSubscriptions_Table_Query  */
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

}//end class WbfsysAnnouncementChannel_Ref_GroupSubscriptions_Table_Model

