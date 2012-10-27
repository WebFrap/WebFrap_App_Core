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
class WbfsysProfile_Ref_Quicklinks_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysProfileQuicklink_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysProfileQuicklink( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysProfileQuicklink_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysProfileQuicklink(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysProfileQuicklink_Entity
  */
  public function getEntityWbfsysProfileQuicklink( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysProfileQuicklink = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysProfileQuicklink = $this->getRegisterd( 'entityWbfsysProfileQuicklink' );

    //entity wbfsys_profile_quicklink
    if( !$entityWbfsysProfileQuicklink )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysProfileQuicklink = $orm->get( 'WbfsysProfileQuicklink', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysprofilequicklink with this id '.$objid,
              'wbfsys.profile_quicklink.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysProfileQuicklink', $entityWbfsysProfileQuicklink );
        $this->register( 'main_entity', $entityWbfsysProfileQuicklink );

      }
      else
      {
        $entityWbfsysProfileQuicklink   = new WbfsysProfileQuicklink_Entity() ;
        $this->register( 'entityWbfsysProfileQuicklink', $entityWbfsysProfileQuicklink );
        $this->register( 'main_entity', $entityWbfsysProfileQuicklink );
      }

    }
    elseif( $objid && $objid != $entityWbfsysProfileQuicklink->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysProfileQuicklink = $orm->get( 'WbfsysProfileQuicklink', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysprofilequicklink with this id '.$objid,
            'wbfsys.profile_quicklink.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysProfileQuicklink', $entityWbfsysProfileQuicklink );
      $this->register( 'main_entity', $entityWbfsysProfileQuicklink );
    }

    return $entityWbfsysProfileQuicklink;

  }//end public function getEntityWbfsysProfileQuicklink */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysProfileQuicklink_Entity $entity
  */
  public function setEntityWbfsysProfileQuicklink( $entity )
  {

    $this->register( 'entityWbfsysProfileQuicklink', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysProfileQuicklink */

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

    $data['wbfsys_profile_quicklink']  = $this->getEntityWbfsysProfileQuicklink();


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
   * table to list all connected WbfsysProfile
   *
   * @param int $idWbfsysProfile the id for the reference entity
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysProfile, $access, $params  )
  { 
  
    $response  = $this->getResponse();
    
    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysProfileQuicklink_Entity' ) )
    {
      $response->addError
      (
        'tried so search for a nonexisting entity: wbfsys_profile_quicklink with the expected source wbfsys_profile_quicklink'
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

    if( !$fieldsWbfsysProfileQuicklink = $this->getRegisterd( 'search_fields_wbfsys_profile_quicklink' ) )
    {
       $fieldsWbfsysProfileQuicklink   = $orm->getSearchCols( 'WbfsysProfileQuicklink' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_profile_quicklink' ) )
    {
      $fieldsWbfsysProfileQuicklink = array_unique( array_merge
      (
        $fieldsWbfsysProfileQuicklink,
        $refs
      ));
    }

    $filterWbfsysProfileQuicklink     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysProfileQuicklink', $fieldsWbfsysProfileQuicklink ),
      $orm->getErrorMessages( 'WbfsysProfileQuicklink'  ),
      'search_wbfsys_profile_quicklink'
    );
    $condition['wbfsys_profile_quicklink'] = $filterWbfsysProfileQuicklink->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysProfile_Ref_Quicklinks_Table' );
    /* @var $query WbfsysProfile_Ref_Quicklinks_Table_Query  */

    // hard condition
    $query->setCondition( 'wbfsys_profile_quicklink.id_profile = '.$idWbfsysProfile );

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

}//end class WbfsysProfile_Ref_Quicklinks_Table_Model

