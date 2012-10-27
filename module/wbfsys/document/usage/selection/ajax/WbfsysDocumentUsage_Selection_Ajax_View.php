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
class WbfsysDocumentUsage_Selection_Ajax_View
  extends LibTemplateAjaxView
{
 /**
  * add the table item
  * add the search field elements
  *
  * @param TFlag $params
  * @return boolean
  */
  public function displaySearch( $params )
  {

    $access = $params->access;
  
    // create the form action
    if( !$params->searchFormAction )
    {
      $params->searchFormAction = $this->buildSearchFormAction
      (
        'index.php?c=Wbfsys.DocumentUsage.filter',
        $params
      );
    }

    // add the id to the form
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-selection-wbfsys_document_usage-search';

    // create ui
    $ui      = $this->loadUi( 'WbfsysDocumentUsage_Selection' );
    $ui->setModel( $this->model );

    $result  =  $this->model->search( $access, $params );

    $ui->createListItem( $result, $access, $params );

    return null;

  }//end public function displaySearch */

}//end class WbfsysDocumentUsage_Selection_Ajax_View
