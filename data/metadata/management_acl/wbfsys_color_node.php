<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for management acl: wbfsys_color_node
//////////////////////////////////////////////////////////////////////////////*/
   
    
    // listing masken
    if( !$maskMgmtAclList = $orm->getByKey( 'WbfsysMask', 'wbfsys_color_node-acl-listing' ) )
    {
      $maskMgmtAclList = new WbfsysMask_Entity();
      $maskMgmtAclList->access_key = 'wbfsys_color_node-acl-listing';
      $maskMgmtAclList->access_url = 'Wbfsys.ColorNode_Acl.listing';

      $maskMgmtAclList->name            = 'ACL Mgmt Color Node';
      $maskMgmtAclList->context         = 'listing_acl';
      $maskMgmtAclList->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskMgmtAclList->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_color_node' );
      $maskMgmtAclList->dset_mask      = false;
    }
    $maskMgmtAclList->revision    = $deployRevision;
    $orm->save( $maskMgmtAclList );
    
    // path masken
    if( !$maskMgmtAclPath = $orm->getByKey( 'WbfsysMask', 'wbfsys_color_node-acl-path' ) )
    {
      $maskMgmtAclPath = new WbfsysMask_Entity();
      $maskMgmtAclPath->access_key = 'wbfsys_color_node-acl-path';
      $maskMgmtAclPath->access_url = 'Wbfsys.ColorNode_Acl_Path.listing';

      $maskMgmtAclPath->name            = 'ACL Path Mgmt Color Node';
      $maskMgmtAclPath->context         = 'listing_acl_path';
      $maskMgmtAclPath->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskMgmtAclPath->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_color_node' );
      $maskMgmtAclPath->dset_mask      = true;
    }
    $maskMgmtAclPath->revision    = $deployRevision;
    $orm->save( $maskMgmtAclPath );
    
    // Datensatz Rechte
    if( !$maskMgmtAclDset = $orm->getByKey( 'WbfsysMask', 'wbfsys_color_node-acl-dset-listing' ) )
    {
      $maskMgmtAclDset = new WbfsysMask_Entity();
      $maskMgmtAclDset->access_key = 'wbfsys_color_node-acl-dset-listing';
      $maskMgmtAclDset->access_url = 'Wbfsys.ColorNode_Acl_Dset.listing';

      $maskMgmtAclDset->name            = 'ACL Dataset Mgmt Color Node';
      $maskMgmtAclDset->context         = 'dataset_acl';
      $maskMgmtAclDset->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskMgmtAclDset->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_color_node' );
      $maskMgmtAclDset->dset_mask      = true;
    }
    $maskMgmtAclDset->revision    = $deployRevision;
    $orm->save( $maskMgmtAclDset );

    
    // listing masken    
    if( !$maskMgmtAclEntityList = $orm->getByKey( 'WbfsysMask', 'wbfsys_color_node-entity-acl-listing' ) )
    {
      $maskMgmtAclEntityList = new WbfsysMask_Entity();
      $maskMgmtAclEntityList->access_key = 'wbfsys_color_node-entity-acl-listing';
      $maskMgmtAclEntityList->access_url = 'Wbfsys.ColorNode_Entity_Acl_Dset.listing';

      $maskMgmtAclEntityList->name            = 'ACL Entity Color Node';
      $maskMgmtAclEntityList->context         = 'listing_entity_acl';
      $maskMgmtAclEntityList->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskMgmtAclEntityList->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_color_node' );
      $maskMgmtAclEntityList->dset_mask        = false;
    }
    $maskMgmtAclEntityList->revision    = $deployRevision;
    $orm->save( $maskMgmtAclEntityList );
    
    // path masken    
    if( !$maskMgmtAclEntityPath = $orm->getByKey( 'WbfsysMask', 'wbfsys_color_node-entity-acl-path-listing' ) )
    {
      $maskMgmtAclEntityPath = new WbfsysMask_Entity();
      $maskMgmtAclEntityPath->access_key = 'wbfsys_color_node-entity-acl-path-listing';
      $maskMgmtAclEntityPath->access_url = 'Wbfsys.ColorNode_Entity_Acl_Path.listing';

      $maskMgmtAclEntityPath->name            = 'ACL Path Entity Color Node';
      $maskMgmtAclEntityPath->context         = 'listing_entity_acl_path';
      $maskMgmtAclEntityPath->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskMgmtAclEntityPath->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_color_node' );
      $maskMgmtAclEntityPath->dset_mask      = true;
    }
    $maskMgmtAclEntityPath->revision    = $deployRevision;
    $orm->save( $maskMgmtAclEntityPath );
    
    // Datensatz Rechte
    if( !$maskMgmtAclEntityDset = $orm->getByKey( 'WbfsysMask', 'wbfsys_color_node-entity-acl-dset-listing' ) )
    {
      $maskMgmtAclEntityDset = new WbfsysMask_Entity();
      $maskMgmtAclEntityDset->access_key = 'wbfsys_color_node-entity-acl-dset-listing';
      $maskMgmtAclEntityDset->access_url = 'Wbfsys.ColorNode_Entity_Acl_Dset.listing';

      $maskMgmtAclEntityDset->name            = 'ACL Dataset Entity Color Node';
      $maskMgmtAclEntityDset->context         = 'dataset_entity_acl';
      $maskMgmtAclEntityDset->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskMgmtAclEntityDset->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_color_node' );
      $maskMgmtAclEntityDset->dset_mask      = true;
    }
    $maskMgmtAclEntityDset->revision    = $deployRevision;
    $orm->save( $maskMgmtAclEntityDset );
   