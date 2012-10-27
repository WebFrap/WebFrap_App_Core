<?php 
/*//////////////////////////////////////////////////////////////////////////////
// manage the metadata for ref: wbfsys_domain::subdomain
//////////////////////////////////////////////////////////////////////////////*/

    if( !$ref = $orm->getByKey( 'WbfsysEntityReference', 'wbfsys_domain-subdomain' ) )
    {
      $ref = new WbfsysEntityReference_Entity();
      $ref->access_key  = 'wbfsys_domain-subdomain';

      $ref->id_to       = $orm->getByKey( 'WbfsysEntity', 'wbfsys_domain' )?:0;
      $ref->id_field_to = $orm->getByKey( 'WbfsysEntityAttribute', 'wbfsys_domain-rowid' )?:0;
      $ref->id_from        = $orm->getByKey( 'WbfsysEntity', 'hosting_subdomain' )?:0;
      $ref->id_field_from  = $orm->getByKey( 'WbfsysEntityAttribute', 'hosting_subdomain-id_domain' )?:0;
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
          'wbfsys_domain-subdomain',
          'WbfsysEntityReference',
          'Sucessfully created new WbfsysEntityReference wbfsys_domain-subdomain'
        ));
      }
      else
      {
        $orm->update( $ref );
        $this->protocol(array(
          'update',
          'wbfsys_domain-subdomain',
          'WbfsysEntityReference',
          'Sucessfully updated WbfsysEntityReference wbfsys_domain-subdomain'
        ));
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_domain-subdomain',
        'WbfsysEntityReference',
        'Failed to save WbfsysEntityReference wbfsys_domain-subdomain '.$e->getMessage()
      ));
    }

    $secArea = null;

    if( !$secArea = $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_domain-ref-subdomain' ) )
    {
      $secArea = new WbfsysSecurityArea_Entity();
      $secArea->access_key = 'entity-wbfsys_domain-ref-subdomain';

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
    $secArea->upgrade( 'label', 'S: Subdomain' );
    $secArea->upgrade( 'id_target', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_domain' ) ); 
    $secArea->upgrade( 'm_parent', $orm->getByKey( 'WbfsysSecurityArea', 'entity-wbfsys_domain' ) ); 
    $secArea->upgrade( 'parent_key', 'entity-wbfsys_domain' );
    $secArea->upgrade( 'vid', $ref ); 
    $secArea->upgrade( 'id_vid_entity', $orm->getByKey( 'WbfsysEntity', 'wbfsys_entity_reference' ) );   
    $secArea->upgrade( 'id_type', $orm->getByKey( 'WbfsysSecurityAreaType', 'entity_reference' ) );   
    $secArea->upgrade( 'type_key', 'entity_reference' );   
    $secArea->upgrade( 'description', "Reference: subdomain on Entity: wbfsys_domain to Entity: hosting_subdomain" ); 
    $secArea->revision        = $deployRevision;
    try
    {
      if( $secArea->isNew() )
      {
      
        $orm->insert( $secArea );
        $this->protocol(array(
          'insert',
          'entity-wbfsys_domain-ref-subdomain',
          'WbfsysSecurityArea',
          'Sucessfully created new SecurityArea wbfsys_domain'
        ));
      }
      else
      {
        
        if( !$secArea->getSynchronized() )
        {
          $orm->update( $secArea );
          $this->protocol(array(
            'update',
            'entity-wbfsys_domain-ref-subdomain',
            'WbfsysSecurityArea',
            'Sucessfully updated SecurityArea wbfsys_domain'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'entity-wbfsys_domain-ref-subdomain',
        'WbfsysSecurityArea',
        'Failed to sync SecurityArea wbfsys_domain '.$e->getMessage()
      ));
    }
