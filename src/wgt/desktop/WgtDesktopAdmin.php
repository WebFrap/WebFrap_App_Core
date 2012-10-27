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
 *
 * @package WebFrap
 * @subpackage admin
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WgtDesktopAdmin
  extends WgtDesktop
{
  /**
   * @param $view LibTemplateHtml
   */
  public function display( $view )
  {

    $user     = $this->getUser();
    $profile  = $user->getProfile();
    
    $view->keyCss    = 'backend';
    $view->keyTheme = 'backend';
    $view->keyJs    = 'backend';

    // set template
    $view->setTemplate( 'profile/admin/default' );
    $view->setIndex( 'profile/admin/default' );

    // panel
    $view->addVar('desktopPanel',     $profile->getPanel() );

    // no need for the navigation, but leets keep the line
    //$view->addVar('desktopNavigation',     $profile->getNavigation() );

    
        
    // laden des Dasboards
    $desktopModel = new WebfrapDashboard_Model( $this );

    $quikLinkList = new WgtElementLinklist( );
    $quikLinkList->setData( $desktopModel->loadProfileQuickLinks() );
    $view->addElement( 'listQuicklinks', $quikLinkList );
    
    $lastVisitedList = new WgtElementLinklist(  ) ;
    $lastVisitedList->setData( $desktopModel->loadLastVisited() );
    $view->addElement( 'lastVisited', $lastVisitedList );
    
    $mostVisitedList = new WgtElementLinklist(  ) ;
    $mostVisitedList->setData( $desktopModel->loadMostVisited() );
    $view->addElement( 'mostVisited', $mostVisitedList );
    
    $mostVisitedList = new WgtElementLinklist(  ) ;
    $mostVisitedList->setData( $desktopModel->loadBookmarks() );
    $view->addElement( 'listBookmarks', $mostVisitedList );
    
    // initiales laden der news liste
    $newsList = new WgtElementNewsList(  ) ;
    $newsList->setData( $desktopModel->loadNews() );
    $view->addElement( 'news', $newsList );
    
    // die Searchbox
    $searchBox = new WgtElementDesktopSearch(  ) ;
    $view->addElement( 'searchBox', $searchBox );
    

  }//end public function display */

}// end class WgtDesktopAdmin

