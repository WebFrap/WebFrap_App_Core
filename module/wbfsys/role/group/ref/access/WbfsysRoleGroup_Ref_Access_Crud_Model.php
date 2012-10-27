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
class WbfsysRoleGroup_Ref_Access_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysSecurityAccess_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysSecurityAccess( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysSecurityAccess_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysSecurityAccess(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysSecurityAccess_Entity
  */
  public function getEntityWbfsysSecurityAccess( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysSecurityAccess = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysSecurityAccess = $this->getRegisterd( 'entityWbfsysSecurityAccess' );

    //entity wbfsys_security_access
    if( !$entityWbfsysSecurityAccess )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysSecurityAccess = $orm->get( 'WbfsysSecurityAccess', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsyssecurityaccess with this id '.$objid,
              'wbfsys.security_access.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysSecurityAccess', $entityWbfsysSecurityAccess );
        $this->register( 'main_entity', $entityWbfsysSecurityAccess );

      }
      else
      {
        $entityWbfsysSecurityAccess   = new WbfsysSecurityAccess_Entity() ;
        $this->register( 'entityWbfsysSecurityAccess', $entityWbfsysSecurityAccess );
        $this->register( 'main_entity', $entityWbfsysSecurityAccess );
      }

    }
    elseif( $objid && $objid != $entityWbfsysSecurityAccess->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysSecurityAccess = $orm->get( 'WbfsysSecurityAccess', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsyssecurityaccess with this id '.$objid,
            'wbfsys.security_access.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysSecurityAccess', $entityWbfsysSecurityAccess );
      $this->register( 'main_entity', $entityWbfsysSecurityAccess );
    }

    return $entityWbfsysSecurityAccess;

  }//end public function getEntityWbfsysSecurityAccess */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysSecurityAccess_Entity $entity
  */
  public function setEntityWbfsysSecurityAccess( $entity )
  {

    $this->register( 'entityWbfsysSecurityAccess', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysSecurityAccess */

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
      'wbfsys_security_access' => array
      (
        'id_group',
        'id_area',
        'access_level',
        'ref_access_level',
        'date_start',
        'description',
        'partial',
        'date_end',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysRoleGroup_Ref_Access_Crud_Model

