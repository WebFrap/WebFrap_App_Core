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
 * @subpackage ModCore
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class CorePerson_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var CorePerson_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param CorePerson_Entity $entityCorePerson
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityCorePerson, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsCorePerson )
      $params->fieldsCorePerson = $entityCorePerson->getCols( $params->categories );

    $formCorePerson = $view->newForm( 'CorePerson' );

    if( $params->keyName )
      $formCorePerson->setKeyName( $params->keyName );

    if( $params->suffix )
      $formCorePerson->setSuffix( $params->suffix );

    if( $params->input )
      $formCorePerson->setTarget( $params->input );

    $formCorePerson->setTargetMask( $params->targetMask );

    $formCorePerson->setParams( $params );

    $formCorePerson->createForm
    (
      $entityCorePerson,
      $params->fieldsCorePerson,
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
   * @param CorePerson_Entity $entityCorePerson
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityCorePerson, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textCorePerson', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityCorePerson->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idCorePerson', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityCorePerson->getId()
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

    $entityCorePerson = new CorePerson_Entity();

    $formCorePerson = $view->newForm( 'CorePerson' );
    $formCorePerson->createForm
    (
      $entityCorePerson,
      array($field),
      $params
    );

  }//end public function item */

}//end class CorePerson_Crud_Ui

