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
class WbfsysRoleMandant_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysRoleMandant_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysRoleMandant_Entity $entityWbfsysRoleMandant
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysRoleMandant, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysRoleMandant )
      $params->fieldsWbfsysRoleMandant = $entityWbfsysRoleMandant->getCols( $params->categories );

    $formWbfsysRoleMandant = $view->newForm( 'WbfsysRoleMandant' );

    if( $params->keyName )
      $formWbfsysRoleMandant->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysRoleMandant->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysRoleMandant->setTarget( $params->input );

    $formWbfsysRoleMandant->setTargetMask( $params->targetMask );

    $formWbfsysRoleMandant->setParams( $params );

    $formWbfsysRoleMandant->createForm
    (
      $entityWbfsysRoleMandant,
      $params->fieldsWbfsysRoleMandant,
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
   * @param WbfsysRoleMandant_Entity $entityWbfsysRoleMandant
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysRoleMandant, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysRoleMandant', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysRoleMandant->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysRoleMandant', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysRoleMandant->getId()
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

    $entityWbfsysRoleMandant = new WbfsysRoleMandant_Entity();

    $formWbfsysRoleMandant = $view->newForm( 'WbfsysRoleMandant' );
    $formWbfsysRoleMandant->createForm
    (
      $entityWbfsysRoleMandant,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysRoleMandant_Crud_Ui

