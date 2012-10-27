<?php 
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_document_usage
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the entity
    $entity = null;

    if( !$entity = $orm->getByKey( 'WbfsysEntity', 'wbfsys_document_usage' ) )
    {
      $entity = new WbfsysEntity_Entity();
      $entity->access_key = 'wbfsys_document_usage';
    }
    
    $entity->upgrade( 'name', 'Document Usage' );
    $entity->upgrade( 'id_module', $orm->getByKey( 'WbfsysModule', 'wbfsys'  ) );
    $entity->upgrade( 'description', '' );
    $entity->upgrade( 'flag_index', false );
    $entity->upgrade( 'default_create', 'Wbfsys.DocumentUsage.create' );
    $entity->upgrade( 'default_edit', 'Wbfsys.DocumentUsage.edit' );
    $entity->upgrade( 'default_show', 'Wbfsys.DocumentUsage.show' );
    $entity->upgrade( 'default_list', 'Wbfsys.DocumentUsage.listing' );
    $entity->upgrade( 'default_selection', 'Wbfsys.DocumentUsage.selection' );
    $entity->upgrade( 'relevance', 's-3-r' );
    
    
    $entity->revision    = $deployRevision;
    
    try
    {
      if( $entity->isNew() )
      {
      
        $orm->insert( $entity );
        $this->protocol(array(
          'insert',
          'wbfsys_document_usage',
          'WbfsysEntity',
          'Sucessfully created new Entity wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$entity->getSynchronized() )
        {
          $orm->update( $entity );
          $this->protocol(array(
            'update',
            'wbfsys_document_usage',
            'WbfsysEntity',
            'Sucessfully updated Entity wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage',
        'WbfsysEntity',
        'Failed to sync Entity wbfsys_document_usage '.$e->getMessage()
      ));
    }


    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_document_usage';

      $secArea->label     = 'Entity: Document Usage';
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

    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mod-wbfsys' ) );
    $secArea->upgrade( 'parent_key', 'mod-wbfsys' );
    $secArea->upgrade( 'vid', $entity ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity' ) );
    $secArea->upgrade( 'type_key', 'entity' );
    $secArea->upgrade( 'description', "Security Area for Entity: Document Usage" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'mod-wbfsys',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'mod-wbfsys',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'mod-wbfsys',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_document_usage '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for category: wbfsys_document_usage::default
//////////////////////////////////////////////////////////////////////////////*/

    if( !$category = $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_document_usage-default' ) )
    {
      $category = new WbfsysEntityCategory_Entity();
      $category->access_key  = 'wbfsys_document_usage-default';
    }
    
    $category->upgrade( 'name', 'default' );
    $category->upgrade( 'id_entity', $entity );
    $category->revision    = $deployRevision;
    
    try
    {
      if( $category->isNew() )
      {
      
        $orm->insert( $category );
        $this->protocol(array(
          'insert',
          'wbfsys_document_usage-default',
          'WbfsysEntityCategory',
          'Sucessfully created new WbfsysEntityCategory wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$category->getSynchronized() )
        {
          $orm->update( $category );
          $this->protocol(array(
            'update',
            'wbfsys_document_usage-default',
            'WbfsysEntityCategory',
            'Sucessfully updated WbfsysEntityCategory wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage-default',
        'WbfsysEntityCategory',
        'Failed to sync WbfsysEntityCategory wbfsys_document_usage '.$e->getMessage()
      ));
    }

    $secArea = null;
    $secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage-cat-default' );

    if( !$secArea )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_document_usage-cat-default';

      $secArea->label     = 'Cat: default';
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

    $secArea->upgrade( 'm_parent', $orm->get( 'WbfsysSecurityArea', "upper(access_key)=upper('entity-wbfsys_document_usage')" ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_document_usage' );
    $secArea->upgrade( 'vid', $category );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_category' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_category' ) ); 
    $secArea->upgrade( 'type_key', 'entity_category' ); 
    $secArea->upgrade( 'description', "Category: default for Entity: Document Usage" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_document_usage-cat-default',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_document_usage-cat-default',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_document_usage-cat-default',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_document_usage '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for category: wbfsys_document_usage::meta
//////////////////////////////////////////////////////////////////////////////*/

    if( !$category = $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_document_usage-meta' ) )
    {
      $category = new WbfsysEntityCategory_Entity();
      $category->access_key  = 'wbfsys_document_usage-meta';
    }
    
    $category->upgrade( 'name', 'meta' );
    $category->upgrade( 'id_entity', $entity );
    $category->revision    = $deployRevision;
    
    try
    {
      if( $category->isNew() )
      {
      
        $orm->insert( $category );
        $this->protocol(array(
          'insert',
          'wbfsys_document_usage-meta',
          'WbfsysEntityCategory',
          'Sucessfully created new WbfsysEntityCategory wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$category->getSynchronized() )
        {
          $orm->update( $category );
          $this->protocol(array(
            'update',
            'wbfsys_document_usage-meta',
            'WbfsysEntityCategory',
            'Sucessfully updated WbfsysEntityCategory wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage-meta',
        'WbfsysEntityCategory',
        'Failed to sync WbfsysEntityCategory wbfsys_document_usage '.$e->getMessage()
      ));
    }

    $secArea = null;
    $secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage-cat-meta' );

    if( !$secArea )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_document_usage-cat-meta';

      $secArea->label     = 'Cat: meta';
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

    $secArea->upgrade( 'm_parent', $orm->get( 'WbfsysSecurityArea', "upper(access_key)=upper('entity-wbfsys_document_usage')" ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_document_usage' );
    $secArea->upgrade( 'vid', $category );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_category' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_category' ) ); 
    $secArea->upgrade( 'type_key', 'entity_category' ); 
    $secArea->upgrade( 'description', "Category: meta for Entity: Document Usage" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_document_usage-cat-meta',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_document_usage-cat-meta',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_document_usage-cat-meta',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_document_usage '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_document_usage::id_document
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_document_usage-id_document' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_document_usage-id_document';
    }
		
    $typeId = 0;
    $typeNode = $orm->getByKey( 'WbfsysEntityAttributeType', 'bigint' );
    
    if( $typeNode )
    {
    	$typeId = $typeNode->getId();
    }
    else
    {
    	Log::warn( "Missing attr type: bigint" );
    	Debug::console( "Missing attr type: bigint" );
    }
    
    $attribute->upgrade( 'id_type', $typeId );

    $attribute->upgrade( 'id_entity', $entity );
    $attribute->upgrade( 'name', 'Document' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_document_usage-default' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_document_usage-id_document',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_document_usage-id_document',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage-id_document',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_document_usage '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage-attr-id_document' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_document_usage-attr-id_document';

      
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

    $secArea->upgrade( 'label', 'Attr: Document' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_document_usage' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Document for Entity: Document Usage" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_document_usage-attr-id_document',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_document_usage-attr-id_document',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_document_usage '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_document_usage::vid
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_document_usage-vid' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_document_usage-vid';
    }
		
    $typeId = 0;
    $typeNode = $orm->getByKey( 'WbfsysEntityAttributeType', 'bigint' );
    
    if( $typeNode )
    {
    	$typeId = $typeNode->getId();
    }
    else
    {
    	Log::warn( "Missing attr type: bigint" );
    	Debug::console( "Missing attr type: bigint" );
    }
    
    $attribute->upgrade( 'id_type', $typeId );

    $attribute->upgrade( 'id_entity', $entity );
    $attribute->upgrade( 'name', 'VID' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_document_usage-default' ) );
    $attribute->upgrade( 'description', 'Virtual ID for a target dataset' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_document_usage-vid',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_document_usage-vid',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage-vid',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_document_usage '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage-attr-vid' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_document_usage-attr-vid';

      
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

    $secArea->upgrade( 'label', 'Attr: VID' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_document_usage' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: VID for Entity: Document Usage" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_document_usage-attr-vid',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_document_usage-attr-vid',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_document_usage '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_document_usage::id_vid_entity
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_document_usage-id_vid_entity' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_document_usage-id_vid_entity';
    }
		
    $typeId = 0;
    $typeNode = $orm->getByKey( 'WbfsysEntityAttributeType', 'bigint' );
    
    if( $typeNode )
    {
    	$typeId = $typeNode->getId();
    }
    else
    {
    	Log::warn( "Missing attr type: bigint" );
    	Debug::console( "Missing attr type: bigint" );
    }
    
    $attribute->upgrade( 'id_type', $typeId );

    $attribute->upgrade( 'id_entity', $entity );
    $attribute->upgrade( 'name', 'Entity' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_document_usage-default' ) );
    $attribute->upgrade( 'description', 'Reference to the entity for the virtual connection' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_document_usage-id_vid_entity',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_document_usage-id_vid_entity',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage-id_vid_entity',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_document_usage '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage-attr-id_vid_entity' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_document_usage-attr-id_vid_entity';

      
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

    $secArea->upgrade( 'label', 'Attr: Entity' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_document_usage' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Entity for Entity: Document Usage" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_document_usage-attr-id_vid_entity',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_document_usage-attr-id_vid_entity',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_document_usage '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_document_usage::rowid
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_document_usage-rowid' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_document_usage-rowid';
    }
		
    $typeId = 0;
    $typeNode = $orm->getByKey( 'WbfsysEntityAttributeType', 'bigint' );
    
    if( $typeNode )
    {
    	$typeId = $typeNode->getId();
    }
    else
    {
    	Log::warn( "Missing attr type: bigint" );
    	Debug::console( "Missing attr type: bigint" );
    }
    
    $attribute->upgrade( 'id_type', $typeId );

    $attribute->upgrade( 'id_entity', $entity );
    $attribute->upgrade( 'name', 'Rowid' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_document_usage-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_document_usage-rowid',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_document_usage-rowid',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage-rowid',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_document_usage '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage-attr-rowid' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_document_usage-attr-rowid';

      
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

    $secArea->upgrade( 'label', 'Attr: Rowid' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_document_usage' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Rowid for Entity: Document Usage" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_document_usage-attr-rowid',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_document_usage-attr-rowid',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_document_usage '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_document_usage::m_time_created
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_document_usage-m_time_created' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_document_usage-m_time_created';
    }
		
    $typeId = 0;
    $typeNode = $orm->getByKey( 'WbfsysEntityAttributeType', 'timestamp' );
    
    if( $typeNode )
    {
    	$typeId = $typeNode->getId();
    }
    else
    {
    	Log::warn( "Missing attr type: timestamp" );
    	Debug::console( "Missing attr type: timestamp" );
    }
    
    $attribute->upgrade( 'id_type', $typeId );

    $attribute->upgrade( 'id_entity', $entity );
    $attribute->upgrade( 'name', 'Time Created' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_document_usage-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_document_usage-m_time_created',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_document_usage-m_time_created',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage-m_time_created',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_document_usage '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage-attr-m_time_created' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_document_usage-attr-m_time_created';

      
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

    $secArea->upgrade( 'label', 'Attr: Time Created' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_document_usage' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Time Created for Entity: Document Usage" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_document_usage-attr-m_time_created',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_document_usage-attr-m_time_created',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_document_usage '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_document_usage::m_role_create
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_document_usage-m_role_create' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_document_usage-m_role_create';
    }
		
    $typeId = 0;
    $typeNode = $orm->getByKey( 'WbfsysEntityAttributeType', 'bigint' );
    
    if( $typeNode )
    {
    	$typeId = $typeNode->getId();
    }
    else
    {
    	Log::warn( "Missing attr type: bigint" );
    	Debug::console( "Missing attr type: bigint" );
    }
    
    $attribute->upgrade( 'id_type', $typeId );

    $attribute->upgrade( 'id_entity', $entity );
    $attribute->upgrade( 'name', 'Role Create' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_document_usage-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_document_usage-m_role_create',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_document_usage-m_role_create',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage-m_role_create',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_document_usage '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage-attr-m_role_create' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_document_usage-attr-m_role_create';

      
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

    $secArea->upgrade( 'label', 'Attr: Role Create' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_document_usage' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Role Create for Entity: Document Usage" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_document_usage-attr-m_role_create',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_document_usage-attr-m_role_create',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_document_usage '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_document_usage::m_time_changed
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_document_usage-m_time_changed' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_document_usage-m_time_changed';
    }
		
    $typeId = 0;
    $typeNode = $orm->getByKey( 'WbfsysEntityAttributeType', 'timestamp' );
    
    if( $typeNode )
    {
    	$typeId = $typeNode->getId();
    }
    else
    {
    	Log::warn( "Missing attr type: timestamp" );
    	Debug::console( "Missing attr type: timestamp" );
    }
    
    $attribute->upgrade( 'id_type', $typeId );

    $attribute->upgrade( 'id_entity', $entity );
    $attribute->upgrade( 'name', 'Time Changed' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_document_usage-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_document_usage-m_time_changed',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_document_usage-m_time_changed',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage-m_time_changed',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_document_usage '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage-attr-m_time_changed' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_document_usage-attr-m_time_changed';

      
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

    $secArea->upgrade( 'label', 'Attr: Time Changed' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_document_usage' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Time Changed for Entity: Document Usage" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_document_usage-attr-m_time_changed',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_document_usage-attr-m_time_changed',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_document_usage '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_document_usage::m_role_change
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_document_usage-m_role_change' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_document_usage-m_role_change';
    }
		
    $typeId = 0;
    $typeNode = $orm->getByKey( 'WbfsysEntityAttributeType', 'bigint' );
    
    if( $typeNode )
    {
    	$typeId = $typeNode->getId();
    }
    else
    {
    	Log::warn( "Missing attr type: bigint" );
    	Debug::console( "Missing attr type: bigint" );
    }
    
    $attribute->upgrade( 'id_type', $typeId );

    $attribute->upgrade( 'id_entity', $entity );
    $attribute->upgrade( 'name', 'Role Change' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_document_usage-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_document_usage-m_role_change',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_document_usage-m_role_change',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage-m_role_change',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_document_usage '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage-attr-m_role_change' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_document_usage-attr-m_role_change';

      
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

    $secArea->upgrade( 'label', 'Attr: Role Change' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_document_usage' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Role Change for Entity: Document Usage" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_document_usage-attr-m_role_change',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_document_usage-attr-m_role_change',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_document_usage '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_document_usage::m_version
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_document_usage-m_version' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_document_usage-m_version';
    }
		
    $typeId = 0;
    $typeNode = $orm->getByKey( 'WbfsysEntityAttributeType', 'integer' );
    
    if( $typeNode )
    {
    	$typeId = $typeNode->getId();
    }
    else
    {
    	Log::warn( "Missing attr type: integer" );
    	Debug::console( "Missing attr type: integer" );
    }
    
    $attribute->upgrade( 'id_type', $typeId );

    $attribute->upgrade( 'id_entity', $entity );
    $attribute->upgrade( 'name', 'Version' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_document_usage-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_document_usage-m_version',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_document_usage-m_version',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage-m_version',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_document_usage '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage-attr-m_version' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_document_usage-attr-m_version';

      
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

    $secArea->upgrade( 'label', 'Attr: Version' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_document_usage' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Version for Entity: Document Usage" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_document_usage-attr-m_version',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_document_usage-attr-m_version',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_document_usage '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_document_usage::m_uuid
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_document_usage-m_uuid' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_document_usage-m_uuid';
    }
		
    $typeId = 0;
    $typeNode = $orm->getByKey( 'WbfsysEntityAttributeType', 'uuid' );
    
    if( $typeNode )
    {
    	$typeId = $typeNode->getId();
    }
    else
    {
    	Log::warn( "Missing attr type: uuid" );
    	Debug::console( "Missing attr type: uuid" );
    }
    
    $attribute->upgrade( 'id_type', $typeId );

    $attribute->upgrade( 'id_entity', $entity );
    $attribute->upgrade( 'name', 'Uuid' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_document_usage-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_document_usage-m_uuid',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_document_usage-m_uuid',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage-m_uuid',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_document_usage '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage-attr-m_uuid' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_document_usage-attr-m_uuid';

      
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

    $secArea->upgrade( 'label', 'Attr: Uuid' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_document_usage' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_document_usage' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Uuid for Entity: Document Usage" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_document_usage-attr-m_uuid',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_document_usage'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_document_usage-attr-m_uuid',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_document_usage'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_document_usage',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_document_usage '.$e->getMessage()
      ));
    }
