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
class WbfsysUserRelationStatus_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysUserRelationStatus_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysUserRelationStatus_Entity $entityWbfsysUserRelationStatus
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysUserRelationStatus, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysUserRelationStatus )
      $params->fieldsWbfsysUserRelationStatus = $entityWbfsysUserRelationStatus->getCols( $params->categories );

    $formWbfsysUserRelationStatus = $view->newForm( 'WbfsysUserRelationStatus' );

    if( $params->keyName )
      $formWbfsysUserRelationStatus->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysUserRelationStatus->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysUserRelationStatus->setTarget( $params->input );

    $formWbfsysUserRelationStatus->setTargetMask( $params->targetMask );

    $formWbfsysUserRelationStatus->setParams( $params );

    $formWbfsysUserRelationStatus->createForm
    (
      $entityWbfsysUserRelationStatus,
      $params->fieldsWbfsysUserRelationStatus,
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
   * @param WbfsysUserRelationStatus_Entity $entityWbfsysUserRelationStatus
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysUserRelationStatus, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysUserRelationStatus', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysUserRelationStatus->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysUserRelationStatus', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysUserRelationStatus->getId()
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

    $entityWbfsysUserRelationStatus = new WbfsysUserRelationStatus_Entity();

    $formWbfsysUserRelationStatus = $view->newForm( 'WbfsysUserRelationStatus' );
    $formWbfsysUserRelationStatus->createForm
    (
      $entityWbfsysUserRelationStatus,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysUserRelationStatus_Crud_Ui

