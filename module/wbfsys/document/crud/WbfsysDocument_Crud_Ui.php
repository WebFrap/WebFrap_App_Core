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
class WbfsysDocument_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysDocument_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysDocument_Entity $entityWbfsysDocument
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysDocument, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysDocument )
      $params->fieldsWbfsysDocument = $entityWbfsysDocument->getCols( $params->categories );

    $formWbfsysDocument = $view->newForm( 'WbfsysDocument' );

    if( $params->keyName )
      $formWbfsysDocument->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysDocument->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysDocument->setTarget( $params->input );

    $formWbfsysDocument->setTargetMask( $params->targetMask );

    $formWbfsysDocument->setParams( $params );

    $formWbfsysDocument->createForm
    (
      $entityWbfsysDocument,
      $params->fieldsWbfsysDocument,
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
   * @param WbfsysDocument_Entity $entityWbfsysDocument
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysDocument, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysDocument', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysDocument->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysDocument', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysDocument->getId()
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

    $entityWbfsysDocument = new WbfsysDocument_Entity();

    $formWbfsysDocument = $view->newForm( 'WbfsysDocument' );
    $formWbfsysDocument->createForm
    (
      $entityWbfsysDocument,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysDocument_Crud_Ui

