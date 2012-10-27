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
class WbfsysMessageProfile_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysMessageProfile_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysMessageProfile_Entity $entityWbfsysMessageProfile
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysMessageProfile, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysMessageProfile )
      $params->fieldsWbfsysMessageProfile = $entityWbfsysMessageProfile->getCols( $params->categories );

    $formWbfsysMessageProfile = $view->newForm( 'WbfsysMessageProfile' );

    if( $params->keyName )
      $formWbfsysMessageProfile->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysMessageProfile->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysMessageProfile->setTarget( $params->input );

    $formWbfsysMessageProfile->setTargetMask( $params->targetMask );

    $formWbfsysMessageProfile->setParams( $params );

    $formWbfsysMessageProfile->createForm
    (
      $entityWbfsysMessageProfile,
      $params->fieldsWbfsysMessageProfile,
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
   * @param WbfsysMessageProfile_Entity $entityWbfsysMessageProfile
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysMessageProfile, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysMessageProfile', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysMessageProfile->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysMessageProfile', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysMessageProfile->getId()
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

    $entityWbfsysMessageProfile = new WbfsysMessageProfile_Entity();

    $formWbfsysMessageProfile = $view->newForm( 'WbfsysMessageProfile' );
    $formWbfsysMessageProfile->createForm
    (
      $entityWbfsysMessageProfile,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysMessageProfile_Crud_Ui

