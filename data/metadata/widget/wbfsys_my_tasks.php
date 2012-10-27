<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for widget: wbfsys_my_tasks
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $widget   = null;

    if( !$widget = $orm->getByKey( 'WbfsysWidget', 'wbfsys_my_tasks' ) )
    {
      $widget = new WbfsysWidget_Entity();
      $widget->access_key = 'wbfsys_my_tasks';
    }
    
    $widget->upgrade( 'name', 'Wbfsys My Tasks' );
    $widget->upgrade( 'id_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_task' ) );
    $widget->upgrade( 'id_management', $orm->getByKey( 'WbfsysManagement', 'wbfsys_task' ) );
    $widget->upgrade( 'description', '' );
    $widget->revision    = $deployRevision;
    
    try
    {
      if( $widget->isNew() )
      {
      
        $orm->insert( $widget );
        $this->protocol(array(
          'insert',
          'wbfsys_my_tasks',
          'WbfsysWidget',
          'Sucessfully created new Widget wbfsys_my_tasks'
        ));
      }
      else
      {
        
        if( !$widget->getSynchronized() )
        {
          $orm->update( $widget );
          $this->protocol(array(
            'update',
            'wbfsys_my_tasks',
            'WbfsysWidget',
            'Sucessfully updated Widget wbfsys_my_tasks'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_my_tasks',
        'WbfsysWidget',
        'Failed to sync Widget wbfsys_my_tasks '.$e->getMessage()
      ));
    }
    