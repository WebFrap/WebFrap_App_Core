<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_browser::version
//////////////////////////////////////////////////////////////////////////////*/

    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_browser-version' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'wbfsys_browser-version';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'wbfsys_browser' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_browser_version' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_browser-version' )?:0;
      $ref->description  = '';
    }
    $ref->revision    = $deployRevision;
    $orm->save( $ref );

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_browser-ref-version' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_browser-ref-version';

      $secArea->label      = 'S-Ref: Version';

      $secArea->id_level_listing = 90;
      $secArea->id_level_access = 90;
      $secArea->id_level_insert = 90;
      $secArea->id_level_update = 90;
      $secArea->id_level_delete = 90;
      $secArea->id_level_admin  = 90;
    }

    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_browser_version' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_browser' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_browser' );
    $secArea->upgrade( 'source_key', 'entity-wbfsys_browser-ref-version' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_browser-ref-version' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_browser-version' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "Reference: <span title=\"version\" >Version</span> to Entity: wbfsys_browser_version  on Management: Browser for Entity: wbfsys_browser " );
    $secArea->revision = $deployRevision;
    $orm->save( $secArea );
    