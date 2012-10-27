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
 * @subpackage ModHandling
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class IssueHandling_Base_Message
  extends LibMessageEnvelop
{
////////////////////////////////////////////////////////////////////////////////
// attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * Die Kannäle über welcher die Nachricht verschickt werden soll
   * @var array
   */
  public $channels = array( 'message', 'mail' );
  
  /**
   * Die Entity zu der die Nachricht in Relation steht
   * @var WbfsysIssue_Entity
   */
  public $entity = null;
  
  /**
   * Der Aktuelle Prozessknoten
   * @var IssueHandling_Process
   */
  public $process = null;
  
  /**
   * Pfad zum Master Template der Nachricht
   * @var string
   */
  public $htmlMaster = 'index';
  

  
////////////////////////////////////////////////////////////////////////////////
// Setter & Getter
////////////////////////////////////////////////////////////////////////////////

  /**
   * @param  IssueHandling_Process $process
   */
  public function setProcess( $process )
  {
    
    $this->process = $process;
    
  }//end public function setProcess */

  /**
   * @param WbfsysIssue_Entity $entity
   */
  public function setEntity( $entity )
  {
    
    $this->entity = $entity;
    
  }//end public function setEntity */
  

    
} // end class IssueHandling_Base_Message */

