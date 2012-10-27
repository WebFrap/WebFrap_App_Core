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
class WbfsysProfile_Treetable_Maintab_View
  extends WgtMaintab
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
    /**
    * @var WbfsysProfile_Treeable_Model
    */
    public $model = null;

    /**
    * @var WbfsysProfile_Treeable_Ui
    */
    public $ui = null;

////////////////////////////////////////////////////////////////////////////////
// List display methodes
////////////////////////////////////////////////////////////////////////////////
    
 /**
  * add the treetable item
  * add the search field elements
  *
  * @param TFlag $params
  * @return null Error im Fehlerfall
  */
  public function displayListing( $params )
  {

    $request = $this->getRequest();
    $access  = $params->access;

    // set the default treetable template
    $this->setTemplate( 'wbfsys/profile/maintab/treetable/listing' );

    // fetch the i18n text only one time
    $i18nText = $this->i18n->l
    (
      'Treetable Profiles',
      'wbfsys.profile.label'
    );

    // fetch the i18n text only one time
    $i18nLabel = $this->i18n->l
    (
      'Profiles',
      'wbfsys.profile.label'
    );
    
    // Setzen der Bookmark informationen
    $this->setBookmark
    (
      $i18nText,
      'maintab.php?c=Wbfsys.Profile.listing&amp;ltype=treetable'
    );
    
    // set the window status
    $this->setLabel( $i18nLabel );

    // set the window title
    $this->setTitle( $i18nLabel  );

    // create the form action
    if( !$params->searchFormAction )
      $params->searchFormAction = 'index.php?c=Wbfsys.Profile.search';

    // add the id to the form
    if( !$params->searchFormId )
      $params->searchFormId = 'wgt-form-treetable-wbfsys_profile-search';

    // fill the relevant data for the search form
    $this->setSearchFormData( $params );



    // if publish is selectbox, we can asume that their are also the parameters
    // target, field and targetId. If not this was an invalid request
    if( 'selectbox' === $params->publish )
    {

      $onClose = <<<BUTTONJS

      \$R.get('ajax.php?c={$params->target}.item&amp;field={$params->field}&amp;target_id={$params->targetId}');

BUTTONJS;

      // on close the calling selectbox has to be updated
      $this->addEvent( 'onclose' , 'refreshSelectbox' , $onClose );

      // clean the targetId to no affect the id of the treetable
      $params->targetId = null;
    }

    ///@var WbfsysProfile_Treetable_Ui
    $ui = $this->loadUi( 'WbfsysProfile_Treetable' );

    // inject the treetable item in the template system
    $treeTable = $ui->createListItem
    (
      $this->model->search( $access, $params ),
      $access,
      $params
    );

    // inject the search fields for the treetable context to the template system
    $ui->searchForm
    (
      $this->model,
      $params
    );
    
    // append the treetable buttons
    $this->addMenu( $params );
    $this->addActions( $treeTable, $params );

    // kein fehler, alles klar
    return null;

  }//end public function display */

////////////////////////////////////////////////////////////////////////////////
// Context treetable
////////////////////////////////////////////////////////////////////////////////
    
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

    ///@var WbfsysProfile_Table_Maintab_Menu
    $menu     = $this->newMenu
    (
      $this->id.'_dropmenu',
      'WbfsysProfile_Table'
    );
    $menu->id = $this->id.'_dropmenu';
    $menu->buildMenu( $params );

    return true;

  }//end public function addMenu */

  /**
   * create the create buttons
   * @param TFlag $params the named parameter object that was created in
   *   the controller
   * {
   *   string searchFormId: the id of the search form;
   * }
   */
  public function addActions( $treeTable, $params )
  {

    // add the button actions for new and search in the window
    // the code will be binded direct on a window object and is removed
    // on window Close
    // all buttons with the class save will call that action
    
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
    
    $code = <<<BUTTONJS
    
{$bookmark}

    self.getObject().find(".wgtac_new").click(function(){
      \$R.get('maintab.php?c=Wbfsys.Profile.create&amp;ltype=treetable');
    });

    // close tab
    self.getObject().find(".wgtac_close").click(function(){
      self.close();
    });
    
    self.getObject().find(".wgtac_back_to_desktop").click(function(){
      self.close();
      \$S('#wgt-maintab_tab_wgt-ui-desktop a').click();
    });

    self.getObject().find(".wgtac_search").click(function(){
      \$R.form( '{$params->searchFormId}', null, {search:true} );
    });

    self.getObject().find(".wgtac_view_table").click(function(){
      self.close();
      \$R.get('maintab.php?c=Wbfsys.Profile.listing&amp;ltype=table');
    });

    self.getObject().find(".wgtac_view_treetable").click(function(){
      self.close();
      \$R.get('maintab.php?c=Wbfsys.Profile.listing&amp;ltype=treetable');
    });


    {$treeTable->buildContextLogic()}

BUTTONJS;


    // create code wird ohne creatbutton auch nicht benötigt
    if( $params->access->insert )
    {
      $code .= <<<BUTTONJS
    self.getObject().find(".wgtac_new").click(function(){
       \$R.get('maintab.php?c=Wbfsys.Profile.create&amp;ltype=treetable');
    });

BUTTONJS;

    }



    $this->addJsCode( $code );

  }//end public function addActions */

}//end class WbfsysProfile_Treetable_Maintab_View

