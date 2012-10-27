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
class WbfsysDomainAlias_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysDomainAlias_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysDomainAlias_Entity $entityWbfsysDomainAlias
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysDomainAlias, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysDomainAlias )
      $params->fieldsWbfsysDomainAlias = $entityWbfsysDomainAlias->getCols( $params->categories );

    $formWbfsysDomainAlias = $view->newForm( 'WbfsysDomainAlias' );

    if( $params->keyName )
      $formWbfsysDomainAlias->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysDomainAlias->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysDomainAlias->setTarget( $params->input );

    $formWbfsysDomainAlias->setTargetMask( $params->targetMask );

    $formWbfsysDomainAlias->setParams( $params );

    $formWbfsysDomainAlias->createForm
    (
      $entityWbfsysDomainAlias,
      $params->fieldsWbfsysDomainAlias,
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
   * @param WbfsysDomainAlias_Entity $entityWbfsysDomainAlias
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysDomainAlias, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysDomainAlias', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysDomainAlias->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysDomainAlias', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysDomainAlias->getId()
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

    $entityWbfsysDomainAlias = new WbfsysDomainAlias_Entity();

    $formWbfsysDomainAlias = $view->newForm( 'WbfsysDomainAlias' );
    $formWbfsysDomainAlias->createForm
    (
      $entityWbfsysDomainAlias,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysDomainAlias_Crud_Ui

