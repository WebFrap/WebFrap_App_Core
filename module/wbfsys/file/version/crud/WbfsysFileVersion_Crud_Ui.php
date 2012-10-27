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
class WbfsysFileVersion_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysFileVersion_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysFileVersion_Entity $entityWbfsysFileVersion
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysFileVersion, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysFileVersion )
      $params->fieldsWbfsysFileVersion = $entityWbfsysFileVersion->getCols( $params->categories );

    $formWbfsysFileVersion = $view->newForm( 'WbfsysFileVersion' );

    if( $params->keyName )
      $formWbfsysFileVersion->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysFileVersion->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysFileVersion->setTarget( $params->input );

    $formWbfsysFileVersion->setTargetMask( $params->targetMask );

    $formWbfsysFileVersion->setParams( $params );

    $formWbfsysFileVersion->createForm
    (
      $entityWbfsysFileVersion,
      $params->fieldsWbfsysFileVersion,
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
   * @param WbfsysFileVersion_Entity $entityWbfsysFileVersion
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysFileVersion, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysFileVersion', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysFileVersion->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysFileVersion', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysFileVersion->getId()
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

    $entityWbfsysFileVersion = new WbfsysFileVersion_Entity();

    $formWbfsysFileVersion = $view->newForm( 'WbfsysFileVersion' );
    $formWbfsysFileVersion->createForm
    (
      $entityWbfsysFileVersion,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysFileVersion_Crud_Ui

