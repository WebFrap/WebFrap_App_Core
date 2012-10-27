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
 * @subpackage ModCore
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreCountryCategory_Acl_Access_Container
  extends LibAclPermission
{
  /**
   * @param TFlag $params
   * @param CoreCountryCategory_Entity $entity
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
      $params->aclRoot       = 'mgmt-core_country_category';
      $params->aclRootId     = null;
      $params->aclKey        = 'mgmt-core_country_category';
      $params->aclNode       = 'mgmt-core_country_category';
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
        'mod-core>mgmt-core_country_category',
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

}//end class CoreCountryCategory_Acl_Access_Container
