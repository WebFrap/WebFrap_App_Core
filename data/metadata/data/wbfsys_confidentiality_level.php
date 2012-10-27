<?php 

      if( !$data = $orm->getByKey( 'WbfsysConfidentialityLevel', 'public' ) )
      {
        $data = new WbfsysConfidentialityLevel_Entity();
        $data->access_key  = 'public';
      }
    $data->upgrade( 'label', 'Public' );
    $data->upgrade( 'description', 'Public available' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'public',
          'WbfsysConfidentialityLevel',
          'Sucessfully created new WbfsysConfidentialityLevel dataset key: public'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'public',
            'WbfsysConfidentialityLevel',
            'Sucessfully updated WbfsysConfidentialityLevel dataset key: public'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_confidentiality_level',
        'WbfsysConfidentialityLevel',
        'Failed to sync WbfsysConfidentialityLevel dataset key: public '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysConfidentialityLevel', 'customer' ) )
      {
        $data = new WbfsysConfidentialityLevel_Entity();
        $data->access_key  = 'customer';
      }
    $data->upgrade( 'label', 'Customer' );
    $data->upgrade( 'description', 'Only for paying customers' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'customer',
          'WbfsysConfidentialityLevel',
          'Sucessfully created new WbfsysConfidentialityLevel dataset key: customer'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'customer',
            'WbfsysConfidentialityLevel',
            'Sucessfully updated WbfsysConfidentialityLevel dataset key: customer'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_confidentiality_level',
        'WbfsysConfidentialityLevel',
        'Failed to sync WbfsysConfidentialityLevel dataset key: customer '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysConfidentialityLevel', 'restricted' ) )
      {
        $data = new WbfsysConfidentialityLevel_Entity();
        $data->access_key  = 'restricted';
      }
    $data->upgrade( 'label', 'Restricted' );
    $data->upgrade( 'description', 'Such material would cause \"undesirable effects\" if publicly available.' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'restricted',
          'WbfsysConfidentialityLevel',
          'Sucessfully created new WbfsysConfidentialityLevel dataset key: restricted'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'restricted',
            'WbfsysConfidentialityLevel',
            'Sucessfully updated WbfsysConfidentialityLevel dataset key: restricted'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_confidentiality_level',
        'WbfsysConfidentialityLevel',
        'Failed to sync WbfsysConfidentialityLevel dataset key: restricted '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysConfidentialityLevel', 'confidential' ) )
      {
        $data = new WbfsysConfidentialityLevel_Entity();
        $data->access_key  = 'confidential';
      }
    $data->upgrade( 'label', 'Confidential' );
    $data->upgrade( 'description', 'Such material would cause \"damage\" or be \"prejudicial\" to company business if publicly available.' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'confidential',
          'WbfsysConfidentialityLevel',
          'Sucessfully created new WbfsysConfidentialityLevel dataset key: confidential'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'confidential',
            'WbfsysConfidentialityLevel',
            'Sucessfully updated WbfsysConfidentialityLevel dataset key: confidential'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_confidentiality_level',
        'WbfsysConfidentialityLevel',
        'Failed to sync WbfsysConfidentialityLevel dataset key: confidential '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysConfidentialityLevel', 'secret' ) )
      {
        $data = new WbfsysConfidentialityLevel_Entity();
        $data->access_key  = 'secret';
      }
    $data->upgrade( 'label', 'Secret' );
    $data->upgrade( 'description', 'Such material would cause \"serious damage\" to company business if it were publicly available.' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'secret',
          'WbfsysConfidentialityLevel',
          'Sucessfully created new WbfsysConfidentialityLevel dataset key: secret'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'secret',
            'WbfsysConfidentialityLevel',
            'Sucessfully updated WbfsysConfidentialityLevel dataset key: secret'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_confidentiality_level',
        'WbfsysConfidentialityLevel',
        'Failed to sync WbfsysConfidentialityLevel dataset key: secret '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysConfidentialityLevel', 'top_secret' ) )
      {
        $data = new WbfsysConfidentialityLevel_Entity();
        $data->access_key  = 'top_secret';
      }
    $data->upgrade( 'label', 'Top Secret' );
    $data->upgrade( 'description', 'Such material would cause \"exceptionally grave damage\" to company business if made publicly available.' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'top_secret',
          'WbfsysConfidentialityLevel',
          'Sucessfully created new WbfsysConfidentialityLevel dataset key: top_secret'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'top_secret',
            'WbfsysConfidentialityLevel',
            'Sucessfully updated WbfsysConfidentialityLevel dataset key: top_secret'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_confidentiality_level',
        'WbfsysConfidentialityLevel',
        'Failed to sync WbfsysConfidentialityLevel dataset key: top_secret '.$e->getMessage()
      ));
    }
