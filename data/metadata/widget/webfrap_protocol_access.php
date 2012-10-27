<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for widget: webfrap_protocol_access
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $widget   = null;

    if( !$widget = $orm->getByKey( 'WbfsysWidget', 'webfrap_protocol_access' ) )
    {
      $widget = new WbfsysWidget_Entity();
      $widget->access_key = 'webfrap_protocol_access';
    }
    
    $widget->upgrade( 'name', 'Webfrap Protocol Access' );
    $widget->upgrade( 'id_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_protocol_access' ) );
    $widget->upgrade( 'id_management', $orm->getByKey( 'WbfsysManagement', 'wbfsys_protocol_access' ) );
    $widget->upgrade( 'description', '' );
    $widget->revision    = $deployRevision;
    
    try
    {
      if( $widget->isNew() )
      {
      
        $orm->insert( $widget );
        $this->protocol(array(
          'insert',
          'webfrap_protocol_access',
          'WbfsysWidget',
          'Sucessfully created new Widget webfrap_protocol_access'
        ));
      }
      else
      {
        
        if( !$widget->getSynchronized() )
        {
          $orm->update( $widget );
          $this->protocol(array(
            'update',
            'webfrap_protocol_access',
            'WbfsysWidget',
            'Sucessfully updated Widget webfrap_protocol_access'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'webfrap_protocol_access',
        'WbfsysWidget',
        'Failed to sync Widget webfrap_protocol_access '.$e->getMessage()
      ));
    }
    