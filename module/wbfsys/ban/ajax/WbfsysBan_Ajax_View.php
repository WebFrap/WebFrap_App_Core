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
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysBan_Ajax_View
  extends LibTemplateAjaxView
{
////////////////////////////////////////////////////////////////////////////////
// display methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @param WbfsysBan_Entity $entityWbfsysBan
   * @param TArray $params
   */
  public function displayData( $entityWbfsysBan, $params )
  {

    $ui = $this->loadUi( 'WbfsysBan_Crud' );
    $ui->setModel( $this->model );

    if( 'true' == $params->fullLoad )
    {
      // if full send the complete form
      $ui->ajaxForm( $entityWbfsysBan, $params );
    }
    else
    {
      // else just send the text key
      $ui->textByKey( $entityWbfsysBan, $params );
    }

    // kein fehler, god by
    return null;

  }//end public function displayData */

}//end class WbfsysBan_Ajax_View

