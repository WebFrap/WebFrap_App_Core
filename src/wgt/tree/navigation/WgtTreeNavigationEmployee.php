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
 * @subpackage employee
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WgtTreeNavigationEmployee
  extends WgtTreeNavigationDefault
{

  /**
  *
  * @return string
  */
  public function build()
  {

    $html = <<<HTML
<div id="wgt-tree-{$this->id}"  >
<ul class="wcm wcm_ui_tree" >
{$this->nodeWbfExplorer()}
{$this->subtreeMyData()}
{$this->nodeWbfLogout()}

</ul>
</div>
HTML;

    return $html;

  }//end public function build */


  /**
  * @lang de:
  * Einen Menüeintrag erstellen
  *
  * @param string $class
  * @return string
  */
  protected function nodeWbfExplorer( $class = null )
  {

    $acl   = $this->getAcl();

    $html  = '';



    $html .= <<<HTML
      <li><a href="maintab.php?c=Webfrap.Navigation.explorer" class="wcm wcm_req_mtab file" >{$this->icon( 'control/explorer.png', 'explorer', 'xsmall' )} Explorer</a></li>

HTML;


    return $html;

  }//end rotected function nodeWbfExplorer */

  /**
  * build the admin submenu
  * @param string $class
  * @return string
  */
  protected function subtreeMyData( $class = null )
  {

    $acl = $this->getAcl();

    $html = '';


    $html .= <<<HTML
      <li><span class="folder" >My Data</span>
        <ul>
HTML;



     $html .=  <<<MENU
      <li><a href="maintab.php?c=My.Announcement.listing" class="wcm wcm_req_mtab file" >{$this->icon( 'my/announcement.png', 'My Announcements', 'xsmall' )} My Announcements</a></li>

MENU;



     $html .=  <<<MENU
      <li><a href="maintab.php?c=My.Message.listing" class="wcm wcm_req_mtab file" >{$this->icon( 'my/message.png', 'My Messages', 'xsmall' )} My Messages</a></li>

MENU;



     $html .=  <<<MENU
      <li><a href="maintab.php?c=My.Profile.show" class="wcm wcm_req_mtab file" >{$this->icon( 'my/profile.png', 'My Profile', 'xsmall' )} My Profile</a></li>

MENU;



     $html .=  <<<MENU
      <li><a href="maintab.php?c=Webfrap.Docu.page" class="wcm wcm_req_mtab file" >{$this->icon( 'control/info.png', 'Docu', 'xsmall' )} Docu</a></li>

MENU;



    $html .= <<<HTML
        </ul>
      </li>
HTML;


    return $html;

  }//end protected function subtreeMyData */

  /**
  * @lang de:
  * Einen Menüeintrag erstellen
  *
  * @param string $class
  * @return string
  */
  protected function nodeWbfLogout( $class = null )
  {

    $acl   = $this->getAcl();

    $html  = '';



    $html .= <<<HTML
      <li><a href="maintab.php?c=Webfrap.Auth.logout" class="wcm wcm_req_mtab file" >{$this->icon( 'control/logout.png', 'logout', 'xsmall' )} Logout</a></li>

HTML;


    return $html;

  }//end rotected function nodeWbfLogout */


} // end class WgtTreeNavigationEmployee

