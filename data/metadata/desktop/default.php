<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for process: default
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $desktop = null;

    if( !$desktop = $orm->getByKey( 'WbfsysDesktop', 'default' ) )
    {
      $desktop = new WbfsysDesktop_Entity();
      $desktop->access_key = 'default';
    }

    $desktop->upgrade( 'name', 'Default' );
    $desktop->upgrade( 'description', '' );
    $desktop->revision = $deployRevision;

    try
    {
      if( $desktop->isNew() )
      {
      
        $orm->insert( $desktop );
        $this->protocol(array(
          'insert',
          'default',
          'WbfsysDesktop',
          'Sucessfully created new Desktop Default'
        ));
      }
      else
      {
        
        if( !$desktop->getSynchronized() )
        {
          $orm->update( $desktop );
          $this->protocol(array(
            'update',
            'default',
            'WbfsysDesktop',
            'Sucessfully updated Desktop Default'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'default',
        'WbfsysDesktop',
        'Failed to sync Desktop Default '.$e->getMessage()
      ));
    }
