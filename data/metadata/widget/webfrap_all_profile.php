<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for widget: webfrap_all_profile
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $widget   = null;

    if( !$widget = $orm->getByKey( 'WbfsysWidget', 'webfrap_all_profile' ) )
    {
      $widget = new WbfsysWidget_Entity();
      $widget->access_key = 'webfrap_all_profile';
    }
    
    $widget->upgrade( 'name', 'Webfrap All Profile' );
    $widget->upgrade( 'id_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_profile' ) );
    $widget->upgrade( 'id_management', $orm->getByKey( 'WbfsysManagement', 'wbfsys_profile' ) );
    $widget->upgrade( 'description', '' );
    $widget->revision    = $deployRevision;
    
    try
    {
      if( $widget->isNew() )
      {
      
        $orm->insert( $widget );
        $this->protocol(array(
          'insert',
          'webfrap_all_profile',
          'WbfsysWidget',
          'Sucessfully created new Widget webfrap_all_profile'
        ));
      }
      else
      {
        
        if( !$widget->getSynchronized() )
        {
          $orm->update( $widget );
          $this->protocol(array(
            'update',
            'webfrap_all_profile',
            'WbfsysWidget',
            'Sucessfully updated Widget webfrap_all_profile'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'webfrap_all_profile',
        'WbfsysWidget',
        'Failed to sync Widget webfrap_all_profile '.$e->getMessage()
      ));
    }
    