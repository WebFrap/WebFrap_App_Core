<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for management maintenance: core_skill
//////////////////////////////////////////////////////////////////////////////*/
   
    
    // listing masken
    if( !$maskProtEntity = $orm->getByKey( 'WbfsysMask', 'core_skill-maintenance-protocolentity' ) )
    {
      $maskProtEntity = new WbfsysMask_Entity();
      $maskProtEntity->access_key = 'core_skill-maintenance-protocolentity';
      $maskProtEntity->access_url = 'Core.Skill_Maintenance.protocolEntity';

      $maskProtEntity->name            = 'Full Protocol Skill';
      $maskProtEntity->context         = 'listing_protocol';
      $maskProtEntity->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskProtEntity->id_management   = $orm->getByKey( 'WbfsysManagement', 'core_skill' );
      $maskProtEntity->dset_mask        = false;
    }
    $maskProtEntity->revision    = $deployRevision;
    $orm->save( $maskProtEntity );
    
    if( !$maskStatEntity = $orm->getByKey( 'WbfsysMask', 'core_skill-maintenance-statsentity' ) )
    {
      $maskStatEntity = new WbfsysMask_Entity();
      $maskStatEntity->access_key = 'core_skill-maintenance-statsentity';
      $maskStatEntity->access_url = 'Core.Skill_Maintenance.statsEntity';

      $maskStatEntity->name            = 'Full Statistic Skill';
      $maskStatEntity->context         = 'listing_statistic';
      $maskStatEntity->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskStatEntity->id_management   = $orm->getByKey( 'WbfsysManagement', 'core_skill' );
      $maskStatEntity->dset_mask        = false;
    }
    $maskStatEntity->revision    = $deployRevision;
    $orm->save( $maskStatEntity );
    
    if( !$maskBug = $orm->getByKey( 'WbfsysMask', 'core_skill-maintenance-bug' ) )
    {
      $maskBug = new WbfsysMask_Entity();
      $maskBug->access_key = 'core_skill-maintenance-bug';
      $maskBug->access_url = 'Core.Skill_Maintenance.bug';

      $maskBug->name            = 'Report Bug Skill';
      $maskBug->context         = 'bug';
      $maskBug->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskBug->id_management   = $orm->getByKey( 'WbfsysManagement', 'core_skill' );
      $maskBug->dset_mask      = false;
    }
    $maskBug->revision    = $deployRevision;
    $orm->save( $maskBug );
    
    if( !$maskHelp = $orm->getByKey( 'WbfsysMask', 'core_skill-maintenance-help' ) )
    {
      $maskHelp = new WbfsysMask_Entity();
      $maskHelp->access_key = 'core_skill-maintenance-help';
      $maskHelp->access_url = 'Core.Skill_Maintenance.help';

      $maskHelp->name            = 'Help Skill';
      $maskHelp->context         = 'help';
      $maskHelp->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskHelp->id_management   = $orm->getByKey( 'WbfsysManagement', 'core_skill' );
      $maskHelp->dset_mask        = false;
    }
    $maskHelp->revision    = $deployRevision;
    $orm->save( $maskHelp );
    
    if( !$maskFaq = $orm->getByKey( 'WbfsysMask', 'core_skill-maintenance-faq' ) )
    {
      $maskFaq = new WbfsysMask_Entity();
      $maskFaq->access_key = 'core_skill-maintenance-faq';
      $maskFaq->access_url = 'Core.Skill_Maintenance.faq';

      $maskFaq->name            = 'FAQ Skill';
      $maskFaq->context         = 'faq';
      $maskFaq->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskFaq->id_management   = $orm->getByKey( 'WbfsysManagement', 'core_skill' );
      $maskFaq->dset_mask        = false;
    }
    $maskFaq->revision    = $deployRevision;
    $orm->save( $maskFaq );
    
    // datensatz masken
    if( !$maskProtDset = $orm->getByKey( 'WbfsysMask', 'core_skill-maintenance-protocoldataset' ) )
    {
      $maskProtDset = new WbfsysMask_Entity();
      $maskProtDset->access_key = 'core_skill-maintenance-protocoldataset';
      $maskProtDset->access_url = 'Core.Skill_Maintenance.protocolDataset';

      $maskProtDset->name            = 'Protocol Skill';
      $maskProtDset->context         = 'dataset_protocol';
      $maskProtDset->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskProtDset->id_management   = $orm->getByKey( 'WbfsysManagement', 'core_skill' );
      $maskProtDset->dset_mask        = true;
    }
    $maskProtDset->revision    = $deployRevision;
    $orm->save( $maskProtDset );
    
    if( !$maskStatDset = $orm->getByKey( 'WbfsysMask', 'core_skill-maintenance-statsdataset' ) )
    {
      $maskStatDset = new WbfsysMask_Entity();
      $maskStatDset->access_key = 'core_skill-maintenance-statsdataset';
      $maskStatDset->access_url = 'Core.Skill_Maintenance.statsDataset';

      $maskStatDset->name            = 'Statistic Skill';
      $maskStatDset->context         = 'dataset_statistic';
      $maskStatDset->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskStatDset->id_management   = $orm->getByKey( 'WbfsysManagement', 'core_skill' );
      $maskStatDset->dset_mask        = true;
    }
    $maskStatDset->revision    = $deployRevision;
    $orm->save( $maskStatDset );
    
    if( !$maskMetadata = $orm->getByKey( 'WbfsysMask', 'core_skill-maintenance-metadata' ) )
    {
      $maskMetadata = new WbfsysMask_Entity();
      $maskMetadata->access_key = 'core_skill-maintenance-metadata';
      $maskMetadata->access_url = 'Core.Skill_Maintenance.metadata';

      $maskMetadata->name            = 'Metadata Skill';
      $maskMetadata->context         = 'dataset_metadata';
      $maskMetadata->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskMetadata->id_management   = $orm->getByKey( 'WbfsysManagement', 'core_skill' );
      $maskMetadata->dset_mask        = true;
    }
    $maskMetadata->revision    = $deployRevision;
    $orm->save( $maskMetadata );
