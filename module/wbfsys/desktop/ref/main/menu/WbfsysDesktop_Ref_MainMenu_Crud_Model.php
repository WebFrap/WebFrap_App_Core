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
class WbfsysDesktop_Ref_MainMenu_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMenuEntry_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysMenuEntry( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMenuEntry_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysMenuEntry(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMenuEntry_Entity
  */
  public function getEntityWbfsysMenuEntry( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysMenuEntry = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysMenuEntry = $this->getRegisterd( 'entityWbfsysMenuEntry' );

    //entity wbfsys_menu_entry
    if( !$entityWbfsysMenuEntry )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysMenuEntry = $orm->get( 'WbfsysMenuEntry', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmenuentry with this id '.$objid,
              'wbfsys.menu_entry.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysMenuEntry', $entityWbfsysMenuEntry );
        $this->register( 'main_entity', $entityWbfsysMenuEntry );

      }
      else
      {
        $entityWbfsysMenuEntry   = new WbfsysMenuEntry_Entity() ;
        $this->register( 'entityWbfsysMenuEntry', $entityWbfsysMenuEntry );
        $this->register( 'main_entity', $entityWbfsysMenuEntry );
      }

    }
    elseif( $objid && $objid != $entityWbfsysMenuEntry->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysMenuEntry = $orm->get( 'WbfsysMenuEntry', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmenuentry with this id '.$objid,
            'wbfsys.menu_entry.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysMenuEntry', $entityWbfsysMenuEntry );
      $this->register( 'main_entity', $entityWbfsysMenuEntry );
    }

    return $entityWbfsysMenuEntry;

  }//end public function getEntityWbfsysMenuEntry */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMenuEntry_Entity $entity
  */
  public function setEntityWbfsysMenuEntry( $entity )
  {

    $this->register( 'entityWbfsysMenuEntry', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysMenuEntry */

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
      'wbfsys_menu_entry' => array
      (
        'm_parent',
        'label',
        'icon',
        'http_url',
        'access_key',
        'id_menu',
        'description',
        'mimetype',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysDesktop_Ref_MainMenu_Crud_Model

