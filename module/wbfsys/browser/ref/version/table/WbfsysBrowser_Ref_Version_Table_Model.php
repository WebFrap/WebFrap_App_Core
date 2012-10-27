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
class WbfsysBrowser_Ref_Version_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysBrowserVersion_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysBrowserVersion( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysBrowserVersion_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysBrowserVersion(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysBrowserVersion_Entity
  */
  public function getEntityWbfsysBrowserVersion( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysBrowserVersion = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysBrowserVersion = $this->getRegisterd( 'entityWbfsysBrowserVersion' );

    //entity wbfsys_browser_version
    if( !$entityWbfsysBrowserVersion )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysBrowserVersion = $orm->get( 'WbfsysBrowserVersion', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysbrowserversion with this id '.$objid,
              'wbfsys.browser_version.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysBrowserVersion', $entityWbfsysBrowserVersion );
        $this->register( 'main_entity', $entityWbfsysBrowserVersion );

      }
      else
      {
        $entityWbfsysBrowserVersion   = new WbfsysBrowserVersion_Entity() ;
        $this->register( 'entityWbfsysBrowserVersion', $entityWbfsysBrowserVersion );
        $this->register( 'main_entity', $entityWbfsysBrowserVersion );
      }

    }
    elseif( $objid && $objid != $entityWbfsysBrowserVersion->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysBrowserVersion = $orm->get( 'WbfsysBrowserVersion', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysbrowserversion with this id '.$objid,
            'wbfsys.browser_version.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysBrowserVersion', $entityWbfsysBrowserVersion );
      $this->register( 'main_entity', $entityWbfsysBrowserVersion );
    }

    return $entityWbfsysBrowserVersion;

  }//end public function getEntityWbfsysBrowserVersion */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysBrowserVersion_Entity $entity
  */
  public function setEntityWbfsysBrowserVersion( $entity )
  {

    $this->register( 'entityWbfsysBrowserVersion', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysBrowserVersion */

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

    $data['wbfsys_browser_version']  = $this->getEntityWbfsysBrowserVersion();


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
   * table to list all connected WbfsysBrowser
   *
   * @param int $idWbfsysBrowser the id for the reference entity
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysBrowser, $access, $params  )
  { 
  
    $response  = $this->getResponse();
    
    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysBrowserVersion_Entity' ) )
    {
      $response->addError
      (
        'tried so search for a nonexisting entity: wbfsys_browser_version with the expected source wbfsys_browser_version'
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

    if( !$fieldsWbfsysBrowserVersion = $this->getRegisterd( 'search_fields_wbfsys_browser_version' ) )
    {
       $fieldsWbfsysBrowserVersion   = $orm->getSearchCols( 'WbfsysBrowserVersion' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_browser_version' ) )
    {
      $fieldsWbfsysBrowserVersion = array_unique( array_merge
      (
        $fieldsWbfsysBrowserVersion,
        $refs
      ));
    }

    $filterWbfsysBrowserVersion     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysBrowserVersion', $fieldsWbfsysBrowserVersion ),
      $orm->getErrorMessages( 'WbfsysBrowserVersion'  ),
      'search_wbfsys_browser_version'
    );
    $condition['wbfsys_browser_version'] = $filterWbfsysBrowserVersion->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysBrowser_Ref_Version_Table' );
    /* @var $query WbfsysBrowser_Ref_Version_Table_Query  */

    // hard condition
    $query->setCondition( 'wbfsys_browser_version.id_browser = '.$idWbfsysBrowser );

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

}//end class WbfsysBrowser_Ref_Version_Table_Model

