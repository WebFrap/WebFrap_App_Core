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
class WbfsysUserAnnouncementStatus_Crud_Ui
  extends Ui
{

  /**
  * the default model for this ui class
  * @var WbfsysUserAnnouncementStatus_Crud_Model
  */
  protected $model = null;

////////////////////////////////////////////////////////////////////////////////
// Form Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * create an ajax form
   *
   * @param WbfsysUserAnnouncementStatus_Entity $entityWbfsysUserAnnouncementStatus
   * @param TFlag $params named parameters
   * @return void
   */
  public function ajaxForm( $entityWbfsysUserAnnouncementStatus, $params  )
  {

    // laden der benötigten resourcen
    $view  = $this->getView();
    $orm   = $this->getOrm();

    // the ajax view should send the inputs as adressed values
    $params->refresh  = true;

    if( !$params->categories )
      $params->categories = array();

    if( !$params->fieldsWbfsysUserAnnouncementStatus )
      $params->fieldsWbfsysUserAnnouncementStatus = $entityWbfsysUserAnnouncementStatus->getCols( $params->categories );

    $formWbfsysUserAnnouncementStatus = $view->newForm( 'WbfsysUserAnnouncementStatus' );

    if( $params->keyName )
      $formWbfsysUserAnnouncementStatus->setKeyName( $params->keyName );

    if( $params->suffix )
      $formWbfsysUserAnnouncementStatus->setSuffix( $params->suffix );

    if( $params->input )
      $formWbfsysUserAnnouncementStatus->setTarget( $params->input );

    $formWbfsysUserAnnouncementStatus->setTargetMask( $params->targetMask );

    $formWbfsysUserAnnouncementStatus->setParams( $params );

    $formWbfsysUserAnnouncementStatus->createForm
    (
      $entityWbfsysUserAnnouncementStatus,
      $params->fieldsWbfsysUserAnnouncementStatus,
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
   * @param WbfsysUserAnnouncementStatus_Entity $entityWbfsysUserAnnouncementStatus
   * @param TFlag $params named parameters
   * @return void
   */
  public function textByKey( $entityWbfsysUserAnnouncementStatus, $params )
  {

    // laden der benötigten resourcen
    $view = $this->getView();

    // push the to string information to the text field
    $replaceItemText = $view->newInput( 'textWbfsysUserAnnouncementStatus', 'Text' );
    $replaceItemText->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input.'-tostring',
      'value' => $entityWbfsysUserAnnouncementStatus->text()
    ));

    // value means, that only the values of the ui elements are replaced
    // and not the complete ui element
    $replaceItemText->refresh = 'value';

    $replaceItem = $view->newInput( 'idWbfsysUserAnnouncementStatus', 'Text' );
    $replaceItem->addAttributes(array
    (
      'id'    => 'wgt-input-'.$params->input,
      'value' => $entityWbfsysUserAnnouncementStatus->getId()
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

    $entityWbfsysUserAnnouncementStatus = new WbfsysUserAnnouncementStatus_Entity();

    $formWbfsysUserAnnouncementStatus = $view->newForm( 'WbfsysUserAnnouncementStatus' );
    $formWbfsysUserAnnouncementStatus->createForm
    (
      $entityWbfsysUserAnnouncementStatus,
      array($field),
      $params
    );

  }//end public function item */

}//end class WbfsysUserAnnouncementStatus_Crud_Ui

