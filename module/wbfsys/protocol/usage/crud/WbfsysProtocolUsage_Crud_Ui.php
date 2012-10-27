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
class WbfsysProtocolUsage_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysProtocolUsage_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysProtocolUsage_Entity $entityWbfsysProtocolUsage
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysProtocolUsage, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysProtocolUsage )
      $params->fieldsWbfsysProtocolUsage = $entityWbfsysProtocolUsage->getCols( $params->categories );

    $formWbfsysProtocolUsage = $view->newForm( 'WbfsysProtocolUsage' );

    if( $params->keyName )
      $formWbfsysProtocolUsage->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysProtocolUsage->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysProtocolUsage->setTarget( $params->input );

    $formWbfsysProtocolUsage->setTargetMask( $params->targetMask );

    $formWbfsysProtocolUsage->setParams( $params );

    $formWbfsysProtocolUsage->createForm
    (
      $entityWbfsysProtocolUsage,
      $params->fieldsWbfsysProtocolUsage,
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
   * @param WbfsysProtocolUsage_Entity $entityWbfsysProtocolUsage
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysProtocolUsage, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysProtocolUsage', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysProtocolUsage->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysProtocolUsage', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysProtocolUsage->getId()
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

    $entityWbfsysProtocolUsage = new WbfsysProtocolUsage_Entity();

    $formWbfsysProtocolUsage = $view->newForm( 'WbfsysProtocolUsage' );
    $formWbfsysProtocolUsage->createForm
    (
      $entityWbfsysProtocolUsage,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysProtocolUsage_Crud_Ui

