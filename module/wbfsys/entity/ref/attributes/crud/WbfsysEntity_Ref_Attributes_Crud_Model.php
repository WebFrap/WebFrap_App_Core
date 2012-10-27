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
class WbfsysEntity_Ref_Attributes_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityAttribute_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityAttribute( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityAttribute_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityAttribute(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityAttribute_Entity
  */
  public function getEntityWbfsysEntityAttribute( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysEntityAttribute = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntityAttribute = $this->getRegisterd( 'entityWbfsysEntityAttribute' );

    //entity wbfsys_entity_attribute
    if( !$entityWbfsysEntityAttribute )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntityAttribute = $orm->get( 'WbfsysEntityAttribute', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentityattribute with this id '.$objid,
              'wbfsys.entity_attribute.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntityAttribute', $entityWbfsysEntityAttribute );
        $this->register( 'main_entity', $entityWbfsysEntityAttribute );

      }
      else
      {
        $entityWbfsysEntityAttribute   = new WbfsysEntityAttribute_Entity() ;
        $this->register( 'entityWbfsysEntityAttribute', $entityWbfsysEntityAttribute );
        $this->register( 'main_entity', $entityWbfsysEntityAttribute );
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntityAttribute->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntityAttribute = $orm->get( 'WbfsysEntityAttribute', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentityattribute with this id '.$objid,
            'wbfsys.entity_attribute.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntityAttribute', $entityWbfsysEntityAttribute );
      $this->register( 'main_entity', $entityWbfsysEntityAttribute );
    }

    return $entityWbfsysEntityAttribute;

  }//end public function getEntityWbfsysEntityAttribute */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityAttribute_Entity $entity
  */
  public function setEntityWbfsysEntityAttribute( $entity )
  {

    $this->register( 'entityWbfsysEntityAttribute', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntityAttribute */

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
      'wbfsys_entity_attribute' => array
      (
        'name',
        'access_key',
        'id_entity',
        'id_category',
        'id_type',
        'description',
        'revision',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysEntity_Ref_Attributes_Crud_Model

