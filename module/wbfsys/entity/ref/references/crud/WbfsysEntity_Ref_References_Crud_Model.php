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
class WbfsysEntity_Ref_References_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityReference_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityReference( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityReference_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityReference(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityReference_Entity
  */
  public function getEntityWbfsysEntityReference( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysEntityReference = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntityReference = $this->getRegisterd( 'entityWbfsysEntityReference' );

    //entity wbfsys_entity_reference
    if( !$entityWbfsysEntityReference )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntityReference = $orm->get( 'WbfsysEntityReference', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentityreference with this id '.$objid,
              'wbfsys.entity_reference.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntityReference', $entityWbfsysEntityReference );
        $this->register( 'main_entity', $entityWbfsysEntityReference );

      }
      else
      {
        $entityWbfsysEntityReference   = new WbfsysEntityReference_Entity() ;
        $this->register( 'entityWbfsysEntityReference', $entityWbfsysEntityReference );
        $this->register( 'main_entity', $entityWbfsysEntityReference );
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntityReference->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntityReference = $orm->get( 'WbfsysEntityReference', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentityreference with this id '.$objid,
            'wbfsys.entity_reference.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntityReference', $entityWbfsysEntityReference );
      $this->register( 'main_entity', $entityWbfsysEntityReference );
    }

    return $entityWbfsysEntityReference;

  }//end public function getEntityWbfsysEntityReference */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityReference_Entity $entity
  */
  public function setEntityWbfsysEntityReference( $entity )
  {

    $this->register( 'entityWbfsysEntityReference', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntityReference */

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
      'wbfsys_entity_reference' => array
      (
        'access_key',
        'id_from',
        'id_field_from',
        'id_to',
        'id_field_to',
        'description',
        'revision',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysEntity_Ref_References_Crud_Model

