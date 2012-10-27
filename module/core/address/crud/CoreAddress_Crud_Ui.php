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
 * @subpackage ModCore
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CoreAddress_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var CoreAddress_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param CoreAddress_Entity $entityCoreAddress
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityCoreAddress, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsCoreAddress )
      $params->fieldsCoreAddress = $entityCoreAddress->getCols( $params->categories );

    $formCoreAddress = $view->newForm( 'CoreAddress' );

    if( $params->keyName )
      $formCoreAddress->setKeyName( $params->keyName );

    if( $params->suffix )
      $formCoreAddress->setSuffix( $params->suffix );

    if( $params->input )
      $formCoreAddress->setTarget( $params->input );

    $formCoreAddress->setTargetMask( $params->targetMask );

    $formCoreAddress->setParams( $params );

    $formCoreAddress->createForm
    (
      $entityCoreAddress,
      $params->fieldsCoreAddress,
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
   * @param CoreAddress_Entity $entityCoreAddress
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityCoreAddress, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textCoreAddress', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityCoreAddress->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idCoreAddress', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityCoreAddress->getId()
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

    $entityCoreAddress = new CoreAddress_Entity();

    $formCoreAddress = $view->newForm( 'CoreAddress' );
    $formCoreAddress->createForm
    (
      $entityCoreAddress,
      array($field),
      $params
    );

  }//end public function item */

}//end class CoreAddress_Crud_Ui

