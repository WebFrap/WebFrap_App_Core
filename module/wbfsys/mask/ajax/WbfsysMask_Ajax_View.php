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
class WbfsysMask_Ajax_View
  extends LibTemplateAjaxView
{
////////////////////////////////////////////////////////////////////////////////
// display methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @param string $key
   * @param TArray $params
   */
  public function displayAutocomplete( $key, $params )
  {

    $view = $this->getTpl( );
    $view->setRawJsonData( $this->model->getAutolistByKey( $key, $params) );

  }//end public function displayAutocomplete */

  /**
   * @param WbfsysMask_Entity $entityWbfsysMask
   * @param TArray $params
   */
  public function displayData( $entityWbfsysMask, $params )
  {

    $ui = $this->loadUi( 'WbfsysMask_Crud' );
    $ui->setModel( $this->model );

    if( 'true' == $params->fullLoad )
    {
      // if full send the complete form
      $ui->ajaxForm( $entityWbfsysMask, $params );
    }
    else
    {
      // else just send the text key
      $ui->textByKey( $entityWbfsysMask, $params );
    }

    // kein fehler, god by
    return null;

  }//end public function displayData */

}//end class WbfsysMask_Ajax_View

