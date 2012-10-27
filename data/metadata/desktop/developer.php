<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for process: developer
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $desktop = null;

    if( !$desktop = $orm->getByKey( 'WbfsysDesktop', 'developer' ) )
    {
      $desktop = new WbfsysDesktop_Entity();
      $desktop->access_key = 'developer';
    }

    $desktop->upgrade( 'name', 'Developer' );
    $desktop->upgrade( 'description', '' );
    $desktop->revision = $deployRevision;

    try
    {
      if( $desktop->isNew() )
      {
      
        $orm->insert( $desktop );
        $this->protocol(array(
          'insert',
          'developer',
          'WbfsysDesktop',
          'Sucessfully created new Desktop Developer'
        ));
      }
      else
      {
        
        if( !$desktop->getSynchronized() )
        {
          $orm->update( $desktop );
          $this->protocol(array(
            'update',
            'developer',
            'WbfsysDesktop',
            'Sucessfully updated Desktop Developer'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'developer',
        'WbfsysDesktop',
        'Failed to sync Desktop Developer '.$e->getMessage()
      ));
    }
