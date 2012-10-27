<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: my_wbfsys_task::comments
//////////////////////////////////////////////////////////////////////////////*/

    // ein künstlicher Knoten welcher die connection beschreibt
    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'my_wbfsys_task-con-comments' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'my_wbfsys_task-con-comments';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'wbfsys_comment' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_comment' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'my_wbfsys_task-con-comments' )?:0;
      $ref->description  = 'Virtual reference to implement the ACL path';
      
    }
    $ref->revision    = $deployRevision;
    $orm->save( $ref );



    // referenz von der connection auf die source
    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'my_wbfsys_task-comments' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'my_wbfsys_task-comments';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'my_wbfsys_task' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_comment' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'my_wbfsys_task-comments' )?:0;
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
        'mgmt-wbfsys_entity_comment-space-my_wbfsys_task-comments' 
      ) 
     )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_entity_comment-space-my_wbfsys_task-comments';
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
    $secArea->upgrade( 'label', 'VMgmt: Entity Comment' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_comment' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_task' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_task' );
    $secArea->upgrade( 'source_key', 'mgmt-wbfsys_entity_comment-ref-wbfsys_task-comments' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_comment-ref-wbfsys_task-comments' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_comment' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt' ) );
    $secArea->upgrade( 'type_key', 'space-mgmt' );
    $secArea->upgrade( 'description', "Virt. Mgmt: <span title=\"mgmt-wbfsys_entity_comment-space-my_wbfsys_task-comments\" >Entity Comment<span> in Space My Tasks Ref: Comments" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    
    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-my_wbfsys_task-ref-comments' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-my_wbfsys_task-ref-comments';

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
    
    $secArea->upgrade( 'label', 'M-Ref: Comments' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_comment-space-my_wbfsys_task-comments' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-my_wbfsys_task' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-my_wbfsys_task' );
    $secArea->upgrade( 'source_key', 'mgmt-wbfsys_task-ref-comments' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_task-ref-comments' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'my_wbfsys_task-comments' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "MRef: <span title=\"mgmt-my_wbfsys_task-ref-comments\" >my_wbfsys_task::comments</span> to Mgmt: wbfsys_comment Con: wbfsys_entity_comment" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    
    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-my_wbfsys_task-conref-comments' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-my_wbfsys_task-conref-comments';

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
    
    $secArea->upgrade( 'label', 'V-Ref: Comments' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_comment' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_comment-space-my_wbfsys_task-comments' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_entity_comment-space-my_wbfsys_task-comments' );
    $secArea->upgrade( 'source_key', 'mgmt-wbfsys_entity_comment-conref-wbfsys_task-comments' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_comment-conref-wbfsys_task-comments' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'my_wbfsys_task-con-comments' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "VRef: <span title=\"mgmt-my_wbfsys_task-conref-comments\" >my_wbfsys_task::comments</span> over Con: wbfsys_entity_comment to Mgnt: wbfsys_comment" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: my_wbfsys_task::attachments
//////////////////////////////////////////////////////////////////////////////*/

    // ein künstlicher Knoten welcher die connection beschreibt
    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'my_wbfsys_task-con-attachments' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'my_wbfsys_task-con-attachments';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'wbfsys_file' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_attachment' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'my_wbfsys_task-con-attachments' )?:0;
      $ref->description  = 'Virtual reference to implement the ACL path';
      
    }
    $ref->revision    = $deployRevision;
    $orm->save( $ref );



    // referenz von der connection auf die source
    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'my_wbfsys_task-attachments' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'my_wbfsys_task-attachments';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'my_wbfsys_task' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_attachment' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'my_wbfsys_task-attachments' )?:0;
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
        'mgmt-wbfsys_entity_attachment-space-my_wbfsys_task-attachments' 
      ) 
     )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_entity_attachment-space-my_wbfsys_task-attachments';
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
    $secArea->upgrade( 'label', 'VMgmt: Entity Attachment' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_attachment' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_task' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_task' );
    $secArea->upgrade( 'source_key', 'mgmt-wbfsys_entity_attachment-ref-wbfsys_task-attachments' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_attachment-ref-wbfsys_task-attachments' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_attachment' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt' ) );
    $secArea->upgrade( 'type_key', 'space-mgmt' );
    $secArea->upgrade( 'description', "Virt. Mgmt: <span title=\"mgmt-wbfsys_entity_attachment-space-my_wbfsys_task-attachments\" >Entity Attachment<span> in Space My Tasks Ref: Attachements" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    
    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-my_wbfsys_task-ref-attachments' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-my_wbfsys_task-ref-attachments';

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
    
    $secArea->upgrade( 'label', 'M-Ref: Attachements' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_attachment-space-my_wbfsys_task-attachments' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-my_wbfsys_task' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-my_wbfsys_task' );
    $secArea->upgrade( 'source_key', 'mgmt-wbfsys_task-ref-attachments' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_task-ref-attachments' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'my_wbfsys_task-attachments' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "MRef: <span title=\"mgmt-my_wbfsys_task-ref-attachments\" >my_wbfsys_task::attachments</span> to Mgmt: wbfsys_file Con: wbfsys_entity_attachment" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    
    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-my_wbfsys_task-conref-attachments' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-my_wbfsys_task-conref-attachments';

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
    
    $secArea->upgrade( 'label', 'V-Ref: Attachements' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_file' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_attachment-space-my_wbfsys_task-attachments' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_entity_attachment-space-my_wbfsys_task-attachments' );
    $secArea->upgrade( 'source_key', 'mgmt-wbfsys_entity_attachment-conref-wbfsys_task-attachments' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_attachment-conref-wbfsys_task-attachments' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'my_wbfsys_task-con-attachments' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "VRef: <span title=\"mgmt-my_wbfsys_task-conref-attachments\" >my_wbfsys_task::attachments</span> over Con: wbfsys_entity_attachment to Mgnt: wbfsys_file" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
