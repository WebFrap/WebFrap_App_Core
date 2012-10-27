<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_calendar::appointments
//////////////////////////////////////////////////////////////////////////////*/

    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_calendar-appointments' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_calendar-appointments';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_calendar' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_calendar-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'wbfsys_calendar_appointment' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_calendar_appointment-id_calendar' )?:0;
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
          'wbfsys_calendar-appointments',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_calendar-appointments'
        ));
      }
      else
      {
        $orm->update( $ref );
        $this->protocol(array(
          'update',
          'wbfsys_calendar-appointments',
          'WbfsysEntityReference',
          'Sucessfully updated WbfsysEntityReference wbfsys_calendar-appointments'
        ));
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_calendar-appointments',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_calendar-appointments '.$e->getMessage()
      ));
    }

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_calendar-ref-appointments' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_calendar-ref-appointments';

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
    $secArea->upgrade( 'label', 'S: Appointments' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_calendar' ) ); 
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_calendar' ) ); 
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_calendar' );
    $secArea->upgrade( 'vid', $ref ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );   
    $secArea->upgrade( 'description', "Reference: appointments on Entity: wbfsys_calendar to Entity: wbfsys_calendar_appointment" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_calendar-ref-appointments',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_calendar'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_calendar-ref-appointments',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_calendar'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_calendar-ref-appointments',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_calendar '.$e->getMessage()
      ));
    }
