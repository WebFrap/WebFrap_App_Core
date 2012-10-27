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
class WbfsysCalendarType_Ref_Holiday_Table_Ui
  extends Ui
{
////////////////////////////////////////////////////////////////////////////////
// listing methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create a table item for the entity
   *
   *
   * @param int $idWbfsysCalendarType
   * @param LibSqlQuery $data
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   *
   * @return WbfsysCalendarType_Ref_Holiday_Table_Element
   */
  public function createListItem( $idWbfsysCalendarType, $data, $access, $params  )
  {

    $view = $this->getView();

    // get the activ acl object
    $acl  = $this->getAcl();

    // create a new table item
    $table     = new WbfsysCalendarType_Ref_Holiday_Table_Element
    (
      'tableHoliday',
      $view
    );

    // set given data
    $table->setData( $data );

    // den access container dem listenelement übergeben
    $table->setAccess( $access );
    $table->setAccessPath
    (
      $params,
      $params->aclKey,
      $params->aclNode
    );

    // if a table id is given use it for the table
    // else set the default
    if( !$params->targetId  )
      $params->targetId = 'wgt-table-ref-holiday-'.$idWbfsysCalendarType;

    // set the main id of the table element
    $table->id = $params->targetId;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_calendar_type-ref-holiday-search-'
        .$idWbfsysCalendarType;

    // definieren welche actions in welcher reihenfolge angezeigt werden sollen
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

    // set the the start postion
    $table->start    = $params->start;

    // set the position for the size menu
    $table->stepSize = $params->qsize;

    // reference id, needed to target the ui mask in references
    $table->refId = $params->refId;

    // check if there is a filter for the first char
    if( $params->begin )
      $table->begin    = $params->begin;

    if( $params->ajax )
      $table->insertMode = false;

    $table->setPagingId( $params->searchFormId );
    $table->setSaveForm( $params->saveFormId );


    // create a panel for the table
    $tabPanel = new WgtPanelTable_Splitbutton( $table );
    $tabPanel->title = $view->i18n->l
    (
      'Holidays',
      'wbfsys.calendar_type.label'
    );
    $tabPanel->searchKey = 'wbfsys_calendar_type-ref-holiday';


      if( $access->insert )
      {
        $tabPanel->addButton
        (
          'create',
          array
          (
            Wgt::ACTION_JS,
            'Create new Holiday',
            '$R.post(\'maintab.php?c=Wbfsys.CalendarHoliday.create&refid='.$params->refId.'&target_mask=WbfsysCalendarType_Ref_Holiday&target_id='.$table->id.$table->accessPath.'\',{\'wbfsys_calendar_holiday[id_calendar_type]\':\''.$params->refIdHoliday.'\'});return false;',
            'control/add.png',
            'wcm wcm_ui_button',
            'wbf.label'
          )
        );
      }






    // build the content
    $table->buildHtml();

    // set the flag that the tab is shown
    $view->addVar( 'showTabHoliday', true );
    $view->addVar( 'refIdHoliday', $idWbfsysCalendarType );
    $view->addVar
    (
      'searchFormActionHoliday',
      'ajax.php?c=Wbfsys.CalendarType_Ref_Holiday.search&amp;target_id='
        .$table->id.'&amp;objid='.$idWbfsysCalendarType
    );

  }//end public function createListItem */

  /**
   * create a table item for the entity
   *
   *
   * @param int $idWbfsysCalendarType
   * @param LibSqlQuery $data
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   *
   * @return WbfsysCalendarType_Ref_Holiday_Table_Element
   */
  public function getListItem( $idWbfsysCalendarType, $data, $access, $params  )
  {

    $view = $this->getView();

    // create a new table item
    $table = new WbfsysCalendarType_Ref_Holiday_Table_Element
    (
      'tableHoliday',
      $view
    );

    // set given data
    $table->setData( $data );

    // den access container dem listenelement übergeben
    $table->setAccess( $access );
    $table->setAccessPath
    (
      $params,
      $params->aclKey,
      $params->aclNode
    );

    // if a table id is given use it for the table
    // else set the default
    if( !$params->targetId  )
      $params->targetId = 'wgt-table-ref-holiday-'.$idWbfsysCalendarType;

    $table->id = $params->targetId;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_calendar_type-ref-holiday-search-'
        .$idWbfsysCalendarType;


    $table->setPagingId( $params->searchFormId );
    $table->setSaveForm( $params->saveFormId );

    // definieren welche actions in welcher reihenfolge angezeigt werden sollen
    $acl     = $this->getAcl();
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

    // set the the start postion
    $table->start    = $params->start;

    // set the position for the size menu
    $table->stepSize = $params->qsize;

    // reference id, needed to target the ui mask in references
    $table->refId = $params->refId;

    // insertMode false means that only the tbody part is created
    if( $params->ajax )
      $table->insertMode = false;

    // set refresh to true, to embed the content of this element inside
    // of the ajax.tpl index as "htmlarea"
    $table->refresh  = true;

    return $table;

  }//end public function getListItem */

  /**
   * just deliver changed table rows per ajax interface
   *
   * @param int $idWbfsysCalendarType
   * @param LibAclContainer $access
   * @param array $params named parameters
   * @param boolean $insertMode
   *
   * @return WbfsysCalendarType_Ref_Holiday_Table_Element
   */
  public function listEntry( $idWbfsysCalendarType, $access, $params, $insertMode )
  {

    $view = $this->getView();

    $table = new WbfsysCalendarType_Ref_Holiday_Table_Element
    (
      'tabRowHoliday',
      $view
    );

    // inject the data to the itembuilder
    $table->addData( $this->model->getEntryData( $params ) );

    // den access container dem listenelement übergeben
    $table->setAccess( $access );

    $table->setAccessPath
    (
      $params,
      $params->aclKey,
      $params->aclNode
    );

    // if a table id is given use it for the table
    if( !$params->targetId  )
      $params->targetId = 'wgt-table-ref-holiday-'.$idWbfsysCalendarType;

    // set the table id, needed to adress the ui element at the client
    $table->id = $params->targetId;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_calendar_type-ref-holiday-search-'
        .$idWbfsysCalendarType;

    // reference id, needed to target the ui mask in references
    $table->refId = $params->refId;

    // definieren welche actions in welcher reihenfolge angezeigt werden sollen
    $acl     = $this->getAcl();
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

    // insert mode defines if an existing row is replaced, or if there is a
    // new row appended
    // true = append new row
    $table->insertMode = $insertMode;

    if( !$params->noParse )
      $view->setAreaContent( 'tabRowHoliday' , $table->buildAjax() );

    if( $insertMode )
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
   * method to remove a row from a table via ajax request
   *
   * @param string $key
   * @param string $itemId
   * @return void
   */
  public function removeListEntry( $key, $itemId  )
  {

    $view = $this->getView();

    $code = <<<JSCODE

    \$S('#{$itemId}_row_{$key}').fadeOut(100,function(){\$S('#{$itemId} tr.node-{$key}').remove();});
    \$S('table#{$itemId}-table').grid('decEntries');
JSCODE;

    $view->addJsCode($code);

  }//end public function removeListEntry */

  /**
   * fill the elements in a search form
   *
   * @param int $objid
   * @param WbfsysCalendarType_Table_Model $model
   * @param TFlag $params
   * @return boolean
   */
  public function searchForm( $objid, $model, $params = null )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    $entityWbfsysCalendarHoliday  = $model->getEntityWbfsysCalendarHoliday();

    $formWbfsysCalendarHoliday    = $view->newForm( 'WbfsysCalendarHoliday' );
    $formWbfsysCalendarHoliday->setNamespace( 'WbfsysCalendarHoliday' );
    $formWbfsysCalendarHoliday->setPrefix( 'WbfsysCalendarHoliday' );
    $formWbfsysCalendarHoliday->setKeyName( 'wbfsys_calendar_holiday' );
    $formWbfsysCalendarHoliday->createSearchForm
    (
      $entityWbfsysCalendarHoliday,
      ( isset($searchFields['wbfsys_calendar_holiday'])?$searchFields['wbfsys_calendar_holiday']:array() )
    );


  }//end public function searchForm */

}//end class WbfsysCalendarType_Ref_Holiday_Table_Ui

