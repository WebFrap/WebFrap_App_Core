<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_announcement::attachments
//////////////////////////////////////////////////////////////////////////////*/
    
    // reference wbfsys_announcement-con-attachments
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement-con-attachments' ) )
    {

      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_announcement-con-attachments';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_file' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_file-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attachment' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_entity_attachment-id_file' )?:0;
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
          'wbfsys_announcement-con-attachments',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_announcement-con-attachments'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_announcement-con-attachments',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_announcement-con-attachments'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_announcement-con-attachments',
        'WbfsysEntityReference',
        'Failed to create WbfsysEntityReference wbfsys_announcement-con-attachments '.$e->getMessage()
      ));
    }
    
    // reference wbfsys_announcement-attachments
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement-attachments' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_announcement-attachments';

      $ref->id_to       = $orm->get( 'WbfsysEntity', "access_key='wbfsys_announcement'" )?:0;
      $ref->id_field_to = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_announcement-rowid'" )?:0;
      $ref->id_from        = $orm->get( 'WbfsysEntity', "access_key='wbfsys_entity_attachment'" )?:0;
      $ref->id_field_from  = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_entity_attachment-vid'" )?:0;
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
          'wbfsys_announcement-attachments',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_announcement-attachments'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_announcement-attachments',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_announcement-attachments'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_announcement-attachments',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_announcement-attachments '.$e->getMessage()
      ));
    }

    
    // um den bezug im pfad nicht zu verlieren wird eine virtuelle security area benötigt
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_attachment-space-wbfsys_announcement-attachments' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_entity_attachment-space-wbfsys_announcement-attachments';

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
    $secArea->upgrade( 'label', 'E-V-Entity: Entity Attachment' );

    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mod-Wbfsys' )  );
    $secArea->upgrade( 'parent_key', 'mod-Wbfsys' );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_attachment' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity' ) );   
    $secArea->upgrade( 'type_key', 'space_entity' );  
    $secArea->upgrade( 'description', "Virt. Entity: <span title=\"entity-wbfsys_entity_attachment-space-wbfsys_announcement-attachments\" >Entity Attachment<span> in Space Announcement Ref: Attachments" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_entity_attachment-space-wbfsys_announcement-attachments',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_announcement'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_entity_attachment-space-wbfsys_announcement-attachments',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_announcement'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_entity_attachment-space-wbfsys_announcement-attachments',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_announcement '.$e->getMessage()
      ));
    }

    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement-ref-attachments' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_announcement-ref-attachments';

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
    $secArea->upgrade( 'label', 'E-M-Ref: Attachments' );
    
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_file' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_file' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_attachment-space-wbfsys_announcement-attachments' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement-attachments' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-M-Ref: <span title=\"entity-wbfsys_announcement-ref-attachments\" >wbfsys_announcement::attachments</span> to Entity: wbfsys_file Con: wbfsys_entity_attachment" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_announcement-ref-attachments',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_announcement'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_announcement-ref-attachments',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_announcement'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_announcement-ref-attachments',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_announcement '.$e->getMessage()
      ));
    }

    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement-conref-attachments' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_announcement-conref-attachments';


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
    $secArea->upgrade( 'label', 'E-V-Ref: Attachments' );
    
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_file' )  );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_file' );  
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_attachment-space-wbfsys_announcement-attachments' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement-con-attachments' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-V-Ref: <span title=\"entity-wbfsys_announcement-conref-attachments\" >wbfsys_announcement::attachments</span> over Con: wbfsys_entity_attachment to Entity: wbfsys_file" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_announcement-conref-attachments',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_announcement'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_announcement-conref-attachments',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_announcement'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_announcement-conref-attachments',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_announcement '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_announcement::status
//////////////////////////////////////////////////////////////////////////////*/
    
    // reference wbfsys_announcement-con-status
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement-con-status' ) )
    {

      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_announcement-con-status';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_role_user' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_role_user-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_user_announcement' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_user_announcement-id_user' )?:0;
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
          'wbfsys_announcement-con-status',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_announcement-con-status'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_announcement-con-status',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_announcement-con-status'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_announcement-con-status',
        'WbfsysEntityReference',
        'Failed to create WbfsysEntityReference wbfsys_announcement-con-status '.$e->getMessage()
      ));
    }
    
    // reference wbfsys_announcement-status
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement-status' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_announcement-status';

      $ref->id_to       = $orm->get( 'WbfsysEntity', "access_key='wbfsys_announcement'" )?:0;
      $ref->id_field_to = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_announcement-rowid'" )?:0;
      $ref->id_from        = $orm->get( 'WbfsysEntity', "access_key='wbfsys_user_announcement'" )?:0;
      $ref->id_field_from  = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_user_announcement-id_announcement'" )?:0;
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
          'wbfsys_announcement-status',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_announcement-status'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_announcement-status',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_announcement-status'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_announcement-status',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_announcement-status '.$e->getMessage()
      ));
    }

    
    // um den bezug im pfad nicht zu verlieren wird eine virtuelle security area benötigt
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_user_announcement-space-wbfsys_announcement-status' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_user_announcement-space-wbfsys_announcement-status';

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
    $secArea->upgrade( 'label', 'E-V-Entity: User Announcement Status' );

    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mod-Wbfsys' )  );
    $secArea->upgrade( 'parent_key', 'mod-Wbfsys' );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntity', 'wbfsys_user_announcement' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity' ) );   
    $secArea->upgrade( 'type_key', 'space_entity' );  
    $secArea->upgrade( 'description', "Virt. Entity: <span title=\"entity-wbfsys_user_announcement-space-wbfsys_announcement-status\" >User Announcement Status<span> in Space Announcement Ref: User Status" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_user_announcement-space-wbfsys_announcement-status',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_announcement'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_user_announcement-space-wbfsys_announcement-status',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_announcement'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_user_announcement-space-wbfsys_announcement-status',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_announcement '.$e->getMessage()
      ));
    }

    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement-ref-status' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_announcement-ref-status';

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
    $secArea->upgrade( 'label', 'E-M-Ref: User Status' );
    
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_user' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_role_user' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_user_announcement-space-wbfsys_announcement-status' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement-status' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-M-Ref: <span title=\"entity-wbfsys_announcement-ref-status\" >wbfsys_announcement::status</span> to Entity: wbfsys_role_user Con: wbfsys_user_announcement" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_announcement-ref-status',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_announcement'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_announcement-ref-status',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_announcement'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_announcement-ref-status',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_announcement '.$e->getMessage()
      ));
    }

    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement-conref-status' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_announcement-conref-status';


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
    $secArea->upgrade( 'label', 'E-V-Ref: User Status' );
    
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_user' )  );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_role_user' );  
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_user_announcement-space-wbfsys_announcement-status' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement-con-status' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-V-Ref: <span title=\"entity-wbfsys_announcement-conref-status\" >wbfsys_announcement::status</span> over Con: wbfsys_user_announcement to Entity: wbfsys_role_user" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_announcement-conref-status',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_announcement'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_announcement-conref-status',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_announcement'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_announcement-conref-status',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_announcement '.$e->getMessage()
      ));
    }
