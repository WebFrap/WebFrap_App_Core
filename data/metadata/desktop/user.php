<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for process: user
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $desktop = null;

    if( !$desktop = $orm->getByKey( 'WbfsysDesktop', 'user' ) )
    {
      $desktop = new WbfsysDesktop_Entity();
      $desktop->access_key = 'user';
    }

    $desktop->upgrade( 'name', 'User' );
    $desktop->upgrade( 'description', '' );
    $desktop->revision = $deployRevision;

    try
    {
      if( $desktop->isNew() )
      {
      
        $orm->insert( $desktop );
        $this->protocol(array(
          'insert',
          'user',
          'WbfsysDesktop',
          'Sucessfully created new Desktop User'
        ));
      }
      else
      {
        
        if( !$desktop->getSynchronized() )
        {
          $orm->update( $desktop );
          $this->protocol(array(
            'update',
            'user',
            'WbfsysDesktop',
            'Sucessfully updated Desktop User'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'user',
        'WbfsysDesktop',
        'Failed to sync Desktop User '.$e->getMessage()
      ));
    }
