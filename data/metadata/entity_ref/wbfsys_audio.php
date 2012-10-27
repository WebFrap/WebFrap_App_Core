<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_audio::comments
//////////////////////////////////////////////////////////////////////////////*/
    
    // reference wbfsys_audio-con-comments
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_audio-con-comments' ) )
    {

      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_audio-con-comments';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_comment' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_comment-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_comment' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_entity_comment-id_comment' )?:0;
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
          'wbfsys_audio-con-comments',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_audio-con-comments'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_audio-con-comments',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_audio-con-comments'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio-con-comments',
        'WbfsysEntityReference',
        'Failed to create WbfsysEntityReference wbfsys_audio-con-comments '.$e->getMessage()
      ));
    }
    
    // reference wbfsys_audio-comments
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_audio-comments' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_audio-comments';

      $ref->id_to       = $orm->get( 'WbfsysEntity', "access_key='wbfsys_audio'" )?:0;
      $ref->id_field_to = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_audio-rowid'" )?:0;
      $ref->id_from        = $orm->get( 'WbfsysEntity', "access_key='wbfsys_entity_comment'" )?:0;
      $ref->id_field_from  = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_entity_comment-vid'" )?:0;
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
          'wbfsys_audio-comments',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_audio-comments'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_audio-comments',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_audio-comments'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio-comments',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_audio-comments '.$e->getMessage()
      ));
    }

    
    // um den bezug im pfad nicht zu verlieren wird eine virtuelle security area benötigt
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_comment-space-wbfsys_audio-comments' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_entity_comment-space-wbfsys_audio-comments';

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
    $secArea->upgrade( 'label', 'E-V-Entity: Entity Comment' );

    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mod-Wbfsys' )  );
    $secArea->upgrade( 'parent_key', 'mod-Wbfsys' );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_comment' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity' ) );   
    $secArea->upgrade( 'type_key', 'space_entity' );  
    $secArea->upgrade( 'description', "Virt. Entity: <span title=\"entity-wbfsys_entity_comment-space-wbfsys_audio-comments\" >Entity Comment<span> in Space Audio Ref: Comments" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_entity_comment-space-wbfsys_audio-comments',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_entity_comment-space-wbfsys_audio-comments',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_entity_comment-space-wbfsys_audio-comments',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio '.$e->getMessage()
      ));
    }

    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio-ref-comments' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio-ref-comments';

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
    $secArea->upgrade( 'label', 'E-M-Ref: Comments' );
    
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_comment' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_comment' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_comment-space-wbfsys_audio-comments' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_audio-comments' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-M-Ref: <span title=\"entity-wbfsys_audio-ref-comments\" >wbfsys_audio::comments</span> to Entity: wbfsys_comment Con: wbfsys_entity_comment" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio-ref-comments',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio-ref-comments',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_audio-ref-comments',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio '.$e->getMessage()
      ));
    }

    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio-conref-comments' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio-conref-comments';


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
    $secArea->upgrade( 'label', 'E-V-Ref: Comments' );
    
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_comment' )  );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_comment' );  
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_comment-space-wbfsys_audio-comments' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_audio-con-comments' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-V-Ref: <span title=\"entity-wbfsys_audio-conref-comments\" >wbfsys_audio::comments</span> over Con: wbfsys_entity_comment to Entity: wbfsys_comment" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio-conref-comments',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio-conref-comments',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_audio-conref-comments',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_audio::tags
//////////////////////////////////////////////////////////////////////////////*/
    
    // reference wbfsys_audio-con-tags
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_audio-con-tags' ) )
    {

      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_audio-con-tags';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_tag' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_tag-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_tag' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_entity_tag-id_tag' )?:0;
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
          'wbfsys_audio-con-tags',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_audio-con-tags'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_audio-con-tags',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_audio-con-tags'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio-con-tags',
        'WbfsysEntityReference',
        'Failed to create WbfsysEntityReference wbfsys_audio-con-tags '.$e->getMessage()
      ));
    }
    
    // reference wbfsys_audio-tags
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_audio-tags' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_audio-tags';

      $ref->id_to       = $orm->get( 'WbfsysEntity', "access_key='wbfsys_audio'" )?:0;
      $ref->id_field_to = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_audio-rowid'" )?:0;
      $ref->id_from        = $orm->get( 'WbfsysEntity', "access_key='wbfsys_entity_tag'" )?:0;
      $ref->id_field_from  = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_entity_tag-vid'" )?:0;
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
          'wbfsys_audio-tags',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_audio-tags'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_audio-tags',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_audio-tags'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_audio-tags',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_audio-tags '.$e->getMessage()
      ));
    }

    
    // um den bezug im pfad nicht zu verlieren wird eine virtuelle security area benötigt
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_tag-space-wbfsys_audio-tags' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_entity_tag-space-wbfsys_audio-tags';

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
    $secArea->upgrade( 'label', 'E-V-Entity: Entity Tag' );

    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mod-Wbfsys' )  );
    $secArea->upgrade( 'parent_key', 'mod-Wbfsys' );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_tag' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity' ) );   
    $secArea->upgrade( 'type_key', 'space_entity' );  
    $secArea->upgrade( 'description', "Virt. Entity: <span title=\"entity-wbfsys_entity_tag-space-wbfsys_audio-tags\" >Entity Tag<span> in Space Audio Ref: Tags" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_entity_tag-space-wbfsys_audio-tags',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_entity_tag-space-wbfsys_audio-tags',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_entity_tag-space-wbfsys_audio-tags',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio '.$e->getMessage()
      ));
    }

    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio-ref-tags' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio-ref-tags';

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
    $secArea->upgrade( 'label', 'E-M-Ref: Tags' );
    
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_tag' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_tag-space-wbfsys_audio-tags' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_audio-tags' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-M-Ref: <span title=\"entity-wbfsys_audio-ref-tags\" >wbfsys_audio::tags</span> to Entity: wbfsys_tag Con: wbfsys_entity_tag" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio-ref-tags',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio-ref-tags',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_audio-ref-tags',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio '.$e->getMessage()
      ));
    }

    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_audio-conref-tags' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_audio-conref-tags';


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
    $secArea->upgrade( 'label', 'E-V-Ref: Tags' );
    
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tag' )  );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_tag' );  
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_tag-space-wbfsys_audio-tags' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_audio-con-tags' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-V-Ref: <span title=\"entity-wbfsys_audio-conref-tags\" >wbfsys_audio::tags</span> over Con: wbfsys_entity_tag to Entity: wbfsys_tag" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_audio-conref-tags',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_audio'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_audio-conref-tags',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_audio'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_audio-conref-tags',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_audio '.$e->getMessage()
      ));
    }
