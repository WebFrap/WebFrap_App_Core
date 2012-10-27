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
class WbfsysAnnouncementChannel_Ref_GroupSubscriptions_Table_Ui
  extends Ui
{
////////////////////////////////////////////////////////////////////////////////
// listing methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create a table item for the entity
   *
   *
   * @param int $idWbfsysAnnouncementChannel
   * @param LibSqlQuery $data
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   *
   * @return WbfsysAnnouncementChannel_Ref_GroupSubscriptions_Table_Element
   */
  public function createListItem( $idWbfsysAnnouncementChannel, $data, $access, $params  )
  {

    $view = $this->getView();

    // fetch the activ acl object
    $acl     = $this->getAcl();

    // create a new table item
    $table = new WbfsysAnnouncementChannel_Ref_GroupSubscriptions_Table_Element
    (
      'tableGroupSubscriptions',
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
      'mod-wbfsys-cat-core_data-conref-group_subscriptions'
    );

    // if a table id is given use it for the table
    // else set the default
    if( !$params->targetId  )
      $params->targetId = 'wgt-table-ref-group_subscriptions-'.$idWbfsysAnnouncementChannel;

    // set the html id for the table
    $table->id = $params->targetId ;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_announcement_channel-ref-group_subscriptions-search-'
        .$idWbfsysAnnouncementChannel;

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
      'Group Subscriptions',
      'wbfsys.announcement_channel.label'
    );

    $tabPanel->searchKey = 'wbfsys_announcement_channel-ref-group_subscriptions';



      if( $access->insert )
      {

        $tabPanel->addButton
        (
          'connect',
          array
          (
            Wgt::ACTION_JS,
            'Append new User Roles',
            '$R.get(\'modal.php?c=Wbfsys.RoleGroup.selection&exclude=wbfsys_announcement_channel_subscription-id_channel-id_role&objid='.$params->refId.'&target_mask=WbfsysAnnouncementChannel_Ref_GroupSubscriptions&target='.$params->searchFormId.$table->accessPath.'\');return false;',
            'control/search.png',
            'wcm wcm_ui_button',
            'wbf.label'
          )
        );
      }








    $table->buildHtml();

    // set the flag that the tab is shown
    $view->addVar( 'showTabGroupSubscriptions', true );
    $view->addVar( 'refIdGroupSubscriptions', $idWbfsysAnnouncementChannel );
    $view->addVar
    (
      'searchFormActionGroupSubscriptions',
      'ajax.php?c=Wbfsys.AnnouncementChannel_Ref_GroupSubscriptions.search&amp;target_id='
        .$table->id.'&amp;objid='.$idWbfsysAnnouncementChannel
    );



  }//end public function createListItem */

  /**
   * create a table item for the entity
   *
   * @param int $idWbfsysAnnouncementChannel
   * @param LibSqlQuery $data
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   *
   * @return WbfsysAnnouncementChannel_Ref_GroupSubscriptions_Table_Element
   */
  public function getListItem( $idWbfsysAnnouncementChannel, $data, $access, $params  )
  {

    $view = $this->getView();

    // create a new table item
    $table = new WbfsysAnnouncementChannel_Ref_GroupSubscriptions_Table_Element
    (
      'tableGroupSubscriptions',
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
      'mod-wbfsys-cat-core_data-conref-group_subscriptions'
    );

    // if a table id is given use it for the table
    // else set the default
    if( !$params->targetId  )
      $params->targetId = 'wgt-table-ref-group_subscriptions-'.$idWbfsysAnnouncementChannel;

    // the id should be given from the client
    $table->id = $params->targetId;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_announcement_channel-ref-group_subscriptions-search-'
        .$idWbfsysAnnouncementChannel;

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

    if($params->ajax)
      $table->insertMode = false;


    return $table;

  }//end public function getListItem */

  /**
   * just deliver changed table rows per ajax interface
   *
   * @param int $idGroupSubscriptions
   * @param LibAclContainer $access
   * @param array $params named parameters
   * @param boolean $insertMode
   *
   * @return WbfsysAnnouncementChannel_Ref_GroupSubscriptions_Table_Element
   */
  public function listEntry( $idGroupSubscriptions, $access, $params, $insertMode )
  {

    $view = $this->getView();

    $table = new WbfsysAnnouncementChannel_Ref_GroupSubscriptions_Table_Element
    (
      'tabRowGroupSubscriptions',
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
      'mod-wbfsys-cat-core_data-conref-group_subscriptions'
    );

    // if a table id is given use it for the table
    if( !$params->targetId  )
      $params->targetId = 'wgt-table-ref-group_subscriptions-'.$idGroupSubscriptions;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_announcement_channel-ref-group_subscriptions-search-'
        .$idGroupSubscriptions;

    // set the table id, needed to adress the ui element at the client
    $table->id = $params->targetId;

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
      $view->setAreaContent( 'tabRowGroupSubscriptions', $table->buildAjax() );

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
   * @param WbfsysAnnouncementChannel_Table_Model $model
   * @param TFlag $params
   * @return boolean
   */
  public function searchForm( $objid, $model, $params = null )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    $entityWbfsysAnnouncementChannelSubscription  = $model->getEntityWbfsysAnnouncementChannelSubscription();

    $formWbfsysAnnouncementChannelSubscription    = $view->newForm( 'WbfsysAnnouncementChannelSubscription' );
    $formWbfsysAnnouncementChannelSubscription->setNamespace( 'WbfsysAnnouncementChannelSubscription' );
    $formWbfsysAnnouncementChannelSubscription->setPrefix( 'WbfsysAnnouncementChannelSubscription' );
    $formWbfsysAnnouncementChannelSubscription->setKeyName( 'wbfsys_announcement_channel_subscription' );
    $formWbfsysAnnouncementChannelSubscription->createSearchForm
    (
      $entityWbfsysAnnouncementChannelSubscription,
      ( isset($searchFields['wbfsys_announcement_channel_subscription'])?$searchFields['wbfsys_announcement_channel_subscription']:array() )
    );


  }//end public function searchForm */

}//end class WbfsysAnnouncementChannel_Ref_GroupSubscriptions_Table_Ui

