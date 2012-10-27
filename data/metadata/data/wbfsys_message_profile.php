<?php 

      if( !$data = $orm->getByKey( 'WbfsysMessageProfileType', 'internal_message' ) )
      {
        $data = new WbfsysMessageProfileType_Entity();
        $data->access_key  = 'internal_message';
      }
    $data->upgrade( 'name', 'Internal Message' );
    $data->upgrade( 'description', 'New Task' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'internal_message',
          'WbfsysMessageProfileType',
          'Sucessfully created new WbfsysMessageProfileType dataset key: internal_message'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'internal_message',
            'WbfsysMessageProfileType',
            'Sucessfully updated WbfsysMessageProfileType dataset key: internal_message'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_message_profile',
        'WbfsysMessageProfileType',
        'Failed to sync WbfsysMessageProfileType dataset key: internal_message '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysMessageProfileType', 'e_mail' ) )
      {
        $data = new WbfsysMessageProfileType_Entity();
        $data->access_key  = 'e_mail';
      }
    $data->upgrade( 'name', 'E-Mail' );
    $data->upgrade( 'description', 'E-Mail' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'e_mail',
          'WbfsysMessageProfileType',
          'Sucessfully created new WbfsysMessageProfileType dataset key: e_mail'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'e_mail',
            'WbfsysMessageProfileType',
            'Sucessfully updated WbfsysMessageProfileType dataset key: e_mail'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_message_profile',
        'WbfsysMessageProfileType',
        'Failed to sync WbfsysMessageProfileType dataset key: e_mail '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysUserContactVisibility', 'private' ) )
      {
        $data = new WbfsysUserContactVisibility_Entity();
        $data->access_key  = 'private';
      }
    $data->upgrade( 'name', 'Private' );
    $data->upgrade( 'description', 'Only Private use' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'private',
          'WbfsysUserContactVisibility',
          'Sucessfully created new WbfsysUserContactVisibility dataset key: private'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'private',
            'WbfsysUserContactVisibility',
            'Sucessfully updated WbfsysUserContactVisibility dataset key: private'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_message_profile',
        'WbfsysUserContactVisibility',
        'Failed to sync WbfsysUserContactVisibility dataset key: private '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysUserContactVisibility', 'friends_only' ) )
      {
        $data = new WbfsysUserContactVisibility_Entity();
        $data->access_key  = 'friends_only';
      }
    $data->upgrade( 'name', 'Friends Only' );
    $data->upgrade( 'description', 'Friends Only' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'friends_only',
          'WbfsysUserContactVisibility',
          'Sucessfully created new WbfsysUserContactVisibility dataset key: friends_only'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'friends_only',
            'WbfsysUserContactVisibility',
            'Sucessfully updated WbfsysUserContactVisibility dataset key: friends_only'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_message_profile',
        'WbfsysUserContactVisibility',
        'Failed to sync WbfsysUserContactVisibility dataset key: friends_only '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysUserContactVisibility', 'friends_of_friends' ) )
      {
        $data = new WbfsysUserContactVisibility_Entity();
        $data->access_key  = 'friends_of_friends';
      }
    $data->upgrade( 'name', 'Friends of Friends' );
    $data->upgrade( 'description', 'Friends of Friends' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'friends_of_friends',
          'WbfsysUserContactVisibility',
          'Sucessfully created new WbfsysUserContactVisibility dataset key: friends_of_friends'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'friends_of_friends',
            'WbfsysUserContactVisibility',
            'Sucessfully updated WbfsysUserContactVisibility dataset key: friends_of_friends'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_message_profile',
        'WbfsysUserContactVisibility',
        'Failed to sync WbfsysUserContactVisibility dataset key: friends_of_friends '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysUserContactVisibility', 'business_internal' ) )
      {
        $data = new WbfsysUserContactVisibility_Entity();
        $data->access_key  = 'business_internal';
      }
    $data->upgrade( 'name', 'Business Internal' );
    $data->upgrade( 'description', 'Only for Persons in the Same Company' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'business_internal',
          'WbfsysUserContactVisibility',
          'Sucessfully created new WbfsysUserContactVisibility dataset key: business_internal'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'business_internal',
            'WbfsysUserContactVisibility',
            'Sucessfully updated WbfsysUserContactVisibility dataset key: business_internal'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_message_profile',
        'WbfsysUserContactVisibility',
        'Failed to sync WbfsysUserContactVisibility dataset key: business_internal '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysUserContactVisibility', 'public' ) )
      {
        $data = new WbfsysUserContactVisibility_Entity();
        $data->access_key  = 'public';
      }
    $data->upgrade( 'name', 'Public' );
    $data->upgrade( 'description', 'Visibible for Everybody' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'public',
          'WbfsysUserContactVisibility',
          'Sucessfully created new WbfsysUserContactVisibility dataset key: public'
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
            'WbfsysUserContactVisibility',
            'Sucessfully updated WbfsysUserContactVisibility dataset key: public'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_message_profile',
        'WbfsysUserContactVisibility',
        'Failed to sync WbfsysUserContactVisibility dataset key: public '.$e->getMessage()
      ));
    }
