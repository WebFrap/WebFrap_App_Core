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
class WbfsysProcessNode_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysProcessNode_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysProcessNode_Entity $entityWbfsysProcessNode
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysProcessNode, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysProcessNode )
      $params->fieldsWbfsysProcessNode = $entityWbfsysProcessNode->getCols( $params->categories );

    $formWbfsysProcessNode = $view->newForm( 'WbfsysProcessNode' );

    if( $params->keyName )
      $formWbfsysProcessNode->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysProcessNode->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysProcessNode->setTarget( $params->input );

    $formWbfsysProcessNode->setTargetMask( $params->targetMask );

    $formWbfsysProcessNode->setParams( $params );

    $formWbfsysProcessNode->createForm
    (
      $entityWbfsysProcessNode,
      $params->fieldsWbfsysProcessNode,
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
   * @param WbfsysProcessNode_Entity $entityWbfsysProcessNode
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysProcessNode, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysProcessNode', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysProcessNode->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysProcessNode', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysProcessNode->getId()
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

    $entityWbfsysProcessNode = new WbfsysProcessNode_Entity();

    $formWbfsysProcessNode = $view->newForm( 'WbfsysProcessNode' );
    $formWbfsysProcessNode->createForm
    (
      $entityWbfsysProcessNode,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysProcessNode_Crud_Ui

