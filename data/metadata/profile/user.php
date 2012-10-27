<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for profile: user
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $profile = null;
    $group   = null;

    if( !$profile = $orm->getByKey( 'WbfsysProfile', 'user' ) )
    {
      $profile = new WbfsysProfile_Entity();
      $profile->access_key = 'user';
    }

    $profile->retrofit( 'name', 'User' );
    $profile->retrofit( 'description', '' );
    $profile->revision = $deployRevision;
    
    try
    {
      if( $profile->isNew() )
      {
      
        $orm->insert( $profile );
        $this->protocol(array(
          'insert',
          'user',
          'WbfsysProfile',
          'Sucessfully created new Profile user'
        ));
      }
      else
      {
        
        if( !$profile->getSynchronized() )
        {
          $orm->update( $profile );
          $this->protocol(array(
            'update',
            'user',
            'WbfsysProfile',
            'Sucessfully updated Profile user'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'user',
        'WbfsysProfile',
        'Failed to sync Profile user '.$e->getMessage()
      ));
    }
    
    // plain role
    if( !$group = $orm->getByKey( 'WbfsysRoleGroup', "user" ) )
    {
      $group = new WbfsysRoleGroup_Entity();
      $group->access_key = 'user';
    }

    $group->retrofit( 'name', 'User' ); 
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
          'user',
          'WbfsysRoleGroup',
          'Sucessfully created new Group user'
        ));
      }
      else
      {
        
        if( !$group->getSynchronized() )
        {
          $orm->update( $group );
          $this->protocol(array(
            'update',
            'user',
            'WbfsysRoleGroup',
            'Sucessfully updated Group user'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'user',
        'WbfsysRoleGroup',
        'Failed to sync Group user '.$e->getMessage()
      ));
    }
