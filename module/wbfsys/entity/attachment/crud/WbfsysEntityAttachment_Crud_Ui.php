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
class WbfsysEntityAttachment_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysEntityAttachment_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysEntityAttachment_Entity $entityWbfsysEntityAttachment
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysEntityAttachment, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysEntityAttachment )
      $params->fieldsWbfsysEntityAttachment = $entityWbfsysEntityAttachment->getCols( $params->categories );

    $formWbfsysEntityAttachment = $view->newForm( 'WbfsysEntityAttachment' );

    if( $params->keyName )
      $formWbfsysEntityAttachment->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysEntityAttachment->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysEntityAttachment->setTarget( $params->input );

    $formWbfsysEntityAttachment->setTargetMask( $params->targetMask );

    $formWbfsysEntityAttachment->setParams( $params );

    $formWbfsysEntityAttachment->createForm
    (
      $entityWbfsysEntityAttachment,
      $params->fieldsWbfsysEntityAttachment,
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
   * @param WbfsysEntityAttachment_Entity $entityWbfsysEntityAttachment
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysEntityAttachment, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysEntityAttachment', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysEntityAttachment->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysEntityAttachment', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysEntityAttachment->getId()
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

    $entityWbfsysEntityAttachment = new WbfsysEntityAttachment_Entity();

    $formWbfsysEntityAttachment = $view->newForm( 'WbfsysEntityAttachment' );
    $formWbfsysEntityAttachment->createForm
    (
      $entityWbfsysEntityAttachment,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysEntityAttachment_Crud_Ui

