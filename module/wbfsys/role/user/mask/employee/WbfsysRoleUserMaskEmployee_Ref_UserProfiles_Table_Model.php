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
class WbfsysRoleUserMaskEmployee_Ref_UserProfiles_Table_Model
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

    $data['wbfsys_user_profiles']  = $this->getEntityWbfsysUserProfiles();
    $data['wbfsys_profile']  = $this->getEntityWbfsysProfile( $data['wbfsys_user_profiles']->id_profile );


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
   * table to list all connected WbfsysRoleUserMaskEmployee
   *
   * @param int $idWbfsysRoleUserMaskEmployee the id for the reference entity
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysRoleUserMaskEmployee, $access, $params  )
  {

    $response  = $this->getResponse();

    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysProfile_Entity' ) )
    {
      Error::addError
      (
        'tried so search for a nonexisting entity: wbfsys_profile with the expected source wbfsys_profile'
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

    if( !$fieldsWbfsysUserProfiles = $this->getRegisterd( 'search_fields_wbfsys_user_profiles' ) )
    {
       $fieldsWbfsysUserProfiles   = $orm->getSearchCols( 'WbfsysUserProfiles' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_user_profiles' ) )
    {
      $fieldsWbfsysUserProfiles = array_unique( array_merge
      (
        $fieldsWbfsysUserProfiles,
        $refs
      ));
    }

    $filterWbfsysUserProfiles     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysUserProfiles', $fieldsWbfsysUserProfiles ),
      $orm->getErrorMessages( 'WbfsysUserProfiles'  ),
      'search_wbfsys_user_profiles'
    );
    $condition['wbfsys_user_profiles'] = $filterWbfsysUserProfiles->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysRoleUserMaskEmployee_Ref_UserProfiles_Table' );
    /* @var $query WbfsysRoleUserMaskEmployee_Ref_UserProfiles_Table_Query  */
    $query->extendedConditions = $extendedConditions;

    // hard condition
    $query->setCondition( 'wbfsys_user_profiles.id_user = '.$idWbfsysRoleUserMaskEmployee );
    
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
    
}//end class WbfsysRoleUserMaskEmployee_Ref_UserProfiles_Table_Model

