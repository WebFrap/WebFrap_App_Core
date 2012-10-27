<?php 

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'int' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'int';
      }
    $data->upgrade( 'name', 'Int' );
    $data->upgrade( 'description', 'Int' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'int',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: int'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'int',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: int'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: int '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'int[]' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'int[]';
      }
    $data->upgrade( 'name', 'Int Arry' );
    $data->upgrade( 'description', 'Int Arry' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'int[]',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: int[]'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'int[]',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: int[]'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: int[] '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'integer' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'integer';
      }
    $data->upgrade( 'name', 'Integer' );
    $data->upgrade( 'description', 'Integer' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'integer',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: integer'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'integer',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: integer'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: integer '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'text' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'text';
      }
    $data->upgrade( 'name', 'Text' );
    $data->upgrade( 'description', 'Text' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'text',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: text'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'text',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: text'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: text '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'text[]' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'text[]';
      }
    $data->upgrade( 'name', 'Text Array' );
    $data->upgrade( 'description', 'Text Array' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'text[]',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: text[]'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'text[]',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: text[]'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: text[] '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'boolean' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'boolean';
      }
    $data->upgrade( 'name', 'Boolean' );
    $data->upgrade( 'description', 'Boolean' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'boolean',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: boolean'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'boolean',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: boolean'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: boolean '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'boolean[]' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'boolean[]';
      }
    $data->upgrade( 'name', 'Boolean Array' );
    $data->upgrade( 'description', 'Boolean Array' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'boolean[]',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: boolean[]'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'boolean[]',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: boolean[]'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: boolean[] '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'uuid' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'uuid';
      }
    $data->upgrade( 'name', 'UUID' );
    $data->upgrade( 'description', 'UUID' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'uuid',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: uuid'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'uuid',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: uuid'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: uuid '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'uuid[]' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'uuid[]';
      }
    $data->upgrade( 'name', 'UUID Array' );
    $data->upgrade( 'description', 'UUID Array' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'uuid[]',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: uuid[]'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'uuid[]',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: uuid[]'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: uuid[] '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'numeric' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'numeric';
      }
    $data->upgrade( 'name', 'Numeric' );
    $data->upgrade( 'description', 'Numeric' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'numeric',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: numeric'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'numeric',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: numeric'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: numeric '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'numeric[]' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'numeric[]';
      }
    $data->upgrade( 'name', 'Numeric Array' );
    $data->upgrade( 'description', 'Numeric Array' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'numeric[]',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: numeric[]'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'numeric[]',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: numeric[]'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: numeric[] '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'date' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'date';
      }
    $data->upgrade( 'name', 'Date' );
    $data->upgrade( 'description', 'Date' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'date',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: date'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'date',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: date'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: date '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'date[]' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'date[]';
      }
    $data->upgrade( 'name', 'Date Array' );
    $data->upgrade( 'description', 'Date Array' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'date[]',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: date[]'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'date[]',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: date[]'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: date[] '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'time' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'time';
      }
    $data->upgrade( 'name', 'Time' );
    $data->upgrade( 'description', 'Time' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'time',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: time'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'time',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: time'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: time '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'time[]' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'time[]';
      }
    $data->upgrade( 'name', 'Time Array' );
    $data->upgrade( 'description', 'Time Array' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'time[]',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: time[]'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'time[]',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: time[]'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: time[] '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'timestamp' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'timestamp';
      }
    $data->upgrade( 'name', 'Timestamp' );
    $data->upgrade( 'description', 'Timestamp' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'timestamp',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: timestamp'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'timestamp',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: timestamp'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: timestamp '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'timestamp[]' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'timestamp[]';
      }
    $data->upgrade( 'name', 'Timestamp Array' );
    $data->upgrade( 'description', 'Timestamp Array' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'timestamp[]',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: timestamp[]'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'timestamp[]',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: timestamp[]'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: timestamp[] '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'smallint' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'smallint';
      }
    $data->upgrade( 'name', 'Smallint' );
    $data->upgrade( 'description', 'Smallint' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'smallint',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: smallint'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'smallint',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: smallint'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: smallint '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'smallint[]' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'smallint[]';
      }
    $data->upgrade( 'name', 'Smallint Array' );
    $data->upgrade( 'description', 'Smallint Array' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'smallint[]',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: smallint[]'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'smallint[]',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: smallint[]'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: smallint[] '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'bigint' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'bigint';
      }
    $data->upgrade( 'name', 'Bigint' );
    $data->upgrade( 'description', 'Bigint' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bigint',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: bigint'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bigint',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: bigint'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: bigint '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'bigint[]' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'bigint[]';
      }
    $data->upgrade( 'name', 'Bigint Array' );
    $data->upgrade( 'description', 'Bigint Array' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bigint[]',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: bigint[]'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bigint[]',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: bigint[]'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: bigint[] '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'money' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'money';
      }
    $data->upgrade( 'name', 'Money' );
    $data->upgrade( 'description', 'Money' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'money',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: money'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'money',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: money'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: money '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'money[]' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'money[]';
      }
    $data->upgrade( 'name', 'Money Array' );
    $data->upgrade( 'description', 'Money Array' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'money[]',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: money[]'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'money[]',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: money[]'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: money[] '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'inet' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'inet';
      }
    $data->upgrade( 'name', 'Inet' );
    $data->upgrade( 'description', 'Inet' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'inet',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: inet'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'inet',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: inet'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: inet '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'inet[]' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'inet[]';
      }
    $data->upgrade( 'name', 'Inet Array' );
    $data->upgrade( 'description', 'Inet Array' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'inet[]',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: inet[]'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'inet[]',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: inet[]'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: inet[] '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'cidr' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'cidr';
      }
    $data->upgrade( 'name', 'Cidr' );
    $data->upgrade( 'description', 'Cidr' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'cidr',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: cidr'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'cidr',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: cidr'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: cidr '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'cidr[]' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'cidr[]';
      }
    $data->upgrade( 'name', 'Cidr Array' );
    $data->upgrade( 'description', 'Cidr Array' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'cidr[]',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: cidr[]'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'cidr[]',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: cidr[]'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: cidr[] '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'varchar' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'varchar';
      }
    $data->upgrade( 'name', 'Varchar' );
    $data->upgrade( 'description', 'Varchar' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'varchar',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: varchar'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'varchar',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: varchar'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: varchar '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'varchar[]' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'varchar[]';
      }
    $data->upgrade( 'name', 'Varchar Array' );
    $data->upgrade( 'description', 'Varchar Array' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'varchar[]',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: varchar[]'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'varchar[]',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: varchar[]'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: varchar[] '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'char' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'char';
      }
    $data->upgrade( 'name', 'Char' );
    $data->upgrade( 'description', 'Char' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'char',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: char'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'char',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: char'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: char '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'char[]' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'char[]';
      }
    $data->upgrade( 'name', 'Char Array' );
    $data->upgrade( 'description', 'Char Array' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'char[]',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: char[]'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'char[]',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: char[]'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: char[] '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysEntityAttributeType', 'tsvector' ) )
      {
        $data = new WbfsysEntityAttributeType_Entity();
        $data->access_key  = 'tsvector';
      }
    $data->upgrade( 'name', 'Tsvector' );
    $data->upgrade( 'description', 'Tsvector' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'tsvector',
          'WbfsysEntityAttributeType',
          'Sucessfully created new WbfsysEntityAttributeType dataset key: tsvector'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'tsvector',
            'WbfsysEntityAttributeType',
            'Sucessfully updated WbfsysEntityAttributeType dataset key: tsvector'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_attribute_type',
        'WbfsysEntityAttributeType',
        'Failed to sync WbfsysEntityAttributeType dataset key: tsvector '.$e->getMessage()
      ));
    }
