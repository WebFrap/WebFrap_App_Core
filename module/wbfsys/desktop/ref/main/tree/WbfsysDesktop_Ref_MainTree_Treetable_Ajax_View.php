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
class WbfsysDesktop_Ref_MainTree_Treetable_Ajax_View
  extends LibTemplateAjaxView
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
  *
  * @return null / Error im Fehlerfall
  */
  public function displaySearch( $objid, $params )
  {
  
    $access = $params->accessMainTree;

    if( !$params->refId )
      $params->refId = $objid;

    // create the form action
    if( !$params->searchFormAction )
    {
      $params->searchFormAction = $this->buildSearchFormAction
      (
        'index.php?c=Wbfsys.Desktop_Ref_MainTree.search&amp;objid='.$params->refId,
        $params
      );
    }

    // add the id to the form
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-treetable-wbfsys_desktop-ref-main_tree-search-'.$objid;

    $data = $this->model->search( $objid, $access, $params );

    $ui  = $this->loadUi( 'WbfsysDesktop_Ref_MainTree_Treetable' );
    $ui->setModel( $this->model );

    // ein neues listenelement beantragen
    $listElement = $ui->getListItem
    ( 
      $objid, 
      $data, 
      $access, 
      $params 
    );

    // insert mode means, that the element only creates the raw item markup
    // without the layout container
    $listElement->insertMode = false;

    // make shure that element is embeded in the ajax response
    if( $params->ajax )
      $listElement->refresh = true;

    if( $params->append )
    {
      $listElement->setAppendMode( true );
      $listElement->buildAjax();

      // sync the columnsize after appending new entries
      if( $params->ajax )
      {
        $jsCode = <<<WGTJS

  \$S('table#{$listElement->id}-table').grid('syncColWidth').grid('reColorize');

WGTJS;
        $this->tplEngine->addJsCode( $jsCode );
      }

    }
    else
    {
      // if this is an ajax request and we replace the body, we need also
      // to change the displayed found "X" entries in the footer
      if( $params->ajax )
      {

        $dSize = (int)$listElement->dataSize;

        $jsCode = <<<WGTJS

  \$S('table#{$listElement->id}-table').grid('setNumEntries', {$dSize}).grid('syncColWidth').grid('reColorize');

WGTJS;

        $this->tplEngine->addJsCode( $jsCode );

      }

      $listElement->buildHtml();
    }

    // alles ok, also geben wir keinen fehler zurück
    return null;

  }//end public function displaySearch */

 /**
  * de:
  * Einfache insert methode.
  * Es wird ein neuer eintrag für das listenelement erstellt und über
  * das ajax interface in die liste gepusht
  *
  * @param TFlag $params benamte parameter
  * @return null / Error im Fehlerfall
  */
  public function displayInsert( $params )
  {

    $ui = $this->loadUi( 'WbfsysDesktop_Ref_MainTree_Treetable' );
    $ui->setModel( $this->model );

    $ui->listEntry( $params->refId, $params->access, $params, true );

    // kein fehler? alles bestens
    return null;

  }//end public function displayInsert */

 /**
  * de:
  * Einfache insert methode.
  * Es wird ein neuer eintrag für das listenelement erstellt und über
  * das ajax interface in die liste gepusht
  *
  * @param TFlag $params benamte parameter
  * @return null / Error im Fehlerfall
  */
  public function displayUpdate( $params )
  {

    $ui = $this->loadUi( 'WbfsysDesktop_Ref_MainTree_Treetable' );
    $ui->setModel( $this->model );

    $ui->listEntry( $params->refId, $params->access, $params, false);

    // kein fehler? alles bestens
    return null;

  }//end public function displayUpdate */

 /**
  * de: entfernen eines eintrags aus dem listenelement
  *
  * @param int $objid die rowid des gelöschten listenelements
  * @param TFlag $params benamte parameter
  * @return null / Error im Fehlerfall
  */
  public function displayDelete( $objid, $params )
  {

    // if we got a target id we remove the element from the client
    if( $params->targetId )
    {
      $ui = $this->loadUi( 'WbfsysDesktop_Ref_MainTree_Treetable' );

      $ui->setModel( $this->model );
      $ui->removeListEntry( $objid, $params->targetId );
    }

    // kein fehler? alles bestens
    return null;

  }//end public function displayDelete */

}//end class WbfsysDesktop_Ref_MainTree_Treetable_Ajax_View

