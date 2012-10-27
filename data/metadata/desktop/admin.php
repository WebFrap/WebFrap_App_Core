<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for process: admin
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $desktop = null;

    if( !$desktop = $orm->getByKey( 'WbfsysDesktop', 'admin' ) )
    {
      $desktop = new WbfsysDesktop_Entity();
      $desktop->access_key = 'admin';
    }

    $desktop->upgrade( 'name', 'Admin' );
    $desktop->upgrade( 'description', '' );
    $desktop->revision = $deployRevision;

    try
    {
      if( $desktop->isNew() )
      {
      
        $orm->insert( $desktop );
        $this->protocol(array(
          'insert',
          'admin',
          'WbfsysDesktop',
          'Sucessfully created new Desktop Admin'
        ));
      }
      else
      {
        
        if( !$desktop->getSynchronized() )
        {
          $orm->update( $desktop );
          $this->protocol(array(
            'update',
            'admin',
            'WbfsysDesktop',
            'Sucessfully updated Desktop Admin'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'admin',
        'WbfsysDesktop',
        'Failed to sync Desktop Admin '.$e->getMessage()
      ));
    }
