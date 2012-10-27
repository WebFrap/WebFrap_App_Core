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
class WbfsysMessageChannelType_Crud_Access_Tab
  extends LibAclPermission
{
  /**
   * @param TFlag $params
   * @param WbfsysMessageChannelType_Entity $entity
   */
  public function loadDefault( $params, $entity = null )
  {

    // laden der benötigten Resource Objekte
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();
    $orm = $this->getOrm();
    
    $entityId = null;
    if( is_object( $entity ) )
      $entityId = $entity->getId();
    else 
      $entityId = $entity;

    // wenn keine root übergeben wird oder wir in level 1 sind
    // dann befinden wir uns im root und brauchen keine pfadafrage
    // um potentielle fehler abzufangen wird auch direkt der richtige Root gesetzt
    // nicht das hier einer einen falschen pfad injected
    if( is_null($params->aclRoot) || 1 == $params->aclLevel )
    {
      $params->isAclRoot     = true;
      $params->aclRoot       = 'mgmt-wbfsys_message_channel_type';
      $params->aclRootId     = $entityId; // die aktive entity ist der root
      $params->aclKey        = 'mgmt-wbfsys_message_channel_type';
      $params->aclNode       = 'mgmt-wbfsys_message_channel_type';
      $params->aclLevel      = 1;
    }

    // wenn wir in keinem pfad sind nehmen wir einfach die normalen
    // berechtigungen
    if( $params->isAclRoot )
    {
      // da wir die zugriffsrechte mehr als nur einmal brauchen holen wir uns
      // direkt einen acl container
      $acl->getPermission
      (
        'mod-wbfsys>mgmt-wbfsys_message_channel_type',
        $entity,
        true,    // Rollen mitladen
        $this   // dieses objekt soll als container verwendet werden
      );
    }
    else
    {
      // da wir die zugriffsrechte mehr als nur einmal brauchen holen wir uns
      // direkt das zugriffslevel
      $acl->getPathPermission
      (
        $params->aclRoot,
        $params->aclRootId,
        $params->aclLevel,
        $params->aclKey,
        $params->refId,
        $params->aclNode,
        $entity,
        false,    // keine referenzen mitladen
        $this    // sich selbst als container mit übergeben
      );
      
      
      // checken ob rechte über den rootcontainer bis hier her vereerbt 
      // werden sollen
      try 
      {
        $rootContainer = $acl->getRootContainer( $params->aclRoot );
        
        $rootPerm = $rootContainer->getRefAccess( $params->aclRootId, $params->aclLevel, $params->aclNode );
        
        if( $rootPerm )
        {
          if( !$this->defLevel || $rootPerm['level'] > $this->defLevel )
          {
            $this->defLevel = $rootPerm['level'];
          }
          if( !$this->level || $rootPerm['level'] > $this->level )
          {
            $this->level = $rootPerm['level'];
          }
        }
        
        if( $rootPerm['roles'] )
        {
          $this->roles = array_merge( $this->roles, $rootPerm['roles'] );
        }
        
      }
      catch ( LibAcl_Exception $e )
      {
        
      }
    }
    


  }//end public function loadDefault */

}//end class WbfsysMessageChannelType_Crud_Access_Tab

