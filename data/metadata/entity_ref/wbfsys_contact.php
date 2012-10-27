<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_contact::address_item
//////////////////////////////////////////////////////////////////////////////*/

    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_contact-address_item' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_contact-address_item';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_contact' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_contact-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_address_item' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_address_item-vid' )?:0;
      $ref->description    = '';

    }
    $ref->revision        = $deployRevision;
    try
    {
      if( $ref->isNew() )
      {
        $orm->insert( $ref );
        $this->protocol(array(
          'insert',
          'wbfsys_contact-address_item',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_contact-address_item'
        ));
      }
      else
      {
        $orm->update( $ref );
        $this->protocol(array(
          'update',
          'wbfsys_contact-address_item',
          'WbfsysEntityReference',
          'Sucessfully updated WbfsysEntityReference wbfsys_contact-address_item'
        ));
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_contact-address_item',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_contact-address_item '.$e->getMessage()
      ));
    }

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_contact-ref-address_item' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_contact-ref-address_item';

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
    
    // upgrade the data if something has changed
    $secArea->upgrade( 'label', 'S: Message Item' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_contact' ) ); 
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_contact' ) ); 
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_contact' );
    $secArea->upgrade( 'vid', $ref ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );   
    $secArea->upgrade( 'description', "Reference: address_item on Entity: wbfsys_contact to Entity: wbfsys_address_item" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_contact-ref-address_item',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_contact'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_contact-ref-address_item',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_contact'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_contact-ref-address_item',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_contact '.$e->getMessage()
      ));
    }
