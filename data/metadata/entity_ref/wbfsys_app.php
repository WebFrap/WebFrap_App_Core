<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_app::app_modules
//////////////////////////////////////////////////////////////////////////////*/
    
    // reference wbfsys_app-con-app_modules
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_app-con-app_modules' ) )
    {

      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_app-con-app_modules';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_module' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_module-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_app_modules' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_app_modules-id_module' )?:0;
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
          'wbfsys_app-con-app_modules',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_app-con-app_modules'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_app-con-app_modules',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_app-con-app_modules'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_app-con-app_modules',
        'WbfsysEntityReference',
        'Failed to create WbfsysEntityReference wbfsys_app-con-app_modules '.$e->getMessage()
      ));
    }
    
    // reference wbfsys_app-app_modules
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_app-app_modules' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_app-app_modules';

      $ref->id_to       = $orm->get( 'WbfsysEntity', "access_key='wbfsys_app'" )?:0;
      $ref->id_field_to = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_app-rowid'" )?:0;
      $ref->id_from        = $orm->get( 'WbfsysEntity', "access_key='wbfsys_app_modules'" )?:0;
      $ref->id_field_from  = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_app_modules-id_app'" )?:0;
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
          'wbfsys_app-app_modules',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_app-app_modules'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_app-app_modules',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_app-app_modules'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_app-app_modules',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_app-app_modules '.$e->getMessage()
      ));
    }

    
    // um den bezug im pfad nicht zu verlieren wird eine virtuelle security area benötigt
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_app_modules-space-wbfsys_app-app_modules' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_app_modules-space-wbfsys_app-app_modules';

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
    $secArea->upgrade( 'label', 'E-V-Entity: App Modules' );

    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mod-Wbfsys' )  );
    $secArea->upgrade( 'parent_key', 'mod-Wbfsys' );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntity', 'wbfsys_app_modules' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity' ) );   
    $secArea->upgrade( 'type_key', 'space_entity' );  
    $secArea->upgrade( 'description', "Virt. Entity: <span title=\"entity-wbfsys_app_modules-space-wbfsys_app-app_modules\" >App Modules<span> in Space App Ref: Modules" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_app_modules-space-wbfsys_app-app_modules',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_app'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_app_modules-space-wbfsys_app-app_modules',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_app'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_app_modules-space-wbfsys_app-app_modules',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_app '.$e->getMessage()
      ));
    }

    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_app-ref-app_modules' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_app-ref-app_modules';

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
    $secArea->upgrade( 'label', 'E-M-Ref: Modules' );
    
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_module' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_module' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_app_modules-space-wbfsys_app-app_modules' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_app-app_modules' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-M-Ref: <span title=\"entity-wbfsys_app-ref-app_modules\" >wbfsys_app::app_modules</span> to Entity: wbfsys_module Con: wbfsys_app_modules" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_app-ref-app_modules',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_app'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_app-ref-app_modules',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_app'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_app-ref-app_modules',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_app '.$e->getMessage()
      ));
    }

    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_app-conref-app_modules' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_app-conref-app_modules';


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
    $secArea->upgrade( 'label', 'E-V-Ref: Modules' );
    
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_module' )  );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_module' );  
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_app_modules-space-wbfsys_app-app_modules' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_app-con-app_modules' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-V-Ref: <span title=\"entity-wbfsys_app-conref-app_modules\" >wbfsys_app::app_modules</span> over Con: wbfsys_app_modules to Entity: wbfsys_module" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_app-conref-app_modules',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_app'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_app-conref-app_modules',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_app'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_app-conref-app_modules',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_app '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_app::desktops
//////////////////////////////////////////////////////////////////////////////*/

    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_app-desktops' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_app-desktops';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_app' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_app-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_desktop' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_desktop-id_app' )?:0;
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
          'wbfsys_app-desktops',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_app-desktops'
        ));
      }
      else
      {
        $orm->update( $ref );
        $this->protocol(array(
          'update',
          'wbfsys_app-desktops',
          'WbfsysEntityReference',
          'Sucessfully updated WbfsysEntityReference wbfsys_app-desktops'
        ));
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_app-desktops',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_app-desktops '.$e->getMessage()
      ));
    }

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_app-ref-desktops' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_app-ref-desktops';

      $secArea->id_level_listing = 90;
      $secArea->id_level_access = 90;
      $secArea->id_level_insert = 90;
      $secArea->id_level_update = 90;
      $secArea->id_level_delete = 90;
      $secArea->id_level_admin  = 90;

      $secArea->id_ref_listing = 90;
      $secArea->id_ref_access  = 90;
      $secArea->id_ref_insert  = 90;
      $secArea->id_ref_update  = 90;
      $secArea->id_ref_delete  = 90;
      $secArea->id_ref_admin   = 90;

    }
    
    // upgrade the data if something has changed
    $secArea->upgrade( 'label', 'S: Desktops' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_app' ) ); 
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_app' ) ); 
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_app' );
    $secArea->upgrade( 'vid', $ref ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );   
    $secArea->upgrade( 'description', "Reference: desktops on Entity: wbfsys_app to Entity: wbfsys_desktop" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_app-ref-desktops',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_app'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_app-ref-desktops',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_app'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_app-ref-desktops',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_app '.$e->getMessage()
      ));
    }
