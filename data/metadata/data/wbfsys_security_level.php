<?php 

      if( !$data = $orm->getByKey( 'WbfsysSecurityLevel', 'level_10' ) )
      {
        $data = new WbfsysSecurityLevel_Entity();
        $data->access_key  = 'level_10';
      }
    $data->upgrade( 'label', 'Head' );
    $data->upgrade( 'level', '100' );
    $data->upgrade( 'description', 'Head' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'level_10',
          'WbfsysSecurityLevel',
          'Sucessfully created new WbfsysSecurityLevel dataset key: level_10'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'level_10',
            'WbfsysSecurityLevel',
            'Sucessfully updated WbfsysSecurityLevel dataset key: level_10'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityLevel',
        'Failed to sync WbfsysSecurityLevel dataset key: level_10 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysSecurityLevel', 'level_9' ) )
      {
        $data = new WbfsysSecurityLevel_Entity();
        $data->access_key  = 'level_9';
      }
    $data->upgrade( 'label', 'Management Level 1' );
    $data->upgrade( 'level', '90' );
    $data->upgrade( 'description', 'Management Level 1' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'level_9',
          'WbfsysSecurityLevel',
          'Sucessfully created new WbfsysSecurityLevel dataset key: level_9'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'level_9',
            'WbfsysSecurityLevel',
            'Sucessfully updated WbfsysSecurityLevel dataset key: level_9'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityLevel',
        'Failed to sync WbfsysSecurityLevel dataset key: level_9 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysSecurityLevel', 'level_8' ) )
      {
        $data = new WbfsysSecurityLevel_Entity();
        $data->access_key  = 'level_8';
      }
    $data->upgrade( 'label', 'Management Level 2' );
    $data->upgrade( 'level', '80' );
    $data->upgrade( 'description', 'Management Level 2' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'level_8',
          'WbfsysSecurityLevel',
          'Sucessfully created new WbfsysSecurityLevel dataset key: level_8'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'level_8',
            'WbfsysSecurityLevel',
            'Sucessfully updated WbfsysSecurityLevel dataset key: level_8'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityLevel',
        'Failed to sync WbfsysSecurityLevel dataset key: level_8 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysSecurityLevel', 'level_7' ) )
      {
        $data = new WbfsysSecurityLevel_Entity();
        $data->access_key  = 'level_7';
      }
    $data->upgrade( 'label', 'Management Level 3' );
    $data->upgrade( 'level', '70' );
    $data->upgrade( 'description', 'Management Level 3' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'level_7',
          'WbfsysSecurityLevel',
          'Sucessfully created new WbfsysSecurityLevel dataset key: level_7'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'level_7',
            'WbfsysSecurityLevel',
            'Sucessfully updated WbfsysSecurityLevel dataset key: level_7'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityLevel',
        'Failed to sync WbfsysSecurityLevel dataset key: level_7 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysSecurityLevel', 'level_6' ) )
      {
        $data = new WbfsysSecurityLevel_Entity();
        $data->access_key  = 'level_6';
      }
    $data->upgrade( 'label', 'Management Level 4' );
    $data->upgrade( 'level', '60' );
    $data->upgrade( 'description', 'Management Level 4' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'level_6',
          'WbfsysSecurityLevel',
          'Sucessfully created new WbfsysSecurityLevel dataset key: level_6'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'level_6',
            'WbfsysSecurityLevel',
            'Sucessfully updated WbfsysSecurityLevel dataset key: level_6'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityLevel',
        'Failed to sync WbfsysSecurityLevel dataset key: level_6 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysSecurityLevel', 'level_5' ) )
      {
        $data = new WbfsysSecurityLevel_Entity();
        $data->access_key  = 'level_5';
      }
    $data->upgrade( 'label', 'Superior Access' );
    $data->upgrade( 'level', '50' );
    $data->upgrade( 'description', 'Superior Access' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'level_5',
          'WbfsysSecurityLevel',
          'Sucessfully created new WbfsysSecurityLevel dataset key: level_5'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'level_5',
            'WbfsysSecurityLevel',
            'Sucessfully updated WbfsysSecurityLevel dataset key: level_5'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityLevel',
        'Failed to sync WbfsysSecurityLevel dataset key: level_5 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysSecurityLevel', 'level_4' ) )
      {
        $data = new WbfsysSecurityLevel_Entity();
        $data->access_key  = 'level_4';
      }
    $data->upgrade( 'label', 'Employee Access' );
    $data->upgrade( 'level', '40' );
    $data->upgrade( 'description', 'Employee Access' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'level_4',
          'WbfsysSecurityLevel',
          'Sucessfully created new WbfsysSecurityLevel dataset key: level_4'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'level_4',
            'WbfsysSecurityLevel',
            'Sucessfully updated WbfsysSecurityLevel dataset key: level_4'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityLevel',
        'Failed to sync WbfsysSecurityLevel dataset key: level_4 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysSecurityLevel', 'level_3' ) )
      {
        $data = new WbfsysSecurityLevel_Entity();
        $data->access_key  = 'level_3';
      }
    $data->upgrade( 'label', 'Ident Access' );
    $data->upgrade( 'level', '30' );
    $data->upgrade( 'description', 'Ident Access' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'level_3',
          'WbfsysSecurityLevel',
          'Sucessfully created new WbfsysSecurityLevel dataset key: level_3'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'level_3',
            'WbfsysSecurityLevel',
            'Sucessfully updated WbfsysSecurityLevel dataset key: level_3'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityLevel',
        'Failed to sync WbfsysSecurityLevel dataset key: level_3 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysSecurityLevel', 'level_2' ) )
      {
        $data = new WbfsysSecurityLevel_Entity();
        $data->access_key  = 'level_2';
      }
    $data->upgrade( 'label', 'User Access' );
    $data->upgrade( 'level', '20' );
    $data->upgrade( 'description', 'User Access' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'level_2',
          'WbfsysSecurityLevel',
          'Sucessfully created new WbfsysSecurityLevel dataset key: level_2'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'level_2',
            'WbfsysSecurityLevel',
            'Sucessfully updated WbfsysSecurityLevel dataset key: level_2'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityLevel',
        'Failed to sync WbfsysSecurityLevel dataset key: level_2 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysSecurityLevel', 'level_1' ) )
      {
        $data = new WbfsysSecurityLevel_Entity();
        $data->access_key  = 'level_1';
      }
    $data->upgrade( 'label', 'Public Access' );
    $data->upgrade( 'level', '10' );
    $data->upgrade( 'description', 'Public Access' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'level_1',
          'WbfsysSecurityLevel',
          'Sucessfully created new WbfsysSecurityLevel dataset key: level_1'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'level_1',
            'WbfsysSecurityLevel',
            'Sucessfully updated WbfsysSecurityLevel dataset key: level_1'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityLevel',
        'Failed to sync WbfsysSecurityLevel dataset key: level_1 '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysSecurityLevel', 'level_0' ) )
      {
        $data = new WbfsysSecurityLevel_Entity();
        $data->access_key  = 'level_0';
      }
    $data->upgrade( 'label', 'Annon Editable' );
    $data->upgrade( 'level', '0' );
    $data->upgrade( 'description', 'Annon Editable' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'level_0',
          'WbfsysSecurityLevel',
          'Sucessfully created new WbfsysSecurityLevel dataset key: level_0'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'level_0',
            'WbfsysSecurityLevel',
            'Sucessfully updated WbfsysSecurityLevel dataset key: level_0'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityLevel',
        'Failed to sync WbfsysSecurityLevel dataset key: level_0 '.$e->getMessage()
      ));
    }
