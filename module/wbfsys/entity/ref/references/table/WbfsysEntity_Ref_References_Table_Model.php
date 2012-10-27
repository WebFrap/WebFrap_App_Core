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
class WbfsysEntity_Ref_References_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityReference_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityReference( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityReference_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityReference(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityReference_Entity
  */
  public function getEntityWbfsysEntityReference( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysEntityReference = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntityReference = $this->getRegisterd( 'entityWbfsysEntityReference' );

    //entity wbfsys_entity_reference
    if( !$entityWbfsysEntityReference )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntityReference = $orm->get( 'WbfsysEntityReference', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentityreference with this id '.$objid,
              'wbfsys.entity_reference.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntityReference', $entityWbfsysEntityReference );
        $this->register( 'main_entity', $entityWbfsysEntityReference );

      }
      else
      {
        $entityWbfsysEntityReference   = new WbfsysEntityReference_Entity() ;
        $this->register( 'entityWbfsysEntityReference', $entityWbfsysEntityReference );
        $this->register( 'main_entity', $entityWbfsysEntityReference );
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntityReference->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntityReference = $orm->get( 'WbfsysEntityReference', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentityreference with this id '.$objid,
            'wbfsys.entity_reference.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntityReference', $entityWbfsysEntityReference );
      $this->register( 'main_entity', $entityWbfsysEntityReference );
    }

    return $entityWbfsysEntityReference;

  }//end public function getEntityWbfsysEntityReference */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityReference_Entity $entity
  */
  public function setEntityWbfsysEntityReference( $entity )
  {

    $this->register( 'entityWbfsysEntityReference', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntityReference */

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

    $data['wbfsys_entity_reference']  = $this->getEntityWbfsysEntityReference();


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
    if( !Webfrap::classLoadable( 'WbfsysEntityReference_Entity' ) )
    {
      $response->addError
      (
        'tried so search for a nonexisting entity: wbfsys_entity_reference with the expected source wbfsys_entity_reference'
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

    if( !$fieldsWbfsysEntityReference = $this->getRegisterd( 'search_fields_wbfsys_entity_reference' ) )
    {
       $fieldsWbfsysEntityReference   = $orm->getSearchCols( 'WbfsysEntityReference' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_entity_reference' ) )
    {
      $fieldsWbfsysEntityReference = array_unique( array_merge
      (
        $fieldsWbfsysEntityReference,
        $refs
      ));
    }

    $filterWbfsysEntityReference     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysEntityReference', $fieldsWbfsysEntityReference ),
      $orm->getErrorMessages( 'WbfsysEntityReference'  ),
      'search_wbfsys_entity_reference'
    );
    $condition['wbfsys_entity_reference'] = $filterWbfsysEntityReference->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysEntity_Ref_References_Table' );
    /* @var $query WbfsysEntity_Ref_References_Table_Query  */

    // hard condition
    $query->setCondition( 'wbfsys_entity_reference.id_from = '.$idWbfsysEntity );

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

}//end class WbfsysEntity_Ref_References_Table_Model

