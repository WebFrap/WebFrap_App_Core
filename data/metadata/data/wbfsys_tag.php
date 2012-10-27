<?php 

      if( !$data = $orm->getByKey( 'WbfsysTag', 'edit' ) )
      {
        $data = new WbfsysTag_Entity();
        $data->access_key  = 'edit';
      }
    $data->upgrade( 'name', 'Edit' );
    $data->upgrade( 'id_lang', $orm->getByKey( 'WbfsysLanguage', 'en' ) );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'edit',
          'WbfsysTag',
          'Sucessfully created new WbfsysTag dataset key: edit'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'edit',
            'WbfsysTag',
            'Sucessfully updated WbfsysTag dataset key: edit'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysTag',
        'Failed to sync WbfsysTag dataset key: edit '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysTag', 'create' ) )
      {
        $data = new WbfsysTag_Entity();
        $data->access_key  = 'create';
      }
    $data->upgrade( 'name', 'Create' );
    $data->upgrade( 'id_lang', $orm->getByKey( 'WbfsysLanguage', 'en' ) );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'create',
          'WbfsysTag',
          'Sucessfully created new WbfsysTag dataset key: create'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'create',
            'WbfsysTag',
            'Sucessfully updated WbfsysTag dataset key: create'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysTag',
        'Failed to sync WbfsysTag dataset key: create '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysTag', 'table' ) )
      {
        $data = new WbfsysTag_Entity();
        $data->access_key  = 'table';
      }
    $data->upgrade( 'name', 'Table' );
    $data->upgrade( 'id_lang', $orm->getByKey( 'WbfsysLanguage', 'en' ) );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'table',
          'WbfsysTag',
          'Sucessfully created new WbfsysTag dataset key: table'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'table',
            'WbfsysTag',
            'Sucessfully updated WbfsysTag dataset key: table'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysTag',
        'Failed to sync WbfsysTag dataset key: table '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysTag', 'selection' ) )
      {
        $data = new WbfsysTag_Entity();
        $data->access_key  = 'selection';
      }
    $data->upgrade( 'name', 'Selection' );
    $data->upgrade( 'id_lang', $orm->getByKey( 'WbfsysLanguage', 'en' ) );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'selection',
          'WbfsysTag',
          'Sucessfully created new WbfsysTag dataset key: selection'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'selection',
            'WbfsysTag',
            'Sucessfully updated WbfsysTag dataset key: selection'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysTag',
        'Failed to sync WbfsysTag dataset key: selection '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysTag', 'acl' ) )
      {
        $data = new WbfsysTag_Entity();
        $data->access_key  = 'acl';
      }
    $data->upgrade( 'name', 'ACL' );
    $data->upgrade( 'id_lang', $orm->getByKey( 'WbfsysLanguage', 'en' ) );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'acl',
          'WbfsysTag',
          'Sucessfully created new WbfsysTag dataset key: acl'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'acl',
            'WbfsysTag',
            'Sucessfully updated WbfsysTag dataset key: acl'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysTag',
        'Failed to sync WbfsysTag dataset key: acl '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysTag', 'access' ) )
      {
        $data = new WbfsysTag_Entity();
        $data->access_key  = 'access';
      }
    $data->upgrade( 'name', 'Access' );
    $data->upgrade( 'id_lang', $orm->getByKey( 'WbfsysLanguage', 'en' ) );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'access',
          'WbfsysTag',
          'Sucessfully created new WbfsysTag dataset key: access'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'access',
            'WbfsysTag',
            'Sucessfully updated WbfsysTag dataset key: access'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysTag',
        'Failed to sync WbfsysTag dataset key: access '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysTag', 'control' ) )
      {
        $data = new WbfsysTag_Entity();
        $data->access_key  = 'control';
      }
    $data->upgrade( 'name', 'Control' );
    $data->upgrade( 'id_lang', $orm->getByKey( 'WbfsysLanguage', 'en' ) );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'control',
          'WbfsysTag',
          'Sucessfully created new WbfsysTag dataset key: control'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'control',
            'WbfsysTag',
            'Sucessfully updated WbfsysTag dataset key: control'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysTag',
        'Failed to sync WbfsysTag dataset key: control '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysTag', 'access_control' ) )
      {
        $data = new WbfsysTag_Entity();
        $data->access_key  = 'access_control';
      }
    $data->upgrade( 'name', 'Access Control' );
    $data->upgrade( 'id_lang', $orm->getByKey( 'WbfsysLanguage', 'en' ) );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'access_control',
          'WbfsysTag',
          'Sucessfully created new WbfsysTag dataset key: access_control'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'access_control',
            'WbfsysTag',
            'Sucessfully updated WbfsysTag dataset key: access_control'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysTag',
        'Failed to sync WbfsysTag dataset key: access_control '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysTag', 'new' ) )
      {
        $data = new WbfsysTag_Entity();
        $data->access_key  = 'new';
      }
    $data->upgrade( 'name', 'New' );
    $data->upgrade( 'id_lang', $orm->getByKey( 'WbfsysLanguage', 'en' ) );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'new',
          'WbfsysTag',
          'Sucessfully created new WbfsysTag dataset key: new'
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
            'WbfsysTag',
            'Sucessfully updated WbfsysTag dataset key: new'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysTag',
        'Failed to sync WbfsysTag dataset key: new '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysTag', 'example' ) )
      {
        $data = new WbfsysTag_Entity();
        $data->access_key  = 'example';
      }
    $data->upgrade( 'name', 'Example' );
    $data->upgrade( 'id_lang', $orm->getByKey( 'WbfsysLanguage', 'en' ) );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'example',
          'WbfsysTag',
          'Sucessfully created new WbfsysTag dataset key: example'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'example',
            'WbfsysTag',
            'Sucessfully updated WbfsysTag dataset key: example'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysTag',
        'Failed to sync WbfsysTag dataset key: example '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysTag', 'important' ) )
      {
        $data = new WbfsysTag_Entity();
        $data->access_key  = 'important';
      }
    $data->upgrade( 'name', 'Important' );
    $data->upgrade( 'id_lang', $orm->getByKey( 'WbfsysLanguage', 'en' ) );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'important',
          'WbfsysTag',
          'Sucessfully created new WbfsysTag dataset key: important'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'important',
            'WbfsysTag',
            'Sucessfully updated WbfsysTag dataset key: important'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysTag',
        'Failed to sync WbfsysTag dataset key: important '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysTag', 'good' ) )
      {
        $data = new WbfsysTag_Entity();
        $data->access_key  = 'good';
      }
    $data->upgrade( 'name', 'Good' );
    $data->upgrade( 'id_lang', $orm->getByKey( 'WbfsysLanguage', 'en' ) );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'good',
          'WbfsysTag',
          'Sucessfully created new WbfsysTag dataset key: good'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'good',
            'WbfsysTag',
            'Sucessfully updated WbfsysTag dataset key: good'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysTag',
        'Failed to sync WbfsysTag dataset key: good '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysTag', 'bad' ) )
      {
        $data = new WbfsysTag_Entity();
        $data->access_key  = 'bad';
      }
    $data->upgrade( 'name', 'Bad' );
    $data->upgrade( 'id_lang', $orm->getByKey( 'WbfsysLanguage', 'en' ) );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bad',
          'WbfsysTag',
          'Sucessfully created new WbfsysTag dataset key: bad'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bad',
            'WbfsysTag',
            'Sucessfully updated WbfsysTag dataset key: bad'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysTag',
        'Failed to sync WbfsysTag dataset key: bad '.$e->getMessage()
      ));
    }
