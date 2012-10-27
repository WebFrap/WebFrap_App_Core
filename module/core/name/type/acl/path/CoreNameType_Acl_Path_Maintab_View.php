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
 * @subpackage ModCore
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreNameType_Acl_Path_Maintab_View
  extends WgtMaintab
{////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////

   /**
    * @var CoreNameType_Acl_Path_Model
    */
    public $model = null;

   /**
    * @var CoreNameType_Acl_Path_Ui
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
  public function displayGraph( $groupId, $params )
  {

    // set the path to the template
    // the system search in all modules for the template
    // the tpl ending is assigned automatically
    $this->setTemplate( 'core/name_type/maintab/acl/acl_graph' );


    // fetch the i18n text only one time
    $i18nText = $this->i18n->l
    (
      'Access Inheritance for the {@label@}',
      'wbf.label',
      array( 'label' => 'name Types' )
    );

    // set browser title
    $this->setTitle($i18nText);
    // the label is displayed in the maintab as text
    $this->setLabel($i18nText);

    $params->viewType = 'maintab';

    // the tabid that is used in the template
    // this tabid has to be placed in the class attribute of all subtasks
    //$this->setTabId( 'wgt-tab-core_name_type-acl-path');

    $areaId = $this->model->getAreaId();

    $this->addVar( 'treeData', $this->model->getReferences( $areaId, $groupId, $params ) );
    $this->addVar( 'groups', $this->model->getAreaGroups( $areaId, $groupId, $params ) );


    $this->addVar( 'areaId', $areaId );
    $this->addVar( 'groupId', $groupId );
    $this->addVar( 'group', $this->model->getGroup( $groupId ) );

    // check graph type
    if( !$params->graphType )
      $params->graphType = 'spacetree';
      
    $this->addVar( 'graphType', $params->graphType );

    // create form elements
    $selectAccess = new Webfrap_Acl_Selectbox_Access( 'inputAccess', $this );
    $selectAccess->addAttributes(array(
      'id'    => 'wgt-input-core_name_type-acl-path-access_level',
      'class' => 'medium',
      'name'  => 'wbfsys_security_path[access_level]',
    ));


    // inject the menu in the view object
    $this->createMenu( $areaId, $params );

    return null;

  }//end public function displayGraph */

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
      'CoreNameType_Acl_Path'
    );
    $menu->id = $this->id.'_dropmenu';
    $menu->buildMenu( $objid, $params );

    $menu->addMenuLogic( $this, $objid, $params );

    return true;

  }//end public function createMenu */

} // end class CoreNameType_Acl_Path_Maintab_View */

