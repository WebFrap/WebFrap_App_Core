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
class WbfsysBrowser_Ref_Version_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysBrowserVersion_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysBrowserVersion( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysBrowserVersion_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysBrowserVersion(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysBrowserVersion_Entity
  */
  public function getEntityWbfsysBrowserVersion( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysBrowserVersion = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysBrowserVersion = $this->getRegisterd( 'entityWbfsysBrowserVersion' );

    //entity wbfsys_browser_version
    if( !$entityWbfsysBrowserVersion )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysBrowserVersion = $orm->get( 'WbfsysBrowserVersion', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysbrowserversion with this id '.$objid,
              'wbfsys.browser_version.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysBrowserVersion', $entityWbfsysBrowserVersion );
        $this->register( 'main_entity', $entityWbfsysBrowserVersion );

      }
      else
      {
        $entityWbfsysBrowserVersion   = new WbfsysBrowserVersion_Entity() ;
        $this->register( 'entityWbfsysBrowserVersion', $entityWbfsysBrowserVersion );
        $this->register( 'main_entity', $entityWbfsysBrowserVersion );
      }

    }
    elseif( $objid && $objid != $entityWbfsysBrowserVersion->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysBrowserVersion = $orm->get( 'WbfsysBrowserVersion', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysbrowserversion with this id '.$objid,
            'wbfsys.browser_version.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysBrowserVersion', $entityWbfsysBrowserVersion );
      $this->register( 'main_entity', $entityWbfsysBrowserVersion );
    }

    return $entityWbfsysBrowserVersion;

  }//end public function getEntityWbfsysBrowserVersion */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysBrowserVersion_Entity $entity
  */
  public function setEntityWbfsysBrowserVersion( $entity )
  {

    $this->register( 'entityWbfsysBrowserVersion', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysBrowserVersion */

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
      'wbfsys_browser_version' => array
      (
        'name',
        'code_name',
        'access_key',
        'id_browser',
        'supported',
        'released',
        'description',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysBrowser_Ref_Version_Crud_Model

