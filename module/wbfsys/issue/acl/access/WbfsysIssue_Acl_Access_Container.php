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
class WbfsysIssue_Acl_Access_Container
  extends LibAclPermission
{
  /**
   * @param TFlag $params
   * @param WbfsysIssue_Entity $entity
   */
  public function loadDefault( $params, $entity = null )
  {

    // laden der benötigten Resource Objekte
    $acl = $this->getAcl();

    // wenn keine acl root übergeben wird, da befinden wir uns an dem
    // startpunkt für einen potentiell vorhandenen rechte pfad
    if( is_null( $params->aclRoot )  )
    {
      $params->isAclRoot     = true;
      $params->aclRoot       = 'mgmt-wbfsys_issue';
      $params->aclRootId     = null;
      $params->aclKey        = 'mgmt-wbfsys_issue';
      $params->aclNode       = 'mgmt-wbfsys_issue';
      $params->aclLevel      = 1;
    }

    // wenn wir in keinem pfad sind nehmen wir einfach die normalen
    // berechtigungen
    if( $params->isAclRoot )
    {
      // da wir die zugriffsrechte mehr als nur einmal brauchen holen wir uns
      // direkt einen acl container
      $access = $acl->getPermission
      (
        'mod-wbfsys>mgmt-wbfsys_issue',
        $entity,
        false,     // keine rechte der referenzen laden
        $this     // dieses objekt soll als container verwendet werden
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
        false,    // keine rechte der referenzen laden
        $this    // sich selbst als container mit übergeben
      );
    }


  }//end public function loadDefault */

}//end class WbfsysIssue_Acl_Access_Container

