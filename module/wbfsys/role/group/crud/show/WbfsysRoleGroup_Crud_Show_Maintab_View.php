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
class WbfsysRoleGroup_Crud_Show_Maintab_View
  extends WgtMaintab
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
    /**
    * @var WbfsysRoleGroup_Crud_Model
    */
    public $model = null;

////////////////////////////////////////////////////////////////////////////////
// Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * Das Show Form der WbfsysRoleGroup Maske
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
    $entityWbfsysRoleGroup = $this->model->getEntityWbfsysRoleGroup();

    // fetch the i18n text for title, status and bookmark
    $i18nTitle = $this->i18n->l
    (
      'Show User Roles: {@text@}',
      'wbfsys.role_group.label',
      array( 'text' => $entityWbfsysRoleGroup->text() )
    );
    $i18nLabel = $this->i18n->l
    (
      'User Roles: {@text@}',
      'wbfsys.role_group.label',
      array( 'text' => $entityWbfsysRoleGroup->text() )
    );
    
    // Setzen der Bookmark informationen
    $this->setBookmark
    (
      $i18nTitle,
      'maintab.php?c=Wbfsys.RoleGroup.show  &amp;objid='.$entityWbfsysRoleGroup
    );

    // Control Flags setzen
    // Form Action und ID setzen
    $params->formAction = 'ajax.php?c=Wbfsys.RoleGroup.update&amp;objid='.$objid;
    $params->formId = 'wgt-form-wbfsys_role_group-show-'.$objid;
    $params->refId  = $objid;

    $params->viewType = 'maintab';
    $params->viewId   = $this->getId();

    // append form actions
    $this->setSaveFormData( $params );
    
    // set the window title
    $this->setTitle( $i18nLabel );
    $this->setLabel( $i18nLabel );
    
    
    // set the from template
    $this->setTemplate( 'wbfsys/role_group/maintab/crud/form_show' );

    $this->addVar( 'context', 'show' );
    $this->addVar( 'params', $params );
    
    // wenn developer, dann metadaten anzeigen
    if( $params->access->hasRole( 'developer' ) )
    {
      $this->addVar( 'displayMeta', true );
    }


    // Das Create Form Objekt erstellen und mit allen nötigen Daten befüllen
    $form = $this->newForm( 'WbfsysRoleGroup_Crud_Show' );
    $this->addVar( 'crudForm', $form );
    
    $entity = $this->model->getEntity();
    $form->setEntity( $entity );

    // Form Action und ID setzen
    $form->setFormTarget( $params->formAction, $params->formId, $params );

    // das Formular rendern
    $form->renderForm( $params );

    // add window menu, buttons and actions
    $this->addMenu( $objid, $params );
    $this->addActions( $objid, $params );

    // der standard tab wird immer angezeigt
    $this->addVar( 'showTabDefault', true );


    if( $params->access->getPathLevel( 'mgmt-wbfsys_role_group-ref-group_users' ) )
    {
      // many to many reference
      // if the model is loadable append the tab box for ref: GroupUsers
      if( Webfrap::loadable( 'WbfsysGroupUsers_Entity' ) )
      {
        $this->addVar( 'showRefGroupUsers', true );
       $this->addVar( 'showTabGroupUsers', true );

      }
      else
      {
        Log::warn( 'The Model for: WbfsysGroupUsers is not loadable' );
      }
    }

    if( $params->access->getPathLevel( 'mgmt-wbfsys_role_group-ref-group_profiles' ) )
    {
      // many to many reference
      // if the model is loadable append the tab box for ref: GroupProfiles
      if( Webfrap::loadable( 'WbfsysGroupProfiles_Entity' ) )
      {
        $this->addVar( 'showRefGroupProfiles', true );
       $this->addVar( 'showTabGroupProfiles', true );

      }
      else
      {
        Log::warn( 'The Model for: WbfsysGroupProfiles is not loadable' );
      }
    }

    if( $params->access->getPathLevel( 'mgmt-wbfsys_role_group-ref-access' ) )
    {
      // many to one reference
      // if the model is loadable append the tab box for ref: Access
      if( Webfrap::loadable( 'WbfsysSecurityAccess_Entity' ) )
      {
        $this->addVar( 'showRefAccess', true );
       $this->addVar( 'showTabAccess', true );

      }
      else
      {
        Log::warn( 'The Model: WbfsysSecurityAccess is not loadable' );
      }
    }




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
      'WbfsysRoleGroup_Crud_Show'
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
      \$R.get('modal.php?c=Wbfsys.RoleGroup.showMeta&objid={$objid}');
    });

    self.getObject().find(".wgtac_back_to_list").click(function(){
      self.close();
      
      if( \$S( '#wgt-maintab_tab_wgt_tab-listing_wbfsys_role_group' ).length ){
        \$S( '#wgt-maintab_tab_wgt_tab-listing_wbfsys_role_group a' ).click();
      }
      else{
        \$R.get( 'maintab.php?c=Wbfsys.RoleGroup.listing' );
      }
    });
    


BUTTONJS;

    if( $params->access->update )
    {
    
      $code .= <<<BUTTONJS

    self.getObject().find(".wgtac_open_edit").click(function(){
      \$R.get('maintab.php?c=Wbfsys.RoleGroup.edit&objid={$objid}',{success:function(){self.close();});
    }).removeClass('wgtac_open_edit');


BUTTONJS;

    }



    $this->addJsCode($code);

  }//end public function addActions */

}//end class WbfsysRoleGroup_Crud_Show_Maintab_View

