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
class CoreCountryCategory_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var CoreCountryCategory_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param CoreCountryCategory_Entity $entityCoreCountryCategory
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityCoreCountryCategory, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsCoreCountryCategory )
      $params->fieldsCoreCountryCategory = $entityCoreCountryCategory->getCols( $params->categories );

    $formCoreCountryCategory = $view->newForm( 'CoreCountryCategory' );

    if( $params->keyName )
      $formCoreCountryCategory->setKeyName( $params->keyName );

    if( $params->suffix )
      $formCoreCountryCategory->setSuffix( $params->suffix );

    if( $params->input )
      $formCoreCountryCategory->setTarget( $params->input );

    $formCoreCountryCategory->setTargetMask( $params->targetMask );

    $formCoreCountryCategory->setParams( $params );

    $formCoreCountryCategory->createForm
    (
      $entityCoreCountryCategory,
      $params->fieldsCoreCountryCategory,
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
   * @param CoreCountryCategory_Entity $entityCoreCountryCategory
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityCoreCountryCategory, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textCoreCountryCategory', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityCoreCountryCategory->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idCoreCountryCategory', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityCoreCountryCategory->getId()
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

    $entityCoreCountryCategory = new CoreCountryCategory_Entity();

    $formCoreCountryCategory = $view->newForm( 'CoreCountryCategory' );
    $formCoreCountryCategory->createForm
    (
      $entityCoreCountryCategory,
      array($field),
      $params
    );

  }//end public function item */

}//end class CoreCountryCategory_Crud_Ui

