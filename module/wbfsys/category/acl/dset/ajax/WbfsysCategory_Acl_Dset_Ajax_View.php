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
class WbfsysCategory_Acl_Dset_Ajax_View
  extends LibTemplateAjaxView
{////////////////////////////////////////////////////////////////////////////////
// display methodes
////////////////////////////////////////////////////////////////////////////////

  /**
   * search pushes a rendered listing element body to the client, that replaces
   * the existing body
   *
   * @param int $dsetId
   * @param int $areaId the rowid of the activ area
   * @param TArray $params control flags
   */
  public function displaySearch( $dsetId, $areaId, $params )
  {

    $ui = $this->tpl->loadUi( 'WbfsysCategory_Acl_Dset' );
    $ui->setModel( $this->model );
    $ui->setView( $this->getView() );

    // add the id to the form
    $params->searchFormId = 'wgt-form-table-wbfsys_category-acl-dset-search';

    // fetch the entity object an push it in the view
    $entityWbfsysCategory = $this->model->getEntity( $dsetId );

    // ok it's definitly an ajax request
    $params->ajax = true;

    $ui->createListItem
    (
      $this->model->searchQualifiedUsers( $dsetId, $areaId, $params ),
      $entityWbfsysCategory,
      $areaId,
      $params->access,
      $params
    );

    return null;

  }//end public function displaySearch */

  /**
   * automcomplete for the user roles
   *
   * inject the search result from the autocomplete request as json in the view
   * the view will answer as a normal ajax / xml request but embed the
   * json data as data package, which will be returned in the browser from the
   * calling request method
   *
   * @param string $areaId the rowid of the activ area
   * @param string $key the search key from the autocomplete field
   * @param TArray $params useriput / control flags
   *
   * @return void
   */
  public function displayAutocompleteUsers( $areaId, $key, $params )
  {

    $view = $this->getTplEngine();
    $view->setRawJsonData( $this->model->getUsersByKey( $areaId, $key, $params) );

    // kein fehler? alles klar
    return null;

  }//end public function displayAutocomplete */

  /**
   * append a new user in relation to an area / entity to a group
   *
   * on connect the server pushes a new table row via ajax area to the client
   * the ajax area appends automatically at the end of the listing element body
   *
   * @param string $areaId the rowid of the activ area
   * @param TArray $params useriput / control flags
   */
  public function displayConnect( $params )
  {

    $ui = $this->tpl->loadUi( 'WbfsysCategory_Acl_Dset' );
    $ui->setModel( $this->model );

    $ui->listEntry( $params->access, $params, true );

    // kein fehler? alles klar
    return null;

  }//end public function displayConnect */

} // end class WbfsysCategory_Acl_Dset_Ajax_View */

