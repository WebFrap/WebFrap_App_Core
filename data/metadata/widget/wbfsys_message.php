<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for widget: wbfsys_message
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $widget   = null;

    if( !$widget = $orm->getByKey( 'WbfsysWidget', 'wbfsys_message' ) )
    {
      $widget = new WbfsysWidget_Entity();
      $widget->access_key = 'wbfsys_message';
    }
    
    $widget->upgrade( 'name', 'Wbfsys Message' );
    $widget->upgrade( 'id_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_message' ) );
    $widget->upgrade( 'id_management', $orm->getByKey( 'WbfsysManagement', 'wbfsys_message' ) );
    $widget->upgrade( 'description', '' );
    $widget->revision    = $deployRevision;
    
    try
    {
      if( $widget->isNew() )
      {
      
        $orm->insert( $widget );
        $this->protocol(array(
          'insert',
          'wbfsys_message',
          'WbfsysWidget',
          'Sucessfully created new Widget wbfsys_message'
        ));
      }
      else
      {
        
        if( !$widget->getSynchronized() )
        {
          $orm->update( $widget );
          $this->protocol(array(
            'update',
            'wbfsys_message',
            'WbfsysWidget',
            'Sucessfully updated Widget wbfsys_message'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_message',
        'WbfsysWidget',
        'Failed to sync Widget wbfsys_message '.$e->getMessage()
      ));
    }
    