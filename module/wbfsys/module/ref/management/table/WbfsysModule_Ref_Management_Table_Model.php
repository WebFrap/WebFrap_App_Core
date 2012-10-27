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
class WbfsysModule_Ref_Management_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysManagement_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysManagement( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysManagement_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysManagement(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysManagement_Entity
  */
  public function getEntityWbfsysManagement( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysManagement = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysManagement = $this->getRegisterd( 'entityWbfsysManagement' );

    //entity wbfsys_management
    if( !$entityWbfsysManagement )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysManagement = $orm->get( 'WbfsysManagement', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmanagement with this id '.$objid,
              'wbfsys.management.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysManagement', $entityWbfsysManagement );
        $this->register( 'main_entity', $entityWbfsysManagement );

      }
      else
      {
        $entityWbfsysManagement   = new WbfsysManagement_Entity() ;
        $this->register( 'entityWbfsysManagement', $entityWbfsysManagement );
        $this->register( 'main_entity', $entityWbfsysManagement );
      }

    }
    elseif( $objid && $objid != $entityWbfsysManagement->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysManagement = $orm->get( 'WbfsysManagement', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmanagement with this id '.$objid,
            'wbfsys.management.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysManagement', $entityWbfsysManagement );
      $this->register( 'main_entity', $entityWbfsysManagement );
    }

    return $entityWbfsysManagement;

  }//end public function getEntityWbfsysManagement */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysManagement_Entity $entity
  */
  public function setEntityWbfsysManagement( $entity )
  {

    $this->register( 'entityWbfsysManagement', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysManagement */

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

    $data['wbfsys_management']  = $this->getEntityWbfsysManagement();


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
    if( $data['wbfsys_management']->id_entity )
    {
      $valWbfsysEntity = $orm->getField
      (
        'WbfsysEntity',
        'rowid = '.$data['wbfsys_management']->id_entity,
        'name'
      );
      $tabData['wbfsys_entity_name'] = $valWbfsysEntity;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_entity_name'] = '';
    }

    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_management']->id_module )
    {
      $valWbfsysModule = $orm->getField
      (
        'WbfsysModule',
        'rowid = '.$data['wbfsys_management']->id_module,
        'name'
      );
      $tabData['wbfsys_module_name'] = $valWbfsysModule;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_module_name'] = '';
    }

    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_management']->id_security_area )
    {
      $valWbfsysSecurityArea = $orm->getField
      (
        'WbfsysSecurityArea',
        'rowid = '.$data['wbfsys_management']->id_security_area,
        'name'
      );
      $tabData['wbfsys_security_area_name'] = $valWbfsysSecurityArea;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_security_area_name'] = '';
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
    if( !Webfrap::classLoadable( 'WbfsysManagement_Entity' ) )
    {
      $response->addError
      (
        'tried so search for a nonexisting entity: wbfsys_management with the expected source wbfsys_management'
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

    if( !$fieldsWbfsysManagement = $this->getRegisterd( 'search_fields_wbfsys_management' ) )
    {
       $fieldsWbfsysManagement   = $orm->getSearchCols( 'WbfsysManagement' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_management' ) )
    {
      $fieldsWbfsysManagement = array_unique( array_merge
      (
        $fieldsWbfsysManagement,
        $refs
      ));
    }

    $filterWbfsysManagement     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysManagement', $fieldsWbfsysManagement ),
      $orm->getErrorMessages( 'WbfsysManagement'  ),
      'search_wbfsys_management'
    );
    $condition['wbfsys_management'] = $filterWbfsysManagement->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysModule_Ref_Management_Table' );
    /* @var $query WbfsysModule_Ref_Management_Table_Query  */

    // hard condition
    $query->setCondition( 'wbfsys_management.id_module = '.$idWbfsysModule );

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

}//end class WbfsysModule_Ref_Management_Table_Model

