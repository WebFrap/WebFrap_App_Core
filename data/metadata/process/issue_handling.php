<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for process: issue_handling
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $process = null;

    if( !$process = $orm->getByKey( 'WbfsysProcess', 'issue_handling' ) )
    {
      $process = new WbfsysProcess_Entity();
      $process->access_key = 'issue_handling';
    }
    
    $process->upgrade( 'name', 'Issue Handling' );
    $process->upgrade( 'description', 'Issue Handling' );
    $process->upgrade( 'id_entity', $orm->getByKey( 'WbfsysEntity' , 'wbfsys_issue' ) ); 
    $process->revision    = $deployRevision;
    
    try
    {
      if( $process->isNew() )
      {
      
        $orm->insert( $process );
        $this->protocol(array(
          'insert',
          'issue_handling',
          'WbfsysProcess',
          'Sucessfully created new Process issue_handling'
        ));
        
      }
      else
      {
        
        if( !$process->getSynchronized() )
        {
          $orm->update( $process );
          $this->protocol(array(
            'update',
            'issue_handling',
            'WbfsysProcess',
            'Sucessfully updated Process issue_handling'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'issue_handling',
        'WbfsysProcess',
        'Failed to sync Process issue_handling '.$e->getMessage()
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
          'issue_handling-node-new',
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
            'issue_handling-node-new',
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
        'issue_handling-node-new',
        'WbfsysProcessNode',
        'Failed to sync Process Node new '.$e->getMessage()
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
    $processNode->upgrade( 'm_order', 2 );
    $processNode->upgrade( 'icon', 'process/ok.png' );

    $processNode->revision    = $deployRevision;

    try
    {
      if( $processNode->isNew() )
      {
      
        $orm->insert( $processNode );
        $this->protocol(array(
          'insert',
          'issue_handling-node-accepted',
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
            'issue_handling-node-accepted',
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
        'issue_handling-node-accepted',
        'WbfsysProcessNode',
        'Failed to sync Process Node accepted '.$e->getMessage()
      ));
    }

    // create the process Node: assigned
    $processNode = null;

    if( !$processNode = $orm->get( 'WbfsysProcessNode', "access_key='assigned' and id_process=".$process ) )
    {
      $processNode = new WbfsysProcessNode_Entity();
      $processNode->access_key = 'assigned';
    }

    $processNode->upgrade( 'label', 'Assigned' );
    $processNode->upgrade( 'id_process', $process->getId() );
    $processNode->upgrade( 'description', 'Assigned to one or more Project Staff Members' );
    $processNode->upgrade( 'm_order', 3 );
    $processNode->upgrade( 'icon', 'process/assigned.png' );

    $processNode->revision    = $deployRevision;

    try
    {
      if( $processNode->isNew() )
      {
      
        $orm->insert( $processNode );
        $this->protocol(array(
          'insert',
          'issue_handling-node-assigned',
          'WbfsysProcessNode',
          'Sucessfully created new Process Node assigned'
        ));
        
      }
      else
      {
        
        if( !$processNode->getSynchronized() )
        {
          $orm->update( $processNode );
          $this->protocol(array(
            'update',
            'issue_handling-node-assigned',
            'WbfsysProcessNode',
            'Sucessfully updated Process Node assigned'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'issue_handling-node-assigned',
        'WbfsysProcessNode',
        'Failed to sync Process Node assigned '.$e->getMessage()
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
          'issue_handling-node-need_more_information',
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
            'issue_handling-node-need_more_information',
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
        'issue_handling-node-need_more_information',
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
          'issue_handling-node-in_progress',
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
            'issue_handling-node-in_progress',
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
        'issue_handling-node-in_progress',
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
          'issue_handling-node-completed',
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
            'issue_handling-node-completed',
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
        'issue_handling-node-completed',
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

    $processNode->upgrade( 'label', 'Finished' );
    $processNode->upgrade( 'id_process', $process->getId() );
    $processNode->upgrade( 'description', 'Finished' );
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
          'issue_handling-node-re_opened',
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
            'issue_handling-node-re_opened',
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
        'issue_handling-node-re_opened',
        'WbfsysProcessNode',
        'Failed to sync Process Node re_opened '.$e->getMessage()
      ));
    }

    // create the process Node: tested
    $processNode = null;

    if( !$processNode = $orm->get( 'WbfsysProcessNode', "access_key='tested' and id_process=".$process ) )
    {
      $processNode = new WbfsysProcessNode_Entity();
      $processNode->access_key = 'tested';
    }

    $processNode->upgrade( 'label', 'Tested' );
    $processNode->upgrade( 'id_process', $process->getId() );
    $processNode->upgrade( 'description', 'Tested' );
    $processNode->upgrade( 'm_order', 8 );
    $processNode->upgrade( 'icon', 'process/ok.png' );

    $processNode->revision    = $deployRevision;

    try
    {
      if( $processNode->isNew() )
      {
      
        $orm->insert( $processNode );
        $this->protocol(array(
          'insert',
          'issue_handling-node-tested',
          'WbfsysProcessNode',
          'Sucessfully created new Process Node tested'
        ));
        
      }
      else
      {
        
        if( !$processNode->getSynchronized() )
        {
          $orm->update( $processNode );
          $this->protocol(array(
            'update',
            'issue_handling-node-tested',
            'WbfsysProcessNode',
            'Sucessfully updated Process Node tested'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'issue_handling-node-tested',
        'WbfsysProcessNode',
        'Failed to sync Process Node tested '.$e->getMessage()
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
    $processNode->upgrade( 'm_order', 9 );
    $processNode->upgrade( 'icon', 'process/closed.png' );

    $processNode->revision    = $deployRevision;

    try
    {
      if( $processNode->isNew() )
      {
      
        $orm->insert( $processNode );
        $this->protocol(array(
          'insert',
          'issue_handling-node-closed',
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
            'issue_handling-node-closed',
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
        'issue_handling-node-closed',
        'WbfsysProcessNode',
        'Failed to sync Process Node closed '.$e->getMessage()
      ));
    }

    // create the process Node: no_issue
    $processNode = null;

    if( !$processNode = $orm->get( 'WbfsysProcessNode', "access_key='no_issue' and id_process=".$process ) )
    {
      $processNode = new WbfsysProcessNode_Entity();
      $processNode->access_key = 'no_issue';
    }

    $processNode->upgrade( 'label', 'No Issue' );
    $processNode->upgrade( 'id_process', $process->getId() );
    $processNode->upgrade( 'description', 'No Issue' );
    $processNode->upgrade( 'm_order', 10 );
    $processNode->upgrade( 'icon', 'process/ok.png' );

    $processNode->revision    = $deployRevision;

    try
    {
      if( $processNode->isNew() )
      {
      
        $orm->insert( $processNode );
        $this->protocol(array(
          'insert',
          'issue_handling-node-no_issue',
          'WbfsysProcessNode',
          'Sucessfully created new Process Node no_issue'
        ));
        
      }
      else
      {
        
        if( !$processNode->getSynchronized() )
        {
          $orm->update( $processNode );
          $this->protocol(array(
            'update',
            'issue_handling-node-no_issue',
            'WbfsysProcessNode',
            'Sucessfully updated Process Node no_issue'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'issue_handling-node-no_issue',
        'WbfsysProcessNode',
        'Failed to sync Process Node no_issue '.$e->getMessage()
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
    $processNode->upgrade( 'm_order', 11 );
    $processNode->upgrade( 'icon', 'process/archived.png' );

    $processNode->revision    = $deployRevision;

    try
    {
      if( $processNode->isNew() )
      {
      
        $orm->insert( $processNode );
        $this->protocol(array(
          'insert',
          'issue_handling-node-archived',
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
            'issue_handling-node-archived',
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
        'issue_handling-node-archived',
        'WbfsysProcessNode',
        'Failed to sync Process Node archived '.$e->getMessage()
      ));
    }
