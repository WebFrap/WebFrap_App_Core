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
class WbfsysIssue_Ref_Tags_Table_Modal_View
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
  * @return boolean
  */
  public function displayTab( $objid, $params )
  {
  
    // fetch the i18n text only one time
    $i18nText = $this->i18n->l
    (
      'Table {@label@}',
      'wbf.label',
      array( 'label' => 'Tags' )
    );

    // set the window status
    $this->setLabel( $i18nText );

    // set the window title
    $this->setTitle( $i18nText );
  
    $access = $params->accessTags;

    // create the form action
    if( !$params->searchFormAction )
      $params->searchFormAction = 'ajax.php?c=Wbfsys.Issue_Ref_Tags.search&amp;objid='.$objid;

    // add the id to the form
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-table-wbfsys_issue-ref-tags-search-'.$objid;

    // fill the relevant data for the search form
    $this->setSearchFormData( $params, 'Tags' );

    // set the default table template
    $this->setTemplate( 'wbfsys/issue/ref_tags/tab_table' );

    $ui = $this->loadUi( 'WbfsysIssue_Ref_Tags_Table' );
    $ui->setModel( $this->model );

    // inject the table item in the template system
    $ui->createListItem
    (
      $objid,
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


    // alles ok, also geben wir keinen fehler zurück
    return null;

  }//end public function displayTab */

}//end class WbfsysIssue_Ref_Tags_Table_Modal_View

