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
 * @subpackage ModTask_Handling
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysTask_Handling_Process_Genf
  extends Process
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * Der Name des Prozesses
   * @var string
   */
  public $name = 'wbfsys_task-handling';
  
  /**
   * Key zum laden der Entity
   * @var string
   */
  public $entityKey = 'WbfsysTask';

  /**
   * Beschreibung für den Prozess
   * @var string
   */
  public $description = 'Task Handling';

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
  public $processUrl = 'Wbfsys.Task_Handling_Process';

  /**
   * Die Entity an welche der Prozessstatus geknüpft wird
   * @var WbfsysTask_Entity
   */
  public $entity = null;
  
  /**
   * Referenz auf die Hauptentity
   * @var WbfsysTask_Entity
   */
  public $entityWbfsysTask = null;

      
  /**
   * Liste aller relativen Areas für den Prozess
   * @var array
   */
  protected  $areas  = array
  (
    'wbfsys_task' => 'mod-wbfsys>mgmt-wbfsys_task',
  );
  
  /**
   * Liste aller relativen Ids für den Prozess
   * @var array
   */
  protected  $ids  = array
  (
    'wbfsys_task' => null,
  );
      
      
  /**
   * Status Attribute
   * @var string
   */
  public $statusAttribute = 'id_status';
      
  
  /**
   * Setter mit Check auf die korrekte Entity
   * @param WbfsysTask_Entity $entity
   *
   * @overwrite Process::setEntity( $entity )
   */
  public function setEntity( $entity )
  {

    if
    ( 
      !is_object( $entity ) 
      || !$entity instanceof WbfsysTask_Entity 
   )
   {
      throw new LibProcess_Exception
      ( 
        "Tried to set an invalid entity to the process ".$this->debugData() 
      );
   }
      
    $this->entity = $entity;
    $this->entityWbfsysTask = &$this->entity;
    
    $this->model->setEntity( $entity );
    
    $this->ids['wbfsys_task'] = $entity->getId();

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
  
      
    $this->responsibles['owner'] =  array
    (
            
      array
      (
        'type' => Acl::ROLE,
        'roles' => array
        (
            'owner',
      
        ),
      
        'area' => 'wbfsys_task',
        'id'   => 'wbfsys_task',
      
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
      
        ),
      
        'area' => 'wbfsys_task',
        'id'   => 'wbfsys_task',
      
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
      'rejected' => array
      (
        'label'         => 'Rejected',
        'order'         => 2,
        'icon'          => 'process/reject.png',
        'color'         => 'default',
        'phase'          => '',
        'description'    => 'Rejected',

      ),
      'accepted' => array
      (
        'label'         => 'Accepted',
        'order'         => 3,
        'icon'          => 'process/ok.png',
        'color'         => 'default',
        'phase'          => '',
        'description'    => 'Accepted',

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
        'label'         => 'Re Opened',
        'order'         => 7,
        'icon'          => 'process/go_on.png',
        'color'         => 'default',
        'phase'          => '',
        'description'    => 'Re Opened',

      ),
      'closed' => array
      (
        'label'         => 'Closed',
        'order'         => 8,
        'icon'          => 'process/closed.png',
        'color'         => 'default',
        'phase'          => '',
        'description'    => 'Closed and Deployed',

      ),
      'retired' => array
      (
        'label'         => 'Retired',
        'order'         => 9,
        'icon'          => 'process/retired.png',
        'color'         => 'default',
        'phase'          => '',
        'description'    => 'Retired',

      ),
      'archived' => array
      (
        'label'         => 'Archived',
        'order'         => 10,
        'icon'          => 'process/archive.png',
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
        
        // edge rejected
        'rejected' => array
        (
          'label'     => 'Rejected',
          'order'     => 2,
          'icon'      => 'process/reject.png',
          'description' => 'Rejected',
          'actions'   => array
          (
            'success' => 'rejected',

          )
        ),
      ),
      'rejected' => array
      (
        
        // edge new
        'new' => array
        (
          'label'     => 'New',
          'order'     => 1,
          'icon'      => 'process/new.png',
          'description' => 'New',
          'actions'   => array
          (
            'success' => 'new',

          )
        ),
        
        // edge retired
        'retired' => array
        (
          'label'     => 'Retired',
          'order'     => 2,
          'icon'      => 'process/retired.png',
          'description' => 'Retired',
          'actions'   => array
          (
            'success' => 'retired',

          )
        ),
      ),
      'accepted' => array
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
        
        // edge in_progress
        'in_progress' => array
        (
          'label'     => 'In Progress',
          'order'     => 2,
          'icon'      => 'process/running.png',
          'description' => 'In Progress',
          'actions'   => array
          (
            'success' => 'in_progress',

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
        
        // edge retired
        'retired' => array
        (
          'label'     => 'Retired',
          'order'     => 4,
          'icon'      => 'process/retired.png',
          'description' => 'Retired',
          'actions'   => array
          (
            'success' => 'retired',

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
            'success' => 'in_progress',

          )
        ),
        
        // edge completed
        'completed' => array
        (
          'label'     => 'Finished',
          'order'     => 2,
          'icon'      => 'process/go_on.png',
          'description' => 'Finished',
          'actions'   => array
          (
            'success' => 'completed',

          )
        ),
        
        // edge retired
        'retired' => array
        (
          'label'     => 'Retired',
          'order'     => 3,
          'icon'      => 'process/retired.png',
          'description' => 'Retired',
          'actions'   => array
          (
            'success' => 'retired',

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
        
        // edge completed
        'completed' => array
        (
          'label'     => 'Finished',
          'order'     => 2,
          'icon'      => 'process/go_on.png',
          'description' => 'Finished',
          'actions'   => array
          (
            'success' => 'completed',

          )
        ),
        
        // edge retired
        'retired' => array
        (
          'label'     => 'Retired',
          'order'     => 3,
          'icon'      => 'process/retired.png',
          'description' => 'Retired',
          'actions'   => array
          (
            'success' => 'retired',

          )
        ),
      ),
      'completed' => array
      (
        
        // edge re_opened
        're_opened' => array
        (
          'label'     => 'Re Opened',
          'order'     => 1,
          'icon'      => 'process/go_on.png',
          'description' => 'Re Opened',
          'actions'   => array
          (
            'success' => 're_opened',

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
      'closed' => array
      (
        
        // edge archived
        'archived' => array
        (
          'label'     => 'Archived',
          'order'     => 1,
          'icon'      => 'process/archive.png',
          'description' => 'Archived',
          'actions'   => array
          (

          )
        ),
      ),
      'retired' => array
      (
        
        // edge new
        'new' => array
        (
          'label'     => 'New',
          'order'     => 1,
          'icon'      => 'process/new.png',
          'description' => 'New',
          'actions'   => array
          (
            'success' => 'new',

          )
        ),
        
        // edge retired
        'retired' => array
        (
          'label'     => 'Retired',
          'order'     => 2,
          'icon'      => 'process/retired.png',
          'description' => 'Retired',
          'actions'   => array
          (
            'success' => 'retired',

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


////////////////////////////////////////////////////////////////////////////////
// Constraint Methodes
////////////////////////////////////////////////////////////////////////////////
    
}//end class WbfsysTask_Handling_Process_Genf */

