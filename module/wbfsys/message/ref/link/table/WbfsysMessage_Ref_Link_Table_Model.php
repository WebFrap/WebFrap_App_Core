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
class WbfsysMessage_Ref_Link_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysDataLink_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysDataLink( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysDataLink_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysDataLink(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysDataLink_Entity
  */
  public function getEntityWbfsysDataLink( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysDataLink = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysDataLink = $this->getRegisterd( 'entityWbfsysDataLink' );


    //entity wbfsys_data_link
    if( !$entityWbfsysDataLink )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysDataLink = $orm->get( 'WbfsysDataLink', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysdatalink with this id '.$objid,
              'wbfsys.data_link.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysDataLink', $entityWbfsysDataLink );
        $this->register( 'main_entity', $entityWbfsysDataLink );

      }
      else
      {
        $entityWbfsysDataLink   = new WbfsysDataLink_Entity() ;
        $this->register( 'entityWbfsysDataLink', $entityWbfsysDataLink );
        $this->register( 'main_entity', $entityWbfsysDataLink );
      }

    }
    elseif( $objid && $objid != $entityWbfsysDataLink->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysDataLink = $orm->get( 'WbfsysDataLink', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysdatalink with this id '.$objid,
            'wbfsys.data_link.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysDataLink', $entityWbfsysDataLink );
      $this->register( 'main_entity', $entityWbfsysDataLink );
    }

    return $entityWbfsysDataLink;

  }//end public function getEntityWbfsysDataLink */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysDataLink_Entity $entity
  */
  public function setEntityWbfsysDataLink( $entity )
  {

    $this->register( 'entityWbfsysDataLink', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysDataLink */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysDataIndex_Entity
  */
  public function getEntityWbfsysDataIndex( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysDataIndex = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysDataIndex = $this->getRegisterd( 'entityWbfsysDataIndex' );

    //entity wbfsys_data_index
    if( !$entityWbfsysDataIndex )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysDataIndex = $orm->get( 'WbfsysDataIndex', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysdataindex with this id '.$objid,
              'wbfsys.data_index.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysDataIndex', $entityWbfsysDataIndex );
        $this->register( 'main_entity', $entityWbfsysDataIndex );

      }
      else
      {
        $entityWbfsysDataIndex   = new WbfsysDataIndex_Entity() ;
        $this->register( 'entityWbfsysDataIndex', $entityWbfsysDataIndex );
        $this->register( 'main_entity', $entityWbfsysDataIndex );
      }

    }
    elseif( $objid && $objid != $entityWbfsysDataIndex->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysDataIndex = $orm->get( 'WbfsysDataIndex', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysdataindex with this id '.$objid,
            'wbfsys.data_index.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysDataIndex', $entityWbfsysDataIndex );
      $this->register( 'main_entity', $entityWbfsysDataIndex );
    }

    return $entityWbfsysDataIndex;

  }//end public function getEntityWbfsysDataIndex */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysDataIndex_Entity $entity
  */
  public function setEntityWbfsysDataIndex( $entity )
  {

    $this->register( 'entityWbfsysDataIndex', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysDataIndex */

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

    $data['wbfsys_data_link']  = $this->getEntityWbfsysDataLink();
    $data['wbfsys_data_index']  = $this->getEntityWbfsysDataIndex( $data['wbfsys_data_link']->id_link );


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
   * table to list all connected WbfsysMessage
   *
   * @param int $idWbfsysMessage the id for the reference entity
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysMessage, $access, $params  )
  {

    $response  = $this->getResponse();

    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysDataIndex_Entity' ) )
    {
      Error::addError
      (
        'tried so search for a nonexisting entity: wbfsys_data_index with the expected source wbfsys_data_index'
      );
      return array();
    }

    $db          = $this->getDb();
    $orm         = $db->getOrm();
    $httpRequest = $this->getRequest();
    $user        = $this->getUser();
    $view        = $this->getView();
    
		$extendedConditions = array();

    $condition = array();




    if( $free = $httpRequest->param( 'free_search' , Validator::TEXT ) )
      $condition['free'] = $free;

    if( !$fieldsWbfsysDataLink = $this->getRegisterd( 'search_fields_wbfsys_data_link' ) )
    {
       $fieldsWbfsysDataLink   = $orm->getSearchCols( 'WbfsysDataLink' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_data_link' ) )
    {
      $fieldsWbfsysDataLink = array_unique( array_merge
      (
        $fieldsWbfsysDataLink,
        $refs
      ));
    }

    $filterWbfsysDataLink     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysDataLink', $fieldsWbfsysDataLink ),
      $orm->getErrorMessages( 'WbfsysDataLink'  ),
      'search_wbfsys_data_link'
    );
    $condition['wbfsys_data_link'] = $filterWbfsysDataLink->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysMessage_Ref_Link_Table' );
    /* @var $query WbfsysMessage_Ref_Link_Table_Query  */
    $query->extendedConditions = $extendedConditions;

    // hard condition
    $query->setCondition( 'wbfsys_data_link.id_message = '.$idWbfsysMessage );
    
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

}//end class WbfsysMessage_Ref_Link_Table_Model

