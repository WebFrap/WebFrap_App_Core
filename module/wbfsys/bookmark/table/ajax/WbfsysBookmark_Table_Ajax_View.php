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
class WbfsysBookmark_Table_Ajax_View
  extends LibTemplateAjaxView
{
 /**
  * de:
  * behandeln einer suchanfrage vom client
  * alles in allem recht unspektakulär, das ui element für die tabelle
  * wird geladen, mit daten befüllt und mit refresh als pushabel area objekt
  * direkt der ajax template engine übergeben
  *
  * @param TFlag $params
  * @return null|Error im Fehlerfall
  */
  public function displaySearch( $params )
  {
  
    $access = $params->access;

    $ui    = $this->loadUi( 'WbfsysBookmark_Table' );
    $ui->setModel( $this->model );
    $ui->createListItem
    (
      $this->model->search( $access, $params ),
      $access,
      $params
    );

    // keine fehler? bestens
    // exceptions werden fallen gelassen
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

    $ui = $this->loadUi( 'WbfsysBookmark_Table' );
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

    $ui = $this->loadUi( 'WbfsysBookmark_Table' );
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
      $ui = $this->loadUi( 'WbfsysBookmark_Table' );

      $ui->setModel($this->model);
      $ui->removeListEntry( $objid, $params->targetId );
    }

    // kein fehler? alles bestens
    return null;

  }//end public function displayDelete */

 /**
  * Remove a selection of elements from the list
  *
  * @param [int] $ids die rowid des gelöschten listenelements
  * @param TFlag $params benamte parameter
  *
  * @return void
  */
  public function displayDeleteSelection( $ids, $params )
  {

    // if we got a target id we remove the element from the client
    if( $params->targetId )
    {
      $ui = $this->loadUi( 'WbfsysBookmark_Table' );

      $ui->setModel($this->model);
      $ui->removeListEntries( $ids, $params->targetId );
    }

  }//end public function method_displayDeleteSelection */

 /**
  * Remove all list entries from the table body
  *
  * @param TFlag $params some named parameters
  *
  * @return void
  */
  public function displayDeleteAll( $params )
  {

    // if we got a target id we remove the element from the client
    if( $params->targetId )
    {
      $ui = $this->loadUi( 'WbfsysBookmark_Table' );

      $ui->setModel( $this->model );
      $ui->cleanListBody( $params->targetId );
    }

  }//end public function displayDeleteAll */

}//end class WbfsysBookmark_Table_Ajax_View

