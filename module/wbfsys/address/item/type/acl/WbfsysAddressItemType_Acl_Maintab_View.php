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
class WbfsysAddressItemType_Acl_Maintab_View
  extends Webfrap_Acl_Maintab
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////

    /**
    * @var WbfsysAddressItemType_Acl_Model
    */
    public $model = null;

    /**
    * @var WbfsysAddressItemType_Acl_Ui
    */
    public $ui = null;

////////////////////////////////////////////////////////////////////////////////
// Methodes
////////////////////////////////////////////////////////////////////////////////

 /**
  * add the table item
  * add the search field elements
  *
  * @param TFlag $params
  * @return null / Error im Fehlerfall
  */
  public function displayListing( $params )
  {

    $access = $params->access;
  
    // create the form action
    if( !$params->searchFormAction )
      $params->searchFormAction = 'index.php?c=Wbfsys.AddressItemType_Acl.search';

    // add the id to the form
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_address_item_type-acl-search';

    // fill the relevant data for the search form
    $this->setSearchFormData( $params );

    // create the form action
    if( !$params->formAction )
      $params->formAction = 'index.php?c=Wbfsys.AddressItemType_Acl.updateArea';

    // add the id to the form
    if( !$params->formId )
      $params->formId = 'wgt-form-wbfsys_address_item_type-acl-update';

    // set a namespace for the elements in the browser
    if( !$params->namespace )
      $params->namespace = 'wbfsys_address_item_type-acl-update';

    // append form actions
    $this->setSaveFormData( $params );

    // set the path to the template
    // the system search in all modules for the template
    // the tpl ending is assigned automatically
    $this->setTemplate( 'wbfsys/address_item_type/maintab/acl/main_group_rights' );

    // fetch the i18n text only one time
    $i18nText = $this->i18n->l
    (
      'ACL Entity {@label@}',
      'wbf.label',
      array
      (
        'label' => $this->i18n->l( 'address item Type', 'wbfsys.address_item_type.label' )
      )
    );

    // set browser title
    $this->setTitle( $i18nText );

    // the label is displayed in the maintab as text
    $this->setLabel( $i18nText );

    $params->viewType = 'maintab';

    // the tabid that is used in the template
    // this tabid has to be placed in the class attribute of all subtasks
    //$this->setTabId( 'wgt-tab-wbfsys_address_item_type_acl_listing' );

    $areaId = $this->model->getAreaId();

    // inject the menu in the view object
    $this->createMenu( $areaId, $params );

    // create the ui helper object
    $ui = $this->loadUi( 'WbfsysAddressItemType_Acl' );
    $ui->setModel( $this->model );

    // inject the table item in the template system
    $ui->createListItem
    (
      $this->model->search( $areaId, $access, $params ),
      $access,
      $params
    );

    // create the form elements and inject them in the templatesystem
    $ui->editForm
    (
      $areaId,
      $params
    );

    // alles ok
    return null;

  }//end public function displayListing */

  /** inject the menu in the activ view object
   *
   *
   * @param int $objid
   * @param TFlag $params the named parameter object that was created in
   *   the controller
   * {
   *   string formId: the id of the form;
   * }
   */
  public function createMenu( $objid, $params )
  {

    $menu     = $this->newMenu
    (
      $this->id.'_dropmenu',
      'WbfsysAddressItemType_Acl'
    );
    $menu->id = $this->id.'_dropmenu';
    $menu->buildMenu( $objid, $params );

    $menu->injectMenuLogic( $this, $objid, $params );

    return true;

  }//end public function createMenu */

} // end class WbfsysAddressItemType_Acl_Maintab_View */

