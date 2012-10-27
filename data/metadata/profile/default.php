<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for profile: default
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $profile = null;
    $group   = null;

    if( !$profile = $orm->getByKey( 'WbfsysProfile', 'default' ) )
    {
      $profile = new WbfsysProfile_Entity();
      $profile->access_key = 'default';
    }

    $profile->retrofit( 'name', 'default' );
    $profile->retrofit( 'description', 'default' );
    $profile->revision = $deployRevision;
    
    try
    {
      if( $profile->isNew() )
      {
      
        $orm->insert( $profile );
        $this->protocol(array(
          'insert',
          'default',
          'WbfsysProfile',
          'Sucessfully created new Profile default'
        ));
      }
      else
      {
        
        if( !$profile->getSynchronized() )
        {
          $orm->update( $profile );
          $this->protocol(array(
            'update',
            'default',
            'WbfsysProfile',
            'Sucessfully updated Profile default'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'default',
        'WbfsysProfile',
        'Failed to sync Profile default '.$e->getMessage()
      ));
    }
    
    // plain role
    if( !$group = $orm->getByKey( 'WbfsysRoleGroup', "default" ) )
    {
      $group = new WbfsysRoleGroup_Entity();
      $group->access_key = 'default';
    }

    $group->retrofit( 'name', 'default' ); 
    $group->retrofit( 'level', User::LEVEL_GUEST );
    $group->retrofit( 'system', true );
    $group->revision = $deployRevision;

    try
    {
      if( $group->isNew() )
      {
      
        $orm->insert( $group );
        $this->protocol(array(
          'insert',
          'default',
          'WbfsysRoleGroup',
          'Sucessfully created new Group default'
        ));
      }
      else
      {
        
        if( !$group->getSynchronized() )
        {
          $orm->update( $group );
          $this->protocol(array(
            'update',
            'default',
            'WbfsysRoleGroup',
            'Sucessfully updated Group default'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'default',
        'WbfsysRoleGroup',
        'Failed to sync Group default '.$e->getMessage()
      ));
    }
