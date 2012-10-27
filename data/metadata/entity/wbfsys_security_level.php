<?php 
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_security_level
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the entity
    $entity = null;

    if( !$entity = $orm->getByKey( 'WbfsysEntity', 'wbfsys_security_level' ) )
    {
      $entity = new WbfsysEntity_Entity();
      $entity->access_key = 'wbfsys_security_level';
    }
    
    $entity->upgrade( 'name', 'Security Level' );
    $entity->upgrade( 'id_module', $orm->getByKey( 'WbfsysModule', 'wbfsys'  ) );
    $entity->upgrade( 'description', '' );
    $entity->upgrade( 'flag_index', false );
    $entity->upgrade( 'default_create', 'Wbfsys.SecurityLevel.create' );
    $entity->upgrade( 'default_edit', 'Wbfsys.SecurityLevel.edit' );
    $entity->upgrade( 'default_show', 'Wbfsys.SecurityLevel.show' );
    $entity->upgrade( 'default_list', 'Wbfsys.SecurityLevel.listing' );
    $entity->upgrade( 'default_selection', 'Wbfsys.SecurityLevel.selection' );
    $entity->upgrade( 'relevance', 's-4' );
    
    
    $entity->revision    = $deployRevision;
    
    try
    {
      if( $entity->isNew() )
      {
      
        $orm->insert( $entity );
        $this->protocol(array(
          'insert',
          'wbfsys_security_level',
          'WbfsysEntity',
          'Sucessfully created new Entity wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$entity->getSynchronized() )
        {
          $orm->update( $entity );
          $this->protocol(array(
            'update',
            'wbfsys_security_level',
            'WbfsysEntity',
            'Sucessfully updated Entity wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysEntity',
        'Failed to sync Entity wbfsys_security_level '.$e->getMessage()
      ));
    }


    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_security_level';

      $secArea->label     = 'Entity: Security Level';
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
    $secArea->upgrade( 'description', "Security Area for Entity: Security Level" );
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
          'Sucessfully created new SecurityArea wbfsys_security_level'
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
            'Sucessfully updated SecurityArea wbfsys_security_level'
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
        'Failed to sync SecurityArea wbfsys_security_level '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for category: wbfsys_security_level::default
//////////////////////////////////////////////////////////////////////////////*/

    if( !$category = $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_security_level-default' ) )
    {
      $category = new WbfsysEntityCategory_Entity();
      $category->access_key  = 'wbfsys_security_level-default';
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
          'wbfsys_security_level-default',
          'WbfsysEntityCategory',
          'Sucessfully created new WbfsysEntityCategory wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$category->getSynchronized() )
        {
          $orm->update( $category );
          $this->protocol(array(
            'update',
            'wbfsys_security_level-default',
            'WbfsysEntityCategory',
            'Sucessfully updated WbfsysEntityCategory wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level-default',
        'WbfsysEntityCategory',
        'Failed to sync WbfsysEntityCategory wbfsys_security_level '.$e->getMessage()
      ));
    }

    $secArea = null;
    $secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level-cat-default' );

    if( !$secArea )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_security_level-cat-default';

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

    $secArea->upgrade( 'm_parent', $orm->get( 'WbfsysSecurityArea', "upper(access_key)=upper('entity-wbfsys_security_level')" ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_security_level' );
    $secArea->upgrade( 'vid', $category );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_category' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_category' ) ); 
    $secArea->upgrade( 'type_key', 'entity_category' ); 
    $secArea->upgrade( 'description', "Category: default for Entity: Security Level" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_security_level-cat-default',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_security_level-cat-default',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_security_level-cat-default',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_security_level '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for category: wbfsys_security_level::description
//////////////////////////////////////////////////////////////////////////////*/

    if( !$category = $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_security_level-description' ) )
    {
      $category = new WbfsysEntityCategory_Entity();
      $category->access_key  = 'wbfsys_security_level-description';
    }
    
    $category->upgrade( 'name', 'description' );
    $category->upgrade( 'id_entity', $entity );
    $category->revision    = $deployRevision;
    
    try
    {
      if( $category->isNew() )
      {
      
        $orm->insert( $category );
        $this->protocol(array(
          'insert',
          'wbfsys_security_level-description',
          'WbfsysEntityCategory',
          'Sucessfully created new WbfsysEntityCategory wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$category->getSynchronized() )
        {
          $orm->update( $category );
          $this->protocol(array(
            'update',
            'wbfsys_security_level-description',
            'WbfsysEntityCategory',
            'Sucessfully updated WbfsysEntityCategory wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level-description',
        'WbfsysEntityCategory',
        'Failed to sync WbfsysEntityCategory wbfsys_security_level '.$e->getMessage()
      ));
    }

    $secArea = null;
    $secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level-cat-description' );

    if( !$secArea )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_security_level-cat-description';

      $secArea->label     = 'Cat: description';
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

    $secArea->upgrade( 'm_parent', $orm->get( 'WbfsysSecurityArea', "upper(access_key)=upper('entity-wbfsys_security_level')" ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_security_level' );
    $secArea->upgrade( 'vid', $category );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_category' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_category' ) ); 
    $secArea->upgrade( 'type_key', 'entity_category' ); 
    $secArea->upgrade( 'description', "Category: description for Entity: Security Level" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_security_level-cat-description',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_security_level-cat-description',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_security_level-cat-description',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_security_level '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for category: wbfsys_security_level::meta
//////////////////////////////////////////////////////////////////////////////*/

    if( !$category = $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_security_level-meta' ) )
    {
      $category = new WbfsysEntityCategory_Entity();
      $category->access_key  = 'wbfsys_security_level-meta';
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
          'wbfsys_security_level-meta',
          'WbfsysEntityCategory',
          'Sucessfully created new WbfsysEntityCategory wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$category->getSynchronized() )
        {
          $orm->update( $category );
          $this->protocol(array(
            'update',
            'wbfsys_security_level-meta',
            'WbfsysEntityCategory',
            'Sucessfully updated WbfsysEntityCategory wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level-meta',
        'WbfsysEntityCategory',
        'Failed to sync WbfsysEntityCategory wbfsys_security_level '.$e->getMessage()
      ));
    }

    $secArea = null;
    $secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level-cat-meta' );

    if( !$secArea )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_security_level-cat-meta';

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

    $secArea->upgrade( 'm_parent', $orm->get( 'WbfsysSecurityArea', "upper(access_key)=upper('entity-wbfsys_security_level')" ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_security_level' );
    $secArea->upgrade( 'vid', $category );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_category' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_category' ) ); 
    $secArea->upgrade( 'type_key', 'entity_category' ); 
    $secArea->upgrade( 'description', "Category: meta for Entity: Security Level" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_security_level-cat-meta',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_security_level-cat-meta',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_security_level-cat-meta',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_security_level '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_security_level::label
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_security_level-label' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_security_level-label';
    }
		
    $typeId = 0;
    $typeNode = $orm->getByKey( 'WbfsysEntityAttributeType', 'varchar' );
    
    if( $typeNode )
    {
    	$typeId = $typeNode->getId();
    }
    else
    {
    	Log::warn( "Missing attr type: varchar" );
    	Debug::console( "Missing attr type: varchar" );
    }
    
    $attribute->upgrade( 'id_type', $typeId );

    $attribute->upgrade( 'id_entity', $entity );
    $attribute->upgrade( 'name', 'Label' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_security_level-default' ) );
    $attribute->upgrade( 'description', 'Label for security level' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_security_level-label',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_security_level-label',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level-label',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_security_level '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level-attr-label' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_security_level-attr-label';

      
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

    $secArea->upgrade( 'label', 'Attr: Label' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_security_level' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Label for Entity: Security Level" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_security_level-attr-label',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_security_level-attr-label',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_security_level '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_security_level::access_key
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_security_level-access_key' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_security_level-access_key';
    }
		
    $typeId = 0;
    $typeNode = $orm->getByKey( 'WbfsysEntityAttributeType', 'varchar' );
    
    if( $typeNode )
    {
    	$typeId = $typeNode->getId();
    }
    else
    {
    	Log::warn( "Missing attr type: varchar" );
    	Debug::console( "Missing attr type: varchar" );
    }
    
    $attribute->upgrade( 'id_type', $typeId );

    $attribute->upgrade( 'id_entity', $entity );
    $attribute->upgrade( 'name', 'Access Key' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_security_level-default' ) );
    $attribute->upgrade( 'description', 'Access Key for security level' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_security_level-access_key',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_security_level-access_key',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level-access_key',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_security_level '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level-attr-access_key' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_security_level-attr-access_key';

      
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

    $secArea->upgrade( 'label', 'Attr: Access Key' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_security_level' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Access Key for Entity: Security Level" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_security_level-attr-access_key',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_security_level-attr-access_key',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_security_level '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_security_level::level
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_security_level-level' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_security_level-level';
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
    $attribute->upgrade( 'name', 'Level' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_security_level-default' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_security_level-level',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_security_level-level',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level-level',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_security_level '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level-attr-level' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_security_level-attr-level';

      
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

    $secArea->upgrade( 'label', 'Attr: Level' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_security_level' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Level for Entity: Security Level" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_security_level-attr-level',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_security_level-attr-level',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_security_level '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_security_level::description
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_security_level-description' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_security_level-description';
    }
		
    $typeId = 0;
    $typeNode = $orm->getByKey( 'WbfsysEntityAttributeType', 'text' );
    
    if( $typeNode )
    {
    	$typeId = $typeNode->getId();
    }
    else
    {
    	Log::warn( "Missing attr type: text" );
    	Debug::console( "Missing attr type: text" );
    }
    
    $attribute->upgrade( 'id_type', $typeId );

    $attribute->upgrade( 'id_entity', $entity );
    $attribute->upgrade( 'name', 'Description' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_security_level-description' ) );
    $attribute->upgrade( 'description', 'Description for security level' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_security_level-description',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_security_level-description',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level-description',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_security_level '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level-attr-description' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_security_level-attr-description';

      
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

    $secArea->upgrade( 'label', 'Attr: Description' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_security_level' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Description for Entity: Security Level" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_security_level-attr-description',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_security_level-attr-description',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_security_level '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_security_level::rowid
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_security_level-rowid' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_security_level-rowid';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_security_level-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_security_level-rowid',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_security_level-rowid',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level-rowid',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_security_level '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level-attr-rowid' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_security_level-attr-rowid';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_security_level' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Rowid for Entity: Security Level" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_security_level-attr-rowid',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_security_level-attr-rowid',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_security_level '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_security_level::m_time_created
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_security_level-m_time_created' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_security_level-m_time_created';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_security_level-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_security_level-m_time_created',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_security_level-m_time_created',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level-m_time_created',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_security_level '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level-attr-m_time_created' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_security_level-attr-m_time_created';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_security_level' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Time Created for Entity: Security Level" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_security_level-attr-m_time_created',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_security_level-attr-m_time_created',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_security_level '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_security_level::m_role_create
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_security_level-m_role_create' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_security_level-m_role_create';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_security_level-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_security_level-m_role_create',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_security_level-m_role_create',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level-m_role_create',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_security_level '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level-attr-m_role_create' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_security_level-attr-m_role_create';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_security_level' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Role Create for Entity: Security Level" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_security_level-attr-m_role_create',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_security_level-attr-m_role_create',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_security_level '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_security_level::m_time_changed
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_security_level-m_time_changed' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_security_level-m_time_changed';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_security_level-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_security_level-m_time_changed',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_security_level-m_time_changed',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level-m_time_changed',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_security_level '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level-attr-m_time_changed' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_security_level-attr-m_time_changed';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_security_level' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Time Changed for Entity: Security Level" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_security_level-attr-m_time_changed',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_security_level-attr-m_time_changed',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_security_level '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_security_level::m_role_change
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_security_level-m_role_change' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_security_level-m_role_change';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_security_level-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_security_level-m_role_change',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_security_level-m_role_change',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level-m_role_change',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_security_level '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level-attr-m_role_change' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_security_level-attr-m_role_change';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_security_level' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Role Change for Entity: Security Level" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_security_level-attr-m_role_change',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_security_level-attr-m_role_change',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_security_level '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_security_level::m_version
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_security_level-m_version' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_security_level-m_version';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_security_level-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_security_level-m_version',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_security_level-m_version',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level-m_version',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_security_level '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level-attr-m_version' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_security_level-attr-m_version';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_security_level' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Version for Entity: Security Level" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_security_level-attr-m_version',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_security_level-attr-m_version',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_security_level '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_security_level::m_uuid
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_security_level-m_uuid' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_security_level-m_uuid';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_security_level-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_security_level-m_uuid',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_security_level-m_uuid',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level-m_uuid',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_security_level '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level-attr-m_uuid' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_security_level-attr-m_uuid';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_level' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_security_level' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Uuid for Entity: Security Level" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_security_level-attr-m_uuid',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_security_level'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_security_level-attr-m_uuid',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_security_level'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_level',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_security_level '.$e->getMessage()
      ));
    }
