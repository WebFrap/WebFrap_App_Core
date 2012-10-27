<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for management maintenance: wbfsys_entity_alias
//////////////////////////////////////////////////////////////////////////////*/
   
    
    // listing masken
    if( !$maskProtEntity = $orm->getByKey( 'WbfsysMask', 'wbfsys_entity_alias-maintenance-protocolentity' ) )
    {
      $maskProtEntity = new WbfsysMask_Entity();
      $maskProtEntity->access_key = 'wbfsys_entity_alias-maintenance-protocolentity';
      $maskProtEntity->access_url = 'Wbfsys.EntityAlias_Maintenance.protocolEntity';

      $maskProtEntity->name            = 'Full Protocol Entity Alias';
      $maskProtEntity->context         = 'listing_protocol';
      $maskProtEntity->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskProtEntity->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_alias' );
      $maskProtEntity->dset_mask        = false;
    }
    $maskProtEntity->revision    = $deployRevision;
    $orm->save( $maskProtEntity );
    
    if( !$maskStatEntity = $orm->getByKey( 'WbfsysMask', 'wbfsys_entity_alias-maintenance-statsentity' ) )
    {
      $maskStatEntity = new WbfsysMask_Entity();
      $maskStatEntity->access_key = 'wbfsys_entity_alias-maintenance-statsentity';
      $maskStatEntity->access_url = 'Wbfsys.EntityAlias_Maintenance.statsEntity';

      $maskStatEntity->name            = 'Full Statistic Entity Alias';
      $maskStatEntity->context         = 'listing_statistic';
      $maskStatEntity->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskStatEntity->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_alias' );
      $maskStatEntity->dset_mask        = false;
    }
    $maskStatEntity->revision    = $deployRevision;
    $orm->save( $maskStatEntity );
    
    if( !$maskBug = $orm->getByKey( 'WbfsysMask', 'wbfsys_entity_alias-maintenance-bug' ) )
    {
      $maskBug = new WbfsysMask_Entity();
      $maskBug->access_key = 'wbfsys_entity_alias-maintenance-bug';
      $maskBug->access_url = 'Wbfsys.EntityAlias_Maintenance.bug';

      $maskBug->name            = 'Report Bug Entity Alias';
      $maskBug->context         = 'bug';
      $maskBug->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskBug->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_alias' );
      $maskBug->dset_mask      = false;
    }
    $maskBug->revision    = $deployRevision;
    $orm->save( $maskBug );
    
    if( !$maskHelp = $orm->getByKey( 'WbfsysMask', 'wbfsys_entity_alias-maintenance-help' ) )
    {
      $maskHelp = new WbfsysMask_Entity();
      $maskHelp->access_key = 'wbfsys_entity_alias-maintenance-help';
      $maskHelp->access_url = 'Wbfsys.EntityAlias_Maintenance.help';

      $maskHelp->name            = 'Help Entity Alias';
      $maskHelp->context         = 'help';
      $maskHelp->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskHelp->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_alias' );
      $maskHelp->dset_mask        = false;
    }
    $maskHelp->revision    = $deployRevision;
    $orm->save( $maskHelp );
    
    if( !$maskFaq = $orm->getByKey( 'WbfsysMask', 'wbfsys_entity_alias-maintenance-faq' ) )
    {
      $maskFaq = new WbfsysMask_Entity();
      $maskFaq->access_key = 'wbfsys_entity_alias-maintenance-faq';
      $maskFaq->access_url = 'Wbfsys.EntityAlias_Maintenance.faq';

      $maskFaq->name            = 'FAQ Entity Alias';
      $maskFaq->context         = 'faq';
      $maskFaq->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskFaq->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_alias' );
      $maskFaq->dset_mask        = false;
    }
    $maskFaq->revision    = $deployRevision;
    $orm->save( $maskFaq );
    
    // datensatz masken
    if( !$maskProtDset = $orm->getByKey( 'WbfsysMask', 'wbfsys_entity_alias-maintenance-protocoldataset' ) )
    {
      $maskProtDset = new WbfsysMask_Entity();
      $maskProtDset->access_key = 'wbfsys_entity_alias-maintenance-protocoldataset';
      $maskProtDset->access_url = 'Wbfsys.EntityAlias_Maintenance.protocolDataset';

      $maskProtDset->name            = 'Protocol Entity Alias';
      $maskProtDset->context         = 'dataset_protocol';
      $maskProtDset->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskProtDset->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_alias' );
      $maskProtDset->dset_mask        = true;
    }
    $maskProtDset->revision    = $deployRevision;
    $orm->save( $maskProtDset );
    
    if( !$maskStatDset = $orm->getByKey( 'WbfsysMask', 'wbfsys_entity_alias-maintenance-statsdataset' ) )
    {
      $maskStatDset = new WbfsysMask_Entity();
      $maskStatDset->access_key = 'wbfsys_entity_alias-maintenance-statsdataset';
      $maskStatDset->access_url = 'Wbfsys.EntityAlias_Maintenance.statsDataset';

      $maskStatDset->name            = 'Statistic Entity Alias';
      $maskStatDset->context         = 'dataset_statistic';
      $maskStatDset->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskStatDset->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_alias' );
      $maskStatDset->dset_mask        = true;
    }
    $maskStatDset->revision    = $deployRevision;
    $orm->save( $maskStatDset );
    
    if( !$maskMetadata = $orm->getByKey( 'WbfsysMask', 'wbfsys_entity_alias-maintenance-metadata' ) )
    {
      $maskMetadata = new WbfsysMask_Entity();
      $maskMetadata->access_key = 'wbfsys_entity_alias-maintenance-metadata';
      $maskMetadata->access_url = 'Wbfsys.EntityAlias_Maintenance.metadata';

      $maskMetadata->name            = 'Metadata Entity Alias';
      $maskMetadata->context         = 'dataset_metadata';
      $maskMetadata->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskMetadata->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_alias' );
      $maskMetadata->dset_mask        = true;
    }
    $maskMetadata->revision    = $deployRevision;
    $orm->save( $maskMetadata );
