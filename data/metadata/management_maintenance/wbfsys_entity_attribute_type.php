<?php
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for management maintenance: wbfsys_entity_attribute_type
//////////////////////////////////////////////////////////////////////////////*/
   
    
    // listing masken
    if( !$maskProtEntity = $orm->getByKey( 'WbfsysMask', 'wbfsys_entity_attribute_type-maintenance-protocolentity' ) )
    {
      $maskProtEntity = new WbfsysMask_Entity();
      $maskProtEntity->access_key = 'wbfsys_entity_attribute_type-maintenance-protocolentity';
      $maskProtEntity->access_url = 'Wbfsys.EntityAttributeType_Maintenance.protocolEntity';

      $maskProtEntity->name            = 'Full Protocol entity attribute Type';
      $maskProtEntity->context         = 'listing_protocol';
      $maskProtEntity->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskProtEntity->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_attribute_type' );
      $maskProtEntity->dset_mask        = false;
    }
    $maskProtEntity->revision    = $deployRevision;
    $orm->save( $maskProtEntity );
    
    if( !$maskStatEntity = $orm->getByKey( 'WbfsysMask', 'wbfsys_entity_attribute_type-maintenance-statsentity' ) )
    {
      $maskStatEntity = new WbfsysMask_Entity();
      $maskStatEntity->access_key = 'wbfsys_entity_attribute_type-maintenance-statsentity';
      $maskStatEntity->access_url = 'Wbfsys.EntityAttributeType_Maintenance.statsEntity';

      $maskStatEntity->name            = 'Full Statistic entity attribute Type';
      $maskStatEntity->context         = 'listing_statistic';
      $maskStatEntity->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskStatEntity->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_attribute_type' );
      $maskStatEntity->dset_mask        = false;
    }
    $maskStatEntity->revision    = $deployRevision;
    $orm->save( $maskStatEntity );
    
    if( !$maskBug = $orm->getByKey( 'WbfsysMask', 'wbfsys_entity_attribute_type-maintenance-bug' ) )
    {
      $maskBug = new WbfsysMask_Entity();
      $maskBug->access_key = 'wbfsys_entity_attribute_type-maintenance-bug';
      $maskBug->access_url = 'Wbfsys.EntityAttributeType_Maintenance.bug';

      $maskBug->name            = 'Report Bug entity attribute Type';
      $maskBug->context         = 'bug';
      $maskBug->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskBug->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_attribute_type' );
      $maskBug->dset_mask      = false;
    }
    $maskBug->revision    = $deployRevision;
    $orm->save( $maskBug );
    
    if( !$maskHelp = $orm->getByKey( 'WbfsysMask', 'wbfsys_entity_attribute_type-maintenance-help' ) )
    {
      $maskHelp = new WbfsysMask_Entity();
      $maskHelp->access_key = 'wbfsys_entity_attribute_type-maintenance-help';
      $maskHelp->access_url = 'Wbfsys.EntityAttributeType_Maintenance.help';

      $maskHelp->name            = 'Help entity attribute Type';
      $maskHelp->context         = 'help';
      $maskHelp->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskHelp->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_attribute_type' );
      $maskHelp->dset_mask        = false;
    }
    $maskHelp->revision    = $deployRevision;
    $orm->save( $maskHelp );
    
    if( !$maskFaq = $orm->getByKey( 'WbfsysMask', 'wbfsys_entity_attribute_type-maintenance-faq' ) )
    {
      $maskFaq = new WbfsysMask_Entity();
      $maskFaq->access_key = 'wbfsys_entity_attribute_type-maintenance-faq';
      $maskFaq->access_url = 'Wbfsys.EntityAttributeType_Maintenance.faq';

      $maskFaq->name            = 'FAQ entity attribute Type';
      $maskFaq->context         = 'faq';
      $maskFaq->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskFaq->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_attribute_type' );
      $maskFaq->dset_mask        = false;
    }
    $maskFaq->revision    = $deployRevision;
    $orm->save( $maskFaq );
    
    // datensatz masken
    if( !$maskProtDset = $orm->getByKey( 'WbfsysMask', 'wbfsys_entity_attribute_type-maintenance-protocoldataset' ) )
    {
      $maskProtDset = new WbfsysMask_Entity();
      $maskProtDset->access_key = 'wbfsys_entity_attribute_type-maintenance-protocoldataset';
      $maskProtDset->access_url = 'Wbfsys.EntityAttributeType_Maintenance.protocolDataset';

      $maskProtDset->name            = 'Protocol entity attribute Type';
      $maskProtDset->context         = 'dataset_protocol';
      $maskProtDset->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskProtDset->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_attribute_type' );
      $maskProtDset->dset_mask        = true;
    }
    $maskProtDset->revision    = $deployRevision;
    $orm->save( $maskProtDset );
    
    if( !$maskStatDset = $orm->getByKey( 'WbfsysMask', 'wbfsys_entity_attribute_type-maintenance-statsdataset' ) )
    {
      $maskStatDset = new WbfsysMask_Entity();
      $maskStatDset->access_key = 'wbfsys_entity_attribute_type-maintenance-statsdataset';
      $maskStatDset->access_url = 'Wbfsys.EntityAttributeType_Maintenance.statsDataset';

      $maskStatDset->name            = 'Statistic entity attribute Type';
      $maskStatDset->context         = 'dataset_statistic';
      $maskStatDset->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskStatDset->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_attribute_type' );
      $maskStatDset->dset_mask        = true;
    }
    $maskStatDset->revision    = $deployRevision;
    $orm->save( $maskStatDset );
    
    if( !$maskMetadata = $orm->getByKey( 'WbfsysMask', 'wbfsys_entity_attribute_type-maintenance-metadata' ) )
    {
      $maskMetadata = new WbfsysMask_Entity();
      $maskMetadata->access_key = 'wbfsys_entity_attribute_type-maintenance-metadata';
      $maskMetadata->access_url = 'Wbfsys.EntityAttributeType_Maintenance.metadata';

      $maskMetadata->name            = 'Metadata entity attribute Type';
      $maskMetadata->context         = 'dataset_metadata';
      $maskMetadata->id_module       = $orm->getByKey( 'WbfsysModule', '' );
      $maskMetadata->id_management   = $orm->getByKey( 'WbfsysManagement', 'wbfsys_entity_attribute_type' );
      $maskMetadata->dset_mask        = true;
    }
    $maskMetadata->revision    = $deployRevision;
    $orm->save( $maskMetadata );
