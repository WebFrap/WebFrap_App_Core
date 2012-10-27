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
 * @subpackage ModTask
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMyTasks_Widget_Table_MyProjects_Filter
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
    
    $user = $this->getUser();
    
    $join = <<<SQL

  JOIN
    {$acl->sourceRelation} as acls_my_projects
    ON
      upper(acls_my_projects."acl-area") IN( UPPER('mod-wbfsys'), UPPER('mgmt-wbfsys_task') )
        AND acls_my_projects."acl-user" = {$user->getId()}
        AND acls_my_projects."acl-vid" = wbfsys_task.rowid 
  
  JOIN
    wbfsys_role_group as acls_group_my_projects
      ON
      acls_group_my_projects.rowid = acls_my_projects."acl-group"
        AND upper(acls_group_my_projects.access_key) IN( upper('owner'), upper('staff') )
      
SQL;


    $criteria->join( $join );
    

    return $criteria;

  }//end public function inject */
  
} // end class WbfsysMyTasks_Widget_Table_MyProjects_Filter */

