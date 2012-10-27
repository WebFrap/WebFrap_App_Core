<?php 

      if( !$data = $orm->getByKey( 'WbfsysFileStorageType', 'win_share' ) )
      {
        $data = new WbfsysFileStorageType_Entity();
        $data->access_key  = 'win_share';
      }
    $data->upgrade( 'name', 'Windows Share' );
    $data->upgrade( 'description', 'Windows Share' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'win_share',
          'WbfsysFileStorageType',
          'Sucessfully created new WbfsysFileStorageType dataset key: win_share'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'win_share',
            'WbfsysFileStorageType',
            'Sucessfully updated WbfsysFileStorageType dataset key: win_share'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_file_storage_type',
        'WbfsysFileStorageType',
        'Failed to sync WbfsysFileStorageType dataset key: win_share '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysFileStorageType', 'http' ) )
      {
        $data = new WbfsysFileStorageType_Entity();
        $data->access_key  = 'http';
      }
    $data->upgrade( 'name', 'Http Server' );
    $data->upgrade( 'description', 'Http Server' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'http',
          'WbfsysFileStorageType',
          'Sucessfully created new WbfsysFileStorageType dataset key: http'
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
            'WbfsysFileStorageType',
            'Sucessfully updated WbfsysFileStorageType dataset key: http'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_file_storage_type',
        'WbfsysFileStorageType',
        'Failed to sync WbfsysFileStorageType dataset key: http '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysFileStorageType', 'ftp' ) )
      {
        $data = new WbfsysFileStorageType_Entity();
        $data->access_key  = 'ftp';
      }
    $data->upgrade( 'name', 'FTP Server' );
    $data->upgrade( 'description', 'FTP Server' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ftp',
          'WbfsysFileStorageType',
          'Sucessfully created new WbfsysFileStorageType dataset key: ftp'
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
            'WbfsysFileStorageType',
            'Sucessfully updated WbfsysFileStorageType dataset key: ftp'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_file_storage_type',
        'WbfsysFileStorageType',
        'Failed to sync WbfsysFileStorageType dataset key: ftp '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysFileStorageType', 'webdav' ) )
      {
        $data = new WbfsysFileStorageType_Entity();
        $data->access_key  = 'webdav';
      }
    $data->upgrade( 'name', 'Webdav' );
    $data->upgrade( 'description', 'Webdav' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'webdav',
          'WbfsysFileStorageType',
          'Sucessfully created new WbfsysFileStorageType dataset key: webdav'
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
            'WbfsysFileStorageType',
            'Sucessfully updated WbfsysFileStorageType dataset key: webdav'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_file_storage_type',
        'WbfsysFileStorageType',
        'Failed to sync WbfsysFileStorageType dataset key: webdav '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysFileStorageType', 'mercurial' ) )
      {
        $data = new WbfsysFileStorageType_Entity();
        $data->access_key  = 'mercurial';
      }
    $data->upgrade( 'name', 'Mercurial' );
    $data->upgrade( 'description', 'Mercurial' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mercurial',
          'WbfsysFileStorageType',
          'Sucessfully created new WbfsysFileStorageType dataset key: mercurial'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mercurial',
            'WbfsysFileStorageType',
            'Sucessfully updated WbfsysFileStorageType dataset key: mercurial'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_file_storage_type',
        'WbfsysFileStorageType',
        'Failed to sync WbfsysFileStorageType dataset key: mercurial '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysFileStorageType', 'git' ) )
      {
        $data = new WbfsysFileStorageType_Entity();
        $data->access_key  = 'git';
      }
    $data->upgrade( 'name', 'Git' );
    $data->upgrade( 'description', 'Git Repository' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'git',
          'WbfsysFileStorageType',
          'Sucessfully created new WbfsysFileStorageType dataset key: git'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'git',
            'WbfsysFileStorageType',
            'Sucessfully updated WbfsysFileStorageType dataset key: git'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_file_storage_type',
        'WbfsysFileStorageType',
        'Failed to sync WbfsysFileStorageType dataset key: git '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysFileStorageType', 'svn' ) )
      {
        $data = new WbfsysFileStorageType_Entity();
        $data->access_key  = 'svn';
      }
    $data->upgrade( 'name', 'Subversion' );
    $data->upgrade( 'description', 'Subversion Repository' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'svn',
          'WbfsysFileStorageType',
          'Sucessfully created new WbfsysFileStorageType dataset key: svn'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'svn',
            'WbfsysFileStorageType',
            'Sucessfully updated WbfsysFileStorageType dataset key: svn'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_file_storage_type',
        'WbfsysFileStorageType',
        'Failed to sync WbfsysFileStorageType dataset key: svn '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysFileStorageType', 'other_rcs' ) )
      {
        $data = new WbfsysFileStorageType_Entity();
        $data->access_key  = 'other_rcs';
      }
    $data->upgrade( 'name', 'Other RCS' );
    $data->upgrade( 'description', 'Other RCS' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'other_rcs',
          'WbfsysFileStorageType',
          'Sucessfully created new WbfsysFileStorageType dataset key: other_rcs'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'other_rcs',
            'WbfsysFileStorageType',
            'Sucessfully updated WbfsysFileStorageType dataset key: other_rcs'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_file_storage_type',
        'WbfsysFileStorageType',
        'Failed to sync WbfsysFileStorageType dataset key: other_rcs '.$e->getMessage()
      ));
    }
