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
class WbfsysSecurityAccess_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysSecurityAccess_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysSecurityAccess_Entity $entityWbfsysSecurityAccess
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysSecurityAccess, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysSecurityAccess )
      $params->fieldsWbfsysSecurityAccess = $entityWbfsysSecurityAccess->getCols( $params->categories );

    $formWbfsysSecurityAccess = $view->newForm( 'WbfsysSecurityAccess' );

    if( $params->keyName )
      $formWbfsysSecurityAccess->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysSecurityAccess->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysSecurityAccess->setTarget( $params->input );

    $formWbfsysSecurityAccess->setTargetMask( $params->targetMask );

    $formWbfsysSecurityAccess->setParams( $params );

    $formWbfsysSecurityAccess->createForm
    (
      $entityWbfsysSecurityAccess,
      $params->fieldsWbfsysSecurityAccess,
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
   * @param WbfsysSecurityAccess_Entity $entityWbfsysSecurityAccess
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysSecurityAccess, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysSecurityAccess', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysSecurityAccess->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysSecurityAccess', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysSecurityAccess->getId()
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

    $entityWbfsysSecurityAccess = new WbfsysSecurityAccess_Entity();

    $formWbfsysSecurityAccess = $view->newForm( 'WbfsysSecurityAccess' );
    $formWbfsysSecurityAccess->createForm
    (
      $entityWbfsysSecurityAccess,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysSecurityAccess_Crud_Ui

