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
class WbfsysManagement_Ref_Mask_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMask_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysMask( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMask_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysMask(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMask_Entity
  */
  public function getEntityWbfsysMask( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysMask = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysMask = $this->getRegisterd( 'entityWbfsysMask' );

    //entity wbfsys_mask
    if( !$entityWbfsysMask )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysMask = $orm->get( 'WbfsysMask', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmask with this id '.$objid,
              'wbfsys.mask.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysMask', $entityWbfsysMask );
        $this->register( 'main_entity', $entityWbfsysMask );

      }
      else
      {
        $entityWbfsysMask   = new WbfsysMask_Entity() ;
        $this->register( 'entityWbfsysMask', $entityWbfsysMask );
        $this->register( 'main_entity', $entityWbfsysMask );
      }

    }
    elseif( $objid && $objid != $entityWbfsysMask->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysMask = $orm->get( 'WbfsysMask', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmask with this id '.$objid,
            'wbfsys.mask.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysMask', $entityWbfsysMask );
      $this->register( 'main_entity', $entityWbfsysMask );
    }

    return $entityWbfsysMask;

  }//end public function getEntityWbfsysMask */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMask_Entity $entity
  */
  public function setEntityWbfsysMask( $entity )
  {

    $this->register( 'entityWbfsysMask', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysMask */

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
      'wbfsys_mask' => array
      (
        'name',
        'access_key',
        'access_url',
        'dset_mask',
        'context',
        'id_module',
        'id_management',
        'description',
        'revision',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysManagement_Ref_Mask_Crud_Model

