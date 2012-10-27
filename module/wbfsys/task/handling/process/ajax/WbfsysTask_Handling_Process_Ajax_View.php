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
class WbfsysTask_Handling_Process_Ajax_View
  extends LibTemplateAjaxView
{
  /**
   * @param WbfsysTask_Handling_Process $process
   * @param TFlag $params
   */
  public function displayDropForm( $process, $params )
  {
    
    // Erstellen des Ui Elements für den WbfsysTask_Handling Prozess
    $processForm = new WgtProcessForm();
    $processForm->process = $process;

    $this->setReturnData( $processForm->renderDropForm( $params ), 'html' );

    
    return null;
    
  }//end public function displayDropForm */

}//end class WbfsysTask_Handling_Process_Ajax_View

