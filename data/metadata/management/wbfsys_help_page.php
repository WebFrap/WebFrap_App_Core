<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for management: wbfsys_help_page
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the management
    $management = null;

    if( !$management = $orm->getByKey( 'WbfsysManagement', 'wbfsys_help_page' ) )
    {
      $management = new WbfsysManagement_Entity();
      $management->access_key = 'wbfsys_help_page';

      $management->name      = 'Help Page';
      $management->id_module = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $management->id_entity = $orm->getByKey( 'WbfsysEntity', 'wbfsys_help_page' );
      $management->description = '';
    }
    
    $management->revision    = $deployRevision;
    $orm->save( $management );

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_help_page' ) )
    {

      // security area wird nur befüllt wenn sie nicht schon existiert
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_help_page';

      $secArea->label      = 'Mgmt: Help Page';
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_help_page' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_help_page' );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagement', 'wbfsys_help_page' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt' ) );
    $secArea->upgrade( 'type_key', 'mgmt' );
    $secArea->upgrade( 'description', "Management: Help Page for Source: wbfsys_help_page" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    

    
    // masken
    if( !$maskTable = $orm->getByKey( 'WbfsysMask', 'wbfsys_help_page-table' ) )
    {
      $maskTable = new WbfsysMask_Entity();
      $maskTable->access_key = 'wbfsys_help_page-table';
      $maskTable->access_url = 'Wbfsys.HelpPage.listing&amp;ltype=table';

      $maskTable->name            = 'Table Help Page';
      $maskTable->context         = 'table';
      $maskTable->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $maskTable->id_management   = $management;
      $maskTable->dset_mask      = false;
    }
    $maskTable->revision    = $deployRevision;
    $orm->save( $maskTable );
    
    // die create maske
    if( !$maskCreate = $orm->getByKey( 'WbfsysMask', 'wbfsys_help_page-create' ) )
    {
      $maskCreate = new WbfsysMask_Entity();
      $maskCreate->access_key = 'wbfsys_help_page-create';
      $maskCreate->access_url = 'Wbfsys.HelpPage.create';

      $maskCreate->name            = 'Create Help Page';
      $maskCreate->context         = 'create';
      $maskCreate->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $maskCreate->dset_mask        = false;
    }
    $maskCreate->id_management   = $management;
    $maskCreate->revision    = $deployRevision;
    $orm->save( $maskCreate );
    
    // die edit maske
    if( !$maskEdit = $orm->getByKey( 'WbfsysMask', 'wbfsys_help_page-edit' ) )
    {
      $maskEdit = new WbfsysMask_Entity();
      $maskEdit->access_key = 'wbfsys_help_page-edit';
      $maskEdit->access_url = 'Wbfsys.HelpPage.edit';

      $maskEdit->name            = 'Edit Help Page';
      $maskEdit->context         = 'edit';
      $maskEdit->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys'  );
      $maskEdit->dset_mask        = true;
    }
    $maskEdit->id_management   = $management;
    $maskEdit->revision    = $deployRevision;
    $orm->save( $maskEdit );
    
    // die show maske
    if( !$maskShow = $orm->getByKey( 'WbfsysMask', 'wbfsys_help_page-show' ) )
    {
      $maskShow = new WbfsysMask_Entity();
      $maskShow->access_key = 'wbfsys_help_page-show';
      $maskShow->access_url = 'Wbfsys.HelpPage.show';

      $maskShow->name            = 'Show Help Page';
      $maskShow->context         = 'edit';
      $maskShow->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys'  );
      $maskShow->dset_mask        = true;
    }
    $maskShow->id_management   = $management;
    $maskShow->revision    = $deployRevision;
    $orm->save( $maskShow );
    