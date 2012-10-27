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
class WbfsysRoleUser_Viewer_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysRoleUser_Viewer_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysRoleUser_Entity $entityWbfsysRoleUser_Viewer
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysRoleUser_Viewer, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysRoleUser_Viewer )
      $params->fieldsWbfsysRoleUser_Viewer = $entityWbfsysRoleUser_Viewer->getCols( $params->categories );

    $formWbfsysRoleUser_Viewer = $view->newForm( 'WbfsysRoleUser' );

    if( $params->keyName )
      $formWbfsysRoleUser_Viewer->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysRoleUser_Viewer->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysRoleUser_Viewer->setTarget( $params->input );

    $formWbfsysRoleUser_Viewer->setTargetMask( $params->targetMask );

    $formWbfsysRoleUser_Viewer->setParams( $params );

    $formWbfsysRoleUser_Viewer->createForm
    (
      $entityWbfsysRoleUser_Viewer,
      $params->fieldsWbfsysRoleUser_Viewer,
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
   * @param WbfsysRoleUser_Entity $entityWbfsysRoleUser_Viewer
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysRoleUser_Viewer, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysRoleUser_Viewer', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysRoleUser_Viewer->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysRoleUser_Viewer', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysRoleUser_Viewer->getId()
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

    $entityWbfsysRoleUser_Viewer = new WbfsysRoleUser_Entity();

    $formWbfsysRoleUser_Viewer = $view->newForm( 'WbfsysRoleUser_Viewer' );
    $formWbfsysRoleUser_Viewer->createForm
    (
      $entityWbfsysRoleUser_Viewer,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysRoleUser_Viewer_Crud_Ui

