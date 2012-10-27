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
 * Acl Rechte Container über den alle Berechtigungen geladen werden
 *
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysGroupUsers_Crud_Access_Root
  extends LibAclRoot
{
////////////////////////////////////////////////////////////////////////////////
// Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @param int|WbfsysGroupUsers_Entity $rootNode
   * @param int $level
   * @param string $refKey
   */
  public function getRefLevel( $rootNode, $level, $refKey )
  {
    
    if( is_object( $rootNode ) ) 
    {
      $rootId = (int)$rootNode->getId();
    }
    else
    {
      $rootId = (int)$rootNode;
    }
  
    $rootId = (int)$rootId;
  
    if( DEBUG )
      Debug::console( "getRefLevel $rootId, $level, $refKey ".__METHOD__ );

    if( isset( $this->paths[$rootId][$level][$refKey]['level'] ) )
      return $this->paths[$rootId][$level][$refKey]['level'];
      
    if( is_object($rootNode) ) 
    {
      /* @var $entity WbfsysGroupUsers_Entity */
      $entity = $rootNode;
    }
    else 
    {
      $orm = $this->getOrm();
      
      /* @var $entity WbfsysGroupUsers_Entity */
      $entity = $orm->get( 'WbfsysGroupUsers', $rootId );
    }
      
    $method = 'path_'.$level.'_'.SParserString::subToCamelCase( $refKey );
    
    if( method_exists( $this, $method  ) )
    {
      $this->$method( $entity );
    }
    else 
    {
      $this->pathRoot( $entity, $level, $refKey );
    }
    
    return $this->paths[$rootId][$level][$refKey]['level'];
    
  }//end public function getRefLevel */

  /**
   * @param int|WbfsysGroupUsers_Entity $rootNode
   * @param int $level
   * @param string $refKey
   */
  public function getRefRoles( $rootNode, $level, $refKey )
  {
  
    if( is_object( $rootNode ) ) 
    {
      $rootId = (int)$rootNode->getId();
    }
    else
    {
      $rootId = (int)$rootNode;
    }
  
    if( DEBUG )
      Debug::console( "getRefRoles $rootId, $level, $refKey ".__METHOD__ );
    
    if( isset( $this->paths[$rootId][$level][$refKey]['roles'] ) )
      return $this->paths[$rootId][$level][$refKey]['roles'];
      
    if( is_object( $rootNode ) ) 
    {
      /* @var $entity WbfsysGroupUsers_Entity */
      $entity = $rootNode;
    }
    else 
    {
      $orm = $this->getOrm();
      
      /* @var $entity WbfsysGroupUsers_Entity */
      $entity = $orm->get( 'WbfsysGroupUsers', $rootId );
    }
      
    $method = 'path_'.$level.'_'.SParserString::subToCamelCase( $refKey );
    
    if( method_exists( $this, $method  ) )
    {
      $this->$method( $entity );
    }
    else 
    {
      $this->pathRoot( $entity, $level, $refKey );
    }
    
    return $this->paths[$rootId][$level][$refKey]['roles'];
    
  }//end public function getRefRoles */

  /**
   * @param int|WbfsysGroupUsers_Entity $rootNode
   * @param int $level
   * @param string $refKey
   */
  public function getRefAccess( $rootNode, $level, $refKey )
  {
  
    if( is_object( $rootNode ) ) 
    {
      $rootId = (int)$rootNode->getId();
    }
    else
    {
      $rootId = (int)$rootNode;
    }
  
    if( DEBUG )
      Debug::console( "getRefAccess $rootId, $level, $refKey ".__METHOD__ );
    
    if( isset( $this->paths[$rootId][$level][$refKey] ) )
      return $this->paths[$rootId][$level][$refKey];
      
    if( is_object( $rootNode ) ) 
    {
      /* @var $entity WbfsysGroupUsers_Entity */
      $entity = $rootNode;
    }
    else 
    {
      $orm = $this->getOrm();
      
      /* @var $entity WbfsysGroupUsers_Entity */
      $entity = $orm->get( 'WbfsysGroupUsers', $rootId );
    }
      
    $method = 'path_'.$level.'_'.SParserString::subToCamelCase( $refKey );
    
    if( method_exists( $this, $method  ) )
    {
      $this->$method( $entity );
    }
    else 
    {
      $this->pathRoot( $entity, $level, $refKey );
    }
    
    return $this->paths[$rootId][$level][$refKey];
    
  }//end public function getRefAccess */

////////////////////////////////////////////////////////////////////////////////
// Root Path
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @param WbfsysGroupUsers_Entity $entity
   * @param int $level
   * @param string $refKey
   */
  protected function pathRoot( $entity, $level, $refKey )
  {
    
    $rootData = $this->loadRootPath( $entity, $level, $refKey );
    
    if( $entity )
      $rootId   = (int)$entity->getId();
    else
      $rootId   = 0;
    
    $this->paths[$rootId][$level][$refKey] = $rootData;
    
  }//end protected function pathRoot */

  /**
   * @param WbfsysGroupUsers_Entity $entity
   * @param int $level
   * @param string $refKey
   */
  protected function loadRootPath( $entity, $level, $refKey )
  {
    
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();
    
    $roles = array();
    $level = 0;
    

    
    return array
    ( 
      'roles' => $roles,
      'level' => $level 
    );
    
  }//end protected function loadRootPath */

////////////////////////////////////////////////////////////////////////////////
// Paths
////////////////////////////////////////////////////////////////////////////////
    
}//end class WbfsysGroupUsers_Crud_Access_Root

