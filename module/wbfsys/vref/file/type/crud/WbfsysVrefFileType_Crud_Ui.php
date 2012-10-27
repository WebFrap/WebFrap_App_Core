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
class WbfsysVrefFileType_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysVrefFileType_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysVrefFileType_Entity $entityWbfsysVrefFileType
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysVrefFileType, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysVrefFileType )
      $params->fieldsWbfsysVrefFileType = $entityWbfsysVrefFileType->getCols( $params->categories );

    $formWbfsysVrefFileType = $view->newForm( 'WbfsysVrefFileType' );

    if( $params->keyName )
      $formWbfsysVrefFileType->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysVrefFileType->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysVrefFileType->setTarget( $params->input );

    $formWbfsysVrefFileType->setTargetMask( $params->targetMask );

    $formWbfsysVrefFileType->setParams( $params );

    $formWbfsysVrefFileType->createForm
    (
      $entityWbfsysVrefFileType,
      $params->fieldsWbfsysVrefFileType,
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
   * @param WbfsysVrefFileType_Entity $entityWbfsysVrefFileType
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysVrefFileType, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysVrefFileType', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysVrefFileType->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysVrefFileType', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysVrefFileType->getId()
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

    $entityWbfsysVrefFileType = new WbfsysVrefFileType_Entity();

    $formWbfsysVrefFileType = $view->newForm( 'WbfsysVrefFileType' );
    $formWbfsysVrefFileType->createForm
    (
      $entityWbfsysVrefFileType,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysVrefFileType_Crud_Ui

