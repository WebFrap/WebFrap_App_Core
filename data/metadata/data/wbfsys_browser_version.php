<?php 

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'ie_1' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'ie_1';
      }
    $data->upgrade( 'name', '1.0' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'ie' ) );
    $data->upgrade( 'supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ie_1',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: ie_1'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ie_1',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: ie_1'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: ie_1 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'ie_1_5' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'ie_1_5';
      }
    $data->upgrade( 'name', '1.5' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'ie' ) );
    $data->upgrade( 'supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ie_1_5',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: ie_1_5'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ie_1_5',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: ie_1_5'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: ie_1_5 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'ie_2' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'ie_2';
      }
    $data->upgrade( 'name', '2.0' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'ie' ) );
    $data->upgrade( 'supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ie_2',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: ie_2'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ie_2',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: ie_2'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: ie_2 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'ie_3' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'ie_3';
      }
    $data->upgrade( 'name', '3.0' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'ie' ) );
    $data->upgrade( 'supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ie_3',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: ie_3'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ie_3',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: ie_3'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: ie_3 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'ie_4' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'ie_4';
      }
    $data->upgrade( 'name', '4' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'ie' ) );
    $data->upgrade( 'supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ie_4',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: ie_4'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ie_4',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: ie_4'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: ie_4 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'ie_5' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'ie_5';
      }
    $data->upgrade( 'name', '5' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'ie' ) );
    $data->upgrade( 'supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ie_5',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: ie_5'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ie_5',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: ie_5'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: ie_5 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'ie_5_5' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'ie_5_5';
      }
    $data->upgrade( 'name', '5.5' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'ie' ) );
    $data->upgrade( 'supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ie_5_5',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: ie_5_5'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ie_5_5',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: ie_5_5'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: ie_5_5 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'ie_6' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'ie_6';
      }
    $data->upgrade( 'name', '6' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'ie' ) );
    $data->upgrade( 'supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ie_6',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: ie_6'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ie_6',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: ie_6'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: ie_6 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'ie_7' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'ie_7';
      }
    $data->upgrade( 'name', '7' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'ie' ) );
    $data->upgrade( 'supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ie_7',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: ie_7'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ie_7',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: ie_7'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: ie_7 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'ie_8' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'ie_8';
      }
    $data->upgrade( 'name', '8' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'ie' ) );
    $data->upgrade( 'supported', 'true' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ie_8',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: ie_8'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ie_8',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: ie_8'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: ie_8 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'ie_9' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'ie_9';
      }
    $data->upgrade( 'name', '9' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'ie' ) );
    $data->upgrade( 'supported', 'true' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ie_9',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: ie_9'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ie_9',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: ie_9'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: ie_9 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'ie_10' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'ie_10';
      }
    $data->upgrade( 'name', '10' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'ie' ) );
    $data->upgrade( 'supported', 'true' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ie_10',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: ie_10'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ie_10',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: ie_10'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: ie_10 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'firefox_1_2' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'firefox_1_2';
      }
    $data->upgrade( 'name', '1.2' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'firefox' ) );
    $data->upgrade( 'code_name', 'Phoenix/Pescadero' );
    $data->upgrade( 'supported', 'false' );
    $data->upgrade( 'released', '2002-09-23' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'firefox_1_2',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: firefox_1_2'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'firefox_1_2',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: firefox_1_2'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: firefox_1_2 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'firefox_1_5' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'firefox_1_5';
      }
    $data->upgrade( 'name', '1.5' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'firefox' ) );
    $data->upgrade( 'code_name', 'Firebird/Glendale' );
    $data->upgrade( 'supported', 'false' );
    $data->upgrade( 'released', '2003-05-17' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'firefox_1_5',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: firefox_1_5'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'firefox_1_5',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: firefox_1_5'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: firefox_1_5 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'firefox_3_6' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'firefox_3_6';
      }
    $data->upgrade( 'name', '3.6' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'firefox' ) );
    $data->upgrade( 'supported', 'true' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'firefox_3_6',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: firefox_3_6'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'firefox_3_6',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: firefox_3_6'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: firefox_3_6 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'firefox_4' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'firefox_4';
      }
    $data->upgrade( 'name', '4' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'firefox' ) );
    $data->upgrade( 'supported', 'true' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'firefox_4',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: firefox_4'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'firefox_4',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: firefox_4'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: firefox_4 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'opera_1' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'opera_1';
      }
    $data->upgrade( 'name', '1' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'opera' ) );
    $data->upgrade( 'supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'opera_1',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: opera_1'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'opera_1',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: opera_1'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: opera_1 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'chrome_1' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'chrome_1';
      }
    $data->upgrade( 'name', '1' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'chrome' ) );
    $data->upgrade( 'supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'chrome_1',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: chrome_1'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'chrome_1',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: chrome_1'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: chrome_1 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'safari_1' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'safari_1';
      }
    $data->upgrade( 'name', '1' );
    $data->upgrade( 'id_browser', $orm->getByKey( 'WbfsysBrowser', 'safari' ) );
    $data->upgrade( 'supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'safari_1',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: safari_1'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'safari_1',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: safari_1'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: safari_1 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysBrowserVersion', 'unkown_0' ) )
      {
        $data = new WbfsysBrowserVersion_Entity();
        $data->access_key  = 'unkown_0';
      }
    $data->upgrade( 'name', '0' );
    $data->upgrade( 'supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'unkown_0',
          'WbfsysBrowserVersion',
          'Sucessfully created new WbfsysBrowserVersion dataset key: unkown_0'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'unkown_0',
            'WbfsysBrowserVersion',
            'Sucessfully updated WbfsysBrowserVersion dataset key: unkown_0'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_browser_version',
        'WbfsysBrowserVersion',
        'Failed to sync WbfsysBrowserVersion dataset key: unkown_0 '.$e->getMessage()
      ));
    }
