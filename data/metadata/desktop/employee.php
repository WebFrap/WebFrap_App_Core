<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for process: employee
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $desktop = null;

    if( !$desktop = $orm->getByKey( 'WbfsysDesktop', 'employee' ) )
    {
      $desktop = new WbfsysDesktop_Entity();
      $desktop->access_key = 'employee';
    }

    $desktop->upgrade( 'name', 'Employee' );
    $desktop->upgrade( 'description', '' );
    $desktop->revision = $deployRevision;

    try
    {
      if( $desktop->isNew() )
      {
      
        $orm->insert( $desktop );
        $this->protocol(array(
          'insert',
          'employee',
          'WbfsysDesktop',
          'Sucessfully created new Desktop Employee'
        ));
      }
      else
      {
        
        if( !$desktop->getSynchronized() )
        {
          $orm->update( $desktop );
          $this->protocol(array(
            'update',
            'employee',
            'WbfsysDesktop',
            'Sucessfully updated Desktop Employee'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'employee',
        'WbfsysDesktop',
        'Failed to sync Desktop Employee '.$e->getMessage()
      ));
    }
