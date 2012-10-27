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
class WbfsysSecurityArea_Acl_Dset_Maintab_View
  extends WgtMaintab
{////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////

   /**
    * @var WbfsysSecurityArea_Acl_Path_Model
    */
    public $model = null;

   /**
    * @var WbfsysSecurityArea_Acl_Path_Ui
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
  * @return boolean
  */
  public function displayListing( $entityWbfsysSecurityArea, $areaId, $params )
  {

    // set the path to the template
    // the system search in all modules for the template
    // the tpl ending is assigned automatically
    $this->setTemplate( 'wbfsys/security_area/maintab/acl/main_dset_treetable' );

    // fetch the entity object an push it in the view
    $this->addVar( 'entityObj', $entityWbfsysSecurityArea );

    // fetch the i18n text only one time
    $i18nText = $this->i18n->l
    (
      'Dataset Access for {@label@}',
      'wbf.label',
      array( 'label' => 'Security Area '.$entityWbfsysSecurityArea->text() )
    );

    // set browser title
    $this->setTitle( $i18nText );
    // the label is displayed in the maintab as text
    $this->setLabel( $i18nText );

    // set param values
    $params->viewType = 'maintab';

    $params->targetId = 'wgt-treetable-wbfsys_security_area-acl-dset';

    // set search form & action id
    $params->searchFormId = 'wgt-form-table-wbfsys_security_area-acl-dset-search';
    $params->searchFormAction = 'ajax.php?c=Wbfsys.SecurityArea_Acl_Dset.search&amp;objid='.$entityWbfsysSecurityArea;

    // fill the relevant data for the search form
    $this->setSearchFormData( $params );

    // create the form action & action id
    $params->formAction = 'index.php?c=Wbfsys.SecurityArea_Acl_Dset.update';
    $params->formId = 'wgt-form-wbfsys_security_area-acl-dset-update';
    // append form actions
    $this->setSaveFormData( $params );

    // check graph type
    if( !$params->graphType )
      $params->graphType = 'spacetree';
      
    $this->addVar( 'graphType', $params->graphType );

    // create the form action
    $params->formActionAppend = 'ajax.php?c=Wbfsys.SecurityArea_Acl_Dset.appendUser';
    $params->formIdAppend = 'wgt-form-wbfsys_security_area-acl-dset-append';

    // append form actions
    $this->setFormData( $params->formActionAppend, $params->formIdAppend, $params, 'Append' );

    // the tabid that is used in the template
    // this tabid has to be placed in the class attribute of all subtasks
    //$this->setTabId( 'wgt-tab-wbfsys_security_area-acl-dset' );

    //add selectbox
    $selectboxGroups = new WgtSelectbox( 'selectboxGroups', $this );
    $selectboxGroups->setData( $this->model->getGroups( $areaId, $params ) );
    $selectboxGroups->addAttributes( array(
      'id'    => 'wgt-input-wbfsys_security_area-acl-dset-id_group',
      'name'  => 'wbfsys_group_users[id_group]',
      'class' => 'medium asgd-'.$params->formIdAppend
    ));

    // create the list element
    // create the ui helper object
    $ui = $this->loadUi( 'WbfsysSecurityArea_Acl_Dset' );

    // inject needed resources in the ui object
    $ui->setModel( $this->model );
    $ui->setView( $this );

    $ui->createListItem
    (
      $this->model->searchQualifiedUsers( $entityWbfsysSecurityArea, $areaId, $params ),
      $entityWbfsysSecurityArea,
      $areaId,
      $params->access,
      $params
    );

    // inject the menu in the view object
    $this->createMenu( $entityWbfsysSecurityArea, $params );

    return null;

  }//end public function displayGraph */

  /** inject the menu in the activ view object
   *
   *
   * @param WbfsysSecurityArea_Entity $entityWbfsysSecurityArea
   * @param TFlag $params the named parameter object that was created in
   *   the controller
   * {
   *   string formId: the id of the form;
   * }
   */
  public function createMenu( $entityWbfsysSecurityArea, $params )
  {

    $menu     = $this->newMenu
    (
      $this->id.'_dropmenu',
      'WbfsysSecurityArea_Acl_Dset'
    );
    $menu->id = $this->id.'_dropmenu';
    $menu->buildMenu( $entityWbfsysSecurityArea, $params );

    $menu->addMenuLogic( $this, $entityWbfsysSecurityArea, $params );

    return true;

  }//end public function createMenu */

} // end class WbfsysSecurityArea_Acl_Dset_Maintab_View */

