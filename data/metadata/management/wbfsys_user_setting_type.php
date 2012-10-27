<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for management: wbfsys_user_setting_type
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the management
    $management = null;

    if( !$management = $orm->getByKey( 'WbfsysManagement', 'wbfsys_user_setting_type' ) )
    {
      $management = new WbfsysManagement_Entity();
      $management->access_key = 'wbfsys_user_setting_type';

      $management->name      = 'user setting value type';
      $management->id_module = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $management->id_entity = $orm->getByKey( 'WbfsysEntity', 'wbfsys_user_setting_type' );
      $management->description = 'user setting value type';
    }
    
    $management->revision    = $deployRevision;
    $orm->save( $management );

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_user_setting_type' ) )
    {

      // security area wird nur befüllt wenn sie nicht schon existiert
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_user_setting_type';

      $secArea->label      = 'Mgmt: user setting value type';
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_user_setting_type' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_user_setting_type' );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagement', 'wbfsys_user_setting_type' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt' ) );
    $secArea->upgrade( 'type_key', 'mgmt' );
    $secArea->upgrade( 'description', "Management: user setting value type for Source: wbfsys_user_setting_type" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    

    
    // masken
    if( !$maskTable = $orm->getByKey( 'WbfsysMask', 'wbfsys_user_setting_type-table' ) )
    {
      $maskTable = new WbfsysMask_Entity();
      $maskTable->access_key = 'wbfsys_user_setting_type-table';
      $maskTable->access_url = 'Wbfsys.UserSettingType.listing&amp;ltype=table';

      $maskTable->name            = 'Table user setting value type';
      $maskTable->context         = 'table';
      $maskTable->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $maskTable->id_management   = $management;
      $maskTable->dset_mask      = false;
    }
    $maskTable->revision    = $deployRevision;
    $orm->save( $maskTable );
    
    // die create maske
    if( !$maskCreate = $orm->getByKey( 'WbfsysMask', 'wbfsys_user_setting_type-create' ) )
    {
      $maskCreate = new WbfsysMask_Entity();
      $maskCreate->access_key = 'wbfsys_user_setting_type-create';
      $maskCreate->access_url = 'Wbfsys.UserSettingType.create';

      $maskCreate->name            = 'Create user setting value type';
      $maskCreate->context         = 'create';
      $maskCreate->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $maskCreate->dset_mask        = false;
    }
    $maskCreate->id_management   = $management;
    $maskCreate->revision    = $deployRevision;
    $orm->save( $maskCreate );
    
    // die edit maske
    if( !$maskEdit = $orm->getByKey( 'WbfsysMask', 'wbfsys_user_setting_type-edit' ) )
    {
      $maskEdit = new WbfsysMask_Entity();
      $maskEdit->access_key = 'wbfsys_user_setting_type-edit';
      $maskEdit->access_url = 'Wbfsys.UserSettingType.edit';

      $maskEdit->name            = 'Edit user setting value type';
      $maskEdit->context         = 'edit';
      $maskEdit->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys'  );
      $maskEdit->dset_mask        = true;
    }
    $maskEdit->id_management   = $management;
    $maskEdit->revision    = $deployRevision;
    $orm->save( $maskEdit );
    
    // die show maske
    if( !$maskShow = $orm->getByKey( 'WbfsysMask', 'wbfsys_user_setting_type-show' ) )
    {
      $maskShow = new WbfsysMask_Entity();
      $maskShow->access_key = 'wbfsys_user_setting_type-show';
      $maskShow->access_url = 'Wbfsys.UserSettingType.show';

      $maskShow->name            = 'Show user setting value type';
      $maskShow->context         = 'edit';
      $maskShow->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys'  );
      $maskShow->dset_mask        = true;
    }
    $maskShow->id_management   = $management;
    $maskShow->revision    = $deployRevision;
    $orm->save( $maskShow );
    