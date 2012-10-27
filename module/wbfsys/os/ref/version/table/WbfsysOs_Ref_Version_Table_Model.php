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
class WbfsysOs_Ref_Version_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysOsVersion_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysOsVersion( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysOsVersion_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysOsVersion(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysOsVersion_Entity
  */
  public function getEntityWbfsysOsVersion( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysOsVersion = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysOsVersion = $this->getRegisterd( 'entityWbfsysOsVersion' );

    //entity wbfsys_os_version
    if( !$entityWbfsysOsVersion )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysOsVersion = $orm->get( 'WbfsysOsVersion', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysosversion with this id '.$objid,
              'wbfsys.os_version.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysOsVersion', $entityWbfsysOsVersion );
        $this->register( 'main_entity', $entityWbfsysOsVersion );

      }
      else
      {
        $entityWbfsysOsVersion   = new WbfsysOsVersion_Entity() ;
        $this->register( 'entityWbfsysOsVersion', $entityWbfsysOsVersion );
        $this->register( 'main_entity', $entityWbfsysOsVersion );
      }

    }
    elseif( $objid && $objid != $entityWbfsysOsVersion->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysOsVersion = $orm->get( 'WbfsysOsVersion', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysosversion with this id '.$objid,
            'wbfsys.os_version.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysOsVersion', $entityWbfsysOsVersion );
      $this->register( 'main_entity', $entityWbfsysOsVersion );
    }

    return $entityWbfsysOsVersion;

  }//end public function getEntityWbfsysOsVersion */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysOsVersion_Entity $entity
  */
  public function setEntityWbfsysOsVersion( $entity )
  {

    $this->register( 'entityWbfsysOsVersion', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysOsVersion */

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

    $data['wbfsys_os_version']  = $this->getEntityWbfsysOsVersion();


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
   * table to list all connected WbfsysOs
   *
   * @param int $idWbfsysOs the id for the reference entity
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysOs, $access, $params  )
  { 
  
    $response  = $this->getResponse();
    
    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysOsVersion_Entity' ) )
    {
      $response->addError
      (
        'tried so search for a nonexisting entity: wbfsys_os_version with the expected source wbfsys_os_version'
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

    if( !$fieldsWbfsysOsVersion = $this->getRegisterd( 'search_fields_wbfsys_os_version' ) )
    {
       $fieldsWbfsysOsVersion   = $orm->getSearchCols( 'WbfsysOsVersion' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_os_version' ) )
    {
      $fieldsWbfsysOsVersion = array_unique( array_merge
      (
        $fieldsWbfsysOsVersion,
        $refs
      ));
    }

    $filterWbfsysOsVersion     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysOsVersion', $fieldsWbfsysOsVersion ),
      $orm->getErrorMessages( 'WbfsysOsVersion'  ),
      'search_wbfsys_os_version'
    );
    $condition['wbfsys_os_version'] = $filterWbfsysOsVersion->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysOs_Ref_Version_Table' );
    /* @var $query WbfsysOs_Ref_Version_Table_Query  */

    // hard condition
    $query->setCondition( 'wbfsys_os_version.id_os = '.$idWbfsysOs );

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

}//end class WbfsysOs_Ref_Version_Table_Model

