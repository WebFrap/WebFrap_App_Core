<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_entity::aliases
//////////////////////////////////////////////////////////////////////////////*/

    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_entity-aliases' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_entity-aliases';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_entity-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_alias' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_entity_alias-id_entity' )?:0;
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
          'wbfsys_entity-aliases',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_entity-aliases'
        ));
      }
      else
      {
        $orm->update( $ref );
        $this->protocol(array(
          'update',
          'wbfsys_entity-aliases',
          'WbfsysEntityReference',
          'Sucessfully updated WbfsysEntityReference wbfsys_entity-aliases'
        ));
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity-aliases',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_entity-aliases '.$e->getMessage()
      ));
    }

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity-ref-aliases' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_entity-ref-aliases';

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
    $secArea->upgrade( 'label', 'S: Alias' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity' ) ); 
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity' ) ); 
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_entity' );
    $secArea->upgrade( 'vid', $ref ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );   
    $secArea->upgrade( 'description', "Reference: aliases on Entity: wbfsys_entity to Entity: wbfsys_entity_alias" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_entity-ref-aliases',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_entity'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_entity-ref-aliases',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_entity'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_entity-ref-aliases',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_entity '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_entity::attributes
//////////////////////////////////////////////////////////////////////////////*/

    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_entity-attributes' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_entity-attributes';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_entity-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attribute' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_entity_attribute-id_entity' )?:0;
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
          'wbfsys_entity-attributes',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_entity-attributes'
        ));
      }
      else
      {
        $orm->update( $ref );
        $this->protocol(array(
          'update',
          'wbfsys_entity-attributes',
          'WbfsysEntityReference',
          'Sucessfully updated WbfsysEntityReference wbfsys_entity-attributes'
        ));
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity-attributes',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_entity-attributes '.$e->getMessage()
      ));
    }

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity-ref-attributes' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_entity-ref-attributes';

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
    $secArea->upgrade( 'label', 'S: Attribute' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity' ) ); 
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity' ) ); 
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_entity' );
    $secArea->upgrade( 'vid', $ref ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );   
    $secArea->upgrade( 'description', "Reference: attributes on Entity: wbfsys_entity to Entity: wbfsys_entity_attribute" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_entity-ref-attributes',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_entity'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_entity-ref-attributes',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_entity'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_entity-ref-attributes',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_entity '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_entity::categories
//////////////////////////////////////////////////////////////////////////////*/

    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_entity-categories' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_entity-categories';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_entity-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_category' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_entity_category-id_entity' )?:0;
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
          'wbfsys_entity-categories',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_entity-categories'
        ));
      }
      else
      {
        $orm->update( $ref );
        $this->protocol(array(
          'update',
          'wbfsys_entity-categories',
          'WbfsysEntityReference',
          'Sucessfully updated WbfsysEntityReference wbfsys_entity-categories'
        ));
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity-categories',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_entity-categories '.$e->getMessage()
      ));
    }

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity-ref-categories' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_entity-ref-categories';

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
    $secArea->upgrade( 'label', 'S: Category' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity' ) ); 
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity' ) ); 
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_entity' );
    $secArea->upgrade( 'vid', $ref ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );   
    $secArea->upgrade( 'description', "Reference: categories on Entity: wbfsys_entity to Entity: wbfsys_entity_category" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_entity-ref-categories',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_entity'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_entity-ref-categories',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_entity'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_entity-ref-categories',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_entity '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_entity::references
//////////////////////////////////////////////////////////////////////////////*/

    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_entity-references' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_entity-references';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_entity-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_entity_reference-id_from' )?:0;
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
          'wbfsys_entity-references',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_entity-references'
        ));
      }
      else
      {
        $orm->update( $ref );
        $this->protocol(array(
          'update',
          'wbfsys_entity-references',
          'WbfsysEntityReference',
          'Sucessfully updated WbfsysEntityReference wbfsys_entity-references'
        ));
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity-references',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_entity-references '.$e->getMessage()
      ));
    }

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity-ref-references' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_entity-ref-references';

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
    $secArea->upgrade( 'label', 'S: Reference' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity' ) ); 
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity' ) ); 
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_entity' );
    $secArea->upgrade( 'vid', $ref ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );   
    $secArea->upgrade( 'description', "Reference: references on Entity: wbfsys_entity to Entity: wbfsys_entity_reference" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_entity-ref-references',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_entity'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_entity-ref-references',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_entity'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_entity-ref-references',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_entity '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_entity::managements
//////////////////////////////////////////////////////////////////////////////*/

    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_entity-managements' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_entity-managements';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_entity-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_management' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_management-id_entity' )?:0;
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
          'wbfsys_entity-managements',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_entity-managements'
        ));
      }
      else
      {
        $orm->update( $ref );
        $this->protocol(array(
          'update',
          'wbfsys_entity-managements',
          'WbfsysEntityReference',
          'Sucessfully updated WbfsysEntityReference wbfsys_entity-managements'
        ));
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity-managements',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_entity-managements '.$e->getMessage()
      ));
    }

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity-ref-managements' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_entity-ref-managements';

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
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity' ) ); 
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity' ) ); 
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_entity' );
    $secArea->upgrade( 'vid', $ref ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );   
    $secArea->upgrade( 'description', "Reference: managements on Entity: wbfsys_entity to Entity: wbfsys_management" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_entity-ref-managements',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_entity'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_entity-ref-managements',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_entity'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_entity-ref-managements',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_entity '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_entity::file_type
//////////////////////////////////////////////////////////////////////////////*/
    
    // reference wbfsys_entity-con-file_type
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_entity-con-file_type' ) )
    {

      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_entity-con-file_type';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_file_type' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_file_type-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_vref_file_type' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_vref_file_type-id_type' )?:0;
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
          'wbfsys_entity-con-file_type',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_entity-con-file_type'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_entity-con-file_type',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_entity-con-file_type'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity-con-file_type',
        'WbfsysEntityReference',
        'Failed to create WbfsysEntityReference wbfsys_entity-con-file_type '.$e->getMessage()
      ));
    }
    
    // reference wbfsys_entity-file_type
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_entity-file_type' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_entity-file_type';

      $ref->id_to       = $orm->get( 'WbfsysEntity', "access_key='wbfsys_entity'" )?:0;
      $ref->id_field_to = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_entity-rowid'" )?:0;
      $ref->id_from        = $orm->get( 'WbfsysEntity', "access_key='wbfsys_vref_file_type'" )?:0;
      $ref->id_field_from  = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_vref_file_type-vid'" )?:0;
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
          'wbfsys_entity-file_type',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_entity-file_type'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_entity-file_type',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_entity-file_type'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity-file_type',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_entity-file_type '.$e->getMessage()
      ));
    }

    
    // um den bezug im pfad nicht zu verlieren wird eine virtuelle security area benötigt
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_vref_file_type-space-wbfsys_entity-file_type' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_vref_file_type-space-wbfsys_entity-file_type';

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
    $secArea->upgrade( 'label', 'E-V-Entity: Vref File Type' );

    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mod-Wbfsys' )  );
    $secArea->upgrade( 'parent_key', 'mod-Wbfsys' );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntity', 'wbfsys_vref_file_type' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity' ) );   
    $secArea->upgrade( 'type_key', 'space_entity' );  
    $secArea->upgrade( 'description', "Virt. Entity: <span title=\"entity-wbfsys_vref_file_type-space-wbfsys_entity-file_type\" >Vref File Type<span> in Space Entity Ref: File Type" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_vref_file_type-space-wbfsys_entity-file_type',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_entity'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_vref_file_type-space-wbfsys_entity-file_type',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_entity'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_vref_file_type-space-wbfsys_entity-file_type',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_entity '.$e->getMessage()
      ));
    }

    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity-ref-file_type' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_entity-ref-file_type';

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
    $secArea->upgrade( 'label', 'E-M-Ref: File Type' );
    
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_file_type' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_file_type' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_vref_file_type-space-wbfsys_entity-file_type' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_entity-file_type' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-M-Ref: <span title=\"entity-wbfsys_entity-ref-file_type\" >wbfsys_entity::file_type</span> to Entity: wbfsys_file_type Con: wbfsys_vref_file_type" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_entity-ref-file_type',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_entity'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_entity-ref-file_type',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_entity'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_entity-ref-file_type',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_entity '.$e->getMessage()
      ));
    }

    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity-conref-file_type' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_entity-conref-file_type';


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
    $secArea->upgrade( 'label', 'E-V-Ref: File Type' );
    
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_file_type' )  );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_file_type' );  
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_vref_file_type-space-wbfsys_entity-file_type' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_entity-con-file_type' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-V-Ref: <span title=\"entity-wbfsys_entity-conref-file_type\" >wbfsys_entity::file_type</span> over Con: wbfsys_vref_file_type to Entity: wbfsys_file_type" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_entity-conref-file_type',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_entity'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_entity-conref-file_type',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_entity'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_entity-conref-file_type',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_entity '.$e->getMessage()
      ));
    }
