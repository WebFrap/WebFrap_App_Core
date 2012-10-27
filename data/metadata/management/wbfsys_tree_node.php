<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for management: wbfsys_tree_node
//////////////////////////////////////////////////////////////////////////////*/

    // first clean the management
    $management = null;

    if( !$management = $orm->getByKey( 'WbfsysManagement', 'wbfsys_tree_node' ) )
    {
      $management = new WbfsysManagement_Entity();
      $management->access_key = 'wbfsys_tree_node';

      $management->name      = 'Tree Node';
      $management->id_module = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $management->id_entity = $orm->getByKey( 'WbfsysEntity', 'wbfsys_tree_node' );
      $management->description = '';
    }
    
    $management->revision    = $deployRevision;
    $orm->save( $management );

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'mgmt-wbfsys_tree_node' ) )
    {

      // security area wird nur befüllt wenn sie nicht schon existiert
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'mgmt-wbfsys_tree_node';

      $secArea->label      = 'Mgmt: Tree Node';
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
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_tree_node' ) );
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_tree_node' );
    $secArea->upgrade( 'vid', $orm->getByKey( 'WbfsysManagement', 'wbfsys_tree_node' ) );
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_management' ) );
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'mgmt' ) );
    $secArea->upgrade( 'type_key', 'mgmt' );
    $secArea->upgrade( 'description', "Management: Tree Node for Source: wbfsys_tree_node" );
    $secArea->revision    = $deployRevision;
    $orm->save( $secArea );
    

    
    // masken
    if( !$maskTable = $orm->getByKey( 'WbfsysMask', 'wbfsys_tree_node-table' ) )
    {
      $maskTable = new WbfsysMask_Entity();
      $maskTable->access_key = 'wbfsys_tree_node-table';
      $maskTable->access_url = 'Wbfsys.TreeNode.listing&amp;ltype=table';

      $maskTable->name            = 'Table Tree Node';
      $maskTable->context         = 'table';
      $maskTable->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $maskTable->id_management   = $management;
      $maskTable->dset_mask      = false;
    }
    $maskTable->revision    = $deployRevision;
    $orm->save( $maskTable );
    
    // die create maske
    if( !$maskCreate = $orm->getByKey( 'WbfsysMask', 'wbfsys_tree_node-create' ) )
    {
      $maskCreate = new WbfsysMask_Entity();
      $maskCreate->access_key = 'wbfsys_tree_node-create';
      $maskCreate->access_url = 'Wbfsys.TreeNode.create';

      $maskCreate->name            = 'Create Tree Node';
      $maskCreate->context         = 'create';
      $maskCreate->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $maskCreate->dset_mask        = false;
    }
    $maskCreate->id_management   = $management;
    $maskCreate->revision    = $deployRevision;
    $orm->save( $maskCreate );
    
    // die edit maske
    if( !$maskEdit = $orm->getByKey( 'WbfsysMask', 'wbfsys_tree_node-edit' ) )
    {
      $maskEdit = new WbfsysMask_Entity();
      $maskEdit->access_key = 'wbfsys_tree_node-edit';
      $maskEdit->access_url = 'Wbfsys.TreeNode.edit';

      $maskEdit->name            = 'Edit Tree Node';
      $maskEdit->context         = 'edit';
      $maskEdit->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys'  );
      $maskEdit->dset_mask        = true;
    }
    $maskEdit->id_management   = $management;
    $maskEdit->revision    = $deployRevision;
    $orm->save( $maskEdit );
    
    // die show maske
    if( !$maskShow = $orm->getByKey( 'WbfsysMask', 'wbfsys_tree_node-show' ) )
    {
      $maskShow = new WbfsysMask_Entity();
      $maskShow->access_key = 'wbfsys_tree_node-show';
      $maskShow->access_url = 'Wbfsys.TreeNode.show';

      $maskShow->name            = 'Show Tree Node';
      $maskShow->context         = 'edit';
      $maskShow->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys'  );
      $maskShow->dset_mask        = true;
    }
    $maskShow->id_management   = $management;
    $maskShow->revision    = $deployRevision;
    $orm->save( $maskShow );
        
    // treetable maske
    if( !$maskTTable = $orm->getByKey( 'WbfsysMask', 'wbfsys_tree_node-treettable' ) )
    {
      $maskTTable = new WbfsysMask_Entity();
      $maskTTable->access_key = 'wbfsys_tree_node-treettable';
      $maskTTable->access_url = 'Wbfsys.TreeNode.listing&amp;ltype=treetable';

      $maskTTable->name            = 'Treetable Tree Node';
      $maskTTable->context         = 'treetable';
      $maskTTable->id_module       = $orm->getByKey( 'WbfsysModule', 'wbfsys' );
      $maskTTable->dset_mask        = false;
    }
    
    $maskTTable->revision    	= $deployRevision;
    $maskTTable->id_management	= $management;
    $orm->save( $maskTTable );
