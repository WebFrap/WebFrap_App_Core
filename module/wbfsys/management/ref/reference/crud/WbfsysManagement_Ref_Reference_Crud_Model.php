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
class WbfsysManagement_Ref_Reference_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysManagementReference_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysManagementReference( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysManagementReference_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysManagementReference(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysManagementReference_Entity
  */
  public function getEntityWbfsysManagementReference( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysManagementReference = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysManagementReference = $this->getRegisterd( 'entityWbfsysManagementReference' );

    //entity wbfsys_management_reference
    if( !$entityWbfsysManagementReference )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysManagementReference = $orm->get( 'WbfsysManagementReference', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmanagementreference with this id '.$objid,
              'wbfsys.management_reference.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysManagementReference', $entityWbfsysManagementReference );
        $this->register( 'main_entity', $entityWbfsysManagementReference );

      }
      else
      {
        $entityWbfsysManagementReference   = new WbfsysManagementReference_Entity() ;
        $this->register( 'entityWbfsysManagementReference', $entityWbfsysManagementReference );
        $this->register( 'main_entity', $entityWbfsysManagementReference );
      }

    }
    elseif( $objid && $objid != $entityWbfsysManagementReference->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysManagementReference = $orm->get( 'WbfsysManagementReference', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmanagementreference with this id '.$objid,
            'wbfsys.management_reference.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysManagementReference', $entityWbfsysManagementReference );
      $this->register( 'main_entity', $entityWbfsysManagementReference );
    }

    return $entityWbfsysManagementReference;

  }//end public function getEntityWbfsysManagementReference */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysManagementReference_Entity $entity
  */
  public function setEntityWbfsysManagementReference( $entity )
  {

    $this->register( 'entityWbfsysManagementReference', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysManagementReference */

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
      'wbfsys_management_reference' => array
      (
        'access_key',
        'id_from',
        'id_to',
        'id_reference',
        'description',
        'revision',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysManagement_Ref_Reference_Crud_Model

