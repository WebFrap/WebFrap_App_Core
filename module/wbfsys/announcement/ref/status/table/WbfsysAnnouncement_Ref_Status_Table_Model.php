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
class WbfsysAnnouncement_Ref_Status_Table_Model
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

    $data['wbfsys_user_announcement']  = $this->getEntityWbfsysUserAnnouncement();
    $data['wbfsys_role_user']  = $this->getEntityWbfsysRoleUser( $data['wbfsys_user_announcement']->id_user );
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
    if( $data['wbfsys_user_announcement']->id_status )
    {
      $valWbfsysUserAnnouncementStatus = $orm->getField
      (
        'WbfsysUserAnnouncementStatus',
        'rowid = '.$data['wbfsys_user_announcement']->id_status,
        'name'
      );
      $tabData['wbfsys_user_announcement_status_name'] = $valWbfsysUserAnnouncementStatus;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_user_announcement_status_name'] = '';
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
   * table to list all connected WbfsysAnnouncement
   *
   * @param int $idWbfsysAnnouncement the id for the reference entity
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysAnnouncement, $access, $params  )
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

    if( !$fieldsWbfsysUserAnnouncement = $this->getRegisterd( 'search_fields_wbfsys_user_announcement' ) )
    {
       $fieldsWbfsysUserAnnouncement   = $orm->getSearchCols( 'WbfsysUserAnnouncement' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_user_announcement' ) )
    {
      $fieldsWbfsysUserAnnouncement = array_unique( array_merge
      (
        $fieldsWbfsysUserAnnouncement,
        $refs
      ));
    }

    $filterWbfsysUserAnnouncement     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysUserAnnouncement', $fieldsWbfsysUserAnnouncement ),
      $orm->getErrorMessages( 'WbfsysUserAnnouncement'  ),
      'search_wbfsys_user_announcement'
    );
    $condition['wbfsys_user_announcement'] = $filterWbfsysUserAnnouncement->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysAnnouncement_Ref_Status_Table' );
    /* @var $query WbfsysAnnouncement_Ref_Status_Table_Query  */
    $query->extendedConditions = $extendedConditions;

    // hard condition
    $query->setCondition( 'wbfsys_user_announcement.id_announcement = '.$idWbfsysAnnouncement );
    
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

}//end class WbfsysAnnouncement_Ref_Status_Table_Model

