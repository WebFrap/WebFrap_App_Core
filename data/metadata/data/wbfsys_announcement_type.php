<?php 

      if( !$data = $orm->getByKey( 'WbfsysAnnouncementType', 'announcement' ) )
      {
        $data = new WbfsysAnnouncementType_Entity();
        $data->access_key  = 'announcement';
      }
    $data->upgrade( 'name', 'Announcement' );
    $data->upgrade( 'description', 'An Announcement' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'announcement',
          'WbfsysAnnouncementType',
          'Sucessfully created new WbfsysAnnouncementType dataset key: announcement'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'announcement',
            'WbfsysAnnouncementType',
            'Sucessfully updated WbfsysAnnouncementType dataset key: announcement'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_announcement_type',
        'WbfsysAnnouncementType',
        'Failed to sync WbfsysAnnouncementType dataset key: announcement '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysAnnouncementType', 'wall_message' ) )
      {
        $data = new WbfsysAnnouncementType_Entity();
        $data->access_key  = 'wall_message';
      }
    $data->upgrade( 'name', 'Wallmessage' );
    $data->upgrade( 'description', 'A Wallmessage' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'wall_message',
          'WbfsysAnnouncementType',
          'Sucessfully created new WbfsysAnnouncementType dataset key: wall_message'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'wall_message',
            'WbfsysAnnouncementType',
            'Sucessfully updated WbfsysAnnouncementType dataset key: wall_message'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_announcement_type',
        'WbfsysAnnouncementType',
        'Failed to sync WbfsysAnnouncementType dataset key: wall_message '.$e->getMessage()
      ));
    }
