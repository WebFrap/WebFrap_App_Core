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
class WbfsysProfile_Ref_Quicklinks_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysProfileQuicklink_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysProfileQuicklink( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysProfileQuicklink_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysProfileQuicklink(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysProfileQuicklink_Entity
  */
  public function getEntityWbfsysProfileQuicklink( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysProfileQuicklink = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysProfileQuicklink = $this->getRegisterd( 'entityWbfsysProfileQuicklink' );

    //entity wbfsys_profile_quicklink
    if( !$entityWbfsysProfileQuicklink )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysProfileQuicklink = $orm->get( 'WbfsysProfileQuicklink', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysprofilequicklink with this id '.$objid,
              'wbfsys.profile_quicklink.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysProfileQuicklink', $entityWbfsysProfileQuicklink );
        $this->register( 'main_entity', $entityWbfsysProfileQuicklink );

      }
      else
      {
        $entityWbfsysProfileQuicklink   = new WbfsysProfileQuicklink_Entity() ;
        $this->register( 'entityWbfsysProfileQuicklink', $entityWbfsysProfileQuicklink );
        $this->register( 'main_entity', $entityWbfsysProfileQuicklink );
      }

    }
    elseif( $objid && $objid != $entityWbfsysProfileQuicklink->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysProfileQuicklink = $orm->get( 'WbfsysProfileQuicklink', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysprofilequicklink with this id '.$objid,
            'wbfsys.profile_quicklink.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysProfileQuicklink', $entityWbfsysProfileQuicklink );
      $this->register( 'main_entity', $entityWbfsysProfileQuicklink );
    }

    return $entityWbfsysProfileQuicklink;

  }//end public function getEntityWbfsysProfileQuicklink */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysProfileQuicklink_Entity $entity
  */
  public function setEntityWbfsysProfileQuicklink( $entity )
  {

    $this->register( 'entityWbfsysProfileQuicklink', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysProfileQuicklink */

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
      'wbfsys_profile_quicklink' => array
      (
        'id_profile',
        'access_key',
        'label',
        'http_url',
        'short_desc',
        'revision',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysProfile_Ref_Quicklinks_Crud_Model

