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
class WbfsysPackageStatus_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysPackageStatus_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysPackageStatus_Entity $entityWbfsysPackageStatus
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysPackageStatus, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysPackageStatus )
      $params->fieldsWbfsysPackageStatus = $entityWbfsysPackageStatus->getCols( $params->categories );

    $formWbfsysPackageStatus = $view->newForm( 'WbfsysPackageStatus' );

    if( $params->keyName )
      $formWbfsysPackageStatus->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysPackageStatus->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysPackageStatus->setTarget( $params->input );

    $formWbfsysPackageStatus->setTargetMask( $params->targetMask );

    $formWbfsysPackageStatus->setParams( $params );

    $formWbfsysPackageStatus->createForm
    (
      $entityWbfsysPackageStatus,
      $params->fieldsWbfsysPackageStatus,
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
   * @param WbfsysPackageStatus_Entity $entityWbfsysPackageStatus
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysPackageStatus, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysPackageStatus', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysPackageStatus->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysPackageStatus', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysPackageStatus->getId()
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

    $entityWbfsysPackageStatus = new WbfsysPackageStatus_Entity();

    $formWbfsysPackageStatus = $view->newForm( 'WbfsysPackageStatus' );
    $formWbfsysPackageStatus->createForm
    (
      $entityWbfsysPackageStatus,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysPackageStatus_Crud_Ui

