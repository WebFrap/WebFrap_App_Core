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
class WbfsysManagementReference_Selection_Ui
  extends Ui
{
////////////////////////////////////////////////////////////////////////////////
// selection methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * de:
  * Erstellen des Listenelements für die das Auswahlfenster
  * Die Daten werde per Query Objekt übergeben und direkt in das Element
  * gepusht
  *
  *
  * @param WbfsysManagementReference_Selection_Query $data
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
  * @return WbfsysManagementReference_Selection_Element
  */
  public function createListItem( $data, $access, $params  )
  {

    $view = $this->getView();

    $table = new WbfsysManagementReference_Selection_Element
    (
      'selectionWbfsysManagementReference',
      $view
    );
    
    // die id des Datensatzes von dem aus die selection in einer referenz
    // gecalled wurde
    $table->refId = $params->objid;
    
    // use the query as datasource for the table
    $table->setData( $data );

    // den access container dem listenelement übergeben
    $table->setAccess( $access );
    $table->setAccessPath( $params, $params->aclKey, $params->aclNode );

    // set the offset to set the paging menu correct
    $table->start  = $params->start;

    // set the position for the size menu
    $table->stepSize = $params->qsize;

    // if there is a given tableId for the html id of the the table replace
    // the default id with it
    if( $params->targetId )
      $table->setId( $params->targetId );

    // for paging use the default search form, to enshure to keep the order
    // and to page in search results if there was any search
    $table->setPagingId( $params->searchFormId );

    // refresh the table in ajax requests
    $table->insertMode = $params->insert;

    // set refresh to true, to embed the content of this element inside
    // of the ajax.tpl index as "htmlarea"
    if( $params->ajax )
      $table->refresh = true;

    // check if the listing actions where overwriten from outside
    // can happen in the view or the controller
    if( $params->listingActions )
    {
      $table->addActions( $params->listingActions );
    }
    else
    {
      // else the default action is connect
      $actions = array();
      $actions[] = 'connect_next';
      $actions[] = 'connect';

      $table->addActions( $actions );
    }
    
    // das panel bei ajax requests nicht erstellt
    if( 'ajax' != $view->type )
    {

      // create panel
      $tabPanel = new WgtPanelSelection( $table );
  
      $tabPanel->title = $this->view->i18n->l( 'Selection Management References', 'wbfsys.management_reference.label' ) ;
      $tabPanel->searchKey = 'wbfsys_management_reference';
  
      // display the toggle button for the extended search
      $tabPanel->advancedSearch = true;


    }

    // when input is set, then the selection targets a inputfield in a form
    // the system then send the text values and the id on selection
    if( $params->input )
    {

      $table->url['connect'] = array
      (
        Wgt::ACTION_JS,
        'connect' ,
        '$S(\'input#wgt-input-'.$params->input.'\').data(\'assign\')({$id})',
        'control/connect.png' ,
        '',
        'connect'
      );

    }
    else
    {

      $table->url['connect'] = array
      (
        Wgt::ACTION_JS,
        'Connect &amp; Close' ,
        '$S.modal.close();$S(\'#'.$params->target.'\').data(\'connect\')({$id})',
        'control/connect.png' ,
        '',
        'connect'
      );

      $table->url['connect_next'] = array
      (
        Wgt::ACTION_JS,
        'Connect' ,
        '$S(\'#'.$table->id.'_row_{$id}\').remove();$S(\'#'.$params->target.'\').data(\'connect\')({$id})',
        'control/connect.png' ,
        '',
        'connect'
      );

    }

    if( $params->input )
    {

      $loadParam = '';

      if( $params->fullLoad )
        $loadParam .= '&full_load=true';

      if( $params->keyName )
        $loadParam .= '&key_name='.$params->keyName;

      if( $params->suffix )
        $loadParam .= '&suffix='.$params->suffix;

      if( $params->context )
        $loadParam .= '&context='.$params->context;

      $loadParam .= '&input='.$params->input;

      $jsCode = <<<JS

    \$S('input#wgt-input-{$params->input}').data('assign',function( objid ){
      \$S('input#wgt-input-{$params->input}').val(objid);
      \$R.get( 'ajax.php?c=Wbfsys.ManagementReference.data{$loadParam}&objid='+objid );
      \$S.modal.close();
    });

JS;

      $view->addJsCode( $jsCode );
    }

    if( $params->append  )
    {
      $table->setAppendMode( true );
      
      // sync the columnsize after appending new entries
      if( $params->ajax )
      {
        $jsCode = <<<WGTJS

  \$S('table#{$table->id}-table').grid('reColorize').grid('syncColWidth');
  
WGTJS;
        $view->addJsCode( $jsCode );
      }
      
      $table->buildAjax();
    }
    else
    {
      $table->buildHtml();
    }

    return $table;

  }//end public function createListItem */

 /**
  * de:
  * Erstellen einer oder mehrere Ajax Areas zum hinzufügen oder anpassen von
  * Listeneinträgen im client
  *
  * @param LibAclContainer $params
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
  *  }
  * @param boolean [default=false] $insert
  *
  * @return WbfsysManagementReference_Selection_Element
  */
  public function listEntry( $access, $params, $insert = false  )
  {

    $view = $this->getView();

    $table = $view->newItem
    (
      'tabRowWbfsysManagementReference',
      'WbfsysManagementReference_Selection_Element'
    );

    $table->addData( $this->model->getEntryData( $params ) );

    // den access container dem listenelement übergeben
    $table->setAccess( $access );
    $table->setAccessPath( $params, $params->aclKey, $params->aclNode );

    // set the offset to set the paging menu correct
    $table->start  = $params->start;

    // set the position for the size menu
    $table->stepSize = $params->qsize;

    // if there is a given tableId for the html id of the the table replace
    // the default id with it
    if( $params->targetId )
      $table->setId( $params->targetId );

    // for paging use the default search form, to enshure to keep the order
    // and to page in search results if there was any search
    $table->setPagingId( $params->searchFormId );

    if( $params->listingActions )
    {
      $table->addActions( $params->listingActions );
    }
    else
    {
      $actions = array();
      $actions[] = 'connect_next';
      $actions[] = 'connect';

      $table->addActions( $actions );
    }


    if( $params->input )
    {

      $table->url['connect'] = array
      (
        Wgt::ACTION_JS,
        'connect' ,
        '$S(\'input#wgt-input-'.$params->input.'\').data(\'assign\')({$id})',
        'control/connect.png' ,
        '',
        'connect'
      );

    }
    else
    {

      $table->url['connect'] = array
      (
        Wgt::ACTION_JS,
        'Connect &amp; Close' ,
        '$S.modal.close();$S(\'#'.$params->target.'\').data(\'connect\')({$id})',
        'control/connect.png' ,
        '',
        'connect'
      );

      $table->url['connect_next'] = array
      (
        Wgt::ACTION_JS,
        'Connect' ,
        '$S(\'#'.$table->id.'_row_{$id}\').remove();$S(\'#'.$params->target.'\').data(\'connect\')({$id})',
        'control/connect.png' ,
        '',
        'connect'
      );

    }


    $table->insertMode = $insert;

    if( !$params->noParse )
      $view->setAreaContent( 'tabRowWbfsysManagementReference' , $table->buildAjax() );

    $jsCode = <<<WGTJS

  \$S('table#".$table->id."-table').grid('reColorize');

WGTJS;

    $view->addJsCode( $jsCode );

    return $table;

  }// end public function listEntry */

  /**
   * de:
   * Zusammenstellen aller benötigten InputElement für ein Suchformular auf
   * die WbfsysManagementReference listing maske
   *
   * @param WbfsysManagementReference_Selection_Model $model
   * @param TFlag $params
   * @return void
   */
  public function searchForm( $model, $params = null )
  {

    // laden der benötigten resourcen
    $view           = $this->getView();
    $searchFields  = $model->getSearchFields();

    $entityWbfsysManagementReference  = $model->getEntityWbfsysManagementReference();

    $formWbfsysManagementReference    = $view->newForm( 'WbfsysManagementReference' );
    $formWbfsysManagementReference->setNamespace( 'WbfsysManagementReference' );
    $formWbfsysManagementReference->setPrefix( 'WbfsysManagementReference' );
    $formWbfsysManagementReference->setKeyName( 'wbfsys_management_reference' );
    $formWbfsysManagementReference->createSearchForm
    (
      $entityWbfsysManagementReference,
      ( isset($searchFields['wbfsys_management_reference'])?$searchFields['wbfsys_management_reference']:array() )
    );


  }//end public function searchForm */

}//end class WbfsysManagementReference_Selection_Ui

