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
class WbfsysSecurityArea_Ref_Access_Table_Ui
  extends Ui
{
////////////////////////////////////////////////////////////////////////////////
// listing methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create a table item for the entity
   *
   *
   * @param int $idWbfsysSecurityArea
   * @param LibSqlQuery $data
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   *
   * @return WbfsysSecurityArea_Ref_Access_Table_Element
   */
  public function createListItem( $idWbfsysSecurityArea, $data, $access, $params  )
  {

    $view = $this->getView();

    // get the activ acl object
    $acl  = $this->getAcl();

    // create a new table item
    $table     = new WbfsysSecurityArea_Ref_Access_Table_Element
    (
      'tableAccess',
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
      $params->targetId = 'wgt-table-ref-access-'.$idWbfsysSecurityArea;

    // set the main id of the table element
    $table->id = $params->targetId;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_security_area-ref-access-search-'
        .$idWbfsysSecurityArea;

    // definieren welche actions in welcher reihenfolge angezeigt werden sollen
    $actions = array();
      // liste der im menü anzuzeigende entries
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
      'Access',
      'wbfsys.security_area.label'
    );
    $tabPanel->searchKey = 'wbfsys_security_area-ref-access';


      if( $access->insert )
      {
        $tabPanel->addButton
        (
          'create',
          array
          (
            Wgt::ACTION_JS,
            'Create new Access',
            '$R.post(\'maintab.php?c=Wbfsys.SecurityAccess.create&refid='.$params->refId.'&target_mask=WbfsysSecurityArea_Ref_Access&target_id='.$table->id.$table->accessPath.'\',{\'wbfsys_security_access[id_area]\':\''.$params->refIdAccess.'\'});return false;',
            'control/add.png',
            'wcm wcm_ui_button',
            'wbf.label'
          )
        );
      }






    // build the content
    $table->buildHtml();

    // set the flag that the tab is shown
    $view->addVar( 'showTabAccess', true );
    $view->addVar( 'refIdAccess', $idWbfsysSecurityArea );
    $view->addVar
    (
      'searchFormActionAccess',
      'ajax.php?c=Wbfsys.SecurityArea_Ref_Access.search&amp;target_id='
        .$table->id.'&amp;objid='.$idWbfsysSecurityArea
    );

  }//end public function createListItem */

  /**
   * create a table item for the entity
   *
   *
   * @param int $idWbfsysSecurityArea
   * @param LibSqlQuery $data
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   *
   * @return WbfsysSecurityArea_Ref_Access_Table_Element
   */
  public function getListItem( $idWbfsysSecurityArea, $data, $access, $params  )
  {

    $view = $this->getView();

    // create a new table item
    $table = new WbfsysSecurityArea_Ref_Access_Table_Element
    (
      'tableAccess',
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
      $params->targetId = 'wgt-table-ref-access-'.$idWbfsysSecurityArea;

    $table->id = $params->targetId;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_security_area-ref-access-search-'
        .$idWbfsysSecurityArea;


    $table->setPagingId( $params->searchFormId );
    $table->setSaveForm( $params->saveFormId );

    // definieren welche actions in welcher reihenfolge angezeigt werden sollen
    $acl     = $this->getAcl();
    $actions = array();
      // liste der im menü anzuzeigende entries
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
   * @param int $idWbfsysSecurityArea
   * @param LibAclContainer $access
   * @param array $params named parameters
   * @param boolean $insertMode
   *
   * @return WbfsysSecurityArea_Ref_Access_Table_Element
   */
  public function listEntry( $idWbfsysSecurityArea, $access, $params, $insertMode )
  {

    $view = $this->getView();

    $table = new WbfsysSecurityArea_Ref_Access_Table_Element
    (
      'tabRowAccess',
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
      $params->targetId = 'wgt-table-ref-access-'.$idWbfsysSecurityArea;

    // set the table id, needed to adress the ui element at the client
    $table->id = $params->targetId;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_security_area-ref-access-search-'
        .$idWbfsysSecurityArea;

    // reference id, needed to target the ui mask in references
    $table->refId = $params->refId;

    // definieren welche actions in welcher reihenfolge angezeigt werden sollen
    $acl     = $this->getAcl();
    $actions = array();
      // liste der im menü anzuzeigende entries
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
      $view->setAreaContent( 'tabRowAccess' , $table->buildAjax() );

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
   * @param WbfsysSecurityArea_Table_Model $model
   * @param TFlag $params
   * @return boolean
   */
  public function searchForm( $objid, $model, $params = null )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    $entityWbfsysSecurityAccess  = $model->getEntityWbfsysSecurityAccess();

    $formWbfsysSecurityAccess    = $view->newForm( 'WbfsysSecurityAccess' );
    $formWbfsysSecurityAccess->setNamespace( 'WbfsysSecurityAccess' );
    $formWbfsysSecurityAccess->setPrefix( 'WbfsysSecurityAccess' );
    $formWbfsysSecurityAccess->setKeyName( 'wbfsys_security_access' );
    $formWbfsysSecurityAccess->createSearchForm
    (
      $entityWbfsysSecurityAccess,
      ( isset($searchFields['wbfsys_security_access'])?$searchFields['wbfsys_security_access']:array() )
    );


  }//end public function searchForm */

}//end class WbfsysSecurityArea_Ref_Access_Table_Ui

