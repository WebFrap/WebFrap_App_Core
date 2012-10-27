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
class WbfsysRoleUser_Ref_AddressItem_Table_Ui
  extends Ui
{
////////////////////////////////////////////////////////////////////////////////
// listing methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create a table item for the entity
   *
   *
   * @param int $idWbfsysRoleUser
   * @param LibSqlQuery $data
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   *
   * @return WbfsysRoleUser_Ref_AddressItem_Table_Element
   */
  public function createListItem( $idWbfsysRoleUser, $data, $access, $params  )
  {

    $view = $this->getView();

    // get the activ acl object
    $acl  = $this->getAcl();

    // create a new table item
    $table     = new WbfsysRoleUser_Ref_AddressItem_Table_Element
    (
      'tableAddressItem',
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
      $params->targetId = 'wgt-table-ref-address_item-'.$idWbfsysRoleUser;

    // set the main id of the table element
    $table->id = $params->targetId;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_role_user-ref-address_item-search-'
        .$idWbfsysRoleUser;

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
      'Address Items',
      'wbfsys.role_user.label'
    );
    $tabPanel->searchKey = 'wbfsys_role_user-ref-address_item';


      if( $access->insert )
      {
        $tabPanel->addButton
        (
          'create',
          array
          (
            Wgt::ACTION_JS,
            'Create new Address Item',
            '$R.post(\'maintab.php?c=Wbfsys.AddressItem.create&refid='.$params->refId.'&target_mask=WbfsysRoleUser_Ref_AddressItem&target_id='.$table->id.$table->accessPath.'\',{\'wbfsys_address_item[id_user]\':\''.$params->refIdAddressItem.'\'});return false;',
            'control/add.png',
            'wcm wcm_ui_button',
            'wbf.label'
          )
        );
      }






    // build the content
    $table->buildHtml();

    // set the flag that the tab is shown
    $view->addVar( 'showTabAddressItem', true );
    $view->addVar( 'refIdAddressItem', $idWbfsysRoleUser );
    $view->addVar
    (
      'searchFormActionAddressItem',
      'ajax.php?c=Wbfsys.RoleUser_Ref_AddressItem.search&amp;target_id='
        .$table->id.'&amp;objid='.$idWbfsysRoleUser
    );

  }//end public function createListItem */

  /**
   * create a table item for the entity
   *
   *
   * @param int $idWbfsysRoleUser
   * @param LibSqlQuery $data
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   *
   * @return WbfsysRoleUser_Ref_AddressItem_Table_Element
   */
  public function getListItem( $idWbfsysRoleUser, $data, $access, $params  )
  {

    $view = $this->getView();

    // create a new table item
    $table = new WbfsysRoleUser_Ref_AddressItem_Table_Element
    (
      'tableAddressItem',
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
      $params->targetId = 'wgt-table-ref-address_item-'.$idWbfsysRoleUser;

    $table->id = $params->targetId;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_role_user-ref-address_item-search-'
        .$idWbfsysRoleUser;


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
   * @param int $idWbfsysRoleUser
   * @param LibAclContainer $access
   * @param array $params named parameters
   * @param boolean $insertMode
   *
   * @return WbfsysRoleUser_Ref_AddressItem_Table_Element
   */
  public function listEntry( $idWbfsysRoleUser, $access, $params, $insertMode )
  {

    $view = $this->getView();

    $table = new WbfsysRoleUser_Ref_AddressItem_Table_Element
    (
      'tabRowAddressItem',
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
      $params->targetId = 'wgt-table-ref-address_item-'.$idWbfsysRoleUser;

    // set the table id, needed to adress the ui element at the client
    $table->id = $params->targetId;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_role_user-ref-address_item-search-'
        .$idWbfsysRoleUser;

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
      $view->setAreaContent( 'tabRowAddressItem' , $table->buildAjax() );

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
   * @param WbfsysRoleUser_Table_Model $model
   * @param TFlag $params
   * @return boolean
   */
  public function searchForm( $objid, $model, $params = null )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    $entityWbfsysAddressItem  = $model->getEntityWbfsysAddressItem();

    $formWbfsysAddressItem    = $view->newForm( 'WbfsysAddressItem' );
    $formWbfsysAddressItem->setNamespace( 'WbfsysAddressItem' );
    $formWbfsysAddressItem->setPrefix( 'WbfsysAddressItem' );
    $formWbfsysAddressItem->setKeyName( 'wbfsys_address_item' );
    $formWbfsysAddressItem->createSearchForm
    (
      $entityWbfsysAddressItem,
      ( isset($searchFields['wbfsys_address_item'])?$searchFields['wbfsys_address_item']:array() )
    );


  }//end public function searchForm */

}//end class WbfsysRoleUser_Ref_AddressItem_Table_Ui

