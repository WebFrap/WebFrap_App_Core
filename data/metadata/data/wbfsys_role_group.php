<?php 

      if( !$data = $orm->getByKey( 'WbfsysRoleGroup', 'admin' ) )
      {
        $data = new WbfsysRoleGroup_Entity();
        $data->access_key  = 'admin';
      }
    $data->upgrade( 'name', 'Admin' );
    $data->upgrade( 'system', '1' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'admin',
          'WbfsysRoleGroup',
          'Sucessfully created new WbfsysRoleGroup dataset key: admin'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'admin',
            'WbfsysRoleGroup',
            'Sucessfully updated WbfsysRoleGroup dataset key: admin'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_role_group',
        'WbfsysRoleGroup',
        'Failed to sync WbfsysRoleGroup dataset key: admin '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysRoleGroup', 'user' ) )
      {
        $data = new WbfsysRoleGroup_Entity();
        $data->access_key  = 'user';
      }
    $data->upgrade( 'name', 'User' );
    $data->upgrade( 'system', '1' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'user',
          'WbfsysRoleGroup',
          'Sucessfully created new WbfsysRoleGroup dataset key: user'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'user',
            'WbfsysRoleGroup',
            'Sucessfully updated WbfsysRoleGroup dataset key: user'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_role_group',
        'WbfsysRoleGroup',
        'Failed to sync WbfsysRoleGroup dataset key: user '.$e->getMessage()
      ));
    }
