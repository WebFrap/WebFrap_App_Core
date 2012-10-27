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
class CoreCountry_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var CoreCountry_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param CoreCountry_Entity $entityCoreCountry
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityCoreCountry, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsCoreCountry )
      $params->fieldsCoreCountry = $entityCoreCountry->getCols( $params->categories );

    $formCoreCountry = $view->newForm( 'CoreCountry' );

    if( $params->keyName )
      $formCoreCountry->setKeyName( $params->keyName );

    if( $params->suffix )
      $formCoreCountry->setSuffix( $params->suffix );

    if( $params->input )
      $formCoreCountry->setTarget( $params->input );

    $formCoreCountry->setTargetMask( $params->targetMask );

    $formCoreCountry->setParams( $params );

    $formCoreCountry->createForm
    (
      $entityCoreCountry,
      $params->fieldsCoreCountry,
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
   * @param CoreCountry_Entity $entityCoreCountry
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityCoreCountry, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textCoreCountry', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityCoreCountry->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idCoreCountry', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityCoreCountry->getId()
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

    $entityCoreCountry = new CoreCountry_Entity();

    $formCoreCountry = $view->newForm( 'CoreCountry' );
    $formCoreCountry->createForm
    (
      $entityCoreCountry,
      array($field),
      $params
    );

  }//end public function item */

}//end class CoreCountry_Crud_Ui

