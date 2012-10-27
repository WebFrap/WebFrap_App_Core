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
class WbfsysEntity_Ref_Categories_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityCategory_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityCategory( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityCategory_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityCategory(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityCategory_Entity
  */
  public function getEntityWbfsysEntityCategory( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysEntityCategory = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntityCategory = $this->getRegisterd( 'entityWbfsysEntityCategory' );

    //entity wbfsys_entity_category
    if( !$entityWbfsysEntityCategory )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntityCategory = $orm->get( 'WbfsysEntityCategory', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentitycategory with this id '.$objid,
              'wbfsys.entity_category.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntityCategory', $entityWbfsysEntityCategory );
        $this->register( 'main_entity', $entityWbfsysEntityCategory );

      }
      else
      {
        $entityWbfsysEntityCategory   = new WbfsysEntityCategory_Entity() ;
        $this->register( 'entityWbfsysEntityCategory', $entityWbfsysEntityCategory );
        $this->register( 'main_entity', $entityWbfsysEntityCategory );
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntityCategory->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntityCategory = $orm->get( 'WbfsysEntityCategory', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentitycategory with this id '.$objid,
            'wbfsys.entity_category.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntityCategory', $entityWbfsysEntityCategory );
      $this->register( 'main_entity', $entityWbfsysEntityCategory );
    }

    return $entityWbfsysEntityCategory;

  }//end public function getEntityWbfsysEntityCategory */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityCategory_Entity $entity
  */
  public function setEntityWbfsysEntityCategory( $entity )
  {

    $this->register( 'entityWbfsysEntityCategory', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntityCategory */

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

    $data['wbfsys_entity_category']  = $this->getEntityWbfsysEntityCategory();


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
   * table to list all connected WbfsysEntity
   *
   * @param int $idWbfsysEntity the id for the reference entity
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysEntity, $access, $params  )
  { 
  
    $response  = $this->getResponse();
    
    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysEntityCategory_Entity' ) )
    {
      $response->addError
      (
        'tried so search for a nonexisting entity: wbfsys_entity_category with the expected source wbfsys_entity_category'
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

    if( !$fieldsWbfsysEntityCategory = $this->getRegisterd( 'search_fields_wbfsys_entity_category' ) )
    {
       $fieldsWbfsysEntityCategory   = $orm->getSearchCols( 'WbfsysEntityCategory' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_entity_category' ) )
    {
      $fieldsWbfsysEntityCategory = array_unique( array_merge
      (
        $fieldsWbfsysEntityCategory,
        $refs
      ));
    }

    $filterWbfsysEntityCategory     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysEntityCategory', $fieldsWbfsysEntityCategory ),
      $orm->getErrorMessages( 'WbfsysEntityCategory'  ),
      'search_wbfsys_entity_category'
    );
    $condition['wbfsys_entity_category'] = $filterWbfsysEntityCategory->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysEntity_Ref_Categories_Table' );
    /* @var $query WbfsysEntity_Ref_Categories_Table_Query  */

    // hard condition
    $query->setCondition( 'wbfsys_entity_category.id_entity = '.$idWbfsysEntity );

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

}//end class WbfsysEntity_Ref_Categories_Table_Model

