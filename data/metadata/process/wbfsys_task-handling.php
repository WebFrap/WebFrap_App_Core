<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for process: wbfsys_task-handling
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $process = null;

    if( !$process = $orm->getByKey( 'WbfsysProcess', 'wbfsys_task-handling' ) )
    {
      $process = new WbfsysProcess_Entity();
      $process->access_key = 'wbfsys_task-handling';
    }
    
    $process->upgrade( 'name', 'Task Handling' );
    $process->upgrade( 'description', 'Task Handling' );
    $process->upgrade( 'id_entity', $orm->getByKey( 'WbfsysEntity' , 'wbfsys_task' ) ); 
    $process->revision    = $deployRevision;
    
    try
    {
      if( $process->isNew() )
      {
      
        $orm->insert( $process );
        $this->protocol(array(
          'insert',
          'wbfsys_task-handling',
          'WbfsysProcess',
          'Sucessfully created new Process wbfsys_task-handling'
        ));
        
      }
      else
      {
        
        if( !$process->getSynchronized() )
        {
          $orm->update( $process );
          $this->protocol(array(
            'update',
            'wbfsys_task-handling',
            'WbfsysProcess',
            'Sucessfully updated Process wbfsys_task-handling'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_task-handling',
        'WbfsysProcess',
        'Failed to sync Process wbfsys_task-handling '.$e->getMessage()
      ));
    }

    // create the process Node: new
    $processNode = null;

    if( !$processNode = $orm->get( 'WbfsysProcessNode', "access_key='new' and id_process=".$process ) )
    {
      $processNode = new WbfsysProcessNode_Entity();
      $processNode->access_key = 'new';
    }

    $processNode->upgrade( 'label', 'New' );
    $processNode->upgrade( 'id_process', $process->getId() );
    $processNode->upgrade( 'description', 'New' );
    $processNode->upgrade( 'm_order', 1 );
    $processNode->upgrade( 'icon', 'process/new.png' );

    $processNode->revision    = $deployRevision;

    try
    {
      if( $processNode->isNew() )
      {
      
        $orm->insert( $processNode );
        $this->protocol(array(
          'insert',
          'wbfsys_task-handling-node-new',
          'WbfsysProcessNode',
          'Sucessfully created new Process Node new'
        ));
        
      }
      else
      {
        
        if( !$processNode->getSynchronized() )
        {
          $orm->update( $processNode );
          $this->protocol(array(
            'update',
            'wbfsys_task-handling-node-new',
            'WbfsysProcessNode',
            'Sucessfully updated Process Node new'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_task-handling-node-new',
        'WbfsysProcessNode',
        'Failed to sync Process Node new '.$e->getMessage()
      ));
    }

    // create the process Node: rejected
    $processNode = null;

    if( !$processNode = $orm->get( 'WbfsysProcessNode', "access_key='rejected' and id_process=".$process ) )
    {
      $processNode = new WbfsysProcessNode_Entity();
      $processNode->access_key = 'rejected';
    }

    $processNode->upgrade( 'label', 'Rejected' );
    $processNode->upgrade( 'id_process', $process->getId() );
    $processNode->upgrade( 'description', 'Rejected' );
    $processNode->upgrade( 'm_order', 2 );
    $processNode->upgrade( 'icon', 'process/reject.png' );

    $processNode->revision    = $deployRevision;

    try
    {
      if( $processNode->isNew() )
      {
      
        $orm->insert( $processNode );
        $this->protocol(array(
          'insert',
          'wbfsys_task-handling-node-rejected',
          'WbfsysProcessNode',
          'Sucessfully created new Process Node rejected'
        ));
        
      }
      else
      {
        
        if( !$processNode->getSynchronized() )
        {
          $orm->update( $processNode );
          $this->protocol(array(
            'update',
            'wbfsys_task-handling-node-rejected',
            'WbfsysProcessNode',
            'Sucessfully updated Process Node rejected'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_task-handling-node-rejected',
        'WbfsysProcessNode',
        'Failed to sync Process Node rejected '.$e->getMessage()
      ));
    }

    // create the process Node: accepted
    $processNode = null;

    if( !$processNode = $orm->get( 'WbfsysProcessNode', "access_key='accepted' and id_process=".$process ) )
    {
      $processNode = new WbfsysProcessNode_Entity();
      $processNode->access_key = 'accepted';
    }

    $processNode->upgrade( 'label', 'Accepted' );
    $processNode->upgrade( 'id_process', $process->getId() );
    $processNode->upgrade( 'description', 'Accepted' );
    $processNode->upgrade( 'm_order', 3 );
    $processNode->upgrade( 'icon', 'process/ok.png' );

    $processNode->revision    = $deployRevision;

    try
    {
      if( $processNode->isNew() )
      {
      
        $orm->insert( $processNode );
        $this->protocol(array(
          'insert',
          'wbfsys_task-handling-node-accepted',
          'WbfsysProcessNode',
          'Sucessfully created new Process Node accepted'
        ));
        
      }
      else
      {
        
        if( !$processNode->getSynchronized() )
        {
          $orm->update( $processNode );
          $this->protocol(array(
            'update',
            'wbfsys_task-handling-node-accepted',
            'WbfsysProcessNode',
            'Sucessfully updated Process Node accepted'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_task-handling-node-accepted',
        'WbfsysProcessNode',
        'Failed to sync Process Node accepted '.$e->getMessage()
      ));
    }

    // create the process Node: need_more_information
    $processNode = null;

    if( !$processNode = $orm->get( 'WbfsysProcessNode', "access_key='need_more_information' and id_process=".$process ) )
    {
      $processNode = new WbfsysProcessNode_Entity();
      $processNode->access_key = 'need_more_information';
    }

    $processNode->upgrade( 'label', 'Need More Information' );
    $processNode->upgrade( 'id_process', $process->getId() );
    $processNode->upgrade( 'description', 'Need More Information' );
    $processNode->upgrade( 'm_order', 4 );
    $processNode->upgrade( 'icon', 'process/wait.png' );

    $processNode->revision    = $deployRevision;

    try
    {
      if( $processNode->isNew() )
      {
      
        $orm->insert( $processNode );
        $this->protocol(array(
          'insert',
          'wbfsys_task-handling-node-need_more_information',
          'WbfsysProcessNode',
          'Sucessfully created new Process Node need_more_information'
        ));
        
      }
      else
      {
        
        if( !$processNode->getSynchronized() )
        {
          $orm->update( $processNode );
          $this->protocol(array(
            'update',
            'wbfsys_task-handling-node-need_more_information',
            'WbfsysProcessNode',
            'Sucessfully updated Process Node need_more_information'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_task-handling-node-need_more_information',
        'WbfsysProcessNode',
        'Failed to sync Process Node need_more_information '.$e->getMessage()
      ));
    }

    // create the process Node: in_progress
    $processNode = null;

    if( !$processNode = $orm->get( 'WbfsysProcessNode', "access_key='in_progress' and id_process=".$process ) )
    {
      $processNode = new WbfsysProcessNode_Entity();
      $processNode->access_key = 'in_progress';
    }

    $processNode->upgrade( 'label', 'In Progress' );
    $processNode->upgrade( 'id_process', $process->getId() );
    $processNode->upgrade( 'description', 'In Progress' );
    $processNode->upgrade( 'm_order', 5 );
    $processNode->upgrade( 'icon', 'process/running.png' );

    $processNode->revision    = $deployRevision;

    try
    {
      if( $processNode->isNew() )
      {
      
        $orm->insert( $processNode );
        $this->protocol(array(
          'insert',
          'wbfsys_task-handling-node-in_progress',
          'WbfsysProcessNode',
          'Sucessfully created new Process Node in_progress'
        ));
        
      }
      else
      {
        
        if( !$processNode->getSynchronized() )
        {
          $orm->update( $processNode );
          $this->protocol(array(
            'update',
            'wbfsys_task-handling-node-in_progress',
            'WbfsysProcessNode',
            'Sucessfully updated Process Node in_progress'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_task-handling-node-in_progress',
        'WbfsysProcessNode',
        'Failed to sync Process Node in_progress '.$e->getMessage()
      ));
    }

    // create the process Node: completed
    $processNode = null;

    if( !$processNode = $orm->get( 'WbfsysProcessNode', "access_key='completed' and id_process=".$process ) )
    {
      $processNode = new WbfsysProcessNode_Entity();
      $processNode->access_key = 'completed';
    }

    $processNode->upgrade( 'label', 'Finished' );
    $processNode->upgrade( 'id_process', $process->getId() );
    $processNode->upgrade( 'description', 'Finished' );
    $processNode->upgrade( 'm_order', 6 );
    $processNode->upgrade( 'icon', 'process/go_on.png' );

    $processNode->revision    = $deployRevision;

    try
    {
      if( $processNode->isNew() )
      {
      
        $orm->insert( $processNode );
        $this->protocol(array(
          'insert',
          'wbfsys_task-handling-node-completed',
          'WbfsysProcessNode',
          'Sucessfully created new Process Node completed'
        ));
        
      }
      else
      {
        
        if( !$processNode->getSynchronized() )
        {
          $orm->update( $processNode );
          $this->protocol(array(
            'update',
            'wbfsys_task-handling-node-completed',
            'WbfsysProcessNode',
            'Sucessfully updated Process Node completed'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_task-handling-node-completed',
        'WbfsysProcessNode',
        'Failed to sync Process Node completed '.$e->getMessage()
      ));
    }

    // create the process Node: re_opened
    $processNode = null;

    if( !$processNode = $orm->get( 'WbfsysProcessNode', "access_key='re_opened' and id_process=".$process ) )
    {
      $processNode = new WbfsysProcessNode_Entity();
      $processNode->access_key = 're_opened';
    }

    $processNode->upgrade( 'label', 'Re Opened' );
    $processNode->upgrade( 'id_process', $process->getId() );
    $processNode->upgrade( 'description', 'Re Opened' );
    $processNode->upgrade( 'm_order', 7 );
    $processNode->upgrade( 'icon', 'process/go_on.png' );

    $processNode->revision    = $deployRevision;

    try
    {
      if( $processNode->isNew() )
      {
      
        $orm->insert( $processNode );
        $this->protocol(array(
          'insert',
          'wbfsys_task-handling-node-re_opened',
          'WbfsysProcessNode',
          'Sucessfully created new Process Node re_opened'
        ));
        
      }
      else
      {
        
        if( !$processNode->getSynchronized() )
        {
          $orm->update( $processNode );
          $this->protocol(array(
            'update',
            'wbfsys_task-handling-node-re_opened',
            'WbfsysProcessNode',
            'Sucessfully updated Process Node re_opened'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_task-handling-node-re_opened',
        'WbfsysProcessNode',
        'Failed to sync Process Node re_opened '.$e->getMessage()
      ));
    }

    // create the process Node: closed
    $processNode = null;

    if( !$processNode = $orm->get( 'WbfsysProcessNode', "access_key='closed' and id_process=".$process ) )
    {
      $processNode = new WbfsysProcessNode_Entity();
      $processNode->access_key = 'closed';
    }

    $processNode->upgrade( 'label', 'Closed' );
    $processNode->upgrade( 'id_process', $process->getId() );
    $processNode->upgrade( 'description', 'Closed and Deployed' );
    $processNode->upgrade( 'm_order', 8 );
    $processNode->upgrade( 'icon', 'process/closed.png' );

    $processNode->revision    = $deployRevision;

    try
    {
      if( $processNode->isNew() )
      {
      
        $orm->insert( $processNode );
        $this->protocol(array(
          'insert',
          'wbfsys_task-handling-node-closed',
          'WbfsysProcessNode',
          'Sucessfully created new Process Node closed'
        ));
        
      }
      else
      {
        
        if( !$processNode->getSynchronized() )
        {
          $orm->update( $processNode );
          $this->protocol(array(
            'update',
            'wbfsys_task-handling-node-closed',
            'WbfsysProcessNode',
            'Sucessfully updated Process Node closed'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_task-handling-node-closed',
        'WbfsysProcessNode',
        'Failed to sync Process Node closed '.$e->getMessage()
      ));
    }

    // create the process Node: retired
    $processNode = null;

    if( !$processNode = $orm->get( 'WbfsysProcessNode', "access_key='retired' and id_process=".$process ) )
    {
      $processNode = new WbfsysProcessNode_Entity();
      $processNode->access_key = 'retired';
    }

    $processNode->upgrade( 'label', 'Retired' );
    $processNode->upgrade( 'id_process', $process->getId() );
    $processNode->upgrade( 'description', 'Retired' );
    $processNode->upgrade( 'm_order', 9 );
    $processNode->upgrade( 'icon', 'process/retired.png' );

    $processNode->revision    = $deployRevision;

    try
    {
      if( $processNode->isNew() )
      {
      
        $orm->insert( $processNode );
        $this->protocol(array(
          'insert',
          'wbfsys_task-handling-node-retired',
          'WbfsysProcessNode',
          'Sucessfully created new Process Node retired'
        ));
        
      }
      else
      {
        
        if( !$processNode->getSynchronized() )
        {
          $orm->update( $processNode );
          $this->protocol(array(
            'update',
            'wbfsys_task-handling-node-retired',
            'WbfsysProcessNode',
            'Sucessfully updated Process Node retired'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_task-handling-node-retired',
        'WbfsysProcessNode',
        'Failed to sync Process Node retired '.$e->getMessage()
      ));
    }

    // create the process Node: archived
    $processNode = null;

    if( !$processNode = $orm->get( 'WbfsysProcessNode', "access_key='archived' and id_process=".$process ) )
    {
      $processNode = new WbfsysProcessNode_Entity();
      $processNode->access_key = 'archived';
    }

    $processNode->upgrade( 'label', 'Archived' );
    $processNode->upgrade( 'id_process', $process->getId() );
    $processNode->upgrade( 'description', 'Archived' );
    $processNode->upgrade( 'm_order', 10 );
    $processNode->upgrade( 'icon', 'process/archive.png' );

    $processNode->revision    = $deployRevision;

    try
    {
      if( $processNode->isNew() )
      {
      
        $orm->insert( $processNode );
        $this->protocol(array(
          'insert',
          'wbfsys_task-handling-node-archived',
          'WbfsysProcessNode',
          'Sucessfully created new Process Node archived'
        ));
        
      }
      else
      {
        
        if( !$processNode->getSynchronized() )
        {
          $orm->update( $processNode );
          $this->protocol(array(
            'update',
            'wbfsys_task-handling-node-archived',
            'WbfsysProcessNode',
            'Sucessfully updated Process Node archived'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_task-handling-node-archived',
        'WbfsysProcessNode',
        'Failed to sync Process Node archived '.$e->getMessage()
      ));
    }
