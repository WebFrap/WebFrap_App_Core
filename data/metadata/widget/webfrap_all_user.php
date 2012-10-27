<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for widget: webfrap_all_user
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $widget   = null;

    if( !$widget = $orm->getByKey( 'WbfsysWidget', 'webfrap_all_user' ) )
    {
      $widget = new WbfsysWidget_Entity();
      $widget->access_key = 'webfrap_all_user';
    }
    
    $widget->upgrade( 'name', 'Webfrap All User' );
    $widget->upgrade( 'id_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_role_user' ) );
    $widget->upgrade( 'id_management', $orm->getByKey( 'WbfsysManagement', 'wbfsys_role_user' ) );
    $widget->upgrade( 'description', '' );
    $widget->revision    = $deployRevision;
    
    try
    {
      if( $widget->isNew() )
      {
      
        $orm->insert( $widget );
        $this->protocol(array(
          'insert',
          'webfrap_all_user',
          'WbfsysWidget',
          'Sucessfully created new Widget webfrap_all_user'
        ));
      }
      else
      {
        
        if( !$widget->getSynchronized() )
        {
          $orm->update( $widget );
          $this->protocol(array(
            'update',
            'webfrap_all_user',
            'WbfsysWidget',
            'Sucessfully updated Widget webfrap_all_user'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'webfrap_all_user',
        'WbfsysWidget',
        'Failed to sync Widget webfrap_all_user '.$e->getMessage()
      ));
    }
    