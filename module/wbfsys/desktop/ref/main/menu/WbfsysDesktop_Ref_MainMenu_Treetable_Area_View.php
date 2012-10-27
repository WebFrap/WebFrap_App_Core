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
class WbfsysDesktop_Ref_MainMenu_Treetable_Area_View
  extends LibTemplateAreaView
{
////////////////////////////////////////////////////////////////////////////////
// listing methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * add the table item
  * add the search field elements
  *
  * @param int $objid the id of the reference dataset
  * @param TFlag $params
  * @return null / Error im Fehlerfall
  */
  public function displayTab( $objid, $params )
  {
  
    $access = $params->accessMainMenu;

    if(!$params->refId)
      $params->refId = $objid;

    // create the form action
    if( !$params->searchFormAction )
      $params->searchFormAction = 'index.php?c=Wbfsys.Desktop_Ref_MainMenu.search&amp;ltype=treetable&amp;objid='.$params->refId;

    // add the id to the form
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-treetable-wbfsys_desktop-ref-main_menu-search-'.$objid;


    // fill the relevant data for the search form
    $this->setSearchFormData( $params, 'MainMenu' );

    // set the default table template
    $this->setTemplate( 'wbfsys/desktop/ref_main_menu/tab_treetable' );

    $ui = $this->loadUi( 'WbfsysDesktop_Ref_MainMenu_Treetable' );
    $ui->setModel( $this->model );

    // inject the table item in the template system
    $ui->createListItem
    (
      $params->refId,
      $this->model->search( $objid, $access, $params ),
      $access,
      $params
    );

    // inject the search fields for the table context to the template system
    $ui->searchForm
    (
      $objid,
      $this->model,
      $params
    );

    // kein fehler? alles klar
    return null;

  }//end public function displayTab */

}//end class WbfsysDesktop_Ref_MainMenu_Treetable_Area_View

