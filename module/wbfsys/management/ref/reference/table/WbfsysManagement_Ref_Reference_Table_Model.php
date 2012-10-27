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
class WbfsysManagement_Ref_Reference_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysManagementReference_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysManagementReference( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysManagementReference_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysManagementReference(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysManagementReference_Entity
  */
  public function getEntityWbfsysManagementReference( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysManagementReference = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysManagementReference = $this->getRegisterd( 'entityWbfsysManagementReference' );

    //entity wbfsys_management_reference
    if( !$entityWbfsysManagementReference )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysManagementReference = $orm->get( 'WbfsysManagementReference', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmanagementreference with this id '.$objid,
              'wbfsys.management_reference.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysManagementReference', $entityWbfsysManagementReference );
        $this->register( 'main_entity', $entityWbfsysManagementReference );

      }
      else
      {
        $entityWbfsysManagementReference   = new WbfsysManagementReference_Entity() ;
        $this->register( 'entityWbfsysManagementReference', $entityWbfsysManagementReference );
        $this->register( 'main_entity', $entityWbfsysManagementReference );
      }

    }
    elseif( $objid && $objid != $entityWbfsysManagementReference->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysManagementReference = $orm->get( 'WbfsysManagementReference', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmanagementreference with this id '.$objid,
            'wbfsys.management_reference.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysManagementReference', $entityWbfsysManagementReference );
      $this->register( 'main_entity', $entityWbfsysManagementReference );
    }

    return $entityWbfsysManagementReference;

  }//end public function getEntityWbfsysManagementReference */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysManagementReference_Entity $entity
  */
  public function setEntityWbfsysManagementReference( $entity )
  {

    $this->register( 'entityWbfsysManagementReference', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysManagementReference */

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

    $data['wbfsys_management_reference']  = $this->getEntityWbfsysManagementReference();


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
    if( !Webfrap::classLoadable( 'WbfsysManagementReference_Entity' ) )
    {
      $response->addError
      (
        'tried so search for a nonexisting entity: wbfsys_management_reference with the expected source wbfsys_management_reference'
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

    if( !$fieldsWbfsysManagementReference = $this->getRegisterd( 'search_fields_wbfsys_management_reference' ) )
    {
       $fieldsWbfsysManagementReference   = $orm->getSearchCols( 'WbfsysManagementReference' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_management_reference' ) )
    {
      $fieldsWbfsysManagementReference = array_unique( array_merge
      (
        $fieldsWbfsysManagementReference,
        $refs
      ));
    }

    $filterWbfsysManagementReference     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysManagementReference', $fieldsWbfsysManagementReference ),
      $orm->getErrorMessages( 'WbfsysManagementReference'  ),
      'search_wbfsys_management_reference'
    );
    $condition['wbfsys_management_reference'] = $filterWbfsysManagementReference->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysManagement_Ref_Reference_Table' );
    /* @var $query WbfsysManagement_Ref_Reference_Table_Query  */

    // hard condition
    $query->setCondition( 'wbfsys_management_reference.id_from = '.$idWbfsysManagement );

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

}//end class WbfsysManagement_Ref_Reference_Table_Model

