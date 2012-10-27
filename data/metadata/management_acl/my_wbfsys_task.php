<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for management acl: my_wbfsys_task
//////////////////////////////////////////////////////////////////////////////*/
   
    
    // listing masken
    if( !$maskMgmtAclList = $orm->getByKey( 'WbfsysMask', 'my_wbfsys_task-acl-listing' ) )
    {
      $maskMgmtAclList = new WbfsysMask_Entity();
      $maskMgmtAclList->access_key = 'my_wbfsys_task-acl-listing';
      $maskMgmtAclList->access_url = 'My.WbfsysTask_Acl.listing';

      $maskMgmtAclList->name            = 'ACL Mgmt My Tasks';
      $maskMgmtAclList->context         = 'listing_acl';
      $maskMgmtAclList->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskMgmtAclList->id_management   = $orm->getByKey( 'WbfsysManagement', 'my_wbfsys_task' );
      $maskMgmtAclList->dset_mask      = false;
    }
    $maskMgmtAclList->revision    = $deployRevision;
    $orm->save( $maskMgmtAclList );
    
    // path masken
    if( !$maskMgmtAclPath = $orm->getByKey( 'WbfsysMask', 'my_wbfsys_task-acl-path' ) )
    {
      $maskMgmtAclPath = new WbfsysMask_Entity();
      $maskMgmtAclPath->access_key = 'my_wbfsys_task-acl-path';
      $maskMgmtAclPath->access_url = 'My.WbfsysTask_Acl_Path.listing';

      $maskMgmtAclPath->name            = 'ACL Path Mgmt My Tasks';
      $maskMgmtAclPath->context         = 'listing_acl_path';
      $maskMgmtAclPath->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskMgmtAclPath->id_management   = $orm->getByKey( 'WbfsysManagement', 'my_wbfsys_task' );
      $maskMgmtAclPath->dset_mask      = true;
    }
    $maskMgmtAclPath->revision    = $deployRevision;
    $orm->save( $maskMgmtAclPath );
    
    // Datensatz Rechte
    if( !$maskMgmtAclDset = $orm->getByKey( 'WbfsysMask', 'my_wbfsys_task-acl-dset-listing' ) )
    {
      $maskMgmtAclDset = new WbfsysMask_Entity();
      $maskMgmtAclDset->access_key = 'my_wbfsys_task-acl-dset-listing';
      $maskMgmtAclDset->access_url = 'My.WbfsysTask_Acl_Dset.listing';

      $maskMgmtAclDset->name            = 'ACL Dataset Mgmt My Tasks';
      $maskMgmtAclDset->context         = 'dataset_acl';
      $maskMgmtAclDset->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskMgmtAclDset->id_management   = $orm->getByKey( 'WbfsysManagement', 'my_wbfsys_task' );
      $maskMgmtAclDset->dset_mask      = true;
    }
    $maskMgmtAclDset->revision    = $deployRevision;
    $orm->save( $maskMgmtAclDset );
