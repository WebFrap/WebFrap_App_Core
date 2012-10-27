<?php 

      if( !$data = $orm->getByKey( 'WbfsysPriority', 'low' ) )
      {
        $data = new WbfsysPriority_Entity();
        $data->access_key  = 'low';
      }
    $data->upgrade( 'name', 'Low' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'low',
          'WbfsysPriority',
          'Sucessfully created new WbfsysPriority dataset key: low'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'low',
            'WbfsysPriority',
            'Sucessfully updated WbfsysPriority dataset key: low'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_priority',
        'WbfsysPriority',
        'Failed to sync WbfsysPriority dataset key: low '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysPriority', 'medium' ) )
      {
        $data = new WbfsysPriority_Entity();
        $data->access_key  = 'medium';
      }
    $data->upgrade( 'name', 'Normal' );
    $data->upgrade( 'description', 'Normal Priority' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'medium',
          'WbfsysPriority',
          'Sucessfully created new WbfsysPriority dataset key: medium'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'medium',
            'WbfsysPriority',
            'Sucessfully updated WbfsysPriority dataset key: medium'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_priority',
        'WbfsysPriority',
        'Failed to sync WbfsysPriority dataset key: medium '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysPriority', 'high' ) )
      {
        $data = new WbfsysPriority_Entity();
        $data->access_key  = 'high';
      }
    $data->upgrade( 'name', 'High' );
    $data->upgrade( 'description', '' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'high',
          'WbfsysPriority',
          'Sucessfully created new WbfsysPriority dataset key: high'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'high',
            'WbfsysPriority',
            'Sucessfully updated WbfsysPriority dataset key: high'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_priority',
        'WbfsysPriority',
        'Failed to sync WbfsysPriority dataset key: high '.$e->getMessage()
      ));
    }
