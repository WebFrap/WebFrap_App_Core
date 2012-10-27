<?php 
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_tag
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the entity
    $entity = null;

    if( !$entity = $orm->getByKey( 'WbfsysEntity', 'wbfsys_tag' ) )
    {
      $entity = new WbfsysEntity_Entity();
      $entity->access_key = 'wbfsys_tag';
    }
    
    $entity->upgrade( 'name', 'Tag' );
    $entity->upgrade( 'id_module', $orm->getByKey( 'WbfsysModule', 'wbfsys'  ) );
    $entity->upgrade( 'description', '' );
    $entity->upgrade( 'flag_index', false );
    $entity->upgrade( 'default_create', 'Wbfsys.Tag.create' );
    $entity->upgrade( 'default_edit', 'Wbfsys.Tag.edit' );
    $entity->upgrade( 'default_show', 'Wbfsys.Tag.show' );
    $entity->upgrade( 'default_list', 'Wbfsys.Tag.listing' );
    $entity->upgrade( 'default_selection', 'Wbfsys.Tag.selection' );
    $entity->upgrade( 'relevance', 's-4' );
    
    
    $entity->revision    = $deployRevision;
    
    try
    {
      if( $entity->isNew() )
      {
      
        $orm->insert( $entity );
        $this->protocol(array(
          'insert',
          'wbfsys_tag',
          'WbfsysEntity',
          'Sucessfully created new Entity wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$entity->getSynchronized() )
        {
          $orm->update( $entity );
          $this->protocol(array(
            'update',
            'wbfsys_tag',
            'WbfsysEntity',
            'Sucessfully updated Entity wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysEntity',
        'Failed to sync Entity wbfsys_tag '.$e->getMessage()
      ));
    }


    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_tag';

      $secArea->label     = 'Entity: Tag';
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
    $secArea->upgrade( 'description', "Security Area for Entity: Tag" );
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
          'Sucessfully created new SecurityArea wbfsys_tag'
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
            'Sucessfully updated SecurityArea wbfsys_tag'
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
        'Failed to sync SecurityArea wbfsys_tag '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for category: wbfsys_tag::default
//////////////////////////////////////////////////////////////////////////////*/

    if( !$category = $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_tag-default' ) )
    {
      $category = new WbfsysEntityCategory_Entity();
      $category->access_key  = 'wbfsys_tag-default';
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
          'wbfsys_tag-default',
          'WbfsysEntityCategory',
          'Sucessfully created new WbfsysEntityCategory wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$category->getSynchronized() )
        {
          $orm->update( $category );
          $this->protocol(array(
            'update',
            'wbfsys_tag-default',
            'WbfsysEntityCategory',
            'Sucessfully updated WbfsysEntityCategory wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag-default',
        'WbfsysEntityCategory',
        'Failed to sync WbfsysEntityCategory wbfsys_tag '.$e->getMessage()
      ));
    }

    $secArea = null;
    $secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag-cat-default' );

    if( !$secArea )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_tag-cat-default';

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

    $secArea->upgrade( 'm_parent', $orm->get( 'WbfsysSecurityArea', "upper(access_key)=upper('entity-wbfsys_tag')" ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_tag' );
    $secArea->upgrade( 'vid', $category );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_category' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_category' ) ); 
    $secArea->upgrade( 'type_key', 'entity_category' ); 
    $secArea->upgrade( 'description', "Category: default for Entity: Tag" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_tag-cat-default',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_tag-cat-default',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_tag-cat-default',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_tag '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for category: wbfsys_tag::description
//////////////////////////////////////////////////////////////////////////////*/

    if( !$category = $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_tag-description' ) )
    {
      $category = new WbfsysEntityCategory_Entity();
      $category->access_key  = 'wbfsys_tag-description';
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
          'wbfsys_tag-description',
          'WbfsysEntityCategory',
          'Sucessfully created new WbfsysEntityCategory wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$category->getSynchronized() )
        {
          $orm->update( $category );
          $this->protocol(array(
            'update',
            'wbfsys_tag-description',
            'WbfsysEntityCategory',
            'Sucessfully updated WbfsysEntityCategory wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag-description',
        'WbfsysEntityCategory',
        'Failed to sync WbfsysEntityCategory wbfsys_tag '.$e->getMessage()
      ));
    }

    $secArea = null;
    $secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag-cat-description' );

    if( !$secArea )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_tag-cat-description';

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

    $secArea->upgrade( 'm_parent', $orm->get( 'WbfsysSecurityArea', "upper(access_key)=upper('entity-wbfsys_tag')" ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_tag' );
    $secArea->upgrade( 'vid', $category );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_category' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_category' ) ); 
    $secArea->upgrade( 'type_key', 'entity_category' ); 
    $secArea->upgrade( 'description', "Category: description for Entity: Tag" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_tag-cat-description',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_tag-cat-description',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_tag-cat-description',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_tag '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for category: wbfsys_tag::meta
//////////////////////////////////////////////////////////////////////////////*/

    if( !$category = $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_tag-meta' ) )
    {
      $category = new WbfsysEntityCategory_Entity();
      $category->access_key  = 'wbfsys_tag-meta';
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
          'wbfsys_tag-meta',
          'WbfsysEntityCategory',
          'Sucessfully created new WbfsysEntityCategory wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$category->getSynchronized() )
        {
          $orm->update( $category );
          $this->protocol(array(
            'update',
            'wbfsys_tag-meta',
            'WbfsysEntityCategory',
            'Sucessfully updated WbfsysEntityCategory wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag-meta',
        'WbfsysEntityCategory',
        'Failed to sync WbfsysEntityCategory wbfsys_tag '.$e->getMessage()
      ));
    }

    $secArea = null;
    $secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag-cat-meta' );

    if( !$secArea )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_tag-cat-meta';

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

    $secArea->upgrade( 'm_parent', $orm->get( 'WbfsysSecurityArea', "upper(access_key)=upper('entity-wbfsys_tag')" ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_tag' );
    $secArea->upgrade( 'vid', $category );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_category' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_category' ) ); 
    $secArea->upgrade( 'type_key', 'entity_category' ); 
    $secArea->upgrade( 'description', "Category: meta for Entity: Tag" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_tag-cat-meta',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_tag-cat-meta',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_tag-cat-meta',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_tag '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_tag::name
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_tag-name' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_tag-name';
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
    $attribute->upgrade( 'name', 'Name' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_tag-default' ) );
    $attribute->upgrade( 'description', 'the Name of the tag' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_tag-name',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_tag-name',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag-name',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_tag '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag-attr-name' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_tag-attr-name';

      
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

    $secArea->upgrade( 'label', 'Attr: Name' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_tag' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Name for Entity: Tag" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_tag-attr-name',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_tag-attr-name',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_tag '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_tag::access_key
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_tag-access_key' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_tag-access_key';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_tag-default' ) );
    $attribute->upgrade( 'description', 'Access Key for tag' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_tag-access_key',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_tag-access_key',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag-access_key',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_tag '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag-attr-access_key' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_tag-attr-access_key';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_tag' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Access Key for Entity: Tag" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_tag-attr-access_key',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_tag-attr-access_key',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_tag '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_tag::id_lang
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_tag-id_lang' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_tag-id_lang';
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
    $attribute->upgrade( 'name', 'Language' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_tag-default' ) );
    $attribute->upgrade( 'description', 'Language for tag' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_tag-id_lang',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_tag-id_lang',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag-id_lang',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_tag '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag-attr-id_lang' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_tag-attr-id_lang';

      
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

    $secArea->upgrade( 'label', 'Attr: Language' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_tag' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Language for Entity: Tag" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_tag-attr-id_lang',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_tag-attr-id_lang',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_tag '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_tag::m_parent
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_tag-m_parent' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_tag-m_parent';
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
    $attribute->upgrade( 'name', 'Parent' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_tag-default' ) );
    $attribute->upgrade( 'description', 'Parent for tag' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_tag-m_parent',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_tag-m_parent',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag-m_parent',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_tag '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag-attr-m_parent' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_tag-attr-m_parent';

      
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

    $secArea->upgrade( 'label', 'Attr: Parent' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_tag' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Parent for Entity: Tag" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_tag-attr-m_parent',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_tag-attr-m_parent',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_tag '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_tag::description
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_tag-description' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_tag-description';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_tag-description' ) );
    $attribute->upgrade( 'description', 'Description for tag' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_tag-description',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_tag-description',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag-description',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_tag '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag-attr-description' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_tag-attr-description';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_tag' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Description for Entity: Tag" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_tag-attr-description',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_tag-attr-description',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_tag '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_tag::rowid
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_tag-rowid' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_tag-rowid';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_tag-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_tag-rowid',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_tag-rowid',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag-rowid',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_tag '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag-attr-rowid' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_tag-attr-rowid';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_tag' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Rowid for Entity: Tag" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_tag-attr-rowid',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_tag-attr-rowid',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_tag '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_tag::m_time_created
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_tag-m_time_created' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_tag-m_time_created';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_tag-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_tag-m_time_created',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_tag-m_time_created',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag-m_time_created',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_tag '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag-attr-m_time_created' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_tag-attr-m_time_created';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_tag' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Time Created for Entity: Tag" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_tag-attr-m_time_created',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_tag-attr-m_time_created',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_tag '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_tag::m_role_create
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_tag-m_role_create' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_tag-m_role_create';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_tag-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_tag-m_role_create',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_tag-m_role_create',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag-m_role_create',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_tag '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag-attr-m_role_create' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_tag-attr-m_role_create';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_tag' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Role Create for Entity: Tag" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_tag-attr-m_role_create',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_tag-attr-m_role_create',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_tag '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_tag::m_uuid
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_tag-m_uuid' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_tag-m_uuid';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_tag-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_tag-m_uuid',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_tag-m_uuid',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag-m_uuid',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_tag '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag-attr-m_uuid' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_tag-attr-m_uuid';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_tag' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Uuid for Entity: Tag" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_tag-attr-m_uuid',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_tag'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_tag-attr-m_uuid',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_tag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_tag',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_tag '.$e->getMessage()
      ));
    }
