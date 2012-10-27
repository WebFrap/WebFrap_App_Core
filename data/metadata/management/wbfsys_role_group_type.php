<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for management: wbfsys_role_group_type
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the management
    $management = null;

    if( !$management = $orm->getByKey( 'WbfsysManagement', 'wbfsys_role_group_type' ) )
    {
      $management = new WbfsysManagement_Entity();
      $management->access_key = 'wbfsys_role_group_type';

      $management->name      = 'role group Type';
      $management->id_module = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $management->id_entity = $orm->getByKey( 'WbfsysEntity', 'wbfsys_role_group_type' );
      $management->description = 'role group Type';
    }
    
    $management->revision    = $deployRevision;
    $orm->save( $management );

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_role_group_type' ) )
    {

      // security area wird nur befüllt wenn sie nicht schon existiert
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_role_group_type';

      $secArea->label      = 'Mgmt: role group Type';
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
    
    // verweist auf die entity als parent
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_role_group_type' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_role_group_type' );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagement', 'wbfsys_role_group_type' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt' ) );
    $secArea->upgrade( 'type_key', 'mgmt' );
    $secArea->upgrade( 'description', "Management: role group Type for Source: wbfsys_role_group_type" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    

    
    // masken
    if( !$maskTable = $orm->getByKey( 'WbfsysMask', 'wbfsys_role_group_type-table' ) )
    {
      $maskTable = new WbfsysMask_Entity();
      $maskTable->access_key = 'wbfsys_role_group_type-table';
      $maskTable->access_url = 'Wbfsys.RoleGroupType.listing&amp;ltype=table';

      $maskTable->name            = 'Table role group Type';
      $maskTable->context         = 'table';
      $maskTable->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $maskTable->id_management   = $management;
      $maskTable->dset_mask      = false;
    }
    $maskTable->revision    = $deployRevision;
    $orm->save( $maskTable );
    
    // die create maske
    if( !$maskCreate = $orm->getByKey( 'WbfsysMask', 'wbfsys_role_group_type-create' ) )
    {
      $maskCreate = new WbfsysMask_Entity();
      $maskCreate->access_key = 'wbfsys_role_group_type-create';
      $maskCreate->access_url = 'Wbfsys.RoleGroupType.create';

      $maskCreate->name            = 'Create role group Type';
      $maskCreate->context         = 'create';
      $maskCreate->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $maskCreate->dset_mask        = false;
    }
    $maskCreate->id_management   = $management;
    $maskCreate->revision    = $deployRevision;
    $orm->save( $maskCreate );
    
    // die edit maske
    if( !$maskEdit = $orm->getByKey( 'WbfsysMask', 'wbfsys_role_group_type-edit' ) )
    {
      $maskEdit = new WbfsysMask_Entity();
      $maskEdit->access_key = 'wbfsys_role_group_type-edit';
      $maskEdit->access_url = 'Wbfsys.RoleGroupType.edit';

      $maskEdit->name            = 'Edit role group Type';
      $maskEdit->context         = 'edit';
      $maskEdit->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys'  );
      $maskEdit->dset_mask        = true;
    }
    $maskEdit->id_management   = $management;
    $maskEdit->revision    = $deployRevision;
    $orm->save( $maskEdit );
    
    // die show maske
    if( !$maskShow = $orm->getByKey( 'WbfsysMask', 'wbfsys_role_group_type-show' ) )
    {
      $maskShow = new WbfsysMask_Entity();
      $maskShow->access_key = 'wbfsys_role_group_type-show';
      $maskShow->access_url = 'Wbfsys.RoleGroupType.show';

      $maskShow->name            = 'Show role group Type';
      $maskShow->context         = 'edit';
      $maskShow->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys'  );
      $maskShow->dset_mask        = true;
    }
    $maskShow->id_management   = $management;
    $maskShow->revision    = $deployRevision;
    $orm->save( $maskShow );
    