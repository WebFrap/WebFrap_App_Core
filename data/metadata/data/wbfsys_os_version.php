<?php 

      if( !$data = $orm->getByKey( 'WbfsysOsVersion', 'windows_3_0' ) )
      {
        $data = new WbfsysOsVersion_Entity();
        $data->access_key  = 'windows_3_0';
      }
    $data->upgrade( 'name', '3.0' );
    $data->upgrade( 'id_os', $orm->getByKey( 'WbfsysOs', 'windows' ) );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'windows_3_0',
          'WbfsysOsVersion',
          'Sucessfully created new WbfsysOsVersion dataset key: windows_3_0'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'windows_3_0',
            'WbfsysOsVersion',
            'Sucessfully updated WbfsysOsVersion dataset key: windows_3_0'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os_version',
        'WbfsysOsVersion',
        'Failed to sync WbfsysOsVersion dataset key: windows_3_0 '.$e->getMessage()
      ));
    }
