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
class CoreCurrency_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var CoreCurrency_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param CoreCurrency_Entity $entityCoreCurrency
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityCoreCurrency, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsCoreCurrency )
      $params->fieldsCoreCurrency = $entityCoreCurrency->getCols( $params->categories );

    $formCoreCurrency = $view->newForm( 'CoreCurrency' );

    if( $params->keyName )
      $formCoreCurrency->setKeyName( $params->keyName );

    if( $params->suffix )
      $formCoreCurrency->setSuffix( $params->suffix );

    if( $params->input )
      $formCoreCurrency->setTarget( $params->input );

    $formCoreCurrency->setTargetMask( $params->targetMask );

    $formCoreCurrency->setParams( $params );

    $formCoreCurrency->createForm
    (
      $entityCoreCurrency,
      $params->fieldsCoreCurrency,
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
   * @param CoreCurrency_Entity $entityCoreCurrency
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityCoreCurrency, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textCoreCurrency', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityCoreCurrency->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idCoreCurrency', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityCoreCurrency->getId()
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

    $entityCoreCurrency = new CoreCurrency_Entity();

    $formCoreCurrency = $view->newForm( 'CoreCurrency' );
    $formCoreCurrency->createForm
    (
      $entityCoreCurrency,
      array($field),
      $params
    );

  }//end public function item */

}//end class CoreCurrency_Crud_Ui

