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
class MyMessage_Crud_Edit_Maintab_View
  extends WgtMaintab
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
    /**
    * @var MyMessage_Crud_Model
    */
    public $model = null;

////////////////////////////////////////////////////////////////////////////////
// Methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * Das Edit Form der MyMessage Maske
  *
  * @param int $objid Die Objid der Hauptentity
  * @param TFlag $params Flow Control Flags
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
    $entityMyMessage = $this->model->getEntity();

    // fetch the i18n text for title, status and bookmark
    $i18nTitle = $this->i18n->l
    (
      'Edit My Messages: {@text@}',
      'my.message.label',
      array( 'text' => $entityMyMessage->text() )
    );
    $i18nLabel = $this->i18n->l
    (
      'My Messages: {@text@}',
      'my.message.label',
      array( 'text' => $entityMyMessage->text() )
    );
    
    // Setzen der Bookmark informationen
    $this->setBookmark
    (
      $i18nTitle,
      'maintab.php?c=My.Message.edit&amp;utf8=✓&amp;objid='.$entityMyMessage
    );

    // Control Flags setzen
    // Form Action und ID setzen
    $params->formAction = 'ajax.php?c=My.Message.update&amp;utf8=✓&amp;objid='.$objid;
    $params->formId = 'wgt-form-my_message-edit-'.$objid;
    $params->refId  = $objid;

    $params->viewType = 'maintab';
    $params->viewId   = $this->getId();

    // append form actions
    $this->setSaveFormData( $params );
    
    // set the window title
    $this->setTitle( $i18nLabel );
    $this->setLabel( $i18nLabel );
    
    // set the from template
    $this->setTemplate( 'my/message/maintab/crud/form_edit' );

    $this->addVar( 'context', 'edit' );
    $this->addVar( 'params', $params );
    
    // wenn developer, dann metadaten anzeigen
    if( $params->access->hasRole( 'developer' ) )
    {
      $this->addVar( 'displayMeta', true );
    }


    // Das Create Form Objekt erstellen und mit allen nötigen Daten befüllen
    $form = $this->newForm( 'MyMessage_Crud_Edit' );
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


    if( $params->access->getPathLevel( 'mgmt-my_message-ref-tags' ) || $params->access->getPathLevel( 'mgmt-wbfsys_message-ref-tags' ) )
    {
      // many to many reference
      // if the model is loadable append the tab box for ref: Tags
      if( Webfrap::loadable( 'WbfsysEntityTag_Entity' ) )
      {
        $this->addVar( 'showRefTags', true );
       $this->addVar( 'showTabTags', true );

      }
      else
      {
        Log::warn( 'The Model for: WbfsysEntityTag is not loadable' );
      }
    }

    if( $params->access->getPathLevel( 'mgmt-my_message-ref-send_way' ) || $params->access->getPathLevel( 'mgmt-wbfsys_message-ref-send_way' ) )
    {
      // many to many reference
      // if the model is loadable append the tab box for ref: SendWay
      if( Webfrap::loadable( 'WbfsysMessageSendway_Entity' ) )
      {
        $this->addVar( 'showRefSendWay', true );
       $this->addVar( 'showTabSendWay', true );

      }
      else
      {
        Log::warn( 'The Model for: WbfsysMessageSendway is not loadable' );
      }
    }

    if( $params->access->getPathLevel( 'mgmt-my_message-ref-link' ) || $params->access->getPathLevel( 'mgmt-wbfsys_message-ref-link' ) )
    {
      // many to many reference
      // if the model is loadable append the tab box for ref: Link
      if( Webfrap::loadable( 'WbfsysDataLink_Entity' ) )
      {
        $this->addVar( 'showRefLink', true );
       $this->addVar( 'showTabLink', true );

      }
      else
      {
        Log::warn( 'The Model for: WbfsysDataLink is not loadable' );
      }
    }

    if( $params->access->getPathLevel( 'mgmt-my_message-ref-references' ) || $params->access->getPathLevel( 'mgmt-wbfsys_message-ref-references' ) )
    {
      // many to many reference
      // if the model is loadable append the tab box for ref: References
      if( Webfrap::loadable( 'WbfsysMessageReferences_Entity' ) )
      {
        $this->addVar( 'showRefReferences', true );
       $this->addVar( 'showTabReferences', true );

      }
      else
      {
        Log::warn( 'The Model for: WbfsysMessageReferences is not loadable' );
      }
    }

    if( $params->access->getPathLevel( 'mgmt-my_message-ref-attachments' ) || $params->access->getPathLevel( 'mgmt-wbfsys_message-ref-attachments' ) )
    {
      // many to many reference
      // if the model is loadable append the tab box for ref: Attachments
      if( Webfrap::loadable( 'WbfsysEntityAttachment_Entity' ) )
      {
        $this->addVar( 'showRefAttachments', true );
       $this->addVar( 'showTabAttachments', true );

      }
      else
      {
        Log::warn( 'The Model for: WbfsysEntityAttachment is not loadable' );
      }
    }





	  $response->setStatus( Response::OK );
	
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
      'MyMessage_Crud_Edit'
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
    		
      if( \$S( '#wgt-maintab_tab_wgt_tab-listing_my_message' ).length )
        \$S( '#wgt-maintab_tab_wgt_tab-listing_my_message a' ).click();
      else
        \$R.get( 'maintab.php?c=My.Message.listing' );
    		
BUTTONJS;

    	}
    }
  	else
  	{

  		$codeGoUp = <<<BUTTONJS
  		
    if( \$S( '#wgt-maintab_tab_wgt_tab-listing_my_message' ).length )
      \$S( '#wgt-maintab_tab_wgt_tab-listing_my_message a' ).click();
    else
      \$R.get( 'maintab.php?c=My.Message.listing' );
  		
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
      \$R.get('modal.php?c=My.Message.showMeta&objid={$objid}');
    });

    self.getObject().find(".wgtac_back_to_list").click(function(){
      self.close();
{$codeGoUp}
    });
    
    

    self.getObject().find(".wgtac_mask_wbfsys_message").click(function(){
      
      \$S('#{$this->id}_dropmenu-control').dropdown('remove');
      self.close();
      \$R.get('maintab.php?c=Wbfsys.Message.edit&objid={$objid}');
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

}//end class MyMessage_Crud_Edit_Maintab_View

