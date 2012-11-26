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
class IssueHandling_NeedMoreInformation_Message
  extends IssueHandling_Base_Message
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
   * @var WbfsysIssue_Entity
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
   * @param WbfsysIssue_Entity $entity
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
{$this->info->getAppName()}, Issue: {$this->entity->title}
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
    

    $this->htmlDynContent = <<<MAIL
<p class="mail_head" >
  <a href="{$this->getServerAddress()}" target="_new" >{$this->info->getAppName()}</a> Issue {$this->entity->title}
</p>

<p class="text_def" > 
  <strong>Dear {$receiver->firstname} {$receiver->lastname},</strong>
</p>
  
<p class="text_def" >

  <a  target="_new" href="{$this->getServerAddress()}maintab.php?c=Wbfsys.Issue.edit&objid={$this->entity}" >
    {$this->entity->title}
  </a>

</p>

<p>
  <strong>Comment:</strong> <br />
  <em>{$this->process->getUserComment()}</em><br />
</p>

<p>
  <a 
    href="{$this->getServerAddress()}maintab.php?c=Issue.Handling_Process.form&objid={$this->process->activStatus}" 
    >Click here to see the actual status of the Issue, or have a look in the process history.</a>
</p>
MAIL;



  }//end public function buildContent */
          
  /**
   * laden der Attachments für die Nachricht
   * @return void
   */
  public function loadAttachments()
  {
  

    
  }//end public function loadAttachments */
    
} // end class IssueHandling_NeedMoreInformation_Message */

