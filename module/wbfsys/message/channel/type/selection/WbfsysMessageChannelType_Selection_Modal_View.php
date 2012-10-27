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
class WbfsysMessageChannelType_Selection_Modal_View
  extends WgtModal
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////

    /**
    * @var WbfsysMessageChannelType_Selection_Model
    */
    public $model = null;

    /**
    * @var WbfsysMessageChannelType_Selection_Ui
    */
    public $ui = null;

    /**
     * Die Breite des Modal Elements
     * @var int in px
     */
    public $width   = 950 ;
    
    /**
     * Die Höhe des Modal Elements
     * @var int in px
     */
    public $height   = 650 ;
    
////////////////////////////////////////////////////////////////////////////////
// Context Selection
////////////////////////////////////////////////////////////////////////////////

 /**
  * de:
  * Erstellen eines neuen Subwindows mit einem Auswahl Listenelement vom
  * Type: wbfsys_message_channel_type
  *
  * @param TFlag $params benamte parameter
  * {
  *   @param: ckey searchFormAction, Die URL an welche das Suchformular
  *     Bzw. der Paging Request des Listenelements geschickt werden soll
  *
  *   @param: ckey searchFormId, Die HTML ID des Suchformulars, welches mit dem Listenelement
  *     verbunden ist.
  *     Auf diesem Formular TAG werden im Client alle für das Element relevanten Metadaten, z.B Daten zum Paging
  *     Sortierung etc. per jQuery.data() abgelegt
  * }
  * @return boolean
  */
  public function displaySelection( $params )
  {

    $access = $params->access;
  
    // set the default table template
    $this->setTemplate( 'wbfsys/message_channel_type/modal/selection_table' );

    // fetch the i18n text only one time
    $i18nText = $this->i18n->l
    (
      'Select {@label@}',
      'wbfsys.text',
      array
      (
        'label' => $this->i18n->l( 'message channel Type', 'wbfsys.message_channel_type.label' )
      )
    );

    // set the window status
    $this->setLabel( $i18nText );

    // set the window title
    $this->setTitle( $i18nText );

    // create the form action
    if( !$params->searchFormAction )
      $params->searchFormAction = 'index.php?c=Wbfsys.MessageChannelType.filter';

    // add the id to the form
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-selection-wbfsys_message_channel_type-search';

    // fill the relevant data for the search form
    $this->setSearchFormData( $params );

    $ui = $this->loadUi( 'WbfsysMessageChannelType_Selection' );

    // inject the table item in the template system
    $ui->createListItem
    (
      $this->model->search( $access, $params ),
      $access,
      $params
    );

    // inject the search fields for the table context to the template system
    $ui->searchForm
    (
      $this->model,
      $params
    );

    // kein fehler passiert? also geben wir keinen zurück
    return null;

  }//end public function displaySelection */

  /**
   * create the create buttons
   * @param TFlag $params the named parameter object that was created in
   *   the controller
   * {
   *   string searchFormId: the id of the search form;
   * }
   */
  public function addActions( $params )
  {

    // add the button actions for new and search in the window
    // the code will be binded direct on a window object and is removed
    // on window Close
    // all buttons with the class save will call that action
    $code = <<<BUTTONJS

    self.find(".wgtac_search").click(function() {
      \$R.form('{$params->searchFormId}', null, {search:true});
    });

BUTTONJS;

    $this->addJsCode( $code );

  }//end public function addActions */

}//end class WbfsysMessageChannelType_Selection_Modal_View

