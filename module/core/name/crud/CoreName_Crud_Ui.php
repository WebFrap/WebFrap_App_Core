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
class CoreName_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var CoreName_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param CoreName_Entity $entityCoreName
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityCoreName, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsCoreName )
      $params->fieldsCoreName = $entityCoreName->getCols( $params->categories );

    $formCoreName = $view->newForm( 'CoreName' );

    if( $params->keyName )
      $formCoreName->setKeyName( $params->keyName );

    if( $params->suffix )
      $formCoreName->setSuffix( $params->suffix );

    if( $params->input )
      $formCoreName->setTarget( $params->input );

    $formCoreName->setTargetMask( $params->targetMask );

    $formCoreName->setParams( $params );

    $formCoreName->createForm
    (
      $entityCoreName,
      $params->fieldsCoreName,
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
   * @param CoreName_Entity $entityCoreName
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityCoreName, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textCoreName', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityCoreName->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idCoreName', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityCoreName->getId()
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

    $entityCoreName = new CoreName_Entity();

    $formCoreName = $view->newForm( 'CoreName' );
    $formCoreName->createForm
    (
      $entityCoreName,
      array($field),
      $params
    );

  }//end public function item */

}//end class CoreName_Crud_Ui

