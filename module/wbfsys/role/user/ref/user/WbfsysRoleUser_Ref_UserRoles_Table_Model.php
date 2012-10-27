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
class WbfsysRoleUser_Ref_UserRoles_Table_Model
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

    $data['wbfsys_group_users']  = $this->getEntityWbfsysGroupUsers();
    $data['wbfsys_role_group']  = $this->getEntityWbfsysRoleGroup( $data['wbfsys_group_users']->id_group );


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
   * table to list all connected WbfsysRoleUser
   *
   * @param int $idWbfsysRoleUser the id for the reference entity
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysRoleUser, $access, $params  )
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
    $query = $db->newQuery( 'WbfsysRoleUser_Ref_UserRoles_Table' );
    /* @var $query WbfsysRoleUser_Ref_UserRoles_Table_Query  */
    $query->extendedConditions = $extendedConditions;

    // hard condition
    $query->setCondition( 'wbfsys_group_users.id_user = '.$idWbfsysRoleUser );
    
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
    
}//end class WbfsysRoleUser_Ref_UserRoles_Table_Model

