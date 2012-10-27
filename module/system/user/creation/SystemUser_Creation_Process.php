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
 * Custom Code Class for the process
 *
 * @package WebFrap
 * @subpackage system_user-creation
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class SystemUser_Creation_Process
  extends SystemUser_Creation_Process_Genf
{
////////////////////////////////////////////////////////////////////////////////
// Action Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @return null Error im Fehlerfall
   */
  public function action_CreateNew( )
  {
  
    $response  = $this->getResponse();
    $i18n       = $response->i18n;
    $acl       = $this->getAcl();
    


    return null;

  }//end public function action_CreateNew */



}// end class SystemUser_Creation_Process

