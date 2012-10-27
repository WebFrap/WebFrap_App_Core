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
class WbfsysDesktop_Ref_MainTree_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMenuEntry_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysMenuEntry( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMenuEntry_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysMenuEntry(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMenuEntry_Entity
  */
  public function getEntityWbfsysMenuEntry( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysMenuEntry = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysMenuEntry = $this->getRegisterd( 'entityWbfsysMenuEntry' );

    //entity wbfsys_menu_entry
    if( !$entityWbfsysMenuEntry )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysMenuEntry = $orm->get( 'WbfsysMenuEntry', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmenuentry with this id '.$objid,
              'wbfsys.menu_entry.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysMenuEntry', $entityWbfsysMenuEntry );
        $this->register( 'main_entity', $entityWbfsysMenuEntry );

      }
      else
      {
        $entityWbfsysMenuEntry   = new WbfsysMenuEntry_Entity() ;
        $this->register( 'entityWbfsysMenuEntry', $entityWbfsysMenuEntry );
        $this->register( 'main_entity', $entityWbfsysMenuEntry );
      }

    }
    elseif( $objid && $objid != $entityWbfsysMenuEntry->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysMenuEntry = $orm->get( 'WbfsysMenuEntry', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmenuentry with this id '.$objid,
            'wbfsys.menu_entry.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysMenuEntry', $entityWbfsysMenuEntry );
      $this->register( 'main_entity', $entityWbfsysMenuEntry );
    }

    return $entityWbfsysMenuEntry;

  }//end public function getEntityWbfsysMenuEntry */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMenuEntry_Entity $entity
  */
  public function setEntityWbfsysMenuEntry( $entity )
  {

    $this->register( 'entityWbfsysMenuEntry', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysMenuEntry */

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

    $data['wbfsys_menu_entry']  = $this->getEntityWbfsysMenuEntry();


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
   * table to list all connected WbfsysDesktop
   *
   * @param int $idWbfsysDesktop the id for the reference entity
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysDesktop, $access, $params  )
  { 
  
    $response  = $this->getResponse();
    
    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysMenuEntry_Entity' ) )
    {
      $response->addError
      (
        'tried so search for a nonexisting entity: wbfsys_menu_entry with the expected source wbfsys_menu_entry'
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

    if( !$fieldsWbfsysMenuEntry = $this->getRegisterd( 'search_fields_wbfsys_menu_entry' ) )
    {
       $fieldsWbfsysMenuEntry   = $orm->getSearchCols( 'WbfsysMenuEntry' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_menu_entry' ) )
    {
      $fieldsWbfsysMenuEntry = array_unique( array_merge
      (
        $fieldsWbfsysMenuEntry,
        $refs
      ));
    }

    $filterWbfsysMenuEntry     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysMenuEntry', $fieldsWbfsysMenuEntry ),
      $orm->getErrorMessages( 'WbfsysMenuEntry'  ),
      'search_wbfsys_menu_entry'
    );
    $condition['wbfsys_menu_entry'] = $filterWbfsysMenuEntry->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysDesktop_Ref_MainTree_Table' );
    /* @var $query WbfsysDesktop_Ref_MainTree_Table_Query  */

    // hard condition
    $query->setCondition( 'wbfsys_menu_entry.id_menu = '.$idWbfsysDesktop );

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

}//end class WbfsysDesktop_Ref_MainTree_Table_Model

