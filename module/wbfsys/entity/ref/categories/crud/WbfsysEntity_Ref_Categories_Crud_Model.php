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
class WbfsysEntity_Ref_Categories_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityCategory_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityCategory( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityCategory_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityCategory(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityCategory_Entity
  */
  public function getEntityWbfsysEntityCategory( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysEntityCategory = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntityCategory = $this->getRegisterd( 'entityWbfsysEntityCategory' );

    //entity wbfsys_entity_category
    if( !$entityWbfsysEntityCategory )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntityCategory = $orm->get( 'WbfsysEntityCategory', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentitycategory with this id '.$objid,
              'wbfsys.entity_category.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntityCategory', $entityWbfsysEntityCategory );
        $this->register( 'main_entity', $entityWbfsysEntityCategory );

      }
      else
      {
        $entityWbfsysEntityCategory   = new WbfsysEntityCategory_Entity() ;
        $this->register( 'entityWbfsysEntityCategory', $entityWbfsysEntityCategory );
        $this->register( 'main_entity', $entityWbfsysEntityCategory );
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntityCategory->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntityCategory = $orm->get( 'WbfsysEntityCategory', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentitycategory with this id '.$objid,
            'wbfsys.entity_category.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntityCategory', $entityWbfsysEntityCategory );
      $this->register( 'main_entity', $entityWbfsysEntityCategory );
    }

    return $entityWbfsysEntityCategory;

  }//end public function getEntityWbfsysEntityCategory */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityCategory_Entity $entity
  */
  public function setEntityWbfsysEntityCategory( $entity )
  {

    $this->register( 'entityWbfsysEntityCategory', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntityCategory */

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
      'wbfsys_entity_category' => array
      (
        'name',
        'access_key',
        'id_entity',
        'description',
        'revision',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysEntity_Ref_Categories_Crud_Model

