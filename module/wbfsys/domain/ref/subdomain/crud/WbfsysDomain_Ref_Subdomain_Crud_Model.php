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
class WbfsysDomain_Ref_Subdomain_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return HostingSubdomain_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityHostingSubdomain( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param HostingSubdomain_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityHostingSubdomain(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return HostingSubdomain_Entity
  */
  public function getEntityHostingSubdomain( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityHostingSubdomain = $this->getRegisterd( 'main_entity' ) )
      $entityHostingSubdomain = $this->getRegisterd( 'entityHostingSubdomain' );

    //entity hosting_subdomain
    if( !$entityHostingSubdomain )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityHostingSubdomain = $orm->get( 'HostingSubdomain', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no hostingsubdomain with this id '.$objid,
              'hosting.subdomain.message'
            )
          );
          return null;
        }

        $this->register( 'entityHostingSubdomain', $entityHostingSubdomain );
        $this->register( 'main_entity', $entityHostingSubdomain );

      }
      else
      {
        $entityHostingSubdomain   = new HostingSubdomain_Entity() ;
        $this->register( 'entityHostingSubdomain', $entityHostingSubdomain );
        $this->register( 'main_entity', $entityHostingSubdomain );
      }

    }
    elseif( $objid && $objid != $entityHostingSubdomain->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityHostingSubdomain = $orm->get( 'HostingSubdomain', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no hostingsubdomain with this id '.$objid,
            'hosting.subdomain.message'
          )
        );
        return null;
      }

      $this->register( 'entityHostingSubdomain', $entityHostingSubdomain );
      $this->register( 'main_entity', $entityHostingSubdomain );
    }

    return $entityHostingSubdomain;

  }//end public function getEntityHostingSubdomain */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param HostingSubdomain_Entity $entity
  */
  public function setEntityHostingSubdomain( $entity )
  {

    $this->register( 'entityHostingSubdomain', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityHostingSubdomain */

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
      'hosting_subdomain' => array
      (
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysDomain_Ref_Subdomain_Crud_Model

