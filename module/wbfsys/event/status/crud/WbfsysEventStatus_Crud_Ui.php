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
class WbfsysEventStatus_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysEventStatus_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysEventStatus_Entity $entityWbfsysEventStatus
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysEventStatus, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysEventStatus )
      $params->fieldsWbfsysEventStatus = $entityWbfsysEventStatus->getCols( $params->categories );

    $formWbfsysEventStatus = $view->newForm( 'WbfsysEventStatus' );

    if( $params->keyName )
      $formWbfsysEventStatus->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysEventStatus->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysEventStatus->setTarget( $params->input );

    $formWbfsysEventStatus->setTargetMask( $params->targetMask );

    $formWbfsysEventStatus->setParams( $params );

    $formWbfsysEventStatus->createForm
    (
      $entityWbfsysEventStatus,
      $params->fieldsWbfsysEventStatus,
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
   * @param WbfsysEventStatus_Entity $entityWbfsysEventStatus
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysEventStatus, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysEventStatus', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysEventStatus->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysEventStatus', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysEventStatus->getId()
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

    $entityWbfsysEventStatus = new WbfsysEventStatus_Entity();

    $formWbfsysEventStatus = $view->newForm( 'WbfsysEventStatus' );
    $formWbfsysEventStatus->createForm
    (
      $entityWbfsysEventStatus,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysEventStatus_Crud_Ui

