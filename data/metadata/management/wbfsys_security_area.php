<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for management: wbfsys_security_area
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the management
    $management = null;

    if( !$management = $orm->getByKey( 'WbfsysManagement', 'wbfsys_security_area' ) )
    {
      $management = new WbfsysManagement_Entity();
      $management->access_key = 'wbfsys_security_area';

      $management->name      = 'Security Area';
      $management->id_module = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $management->id_entity = $orm->getByKey( 'WbfsysEntity', 'wbfsys_security_area' );
      $management->description = '';
    }
    
    $management->revision    = $deployRevision;
    $orm->save( $management );

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_security_area' ) )
    {

      // security area wird nur befüllt wenn sie nicht schon existiert
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_security_area';

      $secArea->label      = 'Mgmt: Security Area';
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_security_area' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_security_area' );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagement', 'wbfsys_security_area' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt' ) );
    $secArea->upgrade( 'type_key', 'mgmt' );
    $secArea->upgrade( 'description', "Management: Security Area for Source: wbfsys_security_area" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    

    
    // masken
    if( !$maskTable = $orm->getByKey( 'WbfsysMask', 'wbfsys_security_area-table' ) )
    {
      $maskTable = new WbfsysMask_Entity();
      $maskTable->access_key = 'wbfsys_security_area-table';
      $maskTable->access_url = 'Wbfsys.SecurityArea.listing&amp;ltype=table';

      $maskTable->name            = 'Table Security Area';
      $maskTable->context         = 'table';
      $maskTable->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $maskTable->id_management   = $management;
      $maskTable->dset_mask      = false;
    }
    $maskTable->revision    = $deployRevision;
    $orm->save( $maskTable );
    
    // die create maske
    if( !$maskCreate = $orm->getByKey( 'WbfsysMask', 'wbfsys_security_area-create' ) )
    {
      $maskCreate = new WbfsysMask_Entity();
      $maskCreate->access_key = 'wbfsys_security_area-create';
      $maskCreate->access_url = 'Wbfsys.SecurityArea.create';

      $maskCreate->name            = 'Create Security Area';
      $maskCreate->context         = 'create';
      $maskCreate->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $maskCreate->dset_mask        = false;
    }
    $maskCreate->id_management   = $management;
    $maskCreate->revision    = $deployRevision;
    $orm->save( $maskCreate );
    
    // die edit maske
    if( !$maskEdit = $orm->getByKey( 'WbfsysMask', 'wbfsys_security_area-edit' ) )
    {
      $maskEdit = new WbfsysMask_Entity();
      $maskEdit->access_key = 'wbfsys_security_area-edit';
      $maskEdit->access_url = 'Wbfsys.SecurityArea.edit';

      $maskEdit->name            = 'Edit Security Area';
      $maskEdit->context         = 'edit';
      $maskEdit->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys'  );
      $maskEdit->dset_mask        = true;
    }
    $maskEdit->id_management   = $management;
    $maskEdit->revision    = $deployRevision;
    $orm->save( $maskEdit );
    
    // die show maske
    if( !$maskShow = $orm->getByKey( 'WbfsysMask', 'wbfsys_security_area-show' ) )
    {
      $maskShow = new WbfsysMask_Entity();
      $maskShow->access_key = 'wbfsys_security_area-show';
      $maskShow->access_url = 'Wbfsys.SecurityArea.show';

      $maskShow->name            = 'Show Security Area';
      $maskShow->context         = 'edit';
      $maskShow->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys'  );
      $maskShow->dset_mask        = true;
    }
    $maskShow->id_management   = $management;
    $maskShow->revision    = $deployRevision;
    $orm->save( $maskShow );
        
    // treetable maske
    if( !$maskTTable = $orm->getByKey( 'WbfsysMask', 'wbfsys_security_area-treettable' ) )
    {
      $maskTTable = new WbfsysMask_Entity();
      $maskTTable->access_key = 'wbfsys_security_area-treettable';
      $maskTTable->access_url = 'Wbfsys.SecurityArea.listing&amp;ltype=treetable';

      $maskTTable->name            = 'Treetable Security Area';
      $maskTTable->context         = 'treetable';
      $maskTTable->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $maskTTable->dset_mask        = false;
    }
    
    $maskTTable->revision    	= $deployRevision;
    $maskTTable->id_management	= $management;
    $orm->save( $maskTTable );
