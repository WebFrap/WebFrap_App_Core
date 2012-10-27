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
class WbfsysRoleUser_Crud_Selection_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// Data Loader
////////////////////////////////////////////////////////////////////////////////

  /**
   * Suchfunktion für das Listen Element
   * 
   * Wenn suchparameter übergeben werden, werden diese automatisch in die
   * Query eingebaut, ansonsten wird eine plain query ausgeführt
   *
   * Berechtigungen werden bei bedarf berücksichtigt
   *
   * Am Ende wird ein geladenes Query Objekt zurückgegeben, über welches
   * ( wie über einen Array ) itteriert werden kann
   *
   * @param int $id
   * @param string $attrName
   * @param WbfsysRoleUser_Crud_Selection_Access $access
   * @param TFlag $params named parameters
   * @return LibSqlQuery
   *
   * @throws LibDb_Exception 
   *    wenn die Query fehlschlägt
   *    Datenbank Verbindungsfehler... etc ( siehe meldung )
   */
  public function getEntryEditListWhere( $id, $attrName, $access, $params )
  {

    // laden der benötigten resourcen
    $httpRequest = $this->getRequest();
    
    $db          = $this->getDb();
    $orm         = $db->getOrm();
    $user        = $this->getUser();

    $query = $db->newQuery( 'WbfsysRoleUser_Crud_Selection' );
    /* @var $query WbfsysRoleUser_Crud_Selection_Query  */

    // wenn der user nur teilberechtigungen hat, müssen die ACLs direkt beim
    // lesen der Daten berücksichtigt werden
    if
    (
      $access->isPartAssign || $access->hasPartAssign
    )
    {

      $validKeys  = $access->fetchListIds
      ( 
        $user->getProfileName(), 
        $query, 
        'selection',
        "wbfsys_role_user.{$attrName} = {$id}", 
        $params 
      );

      $query->fetchInAcls
      (
        $validKeys,
        $params
      );

    }
    else
    {

      // da die rechte scheins auf die komplette datenquelle vergeben wurden
      // kann hier auch einfach mit der ganzen quelle geladen werden
      // es wird davon ausgegangen, dass ein standard level definiert wurde
      // wenn kein standard level definiert wurde, werden die daten nur 
      // aufgelistet ohne weitere interaktions möglichkeit
      $query->fetch
      (
        "wbfsys_role_user.{$attrName} = {$id}", 
        $params
      );

    }

    return $query;

  }//end public function getEntryEditListWhere */

}//end class WbfsysRoleUser_Crud_Selection_Model

