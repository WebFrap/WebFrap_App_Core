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
class WbfsysIssue_Table_NewIssues_Filter
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
    
    $criteria->filter
    ("
       wbfsys_process_node.access_key  IN( 'new' )
",
    'OR'
  );


		
		if( $subCheck )
			$criteria->where( "(".implode( ' OR ', $subCheck ).")" ); 

    return $criteria;

  }//end public function inject */
  
} // end class WbfsysIssue_Table_NewIssues_Filter */

