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
class WbfsysManagement_Ref_Mask_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMask_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysMask( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMask_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysMask(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMask_Entity
  */
  public function getEntityWbfsysMask( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysMask = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysMask = $this->getRegisterd( 'entityWbfsysMask' );

    //entity wbfsys_mask
    if( !$entityWbfsysMask )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysMask = $orm->get( 'WbfsysMask', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmask with this id '.$objid,
              'wbfsys.mask.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysMask', $entityWbfsysMask );
        $this->register( 'main_entity', $entityWbfsysMask );

      }
      else
      {
        $entityWbfsysMask   = new WbfsysMask_Entity() ;
        $this->register( 'entityWbfsysMask', $entityWbfsysMask );
        $this->register( 'main_entity', $entityWbfsysMask );
      }

    }
    elseif( $objid && $objid != $entityWbfsysMask->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysMask = $orm->get( 'WbfsysMask', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmask with this id '.$objid,
            'wbfsys.mask.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysMask', $entityWbfsysMask );
      $this->register( 'main_entity', $entityWbfsysMask );
    }

    return $entityWbfsysMask;

  }//end public function getEntityWbfsysMask */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMask_Entity $entity
  */
  public function setEntityWbfsysMask( $entity )
  {

    $this->register( 'entityWbfsysMask', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysMask */

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

    $data['wbfsys_mask']  = $this->getEntityWbfsysMask();


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
   * table to list all connected WbfsysManagement
   *
   * @param int $idWbfsysManagement the id for the reference entity
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysManagement, $access, $params  )
  { 
  
    $response  = $this->getResponse();
    
    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysMask_Entity' ) )
    {
      $response->addError
      (
        'tried so search for a nonexisting entity: wbfsys_mask with the expected source wbfsys_mask'
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

    if( !$fieldsWbfsysMask = $this->getRegisterd( 'search_fields_wbfsys_mask' ) )
    {
       $fieldsWbfsysMask   = $orm->getSearchCols( 'WbfsysMask' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_mask' ) )
    {
      $fieldsWbfsysMask = array_unique( array_merge
      (
        $fieldsWbfsysMask,
        $refs
      ));
    }

    $filterWbfsysMask     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysMask', $fieldsWbfsysMask ),
      $orm->getErrorMessages( 'WbfsysMask'  ),
      'search_wbfsys_mask'
    );
    $condition['wbfsys_mask'] = $filterWbfsysMask->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysManagement_Ref_Mask_Table' );
    /* @var $query WbfsysManagement_Ref_Mask_Table_Query  */

    // hard condition
    $query->setCondition( 'wbfsys_mask.id_management = '.$idWbfsysManagement );

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

}//end class WbfsysManagement_Ref_Mask_Table_Model

