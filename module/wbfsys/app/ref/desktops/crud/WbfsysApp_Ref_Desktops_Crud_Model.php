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
class WbfsysApp_Ref_Desktops_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysDesktop_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysDesktop( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysDesktop_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysDesktop(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysDesktop_Entity
  */
  public function getEntityWbfsysDesktop( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysDesktop = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysDesktop = $this->getRegisterd( 'entityWbfsysDesktop' );

    //entity wbfsys_desktop
    if( !$entityWbfsysDesktop )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysDesktop = $orm->get( 'WbfsysDesktop', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysdesktop with this id '.$objid,
              'wbfsys.desktop.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysDesktop', $entityWbfsysDesktop );
        $this->register( 'main_entity', $entityWbfsysDesktop );

      }
      else
      {
        $entityWbfsysDesktop   = new WbfsysDesktop_Entity() ;
        $this->register( 'entityWbfsysDesktop', $entityWbfsysDesktop );
        $this->register( 'main_entity', $entityWbfsysDesktop );
      }

    }
    elseif( $objid && $objid != $entityWbfsysDesktop->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysDesktop = $orm->get( 'WbfsysDesktop', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysdesktop with this id '.$objid,
            'wbfsys.desktop.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysDesktop', $entityWbfsysDesktop );
      $this->register( 'main_entity', $entityWbfsysDesktop );
    }

    return $entityWbfsysDesktop;

  }//end public function getEntityWbfsysDesktop */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysDesktop_Entity $entity
  */
  public function setEntityWbfsysDesktop( $entity )
  {

    $this->register( 'entityWbfsysDesktop', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysDesktop */

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
      'wbfsys_desktop' => array
      (
        'name',
        'access_key',
        'id_app',
        'id_main_menu',
        'id_main_tree',
        'description',
        'revision',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysApp_Ref_Desktops_Crud_Model

