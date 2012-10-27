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
class WbfsysSecurityLevel_Service_Query_Postgresql
  extends LibSqlQuery
{
////////////////////////////////////////////////////////////////////////////////
// Query Logic
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * Loading the tabledata from the database
   * @param string $key
   * @return void
   *
   * @throws LibDb_Exception
   */
  public function fetchAutocomplete( $key )
  {

    $this->sourceSize  = null;
    $db                = $this->getDb();

    $criteria = $db->orm->newCriteria();


    
    $criteria->select( array
    (
      'wbfsys_security_level.access_key as id',
      'wbfsys_security_level.access_key as value',
    'wbfsys_security_level.access_key as label'
    ));
    $criteria->from( 'wbfsys_security_level' );
    $criteria->limit( 20 );
        $criteria->where( "upper(wbfsys_security_level.access_key) like upper('%{$db->addSlashes( $key )}%')" );


    
    // Run Query und save the result
    $this->result = $db->orm->select( $criteria );

  }//end public function fetchAutocomplete */

}//end class WbfsysSecurityLevel_Service_Query_Postgresql

