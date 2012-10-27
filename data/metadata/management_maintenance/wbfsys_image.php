<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for management maintenance: wbfsys_image
//////////////////////////////////////////////////////////////////////////////*/
   
    
    // listing masken
    if( !$maskProtEntity = $orm->getByKey( 'WbfsysMask', 'wbfsys_image-maintenance-protocolentity' ) )
    {
      $maskProtEntity = new WbfsysMask_Entity();
      $maskProtEntity->access_key = 'wbfsys_image-maintenance-protocolentity';
      $maskProtEntity->access_url = 'Wbfsys.Image_Maintenance.protocolEntity';

      $maskProtEntity->name            = 'Full Protocol Image';
      $maskProtEntity->context         = 'listing_protocol';
      $maskProtEntity->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskProtEntity->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_image' );
      $maskProtEntity->dset_mask        = false;
    }
    $maskProtEntity->revision    = $deployRevision;
    $orm->save( $maskProtEntity );
    
    if( !$maskStatEntity = $orm->getByKey( 'WbfsysMask', 'wbfsys_image-maintenance-statsentity' ) )
    {
      $maskStatEntity = new WbfsysMask_Entity();
      $maskStatEntity->access_key = 'wbfsys_image-maintenance-statsentity';
      $maskStatEntity->access_url = 'Wbfsys.Image_Maintenance.statsEntity';

      $maskStatEntity->name            = 'Full Statistic Image';
      $maskStatEntity->context         = 'listing_statistic';
      $maskStatEntity->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskStatEntity->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_image' );
      $maskStatEntity->dset_mask        = false;
    }
    $maskStatEntity->revision    = $deployRevision;
    $orm->save( $maskStatEntity );
    
    if( !$maskBug = $orm->getByKey( 'WbfsysMask', 'wbfsys_image-maintenance-bug' ) )
    {
      $maskBug = new WbfsysMask_Entity();
      $maskBug->access_key = 'wbfsys_image-maintenance-bug';
      $maskBug->access_url = 'Wbfsys.Image_Maintenance.bug';

      $maskBug->name            = 'Report Bug Image';
      $maskBug->context         = 'bug';
      $maskBug->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskBug->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_image' );
      $maskBug->dset_mask      = false;
    }
    $maskBug->revision    = $deployRevision;
    $orm->save( $maskBug );
    
    if( !$maskHelp = $orm->getByKey( 'WbfsysMask', 'wbfsys_image-maintenance-help' ) )
    {
      $maskHelp = new WbfsysMask_Entity();
      $maskHelp->access_key = 'wbfsys_image-maintenance-help';
      $maskHelp->access_url = 'Wbfsys.Image_Maintenance.help';

      $maskHelp->name            = 'Help Image';
      $maskHelp->context         = 'help';
      $maskHelp->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskHelp->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_image' );
      $maskHelp->dset_mask        = false;
    }
    $maskHelp->revision    = $deployRevision;
    $orm->save( $maskHelp );
    
    if( !$maskFaq = $orm->getByKey( 'WbfsysMask', 'wbfsys_image-maintenance-faq' ) )
    {
      $maskFaq = new WbfsysMask_Entity();
      $maskFaq->access_key = 'wbfsys_image-maintenance-faq';
      $maskFaq->access_url = 'Wbfsys.Image_Maintenance.faq';

      $maskFaq->name            = 'FAQ Image';
      $maskFaq->context         = 'faq';
      $maskFaq->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskFaq->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_image' );
      $maskFaq->dset_mask        = false;
    }
    $maskFaq->revision    = $deployRevision;
    $orm->save( $maskFaq );
    
    // datensatz masken
    if( !$maskProtDset = $orm->getByKey( 'WbfsysMask', 'wbfsys_image-maintenance-protocoldataset' ) )
    {
      $maskProtDset = new WbfsysMask_Entity();
      $maskProtDset->access_key = 'wbfsys_image-maintenance-protocoldataset';
      $maskProtDset->access_url = 'Wbfsys.Image_Maintenance.protocolDataset';

      $maskProtDset->name            = 'Protocol Image';
      $maskProtDset->context         = 'dataset_protocol';
      $maskProtDset->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskProtDset->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_image' );
      $maskProtDset->dset_mask        = true;
    }
    $maskProtDset->revision    = $deployRevision;
    $orm->save( $maskProtDset );
    
    if( !$maskStatDset = $orm->getByKey( 'WbfsysMask', 'wbfsys_image-maintenance-statsdataset' ) )
    {
      $maskStatDset = new WbfsysMask_Entity();
      $maskStatDset->access_key = 'wbfsys_image-maintenance-statsdataset';
      $maskStatDset->access_url = 'Wbfsys.Image_Maintenance.statsDataset';

      $maskStatDset->name            = 'Statistic Image';
      $maskStatDset->context         = 'dataset_statistic';
      $maskStatDset->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskStatDset->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_image' );
      $maskStatDset->dset_mask        = true;
    }
    $maskStatDset->revision    = $deployRevision;
    $orm->save( $maskStatDset );
    
    if( !$maskMetadata = $orm->getByKey( 'WbfsysMask', 'wbfsys_image-maintenance-metadata' ) )
    {
      $maskMetadata = new WbfsysMask_Entity();
      $maskMetadata->access_key = 'wbfsys_image-maintenance-metadata';
      $maskMetadata->access_url = 'Wbfsys.Image_Maintenance.metadata';

      $maskMetadata->name            = 'Metadata Image';
      $maskMetadata->context         = 'dataset_metadata';
      $maskMetadata->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskMetadata->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_image' );
      $maskMetadata->dset_mask        = true;
    }
    $maskMetadata->revision    = $deployRevision;
    $orm->save( $maskMetadata );
