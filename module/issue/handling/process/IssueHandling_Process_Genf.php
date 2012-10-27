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
 * NEVER WRITE CODE IN THIS CLASS
 * THE CONTENT OF THIS CLASS IS NOT PERSISTENT AND CAN CHANGE OFTEN
 * ALL YOUR CHANGES WILL BE OVERWRITEN!!!
 * YOU HAVE BEEN WARNED!!!
 *
 * @package WebFrap
 * @subpackage ModHandling
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class IssueHandling_Process_Genf
  extends Process
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * Der Name des Prozesses
   * @var string
   */
  public $name = 'issue_handling';
  
  /**
   * Key zum laden der Entity
   * @var string
   */
  public $entityKey = 'WbfsysIssue';

  /**
   * Beschreibung für den Prozess
   * @var string
   */
  public $description = 'Issue Handling';

  /**
   * Der Default Node kommt dann zur Anwendung, wenn ein Datensatz zwar existiert
   * jedoch noch kein Prozess dafür existiert
   * @var string
   */
  public $defaultNode = 'new';
  
  /**
   * Controller Pfad zum ansprechen des Prozess Service interfaces
   * @var string
   */
  public $processUrl = 'Issue.Handling_Process';

  /**
   * Die Entity an welche der Prozessstatus geknüpft wird
   * @var WbfsysIssue_Entity
   */
  public $entity = null;
  
  /**
   * Referenz auf die Hauptentity
   * @var WbfsysIssue_Entity
   */
  public $entityWbfsysIssue = null;

      
  /**
   * Liste aller relativen Areas für den Prozess
   * @var array
   */
  protected  $areas  = array
  (
    'wbfsys_issue' => 'mod-wbfsys>mgmt-wbfsys_issue',
  );
  
  /**
   * Liste aller relativen Ids für den Prozess
   * @var array
   */
  protected  $ids  = array
  (
    'wbfsys_issue' => null,
  );
      
      
  /**
   * Status Attribute
   * @var string
   */
  public $statusAttribute = 'id_status';
      
  
  /**
   * Setter mit Check auf die korrekte Entity
   * @param WbfsysIssue_Entity $entity
   *
   * @overwrite Process::setEntity( $entity )
   */
  public function setEntity( $entity )
  {

    if
    ( 
      !is_object( $entity ) 
      || !$entity instanceof WbfsysIssue_Entity 
   )
   {
      throw new LibProcess_Exception
      ( 
        "Tried to set an invalid entity to the process ".$this->debugData() 
      );
   }
      
    $this->entity = $entity;
    $this->entityWbfsysIssue = &$this->entity;
    
    $this->model->setEntity( $entity );
    
    $this->ids['wbfsys_issue'] = $entity->getId();

    $db = $this->getDb();
    $orm = $db->getOrm();


    
  }//end public function setEntity */

