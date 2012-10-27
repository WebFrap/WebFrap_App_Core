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
class WbfsysOs_Ref_Version_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysOsVersion_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysOsVersion( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysOsVersion_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysOsVersion(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysOsVersion_Entity
  */
  public function getEntityWbfsysOsVersion( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysOsVersion = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysOsVersion = $this->getRegisterd( 'entityWbfsysOsVersion' );

    //entity wbfsys_os_version
    if( !$entityWbfsysOsVersion )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysOsVersion = $orm->get( 'WbfsysOsVersion', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysosversion with this id '.$objid,
              'wbfsys.os_version.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysOsVersion', $entityWbfsysOsVersion );
        $this->register( 'main_entity', $entityWbfsysOsVersion );

      }
      else
      {
        $entityWbfsysOsVersion   = new WbfsysOsVersion_Entity() ;
        $this->register( 'entityWbfsysOsVersion', $entityWbfsysOsVersion );
        $this->register( 'main_entity', $entityWbfsysOsVersion );
      }

    }
    elseif( $objid && $objid != $entityWbfsysOsVersion->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysOsVersion = $orm->get( 'WbfsysOsVersion', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysosversion with this id '.$objid,
            'wbfsys.os_version.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysOsVersion', $entityWbfsysOsVersion );
      $this->register( 'main_entity', $entityWbfsysOsVersion );
    }

    return $entityWbfsysOsVersion;

  }//end public function getEntityWbfsysOsVersion */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysOsVersion_Entity $entity
  */
  public function setEntityWbfsysOsVersion( $entity )
  {

    $this->register( 'entityWbfsysOsVersion', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysOsVersion */

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
      'wbfsys_os_version' => array
      (
        'name',
        'code_name',
        'access_key',
        'id_os',
        'server_supported',
        'released',
        'description',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysOs_Ref_Version_Crud_Model

