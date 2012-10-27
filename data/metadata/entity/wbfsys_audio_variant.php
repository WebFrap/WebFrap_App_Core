<?php 
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_audio_variant
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the entity
    $entity = null;

    if( !$entity = $orm->getByKey( 'WbfsysEntity', 'wbfsys_audio_variant' ) )
    {
      $entity = new WbfsysEntity_Entity();
      $entity->access_key = 'wbfsys_audio_variant';
    }
    
    $entity->upgrade( 'name', 'Audio Variant' );
    $entity->upgrade( 'id_module', $orm->getByKey( 'WbfsysModule', 'wbfsys'  ) );
    $entity->upgrade( 'description', '' );
    $entity->upgrade( 'flag_index', false );
    $entity->upgrade( 'default_create', 'Wbfsys.AudioVariant.create' );
    $entity->upgrade( 'default_edit', 'Wbfsys.AudioVariant.edit' );
    $entity->upgrade( 'default_show', 'Wbfsys.AudioVariant.show' );
    $entity->upgrade( 'default_list', 'Wbfsys.AudioVariant.listing' );
    $entity->upgrade( 'default_selection', 'Wbfsys.AudioVariant.selection' );
    $entity->upgrade( 'relevance', 's-3-r' );
    
    
    $entity->revision    = $deployRevision;
    
    try
    {
      if( $entity->isNew() )
      {
      
        $orm->insert( $entity );
        $this->protocol(array(
          'insert',
          'wbfsys_audio_variant',
          'WbfsysEntity',
          'Sucessfully created new Entity wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$entity->getSynchronized() )
        {
          $orm->update( $entity );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant',
            'WbfsysEntity',
            'Sucessfully updated Entity wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant',
        'WbfsysEntity',
        'Failed to sync Entity wbfsys_audio_variant '.$e->getMessage()
      ));
    }


    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant';

      $secArea->label     = 'Entity: Audio Variant';
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
    $secArea->upgrade( 'description', "Security Area for Entity: Audio Variant" );
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
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
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
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
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
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for category: wbfsys_audio_variant::default
//////////////////////////////////////////////////////////////////////////////*/

    if( !$category = $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-default' ) )
    {
      $category = new WbfsysEntityCategory_Entity();
      $category->access_key  = 'wbfsys_audio_variant-default';
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
          'wbfsys_audio_variant-default',
          'WbfsysEntityCategory',
          'Sucessfully created new WbfsysEntityCategory wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$category->getSynchronized() )
        {
          $orm->update( $category );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-default',
            'WbfsysEntityCategory',
            'Sucessfully updated WbfsysEntityCategory wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-default',
        'WbfsysEntityCategory',
        'Failed to sync WbfsysEntityCategory wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    $secArea = null;
    $secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-cat-default' );

    if( !$secArea )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-cat-default';

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

    $secArea->upgrade( 'm_parent', $orm->get( 'WbfsysSecurityArea', "upper(access_key)=upper('entity-wbfsys_audio_variant')" ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $category );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_category' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_category' ) ); 
    $secArea->upgrade( 'type_key', 'entity_category' ); 
    $secArea->upgrade( 'description', "Category: default for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-cat-default',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-cat-default',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_audio_variant-cat-default',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for category: wbfsys_audio_variant::description
//////////////////////////////////////////////////////////////////////////////*/

    if( !$category = $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-description' ) )
    {
      $category = new WbfsysEntityCategory_Entity();
      $category->access_key  = 'wbfsys_audio_variant-description';
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
          'wbfsys_audio_variant-description',
          'WbfsysEntityCategory',
          'Sucessfully created new WbfsysEntityCategory wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$category->getSynchronized() )
        {
          $orm->update( $category );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-description',
            'WbfsysEntityCategory',
            'Sucessfully updated WbfsysEntityCategory wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-description',
        'WbfsysEntityCategory',
        'Failed to sync WbfsysEntityCategory wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    $secArea = null;
    $secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-cat-description' );

    if( !$secArea )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-cat-description';

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

    $secArea->upgrade( 'm_parent', $orm->get( 'WbfsysSecurityArea', "upper(access_key)=upper('entity-wbfsys_audio_variant')" ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $category );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_category' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_category' ) ); 
    $secArea->upgrade( 'type_key', 'entity_category' ); 
    $secArea->upgrade( 'description', "Category: description for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-cat-description',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-cat-description',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_audio_variant-cat-description',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for category: wbfsys_audio_variant::meta
//////////////////////////////////////////////////////////////////////////////*/

    if( !$category = $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-meta' ) )
    {
      $category = new WbfsysEntityCategory_Entity();
      $category->access_key  = 'wbfsys_audio_variant-meta';
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
          'wbfsys_audio_variant-meta',
          'WbfsysEntityCategory',
          'Sucessfully created new WbfsysEntityCategory wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$category->getSynchronized() )
        {
          $orm->update( $category );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-meta',
            'WbfsysEntityCategory',
            'Sucessfully updated WbfsysEntityCategory wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-meta',
        'WbfsysEntityCategory',
        'Failed to sync WbfsysEntityCategory wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    $secArea = null;
    $secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-cat-meta' );

    if( !$secArea )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-cat-meta';

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

    $secArea->upgrade( 'm_parent', $orm->get( 'WbfsysSecurityArea', "upper(access_key)=upper('entity-wbfsys_audio_variant')" ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $category );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_category' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_category' ) ); 
    $secArea->upgrade( 'type_key', 'entity_category' ); 
    $secArea->upgrade( 'description', "Category: meta for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-cat-meta',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-cat-meta',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_audio_variant-cat-meta',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_audio_variant::id_audio
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_audio_variant-id_audio' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_audio_variant-id_audio';
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
    $attribute->upgrade( 'name', 'Audio' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-default' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_audio_variant-id_audio',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-id_audio',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-id_audio',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-attr-id_audio' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-attr-id_audio';

      
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

    $secArea->upgrade( 'label', 'Attr: Audio' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Audio for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-attr-id_audio',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-attr-id_audio',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_audio_variant::id_audio_codec
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_audio_variant-id_audio_codec' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_audio_variant-id_audio_codec';
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
    $attribute->upgrade( 'name', 'Audio codec' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-default' ) );
    $attribute->upgrade( 'description', 'audio codec for audio variant' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_audio_variant-id_audio_codec',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-id_audio_codec',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-id_audio_codec',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-attr-id_audio_codec' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-attr-id_audio_codec';

      
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

    $secArea->upgrade( 'label', 'Attr: Audio codec' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Audio codec for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-attr-id_audio_codec',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-attr-id_audio_codec',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_audio_variant::id_licence
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_audio_variant-id_licence' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_audio_variant-id_licence';
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
    $attribute->upgrade( 'name', 'Licence' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-default' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_audio_variant-id_licence',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-id_licence',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-id_licence',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-attr-id_licence' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-attr-id_licence';

      
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

    $secArea->upgrade( 'label', 'Attr: Licence' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Licence for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-attr-id_licence',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-attr-id_licence',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_audio_variant::id_lang
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_audio_variant-id_lang' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_audio_variant-id_lang';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-default' ) );
    $attribute->upgrade( 'description', 'Language for audio variant' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_audio_variant-id_lang',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-id_lang',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-id_lang',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-attr-id_lang' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-attr-id_lang';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Language for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-attr-id_lang',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-attr-id_lang',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_audio_variant::file
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_audio_variant-file' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_audio_variant-file';
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
    $attribute->upgrade( 'name', 'File' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-default' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_audio_variant-file',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-file',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-file',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-attr-file' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-attr-file';

      
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

    $secArea->upgrade( 'label', 'Attr: File' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: File for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-attr-file',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-attr-file',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_audio_variant::description
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_audio_variant-description' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_audio_variant-description';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-description' ) );
    $attribute->upgrade( 'description', 'Description for audio variant' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_audio_variant-description',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-description',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-description',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-attr-description' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-attr-description';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Description for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-attr-description',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-attr-description',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_audio_variant::mimetype
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_audio_variant-mimetype' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_audio_variant-mimetype';
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
    $attribute->upgrade( 'name', 'Mimetype' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-default' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_audio_variant-mimetype',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-mimetype',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-mimetype',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-attr-mimetype' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-attr-mimetype';

      
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

    $secArea->upgrade( 'label', 'Attr: Mimetype' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Mimetype for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-attr-mimetype',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-attr-mimetype',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_audio_variant::file_size
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_audio_variant-file_size' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_audio_variant-file_size';
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
    $attribute->upgrade( 'name', 'File Size' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-default' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_audio_variant-file_size',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-file_size',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-file_size',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-attr-file_size' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-attr-file_size';

      
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

    $secArea->upgrade( 'label', 'Attr: File Size' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: File Size for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-attr-file_size',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-attr-file_size',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_audio_variant::file_hash
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_audio_variant-file_hash' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_audio_variant-file_hash';
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
    $attribute->upgrade( 'name', 'File Hash' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-default' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_audio_variant-file_hash',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-file_hash',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-file_hash',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-attr-file_hash' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-attr-file_hash';

      
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

    $secArea->upgrade( 'label', 'Attr: File Hash' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: File Hash for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-attr-file_hash',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-attr-file_hash',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_audio_variant::rowid
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_audio_variant-rowid' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_audio_variant-rowid';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_audio_variant-rowid',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-rowid',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-rowid',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-attr-rowid' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-attr-rowid';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Rowid for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-attr-rowid',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-attr-rowid',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_audio_variant::m_time_created
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_audio_variant-m_time_created' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_audio_variant-m_time_created';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_audio_variant-m_time_created',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-m_time_created',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-m_time_created',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-attr-m_time_created' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-attr-m_time_created';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Time Created for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-attr-m_time_created',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-attr-m_time_created',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_audio_variant::m_role_create
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_audio_variant-m_role_create' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_audio_variant-m_role_create';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_audio_variant-m_role_create',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-m_role_create',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-m_role_create',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-attr-m_role_create' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-attr-m_role_create';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Role Create for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-attr-m_role_create',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-attr-m_role_create',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_audio_variant::m_time_changed
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_audio_variant-m_time_changed' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_audio_variant-m_time_changed';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_audio_variant-m_time_changed',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-m_time_changed',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-m_time_changed',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-attr-m_time_changed' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-attr-m_time_changed';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Time Changed for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-attr-m_time_changed',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-attr-m_time_changed',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_audio_variant::m_role_change
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_audio_variant-m_role_change' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_audio_variant-m_role_change';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_audio_variant-m_role_change',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-m_role_change',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-m_role_change',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-attr-m_role_change' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-attr-m_role_change';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Role Change for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-attr-m_role_change',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-attr-m_role_change',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_audio_variant::m_version
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_audio_variant-m_version' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_audio_variant-m_version';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_audio_variant-m_version',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-m_version',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-m_version',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-attr-m_version' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-attr-m_version';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Version for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-attr-m_version',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-attr-m_version',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_audio_variant::m_uuid
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_audio_variant-m_uuid' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_audio_variant-m_uuid';
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

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_audio_variant-meta' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_audio_variant-m_uuid',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_audio_variant-m_uuid',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant-m_uuid',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_audio_variant '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant-attr-m_uuid' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio_variant-attr-m_uuid';

      
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio_variant' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_audio_variant' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: Uuid for Entity: Audio Variant" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio_variant-attr-m_uuid',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio_variant'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio_variant-attr-m_uuid',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio_variant'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio_variant',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio_variant '.$e->getMessage()
      ));
    }
