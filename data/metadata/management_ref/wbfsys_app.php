<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_app::app_modules
//////////////////////////////////////////////////////////////////////////////*/

    // ein künstlicher Knoten welcher die connection beschreibt
    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_app-con-app_modules' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'wbfsys_app-con-app_modules';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'wbfsys_module' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_app_modules' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_app-con-app_modules' )?:0;
      $ref->description  = 'Virtual reference to implement the ACL path';
      
    }
    $ref->revision    = $deployRevision;
    $orm->save( $ref );



    // referenz von der connection auf die source
    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_app-app_modules' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'wbfsys_app-app_modules';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'wbfsys_app' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_app_modules' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_app-app_modules' )?:0;
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
        'mgmt-wbfsys_app_modules-space-wbfsys_app-app_modules' 
      ) 
     )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_app_modules-space-wbfsys_app-app_modules';
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
    $secArea->upgrade( 'label', 'VMgmt: App Modules' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_app_modules' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_app' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_app' );
    $secArea->upgrade( 'source_key', 'mgmt-wbfsys_app_modules-ref-wbfsys_app-app_modules' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_app_modules-ref-wbfsys_app-app_modules' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagement', 'wbfsys_app_modules' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt' ) );
    $secArea->upgrade( 'type_key', 'space-mgmt' );
    $secArea->upgrade( 'description', "Virt. Mgmt: <span title=\"mgmt-wbfsys_app_modules-space-wbfsys_app-app_modules\" >App Modules<span> in Space App Ref: Modules" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    
    // standard security area
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_app-ref-app_modules' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_app-ref-app_modules';

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
    
    $secArea->upgrade( 'label', 'M-Ref: Modules' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_app_modules-space-wbfsys_app-app_modules' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_app' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_app' );
    $secArea->upgrade( 'source_key', 'entity-wbfsys_app-ref-app_modules' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_app-ref-app_modules' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_app-app_modules' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "MRef: <span title=\"mgmt-wbfsys_app-ref-app_modules\" >wbfsys_app::app_modules</span> to Mgmt: wbfsys_module Con: wbfsys_app_modules" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    
    // security area for the virtual path
    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_app-conref-app_modules' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_app-conref-app_modules';

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
    
    $secArea->upgrade( 'label', 'V-Ref: Modules' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_module' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_app_modules-space-wbfsys_app-app_modules' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_app_modules-space-wbfsys_app-app_modules' );
    $secArea->upgrade( 'source_key', 'entity-wbfsys_app_modules-conref-wbfsys_app-app_modules' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_app_modules-conref-wbfsys_app-app_modules' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_app-con-app_modules' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "VRef: <span title=\"mgmt-wbfsys_app-conref-app_modules\" >wbfsys_app::app_modules</span> over Con: wbfsys_app_modules to Mgnt: wbfsys_module" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_app::desktops
//////////////////////////////////////////////////////////////////////////////*/

    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_app-desktops' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'wbfsys_app-desktops';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'wbfsys_app' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_desktop' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_app-desktops' )?:0;
      $ref->description  = '';
    }
    $ref->revision    = $deployRevision;
    $orm->save( $ref );

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_app-ref-desktops' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_app-ref-desktops';

      $secArea->label      = 'S-Ref: Desktops';

      $secArea->id_level_listing = 90;
      $secArea->id_level_access = 90;
      $secArea->id_level_insert = 90;
      $secArea->id_level_update = 90;
      $secArea->id_level_delete = 90;
      $secArea->id_level_admin  = 90;
    }

    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_desktop' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_app' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_app' );
    $secArea->upgrade( 'source_key', 'entity-wbfsys_app-ref-desktops' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_app-ref-desktops' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_app-desktops' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "Reference: <span title=\"desktops\" >Desktops</span> to Entity: wbfsys_desktop  on Management: App for Entity: wbfsys_app " );
    $secArea->revision = $deployRevision;
    $orm->save( $secArea );
    