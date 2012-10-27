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
class WbfsysMenuEntry_Treetable_Ajax_View
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
        'index.php?c=Wbfsys.MenuEntry.search',
        $params
      );
    }

    $result  = $this->model->search( $access, $params );

    ///@var WbfsysMenuEntry_Treetable_Ui
    $ui    = $this->loadUi( 'WbfsysMenuEntry_Treetable' );
    $ui->setModel( $this->model );
    $ui->createListItem( $result, $access, $params );

    return null;

  }//end public function displaySearch */

 /**
  * de:
  * Einfache insert methode.
  * Es wird ein neuer eintrag für das listenelement erstellt und über
  * das ajax interface in die liste gepusht
  *
  * @param TFlag $params benamte parameter
  * @return boolean
  */
  public function displayInsert( $params )
  {

    ///@var WbfsysMenuEntry_Treetable_Ui
    $ui = $this->loadUi( 'WbfsysMenuEntry_Treetable' );
    $ui->setModel( $this->model );

    $ui->listEntry( $params->access, $params, true );

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
  * @return boolean
  */
  public function displayUpdate( $params )
  {

    ///@var WbfsysMenuEntry_Treetable_Ui
    $ui = $this->loadUi( 'WbfsysMenuEntry_Treetable' );
    $ui->setModel( $this->model );

    $ui->listEntry( $params->access, $params, false );

    // kein fehler? alles bestens
    return null;

  }//end public function displayUpdate */

 /**
  * de: entfernen eines eintrags aus dem listenelement
  *
  * @param int $objid die rowid des gelöschten listenelements
  * @param TFlag $params benamte parameter
  * @return boolean
  */
  public function displayDelete( $objid, $params )
  {

    // if we got a target id we remove the element from the client
    if( $params->targetId )
    {
      ///@var WbfsysMenuEntry_Treetable_Ui
      $ui = $this->loadUi( 'WbfsysMenuEntry_Treetable' );

      $ui->setModel( $this->model );
      $ui->removeListEntry( $objid, $params->targetId );
    }

    // kein fehler? alles bestens
    return null;

  }//end public function displayDelete */

}//end class WbfsysMenuEntry_Treetable_Ajax_View

