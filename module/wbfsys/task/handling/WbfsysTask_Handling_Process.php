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
 * Custom Code Class for the process
 *
 * @package WebFrap
 * @subpackage wbfsys_task-handling
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysTask_Handling_Process
  extends WbfsysTask_Handling_Process_Genf
{
////////////////////////////////////////////////////////////////////////////////
// Action Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * @return null Error im Fehlerfall
   */
  public function action_New( )
  {
  
    $response  = $this->getResponse();
    $i18n       = $response->i18n;
    $acl       = $this->getAcl();
    

    try 
    {
      $message = new WbfsysTask_Handling_New_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'owner',
        
          ),
        
          $this->areas['wbfsys_task'],
          $this->ids['wbfsys_task']
        )
              );
      
      
      $message->setEntity( $this->entity );


      $message->setProcess( $this );

      $msgProvider = $this->getMessage();
      $msgProvider->send( $message );
      
      $response->addMessage( 'Notified Creator and responsible Managers' );
      
    }
    catch( LibMessage_Exception $e )
    {
      
      $response->addError
      (  
        $i18n->l
        ( 
          "Failed to send Message {@message@}", 
          array( 'message' => $e->getMessage() ) 
        )
      );
      
    }


    return null;

  }//end public function action_New */


  /**
   * @return null Error im Fehlerfall
   */
  public function action_Accepted( )
  {
  
    $response  = $this->getResponse();
    $i18n       = $response->i18n;
    $acl       = $this->getAcl();
    

    try 
    {
      $message = new WbfsysTask_Handling_Accepted_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'owner',
        
          ),
        
          $this->areas['wbfsys_task'],
          $this->ids['wbfsys_task']
        )
              );
      
      
      $message->setEntity( $this->entity );


      $message->setProcess( $this );

      $msgProvider = $this->getMessage();
      $msgProvider->send( $message );
      
      $response->addMessage( 'Notified Creator and responsible Managers' );
      
    }
    catch( LibMessage_Exception $e )
    {
      
      $response->addError
      (  
        $i18n->l
        ( 
          "Failed to send Message {@message@}", 
          array( 'message' => $e->getMessage() ) 
        )
      );
      
    }


    return null;

  }//end public function action_Accepted */


  /**
   * @return null Error im Fehlerfall
   */
  public function action_Rejected( )
  {
  
    $response  = $this->getResponse();
    $i18n       = $response->i18n;
    $acl       = $this->getAcl();
    

    try 
    {
      $message = new WbfsysTask_Handling_Rejected_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'owner',
        
          ),
        
          $this->areas['wbfsys_task'],
          $this->ids['wbfsys_task']
        )
              );
      
      
      $message->setEntity( $this->entity );


      $message->setProcess( $this );

      $msgProvider = $this->getMessage();
      $msgProvider->send( $message );
      
      $response->addMessage( 'Notified Creator and responsible Managers' );
      
    }
    catch( LibMessage_Exception $e )
    {
      
      $response->addError
      (  
        $i18n->l
        ( 
          "Failed to send Message {@message@}", 
          array( 'message' => $e->getMessage() ) 
        )
      );
      
    }


    return null;

  }//end public function action_Rejected */


  /**
   * @return null Error im Fehlerfall
   */
  public function action_InProgress( )
  {
  
    $response  = $this->getResponse();
    $i18n       = $response->i18n;
    $acl       = $this->getAcl();
    

    try 
    {
      $message = new WbfsysTask_Handling_InProgress_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'owner',
        
          ),
        
          $this->areas['wbfsys_task'],
          $this->ids['wbfsys_task']
        )
              );
      
      
      $message->setEntity( $this->entity );


      $message->setProcess( $this );

      $msgProvider = $this->getMessage();
      $msgProvider->send( $message );
      
      $response->addMessage( 'Notified Creator and responsible Managers' );
      
    }
    catch( LibMessage_Exception $e )
    {
      
      $response->addError
      (  
        $i18n->l
        ( 
          "Failed to send Message {@message@}", 
          array( 'message' => $e->getMessage() ) 
        )
      );
      
    }


    return null;

  }//end public function action_InProgress */


  /**
   * @return null Error im Fehlerfall
   */
  public function action_NeedMoreInformation( )
  {
  
    $response  = $this->getResponse();
    $i18n       = $response->i18n;
    $acl       = $this->getAcl();
    

    try 
    {
      $message = new WbfsysTask_Handling_NeedMoreInformation_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'owner',
        
          ),
        
          $this->areas['wbfsys_task'],
          $this->ids['wbfsys_task']
        )
              );
      
      
      $message->setEntity( $this->entity );


      $message->setProcess( $this );

      $msgProvider = $this->getMessage();
      $msgProvider->send( $message );
      
      $response->addMessage( 'Notified Creator and responsible Managers' );
      
    }
    catch( LibMessage_Exception $e )
    {
      
      $response->addError
      (  
        $i18n->l
        ( 
          "Failed to send Message {@message@}", 
          array( 'message' => $e->getMessage() ) 
        )
      );
      
    }


    return null;

  }//end public function action_NeedMoreInformation */


  /**
   * @return null Error im Fehlerfall
   */
  public function action_Completed( )
  {
  
    $response  = $this->getResponse();
    $i18n       = $response->i18n;
    $acl       = $this->getAcl();
    

    try 
    {
      $message = new WbfsysTask_Handling_Completed_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'owner',
        
          ),
        
          $this->areas['wbfsys_task'],
          $this->ids['wbfsys_task']
        )
              );
      
      
      $message->setEntity( $this->entity );


      $message->setProcess( $this );

      $msgProvider = $this->getMessage();
      $msgProvider->send( $message );
      
      $response->addMessage( 'Notified Creator and responsible Managers' );
      
    }
    catch( LibMessage_Exception $e )
    {
      
      $response->addError
      (  
        $i18n->l
        ( 
          "Failed to send Message {@message@}", 
          array( 'message' => $e->getMessage() ) 
        )
      );
      
    }


    return null;

  }//end public function action_Completed */


  /**
   * @return null Error im Fehlerfall
   */
  public function action_ReOpened( )
  {
  
    $response  = $this->getResponse();
    $i18n       = $response->i18n;
    $acl       = $this->getAcl();
    

    try 
    {
      $message = new WbfsysTask_Handling_ReOpened_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'staff',
        
          ),
        
          $this->areas['wbfsys_task'],
          $this->ids['wbfsys_task']
        )
              );
      
      
      $message->setEntity( $this->entity );


      $message->setProcess( $this );

      $msgProvider = $this->getMessage();
      $msgProvider->send( $message );
      
      $response->addMessage( 'Notified Creator and responsible Managers' );
      
    }
    catch( LibMessage_Exception $e )
    {
      
      $response->addError
      (  
        $i18n->l
        ( 
          "Failed to send Message {@message@}", 
          array( 'message' => $e->getMessage() ) 
        )
      );
      
    }


    return null;

  }//end public function action_ReOpened */


  /**
   * @return null Error im Fehlerfall
   */
  public function action_Closed( )
  {
  
    $response  = $this->getResponse();
    $i18n       = $response->i18n;
    $acl       = $this->getAcl();
    

    try 
    {
      $message = new WbfsysTask_Handling_Closed_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'owner',
        
          ),
        
          $this->areas['wbfsys_task'],
          $this->ids['wbfsys_task']
        )
              );
      
      
      $message->setEntity( $this->entity );


      $message->setProcess( $this );

      $msgProvider = $this->getMessage();
      $msgProvider->send( $message );
      
      $response->addMessage( 'Notified Creator and responsible Managers' );
      
    }
    catch( LibMessage_Exception $e )
    {
      
      $response->addError
      (  
        $i18n->l
        ( 
          "Failed to send Message {@message@}", 
          array( 'message' => $e->getMessage() ) 
        )
      );
      
    }


    return null;

  }//end public function action_Closed */


  /**
   * @return null Error im Fehlerfall
   */
  public function action_Retired( )
  {
  
    $response  = $this->getResponse();
    $i18n       = $response->i18n;
    $acl       = $this->getAcl();
    

    try 
    {
      $message = new WbfsysTask_Handling_Retired_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'owner',
        
          ),
        
          $this->areas['wbfsys_task'],
          $this->ids['wbfsys_task']
        )
              );
      
      
      $message->setEntity( $this->entity );


      $message->setProcess( $this );

      $msgProvider = $this->getMessage();
      $msgProvider->send( $message );
      
      $response->addMessage( 'Notified Creator and responsible Managers' );
      
    }
    catch( LibMessage_Exception $e )
    {
      
      $response->addError
      (  
        $i18n->l
        ( 
          "Failed to send Message {@message@}", 
          array( 'message' => $e->getMessage() ) 
        )
      );
      
    }


    return null;

  }//end public function action_Retired */



}// end class WbfsysTask_Handling_Process

