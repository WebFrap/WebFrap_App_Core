<?php 

      if( !$data = $orm->getByKey( 'WbfsysUserAnnouncementStatus', 'new' ) )
      {
        $data = new WbfsysUserAnnouncementStatus_Entity();
        $data->access_key  = 'new';
      }
    $data->upgrade( 'name', 'New' );
    $data->upgrade( 'description', 'New Announcement' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'new',
          'WbfsysUserAnnouncementStatus',
          'Sucessfully created new WbfsysUserAnnouncementStatus dataset key: new'
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
            'WbfsysUserAnnouncementStatus',
            'Sucessfully updated WbfsysUserAnnouncementStatus dataset key: new'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_user_announcement_status',
        'WbfsysUserAnnouncementStatus',
        'Failed to sync WbfsysUserAnnouncementStatus dataset key: new '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysUserAnnouncementStatus', 'open' ) )
      {
        $data = new WbfsysUserAnnouncementStatus_Entity();
        $data->access_key  = 'open';
      }
    $data->upgrade( 'name', 'Open' );
    $data->upgrade( 'description', 'Announcement was readed' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'open',
          'WbfsysUserAnnouncementStatus',
          'Sucessfully created new WbfsysUserAnnouncementStatus dataset key: open'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'open',
            'WbfsysUserAnnouncementStatus',
            'Sucessfully updated WbfsysUserAnnouncementStatus dataset key: open'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_user_announcement_status',
        'WbfsysUserAnnouncementStatus',
        'Failed to sync WbfsysUserAnnouncementStatus dataset key: open '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysUserAnnouncementStatus', 'hide' ) )
      {
        $data = new WbfsysUserAnnouncementStatus_Entity();
        $data->access_key  = 'hide';
      }
    $data->upgrade( 'name', 'Hide' );
    $data->upgrade( 'description', 'Hide the Announcement' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'hide',
          'WbfsysUserAnnouncementStatus',
          'Sucessfully created new WbfsysUserAnnouncementStatus dataset key: hide'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'hide',
            'WbfsysUserAnnouncementStatus',
            'Sucessfully updated WbfsysUserAnnouncementStatus dataset key: hide'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_user_announcement_status',
        'WbfsysUserAnnouncementStatus',
        'Failed to sync WbfsysUserAnnouncementStatus dataset key: hide '.$e->getMessage()
      ));
    }
