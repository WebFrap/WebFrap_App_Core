<?php 

      if( !$data = $orm->getByKey( 'WbfsysContentLicence', 'public_domain' ) )
      {
        $data = new WbfsysContentLicence_Entity();
        $data->access_key  = 'public_domain';
      }
    $data->upgrade( 'name', 'Public Domain' );
    $data->upgrade( 'description', 'Public Domain' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'public_domain',
          'WbfsysContentLicence',
          'Sucessfully created new WbfsysContentLicence dataset key: public_domain'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'public_domain',
            'WbfsysContentLicence',
            'Sucessfully updated WbfsysContentLicence dataset key: public_domain'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_content_licence',
        'WbfsysContentLicence',
        'Failed to sync WbfsysContentLicence dataset key: public_domain '.$e->getMessage()
      ));
    }
