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
class WbfsysRoleUserMaskEmployee_Ref_UserRoles_Crud_Model
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
      if( !$entityWbfsysGroupUsers = $this->getEntityWbfsysGroupUsers() )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'entityWbfsysGroupUsers was not registered'
        );
      }

      if( !$orm->insert($entityWbfsysGroupUsers) )
      {

        $entityText = $entityWbfsysGroupUsers->text();
        $response->addError
        (
          $view->i18n->l
          (
            'Failed to create Group Users {@label@}',
            'wbfsys.role_user_mask_employee.message',
            array( 'label' => $entityText )
          )
        );
      }
      else
      {
        $entityText  = $entityWbfsysGroupUsers->text();

        $this->getResponse()->addMessage
        (
          $view->i18n->l
          (
            'Successfully created Group Users {@label@}',
            'wbfsys.role_user_mask_employee.message',
            array( 'label' => $entityText)
          )
        );


        $this->protocol
        (
          'created new Group Users: '.$entityText,
          'create',
          $entityWbfsysGroupUsers
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

      //management  wbfsys_group_users source wbfsys_group_users
      $entityWbfsysGroupUsers = $orm->newEntity( 'WbfsysGroupUsers' );

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysGroupUsers,
        'wbfsys_group_users',
        array( 'id_group', 'id_user' )
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysGroupUsers', $entityWbfsysGroupUsers );


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
      $entity =  $this->getRegisterd('entityWbfsysGroupUsers');

    return $orm->checkUnique
    (
      $entity ,
      array( 'id_group', 'id_user' )
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
      'wbfsys_group_users' => array
      (
        'id_user',
        'id_group',
        'id_area',
        'partial',
        'ident_key',
        'vid',
        'date_start',
        'description',
        'date_end',
        'm_version',
      ),
      'wbfsys_role_group' => array
      (
        'm_parent',
        'name',
        'access_key',
        'id_mandant',
        'id_type',
        'level',
        'system',
        'id_module',
        'revision',
        'flag_core',
        'description',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysRoleUserMaskEmployee_Ref_UserRoles_Crud_Model

