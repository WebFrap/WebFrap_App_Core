<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for process: system_user-creation
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $process = null;

    if( !$process = $orm->getByKey( 'WbfsysProcess', 'system_user-creation' ) )
    {
      $process = new WbfsysProcess_Entity();
      $process->access_key = 'system_user-creation';
    }
    
    $process->upgrade( 'name', 'System User' );
    $process->upgrade( 'description', 'System User' );
    $process->upgrade( 'id_entity', $orm->getByKey( 'WbfsysEntity' , 'wbfsys_role_user' ) ); 
    $process->revision    = $deployRevision;
    
    try
    {
      if( $process->isNew() )
      {
      
        $orm->insert( $process );
        $this->protocol(array(
          'insert',
          'system_user-creation',
          'WbfsysProcess',
          'Sucessfully created new Process system_user-creation'
        ));
        
      }
      else
      {
        
        if( !$process->getSynchronized() )
        {
          $orm->update( $process );
          $this->protocol(array(
            'update',
            'system_user-creation',
            'WbfsysProcess',
            'Sucessfully updated Process system_user-creation'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'system_user-creation',
        'WbfsysProcess',
        'Failed to sync Process system_user-creation '.$e->getMessage()
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
          'system_user-creation-node-new',
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
            'system_user-creation-node-new',
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
        'system_user-creation-node-new',
        'WbfsysProcessNode',
        'Failed to sync Process Node new '.$e->getMessage()
      ));
    }
