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
class WbfsysProcess_Ref_Nodes_Crud_Model
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

////////////////////////////////////////////////////////////////////////////////
// get fields
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * just fetch the post data without any required validation
   * @return array
   */
  public function getCreateFields()
  {

    return array
    (
      'wbfsys_process_node' => array
      (
        'label',
        'access_key',
        'phase_key',
        'is_start_node',
        'is_end_node',
        'id_process',
        'id_phase',
        'description',
        'bg_color',
        'text_color',
        'border_color',
        'icon',
        'revision',
        'm_order',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysProcess_Ref_Nodes_Crud_Model

