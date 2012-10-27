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
class WbfsysRoleGroup_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysRoleGroup_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysRoleGroup_Entity $entityWbfsysRoleGroup
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysRoleGroup, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysRoleGroup )
      $params->fieldsWbfsysRoleGroup = $entityWbfsysRoleGroup->getCols( $params->categories );

    $formWbfsysRoleGroup = $view->newForm( 'WbfsysRoleGroup' );

    if( $params->keyName )
      $formWbfsysRoleGroup->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysRoleGroup->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysRoleGroup->setTarget( $params->input );

    $formWbfsysRoleGroup->setTargetMask( $params->targetMask );

    $formWbfsysRoleGroup->setParams( $params );

    $formWbfsysRoleGroup->createForm
    (
      $entityWbfsysRoleGroup,
      $params->fieldsWbfsysRoleGroup,
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
   * @param WbfsysRoleGroup_Entity $entityWbfsysRoleGroup
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysRoleGroup, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysRoleGroup', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysRoleGroup->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysRoleGroup', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysRoleGroup->getId()
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

    $entityWbfsysRoleGroup = new WbfsysRoleGroup_Entity();

    $formWbfsysRoleGroup = $view->newForm( 'WbfsysRoleGroup' );
    $formWbfsysRoleGroup->createForm
    (
      $entityWbfsysRoleGroup,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysRoleGroup_Crud_Ui