////////////////////////////////////////////////////////////////////////////////
// Methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * bauen der Responsibles
   */
  public function buildResponsibles()
  {
  
      
    $this->responsibles['manager'] =  array
    (
            
      array
      (
        'type' => Acl::ROLE,
        'roles' => array
        (
            'manager',
            'manager_assistant',
      
        ),
      
        'area' => 'wbfsys_issue',
        'id'   => 'wbfsys_issue',
      
      ),
            
    );
            
    $this->responsibles['owner'] =  array
    (
            
      array
      (
        'type' => Acl::ROLE,
        'roles' => array
        (
            'owner',
      
        ),
      
        'area' => 'wbfsys_issue',
        'id'   => 'wbfsys_issue',
      
      ),
            
    );
            
    $this->responsibles['staff'] =  array
    (
            
      array
      (
        'type' => Acl::ROLE,
        'roles' => array
        (
            'staff',
            'developer',
      
        ),
      
        'area' => 'wbfsys_issue',
        'id'   => 'wbfsys_issue',
      
      ),
            
    );
      
    
  }//end public function buildResponsibles */

  /**
   * bauen der Nodes
   */
  public function buildPhases()
  {
  
    $this->nodes = array
    (

    );

  }//end public function buildPhases */

  /**
   * bauen der Nodes
   */
  public function buildNodes()
  {
  
    $this->nodes = array
    (
      'new' => array
      (
        'label'         => 'New',
        'order'         => 1,
        'icon'          => 'process/new.png',
        'color'         => 'default',
        'phase'          => '',
        'description'    => 'New',

      ),
      'accepted' => array
      (
        'label'         => 'Accepted',
        'order'         => 2,
        'icon'          => 'process/ok.png',
        'color'         => 'default',
        'phase'          => '',
        'description'    => 'Accepted',

      ),
      'assigned' => array
      (
        'label'         => 'Assigned',
        'order'         => 3,
        'icon'          => 'process/assigned.png',
        'color'         => 'default',
        'phase'          => '',
        'description'    => 'Assigned to one or more Project Staff Members',

      ),
      'need_more_information' => array
      (
        'label'         => 'Need More Information',
        'order'         => 4,
        'icon'          => 'process/wait.png',
        'color'         => 'default',
        'phase'          => '',
        'description'    => 'Need More Information',

      ),
      'in_progress' => array
      (
        'label'         => 'In Progress',
        'order'         => 5,
        'icon'          => 'process/running.png',
        'color'         => 'default',
        'phase'          => '',
        'description'    => 'In Progress',

      ),
      'completed' => array
      (
        'label'         => 'Finished',
        'order'         => 6,
        'icon'          => 'process/go_on.png',
        'color'         => 'default',
        'phase'          => '',
        'description'    => 'Finished',

      ),
      're_opened' => array
      (
        'label'         => 'Finished',
        'order'         => 7,
        'icon'          => 'process/go_on.png',
        'color'         => 'default',
        'phase'          => '',
        'description'    => 'Finished',

      ),
      'tested' => array
      (
        'label'         => 'Tested',
        'order'         => 8,
        'icon'          => 'process/ok.png',
        'color'         => 'default',
        'phase'          => '',
        'description'    => 'Tested',

      ),
      'closed' => array
      (
        'label'         => 'Closed',
        'order'         => 9,
        'icon'          => 'process/closed.png',
        'color'         => 'default',
        'phase'          => '',
        'description'    => 'Closed and Deployed',

      ),
      'no_issue' => array
      (
        'label'         => 'No Issue',
        'order'         => 10,
        'icon'          => 'process/ok.png',
        'color'         => 'default',
        'phase'          => '',
        'description'    => 'No Issue',

      ),
      'archived' => array
      (
        'label'         => 'Archived',
        'order'         => 11,
        'icon'          => 'process/archived.png',
        'color'         => 'default',
        'phase'          => '',
        'description'    => 'Archived',

      ),

    );

  }//end public function buildNodes */

  /**
   * bauen der Edges
   */
  public function buildEdges()
  {

    $this->edges = array
    (
      'new' => array
      (
        
        // edge accepted
        'accepted' => array
        (
          'label'     => 'Accepted',
          'order'     => 1,
          'icon'      => 'process/ok.png',
          'description' => 'Accepted',
          'actions'   => array
          (
            'success' => 'accepted',

          )
        ),
      ),
      'accepted' => array
      (
        
        // edge assigned
        'assigned' => array
        (
          'label'     => 'Assign',
          'order'     => 1,
          'icon'      => 'process/assigned.png',
          'description' => 'Assigned to one or more Project Staff Members',
          'actions'   => array
          (
            'success' => 'assigned',

          )
        ),
      ),
      'assigned' => array
      (
        
        // edge in_progress
        'in_progress' => array
        (
          'label'     => 'In Progress',
          'order'     => 1,
          'icon'      => 'process/running.png',
          'description' => 'In Progress',
          'actions'   => array
          (
            'success' => 'in_progress',

          )
        ),
      ),
      'need_more_information' => array
      (
        
        // edge in_progress
        'in_progress' => array
        (
          'label'     => 'In Progress',
          'order'     => 1,
          'icon'      => 'process/running.png',
          'description' => 'In Progress',
          'actions'   => array
          (

          )
        ),
        
        // edge no_issue
        'no_issue' => array
        (
          'label'     => 'No Issue',
          'order'     => 2,
          'icon'      => 'process/ok.png',
          'description' => 'No Issue',
          'actions'   => array
          (
            'success' => 'no_issue',

          )
        ),
        
        // edge completed
        'completed' => array
        (
          'label'     => 'Finished',
          'order'     => 3,
          'icon'      => 'process/go_on.png',
          'description' => 'Finished',
          'actions'   => array
          (
            'success' => 'completed',

          )
        ),
      ),
      'in_progress' => array
      (
        
        // edge need_more_information
        'need_more_information' => array
        (
          'label'     => 'Need More Information',
          'order'     => 1,
          'icon'      => 'process/wait.png',
          'description' => 'Need More Information',
          'actions'   => array
          (
            'success' => 'need_more_information',

          )
        ),
        
        // edge no_issue
        'no_issue' => array
        (
          'label'     => 'No Issue',
          'order'     => 2,
          'icon'      => 'process/ok.png',
          'description' => 'No Issue',
          'actions'   => array
          (
            'success' => 'no_issue',

          )
        ),
        
        // edge completed
        'completed' => array
        (
          'label'     => 'Finished',
          'order'     => 3,
          'icon'      => 'process/go_on.png',
          'description' => 'Finished',
          'actions'   => array
          (
            'success' => 'completed',

          )
        ),
      ),
      'completed' => array
      (
        
        // edge re_opened
        're_opened' => array
        (
          'label'     => 'Finished',
          'order'     => 1,
          'icon'      => 'process/go_on.png',
          'description' => 'Finished',
          'actions'   => array
          (
            'success' => 're_opened',

          )
        ),
        
        // edge tested
        'tested' => array
        (
          'label'     => 'Tested',
          'order'     => 2,
          'icon'      => 'process/ok.png',
          'description' => 'Tested',
          'actions'   => array
          (
            'success' => 'tested',

          )
        ),
      ),
      're_opened' => array
      (
        
        // edge completed
        'completed' => array
        (
          'label'     => 'Finished',
          'order'     => 1,
          'icon'      => 'process/go_on.png',
          'description' => 'Finished',
          'actions'   => array
          (
            'success' => 'completed',

          )
        ),
      ),
      'tested' => array
      (
        
        // edge closed
        'closed' => array
        (
          'label'     => 'Closed',
          'order'     => 1,
          'icon'      => 'process/closed.png',
          'description' => 'Closed and Deployed',
          'actions'   => array
          (
            'success' => 'closed',

          )
        ),
      ),
      'closed' => array
      (
        
        // edge archived
        'archived' => array
        (
          'label'     => 'Archived',
          'order'     => 1,
          'icon'      => 'process/archived.png',
          'description' => 'Archived',
          'actions'   => array
          (

          )
        ),
      ),
      'no_issue' => array
      (
        
        // edge archived
        'archived' => array
        (
          'label'     => 'Archived',
          'order'     => 1,
          'icon'      => 'process/archived.png',
          'description' => 'Archived',
          'actions'   => array
          (

          )
        ),
      ),
      'archived' => array
      (
      ),
    );

  }//end public function buildEdges */

