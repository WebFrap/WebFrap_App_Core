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
class WbfsysApp_Ref_Desktops_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysDesktop_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysDesktop( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysDesktop_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysDesktop(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysDesktop_Entity
  */
  public function getEntityWbfsysDesktop( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysDesktop = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysDesktop = $this->getRegisterd( 'entityWbfsysDesktop' );

    //entity wbfsys_desktop
    if( !$entityWbfsysDesktop )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysDesktop = $orm->get( 'WbfsysDesktop', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysdesktop with this id '.$objid,
              'wbfsys.desktop.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysDesktop', $entityWbfsysDesktop );
        $this->register( 'main_entity', $entityWbfsysDesktop );

      }
      else
      {
        $entityWbfsysDesktop   = new WbfsysDesktop_Entity() ;
        $this->register( 'entityWbfsysDesktop', $entityWbfsysDesktop );
        $this->register( 'main_entity', $entityWbfsysDesktop );
      }

    }
    elseif( $objid && $objid != $entityWbfsysDesktop->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysDesktop = $orm->get( 'WbfsysDesktop', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysdesktop with this id '.$objid,
            'wbfsys.desktop.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysDesktop', $entityWbfsysDesktop );
      $this->register( 'main_entity', $entityWbfsysDesktop );
    }

    return $entityWbfsysDesktop;

  }//end public function getEntityWbfsysDesktop */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysDesktop_Entity $entity
  */
  public function setEntityWbfsysDesktop( $entity )
  {

    $this->register( 'entityWbfsysDesktop', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysDesktop */

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

    $data['wbfsys_desktop']  = $this->getEntityWbfsysDesktop();


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
   * table to list all connected WbfsysApp
   *
   * @param int $idWbfsysApp the id for the reference entity
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysApp, $access, $params  )
  { 
  
    $response  = $this->getResponse();
    
    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysDesktop_Entity' ) )
    {
      $response->addError
      (
        'tried so search for a nonexisting entity: wbfsys_desktop with the expected source wbfsys_desktop'
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

    if( !$fieldsWbfsysDesktop = $this->getRegisterd( 'search_fields_wbfsys_desktop' ) )
    {
       $fieldsWbfsysDesktop   = $orm->getSearchCols( 'WbfsysDesktop' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_desktop' ) )
    {
      $fieldsWbfsysDesktop = array_unique( array_merge
      (
        $fieldsWbfsysDesktop,
        $refs
      ));
    }

    $filterWbfsysDesktop     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysDesktop', $fieldsWbfsysDesktop ),
      $orm->getErrorMessages( 'WbfsysDesktop'  ),
      'search_wbfsys_desktop'
    );
    $condition['wbfsys_desktop'] = $filterWbfsysDesktop->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysApp_Ref_Desktops_Table' );
    /* @var $query WbfsysApp_Ref_Desktops_Table_Query  */

    // hard condition
    $query->setCondition( 'wbfsys_desktop.id_app = '.$idWbfsysApp );

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

}//end class WbfsysApp_Ref_Desktops_Table_Model

