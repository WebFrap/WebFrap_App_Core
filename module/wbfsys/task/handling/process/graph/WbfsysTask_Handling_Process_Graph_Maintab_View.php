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
class WbfsysTask_Handling_Process_Graph_Maintab_View
  extends WgtMaintab
{
////////////////////////////////////////////////////////////////////////////////
// Display Methodes
////////////////////////////////////////////////////////////////////////////////

  /**
   * @param WbfsysTask_Handling_Process $process
   * @param TFlag $params
   */
  public function displayGraph( $process, $params )
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
    
    $params->contextKey = 'form-process-'.$process;
    $params->formId = 'wgt-form-process-overview-'.$process;
    
    $this->setTemplate( 'wbfsys/wbfsys_task-handling-process/graph' );
  
    $this->addVar( 'process', $process );
    $this->addVar( 'entity', $entity );
    $this->addVar( 'activeNode', $process->getActiveNode() );
    
    /*
    $processForm = new WgtProcessForm();
    $processForm->process  = $process;
    $processForm->params   = $params;
    
    $this->addElement( 'processForm', $processForm );
    
    $this->addJsCode
    ( 
      $processForm->buildTemplateEdgeActionJs( $params ) 
    );
    */
    
    // menu hinzufügen
    $this->addMenu( $params );
    $this->addActions( $params );
    
    return null;
    
  }//end public function displayGraph */
  
  
  /**
   * add a drop menu to the create window
   *
   * @param TFlag $params the named parameter object that was created in
   *   the controller
   * {
   *   string formId: the id of the form;
   * }
   */
  public function addMenu( $params )
  {

    $menu     = $this->newMenu
    (
      $this->id.'_dropmenu',
      'WbfsysTask_Handling_Process'
    );
    $menu->id = $this->id.'_dropmenu';
    $menu->setAcl( $this->getAcl() );

    $menu->buildMenu( $params );

    return true;

  }//end public function addMenu */

  /**
   * this method is for adding the buttons in a create window
   * per default there is only one button added: save with the action
   * to save the window onclick
   *
   * @param TFlag $params the named parameter object that was created in
   *   the controller
   * {
   *   string formId: the id of the form;
   * }
   */
  public function addActions( $params )
  {

    // add the button actions for create in the window
    // the code will be binded direct on a window object and is removed
    // on close
    // all buttons with the class save will call that action
    $code = <<<BUTTONJS
    self.getObject().find(".wgtac_process_history").click(function(){
      \$S('#{$this->id}_dropmenu-control').dropdown('remove');
      \$R.get('modal.php?c=Process.Base.showHistory&process={$params->process->activStatus}&objid={$params->entity}&entity=wbfsys_task');
    });

    // close tab
    self.getObject().find(".wgtac_close").click(function(){
      \$S('#{$this->id}_dropmenu-control').dropdown('remove');
      self.close();
    });

BUTTONJS;

    $this->addJsCode( $code );

  }//end public function addActions */

}//end class WbfsysTask_Handling_Process_Graph_Maintab_View

