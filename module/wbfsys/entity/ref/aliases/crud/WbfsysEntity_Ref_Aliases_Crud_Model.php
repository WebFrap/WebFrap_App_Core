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
class WbfsysEntity_Ref_Aliases_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityAlias_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityAlias( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityAlias_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityAlias(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityAlias_Entity
  */
  public function getEntityWbfsysEntityAlias( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysEntityAlias = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntityAlias = $this->getRegisterd( 'entityWbfsysEntityAlias' );

    //entity wbfsys_entity_alias
    if( !$entityWbfsysEntityAlias )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntityAlias = $orm->get( 'WbfsysEntityAlias', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentityalias with this id '.$objid,
              'wbfsys.entity_alias.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntityAlias', $entityWbfsysEntityAlias );
        $this->register( 'main_entity', $entityWbfsysEntityAlias );

      }
      else
      {
        $entityWbfsysEntityAlias   = new WbfsysEntityAlias_Entity() ;
        $this->register( 'entityWbfsysEntityAlias', $entityWbfsysEntityAlias );
        $this->register( 'main_entity', $entityWbfsysEntityAlias );
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntityAlias->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntityAlias = $orm->get( 'WbfsysEntityAlias', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentityalias with this id '.$objid,
            'wbfsys.entity_alias.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntityAlias', $entityWbfsysEntityAlias );
      $this->register( 'main_entity', $entityWbfsysEntityAlias );
    }

    return $entityWbfsysEntityAlias;

  }//end public function getEntityWbfsysEntityAlias */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityAlias_Entity $entity
  */
  public function setEntityWbfsysEntityAlias( $entity )
  {

    $this->register( 'entityWbfsysEntityAlias', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntityAlias */

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
      'wbfsys_entity_alias' => array
      (
        'name',
        'id_entity',
        'revision',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysEntity_Ref_Aliases_Crud_Model

