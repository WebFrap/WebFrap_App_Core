<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for widget: wbfsys_announcement
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $widget   = null;

    if( !$widget = $orm->getByKey( 'WbfsysWidget', 'wbfsys_announcement' ) )
    {
      $widget = new WbfsysWidget_Entity();
      $widget->access_key = 'wbfsys_announcement';
    }
    
    $widget->upgrade( 'name', 'Wbfsys Announcement' );
    $widget->upgrade( 'id_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_announcement' ) );
    $widget->upgrade( 'id_management', $orm->getByKey( 'WbfsysManagement', 'wbfsys_announcement' ) );
    $widget->upgrade( 'description', '' );
    $widget->revision    = $deployRevision;
    
    try
    {
      if( $widget->isNew() )
      {
      
        $orm->insert( $widget );
        $this->protocol(array(
          'insert',
          'wbfsys_announcement',
          'WbfsysWidget',
          'Sucessfully created new Widget wbfsys_announcement'
        ));
      }
      else
      {
        
        if( !$widget->getSynchronized() )
        {
          $orm->update( $widget );
          $this->protocol(array(
            'update',
            'wbfsys_announcement',
            'WbfsysWidget',
            'Sucessfully updated Widget wbfsys_announcement'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_announcement',
        'WbfsysWidget',
        'Failed to sync Widget wbfsys_announcement '.$e->getMessage()
      ));
    }
    