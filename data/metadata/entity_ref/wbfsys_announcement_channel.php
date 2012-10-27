<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_announcement_channel::user_subscriptions
//////////////////////////////////////////////////////////////////////////////*/
    
    // reference wbfsys_announcement_channel-con-user_subscriptions
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement_channel-con-user_subscriptions' ) )
    {

      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_announcement_channel-con-user_subscriptions';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_role_user' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_role_user-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_announcement_channel_subscription' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_announcement_channel_subscription-id_role' )?:0;
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
          'wbfsys_announcement_channel-con-user_subscriptions',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_announcement_channel-con-user_subscriptions'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_announcement_channel-con-user_subscriptions',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_announcement_channel-con-user_subscriptions'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_announcement_channel-con-user_subscriptions',
        'WbfsysEntityReference',
        'Failed to create WbfsysEntityReference wbfsys_announcement_channel-con-user_subscriptions '.$e->getMessage()
      ));
    }
    
    // reference wbfsys_announcement_channel-user_subscriptions
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement_channel-user_subscriptions' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_announcement_channel-user_subscriptions';

      $ref->id_to       = $orm->get( 'WbfsysEntity', "access_key='wbfsys_announcement_channel'" )?:0;
      $ref->id_field_to = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_announcement_channel-rowid'" )?:0;
      $ref->id_from        = $orm->get( 'WbfsysEntity', "access_key='wbfsys_announcement_channel_subscription'" )?:0;
      $ref->id_field_from  = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_announcement_channel_subscription-id_channel'" )?:0;
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
          'wbfsys_announcement_channel-user_subscriptions',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_announcement_channel-user_subscriptions'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_announcement_channel-user_subscriptions',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_announcement_channel-user_subscriptions'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_announcement_channel-user_subscriptions',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_announcement_channel-user_subscriptions '.$e->getMessage()
      ));
    }

    
    // um den bezug im pfad nicht zu verlieren wird eine virtuelle security area benötigt
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-user_subscriptions' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-user_subscriptions';

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
    $secArea->upgrade( 'description', "Virt. Entity: <span title=\"entity-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-user_subscriptions\" >Announcement Subscription<span> in Space Announcement Channel Ref: User Subscriptions" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-user_subscriptions',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_announcement_channel'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-user_subscriptions',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_announcement_channel'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-user_subscriptions',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_announcement_channel '.$e->getMessage()
      ));
    }

    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel-ref-user_subscriptions' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_announcement_channel-ref-user_subscriptions';

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
    $secArea->upgrade( 'label', 'E-M-Ref: User Subscriptions' );
    
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_user' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_role_user' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-user_subscriptions' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement_channel-user_subscriptions' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-M-Ref: <span title=\"entity-wbfsys_announcement_channel-ref-user_subscriptions\" >wbfsys_announcement_channel::user_subscriptions</span> to Entity: wbfsys_role_user Con: wbfsys_announcement_channel_subscription" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_announcement_channel-ref-user_subscriptions',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_announcement_channel'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_announcement_channel-ref-user_subscriptions',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_announcement_channel'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_announcement_channel-ref-user_subscriptions',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_announcement_channel '.$e->getMessage()
      ));
    }

    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel-conref-user_subscriptions' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_announcement_channel-conref-user_subscriptions';


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
    $secArea->upgrade( 'label', 'E-V-Ref: User Subscriptions' );
    
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_user' )  );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_role_user' );  
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-user_subscriptions' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement_channel-con-user_subscriptions' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-V-Ref: <span title=\"entity-wbfsys_announcement_channel-conref-user_subscriptions\" >wbfsys_announcement_channel::user_subscriptions</span> over Con: wbfsys_announcement_channel_subscription to Entity: wbfsys_role_user" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_announcement_channel-conref-user_subscriptions',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_announcement_channel'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_announcement_channel-conref-user_subscriptions',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_announcement_channel'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_announcement_channel-conref-user_subscriptions',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_announcement_channel '.$e->getMessage()
      ));
    }
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_announcement_channel::group_subscriptions
//////////////////////////////////////////////////////////////////////////////*/
    
    // reference wbfsys_announcement_channel-con-group_subscriptions
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement_channel-con-group_subscriptions' ) )
    {

      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_announcement_channel-con-group_subscriptions';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_role_group' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_role_group-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_announcement_channel_subscription' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_announcement_channel_subscription-id_role' )?:0;
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
          'wbfsys_announcement_channel-con-group_subscriptions',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_announcement_channel-con-group_subscriptions'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_announcement_channel-con-group_subscriptions',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_announcement_channel-con-group_subscriptions'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_announcement_channel-con-group_subscriptions',
        'WbfsysEntityReference',
        'Failed to create WbfsysEntityReference wbfsys_announcement_channel-con-group_subscriptions '.$e->getMessage()
      ));
    }
    
    // reference wbfsys_announcement_channel-group_subscriptions
    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement_channel-group_subscriptions' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_announcement_channel-group_subscriptions';

      $ref->id_to       = $orm->get( 'WbfsysEntity', "access_key='wbfsys_announcement_channel'" )?:0;
      $ref->id_field_to = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_announcement_channel-rowid'" )?:0;
      $ref->id_from        = $orm->get( 'WbfsysEntity', "access_key='wbfsys_announcement_channel_subscription'" )?:0;
      $ref->id_field_from  = $orm->get( 'WbfsysEntityAttribute', "access_key='wbfsys_announcement_channel_subscription-id_channel'" )?:0;
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
          'wbfsys_announcement_channel-group_subscriptions',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_announcement_channel-group_subscriptions'
        ));
      }
      else
      {
        
        if( !$ref->getSynchronized() )
        {
          $orm->update( $ref );
          $this->protocol(array(
            'update',
            'wbfsys_announcement_channel-group_subscriptions',
            'WbfsysEntityReference',
            'Sucessfully updated WbfsysEntityReference wbfsys_announcement_channel-group_subscriptions'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_announcement_channel-group_subscriptions',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_announcement_channel-group_subscriptions '.$e->getMessage()
      ));
    }

    
    // um den bezug im pfad nicht zu verlieren wird eine virtuelle security area benötigt
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-group_subscriptions' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-group_subscriptions';

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
    $secArea->upgrade( 'description', "Virt. Entity: <span title=\"entity-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-group_subscriptions\" >Announcement Subscription<span> in Space Announcement Channel Ref: Group Subscriptions" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-group_subscriptions',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_announcement_channel'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-group_subscriptions',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_announcement_channel'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-group_subscriptions',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_announcement_channel '.$e->getMessage()
      ));
    }

    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel-ref-group_subscriptions' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_announcement_channel-ref-group_subscriptions';

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
    $secArea->upgrade( 'label', 'E-M-Ref: Group Subscriptions' );
    
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_group' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_role_group' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-group_subscriptions' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement_channel-group_subscriptions' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-M-Ref: <span title=\"entity-wbfsys_announcement_channel-ref-group_subscriptions\" >wbfsys_announcement_channel::group_subscriptions</span> to Entity: wbfsys_role_group Con: wbfsys_announcement_channel_subscription" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_announcement_channel-ref-group_subscriptions',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_announcement_channel'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_announcement_channel-ref-group_subscriptions',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_announcement_channel'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_announcement_channel-ref-group_subscriptions',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_announcement_channel '.$e->getMessage()
      ));
    }

    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel-conref-group_subscriptions' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_announcement_channel-conref-group_subscriptions';


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
    $secArea->upgrade( 'label', 'E-V-Ref: Group Subscriptions' );
    
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_group' )  );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_role_group' );  
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-group_subscriptions' )  );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement_channel-con-group_subscriptions' ) ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );  
    $secArea->upgrade( 'description', "E-V-Ref: <span title=\"entity-wbfsys_announcement_channel-conref-group_subscriptions\" >wbfsys_announcement_channel::group_subscriptions</span> over Con: wbfsys_announcement_channel_subscription to Entity: wbfsys_role_group" ); 
    $secArea->revision        = $deployRevision;
    
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_announcement_channel-conref-group_subscriptions',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_announcement_channel'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_announcement_channel-conref-group_subscriptions',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_announcement_channel'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_announcement_channel-conref-group_subscriptions',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_announcement_channel '.$e->getMessage()
      ));
    }
