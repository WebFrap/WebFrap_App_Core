<?php 
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_period_month
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the entity
    $entity = null;

    if( !$entity = $orm->getByKey( 'WbfsysEntity', 'wbfsys_period_month' ) )
    {
      $entity = new WbfsysEntity_Entity();
      $entity->access_key = 'wbfsys_period_month';
    }
    
    $entity->upgrade( 'name', 'Period Month' );
    $entity->upgrade( 'id_module', $orm->getByKey( 'WbfsysModule', 'wbfsys'  ) );
    $entity->upgrade( 'description', '' );
    $entity->upgrade( 'flag_index', false );
    $entity->upgrade( 'default_create', 'Wbfsys.PeriodMonth.create' );
    $entity->upgrade( 'default_edit', 'Wbfsys.PeriodMonth.edit' );
    $entity->upgrade( 'default_show', 'Wbfsys.PeriodMonth.show' );
    $entity->upgrade( 'default_list', 'Wbfsys.PeriodMonth.listing' );
    $entity->upgrade( 'default_selection', 'Wbfsys.PeriodMonth.selection' );
    $entity->upgrade( 'relevance', 's-4' );
    
    
    $entity->revision    = $deployRevision;
    
    try
    {
      if( $entity->isNew() )
      {
      
        $orm->insert( $entity );
        $this->protocol(array(
          'insert',
          'wbfsys_period_month',
          'WbfsysEntity',
          'Sucessfully created new Entity wbfsys_period_month'
        ));
      }
      else
      {
        
        if( !$entity->getSynchronized() )
        {
          $orm->update( $entity );
          $this->protocol(array(
            'update',
            'wbfsys_period_month',
            'WbfsysEntity',
            'Sucessfully updated Entity wbfsys_period_month'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_period_month',
        'WbfsysEntity',
        'Failed to sync Entity wbfsys_period_month '.$e->getMessage()
      ));
    }


    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_period_month' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_period_month';

      $secArea->label     = 'Entity: Period Month';
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
    $secArea->upgrade( 'description', "Security Area for Entity: Period Month" );
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
          'Sucessfully created new SecurityArea wbfsys_period_month'
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
            'Sucessfully updated SecurityArea wbfsys_period_month'
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
        'Failed to sync SecurityArea wbfsys_period_month '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for category: wbfsys_period_month::default
//////////////////////////////////////////////////////////////////////////////*/

    if( !$category = $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_period_month-default' ) )
    {
      $category = new WbfsysEntityCategory_Entity();
      $category->access_key  = 'wbfsys_period_month-default';
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
          'wbfsys_period_month-default',
          'WbfsysEntityCategory',
          'Sucessfully created new WbfsysEntityCategory wbfsys_period_month'
        ));
      }
      else
      {
        
        if( !$category->getSynchronized() )
        {
          $orm->update( $category );
          $this->protocol(array(
            'update',
            'wbfsys_period_month-default',
            'WbfsysEntityCategory',
            'Sucessfully updated WbfsysEntityCategory wbfsys_period_month'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_period_month-default',
        'WbfsysEntityCategory',
        'Failed to sync WbfsysEntityCategory wbfsys_period_month '.$e->getMessage()
      ));
    }

    $secArea = null;
    $secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_period_month-cat-default' );

    if( !$secArea )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_period_month-cat-default';

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

    $secArea->upgrade( 'm_parent', $orm->get( 'WbfsysSecurityArea', "upper(access_key)=upper('entity-wbfsys_period_month')" ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_period_month' );
    $secArea->upgrade( 'vid', $category );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_category' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_category' ) ); 
    $secArea->upgrade( 'type_key', 'entity_category' ); 
    $secArea->upgrade( 'description', "Category: default for Entity: Period Month" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_period_month-cat-default',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_period_month'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_period_month-cat-default',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_period_month'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_period_month-cat-default',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_period_month '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for attribute: wbfsys_period_month::p_month
//////////////////////////////////////////////////////////////////////////////*/

    if( !$attribute = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_period_month-p_month' ) )
    {
      $attribute = new WbfsysEntityAttribute_Entity();
      $attribute->access_key  = 'wbfsys_period_month-p_month';
    }
		
    $typeId = 0;
    $typeNode = $orm->getByKey( 'WbfsysEntityAttributeType', 'date' );
    
    if( $typeNode )
    {
    	$typeId = $typeNode->getId();
    }
    else
    {
    	Log::warn( "Missing attr type: date" );
    	Debug::console( "Missing attr type: date" );
    }
    
    $attribute->upgrade( 'id_type', $typeId );

    $attribute->upgrade( 'id_entity', $entity );
    $attribute->upgrade( 'name', 'P Month' );

    $attribute->upgrade( 'id_category', $orm->getByKey( 'WbfsysEntityCategory', 'wbfsys_period_month-default' ) );
    $attribute->upgrade( 'description', '' );
    $attribute->revision    = $deployRevision;
    
    try
    {
      if( $attribute->isNew() )
      {
      
        $orm->insert( $attribute );
        $this->protocol(array(
          'insert',
          'wbfsys_period_month-p_month',
          'WbfsysEntityAttribute',
          'Sucessfully created new WbfsysEntityAttribute wbfsys_period_month'
        ));
      }
      else
      {
        
        if( !$attribute->getSynchronized() )
        {
          $orm->update( $attribute );
          $this->protocol(array(
            'update',
            'wbfsys_period_month-p_month',
            'WbfsysEntityAttribute',
            'Sucessfully updated WbfsysEntityAttribute wbfsys_period_month'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_period_month-p_month',
        'WbfsysEntityAttribute',
        'Failed to sync WbfsysEntityAttribute wbfsys_period_month '.$e->getMessage()
      ));
    }

    
    
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_period_month-attr-p_month' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_period_month-attr-p_month';

      
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

    $secArea->upgrade( 'label', 'Attr: P Month' );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_period_month' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_period_month' );
    $secArea->upgrade( 'vid', $attribute );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' ) ); 
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_attribute' ) ); 
    $secArea->upgrade( 'type_key', 'entity_attribute' ); 
    $secArea->upgrade( 'description', "Attribute: P Month for Entity: Period Month" );
    $secArea->revision    = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_period_month-attr-p_month',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_period_month'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_period_month-attr-p_month',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_period_month'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_period_month',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_period_month '.$e->getMessage()
      ));
    }
