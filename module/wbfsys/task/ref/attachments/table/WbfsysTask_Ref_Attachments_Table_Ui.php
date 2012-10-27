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
class WbfsysTask_Ref_Attachments_Table_Ui
  extends Ui
{
////////////////////////////////////////////////////////////////////////////////
// listing methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create a table item for the entity
   *
   *
   * @param int $idWbfsysTask
   * @param LibSqlQuery $data
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   *
   * @return WbfsysTask_Ref_Attachments_Table_Element
   */
  public function createListItem( $idWbfsysTask, $data, $access, $params  )
  {

    $view = $this->getView();

    // fetch the activ acl object
    $acl     = $this->getAcl();

    // create a new table item
    $table = new WbfsysTask_Ref_Attachments_Table_Element
    (
      'tableAttachments',
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
      $params->aclNode,
      'mgmt-wbfsys_task-conref-attachments'
    );

    // if a table id is given use it for the table
    // else set the default
    if( !$params->targetId  )
      $params->targetId = 'wgt-table-ref-attachments-'.$idWbfsysTask;

    // set the html id for the table
    $table->id = $params->targetId ;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_task-ref-attachments-search-'
        .$idWbfsysTask;

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

    if($params->ajax)
      $table->insertMode = false;

    // set refresh to true, to embed the content of this element inside
    // of the ajax.tpl index as "htmlarea"
    $table->refresh  = true;

    $table->setPagingId( $params->searchFormId );
    $table->setSaveForm( $params->saveFormId );

    // create a panel for the table
    $tabPanel = new WgtPanelTable_Splitbutton( $table );

    $tabPanel->title = $view->i18n->l
    (
      'Attachements',
      'wbfsys.task.label'
    );

    $tabPanel->searchKey = 'wbfsys_task-ref-attachments';


      if( $access->insert )
      {
        $tabPanel->addButton
        (
          'create',
          array
          (
            Wgt::ACTION_JS,
            'Create new File',
            '$R.post(\'maintab.php?c=Wbfsys.EntityAttachment.create&refid='.$params->refId.'&target_mask=WbfsysTask_Ref_Attachments&target_id='.$table->id.$table->accessPath.'\',{\'wbfsys_entity_attachment[vid]\':\''.$params->refIdAttachments.'\'});return false;',
            'control/add.png',
            'wcm wcm_ui_button',
            'wbf.label'
          )
        );
      }









    $table->buildHtml();

    // set the flag that the tab is shown
    $view->addVar( 'showTabAttachments', true );
    $view->addVar( 'refIdAttachments', $idWbfsysTask );
    $view->addVar
    (
      'searchFormActionAttachments',
      'ajax.php?c=Wbfsys.Task_Ref_Attachments.search&amp;target_id='
        .$table->id.'&amp;objid='.$idWbfsysTask
    );



  }//end public function createListItem */

  /**
   * create a table item for the entity
   *
   * @param int $idWbfsysTask
   * @param LibSqlQuery $data
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   *
   * @return WbfsysTask_Ref_Attachments_Table_Element
   */
  public function getListItem( $idWbfsysTask, $data, $access, $params  )
  {

    $view = $this->getView();

    // create a new table item
    $table = new WbfsysTask_Ref_Attachments_Table_Element
    (
      'tableAttachments',
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
      $params->aclNode,
      'mgmt-wbfsys_task-conref-attachments'
    );

    // if a table id is given use it for the table
    // else set the default
    if( !$params->targetId  )
      $params->targetId = 'wgt-table-ref-attachments-'.$idWbfsysTask;

    // the id should be given from the client
    $table->id = $params->targetId;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_task-ref-attachments-search-'
        .$idWbfsysTask;

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

    if($params->ajax)
      $table->insertMode = false;


    return $table;

  }//end public function getListItem */

  /**
   * just deliver changed table rows per ajax interface
   *
   * @param int $idAttachments
   * @param LibAclContainer $access
   * @param array $params named parameters
   * @param boolean $insertMode
   *
   * @return WbfsysTask_Ref_Attachments_Table_Element
   */
  public function listEntry( $idAttachments, $access, $params, $insertMode )
  {

    $view = $this->getView();

    $table = new WbfsysTask_Ref_Attachments_Table_Element
    (
      'tabRowAttachments',
      $view
    );

    $table->addData( $this->model->getEntryData(  $params ) );

    // den access container dem listenelement übergeben

    $table->setAccess( $access );


    $table->setAccessPath
    (
      $params,
      $params->aclKey,
      $params->aclNode,
      'mgmt-wbfsys_task-conref-attachments'
    );

    // if a table id is given use it for the table
    if( !$params->targetId  )
      $params->targetId = 'wgt-table-ref-attachments-'.$idAttachments;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_task-ref-attachments-search-'
        .$idAttachments;

    // set the table id, needed to adress the ui element at the client
    $table->id = $params->targetId;

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
      $view->setAreaContent( 'tabRowAttachments', $table->buildAjax() );

    // if insert the number of displayed entries has to be increased by one
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
   * @param WbfsysTask_Table_Model $model
   * @param TFlag $params
   * @return boolean
   */
  public function searchForm( $objid, $model, $params = null )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    $entityWbfsysEntityAttachment  = $model->getEntityWbfsysEntityAttachment();

    $formWbfsysEntityAttachment    = $view->newForm( 'WbfsysEntityAttachment' );
    $formWbfsysEntityAttachment->setNamespace( 'WbfsysEntityAttachment' );
    $formWbfsysEntityAttachment->setPrefix( 'WbfsysEntityAttachment' );
    $formWbfsysEntityAttachment->setKeyName( 'wbfsys_entity_attachment' );
    $formWbfsysEntityAttachment->createSearchForm
    (
      $entityWbfsysEntityAttachment,
      ( isset($searchFields['wbfsys_entity_attachment'])?$searchFields['wbfsys_entity_attachment']:array() )
    );

    $entityWbfsysFile  = $model->getEntityEntityFile();

    $formWbfsysFile    = $view->newForm( 'WbfsysFile' );
    $formWbfsysFile->setNamespace( 'WbfsysEntityAttachment' );
    $formWbfsysFile->setPrefix( 'EntityFile' );
    $formWbfsysFile->setKeyName( 'wbfsys_file' );
    $formWbfsysFile->createSearchForm
    (
      $entityWbfsysFile,
      ( isset($searchFields['wbfsys_file'])?$searchFields['wbfsys_file']:array() )
    );


  }//end public function searchForm */

}//end class WbfsysTask_Ref_Attachments_Table_Ui

