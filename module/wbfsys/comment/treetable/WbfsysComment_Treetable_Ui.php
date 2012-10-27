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
class WbfsysComment_Treetable_Ui
  extends Ui
{
////////////////////////////////////////////////////////////////////////////////
// listing methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * Erstellen des Treetable Items
   * mitsammt Panel und Advanced Search Form
   *
   * @param LibSqlQuery $data
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   *
   * @return WbfsysComment_Treetable
   */
  public function createListItem( $data, $access, $params  )
  {

    $view = $this->getView();

    // create tree table element and inject it directly in the view
    // by adding the view and a key as parameter for the constructor
    $treetable = new WbfsysComment_Treetable_Element
    (
      'treetableWbfsysComment',
      $view
    );

    // use the query as datasource for the table
    $treetable->setData( $data );

    // den access container dem listenelement übergeben
    $treetable->setAccess( $access );
    $treetable->setAccessPath
    (
      $params,
      $params->aclKey,
      $params->aclNode
    );


    // set the offset to set the paging menu correct
    $treetable->start    = $params->start;

    // set the position for the size menu
    $treetable->stepSize = $params->qsize;

    // check if there is a filter for the first char
    if( $params->begin )
      $treetable->begin    = $params->begin;

    // if there is a given tableId for the html id of the the table replace
    // the default id with it
    if( $params->targetId )
      $treetable->setId( $params->targetId );

    // check the access rights, depeding in the rights action buttons are
    // displayed or hidden
    if( !is_null( $params->listingActions ) )
    {
      $treetable->addActions( $params->listingActions );
    }
    else
    {

      $actions[] = 'show';
      $actions[] = 'edit';
      $actions[] = 'add';
      $actions[] = 'rights';

      $actions[] = 'sep';
      $actions[] = 'ref';
      $actions[] = 'sep';
      $actions[] = 'delete';

      $treetable->addActions( $actions );
    }

    // for paging use the default search form, to enshure to keep the order
    // and to page in search results if there was any search
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-treetable-wbfsys_comment-search';

    // the paging id is used to adress the form tag in the client that
    // stores the table status
    $treetable->setPagingId( $params->searchFormId );


    if( 'ajax' != $view->type )
    {
    
      // Über Listenelemente können Eigene Panelcontainer gepackt werden
      // hier verwenden wir ein einfaches Standardpanel mit Titel und
      // simplem Suchfeld
      $tabPanel = new WgtPanelTreetable( $treetable );
  
      //$tabPanel->title = $view->i18n->l( 'Comments', 'wbfsys.comment.label' );
      //$tabPanel->searchKey = 'wbfsys_comment';
  
      // display the toggle button for the extended search
      //$tabPanel->advancedSearch = true;

      // search element im maintab
      $searchElement = $view->setSearchElement( new WgtPanelElementSearch_Splitted( $treetable ) );
      $searchElement->searchKey = 'wbfsys_comment';
      $searchElement->advancedSearch = true;
      $searchElement->focus = true;
      

    }
    

    if( $params->ajax )
    {
      // refresh the table in ajax requests
      $treetable->refresh    = true;

      // the table should only replace the content inside of the container
      // but not the container itself
      $treetable->insertMode = false;
    }

    if( $params->append  )
    {
      $treetable->setAppendMode( true );
      $treetable->buildAjax();

      // sync the columnsize after appending new entries
      if( $params->ajax )
      {
        $jsCode = <<<WGTJS

  \$S('table#{$treetable->id}-table').grid('reColorize').grid('syncColWidth');

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

  \$S('table#{$treetable->id}-table').grid('setNumEntries', {$treetable->dataSize}).grid('reColorize').grid('syncColWidth');

WGTJS;

        $view->addJsCode( $jsCode );

      }

      $treetable->buildHtml();
    }

    return $treetable;

  }//end public function createListItem */

  /**
   * listEntry rendert die Datensätze einzeln, so dass updates pro Datensatz
   * über das Ajax Interface ausgeliefert werden können
   *
   * Wird bei Insert und Update Calls verwendet um die Tabelle zu aktualisieren.
   *
   * @param LibAclContainer $access
   * @param array $params named parameters
   * @param boolean [default=false] $insert Flag ob der der Datensatz erstellt
   *  oder nur geändert wurde
   *
   * @return WbfsysComment_Treetable_Element
   */
  public function listEntry( $access, $params, $insert = false )
  {

    $view = $this->getView();

    $treetable = new WbfsysComment_Treetable_Element
    (
      'tabRowWbfsysComment',
      $view
    );

    $treetable->addData( $this->model->getEntryData( $params ) );

    // den access container dem listenelement übergeben
    $treetable->setAccess( $access );
    $treetable->setAccessPath( $params, $params->aclKey, $params->aclNode );

    // if a table id is given use it for the table
    if( $params->targetId  )
      $treetable->id = $params->targetId;

    $actions[] = 'show';
    $actions[] = 'edit';
    $actions[] = 'add';
    $actions[] = 'rights';
    $actions[] = 'sep';
    $actions[] = 'ref';

    $actions[] = 'sep';
    $actions[] = 'delete';

    $treetable->addActions( $actions );
    
    $treetable->insertMode = $insert;

    if( !$params->noParse )
      $view->setAreaContent( 'tabRowWbfsysComment', $treetable->buildAjax() );

    // javascript code an den codeblock anhängen
    if( $insert )
    {
      $jsCode = <<<WGTJS

  \$S('table#{$treetable->id}-table').grid('reColorize').grid('incEntries');

WGTJS;

    }
    else
    {
    
      $jsCode = <<<WGTJS

  \$S('table#{$treetable->id}-table').grid('reColorize');

WGTJS;

    }

    $view->addJsCode( $jsCode );

    return $treetable;

  }// end public function listEntry */

  /**
   * method to remove a row from a table via ajax request
   *
   * @param string $key
   * @param string $itemId
   * @return void
   */
  public function removeListEntry( $key, $itemId )
  {

    $view = $this->getView();

    $code = <<<JSCODE

    \$S('#{$itemId}-table tr.node-{$key}').fadeOut(100,function(){\$S('#{$itemId}-table tr.node-{$key}').remove();});
    \$S('#{$itemId}-table').grid('decEntries');
JSCODE;

    $view->addJsCode( $code );

  }//end public function removeListEntry */

  /**
   * de:
   * Zusammenstellen aller benötigten InputElement für ein Suchformular auf
   * die WbfsysComment listing maske
   *
   * @param WbfsysComment_Treetable_Model $model
   * @param TFlag $params
   * @return void
   */
  public function searchForm( $model, $params = null )
  {

    // laden der benötigten resourcen
    $view           = $this->getView();
    $searchFields  = $model->getSearchFields();

    $entityWbfsysComment  = $model->getEntityWbfsysComment();

    $formWbfsysComment    = $view->newForm( 'WbfsysComment' );
    $formWbfsysComment->setNamespace( 'WbfsysComment' );
    $formWbfsysComment->setPrefix( 'WbfsysComment' );
    $formWbfsysComment->setKeyName( 'wbfsys_comment' );
    $formWbfsysComment->createSearchForm
    (
      $entityWbfsysComment,
      ( isset($searchFields['wbfsys_comment'])?$searchFields['wbfsys_comment']:array() )
    );


  }//end public function searchForm */

}//end class WbfsysComment_Treetable_Ui

