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
 *
 * @package WebFrap
 * @subpackage webfrap_all_user
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WebfrapAllUser_Widget
  extends WgtWidget
{
  /**
   * @param string $containerId die Id des Tab Containers in dem das Widget platziert wird
   * @param string $tabId die ID des Tabs für das Widget
   * @param string $tabSize die Höhe des Widgets in
   *
   * @return void
   */
  public function asTab( $containerId, $tabId, $tabSize = 'medium' )
  {

    // benötigte resourcen laden
    $user     = $this->getUser();
    $view     = $this->getView();
    $acl      = $this->getAcl();
    $db        = $this->getDb();
    $request  = $this->getRequest();

    $profile  = $user->getProfileName();

    $params         = new TFlagListing( $request );
    $params->qsize  = 25;

    // die query muss für das paging und eine korrekte anzeige
    // die anzahl der gefundenen datensätze ermitteln
    $params->loadFullSize = true;
    
    // ok nun kommen wir zu der zugriffskontrolle
    $access = new WebfrapAllUser_Widget_Access( null, null, $this );
    $access->load( $user->getProfileName(), $params );

     // access direkt übergeben
    $params->access = $access;
    
    // filter für die query konfigurieren
    $condition = array();

    $query  = $db->newQuery( 'WebfrapAllUser_Widget' );
    // wenn der user nur teilberechtigungen hat, müssen die ACLs direkt beim
    // lesen der Daten berücksichtigt werden
    if
    (
      $access->isPartAssign || $access->hasPartAssign
    )
    {

      $validKeys  = $access->fetchListIds
      ( 
        $user->getProfileName(), 
        $query, 
        'table',  
        $condition, 
        $params 
      );

      $query->fetchInAcls
      (
        $validKeys,
        $params
      );

    }
    else
    {

      // da die rechte scheins auf die komplette datenquelle vergeben wurden
      // kann hier auch einfach mit der ganzen quelle geladen werden
      // es wird davon ausgegangen, dass ein standard level definiert wurde
      // wenn kein standard level definiert wurde, werden die daten nur 
      // aufgelistet ohne weitere interaktions möglichkeit
      $query->fetch
      (
        $condition,
        $params
      );

    }
    $query->fetchReferenceAddressItem();


    $table = new WebfrapAllUser_Widget_Table_Element( 'tableWebfrapAllUserItem', $view );
    $table->setId( 'wgt-table-webfrap_all_user-widget' );

    $table->setData( $query );
    $table->addAttributes(array
    (
      'style' => 'width:99%;'
    ));
    
    $params->searchFormId = 'wgt-form-webfrap_all_user-widget-search';
    
    $table->setPagingId( $params->searchFormId );

    $actions   = array();

    $actions[] = 'show';
    $actions[] = 'edit';
    $actions[] = 'delete';
    $actions[] = 'rights';

    $table->addActions( $actions );
    $table->setAccess( $params->access );

    // Über Listenelemente können Eigene Panelcontainer gepackt werden
    // hier verwenden wir ein einfaches Standardpanel mit Titel und
    // simple Suchfeld
    $tabPanel = new WebfrapAllUser_Widget_Table_Panel( $table );
    $tabPanel->setAccess( $params->access );


    if( $access->insert )
    {
      $tabPanel->addButton
      (
        'create',
        array
        (
          Wgt::ACTION_JS,
          'Create',
          '$R.get(\'maintab.php?c=Wbfsys.RoleUser.create&amp;ltab=table&amp;target_mask=WebfrapAllUser_Widget\');return false;',
          'control/new.png',
          'wcm wcm_ui_button',
          'wbf.label'
        )
      );
    }  

  
    if( $access->admin )
    {
      $tabPanel->addButton
      (
        'rights',
        array
        (
          Wgt::ACTION_JS,
          'Rights',
          '$R.get(\'maintab.php?c=Wbfsys.RoleUser_Acl.listing\');return false;',
          'control/rights.png',
          'wcm wcm_ui_button',
          'wbf.label'
        )
      );
    }
    
    $table->buildHtml();

    $html = <<<HTML
    <div id="{$tabId}" class="wgt_tab {$tabSize} {$containerId}" title="Webfrap All User"  >
      <form
        id="wgt-form-webfrap_all_user-widget-search"
        class="wcm wcm_req_ajax"
        action="ajax.php?c=Widget.WebfrapAllUser.reload" 
        method="get" ></form>
      {$table}
      <div class="wgt-clear small" ></div>

    </div>
HTML;

    $this->jsCode = $table->buildContextLogic();

    return $html;

  }//end public function asTab */

  /**
   * @param string $tabId
   * @param string $tabSize
   * @return void
   */
  public function embed( $tabId, $tabSize = 'medium' )
  {
    // benötigte resourcen laden
    $user     = $this->getUser();
    $view     = $this->getView();
    $db        = $this->getDb();
    $acl      = $this->getAcl();
    $request  = $this->getRequest();

    $profile  = $user->getProfileName();

    $params         = new TFlagListing( $request );
    $params->qsize  = 25;

    // die query muss für das paging und eine korrekte anzeige
    // die anzahl der gefundenen datensätze ermitteln
    $params->loadFullSize = true;
    
    // access container
    $access = new WebfrapAllUser_Widget_Access( null, null, $this );
    $access->load( $user->getProfileName(), $params );

     // access direkt übergeben
    $params->access = $access;
    
    // filter für die query konfigurieren
    $condition = array();




    // erstellen uns ausführen der datenbankabfrage
    $query  = $db->newQuery( 'WebfrapAllUser_Widget' );
    // wenn der user nur teilberechtigungen hat, müssen die ACLs direkt beim
    // lesen der Daten berücksichtigt werden
    if
    (
      $access->isPartAssign || $access->hasPartAssign
    )
    {

      $validKeys  = $access->fetchListIds
      ( 
        $user->getProfileName(), 
        $query, 
        'table',  
        $condition, 
        $params 
      );

      $query->fetchInAcls
      (
        $validKeys,
        $params
      );

    }
    else
    {

      // da die rechte scheins auf die komplette datenquelle vergeben wurden
      // kann hier auch einfach mit der ganzen quelle geladen werden
      // es wird davon ausgegangen, dass ein standard level definiert wurde
      // wenn kein standard level definiert wurde, werden die daten nur 
      // aufgelistet ohne weitere interaktions möglichkeit
      $query->fetch
      (
        $condition,
        $params
      );

    }
    $query->fetchReferenceAddressItem();


    $table = new WebfrapAllUser_Widget_Table_Element( 'tableWebfrapAllUserItem', $view );
    $table->setId('wgt-table-webfrap_all_user-widget');
    $table->setData( $query );
    $table->addAttributes(array
    (
      'style' => 'width:99%;'
    ));
    
    $params->searchFormId = 'wgt-form-webfrap_all_user-widget-search';
    $table->setPagingId( $params->searchFormId );

    $actions   = array();

    $actions[] = 'show';
    $actions[] = 'edit';
    $actions[] = 'delete';
    $actions[] = 'rights';

    $table->addActions( $actions );
    $table->setAccess( $params->access );

    // Über Listenelemente können Eigene Panelcontainer gepackt werden
    // hier verwenden wir ein einfaches Standardpanel mit Titel und
    // simple Suchfeld
    $tabPanel = new WebfrapAllUser_Widget_Table_Panel( $table );
    $tabPanel->setAccess( $params->access );


    if( $access->insert )
    {
      $tabPanel->addButton
      (
        'create',
        array
        (
          Wgt::ACTION_JS,
          'Create',
          '$R.get(\'maintab.php?c=Wbfsys.RoleUser.create&amp;ltab=table&amp;target_mask=WebfrapAllUser_Widget\');return false;',
          'control/new.png',
          'wcm wcm_ui_button',
          'wbf.label'
        )
      );
    }  

    if( $access->admin )
    {
      $tabPanel->addButton
      (
        'rights',
        array
        (
          Wgt::ACTION_JS,
          'Rights',
          '$R.get(\'maintab.php?c=Wbfsys.RoleUser_Acl.listing\');return false;',
          'control/rights.png',
          'wcm wcm_ui_button',
          'wbf.label'
        )
      );
    }

    $table->buildHtml();

    $html = <<<HTML
    <div id="{$tabId}" class="wgt_tab {$tabSize} {$containerId}" title="Webfrap All User"  >
      <form
        id="{$params->searchFormId}"
        class="wcm wcm_req_ajax"
        action="ajax.php?c=Widget.WebfrapAllUser.reload"
        method="get" ></form>

      {$table}

      <div class="wgt-clear small"></div>
    </div>
HTML;

    $this->jsCode = $table->buildContextLogic();

    return $html;

  }//end public function embed */

  /**
   * @param string $tabSize
   * @return void
   */
  public function runReload( $tabSize = 'medium' )
  {

    $condition      = array();

    $httpRequest    = $this->getRequest();
    $db             = $this->getDb();
    $orm            = $db->getOrm();
    $view           = $this->getView();
    $user           = $this->getUser();
    $acl            = $this->getAcl();

    $view->getI18n();

    $params       = $this->getSearchFlags();

    $params->ajax = true;

    // die query muss für das paging und eine korrekte anzeige
    // die anzahl der gefundenen datensätze ermitteln
    $params->loadFullSize = true;
    
    // access container
    $access = new WebfrapAllUser_Widget_Access( null, null, $this );
    $access->load( $user->getProfileName(), $params );

     // access direkt übergeben
    $params->access = $access;
    
    $condition = array();
    if( $free = $httpRequest->param( 'free_search', Validator::TEXT ) )
    {
      $condition['free'] = $free;
    }




    $query = $db->newQuery( 'WebfrapAllUser_Widget' );
    // wenn der user nur teilberechtigungen hat, müssen die ACLs direkt beim
    // lesen der Daten berücksichtigt werden
    if
    (
      $access->isPartAssign || $access->hasPartAssign
    )
    {

      $validKeys  = $access->fetchListIds
      ( 
        $user->getProfileName(), 
        $query, 
        'table',  
        $condition, 
        $params 
      );

      $query->fetchInAcls
      (
        $validKeys,
        $params
      );

    }
    else
    {

      // da die rechte scheins auf die komplette datenquelle vergeben wurden
      // kann hier auch einfach mit der ganzen quelle geladen werden
      // es wird davon ausgegangen, dass ein standard level definiert wurde
      // wenn kein standard level definiert wurde, werden die daten nur 
      // aufgelistet ohne weitere interaktions möglichkeit
      $query->fetch
      (
        $condition,
        $params
      );

    }
    $query->fetchReferenceAddressItem();


    $table = new WebfrapAllUser_Widget_Table_Element( 'tableWebfrapAllUserItem', $view );

    // use the query as datasource for the table
    $table->setData($query);

    // set the offset to set the paging menu correct
    $table->start    = $params->start;

    // set the position for the size menu
    $table->stepSize = $params->qsize;

    // check if there is a filter for the first char
    if( $params->begin )
      $table->begin    = $params->begin;

    // if there is a given tableId for the html id of the the table replace
    // the default id with it
    $table->setId( 'wgt-table-webfrap_all_user-widget' );

    $actions   = array();

    $actions[] = 'show';
    $actions[] = 'edit';
    $actions[] = 'delete';
    $actions[] = 'rights';

    $table->addActions( $actions );
    $table->setAccess( $params->access );

    // for paging use the default search form, to enshure to keep the order
    // and to page in search results if there was any search
    $table->setPagingId( 'wgt-form-webfrap_all_user-widget-search' );

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
      $table->setAppendMode(true);
      $table->buildAjax();

      // sync the columnsize after appending new entries
      if( $params->ajax )
      {
        $jsCode = <<<WGTJS

  \$S('table#{$table->id}-table').grid('syncColWidth');

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

  \$S('table#{$table->id}-table').grid('setNumEntries', {$table->dataSize}).grid('syncColWidth');

WGTJS;

        $view->addJsCode( $jsCode );

      }

      $table->buildHtml();
    }

    return $table;

  }//end public function runReload */

  /**
   * @param string $tabSize
   * @return void
   */
  public function append(  $tabSize = 'medium' )
  {

    $condition      = array();

    $httpRequest    = $this->getRequest();
    $db             = $this->getDb();
    $orm            = $db->getOrm();
    $view           = $this->getView();
    $user           = $this->getUser();
    $acl            = $this->getAcl();

    $view->getI18n();

    $params       = $this->getSearchFlags();

    // die query muss für das paging und eine korrekte anzeige
    // die anzahl der gefundenen datensätze ermitteln
    $params->loadFullSize = true;

    // access container
    $access = new WebfrapAllUser_Widget_Access( null, null, $this );
    $access->load( $user->getProfileName(), $params );

     // access direkt übergeben
    $params->access = $access;
    
    // filter für die query konfigurieren
    $condition = array();
    if( $free = $httpRequest->param( 'free_search', Validator::TEXT ) )
    {
      $condition['free'] = $free;
    }



    
    $query = $db->newQuery( 'WebfrapAllUser_Widget' );
    // wenn der user nur teilberechtigungen hat, müssen die ACLs direkt beim
    // lesen der Daten berücksichtigt werden
    if
    (
      $access->isPartAssign || $access->hasPartAssign
    )
    {

      $validKeys  = $access->fetchListIds
      ( 
        $user->getProfileName(), 
        $query, 
        'table',  
        $condition, 
        $params 
      );

      $query->fetchInAcls
      (
        $validKeys,
        $params
      );

    }
    else
    {

      // da die rechte scheins auf die komplette datenquelle vergeben wurden
      // kann hier auch einfach mit der ganzen quelle geladen werden
      // es wird davon ausgegangen, dass ein standard level definiert wurde
      // wenn kein standard level definiert wurde, werden die daten nur 
      // aufgelistet ohne weitere interaktions möglichkeit
      $query->fetch
      (
        $condition,
        $params
      );

    }
    $query->fetchReferenceAddressItem();


    $table = new WebfrapAllUser_Widget_Table_Element
    (
      'tableWebfrapAllUserItem',
      $view
    );

    // use the query as datasource for the table
    $table->setData( $query );

    // set the offset to set the paging menu correct
    $table->start    = $params->start;

    // set the position for the size menu
    $table->stepSize = $params->qsize;

    // check if there is a filter for the first char
    if( $params->begin )
      $table->begin    = $params->begin;

    // if there is a given tableId for the html id of the the table replace
    // the default id with it
    $table->setId( 'wgt-table-webfrap_all_user-widget' );

    $actions   = array();

    $actions[] = 'show';
    $actions[] = 'edit';
    $actions[] = 'delete';
    $actions[] = 'rights';

    $table->addActions( $actions );
    $table->setAccess( $params->access );

    // for paging use the default search form, to enshure to keep the order
    // and to page in search results if there was any search
    $table->setPagingId( 'wgt-form-webfrap_all_user-widget-search' );

    // set refresh to true, to embed the content of this element inside
    // of the ajax.tpl index as "htmlarea"
    $table->refresh = true;

    // the table should only replace the content inside of the container
    // but not the container itself
    $table->insertMode = false;

    $table->buildHtml( );

    return $table;

  }//end public function append */

  /**
   * @param TFlag $params
   * @return TFlag
   */
  protected function getSearchFlags( $params = null )
  {

    $request = $this->getRequest();

    if( !$params )
      $params = new TFlagListing( $request );

    // start position of the query and size of the table
    $params->start
      = $request->param('start', Validator::INT );

    // stepsite for query (limit) and the table
    if( !$params->qsize = $request->param( 'qsize', Validator::INT ) )
      $params->qsize = Wgt::$defListSize;

    // order for the multi display element
    $params->order
      = $request->param( 'order', Validator::CNAME );

    // target for a callback function
    $params->target
      = $request->param( 'target', Validator::CKEY  );

    // target for some ui element
    $params->targetId
      = $request->param( 'target_id', Validator::CKEY  );

    // append ist das flag um in listenelementen die einträge
    // anhängen zu lassen anstelle den body zu pagen
    if( $append = $request->param( 'append', Validator::BOOLEAN ) )
      $params->append  = $append;

    // flag for beginning seach filter
    if( $text = $request->param( 'begin', Validator::TEXT ) )
    {
      // whatever is comming... take the first char
      $params->begin = $text[0];
    }

    return $params;

  }//end protected function getSearchFlags */

}// end class WebfrapAllUser_Widget

