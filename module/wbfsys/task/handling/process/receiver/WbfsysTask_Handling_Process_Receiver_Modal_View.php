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
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysTask_Handling_Process_Receiver_Modal_View
  extends WgtModal
{
////////////////////////////////////////////////////////////////////////////////
// Display Methodes
////////////////////////////////////////////////////////////////////////////////

  /**
   * @param WbfsysTask_Handling_Process $process
   * @param string $receiverKey
   * @param TFlag $params
   */
  public function displayReceiver( $process, $receiverKey, $params )
  {
    
    $entity       = $process->getEntity();
    $statusData   = $process->getActiveNode();
    
    $label = $this->i18n->l
    ( 
      '{@label@} Status: {@status@}',
      'wbf.label',
      array
      ( 
        'label'   => $entity->text(),
        'status'  => $statusData->label 
      )
    );
    
    $this->setTitle( $label );
    $this->setLabel( $label );
    
    $params->contextKey  = 'form-process-'.$process;
    $params->formId       = 'wgt-form-process-overview-'.$process;
    
    $this->setTemplate( 'wbfsys/wbfsys_task-handling-process/receiver_modal' );
  
    $this->addVar( 'process', $process );
    $this->addVar( 'entity', $entity );
    $this->addVar( 'activeNode', $process->getActiveNode() );
    $this->addVar( 'responsibles', $this->model->getResponsibleUsersByKey( $receiverKey ) );

    return null;
    
  }//end public function displayReceiver */


}//end class WbfsysTask_Handling_Process_Receiver_Modal_View

