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
class WbfsysProfile_Ref_Quicklinks_Table_Ui
  extends Ui
{
////////////////////////////////////////////////////////////////////////////////
// listing methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create a table item for the entity
   *
   *
   * @param int $idWbfsysProfile
   * @param LibSqlQuery $data
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   *
   * @return WbfsysProfile_Ref_Quicklinks_Table_Element
   */
  public function createListItem( $idWbfsysProfile, $data, $access, $params  )
  {

    $view = $this->getView();

    // get the activ acl object
    $acl  = $this->getAcl();

    // create a new table item
    $table     = new WbfsysProfile_Ref_Quicklinks_Table_Element
    (
      'tableQuicklinks',
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
      $params->targetId = 'wgt-table-ref-quicklinks-'.$idWbfsysProfile;

    // set the main id of the table element
    $table->id = $params->targetId;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_profile-ref-quicklinks-search-'
        .$idWbfsysProfile;

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
      'Quicklinks',
      'wbfsys.profile.label'
    );
    $tabPanel->searchKey = 'wbfsys_profile-ref-quicklinks';


      if( $access->insert )
      {
        $tabPanel->addButton
        (
          'create',
          array
          (
            Wgt::ACTION_JS,
            'Create new Profile Quicklink',
            '$R.post(\'maintab.php?c=Wbfsys.ProfileQuicklink.create&refid='.$params->refId.'&target_mask=WbfsysProfile_Ref_Quicklinks&target_id='.$table->id.$table->accessPath.'\',{\'wbfsys_profile_quicklink[id_profile]\':\''.$params->refIdQuicklinks.'\'});return false;',
            'control/add.png',
            'wcm wcm_ui_button',
            'wbf.label'
          )
        );
      }






    // build the content
    $table->buildHtml();

    // set the flag that the tab is shown
    $view->addVar( 'showTabQuicklinks', true );
    $view->addVar( 'refIdQuicklinks', $idWbfsysProfile );
    $view->addVar
    (
      'searchFormActionQuicklinks',
      'ajax.php?c=Wbfsys.Profile_Ref_Quicklinks.search&amp;target_id='
        .$table->id.'&amp;objid='.$idWbfsysProfile
    );

  }//end public function createListItem */

  /**
   * create a table item for the entity
   *
   *
   * @param int $idWbfsysProfile
   * @param LibSqlQuery $data
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   *
   * @return WbfsysProfile_Ref_Quicklinks_Table_Element
   */
  public function getListItem( $idWbfsysProfile, $data, $access, $params  )
  {

    $view = $this->getView();

    // create a new table item
    $table = new WbfsysProfile_Ref_Quicklinks_Table_Element
    (
      'tableQuicklinks',
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
      $params->targetId = 'wgt-table-ref-quicklinks-'.$idWbfsysProfile;

    $table->id = $params->targetId;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_profile-ref-quicklinks-search-'
        .$idWbfsysProfile;


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
   * @param int $idWbfsysProfile
   * @param LibAclContainer $access
   * @param array $params named parameters
   * @param boolean $insertMode
   *
   * @return WbfsysProfile_Ref_Quicklinks_Table_Element
   */
  public function listEntry( $idWbfsysProfile, $access, $params, $insertMode )
  {

    $view = $this->getView();

    $table = new WbfsysProfile_Ref_Quicklinks_Table_Element
    (
      'tabRowQuicklinks',
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
      $params->targetId = 'wgt-table-ref-quicklinks-'.$idWbfsysProfile;

    // set the table id, needed to adress the ui element at the client
    $table->id = $params->targetId;

    // add the id for the searchform, needed for paging
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_profile-ref-quicklinks-search-'
        .$idWbfsysProfile;

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
      $view->setAreaContent( 'tabRowQuicklinks' , $table->buildAjax() );

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
   * @param WbfsysProfile_Table_Model $model
   * @param TFlag $params
   * @return boolean
   */
  public function searchForm( $objid, $model, $params = null )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    $entityWbfsysProfileQuicklink  = $model->getEntityWbfsysProfileQuicklink();

    $formWbfsysProfileQuicklink    = $view->newForm( 'WbfsysProfileQuicklink' );
    $formWbfsysProfileQuicklink->setNamespace( 'WbfsysProfileQuicklink' );
    $formWbfsysProfileQuicklink->setPrefix( 'WbfsysProfileQuicklink' );
    $formWbfsysProfileQuicklink->setKeyName( 'wbfsys_profile_quicklink' );
    $formWbfsysProfileQuicklink->createSearchForm
    (
      $entityWbfsysProfileQuicklink,
      ( isset($searchFields['wbfsys_profile_quicklink'])?$searchFields['wbfsys_profile_quicklink']:array() )
    );


  }//end public function searchForm */

}//end class WbfsysProfile_Ref_Quicklinks_Table_Ui

