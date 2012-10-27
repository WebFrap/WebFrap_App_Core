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
class WbfsysRoleUser_Ref_AddressItem_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysAddressItem_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysAddressItem( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysAddressItem_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysAddressItem(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysAddressItem_Entity
  */
  public function getEntityWbfsysAddressItem( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysAddressItem = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysAddressItem = $this->getRegisterd( 'entityWbfsysAddressItem' );

    //entity wbfsys_address_item
    if( !$entityWbfsysAddressItem )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysAddressItem = $orm->get( 'WbfsysAddressItem', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysaddressitem with this id '.$objid,
              'wbfsys.address_item.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysAddressItem', $entityWbfsysAddressItem );
        $this->register( 'main_entity', $entityWbfsysAddressItem );

      }
      else
      {
        $entityWbfsysAddressItem   = new WbfsysAddressItem_Entity() ;
        $this->register( 'entityWbfsysAddressItem', $entityWbfsysAddressItem );
        $this->register( 'main_entity', $entityWbfsysAddressItem );
      }

    }
    elseif( $objid && $objid != $entityWbfsysAddressItem->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysAddressItem = $orm->get( 'WbfsysAddressItem', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysaddressitem with this id '.$objid,
            'wbfsys.address_item.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysAddressItem', $entityWbfsysAddressItem );
      $this->register( 'main_entity', $entityWbfsysAddressItem );
    }

    return $entityWbfsysAddressItem;

  }//end public function getEntityWbfsysAddressItem */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysAddressItem_Entity $entity
  */
  public function setEntityWbfsysAddressItem( $entity )
  {

    $this->register( 'entityWbfsysAddressItem', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysAddressItem */

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
      'wbfsys_address_item' => array
      (
        'name',
        'address_value',
        'vid',
        'id_user',
        'id_type',
        'flag_private',
        'use_for_contact',
        'description',
        'id_vid_entity',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysRoleUser_Ref_AddressItem_Crud_Model

