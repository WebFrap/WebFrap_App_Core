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
class WbfsysImageUsage_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysImageUsage_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysImageUsage_Entity $entityWbfsysImageUsage
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysImageUsage, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysImageUsage )
      $params->fieldsWbfsysImageUsage = $entityWbfsysImageUsage->getCols( $params->categories );

    $formWbfsysImageUsage = $view->newForm( 'WbfsysImageUsage' );

    if( $params->keyName )
      $formWbfsysImageUsage->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysImageUsage->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysImageUsage->setTarget( $params->input );

    $formWbfsysImageUsage->setTargetMask( $params->targetMask );

    $formWbfsysImageUsage->setParams( $params );

    $formWbfsysImageUsage->createForm
    (
      $entityWbfsysImageUsage,
      $params->fieldsWbfsysImageUsage,
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
   * @param WbfsysImageUsage_Entity $entityWbfsysImageUsage
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysImageUsage, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysImageUsage', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysImageUsage->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysImageUsage', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysImageUsage->getId()
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

    $entityWbfsysImageUsage = new WbfsysImageUsage_Entity();

    $formWbfsysImageUsage = $view->newForm( 'WbfsysImageUsage' );
    $formWbfsysImageUsage->createForm
    (
      $entityWbfsysImageUsage,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysImageUsage_Crud_Ui

