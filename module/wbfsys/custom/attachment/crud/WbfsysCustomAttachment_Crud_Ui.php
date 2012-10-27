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
class WbfsysCustomAttachment_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysCustomAttachment_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysCustomAttachment_Entity $entityWbfsysCustomAttachment
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysCustomAttachment, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysCustomAttachment )
      $params->fieldsWbfsysCustomAttachment = $entityWbfsysCustomAttachment->getCols( $params->categories );

    $formWbfsysCustomAttachment = $view->newForm( 'WbfsysCustomAttachment' );

    if( $params->keyName )
      $formWbfsysCustomAttachment->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysCustomAttachment->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysCustomAttachment->setTarget( $params->input );

    $formWbfsysCustomAttachment->setTargetMask( $params->targetMask );

    $formWbfsysCustomAttachment->setParams( $params );

    $formWbfsysCustomAttachment->createForm
    (
      $entityWbfsysCustomAttachment,
      $params->fieldsWbfsysCustomAttachment,
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
   * @param WbfsysCustomAttachment_Entity $entityWbfsysCustomAttachment
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysCustomAttachment, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysCustomAttachment', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysCustomAttachment->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysCustomAttachment', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysCustomAttachment->getId()
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

    $entityWbfsysCustomAttachment = new WbfsysCustomAttachment_Entity();

    $formWbfsysCustomAttachment = $view->newForm( 'WbfsysCustomAttachment' );
    $formWbfsysCustomAttachment->createForm
    (
      $entityWbfsysCustomAttachment,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysCustomAttachment_Crud_Ui

