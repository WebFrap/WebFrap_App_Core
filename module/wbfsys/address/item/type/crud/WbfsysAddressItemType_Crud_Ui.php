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
class WbfsysAddressItemType_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysAddressItemType_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysAddressItemType_Entity $entityWbfsysAddressItemType
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysAddressItemType, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysAddressItemType )
      $params->fieldsWbfsysAddressItemType = $entityWbfsysAddressItemType->getCols( $params->categories );

    $formWbfsysAddressItemType = $view->newForm( 'WbfsysAddressItemType' );

    if( $params->keyName )
      $formWbfsysAddressItemType->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysAddressItemType->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysAddressItemType->setTarget( $params->input );

    $formWbfsysAddressItemType->setTargetMask( $params->targetMask );

    $formWbfsysAddressItemType->setParams( $params );

    $formWbfsysAddressItemType->createForm
    (
      $entityWbfsysAddressItemType,
      $params->fieldsWbfsysAddressItemType,
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
   * @param WbfsysAddressItemType_Entity $entityWbfsysAddressItemType
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysAddressItemType, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysAddressItemType', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysAddressItemType->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysAddressItemType', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysAddressItemType->getId()
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

    $entityWbfsysAddressItemType = new WbfsysAddressItemType_Entity();

    $formWbfsysAddressItemType = $view->newForm( 'WbfsysAddressItemType' );
    $formWbfsysAddressItemType->createForm
    (
      $entityWbfsysAddressItemType,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysAddressItemType_Crud_Ui

