<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_dashboard::widgets
//////////////////////////////////////////////////////////////////////////////*/
    
    // reference wbfsys_dashboard-con-widgets
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_dashboard-con-widgets' ) )
    {

      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_dashboard-con-widgets';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_menu_entry' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_menu_entry-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_dashboard_widget' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_dashboard_widget-id_widget' )?:0;
      $ref->description    = 'Virtual reference to implement the ACL path';
    }
    $ref->revision        = $deployRevision;
    
    try
    {
      if( $ref->isNew() )
      {
      
        $orm->insert( $ref );
        $this->protocol(array(
          'insert',
          'wbfsys_dashboard-con-widgets',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_dashboard-con-widgets'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_dashboard-con-widgets',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_dashboard-con-widgets'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_dashboard-con-widgets',
        'WbfsysEntityReference',
        'Failed to create WbfsysEntityReference wbfsys_dashboard-con-widgets '.$e->getMessage()
      ));
    }
    
    // reference wbfsys_dashboard-widgets
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_dashboard-widgets' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_dashboard-widgets';

      $ref->id_to       = $orm->get( 'WbfsysEntity', "access_key='wbfsys_dashboard'" )?:0;
      $ref->id_field_to = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_dashboard-rowid'" )?:0;
      $ref->id_from        = $orm->get( 'WbfsysEntity', "access_key='wbfsys_dashboard_widget'" )?:0;
      $ref->id_field_from  = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_dashboard_widget-id_dashboard'" )?:0;
      $ref->description    = '';
    }
    
    $ref->revision        = $deployRevision;
    try
    {
      if( $ref->isNew() )
      {
      
        $orm->insert( $ref );
        $this->protocol(array(
          'insert',
          'wbfsys_dashboard-widgets',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_dashboard-widgets'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_dashboard-widgets',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_dashboard-widgets'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_dashboard-widgets',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_dashboard-widgets '.$e->getMessage()
      ));
    }

    
    // um den bezug im pfad nicht zu verlieren wird eine virtuelle security area benötigt
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_dashboard_widget-space-wbfsys_dashboard-widgets' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_dashboard_widget-space-wbfsys_dashboard-widgets';

      $secArea->id_level_listing   = 90;
      $secArea->id_level_access    = 90;
      $secArea->id_level_insert    = 90;
      $secArea->id_level_update    = 90;
      $secArea->id_level_delete    = 90;
      $secArea->id_level_admin     = 90;

      $secArea->id_ref_listing   = 90;
      $secArea->id_ref_access    = 90;
      $secArea->id_ref_insert    = 90;
      $secArea->id_ref_update    = 90;
      $secArea->id_ref_delete    = 90;
      $secArea->id_ref_admin     = 90;

    }
    
    // upgrade the data if something has changed
    $secArea->upgrade( 'label', 'E-V-Entity: Dashboard Widget' );

    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mod-Wbfsys' )  );
    $secArea->upgrade( 'parent_key', 'mod-Wbfsys' );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntity', 'wbfsys_dashboard_widget' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity' ) );   
    $secArea->upgrade( 'type_key', 'space_entity' );  
    $secArea->upgrade( 'description', "Virt. Entity: <span title=\"entity-wbfsys_dashboard_widget-space-wbfsys_dashboard-widgets\" >Dashboard Widget<span> in Space Dashboard Ref: Widgets" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_dashboard_widget-space-wbfsys_dashboard-widgets',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_dashboard'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_dashboard_widget-space-wbfsys_dashboard-widgets',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_dashboard'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_dashboard_widget-space-wbfsys_dashboard-widgets',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_dashboard '.$e->getMessage()
      ));
    }

    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_dashboard-ref-widgets' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_dashboard-ref-widgets';

      $secArea->id_level_listing   = 90;
      $secArea->id_level_access = 90;
      $secArea->id_level_insert = 90;
      $secArea->id_level_update = 90;
      $secArea->id_level_delete = 90;
      $secArea->id_level_admin  = 90;

      $secArea->id_ref_listing   = 90;
      $secArea->id_ref_access    = 90;
      $secArea->id_ref_insert    = 90;
      $secArea->id_ref_update    = 90;
      $secArea->id_ref_delete    = 90;
      $secArea->id_ref_admin     = 90;
      
    }
    
    // upgrade the data if something has changed
    $secArea->upgrade( 'label', 'E-M-Ref: Widgets' );
    
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_menu_entry' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_menu_entry' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_dashboard_widget-space-wbfsys_dashboard-widgets' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_dashboard-widgets' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-M-Ref: <span title=\"entity-wbfsys_dashboard-ref-widgets\" >wbfsys_dashboard::widgets</span> to Entity: wbfsys_menu_entry Con: wbfsys_dashboard_widget" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_dashboard-ref-widgets',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_dashboard'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_dashboard-ref-widgets',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_dashboard'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_dashboard-ref-widgets',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_dashboard '.$e->getMessage()
      ));
    }

    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_dashboard-conref-widgets' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_dashboard-conref-widgets';


      $secArea->id_level_listing = 90;
      $secArea->id_level_access = 90;
      $secArea->id_level_insert = 90;
      $secArea->id_level_update = 90;
      $secArea->id_level_delete = 90;
      $secArea->id_level_admin  = 90;

      $secArea->id_ref_listing   = 90;
      $secArea->id_ref_access    = 90;
      $secArea->id_ref_insert    = 90;
      $secArea->id_ref_update    = 90;
      $secArea->id_ref_delete    = 90;
      $secArea->id_ref_admin     = 90;
    }
    
    // upgrade the data if something has changed
    $secArea->upgrade( 'label', 'E-V-Ref: Widgets' );
    
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_menu_entry' )  );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_menu_entry' );  
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_dashboard_widget-space-wbfsys_dashboard-widgets' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_dashboard-con-widgets' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-V-Ref: <span title=\"entity-wbfsys_dashboard-conref-widgets\" >wbfsys_dashboard::widgets</span> over Con: wbfsys_dashboard_widget to Entity: wbfsys_menu_entry" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_dashboard-conref-widgets',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_dashboard'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_dashboard-conref-widgets',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_dashboard'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_dashboard-conref-widgets',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_dashboard '.$e->getMessage()
      ));
    }
