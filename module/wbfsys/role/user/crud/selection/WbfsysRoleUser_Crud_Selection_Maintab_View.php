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
 * de:
 * View Klasse zum erstellen eines Maintab Elements
 * @tutorial <a href="http://webfrap.net/doc/{{version}}/index.php?page=architecture.views.overview" >Tutorial Viewtypes</a>
 *
 * Diese Klasse enthält die Logik zur Erstellung eines Maintab Element + Menü
 * für das Listenelement der System User
 *
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysRoleUser_Crud_Selection_Maintab_View
  extends WgtMaintab
{
////////////////////////////////////////////////////////////////////////////////
// attributes
////////////////////////////////////////////////////////////////////////////////

    /**
    * @var WbfsysRoleUser_Crud_Selection_Model
    */
    public $model = null;

////////////////////////////////////////////////////////////////////////////////
// list display methodes
////////////////////////////////////////////////////////////////////////////////

 /**
  * View Methode zum Erstellen des Listing Elements und eines Suchformulars
  *
  * @param WbfsysRoleUser_Crud_Selection_Query $listingData Daten
  * @param WbfsysRoleUser_Crud_Selection_Access $access Zugriffscontainer
  * @param TFlag $params benamte parameter diverse Controll Flow Flags
  * 
  * @return null|Error im Fehlerfall
  */
  public function displayListing( $listingData, $access, $params )
  {

    // setzen des templates
    $this->setTemplate( 'wbfsys/role_user/maintab/table/listing_selection' );

    // fetch the i18n text only one time
    $i18nText = $this->i18n->l
    (
      'Selection System User',
      'wbfsys.role_user.label'
    );

    // setzen des Tabl Labels, sowie den Titel des Tab Title panels
    $this->setLabel( $i18nText );
    $this->setTitle( $i18nText );

    /// addMenu erstellt das dropdown menü und schiebt es dann in die view
    $this->addMenuListing( $params );
    $this->addActionsListing( $params );


    $ui = $this->loadUi( 'WbfsysRoleUser_Crud_Seletion' );

    // Das Listenelement wird erstellt
    // ACLs werden im Model weiter ausgewertet
    $ui->createListItem
    (
      $listingData,
      $access,
      $params
    );

    // kein fehler aufgetreten?
    // na dann ist ja bestens :-)
    return null;

  }//end public function displayListing */

////////////////////////////////////////////////////////////////////////////////
// context table
////////////////////////////////////////////////////////////////////////////////

  /**
   * Das Menü Objekt erstellen und direkt bauen
   *
   * @param TFlag $params benamte parameter
   */
  public function addMenuListing( $params )
  {

    $menu = $this->newMenu
    (
      $this->id.'_dropmenu',
      'WbfsysRoleUser_Crud_Selection'
    );

    // wir übernehmen einfach die ID des Maintabs und hängen dropmenu dran
    $menu->id = $this->id.'_dropmenu';
    $menu->buildMenu( $params );

    return true;

  }//end public function addMenuListing */

  /**
   * de:
   * In dieser Methode wird die Javascript Logik für das Maintab Element dynamisch
   * generiert
   *
   * Relevant für den Umfang sind die übergebenen Parameter und die ACLs
   *
   * @param TFlag $params benamte parameter
   * {
   *   string searchFormId: the id of the search form;
   *   LibAclContainer access: Container mit den aktiven ACL Informationen
   * }
   */
  public function addActionsListing( $params )
  {


    // die logik wird über klassen auf and die Buttons gebunden
    // das ermöglich es auch eine aktion direkt an mehr als nur einen
    // button zu binden
    // Ein weiterer Vorteil is, dass kein Javascript im Markup vorhanden sein
    // muss
    $code = <<<BUTTONJS

    // close tab
    self.getObject().find(".wgtac_close").click(function(){
      self.close();
    });

BUTTONJS;

    $this->addJsCode( $code );

  }//end public function addActionsListing */

}//end class WbfsysRoleUser_Crud_Selection_Maintab_View

