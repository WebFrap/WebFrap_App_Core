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
class WbfsysDesktop_Ref_MainMenu_Treetable_Ui
  extends Ui
{
////////////////////////////////////////////////////////////////////////////////
// listing methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create a table item for the entity
   *
   * @param int $idWbfsysDesktop
   * @param LibSqlQuery $data
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   *
   * @return TableWbfsysDesktop
   */
  public function createListItem( $idWbfsysDesktop, $data, $access, $params  )
  {

    $view  = $this->getView();
    $acl   = $this->getAcl();
    
    // create a new table item
    $treetable = new WbfsysDesktop_Ref_MainMenu_Treetable_Element
    (
      'treetableMainMenu',
      $view
    );


    // set given data
    $treetable->setData( $data );

    // den access container dem listenelement übergeben
    $treetable->setAccess( $access );

    $treetable->setAccessPath
    (
      $params,
      $params->aclKey,
      $params->aclNode
    );

    // if a treetable id is given use it for the treettable
    // else set the default
    if( !$params->targetId  )
      $params->targetId = 'wgt-treetable-wbfsys_desktop-ref-main_menu-'
        .$idWbfsysDesktop;

    // set the html id for the element box
    $treetable->id     = $params->targetId;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-treetable-wbfsys_desktop-ref-main_menu-search-'
        .$idWbfsysDesktop;

    // definieren welche actions in welcher reihenfolge angezeigt werden sollen
    $actions = array();
      // wenn editieren nicht erlaubt ist geht zumindest das anzeigen
      $actions[] = 'show';
      $actions[] = 'edit';
      $actions[] = 'add';
      $actions[] = 'rights';

      $actions[] = 'sep';
      $actions[] = 'ref';
      $actions[] = 'sep';
      $actions[] = 'delete';

    $treetable->addActions( $actions );

    // set the the start postion
    $treetable->start    = $params->start;

    // set the position for the size menu
    $treetable->stepSize = $params->qsize;

    // reference id, needed to target the ui mask in references
    $treetable->refId = $params->refId;

    // check if there is a filter for the first char
    if( $params->begin )
      $treetable->begin    = $params->begin;

    if( $params->ajax )
      $treetable->insertMode = false;

    $treetable->setPagingId( $params->searchFormId );
    $treetable->setSaveForm( $params->saveFormId );

    // create panel
    $tabPanel = new WgtPanelTreetable_Splitbutton( $treetable );
    $tabPanel->title = $this->view->i18n->l
    (
      'Menu Entry',
      'wbfsys.menu_entry.label'
    );
    $tabPanel->searchKey = 'wbfsys_desktop-ref-main_menu';


      if( $access->insert )
      {

        $tabPanel->addButton
        (
          'create',
          array
          (
            Wgt::ACTION_JS,
            'Create new Menu Entry',
            '$R.post(\'maintab.php?c=Wbfsys.MenuEntry.create&refid='.$params->refId.'&target_mask=WbfsysDesktop_Ref_MainMenu&target_id='.$treetable->id.$treetable->accessPath.'\',{\'wbfsys_menu_entry[id_menu]\':\''.$params->refIdMainMenu.'\'});return false;',
            'control/add.png',
            'wcm wcm_ui_button',
            'wbf.label'
          )
        );
      }


    



    // build the content
    $treetable->buildHtml();

    // set the flag that the tab is shown
    $view->addVar( 'showTabMainMenu', true );
    $view->addVar( 'refIdMainMenu', $idWbfsysDesktop );
    $view->addVar
    (
      'searchFormActionMainMenu',
      'ajax.php?c=Wbfsys.Desktop_Ref_MainMenu.search'
        .'&amp;ltype=treetable&amp;target_id='
        .$treetable->id.'&amp;objid='.$idWbfsysDesktop.$treetable->accessPath
    );

  }//end public function createListItem */

  /**
   * create a table item for the entity
   *
   * @param int $idWbfsysDesktop
   * @param LibSqlQuery $data
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   *
   * @return WbfsysDesktop_Ref_MainMenu_Treetable_Element
   */
  public function getListItem( $idWbfsysDesktop, $data, $access, $params  )
  {

    $view = $this->getView();

    // create a new table item
    $treetable  = new WbfsysDesktop_Ref_MainMenu_Treetable_Element
    (
      'treetableMainMenu',
      $view
    );

    // set given data
    $treetable->setData( $data );

    // den access container dem listenelement übergeben
    $treetable->setAccess( $access );
    $treetable->setAccessPath
    (
      $params,
      $params->aclKey,
      $params->aclNode
    );

    // if a treetable id is given use it for the treetable
    // else set the default
    if( !$params->targetId  )
      $params->targetId = 'wgt-treetable-wbfsys_desktop-ref-main_menu-'.$idWbfsysDesktop;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-treetable-wbfsys_desktop-ref-main_menu-search-'
        .$idWbfsysDesktop;

    $treetable->id     = $params->targetId;

    // definieren welche actions in welcher reihenfolge angezeigt werden sollen
    $actions = array();
      // wenn editieren nicht erlaubt ist geht zumindest das anzeigen
      $actions[] = 'show';
      $actions[] = 'edit';
      $actions[] = 'add';
      $actions[] = 'rights';

      $actions[] = 'sep';
      $actions[] = 'ref';
      $actions[] = 'sep';
      $actions[] = 'delete';

    $treetable->addActions( $actions );

    // set the the start postion
    $treetable->start    = $params->start;

    // set the position for the size menu
    $treetable->stepSize = $params->qsize;

    // reference id, needed to target the ui mask in references
    $treetable->refId = $params->refId;

    if( $params->ajax )
      $treetable->insertMode = false;

    // set refresh to true, to embed the content of this element inside
    // of the ajax.tpl index as "htmlarea"
    $treetable->refresh  = true;

    $treetable->setPagingId( $params->searchFormId );
    $treetable->setSaveForm( $params->saveFormId );

    return $treetable;

  }//end public function getListItem */

  /**
   * just deliver changed table rows per ajax interface
   *
   * @param int $idWbfsysDesktop
   * @param LibAclContainer $access
   * @param array $params named parameters
   * @param boolean $insertMode
   *
   * @return WbfsysDesktop_Ref_MainMenu_Treetable_Element
   */
  public function listEntry( $idWbfsysDesktop, $access, $params, $insertMode )
  {

    $view = $this->getView();

    $treetable = new WbfsysDesktop_Ref_MainMenu_Treetable_Element
    (
      'tabRowMainMenu',
      $view
    );

    $treetable->addData( $this->model->getEntryData( $params ) );

    // den access container dem listenelement übergeben
    $treetable->setAccess( $access );
    
    $treetable->setAccessPath
    (
      $params,
      $params->aclKey,
      $params->aclNode
    );

    // if a treetable id is given use it for the treetable
    if( !$params->targetId  )
      $params->targetId = 'wgt-treetable-wbfsys_desktop-ref-main_menu-'.$idWbfsysDesktop;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-treetable-wbfsys_desktop-ref-main_menu-search-'
        .$idWbfsysDesktop;

    // set the table id, needed to adress the ui element at the client
    $treetable->id = $params->targetId;

    // reference id, needed to target the ui mask in references
    $treetable->refId = $params->refId;
    $treetable->refId = $idWbfsysDesktop;

    // definieren welche actions in welcher reihenfolge angezeigt werden sollen
    $actions = array();
      // wenn editieren nicht erlaubt ist geht zumindest das anzeigen
      $actions[] = 'show';
      $actions[] = 'edit';
      $actions[] = 'add';
      $actions[] = 'rights';

      $actions[] = 'sep';
      $actions[] = 'ref';
      $actions[] = 'sep';
      $actions[] = 'delete';

    $treetable->addActions( $actions );


    $treetable->insertMode = $insertMode;

    if( !$params->noParse )
      $view->setAreaContent( 'tabRowMainMenu', $treetable->buildAjax() );

    if( $insertMode )
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
   * @param string $treetableId
   * @return void
   */
  public function removeListEntry( $key, $itemId  )
  {

    $view = $this->getView();

    $code = <<<JSCODE

    \$S('#{$itemId}_row_{$key}').fadeOut(100,function(){\$S('#{$itemId}  tr.node-{$key}').remove();});
    \$S('#{$itemId}-table').grid('decEntries');
JSCODE;

    $view->addJsCode( $code );

  }//end public function removeListEntry */

  /**
   * fill the elements in a search form
   *
   * @param int $objid
   * @param WbfsysDesktop_Treetable_Model $model
   * @param TFlag $params
   * @return boolean
   */
  public function searchForm( $objid, $model, $params = null )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    $entityWbfsysMenuEntry  = $model->getEntityWbfsysMenuEntry();

    $formWbfsysMenuEntry    = $view->newForm( 'WbfsysMenuEntry' );
    $formWbfsysMenuEntry->setNamespace( 'WbfsysMenuEntry' );
    $formWbfsysMenuEntry->setPrefix( 'WbfsysMenuEntry' );
    $formWbfsysMenuEntry->setKeyName( 'wbfsys_menu_entry' );
    $formWbfsysMenuEntry->createSearchForm
    (
      $entityWbfsysMenuEntry,
      ( isset($searchFields['wbfsys_menu_entry'])?$searchFields['wbfsys_menu_entry']:array() )
    );


  }//end public function searchForm */

}//end class WbfsysDesktop_Ref_MainMenu_Treetable_Ui

