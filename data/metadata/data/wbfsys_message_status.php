<?php 

      if( !$data = $orm->getByKey( 'WbfsysMessageStatus', 'new' ) )
      {
        $data = new WbfsysMessageStatus_Entity();
        $data->access_key  = 'new';
      }
    $data->upgrade( 'name', 'New' );
    $data->upgrade( 'm_order', '1' );
    $data->upgrade( 'description', 'New Message' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'new',
          'WbfsysMessageStatus',
          'Sucessfully created new WbfsysMessageStatus dataset key: new'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'new',
            'WbfsysMessageStatus',
            'Sucessfully updated WbfsysMessageStatus dataset key: new'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_message_status',
        'WbfsysMessageStatus',
        'Failed to sync WbfsysMessageStatus dataset key: new '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysMessageStatus', 'opened' ) )
      {
        $data = new WbfsysMessageStatus_Entity();
        $data->access_key  = 'opened';
      }
    $data->upgrade( 'name', 'Opened' );
    $data->upgrade( 'm_order', '2' );
    $data->upgrade( 'description', 'Message was Opened' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'opened',
          'WbfsysMessageStatus',
          'Sucessfully created new WbfsysMessageStatus dataset key: opened'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'opened',
            'WbfsysMessageStatus',
            'Sucessfully updated WbfsysMessageStatus dataset key: opened'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_message_status',
        'WbfsysMessageStatus',
        'Failed to sync WbfsysMessageStatus dataset key: opened '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysMessageStatus', 'archived' ) )
      {
        $data = new WbfsysMessageStatus_Entity();
        $data->access_key  = 'archived';
      }
    $data->upgrade( 'name', 'Archived' );
    $data->upgrade( 'm_order', '3' );
    $data->upgrade( 'description', 'Archived' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'archived',
          'WbfsysMessageStatus',
          'Sucessfully created new WbfsysMessageStatus dataset key: archived'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'archived',
            'WbfsysMessageStatus',
            'Sucessfully updated WbfsysMessageStatus dataset key: archived'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_message_status',
        'WbfsysMessageStatus',
        'Failed to sync WbfsysMessageStatus dataset key: archived '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysMessageStatus', 'sent' ) )
      {
        $data = new WbfsysMessageStatus_Entity();
        $data->access_key  = 'sent';
      }
    $data->upgrade( 'name', 'Sent' );
    $data->upgrade( 'm_order', '4' );
    $data->upgrade( 'description', 'Message was sent' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'sent',
          'WbfsysMessageStatus',
          'Sucessfully created new WbfsysMessageStatus dataset key: sent'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'sent',
            'WbfsysMessageStatus',
            'Sucessfully updated WbfsysMessageStatus dataset key: sent'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_message_status',
        'WbfsysMessageStatus',
        'Failed to sync WbfsysMessageStatus dataset key: sent '.$e->getMessage()
      ));
    }
