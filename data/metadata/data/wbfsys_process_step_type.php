<?php 

      if( !$data = $orm->getByKey( 'WbfsysProcessStepType', 'forward' ) )
      {
        $data = new WbfsysProcessStepType_Entity();
        $data->access_key  = 'forward';
      }
    $data->upgrade( 'name', 'Forward' );
    $data->upgrade( 'description', 'This step was in forward direction' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'forward',
          'WbfsysProcessStepType',
          'Sucessfully created new WbfsysProcessStepType dataset key: forward'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'forward',
            'WbfsysProcessStepType',
            'Sucessfully updated WbfsysProcessStepType dataset key: forward'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_process_step_type',
        'WbfsysProcessStepType',
        'Failed to sync WbfsysProcessStepType dataset key: forward '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysProcessStepType', 'back' ) )
      {
        $data = new WbfsysProcessStepType_Entity();
        $data->access_key  = 'back';
      }
    $data->upgrade( 'name', 'Back' );
    $data->upgrade( 'description', 'This step was backyards.' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'back',
          'WbfsysProcessStepType',
          'Sucessfully created new WbfsysProcessStepType dataset key: back'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'back',
            'WbfsysProcessStepType',
            'Sucessfully updated WbfsysProcessStepType dataset key: back'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_process_step_type',
        'WbfsysProcessStepType',
        'Failed to sync WbfsysProcessStepType dataset key: back '.$e->getMessage()
      ));
    }
