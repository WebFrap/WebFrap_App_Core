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
class WbfsysTaskType_Selection_Access
  extends LibAclPermissionList
{
  /**
   * @param TFlag $params
   * @param WbfsysTaskType_Entity $entity
   */
  public function loadDefault( $params, $entity = null )
  {

    // laden der benötigten Resource Objekte
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    // wenn keine root übergeben wird oder wir in level 1 sind
    // dann befinden wir uns im root und brauchen keine pfadafrage
    // um potentielle fehler abzufangen wird auch direkt der richtige Root gesetzt
    // nicht das hier einer einen falschen pfad injected
    if( is_null($params->aclRoot) || 1 == $params->aclLevel  )
    {
      $params->isAclRoot     = true;
      $params->aclRoot       = 'mgmt-wbfsys_task_type';
      $params->aclRootId     = null;
      $params->aclKey        = 'mgmt-wbfsys_task_type';
      $params->aclNode       = 'mgmt-wbfsys_task_type';
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
        'mod-wbfsys>mgmt-wbfsys_task_type',
        null,
        true,     // keine Kinder laden
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
        null,
        false,  // Referenzen nicht mitladen
        $this  // sich selbst als container mit übergeben
      );
    }

  }//end public function loadDefault */

  /**
   * @param WbfsysTaskType_Selection_Query $query
   * @param string $condition
   * @param TFlag $params
   */
  public function fetchListSelectionDefault( $query, $condition, $params )
  {

    // laden der benötigten Resource Objekte
    $acl  = $this->getAcl();
    $user = $this->getUser();
    $orm  = $this->getDb()->getOrm();

    $userId    = $user->getId();

    // erstellen der Acl criteria und befüllen mit den relevanten cols
    $criteria  = $orm->newCriteria( 'inner_acl' );
    
    $envelop = $orm->newCriteria( );
    $envelop->subQuery = $criteria;
    $envelop->select(array(
      'inner_acl.rowid',
      'max( inner_acl."acl-level" ) as "acl-level"'
    ));
    $query->injectLimit( $envelop, $params );
    $envelop->groupBy( 'inner_acl.rowid' );

    $criteria->select( array( 'wbfsys_task_type.rowid as rowid' )  );

    if( !$this->defLevel )
    {
      $greatest = <<<SQL

  acls."acl-level"

SQL;

      $joinType = ' ';

    }
    else
    {

      $greatest = <<<SQL

  greatest
  (
    {$this->defLevel},
    acls."acl-level"
  ) as "acl-level"

SQL;

      $joinType = ' LEFT ';
      
    }

    $criteria->selectAlso( $greatest  );

    $query->setTables( $criteria );
    $query->appendConditions( $criteria, $condition, $params  );
    $query->injectAclOrder( $criteria, $envelop, $params );
    $query->appendFilter( $criteria, $condition, $params );

    $criteria->join
    (
      " {$joinType} JOIN
        {$acl->sourceRelation} as acls
        ON
          UPPER(acls.\"acl-area\") IN( UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_task_type') )
            AND acls.\"acl-user\" = {$userId}
            AND acls.\"acl-vid\" = wbfsys_task_type.rowid ",
      'acls'
    );
    
    $tmp         = $orm->select( $envelop );
    $ids       = array();
    $this->ids = array();
    
    foreach( $tmp as $row )
    {
      $ids[$row['rowid']] = (int)$row['acl-level'];  
      $this->ids[] = $row['rowid'];
    }

    $query->setCalcQuery( $criteria, $params );
    
    return $ids;

  }//end public function fetchListSelectionDefault */

}//end class WbfsysTaskType_Selection_Access

