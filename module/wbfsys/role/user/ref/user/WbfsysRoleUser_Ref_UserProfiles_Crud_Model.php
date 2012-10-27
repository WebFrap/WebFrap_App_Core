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
class WbfsysRoleUser_Ref_UserProfiles_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysUserProfiles_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysUserProfiles( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysUserProfiles_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysUserProfiles(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysUserProfiles_Entity
  */
  public function getEntityWbfsysUserProfiles( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysUserProfiles = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysUserProfiles = $this->getRegisterd( 'entityWbfsysUserProfiles' );


    //entity wbfsys_user_profiles
    if( !$entityWbfsysUserProfiles )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysUserProfiles = $orm->get( 'WbfsysUserProfiles', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysuserprofiles with this id '.$objid,
              'wbfsys.user_profiles.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysUserProfiles', $entityWbfsysUserProfiles );
        $this->register( 'main_entity', $entityWbfsysUserProfiles );

      }
      else
      {
        $entityWbfsysUserProfiles   = new WbfsysUserProfiles_Entity() ;
        $this->register( 'entityWbfsysUserProfiles', $entityWbfsysUserProfiles );
        $this->register( 'main_entity', $entityWbfsysUserProfiles );
      }

    }
    elseif( $objid && $objid != $entityWbfsysUserProfiles->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysUserProfiles = $orm->get( 'WbfsysUserProfiles', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysuserprofiles with this id '.$objid,
            'wbfsys.user_profiles.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysUserProfiles', $entityWbfsysUserProfiles );
      $this->register( 'main_entity', $entityWbfsysUserProfiles );
    }

    return $entityWbfsysUserProfiles;

  }//end public function getEntityWbfsysUserProfiles */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysUserProfiles_Entity $entity
  */
  public function setEntityWbfsysUserProfiles( $entity )
  {

    $this->register( 'entityWbfsysUserProfiles', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysUserProfiles */

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
      if( !$entityWbfsysUserProfiles = $this->getEntityWbfsysUserProfiles() )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'entityWbfsysUserProfiles was not registered'
        );
      }

      if( !$orm->insert($entityWbfsysUserProfiles) )
      {

        $entityText = $entityWbfsysUserProfiles->text();
        $response->addError
        (
          $view->i18n->l
          (
            'Failed to create User Profiles {@label@}',
            'wbfsys.role_user.message',
            array( 'label' => $entityText )
          )
        );
      }
      else
      {
        $entityText  = $entityWbfsysUserProfiles->text();

        $this->getResponse()->addMessage
        (
          $view->i18n->l
          (
            'Successfully created User Profiles {@label@}',
            'wbfsys.role_user.message',
            array( 'label' => $entityText)
          )
        );


        $this->protocol
        (
          'created new User Profiles: '.$entityText,
          'create',
          $entityWbfsysUserProfiles
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

      //management  wbfsys_user_profiles source wbfsys_user_profiles
      $entityWbfsysUserProfiles = $orm->newEntity( 'WbfsysUserProfiles' );

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysUserProfiles,
        'wbfsys_user_profiles',
        array( 'id_profile', 'id_user' )
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysUserProfiles', $entityWbfsysUserProfiles );


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
      $entity =  $this->getRegisterd('entityWbfsysUserProfiles');

    return $orm->checkUnique
    (
      $entity ,
      array( 'id_profile', 'id_user' )
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
      'wbfsys_user_profiles' => array
      (
        'id_user',
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

}//end class WbfsysRoleUser_Ref_UserProfiles_Crud_Model

