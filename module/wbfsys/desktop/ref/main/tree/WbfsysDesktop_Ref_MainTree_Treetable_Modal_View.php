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
class WbfsysDesktop_Ref_MainTree_Treetable_Modal_View
  extends WgtModal
{
/*//////////////////////////////////////////////////////////////////////////////
// Attributes
//////////////////////////////////////////////////////////////////////////////*/

 /**
	* @var int Width of the modal element in px
	*/
  public $width = 900;
  
 /**
	* @var int Height of the modal element in px
	*/
  public $height = 650;

////////////////////////////////////////////////////////////////////////////////
// listing methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * add the table item
  * add the search field elements
  *
  * @param int $objid the id of the reference dataset
  * @param TFlag $params
  * @return null / Error im Fehlerfall
  */
  public function displayTab( $objid, $params )
  {
  
    // fetch the i18n text only one time
    $i18nText = $this->i18n->l
    (
      'Treetable {@label@}',
      'wbf.label',
      array( 'label' => 'Main Trees' )
    );

    // set the window status
    $this->setLabel( $i18nText );

    // set the window title
    $this->setTitle( $i18nText );
  
    $access = $params->accessMainTree;

    if(!$params->refId)
      $params->refId = $objid;

    // create the form action
    $params->searchFormAction = 'index.php?c=Wbfsys.Desktop_Ref_MainTree.search&amp;ltype=treetable&amp;objid='.$params->refId;

    // add the id to the form
    $params->searchFormId = 'wgt-form-treetable-wbfsys_desktop-ref-main_tree-search-'.$objid;

    // fix the treetable treetable id
		$params->targetId = 'wgt-treetable-modal-ref-main_tree-'.$objid;

    // fill the relevant data for the search form
    $this->setSearchFormData( $params, 'MainTree' );

    // set the default table template
    $this->setTemplate( 'wbfsys/desktop/ref_main_tree/tab_treetable' );

    $ui = $this->loadUi( 'WbfsysDesktop_Ref_MainTree_Treetable' );
    $ui->setModel( $this->model );

    // inject the table item in the template system
    $ui->createListItem
    (
      $params->refId,
      $this->model->search( $objid, $access, $params ),
      $access,
      $params
    );

    // inject the search fields for the table context to the template system
    $ui->searchForm
    (
      $objid,
      $this->model,
      $params
    );

    // kein fehler? alles klar
    return null;

  }//end public function displayTab */

}//end class WbfsysDesktop_Ref_MainTree_Treetable_Modal_View

