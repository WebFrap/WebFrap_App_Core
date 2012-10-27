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
class WbfsysRoleUser_Crud_Selection_Ui
  extends Ui
{
////////////////////////////////////////////////////////////////////////////////
// Listing Methodes
////////////////////////////////////////////////////////////////////////////////

 /**
  * Konfiguration eines Listenelements mit Suche für System User
  *
  * @param WbfsysRoleUser_Crud_Selection_Query $data
  * @param WbfsysRoleUser_Crud_Selection_Access $access
  * @param TFlag $params named parameters
  * {
  *   // Parameter die ausgewertet werden, oder weitergeleitet
  *   @param: ckey target_id, Die HTML Id, des Zielelements. Diese ID is wichtig, wenn das HTML Element
  *     in dem das Suchergebniss platziert werden soll, eine andere ID als die in der Methode hinterlegt
  *     Standard HTML ID hat
  *
  *  }
  *
  * @return WbfsysRoleUser_Crud_Selection_Element
  */
  public function createListItem( $data, $access, $params  )
  {

    // laden der passenden view
    $view = $this->getView();

    // Erstellen des Template Elements
    $table = new WbfsysRoleUser_Crud_Selection_Element
    ( 
      'selectionWbfsysRoleUser', 
      $view 
    );

    // die daten direkt dem element übergeben
    $table->setData( $data );

    // den access container dem listenelement übergeben
    $table->setAccess( $access );
    $table->setAccessPath( $params, $params->aclKey, $params->aclNode );


    // if there is a given tableId for the html id of the the table replace
    // the default id with it
    if( $params->targetId )
      $table->setId( $params->targetId );

    // definieren der aktions
    // die prüfung welche actions jeweils erlaubt sind passiert dann im
    // menu builder
    $actions = array();

    // wenn editieren nicht erlaubt ist geht zumindest das anzeigen
    $actions[] = 'show';
    $actions[] = 'edit';

    $table->addActions( $actions );

    $table->buildHtml();

    return $table;

  }//end public function createListItem */

}//end class WbfsysRoleUser_Crud_Selection_Ui

