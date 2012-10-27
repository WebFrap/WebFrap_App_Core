<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for widget: webfrap_all_group
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $widget   = null;

    if( !$widget = $orm->getByKey( 'WbfsysWidget', 'webfrap_all_group' ) )
    {
      $widget = new WbfsysWidget_Entity();
      $widget->access_key = 'webfrap_all_group';
    }
    
    $widget->upgrade( 'name', 'Webfrap All Group' );
    $widget->upgrade( 'id_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_role_group' ) );
    $widget->upgrade( 'id_management', $orm->getByKey( 'WbfsysManagement', 'wbfsys_role_group' ) );
    $widget->upgrade( 'description', '' );
    $widget->revision    = $deployRevision;
    
    try
    {
      if( $widget->isNew() )
      {
      
        $orm->insert( $widget );
        $this->protocol(array(
          'insert',
          'webfrap_all_group',
          'WbfsysWidget',
          'Sucessfully created new Widget webfrap_all_group'
        ));
      }
      else
      {
        
        if( !$widget->getSynchronized() )
        {
          $orm->update( $widget );
          $this->protocol(array(
            'update',
            'webfrap_all_group',
            'WbfsysWidget',
            'Sucessfully updated Widget webfrap_all_group'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'webfrap_all_group',
        'WbfsysWidget',
        'Failed to sync Widget webfrap_all_group '.$e->getMessage()
      ));
    }
    