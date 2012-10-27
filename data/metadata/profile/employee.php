<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for profile: employee
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $profile = null;
    $group   = null;

    if( !$profile = $orm->getByKey( 'WbfsysProfile', 'employee' ) )
    {
      $profile = new WbfsysProfile_Entity();
      $profile->access_key = 'employee';
    }

    $profile->retrofit( 'name', 'Employee' );
    $profile->retrofit( 'description', '' );
    $profile->revision = $deployRevision;
    
    try
    {
      if( $profile->isNew() )
      {
      
        $orm->insert( $profile );
        $this->protocol(array(
          'insert',
          'employee',
          'WbfsysProfile',
          'Sucessfully created new Profile employee'
        ));
      }
      else
      {
        
        if( !$profile->getSynchronized() )
        {
          $orm->update( $profile );
          $this->protocol(array(
            'update',
            'employee',
            'WbfsysProfile',
            'Sucessfully updated Profile employee'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'employee',
        'WbfsysProfile',
        'Failed to sync Profile employee '.$e->getMessage()
      ));
    }
    
    // plain role
    if( !$group = $orm->getByKey( 'WbfsysRoleGroup', "employee" ) )
    {
      $group = new WbfsysRoleGroup_Entity();
      $group->access_key = 'employee';
    }

    $group->retrofit( 'name', 'Employee' ); 
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
          'employee',
          'WbfsysRoleGroup',
          'Sucessfully created new Group employee'
        ));
      }
      else
      {
        
        if( !$group->getSynchronized() )
        {
          $orm->update( $group );
          $this->protocol(array(
            'update',
            'employee',
            'WbfsysRoleGroup',
            'Sucessfully updated Group employee'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'employee',
        'WbfsysRoleGroup',
        'Failed to sync Group employee '.$e->getMessage()
      ));
    }
