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
 * @subpackage default
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WgtDesktopMainmenuDefault
  extends WgtDesktopMainmenu
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////

  /**
  *
  * @return string
  */
  public function render()
  {

    $user     = $this->getUser();
  
    $html = <<<HTML
<div id="wbf-ui-panel" class="ui-widget-header"  >
  <ul id="wgt-nav-menu" class="wcm wcm_ui_mega_menu wgt-mega-menu"  >
{$this->render_nodeLogo()}
{$this->render_nodeProfile()}
{$this->render_nodeMessages()}
{$this->render_nodeContacts()}
{$this->render_nodeCalendar()}
{$this->render_nodeTasks()}
{$this->render_nodeDebug()}
{$this->render_nodeDesktop()}
{$this->render_nodeHelp()}
{$this->render_nodeLogout()}

  </ul>
</div>
HTML;

    return $html;

  }//end public function render */


  /**
   * @return string
   */
  public function render_nodeLogo()
  {
    
    $html = <<<HTML

<li class="custom wgt-lyt-logo"  >
  <a href="./"  >&nbsp;</a>
</li>

HTML;

    return $html;
    
  }//end public function render_nodeLogo */

  /**
   * @return string
   */
  public function render_nodeProfile( )
  {
    
    $user    = $this->getUser();
    $db      = $this->getDb();
    
    $myProfile = new WgtElementMyData();
    $myProfile->user = $user;
    $myProfile->db = $db;

    return $myProfile->render();
    
  }//end public function render_nodeProfile */

  /**
   * Dropdown für die User Messages
   * @return string
   */
  public function render_nodeMessages()
  {
    
    $html = <<<HTML

    <li 
    	class="notify start custom"
    	title="Open your personal message center" >
      <a 
      	class="wcm wcm_req_ajax" 
      	href="maintab.php?c=Webfrap.Message.messageList">{$this->icon('desktop/message.png','Message','small',array('alt'=>'header'))}</a>
      <!--<div class="sub subcnt" style="display:none; width:850px;height:600px;overflow:auto;" >
        <div class="row" ><a class="wcm wcm_req_ajax" href="maintab.php?c=Webfrap.Message.messageList">Message List</a> </div>
      </div>-->
    </li>

HTML;

    return $html;
    
  }//end public function render_nodeMessages */

  /**
   * @return string
   */
  public function render_nodeContacts()
  {
  
  	if( !WBF_SHOW_MOCKUP )
  		return '';
  		
    $html = <<<HTML

    <li class="notify custom"  >
      <a class="wcm wcm_req_ajax" href="maintab.php?c=Groupware.Contacts.list">{$this->icon('desktop/contacts.png','Contacts','small',array('alt'=>'Contacts'))}</a>
      <div class="sub subcnt" style="display:none; width:200px;height:600px;overflow:auto;" >
        <h2>Contacts</h2>
      </div>
    </li>

HTML;

    return $html;
    
  }//end public function render_nodeContacts */

  /**
   * Der persönliche Kallender
   * @return string
   */
  public function render_nodeCalendar()
  {
  
  	if( !WBF_SHOW_MOCKUP )
  		return '';
  		
    $html = <<<HTML

    <li 
    	class="notify custom" 
    	title="Calendar" >
      <a>{$this->icon('desktop/calendar.png','Calendar','small',array('alt'=>'header'))}</a>
      <div class="subcnt"  style="display:none;width:850px;padding:20px;background-color:white;" >
        
        <div style="width:810px;" >
          <form id="wgt-form-calendar-example" action="./dump.php?fu=bar" method="POST" ></form>

          <div 
            class="wcm wcm_ui_calendar" 
            id="wgt-calendar-example" 
            style="width:700px;margin:10px;" ></div>
          <var>
          {
            "data":
            [
              {
                "title": "Event1",
                "start": "2011-04-04"
              },
              {
                "title": "Event2",
                "start": "2011-05-05",
                "end": "2011-05-07"
              }
            ]
          }
          </var>
        </div>
        <div class="wgt-clear small" >&nbsp;</div>
      
      </div>
    </li>

HTML;

    return $html;
    
  }//end public function render_nodeCalendar */

  /**
   * Aktuelle Tasks für den Nutzer
   * @return string
   */
  public function render_nodeTasks()
  {
    
  	if( !WBF_SHOW_MOCKUP )
  		return '';
  
    $html = <<<HTML

    <li 
    	class="notify"
    	title="User tasks"  ><a>{$this->icon('desktop/task.png','Task','small',array('alt'=>'header'))}</a></li>
    
HTML;

    return $html;
    
  }//end public function render_nodeTasks */

  /**
   * Menüabschnitt für das Debugging
   * @return string
   */
  public function render_nodeDebug()
  {
    
  	// wenn debug deaktiviert ist brauchen wir keine konsole
  	if( !DEBUG || !DEBUG_CONSOLE )
  		return '';
  
    $html = <<<HTML

    <li 
    	class="notify custom"
    	title="The system debug console." >
      <a href="#"  >{$this->icon('desktop/develop.png','Develop','small',array('alt'=>'debug','id'=>'wgt_status_lasterror'))}</a>
      <div class="subcnt" id="wgt_debug_console" style="display:none;" >
        <div 
          class="row content wcm wcm_action_fill_by_var" 
          style="width:950px;height:500px;overflow:auto;background-color:white;" 
          wgt_content_id="wgt_debug_console-content" >
            <h2>Debug Console</h2>
        </div>
      </div>
    </li>

HTML;

    return $html;
    
  }//end public function render_nodeDebug */

  /**
   * @return string
   */
  public function render_nodeDesktop()
  {
    
    $html = <<<HTML

    <li 
    	class="notify custom"
    	title="Hide all active tabs and show the desktop" >
    	<a 
    		onclick="\$S('#wgt-maintab_tab_wgt-ui-desktop a').click();" >{$this->icon('desktop/desktop.png','Desktop','small',array('alt'=>'Desktop'))}</a>
    </li>

HTML;

    return $html;
    
  }//end public function render_nodeDesktop */

  /**
   * @return string
   */
  public function render_nodeHelp()
  {
  
  	/* im moment deaktiviert
    $loader = new ExtensionLoader( 'index', 'data/docu/' );

    $content = <<<HTML
      <div class="wgt-box static" >
HTML;

    foreach( $loader as $file )
    {
      $content .= View::includeFile( PATH_GW.'data/docu/index/'.$file, $this ) ;
    }
    
    $content .=<<<HTML
      <div class="wgt-clear small" ></div>
    </div>
HTML;


    <div class="sub subcnt" style="display:none; width:1050px;height:600px;overflow:auto;" >
      {$content}
    </div>
    */


    $html = <<<HTML

    
    <li 
    	class="notify end custom"
    	title="Open the help page."  >
      <a href="maintab.php?c=Webfrap.Docu.show" class="wcm wcm_req_ajax" >{$this->icon('desktop/help.png','Help','small',array('alt'=>'header'))}</a>
    </li>

HTML;

    return $html;
    
  }//end public function render_nodeHelp */

  /**
   * @return string
   */
  public function render_nodeLogout()
  {
    
    $html = <<<HTML

    <li 
    	class="custom"
    	title="Logout from the system" >
    	<a href="index.php?c=Webfrap.Auth.logout">{$this->icon('desktop/logout.png','Logout','small',array('alt'=>'Logout'))}</a>
    </li>

HTML;

    return $html;
    
  }//end public function render_nodeLogout */


} // end class WgtDesktopMainmenuDefault

