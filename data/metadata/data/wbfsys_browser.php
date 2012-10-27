<?php 

      if( !$data = $orm->getByKey( 'WbfsysBrowser', 'ie' ) )
      {
        $data = new WbfsysBrowser_Entity();
        $data->access_key  = 'ie';
      }
    $data->upgrade( 'name', 'Internet Explorer' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ie',
          'WbfsysBrowser',
          'Sucessfully created new WbfsysBrowser dataset key: ie'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ie',
            'WbfsysBrowser',
            'Sucessfully updated WbfsysBrowser dataset key: ie'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser',
        'WbfsysBrowser',
        'Failed to sync WbfsysBrowser dataset key: ie '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowser', 'firefox' ) )
      {
        $data = new WbfsysBrowser_Entity();
        $data->access_key  = 'firefox';
      }
    $data->upgrade( 'name', 'Firefox' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'firefox',
          'WbfsysBrowser',
          'Sucessfully created new WbfsysBrowser dataset key: firefox'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'firefox',
            'WbfsysBrowser',
            'Sucessfully updated WbfsysBrowser dataset key: firefox'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser',
        'WbfsysBrowser',
        'Failed to sync WbfsysBrowser dataset key: firefox '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowser', 'opera' ) )
      {
        $data = new WbfsysBrowser_Entity();
        $data->access_key  = 'opera';
      }
    $data->upgrade( 'name', 'Opera' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'opera',
          'WbfsysBrowser',
          'Sucessfully created new WbfsysBrowser dataset key: opera'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'opera',
            'WbfsysBrowser',
            'Sucessfully updated WbfsysBrowser dataset key: opera'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser',
        'WbfsysBrowser',
        'Failed to sync WbfsysBrowser dataset key: opera '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowser', 'chrome' ) )
      {
        $data = new WbfsysBrowser_Entity();
        $data->access_key  = 'chrome';
      }
    $data->upgrade( 'name', 'Google Chrome' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'chrome',
          'WbfsysBrowser',
          'Sucessfully created new WbfsysBrowser dataset key: chrome'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'chrome',
            'WbfsysBrowser',
            'Sucessfully updated WbfsysBrowser dataset key: chrome'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser',
        'WbfsysBrowser',
        'Failed to sync WbfsysBrowser dataset key: chrome '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowser', 'chromium' ) )
      {
        $data = new WbfsysBrowser_Entity();
        $data->access_key  = 'chromium';
      }
    $data->upgrade( 'name', 'Chromium' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'chromium',
          'WbfsysBrowser',
          'Sucessfully created new WbfsysBrowser dataset key: chromium'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'chromium',
            'WbfsysBrowser',
            'Sucessfully updated WbfsysBrowser dataset key: chromium'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser',
        'WbfsysBrowser',
        'Failed to sync WbfsysBrowser dataset key: chromium '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowser', 'safari' ) )
      {
        $data = new WbfsysBrowser_Entity();
        $data->access_key  = 'safari';
      }
    $data->upgrade( 'name', 'Apple Safari' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'safari',
          'WbfsysBrowser',
          'Sucessfully created new WbfsysBrowser dataset key: safari'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'safari',
            'WbfsysBrowser',
            'Sucessfully updated WbfsysBrowser dataset key: safari'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser',
        'WbfsysBrowser',
        'Failed to sync WbfsysBrowser dataset key: safari '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowser', 'konqueror' ) )
      {
        $data = new WbfsysBrowser_Entity();
        $data->access_key  = 'konqueror';
      }
    $data->upgrade( 'name', 'Konqueror' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'konqueror',
          'WbfsysBrowser',
          'Sucessfully created new WbfsysBrowser dataset key: konqueror'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'konqueror',
            'WbfsysBrowser',
            'Sucessfully updated WbfsysBrowser dataset key: konqueror'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser',
        'WbfsysBrowser',
        'Failed to sync WbfsysBrowser dataset key: konqueror '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowser', 'unkown' ) )
      {
        $data = new WbfsysBrowser_Entity();
        $data->access_key  = 'unkown';
      }
    $data->upgrade( 'name', 'Unkown' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'unkown',
          'WbfsysBrowser',
          'Sucessfully created new WbfsysBrowser dataset key: unkown'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'unkown',
            'WbfsysBrowser',
            'Sucessfully updated WbfsysBrowser dataset key: unkown'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser',
        'WbfsysBrowser',
        'Failed to sync WbfsysBrowser dataset key: unkown '.$e->getMessage()
      ));
    }
