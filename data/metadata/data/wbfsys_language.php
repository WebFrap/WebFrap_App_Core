<?php 

      if( !$data = $orm->getByKey( 'WbfsysLanguage', 'en' ) )
      {
        $data = new WbfsysLanguage_Entity();
        $data->access_key  = 'en';
      }
    $data->upgrade( 'name', 'English' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'en',
          'WbfsysLanguage',
          'Sucessfully created new WbfsysLanguage dataset key: en'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'en',
            'WbfsysLanguage',
            'Sucessfully updated WbfsysLanguage dataset key: en'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_language',
        'WbfsysLanguage',
        'Failed to sync WbfsysLanguage dataset key: en '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysLanguage', 'de' ) )
      {
        $data = new WbfsysLanguage_Entity();
        $data->access_key  = 'de';
      }
    $data->upgrade( 'name', 'German' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'de',
          'WbfsysLanguage',
          'Sucessfully created new WbfsysLanguage dataset key: de'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'de',
            'WbfsysLanguage',
            'Sucessfully updated WbfsysLanguage dataset key: de'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_language',
        'WbfsysLanguage',
        'Failed to sync WbfsysLanguage dataset key: de '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysLanguage', 'fr' ) )
      {
        $data = new WbfsysLanguage_Entity();
        $data->access_key  = 'fr';
      }
    $data->upgrade( 'name', 'French' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'fr',
          'WbfsysLanguage',
          'Sucessfully created new WbfsysLanguage dataset key: fr'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'fr',
            'WbfsysLanguage',
            'Sucessfully updated WbfsysLanguage dataset key: fr'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_language',
        'WbfsysLanguage',
        'Failed to sync WbfsysLanguage dataset key: fr '.$e->getMessage()
      ));
    }
