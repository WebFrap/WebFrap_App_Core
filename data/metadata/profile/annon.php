<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for profile: annon
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $profile = null;
    $group   = null;

    if( !$profile = $orm->getByKey( 'WbfsysProfile', 'annon' ) )
    {
      $profile = new WbfsysProfile_Entity();
      $profile->access_key = 'annon';
    }

    $profile->retrofit( 'name', 'Annon' );
    $profile->retrofit( 'description', '' );
    $profile->revision = $deployRevision;
    
    try
    {
      if( $profile->isNew() )
      {
      
        $orm->insert( $profile );
        $this->protocol(array(
          'insert',
          'annon',
          'WbfsysProfile',
          'Sucessfully created new Profile annon'
        ));
      }
      else
      {
        
        if( !$profile->getSynchronized() )
        {
          $orm->update( $profile );
          $this->protocol(array(
            'update',
            'annon',
            'WbfsysProfile',
            'Sucessfully updated Profile annon'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'annon',
        'WbfsysProfile',
        'Failed to sync Profile annon '.$e->getMessage()
      ));
    }
    
    // plain role
    if( !$group = $orm->getByKey( 'WbfsysRoleGroup', "annon" ) )
    {
      $group = new WbfsysRoleGroup_Entity();
      $group->access_key = 'annon';
    }

    $group->retrofit( 'name', 'Annon' ); 
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
          'annon',
          'WbfsysRoleGroup',
          'Sucessfully created new Group annon'
        ));
      }
      else
      {
        
        if( !$group->getSynchronized() )
        {
          $orm->update( $group );
          $this->protocol(array(
            'update',
            'annon',
            'WbfsysRoleGroup',
            'Sucessfully updated Group annon'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'annon',
        'WbfsysRoleGroup',
        'Failed to sync Group annon '.$e->getMessage()
      ));
    }
