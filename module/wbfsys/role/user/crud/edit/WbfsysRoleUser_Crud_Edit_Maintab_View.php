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
class WbfsysRoleUser_Crud_Edit_Maintab_View
  extends WgtMaintab
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
    /**
    * @var WbfsysRoleUser_Crud_Model
    */
    public $model = null;

////////////////////////////////////////////////////////////////////////////////
// Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * Das Edit Form der WbfsysRoleUser Maske
  *
  * @param int $objid Die Objid der Hauptentity
  * @param Context $params Flow Control Flags
  *
  * @return null Error im Fehlerfall
  */
  public function displayForm( $objid, $params )
  {
  
    // laden der benötigten Resource Objekte
    $request  = $this->getRequest();
    $response = $this->getResponse();
    $user     = $this->getUser();


    // fetch the activ entity from the model registry
    $entityWbfsysRoleUser = $this->model->getEntity();

    // fetch the i18n text for title, status and bookmark
    $i18nTitle = $this->i18n->l
    (
      'Edit System User: {@text@}',
      'wbfsys.role_user.label',
      array( 'text' => $entityWbfsysRoleUser->text() )
    );
    $i18nLabel = $this->i18n->l
    (
      'System User: {@text@}',
      'wbfsys.role_user.label',
      array( 'text' => $entityWbfsysRoleUser->text() )
    );
    
    // Setzen der Bookmark informationen
    $this->setBookmark
    (
      $i18nTitle,
      'maintab.php?c=Wbfsys.RoleUser.edit&amp;utf8=✓&amp;objid='.$entityWbfsysRoleUser
    );

    // Control Flags setzen
    // Form Action und ID setzen
    $params->formAction = 'ajax.php?c=Wbfsys.RoleUser.update&amp;utf8=✓&amp;objid='.$objid;
    $params->formId = 'wgt-form-wbfsys_role_user-edit-'.$objid;
    $params->refId  = $objid;

    $params->viewType = 'maintab';
    $params->viewId   = $this->getId();

    // append form actions
    $this->setSaveFormData( $params );
    
    // set the window title
    $this->setTitle( $i18nLabel );
    $this->setLabel( $i18nLabel );
    
    // set the from template
    $this->setTemplate( 'wbfsys/role_user/maintab/crud/form_edit' );

    $this->addVar( 'context', 'edit' );
    $this->addVar( 'params', $params );
    
    // wenn developer, dann metadaten anzeigen
    if( $params->access->hasRole( 'developer' ) )
    {
      $this->addVar( 'displayMeta', true );
    }


    // Das Create Form Objekt erstellen und mit allen nötigen Daten befüllen
    $form = $this->newForm( 'WbfsysRoleUser_Crud_Edit' );
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


    if( $params->access->getPathLevel( 'mod-wbfsys-cat-core_data-ref-user_roles' ) || $params->access->getPathLevel( 'mgmt-wbfsys_role_user-ref-user_roles' ) )
    {
      // many to many reference
      // if the model is loadable append the tab box for ref: UserRoles
      if( Webfrap::loadable( 'WbfsysGroupUsers_Entity' ) )
      {
        $this->addVar( 'showRefUserRoles', true );
       $this->addVar( 'showTabGroups', true );

      }
      else
      {
        Log::warn( 'The Model for: WbfsysGroupUsers is not loadable' );
      }
    }

    if( $params->access->getPathLevel( 'mod-wbfsys-cat-core_data-ref-user_profiles' ) || $params->access->getPathLevel( 'mgmt-wbfsys_role_user-ref-user_profiles' ) )
    {
      // many to many reference
      // if the model is loadable append the tab box for ref: UserProfiles
      if( Webfrap::loadable( 'WbfsysUserProfiles_Entity' ) )
      {
        $this->addVar( 'showRefUserProfiles', true );
       $this->addVar( 'showTabProfiles', true );

      }
      else
      {
        Log::warn( 'The Model for: WbfsysUserProfiles is not loadable' );
      }
    }

    if( $params->access->getPathLevel( 'mod-wbfsys-cat-core_data-ref-address_item' ) || $params->access->getPathLevel( 'mgmt-wbfsys_role_user-ref-address_item' ) )
    {
      // many to one reference
      // if the model is loadable append the tab box for ref: AddressItem
      if( Webfrap::loadable( 'WbfsysAddressItem_Entity' ) )
      {
        $this->addVar( 'showRefAddressItem', true );
       $this->addVar( 'showTabDefault', true );

      }
      else
      {
        Log::warn( 'The Model: WbfsysAddressItem is not loadable' );
      }
    }

       $this->addVar( 'showTabDefault', true );


    // items 

    $item_Skill = new WgtElementSkillCloud( 'item_Skill', $this );
    $item_Skill->label = 'Skills';

    /* @var $tagModel WebfrapSkill_Model  */
    $tagModel = $this->loadModel( 'WebfrapSkill' );
    $item_Skill->setData( $tagModel->getDatasetTaglist( $entityWbfsysRoleUser->getId() ) );
    $item_Skill->refId = $entityWbfsysRoleUser->getId();
    $item_Skill->render();
    
    // references 
    // sicher stellen, dass wir das richige level haben
    $paramsAddressItem = $params->paramsAddressItem;
    //$paramsAddressItem->level = (int)$paramsAddressItem->level + 1;
    //$paramsAddressItem->aclNode = 'mod-wbfsys-cat-core_data-ref-address_item';

    // zugriffsrechte der address_item referenz prüfen
    $accessAddressItem = new WbfsysRoleUser_Ref_AddressItem_Table_Access( null, null, $this );
    $accessAddressItem->load( $user->getProfileName(), $paramsAddressItem );

    $params->accessAddressItem = $accessAddressItem;
    $paramsAddressItem->access = $accessAddressItem;
    $params->paramsAddressItem = $paramsAddressItem;
    $params->paramsAddressItem->loadFullSize = true;
    //##############################################################################
// code block reference address_item
//##############################################################################

    // reference address_item
    $paramsAddressItem = $params->paramsAddressItem;
    

    // abwärtskopatibilität ...
    $params->refIdAddressItem = $objid;
    $paramsAddressItem->refId = $objid;
    $paramsAddressItem->refIdAddressItem = $objid;


    // create the form action
    $paramsAddressItem->searchFormAction = 'ajax.php?c=Wbfsys.RoleUser_Ref_AddressItem.search&amp;objid='.$objid;

    // add the id to the form
    $paramsAddressItem->searchFormId = 'wgt-form-table-wbfsys_role_user-ref-address_item-search-'.$objid;

    // if a table id is given use it for the table
    $paramsAddressItem->targetId = 'wgt_table-wbfsys_role_user-ref-address_item-'.$objid;

    // fill the relevant data for the search form
    $this->setSearchFormData( $paramsAddressItem, 'AddressItem' );

    $model = $this->getModel( 'WbfsysRoleUser_Ref_AddressItem_Table' );

    $ui = $this->loadUi( 'WbfsysRoleUser_Ref_AddressItem_Table' );
    $ui->setModel( $model );

    $data = $model->search
    ( 
      $objid,
      $paramsAddressItem->access, 
      $paramsAddressItem 
    );

    // inject the table item in the template system
    $ui->createListItem
    (
      $objid,
      $data,
      $paramsAddressItem->access,
      $paramsAddressItem
    );

    // inject the search fields for the table context to the template system
    $ui->searchForm
    (
      $objid,
      $model,
      $paramsAddressItem
    );





	  $response->setStatus( Response::OK );
	
    // ok alles gut wir müssen keinen fehler zurückgeben
    return null;

  }//end public function displayForm */

  /**
   * add a drop menu to the create window
   *
   * @param Context $params the named parameter object that was created in
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
      'WbfsysRoleUser_Crud_Edit'
    );

    $menu->id = $this->id.'_dropmenu';
    $menu->setAcl( $this->getAcl() );
    $menu->setModel( $this->model );

    $menu->buildMenu( $objid, $params );

    return true;


  }//end public function addMenu */

  /**
   * just add the code for the edit ui controls
   *
   * @param int $objid die rowid des zu editierende Datensatzes
   * @param Context $params benamte parameter
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
    
    if( $params->aclLevel && $params->aclLevel > 1  && $params->aclRootId && $params->maskRoot )
    {
    	
    	$tmp = explode( ':', $params->maskRoot );
    	$domainNode = DomainNode::getNode( $tmp[0] );
    	
    	if( $domainNode )
    	{
    		$codeGoUp = <<<BUTTONJS

      if( \$S( '#wgt-maintab_tab_wgt_tab-form-{$domainNode->domainName}-{$tmp[1]}-{$params->aclRootId}' ).length )
        \$S( '#wgt-maintab_tab_wgt_tab-form-{$domainNode->domainName}-{$tmp[1]}-{$params->aclRootId} a' ).click();
      else
        \$R.get( 'maintab.php?c={$domainNode->domainUrl}.{$tmp[1]}&objid={$params->aclRootId}' );
    		
BUTTONJS;

    	}
    	else
    	{

    		$codeGoUp = <<<BUTTONJS
    		
      if( \$S( '#wgt-maintab_tab_wgt_tab-listing_wbfsys_role_user' ).length )
        \$S( '#wgt-maintab_tab_wgt_tab-listing_wbfsys_role_user a' ).click();
      else
        \$R.get( 'maintab.php?c=Wbfsys.RoleUser.listing' );
    		
BUTTONJS;

    	}
    }
  	else
  	{

  		$codeGoUp = <<<BUTTONJS
  		
    if( \$S( '#wgt-maintab_tab_wgt_tab-listing_wbfsys_role_user' ).length )
      \$S( '#wgt-maintab_tab_wgt_tab-listing_wbfsys_role_user a' ).click();
    else
      \$R.get( 'maintab.php?c=Wbfsys.RoleUser.listing' );
  		
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
      \$R.get('modal.php?c=Wbfsys.RoleUser.showMeta&objid={$objid}');
    });

    self.getObject().find(".wgtac_back_to_list").click(function(){
      self.close();
{$codeGoUp}
    });
    
    

    self.getObject().find(".wgtac_mask_wbfsys_role_user_mask_employee").click(function(){
      
      \$S('#{$this->id}_dropmenu-control').dropdown('remove');
      self.close();
      \$R.get('maintab.php?c=Wbfsys.RoleUserMaskEmployee.edit&objid={$objid}');
    });

    self.getObject().find(".wgtac_mask_my_user_profile").click(function(){
      
      \$S('#{$this->id}_dropmenu-control').dropdown('remove');
      self.close();
      \$R.get('maintab.php?c=My.UserProfile.edit&objid={$objid}');
    });

    self.getObject().find(".wgtac_mask_wbfsys_role_user-viewer").click(function(){
      
      \$S('#{$this->id}_dropmenu-control').dropdown('remove');
      self.close();
      \$R.get('maintab.php?c=Wbfsys.RoleUser_Viewer.edit&objid={$objid}');
    });


BUTTONJS;

    if( $params->access->update )
    {
      $code .= <<<BUTTONJS

    self.getObject().find(".wgtac_edit").click(function(){    
      \$S('#{$this->id}_dropmenu-control').dropdown('close');
      self.setChanged(false);
      \$R.form('{$params->formId}');
    }).removeClass('wgtac_edit');

    self.getObject().find(".wgtac_save_a_close").click(function(){
      \$S('#{$this->id}_dropmenu-control').dropdown('remove');
      self.setChanged(false);
      \$R.form('{$params->formId}',null,{success:function(){self.close();}});
    }).removeClass('wgtac_save_a_close');

BUTTONJS;

    }



    $this->addJsCode($code);

  }//end public function addActions */

}//end class WbfsysRoleUser_Crud_Edit_Maintab_View

