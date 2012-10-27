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
class WbfsysModule_Ref_Entity_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntity_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntity( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntity_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntity(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntity_Entity
  */
  public function getEntityWbfsysEntity( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysEntity = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntity = $this->getRegisterd( 'entityWbfsysEntity' );

    //entity wbfsys_entity
    if( !$entityWbfsysEntity )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntity = $orm->get( 'WbfsysEntity', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentity with this id '.$objid,
              'wbfsys.entity.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntity', $entityWbfsysEntity );
        $this->register( 'main_entity', $entityWbfsysEntity );

      }
      else
      {
        $entityWbfsysEntity   = new WbfsysEntity_Entity() ;
        $this->register( 'entityWbfsysEntity', $entityWbfsysEntity );
        $this->register( 'main_entity', $entityWbfsysEntity );
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntity->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntity = $orm->get( 'WbfsysEntity', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentity with this id '.$objid,
            'wbfsys.entity.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntity', $entityWbfsysEntity );
      $this->register( 'main_entity', $entityWbfsysEntity );
    }

    return $entityWbfsysEntity;

  }//end public function getEntityWbfsysEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntity_Entity $entity
  */
  public function setEntityWbfsysEntity( $entity )
  {

    $this->register( 'entityWbfsysEntity', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntity */

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
      'wbfsys_entity' => array
      (
        'name',
        'access_key',
        'flag_index',
        'default_create',
        'default_edit',
        'default_show',
        'default_list',
        'default_selection',
        'relevance',
        'id_module',
        'id_security_area',
        'description',
        'revision',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysModule_Ref_Entity_Crud_Model

