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
class WbfsysMaskAttribute_Ajax_View
  extends LibTemplateAjaxView
{
////////////////////////////////////////////////////////////////////////////////
// display methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @param WbfsysMaskAttribute_Entity $entityWbfsysMaskAttribute
   * @param TArray $params
   */
  public function displayData( $entityWbfsysMaskAttribute, $params )
  {

    $ui = $this->loadUi( 'WbfsysMaskAttribute_Crud' );
    $ui->setModel( $this->model );

    if( 'true' == $params->fullLoad )
    {
      // if full send the complete form
      $ui->ajaxForm( $entityWbfsysMaskAttribute, $params );
    }
    else
    {
      // else just send the text key
      $ui->textByKey( $entityWbfsysMaskAttribute, $params );
    }

    // kein fehler, god by
    return null;

  }//end public function displayData */

}//end class WbfsysMaskAttribute_Ajax_View

