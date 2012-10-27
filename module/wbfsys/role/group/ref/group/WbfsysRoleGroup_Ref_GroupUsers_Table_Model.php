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
class WbfsysRoleGroup_Ref_GroupUsers_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysGroupUsers_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysGroupUsers( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysGroupUsers_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysGroupUsers(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysGroupUsers_Entity
  */
  public function getEntityWbfsysGroupUsers( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysGroupUsers = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysGroupUsers = $this->getRegisterd( 'entityWbfsysGroupUsers' );


    //entity wbfsys_group_users
    if( !$entityWbfsysGroupUsers )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysGroupUsers = $orm->get( 'WbfsysGroupUsers', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysgroupusers with this id '.$objid,
              'wbfsys.group_users.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysGroupUsers', $entityWbfsysGroupUsers );
        $this->register( 'main_entity', $entityWbfsysGroupUsers );

      }
      else
      {
        $entityWbfsysGroupUsers   = new WbfsysGroupUsers_Entity() ;
        $this->register( 'entityWbfsysGroupUsers', $entityWbfsysGroupUsers );
        $this->register( 'main_entity', $entityWbfsysGroupUsers );
      }

    }
    elseif( $objid && $objid != $entityWbfsysGroupUsers->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysGroupUsers = $orm->get( 'WbfsysGroupUsers', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysgroupusers with this id '.$objid,
            'wbfsys.group_users.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysGroupUsers', $entityWbfsysGroupUsers );
      $this->register( 'main_entity', $entityWbfsysGroupUsers );
    }

    return $entityWbfsysGroupUsers;

  }//end public function getEntityWbfsysGroupUsers */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysGroupUsers_Entity $entity
  */
  public function setEntityWbfsysGroupUsers( $entity )
  {

    $this->register( 'entityWbfsysGroupUsers', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysGroupUsers */

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

    $data['wbfsys_group_users']  = $this->getEntityWbfsysGroupUsers();
    $data['wbfsys_role_user']  = $this->getEntityWbfsysRoleUser( $data['wbfsys_group_users']->id_user );
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
   * table to list all connected WbfsysRoleGroup
   *
   * @param int $idWbfsysRoleGroup the id for the reference entity
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysRoleGroup, $access, $params  )
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

    if( !$fieldsWbfsysGroupUsers = $this->getRegisterd( 'search_fields_wbfsys_group_users' ) )
    {
       $fieldsWbfsysGroupUsers   = $orm->getSearchCols( 'WbfsysGroupUsers' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_group_users' ) )
    {
      $fieldsWbfsysGroupUsers = array_unique( array_merge
      (
        $fieldsWbfsysGroupUsers,
        $refs
      ));
    }

    $filterWbfsysGroupUsers     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysGroupUsers', $fieldsWbfsysGroupUsers ),
      $orm->getErrorMessages( 'WbfsysGroupUsers'  ),
      'search_wbfsys_group_users'
    );
    $condition['wbfsys_group_users'] = $filterWbfsysGroupUsers->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysRoleGroup_Ref_GroupUsers_Table' );
    /* @var $query WbfsysRoleGroup_Ref_GroupUsers_Table_Query  */
    $query->extendedConditions = $extendedConditions;

    // hard condition
    $query->setCondition( 'wbfsys_group_users.id_group = '.$idWbfsysRoleGroup );
    
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

////////////////////////////////////////////////////////////////////////////////
// data provides
////////////////////////////////////////////////////////////////////////////////
    
}//end class WbfsysRoleGroup_Ref_GroupUsers_Table_Model

