<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_entity_role::role_actions
//////////////////////////////////////////////////////////////////////////////*/

    // ein künstlicher Knoten welcher die connection beschreibt
    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_entity_role-con-role_actions' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'wbfsys_entity_role-con-role_actions';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'wbfsys_acl_action' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_role_actions' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_entity_role-con-role_actions' )?:0;
      $ref->description  = 'Virtual reference to implement the ACL path';
      
    }
    $ref->revision    = $deployRevision;
    $orm->save( $ref );



    // referenz von der connection auf die source
    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_entity_role-role_actions' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'wbfsys_entity_role-role_actions';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_role' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_role_actions' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_entity_role-role_actions' )?:0;
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
        'mgmt-wbfsys_entity_role_actions-space-wbfsys_entity_role-role_actions' 
      ) 
     )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_entity_role_actions-space-wbfsys_entity_role-role_actions';
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
    $secArea->upgrade( 'label', 'VMgmt: Entity Role Actions' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_role_actions' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_role' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_entity_role' );
    $secArea->upgrade( 'source_key', 'mgmt-wbfsys_entity_role_actions-ref-wbfsys_entity_role-role_actions' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_role_actions-ref-wbfsys_entity_role-role_actions' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_role_actions' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt' ) );
    $secArea->upgrade( 'type_key', 'space-mgmt' );
    $secArea->upgrade( 'description', "Virt. Mgmt: <span title=\"mgmt-wbfsys_entity_role_actions-space-wbfsys_entity_role-role_actions\" >Entity Role Actions<span> in Space Entity Role Ref: Actions" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    
    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_role-ref-role_actions' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_entity_role-ref-role_actions';

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
    
    $secArea->upgrade( 'label', 'M-Ref: Actions' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_role_actions-space-wbfsys_entity_role-role_actions' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_role' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_entity_role' );
    $secArea->upgrade( 'source_key', 'entity-wbfsys_entity_role-ref-role_actions' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_role-ref-role_actions' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_entity_role-role_actions' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "MRef: <span title=\"mgmt-wbfsys_entity_role-ref-role_actions\" >wbfsys_entity_role::role_actions</span> to Mgmt: wbfsys_acl_action Con: wbfsys_entity_role_actions" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    
    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_role-conref-role_actions' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_entity_role-conref-role_actions';

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
    
    $secArea->upgrade( 'label', 'V-Ref: Actions' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_acl_action' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_role_actions-space-wbfsys_entity_role-role_actions' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_entity_role_actions-space-wbfsys_entity_role-role_actions' );
    $secArea->upgrade( 'source_key', 'entity-wbfsys_entity_role_actions-conref-wbfsys_entity_role-role_actions' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_role_actions-conref-wbfsys_entity_role-role_actions' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_entity_role-con-role_actions' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "VRef: <span title=\"mgmt-wbfsys_entity_role-conref-role_actions\" >wbfsys_entity_role::role_actions</span> over Con: wbfsys_entity_role_actions to Mgnt: wbfsys_acl_action" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
