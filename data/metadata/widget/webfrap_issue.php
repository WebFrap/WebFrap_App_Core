<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for widget: webfrap_issue
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $widget   = null;

    if( !$widget = $orm->getByKey( 'WbfsysWidget', 'webfrap_issue' ) )
    {
      $widget = new WbfsysWidget_Entity();
      $widget->access_key = 'webfrap_issue';
    }
    
    $widget->upgrade( 'name', 'Webfrap Issue' );
    $widget->upgrade( 'id_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_issue' ) );
    $widget->upgrade( 'id_management', $orm->getByKey( 'WbfsysManagement', 'wbfsys_issue' ) );
    $widget->upgrade( 'description', '' );
    $widget->revision    = $deployRevision;
    
    try
    {
      if( $widget->isNew() )
      {
      
        $orm->insert( $widget );
        $this->protocol(array(
          'insert',
          'webfrap_issue',
          'WbfsysWidget',
          'Sucessfully created new Widget webfrap_issue'
        ));
      }
      else
      {
        
        if( !$widget->getSynchronized() )
        {
          $orm->update( $widget );
          $this->protocol(array(
            'update',
            'webfrap_issue',
            'WbfsysWidget',
            'Sucessfully updated Widget webfrap_issue'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'webfrap_issue',
        'WbfsysWidget',
        'Failed to sync Widget webfrap_issue '.$e->getMessage()
      ));
    }
    