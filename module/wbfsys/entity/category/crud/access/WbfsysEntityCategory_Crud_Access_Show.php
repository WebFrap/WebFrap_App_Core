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
class WbfsysEntityCategory_Crud_Access_Show
  extends LibAclPermission
{
  /**
   * @param TFlag $params
   * @param WbfsysEntityCategory_Entity $entity
   */
  public function loadDefault( $params, $entity = null )
  {

    // laden der benötigten Resource Objekte
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();
    $orm = $this->getOrm();

    // wenn keine root übergeben wird oder wir in level 1 sind
    // dann befinden wir uns im root und brauchen keine pfadafrage
    // um potentielle fehler abzufangen wird auch direkt der richtige Root gesetzt
    // nicht das hier einer einen falschen pfad injected
    if( is_null($params->aclRoot) || 1 == $params->aclLevel )
    {
      $params->isAclRoot     = true;
      $params->aclRoot       = 'mod-wbfsys-cat-core_data';
      $params->aclRootId     = null;
      $params->aclKey        = 'mod-wbfsys-cat-core_data';
      $params->aclNode       = 'mod-wbfsys-cat-core_data';
      $params->aclLevel      = 1;
    }

    // wenn wir in keinem pfad sind nehmen wir einfach die normalen
    // berechtigungen
    if( $params->isAclRoot )
    {
      // da wir die zugriffsrechte mehr als nur einmal brauchen holen wir uns
      // direkt einen acl container
      $acl->getFormPermission
      (
        'mod-wbfsys>mod-wbfsys-cat-core_data',
        $entity,
        true,     // Berechtigungen der Referenzen sollen mitgeladen werden
        $this    // dieses objekt soll als container verwendet werden
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
        true,     // alle relativen Rollen laden
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

}//end class WbfsysEntityCategory_Crud_Access_Show

