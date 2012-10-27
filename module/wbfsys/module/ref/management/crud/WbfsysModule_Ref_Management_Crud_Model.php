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
class WbfsysModule_Ref_Management_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysManagement_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysManagement( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysManagement_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysManagement(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysManagement_Entity
  */
  public function getEntityWbfsysManagement( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysManagement = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysManagement = $this->getRegisterd( 'entityWbfsysManagement' );

    //entity wbfsys_management
    if( !$entityWbfsysManagement )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysManagement = $orm->get( 'WbfsysManagement', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmanagement with this id '.$objid,
              'wbfsys.management.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysManagement', $entityWbfsysManagement );
        $this->register( 'main_entity', $entityWbfsysManagement );

      }
      else
      {
        $entityWbfsysManagement   = new WbfsysManagement_Entity() ;
        $this->register( 'entityWbfsysManagement', $entityWbfsysManagement );
        $this->register( 'main_entity', $entityWbfsysManagement );
      }

    }
    elseif( $objid && $objid != $entityWbfsysManagement->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysManagement = $orm->get( 'WbfsysManagement', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmanagement with this id '.$objid,
            'wbfsys.management.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysManagement', $entityWbfsysManagement );
      $this->register( 'main_entity', $entityWbfsysManagement );
    }

    return $entityWbfsysManagement;

  }//end public function getEntityWbfsysManagement */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysManagement_Entity $entity
  */
  public function setEntityWbfsysManagement( $entity )
  {

    $this->register( 'entityWbfsysManagement', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysManagement */

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
      'wbfsys_management' => array
      (
        'name',
        'access_key',
        'id_entity',
        'id_module',
        'id_security_area',
        'revision',
        'description',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysModule_Ref_Management_Crud_Model

