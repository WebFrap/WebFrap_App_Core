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
class WbfsysTagReference_Crud_Create_Modal_View
  extends WgtModal
{
////////////////////////////////////////////////////////////////////////////////
// attributes
////////////////////////////////////////////////////////////////////////////////
    
    /**
    * @var WbfsysTagReference_Crud_Model
    */
    public $model = null;

////////////////////////////////////////////////////////////////////////////////
// methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * form to create a new WbfsysTagReference entity
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
      'Create a new Tag Reference',
      'wbfsys.tag_reference.message',
      array
      (
        $this->i18n->l
        (
          'Tag Reference',
          'wbfsys.tag_reference.label'
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
      'modal.php?c=Wbfsys.TagReference.create'
    );



    // Setzen von Viewspezifischen Control Flags
    $params->viewType  = 'modal';
    $params->viewId    = $this->getId();

    // Form Target und ID definieren
    $params->formAction  = 'ajax.php?c=Wbfsys.TagReference.insert';
    $params->formId       = 'wgt-form-wbfsys_tag_reference';
    $params->namespace   = 'wbfsys_tag_reference-create';
    
    // Setzen der letzten metadaten
    $this->addVar( 'params', $params );
    $this->addVar( 'context', 'create' );
    
    // wenn developer, dann metadaten anzeigen
    if( $params->access->hasRole( 'developer' ) )
    {
      $this->addVar( 'displayMeta', true );
    }
    
    // Das Create Form Objekt erstellen und mit allen nötigen Daten befüllen
    $form = $this->newForm( 'WbfsysTagReference_Crud_Create' );
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
    $this->setTemplate( 'wbfsys/tag_reference/modal/crud/form_create' );

  

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

}//end class WbfsysTagReference_Crud_Create_Modal_View

