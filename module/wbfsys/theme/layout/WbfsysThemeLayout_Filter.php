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
class WbfsysThemeLayout_Filter
  extends LibSqlFilter
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
        
  /**
   * @param LibSqlCriteria $criteria
   * @param int $key
   */
  public function filter( $criteria, $key )
  {

    $user       = $this->getUser();
    $acl       = $this->getAcl();
    $sqlRoles   = "UPPER('".implode( "'), UPPER('", $this->roles )."')";
    
    if( $this->fieldName )
    {
      $fieldName = $this->fieldName;
    }
    else
    {
      $fieldName = 'rowid';
    }
    
    
    $join = <<<SQL

  JOIN
    {$acl->sourceRelation} as filter_area_{$key}
    ON
      filter_area_{$key}."acl-area" IN( UPPER('mod-wbfsys'), UPPER('mod-wbfsys-cat-core_data') )
        AND filter_area_{$key}."acl-user" = {$user->getId()}
        AND filter_area_{$key}."acl-vid" = wbfsys_theme_layout.{$fieldName}
  
  JOIN
    wbfsys_role_group as filter_group_{$key}
      ON
      filter_group_{$key}.rowid = filter_area_{$key}."acl-group"
        AND UPPER(filter_group_{$key}.access_key) IN( {$sqlRoles} )
      
SQL;


    $criteria->join( $join );
    
    return $criteria;
    
  }//end public function filter */
    
}//end class WbfsysThemeLayout_Filter

