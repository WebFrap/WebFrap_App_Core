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
class WbfsysTask_Handling_Completed_Message
  extends WbfsysTask_Handling_Base_Message
{    
    
  /**
   * Die Kanäle über welcher die Nachricht verschickt werden soll
   * @var array
   */
  public $channels = array
  ( 
    'mail'
   );
    
  
  /**
   * Die Entity zu der die Nachricht in Relation steht
   * @var WbfsysTask_Entity
   */
  public $entity = null;
  

  /**
   * Pfad zum Master Template der Nachricht
   * @var string
   */
  public $htmlMaster = 'index';
  

  
////////////////////////////////////////////////////////////////////////////////
// Setter & Getter
////////////////////////////////////////////////////////////////////////////////

  
  /**
   * @param WbfsysTask_Entity $entity
   */
  public function setEntity( $entity )
  {
    
    $this->entity = $entity;
    
  }//end public function setEntity */
  

        
  /**
   * Subject der Nachricht
   * @param LibMessageReceiver $receiver = null
   * @return string
   */
  public function getSubject( $receiver = null, $sender = null )
  {

    return <<<SUBJECT

SUBJECT;
    
  }//end public function getSubject */
  
  /**
   * Erstellen des Contents, soweit dynamisch nötig
   * 
   * @param LibMessageReceiver $receiver = null
   * @param LibMessageSender $sender = null
   * @return string
   */
  public function buildContent( $receiver = null, $sender = null )
  {
    



  }//end public function buildContent */
          
  /**
   * laden der Attachments für die Nachricht
   * @return void
   */
  public function loadAttachments()
  {
  

    
  }//end public function loadAttachments */
    
} // end class WbfsysTask_Handling_Completed_Message */

