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
class WbfsysApp_Ref_AppModules_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysAppModules_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysAppModules( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysAppModules_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysAppModules(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysAppModules_Entity
  */
  public function getEntityWbfsysAppModules( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysAppModules = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysAppModules = $this->getRegisterd( 'entityWbfsysAppModules' );


    //entity wbfsys_app_modules
    if( !$entityWbfsysAppModules )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysAppModules = $orm->get( 'WbfsysAppModules', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysappmodules with this id '.$objid,
              'wbfsys.app_modules.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysAppModules', $entityWbfsysAppModules );
        $this->register( 'main_entity', $entityWbfsysAppModules );

      }
      else
      {
        $entityWbfsysAppModules   = new WbfsysAppModules_Entity() ;
        $this->register( 'entityWbfsysAppModules', $entityWbfsysAppModules );
        $this->register( 'main_entity', $entityWbfsysAppModules );
      }

    }
    elseif( $objid && $objid != $entityWbfsysAppModules->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysAppModules = $orm->get( 'WbfsysAppModules', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysappmodules with this id '.$objid,
            'wbfsys.app_modules.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysAppModules', $entityWbfsysAppModules );
      $this->register( 'main_entity', $entityWbfsysAppModules );
    }

    return $entityWbfsysAppModules;

  }//end public function getEntityWbfsysAppModules */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysAppModules_Entity $entity
  */
  public function setEntityWbfsysAppModules( $entity )
  {

    $this->register( 'entityWbfsysAppModules', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysAppModules */

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

    $data['wbfsys_app_modules']  = $this->getEntityWbfsysAppModules();
    $data['wbfsys_module']  = $this->getEntityWbfsysModule( $data['wbfsys_app_modules']->id_module );


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
   * table to list all connected WbfsysApp
   *
   * @param int $idWbfsysApp the id for the reference entity
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysApp, $access, $params  )
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

    if( !$fieldsWbfsysAppModules = $this->getRegisterd( 'search_fields_wbfsys_app_modules' ) )
    {
       $fieldsWbfsysAppModules   = $orm->getSearchCols( 'WbfsysAppModules' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_app_modules' ) )
    {
      $fieldsWbfsysAppModules = array_unique( array_merge
      (
        $fieldsWbfsysAppModules,
        $refs
      ));
    }

    $filterWbfsysAppModules     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysAppModules', $fieldsWbfsysAppModules ),
      $orm->getErrorMessages( 'WbfsysAppModules'  ),
      'search_wbfsys_app_modules'
    );
    $condition['wbfsys_app_modules'] = $filterWbfsysAppModules->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysApp_Ref_AppModules_Table' );
    /* @var $query WbfsysApp_Ref_AppModules_Table_Query  */
    $query->extendedConditions = $extendedConditions;

    // hard condition
    $query->setCondition( 'wbfsys_app_modules.id_app = '.$idWbfsysApp );
    
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

}//end class WbfsysApp_Ref_AppModules_Table_Model

