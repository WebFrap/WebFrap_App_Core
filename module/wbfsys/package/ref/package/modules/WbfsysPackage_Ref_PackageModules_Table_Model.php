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
class WbfsysPackage_Ref_PackageModules_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysPackageModules_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysPackageModules( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysPackageModules_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysPackageModules(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysPackageModules_Entity
  */
  public function getEntityWbfsysPackageModules( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysPackageModules = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysPackageModules = $this->getRegisterd( 'entityWbfsysPackageModules' );


    //entity wbfsys_package_modules
    if( !$entityWbfsysPackageModules )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysPackageModules = $orm->get( 'WbfsysPackageModules', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsyspackagemodules with this id '.$objid,
              'wbfsys.package_modules.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysPackageModules', $entityWbfsysPackageModules );
        $this->register( 'main_entity', $entityWbfsysPackageModules );

      }
      else
      {
        $entityWbfsysPackageModules   = new WbfsysPackageModules_Entity() ;
        $this->register( 'entityWbfsysPackageModules', $entityWbfsysPackageModules );
        $this->register( 'main_entity', $entityWbfsysPackageModules );
      }

    }
    elseif( $objid && $objid != $entityWbfsysPackageModules->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysPackageModules = $orm->get( 'WbfsysPackageModules', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsyspackagemodules with this id '.$objid,
            'wbfsys.package_modules.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysPackageModules', $entityWbfsysPackageModules );
      $this->register( 'main_entity', $entityWbfsysPackageModules );
    }

    return $entityWbfsysPackageModules;

  }//end public function getEntityWbfsysPackageModules */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysPackageModules_Entity $entity
  */
  public function setEntityWbfsysPackageModules( $entity )
  {

    $this->register( 'entityWbfsysPackageModules', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysPackageModules */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysModule_Entity
  */
  public function getEntityWbfsysModule( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysModule = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysModule = $this->getRegisterd( 'entityWbfsysModule' );

    //entity wbfsys_module
    if( !$entityWbfsysModule )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysModule = $orm->get( 'WbfsysModule', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmodule with this id '.$objid,
              'wbfsys.module.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysModule', $entityWbfsysModule );
        $this->register( 'main_entity', $entityWbfsysModule );

      }
      else
      {
        $entityWbfsysModule   = new WbfsysModule_Entity() ;
        $this->register( 'entityWbfsysModule', $entityWbfsysModule );
        $this->register( 'main_entity', $entityWbfsysModule );
      }

    }
    elseif( $objid && $objid != $entityWbfsysModule->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysModule = $orm->get( 'WbfsysModule', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmodule with this id '.$objid,
            'wbfsys.module.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysModule', $entityWbfsysModule );
      $this->register( 'main_entity', $entityWbfsysModule );
    }

    return $entityWbfsysModule;

  }//end public function getEntityWbfsysModule */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysModule_Entity $entity
  */
  public function setEntityWbfsysModule( $entity )
  {

    $this->register( 'entityWbfsysModule', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysModule */

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

    $data['wbfsys_package_modules']  = $this->getEntityWbfsysPackageModules();
    $data['wbfsys_module']  = $this->getEntityWbfsysModule( $data['wbfsys_package_modules']->id_module );


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
   * table to list all connected WbfsysPackage
   *
   * @param int $idWbfsysPackage the id for the reference entity
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysPackage, $access, $params  )
  {

    $response  = $this->getResponse();

    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysModule_Entity' ) )
    {
      Error::addError
      (
        'tried so search for a nonexisting entity: wbfsys_module with the expected source wbfsys_module'
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

    if( !$fieldsWbfsysPackageModules = $this->getRegisterd( 'search_fields_wbfsys_package_modules' ) )
    {
       $fieldsWbfsysPackageModules   = $orm->getSearchCols( 'WbfsysPackageModules' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_package_modules' ) )
    {
      $fieldsWbfsysPackageModules = array_unique( array_merge
      (
        $fieldsWbfsysPackageModules,
        $refs
      ));
    }

    $filterWbfsysPackageModules     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysPackageModules', $fieldsWbfsysPackageModules ),
      $orm->getErrorMessages( 'WbfsysPackageModules'  ),
      'search_wbfsys_package_modules'
    );
    $condition['wbfsys_package_modules'] = $filterWbfsysPackageModules->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysPackage_Ref_PackageModules_Table' );
    /* @var $query WbfsysPackage_Ref_PackageModules_Table_Query  */
    $query->extendedConditions = $extendedConditions;

    // hard condition
    $query->setCondition( 'wbfsys_package_modules.id_package = '.$idWbfsysPackage );
    
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

}//end class WbfsysPackage_Ref_PackageModules_Table_Model

