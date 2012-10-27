<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for process: annon
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $desktop = null;

    if( !$desktop = $orm->getByKey( 'WbfsysDesktop', 'annon' ) )
    {
      $desktop = new WbfsysDesktop_Entity();
      $desktop->access_key = 'annon';
    }

    $desktop->upgrade( 'name', 'Annon' );
    $desktop->upgrade( 'description', '' );
    $desktop->revision = $deployRevision;

    try
    {
      if( $desktop->isNew() )
      {
      
        $orm->insert( $desktop );
        $this->protocol(array(
          'insert',
          'annon',
          'WbfsysDesktop',
          'Sucessfully created new Desktop Annon'
        ));
      }
      else
      {
        
        if( !$desktop->getSynchronized() )
        {
          $orm->update( $desktop );
          $this->protocol(array(
            'update',
            'annon',
            'WbfsysDesktop',
            'Sucessfully updated Desktop Annon'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'annon',
        'WbfsysDesktop',
        'Failed to sync Desktop Annon '.$e->getMessage()
      ));
    }
