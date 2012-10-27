<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_image::comments
//////////////////////////////////////////////////////////////////////////////*/

    // ein künstlicher Knoten welcher die connection beschreibt
    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_image-con-comments' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'wbfsys_image-con-comments';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'wbfsys_comment' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_comment' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_image-con-comments' )?:0;
      $ref->description  = 'Virtual reference to implement the ACL path';
      
    }
    $ref->revision    = $deployRevision;
    $orm->save( $ref );



    // referenz von der connection auf die source
    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_image-comments' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'wbfsys_image-comments';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'wbfsys_image' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_comment' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_image-comments' )?:0;
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
        'mgmt-wbfsys_entity_comment-space-wbfsys_image-comments' 
      ) 
     )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_entity_comment-space-wbfsys_image-comments';
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_image' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_image' );
    $secArea->upgrade( 'source_key', 'mgmt-wbfsys_entity_comment-ref-wbfsys_image-comments' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_comment-ref-wbfsys_image-comments' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_comment' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt' ) );
    $secArea->upgrade( 'type_key', 'space-mgmt' );
    $secArea->upgrade( 'description', "Virt. Mgmt: <span title=\"mgmt-wbfsys_entity_comment-space-wbfsys_image-comments\" >Entity Comment<span> in Space Image Ref: Comments" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    
    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_image-ref-comments' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_image-ref-comments';

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
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_comment-space-wbfsys_image-comments' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_image' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_image' );
    $secArea->upgrade( 'source_key', 'entity-wbfsys_image-ref-comments' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_image-ref-comments' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_image-comments' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "MRef: <span title=\"mgmt-wbfsys_image-ref-comments\" >wbfsys_image::comments</span> to Mgmt: wbfsys_comment Con: wbfsys_entity_comment" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    
    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_image-conref-comments' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_image-conref-comments';

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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_comment-space-wbfsys_image-comments' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_entity_comment-space-wbfsys_image-comments' );
    $secArea->upgrade( 'source_key', 'entity-wbfsys_entity_comment-conref-wbfsys_image-comments' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_comment-conref-wbfsys_image-comments' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_image-con-comments' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "VRef: <span title=\"mgmt-wbfsys_image-conref-comments\" >wbfsys_image::comments</span> over Con: wbfsys_entity_comment to Mgnt: wbfsys_comment" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_image::tags
//////////////////////////////////////////////////////////////////////////////*/

    // ein künstlicher Knoten welcher die connection beschreibt
    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_image-con-tags' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'wbfsys_image-con-tags';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'wbfsys_tag' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_tag' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_image-con-tags' )?:0;
      $ref->description  = 'Virtual reference to implement the ACL path';
      
    }
    $ref->revision    = $deployRevision;
    $orm->save( $ref );



    // referenz von der connection auf die source
    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_image-tags' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'wbfsys_image-tags';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'wbfsys_image' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_tag' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_image-tags' )?:0;
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
        'mgmt-wbfsys_entity_tag-space-wbfsys_image-tags' 
      ) 
     )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_entity_tag-space-wbfsys_image-tags';
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
    $secArea->upgrade( 'label', 'VMgmt: Entity Tag' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_tag' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_image' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_image' );
    $secArea->upgrade( 'source_key', 'mgmt-wbfsys_entity_tag-ref-wbfsys_image-tags' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_tag-ref-wbfsys_image-tags' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_tag' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt' ) );
    $secArea->upgrade( 'type_key', 'space-mgmt' );
    $secArea->upgrade( 'description', "Virt. Mgmt: <span title=\"mgmt-wbfsys_entity_tag-space-wbfsys_image-tags\" >Entity Tag<span> in Space Image Ref: Tags" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    
    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_image-ref-tags' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_image-ref-tags';

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
    
    $secArea->upgrade( 'label', 'M-Ref: Tags' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_tag-space-wbfsys_image-tags' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_image' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_image' );
    $secArea->upgrade( 'source_key', 'entity-wbfsys_image-ref-tags' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_image-ref-tags' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_image-tags' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "MRef: <span title=\"mgmt-wbfsys_image-ref-tags\" >wbfsys_image::tags</span> to Mgmt: wbfsys_tag Con: wbfsys_entity_tag" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    
    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_image-conref-tags' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_image-conref-tags';

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
    
    $secArea->upgrade( 'label', 'V-Ref: Tags' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_tag' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_entity_tag-space-wbfsys_image-tags' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_entity_tag-space-wbfsys_image-tags' );
    $secArea->upgrade( 'source_key', 'entity-wbfsys_entity_tag-conref-wbfsys_image-tags' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_entity_tag-conref-wbfsys_image-tags' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_image-con-tags' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "VRef: <span title=\"mgmt-wbfsys_image-conref-tags\" >wbfsys_image::tags</span> over Con: wbfsys_entity_tag to Mgnt: wbfsys_tag" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
