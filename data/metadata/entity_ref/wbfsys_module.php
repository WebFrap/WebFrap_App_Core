<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_module::entity
//////////////////////////////////////////////////////////////////////////////*/

    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_module-entity' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_module-entity';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_module' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_module-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_entity-id_module' )?:0;
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
          'wbfsys_module-entity',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_module-entity'
        ));
      }
      else
      {
        $orm->update( $ref );
        $this->protocol(array(
          'update',
          'wbfsys_module-entity',
          'WbfsysEntityReference',
          'Sucessfully updated WbfsysEntityReference wbfsys_module-entity'
        ));
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_module-entity',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_module-entity '.$e->getMessage()
      ));
    }

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_module-ref-entity' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_module-ref-entity';

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
    $secArea->upgrade( 'label', 'S: Entity' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_module' ) ); 
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_module' ) ); 
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_module' );
    $secArea->upgrade( 'vid', $ref ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );   
    $secArea->upgrade( 'description', "Reference: entity on Entity: wbfsys_module to Entity: wbfsys_entity" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_module-ref-entity',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_module'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_module-ref-entity',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_module'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_module-ref-entity',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_module '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_module::management
//////////////////////////////////////////////////////////////////////////////*/

    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_module-management' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_module-management';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_module' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_module-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_management' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_management-id_module' )?:0;
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
          'wbfsys_module-management',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_module-management'
        ));
      }
      else
      {
        $orm->update( $ref );
        $this->protocol(array(
          'update',
          'wbfsys_module-management',
          'WbfsysEntityReference',
          'Sucessfully updated WbfsysEntityReference wbfsys_module-management'
        ));
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_module-management',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_module-management '.$e->getMessage()
      ));
    }

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_module-ref-management' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_module-ref-management';

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
    $secArea->upgrade( 'label', 'S: Management' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_module' ) ); 
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_module' ) ); 
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_module' );
    $secArea->upgrade( 'vid', $ref ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );   
    $secArea->upgrade( 'description', "Reference: management on Entity: wbfsys_module to Entity: wbfsys_management" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_module-ref-management',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_module'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_module-ref-management',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_module'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_module-ref-management',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_module '.$e->getMessage()
      ));
    }
