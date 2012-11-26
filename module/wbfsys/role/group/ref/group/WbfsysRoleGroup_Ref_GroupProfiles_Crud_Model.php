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
class WbfsysRoleGroup_Ref_GroupProfiles_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysGroupProfiles_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysGroupProfiles( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysGroupProfiles_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysGroupProfiles(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysGroupProfiles_Entity
  */
  public function getEntityWbfsysGroupProfiles( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysGroupProfiles = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysGroupProfiles = $this->getRegisterd( 'entityWbfsysGroupProfiles' );


    //entity wbfsys_group_profiles
    if( !$entityWbfsysGroupProfiles )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysGroupProfiles = $orm->get( 'WbfsysGroupProfiles', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysgroupprofiles with this id '.$objid,
              'wbfsys.group_profiles.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysGroupProfiles', $entityWbfsysGroupProfiles );
        $this->register( 'main_entity', $entityWbfsysGroupProfiles );

      }
      else
      {
        $entityWbfsysGroupProfiles   = new WbfsysGroupProfiles_Entity() ;
        $this->register( 'entityWbfsysGroupProfiles', $entityWbfsysGroupProfiles );
        $this->register( 'main_entity', $entityWbfsysGroupProfiles );
      }

    }
    elseif( $objid && $objid != $entityWbfsysGroupProfiles->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysGroupProfiles = $orm->get( 'WbfsysGroupProfiles', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysgroupprofiles with this id '.$objid,
            'wbfsys.group_profiles.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysGroupProfiles', $entityWbfsysGroupProfiles );
      $this->register( 'main_entity', $entityWbfsysGroupProfiles );
    }

    return $entityWbfsysGroupProfiles;

  }//end public function getEntityWbfsysGroupProfiles */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysGroupProfiles_Entity $entity
  */
  public function setEntityWbfsysGroupProfiles( $entity )
  {

    $this->register( 'entityWbfsysGroupProfiles', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysGroupProfiles */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysProfile_Entity
  */
  public function getEntityWbfsysProfile( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysProfile = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysProfile = $this->getRegisterd( 'entityWbfsysProfile' );

    //entity wbfsys_profile
    if( !$entityWbfsysProfile )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysProfile = $orm->get( 'WbfsysProfile', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysprofile with this id '.$objid,
              'wbfsys.profile.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysProfile', $entityWbfsysProfile );
        $this->register( 'main_entity', $entityWbfsysProfile );

      }
      else
      {
        $entityWbfsysProfile   = new WbfsysProfile_Entity() ;
        $this->register( 'entityWbfsysProfile', $entityWbfsysProfile );
        $this->register( 'main_entity', $entityWbfsysProfile );
      }

    }
    elseif( $objid && $objid != $entityWbfsysProfile->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysProfile = $orm->get( 'WbfsysProfile', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysprofile with this id '.$objid,
            'wbfsys.profile.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysProfile', $entityWbfsysProfile );
      $this->register( 'main_entity', $entityWbfsysProfile );
    }

    return $entityWbfsysProfile;

  }//end public function getEntityWbfsysProfile */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysProfile_Entity $entity
  */
  public function setEntityWbfsysProfile( $entity )
  {

    $this->register( 'entityWbfsysProfile', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysProfile */

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
      if( !$entityWbfsysGroupProfiles = $this->getEntityWbfsysGroupProfiles() )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'entityWbfsysGroupProfiles was not registered'
        );
      }

      if( !$orm->insert( $entityWbfsysGroupProfiles ) )
      {

        $entityText = $entityWbfsysGroupProfiles->text();
        $response->addError
        (
          $view->i18n->l
          (
            'Failed to create Group Profiles {@label@}',
            'wbfsys.role_group.message',
            array( 'label' => $entityText )
          )
        );
      }
      else
      {
        $entityText  = $entityWbfsysGroupProfiles->text();

        $this->getResponse()->addMessage
        (
          $view->i18n->l
          (
            'Successfully created Group Profiles {@label@}',
            'wbfsys.role_group.message',
            array( 'label' => $entityText)
          )
        );


        $this->protocol
        (
          'created new Group Profiles: '.$entityText,
          'create',
          $entityWbfsysGroupProfiles
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

      //management  wbfsys_group_profiles source wbfsys_group_profiles
      $entityWbfsysGroupProfiles = $orm->newEntity( 'WbfsysGroupProfiles' );

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysGroupProfiles,
        'wbfsys_group_profiles',
        array( 'id_profile', 'id_group' )
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysGroupProfiles', $entityWbfsysGroupProfiles );


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
      $entity =  $this->getRegisterd('entityWbfsysGroupProfiles');

    return $orm->checkUnique
    (
      $entity ,
      array( 'id_profile', 'id_group' )
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
      'wbfsys_group_profiles' => array
      (
        'id_group',
        'id_profile',
        'm_version',
      ),
      'wbfsys_profile' => array
      (
        'm_parent',
        'name',
        'access_key',
        'flag_core',
        'description',
        'revision',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysRoleGroup_Ref_GroupProfiles_Crud_Model

