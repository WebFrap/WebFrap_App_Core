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
 * @subpackage ModIssue
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysIssue_Selection_MyCreatedIssued_Filter
  extends LibSqlFilter
{////////////////////////////////////////////////////////////////////////////////
// Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @param LibSqlCriteria $criteria
   * @param TFlag $params
   * @return LibSqlCriteria
   */
  public function inject( $criteria, $params )
  {

    $acl       = $this->getAcl();
    $subCheck = array();
    
    
    $user = $this->getUser();
    
    $join = <<<SQL

  LEFT JOIN
    {$acl->sourceRelation} as acls_my_created_issued
    ON
      upper(acls_my_created_issued."acl-area") IN( UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_issue') )
        AND acls_my_created_issued."acl-user" = {$user->getId()}
        AND acls_my_created_issued."acl-vid" = wbfsys_issue.rowid 
  
  LEFT JOIN
    wbfsys_role_group as acls_group_my_created_issued
      ON
      acls_group_my_created_issued.rowid = acls_my_created_issued."acl-group"

SQL;

		$subCheck[] = <<<SQL
	upper(acls_group_my_created_issued.access_key) IN( upper('owner') )
SQL;

    $criteria->join( $join );
    

		
		if( $subCheck )
			$criteria->where( "(".implode( ' OR ', $subCheck ).")" ); 

    return $criteria;

  }//end public function inject */
  
} // end class WbfsysIssue_Selection_MyCreatedIssued_Filter */

