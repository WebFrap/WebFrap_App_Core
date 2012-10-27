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
class WbfsysModule_Ref_Entity_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntity_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntity( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntity_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntity(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntity_Entity
  */
  public function getEntityWbfsysEntity( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysEntity = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntity = $this->getRegisterd( 'entityWbfsysEntity' );

    //entity wbfsys_entity
    if( !$entityWbfsysEntity )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntity = $orm->get( 'WbfsysEntity', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentity with this id '.$objid,
              'wbfsys.entity.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntity', $entityWbfsysEntity );
        $this->register( 'main_entity', $entityWbfsysEntity );

      }
      else
      {
        $entityWbfsysEntity   = new WbfsysEntity_Entity() ;
        $this->register( 'entityWbfsysEntity', $entityWbfsysEntity );
        $this->register( 'main_entity', $entityWbfsysEntity );
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntity->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntity = $orm->get( 'WbfsysEntity', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentity with this id '.$objid,
            'wbfsys.entity.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntity', $entityWbfsysEntity );
      $this->register( 'main_entity', $entityWbfsysEntity );
    }

    return $entityWbfsysEntity;

  }//end public function getEntityWbfsysEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntity_Entity $entity
  */
  public function setEntityWbfsysEntity( $entity )
  {

    $this->register( 'entityWbfsysEntity', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntity */

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

    $data['wbfsys_entity']  = $this->getEntityWbfsysEntity();


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
    if( $data['wbfsys_entity']->id_module )
    {
      $valWbfsysModule = $orm->getField
      (
        'WbfsysModule',
        'rowid = '.$data['wbfsys_entity']->id_module,
        'name'
      );
      $tabData['wbfsys_module_name'] = $valWbfsysModule;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_module_name'] = '';
    }


    return $tabData;

  }// end public function getEntryData */

////////////////////////////////////////////////////////////////////////////////
// search
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * table to list all connected WbfsysModule
   *
   * @param int $idWbfsysModule the id for the reference entity
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysModule, $access, $params  )
  { 
  
    $response  = $this->getResponse();
    
    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysEntity_Entity' ) )
    {
      $response->addError
      (
        'tried so search for a nonexisting entity: wbfsys_entity with the expected source wbfsys_entity'
      );
      return array();
    }

    $db          = $this->getDb();
    $orm         = $db->getOrm();
    $httpRequest = $this->getRequest();
    $user        = $this->getUser();
    $view        = $this->getView();


    $condition = array();




    if( $free = $httpRequest->param( 'free_search' , Validator::TEXT ) )
      $condition['free'] = $free;

    if( !$fieldsWbfsysEntity = $this->getRegisterd( 'search_fields_wbfsys_entity' ) )
    {
       $fieldsWbfsysEntity   = $orm->getSearchCols( 'WbfsysEntity' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_entity' ) )
    {
      $fieldsWbfsysEntity = array_unique( array_merge
      (
        $fieldsWbfsysEntity,
        $refs
      ));
    }

    $filterWbfsysEntity     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysEntity', $fieldsWbfsysEntity ),
      $orm->getErrorMessages( 'WbfsysEntity'  ),
      'search_wbfsys_entity'
    );
    $condition['wbfsys_entity'] = $filterWbfsysEntity->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysModule_Ref_Entity_Table' );
    /* @var $query WbfsysModule_Ref_Entity_Table_Query  */

    // hard condition
    $query->setCondition( 'wbfsys_entity.id_module = '.$idWbfsysModule );

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

}//end class WbfsysModule_Ref_Entity_Table_Model

