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
class WbfsysDomain_Ref_Subdomain_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return HostingSubdomain_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityHostingSubdomain( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param HostingSubdomain_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityHostingSubdomain(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return HostingSubdomain_Entity
  */
  public function getEntityHostingSubdomain( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityHostingSubdomain = $this->getRegisterd( 'main_entity' ) )
      $entityHostingSubdomain = $this->getRegisterd( 'entityHostingSubdomain' );

    //entity hosting_subdomain
    if( !$entityHostingSubdomain )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityHostingSubdomain = $orm->get( 'HostingSubdomain', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no hostingsubdomain with this id '.$objid,
              'hosting.subdomain.message'
            )
          );
          return null;
        }

        $this->register( 'entityHostingSubdomain', $entityHostingSubdomain );
        $this->register( 'main_entity', $entityHostingSubdomain );

      }
      else
      {
        $entityHostingSubdomain   = new HostingSubdomain_Entity() ;
        $this->register( 'entityHostingSubdomain', $entityHostingSubdomain );
        $this->register( 'main_entity', $entityHostingSubdomain );
      }

    }
    elseif( $objid && $objid != $entityHostingSubdomain->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityHostingSubdomain = $orm->get( 'HostingSubdomain', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no hostingsubdomain with this id '.$objid,
            'hosting.subdomain.message'
          )
        );
        return null;
      }

      $this->register( 'entityHostingSubdomain', $entityHostingSubdomain );
      $this->register( 'main_entity', $entityHostingSubdomain );
    }

    return $entityHostingSubdomain;

  }//end public function getEntityHostingSubdomain */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param HostingSubdomain_Entity $entity
  */
  public function setEntityHostingSubdomain( $entity )
  {

    $this->register( 'entityHostingSubdomain', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityHostingSubdomain */

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

    $data['hosting_subdomain']  = $this->getEntityHostingSubdomain();


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
   * table to list all connected WbfsysDomain
   *
   * @param int $idWbfsysDomain the id for the reference entity
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysDomain, $access, $params  )
  { 
  
    $response  = $this->getResponse();
    
    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'HostingSubdomain_Entity' ) )
    {
      $response->addError
      (
        'tried so search for a nonexisting entity: hosting_subdomain with the expected source hosting_subdomain'
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

    if( !$fieldsHostingSubdomain = $this->getRegisterd( 'search_fields_hosting_subdomain' ) )
    {
       $fieldsHostingSubdomain   = $orm->getSearchCols( 'HostingSubdomain' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_hosting_subdomain' ) )
    {
      $fieldsHostingSubdomain = array_unique( array_merge
      (
        $fieldsHostingSubdomain,
        $refs
      ));
    }

    $filterHostingSubdomain     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'HostingSubdomain', $fieldsHostingSubdomain ),
      $orm->getErrorMessages( 'HostingSubdomain'  ),
      'search_hosting_subdomain'
    );
    $condition['hosting_subdomain'] = $filterHostingSubdomain->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysDomain_Ref_Subdomain_Table' );
    /* @var $query WbfsysDomain_Ref_Subdomain_Table_Query  */

    // hard condition
    $query->setCondition( 'hosting_subdomain.id_domain = '.$idWbfsysDomain );

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

}//end class WbfsysDomain_Ref_Subdomain_Table_Model

