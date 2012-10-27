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
class SystemUser_Creation_Process_Access
  extends LibAclPermission
{
  /**
   * @param TFlag $params
   * @param WbfsysRoleUser_Entity $entity
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
      $params->aclRootId     = $entity->getid(); // die aktive entity ist der root
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
        true,     // Rollen laden
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
        true,     // rechte der referenzen mit laden
        $this    // sich selbst als container mit übergeben
      );
    }
    


  }//end public function loadDefault */
  
  
  /**
   * @param ProjectTaskEmployee_Assignment_Process $process
   * @param LibProcess_Edge $edge
   * @param ProjectTaskEmployee_Entity $entity
   *
   * @return boolean
   */
  public function checkEdgeAccess( $process, $edge, $entity )
  {

    return false;  
  
  }//end public function checkEdgeAccess */
  

}//end class SystemUser_Creation_Process_Access

