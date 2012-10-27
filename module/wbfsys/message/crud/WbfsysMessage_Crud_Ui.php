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
class WbfsysMessage_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysMessage_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysMessage_Entity $entityWbfsysMessage
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysMessage, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysMessage )
      $params->fieldsWbfsysMessage = $entityWbfsysMessage->getCols( $params->categories );

    $formWbfsysMessage = $view->newForm( 'WbfsysMessage' );

    if( $params->keyName )
      $formWbfsysMessage->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysMessage->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysMessage->setTarget( $params->input );

    $formWbfsysMessage->setTargetMask( $params->targetMask );

    $formWbfsysMessage->setParams( $params );

    $formWbfsysMessage->createForm
    (
      $entityWbfsysMessage,
      $params->fieldsWbfsysMessage,
      $params
    );

    return true;

  }//end public function ajaxForm */

////////////////////////////////////////////////////////////////////////////////
// Value Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * fetch the text value for an entity and deploy it to a given input element
   *
   *
   * @param WbfsysMessage_Entity $entityWbfsysMessage
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysMessage, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysMessage', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysMessage->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysMessage', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysMessage->getId()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItem->refresh = 'value';

  }//end public function textByKey */

  /**
   *
   * @param ViewTemplateWindow $view
   * @param string $field
   * @param TFlag $params named parameters
   * @return void
   */
  public function item( $view, $field, $params )
  {

    $entityWbfsysMessage = new WbfsysMessage_Entity();

    $formWbfsysMessage = $view->newForm( 'WbfsysMessage' );
    $formWbfsysMessage->createForm
    (
      $entityWbfsysMessage,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysMessage_Crud_Ui

