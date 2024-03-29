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
class WbfsysBrowserVersion_Table_Ui
  extends Ui
{
////////////////////////////////////////////////////////////////////////////////
// Listing Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * de:
  *
  * Konfiguration eines Listenelements mit Suche für Browser Versions
  *
  * @param LibSqlQuery $data
  * @param LibAclContainer $access
  * @param TFlag $params named parameters
  * {
  *   // Parameter die ausgewertet werden, oder weitergeleitet
  *
  *   @param: int start, Offset für die Listenelemente. Wird absolut übergeben und nicht
  *     mit multiplikator ( 50 anstelle von <strike>5 mal listengröße</strike> )
  *
  *   @param: int qsize, Die Anzahl der zu Ladenten Einträge. Momentan wird alles > 500 auf 500 gekappt
  *     alles kleiner 0 wird auf den standardwert von aktuell 25 gesetzt
  *
  *   @param: array(string fieldname => string [asc|desc] ) order, Die Daten für die Sortierung
  *
  *   @param: char begin, Mit Begin wird ein Buchstabe übergeben, der verwendet wird die Listeelemente
  *     nach dem Anfangsbuchstaben zu filtern. Kann im Prinzip jedes beliebige Zeichen, also auch eine Zahl sein
  *
  *   @param: ckey target_id, Die HTML Id, des Zielelements. Diese ID is wichtig, wenn das HTML Element
  *     in dem das Suchergebniss platziert werden soll, eine andere ID als die in der Methode hinterlegt
  *     Standard HTML ID hat
  *
  *   @param: array listingActions, Ein Array welcher die Namen der Aktionen enthält
  *     die angezeigt werden sollen. Diese Aktionen werden direkt gesetzten.
  *     Vorsicht, ACLs mit dem Level > Access haben dann keine Wirkung mehr
  *
  *   @param: ckey searchFormId, Die HTML ID des Suchformulars, welches mit dem Listenelement
  *     verbunden ist.
  *     Auf diesem Formular TAG werden im Client alle für das Element relevanten Metadaten, z.B Daten zum Paging
  *     Sortierung etc. per jQuery.data() abgelegt
  *
  *   @param: boolean ajax, Ist true wenn die Anfrage über ein AJAX Interface gekommen ist, welches
  *     das Element als TemplateArea form und nicht als gerendertes HTML haben möchte
  *
  *   @param: boolean append, Append macht nur in Verbindung mit AJAX Request einen Sinn.
  *     Durch das Appendflag wird das HTML Element angewiesen den Inhalt des Listenelements im Browser
  *     um die gefundenen Einträge zu erweitern. Standard wäre alles im Body zu ersetzen
  *
  *
  *   @param: LibAclContainer access, Der Haupt-ACL-Container
  *  }
  *
  * @return WbfsysBrowserVersion_Table_Element
  */
  public function createListItem( $data, $access, $params  )
  {

    // laden der passenden view
    $view = $this->getView();

    // Erstellen des Template Elements
    $table = new WbfsysBrowserVersion_Table_Element( 'tableWbfsysBrowserVersion', $view );

    // die daten direkt dem element übergeben
    $table->setData( $data );

    // den access container dem listenelement übergeben
    $table->setAccess( $access );
    $table->setAccessPath( $params, $params->aclKey, $params->aclNode );

    // set the offset to set the paging menu correct
    $table->start    = $params->start;

    // set the position for the size menu
    $table->stepSize = $params->qsize;

    // check if there is a filter for the first char
    if( $params->begin )
      $table->begin = $params->begin;

    // if there is a given tableId for the html id of the the table replace
    // the default id with it
    if( $params->targetId )
      $table->setId( $params->targetId );

    // definieren der aktions
    // Der Access / ACL Check wird im Menubuilder in relation zu Datensatz
    // durchgeführt
    $actions = array();
    // wenn editieren nicht erlaubt ist geht zumindest das anzeigen    $actions[] = 'show';
    $actions[] = 'edit';
    $actions[] = 'sep';
    $actions[] = 'ref';

    $actions[] = 'sep';
    $actions[] = 'delete';

    $table->addActions( $actions );

    // for paging use the default search form, to enshure to keep the order
    // and to page in search results if there was any search

    // Die ID des Suchformulars wir für das Paging benötigt, details, siehe apidoc
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_browser_version-search';

    $table->setPagingId( $params->searchFormId );


    if( 'ajax' != $view->type )
    {
    
      // Über Listenelemente können Eigene Panelcontainer gepackt werden
      // hier verwenden wir ein einfaches Standardpanel mit Titel und
      // simplem Suchfeld
      $tabPanel = new WgtPanelTable( $table );
  
      //$tabPanel->title = $view->i18n->l( 'Browser Versions', 'wbfsys.browser_version.label' );
      //$tabPanel->searchKey = 'wbfsys_browser_version';
  
      // display the toggle button for the extended search
      //$tabPanel->advancedSearch = true;

      // search element im maintab
      $searchElement = $view->setSearchElement( new WgtPanelElementSearch_Splitted( $table ) );
      $searchElement->searchKey = 'wbfsys_browser_version';
      $searchElement->advancedSearch = true;
      $searchElement->focus = true;
      $searchElement->context = 'table';
      

    }
    

    // run build
    if( $params->ajax )
    {
      // set refresh to true, to embed the content of this element inside
      // of the ajax.tpl index as "htmlarea"
      $table->refresh    = true;

      // the table should only replace the content inside of the container
      // but not the container itself
      $table->insertMode = false;
    }

    if( $params->append  )
    {
      $table->setAppendMode( true );
      $table->buildAjax();

      // sync the columnsize after appending new entries
      if( $params->ajax )
      {
        $jsCode = <<<WGTJS

  \$S('table#{$table->id}-table').grid('reColorize').grid('syncColWidth');
  
WGTJS;
        $view->addJsCode( $jsCode );
      }

    }
    else
    {
      // if this is an ajax request and we replace the body, we need also
      // to change the displayed found "X" entries in the footer
      if( $params->ajax )
      {
        $jsCode = <<<WGTJS

  \$S('table#{$table->id}-table').grid('reColorize').grid('syncColWidth').grid('setNumEntries', {$table->dataSize});

WGTJS;

        $view->addJsCode( $jsCode );

      }

      $table->buildHtml();
    }

    return $table;

  }//end public function createListItem */

 /**
  * just deliver changed table rows per ajax interface
  *
  * @param TFlag $params named parameters
  * {
  *   // Parameter die ausgewertet werden, oder weitergeleitet
  *
  *   @param: int start, Offset für die Listenelemente. Wird absolut übergeben und nicht
  *     mit multiplikator ( 50 anstelle von <strike>5 mal listengröße</strike> )
  *
  *   @param: int qsize, Die Anzahl der zu Ladenten Einträge. Momentan wird alles > 500 auf 500 gekappt
  *     alles kleiner 0 wird auf den standardwert von aktuell 25 gesetzt
  *
  *   @param: array(string fieldname => string [asc|desc] ) order, Die Daten für die Sortierung
  *
  *   @param: char begin, Mit Begin wird ein Buchstabe übergeben, der verwendet wird die Listeelemente
  *     nach dem Anfangsbuchstaben zu filtern. Kann im Prinzip jedes beliebige Zeichen, also auch eine Zahl sein
  *
  *   @param: ckey target_id, Die HTML Id, des Zielelements. Diese ID is wichtig, wenn das HTML Element
  *     in dem das Suchergebniss platziert werden soll, eine andere ID als die in der Methode hinterlegt
  *     Standard HTML ID hat
  *
  *   @param: array listingActions, Ein Array welcher die Namen der Aktionen enthält
  *     die angezeigt werden sollen. Diese Aktionen werden direkt gesetzten.
  *     Vorsicht, ACLs mit dem Level > Access haben dann keine Wirkung mehr
  *
  *   @param: ckey searchFormId, Die HTML ID des Suchformulars, welches mit dem Listenelement
  *     verbunden ist.
  *     Auf diesem Formular TAG werden im Client alle für das Element relevanten Metadaten, z.B Daten zum Paging
  *     Sortierung etc. per jQuery.data() abgelegt
  *
  *   @param: boolean ajax, Ist true wenn die Anfrage über ein AJAX Interface gekommen ist, welches
  *     das Element als TemplateArea form und nicht als gerendertes HTML haben möchte
  *
  *   @param: boolean append, Append macht nur in Verbindung mit AJAX Request einen Sinn.
  *     Durch das Appendflag wird das HTML Element angewiesen den Inhalt des Listenelements im Browser
  *     um die gefundenen Einträge zu erweitern. Standard wäre alles im Body zu ersetzen
  *
  *
  *   @param: LibAclContainer access, Der Haupt-ACL-Container
  * }
  * @param boolean [default=false] $insert
  * @return void
  */
  public function listEntry( $access, $params, $insert = false  )
  {

    $view  = $this->getView();

    $table = new WbfsysBrowserVersion_Table_Element( null,$view );
    $table->addData( $this->model->getEntryData( $params ) );

    // den access container dem listenelement übergeben
    $table->setAccess( $access );
    $table->setAccessPath( $params, $params->aclKey, $params->aclNode );

    // if a table id is given use it for the table
    if( $params->targetId )
      $table->id = $params->targetId;
  
    // definiert die actions im table menü sowie deren reihenfolge
    // acls werden im ui element in relation zum datensatz geprüft
    $actions = array();
    // wenn editieren nicht erlaubt ist geht zumindest das anzeigen
    $actions[] = 'show';
    $actions[] = 'edit';
    $actions[] = 'rights';
    $actions[] = 'sep';
    $actions[] = 'ref';
    $actions[] = 'sep';
    $actions[] = 'delete';
    $table->addActions( $actions );
    
    // wenn true wird der datensatz im body angehängt, bei false
    // wird versucht einen vorhandenen zu ersetzen
    $table->insertMode = $insert;

    if( !$params->noParse )
      $view->setAreaContent( 'tabRowWbfsysBrowserVersion', $table->buildAjax() );

    if( $insert )
    {
      $jsCode = <<<WGTJS

  \$S('table#{$table->id}-table').grid('reColorize').grid('incEntries');

WGTJS;
    }
    else
    {
      $jsCode = <<<WGTJS

  \$S('table#{$table->id}-table').grid('reColorize');

WGTJS;
    }

    $view->addJsCode( $jsCode );

    return $table;

  }// end public function listEntry */

  /**
   * Entfernen eines eintrags aus einem listenelement über die id des datensatzes
   * und der htmlid des listen elements
   * Logik wird in javascript implementiert und über das ajax interface
   * zum client transportiert
   *
   * @param string $key die rowid des zu entfernende listeitrags
   * @param string $itemId die HTML id des listen elements
   *
   * @return void
   */
  public function removeListEntry( $key, $itemId  )
  {

    $view = $this->getView();

    $code = <<<JSCODE

    \$S('#{$itemId}-table tr.node-{$key}').fadeOut(100,function(){\$S('#{$itemId}-table tr.node-{$key}').remove();});
    \$S('#{$itemId}-table').grid('decEntries');
JSCODE;

    // logik wird direkt in die view gekippt
    $view->addJsCode($code);

  }//end public function removeListEntry */

  /**
   * Entfernen eines eintrags aus einem listenelement über die id des datensatzes
   * und der htmlid des listen elements
   * Logik wird in javascript implementiert und über das ajax interface
   * zum client transportiert
   *
   * @param string $key die rowid des zu entfernende listeitrags
   * @param string $itemId die HTML id des listen elements
   *
   * @return void
   */
  public function removeListEntries( $ids, $itemId  )
  {

  	$numEntries = count( $ids );
  	
  	// combine the ids to one big selector
  	$selector = "#{$itemId}-table tr.node-".implode( ",#{$itemId}-table tr.node-{$key}", $ids );
  
    $view = $this->getView();

    $code = <<<JSCODE

    \$S('{$selector}').fadeOut(100,function(){\$S('{$selector}').remove();});
    \$S('#{$itemId}-table').grid( 'decEntries', $numEntries );
JSCODE;

    // logik wird direkt in die view gekippt
    $view->addJsCode( $code );

  }//end public function removeListEntries */

  /**
   * Remove all entries from the list
   *
   * @param string $itemId die HTML id des listen elements
   *
   * @return void
   */
  public function cleanListBody( $itemId  )
  {

    $view = $this->getView();

    $code = <<<JSCODE

    \$S('#{$itemId}-table tr').remove();
    \$S('#{$itemId}-table').grid('setNumEntries', 0)
JSCODE;

    // logik wird direkt in die view gekippt
    $view->addJsCode( $code );

  }//end public function cleanListBody */

  /**
   * de:
   * Zusammenstellen aller benötigten InputElement für ein Suchformular auf
   * die WbfsysBrowserVersion listing maske
   *
   * @param WbfsysBrowserVersion_Table_Model $model
   * @param TFlag $params
   * @return void
   */
  public function searchForm( $model, $params = null )
  {

    // laden der benötigten resourcen
    $view           = $this->getView();
    $searchFields  = $model->getSearchFields();

    $entityWbfsysBrowserVersion  = $model->getEntityWbfsysBrowserVersion();

    $formWbfsysBrowserVersion    = $view->newForm( 'WbfsysBrowserVersion' );
    $formWbfsysBrowserVersion->setNamespace( 'WbfsysBrowserVersion' );
    $formWbfsysBrowserVersion->setPrefix( 'WbfsysBrowserVersion' );
    $formWbfsysBrowserVersion->setKeyName( 'wbfsys_browser_version' );
    $formWbfsysBrowserVersion->createSearchForm
    (
      $entityWbfsysBrowserVersion,
      ( isset($searchFields['wbfsys_browser_version'])?$searchFields['wbfsys_browser_version']:array() )
    );


  }//end public function searchForm */

}//end class WbfsysBrowserVersion_Table_Ui

