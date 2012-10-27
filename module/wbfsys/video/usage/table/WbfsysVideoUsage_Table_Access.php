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
class WbfsysVideoUsage_Table_Access
  extends LibAclPermissionList
{
  /**
   * @param TFlag $params
   * @param WbfsysVideoUsage_Entity $entity
   */
  public function loadDefault( $params, $entity = null )
  {

    // laden der benötigten Resource Objekte
    $acl = $this->getAcl();

    // wenn keine root übergeben wird oder wir in level 1 sind
    // dann befinden wir uns im root und brauchen keine pfadafrage
    // um potentielle fehler abzufangen wird auch direkt der richtige Root gesetzt
    // nicht das hier einer einen falschen pfad injected
    if( is_null($params->aclRoot) || 1 == $params->aclLevel  )
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
      $acl->getPermission
      (
        'mod-wbfsys>mod-wbfsys-cat-core_data',
        null,
        true,     // Rollen mitladen
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
        null,
        false,  // Rechte der Referenzen nicht mitladen
        $this  // sich selbst als container mit übergeben
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

  /**
   * @param WbfsysVideoUsage_Table_Query $query
   * @param string $condition
   * @param TFlag $params
   */
  public function fetchListTableDefault( $query, $condition, $params )
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

    $criteria->select( array( 'wbfsys_video_usage.rowid as rowid' )  );

    if( !$this->defLevel || $this->isPartAssign )
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

    if( $query->extendedConditions )
    {
      $query->renderExtendedConditions( $criteria, $query->extendedConditions );
    }

    $criteria->join
    (
      " {$joinType} JOIN
        {$acl->sourceRelation} as acls
        ON
          UPPER(acls.\"acl-area\") IN( UPPER('mod-wbfsys'), UPPER('mod-wbfsys-cat-core_data') )
            AND acls.\"acl-user\" = {$userId}
            AND acls.\"acl-vid\" = wbfsys_video_usage.rowid ",
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

  }//end public function fetchListTableDefault */

}//end class WbfsysVideoUsage_Table_Access

