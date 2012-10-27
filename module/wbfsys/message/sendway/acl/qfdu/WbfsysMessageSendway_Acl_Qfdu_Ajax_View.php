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
class WbfsysMessageSendway_Acl_Qfdu_Ajax_View
  extends LibTemplateAjaxView
{
////////////////////////////////////////////////////////////////////////////////
// display methodes
////////////////////////////////////////////////////////////////////////////////

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
  public function displayAutocomplete( $areaId, $key, $params )
  {

    $view = $this->getTplEngine();
    $view->setRawJsonData( $this->model->getUsersByKey( $areaId, $key, $params ) );

    return null;

  }//end public function displayAutocomplete */

  /**
   * automcomplete for the Message Sendway entity
   *
   * inject the search result from the autocomplete request as json in the view
   * the view will answer as a normal ajax / xml request but embed the
   * json data as data package, which will be returned in the browser from the
   * calling request method
   *
   * @param string $areaId the rowid of the activ area
   * @param string $key the search key from the autocomplete field
   * @param TArray $params useriput / control flags
   */
  public function displayAutocompleteEntity( $areaId, $key, $params )
  {

    $view = $this->getTplEngine();
    $view->setRawJsonData( $this->model->getEntitiesByKey($areaId, $key, $params) );

    return null;

  }//end public function displayAutocompleteEntity */

  /**
   * append a new user in relation to an area / entity to a group
   *
   * on connect the server pushes a new table row via ajax area to the client
   * the ajax area appends automatically at the end of the listing element body
   *
   * @param string $areaId the rowid of the activ area
   * @param TArray $params useriput / control flags
   */
  public function displayConnect( $areaId, $params )
  {

    $ui = $this->tplEngine->loadUi( 'WbfsysMessageSendway_Acl_Qfdu' );
    $ui->setModel( $this->model );

    $ui->listEntry( $areaId, $params->access, $params, true );

    return null;

  }//end public function displayConnect */

  /**
   * search pushes a rendered listing element body to the client, that replaces
   * the existing body
   *
   * @param int $areaId the rowid of the activ area
   * @param TArray $params control flags
   */
  public function displaySearch( $areaId, $params )
  {

    $ui = $this->tplEngine->loadUi( 'WbfsysMessageSendway_Acl_Qfdu' );
    $ui->setModel( $this->model );
    $ui->setView( $this->getView() );

    // add the id to the form
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_message_sendway-acl-qfdu-search';

    // ok it's definitly an ajax request
    $params->ajax = true;

    $ui->createListItem
    (
      $this->model->searchQualifiedUsers( $areaId, $params ),
      $areaId,
      $params->access,
      $params
    );

    return null;

  }//end public function displaySearch */

} // end class WbfsysMessageSendway_Acl_Qfdu_Ajax_View */

