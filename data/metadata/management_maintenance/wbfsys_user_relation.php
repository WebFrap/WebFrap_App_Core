<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for management maintenance: wbfsys_user_relation
//////////////////////////////////////////////////////////////////////////////*/
   
    
    // listing masken
    if( !$maskProtEntity = $orm->getByKey( 'WbfsysMask', 'wbfsys_user_relation-maintenance-protocolentity' ) )
    {
      $maskProtEntity = new WbfsysMask_Entity();
      $maskProtEntity->access_key = 'wbfsys_user_relation-maintenance-protocolentity';
      $maskProtEntity->access_url = 'Wbfsys.UserRelation_Maintenance.protocolEntity';

      $maskProtEntity->name            = 'Full Protocol User Relation';
      $maskProtEntity->context         = 'listing_protocol';
      $maskProtEntity->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskProtEntity->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_user_relation' );
      $maskProtEntity->dset_mask        = false;
    }
    $maskProtEntity->revision    = $deployRevision;
    $orm->save( $maskProtEntity );
    
    if( !$maskStatEntity = $orm->getByKey( 'WbfsysMask', 'wbfsys_user_relation-maintenance-statsentity' ) )
    {
      $maskStatEntity = new WbfsysMask_Entity();
      $maskStatEntity->access_key = 'wbfsys_user_relation-maintenance-statsentity';
      $maskStatEntity->access_url = 'Wbfsys.UserRelation_Maintenance.statsEntity';

      $maskStatEntity->name            = 'Full Statistic User Relation';
      $maskStatEntity->context         = 'listing_statistic';
      $maskStatEntity->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskStatEntity->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_user_relation' );
      $maskStatEntity->dset_mask        = false;
    }
    $maskStatEntity->revision    = $deployRevision;
    $orm->save( $maskStatEntity );
    
    if( !$maskBug = $orm->getByKey( 'WbfsysMask', 'wbfsys_user_relation-maintenance-bug' ) )
    {
      $maskBug = new WbfsysMask_Entity();
      $maskBug->access_key = 'wbfsys_user_relation-maintenance-bug';
      $maskBug->access_url = 'Wbfsys.UserRelation_Maintenance.bug';

      $maskBug->name            = 'Report Bug User Relation';
      $maskBug->context         = 'bug';
      $maskBug->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskBug->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_user_relation' );
      $maskBug->dset_mask      = false;
    }
    $maskBug->revision    = $deployRevision;
    $orm->save( $maskBug );
    
    if( !$maskHelp = $orm->getByKey( 'WbfsysMask', 'wbfsys_user_relation-maintenance-help' ) )
    {
      $maskHelp = new WbfsysMask_Entity();
      $maskHelp->access_key = 'wbfsys_user_relation-maintenance-help';
      $maskHelp->access_url = 'Wbfsys.UserRelation_Maintenance.help';

      $maskHelp->name            = 'Help User Relation';
      $maskHelp->context         = 'help';
      $maskHelp->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskHelp->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_user_relation' );
      $maskHelp->dset_mask        = false;
    }
    $maskHelp->revision    = $deployRevision;
    $orm->save( $maskHelp );
    
    if( !$maskFaq = $orm->getByKey( 'WbfsysMask', 'wbfsys_user_relation-maintenance-faq' ) )
    {
      $maskFaq = new WbfsysMask_Entity();
      $maskFaq->access_key = 'wbfsys_user_relation-maintenance-faq';
      $maskFaq->access_url = 'Wbfsys.UserRelation_Maintenance.faq';

      $maskFaq->name            = 'FAQ User Relation';
      $maskFaq->context         = 'faq';
      $maskFaq->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskFaq->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_user_relation' );
      $maskFaq->dset_mask        = false;
    }
    $maskFaq->revision    = $deployRevision;
    $orm->save( $maskFaq );
    
    // datensatz masken
    if( !$maskProtDset = $orm->getByKey( 'WbfsysMask', 'wbfsys_user_relation-maintenance-protocoldataset' ) )
    {
      $maskProtDset = new WbfsysMask_Entity();
      $maskProtDset->access_key = 'wbfsys_user_relation-maintenance-protocoldataset';
      $maskProtDset->access_url = 'Wbfsys.UserRelation_Maintenance.protocolDataset';

      $maskProtDset->name            = 'Protocol User Relation';
      $maskProtDset->context         = 'dataset_protocol';
      $maskProtDset->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskProtDset->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_user_relation' );
      $maskProtDset->dset_mask        = true;
    }
    $maskProtDset->revision    = $deployRevision;
    $orm->save( $maskProtDset );
    
    if( !$maskStatDset = $orm->getByKey( 'WbfsysMask', 'wbfsys_user_relation-maintenance-statsdataset' ) )
    {
      $maskStatDset = new WbfsysMask_Entity();
      $maskStatDset->access_key = 'wbfsys_user_relation-maintenance-statsdataset';
      $maskStatDset->access_url = 'Wbfsys.UserRelation_Maintenance.statsDataset';

      $maskStatDset->name            = 'Statistic User Relation';
      $maskStatDset->context         = 'dataset_statistic';
      $maskStatDset->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskStatDset->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_user_relation' );
      $maskStatDset->dset_mask        = true;
    }
    $maskStatDset->revision    = $deployRevision;
    $orm->save( $maskStatDset );
    
    if( !$maskMetadata = $orm->getByKey( 'WbfsysMask', 'wbfsys_user_relation-maintenance-metadata' ) )
    {
      $maskMetadata = new WbfsysMask_Entity();
      $maskMetadata->access_key = 'wbfsys_user_relation-maintenance-metadata';
      $maskMetadata->access_url = 'Wbfsys.UserRelation_Maintenance.metadata';

      $maskMetadata->name            = 'Metadata User Relation';
      $maskMetadata->context         = 'dataset_metadata';
      $maskMetadata->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskMetadata->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_user_relation' );
      $maskMetadata->dset_mask        = true;
    }
    $maskMetadata->revision    = $deployRevision;
    $orm->save( $maskMetadata );
