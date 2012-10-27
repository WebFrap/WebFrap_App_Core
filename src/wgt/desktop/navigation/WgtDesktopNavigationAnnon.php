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
 * @subpackage annon
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WgtDesktopNavigationAnnon
  extends WgtDesktopNavigation
{
////////////////////////////////////////////////////////////////////////////////
// attributes
////////////////////////////////////////////////////////////////////////////////


 /**
  * @return string
  */
  public function build()
  {

    $user = $this->getUser();

    $html = <<<HTML

  <div class="wcm wcm_ui_accordion" >
{$this->buildNavigation( $user )}

  </div>

HTML;

    return $html;

  }//end public function build */


    /**
    * @return string
    */
    public function buildNavigation( $user )
    {

      $tree = new WgtTreeNavigationAnnon('tmp_tree');

       $html = <<<HTML
      <h3><a href="navigation">Navigation</a></h3>
      <div class="ac_body" >{$tree->build()}</div>
HTML;

      return $html;

    }//end public function buildNavigation */



} // end class WgtNavigationAnnon

