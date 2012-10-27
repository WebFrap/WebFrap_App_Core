<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_entity_role::role_actions
//////////////////////////////////////////////////////////////////////////////*/
    
    // reference wbfsys_entity_role-con-role_actions
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_entity_role-con-role_actions' ) )
    {

      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_entity_role-con-role_actions';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_acl_action' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_acl_action-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_role_actions' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_entity_role_actions-id_action' )?:0;
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
          'wbfsys_entity_role-con-role_actions',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_entity_role-con-role_actions'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_entity_role-con-role_actions',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_entity_role-con-role_actions'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_role-con-role_actions',
        'WbfsysEntityReference',
        'Failed to create WbfsysEntityReference wbfsys_entity_role-con-role_actions '.$e->getMessage()
      ));
    }
    
    // reference wbfsys_entity_role-role_actions
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_entity_role-role_actions' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_entity_role-role_actions';

      $ref->id_to       = $orm->get( 'WbfsysEntity', "access_key='wbfsys_entity_role'" )?:0;
      $ref->id_field_to = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_entity_role-rowid'" )?:0;
      $ref->id_from        = $orm->get( 'WbfsysEntity', "access_key='wbfsys_entity_role_actions'" )?:0;
      $ref->id_field_from  = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_entity_role_actions-id_role'" )?:0;
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
          'wbfsys_entity_role-role_actions',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_entity_role-role_actions'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_entity_role-role_actions',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_entity_role-role_actions'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_entity_role-role_actions',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_entity_role-role_actions '.$e->getMessage()
      ));
    }

    
    // um den bezug im pfad nicht zu verlieren wird eine virtuelle security area benötigt
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_role_actions-space-wbfsys_entity_role-role_actions' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_entity_role_actions-space-wbfsys_entity_role-role_actions';

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
    $secArea->upgrade( 'label', 'E-V-Entity: Entity Role Actions' );

    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mod-Wbfsys' )  );
    $secArea->upgrade( 'parent_key', 'mod-Wbfsys' );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_role_actions' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity' ) );   
    $secArea->upgrade( 'type_key', 'space_entity' );  
    $secArea->upgrade( 'description', "Virt. Entity: <span title=\"entity-wbfsys_entity_role_actions-space-wbfsys_entity_role-role_actions\" >Entity Role Actions<span> in Space Entity Role Ref: Actions" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_entity_role_actions-space-wbfsys_entity_role-role_actions',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_entity_role'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_entity_role_actions-space-wbfsys_entity_role-role_actions',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_entity_role'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_entity_role_actions-space-wbfsys_entity_role-role_actions',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_entity_role '.$e->getMessage()
      ));
    }

    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_role-ref-role_actions' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_entity_role-ref-role_actions';

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
    $secArea->upgrade( 'label', 'E-M-Ref: Actions' );
    
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_acl_action' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_acl_action' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_role_actions-space-wbfsys_entity_role-role_actions' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_entity_role-role_actions' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-M-Ref: <span title=\"entity-wbfsys_entity_role-ref-role_actions\" >wbfsys_entity_role::role_actions</span> to Entity: wbfsys_acl_action Con: wbfsys_entity_role_actions" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_entity_role-ref-role_actions',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_entity_role'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_entity_role-ref-role_actions',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_entity_role'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_entity_role-ref-role_actions',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_entity_role '.$e->getMessage()
      ));
    }

    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_role-conref-role_actions' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_entity_role-conref-role_actions';


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
    $secArea->upgrade( 'label', 'E-V-Ref: Actions' );
    
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_acl_action' )  );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_acl_action' );  
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_role_actions-space-wbfsys_entity_role-role_actions' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_entity_role-con-role_actions' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-V-Ref: <span title=\"entity-wbfsys_entity_role-conref-role_actions\" >wbfsys_entity_role::role_actions</span> over Con: wbfsys_entity_role_actions to Entity: wbfsys_acl_action" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_entity_role-conref-role_actions',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_entity_role'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_entity_role-conref-role_actions',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_entity_role'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_entity_role-conref-role_actions',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_entity_role '.$e->getMessage()
      ));
    }
