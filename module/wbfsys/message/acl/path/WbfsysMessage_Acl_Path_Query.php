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
 * Read before change:
 * It's not recommended to change this file inside a Mod or App Project.
 * If you want to change it copy it to a custom project.

 *
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMessage_Acl_Path_Query
  extends LibSqlQuery
{////////////////////////////////////////////////////////////////////////////////
// Methodes
////////////////////////////////////////////////////////////////////////////////

  /**
   * Loading the tabledata from the database
   * @param int $areaId
   * @param TFlag $params
   * @return void
   *
   * @throws LibDb_Exception
   */
  public function fetchAreaGroups( $areaId, $params = null )
  {

    if(!$params)
      $params = new TFlag();

    $this->sourceSize  = null;
    $db                = $this->getDb();

    $sql = <<<SQL
  SELECT
    distinct wbfsys_role_group.rowid as id,
    wbfsys_role_group.name as value

  FROM
    wbfsys_role_group

  JOIN
    wbfsys_security_access
      ON
        wbfsys_role_group.rowid = wbfsys_security_access.id_group

  WHERE
    wbfsys_security_access.id_area = {$areaId}
    and
      ( wbfsys_security_access.partial = 0 or wbfsys_security_access.partial is null ) ;

SQL;

    $this->result = $db->select( $sql );

  }//end public function fetchAreaGroups */

 /**
   * Loading the tabledata from the database
   * @param string $areaKey
   * @param int $idGroup
   * @param TFlag $params
   * @return void
   *
   * @throws LibDb_Exception
   */
  public function fetchAccessTree( $areaKey, $idGroup, $params = null )
  {

    if(!$params)
      $params = new TFlag();

    $this->sourceSize  = null;
    $db                = $this->getDb();

    /*
    Beschreibung der Felder in der Rekursion:

    child ist eine wbfsys_security_area vom type mgmt-ref, also eine Area welche
    eine Referenz auf Management Ebene beschreibt

      child.rowid
        Die rowid des Security-Area Zielknotens vom Pfad
        ( wird benötigt um den Graph zu erstellen )

      child.label
        Das Label des Security-Area Zielknotens vom Pfad
        ( wird benötigt um den Graph zu erstellen )

      child.access_key
        Der Access Key des Security-Area Zielknotens vom Pfad

      child.m_parent
        Referenz auf die Security Area welche auf die aktuelle Security-Area verweißt

      tree.depth + 1 as depth
        Die aktuelle Pfadtiefe in der Rekursion

      path.access_level as access_level
        Die Berechtigung welche der Pfad dem Benutzer auf den Zielknoten zuweist
        ( Wird im Pfad Form angezeigt und ist editierbar )

      path.rowid as assign_id
        Rowid des Pfades, wir benötigt um den Pfad direkt zu adressieren
        ( Wird zum updaten und löschen des Pfades benötigt )

      child.id_target as target
        Die Ziel Security Area der Referenz Security Area

      path.id_area as the_parent
        Verweißt vom Pfad auf den Rootknoten des Rechtebaumes

      child.description as area_description
        Beschreibung der Security Area

      path.description as description
        Beschreibung des Pfades
        ( Wird im Pfad Form angezeigt und ist editierbar )
     */

     // diese Query trägt den schönen namen Ilse, weil keiner willse...
     // mit speziellem Dank an Malte Schirmacher
    $sql = <<<SQL
WITH RECURSIVE sec_tree
(
  rowid,
  label,
  access_key,
  m_parent,
  depth,
  access_level,
  assign_id,
  target,
  the_parent,
  area_description,
  description
)
AS
(
  SELECT
    root.rowid,
    root.label,
    root.access_key,
    root.m_parent,
    1 as depth,
    0 as access_level,
    0::bigint as assign_id,
    root.rowid as target,
    root.rowid as the_parent,
    root.description as area_description,
    '' as description
  FROM
    wbfsys_security_area root
  WHERE root.rowid = {$areaKey}

  UNION ALL

  SELECT
    child.rowid,
    child.label,
    child.access_key,
    child.m_parent,
    tree.depth + 1 as depth,
    path.access_level as access_level,
    path.rowid as assign_id,
    child.id_target as target,
    path.id_area as the_parent,
    child.description as area_description,
    path.description as description
  FROM
    wbfsys_security_area child
  JOIN
    sec_tree tree
      ON tree.the_parent = child.m_parent

  JOIN
    wbfsys_security_area_type
      on wbfsys_security_area_type.rowid = child.id_type
        and upper(wbfsys_security_area_type.access_key) = upper('mgmt_reference')

  LEFT JOIN
    wbfsys_security_path path
      ON
  child.rowid = path.id_reference
        AND path.id_group = {$idGroup}
        AND path.id_root = {$areaKey}
    WHERE depth < 10
 )

  SELECT
    rowid,
    label,
    access_key,
    m_parent,
    depth,
    access_level,
    assign_id,
    target,
    COALESCE(the_parent,rowid) as id_parent,
    area_description,
    description
  FROM
    sec_tree;

SQL;

    $this->result = $db->select( $sql );

  }//end public function fetchAccessTree */

} // end class WbfsysMessage_Acl_Path_Query */

