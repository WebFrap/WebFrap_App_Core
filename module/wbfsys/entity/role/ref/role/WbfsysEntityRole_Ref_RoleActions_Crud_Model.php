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
class WbfsysEntityRole_Ref_RoleActions_Crud_Model
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
      if( !$entityWbfsysEntityRoleActions = $this->getEntityWbfsysEntityRoleActions() )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'entityWbfsysEntityRoleActions was not registered'
        );
      }

      if( !$orm->insert($entityWbfsysEntityRoleActions) )
      {

        $entityText = $entityWbfsysEntityRoleActions->text();
        $response->addError
        (
          $view->i18n->l
          (
            'Failed to create Entity Role Actions {@label@}',
            'wbfsys.entity_role.message',
            array( 'label' => $entityText )
          )
        );
      }
      else
      {
        $entityText  = $entityWbfsysEntityRoleActions->text();

        $this->getResponse()->addMessage
        (
          $view->i18n->l
          (
            'Successfully created Entity Role Actions {@label@}',
            'wbfsys.entity_role.message',
            array( 'label' => $entityText)
          )
        );


        $this->protocol
        (
          'created new Entity Role Actions: '.$entityText,
          'create',
          $entityWbfsysEntityRoleActions
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

      //management  wbfsys_entity_role_actions source wbfsys_entity_role_actions
      $entityWbfsysEntityRoleActions = $orm->newEntity( 'WbfsysEntityRoleActions' );

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysEntityRoleActions,
        'wbfsys_entity_role_actions',
        array( 'id_action', 'id_role' )
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysEntityRoleActions', $entityWbfsysEntityRoleActions );


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
      $entity =  $this->getRegisterd('entityWbfsysEntityRoleActions');

    return $orm->checkUnique
    (
      $entity ,
      array( 'id_action', 'id_role' )
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
      'wbfsys_entity_role_actions' => array
      (
        'id_role',
        'id_action',
        'm_version',
      ),
      'wbfsys_acl_action' => array
      (
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysEntityRole_Ref_RoleActions_Crud_Model

