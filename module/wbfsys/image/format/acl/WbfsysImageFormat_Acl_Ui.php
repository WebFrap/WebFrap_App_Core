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
 * Read before change:
 * It's not recommended to change this file inside a Mod or App Project.
 * If you want to change it copy it to a custom project.

 *
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysImageFormat_Acl_Ui
  extends Ui
{
////////////////////////////////////////////////////////////////////////////////
// CRUD Methodes
////////////////////////////////////////////////////////////////////////////////

  /**
   * create an edit formular
   * @param int $objid,
   * @param TFlag $params named parameters
   * @return void
   */
  public function editForm( $objid, $params )
  {

    $entityWbfsysSecurityArea = $this->model->getEntityWbfsysSecurityArea( $objid );

    $fields = $this->model->getEditFields();
    $fields['wbfsys_security_area'][] = 'rowid';

    $params->fieldsWbfsysSecurityArea = $fields['wbfsys_security_area'];

    $formWbfsysSecurityArea = $this->view->newForm( 'WbfsysSecurityArea' );
    $formWbfsysSecurityArea->setNamespace( $params->namespace );
    $formWbfsysSecurityArea->setAssignedForm( $params->formId );
    $formWbfsysSecurityArea->setPrefix( 'WbfsysSecurityArea' );
    $formWbfsysSecurityArea->setKeyName( 'wbfsys_security_area' );
    $formWbfsysSecurityArea->setSuffix( $entityWbfsysSecurityArea->getid() );
    $formWbfsysSecurityArea->createForm
    (
      $entityWbfsysSecurityArea,
      $params->fieldsWbfsysSecurityArea
    );

    return true;

  }//end public function editForm */

////////////////////////////////////////////////////////////////////////////////
// Listing Methodes
////////////////////////////////////////////////////////////////////////////////

  /**
   * create a table item for the entity
   *
   * @param LibSqlQuery $data
   * @param LibAclContainer $access Access Container mit den Zugriffsrechten
   * @param TFlag $params named parameters
   *
   * @return WbfsysImageFormat_Acl_Table_Element
   */
  public function createListItem( $data, $access, $params  )
  {

    $view = $this->getView();

    $table = new WbfsysImageFormat_Acl_Table_Element
    (
      'listingAclTable',
      $view
    );

    // use the query as datasource for the table
    $table->setData( $data );

    // den access container dem listenelement übergeben
    $table->setAccess( $access );
    $table->setAccessPath( $params, $params->aclKey, $params->aclNode );

    $table->setTitle
    ( 
      $this->view->i18n->l
      ( 
        'ACL image format', 
        'wbfsys.image_format.label' 
      ) 
    );
    $table->setSearchKey( 'wbfsys_image_format-acl' );

    // set the offset to set the paging menu correct
    $table->start    = $params->start;

    // set the position for the size menu
    $table->stepSize = $params->qsize;

    // check if there is a filter for the first char
    if( $params->begin )
      $table->begin  = $params->begin;

    // if there is a given tableId for the html id of the the table replace
    // the default id with it
    if( $params->targetId )
      $table->setId( $params->targetId );

    $table->addActions( array( 'inheritance', 'delete' ) );

    // for paging use the default search form, to enshure to keep the order
    // and to page in search results if there was any search
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_image_format-acl-search';

    $table->setPagingId( $params->searchFormId );

    // add the id to the form
    if( !$params->formId )
      $params->formId = 'wgt-form-wbfsys_image_format-acl-update';

    $table->setSaveForm( $params->formId );

    if( $params->ajax )
    {
      // refresh the table in ajax requests
      $table->refresh    = true;

      // the table should only replace the content inside of the container
      // but not the container itself
      $table->insertMode = false;

    }

    // create the panel
    $tabPanel = new WgtPanelTable( $table );

    $tabPanel->title = $this->view->i18n->l
    (
      'Role access area: {@label@}',
      'wbf.lable',
      array
      (
        'label' => $view->i18n->l( 'image format', 'wbfsys.image_format.label' )
      )
    );
    $tabPanel->searchKey  = 'wbfsys_image_format_acl';


    if( $params->append  )
    {
      $table->setAppendMode(true);
      $table->buildAjax();

      $jsCode = <<<WGTJS

  \$S('table#{$table->id}-table').grid('syncColWidth');

WGTJS;
      $this->view->addJsCode( $jsCode );


    }
    else
    {
      // if this is an ajax request and we replace the body, we need also
      // to change the displayed found "X" entries in the footer
      if( $params->ajax )
      {
        $jsCode = <<<WGTJS

  \$S('table#{$table->id}-table').grid('setNumEntries',{$table->dataSize}).grid('syncColWidth');

WGTJS;

        $this->view->addJsCode( $jsCode );

      }

      $table->buildHtml();
    }

    return $table;

  }//end public function createListItem */

  /**
   * just deliver changed table rows per ajax interface
   *
   * @param LibAclContainer $access
   * @param boolean $insert
   * @param array $params named parameters
   * @return void
   */
  public function listEntry( $access, $params, $insert = false )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    $table = $view->createElement
    (
      'listingAclTable',
      'WbfsysImageFormat_Acl_Table'
    );

    $table->addData( $this->model->getEntryDataAccess( $this->view, $params ) );

    // den access container dem listenelement übergeben
    $table->setAccess( $access );
    $table->setAccessPath( $params, $params->aclKey, $params->aclNode );

    // if a table id is given use it for the table
    if( $params->targetId  )
      $table->id = $params->targetId;

    $table->setPagingId( $params->searchFormId );

    // add the id to the form
    if( !$params->formId )
      $params->formId = 'wgt-form-wbfsys_image_format-acl-update';

    $table->setSaveForm( $params->formId );

    $table->addActions( array( 'inheritance', 'delete' ) );

    $table->insertMode = $insert;

    $this->view->setPageFragment( 'rowSecurityAccess', $table->buildAjax( ) );

    if( $insert )
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

  }//end public function listEntry */

  /**
   * de:
   * Erstellen der Suchformular Inputfelder
   *
   * @return void
   */
  public function searchForm( )
  {

    $entityWbfsysSecurityAccess  = $this->model->getEntityWbfsysSecurityAccess();
    $fieldsWbfsysSecurityAccess  = $entityWbfsysSecurityAccess->getSearchCols();

    $formWbfsysSecurityAccess    = $this->view->newForm( 'WbfsysSecurityAccess' );
    $formWbfsysSecurityAccess->setNamespace( 'WbfsysSecurityAccess' );
    $formWbfsysSecurityAccess->setPrefix( 'WbfsysSecurityAccess' );
    $formWbfsysSecurityAccess->setKeyName( 'wbfsys_security_access' );
    $formWbfsysSecurityAccess->createSearchForm
    (
      $entityWbfsysSecurityAccess,
      $fieldsWbfsysSecurityAccess
    );

  }//end public function searchForm */

} // end class WbfsysImageFormat_Acl_Ui */

