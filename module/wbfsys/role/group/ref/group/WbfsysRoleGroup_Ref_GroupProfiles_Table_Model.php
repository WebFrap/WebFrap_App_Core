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
class WbfsysRoleGroup_Ref_GroupProfiles_Table_Model
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

    $data['wbfsys_group_profiles']  = $this->getEntityWbfsysGroupProfiles();
    $data['wbfsys_profile']  = $this->getEntityWbfsysProfile( $data['wbfsys_group_profiles']->id_profile );


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

    if( !$fieldsWbfsysGroupProfiles = $this->getRegisterd( 'search_fields_wbfsys_group_profiles' ) )
    {
       $fieldsWbfsysGroupProfiles   = $orm->getSearchCols( 'WbfsysGroupProfiles' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_group_profiles' ) )
    {
      $fieldsWbfsysGroupProfiles = array_unique( array_merge
      (
        $fieldsWbfsysGroupProfiles,
        $refs
      ));
    }

    $filterWbfsysGroupProfiles     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysGroupProfiles', $fieldsWbfsysGroupProfiles ),
      $orm->getErrorMessages( 'WbfsysGroupProfiles'  ),
      'search_wbfsys_group_profiles'
    );
    $condition['wbfsys_group_profiles'] = $filterWbfsysGroupProfiles->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysRoleGroup_Ref_GroupProfiles_Table' );
    /* @var $query WbfsysRoleGroup_Ref_GroupProfiles_Table_Query  */
    $query->extendedConditions = $extendedConditions;

    // hard condition
    $query->setCondition( 'wbfsys_group_profiles.id_group = '.$idWbfsysRoleGroup );
    
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
    
}//end class WbfsysRoleGroup_Ref_GroupProfiles_Table_Model

