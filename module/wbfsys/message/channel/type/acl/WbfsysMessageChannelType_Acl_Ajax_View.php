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

 * @lang de:
 *
 * View Klasse zum behandeln der Ajax Requests für die Services autocomplete,
 * connect und search
 *
 * Wird automatisch verwendet wenn eine Request über das ajax.php interface
 * gekommen ist.
 *
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysMessageChannelType_Acl_Ajax_View
  extends Webfrap_Acl_Ajax_View
{
////////////////////////////////////////////////////////////////////////////////
// display methodes
////////////////////////////////////////////////////////////////////////////////

  /**
   * inject the search result from the autocomplete request as json in the view
   * the view will answer as a normal ajax / xml request but embed the
   * json data as data package, which will be returned in the browser from the
   * calling request method
   *
   * @param string $key
   * @param TArray $params
   * @return null / Error im Fehlerfall
   */
  public function displayAutocomplete( $key, $params )
  {

    $view = $this->getTplEngine();
    $view->setRawJsonData( $this->model->searchGroupsAutocomplete( $key, $params ) );

    return null;

  }//end public function displayAutocomplete */

  /**
   * on connect the server pushes a new table row via ajax area to the client
   * the ajax area appends automatically at the end of the listing element body
   *
   * @param TArray $params control flags
   */
  public function displayConnect( $params )
  {

    $ui = $this->tpl->loadUi( 'WbfsysMessageChannelType_Acl' );
    $ui->setModel( $this->model );

    $ui->listEntry( $params->access, $params, true  );

    // kein fehler? na buper :-)
    return null;

  }//end public function displayConnect */

  /**
   * search pushes a rendered listing element body to the client, that replaces
   * the existing body
   *
   * @param int $areaId the rowid of the activ area
   * @param TArray $params control flags
   * @return null / Error im Fehlerfall
   */
  public function displaySearch( $areaId, $params )
  {
    
    $access = $params->access;

    $ui = $this->tpl->loadUi( 'WbfsysMessageChannelType_Acl' );
    $ui->setModel( $this->model );

    // add the id to the form
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_message_channel_type-acl-search';

    $params->ajax = true;

    $ui->createListItem
    (
      $this->model->search( $areaId, $access, $params ),
      $access,
      $params
    );

    return null;

  }//end public function displaySearch */

} // end class WbfsysMessageChannelType_Acl_Ajax_View */

