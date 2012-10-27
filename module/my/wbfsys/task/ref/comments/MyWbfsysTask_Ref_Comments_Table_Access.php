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
class MyWbfsysTask_Ref_Comments_Table_Access
  extends LibAclPermissionList
{
  /**
   * @param TFlag $params
   * @param Entity: wbfsys_entity_comment Attributes: vid; id_entity; id_comment; rowid; m_time_created; m_role_create; m_time_changed; m_role_change; m_version; m_uuid_Entity $entity
   */
  public function loadDefault( $params, $entity = null )
  {

    // laden der benötigten Resource Objekte
    /* @var $acl LibAclAdapter_Db */
    $acl = $this->getAcl();

    // da wir die zugriffsrechte mehr als nur einmal brauchen holen wir uns
    // direkt das zugriffslevel
    $acl->getPathPermission
    (
      $params->aclRoot,
      $params->aclRootId,
      $params->aclLevel,
      $params->aclKey,
      $params->refId,
      'mgmt-my_wbfsys_task-ref-comments',
      null,
      false,  // Referenzen nicht mitladen
      $this  // sich selbst als container mit übergeben
    );
    
    // checken ob rechte über den rootcontainer bis hier her vereerbt 
    // werden sollen
    try 
    {
      $rootContainer = $acl->getRootContainer( $params->aclRoot );
      
      $rootPerm = $rootContainer->getRefAccess( $params->aclRootId, $params->aclLevel, 'mgmt-my_wbfsys_task-ref-comments' );
      
      if( $rootPerm )
      {
        if( !$this->defLevel || $rootPerm['level'] > $this->defLevel )
        {
          $this->defLevel = $rootPerm['level'];
        }
      }
      
      if( $rootPerm )
      {
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
      
  }//end public function loadDefault */

  /**
   * @param MyWbfsysTask_Ref_Comments_Table_Query $query
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

    $criteria->select( array( 'wbfsys_entity_comment.rowid as rowid' )  );

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
          UPPER(acls.\"acl-area\") IN( UPPER('mod-wbfsys'), UPPER('mod-wbfsys-cat-core_data') )
            AND acls.\"acl-user\" = {$userId}
            AND acls.\"acl-vid\" = wbfsys_entity_comment.rowid ",
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

}//end class MyWbfsysTask_Ref_Comments_Table_Access

