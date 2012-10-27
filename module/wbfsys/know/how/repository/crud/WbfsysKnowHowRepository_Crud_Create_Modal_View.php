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
class WbfsysKnowHowRepository_Crud_Create_Modal_View
  extends WgtModal
{
////////////////////////////////////////////////////////////////////////////////
// attributes
////////////////////////////////////////////////////////////////////////////////
    
    /**
    * @var WbfsysKnowHowRepository_Crud_Model
    */
    public $model = null;

////////////////////////////////////////////////////////////////////////////////
// methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * form to create a new WbfsysKnowHowRepository entity
  *
  * @param TFlag $params
  * @return null / Error im Fehlerfall
  */
  public function displayForm( $params )
  {

    $request = $this->getRequest();
    $user     = $this->getUser();

    // fetch the i18n text for title, status and bookmark only one time
    $i18nText = $this->i18n->l
    (
      'Create a new Know How Repository',
      'wbfsys.know_how_repository.message',
      array
      (
        $this->i18n->l
        (
          'Know How Repository',
          'wbfsys.know_how_repository.label'
        )
      )
    );

    // set the window status
    $this->setLabel( $i18nText );

    // set the window title
    $this->setTitle( $i18nText );

    // set a bookmark
    $this->setBookmark
    (
      $i18nText,
      'modal.php?c=Wbfsys.KnowHowRepository.create'
    );



    // Setzen von Viewspezifischen Control Flags
    $params->viewType  = 'modal';
    $params->viewId    = $this->getId();

    // Form Target und ID definieren
    $params->formAction  = 'ajax.php?c=Wbfsys.KnowHowRepository.insert';
    $params->formId       = 'wgt-form-wbfsys_know_how_repository';
    $params->namespace   = 'wbfsys_know_how_repository-create';
    
    // Setzen der letzten metadaten
    $this->addVar( 'params', $params );
    $this->addVar( 'context', 'create' );
    
    // wenn developer, dann metadaten anzeigen
    if( $params->access->hasRole( 'developer' ) )
    {
      $this->addVar( 'displayMeta', true );
    }
    
    // Das Create Form Objekt erstellen und mit allen nötigen Daten befüllen
    $form = $this->newForm( 'WbfsysKnowHowRepository_Crud_Create' );
    $this->addVar( 'crudForm', $form );
    
    $entity = $this->model->getEntity();
    $form->setEntity( $entity );

    // Form Action und ID setzen
    $form->setFormTarget( $params->formAction, $params->formId, $params );

    // if this is a post request the system will receive some pre variables
    // in the post data
    if( $request->method( Request::POST ) )
    {
      $form->fetchPostData( $params );

    }

    // set the form template
    $this->setTemplate( 'wbfsys/know_how_repository/modal/crud/form_create' );

  

    $form->renderForm( $params );
    


    // add menu buttons and actions
    $this->addMenu( $params );
    $this->addActions( $params );

    return null;

  }//end public function displayForm */

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
    self.getObject().find(".wgtac_create").click(function(){
      \$R.form('{$params->formId}');
    });

BUTTONJS;

    $this->addJsCode( $code );

  }//end public function methodAddActions */

}//end class WbfsysKnowHowRepository_Crud_Create_Modal_View

