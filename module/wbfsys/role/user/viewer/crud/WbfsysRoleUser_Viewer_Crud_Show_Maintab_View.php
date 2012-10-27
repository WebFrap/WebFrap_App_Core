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
class WbfsysRoleUser_Viewer_Crud_Show_Maintab_View
  extends WgtMaintab
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
    /**
    * @var WbfsysRoleUser_Viewer_Crud_Model
    */
    public $model = null;

////////////////////////////////////////////////////////////////////////////////
// Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * Das Show Form der WbfsysRoleUser_Viewer Maske
  *
  * @param int $objid Die Objid der Hauptentity
  * @param TFlag $params Flow Control Flags
  *
  * @return null Error im Fehlerfall
  */
  public function displayForm( $objid, $params )
  {
  
    // laden der benötigten Resource Objekte
    $request = $this->getRequest();
    $user     = $this->getUser();


    // fetch the activ entity from the model registry
    $entityWbfsysRoleUser_Viewer = $this->model->getEntityWbfsysRoleUser_Viewer();

    // fetch the i18n text for title, status and bookmark
    $i18nTitle = $this->i18n->l
    (
      'Show Employee: {@text@}',
      'wbfsys.role_user_viewer.label',
      array( 'text' => $entityWbfsysRoleUser_Viewer->text() )
    );
    $i18nLabel = $this->i18n->l
    (
      'Employee: {@text@}',
      'wbfsys.role_user_viewer.label',
      array( 'text' => $entityWbfsysRoleUser_Viewer->text() )
    );
    
    // Setzen der Bookmark informationen
    $this->setBookmark
    (
      $i18nTitle,
      'maintab.php?c=Wbfsys.RoleUser_Viewer.show  &amp;objid='.$entityWbfsysRoleUser_Viewer
    );

    // Control Flags setzen
    // Form Action und ID setzen
    $params->formAction = 'ajax.php?c=Wbfsys.RoleUser_Viewer.update&amp;objid='.$objid;
    $params->formId = 'wgt-form-wbfsys_role_user-viewer-show-'.$objid;
    $params->refId  = $objid;

    $params->viewType = 'maintab';
    $params->viewId   = $this->getId();

    // append form actions
    $this->setSaveFormData( $params );
    
    // set the window title
    $this->setTitle( $i18nLabel );
    $this->setLabel( $i18nLabel );
    
    
    // set the from template
    $this->setTemplate( 'wbfsys/role_user-viewer/maintab/crud/form_show' );

    $this->addVar( 'context', 'show' );
    $this->addVar( 'params', $params );
    
    // wenn developer, dann metadaten anzeigen
    if( $params->access->hasRole( 'developer' ) )
    {
      $this->addVar( 'displayMeta', true );
    }


    // Das Create Form Objekt erstellen und mit allen nötigen Daten befüllen
    $form = $this->newForm( 'WbfsysRoleUser_Viewer_Crud_Show' );
    $this->addVar( 'crudForm', $form );
    
    $entity = $this->model->getEntity();
    $form->setEntity( $entity );
  $form->setEntityEmbedPerson( $this->model->getEntityEmbedPerson( $entity ) );

    // Form Action und ID setzen
    $form->setFormTarget( $params->formAction, $params->formId, $params );

    // das Formular rendern
    $form->renderForm( $params );

    // add window menu, buttons and actions
    $this->addMenu( $objid, $params );
    $this->addActions( $objid, $params );

    // der standard tab wird immer angezeigt
    $this->addVar( 'showTabDefault', true );





    // ok alles gut wir müssen keinen fehler zurückgeben
    return null;

  }//end public function displayForm */

  /**
   * add a drop menu to the create window
   *
   * @param TFlag $params the named parameter object that was created in
   *   the controller
   * {
   *   string formId: the id of the form;
   * }
   */
  public function addMenu( $objid, $params )
  {

    $menu     = $this->newMenu
    (
      $this->id.'_dropmenu',
      'WbfsysRoleUser_Viewer_Crud_Show'
    );

    $menu->id = $this->id.'_dropmenu';
    $menu->setAcl( $this->getAcl() );
    $menu->setModel( $this->model );

    $menu->buildMenu( $objid, $params );

    return true;


  }//end public function addMenu */

  /**
   * just add the code for the show ui controls
   *
   * @param int $objid die rowid des zu showierende Datensatzes
   * @param TFlag $params benamte parameter
   * {
   *   @param LibAclContainer access: der container mit den zugriffsrechten für
   *     die aktuelle maske
   *
   *   @param string formId: die html id der form zum ansprechen des update
   *     services
   * }
   */
  public function addActions( $objid, $params )
  {

    $bookmark = '';
    if( $this->bookmark )
    {
      $title = SFormatStrings::cleanCC( $this->bookmark['title'] );
      $bookmark = <<<BUTTONJS
    self.getObject().find('.wgtac_bookmark').click(function(){
      var requestData  = {
         'wbfsys_bookmark[url]':'{$this->bookmark['url']}',
         'wbfsys_bookmark[title]':'{$title}'
      };
      \$R.post('ajax.php?c=Webfrap.Bookmark.add',requestData);
    });
BUTTONJS;

    }

    // add the button action for save in the window
    // the code will be binded direct on a window object and is removed
    // on close
    // all buttons with the class save will call that action
    $code = <<<BUTTONJS

{$bookmark}

    self.getObject().find(".wgtac_close").click(function(){
      \$S('#{$this->id}_dropmenu-control').dropdown('remove');
      self.close();
    });

    self.getObject().find(".wgtac_metadata").click(function(){
      \$S('#{$this->id}_dropmenu-control').dropdown('close');
      \$R.get('modal.php?c=Wbfsys.RoleUser_Viewer.showMeta&objid={$objid}');
    });

    self.getObject().find(".wgtac_back_to_list").click(function(){
      self.close();
      
      if( \$S( '#wgt-maintab_tab_wgt_tab-listing_wbfsys_role_user-viewer' ).length ){
        \$S( '#wgt-maintab_tab_wgt_tab-listing_wbfsys_role_user-viewer a' ).click();
      }
      else{
        \$R.get( 'maintab.php?c=Wbfsys.RoleUser_Viewer.listing' );
      }
    });
    

    self.getObject().find(".wgtac_mask_wbfsys_role_user_mask_employee").click(function(){
      \$S('#{$this->id}_dropmenu-control').dropdown('remove');
      self.close();
      \$R.get('maintab.php?c=Wbfsys.RoleUserMaskEmployee.show&objid={$objid}');
    });

    self.getObject().find(".wgtac_mask_my_user_profile").click(function(){
      \$S('#{$this->id}_dropmenu-control').dropdown('remove');
      self.close();
      \$R.get('maintab.php?c=My.UserProfile.show&objid={$objid}');
    });

    self.getObject().find(".wgtac_mask_wbfsys_role_user").click(function(){
      \$S('#{$this->id}_dropmenu-control').dropdown('remove');
      self.close();
      \$R.get('maintab.php?c=Wbfsys.RoleUser.show&objid={$objid}');
    });


BUTTONJS;

    if( $params->access->update )
    {
    
      $code .= <<<BUTTONJS

    self.getObject().find(".wgtac_open_edit").click(function(){
      \$R.get('maintab.php?c=Wbfsys.RoleUser_Viewer.edit&objid={$objid}',{success:function(){self.close();});
    }).removeClass('wgtac_open_edit');


BUTTONJS;

    }



    $this->addJsCode($code);

  }//end public function addActions */

}//end class WbfsysRoleUser_Viewer_Crud_Show_Maintab_View

