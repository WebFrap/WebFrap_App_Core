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
class WbfsysProcess_Ref_Nodes_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysProcessNode_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysProcessNode( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysProcessNode_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysProcessNode(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysProcessNode_Entity
  */
  public function getEntityWbfsysProcessNode( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysProcessNode = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysProcessNode = $this->getRegisterd( 'entityWbfsysProcessNode' );

    //entity wbfsys_process_node
    if( !$entityWbfsysProcessNode )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysProcessNode = $orm->get( 'WbfsysProcessNode', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysprocessnode with this id '.$objid,
              'wbfsys.process_node.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysProcessNode', $entityWbfsysProcessNode );
        $this->register( 'main_entity', $entityWbfsysProcessNode );

      }
      else
      {
        $entityWbfsysProcessNode   = new WbfsysProcessNode_Entity() ;
        $this->register( 'entityWbfsysProcessNode', $entityWbfsysProcessNode );
        $this->register( 'main_entity', $entityWbfsysProcessNode );
      }

    }
    elseif( $objid && $objid != $entityWbfsysProcessNode->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysProcessNode = $orm->get( 'WbfsysProcessNode', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysprocessnode with this id '.$objid,
            'wbfsys.process_node.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysProcessNode', $entityWbfsysProcessNode );
      $this->register( 'main_entity', $entityWbfsysProcessNode );
    }

    return $entityWbfsysProcessNode;

  }//end public function getEntityWbfsysProcessNode */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysProcessNode_Entity $entity
  */
  public function setEntityWbfsysProcessNode( $entity )
  {

    $this->register( 'entityWbfsysProcessNode', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysProcessNode */

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

    $data['wbfsys_process_node']  = $this->getEntityWbfsysProcessNode();


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
   * table to list all connected WbfsysProcess
   *
   * @param int $idWbfsysProcess the id for the reference entity
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysProcess, $access, $params  )
  { 
  
    $response  = $this->getResponse();
    
    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysProcessNode_Entity' ) )
    {
      $response->addError
      (
        'tried so search for a nonexisting entity: wbfsys_process_node with the expected source wbfsys_process_node'
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

    if( !$fieldsWbfsysProcessNode = $this->getRegisterd( 'search_fields_wbfsys_process_node' ) )
    {
       $fieldsWbfsysProcessNode   = $orm->getSearchCols( 'WbfsysProcessNode' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_process_node' ) )
    {
      $fieldsWbfsysProcessNode = array_unique( array_merge
      (
        $fieldsWbfsysProcessNode,
        $refs
      ));
    }

    $filterWbfsysProcessNode     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysProcessNode', $fieldsWbfsysProcessNode ),
      $orm->getErrorMessages( 'WbfsysProcessNode'  ),
      'search_wbfsys_process_node'
    );
    $condition['wbfsys_process_node'] = $filterWbfsysProcessNode->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysProcess_Ref_Nodes_Table' );
    /* @var $query WbfsysProcess_Ref_Nodes_Table_Query  */

    // hard condition
    $query->setCondition( 'wbfsys_process_node.id_process = '.$idWbfsysProcess );

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

}//end class WbfsysProcess_Ref_Nodes_Table_Model

