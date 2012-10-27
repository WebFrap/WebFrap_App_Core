<?php 

      if( !$data = $orm->getByKey( 'WbfsysNetProtocol', 'smb' ) )
      {
        $data = new WbfsysNetProtocol_Entity();
        $data->access_key  = 'smb';
      }
    $data->upgrade( 'name', 'Server Message Block' );
    $data->upgrade( 'description', 'Windows Network Share' );
    $data->upgrade( 'flag_encrypted', 'true' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'smb',
          'WbfsysNetProtocol',
          'Sucessfully created new WbfsysNetProtocol dataset key: smb'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'smb',
            'WbfsysNetProtocol',
            'Sucessfully updated WbfsysNetProtocol dataset key: smb'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_net_protocol',
        'WbfsysNetProtocol',
        'Failed to sync WbfsysNetProtocol dataset key: smb '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysNetProtocol', 'http' ) )
      {
        $data = new WbfsysNetProtocol_Entity();
        $data->access_key  = 'http';
      }
    $data->upgrade( 'name', 'Http' );
    $data->upgrade( 'description', 'Http Server' );
    $data->upgrade( 'flag_encrypted', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'http',
          'WbfsysNetProtocol',
          'Sucessfully created new WbfsysNetProtocol dataset key: http'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'http',
            'WbfsysNetProtocol',
            'Sucessfully updated WbfsysNetProtocol dataset key: http'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_net_protocol',
        'WbfsysNetProtocol',
        'Failed to sync WbfsysNetProtocol dataset key: http '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysNetProtocol', 'https' ) )
      {
        $data = new WbfsysNetProtocol_Entity();
        $data->access_key  = 'https';
      }
    $data->upgrade( 'name', 'Https' );
    $data->upgrade( 'description', 'Https' );
    $data->upgrade( 'flag_encrypted', 'true' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'https',
          'WbfsysNetProtocol',
          'Sucessfully created new WbfsysNetProtocol dataset key: https'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'https',
            'WbfsysNetProtocol',
            'Sucessfully updated WbfsysNetProtocol dataset key: https'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_net_protocol',
        'WbfsysNetProtocol',
        'Failed to sync WbfsysNetProtocol dataset key: https '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysNetProtocol', 'ftp' ) )
      {
        $data = new WbfsysNetProtocol_Entity();
        $data->access_key  = 'ftp';
      }
    $data->upgrade( 'name', 'FTP Server' );
    $data->upgrade( 'description', 'FTP Server' );
    $data->upgrade( 'flag_encrypted', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ftp',
          'WbfsysNetProtocol',
          'Sucessfully created new WbfsysNetProtocol dataset key: ftp'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ftp',
            'WbfsysNetProtocol',
            'Sucessfully updated WbfsysNetProtocol dataset key: ftp'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_net_protocol',
        'WbfsysNetProtocol',
        'Failed to sync WbfsysNetProtocol dataset key: ftp '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysNetProtocol', 'ftps' ) )
      {
        $data = new WbfsysNetProtocol_Entity();
        $data->access_key  = 'ftps';
      }
    $data->upgrade( 'name', 'FTPS' );
    $data->upgrade( 'description', 'Secure FTP Server' );
    $data->upgrade( 'flag_encrypted', 'true' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ftps',
          'WbfsysNetProtocol',
          'Sucessfully created new WbfsysNetProtocol dataset key: ftps'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ftps',
            'WbfsysNetProtocol',
            'Sucessfully updated WbfsysNetProtocol dataset key: ftps'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_net_protocol',
        'WbfsysNetProtocol',
        'Failed to sync WbfsysNetProtocol dataset key: ftps '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysNetProtocol', 'webdav' ) )
      {
        $data = new WbfsysNetProtocol_Entity();
        $data->access_key  = 'webdav';
      }
    $data->upgrade( 'name', 'Webdav' );
    $data->upgrade( 'description', 'Webdav' );
    $data->upgrade( 'flag_encrypted', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'webdav',
          'WbfsysNetProtocol',
          'Sucessfully created new WbfsysNetProtocol dataset key: webdav'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'webdav',
            'WbfsysNetProtocol',
            'Sucessfully updated WbfsysNetProtocol dataset key: webdav'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_net_protocol',
        'WbfsysNetProtocol',
        'Failed to sync WbfsysNetProtocol dataset key: webdav '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysNetProtocol', 'webdavs' ) )
      {
        $data = new WbfsysNetProtocol_Entity();
        $data->access_key  = 'webdavs';
      }
    $data->upgrade( 'name', 'Webdavs' );
    $data->upgrade( 'description', 'Webdavs' );
    $data->upgrade( 'flag_encrypted', 'true' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'webdavs',
          'WbfsysNetProtocol',
          'Sucessfully created new WbfsysNetProtocol dataset key: webdavs'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'webdavs',
            'WbfsysNetProtocol',
            'Sucessfully updated WbfsysNetProtocol dataset key: webdavs'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_net_protocol',
        'WbfsysNetProtocol',
        'Failed to sync WbfsysNetProtocol dataset key: webdavs '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysNetProtocol', 'ssh' ) )
      {
        $data = new WbfsysNetProtocol_Entity();
        $data->access_key  = 'ssh';
      }
    $data->upgrade( 'name', 'SSH' );
    $data->upgrade( 'description', 'Secure Shell' );
    $data->upgrade( 'flag_encrypted', 'true' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ssh',
          'WbfsysNetProtocol',
          'Sucessfully created new WbfsysNetProtocol dataset key: ssh'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ssh',
            'WbfsysNetProtocol',
            'Sucessfully updated WbfsysNetProtocol dataset key: ssh'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_net_protocol',
        'WbfsysNetProtocol',
        'Failed to sync WbfsysNetProtocol dataset key: ssh '.$e->getMessage()
      ));
    }
