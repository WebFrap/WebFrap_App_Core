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
class MyMessage_Ref_SendWay_Table_Modal_View
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
      array( 'label' => 'Send Ways' )
    );

    // set the window status
    $this->setLabel( $i18nText );

    // set the window title
    $this->setTitle( $i18nText );
  
    $access = $params->accessSendWay;

    // create the form action
    $params->searchFormAction = 'ajax.php?c=My.Message_Ref_SendWay.search&amp;objid='.$objid;

    // add the id to the form
    $params->searchFormId = 'wgt-form-table-my_message-ref-send_way-search-'.$objid;
      
    // fix the target id
		$params->targetId = 'wgt-table-modal-ref-send_way-'.$objid;

    // fill the relevant data for the search form
    $this->setSearchFormData( $params, 'SendWay' );

    // set the default table template
    $this->setTemplate( 'my/message/ref_send_way/tab_table' );

    $ui = $this->loadUi( 'MyMessage_Ref_SendWay_Table' );
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

}//end class MyMessage_Ref_SendWay_Table_Modal_View