////////////////////////////////////////////////////////////////////////////////
// Event Methodes
////////////////////////////////////////////////////////////////////////////////
    
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
      $message = new IssueHandling_New_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'manager',
              'manager_assistant',
        
          ),
        
          $this->areas['wbfsys_issue'],
          $this->ids['wbfsys_issue']
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
      $message = new IssueHandling_Accepted_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'owner',
        
          ),
        
          $this->areas['wbfsys_issue'],
          $this->ids['wbfsys_issue']
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
  public function action_Assign( )
  {
  
    $response  = $this->getResponse();
    $i18n       = $response->i18n;
    $acl       = $this->getAcl();
    

    try 
    {
      $message = new IssueHandling_Assign_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'staff',
              'developer',
        
          ),
        
          $this->areas['wbfsys_issue'],
          $this->ids['wbfsys_issue']
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

  }//end public function action_Assign */


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
      $message = new IssueHandling_InProgress_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'manager',
              'manager_assistant',
        
          ),
        
          $this->areas['wbfsys_issue'],
          $this->ids['wbfsys_issue']
        )
              );
            $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'owner',
        
          ),
        
          $this->areas['wbfsys_issue'],
          $this->ids['wbfsys_issue']
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
      $message = new IssueHandling_NeedMoreInformation_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'manager',
              'manager_assistant',
        
          ),
        
          $this->areas['wbfsys_issue'],
          $this->ids['wbfsys_issue']
        )
              );
            $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'owner',
        
          ),
        
          $this->areas['wbfsys_issue'],
          $this->ids['wbfsys_issue']
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
  public function action_NoIssue( )
  {
  
    $response  = $this->getResponse();
    $i18n       = $response->i18n;
    $acl       = $this->getAcl();
    

    try 
    {
      $message = new IssueHandling_NoIssue_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'manager',
              'manager_assistant',
        
          ),
        
          $this->areas['wbfsys_issue'],
          $this->ids['wbfsys_issue']
        )
              );
            $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'owner',
        
          ),
        
          $this->areas['wbfsys_issue'],
          $this->ids['wbfsys_issue']
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

  }//end public function action_NoIssue */


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
      $message = new IssueHandling_Completed_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'manager',
              'manager_assistant',
        
          ),
        
          $this->areas['wbfsys_issue'],
          $this->ids['wbfsys_issue']
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
      $message = new IssueHandling_ReOpened_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'staff',
              'developer',
        
          ),
        
          $this->areas['wbfsys_issue'],
          $this->ids['wbfsys_issue']
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
  public function action_Tested( )
  {
  
    $response  = $this->getResponse();
    $i18n       = $response->i18n;
    $acl       = $this->getAcl();
    

    try 
    {
      $message = new IssueHandling_Tested_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'staff',
              'developer',
        
          ),
        
          $this->areas['wbfsys_issue'],
          $this->ids['wbfsys_issue']
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

  }//end public function action_Tested */


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
      $message = new IssueHandling_Closed_Message();  

      $message->addReceiver
      (
              
        new LibMessage_Receiver_Group
        (
          array
          (
              'owner',
        
          ),
        
          $this->areas['wbfsys_issue'],
          $this->ids['wbfsys_issue']
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


////////////////////////////////////////////////////////////////////////////////
// Constraint Methodes
////////////////////////////////////////////////////////////////////////////////
    
}//end class IssueHandling_Process_Genf */

