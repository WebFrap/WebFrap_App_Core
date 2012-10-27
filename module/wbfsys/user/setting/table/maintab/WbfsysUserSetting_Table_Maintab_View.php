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
 * für das Listenelement der 
 *
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysUserSetting_Table_Maintab_View
  extends WgtMaintab
{
////////////////////////////////////////////////////////////////////////////////
// attributes
////////////////////////////////////////////////////////////////////////////////
    
    /**
    * @var WbfsysUserSetting_Table_Model
    */
    public $model = null;

    /**
    * @var WbfsysUserSetting_Table_Ui
    */
    public $ui = null;

////////////////////////////////////////////////////////////////////////////////
// list display methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * de:
  *
  * View Methode zum Erstellen des Listing Elements und eines Suchformulars
  *
  * @param TFlag $params benamte parameter
  * @return boolean
  */
  public function displayListing( $params )
  {

    // laden der benötigten resourcen
    $request = $this->getRequest();

    $access = $params->access;
    
    // setzen des templates
    $this->setTemplate( 'wbfsys/user_setting/maintab/table/listing_table' );

    // fetch the i18n text only one time
    $i18nText = $this->i18n->l
    (
      'Table User Settings',
      'wbfsys.user_setting.label'
    );
    
    // fetch the i18n text only one time
    $i18nLabel = $this->i18n->l
    (
      'User Settings',
      'wbfsys.user_setting.label'
    );
    
    // Setzen der Bookmark informationen
    $this->setBookmark
    (
      $i18nText,
      'maintab.php?c=Wbfsys.UserSetting.listing&amp;ltype=table'
    );

    // setzen des Tabl Labels, sowie den Titel des Tab Title panels
    $this->setLabel( $i18nLabel );
    $this->setTitle( $i18nLabel );

    // such formular ID und Aktion müssen gesetzt werden
    // sie können von auserhalb übergeben werden, wenn nicht vorhanden
    // muss eine standard action sowie eine standard id gesetzt werden
    if( !$params->searchFormAction )
      $params->searchFormAction = 'index.php?c=Wbfsys.UserSetting.search';

    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_user_setting-search';

    // set search form erweitert die Action anhand der in params mit
    // übergebene flags und schiebt formAction und formId in den VAR index
    // der aktuellen view
    $this->setSearchFormData( $params );



    // über publish kann definiert werden, dass mit dem schliesen des listen
    // elements der inhalt eines bestimmten UI-Elements neu geladen werden muss
    // Diese Feature wird unter anderem dazu verwendet editierbare Selectboxen
    // zu erstellen
    // target, field and targetId. If not this was an invalid request
    if( 'selectbox' === $params->publish )
    {

      $onClose = <<<BUTTONJS

      \$R.get('ajax.php?c={$params->target}.item&amp;field={$params->field}&amp;target_id={$params->targetId}');

BUTTONJS;

      // on close the calling selectbox has to be updated
      $this->addEvent( 'onclose' , 'refreshSelectbox' , $onClose );

      // clean the targetId to no affect the id of the table
      $params->targetId = null;
    }
    
    // filter auswerten die mitgeschickt werden können
    $condition = array();

    
    $ui = $this->loadUi( 'WbfsysUserSetting_Table' );

    // Das Listenelement wird erstellt
    // ACLs werden im Model weiter ausgewertet
    $tableElement = $ui->createListItem
    (
      $this->model->search( $access, $params, $condition ),
      $access,
      $params
    );

    // Das Suchformular wird erstellt
    $ui->searchForm
    (
      $this->model,
      $params
    );


    /// addMenu erstellt das dropdown menü und schiebt es dann in die view
    $this->addMenuListing( $params );
    $this->addActionsListing( $tableElement, $params );
    
    // kein fehler aufgetreten?
    // na dann ist ja bestens :-)
    return null;

  }//end public function displayListing */

////////////////////////////////////////////////////////////////////////////////
// context table
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * de:
   *
   * Das Menü Objekt erstellen und direkt bauen
   *
   * @param TFlag $params benamte parameter
   */
  public function addMenuListing( $params )
  {

    $menu     = $this->newMenu
    (
      $this->id.'_dropmenu',
      'WbfsysUserSetting_Table'
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
  public function addActionsListing( $table, $params )
  {

    // en:
    // add the button actions for new and search in the window
    // the code will be binded direct on a window object and is removed
    // on window Close
    // all buttons with the class save will call that action

    // de:
    // die logik wird über klassen auf and die Buttons gebunden
    // das ermöglich es auch eine aktion direkt an mehr als nur einen
    // button zu binden
    // Ein weiterer Vorteil is, dass kein Javascript im Markup vorhanden sein
    // muss
    
    $bookmark = '';
    if( $this->bookmark )
    {
      $title = SFormatStrings::cleanCC( $this->bookmark['title'] );
      $bookmark = <<<BUTTONJS
    self.getObject().find('.wgtac_bookmark').click(function(){
      var requestData  = {
         'wbfsys_bookmark[url]':'{$this->bookmark['url']}',
         'wbfsys_bookmark[title]':'{$title}'
      };
      \$R.post('ajax.php?c=Webfrap.Bookmark.add',requestData);
    });
BUTTONJS;

    }
    
    
    $code = <<<BUTTONJS
    
{$bookmark}

    // close tab
    self.getObject().find(".wgtac_close").click(function(){
      \$S('#{$this->id}_dropmenu-control').dropdown('remove');
      self.close();
    });
    
    self.getObject().find(".wgtac_back_to_desktop").click(function(){
      self.close();
      \$S('#wgt-maintab_tab_wgt-ui-desktop a').click();
    });

    
    
    
    self.getObject().find(".wgtac_search").click(function(){
      \$R.form('{$params->searchFormId}', null, {search:true});
    });

    self.getObject().find(".wgtac_view_table").click(function(){
      \$S('#{$this->id}_dropmenu-control').dropdown('remove');
      self.close();
      \$R.get('maintab.php?c=Wbfsys.UserSetting.listing&amp;ltype=table');
    });

    self.getObject().find(".wgtac_view_treetable").click(function(){
      \$S('#{$this->id}_dropmenu-control').dropdown('remove');
      self.close();
      \$R.get('maintab.php?c=Wbfsys.UserSetting.listing&amp;ltype=treetable');
    });


    {$table->buildContextLogic()}

BUTTONJS;


    // create code wird ohne creatbutton auch nicht benötigt
    if( $params->access->insert )
    {
      $code .= <<<BUTTONJS
    self.getObject().find(".wgtac_new").click(function(){
       \$S('#{$this->id}_dropmenu-control').dropdown('close');
       \$R.get('maintab.php?c=Wbfsys.UserSetting.create&amp;ltype=table');
    });

BUTTONJS;

    }



    $this->addJsCode( $code );

  }//end public function addActionsListing */

}//end class WbfsysUserSetting_Table_Maintab_View

