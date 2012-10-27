<?php 

      if( !$data = $orm->getByKey( 'WbfsysOs', 'windows' ) )
      {
        $data = new WbfsysOs_Entity();
        $data->access_key  = 'windows';
      }
    $data->upgrade( 'name', 'Windows' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'windows',
          'WbfsysOs',
          'Sucessfully created new WbfsysOs dataset key: windows'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'windows',
            'WbfsysOs',
            'Sucessfully updated WbfsysOs dataset key: windows'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os',
        'WbfsysOs',
        'Failed to sync WbfsysOs dataset key: windows '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysOs', 'windows_2000' ) )
      {
        $data = new WbfsysOs_Entity();
        $data->access_key  = 'windows_2000';
      }
    $data->upgrade( 'name', 'Windows 2000' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'windows_2000',
          'WbfsysOs',
          'Sucessfully created new WbfsysOs dataset key: windows_2000'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'windows_2000',
            'WbfsysOs',
            'Sucessfully updated WbfsysOs dataset key: windows_2000'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os',
        'WbfsysOs',
        'Failed to sync WbfsysOs dataset key: windows_2000 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysOs', 'windows_xp' ) )
      {
        $data = new WbfsysOs_Entity();
        $data->access_key  = 'windows_xp';
      }
    $data->upgrade( 'name', 'Windows XP' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'windows_xp',
          'WbfsysOs',
          'Sucessfully created new WbfsysOs dataset key: windows_xp'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'windows_xp',
            'WbfsysOs',
            'Sucessfully updated WbfsysOs dataset key: windows_xp'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os',
        'WbfsysOs',
        'Failed to sync WbfsysOs dataset key: windows_xp '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysOs', 'windows_vista' ) )
      {
        $data = new WbfsysOs_Entity();
        $data->access_key  = 'windows_vista';
      }
    $data->upgrade( 'name', 'Windows Vista' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'windows_vista',
          'WbfsysOs',
          'Sucessfully created new WbfsysOs dataset key: windows_vista'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'windows_vista',
            'WbfsysOs',
            'Sucessfully updated WbfsysOs dataset key: windows_vista'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os',
        'WbfsysOs',
        'Failed to sync WbfsysOs dataset key: windows_vista '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysOs', 'windows_7' ) )
      {
        $data = new WbfsysOs_Entity();
        $data->access_key  = 'windows_7';
      }
    $data->upgrade( 'name', 'Windows 7' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'windows_7',
          'WbfsysOs',
          'Sucessfully created new WbfsysOs dataset key: windows_7'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'windows_7',
            'WbfsysOs',
            'Sucessfully updated WbfsysOs dataset key: windows_7'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os',
        'WbfsysOs',
        'Failed to sync WbfsysOs dataset key: windows_7 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysOs', 'mac_os_x' ) )
      {
        $data = new WbfsysOs_Entity();
        $data->access_key  = 'mac_os_x';
      }
    $data->upgrade( 'name', 'Mac OS X' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mac_os_x',
          'WbfsysOs',
          'Sucessfully created new WbfsysOs dataset key: mac_os_x'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mac_os_x',
            'WbfsysOs',
            'Sucessfully updated WbfsysOs dataset key: mac_os_x'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os',
        'WbfsysOs',
        'Failed to sync WbfsysOs dataset key: mac_os_x '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysOs', 'mac_os_x_10_0' ) )
      {
        $data = new WbfsysOs_Entity();
        $data->access_key  = 'mac_os_x_10_0';
      }
    $data->upgrade( 'name', 'Mac OS X 10.0 (Cheetah)' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mac_os_x_10_0',
          'WbfsysOs',
          'Sucessfully created new WbfsysOs dataset key: mac_os_x_10_0'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mac_os_x_10_0',
            'WbfsysOs',
            'Sucessfully updated WbfsysOs dataset key: mac_os_x_10_0'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os',
        'WbfsysOs',
        'Failed to sync WbfsysOs dataset key: mac_os_x_10_0 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysOs', 'mac_os_x_10_1' ) )
      {
        $data = new WbfsysOs_Entity();
        $data->access_key  = 'mac_os_x_10_1';
      }
    $data->upgrade( 'name', 'Mac OS X 10.1 (Puma)' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mac_os_x_10_1',
          'WbfsysOs',
          'Sucessfully created new WbfsysOs dataset key: mac_os_x_10_1'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mac_os_x_10_1',
            'WbfsysOs',
            'Sucessfully updated WbfsysOs dataset key: mac_os_x_10_1'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os',
        'WbfsysOs',
        'Failed to sync WbfsysOs dataset key: mac_os_x_10_1 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysOs', 'mac_os_x_10_2' ) )
      {
        $data = new WbfsysOs_Entity();
        $data->access_key  = 'mac_os_x_10_2';
      }
    $data->upgrade( 'name', 'Mac OS X 10.2 (Jaguar)' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mac_os_x_10_2',
          'WbfsysOs',
          'Sucessfully created new WbfsysOs dataset key: mac_os_x_10_2'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mac_os_x_10_2',
            'WbfsysOs',
            'Sucessfully updated WbfsysOs dataset key: mac_os_x_10_2'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os',
        'WbfsysOs',
        'Failed to sync WbfsysOs dataset key: mac_os_x_10_2 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysOs', 'mac_os_x_10_3' ) )
      {
        $data = new WbfsysOs_Entity();
        $data->access_key  = 'mac_os_x_10_3';
      }
    $data->upgrade( 'name', 'Mac OS X 10.3 (Panther)' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mac_os_x_10_3',
          'WbfsysOs',
          'Sucessfully created new WbfsysOs dataset key: mac_os_x_10_3'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mac_os_x_10_3',
            'WbfsysOs',
            'Sucessfully updated WbfsysOs dataset key: mac_os_x_10_3'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os',
        'WbfsysOs',
        'Failed to sync WbfsysOs dataset key: mac_os_x_10_3 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysOs', 'mac_os_x_10_4' ) )
      {
        $data = new WbfsysOs_Entity();
        $data->access_key  = 'mac_os_x_10_4';
      }
    $data->upgrade( 'name', 'Mac OS X 10.4 (Tiger)' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mac_os_x_10_4',
          'WbfsysOs',
          'Sucessfully created new WbfsysOs dataset key: mac_os_x_10_4'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mac_os_x_10_4',
            'WbfsysOs',
            'Sucessfully updated WbfsysOs dataset key: mac_os_x_10_4'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os',
        'WbfsysOs',
        'Failed to sync WbfsysOs dataset key: mac_os_x_10_4 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysOs', 'mac_os_x_10_5' ) )
      {
        $data = new WbfsysOs_Entity();
        $data->access_key  = 'mac_os_x_10_5';
      }
    $data->upgrade( 'name', 'Mac OS X 10.5 (Leopard)' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mac_os_x_10_5',
          'WbfsysOs',
          'Sucessfully created new WbfsysOs dataset key: mac_os_x_10_5'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mac_os_x_10_5',
            'WbfsysOs',
            'Sucessfully updated WbfsysOs dataset key: mac_os_x_10_5'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os',
        'WbfsysOs',
        'Failed to sync WbfsysOs dataset key: mac_os_x_10_5 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysOs', 'mac_os_x_10_6' ) )
      {
        $data = new WbfsysOs_Entity();
        $data->access_key  = 'mac_os_x_10_6';
      }
    $data->upgrade( 'name', 'Mac OS X 10.6 (Snow Leopard)' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mac_os_x_10_6',
          'WbfsysOs',
          'Sucessfully created new WbfsysOs dataset key: mac_os_x_10_6'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mac_os_x_10_6',
            'WbfsysOs',
            'Sucessfully updated WbfsysOs dataset key: mac_os_x_10_6'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os',
        'WbfsysOs',
        'Failed to sync WbfsysOs dataset key: mac_os_x_10_6 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysOs', 'mac_os_x_10_7' ) )
      {
        $data = new WbfsysOs_Entity();
        $data->access_key  = 'mac_os_x_10_7';
      }
    $data->upgrade( 'name', 'Mac OS X 10.7 (Lion)' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mac_os_x_10_7',
          'WbfsysOs',
          'Sucessfully created new WbfsysOs dataset key: mac_os_x_10_7'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mac_os_x_10_7',
            'WbfsysOs',
            'Sucessfully updated WbfsysOs dataset key: mac_os_x_10_7'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os',
        'WbfsysOs',
        'Failed to sync WbfsysOs dataset key: mac_os_x_10_7 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysOs', 'mac_ios' ) )
      {
        $data = new WbfsysOs_Entity();
        $data->access_key  = 'mac_ios';
      }
    $data->upgrade( 'name', 'iOS' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mac_ios',
          'WbfsysOs',
          'Sucessfully created new WbfsysOs dataset key: mac_ios'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mac_ios',
            'WbfsysOs',
            'Sucessfully updated WbfsysOs dataset key: mac_ios'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os',
        'WbfsysOs',
        'Failed to sync WbfsysOs dataset key: mac_ios '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysOs', 'linux' ) )
      {
        $data = new WbfsysOs_Entity();
        $data->access_key  = 'linux';
      }
    $data->upgrade( 'name', 'Linux' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'linux',
          'WbfsysOs',
          'Sucessfully created new WbfsysOs dataset key: linux'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'linux',
            'WbfsysOs',
            'Sucessfully updated WbfsysOs dataset key: linux'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os',
        'WbfsysOs',
        'Failed to sync WbfsysOs dataset key: linux '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysOs', 'android' ) )
      {
        $data = new WbfsysOs_Entity();
        $data->access_key  = 'android';
      }
    $data->upgrade( 'name', 'Android' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'android',
          'WbfsysOs',
          'Sucessfully created new WbfsysOs dataset key: android'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'android',
            'WbfsysOs',
            'Sucessfully updated WbfsysOs dataset key: android'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os',
        'WbfsysOs',
        'Failed to sync WbfsysOs dataset key: android '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysOs', 'bsd' ) )
      {
        $data = new WbfsysOs_Entity();
        $data->access_key  = 'bsd';
      }
    $data->upgrade( 'name', 'Bsd' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bsd',
          'WbfsysOs',
          'Sucessfully created new WbfsysOs dataset key: bsd'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bsd',
            'WbfsysOs',
            'Sucessfully updated WbfsysOs dataset key: bsd'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_os',
        'WbfsysOs',
        'Failed to sync WbfsysOs dataset key: bsd '.$e->getMessage()
      ));
    }
