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
class WbfsysEntityRole_Ref_RoleActions_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityRoleActions_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityRoleActions( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityRoleActions_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityRoleActions(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityRoleActions_Entity
  */
  public function getEntityWbfsysEntityRoleActions( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysEntityRoleActions = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntityRoleActions = $this->getRegisterd( 'entityWbfsysEntityRoleActions' );


    //entity wbfsys_entity_role_actions
    if( !$entityWbfsysEntityRoleActions )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntityRoleActions = $orm->get( 'WbfsysEntityRoleActions', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentityroleactions with this id '.$objid,
              'wbfsys.entity_role_actions.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntityRoleActions', $entityWbfsysEntityRoleActions );
        $this->register( 'main_entity', $entityWbfsysEntityRoleActions );

      }
      else
      {
        $entityWbfsysEntityRoleActions   = new WbfsysEntityRoleActions_Entity() ;
        $this->register( 'entityWbfsysEntityRoleActions', $entityWbfsysEntityRoleActions );
        $this->register( 'main_entity', $entityWbfsysEntityRoleActions );
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntityRoleActions->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntityRoleActions = $orm->get( 'WbfsysEntityRoleActions', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentityroleactions with this id '.$objid,
            'wbfsys.entity_role_actions.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntityRoleActions', $entityWbfsysEntityRoleActions );
      $this->register( 'main_entity', $entityWbfsysEntityRoleActions );
    }

    return $entityWbfsysEntityRoleActions;

  }//end public function getEntityWbfsysEntityRoleActions */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityRoleActions_Entity $entity
  */
  public function setEntityWbfsysEntityRoleActions( $entity )
  {

    $this->register( 'entityWbfsysEntityRoleActions', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntityRoleActions */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysAclAction_Entity
  */
  public function getEntityWbfsysAclAction( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysAclAction = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysAclAction = $this->getRegisterd( 'entityWbfsysAclAction' );

    //entity wbfsys_acl_action
    if( !$entityWbfsysAclAction )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysAclAction = $orm->get( 'WbfsysAclAction', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysaclaction with this id '.$objid,
              'wbfsys.acl_action.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysAclAction', $entityWbfsysAclAction );
        $this->register( 'main_entity', $entityWbfsysAclAction );

      }
      else
      {
        $entityWbfsysAclAction   = new WbfsysAclAction_Entity() ;
        $this->register( 'entityWbfsysAclAction', $entityWbfsysAclAction );
        $this->register( 'main_entity', $entityWbfsysAclAction );
      }

    }
    elseif( $objid && $objid != $entityWbfsysAclAction->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysAclAction = $orm->get( 'WbfsysAclAction', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysaclaction with this id '.$objid,
            'wbfsys.acl_action.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysAclAction', $entityWbfsysAclAction );
      $this->register( 'main_entity', $entityWbfsysAclAction );
    }

    return $entityWbfsysAclAction;

  }//end public function getEntityWbfsysAclAction */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysAclAction_Entity $entity
  */
  public function setEntityWbfsysAclAction( $entity )
  {

    $this->register( 'entityWbfsysAclAction', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysAclAction */

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

    $data['wbfsys_entity_role_actions']  = $this->getEntityWbfsysEntityRoleActions();
    $data['wbfsys_acl_action']  = $this->getEntityWbfsysAclAction( $data['wbfsys_entity_role_actions']->id_action );


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



    return $tabData;

  }// end public function getEntryData */

////////////////////////////////////////////////////////////////////////////////
// search
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * table to list all connected WbfsysEntityRole
   *
   * @param int $idWbfsysEntityRole the id for the reference entity
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysEntityRole, $access, $params  )
  {

    $response  = $this->getResponse();

    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysAclAction_Entity' ) )
    {
      Error::addError
      (
        'tried so search for a nonexisting entity: wbfsys_acl_action with the expected source wbfsys_acl_action'
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

    if( !$fieldsWbfsysEntityRoleActions = $this->getRegisterd( 'search_fields_wbfsys_entity_role_actions' ) )
    {
       $fieldsWbfsysEntityRoleActions   = $orm->getSearchCols( 'WbfsysEntityRoleActions' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_entity_role_actions' ) )
    {
      $fieldsWbfsysEntityRoleActions = array_unique( array_merge
      (
        $fieldsWbfsysEntityRoleActions,
        $refs
      ));
    }

    $filterWbfsysEntityRoleActions     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysEntityRoleActions', $fieldsWbfsysEntityRoleActions ),
      $orm->getErrorMessages( 'WbfsysEntityRoleActions'  ),
      'search_wbfsys_entity_role_actions'
    );
    $condition['wbfsys_entity_role_actions'] = $filterWbfsysEntityRoleActions->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysEntityRole_Ref_RoleActions_Table' );
    /* @var $query WbfsysEntityRole_Ref_RoleActions_Table_Query  */
    $query->extendedConditions = $extendedConditions;

    // hard condition
    $query->setCondition( 'wbfsys_entity_role_actions.id_role = '.$idWbfsysEntityRole );
    
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

}//end class WbfsysEntityRole_Ref_RoleActions_Table_Model

