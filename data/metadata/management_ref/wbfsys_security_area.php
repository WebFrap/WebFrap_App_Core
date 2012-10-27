<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_security_area::access
//////////////////////////////////////////////////////////////////////////////*/

    if( !$ref = $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_security_area-access' ) )
    {
      $ref = new WbfsysManagementReference_Entity();
      $ref->access_key  = 'wbfsys_security_area-access';

      $ref->id_to        = $orm->getByKey( 'WbfsysManagement', 'wbfsys_security_area' )?:0;
      $ref->id_from      = $orm->getByKey( 'WbfsysManagement', 'wbfsys_security_access' )?:0;
      $ref->id_reference = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_security_area-access' )?:0;
      $ref->description  = '';
    }
    $ref->revision    = $deployRevision;
    $orm->save( $ref );

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_security_area-ref-access' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_security_area-ref-access';

      $secArea->label      = 'S-Ref: Access';

      $secArea->id_level_listing = 90;
      $secArea->id_level_access = 90;
      $secArea->id_level_insert = 90;
      $secArea->id_level_update = 90;
      $secArea->id_level_delete = 90;
      $secArea->id_level_admin  = 90;
    }

    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_security_access' ) );
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_security_area' ) );
    $secArea->upgrade( 'parent_key', 'mgmt-wbfsys_security_area' );
    $secArea->upgrade( 'source_key', 'entity-wbfsys_security_area-ref-access' );
    $secArea->upgrade( 'id_source', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_area-ref-access' ) );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagementReference', 'wbfsys_security_area-access' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management_reference' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt_reference' ) );
    $secArea->upgrade( 'type_key', 'mgmt_reference' );
    $secArea->upgrade( 'description', "Reference: <span title=\"access\" >Access</span> to Entity: wbfsys_security_access  on Management: Security Area for Entity: wbfsys_security_area " );
    $secArea->revision = $deployRevision;
    $orm->save( $secArea );
    