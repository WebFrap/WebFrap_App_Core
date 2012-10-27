<?php 

      if( !$data = $orm->getByKey( 'WbfsysColorModel', 'rgb' ) )
      {
        $data = new WbfsysColorModel_Entity();
        $data->access_key  = 'rgb';
      }
    $data->upgrade( 'name', 'RGB' );
    $data->upgrade( 'idkey', '1' );
    $data->upgrade( 'description', 'The RGB color model is an additive color model in which red, green, and blue light are added together in various ways to reproduce a broad array of colors.' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'rgb',
          'WbfsysColorModel',
          'Sucessfully created new WbfsysColorModel dataset key: rgb'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'rgb',
            'WbfsysColorModel',
            'Sucessfully updated WbfsysColorModel dataset key: rgb'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_color_model',
        'WbfsysColorModel',
        'Failed to sync WbfsysColorModel dataset key: rgb '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysColorModel', 'cmyk' ) )
      {
        $data = new WbfsysColorModel_Entity();
        $data->access_key  = 'cmyk';
      }
    $data->upgrade( 'name', 'CMYK' );
    $data->upgrade( 'idkey', '2' );
    $data->upgrade( 'description', 'The CMYK color model (process color, four color) is a subtractive color model, used in color printing, and is also used to describe the printing process itself.' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'cmyk',
          'WbfsysColorModel',
          'Sucessfully created new WbfsysColorModel dataset key: cmyk'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'cmyk',
            'WbfsysColorModel',
            'Sucessfully updated WbfsysColorModel dataset key: cmyk'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_color_model',
        'WbfsysColorModel',
        'Failed to sync WbfsysColorModel dataset key: cmyk '.$e->getMessage()
      ));
    }
