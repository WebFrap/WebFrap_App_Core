<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_announcement_channel::user_subscriptions
//////////////////////////////////////////////////////////////////////////////*/

    // ein künstlicher Knoten welcher die connection beschreibt
    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_announcement_channel-con-user_subscriptions' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'wbfsys_announcement_channel-con-user_subscriptions';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'wbfsys_role_user' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_announcement_channel_subscription' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement_channel-con-user_subscriptions' )?:0;
      $ref->description  = 'Virtual reference to implement the ACL path';
      
    }
    $ref->revision    = $deployRevision;
    $orm->save( $ref );



    // referenz von der connection auf die source
    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_announcement_channel-user_subscriptions' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'wbfsys_announcement_channel-user_subscriptions';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'wbfsys_announcement_channel' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_announcement_channel_subscription' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement_channel-user_subscriptions' )?:0;
      $ref->description  = '';
    }
    $ref->revision    = $deployRevision;
    $orm->save( $ref );

    // um den bezug im pfad nicht zu verlieren wird eine virtuelle security area benötigt
    $secArea = null;

    if
    ( 
      !$secArea = $orm->getByKey
      ( 
        'WbfsysSecurityArea', 
        'mgmt-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-user_subscriptions' 
      ) 
     )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-user_subscriptions';
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
    
    // verweist auf die das reale management als parent
    $secArea->upgrade( 'label', 'VMgmt: Announcement Subscription' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_announcement_channel_subscription' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_announcement_channel' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_announcement_channel' );
    $secArea->upgrade( 'source_key', 'mgmt-wbfsys_announcement_channel_subscription-ref-wbfsys_announcement_channel-user_subscriptions' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel_subscription-ref-wbfsys_announcement_channel-user_subscriptions' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagement', 'wbfsys_announcement_channel_subscription' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt' ) );
    $secArea->upgrade( 'type_key', 'space-mgmt' );
    $secArea->upgrade( 'description', "Virt. Mgmt: <span title=\"mgmt-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-user_subscriptions\" >Announcement Subscription<span> in Space Announcement Channel Ref: User Subscriptions" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    
    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_announcement_channel-ref-user_subscriptions' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_announcement_channel-ref-user_subscriptions';

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
    
    $secArea->upgrade( 'label', 'M-Ref: User Subscriptions' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-user_subscriptions' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_announcement_channel' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_announcement_channel' );
    $secArea->upgrade( 'source_key', 'entity-wbfsys_announcement_channel-ref-user_subscriptions' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel-ref-user_subscriptions' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_announcement_channel-user_subscriptions' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "MRef: <span title=\"mgmt-wbfsys_announcement_channel-ref-user_subscriptions\" >wbfsys_announcement_channel::user_subscriptions</span> to Mgmt: wbfsys_role_user Con: wbfsys_announcement_channel_subscription" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    
    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_announcement_channel-conref-user_subscriptions' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_announcement_channel-conref-user_subscriptions';

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
    
    $secArea->upgrade( 'label', 'V-Ref: User Subscriptions' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_role_user' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-user_subscriptions' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-user_subscriptions' );
    $secArea->upgrade( 'source_key', 'entity-wbfsys_announcement_channel_subscription-conref-wbfsys_announcement_channel-user_subscriptions' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel_subscription-conref-wbfsys_announcement_channel-user_subscriptions' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_announcement_channel-con-user_subscriptions' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "VRef: <span title=\"mgmt-wbfsys_announcement_channel-conref-user_subscriptions\" >wbfsys_announcement_channel::user_subscriptions</span> over Con: wbfsys_announcement_channel_subscription to Mgnt: wbfsys_role_user" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_announcement_channel::group_subscriptions
//////////////////////////////////////////////////////////////////////////////*/

    // ein künstlicher Knoten welcher die connection beschreibt
    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_announcement_channel-con-group_subscriptions' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'wbfsys_announcement_channel-con-group_subscriptions';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'wbfsys_role_group' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_announcement_channel_subscription' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement_channel-con-group_subscriptions' )?:0;
      $ref->description  = 'Virtual reference to implement the ACL path';
      
    }
    $ref->revision    = $deployRevision;
    $orm->save( $ref );



    // referenz von der connection auf die source
    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_announcement_channel-group_subscriptions' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'wbfsys_announcement_channel-group_subscriptions';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'wbfsys_announcement_channel' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_announcement_channel_subscription' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_announcement_channel-group_subscriptions' )?:0;
      $ref->description  = '';
    }
    $ref->revision    = $deployRevision;
    $orm->save( $ref );

    // um den bezug im pfad nicht zu verlieren wird eine virtuelle security area benötigt
    $secArea = null;

    if
    ( 
      !$secArea = $orm->getByKey
      ( 
        'WbfsysSecurityArea', 
        'mgmt-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-group_subscriptions' 
      ) 
     )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-group_subscriptions';
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
    
    // verweist auf die das reale management als parent
    $secArea->upgrade( 'label', 'VMgmt: Announcement Subscription' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_announcement_channel_subscription' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_announcement_channel' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_announcement_channel' );
    $secArea->upgrade( 'source_key', 'mgmt-wbfsys_announcement_channel_subscription-ref-wbfsys_announcement_channel-group_subscriptions' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel_subscription-ref-wbfsys_announcement_channel-group_subscriptions' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagement', 'wbfsys_announcement_channel_subscription' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt' ) );
    $secArea->upgrade( 'type_key', 'space-mgmt' );
    $secArea->upgrade( 'description', "Virt. Mgmt: <span title=\"mgmt-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-group_subscriptions\" >Announcement Subscription<span> in Space Announcement Channel Ref: Group Subscriptions" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    
    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_announcement_channel-ref-group_subscriptions' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_announcement_channel-ref-group_subscriptions';

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
    
    $secArea->upgrade( 'label', 'M-Ref: Group Subscriptions' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-group_subscriptions' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_announcement_channel' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_announcement_channel' );
    $secArea->upgrade( 'source_key', 'entity-wbfsys_announcement_channel-ref-group_subscriptions' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel-ref-group_subscriptions' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_announcement_channel-group_subscriptions' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "MRef: <span title=\"mgmt-wbfsys_announcement_channel-ref-group_subscriptions\" >wbfsys_announcement_channel::group_subscriptions</span> to Mgmt: wbfsys_role_group Con: wbfsys_announcement_channel_subscription" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    
    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_announcement_channel-conref-group_subscriptions' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_announcement_channel-conref-group_subscriptions';

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
    
    $secArea->upgrade( 'label', 'V-Ref: Group Subscriptions' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_role_group' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-group_subscriptions' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_announcement_channel_subscription-space-wbfsys_announcement_channel-group_subscriptions' );
    $secArea->upgrade( 'source_key', 'entity-wbfsys_announcement_channel_subscription-conref-wbfsys_announcement_channel-group_subscriptions' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_announcement_channel_subscription-conref-wbfsys_announcement_channel-group_subscriptions' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_announcement_channel-con-group_subscriptions' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "VRef: <span title=\"mgmt-wbfsys_announcement_channel-conref-group_subscriptions\" >wbfsys_announcement_channel::group_subscriptions</span> over Con: wbfsys_announcement_channel_subscription to Mgnt: wbfsys_role_group" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
