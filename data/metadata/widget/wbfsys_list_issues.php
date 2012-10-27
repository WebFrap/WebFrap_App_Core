<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for widget: wbfsys_list_issues
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the old data
    $widget   = null;

    if( !$widget = $orm->getByKey( 'WbfsysWidget', 'wbfsys_list_issues' ) )
    {
      $widget = new WbfsysWidget_Entity();
      $widget->access_key = 'wbfsys_list_issues';
    }
    
    $widget->upgrade( 'name', 'Wbfsys List Issues' );
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
          'wbfsys_list_issues',
          'WbfsysWidget',
          'Sucessfully created new Widget wbfsys_list_issues'
        ));
      }
      else
      {
        
        if( !$widget->getSynchronized() )
        {
          $orm->update( $widget );
          $this->protocol(array(
            'update',
            'wbfsys_list_issues',
            'WbfsysWidget',
            'Sucessfully updated Widget wbfsys_list_issues'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_list_issues',
        'WbfsysWidget',
        'Failed to sync Widget wbfsys_list_issues '.$e->getMessage()
      ));
    }
    