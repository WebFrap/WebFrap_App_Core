<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for widget: webfrap_action_log
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $widget   = null;

    if( !$widget = $orm->getByKey( 'WbfsysWidget', 'webfrap_action_log' ) )
    {
      $widget = new WbfsysWidget_Entity();
      $widget->access_key = 'webfrap_action_log';
    }
    
    $widget->upgrade( 'name', 'Webfrap Action Log' );
    $widget->upgrade( 'id_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_action_log' ) );
    $widget->upgrade( 'id_management', $orm->getByKey( 'WbfsysManagement', 'wbfsys_action_log' ) );
    $widget->upgrade( 'description', '' );
    $widget->revision    = $deployRevision;
    
    try
    {
      if( $widget->isNew() )
      {
      
        $orm->insert( $widget );
        $this->protocol(array(
          'insert',
          'webfrap_action_log',
          'WbfsysWidget',
          'Sucessfully created new Widget webfrap_action_log'
        ));
      }
      else
      {
        
        if( !$widget->getSynchronized() )
        {
          $orm->update( $widget );
          $this->protocol(array(
            'update',
            'webfrap_action_log',
            'WbfsysWidget',
            'Sucessfully updated Widget webfrap_action_log'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'webfrap_action_log',
        'WbfsysWidget',
        'Failed to sync Widget webfrap_action_log '.$e->getMessage()
      ));
    }
    