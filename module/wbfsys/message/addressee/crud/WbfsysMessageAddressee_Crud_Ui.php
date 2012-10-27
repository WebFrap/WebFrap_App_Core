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
class WbfsysMessageAddressee_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysMessageAddressee_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysMessageAddressee_Entity $entityWbfsysMessageAddressee
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysMessageAddressee, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysMessageAddressee )
      $params->fieldsWbfsysMessageAddressee = $entityWbfsysMessageAddressee->getCols( $params->categories );

    $formWbfsysMessageAddressee = $view->newForm( 'WbfsysMessageAddressee' );

    if( $params->keyName )
      $formWbfsysMessageAddressee->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysMessageAddressee->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysMessageAddressee->setTarget( $params->input );

    $formWbfsysMessageAddressee->setTargetMask( $params->targetMask );

    $formWbfsysMessageAddressee->setParams( $params );

    $formWbfsysMessageAddressee->createForm
    (
      $entityWbfsysMessageAddressee,
      $params->fieldsWbfsysMessageAddressee,
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
   * @param WbfsysMessageAddressee_Entity $entityWbfsysMessageAddressee
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysMessageAddressee, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysMessageAddressee', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysMessageAddressee->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysMessageAddressee', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysMessageAddressee->getId()
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

    $entityWbfsysMessageAddressee = new WbfsysMessageAddressee_Entity();

    $formWbfsysMessageAddressee = $view->newForm( 'WbfsysMessageAddressee' );
    $formWbfsysMessageAddressee->createForm
    (
      $entityWbfsysMessageAddressee,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysMessageAddressee_Crud_Ui

