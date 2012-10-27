<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_role_user::user_roles
//////////////////////////////////////////////////////////////////////////////*/
    
    // reference wbfsys_role_user-con-user_roles
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_role_user-con-user_roles' ) )
    {

      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_role_user-con-user_roles';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_role_group' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_role_group-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_group_users' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_group_users-id_group' )?:0;
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
          'wbfsys_role_user-con-user_roles',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_role_user-con-user_roles'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_role_user-con-user_roles',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_role_user-con-user_roles'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_role_user-con-user_roles',
        'WbfsysEntityReference',
        'Failed to create WbfsysEntityReference wbfsys_role_user-con-user_roles '.$e->getMessage()
      ));
    }
    
    // reference wbfsys_role_user-user_roles
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_role_user-user_roles' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_role_user-user_roles';

      $ref->id_to       = $orm->get( 'WbfsysEntity', "access_key='wbfsys_role_user'" )?:0;
      $ref->id_field_to = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_role_user-rowid'" )?:0;
      $ref->id_from        = $orm->get( 'WbfsysEntity', "access_key='wbfsys_group_users'" )?:0;
      $ref->id_field_from  = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_group_users-id_user'" )?:0;
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
          'wbfsys_role_user-user_roles',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_role_user-user_roles'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_role_user-user_roles',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_role_user-user_roles'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_role_user-user_roles',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_role_user-user_roles '.$e->getMessage()
      ));
    }

    
    // um den bezug im pfad nicht zu verlieren wird eine virtuelle security area benötigt
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_group_users-space-wbfsys_role_user-user_roles' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_group_users-space-wbfsys_role_user-user_roles';

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
    $secArea->upgrade( 'label', 'E-V-Entity: Group Users' );

    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mod-Wbfsys' )  );
    $secArea->upgrade( 'parent_key', 'mod-Wbfsys' );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntity', 'wbfsys_group_users' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity' ) );   
    $secArea->upgrade( 'type_key', 'space_entity' );  
    $secArea->upgrade( 'description', "Virt. Entity: <span title=\"entity-wbfsys_group_users-space-wbfsys_role_user-user_roles\" >Group Users<span> in Space Role User Ref: User Roles" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_group_users-space-wbfsys_role_user-user_roles',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_role_user'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_group_users-space-wbfsys_role_user-user_roles',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_role_user'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_group_users-space-wbfsys_role_user-user_roles',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_role_user '.$e->getMessage()
      ));
    }

    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_user-ref-user_roles' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_role_user-ref-user_roles';

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
    $secArea->upgrade( 'label', 'E-M-Ref: User Roles' );
    
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_group' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_role_group' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_group_users-space-wbfsys_role_user-user_roles' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_role_user-user_roles' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-M-Ref: <span title=\"entity-wbfsys_role_user-ref-user_roles\" >wbfsys_role_user::user_roles</span> to Entity: wbfsys_role_group Con: wbfsys_group_users" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_role_user-ref-user_roles',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_role_user'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_role_user-ref-user_roles',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_role_user'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_role_user-ref-user_roles',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_role_user '.$e->getMessage()
      ));
    }

    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_user-conref-user_roles' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_role_user-conref-user_roles';


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
    $secArea->upgrade( 'label', 'E-V-Ref: User Roles' );
    
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_group' )  );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_role_group' );  
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_group_users-space-wbfsys_role_user-user_roles' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_role_user-con-user_roles' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-V-Ref: <span title=\"entity-wbfsys_role_user-conref-user_roles\" >wbfsys_role_user::user_roles</span> over Con: wbfsys_group_users to Entity: wbfsys_role_group" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_role_user-conref-user_roles',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_role_user'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_role_user-conref-user_roles',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_role_user'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_role_user-conref-user_roles',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_role_user '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_role_user::user_profiles
//////////////////////////////////////////////////////////////////////////////*/
    
    // reference wbfsys_role_user-con-user_profiles
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_role_user-con-user_profiles' ) )
    {

      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_role_user-con-user_profiles';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_profile' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_profile-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_user_profiles' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_user_profiles-id_profile' )?:0;
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
          'wbfsys_role_user-con-user_profiles',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_role_user-con-user_profiles'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_role_user-con-user_profiles',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_role_user-con-user_profiles'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_role_user-con-user_profiles',
        'WbfsysEntityReference',
        'Failed to create WbfsysEntityReference wbfsys_role_user-con-user_profiles '.$e->getMessage()
      ));
    }
    
    // reference wbfsys_role_user-user_profiles
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_role_user-user_profiles' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_role_user-user_profiles';

      $ref->id_to       = $orm->get( 'WbfsysEntity', "access_key='wbfsys_role_user'" )?:0;
      $ref->id_field_to = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_role_user-rowid'" )?:0;
      $ref->id_from        = $orm->get( 'WbfsysEntity', "access_key='wbfsys_user_profiles'" )?:0;
      $ref->id_field_from  = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_user_profiles-id_user'" )?:0;
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
          'wbfsys_role_user-user_profiles',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_role_user-user_profiles'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_role_user-user_profiles',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_role_user-user_profiles'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_role_user-user_profiles',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_role_user-user_profiles '.$e->getMessage()
      ));
    }

    
    // um den bezug im pfad nicht zu verlieren wird eine virtuelle security area benötigt
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_user_profiles-space-wbfsys_role_user-user_profiles' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_user_profiles-space-wbfsys_role_user-user_profiles';

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
    $secArea->upgrade( 'label', 'E-V-Entity: User Profiles' );

    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mod-Wbfsys' )  );
    $secArea->upgrade( 'parent_key', 'mod-Wbfsys' );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntity', 'wbfsys_user_profiles' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity' ) );   
    $secArea->upgrade( 'type_key', 'space_entity' );  
    $secArea->upgrade( 'description', "Virt. Entity: <span title=\"entity-wbfsys_user_profiles-space-wbfsys_role_user-user_profiles\" >User Profiles<span> in Space Role User Ref: Profiles" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_user_profiles-space-wbfsys_role_user-user_profiles',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_role_user'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_user_profiles-space-wbfsys_role_user-user_profiles',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_role_user'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_user_profiles-space-wbfsys_role_user-user_profiles',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_role_user '.$e->getMessage()
      ));
    }

    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_user-ref-user_profiles' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_role_user-ref-user_profiles';

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
    $secArea->upgrade( 'label', 'E-M-Ref: Profiles' );
    
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_profile' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_profile' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_user_profiles-space-wbfsys_role_user-user_profiles' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_role_user-user_profiles' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-M-Ref: <span title=\"entity-wbfsys_role_user-ref-user_profiles\" >wbfsys_role_user::user_profiles</span> to Entity: wbfsys_profile Con: wbfsys_user_profiles" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_role_user-ref-user_profiles',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_role_user'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_role_user-ref-user_profiles',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_role_user'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_role_user-ref-user_profiles',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_role_user '.$e->getMessage()
      ));
    }

    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_user-conref-user_profiles' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_role_user-conref-user_profiles';


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
    $secArea->upgrade( 'label', 'E-V-Ref: Profiles' );
    
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_profile' )  );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_profile' );  
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_user_profiles-space-wbfsys_role_user-user_profiles' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_role_user-con-user_profiles' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-V-Ref: <span title=\"entity-wbfsys_role_user-conref-user_profiles\" >wbfsys_role_user::user_profiles</span> over Con: wbfsys_user_profiles to Entity: wbfsys_profile" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_role_user-conref-user_profiles',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_role_user'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_role_user-conref-user_profiles',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_role_user'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_role_user-conref-user_profiles',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_role_user '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_role_user::user_message_profile
//////////////////////////////////////////////////////////////////////////////*/

    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_role_user-user_message_profile' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_role_user-user_message_profile';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_role_user' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_role_user-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_message_profile' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_message_profile-id_user' )?:0;
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
          'wbfsys_role_user-user_message_profile',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_role_user-user_message_profile'
        ));
      }
      else
      {
        $orm->update( $ref );
        $this->protocol(array(
          'update',
          'wbfsys_role_user-user_message_profile',
          'WbfsysEntityReference',
          'Sucessfully updated WbfsysEntityReference wbfsys_role_user-user_message_profile'
        ));
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_role_user-user_message_profile',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_role_user-user_message_profile '.$e->getMessage()
      ));
    }

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_user-ref-user_message_profile' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_role_user-ref-user_message_profile';

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
    $secArea->upgrade( 'label', 'S: Message Profile' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_user' ) ); 
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_user' ) ); 
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_role_user' );
    $secArea->upgrade( 'vid', $ref ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );   
    $secArea->upgrade( 'description', "Reference: user_message_profile on Entity: wbfsys_role_user to Entity: wbfsys_message_profile" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_role_user-ref-user_message_profile',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_role_user'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_role_user-ref-user_message_profile',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_role_user'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_role_user-ref-user_message_profile',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_role_user '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_role_user::address_item
//////////////////////////////////////////////////////////////////////////////*/

    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_role_user-address_item' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_role_user-address_item';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_role_user' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_role_user-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_address_item' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_address_item-id_user' )?:0;
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
          'wbfsys_role_user-address_item',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_role_user-address_item'
        ));
      }
      else
      {
        $orm->update( $ref );
        $this->protocol(array(
          'update',
          'wbfsys_role_user-address_item',
          'WbfsysEntityReference',
          'Sucessfully updated WbfsysEntityReference wbfsys_role_user-address_item'
        ));
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_role_user-address_item',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_role_user-address_item '.$e->getMessage()
      ));
    }

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_user-ref-address_item' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_role_user-ref-address_item';

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
    $secArea->upgrade( 'label', 'S: Message Item' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_user' ) ); 
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_user' ) ); 
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_role_user' );
    $secArea->upgrade( 'vid', $ref ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );   
    $secArea->upgrade( 'description', "Reference: address_item on Entity: wbfsys_role_user to Entity: wbfsys_address_item" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_role_user-ref-address_item',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_role_user'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_role_user-ref-address_item',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_role_user'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_role_user-ref-address_item',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_role_user '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_role_user::announcement_channel
//////////////////////////////////////////////////////////////////////////////*/
    
    // reference wbfsys_role_user-con-announcement_channel
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_role_user-con-announcement_channel' ) )
    {

      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_role_user-con-announcement_channel';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_announcement_channel' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_announcement_channel-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_announcement_channel_subscription' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_announcement_channel_subscription-id_channel' )?:0;
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
          'wbfsys_role_user-con-announcement_channel',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_role_user-con-announcement_channel'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_role_user-con-announcement_channel',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_role_user-con-announcement_channel'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_role_user-con-announcement_channel',
        'WbfsysEntityReference',
        'Failed to create WbfsysEntityReference wbfsys_role_user-con-announcement_channel '.$e->getMessage()
      ));
    }
    
    // reference wbfsys_role_user-announcement_channel
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_role_user-announcement_channel' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_role_user-announcement_channel';

      $ref->id_to       = $orm->get( 'WbfsysEntity', "access_key='wbfsys_role_user'" )?:0;
      $ref->id_field_to = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_role_user-rowid'" )?:0;
      $ref->id_from        = $orm->get( 'WbfsysEntity', "access_key='wbfsys_announcement_channel_subscription'" )?:0;
      $ref->id_field_from  = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_announcement_channel_subscription-id_role'" )?:0;
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
          'wbfsys_role_user-announcement_channel',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_role_user-announcement_channel'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_role_user-announcement_channel',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_role_user-announcement_channel'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_role_user-announcement_channel',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_role_user-announcement_channel '.$e->getMessage()
      ));
    }

    
    // um den bezug im pfad nicht zu verlieren wird eine virtuelle security area benötigt
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel_subscription-space-wbfsys_role_user-announcement_channel' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_announcement_channel_subscription-space-wbfsys_role_user-announcement_channel';

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
    $secArea->upgrade( 'label', 'E-V-Entity: Announcement Subscription' );

    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mod-Wbfsys' )  );
    $secArea->upgrade( 'parent_key', 'mod-Wbfsys' );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntity', 'wbfsys_announcement_channel_subscription' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity' ) );   
    $secArea->upgrade( 'type_key', 'space_entity' );  
    $secArea->upgrade( 'description', "Virt. Entity: <span title=\"entity-wbfsys_announcement_channel_subscription-space-wbfsys_role_user-announcement_channel\" >Announcement Subscription<span> in Space Role User Ref: Announcement Channel" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_announcement_channel_subscription-space-wbfsys_role_user-announcement_channel',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_role_user'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_announcement_channel_subscription-space-wbfsys_role_user-announcement_channel',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_role_user'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_announcement_channel_subscription-space-wbfsys_role_user-announcement_channel',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_role_user '.$e->getMessage()
      ));
    }

    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_user-ref-announcement_channel' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_role_user-ref-announcement_channel';

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
    $secArea->upgrade( 'label', 'E-M-Ref: Announcement Channel' );
    
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_announcement_channel' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel_subscription-space-wbfsys_role_user-announcement_channel' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_role_user-announcement_channel' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-M-Ref: <span title=\"entity-wbfsys_role_user-ref-announcement_channel\" >wbfsys_role_user::announcement_channel</span> to Entity: wbfsys_announcement_channel Con: wbfsys_announcement_channel_subscription" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_role_user-ref-announcement_channel',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_role_user'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_role_user-ref-announcement_channel',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_role_user'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_role_user-ref-announcement_channel',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_role_user '.$e->getMessage()
      ));
    }

    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_user-conref-announcement_channel' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_role_user-conref-announcement_channel';


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
    $secArea->upgrade( 'label', 'E-V-Ref: Announcement Channel' );
    
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel' )  );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_announcement_channel' );  
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel_subscription-space-wbfsys_role_user-announcement_channel' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_role_user-con-announcement_channel' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-V-Ref: <span title=\"entity-wbfsys_role_user-conref-announcement_channel\" >wbfsys_role_user::announcement_channel</span> over Con: wbfsys_announcement_channel_subscription to Entity: wbfsys_announcement_channel" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_role_user-conref-announcement_channel',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_role_user'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_role_user-conref-announcement_channel',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_role_user'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_role_user-conref-announcement_channel',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_role_user '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_role_user::contact_calls
//////////////////////////////////////////////////////////////////////////////*/
    
    // reference wbfsys_role_user-con-contact_calls
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_role_user-con-contact_calls' ) )
    {

      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_role_user-con-contact_calls';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'crm_contact' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'crm_contact-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'crm_contact_calls' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'crm_contact_calls-id_contact' )?:0;
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
          'wbfsys_role_user-con-contact_calls',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_role_user-con-contact_calls'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_role_user-con-contact_calls',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_role_user-con-contact_calls'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_role_user-con-contact_calls',
        'WbfsysEntityReference',
        'Failed to create WbfsysEntityReference wbfsys_role_user-con-contact_calls '.$e->getMessage()
      ));
    }
    
    // reference wbfsys_role_user-contact_calls
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_role_user-contact_calls' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_role_user-contact_calls';

      $ref->id_to       = $orm->get( 'WbfsysEntity', "access_key='wbfsys_role_user'" )?:0;
      $ref->id_field_to = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_role_user-rowid'" )?:0;
      $ref->id_from        = $orm->get( 'WbfsysEntity', "access_key='crm_contact_calls'" )?:0;
      $ref->id_field_from  = $orm->get( 'WbfsysEntityAttribute', "access_key='crm_contact_calls-id_user'" )?:0;
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
          'wbfsys_role_user-contact_calls',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_role_user-contact_calls'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_role_user-contact_calls',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_role_user-contact_calls'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_role_user-contact_calls',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_role_user-contact_calls '.$e->getMessage()
      ));
    }

    
    // um den bezug im pfad nicht zu verlieren wird eine virtuelle security area benötigt
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-crm_contact_calls-space-wbfsys_role_user-contact_calls' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-crm_contact_calls-space-wbfsys_role_user-contact_calls';

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
    $secArea->upgrade( 'label', 'E-V-Entity: Contact Calls' );

    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mod-Wbfsys' )  );
    $secArea->upgrade( 'parent_key', 'mod-Wbfsys' );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntity', 'crm_contact_calls' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity' ) );   
    $secArea->upgrade( 'type_key', 'space_entity' );  
    $secArea->upgrade( 'description', "Virt. Entity: <span title=\"entity-crm_contact_calls-space-wbfsys_role_user-contact_calls\" >Contact Calls<span> in Space Role User Ref: Customer Calls" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-crm_contact_calls-space-wbfsys_role_user-contact_calls',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_role_user'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-crm_contact_calls-space-wbfsys_role_user-contact_calls',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_role_user'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-crm_contact_calls-space-wbfsys_role_user-contact_calls',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_role_user '.$e->getMessage()
      ));
    }

    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_user-ref-contact_calls' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_role_user-ref-contact_calls';

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
    $secArea->upgrade( 'label', 'E-M-Ref: Customer Calls' );
    
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-crm_contact' ) );
    $secArea->upgrade( 'parent_key', 'entity-crm_contact' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-crm_contact_calls-space-wbfsys_role_user-contact_calls' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_role_user-contact_calls' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-M-Ref: <span title=\"entity-wbfsys_role_user-ref-contact_calls\" >wbfsys_role_user::contact_calls</span> to Entity: crm_contact Con: crm_contact_calls" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_role_user-ref-contact_calls',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_role_user'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_role_user-ref-contact_calls',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_role_user'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_role_user-ref-contact_calls',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_role_user '.$e->getMessage()
      ));
    }

    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_user-conref-contact_calls' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_role_user-conref-contact_calls';


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
    $secArea->upgrade( 'label', 'E-V-Ref: Customer Calls' );
    
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-crm_contact' )  );
    $secArea->upgrade( 'parent_key', 'entity-crm_contact' );  
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-crm_contact_calls-space-wbfsys_role_user-contact_calls' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_role_user-con-contact_calls' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-V-Ref: <span title=\"entity-wbfsys_role_user-conref-contact_calls\" >wbfsys_role_user::contact_calls</span> over Con: crm_contact_calls to Entity: crm_contact" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_role_user-conref-contact_calls',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_role_user'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_role_user-conref-contact_calls',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_role_user'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_role_user-conref-contact_calls',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_role_user '.$e->getMessage()
      ));
    }
